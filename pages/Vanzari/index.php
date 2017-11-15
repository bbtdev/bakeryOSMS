<?php 
  require_once $_SERVER['DOCUMENT_ROOT'] . '/php/functions/inc.func.php';
  require_once $_SERVER['DOCUMENT_ROOT'] . '/php/standards/access.inc.php';
        
  //check if the user is not logged in
  if (!userIsLoggedIn()) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/login.html.php';
    exit();
  }

  //check if the user has the correct role
  if ('Vanzari' != getUserDepartament($_SESSION['user'])) {
    $error = 'Nu ai acces la aceasta pagina,';
    include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/accessdenied.html.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/logout.html.php';
    exit();
  }

  if (!(userHasProgram($_SESSION['user']))) {
    $error = 'Nu ai acces la aceasta pagina, datorita programului';
    include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/accessdenied.html.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/logout.html.php';
    exit();
  }


  include_once 'main.html.php';

  include_once 'controllers/docsvitrina.php';
  include_once 'controllers/corectie.php';
  include_once 'controllers/vizualizare.php';
  include_once 'controllers/adaugaprodus.php';

  
?>