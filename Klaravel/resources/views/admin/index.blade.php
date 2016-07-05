             @include('admin.common.head')
                  <div class="span12">
				  <script src="/plugins/uploadify/jquery.uploadify.min.js"></script>
	              <link type='text/css' rel='stylesheet' href="{{asset('/plugins/uploadify/uploadify.css')}}">
                 <img src="{{Session::get('userData')->avartar}}" width=160px class='fl' id='im' style='margin-bottom:7px'>
				 <ul class='fl'>
					 <li>账号:{{Session::get('userData')->username}}</li>
					 <li>昵称:{{Session::get('userData')->nickname}}</li>
					 <li>性别:{{Session::get('userData')->sex}}</li>
					 <li>状态:{{Session::get('userData')->state}}</li>
					 <li>创建:{{date('y:m:d H:i:s',Session::get('userData')->addtime)}}</li>
				 </ul>
				 <form name='fm' class='clear'>
				    <input type='hidden' name='_token' value='{{csrf_token()}}'>
					<input type='hidden'name='id' value="{{Session::get('userData')->id}}">
				    <input type='file' name='avartar' id='avartar'>
			     </form>
		<script src ='/js/admin/index.js'></script>
		@include('admin.common.foot')
     