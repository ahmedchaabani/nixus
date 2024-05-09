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

        form fieldset {
            margin-bottom: 20px;
        }

        form legend {
            font-weight: bold;
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
        <!-- Question 1: Niveau en informatique -->
        <fieldset>
            <legend>Niveau en informatique</legend>
            <p>Quel est votre niveau en informatique ?</p>
            <input type="radio" id="niveau_debutant" name="niveau" value="débutant">
            <label for="niveau_debutant">Débutant</label><br>
            <input type="radio" id="niveau_intermediaire" name="niveau" value="intermédiaire">
            <label for="niveau_intermediaire">Intermédiaire</label><br>
            <input type="radio" id="niveau_avance" name="niveau" value="avancé">
            <label for="niveau_avance">Avancé</label><br>
        </fieldset>

        <!-- Ajoutez les autres questions ici avec des fieldsets -->
        <!-- Question 2: Expérience en programmation -->
        <fieldset>
            <legend>Expérience en programmation</legend>
            <p>Quel est votre niveau d'expérience en programmation ?</p>
            <input type="radio" id="experience_debutant" name="experience" value="débutant">
            <label for="experience_debutant">Débutant</label><br>
            <input type="radio" id="experience_intermediaire" name="experience" value="intermédiaire">
            <label for="experience_intermediaire">Intermédiaire</label><br>
            <input type="radio" id="experience_avance" name="experience" value="avancé">
            <label for="experience_avance">Avancé</label><br>
        </fieldset>

        <!-- Question 3: Aptitude avec les bases de données -->
        <fieldset>
            <legend>Aptitude avec les bases de données</legend>
            <p>Êtes-vous à l'aise avec les bases de données ?</p>
            <input type="radio" id="bases_de_donnees_oui" name="bases_de_donnees" value="oui">
            <label for="bases_de_donnees_oui">Oui</label><br>
            <input type="radio" id="bases_de_donnees_non" name="bases_de_donnees" value="non">
            <label for="bases_de_donnees_non">Non</label><br>
        </fieldset>

        <!-- Question 4: Préférence pour travailler en équipe -->
        <fieldset>
            <legend>Préférence pour travailler en équipe</legend>
            <p>Préférez-vous travailler en équipe ou seul ?</p>
            <input type="radio" id="travail_equipe" name="travail" value="en équipe">
            <label for="travail_equipe">En équipe</label><br>
            <input type="radio" id="travail_seul" name="travail" value="seul">
            <label for="travail_seul">Seul</label><br>
        </fieldset>

        <!-- Question 5: Connaissances en développement web -->
        <fieldset>
            <legend>Connaissances en développement web</legend>
            <p>Avez-vous des connaissances en développement web ?</p>
            <input type="radio" id="developpement_web_oui" name="developpement_web" value="oui">
            <label for="developpement_web_oui">Oui</label><br>
            <input type="radio" id="developpement_web_non" name="developpement_web" value="non">
            <label for="developpement_web_non">Non</label><br>
        </fieldset>

        <!-- Question 6: Domaine d'intérêt principal -->
        <fieldset>
            <legend>Domaine d'intérêt principal</legend>
            <p>Quel est votre domaine d'intérêt principal ?</p>
            <select name="domaine_interet">
                <option value="développement_web">Développement web</option>
                <option value="intelligence_artificielle">Intelligence artificielle</option>
                <option value="big_data">Big data</option>
                <option value="sécurité_informatique">Sécurité informatique</option>
                <option value="réseaux">Réseaux</option>
            </select><br>
        </fieldset>

        <!-- Question 7: Préférence pour apprendre -->
        <fieldset>
            <legend>Préférence pour apprendre</legend>
            <p>Préférez-vous apprendre de nouvelles technologies ou approfondir vos connaissances dans des domaines connus ?</p>
            <input type="radio" id="apprendre_nouvelles_technologies" name="apprentissage" value="nouvelles technologies">
            <label for="apprendre_nouvelles_technologies">Nouvelles technologies</label><br>
            <input type="radio" id="approfondir_connaissances" name="apprentissage" value="approfondir connaissances">
            <label for="approfondir_connaissances">Approfondir connaissances</label><br>
        </fieldset>

        <!-- Question 8: Préférence pour le type de formation -->
        <fieldset>
            <legend>Préférence pour le type de formation</legend>
            <p>Quel type de formation préférez-vous ?</p>
            <input type="radio" id="type_presentiel" name="type_formation" value="présentiel">
            <label for="type_presentiel">Présentiel</label><br>
            <input type="radio" id="type_distance" name="type_formation" value="à distance">
            <label for="type_distance">À distance</label><br>
        </fieldset>

        <!-- Question 9: Disponibilité -->
        <fieldset>
            <legend>Disponibilité</legend>
            <p>Êtes-vous disponible pour des sessions de formation régulières ?</p>
            <input type="radio" id="disponibilite_oui" name="disponibilite" value="oui">
            <label for="disponibilite_oui">Oui</label><br>
            <input type="radio" id="disponibilite_non" name="disponibilite" value="non">
            <label for="disponibilite_non">Non</label><br>
        </fieldset>

        <!-- Question 10: But de la formation -->
        <fieldset>
            <legend>But de la formation</legend>
            <p>Quel est votre principal objectif avec cette formation ?</p>
            <input type="radio" id="but_carriere" name="but_formation" value="améliorer carrière">
            <label for="but_carriere">Améliorer ma carrière</label><br>
            <input type="radio" id="but_competences" name="but_formation" value="développer compétences">
            <label for="but_competences">Développer mes compétences</label><br>
        </fieldset>

        <button type="submit">Obtenir une réponse</button>
    </form>

    <?php
// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les réponses
    $niveau = isset($_POST['niveau']) ? $_POST['niveau'] : "";
    $experience = isset($_POST['experience']) ? $_POST['experience'] : "";
    $bases_de_donnees = isset($_POST['bases_de_donnees']) ? $_POST['bases_de_donnees'] : "";
    $travail = isset($_POST['travail']) ? $_POST['travail'] : "";
    $developpement_web = isset($_POST['developpement_web']) ? $_POST['developpement_web'] : "";
    $domaine_interet = isset($_POST['domaine_interet']) ? $_POST['domaine_interet'] : "";
    $apprentissage = isset($_POST['apprentissage']) ? $_POST['apprentissage'] : "";
    $type_formation = isset($_POST['type_formation']) ? $_POST['type_formation'] : "";
    $disponibilite = isset($_POST['disponibilite']) ? $_POST['disponibilite'] : "";
    $but_formation = isset($_POST['but_formation']) ? $_POST['but_formation'] : "";

    // Génère une réponse en fonction des réponses
    $reponse = "";

    // Exemple de logique de génération de réponse basée sur les réponses
    if ($niveau == "avancé" && $experience == "avancé" && $bases_de_donnees == "oui" && $travail == "en équipe" && $developpement_web == "oui" && $domaine_interet == "développement_web" && $apprentissage == "nouvelles technologies" && $type_formation == "présentiel" && $disponibilite == "oui" && $but_formation == "améliorer carrière") {
        $reponse = "La formation qui vous convient est Finance et Comptabilité.";
    } elseif ($niveau == "débutant" && $experience == "débutant" && $bases_de_donnees == "non" && $travail == "seul" && $developpement_web == "non" && $domaine_interet == "sécurité_informatique" && $apprentissage == "approfondir connaissances" && $type_formation == "à distance" && $disponibilite == "non" && $but_formation == "développer compétences") {
        $reponse = "La formation qui vous convient est Ressources Humaines et Développement Personnel.";
    } else {
        $reponse = "La formation qui vous convient est Informatique et Technologies de l'Information.";
    }

    // Affiche la réponse
    echo "<p>$reponse</p>";
}
?>

</body>
</html>
