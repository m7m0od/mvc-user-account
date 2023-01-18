<?php
if (isset($_SESSION['username']) && $_SESSION['role_id'] == 1) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../../public/bootstrap/back/plugins/fontawesome-free/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../../public/bootstrap/back/dist/css/adminlte.min.css">
        <link rel="stylesheet" href="../../public/bootstrap/css/style.css">
        <link rel="stylesheet" href="../../public/bootstrap/css/bootstrap.min.css">
        <!-- Icon Img -->
        <link rel="icon" type="image/x-icon" href="../../public/bootstrap/uploads/cart.jpg">
    </head>

    <body class="hold-transition sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="../../public/home/index" class="nav-link">Home</a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Navbar Search -->
                    <li class="nav-item">
                        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                            <i class="fas fa-search"></i>
                        </a>
                        <div class="navbar-search-block">
                            <form class="form-inline">
                                <div class="input-group input-group-sm">
                                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-navbar" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                        <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <!-- Messages Dropdown Menu -->
                    <li class="nav-item">
                        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                            <i class="fas fa-expand-arrows-alt"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                            <i class="fas fa-th-large"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image mt-1">
                            <span style="color:white;" class="brand-text font-weight-light">Admin</span>
                        </div>
                        <div class="info">
                            <a href="../../public/orderController/index" class="d-block"><?php echo $_SESSION['username']; ?></a>
                        </div>
                    </div>

                    <!-- SidebarSearch Form -->
                    <div class="form-inline">
                        <div class="input-group" data-widget="sidebar-search">
                            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-sidebar">
                                    <i class="fas fa-search fa-fw"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                            <li class="nav-item">
                                <a href="../../public/orderController/index" class="nav-link">
                                    <i class="nav-icon fa fa-chart-line"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fa fa-border-all"></i>
                                    <p>
                                        Categories
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <ion-icon class="nav-icon forCarMarginn" name="bookmarks-outline"></ion-icon>
                                    <p>
                                        Items
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../../public/orderController/orders" class="nav-link">
                                    <ion-icon class="nav-icon forCarMarginn" name="cart-outline"></ion-icon>
                                    <p>
                                        Orders
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fa fa-comment"></i>
                                    <p>
                                        Reports
                                    </p>
                                </a>
                            </li>

                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Shopping Store</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="../../public/home/index">Home</a></li>
                                    <li class="breadcrumb-item"><a href="../../public/authController/logOut">logout</a></li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Content</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="row mt-5">
                                <div class="col-md-12">
                                    <div class="w-75 text-center m-auto">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#id</th>
                                                    <th scope="col">user_id</th>
                                                    <th scope="col">products_name</th>
                                                    <th scope="col">order_code</th>
                                                    <th scope="col">status</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody class="table-group-divider">
                                    <?php foreach ($orders as $order) : ?>
                                        <tr>
                                            <td><?= $order['id']; ?></td>
                                            <td><?= $order['user_id']; ?></td>
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

                                       </tr>
                                    <?php endforeach; ?>
                                </tbody>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b>Version</b> 3.2.0
                </div>
                <strong>Copyright &copy; 2014-2021 <a href="#">Admin</a>.</strong> All rights reserved.
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->

        <script src="../../public/bootstrap/back/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../../public/bootstrap/back/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../../public/bootstrap/back/dist/js/adminlte.min.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="../../public/bootstrap/js/jquery-3.6.0.min.js"></script>
        <script src="../../public/bootstrap/js/popper.min.js"></script>
        <script src="../../public/bootstrap/js/bootstrap.min.js"></script>
        <script src="../../public/bootstrap/js/index.js"></script>

    </body>

    </html>
<?php
} else {
    header('location:../../public/home/index');
?>


<?php } ?>