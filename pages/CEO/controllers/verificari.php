<?php
  if (isset($_GET['ConfruntaInventar'])) {
    $data = $_POST['data'];
    if ($data == 'astazi') {
      $data = date("Y-m-d");
    }
    if (getDenumireInventarInitialDataLocatie($data, 'Selgros_Iasi')) {
      $data_ieri = $tomorrow = date('Y-m-d',strtotime($data . "-1 days"));
      if (getDenumireInventarInitialDataLocatie($data_ieri, 'Selgros_Iasi')) {
        $items_ieri = getStocVitrinaJoinCatalogByDataLocatie($data_ieri, 'Selgros_Iasi');
        $inventar_initial_denumire =  getDenumireInventarInitialDataLocatie($data, 'Selgros_Iasi');
        $items_inventar_initial_astazi = getItemsJoinCatalogForItemList(getItemsFromDocumentAndCorectie($inventar_initial_denumire));
        $items_list =  getDiferenteIgnoreIndividualityForTwoItemLists(getItemListWithIndividualItemsColectified($items_inventar_initial_astazi), getItemListWithIndividualItemsColectified($items_ieri));
        echo "<h3>Diferenta dintre inventarul initial din data $data si stocul din data de $data_ieri</h3>";
        $diferente = 0;
        foreach ($items_list as $produs) {
          if ($produs['cantitate']) {
            $diferente = 1;
            echo '<p>' . $produs['denumire'] . ' la ' . $produs['pret'] . ' pe ' . $produs['um'] .  ', Difernta de cantitate: ' . $produs['cantitate'] . '</p>';
          }
        }
        if ($diferente == 0) {
          echo '<p>Nu exista diferente</p>';
        }
        echo "<h3>Inventarul initial din data $data</h3>";
        foreach ($items_inventar_initial_astazi as $produs) {
          if ($produs['cantitate']) {
            echo '<p>' . $produs['denumire'] . ' la ' . $produs['pret'] . ' pe ' . $produs['um'] .  ', Difernta de cantitate: ' . $produs['cantitate'] . '</p>';
          }
        }
        echo "<h3>Stocul din data de $data_ieri</h3>";
        foreach ($items_ieri as $produs) {
          if ($produs['cantitate']) {
            echo '<p>' . $produs['denumire'] . ' la ' . $produs['pret'] . ' pe ' . $produs['um'] .  ', Difernta de cantitate: ' . $produs['cantitate'] . '</p>';
          }
        }
      }
      else {
        $error = 'Nu exista inventar initial pentru ziua de ieri';
        include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
        exit();
      }
    }
    else {
      $error = 'Nu exista inventar initial pentru astazi';
      include $_SERVER['DOCUMENT_ROOT'] . '/php/sections/error.html.php';
      exit();
    }
  }
  if (isset($_GET['ConfruntaInventare'])) {
    $date = getDataWhereInventarInitialFromIstoricByLocatie('Selgros_Iasi');
    for ($i=1; $i < count($date) ; $i++) {
      if ($date[$i][0] == date('Y-m-d', strtotime($date[$i - 1][0] . "+1 days")) ) {
        echo '<form action="?ConfruntaInventar" method = "post">
        <input type="hidden" name = "data" value="' . $date[$i][0] . '"/>
        <input type="submit" value="Inventar ' . $date[$i][0] . '">
      </form>';
      }
    }
  }
  if (isset($_GET['ConfruntaMarfaTransport'])) {
    $data = $_POST['data'];
    if ($data == 'astazi') {
      $data = date("Y-m-d");
    }
    if (!(getDenumireDocumentUnicDinIstoricDupaDataLocatieDocumentId(9, $data, 'Laborator_Tudor_Neculai'))) {
      echo '<p>Nu se poate confrunta marfa transportata, din cauza lipsei documentului de expediere</p>';
      exit();
    }
    else if (!(getDenumireDocumentUnicDinIstoricDupaDataLocatieDocumentId(2, $data, 'Selgros_Iasi'))) {
      echo '<p>Nu se poate confrunta marfa transportata, din cauza lipsei documentului de receptionare</p>';
      exit();
    }
    $items_exp = getItemsJoinCatalogForItemList(getItemsFromDocumentAndCorectie(getDenumireDocumentUnicDinIstoricDupaDataLocatieDocumentId(9, $data, 'Laborator_Tudor_Neculai')));
    $items_rec = getItemsJoinCatalogForItemList(getItemsFromDocumentAndCorectie(getDenumireDocumentUnicDinIstoricDupaDataLocatieDocumentId(2, $data, 'Selgros_Iasi')));
    $items_list =  getDiferenteIgnoreIndividualityForTwoItemLists(getItemListWithNoDuplicates($items_exp), getItemListWithNoDuplicates($items_rec));
    echo "<h3>Diferenta dintre marfa expediata si marfa receptionata</h3>";
    $diferente = 0;
    foreach ($items_list as $produs) {
      if ($produs['cantitate']) {
        $diferente = 1;
        echo '<p>' . $produs['denumire'] . ' la ' . $produs['pret'] . ' pe ' . $produs['um'] .  ', Difernta de cantitate: ' . $produs['cantitate'] . '</p>';
      }
    }
    if ($diferente == 0) {
      echo '<p>Nu exista diferente</p>';
    }
    echo "<h3>Marfa Expediata</h3>";
    foreach ($items_exp as $produs) {
      if ($produs['cantitate']) {
        echo '<p>' . $produs['denumire'] . ' la ' . $produs['pret'] . ' pe ' . $produs['um'] .  ', Difernta de cantitate: ' . $produs['cantitate'] . '</p>';
      }
    }
    echo "<h3>Marfa Receptionata</h3>";
    foreach ($items_rec as $produs) {
      if ($produs['cantitate']) {
        echo '<p>' . $produs['denumire'] . ' la ' . $produs['pret'] . ' pe ' . $produs['um'] .  ', Difernta de cantitate: ' . $produs['cantitate'] . '</p>';
      }
    }
  
  }
  if (isset($_GET['ConfruntaMarfuriTransportate'])) {
    $date_rec = getDataWhereReceptieMarfaFromIstoricByLocatie('Selgros_Iasi');
    $date_exp = getDataWhereExpediereMarfaFromIstoricByLocatie('Laborator_Tudor_Neculai');
      foreach ($date_rec as $data_rec) {
        if (in_array($data_rec, $date_exp)) {
          echo '<form action="?ConfruntaMarfaTransport" method = "post">
          <input type="hidden" name = "data" value="' . $data_rec . '"/>
          <input type="submit" value="Marfa Transportata ' . $data_rec . '">
        </form>';
        }
      }
  }
?>