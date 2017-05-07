<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="author" content="wjm">
<title>灵感后台管理平台</title>
<link rel="stylesheet" type="text/css" href="./Application/Common/View/Base/css/adminBase.css">
<link rel="stylesheet" type="text/css" href="./Application/Common/View/Base/css/background.css">
<link rel="stylesheet" type="text/css" href="./Template/Home/default/public/css/page.css">

</head>
<html>
	<body>
		<!--导航栏-->
		<div class="header">
			<div class="fl pl10 logo"><img src="./Public/Home/images/logo.png" style="height: 50px;"></div>
			<ul class="main-nav">
				<li><a href="<?php echo U('/Home/Admin/index');?>"<?php if($navJudge == 1): ?>class="nowNav"<?php endif; ?>>首页</a></li>
				<li><a href="<?php echo U('/Home/Admin/user/page/1');?>"<?php if($navJudge == 2): ?>class="nowNav"<?php endif; ?>>用户</a></li>
				<li><a href="<?php echo U('/Home/Admin/article/page/1');?>"<?php if($navJudge == 3): ?>class="nowNav"<?php endif; ?>>文章</a></li>
				<li><a href="<?php echo U('/Home/Admin/category');?>"<?php if($navJudge == 4): ?>class="nowNav"<?php endif; ?>>分类</a></li>
			</ul>
			<span style="display:block;float:right;color:white;line-height:50px;margin:0px 30px 0 0;">欢迎你,<?php echo ($username); ?></span>
		</div>
		<!--内容-->
		<div class="content">
			<!--主要内容-->
			<div class="main pt20">
				
	<br/><br/>
	<h1 class="f20 fb ">欢迎进入灵感后台管理平台，祝您工作愉快！！!</h1>

			</div>
			<!--菜单栏  预留-->
			<div class="sidebar pl10 pt30">
				
			</div>
		</div>
		<script type="text/javascript" src="./Public/static/jquery/jquery-1.8.3.js"></script>
		<script type="text/javascript" src="./Public/static/jquery/jquery-2.0.3.js"></script>
		
	</body>
</html>