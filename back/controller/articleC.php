<?php 
require '../config.php';
class articleC   {
    
    public function addarticle($article)
    {
      $sql = "INSERT INTO article VALUES (:titreArt, :messageArt, NULL, :dateArt)";
      $db = config::getConnexion();
      try {
        $query = $db->prepare($sql);
        $query->execute([
          "titreArt" => $article->gettitreArt(),
          "messageArt" => $article->getmessageArt(),
          "dateArt" => $article->getdateArt(),
        ]);
      } catch (Exception $e) {
        echo "Error: " . $e->getmessageArt();
      }
    }
  
    public function updatearticle($article,$idArt)
    {
      $sql = "UPDATE article SET titreArt=:titreArt,messageArt=:messageArt,dateArt=:dateArt WHERE idArt = :idArt";
      $db = config::getConnexion();
      try {
        $query = $db->prepare($sql);
        $query->execute([
          "idArtArt" => $idArt,
          "titreArt" => $article->gettitreArt(),
          "messageArt" => $article->getmessageArt(),
          "dateArt" => $article->getdateArt(),
        ]);
      } catch (Exception $e) {
        echo "Error: " . $e->getmessageArt();
      }
    }
  
    public function deletearticle($idArt)
    {
      $sql = "DELETE FROM article WHERE idArt = :idArt";
      $db = config::getConnexion();
      try {
        $query = $db->prepare($sql);
        $query->execute([
          "idArt" => $idArt,
        ]);
      } catch (Exception $e) {
        echo "Error: " . $e->getmessageArt();
      }
    }

    public function allarticle()
    {
      $sql = "SELECT * FROM article";
      $db = config::getConnexion();
      try {
        $query = $db->prepare($sql);
        $query->execute();
        $service = $query->fetch();
        $res = [];
        for ($x = 0; $service; $x++) {
          $res[$x] = $service;
          $service = $query->fetch();
        }
        return $res;
      } catch (Exception $e) {
        echo "Error: " . $e->getmessageArt();
      }
    }
    public function findarticle($idArt)
    {
      $sql = "SELECT * FROM article WHERE idArt = :idArt";
      $db = config::getConnexion();
      try {
        $query = $db->prepare($sql);
        $query->execute([
          "idArt" => $idArt,
        ]);
        $service = $query->fetch();
  
        return $service;
      } catch (Exception $e) {
        echo "Error: " . $e->getmessageArt();
      }
    }
    public function findarticleBytitle($article, $titreArt)
    {
        $sql = "SELECT * FROM article WHERE titreArt = :titreArt";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['titreArt' => $titreArt]);
            $user = $query->fetch();
    
            if ($article) {
                // Password matches (comparing as strings)
                return $article;
            } else {
                // InvalidArt username or password
                return false;
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getmessageArt();
            return false;
        }
    }
}
?>


