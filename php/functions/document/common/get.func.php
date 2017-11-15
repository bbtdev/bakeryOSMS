<?php

  /* common doc get */

  function getLabelCantitateByDocumentId($document_id) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
        $sql = 'SELECT label_q_txt FROM document
        WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $document_id);
        $s->execute();
    }
    catch(PDOException $e) {
        $error = 'la obtinerea labelului pentru cantitate';
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
    $row = $s->fetch();
    return $row[0];
  }

  function getCircuitDocumentByDocumentId($document_id) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
        $sql = 'SELECT circuit FROM document
        WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $document_id);
        $s->execute();
    }
    catch(PDOException $e) {
        $error = 'la obtinerea circuitului documentului';
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
    $row = $s->fetch();
    return $row[0];
  }

  function getTipIntrariDocumentByDenumire($document_denumire) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
        $sql = 'SELECT document.intrari FROM istoric
        INNER JOIN document ON istoric.document_id = document.id
        WHERE istoric.denumire = :denumire';
        $s = $pdo->prepare($sql);
        $s->bindValue(':denumire', $document_denumire);
        $s->execute();
    }
    catch(PDOException $e) {
        $error = 'la obtinerea tipului de intrari documentului dupa denumirea documentului din istoric';
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
    $row = $s->fetch();
    return $row[0];
  }

  function getSursaDocumentByDenumire($document_denumire) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
        $sql = 'SELECT document.sursa FROM istoric
        INNER JOIN document ON istoric.document_id = document.id
        WHERE istoric.denumire = :denumire';
        $s = $pdo->prepare($sql);
        $s->bindValue(':denumire', $document_denumire);
        $s->execute();
    }
    catch(PDOException $e) {
        $error = 'la obtinerea sursei documentului dupa denumirea documentului din istoric';
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
    $row = $s->fetch();
    return $row[0];
  }

  function getRowDocumentByDocumentId($documentid) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
        $sql = 'SELECT * FROM document
        WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $documentid);
        $s->execute();
    }
    catch(PDOException $e) {
        $error = 'la obtinerea randului din document dupa document id';
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
    $row = $s->fetch();
    return $row;
  }
  
  function getDocumentIdByIstoricId($istoricid) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
        $sql = 'SELECT document_id FROM istoric
        WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $istoricid);
        $s->execute();
    }
    catch(PDOException $e) {
        $error = 'la obtinerea id din istoric al documentului dupa document id';
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
    $row = $s->fetch();
    return $row[0];
  }

  function getColoaneDocument($documentid) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
      $sql = 'SELECT * FROM document_coloane WHERE document_id = :documentid';
      $s = $pdo->prepare($sql);
      $s->bindValue(':documentid', $documentid);
      $s->execute();
    }
    catch(PDOException $e) {
        $error = 'la obtinerea coloanelor documentului cu id-ul ' . $documentid;
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
    $row = $s->fetch();
    $coloane = array();
    foreach ($row as $key=>$col) {
      if (!(is_int($key)) AND ($key != 'document_id') AND ($col)) {
        $coloane[$key] = $col;
      }
    }
    return $coloane;
  }

  function getAllFromTableDocumentWithGestiune($gestiune) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
        $sql = 'SELECT * FROM document
        WHERE  gestiune = :gestiune';
        $s = $pdo->prepare($sql);
        $s->bindValue(':gestiune', $gestiune);
        $s->execute();
    }
    catch(PDOException $e) {
        $error = 'la obtinerea datelor din tabelul document in functie de gestiune';
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
    $rows = $s->fetchAll();
    return $rows;
  }

  function getDenumireDocumentByIstoricId($istoricid) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
        $sql = 'SELECT denumire FROM istoric
        WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $istoricid);
        $s->execute();
    }
    catch(PDOException $e) {
        $error = 'la obtinerea denumirii documentului dupa id din istoric';
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
    $row = $s->fetch();
    return $row[0];
  }

  function getIstoricIdByDenumireDocument($document_denumire) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
        $sql = 'SELECT id FROM istoric
        WHERE denumire = :document_denumire';
        $s = $pdo->prepare($sql);
        $s->bindValue(':document_denumire', $document_denumire);
        $s->execute();
    }
    catch(PDOException $e) {
        $error = 'la obtinerea id-ului din istoric dupa denumirea documentului';
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
    $row = $s->fetch();
    return $row[0];
  }

  function getInformatiiFromDocumentByDenumire($document_denumire) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
        $sql = 'SELECT informatii FROM istoric
        WHERE denumire = :document_denumire';
        $s = $pdo->prepare($sql);
        $s->bindValue(':document_denumire', $document_denumire);
        $s->execute();
    }
    catch(PDOException $e) {
        $error = 'la obtinerea coloanei informatii pentru document din istoric dupa denumirea documentului';
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
    $row = $s->fetch();
    return $row[0];
  }

  function getInformatiiByIstoricId($istoricid) {
    if (documentHasCorectieByIstoricId($istoricid)) {
      return getInformatiiFromDocumentByDenumire('Corectie_' . getDenumireDocumentByIstoricId($istoricid));
    }
    else {
      return getInformatiiFromDocumentByDenumire(getDenumireDocumentByIstoricId($istoricid));
    }
  }

?>