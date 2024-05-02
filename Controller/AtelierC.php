<?php

require '../config.php';

class AtelierC{

    public function listAteliers(){
        // declaration 
        $sql = "SELECT * FROM atelier";
        $db = config::getConnexion();
        try {
            $q = $db->prepare($sql);
            $q->execute();
            $r = $q->fetchAll();
            return $r;
        } catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }



    public function selectAtelier($id) {
        $sql = "SELECT * FROM atelier WHERE id=:id";
        $db = config::getConnexion();
        try {
            $q = $db->prepare($sql);
            $q->bindValue(':id',$id);
            $q->execute();
            $atelier = $q->fetch(PDO::FETCH_ASSOC);
            return $atelier;
        } catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }
    public function selectAtelier2($id) {
        $sql = "SELECT * FROM atelier WHERE id_formation=$id";
        $db = config::getConnexion();
        try {
            $q = $db->prepare($sql);
            // $q->bindValue(':id',$id);
            $q->execute();
            $atelier = $q->fetchAll();
            return $atelier;
        } catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }


    public function selectAtelierClient($id) {
        $sql = "SELECT * FROM atelier WHERE id=:id";
        $db = config::getConnexion();
        try {
            $q = $db->prepare($sql);
            $q->bindValue(':id',$id);
            $q->execute();
            $formation = $q->fetch(PDO::FETCH_ASSOC);
            return $formation;
        } catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function getatelier($id) {
        try {
            $sql = "SELECT * FROM atelier WHERE id = :id";
            $db = config::getConnexion();
            $query = $db->prepare($sql);
            $query->bindParam(':id', $id); // Utilisez ':id' au lieu de '1'
            $query->execute();
            return $query->fetch();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function deleteAtelier($id){
        $sql = "DELETE FROM atelier WHERE id=$id";
        $db = config::getConnexion();
        try {
            $q = $db->prepare($sql);
            $q->execute();
        } catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function addAtelier($atelier){
        $sql = "INSERT INTO atelier (id, nom_a, dure_a, description_a, formateur_a,niveau_a,id_user,id_formation) VALUES (null, :nom_a, :dure_a, :description_a, :formateur_a, :niveau_a, :id_user, :id_formation)";
        $db = config::getConnexion();
        try {
            $q = $db->prepare($sql);

            // méthode : bindParam
            // $lname = $employe->getLastname();
            // $q->bindParam(':lastname',$lname);

            // valeurs passée à travers le param
            $q->bindValue(':nom_a',$atelier->getNom_a());
            $q->bindValue(':dure_a',$atelier->getDure_a());
            $q->bindValue(':description_a',$atelier->getDescription_a());
            $q->bindValue(':formateur_a',$atelier->getFormateur_a());
            $q->bindValue(':niveau_a',$atelier->getNiveau_a());
            $q->bindValue(':id_user',$atelier->getId_user());
            $q->bindValue(':id_formation',$atelier->getId_formation());
            
            $q->execute();

        } catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function updateAtelier($id,$atelier){
        $sql = "UPDATE atelier SET nom_a=:nom_a, dure_a=:dure_a, description_a=:description_a, formateur_a=:formateur_a, niveau_a=:niveau_a, id_user=:id_user, id_formation=:id_formation WHERE id=$id";
        $db = config::getConnexion();
        try {
            $q = $db->prepare($sql);

            // valeurs passée à travers le param
            $q->bindValue(':nom_a',$atelier->getNom_a());
            $q->bindValue(':dure_a',$atelier->getDure_a());
            $q->bindValue(':description_a',$atelier->getDescription_a());
            $q->bindValue(':formateur_a',$atelier->getFormateur_a());
            $q->bindValue(':niveau_a',$atelier->getFormateur_a());
            $q->bindValue(':id_user',$atelier->getId_user());
            $q->bindValue(':id_formation',$atelier->getId_formation());
            

            $q->execute();

        } catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

}
?>