<?php
    include('../connection.php');
    if(isset($_POST['itemId'])){
        $item = getItemById($_POST['itemId']);
        $itemRow = "
            <tr id = ".$item['item_id'].">
                <td>". $item['item_name'] ."</td>
                <td>". $item['selling_price']."</td>
                <td id=quantity". $item['item_id'] .">". $_POST['itemQuantity']." ".$item['symbol'] ."</td>
                <td class=price".$item['item_id']."> &#8369 ". $item['selling_price'] * $_POST['itemQuantity'] .".00</td>
                <td><i class='bi bi-x-circle-fill text-danger remove'></i></td>
            </tr>
        ";

        echo $itemRow;
    }

?>