<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>注册页面</title>
<link rel="stylesheet" type="text/css" href="./Public/static/bootstrap/css/bootstrap-theme.css"/>
<link rel="stylesheet" type="text/css" href="./Public/static/bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="./Application/Common/View/Base/css/base.css"  media="screen"/>



</head>
<body>
	
	<!--导航-->
	<div class="navbar navbar-default navbar-fixed-top bs-docs-nav" role="banner">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".bs-navbar-collapse">
				  <span class="sr-only">Toggle navigation</span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				</button>
				<a class="navbar-brand logoA" href="<?php echo U('Home/Index/index');?>"><img src="./Public/Home/images/logo.png" id="logo"/></a>
			</div>
			<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
				<ul class="nav navbar-nav">
					<li><a href="<?php echo U('/Home/Index/index');?>" class="anchorLink">首页</a></li>
					<li><a href="<?php echo U('/Home/Index/articleList/nav/1/page/1');?>" class="anchorLink">论坛</a></li>
				</ul>
					<ul class="rightNavUl">
						<?php if($username == ''): ?><a class="rightNav" id="register" href="<?php echo U('/Home/User/register');?>">注册</a>
							<span class="rightNav">|</span>
							<a class="rightNav" id="login" href="javascript:void(0)">登录</a>
						<?php else: ?><span class="rightNav"><?php echo ($username); ?>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo U('/Home/Center/articleList/page/1');?>" style="color:#fff;">进入个人中心</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo U('/Home/User/logout');?>" style="color:#fff;">注销</a></span><?php endif; ?>
					</ul>
				
				
			</nav>
		</div>
	</div>
	<!--导航结束-->
		<div id="gray"></div>
		<div id="loginWindow">
			<div id="loginTitle">登录灵感账号<span class="glyphicon glyphicon-remove"></span></div>
			<form class="loginForm" method="post" action="<?php echo U('Home/User/login');?>">
				<div class="formInput">
					<span class="glyphicon glyphicon-user"></span>
					<input type="text" name="username" placeholder="请输入用户名">
				</div>
				<div class="formInput">
					<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
					<input type="password" name="password" placeholder="请输入密码"/>
				</div>
				<input type="submit" value="登录" id="loginSubmit"/>
				<a style="float:right;cursor:pointer;" href="<?php echo U('/Home/User/register');?>">立即注册</a>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
				<div style="clear:both;text-align:center;font-size:16px;color:#337AB7;">登录后可获得更多优质的服务哦<br/>O(∩_∩)O哈哈~</div>
			</form>
			
		</div>
	
	
	<div id="main">
		<div class="container">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="register-hidden" style="margin: 150px 0;">
					<form action="<?php echo U('/Home/User/register');?>" id="registerForm" class="form-horizontal" role="form" method="post">
						<fieldset>
	   					<legend><b>注册账号</b></legend>
							<div class="form-group form-group-lg">
								<label class="col-sm-2 control-label">用户名：</label>
								<div class="col-sm-7">
									<input name="username1" class="form-control" type="text" placeholder="请输入用户名"/>
								</div>
								<div class="col-sm-3">
									<span id="usernameJudge" style="color:red;line-height:46px;"></span>
								</div>
							</div>
							<div class="form-group form-group-lg">
								<label class="col-sm-2 control-label">密码：</label>
								<div class="col-sm-7">
									<input name="password1" class="form-control" type="password" placeholder="请输入密码"/>
								</div>
								<div class="col-sm-3">
									<span id="passwordJudge" style="color:red;line-height:46px;"></span>
								</div>
							</div>
							<div class="form-group form-group-lg">
								<label class="col-sm-2 control-label">确认密码：</label>
								<div class="col-sm-7">
									<input name="passwordJudge" class="form-control" type="password" placeholder="请再次输入密码">
								</div>
								<div class="col-sm-3">
									<span id="password1Judge" style="color:red;line-height:46px;"></span>
								</div>
							</div>
							<div class="form-group form-group-lg">
								<label class="col-sm-2 control-label"></label>
								<div class="col-sm-10">
									<input type="submit" class="btn btn-primary btn-lg" value="立即注册">
								</div>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>


	
		<p>&nbsp;</p>
		<!--底部-->
		<div class="wrapper">
			<footer class="footer">	
				<p>本站由 <b>灵感</b> 团队制作！</p>
				<p><a href="javascript:void(0);" onclick="alert('欢迎使用本页面，本页面由灵感团队制作，部分图片素材来自网上，如有侵权，本站将会立即删除！！！');">关于我们</a>
				   |<a href="javascript:void(0);" onclick="alert('感谢您进行意见反馈，联系方式:wdmzjjm@163.com');">意见反馈</a></p>
			</footer>
		</div>
		<!--底部结束-->
		<script type="text/javascript" src="./Public/static/jquery/jquery-1.8.3.js"></script>
		<script type="text/javascript" src="./Public/static/jquery/jquery-2.0.3.js"></script>
		<script type="text/javascript" src="./Public/static/bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript" src="./Public/static/bootstrap/js/npm.js"></script>
	
	
	<script type="text/javascript">
		$("#registerForm").submit(function(){
			var username = $("input[name='username1']").val();
			var password = $("input[name='password1']").val();
			var passwordJudge = $("input[name='passwordJudge']").val();
			if(username == ''){
				$("#usernameJudge").text("您没有输入用户名");
				return false;
			}else if(password == ''){
				$("#passwordJudge").text("您没有输入密码");
				return false;
			}else if(passwordJudge == ''){
				$("#password1Judge").text("您没有输入确认密码");
				return false;
			}else if(password != passwordJudge){
				$("#password1Judge").text("您的两次密码输入不一致");
				return false;
			}
		});
		$(document).ready(function(){
			$("input[name='passwordJudge']").keyup(function(){
				var password = $("input[name='password1']").val();
				var passwordJudge = $("input[name='passwordJudge']").val();
				if(password != passwordJudge){
					$("#password1Judge").text("您的两次密码输入不一致");
				}else{
					$("#password1Judge").text("");
				}
			});
			$("input[name='username1']").keyup(function(){
				var username = $(this).val();
				$.post("<?php echo U('/Home/User/detection');?>",{username:username},function(data){
					if(data){
						$("#usernameJudge").text("您的用户名已经被注册！");
					}else{
						$("#usernameJudge").text("您的用户名可以使用");
						$("#usernameJudge").css({"color":"#000"});
					}
				});
			});
		});
		$(document).ready(function(){
	 	 var screenWidth = document.body.offsetWidth;
         // $(window).resize(function() {
			 if(screenWidth>1000){
				 $('.register-hidden').css({'margin':'150px 0'});
			  }else{
				  $('.register-hidden').css({'margin':'60px 0'});
					 }
		 // });
 });
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$("#login").click(function(){
				var iWidth = $("#loginWindow").width();//弹出窗口的宽度;
				var iHeight = $("#loginWindow").height(); //弹出窗口的高度;
				var iTop = ($(window).height()-iHeight)/2;       //获得窗口的垂直位置;
				var iLeft = ($(window).width()-iWidth)/2;       //获得窗口的水平位置;
				var docHeight = $(document).height();
				var docWidth = $(document).width();
				$("#loginWindow").css({"left": iLeft,"top": iTop});  
				$("#gray").css({"height":docHeight,"weight":docWidth});       
				$("#gray").show();//显示灰色图层
				$("#loginWindow").show();//显示登陆框
				$("#loginSubmit").submit(function(){
					//location.reload();	
				});	
				
			});
			$("#loginTitle span").click(function(){
				$("#gray").hide();//显示灰色图层
				$("#loginWindow").hide();//显示登陆框
			});
		});
		$(document).ready(function(){
	 	 var screenWidth = document.body.offsetWidth;
         // $(window).resize(function() {
			 if(screenWidth>1000){
				 $('#loginWindow').width(400);
			  }else{
				  $('#loginWindow').width(300);
					 }
		 // });
 });
	</script>
</body>
</html>