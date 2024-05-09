<?php
        // Include necessary files
        require_once '../config.php';
        require_once '../model/Utilisateur.php';
        require_once '../controller/utilisateursC.php';
        session_start();

        if (
            isset($_POST['email']) && !empty($_POST['email']) &&
            isset($_POST['password']) && !empty($_POST['password']) 
        ) {
            // Retrieve form data
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Create Utilisateur object
            $user = new Utilisateur(null, null, $email, $password,null, null);
            // Set email and password using setters
            $user->setEmail($email);
            $user->setPassword($password);

            // Create UtilisateursC object
            $utilisateursC = new UtilisateursC();

            // Call loginUser function
            $login_result = $utilisateursC->loginUser($user);

            // Handle login result
            switch ($login_result) {
                case 'not_exist':
                    header('Location: login.php?login_err=not_exist');
                    exit();
                case 'wrong_password':
                    header('Location: login.php?login_err=wrong_password');
                    exit();
                case 'unknown_role':
                    header('Location: login.php?login_err=unknown_role');
                    exit();
                case 'admin':
                    header('Location: admin/index.php');
                    exit();
                case 'user':
                    header('Location: usermodif.php');
                    exit();
                default:
                    break;
            }
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
            <h1>Sign Up Now !</h1>
            <?php
                // Check if there is any login error message
                if (isset($_GET['login_err'])) {
                    $login_err = $_GET['login_err'];
                    switch ($login_err) {
                        case 'not_exist':
                            ?>
                            <div class="alert alert-danger">
                                <strong>Error:</strong> User does not exist!
                            </div>
                            <?php
                            break;
                        case 'wrong_password':
                            ?>
                            <div class="alert alert-danger">
                                <strong>Error:</strong> Incorrect password!
                            </div>
                            <?php
                            break;
                        case 'unknown_role':
                            ?>
                            <div class="alert alert-danger">
                                <strong>Error:</strong> Unknown user role!
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

                <label for="email">Email:</label><br>
                <input type="text" id="email" name="email"><br>
                
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password"><br>
                
                <input type="submit" value="Login">
                <p>If you don't have an account yet, <a href="register.php"> register here </a>.</p>
                <p>If you forgot your password, <a href="forgetpassword.php"> forget password </a>.</p>

            </form>
            <script>
                function validateForm() {
                    var email = document.getElementsByName("email")[0].value;
                    var errorContainer = document.getElementById("error-container");

                    // Clear previous errors
                    errorContainer.innerHTML = '';

                    // Validate email
                    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!email.match(emailPattern)) {
                        errorContainer.innerHTML += '<div class="alert alert-danger"><strong>Erreur</strong> Veuillez saisir une adresse email valide.</div>';
                        return false;
                    }

                    return true;
                }
            </script>

        </div>
    </div>


</body>
</html>
