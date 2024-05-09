<?php
require_once '../config.php';
require_once '../model/Utilisateur.php';
require_once '../controller/utilisateursC.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $controller = new utilisateursC();

    // Récupérez les données du formulaire
    $email = $_POST['email'];

    // Appelez la fonction de votre contrôleur pour envoyer le lien de réinitialisation
    $controller->verifycode();
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


                    <h2>Enter Verification Code</h2>
                    <div class="form">
                        <!-- Champ pour l'e-mail -->
                        <div class="inputBox">
                            <form action="" method="POST">
                                <!-- Mettez à jour l'action de l'action pour pointer vers la bonne URL -->
                                <label for="verification_code">Verification Code:</label>
                                <input type="text" id="verification_code" name="verification_code" required>
                                <!-- Bouton pour soumettre le code de vérification -->
                                <div class="inputBox">
                                    <input type="submit" value="Verify"> <!-- Mise à jour du libellé du bouton -->
                                </div>
                            </form>


                        </div>
                    </div>


                </div>

                </section> <!-- partial -->


</body>

</html>