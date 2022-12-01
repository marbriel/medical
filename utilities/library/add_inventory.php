<?php 
     include('../connection.php');

     if(isset($_POST['item_id']) and isset($_POST['item_quantity'])){
        $id = mysqli_real_escape_string($GLOBALS['connection'], $_POST['item_id']);
        $quantity = mysqli_real_escape_string($GLOBALS['connection'], $_POST['item_quantity']);
        updateItemAddition($id, $quantity);
     }
?>