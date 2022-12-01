<?php
    include ('../connection.php');
    if(isset($_POST['submit'])){
        $id = mysqli_real_escape_string($GLOBALS['connection'], $_POST['id']);
        $serviceName = mysqli_real_escape_string($GLOBALS['connection'], $_POST['serviceName']);
        $price = mysqli_real_escape_string($GLOBALS['connection'], $_POST['price']);
        $service = array($serviceName, $price);
        if(updateService($service, $id) == 1){
            header ('Location: ../../page/services/home.php');
        }else{
            echo "Error";
        }
    }
?>