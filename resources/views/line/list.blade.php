<a href="{{url('/line/line')}}">点击添加</a>
<table class="table table-striped">
    <tr>
        <td>线路名称</td>
        <td>线路价格</td>
        <td>时间</td>
        <td>操作</td>
    </tr>
    @foreach($data as $v)
    <tr>
        <td>{{$v->linename}}</td>
        <td>{{$v->lineprice}}</td>
        <td>{{date('Y-m-d ',$v->time)}}</td>
        <td><a href="{{url('/line/del',['id'=>$v->id])}}">删除</a></td>
        <td><a href="{{url('/line/edit',['id'=>$v->id])}}">编辑</a></td>
    </tr>
    @endforeach
</table>
