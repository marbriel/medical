<?php
    include ('../connection.php');
    if(isset($_POST['submit'])){
        $id = mysqli_real_escape_string($GLOBALS['connection'], $_POST['updateId']);
        $firstName = mysqli_real_escape_string($GLOBALS['connection'], $_POST['firstName']);
        $lastName = mysqli_real_escape_string($GLOBALS['connection'], $_POST['lastName']);
        $email = mysqli_real_escape_string($GLOBALS['connection'], $_POST['email']);
        $contactNo = mysqli_real_escape_string($GLOBALS['connection'], $_POST['contactNo']);
        $employee = array($firstName, $lastName, $email, $contactNo);
        $isupdated = updateEmployee($employee, $id);
        if($isupdated == 1){
            header('Location: ../../page/employee/home.php');
        }
        else{
            echo "item is not updated";
        }

    }

?>