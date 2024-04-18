<?php
include 'config.php';

$errors = [];

if(isset($_POST['submit'])){
    // Server-side validation
    $refference=$_POST['refference'];
    $qr_code=$_POST['qr_code'];
    $mail=$_POST['mail'];
    $nom_societe=$_POST['nom_societe'];
    $description=$_POST['description'];
    $type_offre=$_POST['type_offre'];
    $salaire=$_POST['salaire'];

    // Reference validation
    if(strlen($refference) < 1) {
        $errors[] = "Reference should be at least 1 character long.";
    }

    
    // Email validation
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Description validation
    if(strlen($description) < 50 || strlen($description) > 250) {
        $errors[] = "Description should be between 50 and 250 characters long.";
    }

    // Type offre validation
    $valid_type_offre = ["remote", "part time-job", "full time-job", "freelance"];
    if(!in_array($type_offre, $valid_type_offre)) {
        $errors[] = "Type d'offre should be remote, part time-job, full time-job, or freelance.";
    }

    // Salaire validation
    if(!preg_match('/\d+\$/', $salaire)) {
        $errors[] = "Salaire should end with a dollar sign or any money sign.";
    }

    if(empty($errors)) {
        $sql = "INSERT INTO offres (reference, qr_code, mail, nom_societe, description, type_offre, salaire) 
        VALUES ('$refference', '$qr_code', '$mail', '$nom_societe', '$description', '$type_offre', '$salaire')";

        $result=mysqli_query($con,$sql);
        if($result){
            //echo "Data inserted successfully";
            header('location:display.php');
        }else{
            die(mysqli_error($con));
        }
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>offres</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
    <?php if(!empty($errors)): ?>
        <div class="alert alert-danger" role="alert">
            <ul>
                <?php foreach($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <form method="post">
  <div class="mb-3">
    <label >Referrence</label>
    <input type="text" class="form-control" placeholder="Entrer votre Referrence" name="refference" autocomplete="off" required>
  </div>
  <div class="mb-3">
    <label >Qr Code</label>
    <input type="text" class="form-control" value="<?php echo isset($qr_code) ? $qr_code : ''; ?>" name="qr_code" autocomplete="off" required>
  </div>
  <div class="mb-3">
    <label >mail</label>
    <input type="email" class="form-control" placeholder="Entrer votre email" name="mail" autocomplete="off" required>
  </div>
  <div class="mb-3">
    <label >Nom du Societe</label>
    <input type="text" class="form-control" placeholder="Entrer le nom du societe" name="nom_societe" autocomplete="off" required>
  </div>
  <div class="mb-3">
    <label >Description</label>
    <input type="text" class="form-control" placeholder="Entrer La Description" name="description" autocomplete="off" required>
  </div>
  <div class="mb-3">
    <label >Type d'offre</label>
    <select class="form-select" name="type_offre" required>
        <option value="" disabled selected>Choose type of offer</option>
        <option value="remote">Remote</option>
        <option value="part time-job">Part-time Job</option>
        <option value="full time-job">Full-time Job</option>
        <option value="freelance">Freelance</option>
    </select>
  </div>
  <div class="mb-3">
    <label >Salaire</label>
    <input type="text" class="form-control" placeholder="Enter Salary" name="salaire" autocomplete="off" required>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
    </div>
  </body>
</html>
