$.fn.directText = function() {
  var str = '';

  this.contents().each(function() {
      if (this.nodeType == 3) {
          str += this.textContent || this.innerText || '';
      }
  });

  return str;
};

function setupEditare(clss_slct_dsbl_on_cmp_ok, clss_slct_item_list, clss_slct_item_list_checked, $btn_compileaza, $btn_editeaza, $btn_trimitere, clss_slct_empty_these) {
  $btn_editeaza.on('click', function(e) {
    setInitialState(clss_slct_dsbl_on_cmp_ok, clss_slct_item_list, clss_slct_item_list_checked, $btn_compileaza, $btn_editeaza, $btn_trimitere, clss_slct_empty_these);
  });
}

function setInitialState(clss_slct_dsbl_on_cmp_ok, clss_slct_item_list, clss_slct_item_list_checked, $btn_cmp, $btn_ed, $btn_send, clss_slct_afisiere_to_empty) {
  $(clss_slct_dsbl_on_cmp_ok).prop('disabled', false);
  $(clss_slct_item_list).not(clss_slct_item_list_checked).find('input').prop('disabled', false);
  $(clss_slct_item_list + clss_slct_item_list_checked).find('input').prop("readonly", false);
  $btn_ed.prop('disabled', true);
  $btn_send.prop('disabled', true);
  $btn_cmp.prop('disabled', false);
  $(clss_slct_afisiere_to_empty).empty();

  //added
  $('.wrp.slct-prds input[type=text]').val('');
}

function setSecondState(clss_slct_dsbl_on_cmp_ok, clss_slct_item_list, clss_slct_item_list_checked, $btn_cmp, $btn_ed, $btn_send, clss_slct_afisiere_to_empty) {
  $(clss_slct_dsbl_on_cmp_ok).prop('disabled', true);
  $(clss_slct_item_list).not(clss_slct_item_list_checked).find('input').prop('disabled', true);
  $(clss_slct_item_list + clss_slct_item_list_checked).find('input').prop("readonly", true);
  $btn_ed.prop('disabled', false);
  $btn_send.prop('disabled', false);
  $btn_cmp.prop('disabled', true);

  //added
  $('.wrp.slct-prds input[type=text]').val('');
}

