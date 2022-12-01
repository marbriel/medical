<?php
    include('../connection.php');
    if(isset($_POST['delete_item'])){
        $transactionId= mysqli_real_escape_string($GLOBALS['connection'], $_POST['transaction_id_cancel']);
        if(cancelAppointment($transactionId) == 1){
            header('Location: ../../page/admin/home.php');
        }
        echo "Error";
    }

?>