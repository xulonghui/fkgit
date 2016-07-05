<!DOCTYPE html>
<html>
    <!-- container-fluid -->
    <head>
        <title>凡客商场后台</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<script src="/js/jquery-1.8.3.min.js" type="text/javascript"></script>
		<script src="/plugins/uploadify/jquery.uploadify.min.js"></script>
	    <link type='text/css' rel='stylesheet' href="{{asset('/plugins/uploadify/uploadify.css')}}">
        <link rel="stylesheet" href="/css/admin/css/bootstrap.min.css" />
        <link rel="stylesheet" href="/css/admin/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="/css/admin/css/fullcalendar.css" />	
        <link rel="stylesheet" href="/css/admin/css/unicorn.main.css" />
        <link rel="stylesheet" href="/css/admin/css/unicorn.grey.css" class="skin-color" />
	   <link type="text/css" rel="stylesheet" href="/css/admin/base.css">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
    <body>


        <div id="header">
            <h1><img src="/images/admin_img/logo.png">UniAdmin</h1>		
        </div>
        <div id="search">
            <input type="text" placeholder="请输入搜索内容..." /><button type="submit" class="tip-right" title="Search"><i class="icon-search icon-white"></i></button>
        </div>
        <div id="user-nav" class="navbar navbar-inverse">
            <ul class="nav btn-group">
                <li class="btn btn-inverse"><a title="" href="{{url('/Admin')}}"><i class="icon icon-user"></i> <span class="text">个人资料</span></a></li>
                <li class="btn btn-inverse dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">消息</span> <span class="label label-important">5</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a class="sAdd" title="" href="#">新消息</a></li>
                        <li><a class="sInbox" title="" href="#">收件箱</a></li>
                        <li><a class="sOutbox" title="" href="#">发件箱</a></li>
                        <li><a class="sTrash" title="" href="#">发送</a></li>
                    </ul>
                </li>
                <li class="btn btn-inverse"><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">设置</span></a></li>
                <li class="btn btn-inverse"><a title="" href="{{url('/Admin/login/logout')}}"><i class="icon icon-share-alt"></i> <span class="text">退出</span></a></li>
            </ul>
        </div>

        <div id="sidebar">
            <a href="#" class="visible-phone"><i class="icon icon-home"></i> 首页</a>
            <ul>
                <li class="active"><a href="/Admin"><i class="icon icon-home"></i> <span>首页</span></a></li>
                <li class="submenu">
                    <a href="#"><i class="icon icon-th-list"></i> <span>用户模块</span> <span class="label">3</span></a>
                    <ul>
                        <li><a href="{{url('/Admin/user')}}">用户列表</a></li>
                        <li><a href="{{url('/Admin/user/create')}}">添加用户</a></li>
                        <li><a href="form-wizard.html">表单提示</a></li>
                    </ul>
                </li>
                <li><a href="buttons.html"><i class="icon icon-tint"></i> <span>按钮 &amp; 图标</span></a></li>
                <li><a href="interface.html"><i class="icon icon-pencil"></i> <span>UI元素</span></a></li>
                <li><a href="tables.html"><i class="icon icon-th"></i> <span>表格</span></a></li>
                <li><a href="grid.html"><i class="icon icon-th-list"></i> <span>网格布局</span></a></li>
                <li class="submenu">
                    <a href="#"><i class="icon icon-file"></i> <span>其他页面</span> <span class="label">4</span></a>
                    <ul>
                        <li><a href="invoice.html">清单</a></li>
                        <li><a href="chat.html">聊天</a></li>
                        <li><a href="calendar.html">日历</a></li>
                        <li><a href="gallery.html">相册</a></li>
                    </ul>
                </li>
                <li>
                    <a href="charts.html"><i class="icon icon-signal"></i> <span>图表统计</span></a>
                </li>
                <li>
                    <a href="widgets.html"><i class="icon icon-inbox"></i> <span>插件</span></a>
                </li>
            </ul>

        </div>

        <div id="style-switcher">
            <i class="icon-arrow-left icon-white"></i>
            <span>Style:</span>
            <a href="#grey" style="background-color: #555555;border-color: #aaaaaa;"></a>
            <a href="#blue" style="background-color: #2D2F57;"></a>
            <a href="#red" style="background-color: #673232;"></a>
        </div>

        <div id="content">
            <div id="content-header">
                <h1>控制台</h1>
                <div class="btn-group">
                    <a class="btn btn-large tip-bottom" title="Manage Files"><i class="icon-file"></i></a>
                    <a class="btn btn-large tip-bottom" title="Manage Users"><i class="icon-user"></i></a>
                    <a class="btn btn-large tip-bottom" title="Manage Comments"><i class="icon-comment"></i><span class="label label-important">5</span></a>
                    <a class="btn btn-large tip-bottom" title="Manage Orders"><i class="icon-shopping-cart"></i></a>
                </div>
            </div>
            <div id="breadcrumb">
                <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a>
                <a href="#" class="current">控制台</a>
            </div>
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="alert alert-info">
                            亲爱的<strong><em>--{{Session::get('userData')->nickname}}--</em></strong>欢迎来到敢死队组凡客商品后台管理系统※别忘记<strong>--多给分--</strong></a>哦!
                            <a href="#" data-dismiss="alert" class="close">×</a><em class='fr'>  点这关闭-></em>
                        </div>			
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">