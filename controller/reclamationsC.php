<?php
include '../config.php';
include '../Model/reclamationsM.php';

class responsesC
{
    public function listReclamations()
    {
        $sql = "SELECT * FROM reclamations";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deleteReclamation($id)
    {
        $sql = "DELETE FROM reclamations WHERE id= :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function addReclamation($reclamation)
    {
        $sql = "INSERT INTO reclamations (reclamation) VALUES (:n)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'n' => $reclamation->getReclamation()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function updateReclamation($reclamation, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reclamations SET 
                reclamation = :reclamation
                WHERE id= :id'
            );
            $query->execute([
                'id' => $id,
                'reclamation' => $reclamation->getReclamation()
            ]);
            echo $query->rowCount() . " reclamations UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function showReclamation($id)
    {
        $sql = "SELECT * FROM reclamations WHERE id= :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();

            $reclamation = $query->fetch();
            return $reclamation;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function triReclamationsByDate()
{
    $sql = "SELECT * FROM reclamations ORDER BY date";
    $db = config::getConnexion();
    try {
        $sortedReclamations = $db->query($sql);
        return $sortedReclamations;
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}

}
?>
