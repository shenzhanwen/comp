<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src='/js/jquery-3.3.1.min.js'></script>
</head>
<body>
	<form>
		<table>
			<tr>
				<td><input type="text" name="username" id='username'>用户账号</td>
			</tr>
			<tr>
				<td><input type="password" name="" id='pwd'>用户密码</td>
			</tr>
			<tr>
				<td><input type="submit" name="" id='sub'></td>
			</tr>
		</table>
	</form>
</body>
</html>
<script type="text/javascript">
    $("#username").blur(function(){
    // alert(111);
    var username = $(this).val();
        $.post(
        	"/user/checkout",
        	 {username:username},
        function(msg){
            if (msg.code == 1) {
            	if(msg.count>=1){
                 	alert('该账号已存在');
                 	return false;
            	}else{
            		alert('可以使用');
            	}
            } 
        });
  	});
	$('#sub').click(function(){
		var name=$("#username").val();
		var pwd=$("#pwd").val();
		$.post(
			"loginHandel",
			{name:name,pwd,pwd},
			function(msg){
				if(msg.code == 1){
					alert('添加成功');
					location.href="/user/list"
				}else{
					alert('添加失败');
				}
			}
		)
		return false;
	})
</script>