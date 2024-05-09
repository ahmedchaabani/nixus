<?php
// Inclure les fichiers nécessaires
include '../Controller/FormationC.php';

// Instanciation de la classe FormationC
$formationC = new FormationC();

// Récupération des données sur les formations
$formations = $formationC->listFormations();

// Initialisation des compteurs pour chaque catégorie
$countA = 0;
$countB = 0;
$countC = 0;
$total = count($formations);

// Calcul du nombre de formations dans chaque catégorie
foreach ($formations as $formation) {
    switch ($formation['type_f']) {
        case 'a':
            $countA++;
            break;
        case 'b':
            $countB++;
            break;
        case 'c':
            $countC++;
            break;
        default:
            // Ne rien faire ou gérer les autres cas si nécessaire
            break;
    }
}

// Calcul des pourcentages
$percentageA = ($countA / $total) * 100;
$percentageB = ($countB / $total) * 100;
$percentageC = ($countC / $total) * 100;

// Calcul de l'angle pour chaque catégorie
$angleA = ($percentageA / 100) * 360;
$angleB = ($percentageB / 100) * 360;
$angleC = ($percentageC / 100) * 360;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques des formations</title>
    <style>
        .circle {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            font-weight: bold;
            color: white;
        }
        .segment {
            position: absolute;
            width: 100%;
            height: 100%;
            clip-path: polygon(50% 50%, 100% 100%, 0% 100%);
        }
    </style>
</head>
<body>
    <div class="circle">
        <div class="segment" style="background-color: yellow; transform: rotate(<?php echo $angleA; ?>deg);"></div>
        <div class="segment" style="background-color: green; transform: rotate(<?php echo $angleA; ?>deg) skewY(-45deg);"></div>
        <div class="segment" style="background-color: red; transform: rotate(<?php echo $angleA + $angleB; ?>deg) skewY(-45deg);"></div>
        Total : <?php echo round($total, 2); ?>
    </div>
</body>
</html>
