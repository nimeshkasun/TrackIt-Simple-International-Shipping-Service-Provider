<?php
require_once "../db/conn.php";

//check connection
if (mysqli_connect_errno()){
	echo "Faild to connect to MySQL: ".mysqli_connect_error();
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $getusername = mysqli_real_escape_string($conn,$_POST['username']);
      $getemail = mysqli_real_escape_string($conn,$_POST['email']); 
	  $getnewpassword = mysqli_real_escape_string($conn,$_POST['newpassword']);
      $getconpassword = mysqli_real_escape_string($conn,$_POST['conpassword']); 
      
      $sql = "SELECT * FROM tbuser WHERE username = '$getusername' and email = '$getemail'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $username and $password, table row must be 1 row
		
      if($count == 1) {
		  if($getnewpassword==$getconpassword){
						   $sql="UPDATE tbuser SET password='$getnewpassword' WHERE username = '$getusername' AND email = '$getemail' ";

							if(!mysqli_query($conn,$sql)){
								die('Error: '.mysqli_error($conn));
							}
							header("location: index.php");
							$ax="ass";
							$_SESSION['ac'] = $ax;
			      }else {
			         $error = "Your Login Name or Email is invalid";
					 header("location: forgotpassword.php");
			      }
			   }
			   
			mysqli_close($conn);
}
?>