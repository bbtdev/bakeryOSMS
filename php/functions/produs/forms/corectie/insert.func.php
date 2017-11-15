<?php 
      function insertInTableTipDocumentCorectieProduse($documentnume,
      $catalog_denumire, $catalog_items_id, $cantitati, $individual_item_ids, $document_item_ids, $explicatii) {
        $item_ids_evidenta_individuala = getIdsFromCatalogWithEvidentaIndividuala($catalog_denumire);
        include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
        try {
          $sql = "INSERT INTO $documentnume SET ";
          $sql .= 'ora = CURTIME(), ';
          
          for ($i = 0; $i < count($catalog_items_id); $i++) {
            $sqlx = '';
            $sqlx .= 'catalog_item_id = "' . $catalog_items_id[$i] . '", ';
            $sqlx .= 'cantitate = "' . $cantitati[$i] . '", ';
            $sqlx .= 'explicatie = "' . $explicatii[$i] . '", ';
            if ($document_item_ids == 0) {
              $sqlx .= 'document_item_id = 0, ';
            }
            else {
              $sqlx .= 'document_item_id = "' . $document_item_ids[$i] . '", ';
            }
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
           
            $sqlx .= 'catalog_denumire = "' . $catalog_denumire . '"'; 
            $sqlx = $sql . $sqlx;
  
            $s = $pdo->query($sqlx);
          }
        }
        catch(PDOException $e) {
            $error = 'la inserarea datelor de tip produs din formular in tabelul de tip corectie ' . $documentnume . $e;
            include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
            exit();
        }
      }
?>