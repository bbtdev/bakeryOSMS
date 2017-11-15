<?php
  /* ceo user get */
  function getUseriByLocatie($locatie_id) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
        $sql = 'SELECT username FROM user
        INNER JOIN user_locatie ON user_locatie.user_id = user.id
        WHERE user_locatie.locatie_id = :locatie_id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':locatie_id', $locatie_id);
        $s->execute();
    }
    catch(PDOException $e) {
        $error = 'la obtinere userilor dupa locatie' .$e;
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
    $usernames = array();
    foreach ($s as $rows) {
      $usernames[] = $rows['username'];
    }
    return $usernames;
  }

  function getUserByLocatieProgramatiData($locatie_id, $data) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
        $sql = 'SELECT ' . $locatie_id .  ' FROM user_program
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
        $error = 'la obtinere userilor din program dupa data' .$e;
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
    $row = $s->fetch();
    return $row[0];
  }
?>