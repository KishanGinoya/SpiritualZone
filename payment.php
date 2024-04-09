<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Payment</title>
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
        .hh {
            font-weight: bold;
            color: black;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .h {
            margin-top: 20px;
            font-size: 1.8em;
            font-weight: 700;
            color: #34ad00;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 2px solid black;
        }

        td {
            color: black;
            font-weight: bold;
            align: center;
        }

        th {
            color: red;
        }

        .room-right {
            text-align: right;
            padding: 3em 2em;
        }

        .view {

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
            margin-top: -100px;
            margin-left: 650px;
            display: inline-block;
        }
    </style>
</head>

<body>
    <?php include('includes/header.php'); ?>

    <!-- Topbar Start -->

    <?php include('includes/top-bar.php'); ?>

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
                        <a href="index.php" class="nav-item nav-link">Home</a>
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


    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 700px">
                <h3 class="display-4 text-white text-uppercase">Payment</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="index.php">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Payment</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <center>
        <h3 class="h">Payment Details</h3>
    </center>
    <h5 align="center" class="hh"> Continue With Your Payment </h5>
    <table align="center" Cellpadding="17" Cellspacing="17" bgcolor="white">
        <?php
        $con = mysqli_connect("localhost", "root", "", "project");

        if (mysqli_connect_errno()) {
            echo "Failed to connection...." . mysqli_connect_error();
        }

        $place = $_GET['place'];
        $id = $_GET['id'];

        $select = "select * from package where name='$place';";

        $res = mysqli_query($con, $select);
        $result = mysqli_fetch_assoc($res);

        $select2 = "select * from book where id=$id;";
        $res2 = mysqli_query($con, $select2);
        $result2 = mysqli_fetch_assoc($res2);
        ?>
        <thead>
            <tr>
                <th>Package Name</th>
                <th>Package Price</th>
                <th>Total person</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $result['name']; ?></td>
                <td><?php echo $result['price']; ?></td>
                <td><?php echo $result2['person']; ?></td>
            </tr>

        </tbody>
        <tfoot>
            <tr>
                <th>Total :-</th>
                <th colspan="2"><?php echo $result['price'] * $result2['person']; ?></th>
            </tr>
        </tfoot>
    </table>
    <div class="col-md-2 room-right wow fadeInRight animated" data-wow-delay=".5s">
        <a href="Billing.php?id=<?php echo $id ?>& place=<?php echo $place; ?>" class="view">Checkout</a>
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