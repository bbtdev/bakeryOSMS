<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/php/standards/helpers.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Formular</title>
  </head>		
  <body>
    <div class = "formular-lista">
      <h1><?php htmlout($form_tip . ' ' . $document_denumire);?></h1>
      <form action="?" method="post">
        <?php
          $label_txt_for_txt_inputs = getLabelCantitateByDocumentId($document['id']) . ':';
          $class_wrp_highest = 'wrp ctg-prd';
          echo '<input type = "hidden" name = "document_denumire" value = "' . $document_denumire. '"/>';
          if (isset($document_numar)) {
            echo '<input type = "hidden" name = "document_numar" value = "' . $document_numar. '"/>';
          }
          $start = 0;
          $document_coloane = getColoaneDocument($document['id']);
          $explicatii = 0;
          if (isset($document_coloane['explicatie'])) {
            $explicatii = 1;
          }
          if ($form_afisare == 'split') {
            foreach ($items as $catalog_denumire => $item_group) {
              if (isset($item_group['comuna'])) {
                foreach (array('BUC', 'KG') as $um) {
                  if (isset($item_group['comuna'][$um])) {
                    echo '<div class = "'. $class_wrp_highest . '">';
                    echo '<h3>'.$catalog_denumire . ' la ' . $um . '</h3>';
                    $start = createInputsCheckboxTextProduse(
                      $item_group['comuna'][$um], $catalog_denumire, $label_txt_for_txt_inputs, $label_txt_q_d, $start, $explicatii, $operatiune);
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
                      if ((in_array($categorie_grupata_separat, $categorii_evidenta_individuala)) AND ($document['sursa'] == 'catalog')) {
                        createSelectOptionsTextProduse(
                          $categorie_grupata_separat, $item_group['separata'][$categorie_grupata_separat][$um], 
                          $catalog_denumire, $label_txt_for_txt_inputs, $explicatii);
                      }
                      else {
                        $start = createInputsCheckboxTextProduse(
                          $item_group['separata'][$categorie_grupata_separat][$um], $catalog_denumire, $label_txt_for_txt_inputs, $label_txt_q_d, $start, $explicatii, $operatiune);
                      }
                      echo '</div>';
                    }
                  }
                }
              }
            }
          }
          if ($document['informatii']) {
            $informatii = '<h3>Infomatii</h3><textarea cols = "45" id = "informatii" name="informatii" placeholder = "Acest document necesita informatii"></textarea>';
            echo $informatii;
          } 
        ?>
        <div class = "afisier erori general"></div>
        <div class = "afisier rezultate general"></div>
        <div class = "wrp btns-compileaza-editeaza margin-top-25px">
          <button class = "btn compileaza-input disable-on-compile-ok" type="button">Compileaza</button>
          <button class = "btn editeaza-input" type="button">Editeaza</button>
        </div>
        <div class = "wrp btn-trimite-input margin-top-10px">
          <input type = "submit" class = "btn trimite-input" name = "<?php htmlout($form_tip . $document['action']);?>" value = "Trimite">
        </div>
      </form>
    </div>
  </body>
</html> 