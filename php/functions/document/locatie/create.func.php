<?php

  /* locatie doc create*/

    function createNumeDocument($document) {
      $document_nume = $document['action'];
      if ($document['numerotare']) {
        $document_nume .= '_Nr' . getNextDocumentNumar($document['id'], $document['numerotare']);
      }
      $document_nume .= '_' . date("Ymd") . '_' . getUserLocatie($_SESSION['user']);
      return $document_nume;
    }
?>