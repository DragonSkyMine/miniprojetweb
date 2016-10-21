<?php
require_once('RSS.class.php');
$dao = new DAO();
class DAO {
  private $db; // L'objet de la base de donnée

  // Ouverture de la base de donnée
  function __construct() {
    $dsn = 'sqlite:../data/db/rss.db'; // Data source name
    try {
      $this->db = new PDO($dsn);
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      exit("Erreur ouverture BD : ".$e->getMessage());
    }
  }

  //////////////////////////////////////////////////////////
  // Methodes CRUD sur RSS
  //////////////////////////////////////////////////////////

  // Crée un nouveau flux à partir d'une URL
  // Si le flux existe déjà on ne le crée pas
  function createRSS($url) {
    $rss = $this->readRSSfromURL($url);
    if ($rss == NULL) {
      try {
        $q = "INSERT INTO RSS (url) VALUES ('$url')";
        $r = $this->db->exec($q);
        if ($r == 0) {
          die("createRSS error: no rss inserted\n");
        }
        return $this->readRSSfromURL($url);
      } catch (PDOException $e) {
        die("PDO Error :".$e->getMessage());
      }
    } else {
      // Retourne l'objet existant
      return $rss;
    }
  }

  // Acces à un objet RSS à partir de son URL
  function readRSSfromURL($url) {
    try {
      $sth = $this->db->prepare('SELECT * FROM RSS WHERE url = :thatUrl');
      $sth->execute(array(':thatUrl' => $url));
      $res = $sth->fetch();
      if ($res != NULL) {
        $resRss = new RSS($res['url']);
        return($resRss);
      }
      return NULL;
    }
    catch (Exception $e) {
      die("Error in the query!");
    }
  }

  // Met à jour un flux
  function updateRSS(RSS $rss) {
    // Met à jour uniquement le titre et la date
    $titre = $this->db->quote($rss->getTitre());
    $q = "UPDATE RSS SET titre=$titre, date='".$rss->getDate()."' WHERE url='".$rss->getUurl()."'";
    try {
      $r = $this->db->exec($q);
      if ($r == 0) {
        die("updateRSS error: no rss updated\n");
      }
    } catch (PDOException $e) {
      die("PDO Error :".$e->getMessage());
    }
  }

  //////////////////////////////////////////////////////////
  // Methodes CRUD sur Nouvelle
  //////////////////////////////////////////////////////////

  // Acces à une nouvelle à partir de son titre et l'ID du flux
  function readNouvellefromTitre($titre,$RSS_id) {
    try {
      $sth = $this->db->prepare('SELECT * FROM nouvelle WHERE RSS_id = :RSS_id and titre = :titre');
      $sth->execute(array(':RSS_id' => $RSS_id, ':titre' => $titre));
      $res = $sth->fetchAll(PDO::FETCH_CLASS, "Nouvelle");
      return($res);
    }
    catch (Exception $e) {
      die("Error in the query!");
    }
  }

  // Crée une nouvelle dans la base à partir d'un objet nouvelle
  // et de l'id du flux auquelle elle appartient
  function createNouvelle(Nouvelle $n, $RSS_id) {
    try {
      $sth = $this->db->prepare('INSERT INTO nouvelle VALUES (:id, :date1, :titre, :descr, :url, :urlImg, :rssId)');
      $sth->execute(array(
        ':id' => (NULL),
        ':date1' => ($n->getDate()),
        ':titre' => ($n->getTitre()),
        ':descr' => ($n->getDescription()),
        ':url' => ($n->getUrl()),
        ':urlImg' => ($n->getUrlImage()),
        ':rssId' => ($RSS_id)
      ));
    }
    catch (Exception $e) {
      die("Error in the query!");
    }
    /*$req = "INSERT INTO nouvelle VALUES ('NULL', '" . $n->getDate() ."', '" . $n->getTitre() . "', '" . $n->getDescription() . "', '" . $n->getUrl() . "', '" . $n->getUrlImage() . "', '" . $RSS_id . "')";
    $this->db->exec($req);*/
  }


  function getRssId($url) {
    try {
      $sth = $this->db->prepare('SELECT id FROM RSS WHERE url = :url');
      $sth->execute(array(':url' => $url));
      $res = $sth->fetch();
    }
    catch (Exception $e) {
      die("Error in the query!");
    }
    return $res['id'];
  }

  function getFlux() {
    $sth = $this->db->prepare('SELECT url FROM RSS');
    $sth->execute();
    while ($res = $sth->fetch()) {
      $data[] = $res;
    }
    return($data);
  }

  function readNouvellefromRssId($RSS_id) {
    try {
      $sth = $this->db->prepare('SELECT * FROM nouvelle WHERE RSS_id = :RSS_id ');
      $sth->execute(array(':RSS_id' => $RSS_id));
      $res = $sth->fetchAll(PDO::FETCH_CLASS, "Nouvelle");
      return($res);
    }
    catch (Exception $e) {
      die("Error in the query!");
    }
  }

  function readNouvellefromId($id) {
    try {
      $sth = $this->db->prepare('SELECT * FROM nouvelle WHERE id = :id ');
      $sth->execute(array(':id' => $id));
      $res = $sth->fetchAll(PDO::FETCH_CLASS, "Nouvelle");
      return($res);
    }
    catch (Exception $e) {
      die("Error in the query!");
    }
  }
}
?>
