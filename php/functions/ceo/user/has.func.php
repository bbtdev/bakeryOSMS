<?php

  function hasProgramData($data) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
        $sql = 'SELECT COUNT(*) FROM user_program
        WHERE data = ';
        if ($data == 'maine') {
          $sql .= 'CURDATE() + INTERVAL 1 DAY';
        }
        else if ($data == 'astazi') {
          $sql .= 'CURDATE()';
        }
        else {
          $error = 'data nu este recunoscuta';
          include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
          exit();
        }
        $s = $pdo->query($sql);
    }
    catch(PDOException $e) {
        $error = 'la verificare existentei datei din program';
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
    $row = $s->fetch();
    return $row[0];
  }

?>