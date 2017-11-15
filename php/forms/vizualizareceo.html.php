<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/php/standards/helpers.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Formular</title>
  </head>		
  <body>
    <?php
      if ($vizualizare == 'stoc') {
        echo '<h1>Stoc Vitrina Acum</h1>';
        $items['produs_fabricat'] =  getStocVitrinaByCatalogJoinCatalogByDataLocatie('produs_fabricat', date("Y-m-d"), 'Selgros_Iasi');
        $items['ambalaj'] =  getStocVitrinaByCatalogJoinCatalogByDataLocatie('ambalaj', date("Y-m-d"), 'Selgros_Iasi');
        $items =  splitItemsForFormNoZeroQ($items);
        $start = 0;
        foreach ($items as $catalog_denumire => $item_group) {
          if (isset($item_group['comuna'])) {
            foreach (array('BUC', 'KG') as $um) {
              if (isset($item_group['comuna'][$um])) {
                echo '<h2>' . $catalog_denumire . ' la ' . $um . '</h2>';
                foreach ($item_group['comuna'][$um] as $produs) {
                  echo '<p>' . $start . '. ' . $produs['denumire'] . ' la ' . $produs['pret'] . 'lei/' . $produs['um'] . ' Cantitate: ' . $produs['cantitate'] . ' ' . $produs['um'] .  '</p>';
                  $start++;
                }
              }
            }
          }
          if (isset($item_group['separata'])) {
            $categorii_grupate_separat = getCategoriiGrupareOrder($catalog_denumire, 'separata', 'importanta');
            $categorii_evidenta_individuala = getCategoriiEvidentaOrder($catalog_denumire, 'individuala', 'importanta');
            foreach ($categorii_grupate_separat as $categorie_grupata_separat) {
              foreach (array('BUC','KG') as $um) {
                if (isset($item_group['separata'][$categorie_grupata_separat][$um])) {
                  echo '<h2>' . $categorie_grupata_separat . ' la ' . $um . '</h2>';
                  foreach ($item_group['separata'][$categorie_grupata_separat][$um] as $produs) {
                    echo '<p>' . $start . '. ' . $produs['denumire'] . ' la ' . $produs['pret'] . 'lei/' . $produs['um'] . ' Cantitate: ' . $produs['cantitate'] . ' ' . $produs['um'] .  '</p>';
                    $start++;
                  }
                }
              }
            }
          }
        }
      }
      else {
        if ($vizualizare == 'document') {
          echo '<h1>Vizualizare ' . $document_denumire . '</h1>';
        }
        if ($vizualizare_mod_afisare == 'split') {
          if ($vizualizare == 'document') {
           // $items = splitItemsForForm(getProduseDocumentForVizualizareSplit($document_denumire));
           $items = splitItemsForForm(getItemsFromDocumentAndCorectieJoinCatalogTemp($document_denumire));
          }
          foreach ($items as $catalog_denumire => $item_group) {
            if (isset($item_group['comuna'])) {
              foreach (array('BUC', 'KG') as $um) {
                if (isset($item_group['comuna'][$um])) {
                  echo '<h3>'.$catalog_denumire . ' la ' . $um . '</h3>';
                  foreach ($item_group['comuna'][$um] as $produs) {
                    echo '<p>' . $produs['denumire'] . ' la ' . $produs['pret'] . ' pe ' . $produs['um'] .  ', Cantitate: ' . $produs['cantitate'] . '</p>';
                  }
                }
              }
            }
            if (isset($item_group['separata'])) {
              $categorii_grupate_separat = getCategoriiGrupareOrder($catalog_denumire, 'separata', 'importanta');
              $categorii_evidenta_individuala = getCategoriiEvidentaOrder($catalog_denumire, 'individuala', 'importanta');
              foreach ($categorii_grupate_separat as $categorie_grupata_separat) {
                foreach (array('BUC','KG') as $um) {
                  if (isset($item_group['separata'][$categorie_grupata_separat][$um])) {
                    echo '<h3>' . $categorie_grupata_separat . ' la ' . $um . '</h3>';
                    foreach ($item_group['separata'][$categorie_grupata_separat][$um] as $produs) {
                      echo '<p>' . $produs['denumire'] . ' la ' . $produs['pret'] . ' pe ' . $produs['um'] .  ', Cantitate: ' . $produs['cantitate'] . '</p>';
                    }
                  }
                }
              }
            }
          }
        }
        if ($vizualizare_mod_afisare == 'list') {
          if ($vizualizare == 'document') {
            //$items = getProduseDocumentForVizualizareList($document_denumire);
            $items = getItemsFromDocumentAndCorectieJoinCatalog($document_denumire);
            foreach ($items as $produs) {
              echo '<p>' . $produs['denumire'] . ' la ' . $produs['pret'] . ' pe ' . $produs['um'] .  ', Cantitate: ' . $produs['cantitate'] . '</p>';
            }
          }
        }
      }
    ?>
  </body>
</html>