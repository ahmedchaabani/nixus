<?php
include '../Controller/FormationC.php';
include '../Model/Formation.php';

// Créer une instance de FormationC
$formationC = new FormationC();

// Récupérer toutes les formations
$formations = $formationC->listFormations();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendrier des Formations</title>
    <style>
        /* Styles pour le calendrier */
        /* Ajoutez vos styles CSS personnalisés ici */
    </style>
</head>
<body>
    <h1>Calendrier des Formations</h1>
    <div class="calendrier">
        <?php foreach ($formations as $formation): ?>
            <div class="formation">
                <p><?php echo "C'est la date de début de la formation " . $formation['nom_f'] . ": " . $formation['date_debut']; ?></p>
                <p><?php echo "C'est la date de fin de la formation " . $formation['nom_f'] . ": " . $formation['date_fin']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
