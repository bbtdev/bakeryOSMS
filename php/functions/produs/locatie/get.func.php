<?php
  
  function getStoc() {
    $inventar_initial_denumire = getDenumireInventarInitialAstaziLocatie();
    $items = getItemsFromDocumentAndCorectie($inventar_initial_denumire);
    $tabele_intrari_denumiri = getDenumiriTabeleDocumentAstaziByCircuitGestiuneLocatie('intrare', 'vitrina');
    if ($tabele_intrari_denumiri) {
      foreach ($tabele_intrari_denumiri as $tabel_intrare_denumire) {
        $items_tabel = getItemsFromDocumentAndCorectie($tabel_intrare_denumire);
        $items = getListaProduseFromTwoLists($items, $items_tabel, 'adunare');
      }
    }
    $tabele_iesiri_denumiri = getDenumiriTabeleDocumentAstaziByCircuitGestiuneLocatie('iesire', 'vitrina');
    if ($tabele_iesiri_denumiri) {
      foreach ($tabele_iesiri_denumiri as $tabel_iesire_denumire) {
        $items_tabel = getItemsFromDocumentAndCorectie($tabel_iesire_denumire);
        $items = getListaProduseFromTwoLists($items, $items_tabel, 'scadere');
      }
    }
    return $items;
  }

  function getStocByCatalog($catalog_denumire) {
    $items = getStoc();
    $items_new = array();
    foreach ($items as $key => $item) {
      if ($item['catalog_denumire'] == $catalog_denumire) {
        $items_new[] = $item;
      }
    }
    return $items_new;
  }

  function getStocByCatalogJoinCatalog($catalog_denumire) {
    $items = getStocByCatalog($catalog_denumire);
    $items = getItemsJoinCatalogForItemList($items);
    return $items;
  }

?>