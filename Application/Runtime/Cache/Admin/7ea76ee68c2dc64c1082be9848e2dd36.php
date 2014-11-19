<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Document</title>
  <link rel="stylesheet" href="/wisher/Application/Admin/View/Public/Css/public.css" />
  <link rel="stylesheet" href="/wisher/Application/Admin/View/Public/Css/node.css" />
 </head>
 <body>
	<div id="wrap" class="">
			<a href="<?php echo U('Admin/Rbac/addNode');?>" class="add-app">添加应用</a>
			
			<?php if(is_array($node)): foreach($node as $key=>$app): ?><div id="" class="app">
					<p>
						<strong><?php echo ($app["title"]); ?></strong>
						[<a href="<?php echo U('Admin/Rbac/addNode',array('pid' => $app['id'],'level' => 2));?>">添加控制器</a>]
						[<a href="">删除</a>]
						[<a href="">修改</a>]
					</p>
		

				<?php if(is_array($app["child"])): foreach($app["child"] as $key=>$action): ?><dl>
						<dt><strong><?php echo ($action["title"]); ?></strong>
						[<a href="<?php echo U('Admin/Rbac/addNode',array('pid' => $action['id'],'level' => 3));?>">添加方法</a>]
						</dt>
					

					<?php if(is_array($action["child"])): foreach($action["child"] as $key=>$method): ?><dd>
							<span><?php echo ($method["title"]); ?></span>
							[<a href="">删除</a>]
							[<a href="">修改</a>]
						</dd><?php endforeach; endif; ?>
					</dl><?php endforeach; endif; ?>
						
				</div><?php endforeach; endif; ?>
	</div>

  
 </body>
</html>