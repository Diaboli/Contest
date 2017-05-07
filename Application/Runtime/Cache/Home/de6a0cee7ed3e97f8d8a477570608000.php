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
	<div class="main-title">
		<h2 class="f20 fb">文章信息</h2>
	</div>
	<a herf="javascript:void(0);" class="skimArticle"><button class="btn">查看</button></a>
	<a herf="javascript:void(0);" btnWay="<?php echo U('/Home/Admin/delArticle');?>" class="btnFunction"><button class="btn">删除</button></a>
	<div class="data-table">
		<table class="table-tittle">
			<thead><tr><th><input type="checkbox" id="checkAll"></th><th>标题</th><th>分类</th><th>作者</th><th>时间</th></tr></thead>
			<tbody>
				<?php if(is_array($info)): foreach($info as $k=>$vo): ?><tr>
						<td><input type="checkbox" name="subBox" value="<?php echo ($vo["id"]); ?>"/></td>
						<td><?php echo ($vo["title"]); ?></td>
						<td><?php echo ($vo["class"]); ?></td>
						<td><?php echo ($vo["author"]); ?></td>
						<td><?php echo ($vo["time"]); ?></td>
					</tr><?php endforeach; endif; ?>
			</tbody>
		</table>
	</div>
	<link rel="stylesheet" type="text/javascript" href="./Template/Home/default/public/css/page.css"/>
<div class="page">
	<?php if($page['pages'] > 10 AND $page['pageNumber'] > 5): ?><a class="usernum" href="<?php echo U($page['url'].'/page/1');?>">1…</a><?php endif; ?>
	<?php if($page['pageNumber'] > 1): ?><a class="usernum" href="<?php echo U($page['url'].'/page/'.($page['pageNumber']-1));?>"><<</a><?php endif; ?>  	
	<?php if($page['pageNumber'] > ($page['pages']-5) AND $page['pages'] > 10): $__FOR_START_9719__=($page['pages']-9);$__FOR_END_9719__=($page['pages']+1);for($i=$__FOR_START_9719__;$i < $__FOR_END_9719__;$i+=1){ if($page['pageNumber'] == $i): ?><span class="current"><?php echo ($i); ?></span>
 				<?php else: ?><a class="usernum" href="<?php echo U($page['url'].'/page/'.$i);?>"><?php echo ($i); ?></a><?php endif; } ?>	
	<?php elseif($page['pageNumber'] < 5 AND $page['pages'] > 10): ?>
		<?php $__FOR_START_7268__=1;$__FOR_END_7268__=11;for($i=$__FOR_START_7268__;$i < $__FOR_END_7268__;$i+=1){ if($page['pageNumber'] == $i): ?><span class="current"><?php echo ($i); ?></span>
 				<?php else: ?><a class="usernum" href="<?php echo U($page['url'].'/page/'.$i);?>"><?php echo ($i); ?></a><?php endif; } ?>	
	<?php elseif($page['pages'] > 10): ?>	
		<?php $__FOR_START_16077__=($page['pageNumber']-4);$__FOR_END_16077__=($page['pageNumber']+5);for($i=$__FOR_START_16077__;$i < $__FOR_END_16077__;$i+=1){ if($page['pageNumber'] == $i): ?><span class="current"><?php echo ($i); ?></span>
 				<?php else: ?><a class="usernum" href="<?php echo U($page['url'].'/page/'.$i);?>"><?php echo ($i); ?></a><?php endif; } ?>	
	<?php else: ?>	
		<?php $__FOR_START_25474__=1;$__FOR_END_25474__=$page['pages'] + 1;for($i=$__FOR_START_25474__;$i < $__FOR_END_25474__;$i+=1){ if($page['pageNumber'] == $i): ?><span class="current"><?php echo ($i); ?></span>
				<?php else: ?><a class="usernum" href="<?php echo U($page['url'].'/page/'.$i);?>"><?php echo ($i); ?></a><?php endif; } endif; ?>
	<?php if($page['pages'] > $page['pageNumber'] AND $page['pageNumber'] < $page.pages): ?><a class="usernum" href="<?php echo U($page['url'].'/page/'.($page['pageNumber']+1));?>">>></a><?php endif; ?>
	<?php if($page['pages'] > 10 AND $page['pageNumber'] <= ($page['pages']-5)): ?><a class="usernum" href="<?php echo U($page['url'].'/page/'.($page['pages']));?>">…<?php echo ($page['pages']); ?></a><?php endif; ?>
</div>

			</div>
			<!--菜单栏  预留-->
			<div class="sidebar pl10 pt30">
				
			</div>
		</div>
		<script type="text/javascript" src="./Public/static/jquery/jquery-1.8.3.js"></script>
		<script type="text/javascript" src="./Public/static/jquery/jquery-2.0.3.js"></script>
		
	<script type="text/javascript" src="./Template/Home/default/Admin/js/admin.js"></script>

	</body>
</html>