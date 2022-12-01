<?php 
    include ('../connection.php');
    if(isset($_POST['delete_service'])){
        $id = mysqli_real_escape_string($GLOBALS['connection'], $_POST['serviceId']);
        if(deleteService($id) == 1){
            header('Location: ../../page/services/home.php');
        }else{
            echo "Error";
        }
    }
?>