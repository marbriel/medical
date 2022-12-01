<?php
    include 'bootstrap.php';
    $numberOfUsers = getNumberofUser();
    $currentDate = date("Y-m-d");
    $treatedToday = getTreatedToday($currentDate);
    $unTreatedToday = getUntreatedToday($currentDate);

?>


<script type="text/javascript">
    function dateAndTime() {
        var hourAndTimeId = document.getElementById('time');
        var dateAndMonth = document.getElementById('date');
        var asOfId = document.getElementById('as_of');
        var currentDateId = document.getElementById('current_date');

        var hour = new Date().getHours();
        var minutes = new Date().getMinutes();
        var day = new Date().getDate();
        var month = new Date().getMonth();
        var year = new Date().getFullYear();

        hourAndTimeId.innerHTML = formatHourAndTime(hour, minutes);
        dateAndMonth.innerHTML = formatDay(month, day, year);
        asOfId.innerHTML = "as of " + formatDay(month, day, year);
        currentDateId.innerHTML = "( "+ formatDay(month, day, year) + " )";

    }

    function formatHourAndTime(hour, minute) {
        var period = "";
        var hours = hour;
        var minutes = minute;
        if (hour < 12) {
            period = "AM";
        } else {
            period = "PM";

        }

        if (hour > 12) {
            hours = hour - 12;
        }
        if (hour == 0){
            hours = 12;
        }
        if (minute < 10) {
            minutes = String(minute).padStart(2, '0');
        }

        return hours + " : " + minutes + " " + period;
    }

   

   function formatDay(month, day, year){
        var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        return months[month] + " " + day + ", " + year;
   }

   var interval= setInterval(dateAndTime, 0);
</script>
<div class="container">
    <div class="row my-3">
        <div class="col-md-4 mb-2">
            <div class="card text-center h-100 border border-3 border-info">
                <div class="card-block">
                    <h4 class="card-title mt-2">Treatments</h4>
                    <img src="../../images/hospital.svg" alt="" style="width:70px; height:70px; margin-bottom: 30px;" >
                </div>
                <div class="row px-2 no-gutters">
                    <div class="col-6">
                        <h5 class="card card-block border-top-0 border-left-0 border-bottom-0"><?php echo $unTreatedToday; ?></h3>
                        <p>UNTREATED</p>
                    </div>
                    <div class="col-6">
                        <h5 class="card card-block border-top-0 border-left-0 border-bottom-0"><?php echo $treatedToday; ?></h3>
                        <p>TREATED</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="card text-center h-100 border border-3 border-warning">
                <div class="card-block">
                    <h4 class="card-title mt-2">Clients</h4>
                    <img src="../../images/person-circle.svg" alt="" style="width:70px; height:70px; margin-bottom: 30px; color:#303030;">
                </div>
                <div class="px-2 no-gutters">
                    <h3 class="card card-block border-top-0 border-left-0 border-bottom-0"><?php echo $numberOfUsers; ?></h3>
                    <p class="card card-block border-0" id="as_of"></p> 
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="card text-center h-100 border border-3 border-danger">
                <div class="card-block">
                    <h4 class="card-title mt-2">Date and Time</h4>
                    <img src="../../images/alarm.svg" alt="" style="width:70px; height:70px; margin-bottom: 30px;">
                </div>
                <div class="px-2 no-gutters">
                    <h3 class="card card-block border-top-0 border-left-0 border-bottom-0" id="time"></h3>
                    <p class="card card-block border-0" id="date"></p> 
                </div>
            </div>
        </div>
    </div>
</div>