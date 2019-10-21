# TrackIt-Simple-International-Shipping-Service-Provider with SOAP

# Introduction

* Create new Database named "courierdb" and import the 'courierdb.sql' file to the created DB in SQL Server/ Xampp
* Go to trackinggen\mail folder and edit 'emailpass.php'
	- find the code lines: 
		$mail->Username = "kduonlinecms@gmail.com";
		$Username = "kduonlinecms@gmail.com";
		$mail->Password = "Password";
	- Enter your email and password to be able to send emails to buyers and sellers
	- Your email account must be enabled to allow low secure apps in account settings
* Admin Login: username- admin password- admin123
* Agent Login: username- user password- user123
* Use 'tgen-Test.php' file to send data to generate tracking. Data is sent via SOAP web services. And generated tracking number is returned.
	- you can use 'trackinggen/tgen.php?wsdl' or 'http://localhost/courier/trackinggen/tgen.php?wsdl' as WSDL URL to pass Data to the system through external systems.
	- But to use external web services, you must send following variables through the service.
		$tgen
		$countrycode
		$sname
		$sadd
		$sphone
		$semail
		$bname
		$badd
		$bphone
		$bemail
		$itemname
		$iprice
	- For a clear idea, check the coding in 'tgen-Test.php'.

Thank you!

Email me: nimesh.ekanayaka7@gmail.com
