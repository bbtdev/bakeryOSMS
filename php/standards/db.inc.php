<?php
    try {
        $pdo = new PDO('mysql:hostname=	sql204.epizy.com;dbname=epiz_21049353_alcdb', 'epiz_21049353', 'jZ8v8iyvfdKB');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec('SET NAMES "utf8"');
    }
    catch(PDOException $e) {
        $error = 'Eroare la tentativa de conectare la baza de date,';
        include $_SERVER['DOCUMENT_ROOT'] . '/commonhtmlalc/error.html.php';
        exit();
    }
?>