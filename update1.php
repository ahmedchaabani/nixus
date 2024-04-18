<?php
include 'config.php';

// Check if 'updateid' parameter is set in the URL
if (!isset($_GET['updateid'])) {
    echo "Update ID is missing.";
    exit;
}
$reference = $_GET['updateid'];

// Fetch existing data from the database
$sql = "SELECT * FROM offres WHERE reference=?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, 'i', $reference);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);

// Populate variables with existing data
$refference = $row['reference'];
$qr_code = $row['qr_code'];
$mail = $row['mail'];
$nom_societe = $row['nom_societe'];
$description = $row['description'];
$type_offre = $row['type_offre'];
$salaire = $row['salaire'];

if (isset($_POST['submit'])) {
    $refference = $_POST['refference'];
    $qr_code = $_POST['qr_code'];
    $mail = $_POST['mail'];
    $nom_societe = $_POST['nom_societe'];
    $description = $_POST['description'];
    $type_offre = $_POST['type_offre'];
    $salaire = $_POST['salaire'];

    // Check if any of the required fields are empty
    if (empty($refference) || empty($qr_code) || empty($mail) || empty($nom_societe) || empty($description) || empty($type_offre) || empty($salaire)) {
        echo "All fields are required.";
        $a=1;
        //exit;
    }

    // Use prepared statement to prevent SQL injection
    $sql = "UPDATE offres SET reference=?, qr_code=?, mail=?, nom_societe=?, description=?, type_offre=?, salaire=? WHERE reference=?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, 'sssssssi', $refference, $qr_code, $mail, $nom_societe, $description, $type_offre, $salaire, $reference);
    $result = mysqli_stmt_execute($stmt);
    if ($result && $a!=1) {
        //echo "Data updated successfully";
        header('location:display.php');
    } else {
        die(mysqli_error($con));
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>offres</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <form method="post">
        <div class="mb-3">
            <label>Reference</label>
            <input type="text" class="form-control" placeholder="Enter your Reference" name="refference"
                   autocomplete="off" value="<?php echo $refference; ?>">
        </div>
        <div class="mb-3">
            <label>Qr Code</label>
            <input type="text" class="form-control" placeholder="Enter your qr code" name="qr_code"
                   autocomplete="off" value="<?php echo $qr_code; ?>">
        </div>
        <div class="mb-3">
            <label>Mail</label>
            <input type="email" class="form-control" placeholder="Enter your email" name="mail" autocomplete="off" value="<?php echo $mail; ?>">
        </div>
        <div class="mb-3">
            <label>Nom du Societe</label>
            <input type="text" class="form-control" placeholder="Enter the name of the company" name="nom_societe"
                   autocomplete="off" value="<?php echo $nom_societe; ?>">
        </div>
        <div class="mb-3">
            <label>Description</label>
            <input type="text" class="form-control" placeholder="Enter the Description" name="description"
                   autocomplete="off" value="<?php echo $description; ?>">
        </div>
        <div class="mb-3">
            <label>Type of Offer</label>
            <input type="text" class="form-control" placeholder="Enter the type of offer" name="type_offre"
                   autocomplete="off" value="<?php echo $type_offre; ?>">
        </div>
        <div class="mb-3">
            <label>Salaire</label>
            <input type="text" class="form-control" placeholder="Enter Salary" name="salaire" autocomplete="off" value="<?php echo $salaire; ?>">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>
</div>
</body>
</html>
