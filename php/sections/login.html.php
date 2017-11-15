<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/php/standards/helpers.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width = device-width, initial-scale = 1.0">
      <!-- Bootstrap -->
      <link href="../../css/bootstrap.css" rel="stylesheet">
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
        <script src = "https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src = "https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <title>Logare</title>
    </head>
    <body>
        <h1>Bakery Online Stockpile Management System<small><br/>Ecenta Demo</small></h1>
        <p>App v0.8b, for any information feel free to contact me anytime +40 748 808 654 (Bogdan)</p>
        <h2>Logare</h2>
        <?php if (isset($loginError)): ?>
                <p><?php htmlout($loginError); ?></p>
        <?php endif;?>

        <form action="" method="post">
            <div>
                <label for="user">User: 
                <input type="text" id="user" name="user"></label>
            </div>
            <div>
                <label for="password">Parola: 
                <input type="password" id="password" name="password"></label>
            </div>
            <div>
                <input type="hidden" name="action" value="Logare">
                <input type="submit" value="Logare">
            </div>
        </form>
    </body>
</html>