<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>文章记录</title>
<link rel="stylesheet" type="text/css" href="./Public/static/bootstrap/css/bootstrap-theme.css"/>
<link rel="stylesheet" type="text/css" href="./Public/static/bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="./Application/Common/View/Base/css/base.css"  media="screen"/>

	<link rel="stylesheet" type="text/css" href="./Template/Home/default/Center/css/articleList.css"/>

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
			<div class="col-md-3">
				<ul class="userUl">
					<li class="userUlTitle">个人中心</li>
					<a href="javascript:void(0);" onclick="alert('对不起，该功能暂未开放，正在努力开发中！！！');"><li class="userLi">个人资料</li></a>
					<a href="<?php echo U('/Home/Center/uploadArticle');?>"><li class="userLi">上传文章</li></a>
					<a href="<?php echo U('/Home/Center/articleList/page/1');?>"><li class="userLi">文章记录</li></a>
				</ul>
			</div>
			<div class="col-md-9">
				<div class="userDiv">
					<h3>上传文章记录</h3>
					<ul class="recordList">
						<?php if(is_array($info)): foreach($info as $k=>$vo): ?><li class="recordContent">
							<h4>[<?php echo ($vo['class']); ?>]<?php echo ($vo['title']); ?><span style="display:block;float:right"><?php echo ($vo['time']); ?></span></h4>
							<p style="display:block;float:right;"><a href="<?php echo U('/Home/Index/article/id/'.$vo['id']);?>">查看全文</a>&nbsp;|&nbsp;<a class="deleteArticle" article-id="<?php echo ($vo['id']); ?>" href="javascript:void(0);">删除</a></p>
						</li><?php endforeach; endif; ?>
					</ul>
					<link rel="stylesheet" type="text/css" href="./Template/Home/default/public/css/page.css"/>
<div class="page">
	<?php if($page['pages'] > 10 AND $page['pageNumber'] > 5): ?><a class="usernum" href="<?php echo U($page['url'].'/page/1');?>">1…</a><?php endif; ?>
	<?php if($page['pageNumber'] > 1): ?><a class="usernum" href="<?php echo U($page['url'].'/page/'.($page['pageNumber']-1));?>"><<</a><?php endif; ?>  	
	<?php if($page['pageNumber'] > ($page['pages']-5) AND $page['pages'] > 10): $__FOR_START_10923__=($page['pages']-9);$__FOR_END_10923__=($page['pages']+1);for($i=$__FOR_START_10923__;$i < $__FOR_END_10923__;$i+=1){ if($page['pageNumber'] == $i): ?><span class="current"><?php echo ($i); ?></span>
 				<?php else: ?><a class="usernum" href="<?php echo U($page['url'].'/page/'.$i);?>"><?php echo ($i); ?></a><?php endif; } ?>	
	<?php elseif($page['pageNumber'] < 5 AND $page['pages'] > 10): ?>
		<?php $__FOR_START_29960__=1;$__FOR_END_29960__=11;for($i=$__FOR_START_29960__;$i < $__FOR_END_29960__;$i+=1){ if($page['pageNumber'] == $i): ?><span class="current"><?php echo ($i); ?></span>
 				<?php else: ?><a class="usernum" href="<?php echo U($page['url'].'/page/'.$i);?>"><?php echo ($i); ?></a><?php endif; } ?>	
	<?php elseif($page['pages'] > 10): ?>	
		<?php $__FOR_START_29857__=($page['pageNumber']-4);$__FOR_END_29857__=($page['pageNumber']+5);for($i=$__FOR_START_29857__;$i < $__FOR_END_29857__;$i+=1){ if($page['pageNumber'] == $i): ?><span class="current"><?php echo ($i); ?></span>
 				<?php else: ?><a class="usernum" href="<?php echo U($page['url'].'/page/'.$i);?>"><?php echo ($i); ?></a><?php endif; } ?>	
	<?php else: ?>	
		<?php $__FOR_START_26310__=1;$__FOR_END_26310__=$page['pages'] + 1;for($i=$__FOR_START_26310__;$i < $__FOR_END_26310__;$i+=1){ if($page['pageNumber'] == $i): ?><span class="current"><?php echo ($i); ?></span>
				<?php else: ?><a class="usernum" href="<?php echo U($page['url'].'/page/'.$i);?>"><?php echo ($i); ?></a><?php endif; } endif; ?>
	<?php if($page['pages'] > $page['pageNumber'] AND $page['pageNumber'] < $page.pages): ?><a class="usernum" href="<?php echo U($page['url'].'/page/'.($page['pageNumber']+1));?>">>></a><?php endif; ?>
	<?php if($page['pages'] > 10 AND $page['pageNumber'] <= ($page['pages']-5)): ?><a class="usernum" href="<?php echo U($page['url'].'/page/'.($page['pages']));?>">…<?php echo ($page['pages']); ?></a><?php endif; ?>
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
	$(".deleteArticle").click(function(){
			var articleId = $(this).attr("article-id");
			$.post("<?php echo U('/Home/Center/delArticle');?>",{id:articleId},function(data){
				if(data){
					alert("删除成功");
					location.reload(true);   
				}else{
					alert("删除失败");
				}
			});
		});
		$(document).ready(function(){
	 	 // $(window).resize(function() {
         	 var screenWidth = document.body.offsetWidth;
			 if(screenWidth>1000){
				  $('.recordList').css({'padding-left':'0'});
				   $('.userDiv').css({'padding':'5px 30px 10px'});
				  $('span').css({'float':'right'});
				  $('.recordContent').height(70);
			  }else{
				  $('.recordList').css({'padding-left':'0'});
				   $('.userDiv').css({'padding':'5px 0px 10px'});
				  $('span').css({'float':'none'});
				  $('.recordContent').height(90);
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