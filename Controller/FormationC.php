<?php

require '../config.php';

class FormationC{

    public function listFormations(){
        // declaration 
        $sql = "SELECT * FROM formation";
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

    public function selectFormation($id) {
        $sql = "SELECT * FROM formation WHERE id=:id";
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
    public function selectFormationClient($id) {
        $sql = "SELECT * FROM formation WHERE id=:id";
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

    public function getformation($id) {
        try {
            $sql = "SELECT * FROM formation WHERE id = :id";
            $db = config::getConnexion();
            $query = $db->prepare($sql);
            $query->bindParam(':id', $id); // Utilisez ':id' au lieu de '1'
            $query->execute();
            return $query->fetch();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function deleteFormation($id){
        $sql = "DELETE FROM formation WHERE id=$id";
        $db = config::getConnexion();
        try {
            $q = $db->prepare($sql);
            $q->execute();
        } catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function addFormation($employe){
        $sql = "INSERT INTO formation (id, nom_f, type_f, description_f, etat_f,cout_f,id_user,date_debut,date_fin) VALUES (null, :nom_f, :type_f, :description_f, :etat_f, :cout_f, :id_user, :date_debut, :date_fin)";
        $db = config::getConnexion();
        try {
            $q = $db->prepare($sql);

            // méthode : bindParam
            // $lname = $employe->getLastname();
            // $q->bindParam(':lastname',$lname);

            // valeurs passée à travers le param
            $q->bindValue(':nom_f',$employe->getNom_f());
            $q->bindValue(':type_f',$employe->getType_f());
            $q->bindValue(':description_f',$employe->getDescription_f());
            $q->bindValue(':etat_f',$employe->getEtat_f());
            $q->bindValue(':cout_f',$employe->getCout_f());
            $q->bindValue(':id_user',$employe->getId_user());
            $q->bindValue(':date_debut',$employe->getDate_debut());
            $q->bindValue(':date_fin',$employe->getDate_fin());
            $q->execute();

        } catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function updateFormation($id,$formation){
        $sql = "UPDATE formation SET nom_f=:nom_f, type_f=:type_f, description_f=:description_f, etat_f=:etat_f, cout_f=:cout_f, id_user=:id_user, date_debut=:date_debut, date_fin=:date_fin WHERE id=$id";
        $db = config::getConnexion();
        try {
            $q = $db->prepare($sql);

            // valeurs passée à travers le param
            $q->bindValue(':nom_f',$formation->getNom_f());
            $q->bindValue(':type_f',$formation->getType_f());
            $q->bindValue(':description_f',$formation->getDescription_f());
            $q->bindValue(':etat_f',$formation->getEtat_f());
            $q->bindValue(':cout_f',$formation->getCout_f());
            $q->bindValue(':id_user',$formation->getId_user());
            $q->bindValue(':date_debut',$formation->getDate_debut());
            $q->bindValue(':date_fin',$formation->getDate_fin());

            $q->execute();

        } catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

}
?>