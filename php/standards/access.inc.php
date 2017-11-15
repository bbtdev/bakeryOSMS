<?php
    function userIsLoggedIn() {
        //if user submited login
        if (isset($_POST['action']) AND ($_POST['action']=='Logare')) {
            //if fields are incomplete
            if ( (!isset($_POST['user']) OR ($_POST['user']=='')) 
            OR (!isset($_POST['password']) OR ($_POST['password']=='')) ) {
                $GLOBALS['loginError'] = 'Completeaza ambele campuri';
                return FALSE;
            }

            $password = md5($_POST['password'] . 'alcdb');

            //check to see if the user/password exit
            if (dataBaseContainsUser($_POST['user'], $password)) {
                session_start();
                $_SESSION['loggedIn'] = TRUE;
                $_SESSION['user'] = $_POST['user'];
                $_SESSION['password'] = $password;
                return TRUE;
            }
            else {
                session_start();
                unset($_SESSION['loggedIn']);
                unset($_SESSION['user']);
                unset($_SESSION['password']);
                $GLOBALS['loginError'] = 'Date de logare incorecte.';
                return FALSE;
            }
        }

        if (isset($_POST['action']) and $_POST['action'] == 'Delogare') {
            session_start();
            unset($_SESSION['loggedIn']);
            unset($_SESSION['user']);
            unset($_SESSION['password']);
            header('Location: /');
            exit();
        }

        if (isset($_GET['Delogare'])) {
          session_start();
          unset($_SESSION['loggedIn']);
          unset($_SESSION['user']);
          unset($_SESSION['password']);
          header('Location: /');
          exit();
      }

        session_start();
        if (isset($_SESSION['loggedIn'])) {
            return dataBaseContainsUser($_SESSION['user'], $_SESSION['password']);
        }
    }

    function dataBaseContainsUser($user, $password) {
        include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
        try {
            $sql = 'SELECT COUNT(*) FROM user WHERE
            username = :username AND password = :password';
            $s = $pdo->prepare($sql);
            $s->bindValue(':username', $user);
            $s->bindValue(':password', $password);
            $s->execute();
        }
        catch(PDOException $e) {
            $error = 'la verificare user/parola';
            include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
            exit();
        }
        $row = $s->fetch();


        if ($row[0] > 0) {
            return TRUE;
           
        }
        else {
            return FALSE;
        }

    }  
?>