<?php
    include('../connection.php');
    if(isset($_POST['update_sched'])){
        $transaction = mysqli_real_escape_string($GLOBALS['connection'], $_POST['transaction_to_update']);
        $newSched = mysqli_real_escape_string($GLOBALS['connection'], $_POST['time']);
        $sched = reSchedAppointment($transaction, $newSched);
        if($sched > 0){
            header('Location: ../../page/admin/home.php');
        }
        else{
            echo "Error";
        }
    }

?>