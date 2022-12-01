<?php
    include ('../connection.php');
    if(isset($_POST['delete_employee'])){
        $id = mysqli_real_escape_string($GLOBALS['connection'], $_POST['employeeId']);
        $isDeleted = deleteEmployee($id);
        if($isDeleted==1){
            header('Location: ../../page/employee/home.php');
        }else{
            echo 'Error';
        }
    }
?>