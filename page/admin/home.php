<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header('Location: ../log_in.php');
    }

    if($_SESSION["user"]['user_type'] == 'USER'){
        header('Location: ../user/homepage.php');
    }
    include ('../../utilities/connection.php');
    $appointments = getAllAppointments();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Treatments</title>
    
</head>
<?php include '../../fragments/admin_navigation_bar.php'; ?>
<body>
    <?php include '../../fragments/summary.php'; ?>
    <div class="container">
        <div class="card mx-auto mt-5" style="width: auto; background-color: #F9F9F9">
            <div class="card-body">
                <div class="card-title">
                    <h2 class="text-center">Appointments</h2>
                    <p class="text-center" id="current_date"></p>

                </div>
                <div class="table-responsive-lg mb-5" style="max-height: 400px; overflow:auto">
                    <table class="table table-hover table-sm " style="max-width:100%; ">
                        <thead>
                            <tr class="bg-success text-white">
                                <th scope="col">Transaction Id</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($appointments as $appointment) : ?>
                                <tr>
                                    <td id= "transaction_Id"><?php echo $appointment['transaction_id'];?></td>
                                    <td id = "date" ><?php echo formatDate($appointment['date']); ?></td>
                                    <td id = "time"><?php echo $appointment['time']; ?></td>
                                    <td id = "name"><?php echo $appointment['first_name']." ". $appointment['last_name']; ?></td>
                                    <td><?php echo $appointment['email']; ?></td>
                                    <td class="text-success"><?php echo $appointment['status'];?></td>
                                        <?php if($appointment['status'] == "RESERVE"):?>
                                            <td>
                                                <i class="bi bi bi-pencil-fill text-info me-2 resched" muted></i>
                                                <a href="appointment_information.php?transactionId=<?php echo $appointment['transaction_id']?>" muted> <i class="bi bi bi-check-circle-fill text-success me-2"></i></a>
                                                <i class="bi bi-x-circle-fill text-danger cancel" muted></i>
                                            </td>
                                        <?php else: ?>
                                            <td>
                                            </td>
                                        <?php endif; ?>


                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 

    </div>
    
</body>
<?php include('delete_appointment.php'); ?>
<?php include('appointment_resched.php'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        $('#findByDate').change(function(){
            var date = $("#findByDate").val(); 
            alert("Date selected "+ date);
        });

        $(document).on('click', '.cancel', function(){
            var name = $(this).closest('tr').find("#name").text();
            var transaction_id = $(this).closest('tr').find("#transaction_Id").text();
            var date = $(this).closest('tr').find("#date").text();
            var time = $(this).closest('tr').find("#time").text();

            $('#modal_cancel_appointment').modal('show');
            var message = "Do you really want to cancel the appointment of <br><b> " + name + "</b><br>Date and Time of <br><b>" + date + " from " + time +"</b>" ;
            $('#appointment_delete').html(message);
            $('#transaction_id_cancel').val(transaction_id);
            
        });

        

    });

    $(document).ready(function(){
        $(document).on('click', '.resched', function(){
            var transaction_id = $(this).closest('tr').find('#transaction_Id').text();
            var date = $(this).closest('tr').find("#date").text();
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

<?php include '../../fragments/footer.php'; ?>
</html>