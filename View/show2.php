<?php
include '../Controller/AtelierC.php';
include '../Model/Atelier.php';

// Vérifie si l'ID de la formation est fourni dans l'URL
// if(isset($_GET['id'])) {
//     $ateC = new AtelierC();
//     $atelier = $ateC->selectAtelier2($_GET['id']);
// }

$ateC = new AtelierC();
$atelier = $ateC->selectAtelier2($_GET['id']);

//var_dump($atelier);

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
            margin-bottom: 20px;
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

        .back-button {
            background-color: #4caf50;
            border: none;
            border-radius: 5px;
            color: #ffffff;
            cursor: pointer;
            font-size: 20px;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #45a049;
        }
        
    </style>
</head>

<body>

    <div class="container">
        <!-- Formations container -->
        <div class="container">
            <!-- Display formation details -->
            <?php foreach($atelier as $e) { ?>
            <div class="atelier-details">
                <h2>Atelier Details</h2>
                <p><strong>Nom:</strong> <?php echo $e['nom_a'] ?></p>
                <p><strong>Dure:</strong> <?php echo $e['dure_a'] ?></p>
                <p><strong>Description:</strong> <?php echo $e['description_a'] ?></p>
                <p><strong>Formateur:</strong> <?php echo $e['formateur_a'] ?></p>
                <p><strong>Niveau:</strong> <?php echo $e['niveau_a'] ?></p>
                <p><strong>ID Utilisateur:</strong> <?php echo $e['id_user'] ?></p>
                <p><strong>Id formation:</strong> <?php echo $e['id_formation'] ?></p>
            </div>
            <?php } ?>

            <!-- Back button -->
            <a href="ListFormations.php" class="back-button">Back</a>
        </div>
        <!-- End of Formations container -->
    </div>

    <script src="../Dashbord/index.js"></script>
</body>

</html>
