<?php

include '../Controller/AtelierC.php';
include '../Model/Atelier.php';

$ateC = new AtelierC();
$result = null;

// Vérifier si $_GET['id'] est défini
if(isset($_GET['id'])) {
    $result = $ateC->getatelier($_GET['id']);
}

if ($result && isset($_POST['nom_a'], $_POST['dure_a'], $_POST['description_a'], $_POST['formateur_a'], $_POST['niveau_a'], $_POST['id_user'], $_POST['id_formation'])) {
    if (!empty($_POST['nom_a']) && !empty($_POST['dure_a']) && !empty($_POST['description_a']) && !empty($_POST['formateur_a']) &&  !empty($_POST['niveau_a']) && !empty($_POST['id_user']) && !empty($_POST['id_formation']) ) {
        
        $ate = new Atelier(null, $_POST['nom_a'], $_POST['dure_a'], $_POST['description_a'], $_POST['formateur_a'] , $_POST['niveau_a'],$_POST['id_user'],$_POST['id_formation']);

        $ateC->updateAtelier($_GET['id'],$ate);

        header('Location:./ListAteliers.php');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="../Dashbord/style.css">
    <title>Nixus Dashboard</title>
    <style>
        
        /* Form styles */
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form input[type="text"],
        form input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        form input[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            form {
                width: 80%;
            }
        }
    </style>
    

</head>

<body>

    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">
                    <img src="images/logo.png">
                    <h2>Nixus<span class="danger"></span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="#">
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <h3>Dashboard</h3>
                </a>
                <a href="ListAteliers.php" class="active" onclick="toggleOptions()">
                    <span class="material-icons-sharp">
                        inventory
                    </span>
                    <h3>Atelier</h3>
                </a>
                
                <a href="#">
                    <span class="material-icons-sharp">
                        person_outline
                    </span>
                    <h3>Users</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        receipt_long
                    </span>
                    <h3>offres</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        forum
                    </span>
                    <h3>forum</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        report_gmailerrorred
                    </span>
                    <h3>Reclamation</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        settings
                    </span>
                    <h3>Settings</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        add
                    </span>
                    <h3>New Login</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
   
        <form method="post" onsubmit="return validateForm()">
    <table>
        <tr>
            <td><label for="nom_a">Nom de l'atelier :</label></td>
            <td><input type="text" name="nom_a" id="nom_a" value="<?php echo isset($result['nom_a']) ? htmlspecialchars($result['nom_a']) : '' ?>"></td>
            <td><span id="nom_error" style="color: red;"></span></td>
        </tr>
        <tr>
            <td><label for="dure_a">Durée de l'atelier :</label></td>
            <td><input type="text" name="dure_a" id="dure_a" value="<?php echo isset($result['dure_a']) ? htmlspecialchars($result['dure_a']) : '' ?>"></td>
            <td><span id="dure_error" style="color: red;"></span></td>
        </tr>
        <tr>
            <td><label for="description_a">Description de l'atelier :</label></td>
            <td><input type="text" name="description_a" id="description_a" value="<?php echo isset($result['description_a']) ? htmlspecialchars($result['description_a']) : '' ?>"></td>
            <td><span id="description_error" style="color: red;"></span></td>
        </tr>
        <tr>
            <td><label for="formateur_a">Formateur de l'atelier :</label></td>
            <td>
                <select name="formateur_a" id="formateur_a">
                    <option value="">Sélectionner un formateur</option>
                    <option value="Monsieur Oussama" <?php echo (isset($result['formateur_a']) && $result['formateur_a'] === "Monsieur Oussama") ? 'selected' : '' ?>>Monsieur Oussama</option>
                    <option value="Madame Imen" <?php echo (isset($result['formateur_a']) && $result['formateur_a'] === "Madame Imen") ? 'selected' : '' ?>>Madame Imen</option>
                    <option value="Monsieur Dadi" <?php echo (isset($result['formateur_a']) && $result['formateur_a'] === "Monsieur Dadi") ? 'selected' : '' ?>>Monsieur Dadi</option>
                </select>
            </td>
            <td><span id="formateur_error" style="color: red;"></span></td>
        </tr>
        <tr>
            <td><label for="niveau_a">Niveau de l'atelier :</label></td>
            <td>
                <select name="niveau_a" id="niveau_a">
                    <option value="">Sélectionner un niveau</option>
                    <option value="Débutant" <?php echo (isset($result['niveau_a']) && $result['niveau_a'] === "Débutant") ? 'selected' : '' ?>>Débutant</option>
                    <option value="Intermédiaire" <?php echo (isset($result['niveau_a']) && $result['niveau_a'] === "Intermédiaire") ? 'selected' : '' ?>>Intermédiaire</option>
                    <option value="Avancé" <?php echo (isset($result['niveau_a']) && $result['niveau_a'] === "Avancé") ? 'selected' : '' ?>>Avancé</option>
                </select>
            </td>
            <td><span id="niveau_error" style="color: red;"></span></td>
        </tr>
        <tr>
            <td><label for="id_user">ID Utilisateur :</label></td>
            <td><input type="number" name="id_user" id="id_user" value="<?php echo isset($result['id_user']) ? htmlspecialchars($result['id_user']) : '' ?>"></td>
            <td><span id="id_user_error" style="color: red;"></span></td>
        </tr>
        <tr>
            <td><label for="id_formation">ID de l'atelier :</label></td>
            <td><input type="number" name="id_formation" id="id_formation" value="<?php echo isset($result['id_formation']) ? htmlspecialchars($result['id_formation']) : '' ?>"></td>
            <td><span id="id_formation_error" style="color: red;"></span></td>
        </tr>
        <tr>
            <td colspan="3"><input type="submit" value="OK"></td>
        </tr>
        <script src='../View/controlee.js'></script>
    </table>
</form>






<div class="right-section">
            <div class="nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
                <div class="dark-mode">
                    <span class="material-icons-sharp active">
                        light_mode
                    </span>
                    <span class="material-icons-sharp">
                        dark_mode
                    </span>
                </div>

                <div class="profile">
                    <div class="info">
                        <p>Hey, <b>Reza</b></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="images/profile-1.jpg">
                    </div>
                </div>

            </div>
            <!-- End of Nav -->

            <div class="user-profile">
                <div class="logo">
                    <img src="images/logo.png">
                    <h2>AsmrProg</h2>
                    <p>Fullstack Web Developer</p>
                </div>
            </div>

            <div class="reminders">
                <div class="header">
                    <h2>Reminders</h2>
                    <span class="material-icons-sharp">
                        notifications_none
                    </span>
                </div>

                <div class="notification">
                    <div class="icon">
                        <span class="material-icons-sharp">
                            volume_up
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>Workshop</h3>
                            <small class="text_muted">
                                08:00 AM - 12:00 PM
                            </small>
                        </div>
                        <span class="material-icons-sharp">
                            more_vert
                        </span>
                    </div>
                </div>

                <div class="notification deactive">
                    <div class="icon">
                        <span class="material-icons-sharp">
                            edit
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>Workshop</h3>
                            <small class="text_muted">
                                08:00 AM - 12:00 PM
                            </small>
                        </div>
                        <span class="material-icons-sharp">
                            more_vert
                        </span>
                    </div>
                </div>

                <div class="notification add-reminder">
                    <div>
                        <span class="material-icons-sharp">
                            add
                        </span>
                        <h3>Add Reminder</h3>
                    </div>
                </div>

            </div>

        </div>


    </div>

    <script src="../Dashbord/index.js"></script>
</body>

</html>