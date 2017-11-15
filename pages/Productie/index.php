<?php 
  require_once $_SERVER['DOCUMENT_ROOT'] . '/php/functions/inc.func.php';
  require_once $_SERVER['DOCUMENT_ROOT'] . '/php/standards/access.inc.php';
        
  //check if the user is not logged in
  if (!userIsLoggedIn()) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/login.html.php';
    exit();
  }

  //check if the user has to correct role
  if ('Productie' != getUserDepartament($_SESSION['user'])) {
    $error = 'Nu ai acces la aceasta pagina,';
    include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/accessdenied.html.php';
    exit();
  }

  if (!(userHasProgram($_SESSION['user']))) {
    $error = 'Nu ai acces la aceasta pagina, datorita programului';
    include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/accessdenied.html.php';
    exit();
  }

  include_once 'main.html.php';

  include_once 'controllers/docspatiuproductie.php';
  include_once 'controllers/vizualizarespatiuproductie.php';
  include_once 'controllers/corectiespatiuproductie.php';
  include_once 'controllers/adaugaprodus.php';
  
?>