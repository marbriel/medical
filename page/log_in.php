<?php
session_start();
if (isset($_SESSION['user'])) {
    if ($_SESSION['user']['user_type'] == "USER") {
        header('Location: ../page/user/homepage.php');
    } else {
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
    <title>Log In</title>
    <?php include '../fragments/navigation_bar.php'; ?>
</head>

<body>
    <div class="container">
        <div class="card mx-auto mt-5" style="width: 30rem;background-color: #F9F9F9">
            <div class="card-body container">
                <img src="../images/final_image_logo.png" alt="brand" class="rounded mx-auto d-block" style="width: 5rem; height: 5rem">
                <form method="post" action="../utilities/library/log_in_function.php">
                    <div class="mb-3">
                        <label for="email_log_in" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email_log_in" aria-describedby="emailHelp" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_log_in" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password_log_in" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary mx-auto d-block" style="width:18rem" name="log_in">Submit</button>
                </form>
            </div>
        </div>
    </div>

</body>
<?php include '../fragments/footer.php'; ?>

</html>