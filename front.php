<?php
$q = "SELECT * FROM product";
$r = mysql_query($q);
?>
<div>
<?php
while ($row = mysql_fetch_array($r)) {

	?>
	<div id="produc-<?= $row["id"] ?>" class="product">
		<div class="title">
			<?= $row["name"] ?>
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
?>
</div>