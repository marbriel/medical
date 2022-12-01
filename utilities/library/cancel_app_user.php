<?php
    include('../connection.php');
    if(isset($_GET['transaction_id'])){
        $transactionId= mysqli_real_escape_string($GLOBALS['connection'], $_GET['transaction_id']);
        if(cancelAppointment($transactionId) == 1){
            header('Location: ../../page/user/homepage.php');
        }
        echo "Error";
    }

?>