<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src='/js/jquery-3.3.1.min.js'></script>
</head>
<body>
	<form action="{{'/line/update/'.$data->id}}" method='post'>
	<input type="hidden" name="_token" value="{{csrf_token()}}">
		<table>
			<tr>
				<td><input type="text" name="linename" value='{{$data->linename}}'>线路名称</td>
			</tr>
			<tr>
				<td><input type="text" name="lineprice" value='{{$data->lineprice}}'>线路价格</td>
			</tr>
			<tr>
				<td><input type="submit" name="" id='sub' value="修改"></td>
			</tr>
		</table>
	</form>
</body>
</html>
