<?php

include '../Controller/FormationC.php';

$forC = new FormationC(); // instance-objet

// Vérifier si la clé 'id' est définie dans le tableau $_GET
if (isset($_GET['id'])) {
    // Supprimer la formation en utilisant l'identifiant spécifié
    $forC->deleteFormation($_GET['id']);
    
    // Redirection vers la page listFormations.php après la suppression
    header('Location: listFormations.php');
} else {
    // Gérer le cas où la clé 'id' n'est pas définie
    echo "Erreur : L'identifiant de la formation à supprimer n'est pas spécifié.";
}

?>
