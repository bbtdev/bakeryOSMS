<?php

  function getAllFromTableOrder($tabelnume, $order_list) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/standards/db.inc.php';
    try {
      $sql = 'SELECT * FROM ' . $tabelnume;
      if (is_array($order_list)) {
        $sql = $sql . ' ORDER BY ' . $order_list[0];
        for ($i = 1; $i < count($order_list); $i++) {
          $sql .= ', ' . $order_list[$i];
        }
      }
      else if ($order_list) {
          $sql = $sql . ' ORDER BY ' . $order_list;
      }
        $s = $pdo->query($sql);
    }
    catch(PDOException $e) {
        $error = 'la obtinerea produselor fabricate din ' . $tabelnume . ' ordonate dupa lista';
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
    }
    $rows = $s->fetchAll();
    return $rows;
  }

  
?>