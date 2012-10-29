<?php
	require_once('database_connect.php');

	$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
	$one = filter_var($_POST['one'], FILTER_SANITIZE_NUMBER_INT);
	$two = filter_var($_POST['two'], FILTER_SANITIZE_NUMBER_INT);
	$three = filter_var($_POST['three'], FILTER_SANITIZE_NUMBER_INT);
	$four = filter_var($_POST['four'], FILTER_SANITIZE_NUMBER_INT);
	$five = filter_var($_POST['five'], FILTER_SANITIZE_NUMBER_INT);
	$six = filter_var($_POST['six'], FILTER_SANITIZE_NUMBER_INT);
	$seven = filter_var($_POST['seven'], FILTER_SANITIZE_NUMBER_INT);
	$eight = filter_var($_POST['eight'], FILTER_SANITIZE_NUMBER_INT);
	$nine = filter_var($_POST['nine'], FILTER_SANITIZE_NUMBER_INT);
	$ten = filter_var($_POST['ten'], FILTER_SANITIZE_NUMBER_INT);
	$ip = $_SERVER['REMOTE_ADDR'];
	$epoch = time();

	$query = "
		INSERT INTO results(name, one, two, three, four, five, six, seven, eight, nine, ten, ip, epoch)
		VALUES ('$name', $one, $two, $three, $four, $five, $six, $seven, $eight, $nine, $ten, '$ip', $epoch)";
	echo mysql_query($query);		
?>