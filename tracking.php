<!DOCTYPE html>
<html lang="en">
  <head>
    
	<link rel='stylesheet' href='alert/sweetalert.min.css'>

  <?php
      require_once 'pageutil/head.php';
    ?>

    <?php
	    session_start();
	    if($_SESSION['sessiondestroy']!=null){
	    	$tracking_number = $_GET['tracking_number'];
	        if($tracking_number!== null){
		        $_SESSION['tracking_number'] = $tracking_number;
            $tracking_searched="true";
		        require_once 'db/conn.php';
	        }
	        else{
	        	header('Location: index.php');
	        }
	    }
	    else{
	    	header('Location: index.php');
	    }   
    ?>


<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >

<style type="text/css">
        .containerprog{
            width:100%;
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
	  <?php
      require_once 'pageutil/navbar.php';
    ?>
    <!-- END nav -->

    <div class="hero-wrap ftco-degree-bg" style="background-image: url('images/bg.jpg'); z-index: -1;" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text justify-content-center align-items-center">
          <div class="col-lg-8 col-md-6 ftco-animate d-flex align-items-end">
          	<div class="text text-center">
	            <h1 class="mb-4">Tracking Progress</h1>
	            <p style="font-size: 18px;">Tracking information shown here are the latest status of your order provided by agents who are responsible for the successful delivery of your order.</p>
                <div class="containerprog">
                   <ul class="progressbar">

                   		<?php
                   			$sql = "SELECT TrackingNumber, TrackingStatus FROM tbtrackingstatus WHERE TrackingNumber='$tracking_number'";
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								echo "<script type='text/javascript' src='js/jquery.min.js'></script>";
								echo "<script type='text/javascript' src='alert/sweetalert.min.js'></script>";
								echo "<script type='text/javascript' src='alert/trackingfound.js'></script>";
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
							    	echo "<li class=\"active\">Dispatching Soon</li>";
			                       echo "<li class=\"inprogress\">Dispatched</li>";
			                       echo "<li>In Transit</li>";
			                       echo "<li>Out for Delivery</li>";
			                       echo "<li>Delivered</li>";
							    }elseif ($tracking_status=="IT") {
							    	echo "<li class=\"active\">Dispatching Soon</li>";
			                       echo "<li class=\"active\">Dispatched</li>";
			                       echo "<li class=\"inprogress\">In Transit</li>";
			                       echo "<li>Out for Delivery</li>";
			                       echo "<li>Delivered</li>";
							    }elseif ($tracking_status=="OD") {
							    	echo "<li class=\"active\">Dispatching Soon</li>";
			                       echo "<li class=\"active\">Dispatched</li>";
			                       echo "<li class=\"active\">In Transit</li>";
			                       echo "<li class=\"inprogress\">Out for Delivery</li>";
			                       echo "<li>Delivered</li>";
							    }elseif ($tracking_status=="DED") {
							    	echo "<li class=\"active\">Dispatching Soon</li>";
			                       echo "<li class=\"active\">Dispatched</li>";
			                       echo "<li class=\"active\">In Transit</li>";
			                       echo "<li class=\"active\">Out for Delivery</li>";
			                       echo "<li class=\"inprogress\">Delivered</li>";
							    }elseif ($tracking_status=="DONE") {
							       echo "<li class=\"active\">Dispatching Soon</li>";
			                       echo "<li class=\"active\">Dispatched</li>";
			                       echo "<li class=\"active\">In Transit</li>";
			                       echo "<li class=\"active\">Out for Delivery</li>";
			                       echo "<li class=\"active\">Delivered</li>";
							    }
							} else {
							    echo "<script type='text/javascript' src='js/jquery.min.js'></script>";
								echo "<script type='text/javascript' src='alert/sweetalert.min.js'></script>";
								echo "<script type='text/javascript' src='alert/trackingnotfound.js'></script>";
								echo "No Records Found. You will be redirected within 5 seconds.";
							}
							//$conn->close();
							session_destroy();
                   		?>

                   </ul>
               </div>
            </div>
          </div>
        </div>
      </div>

      <div class="mouse">
				<a href="#" class="mouse-icon">
					<div class="mouse-wheel"><span class="ion-ios-arrow-round-down"></span></div>
				</a>
	   </div>
    </div>


<div style="height: 8em;">&nbsp;</div>
<?php $resultsrecords = mysqli_query($conn, "SELECT * FROM tbtrackingrecords WHERE trackingnumber='$tracking_number' ORDER BY datentime DESC"); ?>
<center>
  <table border="1px" style="width: 90%; ">
  <thead>
    <tr style="font-weight: bold; background-color: white;">
      <th><center>Tracking Record</center></th>
      <th><center>Tracking Comment</center></th>
      <th><center>Date and Time</center></th>
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
</center>

<br/><br/><br/><br/><br/><br/>

    <?php
      require_once 'pageutil/footer.php';
    ?>

  </body>
</html>