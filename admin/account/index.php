<?php 
// Initialize the session
error_reporting(E_ALL ^ E_NOTICE);
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}

include('server.php');
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($conn, "SELECT * FROM tbuser WHERE uid=$id");


		if ($record != NULL ) {
			$n = mysqli_fetch_array($record);
			$username = $n['username'];
			$first_name = $n['first_name'];
			$last_name = $n['last_name'];
			$email = $n['email'];
			$password = $n['password'];
			$acc_type = $n['acc_type'];
			$acc_status = $n['acc_status'];
			$country = $n['country'];
			$location = $n['location'];
		}

	}
	$location = $_SESSION['location'];
	$country = $_SESSION['country'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title>TrackIt - Admin Panel | Dashboard</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
	<!-- Favicon -->
    <link rel="icon" href="../../img/core-img/favicon.ico">

	<script src="jquery.min2.js"></script>
	<script src="bootstrap3-typeahead.min.js"></script>  
  	<link rel="stylesheet" href="bootstrap.min2.css" />  

  	<style>
		.warning {
		  width: 50%;
		  padding: 10px;
		  border: 5px solid red;
		  margin: auto;
		  text-align: center;;
		}
	</style>

</head>
<body>
	<center><h2><?php echo $location." - ".$country; ?></h2></center>
	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>

<?php require_once 'menu.php'; ?>

<!-- General Warning -->
<div class ="warning"><b>ATTENTION!</b> <br/> This area is restricted for unauthorized personnel. Leave the site immediately if you're not an authorized user.</div>



</body>
</html>