<?php

include '../Controller/FormationC.php';
include '../Model/Formation.php';
include '../View/jj.js';
$forC = new FormationC();
$result = null;

// Vérifier si $_GET['id'] est défini
if(isset($_GET['id'])) {
    $result = $forC->getformation($_GET['id']);
}

if ($result && isset($_POST['nom_f'], $_POST['type_f'], $_POST['description_f'], $_POST['etat_f'], $_POST['cout_f'], $_POST['id_user'], $_POST['date_debut'], $_POST['date_fin'])) {
    if (!empty($_POST['nom_f']) && !empty($_POST['type_f']) && !empty($_POST['description_f']) && !empty($_POST['etat_f']) &&  !empty($_POST['cout_f']) && !empty($_POST['id_user']) && !empty($_POST['date_debut']) && !empty($_POST['date_fin'])) {
        
        $for = new Formation(null, $_POST['nom_f'], $_POST['type_f'], $_POST['description_f'], $_POST['etat_f'] , $_POST['cout_f'],$_POST['id_user'],$_POST['date_debut'],$_POST['date_fin']);

        $forC->updateFormation($_GET['id'],$for);

        header('Location:./ListFormations.php');
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
                <a href="ListFormations.php" class="active" onclick="toggleOptions()">
                    <span class="material-icons-sharp">
                        inventory
                    </span>
                    <h3>Formation</h3>
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
            <td><label for="nom_f">Nom de la formation:</label></td>
            <td><input type="text" name="nom_f" id="nom_f" value="<?php echo isset($result['nom_f']) ? htmlspecialchars($result['nom_f']) : '' ?>"></td>
            <td><span id="nom_error" style="color: red;"></span></td>
        </tr>
        <tr>
            <td><label for="type_f">Type de la formation:</label></td>
            <td>
                <select name="type_f" id="type_f">
                    <option value="">Sélectionner un type de formation</option>
                    <option value="Informatique et Technologies de l'Information (IT)" <?php echo (isset($result['type_f']) && $result['type_f'] === "Informatique et Technologies de l'Information (IT)") ? 'selected' : '' ?>>Informatique et Technologies de l'Information (IT)</option>
                    <option value="Management et Leadership" <?php echo (isset($result['type_f']) && $result['type_f'] === "Management et Leadership") ? 'selected' : '' ?>>Management et Leadership</option>
                    <option value="Ressources Humaines et Développement Personnel" <?php echo (isset($result['type_f']) && $result['type_f'] === "Ressources Humaines et Développement Personnel") ? 'selected' : '' ?>>Ressources Humaines et Développement Personnel</option>
                    <option value="Finance et Comptabilité" <?php echo (isset($result['type_f']) && $result['type_f'] === "Finance et Comptabilité") ? 'selected' : '' ?>>Finance et Comptabilité</option>
                </select>
            </td>
            <td><span id="type_error" style="color: red;"></span></td>
        </tr>
        <tr>
            <td><label for="description_f">Description de la formation:</label></td>
            <td><input type="text" name="description_f" id="description_f" value="<?php echo isset($result['description_f']) ? htmlspecialchars($result['description_f']) : '' ?>"></td>
            <td><span id="description_error" style="color: red;"></span></td>
        </tr>
        <tr>
            <td><label for="etat_f">État de la formation :</label></td>
            <td>
                <select name="etat_f" id="etat_f">
                    <option value="">Sélectionner un état</option>
                    <option value="Terminé" <?php echo (isset($result['etat_f']) && $result['etat_f'] === "Terminé") ? 'selected' : ''; ?>>Terminé</option>
                    <option value="Annulé" <?php echo (isset($result['etat_f']) && $result['etat_f'] === "Annulé") ? 'selected' : ''; ?>>Annulé</option>
                    <option value="En cours" <?php echo (isset($result['etat_f']) && $result['etat_f'] === "En cours") ? 'selected' : ''; ?>>En cours</option>
                    <option value="Programmé" <?php echo (isset($result['etat_f']) && $result['etat_f'] === "Programmé") ? 'selected' : ''; ?>>Programmé</option>
                </select>
            </td>
            <td><span id="etat_error" style="color: red;"></span></td>
        </tr>
        <tr>
            <td><label for="cout_f">Cout de la formation:</label></td>
            <td><input type="text" name="cout_f" id="cout_f" value="<?php echo isset($result['cout_f']) ? htmlspecialchars($result['cout_f']) : '' ?>"></td>
            <td><span id="cout_error" style="color: red;"></span></td>
        </tr>
        <tr>
            <td><label for="id_user">Id de l'utilisateur:</label></td>
            <td><input type="text" name="id_user" id="id_user" value="<?php echo isset($result['id_user']) ? htmlspecialchars($result['id_user']) : '' ?>"></td>
            <td><span id="id_user_error" style="color: red;"></span></td>
        </tr>
        <tr>
            <td><label for="date_debut">Date début de la formation:</label></td>
            <td><input type="date" name="date_debut" id="date_debut" value="<?php echo isset($result['date_debut']) ? $result['date_debut'] : '' ?>"></td>
            <td><span id="date_debut_error" style="color: red;"></span></td>
        </tr>
        <tr>
            <td><label for="date_fin">Date fin de la formation:</label></td>
            <td><input type="date" name="date_fin" id="date_fin" value="<?php echo isset($result['date_fin']) ? $result['date_fin'] : '' ?>"></td>
            <td><span id="date_fin_error" style="color: red;"></span></td>
        </tr>
        <tr>
            <td><input type="submit" value="OK"></td>
        </tr>
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