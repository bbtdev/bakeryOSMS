<?php

  function insertDataInProgram($data) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
        $sql = 'INSERT INTO user_program SET data = ';
        if ($data == 'maine') {
          $sql .= 'CURDATE() + INTERVAL 1 DAY';
        }
        else if ($data == 'astazi') {
          $sql .= 'CURDATE()';
        }
        else {
          $error = 'data nu este recunoscuta, la inserare data';
          include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
          exit();
        }
        $s = $pdo->query($sql);
    }
    catch(PDOException $e) {
        $error = 'la introducerea datei in program' . $e;
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
  }

  function insertUserInProgram($locatie, $user, $data) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
        $sql = 'UPDATE user_program SET ' . $locatie . ' = "' . $user . '" WHERE data = ';
        if ($data == 'maine') {
          $sql .= 'CURDATE() + INTERVAL 1 DAY';
        }
        else if ($data == 'astazi') {
          $sql .= 'CURDATE()';
        }
        else {
          $error = 'data nu este recunoscuta, la inserare user';
          include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
          exit();
        }
        $s = $pdo->query($sql);
    }
    catch(PDOException $e) {
        $error = 'la introducerea userului in program' .$e;
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
  }

?>