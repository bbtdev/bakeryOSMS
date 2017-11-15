<?php
  $documente = getAllFromTableDocumentWithGestiune('vitrina');
  foreach ($documente as $document) {
    if (isset($_GET["prelucrare" . $document['action']])) {
      /* star - verificare situatie lista de inventar */
      $listainventar_count = countDocumentAstaziByDocumentId(1);
      if (!($listainventar_count) AND ($document['id'] != 1)) {
        $error = 'inainte de a adauga documente, este necesara existenta Listei de Inventar';
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
      }
      else if (($listainventar_count == 2) AND ($document['id'] != 5)) {
        $error = 'A fost efectuata inventariere finala, nu se mai adauga decat Raport Vanzare Post-Inventariere Finala';
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
      }
      /* end - verificare situatie lista de inventar */
      /* star - stabilire $form_tip, $tabel_denumire */
      $creare = 0;
      $document_count = countDocumentAstaziByDocumentId($document['id']);
      if (!($document_count)) {
        $creare = 1;
      }
      else {
        if (!($document['numar_limitat'])) {
        //nu exista limita la numarul de exemplare
        $creare = 1;
      }
      else if (($document_count == 1) AND ($document['numar_limitat'] == 1) AND ($document['deschis'])) {
        $form_tip = 'Inserare';
        $document_denumire  = getDenumireDocumentByIstoricId(getIstoricIdByDocumentId($document['id']));
      }
      else if ($document_count < $document['numar_limitat']) {
        $creare = 1;
      }
      else {
        $error = 'nu se mai poate insera in/adauga documentul de tip ' . $document['titlu'];
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
      }
      }
      if ($creare) {
        $form_tip = 'Creare';
        $document_numar = getNextDocumentNumar($document['id'], $document['numerotare']);
        $document_denumire = createNumeDocument($document);
      }

      /* end - stabilire $form_tip*/
      /* start - get intrari */
      $items = array();
      if ($document['sursa'] == 'catalog') {
        $label_txt_q_d = '';
        $operatiune = 'none';
        $items['produs_fabricat'] = getItemsFromCatalogForForm('produs_fabricat');
        if ($document['intrari'] == 'produse_comercializate') {
          $items['ambalaj'] = getItemsFromCatalogForForm('ambalaj');
        }
        $items = splitItemsForForm($items);
      }
      else if ($document['sursa'] == 'stoc') {
        $label_txt_q_d = 'Cantitatea in stoc:';
        $operatiune = 'scadere';
        $items['produs_fabricat'] =  getStocByCatalogJoinCatalog('produs_fabricat');
        if ($document['intrari'] == 'produse_comercializate') {
          $items['ambalaj'] = getStocByCatalogJoinCatalog('ambalaj');
        }
        $items = splitItemsForFormNoZeroQ($items);
      }
      /* end - get intrari */
      $form_afisare = 'split';
      include $_SERVER['DOCUMENT_ROOT'] . '/php/forms/standard.form.php';
      exit();
    }
    if (isset($_POST["Creare" . $document['action']])){
      if (isset($_POST['document_denumire'])) {
        $document_denumire = $_POST['document_denumire'];
      } 
      else {
        $error = 'nu a fost receptionat numele documentului';
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
      }
      if (($document['numerotare']) AND (isset($_POST['document_numar']))) {
        $document_numar = $_POST['document_numar'];
      } 
      else {
        $error = 'nu a fost receptionat numarul documentului';
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
      }
      $informatii = 0;
      if ($document['informatii']) {
        $informatii = $_POST['informatii'];
      }
      createTableTipDocument($document_denumire, $document['id']);
      insertInIstoricDocumentByLocatie($document['id'], $document_denumire, $document_numar, 0, $informatii);

      foreach (array('produs_fabricat', 'ambalaj') as $catalog_denumire) {
        if (isset($_POST[$catalog_denumire . '_ids'])) {
          $explicatii = 0;
          if (isset($_POST[$catalog_denumire . 'explicatii[]'])) {
            $explicatii = $_POST[$catalog_denumire . 'explicatii[]'];
          }
          if ($document['sursa'] == 'catalog') {
            insertInTableTipDocumentProduse($document_denumire, $document['id'], $catalog_denumire, $_POST[$catalog_denumire . '_ids'], $_POST[$catalog_denumire . '_cantitati'], 0, $explicatii);
           // insertInTableTipDocumentProduse($document_denumire, $document['id'], $catalog_denumire, $_POST[$catalog_denumire . '_ids'], $_POST[$catalog_denumire . '_cantitati'], 0, $explicatii);
          }
          else if ($document['sursa'] == 'stoc') {
            insertInTableTipDocumentProduse($document_denumire, $document['id'], $catalog_denumire, $_POST[$catalog_denumire . '_ids'], $_POST[$catalog_denumire . '_cantitati'], $_POST[$catalog_denumire . '_individual_item_ids'], $explicatii);
           // insertInTableTipDocumentProduse($document_denumire, $document['id'], $catalog_denumire, $_POST[$catalog_denumire . '_ids'], $_POST[$catalog_denumire . '_cantitati'], $_POST[$catalog_denumire . '_individual_item_ids'], $explicatii);
          }
          else {
            $error = 'nu a fost recunoscuta sursa documentului';
            include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
            exit();
          }
         
        }
      }
      header('Location: .');
      exit();
    }
    if (isset($_POST["Inserare" . $document['action']])){
      if (isset($_POST['document_denumire'])) {
        $document_denumire = $_POST['document_denumire'];
      } 
      else {
        $error = 'nu a fost receptionat numele documentului';
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
      }
      foreach (array('produs_fabricat', 'ambalaj') as $catalog_denumire) {
        if (isset($_POST[$catalog_denumire . '_ids'])) {
          $explicatii = 0;
          if (isset($_POST[$catalog_denumire . 'explicatii[]'])) {
            $explicatii = $_POST[$catalog_denumire . 'explicatii[]'];
          }
          if ($document['sursa'] == 'catalog') {
            insertInTableTipDocumentProduse($document_denumire, $document['id'], $catalog_denumire, $_POST[$catalog_denumire . '_ids'], $_POST[$catalog_denumire . '_cantitati'], 0, $explicatii);
           // insertInTableTipDocumentProduse($document_denumire, $document['id'], $catalog_denumire, $_POST[$catalog_denumire . '_ids'], $_POST[$catalog_denumire . '_cantitati'], 0, $explicatii);
          }
          else if ($document['sursa'] == 'stoc') {
            insertInTableTipDocumentProduse($document_denumire, $document['id'], $catalog_denumire, $_POST[$catalog_denumire . '_ids'], $_POST[$catalog_denumire . '_cantitati'], $_POST[$catalog_denumire . '_individual_item_ids'], $explicatii);
           // insertInTableTipDocumentProduse($document_denumire, $document['id'], $catalog_denumire, $_POST[$catalog_denumire . '_ids'], $_POST[$catalog_denumire . '_cantitati'], $_POST[$catalog_denumire . '_individual_item_ids'], $explicatii);
          }
          else {
            $error = 'nu a fost recunoscuta sursa documentului';
            include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
            exit();
          }
        }
      }
      header('Location: .');
      exit();
    }
  }
?>