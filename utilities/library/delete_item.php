<?php
    include ('../connection.php');
    
    if(isset($_POST['delete_item'])){
        $itemId = mysqli_real_escape_string($GLOBALS['connection'], $_POST['item_id_delete']);
        deleteItem($itemId);
        header('Location: ../../page/inventory/home.php');
    }
?>