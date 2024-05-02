<?php

include '../Controller/AtelierC.php';

$ateC = new AtelierC(); // instance-objet

// Vérifier si la clé 'id' est définie dans le tableau $_GET
if (isset($_GET['id'])) {
    // Supprimer la formation en utilisant l'identifiant spécifié
    $ateC->deleteAtelier($_GET['id']);
    
    // Redirection vers la page listFormations.php après la suppression
    header('Location: listAteliers.php');
} else {
    // Gérer le cas où la clé 'id' n'est pas définie
    echo "Erreur : L'identifiant de la atelier à supprimer n'est pas spécifié.";
}

?>
