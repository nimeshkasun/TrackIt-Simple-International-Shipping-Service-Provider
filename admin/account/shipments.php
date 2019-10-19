<?php 
// Initialize the session
error_reporting(E_ALL ^ E_NOTICE);
session_start();
 require_once "../../db/conn.php";
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}
	    	$tracking_searched=$_GET['tracking_searched'];
	    	$tracking_number = $_GET['tracking_number'];
	        if($tracking_number!== null){
		        $_SESSION['tracking_number'] = $tracking_number;
	        }
	        else if(isset($_SESSION['tracking_number'])){
	        	$tracking_number = $_SESSION['tracking_number'];
	        }
	    
	    $location = $_SESSION['location'];
	    $country = $_SESSION['country'];
	    
include('server2.php');
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($conn, "SELECT * FROM tbshipment WHERE trackingnumber='$id'");

		if ($record != NULL ) {
			$n = mysqli_fetch_array($record);
			$trackingnumber = $n['trackingnumber'];
			$sname = $n['sname'];
			$sadd = $n['sadd'];
			$sphone = $n['sphone'];
			$semail = $n['semail'];
			$bname = $n['bname'];
			$badd = $n['badd'];
			$bphone = $n['bphone'];
			$bemail = $n['bemail'];
			$itemname = $n['itemname'];
			$iprice = $n['iprice'];
			$shipmentcost = $n['shipmentcost'];
		}

	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title>TrackIt - Admin Panel | Manage Shipments</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
	<!-- Favicon -->
    <link rel="icon" href="../../img/core-img/favicon.ico">

    <script>
		function tracking_status(e)
		{
		  trackingstatus.value = e;
		}
		function status_message(e)
		{
		  var val = "<?php echo $location.", ".$country; ?>";
		  statusmessage.value = e + val;
		}
		function status_comment(e)
		{
		  statuscomment.value = e;
		}
	</script>

	<script src="jquery.min2.js"></script>
	<script src="bootstrap3-typeahead.min.js"></script>  
  	<link rel="stylesheet" href="bootstrap.min2.css" />  

  	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
  		<link rel='stylesheet' href='../../alert/sweetalert.min.css'>

	<style type="text/css">
        .containerprog{
            width:50%;
            margin: auto;
        }
        .progressbar{
            counter-reset: step;
        }
        .progressbar li {
            list-style-type: none;
            float: left;
            width: 20%;
            position: relative;
            text-align: center;
        }
        .progressbar li:before{
            font-family: FontAwesome;
            content: "\f00d";
            width: 50px;
            height: 50px;
            line-height: 50px;
            border: 2px solid #ddd;
            display: block;
            text-align: center;
            margin: 0 auto 10px auto;
            border-radius: 50%;
            background-color: white;
        }
        .progressbar li:after{
            content: "";
            position: absolute;
            width: 100%;
            height: 2px;
            background-color: #ddd;
            top: 25px;
            left: -50%;
            z-index: -1;
        }
        .progressbar li:first-child:after{
            content: none;
        }
        .progressbar li.active{
            color: green;
        }
        .progressbar li.active:before{
            font-family: FontAwesome;
            content: "\f00c";
            border-color: green;
        }
        .progressbar li.inprogress{
            color: blue;
        }
        .progressbar li.inprogress:before{
            font-family: FontAwesome;
            content: "\f021";
            border-color: blue;
        }
        .progressbar li.active + li:after{
            background-color: green;
        }
        table tr:nth-of-type(1){background:yellow;}
    </style>
</head>
<body>
	<center><h2><?php echo $location." - ".$country; ?></h2></center>
	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>

<?php $results = mysqli_query($conn, "SELECT * FROM tbshipment WHERE TrackingNumber='$tracking_number'"); ?>

<?php require_once 'menu.php'; ?>

				<form action="shipments.php" method="GET">
		        		<div class="row justify-content-center">
		        			<div class="col-lg-10 align-items-end">
		        				<div class="form-group">
		          				<div class="form-field">
		          				<input type="hidden" name="tracking_searched" value="true">
				                <input type="text" class="form-control" placeholder="Track Shipment" name="tracking_number" id="trackingnumber_search" value="<?php echo $trackingnumber; ?>" autofocus>
				              </div>
			              </div>
		        			</div>
		        		</div>
		        	</form>

