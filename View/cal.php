<?php
include '../Controller/FormationC.php';

$form = new formationC(); 
$formations = $form->listFormations();

$fullCalendarEvents = [];
foreach ($formations as $formation) {
    $start_date = date("Y-m-d", strtotime($formation['date_debut'])); 
    $end_date = date("Y-m-d", strtotime($formation['date_fin']. ' +1 day')); 
    $fullCalendarEvent = [
        'formationId' => $formation['id'],
        'title' => $formation['nom_f'],
        'start' => $start_date,
        'end' => $end_date,
        'deb' => $start_date,
        'fin' => $end_date,
        'description' => $formation['description_f'],
        'etat' => $formation['etat_f'],
        'cout' => $formation['cout_f'],
        'formateur' => $formation['id_user'],
    ];

    // Ajouter cet événement converti au tableau des événements FullCalendar
    $fullCalendarEvents[] = $fullCalendarEvent;
}
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src='index.global.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@5.10.0/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@5.10.0/main.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core@5.10.0/main.css" rel="stylesheet" />

    <style>
        #calendar {
            max-width: 1100px;
            margin: 0 auto;
        }

        .popup-container {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 9999;
            width: 320px;
            max-width: 90%;
            text-align: left; /* alignement du texte à gauche */
        }

        .popup-container h2 {
            margin-top: 0;
            color: #333;
            font-size: 20px;
            margin-bottom: 15px;
        }

        .popup-content p {
            color: #666;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .popup-close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            color: #999;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        .popup-close:hover {
            color: #333;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title'
                },
                initialDate: '2024-05-01',
                navLinks: true,
                businessHours: true,
                editable: true,
                selectable: true,
                eventClick: function(info) {
                    var formationDetails = info.event.extendedProps;
                    $('#popupTitle').text(formationDetails.title);
                    $('#popupDetails').html(
                        `<p><strong>ID :</strong> ${formationDetails.formationId}</p>` +
                        `<p><strong>Description :</strong> ${formationDetails.description}</p>` +
                        `<p><strong>État :</strong> ${formationDetails.etat}</p>` +
                        `<p><strong>Coût :</strong> ${formationDetails.cout}</p>` +
                        `<p><strong>Formateur :</strong> ${formationDetails.formateur}</p>` +
                        `<p><strong>Date de début :</strong> ${formationDetails.deb}</p>` +
                        `<p><strong>Date de fin :</strong> ${formationDetails.fin}</p>`
                    );
                    $('.popup-container').show();
                },
                events: <?php echo json_encode($fullCalendarEvents); ?>
            });

            calendar.render();
        });

        function closePopup() {
            $('.popup-container').hide();
        }
    </script>
</head>

<body>

    <div id='calendar'></div>

    <div class="popup-container">
        <span class="popup-close" onclick="closePopup()">X</span>
        <h2 id="popupTitle"></h2>
        <div id="popupDetails" class="popup-content"></div>
    </div>

</body>

</html>
