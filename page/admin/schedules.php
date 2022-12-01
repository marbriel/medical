<?php
include '../../utilities/connection.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedules</title>
    <!-- Add the evo-calendar.css for styling -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/evo-calendar@1.1.2/evo-calendar/css/evo-calendar.min.css" />
    <link rel="stylesheet" type="text/css" href="evo-calendar.orange-coral.css" />
    <?php include '../../fragments/admin_navigation_bar.php' ?>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
    }


    #calendar {
        margin-top: 100px;
        width: 80%;
    }

    body {
        background: linear-gradient(#e66465, #9198e5);
        background-attachment: fixed;
    }
</style>

<body>

    <div class="design">
        <div id="calendar"></div>
    </div>
    <div id="time"></div>

    <!-- Add jQuery library (required) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>

    <!-- Add the evo-calendar.js for.. obviously, functionality! -->
    <script src="https://cdn.jsdelivr.net/npm/evo-calendar@1.1.2/evo-calendar/js/evo-calendar.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#calendar').evoCalendar({
                
            })
        });

        $('#calendar').on('selectDate', function(event, newDate, oldDate) {
            var dateNew = newDate;
            var splittedDatString = dateNew.toString();
            var splitted = splittedDatString.split("/");
            var updatedDate = splitted[2] + "-" + splitted[0] + "-" + splitted[1];
            $.ajax({
                url: "../../utilities/library/get_schedules.php",
                method: 'POST',
                data: {
                    date_data: updatedDate
                },
                success: function(data) {
                    $('#calendar').evoCalendar('addCalendarEvent', JSON.parse(data));
                }


            });
        });
    </script>
    <?php include '../../fragments/footer.php'; ?>
</body>

</html>