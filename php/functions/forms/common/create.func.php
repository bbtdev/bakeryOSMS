<?php

    function createSelectOptionsTextProduse($categorie_produse, $produse, $catalog_denumire, $denumire_txt, $explicatii) {
      $clasa_wrp_all = 'wrp slct-hdn-list-prds';
      
      $clasa_wrp_slct = 'wrp slct-prds';
      $id_slct = 'slct-' . $categorie_produse;
      $denumire_slct = 'Selecteaza ' . $categorie_produse . ': ';
      $option_produse = $produse;
      
      $html_partI = '
        <div class = "' . $clasa_wrp_all . '">
          <div class = "' . $clasa_wrp_slct . '">
            <label for = "' . $id_slct . '">' . $denumire_slct .'</label>
            <select id = "' . $id_slct . '">';
  
      $html_partII = '';
      for ($i = 0; $i < count($option_produse); $i++) {
        $html_partII .= '<option data-denumire = "' . $option_produse[$i]['denumire'] . '"
                                  data-pret = "' . $option_produse[$i]['pret'] . '"
                                  data-um = "' . $option_produse[$i]['um'] . '" 
                                  data-catalogdenumire = "' . $catalog_denumire . '"
                                  value = "' . $option_produse[$i]['catalog_item_id'] . '">' . $option_produse[$i]['denumire'] . ' la ' . $option_produse[$i]['pret'] . 'lei pe ' . $option_produse[$i]['um'] . '</option>';
      }
  
      $id_txt = 'txt-' . $categorie_produse;
      $class_txt = 'txt-cantitate';
      $class_btn = 'btn slct-add-individual';
      $nume_btn = 'Adauga ' . $categorie_produse;
      
      $html_partIII = '</select>
      <label for = "'. $id_txt .'">'. $denumire_txt .'<input type = "text" value = "" id = "'. $id_txt .'" class = "'. $class_txt .'"></label>';
      if ($explicatii) {
        $html_partIII .= '<label for = "explicatie-select">Explicatie:<input type = "text" id = "explicatie-select" ></label>';
      }
      $html_partIII .= '<div class = "afisier eroare select"></div>
      <div class = "afisier info select"></div>
      <div><button type="button" class = "'. $class_btn .' disable-on-compile-ok">'. $nume_btn .'</div>
                 </div>
                 <div class = "afisier rezultate select"></div>
           </div>';
      
      echo $html_partI . $html_partII . $html_partIII;
    }

    function createInputsCheckboxTextProduse($produse, $catalog_denumire, $label_txt_q, $label_txt_q_d, $start, $explicatie, $operatiune) {
      echo '<div class = "wrp lista-ctg-prd">';
      /*
      $name_chkbx_main = $catalog_denumire . '_ids[]';
      $name_txt_q = $catalog_denumire . '_cantitati[]';
      $name_txt_explicatii = $catalog_denumire . '_explicatii[]';
      
      $label_chkbx_main = ($i + $start) . '. ' . $produse[$i]['denumire'] . ' la ' . $produse[$i]['pret'] . 'lei pe ' . $produse[$i]['um'];
      $val_chkbx_main = $produse[$i]['catalog_item_id'];
      $id_txt_q = $id_chkbx_main . '_' . 'cantitate';
      
      */
  
      for ($i = 0; $i < count($produse); $i++) {
        if (isset($produse[$i]['individual_item_id'])) {
          $individual_item_ids = $produse[$i]['individual_item_id'];
        }
        else {
          $individual_item_ids = 0;
        }
        
        $val_txt_q = '';

  
        if (isset($produse[$i]['cantitate'])) {
          $cantitate_disponibila = $produse[$i]['cantitate'];
        }
        else {
          $cantitate_disponibila = -1;
        }

        if (isset($produse[$i]['document_item_id'])) {
          $val_inpth_doc_itm_id = $produse[$i]['document_item_id'];

        }
        else {
          $val_inpth_doc_itm_id = 0;
        }
        
        $label_chkbx_main = ($i + $start) . '. ' . $produse[$i]['denumire'] . ' la ' . $produse[$i]['pret'] . 'lei pe ' . $produse[$i]['um'];
        $data_um =  $produse[$i]['um'];
        
        echo createInputCheckboxTextProduse($catalog_denumire, $produse[$i]['catalog_item_id'], $label_txt_q, $label_txt_q_d, $val_txt_q, $cantitate_disponibila, $val_inpth_doc_itm_id, $individual_item_ids, $explicatie, $label_chkbx_main, $data_um, $operatiune);
      }
  
      echo '</div>';
      return $i + $start;
    }

    function createInputCheckboxTextProduse($catalog_denumire, $catalog_item_id, $label_txt_q, $label_txt_q_d, $val_txt_q, $cantitate_disponibila, $val_inpth_doc_itm_id, $individual_item_ids, $explicatie, $label_chkbx_main, $data_um, $operatiune) {   
      $html =
        '<div class = "wrp chkbx-txt-prds">
          <div class = "wrp chkbx-prds">
            <label for = "' . $catalog_denumire . '_' . $individual_item_ids . '_' . $catalog_item_id . '">
              <input type = "checkbox" id = "' . $catalog_denumire . '_' . $individual_item_ids . '_' . $catalog_item_id . '" class = "chkbx-prds"
               name = "' .  $catalog_denumire . '_ids[]' . '" value = "' .  $catalog_item_id .'">
            ' .  $label_chkbx_main .'</label>
          </div>
          <div class = "wrp txt-prds">
            <label for = "' .  $catalog_denumire . '_' . $individual_item_ids . '_' . $catalog_item_id . '_cantitate' . '">' .  $label_txt_q .'
              <input type = "text" id = "' .  $catalog_denumire . '_' . $individual_item_ids . '_' . $catalog_item_id . '_cantitate' . '" name = "' . $catalog_denumire . '_cantitati[]' .'"
              value = "' . $val_txt_q . '" class = "txt-cantitate" data-cantitate-disponibila = "' . $cantitate_disponibila . '" data-um = "' . $data_um . '" data-operatiune = "' . $operatiune . '">
            </label>';

      if ($explicatie) {
        $html .= '<div><label for = "' . $catalog_denumire . '_' . $individual_item_ids . '_' . $catalog_item_id  . '_explicatie">Explicatii<input type = "text" id = "' . $catalog_denumire . '_' . $individual_item_ids . '_' . $catalog_item_id  . '_explicatie" name = "' . $catalog_denumire . '_explicatii[]' . '"></label></div>';
      }
      $html .= '</div>';

      $html .= '<input type = "hidden" name = "' . $catalog_denumire . '_individual_item_ids[]" value = "' . $individual_item_ids . '">';
  
      if ($val_inpth_doc_itm_id) {
        $html .= '<input type = "hidden" name = "' . $catalog_denumire . '_document_item_ids[]" value = "' . $val_inpth_doc_itm_id . '">';
      }

      if ($cantitate_disponibila != -1) {
        $html .= '<p class = "afisier do-not-empty cantitate-disponibila">' . $label_txt_q_d . ' ' . $cantitate_disponibila . '</p>';
      }
       
        
      return $html . '<div class = "afisier info"></div><div class = "afisier eroare"></div></div>';
    }

?>