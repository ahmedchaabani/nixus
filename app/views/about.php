


<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title><?php echo $data['title'] ?></title> <!--on affiche le contenu de la variable title définit dans le controlleur correspondant-->
        <link rel="stylesheet" type="text/css" href="app\views\style.css">
    </head>
    <body>
        <div style="text-align:center">
            <h1>A propos</h1>
            <p>Nixus Careers, connecter les chemins, creer les futurs!</p>
        </div>

        <p>Menu</p>
        <ul>
            <li> <a href="index.php?p=home">Acceuil</a> </li>
            <li> <a href="index.php?p=responses">responses</a> </li>
            <li> <a href="index.php?p=about">A propos</a> </li>
        </ul>

        <br>

        <p style="text-align:center">coded by anas ->  anas.ghorch@esprit.tn</p>
        <img src="app/views/imgs/logo.png" alt="Logo" style="display: block; margin: 0 auto;">
    </body>
</html>