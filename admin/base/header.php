<?php
include("./db/db_connection.php");

if(!isset($_SESSION['admin_email'])){
    echo "
    <script>
    location.assign('../login.php');
    </script>
    ";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully responsive admin theme which can be used to build CRM, CMS,ERP etc." name="description" />
    <meta content="Techzaa" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="./images/logo1.png">

    <!-- Daterangepicker css -->
    <link rel="stylesheet" href="./css/daterangepicker.css">

    <!-- Vector Map css -->
    <link rel="stylesheet" href="./css/jquery-jvectormap-1.2.2.css">

    <!-- Theme Config Js -->
    <script src="./js/config.js"></script>

    <!-- App css -->
    <link href="./css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="./css/icons.min.css" rel="stylesheet" type="text/css" />

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">


        <!-- ========== Topbar Start ========== -->
        <div class="navbar-custom">
            <div class="topbar container-fluid">
                <div class="d-flex align-items-center gap-1">

                    <!-- Topbar Brand Logo -->
                    <div class="logo-topbar">
                        <!-- Logo light -->
                        <a href="index.php" class="logo-light">
                            <span class="logo-lg">
                                ADMIN
                            </span>
                            <span class="logo-sm">
                                ADMIN
                            </span>
                        </a>

                        <!-- Logo Dark -->
                        <a href="index.php" class="logo-dark">
                            <span class="logo-lg">
                                ADMIN
                            </span>
                            <span class="logo-sm">
                                ADMIN
                            </span>
                        </a>
                    </div>

                    <!-- Sidebar Menu Toggle Button -->
                    <button class="button-toggle-menu">
                        <i class="ri-menu-line"></i>
                    </button>

                    <!-- Horizontal Menu Toggle Button -->
                    <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </button>

                    <!-- Topbar Search Form -->
                    <div class="app-search d-none d-lg-block">
                        <form>
                            <div class="input-group">
                                <input type="search" class="form-control" placeholder="Search...">
                                <span class="ri-search-line search-icon text-muted"></span>
                            </div>
                        </form>
                    </div>
                </div>

                <ul class="topbar-menu d-flex align-items-center gap-3">

                    <li class="d-none d-sm-inline-block">
                        <div class="nav-link" id="light-dark-mode">
                            <i class="ri-moon-line fs-22"></i>
                        </div>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle arrow-none nav-user" data-bs-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" aria-expanded="false">
                            <span class="account-user-avatar">
                                <img src="./images/avatar.jpg" alt="user-image" width="32"
                                    class="rounded-circle">
                            </span>
                            <span class="d-lg-block d-none">
                                <h5 class="my-0 fw-normal">
                                <?php
                                if(isset($_SESSION['admin_name'])){
                                    echo $_SESSION['admin_name'];
                                }
                                else {
                                    echo "";
                                }
                                ?>    
                                <i
                                        class="ri-arrow-down-s-line d-none d-sm-inline-block align-middle"></i></h5>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                        
                            <!-- item-->
                            <a href="logout.php" class="dropdown-item">
                                <i class="ri-logout-box-line fs-18 align-middle me-1"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- ========== Topbar End ========== -->


        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu">

            <!-- Brand Logo Light -->
            <a href="index.php" class="logo logo-light">
                <span class="logo-lg" style="font-size: 30px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-weight: bold;">
                    ADMIN
                </span>
                <span class="logo-sm">
                </span>
            </a>

            <!-- Brand Logo Dark -->
            <a href="index.php" class="logo logo-dark">
                <span class="logo-lg">
                    <img src="./images/logo1.png" alt="dark logo">
                </span>
                <span class="logo-sm">
                    <img src="./images/logo1.png" alt="small logo">
                </span>
            </a>

            <!-- Sidebar -left -->
            <div class="h-100" id="leftside-menu-container" data-simplebar>
                <!--- Sidemenu -->
                <ul class="side-nav">

                    <li class="side-nav-title">Main</li>

                    <li class="side-nav-item">
                        <a href="index.php" class="side-nav-link">
                            <i class="ri-dashboard-3-line"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>

                    <li class="side-nav-title">Category</li>
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarCategories" aria-expanded="false"
                            aria-controls="sidebarCategories" class="side-nav-link">
                            <i class="ri-pages-line"></i>
                            <span> Categories </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarCategories">
                            <ul class="side-nav-second-level">
                                <li><a href="./add_category.php">Add Category</a></li>
                                <li><a href="./view_categories.php">View Category</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-title">Product</li>
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarProducts" aria-expanded="false"
                            aria-controls="sidebarProducts" class="side-nav-link">
                            <i class="ri-pages-line"></i>
                            <span> Products </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarProducts">
                            <ul class="side-nav-second-level">
                                <li><a href="./add_product.php">Add Product</a></li>
                                <li><a href="./view_products.php">View Product</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-title">Checkouts</li>
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarOrders" aria-expanded="false"
                            aria-controls="sidebarOrders" class="side-nav-link">
                            <i class="ri-pages-line"></i>
                            <span> Orders </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarOrders">
                            <ul class="side-nav-second-level">
                                <li><a href="./all_orders.php">All Orders</a></li>
                                <li><a href="./pending_orders.php">Pending Orders</a></li>
                                <li><a href="./shipped_orders.php">Shipped Orders</a></li>
                                <li><a href="./delivered_orders.php">Delivered Orders</a></li>
                                <li><a href="./cancelled_orders.php">Cancelled Orders</a></li>
                            </ul>
                        </div>
                    </li>

                     <li class="side-nav-title">Links</li>
                    <li class="side-nav-item">
                        <a href="logout.php" aria-expanded="false"
                            aria-controls="sidebarOrders" class="side-nav-link">
                            <i class="ri-pages-line"></i>
                            <span> Web </span>
                        </a>
                        <a style="color: red;" href="logout.php" aria-expanded="false"
                            aria-controls="sidebarOrders" class="side-nav-link">
                            <i class="ri-pages-line"></i>
                            <span> Logout </span>
                        </a>
                    </li>



                </ul>
                <!--- End Sidemenu -->

                <div class="clearfix"></div>
            </div>
        </div>
        <!-- ========== Left Sidebar End ========== -->