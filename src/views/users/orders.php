<?php
if (isset($_SESSION['username']) && $_SESSION['role_id'] == 1) {
    header('location:../../public/orderController/index');
} elseif (isset($_SESSION['username']) && $_SESSION['role_id'] == 2) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/bootstrap/css/all.min.css">
    <link rel="stylesheet" href="../../public/bootstrap/css/index2.css">
    <link rel="icon" type="image/x-icon" href="../../public/bootstrap/uploads/cart.jpg">
</head>

<body>

    <header id="Header">
        <nav class="navHeader navbar navbar-expand-lg fixed-top navbar-dark">
            <div class="container-fluid">

                <div class="first-content">
                    <a class="navbar-brand" href="../../public/home/index">
                    User-Account <ion-icon class="forCarMargin" name="person-circle-outline"></ion-icon>
                    </a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="second-content collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav">
                        <li><a href="#about">About</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <?php if (isset($_SESSION['username']) && $_SESSION['role_id'] == 1) { ?>
                            <li><a href="../../public/authController/profile">Dashboard</a></li>
                        <?php } elseif (isset($_SESSION['username']) && $_SESSION['role_id'] == 2) { ?>
                            <li><a href="../../public/orderController/orders">Orders</a></li>
                        <?php } ?>
                        <li class="active"><a href="#help">Help <i class="fa fa-question"></i></a></li>
                        <li class="dropdown"><a href="javascript:void(0)" class="dropbtn">
                                <ion-icon class="forCarMargin" name="person-outline"></ion-icon> <?php if (isset($_SESSION['username'])) {echo $_SESSION['username'];} else {echo "Account";} ?> <i class="fa fa-caret-down"></i>
                            </a>
                            <div class="dropdown-content">
                                <?php if (!isset($_SESSION['username'])) { ?>
                                    <a href='../../public/authController/signUp'>
                                        <ion-icon name="person-circle-outline"></ion-icon> SignUp
                                    </a>
                                    <a href='../../public/authController/login'>
                                        <ion-icon name="log-in-outline"></ion-icon> Login
                                    </a>
                                <?php } else {  ?>
                                    <a href='../../public/authController/logOut'>
                                        <ion-icon name="log-out-outline"></ion-icon> LogOut
                                    </a>
                                <?php } ?>
                            </div>
                        </li>
                    </ul>
                    <div class="links">
                        <span class="icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="forHeaders">
    <div class="text-center m-auto">
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><a class="btn btn-info" href="../../public/orderController/previousOrders">previous orders</a></th>
                <th scope="col"><a class="btn btn-success" href="../../public/orderController/currentOrders">Current orders</a></th>
                <th scope="col"><a class="btn btn-danger" href="../../public/orderController/cancelledOrders">Cancelled orders</a></th>
            </tr>
        </thead>
    </table>
    <?php if(!empty($orders)){?>
    </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="w-75 text-center m-auto">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#id</th>
                                    <th scope="col">products_name</th>
                                    <th scope="col">order_code</th>
                                    <th scope="col">status</th>
                                    <?php foreach ($orders as $order): endforeach; // To get orders that are in pending condition ?>
                                    <?php if($order['order_status'] == 0){ ?>
                                    <th scope="col">proceed</th>
                                    <th scope="col">cancel</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php foreach ($orders as $order) : ?>
                                    <tr>
                                        <td><?= $order['id']; ?></td>
                                        <td><?= $order['product_name']; ?></td>
                                        <td><?= $order['order_code']; ?></td>
                                        <td><?php if ($order['order_status'] == 0) {
                                                echo "Pending";
                                            } elseif ($order['order_status'] == 1) {
                                                echo "charged";
                                            } elseif ($order['order_status'] == 2) {
                                                echo "Delivered";
                                            } elseif ($order['order_status'] == 3) {
                                                echo "cancelled";
                                            } ?></td>

                                            <?php if($order['order_status'] == 0){ ?>

                                        <td> <a href="../../public/orderController/proceed" class="btn btn-success">Proceed</a> </td>
                                        <td> <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addData">Cancel</button> </td>
                                        <?php } ?>
                                        <div class="modal fade" id="addData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Cancel Reason</h5>
                                                        <button type="button" class="fa fa-xmark" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container">
                                                            <div class="">
                                                                <form method="POST" action="../../public/orderController/cancelReason">
                                                                    <input type="hidden" name="user_id" value="<?php echo $order['user_id']; ?>">
                                                                    <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                                                                    <div class=" p-2">
                                                                        <textarea name="cancelReason" placeholder="type your cancel reason" class="form-control" cols="15" rows="5"></textarea>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
        }else{echo " empty orders";}
    ?>
       
    <script src="../../public/bootstrap/js/popper.min.js"></script>
    <script src="../../public/bootstrap/js/jquery-3.6.0.min.js"></script>
    <script src="../../public/bootstrap/js/bootstrap.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="../../public/bootstrap/js/index.js"></script>
</body>

</html>

<?php
} else {
    header('location:../../public/authController/login');
}
?>