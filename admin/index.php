<!DOCTYPE html>

<?php
	session_start();
	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: account/");
    exit;
	}
	$error1="";
	$error2="";
	if(isset($_SESSION['inactive'])){
		$error1 = $_SESSION['inactive'];
		unset($_SESSION['inactive']);
	}
	if(isset($_SESSION['UPincorrect'])){
		$error2 = $_SESSION['UPincorrect'];
		unset($_SESSION['UPincorrect']);
	}
	
	
?>
<html lang="en">

<head>
	<title>TrackIt - International Shipping Service Provider</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

  	<link rel='stylesheet' href='../alert/sweetalert.min.css'>

</head>
<body>
	<?php
		if($error1=="inactive"){
			echo "<script type='text/javascript' src='../js/jquery.min.js'></script>";
			echo "<script type='text/javascript' src='../alert/sweetalert.min.js'></script>";
			echo "<script type='text/javascript' src='accountinactive.js'></script>";
		}
		if ($error2=="UPincorrect") {
			echo "<script type='text/javascript' src='../js/jquery.min.js'></script>";
			echo "<script type='text/javascript' src='../alert/sweetalert.min.js'></script>";
			echo "<script type='text/javascript' src='upincorrect.js'></script>";
		}
		
	?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="validate.php" method="post">
					<span class="login100-form-title">
						Member Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="forgotpassword.php">
							Username / Password?
						</a>
					</div>

					<div class="text-right p-t-136">
						<a class="txt2" href="../index.php">
							Back to Home
							<i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
						</a>
						<br/>
					</div>
					
				</form>
			</div>
		</div>
	</div>
	
	
	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="js/main.js"></script>

</body>
</html>