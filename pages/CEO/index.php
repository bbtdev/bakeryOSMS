<?php 
  require_once $_SERVER['DOCUMENT_ROOT'] . '/php/functions/inc.func.php';
  require_once $_SERVER['DOCUMENT_ROOT'] . '/php/standards/access.inc.php';
        
  //check if the user is not logged in
  if (!userIsLoggedIn()) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/login.html.php';
    exit();
  }

  if (getUserRole($_SESSION['user'])) {
    if (getUserRole($_SESSION['user']) != 'ceo') {
      $error = 'Nu ai acces la aceasta pagina,';
      include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/accessdenied.html.php';
      exit();
    }
  }
  else {
    $error = 'Nu ai acces la aceasta pagina,';
    include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/accessdenied.html.php';
    exit();
  }

  include_once 'main.html.php';

  include_once 'controllers/programuser.php';
  include_once 'controllers/vizualizareceo.php';
  include_once 'controllers/verificari.php';
  include_once 'controllers/adaugaprodus.php';

?>