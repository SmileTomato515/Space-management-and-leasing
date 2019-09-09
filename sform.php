<?php
header("Content-Type: text/html;charset=utf-8");	//utf-8

$link = mysqli_connect('localhost','root','kt051517','space');	//database connect
//mysql_connect('dbaddress','username','password','dbname')；

mysqli_query($link,'set names utf8');	//db coding

if (mysqli_connect_errno()) {	//Determine if the database is successfully connected
	echo "資料庫連接失敗"."<br>";
	exit;
}
else{
	echo "資料庫連接成功"."<br>";
}
		$sroom = $_POST["SChooseSpace"];
		echo($sroom);
		$tresult = mysqli_query($link,"SELECT COUNT(StartTime) FROM space.".$sroom);
		$t = $tresult->fetch_array();
		echo "<table border='1' bordercolor='#0000FF'>";
			echo "<tr>";
			echo "<td colspan='2' align = 'center'>空間名稱</td>";
			echo "</tr>"; 
			echo "<td>時段</td>";
			echo "<td>剩餘位置</td>";
			echo "</tr>"; 
			for($a=1;$a<=$t[0];$a++){
				echo "<tr>"	;
				for($b=0;$b<2;$b++){
					if($b == 0){
						$timeresult = mysqli_query($link, "SELECT StartTime FROM `rooma` WHERE TimeID='".$a."'");
						$time = $timeresult->fetch_array();
						echo "<td>$time[0]:00</td>";
					}elseif($b == 1){
						$remainedresult = mysqli_query($link, "SELECT RemainedSeat FROM `rooma` WHERE TimeID='".$a."'");
						$remained = $remainedresult->fetch_array();
						echo "<td>$remained[0]</td>";
					}
					
				}
				echo "</tr>";
			}
		echo "</table>"
	?>