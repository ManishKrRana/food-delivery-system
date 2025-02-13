<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./images/favicon.png">
    <title>FoodBox - Restaurant</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!--header starts-->
    <header id="header" class="header-scroll top-header headrom">
        <!-- .navbar -->
        <nav class="navbar navbar-dark">
            <div class="container">
                <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                <a class="navbar-brand" href="index.php"> <img class="img-fluid img-rounded" src="images/food-logo.png" width="100px" alt=""> </a>
                <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                    <ul class="nav navbar-nav">
                        <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                        <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Restaurants <span class="sr-only"></span></a> </li>
                        <?php
                        if (empty($_SESSION["user_id"])) {
                            echo '<li class="nav-item"><a href="login.php" class="nav-link active">login</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active">signup</a> </li>';
                        } else {


                            echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">your orders</a> </li>';
                            echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">logout</a> </li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- /.navbar -->
    </header>
    <div class="page-wrapper">
        <!-- top Links -->
        <div class="top-links">
            <div class="container">
                <ul class="row links">
                    <li class="col-xs-12 col-sm-4 link-item active"><span>1</span><a href="restaurants.php">Choose Restaurant</a></li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>2</span><a href="#">Pick Your favorite food</a></li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Order and Pay online</a></li>
                </ul>
            </div>
        </div>
        <!-- end:Top links -->
        <!-- start: Inner page hero -->
        <div class="inner-page-hero bg-image" data-image-src="images/img/res.jpeg">
            <div class="container"> </div>
            <!-- end:Container -->
        </div>

        <!-- //results show -->
        <section class="restaurants-page mt-3">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-3">
                        <div class="widget clearfix">
                            <!-- /widget heading -->
                            <div class="widget-heading">
                                <h3 class="widget-title text-dark">
                                    Popular Dishes
                                </h3>
                                <div class="clearfix"></div>
                            </div>
                            <div class="widget-body">
                                <ul class="tags">
                                    <li> <a href="#" class="tag">
                                            Pizza
                                        </a> </li>
                                    <li> <a href="#" class="tag">
                                            Chicken Biryani
                                        </a> </li>
                                    <li> <a href="#" class="tag">
                                            Paneer Tikka
                                        </a> </li>
                                    <li> <a href="#" class="tag">
                                            Masroom Masala
                                        </a> </li>
                                    <li> <a href="#" class="tag">
                                            Chicken Masala
                                        </a> </li>
                                    <li> <a href="#" class="tag">
                                            Salad
                                        </a> </li>
                                </ul>
                            </div>
                        </div>
                        <!-- end:Widget -->
                    </div>
                    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-9">
                        <div class="bg-gray restaurant-entry">
                            <div class="row">
                                <?php $ress = mysqli_query($db, "select * from restaurant");
                                while ($rows = mysqli_fetch_array($ress)) {
                                    echo ' <div class="col-sm-12 col-md-12 col-lg-8 text-xs-center text-sm-left">
                                            	<div class="entry-logo">
                                            		<a class="img-fluid" href="dishes.php?res_id=' . $rows['rs_id'] . '">
                                            			<img src="admin/Res_img/' . $rows['image'] . '" alt="Food logo"
                                            		/></a>
                                            	</div>
                                            	<!-- end:Logo -->
                                            	<div class="entry-dscr">
                                            		<h5><a href="dishes.php?res_id=' . $rows['rs_id'] . '">' . $rows['title'] . '</a></h5>
                                            		<span>' . $rows['address'] . ' <a href="#">...</a></span>
                                            		<ul class="list-inline">
                                            			<li class="list-inline-item"><i class="fa fa-check"></i> Min ₹ 10,00</li>
                                            			<li class="list-inline-item"><i class="fa fa-motorcycle"></i> 30 min</li>
                                            		</ul>
                                            	</div>
                                            	<!-- end:Entry description -->
                                            </div>                                   
                                            <div class="col-sm-12 col-md-12 col-lg-4 text-xs-center">
                                            	<div class="right-content bg-white">
                                            		<div class="right-review">
                                            			<div class="rating-block">
                                            				<i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                            				<i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                            			</div>
                                            			<p>245 Reviews</p>
                                            			<a href="dishes.php?res_id=' . $rows['rs_id'] . '" class="btn theme-btn-dash">View Menu</a>
                                            		</div>
                                            	</div>
                                            	<!-- end:right info -->
                                            </div>';
                                }
                                ?>
                            </div>
                            <!--end:row -->
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    <section class="app-section">
        <div class="app-wrap">
            <div class="container">
                <div class="row text-img-block text-xs-left">
                    <div class="container">
                        <div class="col-xs-12 col-sm-6 hidden-xs-down right-image text-center">
                            <figure> <img src="images/app.png" alt="Right Image"> </figure>
                        </div>
                        <div class="col-xs-12 col-sm-6 left-text">
                            <h3>The Best Food Delivery App</h3>
                            <p>Now you can make food happen pretty much wherever you are thanks to the free easy-to-use Food Delivery &amp; Takeout App.</p>
                            <div class="social-btns">
                                <a href="#" class="app-btn apple-button clearfix">
                                    <div class="pull-left"><i class="fa fa-apple"></i> </div>
                                    <div class="pull-right"> <span class="text">Available on the</span> <span class="text-2">App Store</span> </div>
                                </a>
                                <a href="#" class="app-btn android-button clearfix">
                                    <div class="pull-left"><i class="fa fa-android"></i> </div>
                                    <div class="pull-right"> <span class="text">Available on the</span> <span class="text-2">Play store</span> </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- start: FOOTER -->
    <footer class="footer">
        <div class="container">
            <!-- top footer statrs -->
            <div class="row top-footer">
                <div class="col-xs-12 col-sm-3 footer-logo-block color-gray">
                    <a href="#"> <img class="img-fluid" src="images/food-logo.png" width="160px" alt="Footer logo"> </a> <span>Order Delivery &amp; Take-Out </span>
                </div>
                <div class="col-xs-12 col-sm-3 about color-gray">
                    <h5>About Us</h5>
                    <ul>
                        <li><a href="#">About us</a> </li>
                        <li><a href="#">History</a> </li>
                        <li><a href="#">Our Team</a> </li>
                        <li><a href="#">We are hiring</a> </li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-3 how-it-works-links color-gray">
                    <h5>How it Works</h5>
                    <ul>
                        <li><a href="#">Enter your location</a> </li>
                        <li><a href="#">Choose restaurant</a> </li>
                        <li><a href="#">Choose meal</a> </li>
                        <li><a href="#">Pay via credit card</a> </li>
                        <li><a href="#">Wait for delivery</a> </li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-3 pages color-gray">
                    <h5>Pages</h5>
                    <ul>
                        <li><a href="#">Search results page</a> </li>
                        <li><a href="#">User Sing Up Page</a> </li>
                        <li><a href="#">Pricing page</a> </li>
                        <li><a href="#">Make order</a> </li>
                        <li><a href="#">Add to cart</a> </li>
                    </ul>
                </div>

            </div>
            <!-- top footer ends -->
            <!-- bottom footer statrs -->
            <div class="bottom-footer">
                <div class="row">
                    <div class="col-xs-12 col-sm-3 payment-options color-gray">
                        <h5>Payment Options</h5>
                        <ul>
                            <li>
                                <a href="#"> <img src="images/upi.jpg" width="40px" alt="UPI"> </a>
                            </li>
                            <li>
                                <a href="#"> <img src="images/phonepe.png" width="40px" alt="Phone Pe"> </a>
                            </li>
                            <li>
                                <a href="#"> <img src="images/gpay.jpg" width="40px" alt="G-Pay"> </a>
                            </li>
                            <li>
                                <a href="#"> <img src="images/paytm.jpg" width="40px" alt="Paytm"> </a>
                            </li>
                            <li>
                                <a href="#"> <img src="images/apay.png" width="40px" alt="Amazon Pay"> </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-4 address color-gray">
                        <h5>Address</h5>
                        <p>S N Yadav Road, Karamtoli, Ranchi, Jharkhand - 834008</p>
                        <p><i class="fa-solid fa-phone"></i>
                            <a href="tel:+917482816710">7482816710</a>,
                            <a href="tel:+919123292205">9123292205</a>
                        </p>
                        <p><i class="fa-solid fa-envelope"></i><a href="mailto:support@foodbox.com">support@foodbox.com</a></p>
                    </div>
                    <div class="col-xs-12 col-sm-5 additional-info color-gray">
                        <h5>Addition informations</h5>
                        <p>Join the thousands of other restaurants who benefit from having their menus on TakeOff</p>
                        <h5>Social Links</h5>
                        <div class="social-links">
                            <a href="#" class="fa fa-facebook"></a>
                            <a href="#" class="fa fa-twitter"></a>
                            <a href="#" class="fa fa-linkedin"></a>
                            <a href="#" class="fa fa-youtube"></a>
                            <a href="#" class="fa fa-instagram"></a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="end-footer">
                <p>&copy; Copyright 2023, All Rights Reserved | FoodBox.</p>
            </div>
            <!-- bottom footer ends -->
        </div>
    </footer>
    <!-- end:Footer -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
    <script src="https://kit.fontawesome.com/4964e7ccb3.js" crossorigin="anonymous"></script>
</body>

</html>