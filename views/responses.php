<?php
include '../config.php'; 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title><?php echo $data['title'] ?></title>
    <link rel="stylesheet" type="text/css" href="views/style.css">


    <script type="text/javascript">
        function updateResponse(url) {
            var responseName = window.prompt("Entrez une reponse", "");
            if (responseName != "") {
                window.location.href = url + "/" + responseName;
            }
        }
    </script>

</head>
<body>
    <div style="text-align:center">
        <h1>Responses</h1>
        <p>L'administrateur soumet ses réponses ici</p>
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

    <p>Liste des réponses</p>
    <ul>
        <?php foreach ($responses['responses'] as $response) { ?>
            <li>
                <?php echo $response['response'] ?>
                <a href="<?php echo "javascript:updateResponse('index.php?p=responses/updateResponse/".$response['id']."')" ?>">Modifier</a>
                <a href="<?php echo "index.php?p=responses/deleteResponse/".$response['id'] ?>">Supprimer</a>
            </li>
        <?php } ?>
    </ul>

    <br>

    <p>Ajouter une réponse</p>
    <form action="index.php?p=responses/addResponse" method="post">
        <textarea name="response" rows="6" cols="50" required></textarea>
        <br>
        <button type="submit" name="button">Ajouter</button>
    </form>

    <br>

    <p style="text-align:center">Coded by anas -> anas.ghorch@esprit.tn</p>
</body>
</html>


