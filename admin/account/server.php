<?php 
require_once "../../db/conn.php";

	session_start();
	//$db = mysqli_connect('localhost', 'root', '', 'courierdb');

	// initialize variables
	$username = "";
	$first_name = "";
	$last_name = "";
	$email = "";
	$password = "";
	$acc_type = "";
	$acc_status = "";
	$country = "";
	$location = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$username = $_POST['username'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$acc_type = $_POST['acc_type'];
		$acc_status = $_POST['acc_status'];
		$country = $_POST['country'];
		$location = $_POST['location'];

		mysqli_query($conn, "INSERT INTO tbuser (username, first_name, last_name, email, password, acc_type, acc_status, country, location) VALUES ('$username', '$first_name', '$last_name', '$email', '$password', '$acc_type', '$acc_status', '$country', '$location')"); 
		$_SESSION['message'] = "Record saved"; 
		header('location: user_accounts.php');
	}


	if (isset($_POST['update'])) {
		$uid = $_POST['id'];
		$username = $_POST['username'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$acc_type = $_POST['acc_type'];
		$acc_status = $_POST['acc_status'];
		$country = $_POST['country'];
		$location = $_POST['location'];

		mysqli_query($conn, "UPDATE tbuser SET username='$username', first_name='$first_name', last_name='$last_name', email='$email', password='$password', acc_type='$acc_type', acc_status='$acc_status', country='$country', location='$location' WHERE uid=$uid");
		$_SESSION['message'] = "Record updated!"; 
		header('location: user_accounts.php');
	}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($conn, "DELETE FROM tbuser WHERE uid=$id");
	$_SESSION['message'] = "Record deleted!"; 
	header('location: user_accounts.php');
}


	$results = mysqli_query($conn, "SELECT * FROM tbuser");


?>