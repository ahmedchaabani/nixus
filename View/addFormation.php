<?php

include '../Controller/FormationC.php';
include '../Model/Formation.php';

$forC = new FormationC(); //instance-objet

if(isset($_GET['nom_f'],$_GET['type_f'],$_GET['description_f'],$_GET['etat_f'],$_GET['cout_f'],$_GET['id_user'],$_GET['date_debut'],$_GET['date_fin'])){
    $for = new Formation(null,$_GET['nom_f'],$_GET['type_f'],$_GET['description_f'],$_GET['etat_f'],$_GET['cout_f'],$_GET['id_user'],$_GET['date_debut'],$_GET['date_fin']);
    $forC->addFormation($for);
    header('location:listFormations.php');
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
                /* Styles CSS pour le formulaire */
                label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"],
        textarea {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
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
        <!-- End of Sidebar Section -->
        
        <form method="get" onsubmit="return validateForm()">
    <table>
        <tr>
            <td>Nom :</td>
            <td><input type="text" placeholder="Nom" name="nom_f" id="nom_f"></td>
            <td><span id="nom_error" style="color: red;"></span></td>
        </tr>
        <tr>
            <td>Type de formation :</td>
            <td>
                <select name="type_f" id="type_f">
                    <option value="">Sélectionner un type de formation</option>
                    <option value="Informatique et Technologies de l'Information (IT)">Informatique et Technologies de l'Information (IT)</option>
                    <option value="Management et Leadership">Management et Leadership</option>
                    <option value="Ressources Humaines et Développement Personnel">Ressources Humaines et Développement Personnel</option>
                    <option value="Finance et Comptabilité">Finance et Comptabilité</option>
                </select>
            </td>
            <td><span id="type_error" style="color: red;"></span></td>
        </tr>
        <tr>
            <td>Description :</td>
            <td><input type="text" placeholder="Description" name="description_f" id="description_f"></td>
            <td><span id="description_error" style="color: red;"></span></td>
        </tr>
        <tr>
            <td>État :</td>
            <td>
                <select name="etat_f" id="etat_f" onchange="validateEtat()">
                    <option value="">Sélectionner un état</option>
                    <option value="Terminé">Terminé</option>
                    <option value="Annulé">Annulé</option>
                    <option value="En cours">En cours</option>
                    <option value="Programmé">Programmé</option>
                </select>
            </td>
            <td><span id="etat_error" style="color: red;"></span></td>
        </tr>
        <tr>
            <td>Coût :</td>
            <td><input type="number" placeholder="Cout" name="cout_f" id="cout_f" min="0"></td>
            <td><span id="cout_error" style="color: red;"></span></td>
        </tr>
        <tr>
            <td>ID Utilisateur :</td>
            <td><input type="number" placeholder="ID Utilisateur" name="id_user" id="id_user"></td>
            <td><span id="id_user_error" style="color: red;"></span></td>
        </tr>
        <tr>
            <td>Date de début :</td>
            <td><input type="date" placeholder="Date de début" name="date_debut" id="date_debut"></td>
            <td><span id="date_debut_error" style="color: red;"></span></td>
        </tr>
        <tr>
            <td>Date de fin :</td>
            <td><input type="date" placeholder="Date de fin" name="date_fin" id="date_fin"></td>
            <td><span id="date_fin_error" style="color: red;"></span></td>
        </tr>
        <tr>
            <td colspan="3"><span id="form_error" style="color: red;"></span></td>
        </tr>
        <tr>
            <td colspan="3"><input type="submit" value="Ajouter"></td>
        </tr>
        <script src='../View/controle.js'></script>
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