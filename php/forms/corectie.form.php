<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/php/standards/helpers.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Formular Corectie</title>
  </head>		
  <body>
    <div class = "formular-lista <?php if ($allow_neg) { echo 'intrari-negative';}?>">
      <h1><?php htmlout($form_tip . ' ' . $corectie_denumire);?></h1>
      <form action="?" method="post">
        <?php
          $class_wrp_highest = 'wrp ctg-prd';
          echo '<input type = "hidden" name = "corectie_denumire" value = "' . $corectie_denumire . '"/>';
          echo '<input type = "hidden" name = "document_de_corectat_istoric_id" value = "' . $document_de_corectat_istoric_id . '">';
          echo '<input type = "hidden" name = "sursa_items_corectie" value = "' . $sursa_items_corectie . '">';
          $start = 0;
          $document_coloane = getColoaneDocument($document_de_corectat_proprietati['id']);
          if ($form_afisare == 'split') {
            foreach ($items as $catalog_denumire => $item_group) {
              if (isset($item_group['comuna'])) {
                foreach (array('BUC', 'KG') as $um) {
                  if (isset($item_group['comuna'][$um])) {
                    echo '<div class = "'. $class_wrp_highest . '">';
                    echo '<h3>'.$catalog_denumire . ' la ' . $um . '</h3>';
                    $start = createInputsCheckboxTextProduse(
                    $item_group['comuna'][$um], $catalog_denumire, $label_txt_for_txt_inputs, $label_txt_q_d, $start, 1, $operatiune);
                    /*
                    foreach ($item_group['comuna'][$um] as $produs) {
                    print_r($produs['denumire'] . "<br/>");
                    }
                    */
                    echo '</div>';
                  }
                }
              }
              if (isset($item_group['separata'])) {
                $categorii_grupate_separat = getCategoriiGrupareOrder($catalog_denumire, 'separata', 'importanta');
                $categorii_evidenta_individuala = getCategoriiEvidentaOrder($catalog_denumire, 'individuala', 'importanta');
                foreach ($categorii_grupate_separat as $categorie_grupata_separat) {
                  foreach (array('BUC','KG') as $um) {
                    if (isset($item_group['separata'][$categorie_grupata_separat][$um])) {
                      echo '<div class = "'. $class_wrp_highest . '">';
                      echo '<h3>' . $categorie_grupata_separat . ' la ' . $um . '</h3>';
                      if ((in_array($categorie_grupata_separat, $categorii_evidenta_individuala)) AND ($sursa_items_corectie == 'catalog')) {
                        createSelectOptionsTextProduse(
                        $categorie_grupata_separat, $item_group['separata'][$categorie_grupata_separat][$um], 
                        $catalog_denumire, $label_txt_for_txt_inputs, 1);
                      }
                      else {
                        $start = createInputsCheckboxTextProduse(
                        $item_group['separata'][$categorie_grupata_separat][$um], $catalog_denumire, $label_txt_for_txt_inputs, $label_txt_q_d, $start, 1, $operatiune);
                      }
                      echo '</div>';
                    }
                  }
                }
              }
            }
          }
          if ($form_afisare == 'list') {
            echo '<div class = "wrp lista-ctg-prd">';
            $i = 0;
            foreach ($items as $item) {
              /* HACK FOR PRODUCTIE, NO INDIVIDUAL */
              if (isset($item['individual_item_id'])) {
                $hack_productie = $item['individual_item_id'];
              }
              else {
                $hack_productie = 0;
              }    
              /* end HACK FOR PRODUCTIE, NO INDIVIDUAL */
              echo createInputCheckboxTextProduse(
                $item['catalog_denumire'],
                $item['catalog_item_id'],
                $label_txt_for_txt_inputs,
                $label_txt_q_d,
                '',
                $item['cantitate'],
                $item['document_item_id'],
                $hack_productie,
                1,
                $i . '. ' . $item['denumire'] . ' la ' . $item['pret'] . 'lei pe ' . $item['um'],
                $item['um'],
                $operatiune
              );
              $i++;
            }
            echo '</div>';
          }
          if ($document_de_corectat_proprietati['informatii']) {
          $explicatie = '<h3>Infomatii</h3><textarea cols = "45" id = "informatii" name="informatii">' . getInformatiiByIstoricId($document_de_corectat_istoric_id) . '</textarea>';
          echo $explicatie;
          } 
        ?>
        <div class = "afisier erori general"></div>
        <div class = "afisier rezultate general"></div>
        <div class = "wrp btns-compileaza-editeaza margin-top-25px">
          <button class = "btn compileaza-input disable-on-compile-ok" type="button">Compileaza</button>
          <button class = "btn editeaza-input" type="button">Editeaza</button>
        </div>
        <div class = "wrp btn-trimite-input margin-top-10px">
          <input type = "submit" class = "btn trimite-input" name = "<?php htmlout($form_tip . 'Corectie');?>" value = "Trimite">
        </div>
      </form>
    </div>
  </body>
</html> 