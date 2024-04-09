<?php
session_start();

if(!isset($_SESSION['usernm'])){
	header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Booking</title>
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
		.center-label {
			display: block;
			text-align: center;
			padding-top: 12px;
			font-weight: bold;
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
			margin-left: 500px;
			display: inline-block;
		}

		.custom-select {
			width: 100%;
			padding: 0.75rem 1.25rem;
			font-size: 1rem;
			line-height: 1.5;
			color: #495057;
			background-color: #fff;
			border: 1px solid #ced4da;
			border-radius: 0.25rem;
		}

		.err {
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
				<h3 class="display-4 text-white text-uppercase">Booking</h3>
				<div class="d-inline-flex text-white">
					<p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
					<i class="fa fa-angle-double-right pt-1 px-3"></i>
					<p class="m-0 text-uppercase">Booking</p>
				</div>
			</div>
		</div>
	</div>
	<!-- Header End -->
	<?php
	$con = mysqli_connect("localhost", "root", "", "project");

	if (mysqli_connect_errno()) {
		echo "Failed to connection...." . mysqli_connect_error();
	}

	if (isset($_POST['register'])) {

		$name = @$_POST['name'];
		$email = @$_POST['email'];
		$mob = @$_POST['mob'];
		$city = @$_POST['city'];
		$place = @$_POST['place'];
		$from = @$_POST['from'];
		$to = @$_POST['to'];
		$person = @$_POST['person'];

		$s = 0;

		if ($name == '' || $email == '' || $mob == '' || $city == '' || $place == '' || $from == '' || $to == '' || $person == '') {
			$s = $s + 1;
			echo "please fill the empty field.";
		}

		if (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $email)) {
			echo " email is not a valid email address";
			$s = $s + 1;
		}
		if (!preg_match('/^[6-9][0-9]{9}$/', $mob)) {
			echo " number is invalid....";
			$s = $s + 1;
		}

		if ($s == 0) {
			$sql = "insert into book(name,email,mobile,city,place,fromdate,todate,person) values('$name','$email','$mob','$city','$place','$from','$to',$person)";
			if($res = mysqli_query($con, $sql)){
				echo $last_id=mysqli_insert_id($con);
			}
			if ($res) {
				$select = "select * from book";
				$fetch = mysqli_query($con, $select);
					
				

				$selectplace = "select * from book where id='$last_id';";
				$res2 = mysqli_query($con, $selectplace);
				$place = mysqli_fetch_assoc($res2);
				
				echo "Record successfully inserted";
				$token=1;
				$_SESSION['token']=$token;

				?>
				<script>
					window.location ="Billing.php?place=<?php echo $place['place']; ?> & id=<?php echo $last_id; ?>";
				</script>
				<?php
				}
				else {
						echo "please enter valid record...";
				}
		}
	}
		?>

	<div class="container">
		<div class="row">
			&nbsp;
		</div>
		<div class="row">
			<div class="col">
				<div class="card">
					<div class="card-header bg-primary text-center p-4">
						<h1 class="text-white">
							Book Now
						</h1>

					</div>
					<div class="card-body bg-white rounded-bottom">
						<form method="post">
							<div class="row">
								<div class="col-md-2">
									<div class="form-group">
										<label class="center-label">UserName :</label>
									</div>
								</div>
								<div class="col-md-10">
									<div class="form-group">
										<input type="text" name="name" class="form-control p-4" placeholder="Enter Your Name" autocomplete="off" required>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-2">
									<div class="form-group">
										<label class="center-label">Email :</label>
									</div>
								</div>
								<div class="col-md-10">
									<div class="form-group">
										<input type="email" class="form-control p-4" name="email" placeholder="Enter Your Email" autocomplete="off" required>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-2">
									<div class="form-group">
										<label class="center-label">Mobile No :</label>
									</div>
								</div>
								<div class="col-md-10">
									<div class="form-group">
										<input type="text" class="form-control p-4" name="mob" placeholder="Enter Your Mobile No" maxlength="10" autocomplete="off" required>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-2">
									<div class="form-group">
										<label class="center-label">City :</label>
									</div>
								</div>
								<div class="col-md-10">
									<div class="form-group">
										<input type="text" name="city" class="form-control p-4" placeholder="Enter Your City" autocomplete="off" required>
									</div>
								</div>
							</div>
							<?php
							$con = mysqli_connect("localhost", "root", "", "project");

							$select = "select * from package;";

							$res = mysqli_query($con, $select);
							?>
							<div class="row">
								<div class="col-md-2">
									<div class="form-group">
										<label class="center-label">Visit Place :</label>
									</div>
								</div>
								<div class="col-md-10">
									<div class="form-group">
										<select name="place" class="form-control p-10" autocomplete="off" required>
											<option value="" disabled selected>Select a Visit Place</option>
											<?php
											while ($pname = mysqli_fetch_assoc($res)) { ?>
												<option><?php echo $pname['name'] ?></option>
											<?php } ?>
											<!-- Add more options as needed -->
										</select>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-2">
									<div class="form-group">
										<label class="center-label">From Date :</label>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<input type="date" name="from" id="dateInput" class="form-control p-4" autocomplete="off" required>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label class="center-label">To Date :</label>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<input type="date" name="to" id="dateInput2" class="form-control p-4" autocomplete="off" required>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-2">
									<div class="form-group">
										<label class="center-label">Total Persons :</label>
									</div>
								</div>
								<div class="col-md-10">
									<div class="form-group">
										<input type="number" name="person" class="form-control p-4" placeholder="Enter Total Persons" autocomplete="off" required>
									</div>
								</div>
							</div>

							<div class="col-md-2 room-right wow fadeInRight animated" data-wow-delay=".5s">
								<input type="submit" class="view" name="register" value="book">
							</div>

						</form>
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
	<script>
        var today = new Date();
        var year = today.getFullYear();
        var month = (today.getMonth() + 1).toString().padStart(2, '0');
        var day = today.getDate().toString().padStart(2, '0');
        var date = year + '-' + month + '-' + day;
        var dateInput = document.getElementById('dateInput');
		var dateInput2 = document.getElementById('dateInput2');
        dateInput.setAttribute('min', date);
		dateInput2.setAttribute('min', date);
</script>
</body>

</html>