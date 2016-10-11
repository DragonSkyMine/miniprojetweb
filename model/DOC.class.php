<?php
// Definition de l'unique objet de DAO
$doc = new DOC();

class DOC {
private $doc
  function __construct() {
    $doc = new DOMDocument;
    $doc->load('http://www.lemonde.fr/m-actu/rss_full.xml');
  }
}
?>
