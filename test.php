<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="icon" type="image/png" href="/dot.png">
	<link href='http://fonts.googleapis.com/css?family=Paytone+One' rel='stylesheet' type='text/css'>
	<title>Dots Experiment</title>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript">
	var numbers;
	var timer;
		$(document).ready(function(){
			numbers = new Array();
			$("#number_guess").focus();
			$("#number_guess").val("");
			setTimeout(startTime, 1000);
		});
		function startTime(){
			timer = setInterval(reduceTime, 100);
		}
		function reduceTime(){
			var time = $("#time").text();
			if(time  > 0){
				var new_time = time - 0.1;
				$("#time").text(new_time.toFixed(1));
			}else{
				nextRound();
			}
		}
		function nextRound(){
			if($("#number_guess").val() != "")
				numbers.push($("#number_guess").val());
			else
				numbers.push(0);
			if($("#position").text() < 10){
				var pos = parseInt($("#position").text());
				$("#position").text(pos + 1);
				nextImage();
				$("#time").text("6.0");
				$("#number_guess").val("");
				$("#number_guess").focus();
			}else{
				timer = clearInterval(timer);
				for(var i=0; i< 10; i++){
				//	numbers[i] = 4;
				}
				var query_string = "name=<?php echo $_GET['name'];?>&one="+numbers[0]+"&two="+numbers[1]+"&three="+numbers[2]+"&four="+numbers[3]+"&five="+numbers[4]+"&six="+numbers[5]+"&seven="+numbers[6]+"&eight="+numbers[7]+"&nine="+numbers[8]+"&ten="+numbers[9];
				$.ajax({  
	                type: "POST", 
					url: '/submit_data.php', 
					data: query_string,
	                success: function(data){
	                			//alert("query: " +  query_string + "\ndata: " + data);
	                			window.location = "/results.php";
							}
           		}); 
			}

		}
		function nextImage(){
			var current = $("#dots_image").attr("src");
			current = current.match(/\d{1,2}/g);
			var next = parseInt(current[0]) + 1;
			$("#dots_image").attr("src", "images/" + next + ".png");
		}
	</script>
</head>
<body>
	<div id="centered" style="height:440px !important;">
		<div id="title-holster">
			<div id="title-desc">You are taking part in the</div>
			<div id="title">D<img id="dot" width="49" height="48" src="dot.png"/>TS Experiment</div>
		</div>
		<div id="test">
			<div id="column0">
				<img id="dots_image" src="images/1.png" width="560" height="300"/>
			</div>
			<div id="column1">
				<div style="padding:5px 0px 0px 10px;">round</div>
				<div id="position-holster">
					<div id="position" class="buttony">1</div>
					<div id="total" class="buttony">10</div>
				</div>
				<div style="background:#DDD;">
					<div style="padding:10px 2px 2px 10px;">time left</div>
					<div id="time">
						6.0
					</div>
				</div>
				<div style="padding:10px 0px 0px 10px; margin-left:7px;">number of dots</div>
				<input id="number_guess" type="text" maxlength="2"/>

			</div>
		</div>
	</div>
</body>
</html>