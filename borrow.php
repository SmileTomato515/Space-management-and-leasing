
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Borrow</title>
</head>
	<?php
	$link = mysqli_connect('localhost','root','kt051517','space');	//database connect
	//mysql_connect('dbaddress','username','password','dbname')；

	mysqli_query($link,'set names utf8');	//db coding
/*
	if (mysqli_connect_errno()) {	//Determine if the database is successfully connected
		echo "資料庫連接失敗"."<br>";
		exit;
	}
	else{
		echo "資料庫連接成功"."<br>";
	}*/
	
	$selecttime=$_POST["selecttime"];
	$numberOfTimes=count($selecttime);
	for($i=0;$i<$numberOfTimes;$i++){
		$searchRemainedSeat = mysqli_query($link, "SELECT RemainedSeat FROM `rooma` WHERE StartTime = '".$selecttime[$i]."'");
		$remainedSeat = $searchRemainedSeat->fetch_array();
		$updateSeat = $remainedSeat[0]-1;
		mysqli_query($link, "UPDATE rooma SET RemainedSeat = '".$updateSeat."' WHERE StartTime = '".$selecttime[$i]."'");
	}
	$times = "";
	for($j=0;$j<$numberOfTimes;$j++){
		$times = $times.(string)$selecttime[$j].":00  ";
	}
	$message = "您已劃位".$times."時段";
	echo "<script type='text/javascript'>alert('$message');
			parent.location.href='http://Library/SlibrarySpace.php';</script>";
	?>
<body>
</body>
</html>