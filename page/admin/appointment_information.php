<?php
include('../../utilities/connection.php');
session_start();
if (isset($_GET['transactionId']) or isset($_POST['add_cart'])) {
    $transactionId = $_GET['transactionId'];
    $appointment = getAppointmentByTransactionId($transactionId);
    $inventory = getAllItems();
    $servicesAvailed = array();
    $additionalExpenses = array();
    $services = explode(',', $appointment['services']);
    $price = 0;
    foreach ($services as $serviceId) {
        $service = getServiceById($serviceId);
        array_push($servicesAvailed, $service);
    }

    foreach ($servicesAvailed as $prices) {
        $price += $prices['service_price'];
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Information</title>
</head>
<?php include '../../fragments/admin_navigation_bar.php'; ?>

<body>

    <div class="card mx-auto mt-5" style="max-width: 40rem; width: auto;">
        <div class="card-body" style="width:100%;">
            <h5 class="card-title text-center bg-light p-2">Appointment Information</h5>
            <table class="table table-borderless table-sm mb-3">
                <tr>
                    <th class="card-text">Name</th>
                    <td class="card-text"><?php echo $appointment['first_name'] . " " . $appointment['last_name']; ?></td>
                </tr>
                <tr>
                    <th class="card-text">Email</th>
                    <td class="card-text"><?php echo $appointment['email']; ?></td>
                </tr>
                <tr>
                    <th class="card-text">Service/s Avail</th>
                    <td class="card-text">
                        <table style="width: 100%;">
                            <?php foreach ($servicesAvailed as $service) : ?>
                                <tr>
                                    <td><?php echo $service['service_name']; ?></td>
                                    <td>PHP <?php echo $service['service_price']; ?>.00</td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </td>
                </tr>
                <tr>
                    <th class="card-text">Initial Price</th>
                    <td class="card-text" id="initalEx">&#8369 <?php echo $price; ?>.00</td>
                </tr>
                <tr>
                    <th class="card-text">Addition Expenses</th>
                    <td class="card-text" id="adEx">&#8369 0.00</td>
                </tr>
                <tr>
                    <th class="card-text">Total Expenses</th>
                    <td class="card-text" id="totalEx">&#8369 0.00</td>
                </tr>
            </table>
            <div class="mb-3 mt-2">
                <p class="h6 bg-light p-2">Additional Charge/s</p>
                <table class="table table-sm table-borderless">
                    <thead class="bg-info text-white">
                        <th class="card-text">Description</th>
                        <th class="card-text">Price</th>
                        <th class="card-text">Qty</th>
                        <th class="card-text">Amount</th>
                        <th></th>
                    </thead>
                    <tbody id="item_row">
                    </tbody>
                </table>
            </div>


            <div class="row">
                <div class="form-group col-md-6 mb-1">
                    <select id="item_id" class="form-control" name="item_id" required>
                        <option selected value="0">Choose...</option>
                        <?php foreach ($inventory as $item) : ?>
                            <option value="<?php echo $item['item_id']; ?>"><?php echo $item['item_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-3 form-group mb-1">
                    <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Qty" min="1">
                </div>
                <div class="col-md-3 mb-1">
                    <button class="btn btn-success" style="width: 100%;" name="add_cart" id="add_expenses">Add</button>
                </div>
                <input type="hidden" name="apoointment_id" value="<?php echo $appointment['id']; ?>">

            </div>

        </div>
        <form action="../../utilities/library/save_transaction.php" method="POST">
            <div class="text-center" style="width:auto;">
                <input type="hidden" name="appointment_id" value="<?php echo $appointment['appointmentId']; ?>">
                <input type="hidden" name="add_exp_items" id="add_items_ids">
                <input type="hidden" name="total_expenses" id="inp_total_exp">
                <button class="btn btn-primary mb-2" style="min-width:94%;" name="save_transaction">Next</button>
                <a href="home.php"><button class="btn btn-outline-danger mb-3" style="min-width:94%;">Cancel</button></a>
            </div>
    </div>
    </form>
</body>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '#add_expenses', function() {
            var itemId = $('#item_id').val();

            if (itemId == 0) {
                alert("Please select item atleast 1");
                return;
            }
            var quantity = $('#quantity').val();
            $.ajax({
                url: "../../utilities/library/itemAndPrice.php",
                method: 'POST',
                data: {
                    itemId: itemId,
                    itemQuantity: quantity,
                },
                success: function(data) {
                    $('#item_row').append(data);

                    updatePrice(itemId, quantity);
                }
            });
        });
    });

    $(document).ready(function() {
        $(document).on('click', '.remove', function(e) {
            var row = "#" + e.target.parentElement.parentElement.id;
            var rowClass = ".price" + e.target.parentElement.parentElement.id;
            var ids_expenses = document.querySelector('#add_items_ids');
            var total_expenses_td = document.querySelector('#totalEx');
            var inp_total_exp = document.querySelector('#inp_total_exp');
            var total_expenses = total_expenses_td.innerHTML;
            var rowItem = e.target.parentElement.parentElement;
            var priceItemToRemove = rowItem.querySelector(rowClass).innerHTML;
            var quantityToRemove = rowItem.querySelector(`#quantity${rowItem.id}`).innerHTML;
            var quantity = quantityToRemove.split(' ');
            var total_expenses_readable = total_expenses.substring(2, total_expenses.length - 3);
            var readablePriceToRemove = priceItemToRemove.substring(2, priceItemToRemove.length - 3);
            totalAdditionalExpenses -= parseInt(readablePriceToRemove);
            var adEx = document.querySelector("#adEx").innerHTML = "&#8369 " + totalAdditionalExpenses + ".00";
            var sumUp = Math.abs(total_expenses_readable - parseInt(readablePriceToRemove));
            total_expenses_td.innerHTML = "&#8369 " + sumUp + ".00";
            inp_total_exp.value = sumUp;
            var newArray = additionalExpensesIds.filter(filterIds(rowItem.id));
            additionalExpensesIds=[...newArray];
            ids_expenses.value = additionalExpensesIds.toString();
            $.ajax({
                url: "../../utilities/library/add_inventory.php",
                method: "POST",
                data:{
                    item_id: rowItem.id,
                    item_quantity: quantity[0],
                },

                success: function(data){
                    console.log(data);
                }
            })
            $(row).remove();
        });
    });
