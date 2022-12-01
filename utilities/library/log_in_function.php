<?php
    session_start();
    include '../connection.php';
    require_once '../functions.php';
    if(isset($_POST['log_in'])){
        $email = mysqli_real_escape_string($GLOBALS['connection'], $_POST['email']);
        $password = mysqli_real_escape_string($GLOBALS['connection'], $_POST['password']);
        $user = logInUser($email, md5($password));
        if(!empty($user)){
           
            $_SESSION["user"] = $user;
            if($_SESSION["user"]['user_type'] == 'USER'){
                header('Location: ../../page/user/homepage.php');
            }else{
                header('Location: ../../page/admin/home.php');
            }
        }else{
            header('Location: ../../page/log_in.php');
        }
        
    }

?>