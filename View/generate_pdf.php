<?php
// Inclure la bibliothèque TCPDF
include '../Controller/FormationC.php';
require_once('tcpdf/tcpdf.php');


// Vérifie si l'ID de la formation est fourni dans l'URL
if(isset($_GET['id'])) {
    // Récupérer les détails de la formation en fonction de l'ID
    $forC = new FormationC();
    $formation = $forC->selectFormation($_GET['id']);
    
    // Générer le contenu du PDF
    $content = "
        <h1>Détails de la formation</h1>
        <p><strong>Nom:</strong> {$formation['nom_f']}</p>
        <p><strong>Type:</strong> {$formation['type_f']}</p>
        <p><strong>Description:</strong> {$formation['description_f']}</p>
        <p><strong>État:</strong> {$formation['etat_f']}</p>
        <p><strong>Coût:</strong> {$formation['cout_f']}</p>
        <p><strong>ID Utilisateur:</strong> {$formation['id_user']}</p>
        <p><strong>Date de début:</strong> {$formation['date_debut']}</p>
        <p><strong>Date de fin:</strong> {$formation['date_fin']}</p>
    ";

    // Créer une nouvelle instance de TCPDF
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // Définir les informations du document
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Your Name');
    $pdf->SetTitle('Formation Details');
    $pdf->SetSubject('Formation Details');
    $pdf->SetKeywords('Formation, Details, PDF');

    // Ajouter une page
    $pdf->AddPage();

    // Ajouter le contenu au PDF
    $pdf->writeHTML($content, true, false, true, false, '');

    // Télécharger le PDF
    $pdf->Output('formation_details.pdf', 'D');
} else {
    echo "ID de la formation non spécifié.";
}
?>
