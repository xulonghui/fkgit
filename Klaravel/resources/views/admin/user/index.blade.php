@include("admin.common.head")
        <link rel="stylesheet" href="/css/admin/css/uniform.css" />
		<link rel="stylesheet" href="/css/admin/css/select2.css" />	
<div class="widget-box">
				            <div class="widget-title">
							
								<h5>User table</h5>
							</div>
							<div class="widget-content nopadding">
								<table class="table table-bordered data-table">
									<thead>
									<tr>
									<th>#</th>
									<th>账号</th>
									<th>性别</th>
									<th>昵称</th>
									<th>头像</th>
									<th>创建时间</th>
									<th>操作</th>
									</tr>
									</thead>
									<tbody>
								@foreach($users as $user)
									<tr class='gradeX'>
		                                <td>#{{$user->id}}</td>
	                                 	<td>{{$user->username}}</td>
		                                <td>{{$user->sex}}</td>
	                                	<td>{{$user->nickname}}</td>
										<td style='font:12px/16px 微软雅黑'>
										 @if(count($user->avartar)>0)
											<img src="{{$user->avartar}}" width =40px>
										@else 
										    该用户没上<br>传头像
									    @endif
										</td>
	                                    <td>{{date('y:m:d h:i:s',$user->addtime)}}</td>
	                                 	<td class='center'><a href="{{url('/Admin/user/'.$user->id.'/edit')}}">编辑</a> <a href="">删除</a></td>
	                                </tr>
								@endforeach
									</tbody>
									</table>  
									
							</div>
		</div>
				
		    <script src="/js/admin/js/jquery.min.js"></script>
			<script src="js/jquery.flot.min.js"></script>
            <script src="js/jquery.flot.resize.min.js"></script>
            <script src="/js/admin/js/jquery.uniform.js"></script>
            <script src="/js/admin/js/select2.min.js"></script>
            <script src="/js/admin/js/jquery.dataTables.min.js"></script>
            <script src="/js/admin/js/unicorn.tables.js"></script>
				
@include("admin.common.foot")

