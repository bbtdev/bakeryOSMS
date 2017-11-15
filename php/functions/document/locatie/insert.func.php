<?php 
    
    /* locatie doc insert */

    function insertInIstoricDocumentByLocatie($document_id, $document_denumire, $document_numar, $istoric_id_document_atasat, $informatii) {
        $user = $_SESSION['user'];
        $locatie = getUserLocatie($user);
        $departament = getUserDepartament($user);

        include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
        try {
            $sql = "INSERT INTO istoric
            (document_id, denumire, numar, istoric_id_document_atasat, informatii, data, ora, username, departament, locatie)
            VALUES
            ('$document_id', '$document_denumire', '$document_numar', '$istoric_id_document_atasat', '$informatii', CURDATE(), CURTIME(), '$user' , '$departament', '$locatie')";
            $s = $pdo->query($sql);
        }
        catch(PDOException $e) {
            $error = 'la obtinerea id din istoric al documentului dupa document id' .$e;
            include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
            exit();
        }
    }
?>