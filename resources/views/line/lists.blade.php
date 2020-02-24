<form>
<input type="text" name="linename" value="{{$query['linename']??''}}" placeholder="请输入所有线路">
    <button>搜索</button>
</form>
<script src='/js/jquery-3.3.1.min.js'></script>
<h1>所有线路</h1>

	<table class="table table-striped">
    <tr>
    	<td>id</td>
        <td>线路名称</td>
        <td>线路价格</td>
        <td>时间</td>
        <td>折扣比例</td>
        <td>操作</td>
    </tr>
    @foreach($data as $v)
    
    <tr>
    	<td name="id">{{$v->id}}</td>
        <td>{{$v->linename}}</td>
        <td>{{$v->lineprice}}</td>
        <td>{{date('Y-m-d ',$v->time)}}</td>
        <form action="{{url('/line/circuit/'.$v->id)}}" method='post'>
       	<ul id="tbustime">
       		<td><input type="hidden" name="" t="$v->id"></td>
       		<td><input type="text" name="discount"></td>
        	<td><input type="submit" name="" value="添加" id="removeLi"></td>

        <ul>
        </form>
    </tr>
    @endforeach
</table>

<h1>已添加线路</h1>
<table class="table table-striped">
    <tr>
    	<td>id</td>
        <td>线路名称</td>
        <td>线路价格</td>
        <td>时间</td>
        <td>折扣比例</td>
    </tr>
    @foreach($res as $v)
    
    <tr>
    	<td name="id">{{$v->id}}</td>
        <td>{{$v->linename}}</td>
        <td>{{$v->lineprice}}</td>
        <td>{{date('Y-m-d ',$v->time)}}</td>
         <td>{{$v->discount}}</td>
    </tr>
    @endforeach
</table>

<script type="text/javascript">
$(document).ready(function(){
    $('#removeLi').click(function(){
        $('#tbustime').find('td').each(function(){
            var t = $(this).attr('t');

                $(this).remove();

        });
    });
});
</script>
