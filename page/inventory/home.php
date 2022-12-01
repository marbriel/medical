<?php
session_start();
    include ('../../utilities/library/get_employees.php');
    if(!isset($_SESSION['user'])){
        header('Location: ../log_in.php');
    }

    if($_SESSION["user"]['user_type'] == 'USER'){
        header('Location: ../user/homepage.php');
    }

$items = getAllItems();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
</head>
<?php include '../../fragments/admin_navigation_bar.php'; ?>

<body>
    <?php include '../../fragments/inventory_summary.php'; ?>
    <div class="m-5">
        <h1 class="text-center">Inventory Summary</h1>
        <div class="card mx-auto mt-3" style="max-width: 80rem; width:auto;">
            <div class="card-body">
                <h3 class="card-title text-center">List Of Items</h3>
                <div class="clearfix">
                    <button class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target="#staticBackdrop">Register</button>
                </div>
                <div class="table-responsive-lg mb-5 mt-2" style="max-height: 400px; overflow:auto">
                    <table class="table table-hover table-sm " style="max-width:100%; ">
                        <thead class="bg-success text-white">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Item</th>
                                <th scope="col">Manufacturer</th>
                                <th scope="col">Selling Price</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Syb</th>

                                <th scope="col">Exp. Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($items as $item) : ?>
                                <tr id="yey">
                                    <td id="item_id"><?php echo htmlspecialchars($item['item_id']); ?></td>
                                    <td id="item_name"><?php echo htmlspecialchars($item['item_name']); ?></td>
                                    <td id="manufacturer"><?php echo htmlspecialchars($item['manufacturer']); ?></td>
                                    <td id="selling_price"><span id="peso">&#8369 </span><?php echo htmlspecialchars($item['selling_price']); ?></td>
                                    <td id="quantity"><?php echo htmlspecialchars($item['quantity']); ?></td>
                                    <td id="symbol"><?php echo htmlspecialchars($item['symbol']); ?></td>
                                    <td class="text-success" id="date">
                                        <?php 
                                        if($item['expiration_date'] == "0000-00-00"){
                                            echo "NOT APPLICABLE";
                                        }else{
                                            echo htmlspecialchars(formatDate($item['expiration_date'])); 
                                        }
                                        ?>
                                    </td>
                                    <td><i class="bi bi-pencil-square text-info me-2 update_btn" data-id="<?php echo $item['item_id']; ?>"></i><i class="bi bi-x-circle-fill text-danger delete_item_btn" data-id="<?php echo $item['item_id']; ?>"></i></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
    include('update_modal.php');
    include('delete_modal.php');
    ?>

    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '.update_btn', function() {
                var itemId = $(this).closest('tr').find("#item_id").text();
                var itemName = $(this).closest('tr').find("#item_name").text();
                var manufacturer = $(this).closest('tr').find("#manufacturer").text();
                var selling_price = $(this).closest('tr').find("#selling_price").text();
                var quantity = $(this).closest('tr').find("#quantity").text();
                var symbol = $(this).closest('tr').find("#symbol").text();
                var date = $(this).closest('tr').find("#date").text();
                var formattedDate = formatDateProperty(new Date(date));
                var currentDate = formatDateProperty(new Date());

                $('#update_item_modal').modal('show');
                $('#id_update').val(itemId);
                $('#edit_item_name').val(itemName);
                $('#edit_manufacturer').val(manufacturer);
                $('#edit_selling_price').val(selling_price.substring(2));
                $('#edit_quantity').val(quantity);
                $('#edit_symbol').val(symbol);
                $('#edit_exp').attr('min', currentDate);
                $('#edit_exp').val(formattedDate);
                
            });
        });

        $(document).ready(function() {
            $(document).on('click', '.delete_item_btn', function() {
                var itemId = $(this).closest('tr').find('#item_id').text();
                var itemName = $(this).closest('tr').find("#item_name").text();
                $('#modal_item_delete').modal('show');
                $('#item_name_delete').html(itemName);
                $('#item_id_delete').val(itemId);
            });
        });


        $(document).ready(function(){
           $(document).on('click', '#create_exp_date', function(){
                var todayDateFormatted = formatDateProperty(new Date());
                $('#create_exp_date').attr('min', todayDateFormatted);
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
</body>
<!-- add item on the inventory -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Register Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="p-3" method="post" action="../../utilities/library/save_item.php">
                    <div class="form-group">
                        <label for="item_name">Item Name</label>
                        <input type="text" class="form-control form-control-sm" id="item_name" aria-describedby="emailHelp" name="item_name">
                    </div>
                    <div class="form-group  mt-1">
                        <label for="manufacturer">Manufacturer</label>
                        <input type="text" class="form-control form-control-sm" id="manufacturer" name="manufacturer">
                    </div>
                    <div class="form-group  mt-1">
                        <label for="selling_price">Selling Price</label>
                        <input type="number" class="form-control form-control-sm" id="selling_price" name="selling_price" min="0">
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-4">
                            <label>Quantity</label>
                            <input type="number" class="form-control form-control-sm" min="0" name="quantity">
                        </div>
                        <div class="col-md-2">
                            <label>Symbol</label>
                            <input type="text" class="form-control form-control-sm" name="symbol">
                        </div>
                        <div class="col-md-6">
                            <label>Exp. Date</label>
                            <input type="date" class="form-control form-control-sm" name="expDate" id="create_exp_date">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mx-auto d-block mt-3" style="width:26rem" name="save_item">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- update item on the inventory -->

<?php include '../../fragments/footer.php'; ?>

</html>