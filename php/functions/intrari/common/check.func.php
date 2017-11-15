<?php

  function checkIfTableExists($tabel_denumire) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
      $sql = 'SELECT COUNT(*) FROM ' . $tabel_denumire;
      $s = $pdo->query($sql);
    }
    catch(PDOException $e) {
      $error = 'la verificare daca tabelul ' . $tabel_denumire . 'exista!' .$e;
      include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
      exit();
    }
    $row = $s->fetch();
    if ($row[0]) {
      return TRUE;
    }
    else {
      return FALSE;
    }
  }

?>