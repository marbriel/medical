<?php 
    require_once '../connection.php';


    if(isset($_POST['update_item'])){
        $item_id = mysqli_real_escape_string($GLOBALS['connection'], $_POST['id_to_update']);
        $item_name = mysqli_real_escape_string($GLOBALS['connection'], $_POST['item_name']);
        $manufacturer = mysqli_real_escape_string($GLOBALS['connection'], $_POST['manufacturer']);
        $selling_price = mysqli_real_escape_string($GLOBALS['connection'], $_POST['selling_price']);
        $quantity = mysqli_real_escape_string($GLOBALS['connection'], $_POST['quantity']);
        $symbol = mysqli_real_escape_string($GLOBALS['connection'], $_POST['symbol']);
        $expDate = mysqli_real_escape_string($GLOBALS['connection'], $_POST['expDate']);

        $updatedItem = array($item_name, $manufacturer, $selling_price, $quantity, $symbol, $expDate);
        updateItem($item_id, $updatedItem);
        header('Location: ../../page/inventory/home.php');
    }
?>