function setupCompilare($btn_compilare, $btn_edit, $btn_send, clss_slct_afisiere_to_empty,clss_slct_allow_neg, clss_slct_item_list, clss_slct_item_list_checked, clss_slct_added_item, clss_slct_afisier_rezultate_general, clss_slct_afisier_erori_general, clss_slct_afisier_info_item, clss_slct_afisier_eroare_item, clss_slct_dsbl_on_cmp_ok) {
  $btn_compilare.on('click', function(e) {
    e.preventDefault();
    
    setInitialState(clss_slct_dsbl_on_cmp_ok, clss_slct_item_list, clss_slct_item_list_checked, $btn_compilare, $btn_edit, $btn_send, clss_slct_afisiere_to_empty);

    var $afisier_general_rezultate = $(clss_slct_afisier_rezultate_general);

    var $afisier_general_erori = $(clss_slct_afisier_erori_general);

    var $checked_items_list = $(clss_slct_item_list + clss_slct_item_list_checked);
    var $option_added_items = $(clss_slct_added_item);
    //check to see if there are NO products added
    if (!($checked_items_list.length) && !($option_added_items.length)) {
      afiseaza('NU EXISTA PRODUSE ADAUGATE', $afisier_general_erori);
      return 0;
    }
    //check to see if informatii
    else if (($('#informatii').length) && (!$('#informatii').val())) {
      afiseaza('ACEST DOCUMENT NECESITA INFORMATII', $afisier_general_erori);
      return 0;
    }
    else {
      //check to see if there are any checked chkbxs from prds list
      if ($checked_items_list.length) {
        $checked_items_list.each(function() {
          var $input_cantitate = $($(this).find('input[type=text]')[0]);
          var valoare = validareInputTxt($(clss_slct_allow_neg).length, $input_cantitate, $(this).find(clss_slct_afisier_eroare_item), $(this).find(clss_slct_afisier_info_item));
          //sunt erori legate de cantitatea introdusa
          if (valoare === 0) {
            //preia textul din label si afisierul individual de eroare si adauga-l in afisierul general de erori
            //afiseaza($(this).directText() + 'aaa ' + $input_cantitate.val() + ' ' + $(this).find(clss_slct_afisier_eroare_item) + '.', $afisier_general_erori);
            afiseaza($($(this).find('label')[0]).text() + ' ' + $(this).find(clss_slct_afisier_eroare_item).text(), $afisier_general_erori);
          }
          //nu sunt erori legate de cantitatea introdusa
          else {
            //preia textul din label si cantitatea introdusa si adauga-l in afisierul general de rezultate
            if ($(this).find(clss_slct_afisier_info_item).children().length) {
              afiseaza($(this).text(), $afisier_general_rezultate);
            }
            else {
              var text = $(this).find('.wrp.chkbx-prds').text() + ', ' +  $($(this).find('label')[1]).text() + valoare;
              //afiseaza($(this).text() + ' ' + $input_cantitate.val(), $afisier_general_rezultate);
              afiseaza(text,$afisier_general_rezultate);
            }
          }
          //check for explicatie
          if ($(this).find('input[name$="_explicatii[]"]').length) {
            if(!($(this).find('input[name$="_explicatii[]"]').val())) {
              afiseaza('Trebuie oferita o explicatie',$(this).find(clss_slct_afisier_eroare_item));
              afiseaza($($(this).find('label')[0]).text() + ' ' + $(this).find(clss_slct_afisier_eroare_item).text(), $afisier_general_erori);
            }
          }
        });
        //check to see if explicatie
        if ($('#explicatie').length) {
          if (!($('#explicatie').val())) {
            afiseaza("Trebuie oferita o explicatie", $afisier_general_erori);
          }
        }
      }
      //check to see if there are any selected items added
      if ($option_added_items.length) {
        $option_added_items.each(function(e) {
          afiseaza($(this).directText(), $afisier_general_rezultate);
        });
      }
    }
    //daca exista erori
    if ($afisier_general_erori.children().length) {
      $afisier_general_erori.prepend('<h3>Nu se poate compila, exista erori</h3>');
      $afisier_general_rezultate.empty();
    }
    //nu exista erori
    else {
      setSecondState(clss_slct_dsbl_on_cmp_ok, clss_slct_item_list, clss_slct_item_list_checked, $btn_compilare, $btn_edit, $btn_send);
    }
  });
}
function setupdProduseIndividuale(wrp_class_selector, neg_class) {
  var $wrp = $(wrp_class_selector);
  $wrp.find('.btn.slct-add-individual').on('click', function(e) {
    e.preventDefault();
    var $wrp = $(this).parent().parent().parent();
    var $cantitate = $wrp.find('.txt-cantitate');
    var $afisier_eroare = $wrp.find('.afisier.eroare.select');
    var $afisier_info = $wrp.find('.afisier.info.select');
    $afisier_eroare.empty();
    var valoare = validareInputTxt($('.' + neg_class).length, $cantitate, $afisier_eroare, $afisier_info);
    var $explicatie = $wrp.find('#explicatie-select');
    if ($explicatie.length) {
      $explicatie = $explicatie.val();
      if ($explicatie === '') {
        afiseaza('Trebuie oferita o explicatie', $afisier_eroare);
        return 0;
      }
    }
    else {
      $explicatie = 0;
    }
    if (valoare !== 0) {
      createSelectResult($wrp.find('.afisier.rezultate.select'), $wrp.find('select option:selected'), $wrp.find('select'), valoare, $explicatie);
    }
  });
}

function setupChkbxChange(chkbx_class, txt_id_part, checked_class) {
  
  $('.'+ chkbx_class).on('click', function(e) {
    if ($(this).prop('readonly')) {
      e.preventDefault();
    }
  });
  $('.'+ chkbx_class).change(function() {
    var txt_id = this.id + txt_id_part;
    var $wrp_txt = $('#' + txt_id).parent().parent();
    var $wrp_chkbx_txt = $wrp_txt.parent();
    if ($wrp_txt.hasClass('disappear')) {
      $wrp_txt.removeClass('disappear');
      $wrp_chkbx_txt.addClass(checked_class);
    }
    else {
      $wrp_txt.addClass('disappear');
      $wrp_chkbx_txt.removeClass(checked_class);
    }
  });
}


function createSelectResult($afisier_rezultate, $selectie, $select, valoare, $explicatie) {
  var $div = $('<div>');
  $div.addClass('option added');
  $div.text($selectie.text() + ' cantitate: ' + valoare);

  var $input_id = $('<input type = "hidden" name = "' + $selectie.attr('data-catalogdenumire') + '_ids[]" value = "' + $selectie.val() + '"/>');
  var $input_txt = $('<input type = "hidden" name = "' + $selectie.attr('data-catalogdenumire') + '_cantitati[]" value = "' + valoare + '"/>');
  var $input_individual_id = $('<input type = "hidden" name = "' + $selectie.attr('data-catalogdenumire') + '_individual_item_ids[]" value = "0"/>');

  var $button = $('<button type = "button" class = "btn sterge-parent block disable-on-compile-ok">Sterge produs</button>');
  if ($explicatie) {
    var $input_exp = $('<input type = "hidden" name = "' + $selectie.attr('data-catalogdenumire') + '_explicatii[]" value = "' + $explicatie + '"/>')
    $div.text($div.text() + ' , Explicatie:' + $explicatie);
    $afisier_rezultate.append($div.append($input_id).append($input_txt).append($input_individual_id).append($input_exp).append($button));
    return 0;
  }

  $afisier_rezultate.append($div.append($input_id).append($input_txt).append($input_individual_id).append($button));
  buttonDeleteParent($button);
  
}

