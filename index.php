<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/functions/inc.func.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/standards/access.inc.php';
    
    //check if the user is not logged in
    if (!userIsLoggedIn()) {
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/login.html.php';
        exit();
    }

    if (getUserRole($_SESSION['user'])) {
      if (getUserRole($_SESSION['user']) == 'ceo') {
        header("Location: ./pages/ceo/");
        exit();
      }
      else if (userHasProgram($_SESSION['user'])) {
        $departament = getUserDepartament($_SESSION['user']);
        header("Location: ./pages/$departament/");
        exit();
      }
      else {
        $error = 'nu ai acces astazi';
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/logout.html.php';
        exit();
      }
    }

    $error = 'nu exista pagina pentru userul tau';
    include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
    exit();
            
            
?>