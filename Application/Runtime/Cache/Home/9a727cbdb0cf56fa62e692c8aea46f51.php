<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo ($title); ?></title>
<link rel="stylesheet" type="text/css" href="./Public/static/bootstrap/css/bootstrap-theme.css"/>
<link rel="stylesheet" type="text/css" href="./Public/static/bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="./Application/Common/View/Base/css/base.css"  media="screen"/>

	<link rel="stylesheet" type="text/css" href="./Template/Home/default/Index/css/article.css">
	<link rel="stylesheet" type="text/css" href="./Template/Home/default/Index/css/articleList.css">

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
			<link rel="stylesheet" type="text/css" href="./Template/Home/default/public/css/secondNav.css">
<div class="col-md-12">
	<img style="width:100%;margin:0 0 10px 0;"src="./Template/Home/default/public/img/banner.jpg">
	<div class="visible-lg visible-md">
		<ul id="secondNav">
			<?php if(is_array($category)): foreach($category as $k=>$vo): ?><a href="<?php echo U('/Home/Index/articleList/'.$vo['URL']);?>"><li <?php if($vo["class"] == $_GET['nav']): ?>class="nowPage"<?php endif; ?>><?php echo ($vo["navName"]); ?></li></a><?php endforeach; endif; ?>
		</ul>
	</div>
	<div class="hidden-lg hidden-md">
		<ul id="secondNav">
			<a href="<?php echo U('/Home/Index/articleList/nav/1/page/1.html');?>"><li class="nowPage">文章列表</li></a>
		</ul>
	</div>
</div>
			<div class="col-md-8">
				<h2><?php echo ($title); ?></h2>
				<br/>
				<div class="visible-md visible-lg"><p style="border-bottom: 1px solid #EEEEEE;">作者：<?php echo ($author); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;时间：<?php echo ($time); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;文章分类：<?php echo ($class); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;文章来源：<?php echo ($source); ?></p></div>
				<div class="hidden-md hidden-lg"><p>作者：<?php echo ($author); ?></p><p>时间：<?php echo ($time); ?></p><p>文章分类：<?php echo ($class); ?></p><p style="border-bottom: 1px solid #EEEEEE;">文章来源：<?php echo ($source); ?></p></div>
				<div id="articleContent">
					<?php echo ($context); ?>
				</div>
			</div>
			<div class="visible-md visible-lg">
				<div class="col-md-4">
					<link rel="stylesheet" type="text/css" href="./Template/Home/default/public/css/sidebar.css"/>
<div id="sidebar">
	<div class="sidebarContent">
		<h4 class="sidebarTitle">相关技术</h4>
		<ul id="conection">
			<li><a href="javascript:void(0);">css3</a></li>
			<li><a href="javascript:void(0);">html5</a></li>
			<li><a href="javascript:void(0);">php</a></li>
			<li><a href="javascript:void(0);">java</a></li>
			<li><a href="javascript:void(0);">c++</a></li>
			<li><a href="javascript:void(0);">c#</a></li>
			<li><a href="javascript:void(0);">sql</a></li>
			
		</ul>
	</div>
	<div class="sidebarContent">
		<h4 class="sidebarTitle">推荐网站</h4>
		<ul id="groomWeb">
			<li><span class="dot">●</span><a href="http://www.csdn.net" target="_blank">CSDN--全球最大IT中文社区</a></li>
			<li><span class="dot">●</span><a href="http://www.jsjbbs.cn" target="_blank">计算机技术论坛</a></li>
			<li><span class="dot">●</span><a href="http://changdao.haotui.com" target="_blank">电脑技术交流</a></li>
			<li><span class="dot">●</span><a href="http://bbs.520dn.com" target="_blank">我爱电脑技术论坛</a></li>
			<li><span class="dot">●</span><a href="http://bbs.cfanclub.net/" target="_blank">电脑爱好者俱乐部</a></li>
		</ul>
	</div>
	<div class="sidebarContent">
		<h4 class="sidebarTitle">最新文章</h4>
		<ul id="newArticle">
			<?php if(is_array($daily)): foreach($daily as $k=>$vo): ?><li class="listNumber"><span><?php echo ($k+1); ?></span><a href="<?php echo U('/Home/Index/article/id/'.$vo['id']);?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; ?>
		</ul>
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