<?php

namespace Home\Controller;

use Think\Controller;

class ExpensesController extends Controller {
	public function index() {
		header("Content-Type: text/html;charset=utf-8");
		$user = D('User');
		$sum = D('Sum');
		$userIdCount = $user->count();
		$sumCount = $sum->count();
		echo "费用总数: ".$sumCount."</br>Id总数: ".$userIdCount;
		$info = $user->findAll();
		$count = 0;
		foreach ($info AS $key => $value) {
			$result = $sum->delId($value);
			$count++;
			echo $count."-> ".$value." status: ".$result."</br>";
		}
		echo $count;
// 		var_dump($info);
	}
}

?>