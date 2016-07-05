document.login.onsubmit = function(){
     //获取用户输入值
	 var username =this.username.value;
	 var password = this.password.value;
	 var code = this.code.value;
	 //判断值是否符合要求
	 var message = [];
	 if(username.match(/^\s*$/)){
	      message['username']= '账号没填写!';
		  
	   }else{
	   message['username'] ='';
	   }
	 if(password.length<6 || password.length>15){
	   message['password']= "密码长度应为6-15位";
	  }else{
	     message['password']='';
	  }
	 if(code.length !=5){
	     message['code']= '验证码不合法';
	 }else{
      	  message['code']='';
	 }
	 //输出提示信息
	 var flag = true;
	 for(var key in message){
       if(message[key]) flag = false;
	   var span =key+'_span';
	   document.getElementById(span).innerHTML = message[key];
	   }	 
	 return flag;
 }
 /*// $(function(){
       // //给登录按钮绑定一个数据经过事件 事件处理程序中绑定一个wbox弹出层
	   // $('#btn').mouseover(function (){
	       // //首先获取弹出层内容 及表单验证的结果
		   // var username=$('input[name=username]').val();
		   // var password=$('input[name=password]').val();
		   // var code=$('input[name=code]').val();
		   // var message = '';
		   // if(username.match(/^\s*$/)){
		     // message += "<li>账号为填写</li>";
			 // }
		   // if(password.length <6 || password.length>15){
		      // message +='<li>密码长度应为6-15位</li>';
			  // }
		   // if(code.length !=5){
		      // message += '<li>验证码输入不合法</li>';
			  // }
	  // if(message !=""){
	      // //绑定弹出层 点击后显示
		  // $(this).wBox({
		          // title:'错误提示',
				  // html:'<ul style="width:300px;height=80px;font:13px/24px 微软雅黑;color:red">'+message,
				  // opacity:0,
				  // });
			// }else {
			    // //绑击点击事件
		       // $(this).click(function (){
			        // document.login.submit();
				// });
		    // }
	   // });
// })*/