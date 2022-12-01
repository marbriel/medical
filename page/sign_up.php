<?php 
    session_start();
    if(isset($_SESSION['user'])){
        if($_SESSION['user']['user_type'] == "USER"){
            header('Location: ../page/user/homepage.php');
        }else{
            header('Location: ../page/admin/home.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <?php include '../fragments/navigation_bar.php'; ?>
</head>
<body>
<div class="container">
        <div class="card mx-auto mt-5" style="width: 30rem;background-color: #F9F9F9">
            <div class="card-body container">
                <img src="../images/final_image_logo.png" alt="brand" class="rounded mx-auto d-block" style="width: 5rem; height: 5rem">
                <h2 class="card-title text-center">Register</h4>
                <form class="p-3" method="post" action= "http://localhost/medical/utilities/library/sign_up_function.php" >
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control form-control-sm" id="first_name" aria-describedby="emailHelp" name="first_name" required>
                    </div>
                    <div class="form-group  mt-1">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control form-control-sm" id="last_name" name="last_name" required>
                    </div>
                    <div class="row mt-1">
                        <div class="col">
                            <label>Email</label>
                            <input type="email" class="form-control form-control-sm" name="email" required>
                            <small id="emailHelp" class="form-text text-danger"></small>
                        </div>
                        <div class="col">
                            <label>Contact No.</label>
                            <input type="text" class="form-control form-control-sm" name="contact_number" required>
                        </div>
                       
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control form-control-sm" id="password" aria-describedby="emailHelp" name="password" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mx-auto d-block mt-3" style="width:26rem" name="sign_up">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
<?php include '../fragments/footer.php';?>
</html>