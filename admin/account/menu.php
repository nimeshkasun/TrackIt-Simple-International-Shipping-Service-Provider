<?php
	session_start();
	$acc_type = $_SESSION['acctype'];
?>
<form class="form2" action="menu_func.php" method="post">
	<button class="btn2" type="submit" name="dashboard" value="dashboard">Dashboard</button>
	<?php
		if($acc_type=="admin"){
			echo "<button class=\"btn2\" type=\"submit\" name=\"user_accounts\" value=\"user_accounts\">User Accounts</button>";
		}
	?>
	<button class="btn2" type="submit" name="shipments" value="shipments">Shipments</button>
	<button class="btn2" type="submit" name="logout" value="logout">Logout</button>
</form>