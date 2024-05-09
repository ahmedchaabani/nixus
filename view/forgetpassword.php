<?php
require_once '../config.php';
require_once '../model/Utilisateur.php';
require_once '../controller/utilisateursC.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $controller = new utilisateursC();

    // Récupérez les données du formulaire
    $email = $_POST['email'];
    $_COOKIE['reset_email'] = $email;

    // Appelez la fonction de votre contrôleur pour envoyer le lien de réinitialisation
    $controller->sendVerificationCode();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link href="auth.css" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <div class="logo-container">
            <img src="logo.jpg" alt="Logo">
        </div>
        <div class="login-form">

        <!-- Ajoutez autant de span que nécessaire pour l'animation -->
        <div class="signin">
            <div class="content">
                <h2>Verification account</h2>
                <form method="POST" action="">
                    <div class="form">
                        <!-- Champ pour l'e-mail -->
                        <div class="inputBox">
                        <i>Email</i>
                            <input type="text" name="email"> <!-- Ajout du champ pour l'e-mail -->
                        </div>
                        <!-- Bouton pour réinitialiser le mot de passe -->
                        <div class="inputBox">
                            <input type="submit" value="Send Reset Link"> <!-- Mise à jour du libellé du bouton -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>
