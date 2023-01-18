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
    <title>signUp</title>
    <link rel="stylesheet" href="../../public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/bootstrap/css/all.min.css">
    <link rel="stylesheet" href="../../public/bootstrap/css/chosen.min.css">
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
                    <p class="login-box-msg">Sign up to start your session</p>
                    <form action="../../public/authController/signUpAction" method="POST" class="form">

                        <div class="form-group">

                            <div class="forRes">
                                <input type="text" name="username"  placeholder="type your name" autocomplete="off" class="req form-control">
                                <i class="fa fa-asterisk"></i>
                                <div class="custom-alert alert alert-danger mt-1">
                                    <p>type your name</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="forRes">
                                <input type="email" name="email"  placeholder="type your email" autocomplete="off" class="req form-control">
                                <i class="fa fa-asterisk"></i>
                                <div class="custom-alert alert alert-danger mt-1">
                                    <p>email is required</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="forRes"> 
                                <select name='address[]' id="mselect" required data-placeholder="Choose your adress..." multiple class="req form-control">
                                    <option value="cairo"> cairo </option>
                                    <option value="giza"> giza </option>
                                    <option value="alex"> alex </option>
                                    <option value="Bani Suef"> Bani Suef </option>
                                    <option value="Aswan"> Aswan </option>
                                </select>
                                <i class="fa fa-asterisk"></i>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="forRes">
                                <input type="password" name="password"  placeholder="type strong password" autocomplete="new-password" class="passs inputForShow form-control">
                                <i class="show fa fa-eye"></i>
                                <div class="custom-alert alert alert-danger mt-1">
                                    <p>Password must be atleast 8 letters</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="forRes">
                                <input type="password" name="confirm_password"  placeholder="confirm password" autocomplete="new-password" class="passs inputForShow form-control">
                                <i class="show fa fa-eye"></i>
                                <div class="custom-alert alert alert-danger mt-1">
                                    <p>confirm password</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <p class="mbbb">
                                    <a href="login" class="text-center">Already Have an Account ?</a>
                                </p>
                            </div>
                            <!-- /.col -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
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
    <script type="text/javascript" src="../../public/bootstrap/js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="../../public/bootstrap/js/chosen.jquery.min.js"></script>
    <script src="../../public/bootstrap/js/bootstrap.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="../../public/bootstrap/js/index.js"></script>
</body>
</html>

<?php } ?>