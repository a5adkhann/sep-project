<?php
include("./admin/db/db_connection.php");

if(isset($_GET['clearcart'])){
    if(isset($_SESSION['cart'])){
        unset($_SESSION['cart']);
        echo "<script>
        alert('Cart is cleared');
        location.assign('index.php');
        </script>";
    }
    else {
        echo "<script>
        alert('Cart is already empty');
        location.assign('index.php');
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>CozaStore</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css" integrity="sha512-kJlvECunwXftkPwyvHbclArO8wszgBGisiLeuDFwNM8ws+wKIw0sv1os3ClWZOcrEB2eRXULYUsm8OVRGJKwGA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css" integrity="sha512-XcIsjKMcuVe0Ucj/xgIXQnytNwBttJbNjltBV18IOnru2lDPe9KRRyvCXw6Y5H415vbBLRm8+q6fmLUU7DfO6Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    * {
        font-family: "Poppins", sans-serif;
    }
    #addToCart {
        transition: transform 0.3s ease-in-out;
    }
    #addToCart:hover {
        transform: translateY(-5px)
    }
    </style>
</head>

<body class="animsition">

    <!-- Header -->
    <header class="header-v3">
        <!-- Header desktop -->
        <div class="container-menu-desktop trans-03">
            <div class="wrap-menu-desktop">
                <nav class="limiter-menu-desktop p-l-45">

                    <!-- Logo desktop -->
                    <a href="index.php" class="logo">
                        <img src="images/icons/logo-02.png" alt="IMG-LOGO">
                    </a>

                    <!-- Menu desktop -->
                    <div class="menu-desktop">
                        <ul class="main-menu">
                            <li>
                                <a href="index.php">Home</a>
                            </li>

                            <li>
                                <a href="products.php">Products</a>
                            </li>

                            <li>
                                <a href="about.php">About</a>
                            </li>

                            <li>
                                <a href="contact.php">Contact</a>
                            </li>

                            <?php
							if(!isset($_SESSION['user_email']) && !isset($_SESSION['user_password'])){
							?>
                            <li>
                                <a href="login.php">Login</a>
                            </li>
                            <?php
							}
							else {
							?>
                            <li>
                                <a href="logout.php">Logout</a>
                            </li>
                            
                            <?php
                            $select_query = "SELECT customer_id FROM orders WHERE customer_id = $_SESSION[user_id]";
                            $execute = mysqli_query($connection, $select_query);
                            $get_customer_id = mysqli_num_rows($execute);
                            if($get_customer_id > 0 ){
                            ?>
                            <li>
                                <a href="orders.php">Orders</a>
                            </li>
                            <?php
                            }
                            else {
                                echo "";
                            }
                            ?>

                            <?php
							}
							?>
                        </ul>
                    </div>

                    <!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m h-full">
                        <div class="flex-c-m h-full p-r-25 bor6">
                            <div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart"
                                data-notify="<?php 
									if (isset($_SESSION['cart'])) {
										echo count($_SESSION['cart']) === 0 ? 0 : count($_SESSION['cart']);
									} else {
										echo 0; 
									}
									?>
									">
                                <i class="zmdi zmdi-shopping-cart"></i>
                            </div>
                        </div>

                        <div class="flex-c-m h-full p-lr-19">
                            <div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
                                <i class="zmdi zmdi-menu"></i>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->
            <div class="logo-mobile">
                <a href="index.php"><img src="images/icons/logo-01.png" alt="IMG-LOGO"></a>
            </div>

            <!-- Icon header -->
            <div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
                <div class="flex-c-m h-full p-r-5">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart"
                        data-notify="<?php 
									if (isset($_SESSION['cart'])) {
										echo count($_SESSION['cart']) === 0 ? 0 : count($_SESSION['cart']);
									} else {
										echo 0; 
									}
									?>">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                </div>
            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>


        <!-- Menu Mobile -->
        <div class="menu-mobile">
            <ul class="main-menu-m">
                <a href="index.php" class="stext-102 cl2 hov-cl1 trans-04">
                    Home
                </a>
                <li>
                    <a href="products.php">Products</a>
                </li>

                <li>
                    <a href="shoping-cart.php" class="label1 rs1" data-label1="hot">Features</a>
                </li>

                <li>
                    <a href="blog.php">Blog</a>
                </li>

                <li>
                    <a href="about.php">About</a>
                </li>

                <li>
                    <a href="contact.php">Contact</a>
                </li>

                <?php
							if(!isset($_SESSION['user_email']) && !isset($_SESSION['user_password'])){
							?>
                <li>
                    <a href="login.php">Login</a>
                </li>
                <?php
							}
							else {
							?>
                <li>
                    <a href="logout.php">Logout</a>
                </li>
                <?php
							}
							?>
            </ul>
        </div>

        <!-- Modal Search -->
        <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
            <button class="flex-c-m btn-hide-modal-search trans-04">
                <i class="zmdi zmdi-close"></i>
            </button>

            <form class="container-search-header">
                <div class="wrap-search-header">
                    <input class="plh0" type="text" name="search" placeholder="Search...">

                    <button class="flex-c-m trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </header>


    <!-- Sidebar -->
    <aside class="wrap-sidebar js-sidebar">
        <div class="s-full js-hide-sidebar"></div>

        <div class="sidebar flex-col-l p-t-22 p-b-25">
            <div class="flex-r w-full p-b-30 p-r-27">
                <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-sidebar">
                    <i class="zmdi zmdi-close"></i>
                </div>
            </div>

            <div class="sidebar-content flex-w w-full p-lr-65 js-pscroll">
                <ul class="sidebar-link w-full">
                    <li class="p-b-13">
                        <a href="index.php" class="stext-102 cl2 hov-cl1 trans-04">
                            Home
                        </a>
                    </li>

                    <li class="p-b-13">
                        <a href="products.php" class="stext-102 cl2 hov-cl1 trans-04">
                            Products
                        </a>
                    </li>

                    <li class="p-b-13">
                        <a href="about.php" class="stext-102 cl2 hov-cl1 trans-04">
                            About
                        </a>
                    </li>

                    <li class="p-b-13">
                        <a href="contact.php" class="stext-102 cl2 hov-cl1 trans-04">
                            Contact
                        </a>
                    </li>

                    <?php
							if(!isset($_SESSION['user_email']) && !isset($_SESSION['user_password'])){
							?>
                    <li class="p-b-13">
                        <a href="login.php" class="stext-102 cl2 hov-cl1 trans-04">Login</a>
                    </li>
                    <?php
							}
							else {
							?>
                    <li class="p-b-13">
                        <a href="logout.php" class="stext-102 cl2 hov-cl1 trans-04">Logout</a>
                    </li>
                    <?php
							}
							?>
                </ul>

                <div class="sidebar-gallery w-full p-tb-30">
                    <span class="mtext-101 cl5">
                        @ CozaStore
                    </span>

                    <div class="flex-w flex-sb p-t-36 gallery-lb">
                        <!-- item gallery sidebar -->
                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="images/gallery-01.jpg" data-lightbox="gallery"
                                style="background-image: url('images/gallery-01.jpg');"></a>
                        </div>

                        <!-- item gallery sidebar -->
                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="images/gallery-02.jpg" data-lightbox="gallery"
                                style="background-image: url('images/gallery-02.jpg');"></a>
                        </div>

                        <!-- item gallery sidebar -->
                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="images/gallery-03.jpg" data-lightbox="gallery"
                                style="background-image: url('images/gallery-03.jpg');"></a>
                        </div>

                        <!-- item gallery sidebar -->
                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="images/gallery-04.jpg" data-lightbox="gallery"
                                style="background-image: url('images/gallery-04.jpg');"></a>
                        </div>

                        <!-- item gallery sidebar -->
                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="images/gallery-05.jpg" data-lightbox="gallery"
                                style="background-image: url('images/gallery-05.jpg');"></a>
                        </div>

                        <!-- item gallery sidebar -->
                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="images/gallery-06.jpg" data-lightbox="gallery"
                                style="background-image: url('images/gallery-06.jpg');"></a>
                        </div>

                        <!-- item gallery sidebar -->
                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="images/gallery-07.jpg" data-lightbox="gallery"
                                style="background-image: url('images/gallery-07.jpg');"></a>
                        </div>

                        <!-- item gallery sidebar -->
                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="images/gallery-08.jpg" data-lightbox="gallery"
                                style="background-image: url('images/gallery-08.jpg');"></a>
                        </div>

                        <!-- item gallery sidebar -->
                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="images/gallery-09.jpg" data-lightbox="gallery"
                                style="background-image: url('images/gallery-09.jpg');"></a>
                        </div>
                    </div>
                </div>

                <div class="sidebar-gallery w-full">
                    <span class="mtext-101 cl5">
                        About Us
                    </span>

                    <p class="stext-108 cl6 p-t-27">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur maximus vulputate hendrerit.
                        Praesent faucibus erat vitae rutrum gravida. Vestibulum tempus mi enim, in molestie sem
                        fermentum quis.
                    </p>
                </div>
            </div>
        </div>
    </aside>


    <!-- Cart -->
    <div class="wrap-header-cart js-panel-cart">
        <div class="s-full js-hide-cart"></div>

        <div class="header-cart flex-col-l p-l-65 p-r-25">
            <div class="header-cart-title flex-w flex-sb-m p-b-8">
                <span class="mtext-103 cl2">
                    Your Cart
                </span>

                <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                    <i class="zmdi zmdi-close"></i>
                </div>
            </div>

            <div class="header-cart-content flex-w js-pscroll">
                <ul class="header-cart-wrapitem w-full">
                    <?php
				$grand_total = 0;
				if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
					foreach ($_SESSION['cart'] as $key => $value) {
						if (!is_array($value)) continue;
						$item_total = $value['product_quantity'] * $value['product_price'];
						$grand_total += $item_total;
            ?>
                    <li class="header-cart-item flex-w flex-t m-b-12">
                        <div class="header-cart-item-img">
                            <img src="./admin/uploads/<?php echo $value['product_image']; ?>" alt="IMG">
                        </div>

                        <div class="header-cart-item-txt p-t-8">
                            <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                <?php echo $value['product_name']; ?>
                            </a>

                            <span class="header-cart-item-info">
                                <?php 
                        echo $value['product_quantity'] . ' x RS-' . $value['product_price'];
                        echo '<br>Total: RS-' . $item_total;
                        ?>
                            </span>
                        </div>
                    </li>
                    <?php
                }
            }
            ?>
                </ul>

                <div class="w-full">
                    <div class="header-cart-total w-full p-tb-40">
                        Total: RS-<?php echo $grand_total; ?>
                    </div>

                    <div class="header-cart-buttons flex-w w-full">
                        <a href="shoping-cart.php"
                            class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                            View Cart
                        </a>

                        <a href="?clearcart" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                            Clear Cart
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>