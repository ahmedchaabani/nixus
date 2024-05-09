<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link href="auth.css" rel="stylesheet">
</head>

<body>
    <div class="login-container">
        <div class="logo-container">
            <img src="logo.jpg" alt="Logo">
        </div>
        <div class="login-form">
            <h1>Sign In Now !</h1>

            <?php
            // Include necessary files
            require_once '../config.php';
            require_once '../model/Utilisateur.php';
            require_once '../controller/utilisateursC.php';
            session_start();

            // Check if form is submitted
            if (
                isset($_POST['pseudo']) && !empty($_POST['pseudo']) &&
                isset($_POST['email']) && !empty($_POST['email']) &&
                isset($_POST['password']) && !empty($_POST['password']) &&
                isset($_POST['password_retype']) && !empty($_POST['password_retype'])
            ) {
                // Retrieve form data
                $pseudo = $_POST['pseudo'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $passwordRetype = $_POST['password_retype'];
                // Create Utilisateur object
                $user = new Utilisateur(null, $pseudo, $email, $password, $passwordRetype, 'user');


                // Create utilisateursC object
                $utilisateursC = new utilisateursC();

                // Call registerUser function
                $registration_result = $utilisateursC->registerUser($user);
                // Handle registration result
                switch ($registration_result) {
                    case 'exists':
                        $reg_err = 'exists';
                        break;
                    case 'password_length':
                        $reg_err = 'password_length';
                        break;
                    case 'password':
                        $reg_err = 'password';
                        break;
                    case 'missing_fields':
                        $reg_err = 'missing_fields';
                        break;
                    case 'success':
                        $reg_err = 'success';
                        break;
                    default:
                        break;
                }
            }

            // Display error/success message if exists
            if (isset($reg_err)) {
                switch ($reg_err) {
                    case 'exists':
                        ?>
                        <div class="alert alert-danger">
                            <strong>Erreur:</strong> User already exists!
                        </div>
                        <?php
                        break;
                    case 'password_length':
                        ?>
                        <div class="alert alert-danger">
                            <strong>Erreur:</strong> Password must be at least 8 characters long!
                        </div>
                        <?php
                        break;
                    case 'password':
                        ?>
                        <div class="alert alert-danger">
                            <strong>Erreur:</strong> Passwords do not match!
                        </div>
                        <?php
                        break;
                    case 'missing_fields':
                        ?>
                        <div class="alert alert-danger">
                            <strong>Erreur:</strong> Please fill in all fields!
                        </div>
                        <?php
                        break;
                    case 'success':
                        ?>
                        <div class="alert alert-success">
                            <strong>Succès:</strong> Registration successful!
                        </div>
                        <?php
                        break;
                    default:
                        break;
                }
            }
            ?>

            <form action="" method="post" onsubmit="return validateForm()">
            <div id="error-container"></div>

                <label for="pseudo">Username:</label><br>
                <input type="text" id="pseudo" name="pseudo"><br>

                <label for="email">Email:</label><br>
                <input type="text" id="email" name="email"><br>

                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password"><br>

                <label for="password_retype">Retype Password:</label><br>
                <input type="password" id="password_retype" name="password_retype"><br>

                <input type="submit" value="Register">
                <p>If you already have an account, <a href="login.php">login here</a>.</p>

            </form>
            <script>
                function validateForm() {
                    var pseudo = document.getElementsByName("pseudo")[0].value;
                    var email = document.getElementsByName("email")[0].value;
                    var password = document.getElementById("password").value;
                    var passwordRetype = document.getElementById("password_retype").value;
                    var errorContainer = document.getElementById("error-container");

                    // Clear previous errors
                    errorContainer.innerHTML = '';

                    // Validate name (pseudo)
                    if (!pseudo.match(/^[a-zA-Z\s]+$/)) {
                        errorContainer.innerHTML += '<div class="alert alert-danger"><strong>Erreur</strong> Le nom doit être une chaîne de caractères.</div>';
                        return false;
                    }

                    // Validate email
                    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!email.match(emailPattern)) {
                        errorContainer.innerHTML += '<div class="alert alert-danger"><strong>Erreur</strong> Veuillez saisir une adresse email valide.</div>';
                        return false;
                    }

                    // Validate password length and complexity
                    if (password.length < 8 || !/\d/.test(password) || !/[a-zA-Z]/.test(password) || !/[^a-zA-Z0-9]/.test(password)) {
                        errorContainer.innerHTML += '<div class="alert alert-danger"><strong>Erreur</strong> Le mot de passe doit comporter au moins 8 caractères et inclure des lettres, des chiffres et des caractères spéciaux.</div>';
                        return false;
                    }

                    // Validate password retype
                    if (password !== passwordRetype) {
                        errorContainer.innerHTML += '<div class="alert alert-danger"><strong>Erreur</strong> Les mots de passe ne correspondent pas.</div>';
                        return false;
                    }

                    return true;
                }
            </script>


        </div>
    </div>
</body>

</html>