<?php 
include '../Controller/FormationC.php';

  
   $nom = $_POST['nom'];
  
   $sql = "SELECT * FROM formation WHERE nom_f LIKE '$nom%'";  
   $db = config::getConnexion();
        try {
            $q = $db->prepare($sql);
            $q->execute();
            $r = $q->fetchAll();
        } catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
   $data='';
   foreach ($r as $row) {
   
    $data .= " <h3>ID de formation : <?php echo $row['id'] ?></h3>

    <p>Nom: <?php echo $row['nom_f'] ?></p>
    <p>Type: <?php echo $row['type_f'] ?></p>

    <div class="button-container">
        <button class="update-button"><a href="updateFormation.php?id=<?php echo $row['id'] ?>">Update</a></button>
        <button class="delete-button"><a href="deleteFormation.php?id=<?php echo $row['id'] ?>">Delete</a></button>
        
        <button class="delete-button"><a href="showFormation.php?id=<?php echo $row['id'] ?>">Show</a></button>
        <button class="delete-button"><a href="addAtelier.php?id=<?php echo $row['id'] ?>">ajout ate</a></button>
    </div>
</div>";
   
   
   }
    echo $data;
 ?>
