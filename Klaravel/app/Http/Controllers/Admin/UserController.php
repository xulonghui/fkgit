<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Session,Hash;

class UserController extends CommonController
{
    public function index()
	{
	     //查询用户信息
		 $users = DB::table('think_admin_users')->orderBy('id','desc')->paginate(1000);
		 /* foreach($users as $a){
			 dd($a);
		 } */
		 /* $users = DB::table("user")
                ->where("uname", "LIKE", "%" . $request->get("keyword") . "%")
                ->orWhere("nickname", "LIKE", "%" . $request->get("keyword") . "%")
                ->orderBy("uid", "DESC")
                ->paginate(8);*/
		 
		 //显示模板
		 return view('admin.user.index',['users'=>$users]);
		
	}
    public function avartar(Request $request)
	 {
	//接受文件并转存
	   if(!$request->hasFile('Filedata'))
	     {
		   return response()->json(['status'=>0,'info'=>'没有文件提交']);
		 }
	    $file = $request->file("Filedata");
		//dd($file);
		//重组文件名
		$suffix =$file->getClientOriginalExtension();
		$rename= date('YmdHis').rand(1000,9999).'.'.$suffix;
		//转存文件
		$file->move('./upload/avartar/',$rename);
	   //将存储的文件信息 写入数据库
	    DB::table('think_admin_users')->where('id',$request->get('id'))->update(['avartar' =>'/upload/avartar/'.$rename]);
		$data = Session::pull('userData');
		$data->avartar = '/upload/avartar/'.$rename;
		Session::put('userData',$data);
		return response()->json(array('status'=>1,'info'=>'/upload/avartar/'.$rename));
	   //返回结果
	}
	public function create(Request $request)
	{
		return view('admin.user.create');
	}
	public function store(Request $request)
	{
		//执行数据验证
		$this->validate($request,[
		    'username'=>'required|unique:think_admin_users',
			'password'=>'required|between:6,15',
			'repassword'=>'required|same:password',
			'nickname'=>'required',
			],[
			 'username.required'=>'*账号不能为空*',
			 'username.unique'=>'*账号已被占用*',
			 'password.required'=>'*密码不能为空*',
			 'password.between'=>'*密码长度应为6-15位*',
			 'repassword.required'=>'*确认密码必须填写*',
			 'repassword.same'=>'*两次密码输入不一致*',
			 'nickname.required'=>'*昵称不能为空*'
			 ]);
		//提取出数据并重组
		$data = $request->except('_token','repassword');
		$data['password']=Hash::make($data['password']);
		$data['addtime'] = time();
		//执行数据创建
		if(false !==$innerID = DB::table('think_admin_users')->insertGetId($data)){
			 return redirect('/Admin/user');
		}else{
			return back()->with(['user_info'=>'*添加用户失败*']);
		}
	}
	public function edit($id){
		//查询该用户的记录
		$userRec = DB::table('think_admin_users')->where('id',$id)->first();
		//显示模板
		return view('admin.user.edit',compact('userRec'));
		
	}
	public function update(Request $request,$id){
		//验证数据的有效性
		$this->validate($request,[
		      "password" => "between:6,15",
              "repassword" => "same:password",
              "nickname" => "required",
                ], [
              "password.between" => "密码长度应为6-15位",
              "repassword.same" => "两次密码输入不一致",
               "nickname.required" => "昵称不能为空"
			]);
	    //修改用户的数据
		$data = $request->except('_token','_method','repassword');
		$data['addtime'] = time();
		//对密码重新构造
		if(!empty($data['password'])){
			 $data['password'] = Hash::make($data['password']);
		}else{
			unset($data['password']);
		}
		if(false !=$affectedRows = DB::table("think_admin_users")->where('id',$id)->update($data)){
			return redirect('/Admin/user');
		}	
	}
	public function destroy($id){
		//删除该用户记录
		if(false !== DB::table("think_admin_users")->where('id',$id)->delete()){
			return redirect('/tips')->with(['info' =>'操作成功','url'=>'/Admin/user']);
	  }else{
		  return redirect('/tips')->with(['info'=>'操作失败','url'=>'/Admin/user']);
	}
}
}
