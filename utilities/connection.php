<?php
   
    $GLOBALS['connection'] = mysqli_connect("localhost", "thesis", "thesis", "petshop");

    //-------------------Start of User functions  ------------------------------

    function emailValidation($email){
        $getUserByEmail = "SELECT email FROM user WHERE email = '$email'";
        $result = mysqli_query($GLOBALS['connection'],$getUserByEmail);
        if(mysqli_num_rows($result) > 0){
            return 1;
        }
        return 0;

    }

    function contactValidation($number){
        $getUserByContactNumber = "SELECT contact_no FROM user WHERE contact_no = '$number'";
        $result = mysqli_query($GLOBALS['connection'], $getUserByContactNumber);
        if(mysqli_num_rows($result) > 0){
            return 1;
        }
        return 0;
    }

    function registerUser($user){
        $saveUser = "INSERT INTO user(first_name, last_name, email, contact_no ,password, user_type) VALUES ('$user[0]', '$user[1]', '$user[2]', '$user[3]', '$user[4]', 'USER')";
        if(mysqli_query($GLOBALS['connection'], $saveUser)){
            return 1;
        }
        return 0;
    }

    function logInUser($email, $password){
        $findUser = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($GLOBALS['connection'], $findUser);
        $user = mysqli_fetch_assoc($result);
        return $user;
    }

    //------------------ End of User Functions -------------------------//

    //------------------ Start of Employee Functions ------------------------//

    function registerEmployee($employee){
        $saveEmployee = "INSERT INTO user(first_name, last_name, email, contact_no ,password, user_type) VALUES ('$employee[0]', '$employee[1]', '$employee[2]', '$employee[3]', '$employee[4]', '$employee[5]')";
        if(mysqli_query($GLOBALS['connection'], $saveEmployee)){
            return 1;
        }
        return 0;
    }

    function getAllEmployees() {
        $employeesQuery = "SELECT * FROM user WHERE user_type = 'EMPLOYEE'";
        $queryItems = mysqli_query($GLOBALS['connection'], $employeesQuery);
        $employees = mysqli_fetch_all($queryItems);
        return $employees;
    }

   function updateEmployee($employee, $id){
        $employeesQuery = "UPDATE user SET first_name = '$employee[0]', last_name = '$employee[1]', email = '$employee[2]', contact_no= '$employee[3]' WHERE id = '$id'";
        if(mysqli_query($GLOBALS['connection'], $employeesQuery)){
            return 1;
        }
        return 0;
   }

   function deleteEmployee($id){
        $employeeQuery = "DELETE FROM user WHERE id = '$id'";
        if(mysqli_query($GLOBALS['connection'], $employeeQuery)){
            return 1;
        }
        return 0;
   }



    //------------------ Start of item functions ------------------------

    function saveItem($item){
        $saveItem = "INSERT INTO item(item_name, manufacturer, selling_price, quantity, symbol, expiration_date) VALUES ('$item[0]', '$item[1]', '$item[2]', '$item[3]', '$item[4]', '$item[5]')";
        if(mysqli_query($GLOBALS['connection'], $saveItem)){
            return 1;
        }
        return 0;
    }

    function getAllItems(){
        $getItems = "SELECT * FROM item";
        $queryItems = mysqli_query($GLOBALS['connection'], $getItems);
        $items = mysqli_fetch_all($queryItems, MYSQLI_ASSOC);
        return $items;
    }

    function updateItem($item_id, $item){
        $updateQuery = "UPDATE item SET item_name = '$item[0]', manufacturer = '$item[1]', selling_price='$item[2]', quantity = '$item[3]', symbol = '$item[4]', expiration_date ='$item[5]' WHERE item_id = '$item_id'";
        if(mysqli_query($GLOBALS['connection'], $updateQuery)){
            return 1;
        }
        return 0;
    }

    function deleteItem($itemId){
        $deleteItemQuery = "DELETE FROM item WHERE item_id = $itemId";
        if(mysqli_query($GLOBALS['connection'], $deleteItemQuery)){
            return 1;
        }
        return 0;
    }
    function getItemById($item){
        $getQuery = "SELECT * FROM item WHERE item_id = $item";
        $itemQuery = mysqli_query($GLOBALS['connection'], $getQuery);
        $item = mysqli_fetch_assoc($itemQuery);
        return $item;
    }

    function updateItemLessen($item_id, $quantity_to_less){
        $itemToUpdate = getItemById($item_id);
        $itemQuantity = $itemToUpdate['quantity'];
        $newQuantity = $itemQuantity - $quantity_to_less;
        $updateQuery = "UPDATE item SET quantity = '$newQuantity' WHERE item_id = '$item_id'";
        if(mysqli_query($GLOBALS['connection'], $updateQuery)){
            return 1;
        }
        return 0;
    }


    function updateItemAddition($item_id, $quantity_to_add){
        $itemToUpdate = getItemById($item_id);
        $itemQuantity = $itemToUpdate['quantity'];
        $newQuantity = $quantity_to_add + $itemQuantity;
        $updateQuery = "UPDATE item SET quantity = '$newQuantity' WHERE item_id = '$item_id'";
        if(mysqli_query($GLOBALS['connection'], $updateQuery)){
            return 1;
        }
        return 0;
    }

    //------------------ End of User Functions -------------------------//

    //------------------ Start of Service Functions ------------------------//


    function saveService($service){
        $saveService = "INSERT INTO service(service_name, service_price) VALUES ('$service[0]', '$service[1]')";
        if(mysqli_query($GLOBALS['connection'], $saveService)){
            return 1;
        }
        return 0;
    }


    function getAllServices(){
        $getServices = "SELECT * FROM service";
        $queryItems = mysqli_query($GLOBALS['connection'], $getServices);
        $services = mysqli_fetch_all($queryItems, MYSQLI_ASSOC);
        return $services;
    }

    function getServiceById($serviceId){
        $getQuery = "SELECT * FROM service WHERE service_id = '$serviceId'";
        $getService = mysqli_query($GLOBALS['connection'], $getQuery);
        $service = mysqli_fetch_assoc($getService);
        return $service;
        

    }

    function updateService($service, $id){
        $updateQuery = "UPDATE service SET service_name = '$service[0]', service_price = '$service[1]' WHERE service_id = '$id'";
        if(mysqli_query($GLOBALS['connection'], $updateQuery)){
            return 1;
        }
        return 0;
    }

    function deleteService($id){
        $deleteQuery = "DELETE FROM service WHERE service_id = '$id'";
        if(mysqli_query($GLOBALS['connection'], $deleteQuery)){
            return 1;
        }
        return 0;
    }

    //------------------ End of Service Functions --------//

    //------------------ Start of Schedule Functions --------//

    function checkIfTheresASchedule($date, $time){
        $checkQuery = "SELECT * FROM schedule WHERE date = '$date' AND time = '$time'";
        $queryItems = mysqli_query($GLOBALS['connection'], $checkQuery);
        if(mysqli_num_rows($queryItems)>0){
            return 1;
        }
        return 0;
    }

    function saveSchedule($date, $schedule){
        $saveQuery = "INSERT INTO schedule(date, time, isAvailable) VALUES('$date', '$schedule', 'true')";
        if(checkIfTheresASchedule($date, $schedule) == 0){
            if(mysqli_query($GLOBALS['connection'], $saveQuery)){
                return 1;
            }
            return 0;
        }
    }

    function getSchedules($date){
        $getQuery = "SELECT * FROM schedule WHERE date = '$date' and isAvailable = 'true'" ;
        $scheduleQuery = mysqli_query($GLOBALS['connection'], $getQuery);
        $schedules = mysqli_fetch_all($scheduleQuery, MYSQLI_ASSOC);
        return $schedules;
    }

    function setAvailabilityTrue($scheduleId){
        $scheduleQuery = "UPDATE schedule SET isAvailable = 'true' WHERE sched_id = '$scheduleId'";
        if(mysqli_query($GLOBALS['connection'], $scheduleQuery)>0){
            return 1;
        }
        return 0;
    }
    function setAvailabilityFalse($scheduleId){
        $scheduleQuery = "UPDATE schedule SET isAvailable = 'false' WHERE sched_id = '$scheduleId'";
        if(mysqli_query($GLOBALS['connection'], $scheduleQuery)>0){
            return 1;
        }
        return 0;
    }
    
    //------------------ End of Schedule Functions -----------//

    //------------------ Start of Appointment Functions -------- //

    function checkIfTransactionIdIsUnique($transactionId){
        $getQuery = "SELECT * FROM appointment WHERE transaction_id = '$transactionId'";
        $queryItems = mysqli_query($GLOBALS['connection'], $getQuery);
        if(mysqli_num_rows($queryItems) > 0){
            return 1;
        }
        return 0;
    }

    function saveAppointment($transactionId, $user, $time, $servicesToSave){
        $saveQuery = "INSERT INTO appointment(transaction_id, user, time, services, status) VALUES ('$transactionId', '$user', '$time', '$servicesToSave', 'RESERVE')";
        $alterTable = "UPDATE schedule SET isAvailable = 'false' WHERE sched_id = '$time'";
        if(mysqli_query($GLOBALS['connection'], $saveQuery)){
            if(mysqli_query($GLOBALS['connection'], $alterTable)){
                return 1;
            }
            return 0;
        }
        return 0;
    }


    function getAppointmentsById($userId = 1){
        $queryItems = "SELECT * FROM appointment INNER JOIN schedule ON appointment.time = schedule.sched_id WHERE appointment.user = '$userId' ORDER BY schedule.date";
        $queryAppointments = mysqli_query($GLOBALS['connection'], $queryItems);
        $appointments = mysqli_fetch_all($queryAppointments, MYSQLI_ASSOC);
        return $appointments;
    }



    function getAllAppointments(){
        $queryItems = "SELECT * FROM appointment INNER JOIN schedule ON appointment.time = schedule.sched_id INNER JOIN user ON appointment.user = user.id  ORDER BY schedule.date DESC";
        $queryAppointments = mysqli_query($GLOBALS['connection'], $queryItems);
        $appointments = mysqli_fetch_all($queryAppointments, MYSQLI_ASSOC);
        return $appointments;
    }

    function cancelAppointment($transactionId){
        $updateQuery = "UPDATE appointment SET status = 'CANCELLED' WHERE transaction_id = '$transactionId'";
        if(mysqli_query($GLOBALS['connection'], $updateQuery)>0){
            return 1;
        }
        return 0;
    }

    function setAppointmentDone($appointmentId){
        $updateQuery = "UPDATE appointment SET status = 'DONE' WHERE id = '$appointmentId'";
        if(mysqli_query($GLOBALS['connection'], $updateQuery)){
            return 1;
        }
        return 0;
    }

    function reSchedAppointment($transactionId, $newScheduleId){
        $timeQuery = "SELECT time from appointment WHERE transaction_id = '$transactionId'";
        $updateAppointment = "UPDATE appointment SET time = '$newScheduleId' WHERE transaction_id = '$transactionId'";
        $getTime = mysqli_query($GLOBALS['connection'], $timeQuery);
        $rowTime = mysqli_fetch_row($getTime);
        setAvailabilityTrue($rowTime[0]);
        setAvailabilityFalse($newScheduleId);
        if(mysqli_query($GLOBALS['connection'], $updateAppointment)>0){
            return 1;
        }
        return 0; 
    }

    function getAppointmentByTransactionId($transactionId){
        $queryItems = "SELECT appointment.id as appointmentId, appointment.*, schedule.*, user.* FROM appointment INNER JOIN schedule ON appointment.time = schedule.sched_id INNER JOIN user ON appointment.user = user.id  WHERE appointment.transaction_id = '$transactionId'";
        $appointmentQuery = mysqli_query($GLOBALS['connection'], $queryItems);
        $appointment = mysqli_fetch_assoc($appointmentQuery);
        return $appointment;
    }

    //------------------End of Appointment Functions -----------//

    //------------------ Start of Transaction Functions -----------//

    function saveTransaction($appointmentId, $totalExpenses){
        $saveQuery = "INSERT INTO transaction SET appointment_id = '$appointmentId', total_expenses = '$totalExpenses'";
        if(mysqli_query($GLOBALS['connection'], $saveQuery)){
            return 1;
        }
        return 0;
    }

    //------------------- End of Transaction Functions -----------//

    //------------------- Start of Additional Expenses Functions -----------//

    function saveAdditionalExpenses($appointmentId, $itemId){
        $saveQuery = "INSERT INTO additional_exp SET appointment_id = '$appointmentId', expense_id = '$itemId'";
        if(mysqli_query($GLOBALS['connection'], $saveQuery)){
            return 1;
        }
        return 0;
    }

    //------------------ End of Additional Expenses Functions --------//


    function formatDate($date){
        $dateToUpdate = strtotime($date);
        return date("M-d-Y", $dateToUpdate);
    }

    function generateRandomString($length = 15) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function getDateDifference($date1, $date2){
        $diff = strtotime($date2) - strtotime($date1);
        return abs(round($diff / 86400));
    }


    function getNumberofUser(){
        $getQuery = "SELECT id FROM user WHERE user_type = 'USER'";
        $users = mysqli_query($GLOBALS['connection'], $getQuery);
        $numberOfUser = mysqli_num_rows($users);
        return $numberOfUser;
    }

    function getNumberOfItems(){
        $getItemsQuery = "SELECT item_id FROM item WHERE quantity > 0";
        $items = mysqli_query($GLOBALS['connection'], $getItemsQuery);
        $numberOfItemsAvailable = mysqli_num_rows($items);
        return $numberOfItemsAvailable;
    }

    function getNumberOfUnavailableItems(){
        $getItemsQuery = "SELECT item_id FROM item WHERE quantity = 0";
        $unavailableItems = mysqli_query($GLOBALS['connection'], $getItemsQuery);
        $numberOfItemsUnavailable = mysqli_num_rows($unavailableItems);
        return $numberOfItemsUnavailable;
    }
    
    function getTreatedToday($date){
        $getTreatedQuery = "SELECT id FROM appointment JOIN schedule ON appointment.time = schedule.sched_id WHERE status = 'DONE' AND date = '$date'";
        $treatedItems = mysqli_query($GLOBALS['connection'], $getTreatedQuery);
        $numberOfTreatedItems = mysqli_num_rows($treatedItems);
        return $numberOfTreatedItems;
    }
    function getUntreatedToday($date){
        $getTreatedQuery = "SELECT id FROM appointment JOIN schedule ON appointment.time = schedule.sched_id WHERE status != 'DONE' AND date = '$date'";
        $UntreatedItems = mysqli_query($GLOBALS['connection'], $getTreatedQuery);
        $numberOfUntreatedItems = mysqli_num_rows($UntreatedItems);
        return $numberOfUntreatedItems;
    }

    
    

?>
