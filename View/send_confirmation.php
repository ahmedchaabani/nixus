<?php
// Vérifiez si l'ID de formation est passé en tant que paramètre
if(isset($_GET['formation_id'])) {
    $formation_id = $_GET['formation_id'];
    
    // Vous devrez inclure votre logique pour récupérer le nom de la formation à partir de l'ID de la formation
    // Remplacez cette ligne par votre logique pour obtenir le nom de la formation
    $nom_formation = "Nom de la formation"; // Vous pouvez le remplacer par votre propre logique pour obtenir le nom de la formation
    
    // Vérifiez si le formulaire a été soumis
    if(isset($_POST['email'])) {
        // Adresse e-mail saisie par l'utilisateur
        $destinataire = $_POST['email'];
        
        // Sujet du courriel
        $sujet = "Confirmation de choix de formation";
        
        // Corps du message
        $message = "Bonjour,\n\n";
        $message .= "Vous avez choisi la formation \"$nom_formation\". C'est une excellente décision!\n";
        $message .= "Merci de votre confiance.\n\n";
        $message .= "Cordialement,\nVotre entreprise";
        
        // En-têtes supplémentaires
        $headers = "From: oussemawarghi23@gmail.com" . "\r\n" .
                   "Reply-To: votreadresse@example.com" . "\r\n" .
                   "X-Mailer: PHP/" . phpversion();
        
        // Envoyer l'e-mail
        if(mail($destinataire, $sujet, $message, $headers)) {
            echo "Mail envoyé avec succès à $destinataire.";
        } else {
            echo "Erreur lors de l'envoi du mail.";
        }
    } else {
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de choix de formation</title>
</head>
<body>
    <h2>Entrez votre adresse e-mail pour recevoir la confirmation :</h2>
    <form method="post">
        <label for="email">Adresse e-mail :</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>
<?php
    }
} else {
    echo "ID de formation non spécifié.";
}
?>
