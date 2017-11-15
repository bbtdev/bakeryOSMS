<?php

    function insertProdusInCatalog($catalog_denumire, $um, $categorie_denumire, $produs_denumire, $pret) {
      include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
      try {
        $sql = "INSERT INTO $catalog_denumire SET um = '$um', categorie_denumire = '$categorie_denumire', denumire = '$produs_denumire', pret = '$pret', creator = '" . $_SESSION['user'] . "'";
        $s = $pdo->query($sql);  
      }
      catch(PDOException $e) {
          $error = 'la introducere produsului in catalog' .$e;
          include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
          exit();
      }
    }

    function insertInTableTipDocumentProduse($documentnume, $documentid,
    $catalog_denumire, $catalog_items_id, $cantitati, $individual_item_ids, $explicatii) {
      $coloane = getColoaneDocument($documentid);
      $item_ids_evidenta_individuala = getIdsFromCatalogWithEvidentaIndividuala($catalog_denumire);
      include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
      try {
        $sql = "INSERT INTO $documentnume SET ";
        if (isset($coloane['ora'])) {
          $sql .= 'ora = CURTIME(), ';
        }
        for ($i = 0; $i < count($catalog_items_id); $i++) {
          $sqlx = '';
          $sqlx .= 'catalog_item_id = "' . $catalog_items_id[$i] . '", ';
          $sqlx .= 'cantitate = "' . $cantitati[$i] . '", ';
          if (isset($coloane['explicatie'])) {
            $sqlx .= 'explicatie = "' . $explicatii[$i] . '", ';
          }
          if (isset($coloane['individual_item_id'])) {
            if (isset($individual_item_ids[$i])) {
              $sqlx .= 'individual_item_id = "' . $individual_item_ids[$i] . '", ';
            }
            else {
              if ($item_ids_evidenta_individuala AND in_array($catalog_items_id[$i], $item_ids_evidenta_individuala) AND (getUmItemDinCatalogById($catalog_denumire, $catalog_items_id[$i]) == 'KG')) {
                  $sqlx .= 'individual_item_id = "' . insertItemInEvidentaIndividuala($catalog_items_id[$i], $catalog_denumire) . '", ';
              }
              else {
                $sqlx .= 'individual_item_id = 0,';
              }
            }
          }
          $sqlx .= 'catalog_denumire = "' . $catalog_denumire . '"'; 
          $sqlx = $sql . $sqlx;

          $s = $pdo->query($sqlx);
        }
      }
      catch(PDOException $e) {
          $error = 'la inserarea datelor de tip produs din formular in tabelul ' . $documentnume . $e;
          include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
          exit();
      }
    }
?>