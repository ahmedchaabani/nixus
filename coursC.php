<?php
include "../config.php";
require_once '../model/cours.php'; 
//require_once '../view/material-dashboard-master (1)/pages/tables.php'; 
class coursC
{
public function showCours($cours)
{
    echo' <table border=1 width="100%">
        <tr align="center" >
        <td> referenceC<td>
        <td> salaire</td>
        <td> descriptionn </td>
        <td> mail </td>
        <td> nom societe</td>
        <td> qr code</td>
        <td> type offre</td>
    
        </tr>
        <tr>
        
        <td>'.$cours->getreference().'</td>
        <td>'.$cours->getsalaire().'</td>
        <td>'.$cours->getDescription().'</td>
        <td>'.$cours->getmail().'</td>
        <td>'.$cours->getnom_societe().'</td>
        <td>'.$cours->getqr_code().'</td>
        <td>'.$cours->gettype_offre().'</td>
        
        </tr>
        </table>';


}
public function ajouterCours($reference, $nom_societe, $description, $mail, $qr_code, $salaire, $type_offre) {
    $db = Config::getConnexion();
    try {
        $requete = $db->prepare("INSERT INTO offres (reference, nom_societe, description, mail, qr_code, salaire, type_offre) VALUES (:reference, :nom_societe, :description, :mail, :qr_code, :salaire, :type_offre)");
        $requete->bindParam(':reference', $reference);
        $requete->bindParam(':nom_societe', $nom_societe);
        $requete->bindParam(':description', $description);
        $requete->bindParam(':mail', $mail);
        $requete->bindParam(':qr_code', $qr_code);
        $requete->bindParam(':salaire', $salaire);
        $requete->bindParam(':type_offre', $type_offre);
        

        $requete->execute();
    } catch (PDOException $e) {
        // Log or handle the error appropriately
        die('Error adding offres: ' . $e->getMessage());
    }
}

public function upmailCours($reference, $nom_societe, $description, $mail, $qr_code, $salaire) {
    $db = Config::getConnexion();
    try {
        $requete = $db->prepare("UPmail offres SET nom_societe = :nom_societe, description = :description, mail = :mail, qr_code = :qr_code, salaire = :salaire WHERE reference = :reference");
        $requete->bindParam(':reference', $reference);
        $requete->bindParam(':nom_societe', $nom_societe);
        $requete->bindParam(':description', $description);
        $requete->bindParam(':mail', $mail);
        $requete->bindParam(':qr_code', $qr_code);
        $requete->bindParam(':salaire', $salaire);
        $requete->bindParam(':type_offre', $type_offre);
        
        $requete->execute();
    } catch (PDOException $e) {
        // Log or handle the error appropriately
        die('Error updating offres: ' . $e->getMessage());
    }
}


public function listCours()
    {
        $sql = "SELECT * FROM offres";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
}
?>