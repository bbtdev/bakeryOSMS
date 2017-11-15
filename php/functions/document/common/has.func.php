<?php 

  /*common doc has*/

  function documentHasCorectieByIstoricId($istoricid) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
        $sql = 'SELECT COUNT(*) FROM istoric
        WHERE istoric_id_document_atasat = :id AND document_id = 11';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $istoricid);
        $s->execute();
    }
    catch(PDOException $e) {
        $error = 'la obtinerea denumirii documentului dupa id din istoric' .$e;
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
    $row = $s->fetch();
    if ($row[0]) {
      return TRUE;
    }
    return FALSE;
  }

?>