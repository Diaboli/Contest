<?php

namespace Home\Controller;

use Think\Controller;

class CenterController extends Controller {
	/**
	 * 空操作 - 页面重定向
	 */
	public function _empty(){
		$this->redirect('Center/articleList');
	}
	
	/**
	 * 个人中心-上传文章页面
	 */
	public function uploadArticle(){
		$uid = session('user_auth');
		$member = D('Member');
		$status = $member->findStatus($uid['uid']);
		if ($status == 0) {
			$member->logout();
			$uid = '';
		}
		if (!($uid['uid'] > 0)) {
			$this->error("请登录", U('Home/Index/index'));
		} else {
			$username = $uid['username'];
			$this->assign('username', $username);
			$this->showClazz();
			$this->display();
		}
	}
	
	/**
	 * 上传文章
	 */
	public function upload(){
	
		if (!(IS_POST) && empty($_FILES)) {
			$this->redirect('Home/Index/index');
		} else {
			$uid = session('user_auth');
			$member = D('Member');
			$status = $member->findStatus($uid['uid']);
			if ($status == 0) {
				$member->logout();
				$uid = '';
			}
			$uid = $uid['uid'];
			if ($uid < 1) {
				$this->error('请登录', U('Home/Index/index'));
			}
	
			$upload = A('Home/UploadFile');
			$root_name_path = "http://localhost/contest/Uploads/Home/";
	
			//设置参数
			$upload->maxSize  = 3145728 ;// 设置附件上传大小
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->savePath =  './Uploads/Home/picture/';// 设置附件上传目录
			// 			$upload->subType = 'hash';
			// 			$upload->hashLevel = 2;
			$upload->saveRule = md5($data['image'].time()); // 采用md5命名
			$upload->thumb = true;//设置需要生成缩略图，仅对图像文件有效
			$upload->thumbPrefix = 'm_,s_';  //设置需要生成缩略图的文件后缀//生产2张缩略图
			$upload->thumbMaxWidth = '300,50';//设置缩略图最大宽度
			$upload->thumbMaxHeight = '200,50'; //设置缩略图最大高度
			$upload->thumbPath = './Uploads/Home/s/';//指定统一的缩略图保存路径
			//$upload->thumbExt = 'jpg';// 设置缩略图的固定后缀
	
			/* 上传图片 */
			//root_name_path
			$getcwd = getcwd();
			$cwd = str_replace("\\","/",$getcwd);
			$root_picture_path = $cwd."/Uploads/Home/picture/";
			$root_s_path = $cwd."/Uploads/Home/s/";
			$root_cropper_path = $cwd."/Uploads/Home/cropper/";
			if(!$upload->upload($root_picture_path,$root_s_path)) {
				// 上传错误提示错误信息
				echo "<script type=\"text/javascript\">window.parent.CKEDITOR.tools.callFunction('1', '', '上传失败,".$upload->getErrorMsg()."!');</script>";
			} else {
					
				$info = $upload->getUploadFileInfo();//取得成功上传的文件信息
				$data['image'] = $info[0]['savename'];//保存当前数据对象
				//剪裁图片
				$upload->cropper("./Uploads/Home/picture/".$data['image'],200,124,"./Uploads/Home/cropper/".$data['image'],$root_cropper_path);
				//address
				$upload = $root_name_path."picture/".$data['image'];
				$cropper = $root_name_path."cropper/".$data['image'];
				$m = $root_name_path."s/m_".$data['image'];
				$s = $root_name_path."s/s_".$data['image'];
				$return = array (
						0 => array (
								'upload' =>$upload,
								'cropper' =>$cropper,
								'm' =>$m,
								's' =>$s
						)
				);
				// 图片信息写入数据库
				$picture = D('Picture');
				$picture->addInfo($data['image']);
				$info = '<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction("1", "Uploads/Home/s/m_'.$data['image'].'", "");</script> ';
				echo $info;
			}
		}
	}
	
	/**
	 * 添加文章
	 */
	public function addArticle(){
		$uid = session('user_auth');
		$member = D('Member');
		$status = $member->findStatus($uid['uid']);
		if ($status == 0) {
			$member->logout();
			$uid = '';
		}
		$uid = $uid['uid'];
		if (!(IS_POST) && !($uid > 0)) {
			$this->error("请登录", U('Home/Index/index'));
		} else {
			$title = $_POST['title'];
			$class = $_POST['class'];
			$source = $_POST['source'];
			$context = $_POST['editor1'];
			$time = date("Y-m-d H:i:s", time());
			$addInfo = array(
					'uid' => $uid,
					'title' => $title,
					'class' => $class,
					'source' => $source,
					'context' => $context,
					'time' => $time
						
			);
			$article = D('Article');
			$info = $article->addArticle($addInfo);
			if ($info === TRUE) {
				$this->success('上传成功!', 'http://localhost/contest/index.php?s=/Home/Center/articleList/page/1.html');
			} else {
				$this->error($info);
			}
		}
	}
	
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
		$uid = $uid['uid'];
		if (!(IS_POST) && !($uid > 0)) {
			$this->error("请登录", U('Home/Index/index'));
		} else {
			$id = $_POST['id'];
			$article = D('Article');
			$info = $article->delArticle($id);
			if ($info == TRUE){
				$this->ajaxReturn(TRUE);
			} else {
				$this->ajaxReturn(FALSE);
			}
		}
	}
	
	/**
	 * 个人中心文章列表页
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
			$this->error("请登录", U('Home/Index/index'));
		} else {
			$username = $uid['username'];
			$this->assign('username', $username);
			
			$pageNumber = $_GET['page'];
			$clazz = 1;
			$number = 10;
			
			$article = D('Article');
			$info = $article->findPersonal($clazz, $pageNumber, $number);
			
			if ($info == NULL){
				$info = '';
			} else {
				$start = 1;
				$length = 32;
				foreach ($info as $key1 => $value1) {
					$info[$key1]['context'] = substr($info[$key1]['title'], $start, $length);
				}
			}
			$page = $article->personalPageInfo($pageNumber, $clazz);

			$this->assign('page',$page);
			$this->assign('info',$info);
			$this->display();
		}
	}
		
	/**
	 * 分类下拉菜单
	 */
	function showClazz(){
		$uid = session('user_auth');
		$member = D('Member');
		$status = $member->findStatus($uid['uid']);
		if ($status == 0) {
			$member->logout();
			$uid = '';
		}
		$uid = $uid['uid'];
		if (!($_POST) && !($uid > 0)) {
			$this->error("请登录", U('Home/Index/index'));
		} else {
			$category = D('Category');
			$info = $category->classMenu();
			$this->assign('class', $info);
		}
	}
}

?>