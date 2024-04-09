<?php
ob_start();
session_start();

$con = mysqli_connect("localhost", "root", "", "project");

if (mysqli_connect_errno()) {
	echo "Failed to connect... " . mysqli_connect_errno();
}

$nameerr = $emailerr = $moberr = $passerr = $confirmpasserr = $captchaerr = "";
$name = $mob = $email = $pass = $confirm = $formcaptcha = 0;

if (isset($_POST['register'])) {
	$s = 0;

	if (empty($_POST['name'])) {
		$nameerr = "Please enter your name";
	} else {
		$name = $_POST['name'];
	}

	if (empty($_POST['mob'])) {
		$moberr = "Please enter your mobile no.";
	} else {
		$mob = $_POST['mob'];
		$checkmob="select * from register where mob='$mob';";
		$resmob=mysqli_query($con,$checkmob);
		if (mysqli_num_rows($resmob)>0) {
			$moberr="Your Mobile Number Already Registered..";
			$s=$s+1;
		}
		if (!preg_match('/^[6-9][0-9]{9}$/', $mob)) {
			$moberr = "Mobile Number is invalid...";
			$s = $s + 1;
		}
	}

	if (empty($_POST['email'])) {
		$emailerr = "Please enter your email";
	} else {
		$email = $_POST['email'];
		$checkemail="select * from register where email='$email';";
		$resemail=mysqli_query($con,$checkemail);
		if (mysqli_num_rows($resemail)>0) {
			$emailerr="Your E-mail Already Registered..";
			$s=$s+1;
		}
		if (!preg_match("/^[a-zA-Z0-9.-_]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $email)) {
			$emailerr = "Email is not valid...";
			$s = $s + 1;
		}
	}

	// $Uppercase = preg_match('@[A-Z]@', $_POST['pd']);
	$Lowercase = preg_match('@[a-z]@', $_POST['pd']);
	$Number = preg_match('@[0-9]@', $_POST['pd']);
	// $SpecialChars = preg_match('@[^\$?]@', $_POST['pd']);

	if (empty($_POST['pd'])) {
		$passerr = "Please enter your Password";
	} else {
		$pass = md5($_POST['pd']);
		// if (!$Uppercase || !$Lowercase || !$Number || !$SpecialChars || strlen($pass) < 8) {
		// 	$passerr = "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character...";
		// 	$s = $s + 1;
		// }
	}


	if (empty($_POST['confirm'])) {
		$confirmpasserr = "Please enter your confirm password";
	} else {
		$confirm = md5($_POST['confirm']);
		if ($pass != $confirm) {
			$confirmpasserr = "Confirm Password does not match";
			$s = $s + 1;
		}
	}

	if (empty($_POST['captcha'])) {
		$captchaerr = "Please enter the captcha";
	} else {
		$sessioncaptcha = $_SESSION['captcha'];
		$formcaptcha = $_POST['captcha'];
		if ($sessioncaptcha != $formcaptcha) {
			$captchaerr = "Invalid captcha...";
			$s = $s + 1;
		}
	}

	if ($s == 0) {
		$sql = "INSERT INTO Register(username,mob,email,password) VALUES('$name', '$mob', '$email', '$pass')";
		$res = mysqli_query($con, $sql);

		if ($res) {
			//echo "Record successfully inserted...";
			$_SESSION['usernm']=$name;
			header("location: index.php");
		} else {
			echo "Not inserted...";
		}
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
	<link href="img/bus.png" rel="icon">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<style type="text/css">
		body {
			color: #fff;
			background: #19aa8d;
			font-family: 'Roboto', sans-serif;
		}

		.form-control {
			font-size: 15px;
		}

		.form-control,
		.form-control:focus,
		.input-group-text {
			border-color: #e1e1e1;
		}

		.form-control,
		.btn {
			border-radius: 3px;
		}

		.signup-form {
			width: 400px;
			margin: 0 auto;
			padding: 30px 0;
		}

		.signup-form form {
			color: #999;
			border-radius: 3px;
			margin-bottom: 15px;
			margin-top: 15px;
			background: #fff;
			box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
			padding: 30px;
			border-radius: 20px;
		}

		.signup-form h2 {
			color: #333;
			font-weight: bold;
			margin-top: 0;
		}

		.signup-form hr {
			margin: 0 -30px 20px;
		}

		.signup-form .form-group {
			margin-bottom: 20px;
		}

		.signup-form label {
			font-weight: normal;
			font-size: 15px;
		}

		.signup-form .form-control {
			min-height: 38px;
			box-shadow: none !important;
		}

		.signup-form .input-group-addon {
			max-width: 42px;
			text-align: center;
		}

		.signup-form .btn,
		.signup-form .btn:active {
			font-size: 16px;
			font-weight: bold;
			background: #19aa8d !important;
			border: none;
			min-width: 140px;
		}

		.signup-form .btn:hover,
		.signup-form .btn:focus {
			background: #179b81 !important;
		}

		.signup-form a {
			color: #fff;
			text-decoration: underline;
		}

		.signup-form a:hover {
			text-decoration: none;
		}

		.signup-form form a {
			color: #19aa8d;
			text-decoration: none;
		}

		.signup-form form a:hover {
			text-decoration: underline;
		}

		.signup-form .fa {
			font-size: 21px;
		}

		.signup-form .fa-paper-plane {
			font-size: 15px;
		}

		.signup-form .fa-refresh {
			font-size: 18px;
		}

		.signup-form .fa-check {
			color: #fff;
			left: 17px;
			top: 18px;
			font-size: 7px;
			position: absolute;
		}

		.err {
			color: red;
		}
	</style>
</head>


<body>
	<div class="signup-form">
		<form action="" method="post">
			<h2 align="center">Sign Up</h2>
			<p>Please fill in this form to create an account!</p>
			<hr>
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">
							<span class="fa fa-user"></span>
						</span>
					</div>

					<input type="text" class="form-control" name="name" placeholder="Username" autocomplete="off" required>

				</div>
				<span class="err"><?php echo $nameerr; ?></span>
			</div>
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">
							<i class="fa fa-paper-plane"></i>
						</span>
					</div>
					<input type="email" class="form-control" name="email" placeholder="Email Address" autocomplete="off" required>

				</div>
				<span class="err"><?php echo $emailerr; ?></span>
			</div>
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">
							<i class="fa fa-phone"></i>
						</span>
					</div>
					<input type="text" class="form-control" name="mob" placeholder="Mobile No." autocomplete="off" maxlength="10" required>

				</div>
				<span class="err"><?php echo $moberr; ?></span>
			</div>
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">
							<i class="fa fa-lock"></i>
						</span>
					</div>
					<input type="password" class="form-control" name="pd" placeholder="Password" autocomplete="off" required>

				</div>
				<span class="err"><?php echo $passerr; ?></span>
			</div>
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">
							<i class="fa fa-lock"></i>
							<i class="fa fa-check"></i>
						</span>
					</div>
					<input type="password" class="form-control" name="confirm" placeholder="Confirm Password" autocomplete="off" required>

				</div>
				<span class="err"><?php echo $confirmpasserr; ?></span>
			</div>
			<div class="form-group mt-3">
				<img src="Captcha.php">
			</div>

			<div class="form-group">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">
							<i class="fa fa-refresh"></i>
						</span>
					</div>
					<input type="text" class="form-control" name="captcha" placeholder="Captcha" autocomplete="off" required>

				</div>
				<span class="err"><?php echo $captchaerr; ?></span>
			</div>



			<div class="form-group">
				<input type="submit" value="Sign Up" name="register" class="btn btn-primary btn-lg ms-1">
				<input type="reset" value="Reset" class="btn btn-primary btn-lg ms-5">
			</div>

		</form>
		<div class="text-center">Already have an account? <a href="login.php">Login here</a></div>
	</div>

</body>

</html>