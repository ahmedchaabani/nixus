<?php 
require '../config.php';
class forumC   {
    
    public function addforum($forum)
    {
      $sql = "INSERT INTO forum VALUES (NULL, :categorie, :titre, :message , :image , :date)";
      $db = config::getConnexion();
      try {
        $query = $db->prepare($sql);
        $query->execute([
          "categorie" => $forum->getcategorie(),
          "titre" => $forum->gettitre(),
          "message" => $forum->getmessgae(),
          "image" => $forum->getimage(),
          "date" => $forum->getdate(),
        ]);
      } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
      }
    }
  
    public function updateforum($forum,$id)
    {
      $sql = "UPDATE forum SET categorie=:categorie,titre=:titre,message=:message,image=:image,date=:date WHERE id = :id";
      $db = config::getConnexion();
      try {
        $query = $db->prepare($sql);
        $query->execute([
          "id" => $id,
          "categorie" => $forum->getcategorie(),
          "titre" => $forum->gettitre(),
          "message" => $forum->getmessgae(),
          "image" => $forum->getimage(),
          "date" => $forum->getdate(),
        ]);
      } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
      }
    }
  
    public function deleteforum($id)
    {
      $sql = "DELETE FROM forum WHERE id = :id";
      $db = config::getConnexion();
      try {
        $query = $db->prepare($sql);
        $query->execute([
          "id" => $id,
        ]);
      } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
      }
    }

    public function allforum()
    {
      $sql = "SELECT * FROM forum";
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
        echo "Error: " . $e->getMessage();
      }
    }
    public function findforum($id)
    {
      $sql = "SELECT * FROM forum WHERE id = :id";
      $db = config::getConnexion();
      try {
        $query = $db->prepare($sql);
        $query->execute([
          "id" => $id,
        ]);
        $service = $query->fetch();
  
        return $service;
      } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
      }
    }
    public function findforumBycategorie($forum, $categorie)
    {
        $sql = "SELECT * FROM forum WHERE categorie = :categorie";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['categorie' => $categorie]);
            $user = $query->fetch();
    
            if ($forum) {
                // Password matches (comparing as strings)
                return $forum;
            } else {
                // Invalid username or password
                return false;
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function getCommentsByPostId($postId) {
      $sql = "SELECT * FROM comments WHERE post_id = :post_id";
      $db = config::getConnexion(); // Utilisation de la méthode getConnexion de votre classe config pour obtenir la connexion à la base de données
  
      try {
          $query = $db->prepare($sql);
          $query->execute([
              "post_id" => $postId
          ]);
  
          // Récupération des résultats
          $comments = $query->fetchAll(PDO::FETCH_ASSOC);
  
          return $comments;
      } catch (PDOException $e) {
          // En cas d'erreur
          echo "Erreur: " . $e->getMessage();
          return null;
      }
  }
  
  public function addComment($postId, $commentContent)
  {
      $sql = "INSERT INTO comments (post_id, content) VALUES (:post_id, :content)";
      $db = config::getConnexion();
      try {
          $query = $db->prepare($sql);
          $query->execute([
              "post_id" => $postId,
              "content" => $commentContent
          ]);
          // Retourner true si l'ajout du commentaire a réussi
          return true;
      } catch (Exception $e) {
          // Afficher l'erreur en cas d'échec
          echo "Error: " . $e->getMessage();
          // Retourner false en cas d'échec
          return false;
      }
  }

  public function updateComment($commentId, $newContent)
  {
      $sql = "UPDATE comments SET content = :content WHERE id = :id";
      $db = config::getConnexion();
      try {
          $query = $db->prepare($sql);
          $query->execute([
              "id" => $commentId,
              "content" => $newContent
          ]);
          // Retourner true si la mise à jour du commentaire a réussi
          return true;
      } catch (Exception $e) {
          // Afficher l'erreur en cas d'échec
          echo "Error: " . $e->getMessage();
          // Retourner false en cas d'échec
          return false;
      }
  }
  

public function deleteComment($commentId)
{
    $sql = "DELETE FROM comments WHERE id = :id";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            "id" => $commentId
        ]);
        // Retourner true si la suppression du commentaire a réussi
        return true;
    } catch (Exception $e) {
        // Afficher l'erreur en cas d'échec
        echo "Error: " . $e->getMessage();
        // Retourner false en cas d'échec
        return false;
    }
}

public function searchByTitle($titre) {
  $sql = "SELECT * FROM forum WHERE titre LIKE :titre";
  $db = config::getConnexion(); // Récupération de la connexion à la base de données
  
  try {
      $query = $db->prepare($sql);
      $query->execute([':titre' => '%' . $titre . '%']); // Exécution de la requête préparée avec le titre recherché
      
      // Récupération des résultats sous forme de tableau associatif
      $searchResults = $query->fetchAll(PDO::FETCH_ASSOC);
      
      return $searchResults; // Retour des résultats de la recherche
  } catch (PDOException $e) {
      // En cas d'erreur lors de l'exécution de la requête
      echo "Erreur: " . $e->getMessage();
      return array(); // Retour d'un tableau vide en cas d'erreur
  }
}

public function allcomments() {
  $sql = "SELECT * FROM comments";
  $db = config::getConnexion(); // Utilisation de la méthode getConnexion de votre classe config pour obtenir la connexion à la base de données
  
  try {
      $query = $db->prepare($sql);
      $query->execute();
      
      // Récupération des résultats sous forme de tableau associatif
      $comments = $query->fetchAll(PDO::FETCH_ASSOC);
      
      return $comments; // Retour des résultats
  } catch (PDOException $e) {
      // En cas d'erreur lors de l'exécution de la requête
      echo "Erreur: " . $e->getMessage();
      return array(); // Retour d'un tableau vide en cas d'erreur
  }
}

public function findcomment($id)
{
  $sql = "SELECT * FROM comments WHERE id = :id";
  $db = config::getConnexion();
  try {
    $query = $db->prepare($sql);
    $query->execute([
      "id" => $id,
    ]);
    $comment = $query->fetch();

    return $comment;
  } catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    return null;
  }
}


}
?>


