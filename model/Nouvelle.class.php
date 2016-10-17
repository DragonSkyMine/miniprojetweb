<?php
class Nouvelle {
  private $titre;   // Le titre
  private $date;    // Date de publication
  private $description; // Contenu de la nouvelle
  private $url;         // Le lien vers la ressource associée à la nouvelle
  private $urlImage;    // URL vers l'image

  // Fonctions getter
  function getTitre() {
    return $this->titre;
  }

  function getDate() {
    return $this->date;
  }

  function getDescription() {
    return $this->description;
  }

  function getUrl() {
    return $this->url;
  }

  function getUrlImage() {
    return $this->urlImage;
  }

  // Charge les attributs de la nouvelle avec les informations du noeud XML
  function update(DOMElement $item) {
    $nodeList = $item->getElementsByTagName('title');
    $this->titre = $nodeList->item(0)->textContent;

    $nodeList = $item->getElementsByTagName('pubDate');
    $this->date = $nodeList->item(0)->textContent;

    $nodeList = $item->getElementsByTagName('description');
    $this->description = $nodeList->item(0)->textContent;

    $nodeList = $item->getElementsByTagName('link');
    $this->url = $nodeList->item(0)->textContent;

    $nodeList = $item->getElementsByTagName('enclosure');
    $node = $nodeList->item(0)->attributes->getNamedItem('url');
    if ($node != NULL) {
      //on récupère ça valeur, c'est l'url de l'image
      $this->urlImage = $node->nodeValue;
    }
  }

  function downloadImage(DOMElement $item, $imageId) {
      // On construit un nom local pour cette image : on suppose que $nomLocalImage contient un identifiant unique
      $this->image = '../view/images/'.$imageId.'.jpg';
      // On télécharge l'image à l'aide de son URL, et on la copie localement.
      file_put_contents($this->image, file_get_contents($this->url));
  }
}
?>
