<?php

// Definition de l'unique objet de DAO
$dao = new DOC();

$doc = new DOMDocument;
$doc->load('http://www.lemonde.fr/m-actu/rss_full.xml');


class DOC {

  function __construct() {

  }
}

?>
