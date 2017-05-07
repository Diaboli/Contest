<?php

namespace Home\Model;

use Think\Model;

class PictureModel extends Model {
	
	/* 用户模型自动验证 */
	protected $_validate = array(
			array('articleId', '1,11', '用户信息错误', self::MUST_VALIDATE , 'length'),
			array('address', '36', '图片信息错误', self::MUST_VALIDATE , 'length')
	
	);
	
	public function findId(){
		$uid = session("user_auth");
		$uid = $uid['uid'];
		$info = $this->query("SELECT * FROM `picture` WHERE id = '%s'", $uid);
		return $info;
	}
	
	public function addInfo($address){
		
		$uid = session("user_auth");
		$uid = $uid['uid'];		
		$addInfo = array(
				'articleId' => $uid,
				'address' => $address
		);
		
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
	
	public function delPicture($id){
		if($this->where('id=%d',$id)->delete()){
			return true;
		}else{
			return $this->getError();
		}
	}
	
	public function updatePicture($updateInfo){
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
}

?>