function buttonDeleteParent($button) {
  $button.on('click', function(e) {
    e.preventDefault();
    $(this).parent().remove();
  });
}

function validareInputTxt(allow_neg, $txt_input, $afisier_erori, $afisier_info) {
  var validate;
  var valoare;
  var rezultat;

  if (allow_neg) {
    validate = validare($txt_input.val());
  }
  else {
    validate = validareFaraNegativ($txt_input.val());
  }

  if (validate === 'ecuatie') {
    valoare = eval($txt_input.val());
    afiseaza('Ecuatie detectata: ' + $txt_input.val() + ' = ' + valoare, $afisier_info);
    rezultat = valoare;
  }
  else {
    if (validate === 1) {
      rezultat = $txt_input.val();
    }
    else {
      afiseaza('Eroare: ' + validate, $afisier_erori);
      return 0;
    }
  }

  if ($txt_input.attr('data-cantitate-disponibila')) {
    if ($txt_input.attr('data-operatiune') === 'scadere') {
      console.log($txt_input.attr('data-cantitate-disponibila') - rezultat);
      if ($txt_input.attr('data-cantitate-disponibila') - rezultat < 0) {
        afiseaza('Eroare: iesirea cantitatii din stoc rezulta un numar negativ: ' + ($txt_input.attr('data-cantitate-disponibila') - rezultat), $afisier_erori);
        return 0;
      }
    }
    else if ($txt_input.attr('data-operatiune') === 'adunare') {
      if (Number($txt_input.attr('data-cantitate-disponibila')) + Number(rezultat) < 0) {
        afiseaza('Eroare: iesirea cantitatii din stoc rezulta un numar negativ: ' + (Number($txt_input.attr('data-cantitate-disponibila')) + Number(rezultat)), $afisier_erori);
        return 0;
      }
    }
    else if ($txt_input.attr('data-operatiune') !== 'none') {
      afiseaza('Eroare: operatiunea nu este integrata, contacteaza administratorul', $afisier_erori);
      return 0;
    }
  }

  if ($txt_input.attr('data-um') === 'BUC') {
    if (!isInt(rezultat)) {
      afiseaza('Pentru produsele la BUC se asteapta un numar intreg', $afisier_erori);
      return 0;
    }
  }

  return rezultat;
}

function isInt(value) {
  var x;
  if (isNaN(value)) {
    return false;
  }
  x = parseFloat(value);
  return (x | 0) === x;
}

function afiseaza(mesaj, $afisier) {
  $afisier.append($('<p>').text(mesaj));
}

function validareFaraNegativ(val) {
  if (val.match(/((\+|-)|^)0[0-9]+/g)) {
      return 'este o ecuatie suspecta';
  }
  else if ((/^[0-9]+((\.[0-9]+)?(\+|-)[0-9]+(\.[0-9]+)?)+$/g).test(val)) {
    if (eval(val) <= 0) {
      return "rezultatul ecuatiei este mai mic sau egal 0"
    }
    else {
      return 'ecuatie';
    }
  }
  else if (isNaN(val)) {
      return "nu este un numar valid: " + val;
  }
  else if (val == 0) {
      return "este egala cu 0";
  }
  else if (val.startsWith('-')) {
      return "este un numar negativ " + val;
  }
  return 1;
}

