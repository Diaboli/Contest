<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class AdminController extends Controller {
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
		$permissions = $member->findPermissions();
		if ($uid['uid'] < 1) {
			$this->error('请登录', U('Home/Admin/login'));
		} else if ($uid['uid'] > 0 && $permissions != 1) {
			$this->error('您没有权限', U('Home/Index/index'));
		} else {
			
			$navJudge = 1;
			$this->assign('username', $uid['username']);
			$this->assign('navJudge', $navJudge);
			$this->display();
		}
	}
	
	/* 空操作，用于输出404页面 */
	public function _empty(){
		$this->redirect('Index/index');
	}
	
	/**
	 * 显示浏览文章
	 */
	public function article(){
		$uid = session('user_auth');
		$member = D('Member');
		$status = $member->findStatus($uid['uid']);
		if ($status == 0) {
			$member->logout();
			$uid = '';
		}
		$permissions = $member->findPermissions();
		if ($uid['uid'] < 1) {
			$this->error('请登录', U('Home/Index/index'));
		} else if ($uid['uid'] > 0 && $permissions != 1) {
			$this->error('您没有权限', U('Home/Index/index'));
		} else {
			
			$pageNumber = $_GET['page'];
			$clazz = 1;
			$number = 10;
			$navJudge = 3;
			
			$article = D('Article');
			$info = $article->adminArticle($clazz, $pageNumber, $number);
			$page = $article->adminPageInfo($pageNumber, $clazz);
			
			$this->assign('username', $uid['username']);
			$this->assign('navJudge', $navJudge);
			$this->assign('info', $info);
			$this->assign('page', $page);
			$this->display();
		}
	}
	
// 	/**
// 	 * 添加文章
// 	 */
// 	public function addArticle(){
// 		$uid = session('user_auth');
// 		$member = D('Member');
// 		$status = $member->findStatus($uid['uid']);
// 		if ($status == 0) {
// 			$member->logout();
// 			$uid = '';
// 		}
// 		$uid = $uid['uid'];
// 		if (!(IS_POST) && !($uid > 0)) {
// 			$this->error("请登录");
// 		} else {
// 			$title = $_POST['title'];
// 			$class = $_POST['class'];
// 			$context = $_POST['context'];
// 			$time = date("Y-m-d H:i:s", time());
// 			$addInfo = array(
// 					'uid' => $uid,
// 					'title' => $title,
// 					'class' => $class,
// 					'context' => $context,
// 					'time' => $time
	
// 			);
// 			$article = D('Article');
// 			$info = $article->addArticle($addInfo);
// 			$this->ajaxReturn($info);
// 		}
// 	}
	
	/**
	 * 删除文章
	 */
	public function delArticle(){
		$uid = session('user_auth');
		$member = D('Member');
		$status = $member->findStatus($uid['uid']);
		if ($status == 0) {
			$member->logout();
			$uid = '';
		}
		$permissions = $member->findPermissions();
		if ($uid['uid'] < 1) {
			$this->error('请登录', U('Home/Index/index'));
		} else if ($uid['uid'] > 0 && $permissions != 1) {
			$this->error('您没有权限', U('Home/Index/index'));
		} else {
			$userArray = $_POST['uid'];
			$article = D('Article');
			foreach ($userArray as $key => $value) {
				$info = $article->delArticle($value);
				if ($info !== 'true') {
					$info = 0;
					break;
				}
			}
			$this->ajaxReturn($info);
		}
	}
	
// 	/**
// 	 * 显示要修改的文章
// 	 */
// 	public function editArticle(){
// 		$id = $_POST['id'];
// 		$article = D('Article');
// 		$info = $article->findArticle($id);
// 		$this->ajaxReturn($info);
// 	}
	
// 	/**
// 	 * 更改文章
// 	 */
// 	public function updateArticle(){
// 		$uid = session('user_auth');
// 		$member = D('Member');
// 		$status = $member->findStatus($uid['uid']);
// 		if ($status == 0) {
// 			$member->logout();
// 			$uid = '';
// 		}
// 		$uid = $uid['uid'];
// 		if (!(IS_POST) && !($uid > 0)) {
// 			$this->error("请登录");
// 		} else {
// 			$title = $_POST['title'];
// 			$class = $_POST['class'];
// 			$source = $_POST['source'];
// 			$context = $_POST['context'];
// 			$time = date("Y-m-d H:i:s", time());
// 			$addInfo = array(
// 					'uid' => $uid,
// 					'title' => $title,
// 					'class' => $class,
// 					'source' => $source,
// 					'context' => $context,
// 					'time' => $time
	
