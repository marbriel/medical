<?php
  session_start();
  if(!isset($_SESSION['user'])){
    header('Location: ../log_in.php');
}

if($_SESSION["user"]['user_type'] == 'USER'){
    header('Location: ../user/homepage.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
</head>
<?php include '../../fragments/admin_navigation_bar.php'; ?>
<body>
<div class="container">
    <div class="card mx-auto mt-5" style="width: 25rem; background-color: #F9F9F9">
            <div class="card-body">
                <h5 class="card-title text-center">Account Information</h5>
                <img src="../../images/panda.png" class="rounded mx-auto d-block" alt="..." style="width:100px; height:100px; radius:50%; border:2px solid #101010;">
                <p class="text-center text-primary mt-1" data-bs-toggle="modal" data-bs-target="#editimage">Account image<i class="bi bi-pencil ms-2"></i></p>
                <table class="table table-sm ">
                    <tbody>
                        <tr>
                            <td><b>Name</b></th>
                            <td><?php echo $_SESSION['user']['first_name']." ". $_SESSION['user']['last_name']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Email Address</b></th>
                            <td><?php echo $_SESSION['user']['email']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Contact No.</b></th>
                            <td><?php echo $_SESSION['user']['contact_no']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Password</b></th>
                            <td>************* <i class="bi bi-pencil-square" data-bs-toggle="modal" data-bs-target="#staticBackdrop"></i></td>
                        </tr>
                    </tbody>
                </table>
                <a href="#" class="card-link btn btn-success btn-sm text-left" data-bs-toggle="modal" data-bs-target="#accountinformation">Update Information <i class="bi bi-pencil-square ms-1"></i></a>
            </div>
        </div>
    </div>
</body>
<!--modal for update password-->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Change Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-group mb-3">
                <label for="exampleFormControlInput1"><b>New Password</b></label>
                <input type="password" class="form-control" id="exampleFormControlInput1">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Done</button>
      </div>
    </div>
  </div>
</div>

<!-- modal for images-->
<div class="modal fade" id="editimage" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Change account image</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-group mb-3">
                <input type="file" class="form-control" id="exampleFormControlInput1">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Done</button>
      </div>
    </div>
  </div>
</div>

<!-- modal for account information-->
<div class="modal fade" id="accountinformation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update Account Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="p-3">
            <div class="form-group">
                 <label for="exampleInputEmail1">First Name</label>
                <input type="email" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group  mt-1">
                <label for="exampleInputPassword1">Last Name</label>
                <input type="password" class="form-control form-control-sm" id="exampleInputPassword1">
            </div>
                <div class="row mt-1">
                    <div class="col">
                        <label>Email</label>
                        <input type="text" class="form-control form-control-sm" >
                    </div>
                    <div class="col">
                        <label>Contact No.</label>
                        <input type="text" class="form-control form-control-sm" >
                    </div>
                </div>
            <button type="submit" class="btn btn-primary mx-auto d-block mt-3" style="width:26rem">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include '../../fragments/footer.php'; ?>
</html>