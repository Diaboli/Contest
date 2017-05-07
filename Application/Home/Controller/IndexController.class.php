<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	/**
	 * 主页
	 */
	public function index(){
		$uid = session('user_auth');
		$member = D('Member');
		$status = $member->findStatus($uid['uid']);
		if ($status == 0) {
			$member->logout();
			$uid = '';
		}
		if (!($uid['uid'] > 0)) {
			$username = '';
		} else {
			$username = $uid['username'];
		}
		$this->assign('username', $username);
		$this->display();
	}
	
	/* 空操作，用于输出404页面 */
	public function _empty(){
		$this->redirect('Index/index');
	}
	
	/**
	 * 列表页
	 */
	public function articleList(){
		
		$uid = session('user_auth');
		$member = D('Member');
		$status = $member->findStatus($uid['uid']);
		if ($status == 0) {
			$member->logout();
			$uid = '';
		}
		if (!($uid['uid'] > 0)) {
			$username = '';
		} else {
			$username = $uid['username'];
		}
		$this->assign('username', $username);
		
		$pageNumber = $_GET['page'];
		$clazz = $_GET['nav'];
// 		if ($pageNumber < 1) {
// 			$this->redirect('/Home/Index/articleList/all/1/page/1');
// 		}
		$number = 6;
		$article = D("Article");
		$info = $article->findPageInfo($clazz, $pageNumber,$number);
		if ($info == NULL) {
			$info = '';
		} else {
			$pattern = '/s/m_(.*?).jpg';
			//$patternShow = '<img alt="" src="Uploads/Home/s/m_.*?.jpg" style="height:.*?px; width:.*?px" />';
			$patternShow = '<img.*?/>';
			$replacement = '';
			$start = 1;
			$length = 256;
			foreach ($info as $key1 => $value1) {
				preg_match_all('#'.$pattern.'#', $info[$key1]['context'], $photoGallery);		// 匹配各相片名
				if ($photoGallery[1] != NULL) {
					$info[$key1]['context'] = preg_filter('#'.$patternShow.'#', $replacement, $info[$key1]['context']);		// 替换各相片路径
					$info[$key1]['picture'] = 'Uploads/Home/cropper/'.$photoGallery[1][0].'.jpg';
					
				} else {
					$info[$key1]['picture'] = 'Uploads/Home/cropper/eb80ca87b5282dc47fe7b752209f55f7.jpg';
				}
				$info[$key1]['author'] = $member->findUsername($value1['uid']);
// 				$info[$key1]['context'] = preg_filter('#<p>#', $replacement, $info[$key1]['context']);		// 替换文本<p>标签
// 				$info[$key1]['context'] = preg_filter('#</p>#', $replacement, $info[$key1]['context']);
				$info[$key1]['context'] = strip_tags($info[$key1]['context']);
				$info[$key1]['context'] = substr($info[$key1]['context'], $start, $length);
			}
		}
		$this->assign('info',$info);
		
		$page = $article->PageInfo($pageNumber, $clazz);
		$this->assign('page',$page);
		
		$category = D('Category');
		$classInfo = $category->findAll($clazz);		
		$this->assign('category', $classInfo);
		
		/* 最新文章显示 */
		$number = 6;
		$daily = $article->daily($number);
		$this->assign('daily', $daily);
		
		$this->display();
	}
		
	public function article(){
		
		$id = $_GET['id'];
		if ($id < 1) {
			$this->redirect('/Home/Index/article/id/1');
		}
		$member = D('Member');
		$status = $member->findStatus($uid['uid']);
		if ($status == 0) {
			$member->logout();
			$uid = '';
		}
		$uid = session('user_auth');
		if (!($uid['uid'] > 0)) {
			$username = '';
		} else {
			$username = $uid['username'];
		}
		$this->assign('username', $username);
		
		$this->showArticle($id);
		$this->display();	
	}
	
	/**
	 * 显示浏览文章
	 */
	function showArticle($id){
		$article = D('Article');
		$info = $article->findArticle($id);
		$pattern = '/s/m_(.*?).jpg';
		preg_match_all('#'.$pattern.'#', $info[0]['context'], $photoGallery);		// 匹配各相片名
		$pattern = '/s/m_.*?.jpg"\sstyle="height:.*?px; width:.*?px"';
		foreach ($photoGallery[1] as $key => $value) {
			$replacement = '/picture/'.$value.'.jpg" style="height:450px; width:320px"';
			$info[0]['context'] = preg_filter('#'.$pattern.'#', $replacement, $info[0]['context'], 1);		// 替换各相片路径
		}
		//$info[0]['context'] = strip_tags($info[0]['context']);
		$member = D('Member');
		$info[0]['author'] = $member->findUserName($info[0]['uid']);
		
		$category = D('Category');
		$classInfo = $category->findAll(1);
		$this->assign('category', $classInfo);
		
		/* 最新文章显示 */
		$number = 6;
		$daily = $article->daily($number);
		$this->assign('daily', $daily);
		
		$this->assign('author', $info[0]['author']);
		$this->assign('class', $info[0]['class']);
		$this->assign('title', $info[0]['title']);
		$this->assign('source', $info[0]['source']);
		$this->assign('context', $info[0]['context']);
		$this->assign('time', $info[0]['time']);
	}

}