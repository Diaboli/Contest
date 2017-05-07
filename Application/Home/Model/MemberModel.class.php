<?php

namespace Home\Model;

use Think\Model;

class MemberModel extends Model {
	
	/* 用户模型自动验证 */
	protected $_validate = array(
			array('username', '1, 24', '用户名信息错误', self::MUST_VALIDATE , 'length'),
			array('username', '', '用户名已存在, 请重新注册', self::MUST_VALIDATE , 'unique'),
			//array('password', '8, 16', '密码长度必须为8~16位', self::MUST_VALIDATE , 'length')
	
	);
	
	public function login($username, $password){
		$password = md5($password);
		$sql = "SELECT id, username FROM  `member` WHERE username =  '%s' AND PASSWORD =  '%s'";
		$user = $this->query($sql, $username, $password);
		if($user[0]['id'] > 0){
			$status = $this->findStatus($user[0]['id']);
			if ($status == 0) {
				return '抱歉,您已被封杀';
			}
			$this->autoLogin($user);
			return $user[0]['id'];
		} else {
			$info = $this->getDbError();
			return $info;
		}
	}
	
	public function autoLogin($user){
		
		/* 记录登录SESSION和COOKIES */
		$auth = array(
				'uid' => $user[0]['id'],
				'username' => $user[0]['username'],
		);
		
		session('user_auth', $auth);
	}
	
	public function findId($username){
		$sql = "SELECT id FROM  `member` WHERE username =  '%s'";
		$info = $this->query($sql, $username);
		return $info[0]['id'];
	}
	
	public function register($username, $password){
		$password = md5($password);
		$addInfo = array(
				'username' => $username,
				'password' => $password,
				'permissions' => 0
		);
		if($this->create($addInfo)){
			if($this->add($addInfo)){
				$sql = "SELECT id FROM `member` WHERE username = '%s'";
				$uid = $this->query($sql, $username);
				$user = array();
				$user[0] = array(
						'id' => $uid[0]['id'],
						'username' => $username
				);
				$this->autoLogin($user);
				return $uid[0]['id'];
			}else{
				return $this->getError();
			}
		}else{
			return $this->getError();
		}
	}
	
	public function logout(){
		session('user_auth', null);
		cookie('OX_LOGGED_USER', NULL);
	}
	
	public function findPermissions(){
		$uid = session('user_auth');
		$uid = $uid['uid'];
		$sql = "SELECT permissions FROM `member` WHERE id = '%s'";
		$permissions = $this->query($sql, $uid);
		return $permissions[0]['permissions'];
	}
	
	/**
	 * 查找用户名
	 */
	public function findUserName($uid){
		$sql = "SELECT username FROM  `member` WHERE id =  '%s'";
		$info = $this->query($sql, $uid);
		return $info[0]['username'];
	}
	
	/**
	 * 查找所有用户
	 */
	public function findAll($page, $number){
		$sql = "SELECT id, username, permissions, status FROM  `member` ORDER BY id DESC LIMIT %d, %d";
		$info = $this->query($sql, ($page - 1) * $number, $number);
		return $info;
	}
	
	/**
	 * 查找用户状态
	 */
	public function findStatus($uid){
		$sql = "SELECT status FROM  `member` WHERE id =  '%s'";
		$info = $this->query($sql, $uid);
		return $info[0]['status'];
	}
	
	/**
	 * 查找个人权限
	 */
	public function findPersonalPermissions($uid){
		$sql = "SELECT permissions FROM  `member` WHERE id =  '%s'";
		$info = $this->query($sql, $uid);
		return $info[0]['permissions'];
	}
	
	/**
	 * 用户列表页码
	 */
	public function pageInfo($page){
		$sql = "SELECT COUNT(*) FROM  `member`";
		$sum = $this->query($sql);
		if ($sum[0]['COUNT(*)'] != 0) {
			if ($sum[0]['COUNT(*)'] % 10 != 0) {
				$pages = (integer)($sum[0]['COUNT(*)'] / 10 + 1);
			} else {
				$pages = (integer)($sum[0]['COUNT(*)'] / 10);
			}
		} else {
			$pages = 0;
		}
		$info = array(
				'total' => $sum[0]['COUNT(*)'],
				'pages' => $pages,
				'pageNumber' => $page,
				'url' => '/Home/Admin/user/'
		);
		return $info;
	}
}

?>