<?php
    include ('../connection.php');
    if(isset($_POST['date_data'])){
        $schedules = getSchedules($_POST['date_data']);
        $output = '<option value="">Select Time</option>';
        if(empty($schedules)){
            $output = '<option value="">No Time Available</option>';
        }else{
            foreach($schedules as $sched){
                $output .= '<option value="'.$sched['sched_id'].'">'.$sched['time'].'</option>';
            }
        }
        
        echo $output;
        
    }
?>