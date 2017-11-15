<?php
  function checkConfruntareStocInventarPosibila($data) {
    if (getDenumireInventarInitialDataLocatie($data, 'Selgros_Iasi')) {
      $data_ieri = $tomorrow = date('Y-m-d',strtotime($data . "-1 days"));
      if (getDenumireInventarInitialDataLocatie($data_ieri, 'Selgros_Iasi')) {
        return 
      }
      else {
        return 0;
      }
    }
    else {
      return 0;
    }
  }
?>