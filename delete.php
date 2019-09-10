<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Delete</title>
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
	$deleteTime = $_POST["deleteTime"];
	mysqli_query($link, "DELETE FROM ".$sroom." WHERE StartTime = '".$deleteTime."'");

	//update TimeID
	$reID = mysqli_query($link, "SELECT MIN(StartTime) FROM rooma")->fetch_array();
	$newID = $reID[0];
	$TimeID = 1;
	$countTime = mysqli_query($link,"SELECT COUNT(StartTime) FROM space.".$sroom)->fetch_array();
	for($id=1;$id<=$countTime;$id++){
		$result = mysqli_query($link, "SELECT EXISTS( SELECT * FROM ".$sroom." WHERE StartTime = '".$newID."')")->fetch_array();
		if($result[0]==1){
			mysqli_query($link, "UPDATE ".$sroom." SET TimeID = '".$TimeID."' WHERE StartTime = '".$newID."'");
			$newID++;
			$TimeID++;
		}else{
			$newID++;
		}
	}
	
	$message = "已刪除".$deleteTime.":00時段";
	echo "<script type='text/javascript'>alert('$message');
			parent.location.href='http://Library/administration2.php';</script>";
	?>
<body>
</body>
</html>