<section>
<div class="containerprog">
                   <ul class="progressbar">

                   		<?php
                   			$sql = "SELECT TrackingNumber, TrackingStatus FROM tbtrackingstatus WHERE TrackingNumber='$tracking_number'";
							$result = $conn->query($sql);

							if ($result->num_rows > 0 && $tracking_searched=="true" || $trackingnumber!=null) {
								echo "<script type='text/javascript' src='../../js/jquery.min.js'></script>";
								echo "<script type='text/javascript' src='../../alert/sweetalert.min.js'></script>";
							       echo "<script type='text/javascript' src='trackingfound.js'></script>";
								
							    // output data of each row
							    /*while($row = $result->fetch_assoc()) {
							        echo "id: " . $row["TrackingNumber"]. " - Name: " . $row["TrackingStatus"]."<br>";
							    }*/
							    while($row = $result->fetch_assoc()) {
							        $tracking_status=$row["TrackingStatus"];
							    }
							    
							    if($tracking_status=="DS"){
							       echo "<li class=\"inprogress\">Dispatching Soon</li>";
			                       echo "<li>Dispatched</li>";
			                       echo "<li>In Transit</li>";
			                       echo "<li>Out for Delivery</li>";
			                       echo "<li>Delivered</li>";
							    }elseif ($tracking_status=="DID") {
							    	echo "<script type='text/javascript' src='../../alert/sweetalert.min.js'></script>";
							    	echo "<script type='text/javascript' src='trackingfound.js'></script>";
							    	echo "<li class=\"active\">Dispatching Soon</li>";
			                       echo "<li class=\"inprogress\">Dispatched</li>";
			                       echo "<li>In Transit</li>";
			                       echo "<li>Out for Delivery</li>";
			                       echo "<li>Delivered</li>";
							    }elseif ($tracking_status=="IT") {
							    	echo "<script type='text/javascript' src='../../alert/sweetalert.min.js'></script>";
							    	echo "<script type='text/javascript' src='trackingfound.js'></script>";
							    	echo "<li class=\"active\">Dispatching Soon</li>";
			                       echo "<li class=\"active\">Dispatched</li>";
			                       echo "<li class=\"inprogress\">In Transit</li>";
			                       echo "<li>Out for Delivery</li>";
			                       echo "<li>Delivered</li>";
							    }elseif ($tracking_status=="OD") {
							    	echo "<script type='text/javascript' src='../../alert/sweetalert.min.js'></script>";
							    	echo "<script type='text/javascript' src='trackingfound.js'></script>";
							    	echo "<li class=\"active\">Dispatching Soon</li>";
			                       echo "<li class=\"active\">Dispatched</li>";
			                       echo "<li class=\"active\">In Transit</li>";
			                       echo "<li class=\"inprogress\">Out for Delivery</li>";
			                       echo "<li>Delivered</li>";
							    }elseif ($tracking_status=="DED") {
							    	echo "<script type='text/javascript' src='../../alert/sweetalert.min.js'></script>";
							    	echo "<script type='text/javascript' src='trackingfound.js'></script>";
							    	echo "<li class=\"active\">Dispatching Soon</li>";
			                       echo "<li class=\"active\">Dispatched</li>";
			                       echo "<li class=\"active\">In Transit</li>";
			                       echo "<li class=\"active\">Out for Delivery</li>";
			                       echo "<li class=\"inprogress\">Delivered</li>";
							    }elseif ($tracking_status=="DONE") {
							    	echo "<script type='text/javascript' src='../../alert/sweetalert.min.js'></script>";
							    	echo "<script type='text/javascript' src='trackingfound.js'></script>";
							       echo "<li class=\"active\">Dispatching Soon</li>";
			                       echo "<li class=\"active\">Dispatched</li>";
			                       echo "<li class=\"active\">In Transit</li>";
			                       echo "<li class=\"active\">Out for Delivery</li>";
			                       echo "<li class=\"active\">Delivered</li>";
							    }
							    echo "<br><br><br><br>";
							} else if ($result->num_rows == 0 && $tracking_searched=="true" || $trackingnumber!=null){
							    echo "<script type='text/javascript' src='../../js/jquery.min.js'></script>";
								echo "<script type='text/javascript' src='../../alert/sweetalert.min.js'></script>";
								echo "<script type='text/javascript' src='trackingnotfound.js'></script>";
							}
							//$conn->close();
                   		?>

                   </ul>
               </div>
</section>

