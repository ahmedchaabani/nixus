<?php
include '../config.php';
include '../Controller/reclamationsC.php'; // Include the controller file

// Create an instance of the controller
$reclamationsController = new reclamationsC();

// Call the method to fetch reclamations data
$reclamations = $reclamationsController->listReclamations();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title><?php echo $data['title'] ?></title>
    <link rel="stylesheet" type="text/css" href="views/style.css">


    <script type="text/javascript">
        function updateReclamation(url) {
            var reclamationText = window.prompt("Entrez une réclamation", "");
            if (reclamationText != "") {
                window.location.href = url + "/" + reclamationText;
            }
        }

        function triReclamationsByDate(url) {
            window.location.href = url;
        }
    </script>

</head>
<body>
    <div style="text-align:center">
        <h1>Réclamations</h1>
        <p>L'administrateur soumet ses réclamations ici</p>
    </div>

    <p>Menu</p>
    <!-- Update links to use absolute paths -->
    <ul>
        <li><a href="/WEBjdid/views/home.php">Accueil</a></li>
        <li><a href="/WEBjdid/views/reclamations.php">Réclamations</a></li>
        <li><a href="/WEBjdid/views/responses.php">Réponses</a></li>
        <li><a href="/WEBjdid/views/about.php">À propos</a></li>
    </ul>

    <br>

    <p>Liste des réclamations</p>
    <ul>
        <?php 
            foreach ($reclamations as $reclamation) { ?>
            <li>
                <?php echo $reclamation['reclamation'] ?>
                <!-- Adjust URLs to work with reclamations -->
                <a href="<?php echo "javascript:updateReclamation('index.php?p=reclamations/updateReclamation/".$reclamation['id']."')" ?>">Modifier</a>
                <a href="<?php echo "index.php?p=reclamations/deleteReclamation/".$reclamation['id'] ?>">Supprimer</a>
            </li>
        <?php } ?>
    </ul>

    <br>

    <!-- Add button to sort reclamations by date -->
    <button onclick="triReclamationsByDate('index.php?p=reclamations/triReclamationsByDate')">Trier par date</button>

    <br>

    <p>Ajouter une réclamation</p>
    <form action="index.php?p=reclamations/addReclamation" method="post">
        <textarea name="reclamation" rows="6" cols="50" required></textarea>
        <br>
        <button type="submit" name="button">Ajouter</button>
    </form>

    <br>

    <p style="text-align:center">Codé par Anas -> anas.ghorch@esprit.tn</p>
</body>
</html>

