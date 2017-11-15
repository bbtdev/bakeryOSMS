<li>
  <a href="?prelucrareRaExMarfa">Expediere Marfa</a>
</li>
<li>
  <a href="?prelucrareRaportProductie">Raport Productie</a>
</li>
<li>
  <a href="?prelucrareReceptieRetururi">Receptie Retururi</a>
</li>

<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Vizualizeaza<span class="caret"></span></a>
    <ul class="dropdown-menu">
      <?php
        if (getNumarDocumenteFromIstoricAstaziLocatieByGestiune('spatiu_productie')) {
          $documente_introduse_astazi_aici = getDenumireDocumenteFromIstoricAstaziLocatieByGestiune('spatiu_productie');
          foreach($documente_introduse_astazi_aici as $document_introdus_astazi_aici) {
            $html = '<li><form method = "Post" action = "?VizualizareDocument">
            <input type = "hidden" name = "document_denumire" value = "' . $document_introdus_astazi_aici . '" >
            <input type = "submit" name = "" value="' . $document_introdus_astazi_aici . '"></li>
            </form>';
            echo $html;
          }
        }
      ?>
      <li>
        <a href="?VizualizareCataloage">Vizualizeaza Cataloage</a>
      </li>
    </ul>
  </li>
