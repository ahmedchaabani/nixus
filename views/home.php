<?php
include '../config.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title><?php echo $data['title'] ?></title> <!--on affiche le contenu de la variable title définit dans le controlleur correspondant-->
        <link href="views/style.css" rel="stylesheet">
   
    </head>
    <body>
        <div style="text-align:center">
            <h1>Acceuil</h1>
            <p>Bienvenue a l'espace reclamations et reponses</p>
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

        <p style="text-align:center">coded by anas ->  anas.ghorch@esprit.tn</p>
    </body>
</html>
