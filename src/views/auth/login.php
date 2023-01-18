<?php
 if(isset($_SESSION['username']))
 {
     header('location:../../public/authController/profile');
 }else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="../../public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/bootstrap/css/all.min.css">
    <link rel="stylesheet" href="../../public/bootstrap/css/index2.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="icon" type="image/x-icon" href="../../public/bootstrap/uploads/cart.jpg">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../public/bootstrap/back/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../public/bootstrap/back/dist/css/adminlte.min.css">
</head>
<body>
    
    <div class="container forHeaders text-center">
        <div class="login-box m-auto">
            <div class="login-logo">
                <a href="../../public/home/index"><b>User-Account</b></a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>
                    <form action="../../public/authController/loginAction" method="POST" class="form" enctype="multipart/form-data">

                        <div class="form-group">
                            <div class="forRes">
                                <input type="text" name="username" required placeholder="type your name" autocomplete="off" class="req form-control">
                                <i class="fa fa-asterisk"></i>
                                <div class="custom-alert alert alert-danger mt-1">
                                    <p>username is required</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="forRes">
                                <input type="password" name="password" required placeholder="type your password" autocomplete="new-password" class="passs inputForShow form-control">
                                <i class="show fa fa-eye"></i>
                                <div class="custom-alert alert alert-danger mt-1">
                                    <p>please enter your password</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <p class="mbbb">
                                    <a href="signUp" class="text-center">Register a new membership</a>
                                </p>
                            </div>
                            <!-- /.col -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                            <!-- /.col -->
                        </div>

                    </form>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
    </div>

    <script src="../../public/bootstrap/js/popper.min.js"></script>
    <script src="../../public/bootstrap/js/jquery-3.6.0.min.js"></script>
    <script src="../../public/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../public/bootstrap/back/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../../public/bootstrap/back/dist/js/adminlte.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="../../public/bootstrap/js/index.js"></script>
</body>
</html>

<?php } ?>
