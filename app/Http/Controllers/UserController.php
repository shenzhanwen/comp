<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    public function user()
    {
    	return view('user.user');
    }

    public function loginHandel()
    {
    	$name=request()->name;
    	$pwd=request()->pwd;
        $line = rand(10000,60000);
        $pwd=md5($pwd);
        $data = [
            'username'=>$name,
            'password'=>$pwd,
            'line'=>$line
        ];
        $data['time'] = time();
        $ass = DB::table('cs_user')->insert($data);
        if ($ass) {
            return (['code'=>1]);
        }else{
            return (['code'=>2]);
        } 
    }

    public function list()
    {
        $data=DB::table('cs_user')->get();
        return view('user.list',['data'=>$data]);
    }

    public function del($id)
    {
        $res = DB::table('cs_user')->where('id',$id)->delete();
        if($res){
           return redirect('user/list');
       }
    }

    public function edit($id)
    {
        $data = DB::table('cs_user')->where('id',$id)->first();
        return view('user.edit',['data'=>$data]);
    }

    public function update(Request $request,$id)
    {
        // $data = request()->except(['_token']);
        $username = request()->username;
        $password = request()->password;
        $res = md5($password);
        $data = [
            'username'=>$username,
            'password'=>$res
        ];
        $data = DB::table('cs_user')->where(['id'=>$id])->update($data);
        if($data){
            return redirect('user/list');
        }else{
            return redirect('user/list');
        }
    }

    public function checkout()
    {
        $username=\request()->username;
        if ($username) {
            $where['username']=$username;
            $count=Db::table('cs_user')->where($where)->count();
            return ['code'=>1,'count'=>$count];
        }
    }
}
