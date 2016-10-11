<?php
class Nouvelle {
  private $titre;   // Le titre
  private $date;    // Date de publication
  private $description; // Contenu de la nouvelle
  private $url;         // Le lien vers la ressource associée à la nouvelle
  private $urlImage;    // URL vers l'image

  // Fonctions getter
  function titre() {
    return $this->titre;
  }

  function date() {
    return $this->date;
  }

  function description() {
    return $this->description;
  }

  function url() {
    return $this->url;
  }

  function urlImage() {
    return $this->urlImage;
  }

  // Charge les attributs de la nouvelle avec les informations du noeud XML
  function update(DOMElement $item) {
    $nodeList = $item->getElementsByTagName('title');
    $this->titre    = $nodeList->item(0)->textContent;

    $nodeList = $item->getElementsByTagName('pubDate');
    $this->date = $nodeList->item(0)->textContent;

    $nodeList = $item->getElementsByTagName('description');
    $this->description = $nodeList->item(0)->textContent;

    $nodeList = $item->getElementsByTagName('link');
    $this->url = $nodeList->item(0)->textContent;
  }
}
?>
