<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
   
    Public function index(){

    	$location = GetIpLookup("123.125.114.144");
    	// var_dump($location["city"]);
    	// die();

		$wish = M('wish')->select();
		$this->assign('wish',$wish)->display();

	}

	Public function handle(){
		if (!IS_AJAX) 	halt('页面不存在');

		$data = array (
			'username' => I('username'),
			'content' => I('content'),
			'time' => time()
		);
		
		if ($id = M('wish')->data($data)->add()){
			$data['id'] = $id;
			$data['content'] = replace_phiz($data['content']);
			$data['time'] = date('y-m-d', $data['time']);
			$data['status'] = 1;

			$location = GetIpLookup("123.125.114.144");
			$data["city"] = $location["city"];

			$this->ajaxReturn($data,'json');
		}else{
			$this->ajaxReturn(array('status'=>0),'json');
		}

	} 

	Public function getMsg(){
		if (!IS_AJAX) {
			halt('页面不存在');
		}

		$count = I('count');

		$exist = M('wish')->select();

		if ($count!=count($exist)) {
			
			$newcount = count($exist) - $count;

			if($newMsg = M('wish')->order('time desc')->limit($newcount)->select()){
				for ($i=0; $i < $newcount ; $i++) { 

					$data[$i]['id'] = $newMsg[$i]["id"];
					$data[$i]['username'] = $newMsg[$i]["username"];
					$data[$i]['content'] = replace_phiz($newMsg[$i]['content']);
					$data[$i]['time'] = date('y-m-d', $newMsg[$i]['time']);
					$data[$i]['status'] = 1;

					$location = GetIpLookup("123.125.114.144");
					$data[$i]["city"] = $location["city"];
				}
			
				$this->ajaxReturn($data,'json');
			}
			else{

				$this->ajaxReturn(array('status'=>0),'json');
			}

			
		}

	} 
}