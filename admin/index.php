<?php
session_start();
	 // Initialize error variables
     //$error = ""; // Define the error variable here
	if(isset($_POST['login']))
	{
		$con=mysqli_connect("localhost","root","","project");
		if(mysqli_connect_errno())
		{
			echo "Failed to connection....".mysqli_connect_error();
		}
		

		if(!empty($_POST['remember']))
		{
			setcookie('nm',$_POST['nm'],time()+3600);
			setcookie('ps',$_POST['ps'],time()+3600);
			echo "Cookies Set Successfully....";
		}
		else
		{
			setcookie('nm',"");
			setcookie('ps',"");
			// echo "Cookies not set...";
		}

		$uname=$_POST['nm'];
		$pass=$_POST['ps'];
		

		$sql = "SELECT * FROM adminlogin WHERE Username='$uname' AND Password='$pass'";
		$result = mysqli_query($con, $sql);	
	
		$num_rows = mysqli_num_rows($result);

		if ($num_rows == 1) {
			// Redirect to the index page
			$row = mysqli_fetch_assoc($result);
			$_SESSION['nm'] = $uname;
			$_SESSION['ps'] = $pass;	
			//echo "valid name  and password...."."<br>";
			header('Location: dashboard.php');
		} 
		else {
			echo "<script>alert('Invalid details');</script>";
		}

	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Login</title>
	<link href="images/bus.png" rel="icon">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
	<link rel="stylesheet"href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<style>
		body {
			color: #fff;
			background: #8e75e4;
			font-family: 'Roboto', sans-serif;
			margin:5.3vw 36vw;
		}
		.form-control {
			font-size: 15px;
		}
		.form-control, .form-control:focus, .input-group-text {
			border-color: #e1e1e1;
		}
		.form-control, .btn {        
			border-radius: 3px;
		}
		.signin-form {
			width: 400px;
			margin: 0 auto;
			padding: 30px 0;	
				
		}
		.signin-form form {
			color: #999;
			border-radius: 3px;
			margin-bottom: 15px;
			margin-top: 15px;
			background: #fff;
			box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
			padding: 30px;
			border-radius: 20px;
		}
		.signin-form h2 {
			color: #8e75e4;
			font-weight: bold;
			margin-top: 0;
		}
		.signin-form hr {
			margin: 0 -30px 20px;
		}
		.signin-form .form-group {
			margin-bottom: 20px;
		}
		.signin-form label {
			font-weight: normal;
			font-size: 15px;
		}
		.signin-form .form-control {
			min-height: 38px;
			box-shadow: none !important;
		}	
		.signin-form .input-group-addon {
			max-width: 42px;
			text-align: center;
		}	
		.signin-form .btn, .sigin-form .btn:active {        
			font-size: 16px;
			font-weight: bold;
			background:  !important;
			border: none;
			min-width: 140px;
		}
		.signin-form .btn:hover, .signin-form .btn:focus {
			background: #179b81 !important;
		}
		.signin-form a {
			color: #fff;	
			text-decoration: underline;
		}
		.signin-form a:hover {
			text-decoration: none;
		}
		.signin-form form a {
			color: #19aa8d;
			text-decoration: none;
		}	
		.signin-form form a:hover {
			text-decoration: underline;
		}
		.signin-form .fa {
			font-size: 21px;
		}
		.signin-form .fa-paper-plane {
			font-size: 15px;
		}
		.signin-form .fa-refresh {
			font-size: 18px;
		}
		.signin-form .fa-check {
			color: #fff;
			left: 17px;
			top: 18px;
			font-size: 7px;
			position: absolute;
		}
		.err{
			color: red;
		}

		.h{
			margin-bottom: 20px;
		}
		.a{
			font-weight:bold;
		}

		
	</style>
</head>

<body>
<div class="signin-form">


    <form action="" method="post">
		<h2 align="center" class="h">Admin Login</h2>
		
        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<span class="fa fa-user"></span>
					</span>                    
				</div>

				<input type="text" class="form-control" name="nm" placeholder="Username" autocomplete="off" required>
				
			</div>
			
        </div>


		<div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-lock"></i>
					</span>                    
				</div>
				<input type="password" class="form-control" name="ps" placeholder="Password" autocomplete="off" required>
				
			</div>
			
        </div>

		<div class="form-check" >
				&nbsp;&nbsp;&nbsp;<input class="form-check-input" type="checkbox" name="remember" style="width: 25px; height: 25px;">				
				&nbsp;<label class="form-check-label col-form-label" style="font-size: 20px ; margin-top: -5px"><b>Remember me</b></label>
			
        </div>

		<div class="form-group" style="margin-top: 30px; ">
            <input type="submit" value="Sign In" name="login" class="btn btn-primary btn-lg ms-3">
            <input type="reset" value="Reset" class="btn btn-danger btn-lg ms-3">
        </div>

	</form>
	
	
	<!-- <div class="text-center" style="margin-top: 10px; "><a href="change-password.php">Forgot Password</a></div> -->
	<div class="text-center" style="margin-top: 10px; "><a href="../index.php">Back to home</a></div>
	
</div>


</body>
</html>
