<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "project");

if (mysqli_connect_errno()) {
    echo "Failed to connection..." . mysqli_connect_errno();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Spiritual Zone</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/bus.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        .rooms-top {
            background: url(../images/7.jpg)no-repeat;
            background-size: cover;
            -webkit-background-size: cover;
            -o-background-size: cover;
            -ms-background-size: cover;
            -moz-background-size: cover;
            min-height: 390px;
            padding: 18em 0 0;
        }

        .rom-info {
            background: rgba(63, 132, 177, 0.79);
            padding: 1em 2em;
        }

        .rom-info h3 {
            font-size: 1.8em;
            color: #fff;
            font-weight: 700;
        }

        .rom-info p {
            font-size: 15px;
            margin-top: 0.5em;
            color: #fff;
            line-height: 1.7em;
        }

        .rt-left {
            float: left;
        }

        .rt-right {
            float: right;
        }

        .rom-info h5 {
            font-size: 1.2em;
            font-weight: 700;
            color: #fff;
        }

        .rom-btm {
            margin-top: 2em;
            box-shadow: 0px 0px 5px -1px rgba(0, 0, 0, 0.37);
        }

        .room-bottom h3 {
            font-size: 1.8em;
            font-weight: 700;
            color: #34ad00;
        }

        .room-bottom {
            padding: 2em 0;
        }

        .rom-btm h4 {
            font-size: 1.8em;
            font-weight: 700;
            color: #34ad00;
        }

        .rom-btm p {
            font-size: 18px;
            color: black;
        }

        .rom-btm h6 {
            font-size: 1em;
            font-weight: 700;
            margin: 0.5em 0;
        }

        .room-right {
            text-align: right;
            padding: 3em 2em;
        }

        .room-midle {
            padding: 1em;
        }

        .rom-btm h5 {
            font-size: 1.2em;
            font-weight: 700;
            color: #999;
        }

        a.view {
            padding: 6px 20px;
            font-weight: 700;
            color: #fff;
            background-color: #34ad00;
            border: 0;
            font-size: 20px;
            border-radius: 2px;
            -webkit-transition: all .2s;
            -moz-transition: all .2s;
            transition: all .2s;
            margin-top: 70px;
            display: inline-block;
        }

        .destination-item {
            width: 100%;
            /* Set a fixed width for the container */
            height: 200px;
            /* Set a fixed height for the container */
            overflow: hidden;
            /* Hide any overflowing content */
            border: 1px solid #ccc;
            /* Optional: Add a border for better visibility */
        }

        .destination-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* This property will resize the image to cover the entire container */
        }

        .i {
            width: 100%;
            height: 100%;
        }

        .a {
            margin-left: 250px;
        }

        .b1 {
            margin-left: 500px;
        }

        .c1 {
            margin-left: 100px;
            margin-bottom: -100px;
        }

        .dropdown-menu {
            border: 2px solid wheat;
            /* Border color and width */
            border-radius: 8px;
            /* Border radius */
            padding: 10px;
            /* Padding inside the dropdown menu */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            /* Optional: Box shadow */



        }

        .dropdown-menu a.dropdown-item:hover {
            background-color: #f1f1f1;
            color: black;

        }

        .dropdown {
            width: 200px;
        }
    </style>
</head>

