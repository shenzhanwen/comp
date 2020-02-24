<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LineController extends Controller
{
    public function line()
    {
    	return view("line.line");
    }

    public function insert()
    {
    	// $data = request()->except(['_token']);
    	$linename = request()->linename;
    	$lineprice = request()->lineprice;
        $data = [
            'linename'=>$linename,
            'lineprice'=>$lineprice
        ];
        $data['time'] = time();
        $ass = DB::table('cs_line')->insert($data);
        if ($ass) {
            return (['code'=>1]);
        }else{
            return (['code'=>2]);
        }  
    }

    public function list()
    {
    	$data=DB::table('cs_line')->get();
        return view('line.list',['data'=>$data]);
    }

    public function lists()
    {
    	$query = request()->all();
        $where =[];
    	if($query['linename']??''){
            $where[]=['linename','like',"%$query[linename]%"];
        }
    	$data = DB::table('cs_line')->where($where)->get();
    	$res=DB::table('cs_line')
            ->join('cs_discount','cs_line.id','=','cs_discount.id')
            ->get();
       
        return view('line.lists',['data'=>$data,'res'=>$res,'query'=>$query]);
    }

    public function del($id)
    {
        $res = DB::table('cs_line')->where('id',$id)->delete();
        if($res){
           return redirect('line/list');
       }
    }

    public function edit($id)
    {
        $data = DB::table('cs_line')->where('id',$id)->first();
        return view('line.edit',['data'=>$data]);
    }

    public function update(Request $request,$id)
    {
        $data = request()->except(['_token']);
        $data = DB::table('cs_line')->where(['id'=>$id])->update($data);
        if($data){
            return redirect('line/list');
        }else{
            return redirect('line/list');
        }
    }

    public function checkout()
    {
        $linename=\request()->linename;
        if ($linename) {
            $where['linename']=$linename;
            $count=Db::table('cs_line')->where($where)->count();
            return ['code'=>1,'count'=>$count];
        }
    }

    public function circuit($id)
    {
    	$id = request()->id;
    	$discount = request()->discount;
    	$data = [
            'id'=>$id,
            'discount'=>$discount
        ];
    	$ass = DB::table('cs_discount')->insert($data);
    	if($ass){
            return redirect('line/lists');
        }
    }
}
