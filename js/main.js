$(document).ready(function() {
    if ($('.formular-lista').length > 0) {
      //btns      
      var $btn_compileaza = $('.btn.compileaza-input');
      var $btn_editeaza = $('.btn.editeaza-input');
      var $btn_trimitere = $('.btn.trimite-input');

      var $chkbxs = $('.wrp.chkbx-prds');
      
      var $wrp_txt_chkbx = $('.wrp.txt-prds');
      var $txts_inps_chkbx = $('.chkbx-txt-prds.txt-cantitate');

      var clss_disable_on_compile_ok = 'disable-on-compile-ok';
      var clss_slct_dsbl_on_cmp_ok = '.' + clss_disable_on_compile_ok;
      var clss_slct_item_list = '.wrp.chkbx-txt-prds';
      var clss_item_list_checked = 'item-checked';
      var clss_slct_item_list_checked = '.' + clss_item_list_checked;
      var clss_allow_negative = 'intrari-negative';

      /* initial setup */
      setInitialState(clss_slct_dsbl_on_cmp_ok, clss_slct_item_list, clss_slct_item_list_checked, $btn_compileaza, $btn_editeaza, $btn_trimitere);
 
      //hide wrapper cantitate checkbox
      $wrp_txt_chkbx.addClass('disappear');
      //checkbox change
      setupChkbxChange('chkbx-prds', '_cantitate', clss_item_list_checked);
      //setup produse individuale
      setupdProduseIndividuale('.wrp.slct-hdn-list-prds',clss_allow_negative);
      //setup compilare
      setupCompilare($btn_compileaza, $btn_editeaza, $btn_trimitere,  '.afisier:not(.rezultate,.do-not-empty)' ,'.' + clss_allow_negative, clss_slct_item_list, clss_slct_item_list_checked, '.option.added', '.afisier.rezultate.general', '.afisier.erori.general', '.afisier.info', '.afisier.eroare', clss_slct_dsbl_on_cmp_ok);
      setupEditare(clss_slct_dsbl_on_cmp_ok, clss_slct_item_list, clss_slct_item_list_checked, $btn_compileaza, $btn_editeaza, $btn_trimitere, '.afisier.rezultate.general');
    }

    /*
    //lista standard de adaugat produse
    if ($('.adauga-lista-produse-standard').length === 1) {
        $('#fara-erori').addClass('ghost');
        var $btn_adauga_tort = $('.btn.adauga-selectie-tort-standard');
        var $selectie_torturi = $('#selectie-torturi-lista-standard');
        var $cantitate_selectie_tort = $('#cantitate-selectie-tort-standard');
        var $afisier_erori_torturi = $('.adauga-lista-produse-standard .afisier.eroare-cantitate-introdusa.torturi');
        var $afisier_torturi_selectate = $('.adauga-lista-produse-standard .afisier.torturi-selectate')

        $('.wrapper.cantitate-item-catalog').addClass('ghost');
        $('input.item-catalog.non-torturi').change(function() {
          console.log('test');
            $target = $('.wrapper.' + this.id + 'cantitate');
            if ($target.hasClass('ghost')) {
                $target.removeClass('ghost');
            }
            else {
                $target.addClass('ghost');
            }

        });


        //setup adaugare tort lista produse standard
        $btn_adauga_tort.on('click', function(e) {
            e.preventDefault();
            //sterge eventuale erori in afisier torturi
            $afisier_erori_torturi.empty();
            //preia cantitate introdusa
            var $cantitate_tort = $cantitate_selectie_tort.val();
            //verifica daca cantitatea introdusa este valida(convertibila in numar, pozitiva, > 0)
            var validare = validareStandardPlusEcuatie($cantitate_tort);
            var $selectie_torturi_acces = $('#selectie-torturi-lista-standard option:selected');
            if (validare === 1) {
                //tort_id, tort_text, tort_cantitate, tort_um, tort_pret, afisier, extra_info
                adaugaTortListaStandard($selectie_torturi.val(), $selectie_torturi_acces.text(),
                                        $cantitate_tort, $selectie_torturi_acces.attr('data-um'),
                                        $selectie_torturi_acces.attr('data-pret'), $afisier_torturi_selectate,'', 'ok-border');
                $cantitate_selectie_tort.val(0); //clear valore introdusa 
            }
            else if (validare === 'ecuatie') {
                var rezultat = eval($cantitate_tort);
                adaugaTortListaStandard($selectie_torturi.val(), $selectie_torturi_acces.text(),
                rezultat, $selectie_torturi_acces.attr('data-um'),
                $selectie_torturi_acces.attr('data-pret'), $afisier_torturi_selectate,'(Ecuatie detectata: ' + $cantitate_tort + ')', 'info-border');
                $cantitate_selectie_tort.val(0); //clear valore introdusa 
            }
            else {
                afiseazaEroare(validare, $afisier_erori_torturi, 'Nu se poate adauga tortul, cantitatea introdusa ');
            }   
        });

        //....
        var $btn_verificare = $('.btn.verifica-intrari-standard');
        var $btn_editeaza = $('.btn.editeaza-intrari-standard');
        var $btn_trimite = $('.btn.trimite-intrari-standard');
        //disable butoane editare, trimitere inainte de verificare
        $btn_editeaza.prop('disabled', 'true');
        $btn_trimite.prop('disabled', 'true');
        //verificare intrari
        $btn_verificare.on('click', function(e) {
            e.preventDefault();
            
            var $temp = 0;
            var $temp_info = 0;
            
            var $titlu_erori = $('<h3>');
            $titlu_erori.text('Erori');
            var $afisier_erori = $('.afisier.eroare-cantitate-introdusa.nontorturi');
            $afisier_erori.empty().append($titlu_erori);
            
            var $titlu_info = $('<h3>');
            $titlu_info.text('Informatii');
            var $afisier_info = $('.afisier.info-cantitate-introdusa.nontorturi');
            $afisier_info.empty().append($titlu_info);

            $('.miniafisier.info-cantitate-introdusa.nontorturi').empty();
            $('.miniafisier.eroare-cantitate-introdusa.nontorturi').empty();

            var checked_nontorturi = 0;

            $('.wrapper.item-catalog.non-torturi').removeClass('eroare-border');
            $('.wrapper.item-catalog.non-torturi').removeClass('info-border');
            $('.wrapper.item-catalog.non-torturi').removeClass('ok-border');

            $('input.item-catalog.non-torturi').each(function() {
                if (this.checked) {
                    checked_nontorturi++;
                    var $cantitate = $('#' + this.id + 'cantitate');
                    var cantitate = $cantitate.val();
                    var validare =  validareStandardPlusEcuatie(cantitate);

                    if (validare === 1) {
                        $('#' + this.id + 'megawrapper').addClass('ok-border');
                    }
                    else if (validare === 'ecuatie') {
                        var rezultat = eval(cantitate);

                        if (rezultat < 0){
                            $temp = $('<p>');
                            $temp.text($(this).parent().text() + ' ' + 'ecuatie cu rezultat negativ detectata: ' + cantitate + '=' + rezultat);
                            $afisier_erori.append($temp);
    
                            $('#' + this.id + 'megawrapper .miniafisier.eroare-cantitate-introdusa.nontorturi')
                            .text('Ecuatie cu rezultat negativ detectata ' + cantitate + '=' + rezultat);
    
                            $('#' + this.id + 'megawrapper').addClass('eroare-border');
                        }
                        else {
                            var ecuatie = cantitate;
                            $cantitate.val(rezultat);
                            $temp_info = $('<p>');
                            $temp_info.text('Ecuatie detectata la ' + $(this).parent().text() + ': ' + ecuatie + ' = ' + rezultat);   
                            $afisier_info.append($temp_info);
                            
                            $('#' + this.id + 'megawrapper .miniafisier.info-cantitate-introdusa.nontorturi')
                            .text('Ecuatie detectata: ' + ecuatie + ' = ' + rezultat);
    
                            $('#' + this.id + 'megawrapper').addClass('info-border');
                        }
                    }
                    else {
                        $temp = $('<p>');
                        $temp.text($(this).parent().text() + ' ' + validare);
                        $afisier_erori.append($temp);

                        $('#' + this.id + 'megawrapper .miniafisier.eroare-cantitate-introdusa.nontorturi')
                        .text('Eroare, cantitatea introdusa ' + validare);

                        $('#' + this.id + 'megawrapper').addClass('eroare-border');
                    }
                }
            });
            //DACA NU EXISTA SELECTII
            if ((checked_nontorturi === 0) && ($('input[name="torturi[]"]').length === 0)) {
                var $no_selection = $('<p>');
                $no_selection.text('Nu ai selectat nici un produs');
                $afisier_erori.append($no_selection);
            }
            else if ($temp === 0) {
                $('#fara-erori').removeClass('ghost');
                $afisier_erori.empty();
                //DISABLE VERIFICA
                $btn_verificare.prop('disabled', true);
                //ENABLE EDITARE Si TRIMITERE
                $btn_trimite.prop('disabled', false);
                $btn_editeaza.prop('disabled', false);
                //DISABLE ALL NON-TORTURI INPUTS
                inputReadOnlyDisableFilter($('.wrapper.item-catalog.non-torturi'), true);
                //DISABLE MODIFICARE LISTA TORTURI
                $('#selectie-torturi-lista-standard').prop('disabled', true);
                $('#cantitate-selectie-tort-standard').prop('disabled', true);
                $('.btn.adauga-selectie-tort-standard').prop('disabled', true);
                $('.btn.sterge-parinte').prop('disabled', true);
            }
            else {
                if (!$('#fara-erori').hasClass('ghost')) {
                    $('#fara-erori').addClass('ghost');
                }
            }
            if ($temp_info === 0) {
                $afisier_info.empty();
            }        
        });   
        //editare
        $btn_editeaza.on('click', function(e) {
            e.preventDefault();
            $('#fara-erori').addClass('ghost');
            //disable EDITARE Si TRIMITERE
            $btn_trimite.prop('disabled', true);
            $btn_editeaza.prop('disabled', true);
            //enable verificare
            $btn_verificare.prop('disabled', false);
            //enable all torturi-inputs
            inputReadOnlyDisableFilter($('.wrapper.item-catalog.non-torturi'), false);
            //enable MODIFICARE LISTA TORTURI
            $('#selectie-torturi-lista-standard').prop('disabled', false);
            $('#cantitate-selectie-tort-standard').prop('disabled', false);
            $('.btn.adauga-selectie-tort-standard').prop('disabled', false);
            $('.btn.sterge-parinte').prop('disabled', false);
        });
    } */
});

/*
$(document).ready(function() {

    disableStuff();
    displayStuff();
*/

 /*
    $('.cantitate-wrapper').addClass('hidden');
    $('.item-catalog-wrapper').addClass('item-catalog-clean-style');
*/
    /*
    $('.item-catalog-checkbox').change(function() {
        $this = $(this);
        $vecin = $this.parent().parent().next();
        if ($vecin.hasClass('hidden')) {
            $vecin.removeClass('hidden');
            $vecin.prev().removeClass('item-catalog-clean-style');
            $vecin.addClass('item-catalog-clean-style');
        }
        else {
            $vecin.addClass('hidden');
            $vecin.prev().addClass('item-catalog-clean-style');
        }
    
    });


    */
/*
});
*/