<section>
<form method="post" action="tstatusupdate.php" >

	<input type="hidden" name="id" value="<?php echo $id; ?>">

	<div class="input-group"  style="width: 100%;">
		<label>Tracking Number</label>

		<input type="text" name="tracking_number" value="<?php if ($tracking_searched=="true" || $trackingnumber!=null){ echo $tracking_number; } ?>" readonly>
	</div>
	<div class="input-group" style="width: 100%;">
		<label>Tracking Status</label>
		<input type="text" name="tracking_status" id="trackingstatus" value="<?php echo $tracking_status; ?>"><br>
		<a href="#" onclick="tracking_status('DS')">Dispatching Soon</a> &nbsp;
		<a href="#" onclick="tracking_status('DID')">Dispatched</a> &nbsp;
		<a href="#" onclick="tracking_status('IT')">In Transist</a> &nbsp;
		<a href="#" onclick="tracking_status('OD')">Out for Dekivery</a> &nbsp;
		<a href="#" onclick="tracking_status('DED')">Delivered</a> &nbsp;
		<a href="#" onclick="tracking_status('DONE')">Done</a>
	</div>
	<div class="input-group">
		<?php if ($tracking_searched=="true" || $trackingnumber!=null): ?>
			<button class="btn" type="submit" name="update" style="background: #556B2F;" >Update</button>
		<?php else: ?>
			
		<?php endif ?>
			
	</div>
</form>
</section>

<section>
<form method="post" action="tracking_records.php" >

	<input type="hidden" name="trackingnumber" value="<?php echo $tracking_number; ?>">
	<div class="input-group" style="width: 100%;">
		<label>Status Message</label>
		<input type="text" name="status_message" id="statusmessage" value="<?php if ($tracking_searched=="true" || $trackingnumber!=null){ 
			echo $status_message;
		 	} ?>" readonly><br>
		 	<a href="#" onclick="status_message('ITEM RECEIVED AT ')">ITEM RECEIVED AT</a> &nbsp;
			<a href="#" onclick="status_message('ITEM SENT OUT FROM ')">ITEM SENT OUT FROM</a> &nbsp;
			<a href="#" onclick="status_message('ITEM HOLDED AT ')">ITEM HOLDED AT</a> &nbsp;
			<a href="#" onclick="status_message('ITEM DELAYED AT ')">ITEM DELAYED AT</a> &nbsp;
			<a href="#" onclick="status_message('ITEM CLEARED FROM ')">ITEM CLEARED FROM</a> &nbsp;
			<a href="#" onclick="status_message('ITEM RETURNED FROM ')">ITEM RETURNED FROM</a> &nbsp;
			<a href="#" onclick="status_message('ITEM SUCCESSFULLY DELIVERED BY ')">ITEM DELIVERED BY</a>
	</div>
	<div class="input-group"  style="width: 100%;">
		<label>Comments</label>
		<input type="text" name="status_comment" id="statuscomment" value="<?php echo $status_comment; ?>"><br>
		<a href="#" onclick="status_comment('Holded due to CUSTOM clearance')">Holded due to CUSTOM clearance</a> &nbsp;
		<a href="#" onclick="status_comment('CUSTOM clearance failed!')">CUSTOM clearance failed!</a> &nbsp;
		<a href="#" onclick="status_comment('Item Damaged')">Item Damaged</a> &nbsp;
		<a href="#" onclick="status_comment('Delayed due to HOLIDAY')">Delayed due to HOLIDAY</a> &nbsp;
		<a href="#" onclick="status_comment('Customer RECEIVED the item')">Customer RECEIVED the item</a>
	</div>
	<div class="input-group">
		<?php if ($tracking_searched=="true" || $trackingnumber!=null): ?>
			<button class="btn" type="submit" name="save" style="background: #556B2F;" >Save</button>
		<?php else: ?>
			
		<?php endif ?>
			
	</div>
</form>
</section>

<?php $resultsrecords = mysqli_query($conn, "SELECT * FROM tbtrackingrecords WHERE trackingnumber='$tracking_number' ORDER BY datentime DESC"); ?>
<table border="1px" style="width: 90%;">
	<thead>
		<tr style="font-weight: bold; background-color: white;">
			<th>Tracking Record</th>
			<th>Tracking Comment</th>
			<th>Date and Time</th>
		</tr>
	</thead>
	
	<?php 
	if ($tracking_searched=="true" || $trackingnumber!=null){
	while ($row = mysqli_fetch_array($resultsrecords)) { ?>
		<tr>
			<td><?php echo $row['tracking_record']; ?></td>
			<td><?php echo $row['tracking_comment']; ?></td>
			<td><?php echo $row['datentime']; ?></td>
		</tr>
	<?php } }?>
