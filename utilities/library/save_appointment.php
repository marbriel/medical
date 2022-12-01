<?php 
    include ('../connection.php');

    if(isset($_POST['submit'])){
        $services = $_POST['services'];
        $time = mysqli_real_escape_string($GLOBALS['connection'], $_POST['time']);
        $user = mysqli_real_escape_string($GLOBALS['connection'], $_POST['userId']);
        $servicesToSave = implode(',', $services);
        $transactionId = "";
        
        $checker = true;
        while($checker){
            $transactionId = generateRandomString();
            if(checkIfTransactionIdIsUnique($transactionId) == 1){
                $checker = true;
            }else{
                $checker = false;
            }
        }

        $isSave = saveAppointment($transactionId, $user, $time, $servicesToSave);
        if($isSave == 1){
            header("Location: ../../page/user/homepage.php");
        }else{
            echo "Error";
        }
        
    }
?>