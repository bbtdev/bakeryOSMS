<?php
  if (isset($_GET["CorecteazaDocument"])) {
    if (isset($_POST['document_de_corectat_denumire'])) {
      $document_de_corectat_denumire = $_POST['document_de_corectat_denumire'];
    }
    else {
      $error = 'Nu a fost transmis numele documentului ce trebuie corectat';
      include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
      exit();
    }
    $document_de_corectat_istoric_id = getIstoricIdByDenumireDocument($document_de_corectat_denumire);
    $document_de_corectat_proprietati =  getRowDocumentByDocumentId(getDocumentIdByIstoricId($document_de_corectat_istoric_id));
    $corectie_denumire = 'Corectie_' . $document_de_corectat_denumire;

    $items = array();
    $allow_neg = 0;
    if (isset($_POST['sursa_items_corectie'])) {
      $tip_intrari =  getTipIntrariDocumentByDenumire($document_de_corectat_denumire);
      $sursa_items_corectie = $_POST['sursa_items_corectie'];
      if ($sursa_items_corectie == 'document') {
        $operatiune = 'adunare';
        $allow_neg = 1;
        $label_txt_for_txt_inputs = 'Cantitatea din document se va corecta cu:';
        $label_txt_q_d = 'Cantitatea din document:';
        $form_afisare = getModAfisare($document_de_corectat_denumire);
        if ($form_afisare == 'split') {
          $items['produs_fabricat'] = getItemsFromDocumentAndCorectieJoinCatalogForFormSplitPreparation($document_de_corectat_denumire, 'produs_fabricat');
          $items['ambalaj'] = getItemsFromDocumentAndCorectieJoinCatalogForFormSplitPreparation($document_de_corectat_denumire, 'ambalaj');
          $items = splitItemsForForm($items);
          
        }
        else if ($form_afisare == 'list') {
          $items = getItemsFromDocumentAndCorectieJoinCatalog($document_de_corectat_denumire);
        }
        else {
          $error = 'modul de afisare nu este cunoscut';
          include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
          exit();
        }
      }
      else {
        $error = 'sursa corectiei este necunoscuta';
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
      }
    }  
    else {
      $error = 'Nu a fost transmisa sursa corectiei';
      include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
      exit();
    }
    if (!documentHasCorectieByIstoricId($document_de_corectat_istoric_id)) {
      $form_tip = 'Creare';
    }
    else {
      $form_tip = 'Inserare';
    }
    //verifica integritatea stocului


    //verifica integritatea stocului end
    include $_SERVER['DOCUMENT_ROOT'] . '/php/forms/corectie.form.php';
    exit();
  }
  if (isset($_POST["CreareCorectie"])) {
    if ($_POST['corectie_denumire']) {
      $tabel_nume = $_POST['corectie_denumire'];
    }
    else {
      $error = 'nu a fost transmis numele corectiei pentru tabel';
      include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
      exit();
    }
    if ($_POST['document_de_corectat_istoric_id']) {
      $document_de_corectat_istoric_id = $_POST['document_de_corectat_istoric_id'];
    }
    else {
      $error = 'nu a fost transmis id-ul documentului de corectat';
      include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
      exit();
    }
    $informatii = 0;
    if( isset($_POST['informatii'])) {
      $informatii = $_POST['informatii'];
    }

    createTableTipDocument($tabel_nume, 11);
    insertInIstoricDocumentByLocatie(11, $tabel_nume, 1, $document_de_corectat_istoric_id, $informatii);

    if (isset($_POST['sursa_items_corectie'])) {
      $sursa_items_corectie = $_POST['sursa_items_corectie'];
    }
    else {
      $error = 'nu a fost transmisa sursa pentru produsele corectiei';
      include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
      exit();
    }

    if ($sursa_items_corectie == 'document') {
      foreach (array('produs_fabricat', 'ambalaj') as $catalog_denumire) {
        if (isset($_POST[$catalog_denumire . '_ids'])) {
          insertInTableTipDocumentCorectieProduse($tabel_nume, $catalog_denumire, $_POST[$catalog_denumire . '_ids'], $_POST[$catalog_denumire . '_cantitati'],
          0, $_POST[$catalog_denumire . '_document_item_ids'], $_POST[$catalog_denumire . '_explicatii']);
        }
      }
    }
    else {
      $error = 'sursa de corectie nu este recunoscuta';
      include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
      exit();
    }
    header('Location: .');
    exit();
  }
  if (isset($_POST["InserareCorectie"])) {
    if ($_POST['corectie_denumire']) {
      $tabel_nume = $_POST['corectie_denumire'];
    }
    else {
      $error = 'nu a fost transmis numele corectiei pentru tabel';
      include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
      exit();
    }
    if ($_POST['document_de_corectat_istoric_id']) {
      $document_de_corectat_istoric_id = $_POST['document_de_corectat_istoric_id'];
    }
    else {
      $error = 'nu a fost transmis id-ul documentului de corectat';
      include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
      exit();
    }
    if (isset($_POST['sursa_items_corectie'])) {
      $sursa_items_corectie = $_POST['sursa_items_corectie'];
      if ($sursa_items_corectie == 'document') {
        foreach (array('produs_fabricat', 'ambalaj') as $catalog_denumire) {
          if (isset($_POST[$catalog_denumire . '_ids'])) {
            insertInTableTipDocumentCorectieProduse($tabel_nume, $catalog_denumire, $_POST[$catalog_denumire . '_ids'], $_POST[$catalog_denumire . '_cantitati'],
            0, $_POST[$catalog_denumire . '_document_item_ids'], $_POST[$catalog_denumire . '_explicatii']);
          }
        }
      }
      else {
        $error = 'sursa de corectie nu este recunoscuta';
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
      }
    }
    else {
      $error = 'nu a fost transmisa sursa pentru produsele corectiei';
      include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
      exit();
    }
    header('Location: .');
    exit();
  }
?>