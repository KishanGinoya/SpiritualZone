<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Package Details</title>
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
		.h {
			margin: 30px;
			font-size: 28px;
			color: black;
		}

		.hh {
			margin-left: 30px;
			font-size: 15px;
			color: black;
		}

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
			margin-left: 500px;
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
				<h3 class="display-4 text-white text-uppercase">Package Details</h3>
				<div class="d-inline-flex text-white">
					<p class="m-0 text-uppercase"><a class="text-white" href="index.php">Home</a></p>
					<i class="fa fa-angle-double-right pt-1 px-3"></i>
					<p class="m-0 text-uppercase">Package Details</p>
				</div>
			</div>
		</div>
	</div>
	<!-- Header End -->

	<div class="rooms">
		<div class="container">

			<div class="room-bottom">
				<div class="rom-btm">
					<?php
					$id = $_GET['id'];

					$con = mysqli_connect("localhost", "root", "", "project");

					if (mysqli_connect_errno()) {
						echo "Failed to connection..." . mysqli_connect_errno();
					}
					$sql = "select * from package where id=$id";
					$res = mysqli_query($con, $sql);
					$row = mysqli_fetch_assoc($res);

					?>
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

						<p><b class="h">Package Details:</b></p>
						<p class="hh">
							<?php echo $row['detail']; ?>
						</p>
						<div class="clearfix"></div>
						<div class="col-md-2 room-right wow fadeInRight animated" data-wow-delay=".5s">
							<a href="booking.php" class="view" style="height:2.8rem; width:5.8rem">Book</a>
						</div>

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