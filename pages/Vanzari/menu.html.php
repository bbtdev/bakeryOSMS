<?php $inventare_numar = countDocumentAstaziByDocumentId(1); ?>
  
<?php  if ($inventare_numar == 0): ?>
  <li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Adauga Inventar<span class="caret"></span></a>
    <ul class="dropdown-menu">
        <li>
          <a href="?prelucrareListaDeInventariere">Adauga Inventar Initial</a>
        </li>
    </ul>
  </li>
<?php endif; ?>

<?php  if ($inventare_numar == 1): ?>
  <li>
  <a href="?prelucrareNotaDeReceptie">Receptie Marfa</a>
  </li>
<?php endif; ?>

  <li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Vizualizeaza<span class="caret"></span></a>
    <ul class="dropdown-menu">
      <?php
        if ($inventare_numar == 1) {
          $documente_introduse_astazi_aici = getDenumireDocumenteFromIstoricAstaziLocatieByGestiune('vitrina');
          foreach($documente_introduse_astazi_aici as $document_introdus_astazi_aici) {
            $html = '<li><form method = "Post" action = "?VizualizareDocument">
            <input type = "hidden" name = "document_denumire" value = "' . $document_introdus_astazi_aici . '" >
            <input type = "submit" name = "" value="' . $document_introdus_astazi_aici . '">
            </form></li>';
            echo $html;
          }
        }
      ?>
      <li>
      <a href="?VizualizareCataloage">Vizualizeaza Cataloage</a>
      </li>
      <li>
      <a href="?VizualizareStoc">Vizualizeaza Stocul</a>
      </li>
    </ul>
  </li>

<?php  if ($inventare_numar == 1): ?>
<li class="dropdown">
  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Procese Verbale<span class="caret"></span></a>
  <ul class="dropdown-menu">
      <li>
        <a href="?prelucrarePVDeteriorare">Deteriorare</a>
      </li>
      <li>
        <a href="?prelucrarePVProtocol">Protocol</a>
      </li>
      <li>
        <a href="?prelucrarePVModificarePret">Modificare Pret</a>
      </li>
  </ul>
</li>
<?php endif; ?>

<?php  if ($inventare_numar == 1): ?>
  <li>
  <a href="?prelucrareRaportVanzare">Raporteaza Vanzare</a>
  </li>
<?php endif; ?>
