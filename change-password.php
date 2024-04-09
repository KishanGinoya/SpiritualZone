<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Change Password</title>
	<link href="img/bus.png" rel="icon">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<style type="text/css">
		body {
			color: #fff;
			background: #0ABAB5;
			font-family: 'Roboto', sans-serif;
			margin: 8.3vw 36vw;
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
			background: !important;
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

<?php
	$con = mysqli_connect("localhost", "root", "", "project");

	if (mysqli_connect_errno()) {
		echo "Failed to Connection..." . mysqli_connect_errno();
	}

	// $current = @$_POST['current'];
	// $new = @$_POST['new'];
	// $confirm = @$_POST['confirm'];
	
?>
</script>

<body>
	<div class="signup-form">
		<form action="" method="post">
			<h2 align="Center">Change Password</h2>
			<p>Please fill in this form to change your password! </p>
			<hr>
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">
							<i class="fa fa-lock"></i>
						</span>
					</div>
					<input type="password" class="form-control" name="current" placeholder="Enter Current Password" required>

				</div>

			</div>
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">
							<i class="fa fa-lock"></i>
						</span>
					</div>
					<input type="password" class="form-control" name="new" placeholder="Enter New Password" required>

				</div>

			</div>
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">
							<i class="fa fa-lock"></i>
							<i class="fa fa-check"></i>
						</span>
					</div>
					<input type="password" class="form-control" name="confirm" placeholder="Enter Confirm Password" required>

				</div>

			</div>
			<div class="form-group">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				
				<button type="submit" name="submit" class="btn btn-info btn-lg ms-5"><b>Change</b></button>
                                    
				
			</div>

		</form>

		<?php

        $con=mysqli_connect("localhost","root","","project");
        if (mysqli_connect_errno()) {
            echo "Failed to connection...." . mysqli_connect_error();
        }

        if (isset($_POST['submit'])) {

            $current = md5($_POST['current']);
            $new = md5($_POST['new']);
            $confirm = md5($_POST['confirm']);
            
            if(isset($_SESSION['usernm'])){
                $nm=$_SESSION['usernm'];
            }
            $s=0;
            
            $select="select Password from register where username='$nm';";
            $res=mysqli_query($con,$select);
            $row=mysqli_fetch_assoc($res);
            if($current != $row['Password']){
                echo "current password doesn't match";
                $s=$s+1;
            }
            if($new != $confirm){
                echo "confirm password doesn't match with new password";
                $s=$s+1;
            }
            if($s==0){
                $update="update register set password='$new' where username='$nm';";
                $result=mysqli_query($con,$update);
                if($result){
                    echo "<script>alert('password changed successfully...')</script>";
                    echo "<script>window.location='index.php'</script>";
                }
                else{
                    echo "<script>alert('password not changed successfully...')</script>";
                }
            }
        }

        ?>

	</div>




</body>

</html>