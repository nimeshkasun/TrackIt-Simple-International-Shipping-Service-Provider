<?php
if(isset($_POST['dashboard'])) {
	header("location: index.php");
	exit;
}
else if(isset($_POST['user_accounts'])) {
	header("location: user_accounts.php");
	exit;
}
else if(isset($_POST['shipments'])) {
	header("location: shipments.php");
	exit;
}
else if(isset($_POST['logout'])) {
   // Initialize the session
	session_start();
	 
	// Unset all of the session variables
	$_SESSION = array();
	 
	// Destroy the session.
	session_destroy();
	 
	// Redirect to login page
	header("location: ../");
	exit;
}

?>