// 			);
// 			$article = D('Article');
// 			$info = $article->updateArticle($addInfo);
// 			$this->ajaxReturn($info);
// 		}
// 	}
	
	/**
	 * 用户列表
	 */
	public function user(){
		$uid = session('user_auth');
		$member = D('Member');
		$status = $member->findStatus($uid['uid']);
		if ($status == 0) {
			$member->logout();
			$uid = '';
		}
		$permissions = $member->findPermissions();
		if ($uid['uid'] < 1) {
			$this->error('请登录', U('Home/Index/index'));
		} else if ($uid['uid'] > 0 && $permissions != 1) {
			$this->error('您没有权限', U('Home/Index/index'));
		} else {
				
			$pageNumber = $_GET['page'];
			$number = 10;
			$navJudge = 2;
			$info = $member->findAll($pageNumber, $number);
			$page = $member->pageInfo($pageNumber);
			
			$this->assign('username', $uid['username']);
			$this->assign('navJudge', $navJudge);
			$this->assign('member', $info);
			$this->assign('page',$page);
			$this->display();
		}
	}
	
	/**
	 * 用户关小黑屋
	 */
	public function forceOut(){
		$uid = session('user_auth');
		$member = D('Member');
		$status = $member->findStatus($uid['uid']);
		if ($status == 0) {
			$member->logout();
			$uid = '';
		}
		$permissions = $member->findPermissions();
		if ($uid['uid'] < 1) {
			$this->error('请登录', U('Home/Index/index'));
		} else if ($uid['uid'] > 0 && $permissions != 1) {
			$this->error('您没有权限', U('Home/Index/index'));
		} else {
			$userArray = $_POST['uid'];
			$pageNumber = $_GET['page'];
			$status = 0;
			foreach ($userArray as $key => $value){
				$member-> where("id = '%s'", $value)->setField('status', $status);
			}
			$this->ajaxReturn(1);
		}
	}
	
	/**
	 * 用户激活
	 */
	public function forceIn(){
		$uid = session('user_auth');
		$member = D('Member');
		$status = $member->findStatus($uid['uid']);
		if ($status == 0) {
			$member->logout();
			$uid = '';
		}
		$permissions = $member->findPermissions();
		if ($uid['uid'] < 1) {
			$this->error('请登录', U('Home/Index/index'));
		} else if ($uid['uid'] > 0 && $permissions != 1) {
			$this->error('您没有权限', U('Home/Index/index'));
		} else {
			$userArray = $_POST['uid'];
			$pageNumber = $_GET['page'];
			$status = 1;
			foreach ($userArray as $key => $value){
				$member-> where("id = '%s'", $value)->setField('status', $status);
			}
			$this->ajaxReturn(1);
		}
	}
	
	/**
	 * 管理员权限
	 */
	public function accredit(){
		$uid = session('user_auth');
		$member = D('Member');
		$status = $member->findStatus($uid['uid']);
		if ($status == 0) {
			$member->logout();
			$uid = '';
		}
		$permissions = $member->findPermissions();
		if ($uid['uid'] < 1) {
			$this->error('请登录', U('Home/Index/index'));
		} else if ($uid['uid'] > 0 && $permissions != 1) {
			$this->error('您没有权限', U('Home/Index/index'));
		} else {
			$userArray = $_POST['uid'];
			$pageNumber = $_GET['page'];
			$personalPermissions = 1;
			foreach ($userArray as $key => $value){
				$member-> where("id = '%s'", $value)->setField('permissions', $personalPermissions);
			}
			$this->ajaxReturn(1);
		}
	}
	
	/**
	 * 管理员权限取消
	 */
	public function accreditCancel(){
		$uid = session('user_auth');
		$member = D('Member');
		$status = $member->findStatus($uid['uid']);
		if ($status == 0) {
			$member->logout();
			$uid = '';
		}
		$permissions = $member->findPermissions();
		if ($uid['uid'] < 1) {
			$this->error('请登录', U('Home/Index/index'));
		} else if ($uid['uid'] > 0 && $permissions != 1) {
			$this->error('您没有权限', U('Home/Index/index'));
		} else {
			$userArray = $_POST['uid'];
			$pageNumber = $_GET['page'];
			$personalPermissions = 0;
			foreach ($userArray as $key => $value){
				$member-> where("id = '%s'", $value)->setField('permissions', $personalPermissions);
			}
			$this->ajaxReturn(1);
		}
	}
	
	/**
	 * 显示分类
	 */
	public function category(){
		$uid = session('user_auth');
		$member = D('Member');
		$status = $member->findStatus($uid['uid']);
		if ($status == 0) {
			$member->logout();
			$uid = '';
		}
		$permissions = $member->findPermissions();
		if ($uid['uid'] < 1) {
			$this->error('请登录', U('Home/Index/index'));
		} else if ($uid['uid'] > 0 && $permissions != 1) {
			$this->error('您没有权限', U('Home/Index/index'));
		} else {
			
			$category = D('Category');
			$info = $category->adminClazz();
			$this->assign('info', $info);
			
			$navJudge = 4;
			$this->assign('username', $uid['username']);
			$this->assign('navJudge', $navJudge);
			$this->display();
		}
	}
	
	/**
	 * 添加分类
	 */
	public function addClazz(){
		$uid = session('user_auth');
		$member = D('Member');
		$status = $member->findStatus($uid['uid']);
		if ($status == 0) {
			$member->logout();
			$uid = '';
		}
		$permissions = $member->findPermissions();
		if ($uid['uid'] < 1) {
			$this->error('请登录', U('Home/Index/index'));
		} else if ($uid['uid'] > 0 && $permissions != 1) {
			$this->error('您没有权限', U('Home/Index/index'));
		} else {
			$addInfo = array(
					'class' => $_POST['class'],
					'meaning' => $_POST['meaning']
			);
			$category = D('Category'); 
			$info = $category->addInfo($addInfo);
			if ($info !== true) {
				$this->error('操作失败', U('/Home/Admin/category'));
			}
			$this->success('新增分类成功', U('/Home/Admin/category'));
				
		}
	}
	
	/**
	 * 删除分类
	 */
	public function delClazz(){
		$uid = session('user_auth');
		$member = D('Member');
		$status = $member->findStatus($uid['uid']);
		if ($status == 0) {
			$member->logout();
			$uid = '';
		}
		$permissions = $member->findPermissions();
		if ($uid['uid'] < 1) {
			$this->error('请登录', U('Home/Index/index'));
		} else if ($uid['uid'] > 0 && $permissions != 1) {
			$this->error('您没有权限', U('Home/Index/index'));
		} else {
				
			$userArray = $_POST['uid'];
			$category = D('Category');
			foreach ($userArray as $key => $value) {
				$info = $category->delInfo($value);
				if ($info !== 'true') {
					$info = 0;
					break;
				}
			}
			$this->ajaxReturn($info);
			
		}
	}
	
	/**
	 * 后台登陆
	 */
	public function login(){
		$uid = session('user_auth');
		$member = D('Member');
		$status = $member->findStatus($uid['uid']);
		$permissions = $member->findPermissions();
		if ($uid['uid'] > 0) {
			if ($status == 1 && $permissions == 1) {
				$this->redirect('Home/Admin/index');
			} else if ($status == 0) {
				$member->logout();
				$this->error('抱歉,您已被封杀', U('Home/Index/index'));
			} else {
				$this->error('您没有权限', U('Home/Index/index'));
			}
		}
		if (IS_POST) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$uid = $member->login($username, $password);
			if ($uid > 0) {
				$permissions = $member->findPermissions();
				if ($permissions == 1) {
					$this->success('欢迎您', U('Home/Admin/index'));
				} else {
					$this->error('您没有权限', U('Home/Index/index'));
				}
			} else {
				$this->error('登录失败');
			}
		} else {
			$this->display();
		}
	}
}