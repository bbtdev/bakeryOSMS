<?php

  function createTableTipDocument($documentnume, $documentid) {
    $coloane = getColoaneDocument($documentid);
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
      $sql = "CREATE TABLE $documentnume (";
      foreach ($coloane as $coloananume => $coloana) {
        $sql .= "$coloananume $coloana,";
      }
      $sql .= 'id INT NOT NULL AUTO_INCREMENT PRIMARY KEY
      ) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB';
      $s = $pdo->query($sql);
    }
    catch(PDOException $e) {
      $error = 'la creare documentului ' . $documentnume . $e;
      include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
      exit();
    }
  }

?>