<body>

    <?php include('includes/header.php'); ?>

    <!-- Topbar Start -->

    <div class="container-fluid bg-light pt-3 d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 text-center text-lg-left mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <a href="" class="navbar-brand">
                            <img src="img/logo2.png" alt="Spiritual Zone Logo" height="50" width="280">
                        </a>
                    </div>
                </div>
                <div class="col-lg-5 pt-3  ">
                    <!-- Social media links... -->
                    <a class="text-primary px-3" href="https://www.facebook.com/login">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-primary px-3" href="https://www.twitter.com/login">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-primary px-3" href="https://www.linkedin.com/login">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-primary px-3" href="https://www.instagram.com/accounts/login">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-primary pl-3" href="https://www.youtube.com/account">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
                <div class="col-lg-3 text-center text-lg-right">
                    <?php
                    if (isset($_SESSION['usernm'])) {
                        // Display dropdown menu for authenticated users
                    ?>
                        <div class="dropdown">
                            <button style="background-color: white;  border: 1px solid black;  border-radius: 28px; width: 150px;" class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- <img src="admin/images/user.png" width="50px" height="50px" alt=""> -->
                                <i class='far fa-user-circle' style='margin-top: 5px; font-size:24px; color: black;'></i>
                                <span style="display: inline-block; margin-left: 10px; margin-bottom: 5px; color: #012558; font-weight: bold;"><?php echo $_SESSION['usernm']; ?></span>
                            </button>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton" style="background-color: white; color: cornsilk;">
                                <a class="dropdown-item" href="change-password.php"><b>Setting</b></a>
                                <a class="dropdown-item" href="logout.php"><b>Logout</b></a>
                            </div>
                        </div>

                </div>
            <?php
                    } else {
                        // Display sign up and sign in buttons for non-authenticated users
            ?>
                <div class="d-flex pt-2">
                    <a class="pl-5" href="register.php">
                        <button class="btn btn-primary" type="submit" style="width: 100px;">Sign Up</button>
                    </a>
                    <a class="pl-2" href="login.php">
                        <button class="btn btn-primary" type="submit" style="width: 100px;">Sign In</button>
                    </a>
                </div>

            <?php
                    }
            ?>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- Topbar End -->

    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">

                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-5" id="navbarCollapse">
                    <div class="navbar-nav">

                        <a href="index.php" class="nav-item nav-link active">Home</a>
                        <a href="about.php" class="nav-item nav-link">About</a>
                        <a href="service.php" class="nav-item nav-link">Services</a>
                        <a href="package.php" class="nav-item nav-link">Tour Packages</a>

                        <a href="contact.php" class="nav-item nav-link">Contact</a>

                        <a href="feedback.php" class="nav-item nav-link">Feedback</a>
                    </div>

                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/c3.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Tours & Travel</h4>
                            <h1 class="display-3 text-white mb-md-4">Let's Discover The World Together</h1>
                            <a href="booking.php" class="btn btn-primary py-md-3 px-md-5 mt-2">Book Now</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100 " src="img/img2.jpg" alt="Image" style="max-height: 850px;">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Tours & Travel</h4>
                            <h1 class="display-3 text-white mb-md-4">Discover Amazing Places With Us</h1>
                            <a href="booking.php" class="btn btn-primary py-md-3 px-md-5 mt-2">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- About Start -->
    <div class="container-fluid c1">
        <div class="container  ">
            <div class="row">

                <div class="col-lg-12 pt-5 ">
                    <div class="about-text bg-white p-4 p-lg-5 my-lg-5">
                        <h6 class="text-primary text-uppercase text-center" style="letter-spacing: 5px;">About Us</h6>
                        <h1 class="mb-3">We Provide Best Temple Tour Packages In Your Budget</h1>
                        <p>Discover divine journeys within your budget with our best-in-class temple tour packages."Experience divine journeys within your budget with our best temple tour packages.</p>
                        <div class="row mb-4">
                            <div class="col-6">
                                <img class="img-fluid i" src="img/img1.jpg" alt="">
                            </div>
                            <div class="col-6">
                                <img class="img-fluid i" src="img/img3.jpeg" alt="">
                            </div>
                        </div>
                        <a href="booking.php" class="btn btn-primary mt-1 b1">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Destination Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Destination</h6>
                <h1 style="letter-spacing: 2px;">Explore Top Destination</h1>
            </div>
            <div class="row">
            <?php
            $sql = "SELECT * FROM package";
            $res = mysqli_query($con, $sql);

            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['id'];
                $name = $row['name'];
                $location = $row['location'];
                $image = $row['image'];
            ?>
                <!-- <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="admin/packageimages/Somnath.jpeg" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="package.php">
                            <h5 class="text-white">Shri Somnath Jyotirlinga Temple</h5>
                            <span>Gir Somnath, Gujarat</span>
                        </a>
                    </div>
                </div> -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="admin/packageimages/<?php echo $image; ?>" alt="<?php echo $name; ?>">
                        <a class="destination-overlay text-white text-decoration-none" href="package-details.php?id=<?php echo $id; ?>">
                            <h5 class="text-white"><?php echo $name; ?></h5>
                            <span><?php echo $location; ?></span>
                        </a>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- Destination Start -->

    <!-- Feature Start -->
    <div class="container-fluid pb-3">
        <div class="container pb-3">
            <h6 class="text-primary text-uppercase" align="center" style="letter-spacing: 5px;">Features</h6>
            <div class="row mb-5">


                <div class="col-2"></div>
                <div class="col-8">
                    <h1 style="letter-spacing: 3px; " align="center">Top Features</h1>
                </div>
                <div class="col-2"></div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-money-check-alt text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Competitive Pricing</h5>
                            <p class="m-0">Offering cost-effective travel packages without compromising on the quality of experiences.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-award text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Best Services</h5>
                            <p class="m-0">Providing top-notch services and personalized attention to ensure a seamless and fulfilling pilgrimage journey.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-globe text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Worldwide Coverage</h5>
                            <p class="m-0">Encompassing a wide range of sacred destinations globally, allowing travelers to explore diverse spiritual heritage.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->

    <!-- Service Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Services</h6>
                <h1>Tours & Travel Services</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-route mx-auto mb-4"></i>
                        <h5 class="mb-2">Travel Guide</h5>
                        <p class="m-0">Explore the mystical history and spiritual significance of the temple, discovering the hidden gems and local customs.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-ticket-alt mx-auto mb-4"></i>
                        <h5 class="mb-2">Ticket Booking</h5>
                        <p class="m-0">Easily book your temple visit tickets online, ensuring a seamless and hassle-free entry, Secure your temple visit with convenient.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-hotel mx-auto mb-4"></i>
                        <h5 class="mb-2">Tour Packages</h5>
                        <p class="m-0">Immerse yourself in divine experiences with our thoughtfully curated temple tour packages, tailored to suit every traveler.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 a">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-umbrella-beach mx-auto mb-4"></i>
                        <h5 class="mb-2">Activities and Excursion</h5>
                        <p class="m-0">: Enhance your temple journey with a variety of activities and excursions, including meditation retreats and cultural immersions.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-life-ring mx-auto mb-4"></i>
                        <h5 class="mb-2">Support</h5>
                        <p class="m-0">Our dedicated support team is available 24/7 to assist you with any queries or concerns during your temple visit.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Service End -->

    <div class="rooms">
        <div class="container">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Packages</h6>
                <h1>Pefect Tour Packages</h1>
            </div>
            <div class="room-bottom">
                <h3>Package List</h3>
                <?php
               
                $sql = "select * from package";
                $res = mysqli_query($con, $sql);
                $cnt = 0;
                while ($row = mysqli_fetch_assoc($res)) {
                    $cnt++;
                    if ($cnt <= 3) {
                ?>
                        <div class="rom-btm">
                            <div class="row">
                                <div class="col-md-3 room-left wow fadeInLeft animated" data-wow-delay=".5s">
                                    <img src="admin/packageimages/<?php echo $row['image']; ?>" class="img-responsive" height="280px" width="270px">
                                </div>
                                <div class="col-md-7 room-midle wow fadeInUp animated" data-wow-delay=".5s">
                                    <h4>Package Name : <?php echo $row['name']; ?></h4>
                                    <p><b>Package Type : <?php echo $row['type']; ?></b></p>
                                    <p><b>Package Location : <?php echo $row['location']; ?></b></p>
                                    <p><b>Package Price : ₹<?php echo $row['price']; ?></b></p>
                                    <p><b>Features : <?php echo $row['feature']; ?></b></p>
                                </div>

                                <div class="col-md-2 room-right wow fadeInRight animated" data-wow-delay=".5s">
                                    <?php $id = $row['id']; ?>
                                    <a href="package-details.php?id=<?php echo $id; ?>" class="view">Details</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
                <div>
                    <center><a href="package.php" class="view">View More Packages</a></center>
                    <div class="clearfix"></div>
                </div>

            </div>

        </div>
    </div>
    </div>

    <!-- Footer Start -->
    <?php include('includes/footer.php'); ?>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>