<?php
include '../Controller/FormationC.php';
include '../Model/Formation.php';

// Vérifie si l'ID de la formation est fourni dans l'URL
if(isset($_GET['id'])) {
    $forC = new FormationC();
    $formation = $forC->selectFormation($_GET['id']);
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
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 600px;
            width: 100%;
            text-align: center;
        }

        .formation-details {
            text-align: center;
            margin: 0 auto 20px;
            max-width: 800px;
        }

        .formation-details h2 {
            color: #333333;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .formation-details p {
            color: #666666;
            font-size: 18px;
            margin-bottom: 5px;
        }

        .button-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }

        .back-button, .show-button {
    padding: 5px 10px; /* Réduire le padding vertical */
    font-size: 14px;
    border-radius: 100px; /* Garder la bordure arrondie */
}


        .back-button {
            background-color: #4caf50;
            color: #ffffff;
            border: none;
            margin-right: 100px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .show-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            text-decoration: none;
            margin-left: 10px;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #45a049;
        }

        .show-button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Formations container -->
        <div class="container">
            <!-- Display formation details -->
            <?php if(isset($formation)) { ?>
            <div class="formation-details">
                <h2>Formation Details</h2>
                <p><strong>Nom:</strong> <?php echo $formation['nom_f'] ?></p>
                <p><strong>Type:</strong> <?php echo $formation['type_f'] ?></p>
                <p><strong>Description:</strong> <?php echo $formation['description_f'] ?></p>
                <p><strong>État:</strong> <?php echo $formation['etat_f'] ?></p>
                <p><strong>Coût:</strong> <?php echo $formation['cout_f'] ?></p>
                <p><strong>ID Utilisateur:</strong> <?php echo $formation['id_user'] ?></p>
                <p><strong>Date de début:</strong> <?php echo $formation['date_debut'] ?></p>
                <p><strong>Date de fin:</strong> <?php echo $formation['date_fin'] ?></p>
            </div>
            <?php } ?>

            <!-- Back button -->
            <div class="button-container">
    <a href="ListFormations.php" class="back-button">Back to list formations </a>
    <a href="show2.php?id=<?php echo $_GET['id'] ?>" class="show-button">Show les ateliers </a>
</div>



        </div>
        <!-- End of Formations container -->
    </div>

    <script src="../Dashbord/index.js"></script>
</body>

</html>
