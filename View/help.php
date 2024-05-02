<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'aide</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        form {
            width: 400px;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        form p {
            margin-bottom: 10px;
        }

        form button {
            display: block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Page d'aide</h1>
    <form action="help.php" method="POST">
        <p>Quel est votre niveau en informatique ?</p>
        <input type="radio" id="niveau_debutant" name="niveau" value="débutant">
        <label for="niveau_debutant">Débutant</label><br>
        <input type="radio" id="niveau_intermediaire" name="niveau" value="intermédiaire">
        <label for="niveau_intermediaire">Intermédiaire</label><br>
        <input type="radio" id="niveau_avance" name="niveau" value="avancé">
        <label for="niveau_avance">Avancé</label><br>

        <p>Êtes-vous doué en informatique ?</p>
        <input type="radio" id="doue_oui" name="doue" value="oui">
        <label for="doue_oui">Oui</label><br>
        <input type="radio" id="doue_non" name="doue" value="non">
        <label for="doue_non">Non</label><br>

        <!-- Ajoute d'autres questions ici -->
        <p>Quel est votre niveau d'expérience en programmation ?</p>
        <input type="radio" id="experience_debutant" name="experience" value="débutant">
        <label for="experience_debutant">Débutant</label><br>
        <input type="radio" id="experience_intermediaire" name="experience" value="intermédiaire">
        <label for="experience_intermediaire">Intermédiaire</label><br>
        <input type="radio" id="experience_avance" name="experience" value="avancé">
        <label for="experience_avance">Avancé</label><br>

        <p>Êtes-vous à l'aise avec les bases de données ?</p>
        <input type="radio" id="bases_de_donnees_oui" name="bases_de_donnees" value="oui">
        <label for="bases_de_donnees_oui">Oui</label><br>
        <input type="radio" id="bases_de_donnees_non" name="bases_de_donnees" value="non">
        <label for="bases_de_donnees_non">Non</label><br>

        <p>Préférez-vous travailler en équipe ou seul ?</p>
        <input type="radio" id="travail_equipe" name="travail" value="en équipe">
        <label for="travail_equipe">En équipe</label><br>
        <input type="radio" id="travail_seul" name="travail" value="seul">
        <label for="travail_seul">Seul</label><br>

        <p>Avez-vous des connaissances en développement web ?</p>
        <input type="radio" id="developpement_web_oui" name="developpement_web" value="oui">
        <label for="developpement_web_oui">Oui</label><br>
        <input type="radio" id="developpement_web_non" name="developpement_web" value="non">
        <label for="developpement_web_non">Non</label><br>

        <p>Quel est votre domaine d'intérêt principal ?</p>
        <select name="domaine_interet">
            <option value="développement_web">Développement web</option>
            <option value="intelligence_artificielle">Intelligence artificielle</option>
            <option value="big_data">Big data</option>
            <option value="sécurité_informatique">Sécurité informatique</option>
            <option value="réseaux">Réseaux</option>
        </select><br>

        <p>Préférez-vous apprendre de nouvelles technologies ou approfondir vos connaissances dans des domaines connus ?</p>
        <input type="radio" id="apprendre_nouvelles_technologies" name="apprentissage" value="nouvelles technologies">
        <label for="apprendre_nouvelles_technologies">Nouvelles technologies</label><br>
        <input type="radio" id="approfondir_connaissances" name="apprentissage" value="approfondir connaissances">
        <label for="approfondir_connaissances">Approfondir connaissances</label><br>

        <button type="submit">Obtenir une réponse</button>
    </form>

    <?php
    // Vérifie si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupère les réponses
        $niveau = $_POST['niveau'];
        $doue = $_POST['doue'];

        // Génère une réponse en fonction des réponses
        $reponse = "La formation qui vous convient est la formation en informatique.";
        // Tu peux ajouter des conditions supplémentaires ici en fonction des autres questions

        // Affiche la réponse
        echo "<p>$reponse</p>";
    }
    ?>
</body>
</html>
