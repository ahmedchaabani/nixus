<?php
require_once '../../config.php';
require_once '../../controller/utilisateursC.php';

session_start();

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

// Make the user a regular user
$utilisateursC = new utilisateursC();
$utilisateursC->makeUserAdmin($userId);

// Redirect back to the users page
header('Location: ../../view/admin/users.php');
exit();
?>
