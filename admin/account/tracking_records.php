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

	if (isset($_POST['save'])) {

		$now = new DateTime();
		$date = $now->format('Y-m-d H:i:s');    // MySQL datetime format
		$time = $now->getTimestamp();  

		$location = $_SESSION['location'];
		$country = $_SESSION['country'];
		$trackingnumber = $_POST['trackingnumber'];
		$tracking_record = $_POST['status_message'];
		$tracking_comment = $_POST['status_comment'];
		$datentime = $date." ".$time;
		
		mysqli_query($conn, "INSERT INTO tbtrackingrecords (trackingnumber, tracking_record, tracking_comment, datentime) VALUES ('$trackingnumber', '$tracking_record', '$tracking_comment', '$datentime')"); 
		$_SESSION['message'] = "Record saved"; 
		header('location: shipments.php');
	}

	if (isset($_POST['update'])) {

		$now = new DateTime();
		$date = $now->format('Y-m-d H:i:s');    // MySQL datetime format
		$time = $now->getTimestamp();  
		
		$trackingnumber = $_POST['trackingnumber'];
		$tracking_record = $_POST['status_message'];
		$tracking_comment = $_POST['status_comment'];
		$datentime = $date." ".$time;

		mysqli_query($conn, "UPDATE tbtrackingrecords SET tracking_record='$tracking_record', tracking_comment='$tracking_comment', datentime='$datentime' WHERE trackingnumber='$trackingnumber'");
		$_SESSION['message'] = "Record updated!"; 
		header('location: shipments.php');
	}

?>