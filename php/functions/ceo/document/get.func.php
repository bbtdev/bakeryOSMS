<?php

  function getDistinctDataDocumenteFromIstoricByLocatie($locatie) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
        $sql = 'SELECT DISTINCT data FROM istoric
        WHERE locatie = :locatie ORDER BY data';
        $s = $pdo->prepare($sql);
        $s->bindValue(':locatie', $locatie);
        $s->execute();
    }
    catch(PDOException $e) {
        $error = 'la datelor distincte din istoric dupa locatie' .$e;
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
    $rows = $s->fetchAll();
    return $rows;
  }

  function getDenumiriDocumenteExCorectieFromIstoricByLocatieAndData($locatie, $data) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
        $sql = 'SELECT denumire FROM istoric
        WHERE locatie = :locatie AND data = :data AND document_id != 11 ORDER BY document_id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':locatie', $locatie);
        $s->bindValue(':data', $data);
        $s->execute();
    }
    catch(PDOException $e) {
        $error = 'la datelor distincte din istoric dupa locatie' .$e;
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
    $rows = $s->fetchAll();
    return $rows;
  }

  function getDenumireInventarInitialDataLocatie($data, $locatie) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
        $sql = 'SELECT denumire FROM istoric
        WHERE document_id = 1 AND DATA = :data AND locatie = :locatie ORDER BY id DESC LIMIT 1';
        $s = $pdo->prepare($sql);
        $s->bindValue(':locatie', $locatie);
        $s->bindValue(':data', $data);
        $s->execute();
    }
    catch(PDOException $e) {
        $error = 'la obtinerea denumirii inventarului initial dupa data si locatie';
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
    $row = $s->fetch();
    return $row[0];
  }

  function getDenumiriTabeleDocumentByDataCirGesLoc($data, $circuit, $gestiune, $locatie) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
        $sql = 'SELECT denumire FROM istoric
        INNER JOIN document ON istoric.document_id = document.id
        WHERE data = :data AND locatie = :locatie AND document.gestiune = :gestiune AND document.circuit = :circuit';
        $s = $pdo->prepare($sql);
        $s->bindValue(':data', $data);
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

  function getDataWhereInventarInitialFromIstoricByLocatie($locatie) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
        $sql = 'SELECT DISTINCT data FROM istoric
        WHERE locatie = :locatie AND document_id = 1 ORDER BY data';
        $s = $pdo->prepare($sql);
        $s->bindValue(':locatie', $locatie);
        $s->execute();
    }
    catch(PDOException $e) {
        $error = 'la datelor din istoric unde exista inventar initial' .$e;
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
    $rows = $s->fetchAll();
    return $rows;
  }

  function getDataWhereReceptieMarfaFromIstoricByLocatie($locatie) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
        $sql = 'SELECT DISTINCT data FROM istoric
        WHERE locatie = :locatie AND document_id = 2 ORDER BY data';
        $s = $pdo->prepare($sql);
        $s->bindValue(':locatie', $locatie);
        $s->execute();
    }
    catch(PDOException $e) {
        $error = 'la datelor din istoric unde exista receptie marfa' .$e;
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
    $date = array();
    foreach ($s as $row) {
      $date[] = $row[0];
    }
    return $date;
  }

  function getDataWhereExpediereMarfaFromIstoricByLocatie($locatie) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
        $sql = 'SELECT DISTINCT data FROM istoric
        WHERE locatie = :locatie AND document_id = 9 ORDER BY data';
        $s = $pdo->prepare($sql);
        $s->bindValue(':locatie', $locatie);
        $s->execute();
    }
    catch(PDOException $e) {
        $error = 'la datelor din istoric unde exista expediere marfa' .$e;
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
    $date = array();
    foreach ($s as $row) {
      $date[] = $row[0];
    }
    return $date;
  }

  function getDenumireDocumentUnicDinIstoricDupaDataLocatieDocumentId($document_id, $data, $locatie) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
        $sql = 'SELECT denumire FROM istoric
        WHERE locatie = :locatie AND document_id = :document_id AND data = :data';
        $s = $pdo->prepare($sql);
        $s->bindValue(':locatie', $locatie);
        $s->bindValue(':document_id', $document_id);
        $s->bindValue(':data', $data);
        $s->execute();
    }
    catch(PDOException $e) {
        $error = 'la obtinerii denumirii document tabel dupa document_id, data, locatie' .$e;
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
    $row = $s->fetch();
    return $row[0];
  }
?>