<?php

namespace Home\Model;

use Think\Model;

class ArticleModel extends Model {
	
	/* 用户模型自动验证 */
	protected $_validate = array(
			array('uid', '1, 11', '登录信息错误', self::MUST_VALIDATE , 'length'),
			array('class', '1,4', '文章分类信息错误', self::MUST_VALIDATE , 'length'),
			array('title', '1, 256', '文章标题信息错误', self::MUST_VALIDATE , 'length'),
			array('time', '2014-11-11, 2017-6-17', '文章分类信息错误', self::MUST_VALIDATE , 'expire')
	);
	
	/**
	 * 添加文章
	 */
	public function addArticle($addInfo){
		if($this->create($addInfo)){
			if($this->add($addInfo)){
				return true;
			}else{
				return $this->getError();
			}
		}else{
			return $this->getError();
		}
	}
	
	/**
	 * 查找所有文章
	 */
	public function findAll(){
		$sql = "SELECT * FROM `article` WHERE 1";
		$info = $this->query($sql);
		$category = D('Category');
		$info = $category->findClazzInfo($info);
		return $info;
	}
	
	/**
	 * 删除文章
	 */
	public function delArticle($id){
		if($this->where('id=%d',$id)->delete()){
			return 'true';
		}else{
			return $this->getError();
		}
	}
	
	/**
	 * 更新文章
	 */
	public function updateArticle($updateInfo){
		$category = D('Category');
		$updateInfo = $category->findClazzInfo($updateInfo);
		if($this->create($updateInfo)){
			if ($this->save()) {
				return true;
			}else{
				if($this->getError() == ''){
					return '未修改';
				}else{
					return $this->getError();
				}
			}
		}else{
			return $this->getError();
		}
	}
	
	/**
	 * 查找单一文章
	 */
	public function findArticle($id){
		$sql = "SELECT * FROM `article` WHERE id = '%s'";
		$info = $this->query($sql, $id);
		$category = D('Category');
		$info = $category->findClazzInfo($info);
		return $info;
	}
	
	/**
	 * 文章列表
	 */
	public function findPageInfo($clazz, $page,$number){
		if ($clazz != 1){
			$sql = "SELECT * FROM `article` WHERE class = '".$clazz."' ORDER BY id DESC LIMIT %d, %d";
		} else {
			$sql = "SELECT * FROM `article` ORDER BY id DESC LIMIT %d, %d";
		}
		$info = $this->query($sql, ($page-1) * $number, $number);
		$category = D('Category');
		$info = $category->findClazzInfo($info);
		return $info;
	}
	
	/**
	 * 页码信息
	 */
	public function pageInfo($pageNumber, $clazz){
		if ($clazz != 1) {
			$sql = "SELECT COUNT(*) FROM `article` WHERE class = '.$clazz.'";
		} else {
			$sql = 'SELECT COUNT(*) FROM `article`';
		}
		$sum = $this->query($sql);
		if ($sum[0]['COUNT(*)'] != 0) {
			if (($sum[0]['COUNT(*)'] % 6) != 0) {
				$pages = (integer)($sum[0]['COUNT(*)'] / 6 + 1);
			} else {
				$pages = (integer)($sum[0]['COUNT(*)'] / 6);
			}
		} else {
			$pages = 0;
		}
		$info = array(
				'total' => $sum[0]['COUNT(*)'],
				'pages' => $pages,
				'pageNumber' => $pageNumber,
				'url' => '/Home/Index/articleList/nav/'.$clazz
		);
		return $info;
	}
	
	/**
	 * 个人中心页码信息
	 */
	public function personalPageInfo($pageNumber, $clazz){
		$uid = session('user_auth');
		$uid = $uid['uid'];
		if ($clazz != 1) {
			$sql = "SELECT COUNT(*) FROM `article` WHERE class = '".$clazz."' AND uid = '".$uid."'";
		} else {
			$sql = "SELECT COUNT(*) FROM `article` WHERE uid = '".$uid."'";
		}
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
				'pageNumber' => $pageNumber,
				'url' => '/Home/Center/articleList'
		);
		return $info;
	}
	
	/**
	 * 个人中心文章列表
	 */
	public function findPersonal($clazz, $page, $number){
		$uid = session('user_auth');
		$uid = $uid['uid'];
		if ($clazz != 1){
			$sql = "SELECT id, title, class, time FROM `article` WHERE class = '".$clazz."' AND uid = '".$uid."' ORDER BY id DESC LIMIT %d, %d";
		} else {
			$sql = "SELECT id, title, class, time FROM `article` WHERE uid = '".$uid."' ORDER BY id DESC LIMIT %d, %d";
		}
		$info = $this->query($sql, ($page-1) * $number, $number);
		$category = D('Category');
		$info = $category->findClazzInfo($info);
		return $info;
	}
	
	/**
	 * 后台文章列表
	 */
	public function adminArticle($clazz, $page, $number){
		if ($clazz != 1){
			$sql = "SELECT id, uid, title, class, time FROM `article` WHERE class = '".$clazz."' ORDER BY id DESC LIMIT %d, %d";
		} else {
			$sql = "SELECT id, uid, title, class, time FROM `article` ORDER BY id DESC LIMIT %d, %d";
		}
		$info = $this->query($sql, ($page-1) * $number, $number);
		$category = D('Category');
		$info = $category->findClazzInfo($info);
		$member = D('Member');
		foreach ($info as $key => $value) {
			$info[$key]['author'] = $member->findUserName($value['uid']);
		}
		return $info;
	}
	
	/**
	 * 后台页码
	 */
	public function adminPageInfo($pageNumber, $clazz){
		if ($clazz != 1) {
			$sql = "SELECT COUNT(*) FROM `article` WHERE class = '".$clazz."'";
		} else {
			$sql = "SELECT COUNT(*) FROM `article` ";
		}
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
				'pageNumber' => $pageNumber,
				'url' => '/Home/Admin/article'
		);
		return $info;
	}
	
	/**
	 * 查询相关文章标题
	 */
	public function daily($number){
		$sql = "SELECT id, title FROM `article` ORDER BY id DESC LIMIT %d";
		$info = $this->query($sql, $number);
		return $info;
	}
}

?>