</script>

<script type="text/javascript">
    var totalAdditionalExpenses = 0;
    var additionalExpensesIds = [];
    // var expensesDictionary = [];

    function updatePrice(id, itemQuantity) {
        var rowItem = document.querySelector('#item_row');
        var ids_expenses = document.querySelector('#add_items_ids');
        var add_expenses = document.querySelector('#adEx');
        var total_expenses = document.querySelector('#totalEx');
        var inital_expenses = document.querySelector('#initalEx').innerHTML;
        var inp_total_exp = document.querySelector('#inp_total_exp');
        var classId = `.price${id}`;
        var price = rowItem.querySelector(classId);
        var readablePrice = price.innerHTML.substring(2, price.innerHTML.length - 3);
        var readableInitialPrice = inital_expenses.substring(2, inital_expenses.length - 3);
        totalAdditionalExpenses += parseInt(readablePrice);
        add_expenses.innerHTML = "&#8369 " + totalAdditionalExpenses + ".00";
        var sumUp = (totalAdditionalExpenses + parseInt(readableInitialPrice));
        total_expenses.innerHTML = "&#8369 " + sumUp + ".00";
        additionalExpensesIds.push(id);
        /* expensesDictionary.push({
            "item": id,
            "quantity": itemQuantity
         });*/


         $.ajax({
            url: '../../utilities/library/minus_inventory.php',
            method: 'POST',
            data: {
                item_id: id,
                item_quantity: itemQuantity
            }, 
            success: function (data){
                console.log(data);
            }
         })
        ids_expenses.value = additionalExpensesIds;
        inp_total_exp.value = sumUp;



    }

    function filterIds(ids) {
        return function(value) {
            return ids != value;
        }
    }

    function filterObject(ids){
        return function(value) {
            return ids != value.item;
        }
    }


</script>
<?php include '../../fragments/footer.php'; ?>

</html>