</table>

<table border="1px"  style="width: 90%;">
	<thead>
		<tr style="background-color: white;">
			<th>Tracking Number</th>
			<th>Seller Name</th>
			<th>Seller Address</th>
			<th>Seller Phone Number</th>
			<th>Seller Email</th>
			<th>Buyer Name</th>
			<th>Buyer Address</th>
			<th>Buyer Phone</th>
			<th>Buyer Email</th>
			<th>Item Name</th>
			<th>Item Price</th>
			<th>Shipment Cost</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	<br/><br/>
	<?php 
	if ($tracking_searched=="true" || $trackingnumber!=null){
	while ($row = mysqli_fetch_array($results)) { ?>
		<tr style="background-color: white;">
			<td><?php echo $row['trackingnumber']; ?></td>
			<td><?php echo $row['sname']; ?></td>
			<td><?php echo $row['sadd']; ?></td>
			<td><?php echo $row['sphone']; ?></td>
			<td><?php echo $row['semail']; ?></td>
			<td><?php echo $row['bname']; ?></td>
			<td><?php echo $row['badd']; ?></td>
			<td><?php echo $row['bphone']; ?></td>
			<td><?php echo $row['bemail']; ?></td>
			<td><?php echo $row['itemname']; ?></td>
			<td><?php echo $row['iprice']; ?></td>
			<td><?php echo $row['shipmentcost']; ?></td>
			<td>
				<a href="shipments.php?edit=<?php echo $row['trackingnumber']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="shipments.php?del=<?php echo $row['trackingnumber']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } }?>
</table>




<section>
<form method="post" action="server2.php" >

	<input type="hidden" name="id" value="<?php echo $id; ?>">

	<div class="input-group">
		<label>Tracking Number</label>
		<input type="text" name="trackingnumber" value="<?php echo $trackingnumber; ?>" readonly>
	</div>
	<div class="input-group">
		<label>Seller Name</label>
		<input type="text" name="sname" value="<?php echo $sname; ?>">
	</div>
	<div class="input-group">
		<label>Seller Address</label>
		<input type="text" name="sadd" value="<?php echo $sadd; ?>">
	</div>
	<div class="input-group">
		<label>Seller Phone Number</label>
		<input type="text" name="sphone" value="<?php echo $sphone; ?>">
	</div>
	<div class="input-group">
		<label>Seller Email</label>
		<input type="text" name="semail" value="<?php echo $semail; ?>">
	</div>
	<div class="input-group">
		<label>Buyer Name</label>
		<input type="text" name="bname" value="<?php echo $bname; ?>">
	</div>
	<div class="input-group">
		<label>Buyer Address</label>
		<input type="text" name="badd" value="<?php echo $badd; ?>">
	</div>
	<div class="input-group">
		<label>Buyer Phone Number</label>
		<input type="text" name="bphone" id="country_search" value="<?php echo $bphone; ?>">
	</div>
	<div class="input-group">
		<label>Buyer Email</label>
		<input type="text" name="bemail" id="location_search" value="<?php echo $bemail; ?>">
	</div>
	<div class="input-group">
		<label>Item Name</label>
		<input type="text" name="itemname" value="<?php echo $itemname; ?>">
	</div>

	<div class="input-group">
		<label>Item Price</label>
		<input type="text" name="iprice" value="<?php echo $iprice; ?>">
	</div>

	<div class="input-group">
		<label>Shipment Cost</label>
		<input type="text" name="shipmentcost" value="<?php echo $shipmentcost; ?>">
	</div>

	<div class="input-group">

		<?php if ($update == true): ?>
			<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
		<?php else: ?>
		<?php endif ?>
	</div>
</form>
</section>

</body>
</html>

<script>
$(document).ready(function(){
 
 load_data('');
 
 function load_data(query, typehead_search = 'yes')
 {
  $.ajax({
   url:"fetch_trackingnumber.php",
   method:"POST",
   data:{query:query, typehead_search:typehead_search},
   success:function(data)
   {
    $('#trackingnumber_data').html(data);
   }
  });
 }

 $('#trackingnumber_search').typeahead({
  source: function(query, result){
   $.ajax({
    url:"fetch_trackingnumber.php",
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