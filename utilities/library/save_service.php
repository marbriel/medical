<?php 
    include ('../connection.php');

    if(isset($_POST['submit'])){
        $serviceName = mysqli_real_escape_string($GLOBALS['connection'], $_POST['serviceName']);
        $price = mysqli_real_escape_string($GLOBALS['connection'], $_POST['price']);
        $service = array($serviceName, $price);
        if(saveService($service) == 1){
            header('Location: ../../page/services/home.php');
        }else{
            echo "Error";
        }
    }

?>