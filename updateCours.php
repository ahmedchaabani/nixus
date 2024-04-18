<?php
include_once '../model/cours.php';
include_once '../controller/coursC.php';

$error = "";

// create cours
$cours = null;

// create an instance of the controller
$coursC = new coursC();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST["reference"]) &&
        isset($_POST["nom_societe"]) &&      
        isset($_POST["description"]) &&
        isset($_POST["type_offre"]) && 
        isset($_POST["qr_code"]) &&
        isset($_POST["salaire"]) &&
        isset($_POST["mail"])
    ) {
        if (
            !empty($_POST["reference"]) && 
            !empty($_POST['nom_societe']) &&
            !empty($_POST["description"]) && 
            !empty($_POST["type_offre"]) && 
            !empty($_POST["qr_code"]) &&
            !empty($_POST["salaire"]) &&
            !empty($_POST["mail"])
        ) {
            $reference = $_POST['reference'];
            $nom_societe = $_POST['nom_societe'];
            $description = $_POST['description']; 
            $type_offre = $_POST['type_offre'];
            $qr_code = $_POST['qr_code'];
            $salaire = $_POST['salaire'];
            $mail = $_POST['mail'];

            $cours = new Cours($reference, $nom_societe, $description, $type_offre, $qr_code, $salaire, $mail);
            $coursC->uptype_offreCours($reference, $nom_societe, $description, $type_offre, $qr_code, $salaire, $mail);
            header('Location: showCours.php');
        } else {
            $error = "Tous les champs sont requis";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modifier un cours</title>
</head>
<body>
    <h2>Modifier un cours</h2>

    <form method="POST">
        <label for="reference">ID:</label><br>
        <input type="text" id="reference" name="reference" required><br>

        <label for="nom_societe">nom_societe:</label><br>
        <input type="text" id="nom_societe" name="nom_societe" required><br>

        <label for="description">Description:</label><br>
        <input type="text" id="description" name="description" required><br>

        <label for="type_offre">type_offre:</label><br>
        <input type="text" id="type_offre" name="type_offre" required><br>

        <label for="qr_code">qr_code:</label><br>
        <input type="text" id="qr_code" name="qr_code" required><br>

        <label for="salaire">salaire:</label><br>
        <input type="text" id="salaire" name="salaire" required><br>

        <label for="mail">mail:</label><br>
        <input type="text" id="mail" name="mail" required><br>

        <input type="submit" name="modifier" value="Modifier">
