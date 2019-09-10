<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update</title>
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
	$sroom = 'rooma';
	$updateTime = $_POST["updateTime"];
	$updateRemainedSeat = $_POST["updateRemainedSeat"];
	mysqli_query($link, "UPDATE ".$sroom." SET RemainedSeat = '".$updateRemainedSeat."' WHERE StartTime = '".$updateTime."'");
	
	$message = "已更新".$updateTime.":00時段,座位數:".$updateRemainedSeat;
	echo "<script type='text/javascript'>alert('$message');
			parent.location.href='http://Library/administration2.php';</script>";
	?>

<body>
</body>
</html>