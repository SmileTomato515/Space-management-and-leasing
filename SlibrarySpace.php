<?php
header("Content-Type: text/html;charset=utf-8");	//utf-8

$link = mysqli_connect('localhost','root','kt051517','space');	//database connect
//mysql_connect('dbaddress','username','password','dbname')；

mysqli_query($link,'set names utf8');	//db coding

#if (mysqli_connect_errno()) {	//Determine if the database is successfully connected
#	echo "資料庫連接失敗"."<br>";
#	exit;
#}
#else{
#	echo "資料庫連接成功"."<br>";
#}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>圖書館空間租借</title>
</head>

<body>
	<form name="search" method="post" action="SlibrarySpace.php">
		查詢空間 : <select name="SChooseSpace">
			 <option value="null"></option>
			 <option value="rooma">閱讀室A</option>
			 <option value="roomb">閱讀室B</option>
			 <option value="roomc">閱讀室C</option>
			 <option value="movieroom">電影欣賞室</option>
		</select>
		<input type="submit" value="查詢">
	</form>
<form name="borrow" method="post" action="borrow.php">
	<?php
		if(isset($_POST["SChooseSpace"])){
			$sroom = $_POST["SChooseSpace"];
			if($sroom == 'rooma'){
				$roomname = "閱讀室A";
			}elseif($sroom == 'roomb'){
				$roomname = "閱讀室B";
			}elseif($sroom == 'roomc'){
				$roomname = "閱讀室C";
			}elseif($sroom == 'movieroom'){
				$roomname = "電影欣賞室";
			}
			$tresult = mysqli_query($link,"SELECT COUNT(StartTime) FROM space.".$sroom);
			$t = $tresult->fetch_array();
			echo "<table border='1' bordercolor='#0000FF'>";
				echo "<tr>";
				echo "<td colspan='3' align = 'center'>$roomname</td>";
				echo "</tr>"; 
				echo "<td>時段</td>";
				echo "<td>剩餘位置</td>";
				echo "<td>選取時段</td>";
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
							echo "<td  align = 'right'>$remained[0]</td>";
						}
					}
					if($remained[0]==0){
						echo "<td  align = 'center'><input type='checkbox' name='selecttime[]' disabled></td>";
						echo "</tr>";
					}else{
						echo "<td  align = 'center'><input type='checkbox' name='selecttime[]' value='$time[0]' name='$a'></td>";
						echo "</tr>";
					}
				}
			echo "</table>";
		}	
	?>
		姓名：<input type="text" name="UserName" required><br>
		學號：<input type="text" name="UserID" required><br>
    <input id="submit" type="submit" value="借用選取時段">
</form>
	
		<!--借用空間 : <select name="ChooseSpace">
			 <option value="null"></option>
			 <option value="RoomA">閱讀室A</option>
			 <option value="RoomB">閱讀室B</option>
			 <option value="RoomC">閱讀室C</option>
			 <option value="MovieRoom">電影欣賞室</option>
		</select><br>
		借用時段 :
		開始時間 <select name="ChooseStartTime">
			<option value="null"></option>
			<option value="4pm">16:00</option>
			<option value="5pm">17:00</option>
			<option value="6pm">18:00</option>
			<option value="7pm">19:00</option>
			<option value="8pm">20:00</option>
			<option value="9pm">21:00</option>
			<option value="10pm">22:00</option>
		</select>
		結束時間 <select name="ChooseEndTime">
			<option value="null"></option>
			<option value="4pm">16:00</option>
			<option value="5pm">17:00</option>
			<option value="6pm">18:00</option>
			<option value="7pm">19:00</option>
			<option value="8pm">20:00</option>
			<option value="9pm">21:00</option>
			<option value="10pm">22:00</option>
		</select>-->
	
</body>
</html>
