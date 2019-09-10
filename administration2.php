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
<title>後臺管理</title>
</head>

<body>
	<form name="search" method="post" action="administration2.php">
		管理<select name="SChooseSpace">
			 <option value="null"></option>
			 <option value="rooma">閱讀室A</option>
			 <option value="roomb">閱讀室B</option>
			 <option value="roomc">閱讀室C</option>
			 <option value="movieroom">電影欣賞室</option>
		</select>
		<input type="submit" value="管理">
	</form>
	
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
				echo "<td colspan='2' align = 'center'>$roomname</td>";
				echo "</tr>"; 
				echo "<td>時段</td>";
				echo "<td>剩餘位置</td>";
				echo "</tr>"; 
				for($a=1;$a<=$t[0];$a++){
					echo "<tr>"	;
					for($b=0;$b<3;$b++){
						if($b == 0){
						$timeresult = mysqli_query($link, "SELECT StartTime FROM `rooma` WHERE TimeID='".$a."'");
						$time = $timeresult->fetch_array();
						echo "<td>$time[0]:00</td>";
						}elseif($b == 1){
							$remainedresult = mysqli_query($link, "SELECT RemainedSeat FROM `rooma` WHERE TimeID='".$a."'");
							$remained = $remainedresult->fetch_array();
							echo "<td align='right'>$remained[0]</td>";
							//echo "<td align='right' contenteditable='true'>$remained[0]</td>";
						}
					}
					echo "</tr>";
				}
			echo "</table>";
		}
	?>
	<form name="administer" method="post" action="update.php">
		選擇時段 : <select name="updateTime">
					<option value="null"></option>
					<?php 
						for($i=1;$i<=24;$i++){
							echo "<option value='$i'>$i:00</option>";
						}
					?>
				 </select>
		輸入座位 ：<input type="text" name="updateRemainedSeat" style="width:30px;">
		<button οnclick="update()"/>更新</button><br>
	</form>
	<form name="administer" method="post" action="new.php">
		新增時段 : <select name="newTime">
					<option value="null"></option>
					<?php 
						for($i=1;$i<=24;$i++){
							echo "<option value='$i'>$i:00</option>";
						}
					?>
				 </select>
		輸入座位 ：<input type="text" name="newRemainedSeat" style="width:30px;">
		<button οnclick="update()"/>新增</button><br>
	</form>
	<form name="administer" method="post" action="delete.php">
		刪除時段 : <select name="deleteTime">
					<option value="null"></option>
					<?php 
						for($i=1;$i<=24;$i++){
							echo "<option value='$i'>$i:00</option>";
						}
					?>
				 </select>
		<button οnclick="update()"/>刪除</button><br>
	</form>
</body>
</html>

<!--<input type='text' name='remainedseat' value='$remained[0]' style='width:55px;'>-->
