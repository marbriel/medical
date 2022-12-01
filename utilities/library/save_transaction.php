<?php 
   include ('../connection.php');

   if(isset($_POST['save_transaction'])){
        $appointment_id = mysqli_real_escape_string($GLOBALS['connection'], $_POST['appointment_id']);
        $additionalExpenses = mysqli_real_escape_string($GLOBALS['connection'], $_POST['add_exp_items']);
        $totalExpenses = mysqli_real_escape_string($GLOBALS['connection'], $_POST['total_expenses']);
        $idsExpenses = explode(',', $additionalExpenses);
        //saving data

        if(saveTransaction($appointment_id, $totalExpenses) == 1){
            if(setAppointmentDone($appointment_id) == 1){
               foreach($idsExpenses as $expense){
                  saveAdditionalExpenses($appointment_id, $expense);
               }
               header('Location: ../../page/admin/home.php');
            }
        }
   }
?>