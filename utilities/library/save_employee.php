<?php 
    include ('../connection.php');

    if(isset($_POST['submit'])){
        $firstName = mysqli_real_escape_string($GLOBALS['connection'], $_POST['firstName']);
        $lastName = mysqli_real_escape_string($GLOBALS['connection'], $_POST['lastName']);
        $email = mysqli_real_escape_string($GLOBALS['connection'], $_POST['email']);
        $contactNo = mysqli_real_escape_string($GLOBALS['connection'], $_POST['contactNo']);
        $userType = "EMPLOYEE";    
        $rawPassword = generateRandomString();
        $hashPassword = md5($rawPassword);

        $employee = array($firstName, $lastName, $email, $contactNo, $hashPassword, $userType);
        
        if(emailValidation($email) == 0 and contactValidation($contactNo) == 0){
            registerEmployee($employee);
            header('Location: ../../page/employee/home.php');
        }
    }
?>