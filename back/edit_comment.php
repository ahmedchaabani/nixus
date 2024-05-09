<?PHP
include "../back/controller/forumC.php";
include "../back/model/comment.php";
$rec = null;

$id = $_GET['id'];
$forumC = new forumC();
$currentforum = $forumC->findcomment($id);


if (
    isset($_POST["content"])
) {
    if (
        !empty($_POST["content"])

    ) {
        $commentContent = $_POST['content']; // Assuming $_POST['content'] contains the new comment content
        $forumC->updateComment($id, $commentContent);
        header('Location:afficher_comments.php');
    } else
        $error = "Missing information";
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
                                    <h4 class="card-title mb-0 flex-grow-1">Edit Comment</h4>
                                    <div class="flex-shrink-0">

                                    </div>
                                </div><!-- end card header -->

                                <br>

                                <?PHP



                                ?>
                                <div class="card-body">
                                    <form method="POST" name="f" onsubmit="return verif(this);">
                                        <div class="live-preview">
                                            <div class="row gy-4">
                                                <div class="col-xxl-3 col-md-6 container">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for=""></label>
                                                                <input value="<?= $currentforum['content'] ?>"
                                                                    type="text" name="content" class="form-control">
                                                            </div>
                                                        </div>



                                                    </div>
                                                    <br><br>
                                                    <div class="row gy-4">
                                                        <div class="col-xxl-3 col-md-6">
                                                            <button type="submit" name="modifier"
                                                                class="btn btn-outline-success waves-effect waves-light">Modifier</button>
                                                        </div>
                                                    </div>
                                                </div>
                                    </form>
                                    <div id="toast"></div>
                                    <?PHP


                                    if (isset($_POST['modifier'])) {
                                        $achatC = new achatC();
                                        $reclamationC->updatereclamation($_GET['id'], $_POST['noma'], $_POST['cina'], $_POST['matriculea'], $_POST['marquea'], $_POST['typ'], $_POST['prixa'], $_POST['datea']);
                                        header('Location: Afficher_comments.php');
                                        ob_end_flush();
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->











        </main>
        <!-- End of Main Content -->

       
    </div>

    <script src="orders.js"></script>
    <script src="index.js"></script>
</body>

</html>
<style>
    /* Sidebar */
aside {
    width: 280px;
    background-color: #f8f9fa;
    height: 100vh;
    overflow-y: auto;
}

.sidebar {
    padding: 20px;
}

.logo img {
    max-width: 50px;
    margin-right: 10px;
}

.logo h2 {
    font-size: 20px;
    margin-top: 5px;
    display: inline-block;
}

.close {
    cursor: pointer;
    text-align: right;
    padding-right: 10px;
}

/* Main Content */
main {
    margin-left: 280px;
    padding: 20px;
}

.card-body {
    max-width: 600px;
    margin: auto;
}

.form-group {
    margin-bottom: 20px;
}

/* Button */
.btn {
    padding: 8px 20px;
    border-radius: 5px;
    cursor: pointer;
}

.btn-outline-success {
    background-color: #28a745;
    color: #fff;
    border: 1px solid #28a745;
}

.btn-outline-success:hover {
    background-color: #218838;
    border-color: #1e7e34;
}

/* Input */
.form-control {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ced4da;
    box-sizing: border-box;
}

/* Tooltip */
#toast {
    position: fixed;
    top: 20px;
    right: 20px;
    background-color: #28a745;
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
    display: none;
}

</style>