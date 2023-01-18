<?php
if(isset($_SESSION['username']) && $_SESSION['role_id'] == 1)
{
    header('location:../../public/orderController/index');
    
}elseif(isset($_SESSION['username']) && $_SESSION['role_id'] == 2){
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
                        <?php }elseif(isset($_SESSION['username']) && $_SESSION['role_id'] == 2){?>
                            <li><a href="../../public/orderController/orders">Orders</a></li>
                            <?php } ?>
                        <li class="active"><a href="#help">Help <i class="fa fa-question"></i></a></li>
                        <li class="dropdown"><a href="javascript:void(0)" class="dropbtn"><ion-icon class="forCarMargin" name="person-outline"></ion-icon>  <?php if (isset($_SESSION['username'])) {echo $_SESSION['username'];} else {echo "Account";} ?>  <i class="fa fa-caret-down"></i></a>
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

    <div class="container forHeaders">
        <h1>payment action</h1>
    </div>
    <script src="../../public/bootstrap/js/popper.min.js"></script>
    <script src="../../public/bootstrap/js/jquery-3.6.0.min.js"></script>
    <script src="../../public/bootstrap/js/bootstrap.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="../../public/bootstrap/js/index.js"></script>
</body>

</html>

    <?php
}
else{
    header('location:../../public/authController/login');
}
?>