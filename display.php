<link rel="stylesheet" href="stylesheet.css">

<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud operations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <button class= "btn btn-primary my_5"><a href="offres.php" class="text-light">Ajout Offres</a></button>
        <table class="table">
            <thead>
            <tr>
      <th scope="col">Reference</th>
      <th scope="col">Nom du Societe</th>
      <th scope="col">Description</th>
      <th scope="col">Email</th>
      <th scope="col">Type d'Offre</th>
      <th scope="col">Salaire</th>
      <th scope="col">QR Code</th>
      <th scope="col">operations</th>
    </tr>
            </thead>
            <tbody>
            <?php
                $sql = "SELECT * FROM offres"; // Remove the single quotes around 'nixus'
                $result = mysqli_query($con, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $reference = $row['reference'];
                        $nom_societe = $row['nom_societe'];
                        $description = $row['description'];
                        $mail = $row['mail'];
                        $type_offre = $row['type_offre'];
                        $salaire = $row['salaire'];
                        $qr_code = $row['qr_code'];
                        echo '<tr>
                            <th scope="row">' . $reference . '</th>
                            <td>' . $nom_societe . '</td>
                            <td>' . $description . '</td>
                            <td>' . $mail . '</td>
                            <td>' . $type_offre . '</td>
                            <td>' . $salaire . '</td>
                            <td>' . $qr_code . '</td>
                            <td>
                            <button class="btn btn-primary"><a href="update1.php? updateid='.$reference.'" class="text-light">Update</a></button>
                            <button class="btn btn-danger"><a href="delete.php? deleteid='.$reference.'" class="text-light">Delete</a></button>
                            </td>
                        </tr>';
                    }
                }
                ?>
                
            </tbody>
        </table>
    </div>
</body>
</html>
