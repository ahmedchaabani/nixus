<?php
require_once '../model/cours.php';
require_once '../controller/coursC.php';



// Retrieve data from the form
$reference = $_POST['reference'];
$nom_societe = $_POST['nom_societe'];
$description = $_POST['description'];
$qr_code= $_POST['qr_code'];
$type_offre = $_POST['type_offre'];
$salaire = $_POST['salaire'];
$mail = $_POST['mail'];


// Create an instance of Orientation class with the retrieved data
$cours = new cours($reference, $nom_societe, $description, $qr_code, $type_offre, $salaire, $mail);

// Create an instance of OrientationC class
$coursController = new coursC();

// Call the method to add the orientation
$coursController->ajouterCours($reference, $nom_societe, $description, $qr_code, $type_offre, $salaire, $mail);
$coursController->showCours($cours);
$coursController->upqr_codeCours($reference, $nom_societe, $description, $qr_code, $type_offre, $salaire, $mail);
//$evalController->ajouterEvalCours(int $idEval, string $emailEleve, int $satisfaction, string $remarqEval);



?>