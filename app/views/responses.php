<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title><?php echo $data['title'] ?></title> <!--on affiche le contenu de la variable title définit dans le controlleur correspondant-->
    <link rel="stylesheet" type="text/css" href="app\views\style.css">

    <script type="text/javascript">
        //cette fonction nous permet de générer l'url de modification du nom de produit
        function update_responses(url) {
            var response_name = window.prompt("Entrez une reponse", "");
            if (response_name != "") {
                window.location.href = url + "/" + response_name;
            }
        }
    </script>

</head>
<body>
    <div style="text-align:center">
        <h1>Responses</h1>
        <p>l'administrateur soumet ses réponses ici</p>
    </div>

    <p>Menu</p>
    <ul>
        <li> <a href="index.php?p=home">Acceuil</a> </li>
        <li> <a href="index.php?p=responses">responses</a> </li>
        <li> <a href="index.php?p=about">A propos</a> </li>
    </ul>

    <br>

    <p>Liste des reponses</p>
    <ul>
        <!--on affiche la liste des produits contenu dans la variable products définit dans le controlleur-->
        <?php foreach ($data['responses'] as $response) { ?>
            <li>
                <?php echo $response ?>
                <!--on utilise un script javascript pour envoyer la requête de mise à jour du nom du produit-->
                <a href="<?php echo "javascript:update_responses('index.php?p=responses/update_responses/".$response."')" ?>">Modifier</a>
                <a href="<?php echo "index.php?p=responses/delete_responses/".$response ?>">Supprimer</a>
            </li>
        <?php } ?>
    </ul>

    <br>

    <!--l'ajout de nouveau produit dans la base de données se fait grâce â ce formulaire-->
    <!--l'url de redirection sera index.php?p=products/add_products/product, product étant le nom du produit-->
    <p>Ajouter une reponse</p>
    <form action="index.php?p=responses/add_responses" method="post">
        <textarea name="response" rows="6" cols="50" required></textarea>
        <!-- Adjust the rows and cols attributes to set the size of the textarea -->
        <br>
        <button type="submit" name="button">Ajouter</button>
    </form>

    <br>

    <p style="text-align:center">coded by anas ->  anas.ghorch@esprit.tn</p>
    <img src="app/views/imgs/logo.png" alt="Logo" style="display: block; margin: 0 auto;">
</body>
</html>

