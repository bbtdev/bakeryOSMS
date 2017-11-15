<?php

  function getListaProduseFromTwoLists($produse_main, $produse_second, $operatiune) {
    if (($operatiune != 'adunare') AND ($operatiune != 'scadere')) {
      $error = 'operatiunea in getListaProduseFromTwoLists nu este recunoscuta';
      include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
      exit();
    }
    foreach ($produse_second as $key_sec=>$produs_second) {
      if ($produs_second['individual_item_id'] != 0) {
        $found = 0;
        foreach ($produse_main as $key_main => $produs_main) {
          if ($produs_second['individual_item_id'] == $produs_main['individual_item_id']) {
            $found = 1;
            if ($operatiune == 'adunare') {
              $produse_main[$key_main]['cantitate'] += $produs_second['cantitate'];
            }
            else if ($operatiune == 'scadere') {
              $produse_main[$key_main]['cantitate'] -= $produs_second['cantitate'];
            }
          }
        }
        if ($found == 0) {
          $produse_main[] = $produs_second;
        }
      }
      else {
        $found = 0;
        foreach ($produse_main as $key_main => $produs_main) {
          if (($produs_main['catalog_item_id'] == $produs_second['catalog_item_id']) AND ($produs_main['catalog_denumire'] == $produs_second['catalog_denumire'])) {
            $found = 1;
            if ($operatiune == 'adunare') {
              $produse_main[$key_main]['cantitate'] += $produs_second['cantitate'];
            }
            else if ($operatiune == 'scadere') {
              $produse_main[$key_main]['cantitate'] -= $produs_second['cantitate'];
            }
          }
        }
        if ($found == 0) {
          $produse_main[] = $produs_second;
        }
      }
    }
    return $produse_main;
  }

  function getUmItemDinCatalogById($catalog, $itemid) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
      $sql = 'SELECT um FROM ' . $catalog . '
      WHERE  id = :id';
      $s = $pdo->prepare($sql);
      $s->bindValue(':id', $itemid);
      $s->execute();
    }
    catch(PDOException $e) {
      $error = 'la obtinerea um din catalogul ' . $catalog;
      include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
      exit();
    }
    $rows = $s->fetch();
    return $rows[0];
  }

  function getCategoriiEvidentaOrder($tabelnume, $evidenta, $order_list) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
      $sql = 'SELECT denumire FROM ' . $tabelnume . "_categorie WHERE evidenta = '" . $evidenta . "'";
      if (is_array($order_list)) {
        $sql .= ' ORDER BY ' . $order_list[0];
        for ($i = 1; $i < count($order_list); $i++) {
          $sql .= ', ' . $order_list[$i];
        }
      }
      else if ($order_list) {
        $sql .= " ORDER BY " . $order_list;
        
      }
      $s = $pdo->query($sql);
    }
    catch(PDOException $e) {
        $error = 'la obtinerea categoriile cu afisare ' . $afisare . ' pentru ' . $tabelnume . $e;
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
    $categorii = array();
    foreach ($s as $row) {
      $categorii[] = $row[0];
    }
    return $categorii;
  }

  function getCategoriiCatalog($catalog_denumire) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
      $sql = 'SELECT denumire FROM ' . $catalog_denumire . '_categorie';
      $s = $pdo->query($sql);
    }
    catch(PDOException $e) {
        $error = 'la obtinerea categoriile dintr-un catalog';
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
    $categorii = array();
    foreach ($s as $row) {
      $categorii[] = $row[0];
    }
    return $categorii;
  }

  function getCategoriiGrupareOrder($tabelnume, $grupare, $order_list) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
      $sql = 'SELECT denumire FROM ' . $tabelnume . "_categorie WHERE grupare = '" . $grupare . "'";
      if (is_array($order_list)) {
        $sql .= ' ORDER BY ' . $order_list[0];
        for ($i = 1; $i < count($order_list); $i++) {
          $sql .= ', ' . $order_list[$i];
        }
      }
      else if ($order_list) {
        $sql .= " ORDER BY " . $order_list;
        
      }
      $s = $pdo->query($sql);
    }
    catch(PDOException $e) {
        $error = 'la obtinerea categoriile grupare order pentru ' . $tabelnume . $e;
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
    $categorii = array();
    foreach ($s as $row) {
      $categorii[] = $row[0];
    }
    return $categorii;
  }

  function getIdsFromCatalogWithEvidentaIndividuala($catalog) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
      $sql = 'SELECT id FROM ' . $catalog . ' INNER JOIN ' . $catalog . '_categorie 
      ON ' . $catalog . '.categorie_denumire = ' . $catalog . '_categorie.denumire
      WHERE um = "KG" AND ' . $catalog . '_categorie.evidenta = "individuala"';
      $s = $pdo->query($sql);
    }
    catch(PDOException $e) {
        $error = 'la obtinerea id-urilor din catalog a produselor cu evidenta individuala ' .$e;
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
    $rows = $s->fetchAll();
    $ids = array();
    foreach ($rows as $row) {
      $ids[] = $row[0];
    }
    return $ids;
  }

  function getRowFromCatalogForItem($catalog_denumire, $catalog_item_id) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
        $sql = 'SELECT * FROM ' . $catalog_denumire . '
        WHERE id = ' . $catalog_item_id;
        $s = $pdo->query($sql);
      }
      catch(PDOException $e) {
          $error = 'la obtinerea randului pentru un produs din catalogul ' . $catalog_denumire . 'dupa id';
          include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
          exit();
      }
      $row = $s->fetch();
      return $row;
}

?>