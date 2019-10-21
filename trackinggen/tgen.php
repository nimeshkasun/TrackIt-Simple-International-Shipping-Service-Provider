<?php 
	session_start();
	//$db = mysqli_connect('localhost', 'root', '', 'courierdb');
	
	

function getTracking($tgen,$countrycode,$sname,$sadd,$sphone,$semail,$bname,$badd,$bphone,$bemail,$itemname,$iprice)
{	
	require_once "../db/conn.php";
	$formattedtnum = "";
	$shipmentcost = "";

	$sql = "SELECT RID FROM tbtrackingstatus";
	
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
							    while($row = $result->fetch_assoc()) {
							        $lasttrackingnum=$row["RID"];
							    }
							    $newtrackingnum = $lasttrackingnum+1;
							    $tnumlen = strlen($newtrackingnum);
							    switch ($tnumlen) {
								    case 1:
								        $formattedtnum = "0000000".$newtrackingnum;
								        break;
								    case 2:
								        $formattedtnum = "000000".$newtrackingnum;
								        break;
								    case 3:
								        $formattedtnum = "00000".$newtrackingnum;
								        break;
								    case 4:
								    	$formattedtnum = "0000".$newtrackingnum;
								        break;
								    case 5:
								    	$formattedtnum = "000".$newtrackingnum;
								        break;
								    case 6:
								    	$formattedtnum = "00".$newtrackingnum;
								        break;
								    case 7:
								    	$formattedtnum = "0".$newtrackingnum;
								        break;
								    default:
								    	$formattedtnum = $newtrackingnum;
								}
							}
	// initialize variables
	$trackingnumber = "";
	$sname = "";
	$sadd = "";
	$id = 0;
	$update = false;
	$a="aaa";

	if ($tgen=="true") {

		$now = new DateTime();
		$date = $now->format('Y-m-d H:i:s');    // MySQL datetime format
		$time = $now->getTimestamp();

		$countrycode = $countrycode;
		$sname = $sname;
		$sadd = $sadd;
		$sphone = $sphone;
		$semail = $semail;
		$bname = $bname;
		$badd = $badd;
		$bphone = $bphone;
		$bemail = $bemail;
		$itemname = $itemname;
		$iprice = $iprice;
		//$datentime = $date." ".$time;
		$generatedtrackingnum = $countrycode.$formattedtnum;
		$shipping="";
		if($iprice<=50){
			$shipping="15";
			$shipmentcost = $iprice+$shipping;
		}
		elseif ($iprice<=100){
			$shipping="15";
			$shipmentcost = $iprice+$shipping;
		}
		elseif ($iprice<=500){
			$shipping="50";
			$shipmentcost = $iprice+$shipping;
		}
		elseif ($iprice<=1000){
			$shipping="75";
			$shipmentcost = $iprice+$shipping;
		}
		elseif ($iprice<=5000){
			$shipping="105";
			$shipmentcost = $iprice+$shipping;
		}
		elseif ($iprice>5000){
			$shipping="200";
			$shipmentcost = $iprice+$shipping;
		}

		mysqli_query($conn, "INSERT INTO tbtrackingstatus (TrackingNumber, TrackingStatus) VALUES ('$generatedtrackingnum', 'DS')"); 

		mysqli_query($conn, "INSERT INTO tbshipment (trackingnumber, sname, sadd, sphone, semail, bname, badd, bphone, bemail, itemname, iprice, shipmentcost) VALUES ('$generatedtrackingnum', '$sname', '$sadd', '$sphone', '$semail', '$bname', '$badd', '$bphone', '$bemail', '$itemname', '$iprice', '$shipmentcost')"); 

		$tracking_record = "Tracking Generated";
		$tracking_comment = "Successful payment. Waitng to receive the package.";
		$now = new DateTime();
		$date = $now->format('Y-m-d H:i:s');    // MySQL datetime format
		$time = $now->getTimestamp();  
		$datentime = $date." ".$time;
		mysqli_query($conn, "INSERT INTO tbtrackingrecords (trackingnumber, tracking_record, tracking_comment, datentime) VALUES ('$generatedtrackingnum', '$tracking_record', '$tracking_comment', '$datentime')"); 
		require_once "mail/mail.php";
		
		return $generatedtrackingnum;
	}





}


require_once "./nusoap/lib/nusoap.php";

$server = new soap_server();
$server->soap_defencoding='UTF-8';
$server->configureWSDL("getTnum", "urn:getTnum");
$server->register("getTracking",
array(
	"tgen" => "xsd:string",
	"countrycode" => "xsd:string",
	"sname" => "xsd:string",
	"sadd" => "xsd:string",
	"sphone" => "xsd:int",
	"semail" => "xsd:string",
	"bname" => "xsd:string",
	"badd" => "xsd:string",
	"bphone" => "xsd:int",
	"bemail" => "xsd:string",
	"itemname" => "xsd:string",
	"iprice" => "xsd:float"
),
array("return" => "xsd:string"),
"urn:getTnum",
"urn:getTnum#getTracking",
"rpc",
"encoded",
"Get a Tracking Number");

if(!isset($HTTP_RAW_POST_DATA))
$HTTP_RAW_POST_DATA = file_get_contents( "php://input" );
$server->service($HTTP_RAW_POST_DATA);

	

 /*
	if (isset($_POST['update'])) {

		$now = new DateTime();
		$date = $now->format('Y-m-d H:i:s');    // MySQL datetime format
		$time = $now->getTimestamp();  
		
		$trackingnumber = $_POST['trackingnumber'];
		$tracking_record = $_POST['status_message'];
		$tracking_comment = $_POST['status_comment'];
		$datentime = $date." ".$time;
		
		mysqli_query($db, "UPDATE tbtrackingrecords SET tracking_record='$tracking_record', tracking_comment='$tracking_comment', datentime='$datentime' WHERE trackingnumber='$trackingnumber'");
		$_SESSION['message'] = "Record updated!"; 
		header('location: shipments.php');
	}
*/
?>
