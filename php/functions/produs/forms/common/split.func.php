<?php
  function splitItemsForForm($items) {
    /*
      sort by denumire first
    */
    foreach ($items as $catalog_denumire => $produse) {
      $sort_flag = 1;
      while ($sort_flag == 1) {
        $sort_flag = 0;
        for ($i = 1; $i < count($produse); $i++) {
          if (($items[$catalog_denumire][$i-1]['denumire'] . $items[$catalog_denumire][$i-1]['pret'])  > ($items[$catalog_denumire][$i]['denumire'] . $items[$catalog_denumire][$i]['pret'])) {
            $sort_flag = 1;
            $x = $items[$catalog_denumire][$i];
            $items[$catalog_denumire][$i] = $items[$catalog_denumire][$i-1];
            $items[$catalog_denumire][$i-1] = $x;
          }
        }
      }  
    }
    //end
    $list = array();
    foreach($items as $catalog_denumire => $produse) {
      $categorii_grupare_colectiva = getCategoriiGrupareOrder($catalog_denumire, 'comuna', 'importanta');
      foreach($produse as $produs) {
        if (in_array($produs['categorie_denumire'], $categorii_grupare_colectiva)) {
          $list[$catalog_denumire]['comuna'][$produs['um']][] = $produs;  
        }
        else {
          $list[$catalog_denumire]['separata'][$produs['categorie_denumire']][$produs['um']][] = $produs; 
        }
      }
    }
    return $list;
  }

  function splitItemsForFormNoZeroQ($items) {
    //doesn't allow zero quantity
    /*
      sort by denumire first
    */
    foreach ($items as $catalog_denumire => $produse) {
      $sort_flag = 1;
      while ($sort_flag == 1) {
        $sort_flag = 0;
        for ($i = 1; $i < count($produse); $i++) {
          if (($items[$catalog_denumire][$i-1]['denumire'] . $items[$catalog_denumire][$i-1]['pret'])  > ($items[$catalog_denumire][$i]['denumire'] . $items[$catalog_denumire][$i]['pret'])) {
            $sort_flag = 1;
            $x = $items[$catalog_denumire][$i];
            $items[$catalog_denumire][$i] = $items[$catalog_denumire][$i-1];
            $items[$catalog_denumire][$i-1] = $x;
          }
        }
      }  
    }
    //end
    $list = array();
    foreach($items as $catalog_denumire => $produse) {
      $categorii_grupare_colectiva = getCategoriiGrupareOrder($catalog_denumire, 'comuna', 'importanta');
      foreach($produse as $produs) {
        if ($produs['cantitate'] != 0) {
          if (in_array($produs['categorie_denumire'], $categorii_grupare_colectiva)) {
            $list[$catalog_denumire]['comuna'][$produs['um']][] = $produs;  
          }
          else {
            $list[$catalog_denumire]['separata'][$produs['categorie_denumire']][$produs['um']][] = $produs; 
          }
        }
      }
    }
    return $list;
  }
?>