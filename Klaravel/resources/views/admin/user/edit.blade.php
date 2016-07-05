@include("admin.common.head")
<h2 style="margin-left:100px">修改用户</h2>
<form method="post" action="/Admin/user/{{$userRec->id}}" style="margin-left:20px" >
    <input type="hidden" name="_token" value="{{csrf_token()}}">
	<input type='hidden' name='_method' value='PUT'>
    <p>账 号 :<input type="text" name="username"  value="{{$userRec->username}}" disabled>
        <span class='create_error'>@if(count($errors)>0)
        @foreach($errors->get('username')as $error)
        {{$error}}
        @endforeach
        @endif
        </span>
     </p>
     <p>密 码 :<input type="password" name="password"  value="">
       <span class='create_error'> @if(count($errors)>0)
        @foreach($errors->get('password') as $error)
        {{$error}}
        @endforeach
        @endif
        </span>
		(*置空则不修改*)
    </p>
    <p>确 认 :<input type="password" name="repassword" value="">
       <span class='create_error'> @if(count($errors)>0)
        @foreach($errors->get('repassword') as $error)
        {{$error}}
        @endforeach
        @endif
        </span>
		(*和密码一致*)
    </p>
    <p>性 别 :<input type="radio" name="sex" value="m" checked  @if($userRec->sex == "m") checked @endif >男 , <input type="radio" name="sex" value="w" @if($userRec->sex == "w") checked @endif>女</p>
    <p>昵 称 :<input type="text" name="nickname" id="nickname" value="{{$userRec->nickname}}">
       <span class='create_error'> @if(count($errors)>0)
        @foreach($errors->get('nickname') as $error)
        {{$error}}
        @endforeach
        @endif
        </span>
    </p>
    <p><input type="submit" value="修改" class = "btn btn-inverse btn-large"></p>
</form>

<!-- <div class="f1 errs">
    {{session("info")}}                             
</div>
-->

@include("admin.common.foot")