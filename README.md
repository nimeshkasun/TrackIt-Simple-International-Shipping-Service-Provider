# TrackIt-Simple-International-Shipping-Service-Provider

# Introduction

* Create new Database named "courierdb" and import the 'courierdb.sql' file to the created DB in SQL Server/ Xampp
* Go to trackinggen\mail folder and edit both 'mail.php' and 'mail2.php'
	- find the code lines: 
		$mail->Username = "kduonlinecms@gmail.com";
		$Username = "kduonlinecms@gmail.com";
		$mail->Password = "Password";
	- Enter your email and password to be able to send emails to buyers and sellers
	- Your email account must be enabled to allow low secure apps in account settings
* Admin Login: username- admin password- admin123
* Agent Login: username- user password- user123
* Use this API formatted link to pass data and generate tracking numbers and automatically store in database:
	http://localhost/courier/trackinggen/tgen.php?TGEN=true&countrycode=LK&sname=Nimesh%20Kasun&sadd=Borupana,%20Ratmalana&sphone=0718810575&semail=nimesh.ekanayaka7@gmail.com&bname=Dimuthu%20Chamod&badd=Track%2005,%20Anuradhapura&bphone=0776777668&bemail=kdusouthern34@gmail.com&itemname=Atlas%20CR%20Book&iprice=12
	- You can use above format to allow other external systems to pass data to the system directly.
	- 'semail' is seller's email and 'bemail' is buyer's email. Both will receive tracking number via email

Thank you!

Email me: nimesh.ekanayaka7@gmail.com
