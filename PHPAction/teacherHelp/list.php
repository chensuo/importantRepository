<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>商品列表</title>
	<style type="text/css">
		*{margin:0px; padding: 0px;}
		dl{			
			margin-bottom: 12px;
		}
		dl:after{
			content:'';
			display: block;
			clear: both;
		}
		dl>dt{
			height:36px;
			line-height: 36px;
			color:#333;
			font-weight: 600;
			float: left;
			width:128px;
		}
		dl>dd{
			float:left;
			padding:2px;
			min-width: 128px;
		}
		dl>dd>a{
			display: block;
			height:28px;
			line-height: 28px;
			color:#369;
			padding:2px 8px;
			text-align: center;
		}

		.container:after{
			content:'';
			display: block;
			clear: both;
		}
		.container>div{
			float:left;
			padding:16px;
		}
		.container a{
			display: block;
			text-decoration: none;
		}
		a>img{
			display: block;
			width:128px;
		}
	</style>
</head>
<body>
	<?php 
		include_once("inc/header.php");
		require_once("services/categoryService.php");
		require_once("services/publisherService.php");
		require_once("services/bookService.php");
		require_once("util/globalSetting.php");
	 ?>
	 <?php 

	 	// 分页
	 	$pageSize = 6;
	 	$pageIndex = 0;

	 	if(array_key_exists("pageIndex" , $_GET)){
	 		$pageIndex = $_GET["pageIndex"];
	 	}

	 	// 检查分类条件
	 	$cid = "";
	 	if(array_key_exists("cid" , $_GET)){
	 		$cid = $_GET["cid"];
	 	}

	 	// 检查出版社条件
	 	$pid = "";

	 	if(array_key_exists("pid" , $_GET)){
	 		$pid = $_GET["pid"];
	 	}



	 	$categories = getAllCategories();
	 	array_unshift($categories, ["id" => "" , "name" => "全部"]);

	 	$publishers = getAllPublihsers();
	 	array_unshift($publishers, ["id" => "" , "name" => "全部"]);

	 	$data = getAllBooks($cid , $pid , $pageIndex , $pageSize);

	 	$totalPageCount = ceil($data["total"] / $pageSize);

	 ?>
	<hr>
	<div>
		<dl>
			<dt>图书分类:</dt>
			<?php foreach($categories as $item): ?>
				<dd><a href="list.php?cid=<?php echo $item["id"]; ?>&pid=<?php echo $pid; ?>"><?php echo $item["name"]; ?></a></dd>
			<?php endforeach ?>
		</dl>
	</div>
	<div>
		<dl>
			<dt>出版社:</dt>
			<?php foreach($publishers as $item): ?>
				<dd><a href="list.php?cid=<?php echo $cid; ?>&pid=<?php echo $item["id"]; ?>"><?php echo $item["name"]; ?></a></dd>
			<?php endforeach ?>
		</dl>
	</div>
	图书列表
	<hr>
	<div class="container">
		<?php foreach($data["books"] as $item): ?>
			<div>
				<a href="detail.php?id=<?php echo $item["id"]; ?>">
					<img src="<?php echo IMAGE_URL_ROOT . $item["image"]; ?>">
				</a>
				<h4><?php echo $item["name"]; ?></h4>
				<button>加入借书架</button>
			</div>
		<?php endforeach ?>
	</div>
	<hr>
	<div>
		<?php for($i = 0 ; $i < $totalPageCount; $i++): ?>
			<a href="list.php?pageIndex=<?php echo $i; ?>&cid=<?php echo $cid; ?>&pid=<?php echo $pid; ?>"><?php echo $i + 1; ?></a>
		<?php endfor ?>
	</div>
</body>
</html>