<?php 
// Initialize the session
error_reporting(E_ALL ^ E_NOTICE);
session_start();

if($_SESSION['acctype']=="agent"){
	header("location: index.php");
}

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}

include('server.php');
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($conn, "SELECT * FROM tbuser WHERE uid=$id");


		if ($record != NULL ) {
			$n = mysqli_fetch_array($record);
			$username = $n['username'];
			$first_name = $n['first_name'];
			$last_name = $n['last_name'];
			$email = $n['email'];
			$password = $n['password'];
			$acc_type2 = $n['acc_type'];
			$acc_status = $n['acc_status'];
			$country = $n['country'];
			$location = $n['location'];
		}

	}
	$loc = $_SESSION['location'];
	$cntry = $_SESSION['country'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title>TrackIt - Admin Panel | Manage User Accounts</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
	<!-- Favicon -->
    <link rel="icon" href="../../img/core-img/favicon.ico">

    <script>
		function acc_type_admin(e)
		{
		  acc_type.value = e;
		}
		function acc_type_agent(e)
		{
		  acc_type.value = e;
		}
		function acc_status_active(e)
		{
		  acc_status.value = e;
		}a
		function acc_status_inactive(e)
		{
		  acc_status.value = e;
		}a
	</script>

	<script src="jquery.min2.js"></script>
	<script src="bootstrap3-typeahead.min.js"></script>  
  	<link rel="stylesheet" href="bootstrap.min2.css" />  

</head>
<body>
		<center><h2><?php echo $loc." - ".$cntry; ?></h2></center>
	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>

<?php $results = mysqli_query($conn, "SELECT * FROM tbuser"); ?>

<?php require_once 'menu.php'; ?>



<form method="post" action="server.php" >

	<input type="hidden" name="id" value="<?php echo $id; ?>">

	<div class="input-group">
		<label>Username</label>
		<input type="text" name="username" value="<?php echo $username; ?>">
	</div>
	<div class="input-group">
		<label>First Name</label>
		<input type="text" name="first_name" value="<?php echo $first_name; ?>">
	</div>
	<div class="input-group">
		<label>Last Name</label>
		<input type="text" name="last_name" value="<?php echo $last_name; ?>">
	</div>
	<div class="input-group">
		<label>Email</label>
		<input type="text" name="email" value="<?php echo $email; ?>">
	</div>
	<div class="input-group">
		<label>Password</label>
		<input type="password" name="password" value="<?php echo $password; ?>">
	</div>
	<div class="input-group">
		<label>Account Type</label>
		<input type="text" name="acc_type" id="acc_type" value="<?php echo $acc_type2; ?>">
		<a href="#" onclick="acc_type_admin('admin')">Admin</a> &nbsp;
		<a href="#" onclick="acc_type_agent('agent')">Agent</a>
	</div>
	<div class="input-group">
		<label>Account Status</label>
		<input type="text" name="acc_status" id="acc_status" value="<?php echo $acc_status; ?>">
		<a href="#" onclick="acc_status_active('Active')">Active</a> &nbsp;
		<a href="#" onclick="acc_status_inactive('Inactive')">Inactive</a>
	</div>
	<div class="input-group">
		<label>Country</label>
		<input type="text" name="country" id="country_search" value="<?php echo $country; ?>">
	</div>
	<div class="input-group">
		<label>Location</label>
		<input type="text" name="location" id="location_search" value="<?php echo $location; ?>">
	</div>
	<div class="input-group">

		<?php if ($update == true): ?>
			<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
		<?php else: ?>
			<button class="btn" type="submit" name="save" >Save</button>
		<?php endif ?>
	</div>
</form>


<table>
	<thead>
		<tr>
			<th>Username</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Account Type</th>
			<th>Account Status</th>
			<th>Country</th>
			<th>Location</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['first_name']; ?></td>
			<td><?php echo $row['last_name']; ?></td>
			<td><?php echo $row['acc_type']; ?></td>
			<td><?php echo $row['acc_status']; ?></td>
			<td><?php echo $row['country']; ?></td>
			<td><?php echo $row['location']; ?></td>
			<td>
				<a href="user_accounts.php?edit=<?php echo $row['uid']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="user_accounts.php?del=<?php echo $row['uid']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>

</body>
</html>

<script>
$(document).ready(function(){
 
 load_data('');
 
 function load_data(query, typehead_search = 'yes')
 {
  $.ajax({
   url:"fetch_country.php",
   method:"POST",
   data:{query:query, typehead_search:typehead_search},
   success:function(data)
   {
    $('#country_data').html(data);
   }
  });
 }

 function load_data(query, typehead_search = 'yes')
 {
  $.ajax({
   url:"fetch_location.php",
   method:"POST",
   data:{query:query, typehead_search:typehead_search},
   success:function(data)
   {
    $('#location_data').html(data);
   }
  });
 }
 
 $('#country_search').typeahead({
  source: function(query, result){
   $.ajax({
    url:"fetch_country.php",
    method:"POST",
    data:{query:query},
    dataType:"json",
    success:function(data){
     result($.map(data, function(item){
      return item;
     }));
     load_data(query, 'yes');
    }
   });
  }
 });

 $('#location_search').typeahead({
  source: function(query, result){
   $.ajax({
    url:"fetch_location.php",
    method:"POST",
    data:{query:query},
    dataType:"json",
    success:function(data){
     result($.map(data, function(item){
      return item;
     }));
     load_data(query, 'yes');
    }
   });
  }
 });
 
 $(document).on('click', 'li', function(){
  var query = $(this).text();
  load_data(query);
 });
 
});
</script>