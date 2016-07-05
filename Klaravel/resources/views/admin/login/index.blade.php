<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>后台系统登录</title>
        <link href="/css/login/login.css" rel="stylesheet" >
        <script type="text/javascript" src="/js/admin/login/jquery-1.8.2.min.js"></script>
		<!--引入wbox弹出层插件-->
        <script type="text/javascript">
            $(function () {
                $(".screenbg ul li").each(function () {
                    $(this).css("opacity", "0");
                });
                $(".screenbg ul li:first").css("opacity", "1");
                var index = 0;
                var t;
                var li = $(".screenbg ul li");
                var number = li.size();
                function change(index) {
                    li.css("visibility", "visible");
                    li.eq(index).siblings().animate({opacity: 0}, 3000);
                    li.eq(index).animate({opacity: 1}, 3000);
                }
                function show() {
                    index = index + 1;
                    if (index <= number - 1) {
                        change(index);
                    } else {
                        index = 0;
                        change(index);
                    }
                }
                t = setInterval(show, 8000);
                //根据窗口宽度生成图片宽度
                var width = $(window).width();
                $(".screenbg ul img").css("width", width + "px");
            });
        </script>
		<style>
		     .style_span{
			  padding:0px;
			  margin:0;
			  position:absolute;
              right:570px;
			  font:13px/20px 微软雅黑;
			  color:red;
			  width:200px;
			  height:20px;
			 }
		</style>
    </head>

    <body>
        <div class="login-box">
            <h1>凡客系统后台登录</h1>
            <form method="post" action="/Admin/login/logTodo" name='login'>
                <div class="name">
                    <label>账号：</label>
					<input type='hidden' name='_token' value='{{$data["
					_token"] or csrf_token()}}' />
                    <input type="text" name="username" id="username" tabindex="1" autocomplete="off" value="{{$data['username'] or ''}}" />
                </div>
                <div class="password">
					<span class='style_span'id='username_span'>
					@if(count($errors)>0)
					   @foreach($errors->get('username')as $error)
					       {{$error}}
						@endforeach
				    @endif
					{{session('info_user')}}
					</span>
                    <label>密码：</label>
                    <input type="password" name="password" maxlength="16" id="password" tabindex="2" value="{{$data['password'] or ''}}"/>
                </div>
                <div class="code">
				    <span class='style_span' id='password_span'>
					 @if(count($errors)>0)
					   @foreach($errors->get('password')as $error)
					       {{$error}}
						@endforeach
				     @endif
					 {{session('info_password')}}
					</span>
                    <label>验证码：</label>
                    <input type="text" name="code" maxlength="5" id="code" tabindex="3" value="{{$data['code'] or ''}}"/>
                    <div class="codeImg">
                        <img src="{{url('/Admin/login/captcha').'/'.rand()}}"onclick="this.src=this.src.replace(/\d+$/,'')+Math.random();" />
                    </div>
                </div>
                <div class="remember">
				    <span class='style_span' id='code_span'>{{session('info_code')}}</span>
                    <input type="checkbox" id="remember" tabindex="4">
                    <label><a href=''>忘记密码</a></label>
                </div>
                <div class="login">
                    <button type="submit" tabindex="5" onclick=''>登录</button>
                </div>
            </form>
        </div>        
        <div class="screenbg">
            <ul>
                <li><a href="javascript:;"><img src="/images/login/0.jpg"></a></li>
                <li><a href="javascript:;"><img src="/images/login/1.jpg"></a></li>
                <li><a href="javascript:;"><img src="/images/login/2.jpg"></a></li>
            </ul>
        </div>       
        <div class="bottom">2016-2017 兄弟连lamp143 敢死队 ©版权所有</div>
         <script src="{{url('/js/admin/login_index.js')}}"></script>
	</body>
</html>
