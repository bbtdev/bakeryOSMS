<?php

  /* locatie doc count */

function countDocumentAstaziByDocumentId($documentid) {
  $locatie = getUserLocatie($_SESSION['user']);
  include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
  try {
      $sql = 'SELECT COUNT(*) FROM istoric
      WHERE document_id = :documentid AND
      data = CURDATE() AND
      locatie = :locatie';
      $s = $pdo->prepare($sql);
      $s->bindValue(':documentid', $documentid);
      $s->bindValue(':locatie',$locatie);
      $s->execute();
  }
  catch(PDOException $e) {
      $error = 'la obtinerea numarului de ' . $titlu . 'introduse';
      include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
      exit();
  }
  $row = $s->fetch();
  return $row[0];
}

?>