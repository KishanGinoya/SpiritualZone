<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <script>

        if(window.history.replaceState){
            window.history.replaceState(null,null,window.location.href);
        }
    </script>
    <meta charset="utf-8">
    <title>Feedback</title>
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
    <style type="text/css">
        .color {

            color: red;
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

                        <a href="feedback.php" class="nav-item nav-link active">Feedback</a>

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
                <h3 class="display-4 text-white text-uppercase">feedback</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="index.php">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">feedback</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <div class="container pt-5">
        <div class="row">
            <div class="col-lg-5 text-center" style="margin:3vw 23vw">
                <div class="card">
                    <div class="card-header bg-primary text-center p-4">
                        <h2 class="text-white">
                            Feedback
                        </h2>

                    </div>
                    <div class="card-body bg-white rounded-bottom">
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control p-4" placeholder="Your Name :" autocomplete="off" required>
                            </div>

                            <div class="form-group">
                                <input type="text" name="mob" class="form-control p-4" placeholder="Your MobileNo. :" maxlength="10" autocomplete="off" required>
                            </div>

                            <div class="form-group">
                                <input type="email" name="email" class="form-control p-4" placeholder="Your Email :" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <input type="text-area" name="fd" class="form-control p-4" placeholder="Your Feedback / Response :" autocomplete="off" required>
                            </div>

                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">

        <?php




        $con = mysqli_connect("localhost", "root", "", "project");
        if (mysqli_connect_error()) {
            echo "Failed to connection" . mysqli_connect_errno();
        }
        if (isset($_POST['submit'])) {
            $s = 0;
            $name = @$_POST['name'];
            $mobile = @$_POST['mob'];
            if (!preg_match('/^[6-9][0-9]{9}$/', $mobile)) {
        ?><center>
                    <p class="color">number is not valid...</p>
                </center>
            <?php
                $s = $s + 1;
            }

            $email = @$_POST['email'];
            if (!preg_match('/^[a-zA-Z0-9.-_]+@[a-zA-Z-0-9-]+\.[a-zA-Z.]{2,5}$/', $email)) {
            ?>
                <center>
                    <p class="color">email is not valid...</p>
                </center>
                <?php
                            $s = $s + 1;
             }

                        $feed = @$_POST['fd'];
                        if ($name == '' || $mobile == '' || $email == '' || $feed == '') {
                            ?>
                            <center>
                                <p class="color">please fill the empty field.</p>
                            </center>
                <?php
                            
                        $s = $s + 1;
                        }

                        if ($s == 0) {
                            $sql = "insert into feedback(name,mob,email,feed) values('$name','$mobile','$email','$feed')";

                            $res = mysqli_query($con, $sql);

                            if ($res) {
                            ?>

                    <script>
                        alert('Feedback saved successfully...')
                    </script>

                    <script>
                        windows.location = "feedback.php";
                    </script>
                    <?php
                            } else {
                                ?>
                    <script>
                        alert('Feedback not saved')
                    </script>
                    <script>
                        windows.location = "feedback.php";
                    </script><?php
                            }
                        }
            else {
                    ?>
            <script>
                alert('Feedback not saved')
            </script>
            <script>
                 windows.location = "feedback.php";
            </script>
            <?php
                        }
                    }
                            ?>
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