<?php
  if (isset($_POST['adaugaProdus'])) {
      $catalog_denumire = $_POST['catalog_denumire'];
      $um = $_POST['um'];
      $categorie_denumire = $_POST['categorie_denumire'];
      $produs_denumire = $_POST['denumire'];
      $pret = $_POST['pret'];
      if (!$produs_denumire) {
        $error = 'trebuie completat campul produs denumire';
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
      }
      if (!$pret) {
        $error = 'trebuie completat campul produs pret';
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
      }
      $categorii_denumiri = getCategoriiCatalog($catalog_denumire);
      if (!in_array($categorie_denumire, $categorii_denumiri)) {
        $error = 'categoria selectata nu apartine de catalogul selectat';
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
      }
      if (checkIfProdusExistsInCatalog($catalog_denumire, $um, $categorie_denumire, $produs_denumire, $pret)) {
        $error = 'produsul exista deja';
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
      }
      insertProdusInCatalog($catalog_denumire, $um, $categorie_denumire, $produs_denumire, $pret);
      header('Location: .');
      exit();
  }
?>