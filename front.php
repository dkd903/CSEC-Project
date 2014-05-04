<?php
$q = "SELECT * FROM product";
$r = mysql_query($q);
?>
<div>
<div style="width: 300px;border: 1px solid #C9C9C9; padding: 10px 10px; margin: 10px 0 10px 0; ">
View our latest products below:
</div>
<?php
while ($row = mysql_fetch_array($r)) {

	?>
	<div id="produc-<?= $row["id"] ?>" class="product" style="width: 300px;border: 1px solid #C9C9C9; padding: 10px 10px; margin: 10px 0 10px 0; ">
		<div class="image" style="float: left; width: 100px; height: 100px;">
			<img src="/images/<?= $row["picurl"] ?>" style="width: 100px;  height: 100px;" />
		</div>
		<div class="product" style="float: right; width: 180px;">
			<a href="product.php?product=<?= $row['id'] ?>"><b style="text-transform: capitalize;"><?= $row["name"] ?></b></a>
			<br />
			Price: $<?= $row["price"] ?>
			<br /><br />
			<?php
				$qc = "SELECT count(*) as nre FROM product_comments WHERE productid = ".$row["id"];
				$rc = mysql_query($qc);
				if (mysql_num_rows($rc) == 0) {

				?>
					<span style="font-size: 12px;">No Reviews Yet</span>
				<?php

				} else {

					while ($rowc = mysql_fetch_array($rc)) {
						?>
							<span style="font-size: 12px;"><?= $rowc["nre"]." Review(s)" ?></span>
						<?php
					}

				}
			?>
		</div>
		<div style="clear: both;"></div>
	</div>
	<?php

}
?>
</div>