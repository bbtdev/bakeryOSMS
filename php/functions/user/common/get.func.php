<?php

  /* common user get */

  function getUserRole($user) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
        $sql = 'SELECT role_id FROM user_role
        INNER JOIN user ON user_id = user.id
        WHERE username = :username';
        $s = $pdo->prepare($sql);
        $s->bindValue(':username',$user);
        $s->execute();
    }
    catch(PDOException $e) {
        $error = 'la verificare rol';
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
    $row = $s->fetch();
    return $row[0];
  }

  function getUserDepartament($user) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
        $sql = 'SELECT departament FROM role
        INNER JOIN user_role ON role_id = role.id
        INNER JOIN user ON user.id = user_role.user_id
        WHERE user.username = :username';
        $s = $pdo->prepare($sql);
        $s->bindValue(':username',$user);
        $s->execute();
    }
    catch(PDOException $e) {
        $error = 'la obtinere departament';
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
    $row = $s->fetch();
    return $row[0];
  }

  function getDepartamentProps($departament) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
        $sql = 'SELECT locatie_necesara, program_necesar FROM departament
        WHERE id = :departament';
        $s = $pdo->prepare($sql);
        $s->bindValue(':departament', $departament);
        $s->execute();
    }
    catch(PDOException $e) {
        $error = 'la obtinere proprietati departament';
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
    $row = $s->fetch();
    return $row;
  }

  function getUserLocatie($user) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
        $sql = 'SELECT locatie_id FROM user_locatie
        INNER JOIN user ON user.id = user_id
        WHERE user.username = :username';
        $s = $pdo->prepare($sql);
        $s->bindValue(':username',$user);
        $s->execute();
    }
    catch(PDOException $e) {
        $error = 'la obtinere locatie';
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
    $row = $s->fetch();
    return $row[0];
  }

  function getUserFromProgramAstaziByColumn($column) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
        $sql = 'SELECT '. $column . ' FROM user_program
        WHERE data = CURDATE()';
        $s = $pdo->query($sql);
    }
    catch(PDOException $e) {
        $error = 'la obtinere user din program dupa coloana';
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
    $row = $s->fetch();
    return $row[0];
  }

?>