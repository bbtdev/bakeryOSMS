<?php

  function getItemsFromDocumentProduse($document_denumire) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
      $coloane_document = getColoaneDocument(getDocumentIdByIstoricId(getIstoricIdByDenumireDocument($document_denumire)));
      if (isset($coloane_document['individual_item_id'])){
        $sql = 'SELECT catalog_denumire, catalog_item_id, id as document_item_id, cantitate, individual_item_id FROM ' . $document_denumire;
      }
      else {
        $sql = 'SELECT catalog_denumire, catalog_item_id, id as document_item_id, cantitate FROM ' . $document_denumire;
      } 
      $s = $pdo->query($sql);
    }
    catch(PDOException $e) {
      $error = 'la obtinerea items-urilor din documentul ' . $document_denumire;
      include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
      exit();
    }
    $rows = $s->fetchAll();
    return $rows;
  }

  function getItemsFromCorectieDocumentProduse($document_denumire) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
      $sql = 'SELECT catalog_denumire, catalog_item_id, document_item_id, cantitate, document_item_id, individual_item_id FROM ' . $document_denumire;
      $s = $pdo->query($sql);
    }
    catch(PDOException $e) {
      $error = 'la obtinerea items-urilor din corectia documentului ' . $document_denumire . $e;
      include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
      exit();
    }
    $rows = $s->fetchAll();
    return $rows;
  }

  function getItemsFromDocumentAndCorectieJoinCatalogForFormSplitPreparation($document_denumire, $catalog_denumire) {
    $produse = getItemsFromDocumentAndCorectieJoinCatalog($document_denumire);
    $items = array();
    foreach ($produse as $key => $produs) {
      if ($produs['catalog_denumire'] == $catalog_denumire) {
        unset($produse[$key]['catalog_denumire']);
        $items[] = $produs;
      }
    }
    return $items;
  }

  function getItemsFromDocumentAndCorectieJoinCatalog($document_denumire) {
    $produse = getItemsFromDocumentAndCorectie($document_denumire);
    $produse = getItemsJoinCatalogForItemList($produse);
    return $produse;
  }

  function getItemsJoinCatalogForItemList($produse) {
    foreach ($produse as $key=>$produs) {
      $data = getRowFromCatalogForItem($produs['catalog_denumire'], $produs['catalog_item_id']);
      $produse[$key]['um'] = $data['um'];
      $produse[$key]['pret'] = $data['pret'];
      $produse[$key]['denumire'] = $data['denumire'];
      $produse[$key]['categorie_denumire'] = $data['categorie_denumire'];
    }
    return $produse;
  }

  function getItemsFromDocumentAndCorectieJoinCatalogTemp($document_denumire) {
    $produse = getItemsFromDocumentAndCorectie($document_denumire);
    $produse = getItemsJoinCatalogForItemListTemp($produse);
    return $produse;
  }

  function getItemsJoinCatalogForItemListTemp($produse) {
    $items = array();
    foreach ($produse as $key=>$produs) {
      $data = getRowFromCatalogForItem($produs['catalog_denumire'], $produs['catalog_item_id']);
      $produse[$key]['um'] = $data['um'];
      $produse[$key]['pret'] = $data['pret'];
      $produse[$key]['denumire'] = $data['denumire'];
      $produse[$key]['categorie_denumire'] = $data['categorie_denumire'];
      $items[$produs['catalog_denumire']][] = $produse[$key];
    }
    return $items;
  }

  function getItemsFromDocumentAndCorectie($document_denumire) {
    
    $produse_document = getItemsFromDocumentProduse($document_denumire);
    
    if (!(documentHasCorectieByIstoricId(getIstoricIdByDenumireDocument($document_denumire)))) {
      return $produse_document;
    }
    $produse_corectie = getItemsFromCorectieDocumentProduse('corectie_' . $document_denumire);

    foreach ($produse_corectie as $key_cor=>$produs_corectie) {
      if ((isset($produs_corectie['document_item_id'])) AND ($produs_corectie['document_item_id'] != 0)) {
        foreach ($produse_document as $key=>$produs_document) {
          if ($produs_document['document_item_id'] == $produs_corectie['document_item_id']) {
            $produse_document[$key]['cantitate'] += $produs_corectie['cantitate'];
          }
        }
      }
      else {
        if ((isset($produs_corectie['individual_item_id'])) AND ($produs_corectie['individual_item_id'] != 0)) {
          $produse_corectie[$key_cor]['document_item_id'] = count($produse_document);
          $produse_document[] = $produse_corectie[$key_cor];
        }
        else {
          $found = 0;
          foreach ($produse_document as $key=>$produs_document) {
            if (($produs_document['catalog_item_id'] == $produs_corectie['catalog_item_id']) AND ($produs_document['catalog_denumire'] == $produs_corectie['catalog_denumire'])) {
              $produse_document[$key]['cantitate'] += $produs_corectie['cantitate']; 
              $found = 1;
              break;
            }
          }
          if ($found == 0) {
            $produse_corectie[$key_cor]['document_item_id'] = count($produse_document) + 1;
            $produse_document[] = $produse_corectie[$key_cor];
          }
        }
      }
    }

    return $produse_document;
  }

  function getItemsFromCatalogForForm($catalog) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
      $sql = 'SELECT id as catalog_item_id,
              denumire, um, pret, categorie_denumire
              FROM ' . $catalog . ' ORDER BY denumire';
      $s = $pdo->query($sql);
    }
    catch(PDOException $e) {
      $error = 'la obtinerea items-urilor pentru form din catalogul ' . $catalog . ' ordonate dupa denumire ';
      include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
      exit();
    }
    $rows = $s->fetchAll();
    return $rows;
  }
  
  function getItemsFromDocumentForFormSplitPreparation($document_denumire, $catalog_denumire) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
      $sql = 'SELECT catalog_item_id, individual_item_id, cantitate, ' . $document_denumire . '.id as document_item_id,
              denumire, um, pret, categorie_denumire
              FROM ' . $document_denumire . ' 
              INNER JOIN ' . $catalog_denumire . ' ON ' . $catalog_denumire . '.id = ' . $document_denumire . '.catalog_item_id
              WHERE catalog_denumire = "' . $catalog_denumire . '" ORDER BY denumire';
      $s = $pdo->query($sql);
    }
    catch(PDOException $e) {
        $error = 'la obtinerea items-urilor pentru form din catalogul ordonate dupa denumire ' .$e;
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
    $rows = $s->fetchAll();
    return $rows;
  }

  function getItemsFromDocumentForFormAfisareList($document_denumire) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    $items = getAllFromTableOrder($document_denumire, 0);
    foreach ($items as $key => $item) {
      $items[$key]['document_item_id'] = $item['id'];
      unset($items[$key]['id']);
      $items[$key] = array_merge($items[$key],getRowFromCatalogForItem($item['catalog_denumire'], $item['catalog_item_id']));
    }
    return $items;
  }
?>