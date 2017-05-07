<?php

namespace Home\Model;

use Think\Model;

class SumModel extends Model {
	public function delId($id) {
		if($this->where('病人ID=%d',$id)->delete()){
			return 'true';
		}else{
			return $this->getError();
		}
	}
	
	public function findId() {
		$sql = "SELECT * FROM `sum` WHERE 病人ID = %s";
		$info = $this->query($sql,241);
		return $info;
	}
	
	public function count() {
		$sql = "SELECT COUNT(*) FROM `sum` WHERE 1";
		$info = $this->query($sql);
		return $info;
	}
}

?>