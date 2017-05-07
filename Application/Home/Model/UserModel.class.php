<?php

namespace Home\Model;

use Think\Model;

class UserModel extends Model {
	public function findAll() {
		$sql = "SELECT * FROM `user` WHERE 1";
		$info = $this->query($sql);
		return $info;
	}
	
	public function count() {
		$sql = "SELECT COUNT(*) FROM `user` WHERE 1";
		$info = $this->query($sql);
		return $info;
	}
}

?>