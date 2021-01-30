<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $title; ?></title>
    <link href="<?= base_url(); ?>assets/css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <!-- <link href="<?= base_url(); ?>node_modules/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="<?= base_url(); ?>node_modules/sweetalert2/dist/sweetalert2.min.js"></script> -->
    <?php if ($this->uri->segment(1) == 'events') { ?>
        <link href='<?= base_url(); ?>node_modules/fullcalendar/main.css' rel='stylesheet' />
        <script src='<?= base_url(); ?>node_modules/fullcalendar/main.js'></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    editable: false,
                    selectable: true,
                    headerToolbar: {
                        left: 'prev,next,today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,dayGridDay'
                    },
                    dateClick: function(info) {
                        alert('Date: ' + info.dateStr);
                        alert('Resource ID: ' + info.resource.id);
                    },
                });
                calendar.render();
            });
        </script>
    <?php } ?>
</head>

<body class="sb-nav-fixed">