<?php

	function replace_phiz($content){

		preg_match_all('/\[.*?\]/is',$content,$arr);
		
		// var_dump($arr);
		// die();
		if($arr[0]){
			
			$phiz = array ( 'zhuakuang' => '抓狂', 'baobao' => '抱抱', 'haixiu' => '害羞', 'ku' => '酷', 'xixi' => '嘻嘻', 'taikaixin' => '太开心', 'touxiao' => '偷笑', 'qian' => '钱', 'huaxin' => '花心', 'jiyan' => '挤眼', );

			foreach($arr[0] as $v){
				foreach($phiz as $key => $value){
					if($v == '[' . $value . ']'){
						$content = str_replace($v,'<img src = "' . __ROOT__ . '/Public/Images/phiz/' . $key . '.gif"/>',$content);
					}
			
				}
			}
			
		}
		return $content;



	}

	function p($content){
		print_r($content);
	}

	function GetIpLookup($ip = ''){  
	    if(empty($ip)){  
	        $ip = GetIp();  
	    }  
	    $res = @file_get_contents('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=' . $ip);  
	    if(empty($res)){ return false; }  
	    $jsonMatches = array();  
	    preg_match('#\{.+?\}#', $res, $jsonMatches);  
	    if(!isset($jsonMatches[0])){ return false; }  
	    $json = json_decode($jsonMatches[0], true);  
	    if(isset($json['ret']) && $json['ret'] == 1){  
	        $json['ip'] = $ip;  
	        unset($json['ret']);  
	    }else{  
	        return false;  
	    }  
	    return $json;  
	}  
?>

