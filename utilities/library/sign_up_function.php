<?php
    include '../connection.php';

    require_once '../functions.php';
    if(isset($_POST['sign_up'])){
        $firstName = mysqli_real_escape_string($GLOBALS['connection'], $_POST['first_name']);
        $lastName = mysqli_real_escape_string($GLOBALS['connection'], $_POST['last_name']);
        $email = mysqli_real_escape_string($GLOBALS['connection'], $_POST['email']);
        $contactNumber = mysqli_real_escape_string($GLOBALS['connection'], $_POST['contact_number']);
        $password = mysqli_real_escape_string($GLOBALS['connection'],$_POST['password']);
        $password = encryptPassword($password);

        $user = array($firstName, $lastName, $email, $contactNumber, $password);
        $isNumberFound = contactValidation($user[3]);
        $isEmailFound = emailValidation($user[2]);

        if($isNumberFound == 0 and $isEmailFound == 0){
            registerUser($user);
            header('Location: ../../page/log_in.php');
           
        }

        if($isNumberFound == 1 and $isEmailFound == 1){
            header('Location: ../../page/sign_up.php');
        }

    
        
        
    }
?>