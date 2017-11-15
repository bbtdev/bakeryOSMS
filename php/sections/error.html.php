<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/php/standards/helpers.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Eroare</title>
    </head>
    <body>
        <h1>Eroare</h1>
        <p>
            <?php htmlout('Eroare: ' . $error . ', contactati administratorul.'); ?>
        </p>
    </body>
</html>