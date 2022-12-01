<?php 
    include ('../connection.php');
    if(isset($_POST['submit'])){
        $dateFrom = mysqli_real_escape_string($GLOBALS['connection'], $_POST['date_from']);
        $dateTo = mysqli_real_escape_string($GLOBALS['connection'], $_POST['date_until']);
        $schedules = array();
        if(!empty($_POST['sched'])){
            $schedules = $_POST['sched'];
        }
        //$date = strtotime("+1 day", strtotime($dateFrom));
        
        //code for single date
        $datedifference = getDateDifference($dateFrom, $dateTo);
        $dateFrom = date("Y-m-d", strtotime($dateFrom));
        if(empty($dateTo)){
            foreach($schedules as $schedule){
                saveSchedule($dateFrom, $schedule);
            }
        }elseif($dateFrom == $dateTo){
            foreach($schedules as $schedule){
                saveSchedule($dateFrom, $schedule);
            }
        }else{
            for($i = 0; $i <= $datedifference; $i++ ){
                foreach($schedules as $schedule){
                    saveSchedule($dateFrom, $schedule);
                }
                $dateFrom = date("Y-m-d", strtotime("+1 day", strtotime($dateFrom)));
            }
        }

        header('Location: ../../page/admin/home.php');
    }
?>