<a href="{{url('/user/user')}}">点击添加</a>
<table class="table table-striped">
    <tr>
        <td>用户账号</td>
        <td>用户密码</td>
        <td>折扣线路</td>
        <td>时间</td>
        <td>操作</td>
    </tr>
    @foreach($data as $v)
    <tr>
        <td>{{$v->username}}</td>
        <td>{{$v->password}}</td>
        <td><a href="/line/lists">{{$v->line}}</a></td>
        <td>{{date('Y-m-d ',$v->time)}}</td>
        <td><a href="{{url('/user/del',['id'=>$v->id])}}">删除</a></td>
        <td><a href="{{url('/user/edit',['id'=>$v->id])}}">编辑</a></td>
    </tr>
    @endforeach
</table>
