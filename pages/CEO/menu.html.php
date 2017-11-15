<li>
  <a href="?VizualizareStocVitrina">Stoc Vitrina Acum</a>
</li>

<li class="dropdown">
  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Verifica<span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li>
      <form action="?ConfruntaInventar" method = "post">
        <input type="hidden" name = "data" value="astazi"/>
        <input type="submit" value="Inventar Vitrina Astazi">
      </form>
    </li>
    <li>
      <a href="?ConfruntaInventare">Inventar Vitrina Selectie</a>
    </li>
    <li>
      <form action="?ConfruntaMarfaTransport" method = "post">
        <input type="hidden" name = "data" value="astazi"/>
        <input type="submit" value="Marfa Transportata Astazi">
      </form>
    </li>
    <li>
      <a href="?ConfruntaMarfuriTransportate">Marfa Transportata Selectie</a>
    </li>
  </ul>
</li>

<li class="dropdown">
  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Documente<span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li>
      <form action="?" method = "get">
        <input type="hidden" name = "sursaDocumente" value = "Selgros_Iasi">
        <input type="submit" name = "VizualizareListaDataDocumente" value = "Selgros Iasi">
      </form>
    </li>
    <li>
      <form action="?" method = "get">
        <input type="hidden" name = "sursaDocumente" value = "Laborator_Tudor_Neculai">
        <input type="submit" name = "VizualizareListaDataDocumente" value = "Laborator Tudor Neculai">
      </form>
    </li>
  </ul>
</li>

<li>
  <a href="?VizualizareCataloage">Cataloage</a>
</li>

<li>
  <a href="?programUseri">Program Useri</a>
</li>