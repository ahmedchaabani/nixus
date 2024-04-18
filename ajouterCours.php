<html>
<head>
    <title>Ajouter offres</title>
</head>
<body>
    <h1>Ajouter offres</h1>
    <form method="POST" action="verification.php">
        <label for="reference">ID:</label>
        <input type="text" id="reference" name="reference" required><br><br>
        
        <label for="nom_societe">nom_societe:</label>
        <input type="text" id="nom_societe" name="nom_societe" required><br><br>
        
        <label for="description">description:</label>
        <input type="text" id="description" name="description" required><br><br>
        
        <label for="salaire">salaire:</label>
        <input type="text" id="salaire" name="salaire" required><br><br>
        
        <label for="mail">mail:</label>
        <input type="text" id="mail" name="mail" required><br><br>
        
        <label for="type_offre">type_offre:</label>
        <input type="text" id="type_offre" name="type_offre" required><br><br>
        
        <label for="qr_code">qr_code:</label>
        <input type="text" id="qr_code" name="qr_code" required><br><br>
        
        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
    </form>
</body>
</html>