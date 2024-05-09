<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Inclure les fichiers PHPMailer
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Adresse e-mail du destinataire
    $email = $_POST['email'];

    // Créer une nouvelle instance de PHPMailer
    $mail = new PHPMailer();

    try {
        // Paramètres SMTP pour Gmail
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'oussemawarghi23@gmail.com';
        $mail->Password = 'hwcc hzrp mkil bbjs';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Paramètres de l'e-mail
        //$mail->setFrom('oouergi260@gmail.com', 'oouerghi');
        $mail->addAddress($email);
        $mail->Subject = "Confirmation d'inscription à la formation";
        $mail->Body = "Merci de choisir la formation. C'est une belle formation.corfialement , le group nexus vous souhaite une bonne formation";
        
        // Envoyer l'e-mail
        $mail->send();
        echo "Un e-mail de confirmation a été envoyé à " . $email;
    } catch (Exception $e) {
        echo "Une erreur s'est produite lors de l'envoi de l'e-mail : " . $mail->ErrorInfo;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation d'inscription à la formation</title>
</head>
<body>
    <h2>Confirmation d'inscription à la formation</h2>
    <p>Veuillez saisir votre adresse e-mail pour recevoir une confirmation de votre inscription :</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="email">Adresse e-mail :</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <input type="submit" value="Confirmer">
    </form>
</body>
</html>
