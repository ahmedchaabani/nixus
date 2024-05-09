<?php

include '../Controller/AtelierC.php';
include '../Model/Atelier.php';

$ateC = new AtelierC(); //instance-objet

if(isset($_GET['nom_a'],$_GET['dure_a'],$_GET['description_a'],$_GET['formateur_a'],$_GET['niveau_a'],$_GET['id_user'],$_GET['id_formation'])){
    $ate = new Atelier(null,$_GET['nom_a'],$_GET['dure_a'],$_GET['description_a'],$_GET['formateur_a'],$_GET['niveau_a'],$_GET['id_user'],$_GET['id_formation']);
    $ateC->addAtelier($ate);
    header('location:listAteliers.php');
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
        
        .error-message {
    color: red;
    font-size: 0.8em; /* Taille de police plus petite */
}

.error-message::before {
    content: "⚠ "; /* Ajoute un symbole d'avertissement devant le message */
}

input[type="text"],
select,
input[type="date"] {
    margin-bottom: 10px; /* Espace entre les champs */
}

table {
    border-collapse: collapse; /* Fusionner les bordures de tableau */
}

table td {
    padding: 5px; /* Ajouter un peu d'espace autour des cellules */
}

           
        /* Style des messages d'erreur */
        .error-message {
            color: red;
            font-size: 14px;
        }
   
        /* Form styles */
        form {
            max-width: 1000px;
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
        .form-container {
    max-width: 1000px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
}

.form-group input[type="text"],
.form-group textarea,
.form-group select,
.form-group button {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 16px;
}

.form-group textarea {
    height: 100px;
}

.form-group button {
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s;
}

.form-group button:hover {
    background-color: #45a049;
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
        <!-- End of Sidebar Section -->
        
        <form method="get" onsubmit="return validateForm()">
    <table>
        <tr>
            <td>Nom :</td>
            <td><input type="text" placeholder="Nom" name="nom_a" id="nom_a"></td>
            <td><span id="nom_error" style="color: red;"></span></td>
        </tr>
        <tr>
        <tr>
            <td>Dure :</td>
            <td><input type="text" placeholder="Dure" name="dure_a" id="dure_a"></td>
            <td><span id="dure_error" style="color: red;"></span></td>
        </tr>
        <tr>
            <td>Description :</td>
            <td><input type="text" placeholder="Description" name="description_a" id="description_a"></td>
            <td><span id="description_error" style="color: red;"></span></td>
        </tr>
        <tr>
                <td>Formateur :</td>
                <td>
                    <select name="formateur_a" id="formateur_a">
                        <option value="">Sélectionner un formateur</option>
                        <option value="Monsieur Oussama">Monsieur Oussama</option>
                        <option value="Madame Imen">Madame Imen</option>
                        <option value="Monsieur Dadi">Monsieur Dadi</option>
                    </select>
                </td>
                <td><span id="formateur_error" style="color: red;"></span></td>
            </tr>

            <tr>
    <td>Niveau :</td>
    <td>
        <select name="niveau_a" id="niveau_a">
            <option value="">Sélectionner un niveau</option>
            <option value="Débutant">Débutant</option>
            <option value="Intermédiaire">Intermédiaire</option>
            <option value="Avancé">Avancé</option>
        </select>
    </td>
    <td><span id="niveau_error" style="color: red;"></span></td>
</tr>


        <tr>
            <td>ID Utilisateur :</td>
            <td><input type="number" placeholder="ID Utilisateur" name="id_user" id="id_user"></td>
            <td><span id="id_user_error" style="color: red;"></span></td>
        </tr>
        <tr>
            <td>ID formation :</td>
            <td><input type="number" placeholder="ID formation" name="id_formation" id="id_formation"></td>
            <td><span id="id_formation_error" style="color: red;"></span></td>
        </tr>

        <tr>
            <td colspan="3"><span id="form_error" style="color: red;"></span></td>
        </tr>
        <tr>
            <td colspan="3"><input type="submit" value="Ajouter"></td>
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

            <a href="ListAteliers.php" class="user-profile">
    <div class="logo">
        <img src="images/logo.png">
        <h2>Back</h2>
        <p>To list Ateliers</p>
    </div>
</a>
<a href="ListFormations.php" class="user-profile">
    <div class="logo">
        <img src="images/logo.png">
        <h2>Back</h2>
        <p>To list Formations</p>
    </div>
</a>

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