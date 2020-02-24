<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src='/js/jquery-3.3.1.min.js'></script>
</head>
<body>
	<!--  <form action="{{url('/line/insert')}}" method='post'> -->
		<form>
		<table>
			<tr>
				<td><input type="text" name="linename" id='linename'>线路名称</td>
			</tr>
			<tr>
				<td><input type="text" name="lineprice" id='lineprice'>线路价格</td>
			</tr>
			<tr>
				<td><input type="submit" name="" id='sub'></td>
			</tr>
		</table>
	</form>
</body>
</html>
<script type="text/javascript">

            $("#linename").blur(function(){
                // alert(111);
                var linename = $(this).val();
                    $.post(
                    	"/line/checkout",
                    	 {linename:linename},
                    function(msg){
                        if (msg.code == 1) {
                        	if(msg.count>=1){
                             	alert('该线路已存在');
                        	}else{
                        		alert('可以使用');
                        	}
                        } 
                    });
              	});
                
            
	$('#sub').click(function(){
		var linename=$("#linename").val();
		var lineprice=$("#lineprice").val();
		$.post(
			"insert",
			{linename:linename,lineprice,lineprice},
			function(msg){
				if(msg.code == 1){
					alert('添加成功');
					location.href="/line/list"
				}else{
					alert('添加失败');
				}
			}
		)
            	return false;
            	});



</script>