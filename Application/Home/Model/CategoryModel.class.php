<?php

namespace Home\Model;

use Think\Model;

class CategoryModel extends Model {
	
	/* 用户模型自动验证 */
	protected $_validate = array(
			array('class', '1, 2', '分类代号长度只能为1~2位字符', self::MUST_VALIDATE , 'length'),
			array('class', 'number', '分类格式错误', self::MUST_VALIDATE , 'unique'),
			array('meaning', '1, 4', '分类含义长度只能为1~4位字符', self::MUST_VALIDATE , 'length')
	
	);
	
	/**
	 * 分类查找
	 */
	public function findClazzInfo($info){
		if (is_numeric($info[0]['class'])) {
			$sql = "SELECT meaning m FROM  `category` WHERE class = '%s'";
		} else {
			$sql = "SELECT class m FROM  `category` WHERE meaning = '%s'";
		}
		foreach ($info as $key => $value) {
			$temp = $this->query($sql, $info[$key]['class']);
			$info[$key]['class'] = $temp[0]['m'];
		}
		return $info;
	}
	
	/**
	 * 查找分类信息
	 */
	public function findClazzMessage($info){
		if (is_numeric($info['class'])) {
			$sql = "SELECT meaning m FROM  `category` WHERE class = '%s'";
		} else {
			$sql = "SELECT class m FROM  `category` WHERE meaning = '%s'";
		}
		$temp = $this->query($sql, $info['class']);
		$info['class'] = $temp[0]['m'];
		return $info;
	}
	
	/**
	 * 分类标签栏
	 */
	public function findAll($clazz){
		$sql = "SELECT class, meaning navName FROM  `category` ORDER BY class ASC LIMIT 12";
		$info = $this->query($sql);
		foreach ($info as $key => $value) {
			$info[$key]['URL'] = 'nav/'.$value['class'].'/page/1';
			$info[$key]['nowPage'] = $clazz;
		}
		return $info;
	}
	
	/**
	 * 分类菜单栏
	 */
	public function classMenu(){
		$sql = "SELECT class, meaning navName FROM  `category` WHERE class != 1 ORDER BY class ASC";
		$info = $this->query($sql);
		return $info;
	}
	
	/**
	 * 添加分类
	 */
	public function addInfo($addInfo){
		if($this->create($addInfo)){
			$this->add($addInfo);
			return true;
		} else {
				return $this->getError();
		}
	}
	
	/**
	 * 更新分类
	 */
	public function updateInfo($updateInfo){
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
	 * 后台分类信息
	 */
	public function adminClazz(){
		$sql = "SELECT * FROM  `category` ORDER BY class ASC";
		$info = $this->query($sql);
		return $info;
	}
	
	/**
	 * 删除分类
	 */
	public function delInfo($id){
		if($this->where('id=%d',$id)->delete()){
			return 'true';
		}else{
			return $this->getError();
		}
	}
}

?>