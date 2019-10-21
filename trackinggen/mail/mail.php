<?php
// require_once 'mailerClass/class.php';
 require_once 'mail/mailerClass/PHPMailerAutoload.php';
 
 $mail = new PHPMailer;
 
 //Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
	
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

require_once "emailpass.php";

//Set who the message is to be sent from
$mail->setFrom($Username, 'TrackIt');

//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to
$mail->addAddress($semail, $sname);

//Set the subject line
$mail->Subject = "Shipment Details - TrackIt";

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

$mail->Body = "<b><center><u>Shipment Details for the order: ".$itemname."</u></center></b><br/><table>
	<tr>
		<td colspan=\"3\">Tracking Number: <b>".$generatedtrackingnum."</b><br><br></td>
	</tr>
	<tr>
		<td><b>From:</b><br>".$sname."<br>".$sadd."<br>".$sphone."<br>".$semail."</td>
		<td>&nbsp;</td>
		<td><b>To:</b><br>".$bname."<br>".$badd."<br>".$bphone."<br>".$bemail."</td>
	</tr>
	<tr><td colspan=\"3\"><hr></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td style=\"text-align: left;\">Item Cost<br>Shipping Cost<br><hr><b>Total Cost</b></td>
		<td style=\"text-align: right;\">$".$iprice."<br>$".$shipping."<br><b><hr>$".$shipmentcost."</b></td>
	</tr>
</table><br><hr style=\"border:1px solid black;\"><h3><b>TrackIt - International Shipping Service Provider</b></h3><br>";

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
$mail->isHTML(true);  
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} 



$mail = new PHPMailer;
 
 //Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
	
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "kduonlinecms@gmail.com";
$Username = "kduonlinecms@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "Kas.45678";

//Set who the message is to be sent from
$mail->setFrom($Username, 'TrackIt');

//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to
$mail->addAddress($bemail, $bname);

//Set the subject line
$mail->Subject = "Shipment Details - TrackIt";

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

$mail->Body = "<b><center><u>Shipment Details for the order: ".$itemname."</u></center></b><br/><table>
	<tr>
		<td colspan=\"3\">Tracking Number: <b>".$generatedtrackingnum."</b><br><br></td>
	</tr>
	<tr>
		<td><b>From:</b><br>".$sname."<br>".$sadd."<br>".$sphone."<br>".$semail."</td>
		<td>&nbsp;</td>
		<td><b>To:</b><br>".$bname."<br>".$badd."<br>".$bphone."<br>".$bemail."</td>
	</tr>
	<tr><td colspan=\"3\"><hr></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td style=\"text-align: left;\">Item Cost<br>Shipping Cost<br><hr><b>Total Cost</b></td>
		<td style=\"text-align: right;\">$".$iprice."<br>$".$shipping."<br><b><hr>$".$shipmentcost."</b></td>
	</tr>
</table><br><hr style=\"border:1px solid black;\"><h3><b>TrackIt - International Shipping Service Provider</b></h3><br>";

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
$mail->isHTML(true);  
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} 

 
?>