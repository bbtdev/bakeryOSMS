<?php 
  if (isset($_GET['programUseri'])) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/forms/programuser.form.php';
    exit();
  }
  if (isset($_POST['addprogramUseri'])) {
    $data = $_POST['data'];
    if (!(hasProgramData($data))) {
      insertDataInProgram($data);
    }
    if ($_POST['user-selgros-iasi'] != 'nespecificat') {
      insertUserInProgram('Selgros_Iasi', $_POST['user-selgros-iasi'], $data);
    }
    else {
      insertUserInProgram('Selgros_Iasi', NULL, $data);
    }
    if ($_POST['user-tudor-neculai'] != 'nespecificat') {
      insertUserInProgram('Laborator_Tudor_Neculai', $_POST['user-tudor-neculai'], $data);
    }
    else {
      insertUserInProgram('Laborator_Tudor_Neculai', NULL, $data);
    }
    header('Location: .');
    exit();
  }
?>