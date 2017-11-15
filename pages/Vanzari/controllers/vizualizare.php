<?php
  if (isset($_GET["VizualizareDocument"])) {
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
    include $_SERVER['DOCUMENT_ROOT'] . '/php/forms/vizualizare.html.php';
    exit();
  }
  if (isset($_GET["VizualizareCataloage"])) {
    $vizualizare = 'cataloage';
    include $_SERVER['DOCUMENT_ROOT'] . '/php/forms/vizualizare.html.php';
    exit();
  }
  if (isset($_GET['VizualizareStoc'])) {
    $vizualizare = 'stoc';
    include $_SERVER['DOCUMENT_ROOT'] . '/php/forms/vizualizare.html.php';
    exit();
  }
?>