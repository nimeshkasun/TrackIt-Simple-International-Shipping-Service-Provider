<?php 
require_once "../../db/conn.php";

	session_start();
	//$db = mysqli_connect('localhost', 'root', '', 'courierdb');

	// initialize variables
	$trackingnumber = "";
	$sname = "";
	$sadd = "";
	$id = 0;
	$update = false;


	if (isset($_POST['update'])) {
		$tracking_number = $_POST['tracking_number'];
		$tracking_status = $_POST['tracking_status'];

		mysqli_query($conn, "UPDATE tbtrackingstatus SET TrackingStatus='$tracking_status' WHERE TrackingNumber='$tracking_number'");
		$_SESSION['message'] = "Record updated!"; 
		header('location: shipments.php');
	}

?>