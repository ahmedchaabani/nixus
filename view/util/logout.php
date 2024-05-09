<?php
// Start session if not already started
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the index page or any other page after logout
header("Location: ../../view/index.php");
exit;
?>
