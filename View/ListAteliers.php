<?php
include '../Controller/AtelierC.php';

$ateC = new AtelierC(); //instance-objet

$result = $ateC->listAteliers();
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
        /* Add these styles to your existing CSS or style.css file */
        /* Formations container */
        .formations-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        /* Formation item */
        .formation-item {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
        }

        /* Button container */
        .button-container {
            margin-top: 20px;
        }

        /* Update and delete buttons */
        .update-button,
        .delete-button {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-right: 10px;
            transition: background-color 0.3s;
        }

        .update-button:hover,
        .delete-button:hover {
            background-color: #45a049;
        }

        /* Add button */
        .add-button {
            background-color: #007bff;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .add-button:hover {
            background-color: #0056b3;
        }
        .atelier-item {
    margin-bottom: 20px; /* Ajoute une marge inférieure entre chaque atelier */
    padding: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.atelier-details {
    margin-bottom: 10px;
}

.more-details p {
    margin-bottom: 5px;
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

        <!-- Formations container -->
        <div class="ateliers-container">

        <?php foreach ($result as $row) { ?>
    <div class="atelier-item">
        <h3>ID de l'atelier : <?php echo $row['id'] ?></h3>
        <hr>
        <div class="atelier-details">
            <p><strong>Nom de l'atelier:</strong> <?php echo $row['nom_a'] ?></p>
            <p><strong>Durée de l'atelier:</strong> <?php echo $row['dure_a'] ?></p>
        </div>

                    <div class="button-container">
                        <button class="update-button"><a href="updateAtelier.php?id=<?php echo $row['id'] ?>">Update</a></button>
                        <button class="delete-button"><a href="deleteAtelier.php?id=<?php echo $row['id'] ?>">Delete</a></button>
                        <button class="delete-button"><a href="showAtelier.php?id=<?php echo $row['id'] ?>">Show</a></button>

                    </div>
                </div>
            <?php } ?>
        </div>
        <!-- End of Formations container -->

        <!-- Right Section -->
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

            <a href="addAtelier.php" class="user-profile">
    <div class="logo">
        <img src="images/logo.png">
        <h2>Add</h2>
        <p>New Atelier</p>
    </div>
</a>


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
        <!-- End of Right Section -->

    </div>

    <script src="../Dashbord/index.js"></script>
</body>

</html>
