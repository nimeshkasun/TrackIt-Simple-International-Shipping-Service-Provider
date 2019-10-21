<?php
require_once "./nusoap/lib/nusoap.php";

$wsdlFile = "http://localhost/courier/trackinggen/tgen.php?wsdl";
$soapClient = new nusoap_client($wsdlFile, "wsdl");
	
		$tgen = "true";
		$countrycode = "LK";
		$sname = "Nimesh Kasun";
		$sadd = "Borupana, Ratmalana";
		$sphone = "0718810575";
		$semail = "nimesh.ekanayaka7@gmail.com";
		$bname = "Dimuthu Chamod";
		$badd = "Track 05, Galenbindunuwewa";
		$bphone = "0718810575";
		$bemail = "kdusouthern34@gmail.com";
		$itemname = "Atlas CR Book";
		$iprice = "12";
$result = $soapClient->call("getTracking", array(
	"tgen"=>$tgen,
	"countrycode"=>$countrycode,
	"sname"=>$sname,
	"sadd"=>$sadd,
	"sphone"=>$sphone,
	"semail"=>$semail,
	"bname"=>$bname,
	"badd"=>$badd,
	"bphone"=>$bphone,
	"bemail"=>$bemail,
	"itemname"=>$itemname,
	"iprice"=>$iprice
));

echo $result;
?>