function validare(val) {
  if (val.match(/((\+|-)|^)0[0-9]+/g)) {
      return 'este o ecuatie suspecta';
  }
  else if ((/^[0-9]+((\.[0-9]+)?(\+|-)[0-9]+(\.[0-9]+)?)+$/g).test(val)) {
    if (eval(val) === 0) {
      return "rezultatul ecuatiei este 0"
    }
    else {
      return 'ecuatie';
    }
  }
  else if (isNaN(val)) {
      return "nu este un numar valid: " + val;
  }
  else if (val == 0) {
      return "este egala cu 0";
  }
  return 1;
}
/*
function validareStandard(val) {
    if (isNaN(val)) {
        return "nu este un numar valid: " + val;
    }
    else if (val === '0') {
        return "este egala cu 0";
    }
    else if (val.startsWith('-')) {
        return "este un numar negativ " + val;
    }
    return 1;
}

function validareStandardPlusEcuatie(val) {
    if (val.match(/((\+|-)|^)0[0-9]+/g)) {
        return 'este o ecuatie suspecta';
    }
    else if ((/^[0-9]+((\.[0-9]+)?(\+|-)[0-9]+(\.[0-9]+)?)+$/g).test(val)) {
            return 'ecuatie';
    }
    else if (isNaN(val)) {
        return "nu este un numar valid: " + val;
    }
    else if (val == 0) {
        return "este egala cu 0";
    }
    else if (val.startsWith('-')) {
        return "este un numar negativ " + val;
    }
    return 1;
}

function  afiseazaEroare($mesaj, $afisier, $prefix) {
    $afisier.text($prefix + $mesaj);
}

function adaugaTortListaStandard(tort_id, tort_text, tort_cantitate, tort_um, tort_pret, afisier, extra_info, border_class) {
    var $input_id = $('<input>');
    $input_id.attr('type', 'hidden');
    $input_id.attr('value', tort_id);
    $input_id.attr('name', 'torturi[]');

    var $input_cantitate = $('<input>');
    $input_cantitate.attr('type', 'hidden');
    $input_cantitate.attr('value', tort_cantitate);
    $input_cantitate.attr('name', 'cantitatetorturi[]');

    var $text = $('<p>');
    $text.text(tort_text + '  Cantitate: ' + tort_cantitate + tort_um + extra_info + ' Valoare totala:' + tort_pret * tort_cantitate + 'lei.');

    var $button = $('<button>');
    $button.attr('type','button');
    $button.text('Sterge');
    $button.addClass('btn sterge-parinte');
    $button.on('click', function(e) {
        e.preventDefault();
        $(this).parent().remove();
    });

    var $wrapper_div = $('<div>');
    $wrapper_div.addClass('wrapper item-catalog torturi ' + border_class);
    $wrapper_div.append($text, $input_id, $input_cantitate, $button).appendTo(afisier);
}

function disableStuff($target) {
    $target.prop('disabled', 'true');
}

function enableStuff($target) {
    $target.prop('disabled', 'false');
}

function inputReadOnlyDisableFilter($parent, state) {
    $parent.each(function() {
        if ($(this).find('input').filter(':checked').length === 0) {
            $(this).find('input').prop('disabled', state);
        }
        else {
            var selected_checkbox = $(this).find('input').filter(':checked')[0];
            $(selected_checkbox).prop('readOnly', state);
            common_id = selected_checkbox.id;
            $('#' + common_id + 'cantitate').prop('readOnly', state);
        }
    });
}
*/

/*
function disableStuff() {
    $('.disabled').prop('disabled', 'true');
}

function displayStuff() {
    $('.anti-js-no-display').removeClass('anti-js-no-display');
}

function setupCreareListaProduseStandardActions() {

    $btn_verificare = $('#btn-verifica-intrari.creare-lista-produse-standard');
    $btn_editare = $('#btn-editeaza-intrari.creare-lista-produse-standard');
    $btn_trimitere = $('#btn-trimite-intrari.creare-lista-produse-standard');

    $btn_editare.on('click', function(e) {
        e.preventDefault();

        var $temp = 0;

        var $h3 = $('<h3>');
        $h3.text('Erori');
        $afisajerori = $('#erori-intrari.creare-lista-produse-standard');
        $afisajerori.empty().append($h3);
        
        $('.item-catalog-checkbox').each(function() {
            if (this.checked) {
                var $cantitate = $(this).parent().parent().next().children('label').children('.item-catalog-cantitate');
                if (isNaN($cantitate.val())) {
                    $temp = $('<p>');
                    $temp.text($(this).parent().text() + ' nu are la cantitate un numar valid: ' + $cantitate.val());
                    $afisajerori.append($temp);
                }
                else if ($cantitate.val() === '0') {
                    $temp = $('<p>');
                    $temp.text($(this).parent().text() + ' are cantitatea 0');
                    $afisajerori.append($temp);
                }
                else if ($cantitate.val().startsWith('-')) {
                    $temp = $('<p>');
                    $temp.text($(this).parent().text() + ' are cantitatea negativa: ' + $cantitate.val());
                    $afisajerori.append($temp);
                }
                
            }
        });

        if ($temp === 0) {
            $afisajerori.empty();
            $btn_trimitere.prop('disabled', false);
            $btn_editare.prop('disabled', false);
        }
    });
    
    $btn_editare.on('click', function(e) {
        e.preventDefault();
    });
}
*/