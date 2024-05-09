<?php
session_start();
if (empty($_SESSION['user_id'])) {

    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>NEXUS - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <?php
    include '../controller/utilisateursC.php';
    require_once '../config.php';
    $utilisateursC = new utilisateursC();
    $data = $utilisateursC->GetUSER($_SESSION['user_id']);

    ob_start();
    require ('menu.php');
    ?>
    <section id="hero">
    </section>
    <section class="htc__category__area ptb--100">
        <div class="container">
            <h2>mes donneés</h2>

            <div class="row">
                <div class="col-xs-12">
                    <div class="section__title--2 text-center">
                    </div>
                </div>
            </div>
            <div class="htc__product__container">
                <div class="row">
                    <div class="product__list clearfix mt--30">
                        <!-- Start Single Category -->
                        <div class="col-xs-12">


                            <div class="login-form">
                                <?php
                                if (isset($_GET['reg_err'])) {
                                    $err = htmlspecialchars($_GET['reg_err']);

                                    switch ($err) {
                                        case 'success':
                                            ?>
                                            <div class="alert alert-success">
                                                <strong>Succès</strong> password a été modifier
                                            </div>
                                            <?php
                                            break;

                                        case 'password':
                                            ?>
                                            <div class="alert alert-danger">
                                                <strong>Erreur</strong> mot de passe différent
                                            </div>
                                            <?php
                                            break;

                                        case 'email':
                                            ?>
                                            <div class="alert alert-danger">
                                                <strong>Erreur</strong> email non valide
                                            </div>
                                            <?php
                                            break;

                                        case 'email_length':
                                            ?>
                                            <div class="alert alert-success">
                                                <strong>Succès</strong> email a été modifier
                                            </div>
                                            <?php
                                            break;

                                        case 'pseudo_length':
                                            ?>
                                            <div class="alert alert-success">
                                                <strong>Succès</strong> pseudo a été modifier
                                            </div>
                                            <?php
                                            break;

                                        case 'emailandp':
                                            ?>
                                            <div class="alert alert-success">
                                                <strong>Succès</strong> pseudo ou email a été modifier
                                            </div>
                                            <?php
                                            break;

                                        case 'already':
                                            ?>
                                            <div class="alert alert-danger">
                                                <strong>Erreur</strong> email deja existant
                                            </div>

                                            <?php
                                            break;

                                        case 'pasmodif':
                                            ?>
                                            <div class="alert alert-danger">
                                                <strong>Erreur</strong> pas de modification
                                            </div>
                                            <?php
                                            break;

                                        case 'password_length':
                                            ?>
                                            <div class="alert alert-danger">
                                                <strong>Erreur</strong> password trop courte
                                            </div>
                                        <?php


                                    }
                                }
                                ?>
                                <form action="util/modification.php" method="post" onsubmit="return validateForm()">
                                    <div class="form-group">
                                    <div id="error-container"></div>

                                        <input type="text" name="pseudo"
                                            value="<?php echo htmlspecialchars($data['pseudo']); ?>"
                                            class="form-control" onclick="nameValidation()">
                                        <p style="color:red" id="nomEr"></p>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="email"
                                            value="<?php echo htmlspecialchars($data['email']); ?>" class="form-control"
                                            placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="Mot de passe">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password_retype" id="password_retype"
                                            class="form-control" placeholder="Re-tapez le mot de passe">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="modifier" class="btn btn-primary btn-block">
                                        <a href="util/delete_user.php?fromuser=<?php echo htmlspecialchars($_SESSION['user_id']); ?>"
                                            class="btn btn-danger">Delete</a>
                                    </div>
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
                            <!-- End Single Category -->

                            <!-- End Footer Style -->
                        </div>
                        <!-- Body main wrapper end -->
                        <style>
                            .login-form {
                                width: 340px;
                                margin: 50px auto;
                            }

                            .login-form form {
                                background: #f7f7f7;
                                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                                padding: 30px;
                                border-radius: 10px;
                            }

                            .login-form h1 {
                                text-align: center;
                                color: black;
                            }

                            .login-form p {
                                text-align: center;
                            }

                            .login-form label {
                                display: block;
                                margin-bottom: 10px;
                                font-weight: bold;
                            }

                            .login-form input[type="text"],
                            .login-form input[type="email"],
                            .login-form input[type="password"] {
                                width: 100%;
                                padding: 10px;
                                margin-bottom: 20px;
                                border-radius: 5px;
                                border: 1px solid #ccc;
                            }

                            .login-form input[type="submit"] {
                                width: 100%;
                                background-color: #007bff;
                                color: #fff;
                                border: none;
                                padding: 15px;
                                border-radius: 5px;
                                cursor: pointer;
                            }

                            .login-form input[type="submit"]:hover {
                                background-color: #0056b3;
                            }

                            .alert {
                                padding: 15px;
                                margin-bottom: 20px;
                                border-radius: 5px;
                            }

                            .alert-danger {
                                color: #721c24;
                                background-color: #f8d7da;
                                border-color: #f5c6cb;
                            }

                            .alert-success {
                                color: #155724;
                                background-color: #d4edda;
                                border-color: #c3e6cb;
                            }
                        </style>

                        <script type="text/javascript">
                            if (window.history.replaceState) {
                                window.history.replaceState(null, null, "usermodif.php");

                            }

                        </script>
                        <!-- Placed js at the end of the document so the pages load faster -->

                        <!-- jquery latest version -->
                        <script src="js/vendor/jquery-3.2.1.min.js"></script>
                        <!-- Bootstrap framework js -->
                        <script src="js/bootstrap.min.js"></script>
                        <!-- All js plugins included in this file. -->
                        <script src="js/plugins.js"></script>
                        <script src="js/slick.min.js"></script>
                        <script src="js/owl.carousel.min.js"></script>
                        <!-- Waypoints.min.js. -->
                        <script src="js/waypoints.min.js"></script>
                        <!-- Main js file that contents all jQuery plugins activation. -->
                        <script src="js/main.js"></script>

</body>

</html>