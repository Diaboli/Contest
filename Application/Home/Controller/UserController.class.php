<?php

namespace Home\Controller;

use Think\Controller;

class UserController extends Controller {
	/* 空操作，用于输出404页面 */
	public function _empty(){
		$this->redirect('Home/Index/index');
	}
	
	/**
	 * 登录
	 */
	public function login(){	
		$uid = session('user_auth');
		$uid = $uid['uid'];
		if ($uid > 0) {
			$this->redirect('Home/Index/index');
		}
		if (IS_POST) { //登录验证
			$username = $_POST['username'];
			$password = $_POST['password'];
			/* 调用UC登录接口登录 */
			$member = D('Member');
			$uid = $member->login($username, $password);
			if (0 < $uid) { //登录成功
				//TODO:跳转到登录前页面
				$this->success("欢迎您!", U('Home/Index/index'));
	
			} else { //登录失败
				if ($uid != NULL) {
					$this->error($uid);
				} else {
					$this->error('登录失败');
				}
			}
		} else {
			$this->redirect('Home/Index/index');
		}
	}
	
	/**
	 * 注册
	 */
	public function register(){
		$uid = session('user_auth');
		$uid = $uid['uid'];
		if ($uid > 0) {
			$this->redirect('Home/Index/index');
		}
		if (IS_POST) {
			$username = $_POST['username1'];
			$password = $_POST['password1'];
			$member = D('Member');
			$uid = $member->register($username, $password);
			if ($uid > 0) {
				$this->success('欢迎您', U('Home/Index/index'));
			} else {
				$this->error($uid);
			}
		} else {
			$this->display();
		}
	}
	
	/**
	 * 注册-检测用户名是否存在
	 */
	public function detection(){
		$uid = session('user_auth');
		$uid = $uid['uid'];
		if ($uid > 0) {
			$this->redirect('Home/Index/index');
		}
		if ($_POST) {
			$username = $_POST['username'];
			$member = D('Member');
			$info = $member->findId($username);
			if ($info > 0) {
				$this->ajaxReturn(TRUE);
			} else {
				$this->ajaxReturn(FALSE);
			}
		} else {
			$this->redirect('Home/Index/index');
		}
	}
	
	/**
	 * 注销
	 */
	public function logout(){
		$uid = session('user_auth');
		$uid = $uid['uid'];
		if ($uid > 0) {
			D('Member')->logout();
			$this->success('退出成功！', U('Home/Index/index'));
		} else {
			$this->redirect('Home/Index/index');
		}
	}
}

?>