<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>首页</title>
<link rel="stylesheet" type="text/css" href="./Public/static/bootstrap/css/bootstrap-theme.css"/>
<link rel="stylesheet" type="text/css" href="./Public/static/bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="./Application/Common/View/Base/css/base.css"  media="screen"/>

	<link rel="stylesheet" href="./Template/Home/default/Index/css/jquery.slider.css">

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
	
	
	<div class="row">
		<div class="col-md-12"> 
			<center style="margin-top:50px;margin-bottom:10px;">
				<div class="slider" style="width:100%;height:468px;">
				  <div> <img src="/contest/Template/Home/default/Index/img/slide_1.jpg" style="width:100%"/> </div>
				  <div> <img src="/contest/Template/Home/default/Index/img/slide_2.jpg" style="width:100%"/> </div>
				  <div> <img src="/contest/Template/Home/default/Index/img/slide_3.jpg" style="width:100%"/> </div>
				  <div> <img src="/contest/Template/Home/default/Index/img/slide_4.jpg" style="width:100%"/> </div>
				</div>
			</center>
		</div>
	</div>
	<div class="col-md-12" style="top:-20px">
				<div class="row">
					<div class="col-lg-12">
						<div class="row contest" style="background:#35A6E6;color:#ffffff;padding:200px 20px;line-height:25px;font-size:17px;letter-spacing:3px;">
							<div  class="container">
								<div id="animation1">
									<div class="col-md-5 avatar-img">
										<div class="left">
											<img class="avatar-img" src="/contest/Template/Home/default/Index/img/挖掘机.png" style="width:85%;">
										</div>
									</div>
									<div class="col-md-7">
										<div class="right">
											<h1 class="title" style="font-size: 50px;">技术交流</h1>
											<hr/>
											<p class="words" style="font-size:30px;letter-spacing:5px;line-height: 50px;">挖掘机学不好不要紧，快来技术论坛学一门新技术吧！不用去蓝翔，在家就能享受到大神给你的辅导，还不快去论坛查看技术文章？</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row contest" style="background: #53C1ED;color:#ffffff;padding:200px 20px;line-height:25px;font-size:17px;letter-spacing:3px;">
							<div  class="container">
								<div  class="container">
									<div id="animation2">
										<div class="col-md-7">
											<div class="left">
												<h1 class="title" style="font-size: 50px;">上传文章</h1>
												<hr/>
												<p class="words" style="font-size:30px;letter-spacing:5px;line-height: 50px;">这是一个大神们挥洒笔墨的天地，作为一个大神，怎么能吝啬自己的知识，快快来发表文章啦！！！</p>
											</div>
										</div>
										<div class="col-md-5 avatar-img">
											<div class="right">
												<img class="avatar-img" src="/contest/Template/Home/default/Index/img/上传文章.png" style="width: 80%;margin:10px 0 10px 0;">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row contest" style="background: #7AC4EF;color:#ffffff;padding:200px 20px;line-height:25px;font-size:17px;letter-spacing:3px;">
							<div  class="container">
								<div id="animation3">
									<div class="col-md-4 avatar-img">
										<div class="left">
											<img class="avatar-img" src="/contest/Template/Home/default/Index/img/上传图片.png" style="width: 75%;">
										</div>
									</div>
									<div class="col-md-8">
										<div class="right">
											<h1 class="title" style="font-size: 50px;">上传图片</h1>
											<hr/>
											<p class="words" style="font-size:30px;letter-spacing:5px;line-height: 50px;">为了大神们更好的说明自己的操作方法，以及用户之间更好的交流，这个功能可不能落下哦！！！</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row contest" style="background: #44C6A4;color:#ffffff;padding:200px 20px;line-height:25px;font-size:17px;letter-spacing:3px;">
							<div  class="container">
								<div id="animation4">
									<div class="col-md-12">
										<div class="left">
											<h1 class="title" style="font-size: 50px;">注册&&登录</h1>
											<hr/>
											<p class="words" style="font-size:30px;letter-spacing:5px;line-height: 50px;">大神曰，有技术就是这么任性，快快加入我们吧！！！</p>
										</div>
									</div>
									<div class="col-md-5"></div>
									<div class="col-md-7 avatar-img">
										<div class="right">
											<img class="avatar-img" src="/contest/Template/Home/default/Index/img/欢迎.png">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
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
	
	
<script type="text/javascript" src="./Public/static/jquery/jquery.min.js"></script>
<script type="text/javascript" src="./Public/static/jquery/jquery.slider.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
	    $(".slider").slideshow({
		  height     : 325,
		  transition : 'bar'
		});
	$(document).scroll(function(){
		animation("#animation1");
		animation("#animation2");
		animation("#animation3");
		animation("#animation4");
		});	
	});
	 $(document).ready(function(){
	 	 var screenWidth = document.body.offsetWidth;
         // $(window).resize(function() {
			 if(screenWidth>1000){
				 $('.title').css({'font-size':'50px'});
				  $('.title-right').css({'text-align':'left'});
				 $('.words').css({'font-size':'30px','line-height':'50px'});
				 $('.contest').css({'padding':'200px 20px'});
	  		     $('.avatar-img').css({'display':'inline'});
			  }else{
				  $('.title').css({'font-size':'25px'});
				  $('.title-right').css({'text-align':'right'});
				  $('.words').css({'font-size':'20px','line-height':'30px'});
				  $('.contest').css({'padding':'30px 20px'});
				  $('.avatar-img').css({'display':'none'});
					 }
		 // });
 });
	function animation(id){
		var judge = ($(window).scrollTop()>($(id).offset().top+$(id).outerHeight()))||(($(window).scrollTop()+$(window).height())<$(id).offset().top);
		if(judge){
			$(id).find(".left-animation").attr({"class":"left"});
			$(id).find(".right-animation").attr({"class":"right"});
		}else{
			$(id).find(".left").attr({"class":"left-animation"});
			$(id).find(".right").attr({"class":"right-animation"});		
		}		
	}
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
	</script>
</body>
</html>