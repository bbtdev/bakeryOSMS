<?php
    function getItemsFromDocumentAndCorectieIgnoreIndividual($document_denumire) {
      
      $produse_document = getItemsFromDocumentProduse($document_denumire);
      
      if (!(documentHasCorectieByIstoricId(getIstoricIdByDenumireDocument($document_denumire)))) {
        return $produse_document;
      }
      $produse_corectie = getItemsFromCorectieDocumentProduse('Corectie_' . $document_denumire);
  
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
?>