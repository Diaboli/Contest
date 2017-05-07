<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>灵感后台管理系统</title>
		<link rel="stylesheet" type="text/css" href="./Public/static/bootstrap/css/bootstrap-theme.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/static/bootstrap/css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="./Template/Home/default/Admin/css/login.css"/>
	</head>
	 <body style="text-align: center;">
	  	<div id="adminLogin">
	  		<h1>灵感后台管理平台</h1>
	  		<form action="<?php echo U('/Home/Admin/login');?>" method="post" role="form">
	  			<div class="formInput">
					<span class="glyphicon glyphicon-user"></span>
					<input type="text" name="username" placeholder="请输入用户名">
				</div>
				<div class="formInput">
					<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
					<input type="password" name="password" placeholder="请输入密码"/>
				</div>
				<input type="submit" value="登录" id="loginbtn"/>
	  		</form>
	  		<p id="gentle">后台工作管理人员辛苦了！</p>
	  	</div>
	 </body>
</html>