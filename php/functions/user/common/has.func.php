<?php

  /* common user has */

  function userHasProgram($user) {
    $departament = getUserDepartament($user);
    $departament_props = getDepartamentProps($departament);
    if ($departament_props['program_necesar']) {
      if ($departament_props['locatie_necesara']) {
        $locatie = getUserLocatie($user);
        if ($user == getUserFromProgramAstaziByColumn($locatie)) {
          return 1;
        }
        return 0;
      }
      else {
        if ($user == getUserFromProgramAstaziByColumn($departament)) {
          return 1;
        }
        return 0;
      }
    }
  }

  function userHasLocatie($user) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
      $sql = 'SELECT COUNT(locatie_id) FROM user_locatie
      INNER JOIN user ON user.id = user_id
      WHERE user.username = :username';
      $s = $pdo->prepare($sql);
      $s->bindValue(':username', $user);
      $s->execute();
    }
    catch(PDOException $e) {
        $error = 'la verificare daca userul are locatie';
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