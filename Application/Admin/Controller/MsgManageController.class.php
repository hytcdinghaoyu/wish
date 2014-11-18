<?php
namespace Admin\Controller;
use Think\Controller;
	Class MsgManageController extends CommonController{
		Public function index(){
			//import('ORG.Util.Page');

			$count = M('wish')->count();

			//var_dump($count);

			$page  = new \Think\Page($count,10);

			// var_dump($Page);
			// die();

			$limit = $page->firstRow . ',' . $page->listRows;

			$wish = M('wish')->order('time DESC')->limit($limit)->select();
			$this->wish = $wish;
			$this->page = $page->show();
			$this->display();
		}

		Public function delete(){
			$id = I('id','','intval');

			if(M('wish')->delete($id)){
				$this->success('删除成功',U('Admin/MsgManage/index'));
			}else{
				$this->error('删除失败');
			}
		}
	}
?>