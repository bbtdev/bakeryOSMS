<?php

  /* common form get */

  function getModAfisare($document_denumire) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
      $sql = 'SELECT deschis FROM document
      INNER JOIN istoric ON denumire = :denumire
      WHERE istoric.document_id = document.id';
      $s = $pdo->prepare($sql);
      $s->bindValue(':denumire', $document_denumire);
      $s->execute();
    }
    catch(PDOException $e) {
      $error = 'la campului deschis pentru documentul ' . $document_denumire;
      include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
      exit();
    }
    $row = $s->fetch();
    if ($row[0]) {
      return 'list';
    }
    else {
      return 'split';
    }
  }



?>