<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;

class CommonController extends Controller
{
   public function __construct()
   {
       //验证登录状态 如果没有登录则跳转到登录页
       if(!Session::has("userData"))
       {
         //  return redirect("/login"); 这方法不行  必须用原生的header才行
           header("Location:/Admin/login");
           exit;
       }
   }
    
}