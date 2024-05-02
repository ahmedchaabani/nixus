<?php
include '../config.php';
include '../Model/responsesM.php';

class responsesC
{
    public function listResponses()
    {
        $sql = "SELECT * FROM responses";
        $db =  config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deleteResponse($id)
    {
        $sql = "DELETE FROM responses WHERE id= :id";
        $db= config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' .$e->getMessage());
        }
    }

    public function addResponse($response)
    {
        $sql= "INSERT INTO responses (response) VALUES (:n)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'n' => $response->getResponse()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function updateResponse($response , $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE responses SET 
                response = :response
                WHERE id= :id'
            );
            $query->execute([
                'id' => $id,
                'response' => $response->getResponse()
            ]);
            echo $query->rowCount() . " responses UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' .$e->getMessage();
        }
    }

    public function showResponse($id)
    {
        $sql = "SELECT * FROM responses WHERE id= :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();

            $response = $query->fetch();
            return $response;
        } catch (Exception $e) {
            die('Error: ' .$e->getMessage());
        }
    }
}
?>

