<?php
    function insertItemInEvidentaIndividuala($item_id, $item_catalog_denumire) {
      include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
      try {
        $sql = 'INSERT INTO item_evidenta_individuala SET catalog_denumire = "' . $item_catalog_denumire . '",
         catalog_item_id = ' . $item_id . ', data = CURDATE()';
        $s = $pdo->query($sql);
        $sql = 'SELECT LAST_INSERT_ID()';
        $s = $pdo->query($sql);
      }
      catch(PDOException $e) {
        $error = 'la inserarea in item_evidenta_individuala si returnare id-ului' . $e;
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
      }
      $row = $s->fetch();
      return $row[0];
    }
?>