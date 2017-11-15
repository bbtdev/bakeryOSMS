<?php

  function checkIfProdusExistsInCatalog($catalog_denumire, $um, $categorie_denumire, $produs_denumire, $pret) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
      $sql = 'SELECT COUNT(*) FROM ' . $catalog_denumire . '
      WHERE  um = "' . $um . '" AND denumire = "' . $produs_denumire . '" AND pret = "' . $pret . '" AND categorie_denumire  = "' . $categorie_denumire . '"';
      $s = $pdo->query($sql);
    }
    catch(PDOException $e) {
      $error = 'la verificarea daca produsul exista deja in catalog' . $e;
      include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
      exit();
    }
    $rows = $s->fetch();
    return $rows[0];
  }
  
?>