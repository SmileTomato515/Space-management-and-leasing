<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>New</title>
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
	$newTime = $_POST["newTime"];
	$newRemainedSeat = $_POST["newRemainedSeat"];
	mysqli_query($link, "INSERT INTO ".$sroom." (TimeID,StartTime, RemainedSeat) VALUES (0,$newTime,$newRemainedSeat)");

	//update TimeID
	$reID = mysqli_query($link, "SELECT MIN(StartTime) FROM rooma")->fetch_array();
	$newID = $reID[0];
	$TimeID = 1;
	for($id=1;$id<=24;$id++){
		$result = mysqli_query($link, "SELECT EXISTS( SELECT * FROM ".$sroom." WHERE StartTime = '".$newID."')")->fetch_array();
		if($result[0]==1){
			mysqli_query($link, "UPDATE ".$sroom." SET TimeID = '".$TimeID."' WHERE StartTime = '".$newID."'");
			$newID++;
			$TimeID++;
		}else{
			$newID++;
		}
	}
	
	$message = "已新增".$newTime.":00時段,座位數:".$newRemainedSeat;
	echo "<script type='text/javascript'>alert('$message');
			parent.location.href='http://Library/administration2.php';</script>";
	?>
<body>
</body>
</html>