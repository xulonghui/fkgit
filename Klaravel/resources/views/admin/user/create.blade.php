@include("admin.common.head")
<h2 style="margin-left:100px">添加用户</h2>
<form method="post" action="/Admin/user/store" style="margin-left:20px" >
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <p>账 号 :<input type="text" name="username"  value="">
        <span class='create_error'>@if(count($errors)>0)
        @foreach($errors->get('username')as $error)
        {{$error}}
        @endforeach
        @endif
	 {{session('user_info')}}
        </span>
     </p>
     <p>密 码 :<input type="password" name="password"  value="">{{session('info_password')}}
       <span class='create_error'> @if(count($errors)>0)
        @foreach($errors->get('password') as $error)
        {{$error}}
        @endforeach
        @endif
        </span>
    </p>
    <p>确 认 :<input type="password" name="repassword" value="">{{session('info_repassword')}}
       <span class='create_error'> @if(count($errors)>0)
        @foreach($errors->get('repassword') as $error)
        {{$error}}
        @endforeach
        @endif
        </span>
    </p>
    <p>性 别 :<input type="radio" name="sex" value="m" checked  id='nan' >男 , <input type="radio" name="sex" value="w" id='nv'>女</p>
    <p>昵 称 :<input type="text" name="nickname" id="nickname" value="">{{session('info_nickname')}}
       <span class='create_error'> @if(count($errors)>0)
        @foreach($errors->get('nickname') as $error)
        {{$error}}
        @endforeach
        @endif
        </span>
    </p>
    <p><input type="submit" value="保存" class = "btn btn-inverse btn-large"></p>
</form>

<!-- <div class="f1 errs">
    {{session("info")}}                             
</div>
-->

@include("admin.common.foot")