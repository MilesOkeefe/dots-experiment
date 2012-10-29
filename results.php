<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php 
	require_once('database_connect.php');

	$ip = $_SERVER['REMOTE_ADDR'];
	$query="SELECT * FROM `$table_name` WHERE `ip`='$ip' ORDER BY epoch DESC";
	$result = mysql_query($query);
	$guessed = mysql_fetch_row($result);

	$average = array();
	$names = array('one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten');
	for($i=0; $i<10; $i++){
		$query='SELECT avg(' . $names[$i] . ') FROM $table_name';
		$result = mysql_query($query);
		$row= mysql_fetch_row($result);
		array_push($average, $row[0]);
	}

	$query="SELECT COUNT(name) FROM $table_name";
	$result = mysql_query($query);
	$row = mysql_fetch_row($result);
	$num = $row[0];
?>
<head>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="icon" type="image/png" href="/dot.png">
	<link href='http://fonts.googleapis.com/css?family=Paytone+One' rel='stylesheet' type='text/css'>
	<title>Dots Experiment</title>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script language="javascript" type="text/javascript" src="flot/jquery.flot.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#back").click(function(){
				window.location = "/";
			});
			$(function (){
				var guessed = {
					color: "black",
			   		label: "Your Answers",
			   		data:[ <?php echo '[1,'.$guessed[1].'], [2,'.$guessed[2].'], [3,'.$guessed[3].'], [4,'.$guessed[4].'], [5,'.$guessed[5].'], [6,'.$guessed[6].'], [7,'.$guessed[7].'], [8,'.$guessed[8].'], [9,'.$guessed[9].'], [10,'.$guessed[10].']]';?>,
			   		points: { show: true },
			   		lines: {show:true}
			   };
			   var average = {
					color: "#CCCCCC",
			   		label: "Average Answers",
			   		data:[ <?php echo '[1,'.$average[0].'], [2,'.$average[1].'], [3,'.$average[2].'], [4,'.$average[3].'], [5,'.$average[4].'], [6,'.$average[5].'], [7,'.$average[6].'], [8,'.$average[7].'], [9,'.$average[8].'], [10,'.$average[9].']]';?>,
			   		points: { show: true },
			   		lines: {show:true}
			   };
			  	var correct = {
			  		color: "#96c2f8", 
			   		label: "The Correct Answers",
			   		data:[[1, 7], [2, 6], [3, 10], [4, 8], [5, 9], [6, 7], [7, 7], [8, 9], [9, 8], [10, 10]],
			   		lines: {show:true, fill:true}
			   };
			   var options = {
				        legend: { 
				        	sorted: "ascending"
				        }
				};
			    $.plot($("#graph"), [correct, average, guessed], options);
			});
		});
	</script>

</head>
<body>
	<div id="centered" style="height:650px !important;">
		<div id="title-holster">
			<div id="title-desc">You took part in the</div>
			<div id="title">D<img id="dot" width="49" height="48" src="dot.png"/>TS Experiment</div>
		</div>
		<div id="content">
			<p> Thank you for participating in the dots experiment.<br> Here are the results:
			</p>
			<div id="graph-wrapper">
				<div id="graph"></div>
			</div>
			<p>
				Only <?php echo $num;?> people have taken this test, so please share <a href="http://dots.milesokeefe.com/">a link to this experiment</a> with others, to contribute to the dataset. I totally <s>will</s> won't sell your information to dot advertisers.
			</p>
			<div id="back" class="button">Back to Home</div>
		</div>
	</div>
	<br>
</body>
</html>