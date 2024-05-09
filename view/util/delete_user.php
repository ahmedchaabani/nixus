<?php
require_once '../../config.php';
require_once '../../controller/utilisateursC.php';

// Start session if not already started
session_start();


if (isset($_GET['fromuser'])) {
    $utilisateursC = new utilisateursC();
    $utilisateursC->deleteUser($_GET['fromuser']);

    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the index page or any other page after logout
    header("Location: ../../view/index.php");
    exit;

} else {

    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        header('Location: index.php');
        exit();
    }

    // Check if the user ID is provided in the URL
    if (!isset($_GET['id'])) {
        header('Location: index.php');
        exit();
    }

    // Get the user ID from the URL
    $userId = $_GET['id'];

    // Delete the user
    $utilisateursC = new utilisateursC();
    $utilisateursC->deleteUser($userId);

    // Redirect back to the users page
    header('Location: ../../view/admin/users.php');
    exit();
}
?>