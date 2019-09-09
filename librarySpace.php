<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>圖書館空間租借</title>
</head>

<body>
	<form name="search" method="post" action="SLibrarySpace.php">
		查詢空間 : <select name="SChooseSpace">
			 <option value="null"></option>
			 <option value="rooma">閱讀室A</option>
			 <option value="roomb">閱讀室B</option>
			 <option value="roomc">閱讀室C</option>
			 <option value="movieroom">電影欣賞室</option>
		</select>
		<input type="submit" value="查詢">
		<!--查詢時間(時段) :
		<select name="SChooseStartTime">
			<option value="null"></option>
			<option value="16">16:00</option>
			<option value="17">17:00</option>
			<option value="18">18:00</option>
			<option value="19">19:00</option>
			<option value="20">20:00</option>
			<option value="21">21:00</option>
			<option value="22">22:00</option>
		</select><br>-->
	</form>
	<form>
		<!--姓名：<input type="text" name="UserName"><br>
		學號：<input type="text" name="UserID"><br>
		借用空間 : <select name="ChooseSpace">
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
	</form>
</body>
</html>
