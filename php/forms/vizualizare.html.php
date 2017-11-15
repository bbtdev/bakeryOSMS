<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/php/standards/helpers.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Formular</title>
  </head>		
  <body>
    <?php
      if ($vizualizare == 'cataloage') {
        foreach (array('produs_fabricat','ambalaj') as $catalog_denumire) {
          echo "<h2>Catalog: $catalog_denumire</h2>";
          echo '<table>';
          $items = getAllFromTableOrder($catalog_denumire, 'denumire');
          echo '<tr><td>denumire</td><td>um</td><td>pret</td><td>categorie_denumire</td><td>creator</td></tr>';
          foreach ($items as $item) {
            echo '<tr><td>' . $item['denumire'] . '</td><td>' . $item['um'] . '</td><td>' . $item['pret'] . '</td><td>' . $item['categorie_denumire'] . '</td><td>' . $item['creator'] . '</td></tr>';
          }
          echo '</table>';
        }
      }
      else if ($vizualizare == 'stoc') {
        echo '<h1>Stoc</h1>';
        $items['produs_fabricat'] =  getStocByCatalogJoinCatalog('produs_fabricat');
        $items['ambalaj'] = getStocByCatalogJoinCatalog('ambalaj');
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
    <?php if ($vizualizare == 'cataloage'): ?>
    <h3>Adauga produs</h3>
    <form action="?" method="post">
      <label for = 'catalog_denumire'>Catalog:<select id = "catalog_denumire" name = "catalog_denumire"><option value="produs_fabricat">produs_fabricat</option><option value="ambalaj">ambalaj</option></select></label>
      <label for = 'denumire'>Denumire:<input type = "text" name="denumire" id='denumire'/></label>
      <label for = 'um'>UM<select id = "um" name = "um"><option value="BUC">BUC</option><option value="KG">KG</option></select></label>
      <label for = 'pret'>Pret:<input type = "text" name="pret" id='pret'/>lei</label>
      <label for = 'categorie'>Categorie<select id = "categorie" name = 'categorie_denumire'>
        <?php
          foreach (array('produs_fabricat', 'ambalaj') as $catalog_denumire) {
            $categorii_denumiri = getCategoriiCatalog($catalog_denumire);
            print_r($categorii_denumiri);
            foreach ($categorii_denumiri as $categorie_denumire) {
              echo "<option value = $categorie_denumire >$categorie_denumire</option>";
            }
          }
        ?>
      </select></label>
      <input type="submit" name = "adaugaProdus" value="Adauga Produs">
    </form>
    <?php endif;?>
    <?php if ($vizualizare == 'document'): ?>
      <?php echo "<h2>Adauga corectie</h2>";?>
      <?php if ($vizualizare_mod_afisare != 'list'): ?>
          <div>
            <form action="?CorecteazaDocument" method="post">
              <input type="hidden" name="document_de_corectat_denumire" value="<?php echo "$document_denumire";?>">
              <input type="hidden" name="sursa_items_corectie" value="<?php echo getSursaDocumentByDenumire($document_denumire);?>">
              <input type="submit" value="Produse Uitate">
            </form>
          </div>
      <?php endif; ?>
      <div>
            <form action="?CorecteazaDocument" method="post">
              <input type="hidden" name="document_de_corectat_denumire" value="<?php echo "$document_denumire";?>">
              <input type="hidden" name="sursa_items_corectie" value="document">
              <input type="submit" value="Date Gresite">
            </form>
          </div>
    <?php endif; ?>
  </body>
</html>