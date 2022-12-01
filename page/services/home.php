<?php
session_start();
include('../../utilities/connection.php');
$services =  getAllServices();
if (!isset($_SESSION['user'])) {
    header('Location: ../log_in.php');
}

if ($_SESSION["user"]['user_type'] == 'USER') {
    header('Location: ../user/homepage.php');
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
</head>
<?php include('../../fragments/admin_navigation_bar.php'); ?>

<body>
    <div class="m-5">
        <h1 class="text-center">Offered Services</h1>
        <div class="card mx-auto mt-3" style="max-width: 70rem; width:auto;">
            <div class="card-body">
                <h5 class="card-title text-center">List Of Services</h5>
                <div class="clearfix">
                    <button class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="margin-bottom: 5px;">Register</button>

                </div>
                <div class="table-responsive-lg mb-5" style="max-height: 400px; overflow:auto">
                    <table class="table table-hover table-sm " style="max-width:100%; ">
                        <thead class="bg-success text-white">
                            <tr>
                                <th scope="col">Service Id </th>
                                <th scope="col">Service Name </th>
                                <th scope="col">Service Price </th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($services as $service) : ?>
                                <tr>
                                    <td id="serviceId"><?php echo $service['service_id']; ?></td>
                                    <td id="serviceName"><?php echo $service['service_name']; ?></td>
                                    <td id="servicePrice">&#8369 <?php echo $service['service_price']; ?>.00</td>
                                    <td><i class="bi bi-pencil-square text-info me-2 updateService"></i><i class="bi bi-x-circle-fill text-danger deleteService"></i></td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php include '../../fragments/footer.php'; ?>
    <?php include('modal_update.php'); ?>
    <?php include('modal_delete.php'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '.updateService', function() {
                id = $(this).closest('tr').find('#serviceId').text();
                serviceName = $(this).closest('tr').find("#serviceName").text();
                servicePrice = $(this).closest('tr').find("#servicePrice").text();
                servicePrice = servicePrice.substring(2, servicePrice.length - 3);
                $('#service_update').modal('show');

                $('#id').val(id);
                $('#update_service_name').val(serviceName);
                $('#update_price').val(servicePrice);
            });
        });

        $(document).ready(function() {
            $(document).on('click', '.deleteService', function() {
                id = $(this).closest('tr').find('#serviceId').text();
                name = $(this).closest('tr').find('#serviceName').text();
                $('#modal_service_delete').modal('show');
                $('#service_name_delete').html(name);
                $('#service_id_delete').val(id);
            });
        });
    </script>
</body>
<!-- modal form to register service -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">New Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="p-3" method="post" action="../../utilities/library/save_service.php">
                    <div class="form-group">
                        <label for="service_name">Service Name</label>
                        <input type="text" class="form-control form-control-sm" id="service_name" aria-describedby="emailHelp" required name="serviceName">
                    </div>
                    <div class="form-group  mt-1">
                        <label for="price">Price</label>
                        <input type="number" class="form-control form-control-sm" id="price" required name="price" min="0">
                    </div>
                    <button type="submit" class="btn btn-primary mx-auto d-block mt-3" style="width:26rem" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

</html>