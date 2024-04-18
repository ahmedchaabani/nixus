
<?php
require_once '../model/cours.php';
require_once '../controller/coursC.php';

function deleteCours($reference) {
    $db = Config::getConnexion();
    try {
        $requete = $db->prepare("DELETE FROM offres WHERE reference = :reference");
        $requete->bindParam(':reference', $reference);
        $requete->execute();
    } catch (PDOException $e) {
        // Log or handle the error appropriately
        die('Error deleting cours: ' . $e->getMessage());
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Course</title>
</head>
<body>
    <h2>Delete Course</h2>
    <form method="POST" action="">
        <label for="reference">Enter Course ID to delete:</label><br>
        <input type="text" id="reference" name="reference"><br><br>
        <button type="submit" name="submit">Delete Course</button>
    </form>

    <?php
    // Check if the form is submitted
    if (isset($_POST['submit'])) {
        // Check if the ID is provided
        if (!empty($_POST['reference'])) {
            // Call the deleteCours function and pass the ID
            $reference = $_POST['reference'];
            $result = deleteCours($reference);

            // Display message based on deletion result
            if ($result) {
                echo "<p>Course with ID $reference deleted successfully.</p>";
            } else {
                echo "<p>delete course with ID $reference.</p>";
            }
        } else {
            echo "<p>Please enter the Course ID.</p>";
        }
    }
    ?>

</body>
</html>
