<?php 
    include ('../connection.php');
    if(isset($_POST['date_data'])){
        $schedules = getSchedules($_POST['date_data']);
        $output = array();
        if(empty($schedules)){
            $output = array();
        }else{
            foreach($schedules as $sched){
                $formatDate = explode("-", $sched['date']);
                $finalDate = $formatDate[1].'/'.$formatDate[2].'/'.$formatDate[0];
                $formattedArray = array("id" => $sched['sched_id'], "name"=> $sched['time'], "type" => "holiday", "date" =>$sched["date"]);
                array_push($output, $formattedArray);
            }
        }
        
        $js_array = json_encode($output);
        echo $js_array;
        
    }

?>