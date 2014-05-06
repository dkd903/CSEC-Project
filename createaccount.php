<?php
include("config.php");
include("header.php");


//perform sql injection, drop the user
//table

if (isset($_COOKIE["email"])) {
	?>	
		Redirecting you to store...
		<script>top.location.href="http://<?= $site ?>";</script>
	<?php
} else {
	$suc = 0;

	//process signin
	if (isset($_GET["email"]) && ($_GET["email"] != "") && isset($_GET["password"]) && isset($_GET["submitacc"])) {

		//check for session token here!!!!!!!

		//no input sanitisation big vulnerability
		//no check for blank input
		$qc = "INSERT INTO users (email,passwd) VALUES ('".$_GET["email"]."', '".$_GET["password"]."')";
		$rc = mysql_query($qc);
		//echo mysql_affected_rows()."hh";
		//exit;
		if (mysql_affected_rows() != -1) {
			$suc = 1;
			setcookie("email",$_GET["email"]);
			?>
				Account created. Redirecting...
				<script>top.location.href="http://<?= $site ?>/";</script>
			<?php
		} else {
			$suc = 2;
		}

	}

	if ($suc == 2) { ?>

		<div style="border: 1px solid #C9C9C9; width: 300px; padding: 5px 10px; margin: 10px 0 10px 0; font-size: 12px; font-weight: bold;">
		Invalid Username or Password data or already exists
		</div>

	<?php } ?>

	<?php if ($suc == 0 || $suc == 2) { ?>

		Create a new Amazon.Two account<br /><br />
		<form action="createaccount.php" method="GET">
			<input type="text" name="email" placeholder="Enter Email" /><br />
			<input type="password" name="password" placeholder="Enter Password" /><br /><br />
			<input type="submit" name="submitacc" value="Create" />
		</form>	

	<?php } ?>

	<?php

}


?>

<?php 
	include("footer.php"); 
?>
