<?php
	$server_name = "";
	$table_name = "results"
	$database = "";
	$username = "";
	$password = "";
	$mysql_connection = mysql_connect($server_name, $username, $password);
	mysql_select_db($database, $mysql_connection);
?>