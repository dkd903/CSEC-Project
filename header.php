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
		<a style="text-decoration: none;" href="http://<?=$site?>"><span style="font-size: 25px;">Amazon.Two</span></a>
		<br />
		<em>e-Store on your Phone</em>
		<br />
		<br />
		<?php if (isset($_COOKIE["email"])) { ?> 
			<span style="font-size: 12px;">Hi, <a href="user.php"><?= $_COOKIE["email"] ?></a>! <a href="logout.php">Logout</a></span>
		<?php } ?>
	</div>
</div>