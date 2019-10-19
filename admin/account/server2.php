<?php 
require_once "../../db/conn.php";

	session_start();
	//$db = mysqli_connect('localhost', 'root', '', 'courierdb');

	// initialize variables
	$trackingnumber = "";
	$sname = "";
	$sadd = "";
	$sphone = "";
	$semail = "";
	$bname = "";
	$badd = "";
	$bphone = "";
	$bemail = "";
	$itemname = "";
	$iprice = "";
	$shipmentcost = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$trackingnumber = $_POST['trackingnumber'];
		$sname = $_POST['sname'];
		$sadd = $_POST['sadd'];
		$sphone = $_POST['sphone'];
		$semail = $_POST['semail'];
		$bname = $_POST['bname'];
		$badd = $_POST['badd'];
		$bphone = $_POST['bphone'];
		$bemail = $_POST['bemail'];
		$itemname = $_POST['itemname'];
		$iprice = $_POST['iprice'];
		$shipmentcost = $_POST['shipmentcost'];

		mysqli_query($conn, "INSERT INTO tbshipment (trackingnumber, sname, sadd, sphone, semail, bname, badd, bphone, bemail, itemname, iprice, shipmentcost) VALUES ('$trackingnumber', '$sname', '$sadd', '$sphone', '$semail', '$bname', '$badd', '$bphone', '$bemail', '$itemname', '$iprice', '$shipmentcost')"); 
		$_SESSION['message'] = "Record saved"; 
		header('location: shipments.php');
	}


	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$trackingnumber = $_POST['trackingnumber'];
		$sname = $_POST['sname'];
		$sadd = $_POST['sadd'];
		$sphone = $_POST['sphone'];
		$semail = $_POST['semail'];
		$bname = $_POST['bname'];
		$badd = $_POST['badd'];
		$bphone = $_POST['bphone'];
		$bemail = $_POST['bemail'];
		$itemname = $_POST['itemname'];
		$iprice = $_POST['iprice'];
		$shipmentcost = $_POST['shipmentcost'];

		mysqli_query($conn, "UPDATE tbshipment SET trackingnumber='$trackingnumber', sname='$sname', sadd='$sadd', sphone='$sphone', semail='$semail', bname='$bname', badd='$badd', bphone='$bphone', bemail='$bemail', itemname='$itemname', iprice='$iprice', shipmentcost='$shipmentcost' WHERE trackingnumber='$id'");
		$_SESSION['message'] = "Record updated!"; 
		header('location: shipments.php');
	}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($conn, "DELETE FROM tbshipment WHERE trackingnumber='$id'");
	$_SESSION['message'] = "Record deleted!"; 
	header('location: shipments.php');
}


	$results = mysqli_query($conn, "SELECT * FROM tbshipment");


?>