<?php
include("config.php");
include("header.php");
$con=mysqli_connect("localhost","root","aaabbb3","am2");

//phpinfo();
//print_r($_GET);

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
	if (isset($_GET["email"])  && isset($_GET["password"]) && isset($_GET["submitlogin"])) {

		//no input sanitisation big vulnerability
		//no check for blank input

		//Use this input password to drop users table
		//33'; DROP TABLE users; -- 
		//1'; UPDATE product SET price = 1 WHERE id = 7; --

		//33'; DROP TABLE users; -- SELECT * FROM users WHERE email = '1
		//33'; DELETE * FROM users; SELECT * FROM users WHERE email = '1
		//33'; SELECT * FROM users WHERE email = '1
		//x' AND passwd IN (DROP TABLE members); --
		//' OR '1' = '1

		echo $qc = "SELECT * FROM users WHERE email = '".$_GET["email"]."' AND 
		passwd = '".$_GET["password"]."'";
		//exit;
		//$rc = mysqli_multi_query($qc);

		//echo mysql_error();

		if (mysqli_multi_query($con,$qc)) {
			$suc = 1;
			setcookie("email",$_GET["email"]);
			?>
				Login successful. Redirecting to product page...
				<!--<script>top.location.href="http://<?= $site ?>/product.php?product=<?= $_GET['next'] ?>";</script>-->
			<?php
		} else {
			$suc = 2;
		}

	}

	if ($suc == 2) { ?>

		<div style="border: 1px solid #C9C9C9; width: 300px; padding: 5px 10px; margin: 10px 0 10px 0; font-size: 12px; font-weight: bold;">
		Invalid Username or Password
		</div>

	<?php } ?>

	<?php if ($suc == 0 || $suc == 2) { ?>

		Sign into your Amazon.Two account<br /><br />
		<form action="signin.php" method="GET">
			<input type="text" name="email" placeholder="Enter Email" /><br />
			<input type="password" name="password" placeholder="Enter Password" /><br /><br />
			<input type="hidden" name="next" value="<?= $_GET['next'] ?>" />
			<input type="submit" name="submitlogin" value="Sign In" /> or <a href="createaccount.php">Create Account</a>
		</form>	

	<?php } ?>

	<?php

}


?>

<?php 
	include("footer.php"); 
?>
