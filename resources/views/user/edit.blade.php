<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src='/js/jquery-3.3.1.min.js'></script>
</head>
<body>
	<form action="{{'/user/update/'.$data->id}}" method='post'>
	<input type="hidden" name="_token" value="{{csrf_token()}}">
		<table>
			<tr>
				<td><input type="text" name="username" value='{{$data->username}}'>用户账号</td>
			</tr>
			<tr>
				<td><input type="password" name="password" value='{{$data->password}}'>用户密码</td>
			</tr>
			<tr>
				<td><input type="submit" name="" id='sub' value="修改"></td>
			</tr>
		</table>
	</form>
</body>
</html>
