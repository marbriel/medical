<?php
session_start();
require_once('../../utilities/connection.php');
if (!isset($_SESSION['user'])) {
    header('Location: ../log_in.php');
}

if ($_SESSION['user']['user_type'] != "USER") {
    header('Location: ../admin/home.php');
}
$services = getAllServices();
if (isset($_POST['date_data'])) {
    $schedules = getSchedules($_POST['date_data']);
}


$appointments = getAppointmentsById($_SESSION['user']['id']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
</head>
<?php include "../../fragments/user_navigation_bar.php"; ?>

<body>
    <div class="container">
        <div class="card mx-auto mt-5" style="width: auto; background-color: #F9F9F9">
            <div class="card-body">
                <div class="card-title">
                    <h2 class="text-center">Appointments</h2>
                    <div class="clearfix">
                        <button type="button" class="btn btn-success float-end " data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi-calendar me-2"></i>Get Appointment</button>
                    </div>
                </div>
                <div class="table-responsive" style="max-height: 400px; overflow:auto">
                    <table class="table table-hover ">
                        <thead style="position:sticky; top: 0 ;">
                            <tr>
                                <th scope="col">Transaction ID</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Service</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-striped">
                            <?php foreach ($appointments as $appointment) : ?>
                                <tr>
                                    <td id="t_id"><?php echo $appointment['transaction_id']; ?></td>
                                    <td id="t_date"><?php echo $appointment['date']; ?></td>
                                    <td id="t_time"><?php echo $appointment['time']; ?></td>
                                    <td>
                                        <?php
                                        $servicesId = explode(',', $appointment['services']);
                                        $servicesToShow = array();
                                        $number = 1;
                                        foreach ($servicesId as $service) {
                                            $serviceQueried = getServiceById($service);
                                            array_push($servicesToShow, $number . ". " . $serviceQueried['service_name']);
                                            $number++;
                                        }
                                        echo implode(', <br>', $servicesToShow);
                                        ?>
                                    </td>
                                    <td class="text-muted"><?php echo $appointment['status']; ?></td>
                                    <?php if (strcmp($appointment['status'], "DONE") and strcmp($appointment['status'], "CANCELLED")) : ?>
                                        <td><i class="bi bi-pencil-square text-info resched_app"></i><i class="bi bi-x-circle-fill text-danger ms-2 cancel_app"></i></td>
                                    <?php endif; ?>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Set An Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="../../utilities/library/save_appointment.php">
                    <div class="form-group mb-3">
                        <label for="exampleFormControlInput1"><b>Date</b></label>
                        <input type="date" class="form-control" id="date_sched" name="date">
                    </div>
                    <div class="form-group mb-3">
                        <label for="inputState"><b>Time</b></label>
                        <select id="time" class="form-control" name="time" required>
                            <option>No Time Available</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleFormControlSelect2"><b>Services</b></label>
                        <select multiple class="form-control" id="exampleFormControlSelect2" name="services[]" required>
                            <?php foreach ($services as $service) : ?>
                                <option value="<?php echo $service['service_id']; ?>"> <?php echo $service['service_name']; ?> &#8369 <?php echo $service['service_price']; ?>.00</option>
                            <?php endforeach; ?>
                        </select>
                        <small id="emailHelp" class="form-text text-muted">Use ctrl key to select multiple services</small>
                    </div>
                    <input type="hidden" name="userId" value="1" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <button type="sumit" class="btn btn-primary" name="submit">Done</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script language="javascript">
    var today = new Date();
    var dd = String(today.getDate() + 1).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    $('#date_sched').attr('min', today);
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#date_sched').change(function() {
            var date_id = $(this).val();
            $.ajax({
                url: "../../utilities/library/get_dates.php",
                method: 'POST',
                data: {
                    date_data: date_id
                },
                success: function(data) {
                    $('#time').html(data);
                }

            });

        });
    });

    $(document).ready(function() {
        $(document).on('click', '.cancel_app', function() {
            var transaction_id = $(this).closest('tr').find('#t_id').text();
            var transaction_date = $(this).closest('tr').find('#t_date').text();
            var transaction_time = $(this).closest('tr').find('#t_time').text();
            var statement = "Do you really want to cancel this appointment <br> <b> Transaction Id: </b> " + transaction_id + "<br><b>Date: </b>" + transaction_date + "<br><b>Time: </b> " + transaction_time;
            $("#modal_appointment_delete").modal('show');
            $('#app_delete_line').html(statement);
            $('#transaction_id').val(transaction_id);
        });
    });

    $(document).ready(function() {
        $(document).on('click', '.resched_app', function() {
            var transaction_id = $(this).closest('tr').find('#t_id').text();
            var date = $(this).closest('tr').find("#t_date").text();
            var newDate = formatDateProperty(new Date(date));
            $('#resched_appointment').modal('show');
            $('#edit_date').val(newDate);
            $('#transaction_to_update').val(transaction_id);
        });
    });

    function padTo2Digits(num) {
        return num.toString().padStart(2, '0');
    }

    function formatDateProperty(date) {
        return [
            date.getFullYear(),
            padTo2Digits(date.getMonth() + 1),
            padTo2Digits(date.getDate()),

        ].join('-');
    }
</script>
<?php include('update_appointment.php'); ?>
<?php include('cancel_appointment.php'); ?>
<?php include "../../fragments/footer.php"; ?>

</html>