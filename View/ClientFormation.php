<?php
include '../Controller/FormationC.php';

$forC = new FormationC(); 

$result = $forC->listFormations(); 
if (isset($_POST['triformBtn'])) {
    
    $result= $forC->trierformationsParname();
  }

$events = [];

foreach ($result as $row) {
    $events[] = [
        'title' => "Début de la formation " . $row['nom_f'],
        'start' => $row['date_debut']
    ];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Nexus Career - Formations</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../Client/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../Client/css/style.css" rel="stylesheet">

    <!-- FullCalendar Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.css" rel="stylesheet">

    <style>
        /* Ajoutez ces styles à votre fichier CSS existant ou style.css */
        /* Conteneur des formations */
        .formations-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        /* Élément de formation */
        .formation-item {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
        }

        /* Conteneur de boutons */
        .button-container {
            margin-top: 20px;
        }

        /* Boutons de mise à jour et de suppression */
        .update-button,
        .delete-button {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-right: 10px;
            transition: background-color 0.3s;
        }

        .update-button:hover,
        .delete-button:hover {
            background-color: #45a049;
        }

        /* Bouton d'ajout */
        .add-button {
            background-color: #007bff;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .add-button:hover {
            background-color: #0056b3;
        }
        
    </style>

</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <a href="index.html" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <h1 class="m-0 text-primary">Nexus Career</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="index.html" class="nav-item nav-link">Home</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Formation</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="ClientFormation.php" class="dropdown-item" >Afficher les formations</a>
                            <a href="rechercheformation2.php" class="dropdown-item" >rechercher une  formations</a>
                            <a href="help.php" class="dropdown-item" >help</a>
                            <a href="cal.php" class="dropdown-item" >calendrier des  formations</a>
                            
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Jobs</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="job-list.html" class="dropdown-item">Job List</a>
                            <a href="job-detail.html" class="dropdown-item">Job Detail</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="category.html" class="dropdown-item">Job Category</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="404.html" class="dropdown-item">404</a>
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">Contact</a>
                </div>
                <a href="" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Post A Job<i class="fa fa-arrow-right ms-3"></i></a>
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- Formation Content Start -->
        <div class="container-xxl py-5">
            <div class="container" id="content">
                <div class="row">
                    <div class="col-md-8">
                        <!-- Search Field -->
                        <input type="date" id="dateFilter" class="form-control mb-3" placeholder="Choose a Date">
                        <input type="text" id="searchField" placeholder="Search by Formation Name" class="form-control mb-3">
                        <button id="sortButton" class="btn btn-primary">Trier par Date de Début</button>
                        <form method="POST">
    <button class="badge badge-primary" type="submit" name="triformBtn">Tri formations</button>
 </form>
                    </div>
                    <div class="col-md-4">
                        <!-- Bouton pour afficher ou masquer le calendrier -->
                        <button id="toggleCalendar" class="btn btn-primary mb-3">Afficher le calendrier</button>
                        <!-- Conteneur pour le calendrier -->
                        <div id="calendarContainer" style="display: none;">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>

                <div class="formations-container">
                    <!-- Formations -->
                    <?php foreach ($result as $row) { ?>
                        <div class="formation-item">
                            <h3><?php echo $row['nom_f'] ?></h3>
                            <p>Type: <?php echo $row['type_f'] ?></p>
                            <p class="formation-date">Date : <?php echo $row['date_debut'] ?></p>

                            <div class="button-container">
                                <button class="btn btn-primary w-100 py-3"><a href="Client1.php?id=<?php echo $row['id'] ?>">details</a></button>
                                <button class="btn btn-primary w-100 py-3"><a href="generate_pdf.php?id=<?php echo $row['id'] ?>">PDF</a></button>
                                <a href="mail.php?formation_id=<?php echo $row['id']; ?>" class="btn btn-primary w-100 py-3">Choisir</a>



                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- End Formation Container -->
            </div>
        </div>
        <!-- Formation Content End -->

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <!-- Footer Content -->
        </div>
        <!-- Footer End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- FullCalendar JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.js"></script>

    <!-- Template Javascript -->
    <script src="../Client/js/main.js"></script>

    <!-- Your Custom JavaScript -->
    <script>
        $(document).ready(function() {
            // Fonction pour afficher ou masquer le calendrier lorsque le bouton est cliqué
            $('#toggleCalendar').on('click', function() {
                $('#calendarContainer').toggle();
                // Initialise le calendrier lorsqu'il est affiché
                if ($('#calendarContainer').is(':visible')) {
                    var calendarEl = document.getElementById('calendar');
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        events: <?php echo json_encode($events); ?>
                    });
                    calendar.render();
                }
            });

            // Fonction pour filtrer les formations par date sélectionnée et terme de recherche
            $('#dateFilter, #searchField').on('change input', function() {
                var selectedDate = $('#dateFilter').val();
                var searchTerm = $('#searchField').val().toLowerCase();

                $('.formation-item').each(function() {
                    var formationDate = $(this).find('.formation-date').text().trim().toLowerCase();
                    var formationName = $(this).find('h3').text().toLowerCase();

                    if ((selectedDate === '' || formationDate === selectedDate) && (searchTerm === '' || formationName.includes(searchTerm))) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });

            // Fonction pour trier les formations par date de début
            $('#sortButton').on('click', function() {
                var formations = $('.formation-item').get();
                formations.sort(function(a, b) {
                    var dateA = new Date($(a).find('.formation-date').text());
                    var dateB = new Date($(b).find('.formation-date').text());
                    return dateA - dateB;
                });
                $('.formations-container').empty().append(formations);
            });
        });
    </script>
</body>

</html>
