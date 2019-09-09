<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>後臺管理</title>
	<script src="administration.js"></script>
</head>

<body>
	<form name="administer" method="post" action="">
		新增教室 ：<input type="text" name="newClass" style="width:100px;" value="教室名稱"><br> 
		座位數 ：<input type="text" name="seat" style="width:30px;"> 
		<button οnclick="newclass()"/>新增</button><br><br>
		選擇教室 ：<select name="SChooseSpace">
			 		<option value="null"></option>
			 		<option value="rooma">閱讀室A</option>
					<option value="roomb">閱讀室B</option>
					<option value="roomc">閱讀室C</option>
					<option value="movieroom">電影欣賞室</option>
				 </select>
		選擇時段 : <select name="SChooseStartTime">
					<option value="null"></option>
					<option value="16">16:00</option>
					<option value="17">17:00</option>
					<option value="18">18:00</option>
					<option value="19">19:00</option>
					<option value="20">20:00</option>
					<option value="21">21:00</option>
					<option value="22">22:00</option>
				 </select><br>
		修改剩餘座位 ：<input type="text" name="remainedseat" style="width:30px;">
		<button οnclick="update()"/>更新</button><br>
	</form>
</body>
</html>
