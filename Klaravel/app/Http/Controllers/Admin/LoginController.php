<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Session,Validator,DB,Hash;

class LoginController extends Controller
{
    public function index(Request $request)
    {
	     $data = $request->old();
        return view("admin.login.index",compact('data'));
    }
	public function  logTodo(Request $request)
    {
	    //接收数据
		
		$data = $request->all();
		//验证码是否正确
		/*if(session('code') != $data['code'])
		{
		  return back()->with(['info_code'=>'验证码错误']);
		}*/
		//有效性验证
		   $this->validate($request,[
		     'username'=>'required',
		     'password'=>'required|between:6,15',
		    ],[
			  'username.required'=>'账号不能为空',
			  'password.required'=>'密码不能为空',
			  'password.between'=>'密码长度应为6-15位'
			]);
		
		//真是性验证
		$userRec = DB::table('think_admin_users')->where('username',$data['username'])->first();
		if(empty($userRec))
		{  
		   $request->flash();
		   return back()->with(['info_user'=>'账号不存在']);
		   
		}else if(!Hash::check($data['password'],$userRec->password)){
		  $request->flash();
		  return back()->with(['info_password'=>'密码错误']);
		}else
	      {
		     session(['userData' =>$userRec]);
		     return redirect('/Admin');
		  }
	   }
	   //退出登录
	   public function logout()
	   {
	      //销毁数据
		  Session::forget('userData');
		  return redirect('/Admin');
		 }
		  
	
	
	
	
	
	
	
	
	
	
	
    public function captcha()
    {
                //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();

        //把内容存入session
        Session::flash('code', $phrase);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }
	public function check($data)
	{
	 $rules = array(
	    'username'=>'required|unique:think_admin_users',
		'password'=>'required|between:6,15',
	    );
	 $messages = array(
			 'username.unique'=>'该用户不存在',
			 'password.between'=>'密码长度应在6-15位',
			 );
	 $validate=Validator::make($data,$rules,$messages);
	 return $validate;
	}

}
	
    
   
