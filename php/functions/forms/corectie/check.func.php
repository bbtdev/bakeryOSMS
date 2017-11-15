<?php
  function checkNoileAditiiDistrugIntegritateaStocului($document_de_corectat_istoric_id, $catalog_denumire, $catalog_item_ids, $cantitati, $individual_item_ids)  {
    $document_circuit = getCircuitDocumentByDocumentId(getDocumentIdByIstoricId($document_de_corectat_istoric_id));
    $operatiune = 'adunare';
    if ($document_circuit == 'iesire') {
      $operatiune = 'scadere';
    }
    $items_stoc = getStocByCatalogJoinCatalog($catalog_denumire);
    $i = 0;
    foreach ($catalog_item_ids as $item_id) {
      $found = -1;
      if ($individual_item_ids[$i] != 0) {
        foreach ($items_stoc as $key=>$item_stoc) {
          if ($item_stoc['individual_item_id'] == $individual_item_ids[$i]) {
            $found = $key;
            if ($operatiune == 'adunare') {
              $items_stoc[$key]['cantitate'] += $cantitati[$i];
            }
            else {
              $items_stoc[$key]['cantitate'] -= $cantitati[$i];
            }
            break;
          }
        }
      }
      else {
        foreach ($items_stoc as $key=>$item_stoc) {
          if ($item_stoc['catalog_item_id'] == $item_id) {
            $found = $key;
            if ($operatiune == 'adunare') {
              $items_stoc[$key]['cantitate'] += $cantitati[$i];
            }
            else {
              $items_stoc[$key]['cantitate'] -= $cantitati[$i];
            }
            break;
          }
        }
      }
      if ($found == -1) {
        $error = 'situatia imposibila la integritatea stocului, un produs din corectie nu a fost gasit';
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
      }
      else if ($items_stoc[$found]['cantitate'] < 0) {
        $error = 'nu se poate aplica corectia, produsul ' . $items_stoc[$found]['denumire'] . ' ramane cu o cantitate negativa in stoc';
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
      }
      $i++;
    }
  }
?>