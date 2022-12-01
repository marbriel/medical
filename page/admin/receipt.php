<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Out</title>
</head>
<?php include '../../fragments/admin_navigation_bar.php';?>
<body >
    <div class="container">
        <div class="card mx-auto mt-5 border border-2 border-primary" style="max-width: 50rem; width: auto;">
            <div class="card-body">
                <h2 class="card-title text-center">Receipt</h2>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card border border-0 " style="width: auto;">
                            <div class="card-body">
                                <h5 class="card-title">Company Name</h5>
                                <table class="table table-borderless table-sm">
                                    <tr>
                                        <th>Address</th>
                                        <td>Lipa City</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>company@gmail.com</td>
                                    </tr>
                                    <tr>
                                        <th>Contact No.</th>
                                        <td>+639897867567</td>
                                    </tr>
                                    <tr>
                                        <th>Date Printed</th>
                                        <td>September 13, 2023</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border border-0" style="width: auto;">
                            <div class="card-body">
                                <h5 class="card-title">Client</h5>
                                <table class="table table-borderless table-sm">
                                    <tr>
                                        <th>Name</th>
                                        <td>King Kevin Arañez</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>Lipa City</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>kingkevinaranez@gmail.com</td>
                                    </tr>
                                    <tr>
                                        <th>Contact No.</th>
                                        <td>+639897867567</td>
                                    </tr>
                                
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-sm">
                    <thead>
                        <tr class="bg-primary">
                            <th scope="col" class="text-white">Description</th>
                            <th scope="col" class="text-white">Price</th>
                            <th scope="col" class="text-white">Quantity</th>
                            <th scope="col" class="text-white">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Check-up</td>
                            <td>5000.00</td>
                            <td>N/A</td>
                            <td>5000.00</td>
                        </tr>
                        <tr class="table-primary">
                            <td></td>
                            <td></td>
                            <th>Total Amount</th>
                            <th>&#8369 5000.00</th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="m-2 text-end">
                <button class="btn btn-success me-2" >Check Out</button>
                <button class="btn btn-outline-danger " >Cancel</button>
            </div>
        </div>
    </div>
</body>
<?php include '../../fragments/footer.php';?>
</html>