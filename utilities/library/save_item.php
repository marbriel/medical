<?php
    require_once '../connection.php';
    require_once '../functions.php';

    if(isset($_POST['save_item'])){
        $itemName = mysqli_real_escape_string($GLOBALS['connection'], $_POST['item_name']);
        $manufacturer = mysqli_real_escape_string($GLOBALS['connection'], $_POST['manufacturer']);
        $selling_price = mysqli_real_escape_string($GLOBALS['connection'], $_POST['selling_price']);
        $quantity = mysqli_real_escape_string($GLOBALS['connection'], $_POST['quantity']);
        $symbol = mysqli_real_escape_string($GLOBALS['connection'], $_POST['symbol']);
        $expDateRaw = mysqli_real_escape_string($GLOBALS['connection'], $_POST['expDate']);
        $expDate = "";
        if($expDateRaw == null){
            $expDate = "null";
        }else{
            $expDate = date('Y-m-d', strtotime($expDateRaw));
        }
        $item = array($itemName, $manufacturer, $selling_price, $quantity, $symbol, $expDate);
        
        saveItem($item);
        header('Location: ../../page/inventory/home.php');
    }
?>