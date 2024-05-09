<?php
// Récupération de l'adresse e-mail saisie dans le formulaire
if(isset($_POST['email'])) {
    $email = $_POST['email'];

    // Votre adresse e-mail (où vous recevrez la confirmation)
    $destinataire = "votre_adresse_email@example.com";
    $sujet = "Confirmation de votre choix";

    // Message de confirmation
    $message = "Votre choix a bien été enregistré.";

    // Envoi du mail
    mail($destinataire, $sujet, $message, "From: $email");

    // Redirection vers une page de confirmation
    header("Location: confirmation.php");
    exit();
} else {
    // Redirection en cas d'accès direct à ce script sans soumission du formulaire
    header("Location: mail.php");
    exit();
}
?>
