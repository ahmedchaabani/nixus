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
$roleStats = $utilisateursC->getUsersRoleStats();

// Exclude the currently logged-in user from the list
$currentUserId = $_SESSION['user_id'];
$filteredUsers = array_filter($users, function ($user) use ($currentUserId) {
    return $user['id'] !== $currentUserId;
});


// Handle search
// Handle search
$searchResults = [];
if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $searchResults = $utilisateursC->searchUsers($searchTerm); // Utilisez searchUsers ici
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NEXUS | DataTables</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php
        require('navbar.php');
        require('aside.php');
        ?>

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Users</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">users</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header"></div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="" method="get">
                                        <div class="input-group">
                                            <input type="text" name="search" class="form-control" placeholder="Rechercher par nom d'utilisateur role et email">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-primary">Rechercher</button>
                                            </div>
                                        </div>
                                    </form>
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>username</th>
                                                <th>email</th>
                                                <th>role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($searchResults)) : ?>
                                                <?php foreach ($searchResults as $user) : ?>
                                                    <tr>
                                                        <td><?php echo $user['id']; ?></td>
                                                        <td><?php echo $user['pseudo']; ?></td>
                                                        <td><?php echo $user['email']; ?></td>
                                                        <td><?php echo $user['role']; ?></td>
                                                        <td>
                                                            <a href="../util/delete_user.php?id=<?php echo $user['id']; ?>" class="btn btn-danger">Delete</a>
                                                            <?php if ($user['role'] === 'user') : ?>
                                                                <a href="../util/make_admin.php?id=<?php echo $user['id']; ?>" class="btn btn-success">Make Admin</a>
                                                            <?php elseif ($user['role'] === 'admin') : ?>
                                                                <a href="../util/make_user.php?id=<?php echo $user['id']; ?>" class="btn btn-warning">Make User</a>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <?php foreach ($filteredUsers as $user) : ?>
                                                    <tr>
                                                        <td><?php echo $user['id']; ?></td>
                                                        <td><?php echo $user['pseudo']; ?></td>
                                                        <td><?php echo $user['email']; ?></td>
                                                        <td><?php echo $user['role']; ?></td>
                                                        <td>
                                                            <a href="../util/delete_user.php?id=<?php echo $user['id']; ?>" class="btn btn-danger">Delete</a>
                                                            <?php if ($user['role'] === 'user') : ?>
                                                                <a href="../util/make_admin.php?id=<?php echo $user['id']; ?>" class="btn btn-success">Make Admin</a>
                                                            <?php elseif ($user['role'] === 'admin') : ?>
                                                                <a href="../util/make_user.php?id=<?php echo $user['id']; ?>" class="btn btn-warning">Make User</a>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                    
                                </div>
                                
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    
        <!-- /.content-wrapper -->
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
                            width: 200, // Largeur du graphique
                            height: 200 // Hauteur du graphique
                        }
                    });
                });
            </script>

        </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>
