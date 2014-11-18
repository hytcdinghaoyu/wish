<?php
return array(
	//'配置项'=>'配置值'
	'DB_TYPE' => 'mysql',
	'DB_HOST' => '127.0.0.1',
	'DB_USER' => 'root',
	'DB_PWD' => '123',
	'DB_NAME' => 'think',
	'DB_PREFIX' => 'hd_',

		
	'RBAC_SUPERADMIN' => 'admin',
	'ADMIN_AUTH_KEY' => 'superadmin',
	'USER_AUTH_ON' => true,
	'USER_AUTH_TYPE' => 1,
	'USER_AUTH_KEY' => 'uid',
	'NOT_AUTH_MODULE' => 'Index',
	'NOT_AUTH_ACTION' =>'',
	'RBAC_ROLE_TABLE' => 'hd_role',
	'RBAC_USER_TABLE' => 'hd_role_user',
	'RBAC_ACCESS_TABLE' => 'hd_access',
	'RBAC_NODE_TABLE' => 'hd_node',

	'TMPL_PARSE_STRING' => array(
		'__PUBLIC__'=>__ROOT__. '/Application/Admin/View/Public',
	),
	'URL_HTML_SUFFIX' => '',

);