<?PHP
include "../back/controller/forumC.php";

$forumC = new forumC();
$var = $forumC->allforum();

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Nixus Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">

</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace();
</script>
    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">
                    <img src="images/logo.png">
                    <h2>Nixus<span class="danger"></span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="index.html">
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <h3>Dashboard</h3>
                </a>
                <a href="afficherab.php">
                    <span class="material-icons-sharp">
                        person_outline
                    </span>
                    <h3>Posts</h3>
                </a>
                <a href="afficher_comments.php">
                    <span class="material-icons-sharp">
                        receipt_long
                    </span>
                    <h3>comments</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        forum
                    </span>
                    <h3>forum</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        inventory
                    </span>
                    <h3>formation</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        report_gmailerrorred
                    </span>
                    <h3>Reclamation</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        settings
                    </span>
                    <h3>Settings</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        add
                    </span>
                    <h3>New Login</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
        <!-- End of Sidebar Section -->

        <!-- Main Content -->
        <main>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">List of Posts</h4>
                            <div class="flex-shrink-0">

                            </div>
                        </div><!-- end card header -->

                        <br>
                        <div class="table-responsive" id="det">
                            <table class="table table-borderless align-middle table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col"><a href="afficherad.php?trier=id"><i class="ri-sort-desc"></i>
                                            </a>ID</th>
                                        <th scope="col"><a href="afficherad.php?trier=fullname"><i
                                                    class="ri-sort-desc"></i> </a>Categorie</th>
                                        <th scope="col"><a href="afficherad.php?trier=username"><i
                                                    class="ri-sort-desc"></i> </a>Titre</th>
                                        <th scope="col"><a href="afficherad.php?trier=email"><i
                                                    class="ri-sort-desc"></i> </a>Message</th>
                                        <th scope="col"><a href="afficherad.php?trier=password"><i
                                                    class="ri-sort-desc"></i> </a>Image</th>
                                        <th scope="col"><a href="afficherad.php?trier=age"><i class="ri-sort-desc"></i>
                                            </a>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($var as $row) { ?>
                                        <tr>
                                            <td><?PHP echo $row['id']; ?></td>
                                            <td><?PHP echo $row['categorie']; ?></td>
                                            <td><?PHP echo $row['titre']; ?></td>
                                            <td><?PHP echo $row['message']; ?></td>
                                            <td><?PHP echo $row['image']; ?></td>
                                            <td><?PHP echo $row['date']; ?></td>

                                            <td>
                                                <div class="hstack gap-3 fs-15">
                                                    <a href="edit_ab.php?id=<?php echo $row['id'] ?>"
                                                        class="link-primary"><i class="ri-settings-4-line"></i></a>
                                                    <a href="supprimer_ab.php?id=<?php echo $row['id'] ?>"
                                                        class="link-danger"><i class="ri-delete-bin-5-line"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <br>
                    <br>
                    <?php
                    //$total_record=$reclamationC->allreclamation();     
                    //$total_page = ceil($total_record/$num_per_page);
                    ?>
                    <nav aria-label="..." style="float: right;">
                        <ul class="pagination">
                            <?php
                            if ($page > 1) {
                                ?>
                                <li class="page-item">
                                    <a class="page-link" href="AfficherRec.php?page=<?= $page - 1; ?>"
                                        tabindex="-1">Previous</a>
                                </li>
                                <?php
                            } else {
                                ?>
                                <li class="page-item disabled">
                                    <a class="page-link" href="AfficherRec.php?page=<?= $page - 1; ?>"
                                        tabindex="-1">Previous</a>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
</div>

        </main>
        <!-- End of Main Content -->

       
    </div>

    <script src="orders.js"></script>
    <script src="index.js"></script>
</body>

</html>