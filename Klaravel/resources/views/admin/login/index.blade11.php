<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>后台系统登录</title>
        <link href="/css/login/login.css" rel="stylesheet" >
        <script type="text/javascript" src="/js/admin/login/jquery-1.8.2.min.js"></script>
		<!--引入wbox弹出层插件-->
		<script type="text/javascript" src="{{asset('/plugins/wbox/jquery1.4.2.')}}"></script> 
        <script type="text/javascript" src="{{asset('/plugins/wbox/mapapi.js')}}"></script> 
        <script type="text/javascript" src="{{asset('/plugins/wbox/wbox.js')}}"></script> 
        <link rel="stylesheet" type="text/css" href="{{asset('/plugins/wbox/wbox/wbox.css')}}" />
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
    </head>

    <body>
        <div class="login-box">
            <h1>凡客系统后台登录</h1>
            <form method="post" action="/logTodo" name='login'>
                <div class="name">
                    <label>账号：</label>
					<input type='hidden' name='_token' value='{{csrf_token()}}' />
                    <input type="text" name="username" id="" tabindex="1" autocomplete="off" />
                </div>
                <div class="password">
                    <label>密码：</label>
                    <input type="password" name="password" maxlength="16" id="" tabindex="2"/>
                </div>
                <div class="code">
                    <label>验证码：</label>
                    <input type="text" name="code" maxlength="5" id="code" tabindex="3"/>
                    <div class="codeImg">
                        <img src="{{url('/captcha').'/'.rand()}}"onclick="this.src=this.src.replace(/\d+$/,'')+Math.random();" />
                    </div>
                </div>
                <div class="remember">

                    <input type="checkbox" id="remember" tabindex="4">
                    <label>记住密码</label>
                </div>
                <div class="login">
                    <button type="botten" tabindex="5" id='btn'>登录</button>
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
