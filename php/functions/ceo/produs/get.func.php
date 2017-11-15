<?php

    function getStocVitrinaByDataLocatie($data, $locatie) {
      $inventar_initial_denumire =  getDenumireInventarInitialDataLocatie($data, $locatie);
      $items = getItemsFromDocumentAndCorectie($inventar_initial_denumire);
      $tabele_intrari_denumiri = getDenumiriTabeleDocumentByDataCirGesLoc($data, 'intrare', 'vitrina', 'Selgros_Iasi');
      if ($tabele_intrari_denumiri) {
        foreach ($tabele_intrari_denumiri as $tabel_intrare_denumire) {
          $items_tabel = getItemsFromDocumentAndCorectie($tabel_intrare_denumire);
          $items = getListaProduseFromTwoLists($items, $items_tabel, 'adunare');
        }
      }
      $tabele_iesiri_denumiri = getDenumiriTabeleDocumentByDataCirGesLoc($data, 'intrare', 'vitrina', 'Selgros_Iasi');
      if ($tabele_iesiri_denumiri) {
        foreach ($tabele_iesiri_denumiri as $tabel_iesire_denumire) {
          $items_tabel = getItemsFromDocumentAndCorectie($tabel_iesire_denumire);
          $items = getListaProduseFromTwoLists($items, $items_tabel, 'scadere');
        }
      }
      return $items;
    }
  
    function getStocVitrinaByCatalogByDataLocatie($catalog_denumire, $data, $locatie) {
      $items = getStocVitrinaByDataLocatie($data, $locatie);
      $items_new = array();
      foreach ($items as $key => $item) {
        if ($item['catalog_denumire'] == $catalog_denumire) {
          $items_new[] = $item;
        }
      }
      return $items_new;
    }
  
    function getStocVitrinaByCatalogJoinCatalogByDataLocatie($catalog_denumire, $data, $locatie) {
      $items = getStocVitrinaByCatalogByDataLocatie($catalog_denumire, $data, $locatie);
      $items = getItemsJoinCatalogForItemList($items);
      return $items;
    }

    function getStocVitrinaJoinCatalogByDataLocatie($data, $locatie) {
      $items = getStocVitrinaByDataLocatie($data, $locatie);
      $items = getItemsJoinCatalogForItemList($items);
      return $items;
    }

    function getItemListWithIndividualItemsColectified($items) {
      foreach ($items as $key=>$item) {
        if ($item['cantitate'] == 0) {
          unset($items[$key]);
        }
        else if ($item['individual_item_id']) {
          foreach ($items as $key_x=>$item_x) {
            if (($key != $key_x) AND (isset($items[$key])) AND ($item['catalog_denumire'] == $item_x['catalog_denumire']) AND ($item['catalog_item_id'] == $item_x['catalog_item_id'])) {
              $items[$key]['cantitate'] += $item_x['cantitate'];
              unset($items[$key_x]);
            }
          }
        }
      }
      return $items;
    }

    function getItemListWithNoDuplicates($items) {
      foreach ($items as $key=>$item) {
        if ($item['cantitate'] == 0) {
          unset($items[$key]);
        }

        foreach ($items as $key_x=>$item_x) {
          if (($key != $key_x) AND (isset($items[$key])) AND ($item['catalog_denumire'] == $item_x['catalog_denumire']) AND ($item['catalog_item_id'] == $item_x['catalog_item_id'])) {
            $items[$key]['cantitate'] += $item_x['cantitate'];
            unset($items[$key_x]);
          }
        }
        
      }
      return $items;
    }

    function getDiferenteIgnoreIndividualityForTwoItemLists($items_x, $items_y) {
      foreach ($items_x as $key_x=>$item_x) {
        foreach ($items_y as $key_y=>$item_y) {
          if (($item_x['catalog_denumire'] == $item_y['catalog_denumire']) AND ($item_x['catalog_item_id'] == $item_y['catalog_item_id'])) {
            $items_x[$key_x]['cantitate'] -= $item_y['cantitate'];
            unset($items_y[$key_y]);
            break;
          }
        }
      }
      foreach ($items_y as $key_y=>$item_y) {
        $items_y[$key_y]['cantitate'] = -$item_y['cantitate'];
        $items_x[] = $items_y[$key_y];
      }
      return $items_x;
    }
?>