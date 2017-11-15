<?php

  /* locatie doc get */

  function getDenumiriTabeleDocumentAstaziByCircuitGestiuneLocatie($circuit, $gestiune) {
    $locatie = getUserLocatie($_SESSION['user']);
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
        $sql = 'SELECT denumire FROM istoric
        INNER JOIN document ON istoric.document_id = document.id
        WHERE data = CURDATE() AND locatie = :locatie AND document.gestiune = :gestiune AND document.circuit = :circuit';
        $s = $pdo->prepare($sql);
        $s->bindValue(':locatie', $locatie);
        $s->bindValue(':gestiune', $gestiune);
        $s->bindValue(':circuit', $circuit);
        $s->execute();
    }
    catch(PDOException $e) {
        $error = 'la obtinerea denumirii tabelelor tip document astazi by circuit gestiune locatie' . $e;
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
    $documente_denumiri = array();
    foreach ($s as $row) {
      $documente_denumiri[] = $row[0];
    }
    return $documente_denumiri;
  }

  function getDenumireInventarInitialAstaziLocatie() {
    $locatie = getUserLocatie($_SESSION['user']);
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
        $sql = 'SELECT denumire FROM istoric
        WHERE document_id = 1 AND DATA = CURDATE() AND locatie = :locatie ORDER BY id DESC LIMIT 1';
        $s = $pdo->prepare($sql);
        $s->bindValue(':locatie', $locatie);
        $s->execute();
    }
    catch(PDOException $e) {
        $error = 'la obtinerea denumirii inventarului initial';
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
    $row = $s->fetch();
    return $row[0];
  }

  function getDenumireDocumenteFromIstoricAstaziLocatieByGestiune($gestiune) {
    $locatie = getUserLocatie($_SESSION['user']);
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
        $sql = 'SELECT denumire FROM istoric
        INNER JOIN document ON istoric.document_id = document.id
        WHERE data = CURDATE() AND locatie = :locatie AND document.gestiune = :gestiune';
        $s = $pdo->prepare($sql);
        $s->bindValue(':locatie', $locatie);
        $s->bindValue(':gestiune', $gestiune);
        $s->execute();
    }
    catch(PDOException $e) {
        $error = 'la obtinerea denumire documente astazi';
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
    $documente_denumiri = array();
    foreach ($s as $row) {
      $documente_denumiri[] = $row[0];
    }
    return  $documente_denumiri;
  }

  function getNumarDocumenteFromIstoricAstaziLocatieByGestiune($gestiune) {
    $locatie = getUserLocatie($_SESSION['user']);
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
        $sql = 'SELECT count(*) FROM istoric
        INNER JOIN document ON istoric.document_id = document.id
        WHERE data = CURDATE() AND locatie = :locatie AND document.gestiune = :gestiune';
        $s = $pdo->prepare($sql);
        $s->bindValue(':locatie', $locatie);
        $s->bindValue(':gestiune', $gestiune);
        $s->execute();
    }
    catch(PDOException $e) {
        $error = 'la obtinerea denumire documente astazi';
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
    $row = $s->fetch();
    return $row[0];
  }

  function getIstoricIdByDocumentId($documentid) {
    $locatie = getUserLocatie($_SESSION['user']);
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
        $sql = 'SELECT id FROM istoric
        WHERE document_id = :documentid AND
        data = CURDATE() AND locatie = :locatie ORDER BY id DESC LIMIT 1';
        $s = $pdo->prepare($sql);
        $s->bindValue(':documentid', $documentid);
        $s->bindValue(':locatie', $locatie);
        $s->execute();
    }
    catch(PDOException $e) {
        $error = 'la obtinerea id din istoric al documentului dupa document id' .$e;
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
    $row = $s->fetch();
    return $row[0];
  }

  function getNextDocumentNumar($documentid, $documentnumerotare) {
    $locatie = getUserLocatie($_SESSION['user']);
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
        $sql = 'SELECT numar FROM istoric
        WHERE document_id = :documentid AND
        locatie = :locatie';
        if ($documentnumerotare == 'individuala') {
          $sql .= ' AND data = CURDATE()';
        }
        $sql .= ' ORDER BY numar DESC LIMIT 1';
        $s = $pdo->prepare($sql);
        $s->bindValue(':documentid', $documentid);
        $s->bindValue(':locatie', $locatie);
        $s->execute();
    }
    catch(PDOException $e) {
        $error = 'la obtinerea numarului de document dupa locatie ' .$e;
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
    $row = $s->fetch();
    return $row[0] + 1;
  }
  
?>