<?php
  if (isset($_GET["VizualizareDocumente"])) {
    if (isset($_POST['document_denumire'])) {
      $document_denumire = $_POST['document_denumire'];
    }
    else {
      $error = 'Nu a fost transmis numele documentului ce trebuie vizualizat';
      include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/accessdenied.html.php';
      exit();
    }
    $vizualizare = 'document';
    $vizualizare_mod_afisare =  getModAfisare($document_denumire);
    include $_SERVER['DOCUMENT_ROOT'] . '/php/forms/vizualizareceo.html.php';
  }
  if (isset($_GET["VizualizareCataloage"])) {
    $vizualizare = 'cataloage';
    include $_SERVER['DOCUMENT_ROOT'] . '/php/forms/vizualizare.html.php';
  }
  if (isset($_GET["VizualizareListaDataDocumente"])) {
    $locatie = $_GET["sursaDocumente"];
    $date = getDistinctDataDocumenteFromIstoricByLocatie($locatie);
    echo '<p><b>Selecteaza data din care care doresti sa vizualizezi documentele pentru locatia ' . $locatie . '</b></p>';
    foreach($date as $data) {
      $html = '';
      $html = '<form action = "?VizualizeazaListaDocumenteDupaDataSiLocatie" method="post"><input type = "hidden" name = "locatie" value = "' . $locatie . '" />
      <input type = "submit" name = "data" value = "' . $data[0] . '"/></form>';
      echo $html;
    }
  }
  if (isset($_GET["VizualizeazaListaDocumenteDupaDataSiLocatie"])) {
    $locatie = $_POST["locatie"];
    $data = $_POST["data"];
    $documente_denumiri =getDenumiriDocumenteExCorectieFromIstoricByLocatieAndData($locatie, $data);
    echo '<p><b>Selecteaza documentul pe care doresti sa-l vizualizezi pentru ' . $locatie . ' din data ' . $data . '</b></p>';
    foreach($documente_denumiri as $document_denumire) {
      $html = '';
      $html = '<form action = "?VizualizareDocumente" method="post"><input type = "submit" name = "document_denumire" value = "' . $document_denumire[0] . '"/></form>';
      echo $html;
    }
  }
  if (isset($_GET['VizualizareStocVitrina'])) {
    $vizualizare = 'stoc';
    include $_SERVER['DOCUMENT_ROOT'] . '/php/forms/vizualizareceo.html.php';
  }
?>