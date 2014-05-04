<html>
<head>
	<title>Amazon.Two - Store on your Phone</title>
	<script>
	function buyform() {
		document.getElementById("buyform").style.display = "block";
	}
	</script>
</head>
<body>
<div>
	<div style="border: 1px solid #C9C9C9; background: #C9C9C9; width: 300px; padding: 5px 10px; margin: 10px 0 10px 0;">
		<span style="font-size: 25px;">Amazon.Two</span>
		<br />
		<em>e-Store on your Phone</em>
		<br />
		<br />
		<?php if (isset($_COOKIE["email"])) { ?> 
			<span style="font-size: 12px;">Hi, <?= $_COOKIE["email"] ?>! <a href="logout.php">Logout</a></span>
		<?php } ?>
	</div>
</div>