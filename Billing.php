<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<script>

	</script>
	<meta charset="utf-8">
	<title>Ticket</title>
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
		.he {
			margin-top: 20px;
			font-size: 1.8em;
			font-weight: 700;
			color: #34ad00;
			margin-bottom: 20px;
		}

		.hee {
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

		.th {
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
				<h3 class="display-4 text-white text-uppercase">Ticket</h3>
				<div class="d-inline-flex text-white">
					<p class="m-0 text-uppercase"><a class="text-white" href="index.php">Home</a></p>
					<i class="fa fa-angle-double-right pt-1 px-3"></i>
					<p class="m-0 text-uppercase">Ticket</p>
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
	$id = $_GET['id'];
	$place = $_GET['place'];
	$query1 = "select * from book where id=$id;";

	$result1 = mysqli_query($con, $query1);
	$fetch1 = mysqli_fetch_assoc($result1);

	$query2 = "select * from package where name='$place';";

	$result2 = mysqli_query($con, $query2);
	$fetch2 = mysqli_fetch_assoc($result2);






	?>
	<center>
		<h3 class="he">Ticket Details</h3>
	</center>

	<table align="center" Cellpadding="17" Cellspacing="17" bgcolor="white">
		<thead>
			<tr>
				<td>Name:</th>
				<td><?php echo $name = $fetch1['name']; ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th>Email:</th>
				<th><?php echo $email = $fetch1['email']; ?></th>
			</tr>
		</tbody>
		<tbody>
			<tr>
				<th>Mobile No:</th>
				<th><?php echo $mob = $fetch1['mobile']; ?></th>
			</tr>
		</tbody>
		<tbody>
			<tr>
				<th>City:</th>
				<th><?php echo $city = $fetch1['city']; ?></th>
			</tr>
		</tbody>
		<tbody>
			<tr>
				<td>Visit Place:</th>
				<td><?php echo $place = $fetch1['place']; ?></th>
			</tr>
		</tbody>
		<tbody>
			<tr>
				<td>Package price</td>
				<td><?php echo $price = $fetch2['price']; ?></td>
			</tr>
		</tbody>
		<tbody>
			<tr>
				<th>From Date</th>
				<th><?php echo $from = $fetch1['fromdate']; ?></th>
			</tr>
		</tbody>
		<tbody>
			<tr>
				<th>To Date</td>
				<th><?php echo $to = $fetch1['todate']; ?></td>
			</tr>
		</tbody>
		<tbody>
			<tr>
				<td>Total person</td>
				<td><?php echo $person = $fetch1['person']; ?></td>
			</tr>
		</tbody>

		<tfoot>
			<tr class="th">
				<th>Grand Total :-</th>
				<th><?php echo $total = $fetch2['price'] * $fetch1['person']; ?></th>
			</tr>
		</tfoot>
	</table>
	<?php
	if ($_SESSION['token'] != 0) {
		$insert = "insert into ticket(name,email,mob,city,place,price,fromdate,todate,person,total) values
			('$name','$email','$mob','$city','$place','$price','$from','$to','$person','$total')";
		$res = mysqli_query($con, $insert);

		if ($res) {
			echo  "<script>alert('You Got Ticket')</script>";
			$_SESSION['token']=0;
		} else {
			echo  "<script>alert('You not got ticket')</script>";
		}
	}
	?>
	<h4 align="center" class="hee"> Thank You for Booking </h4>

	<!-- <button id="downloadButton">Download Ticket PDF</button> -->
	<!-- Add this link next to your "Download Ticket PDF" button -->
	<!-- <a href="pdf.php"  class="btn btn-lg btn-primary ">Download Ticket PDF</a> -->
	<div class="d-flex justify-content-center">
		<a href="pdf.php?id=<?php echo $id; ?>&place=<?php echo $place; ?>" class="btn btn-lg btn-primary">Download Ticket</a>
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