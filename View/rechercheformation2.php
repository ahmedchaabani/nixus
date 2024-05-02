<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de recherche de formation</title>
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

        .container {
            width: 300px;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            font-size: 18px; /* Augmenter la taille de la police */
        }

        input[type="text"] {
            width: calc(100% - 22px); /* Largeur - largeur de la bordure et du remplissage */
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50; /* Couleur verte */
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
        }

        button[type="submit"]:hover {
            background-color: #45a049; /* Légère modification de la couleur au survol */
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="showFormation3.php" method="GET">
            <label for="id">ID de la formation :</label>
            <input type="text" id="id" name="id">
            <button type="submit">Rechercher</button>
        </form>
    </div>
</body>
</html>
