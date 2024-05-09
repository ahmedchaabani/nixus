<?php

require_once '../../config.php';
require_once '../../controller/utilisateursC.php';

session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

// Fetch the list of users
$utilisateursC = new UtilisateursC();
$users = $utilisateursC->getAllUsers();

// Exclude the currently logged-in user from the list
$currentUserId = $_SESSION['user_id'];
$filteredUsers = array_filter($users, function ($user) use ($currentUserId) {
    return $user['id'] !== $currentUserId;
});

// Handle search
$searchResults = [];
if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $searchResults = $utilisateursC->searchUsersByUsername($searchTerm);
}
$roleStats = $utilisateursC->getUsersRoleStats();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Mettre ici les balises meta, les liens CSS et autres en-têtes nécessaires -->
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar et autres éléments de l'interface utilisateur -->

        <div class="content-wrapper">
            <!-- Contenu principal -->

            <!-- Graphique statistique -->
            <div class="container-fluid">
            <canvas id="userRoleChart"></canvas>

            </div>

            <!-- Code JavaScript pour initialiser le graphique -->
            <!-- jQuery -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
               $(function() {
    var ctx = document.getElementById('userRoleChart').getContext('2d');
    var userRoleChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode(array_column($roleStats, 'role')); ?>,
            datasets: [{
                label: 'Nombre d\'utilisateurs par rôle',
                data: <?php echo json_encode(array_column($roleStats, 'count')); ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: false, // Désactiver la réactivité pour fixer les dimensions
            width: 20, // Largeur du graphique
            height: 20 // Hauteur du graphique
        }
    });
});

            </script>

        </div>


    </div>

</body>

</html>
