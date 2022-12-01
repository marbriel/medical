<?php
    session_start();
    include ('../../utilities/library/get_employees.php');
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
    <title>Employee</title>
</head>
<?php include '../../fragments/admin_navigation_bar.php'; ?>
<body>
<div class="m-5">
        <h1 class="text-center">Employee Management Page</h1>
        <div class="card mx-auto mt-3" style="max-width: 70rem; width:auto;">
            <div class="card-body">
                <h5 class="card-title text-center">List Of Employees</h5>
                <div class="clearfix">
                        <button class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="margin-bottom: 5px;">Register</button>
                    </div>
                <div class="table-responsive-lg mb-5" style="max-height: 400px; overflow:auto">
                    <table class="table table-hover table-sm " style="max-width:100%; ">
                        <thead class="bg-success text-white">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Contact No</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($employees as $employee): ?>
                                <tr>
                                    <td id="id"><?php echo $employee[0]; ?></td>
                                    <td id="name"><?php echo $employee[1]. " " .$employee[2]; ?></td>
                                    <td id="email"><?php echo $employee[3]; ?></td>
                                    <td id="contact"><?php echo $employee[4]; ?></td>
                                    <td class="text-success" id="status">No Work</td>
                                    <td><i class="bi bi-pencil-square text-info me-2 updateEmployee"></i><i class="bi bi-x-circle-fill text-danger deleteEmployee" ></i></td>
                                </tr>
                            <?php endforeach; ?>
                            
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
<?php include ('modal_update.php'); ?>
<?php include ('delete_modal.php'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click', '.updateEmployee', function(){
            var id = $(this).closest('tr').find('#id').text();
            var fullName = $(this).closest('tr').find('#name').text();
            var email = $(this).closest('tr').find('#email').text();
            var contact = $(this).closest('tr').find('#contact').text();
            var splitName = fullName.split(" ");
            $("#modal_update_employee").modal('show');
            $("#update_firstName").val(splitName[0]);
            $("#update_lastName").val(splitName[1]);
            $("#update_email").val(email);
            $('#update_contactNo').val(contact);
            $("#update_id").val(id);

        });

    });

    $(document).ready(function(){
        $(document).on('click', '.deleteEmployee', function(){
            var id = $(this).closest('tr').find('#id').text();
            var fullName = $(this).closest('tr').find('#name').text();
            $("#modal_employee_delete").modal('show');
            $("#employee_name_delete").html(fullName);
            $("#employee_id_delete").val(id);
        });
    });
</script>
</body>
<!-- modal form to register employee -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">New Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="p-3" method="post" action="../../utilities/library/save_employee.php">
            <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control form-control-sm" id="first_name" aria-describedby="emailHelp" required name="firstName">
                </div>
                <div class="form-group  mt-1">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control form-control-sm" id="last_name" required name="lastName">
                </div>
                <div class="row mt-1">
                    <div class="col">
                        <label>Email</label>
                        <input type="email" class="form-control form-control-sm"  id="email" required name="email">
                    </div>
                    <div class="col">
                        <label>Contact No.</label>
                        <input type="text" class="form-control form-control-sm" id="contact_no" required name="contactNo">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mx-auto d-block mt-3" style="width:26rem" name="submit">Submit</button>
            </form>
      </div>
    </div>
  </div>
</div>

<?php include '../../fragments/footer.php';?>
</html>