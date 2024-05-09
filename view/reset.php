<?php
require_once '../config.php';
require_once '../model/Utilisateur.php';
require_once '../controller/utilisateursC.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller = new utilisateursC();

    // Stockez l'e-mail dans la session
    $email = $_COOKIE['reset_email'];

    // Appelez la fonction de votre contrôleur pour envoyer le lien de réinitialisation
    $controller->resetPassword();

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
            <div class="signin">

                <div class="content">
                    <h2>Reset Password</h2>
                    <div class="form">
                        <!-- Champ pour l'e-mail -->
                        <div class="inputBox">
                            <form action="" method="POST">
                                <!-- Mettez à jour l'action de l'action pour pointer vers la bonne URL -->
                                <label for="password">Password:</label>
                                <input type="password" id="password" name="password" required>
                                <!-- Bouton pour soumettre le formulaire -->
                                <div class="inputBox">
                                    <input type="submit" value="Reset Password">
                                    <!-- Mise à jour du libellé du bouton -->
                                </div>
                            </form>

                        </div>
                    </div>



                </div>

                </section> <!-- partial -->


</body>

</html>