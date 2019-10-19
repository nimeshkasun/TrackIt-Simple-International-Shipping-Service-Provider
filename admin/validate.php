<?php
require_once "../db/conn.php";
session_start();
//check connection
if (mysqli_connect_errno()){
	echo "Faild to connect to MySQL: ".mysqli_connect_error();
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $getusername = mysqli_real_escape_string($conn,$_POST['username']);
      $getpassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT * FROM tbuser WHERE username = '$getusername' and password = '$getpassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['acc_status'];
      $acc_type = $row['acc_type'];

      $count = mysqli_num_rows($result);
      

      // If result matched $username and $password, table row must be 1 row
		  
      if($count == 1) {
		    if($active=="Active"){
		     session_start();
         $_SESSION['login_user'] = $getusername;

            $sql = "SELECT * FROM tbuser WHERE username = '$getusername' and password = '$getpassword'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                         while($row = $result->fetch_assoc()) {
                             $location = $row["location"];
                              $country = $row["country"];
                              $_SESSION['location'] = $location;
                              $_SESSION['country'] = $country;
                              $_SESSION['acctype'] = $acc_type;

                         }
                      }
            

		 $_SESSION["loggedin"]=true;
         header("location: account/");
      }else{
        $_SESSION['inactive']="inactive";
        header("location: index.php");
      }
    }else {
         $_SESSION['UPincorrect']="UPincorrect";
         header("location: index.php");
      }
   }
   
mysqli_close($conn);

?>