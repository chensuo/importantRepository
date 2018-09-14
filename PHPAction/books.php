<?php 

	require_once("service/dataService.php");
	require_once("service/golableService.php");
	

	/*
		分页
	*/
	$pageSize = 10;
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
	//获取分类
 	$allCategories = readData(getAllCategoriesSql());
 	array_unshift($allCategories, ["Id" => "" , "Name" => "全部"]);

 	//获取出版社
 	$allPublishers = readData(getAllPublishersSql());
 	array_unshift($allPublishers, ["Id" => "" , "Name" => "全部"]);

 	$data = getAllBooks($cid , $pid , $pageIndex , $pageSize);

 	$totalPageCount = ceil($data["total"] / $pageSize);

 	$returnBack = $_SERVER["HTTP_REFERER"];


 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>books</title>
	<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<link rel="stylesheet" type="text/css" href="css/foot.css">
	<link rel="stylesheet" type="text/css" href="css/books.css">
	<link rel="stylesheet" type="text/css" href="css/golable.css">
	<link rel="stylesheet" type="text/css" href="lib/css/font-awesome.min.css">
	
</head>
<body>
	 <!-- 头部 -->
	<?php 
		include_once("inc/header.php");
	 ?>
	
	<div class="weizhi">
		<div><a href="index.php"><i class="glyphicon glyphicon-home"></i> 首页</a> 〉<span>图书商城</span><a href="<?php echo $returnBack ?>">返回上页</a></div>
	</div>
	
	<!-- 筛选条件 -->
	<div class="choseContainer">
		<div class="firstDv">&nbsp;图书分类 〉<span class="isShowChoseDv">收起筛选<img src="image/up.png" alt=""></span><span class="isShowChoseDvSec">显示筛选<img src="image/down.png" alt=""></span></div>
		<div>&nbsp;<i>分类：</i>
			<?php foreach ($allCategories as $item): ?>
				<a  href="books.php?cid=<?php echo $item["Id"]; ?>&pid=<?php echo $pid; ?>" <?php echo  $item["Id"]== $cid ? 'class=active' : '' ?>><?php echo $item["Name"]; ?></a>
			<?php endforeach ?>
		</div>
		<div class="publishersContainer">&nbsp;<i>出版社：</i>
			<?php foreach ($allPublishers as $item) :?>
				<a href="books.php?cid=<?php echo $cid; ?>&pid=<?php echo $item["Id"]; ?>" <?php echo  $item["Id"]== $pid ? 'class=active' : '' ?>><?php echo $item["Name"] ?></a>
			<?php endforeach ?>
		</div>
	</div>

	<!-- 图书标题 -->
	<div class="booksTitle">
		所有商品
		<div>
			<span class="active">默认排序</span><span>热门排序</span>
		</div>
	</div>

	<!-- 图书项目 -->
	<div class="booksItemContainer">
		<?php if(count($data["books"])> 0){ ?>
			<?php foreach ($data["books"] as $key => $item){ ?>
				<div class="bookItem">
					<span><?php echo "《" . $item["name"] . "》" ?></span>
					<img src="<?php echo IMAGE_URL . $item["image"]; ?>">
					<i><span>作者：</span><?php echo $item["authorName"] ?></i>
					<i><span>类别：</span><?php echo $item["categoryName"] ?></i>
					<i><span>出版社：</span><?php echo $item["publisherName"] ?></i>
					<i><span>可借/库存：</span><?php echo $item["borrowNum"] ?>/<?php echo $item["Amount"]?></i>
					<div>
						<div class="show-car">
							<button <?php echo $item["borrowNum"] == 0 ? 'disabled' : '' ?> <?php echo $item["borrowNum"] == 0 ? 'id=btn-disabled' : '' ?> data-toggle="modal" class="btn-add" data-book-id="<?php echo $item['id']; ?>"><?php echo $item["borrowNum"] == 0 ? '暂无可借' : '加入借书架' ?></button>
							<a href="detail.php?bookId=<?php echo $item['id']; ?>" class="addThisBook">图书详情</a>
						</div>
						<div class="logo-message">
							<i><img src="image/logo.png">&nbsp;看书就去有书看</i>
						</div>
					</div>
				</div>
			<?php }} else{?>
			<span class="noBooksShow">抱歉，暂无此类书籍!</span>
			<?php } ?>

			<!-- 分页 -->
			<div class="pageContainer">
				<?php for($i = 0 ; $i < $totalPageCount ; $i++): ?>
				<a  href = "books.php?pageIndex=<?php echo $i; ?>&cid=<?php echo $cid; ?>&pid=<?php echo $pid; ?>" <?php echo  $i == $pageIndex ? 'class=active' : '' ?>> <?php echo $i + 1 ; ?></a>
				<?php endfor ?>
			</div>

	</div>
	


	 <!-- 脚注 -->
	<?php 
		include_once("inc/foot.php");
	 ?>
	
	<!-- 模态框 -->
	<?php 
		include_once("inc/alert.php");
	 ?>
	
	

	<script type="text/javascript" src="lib/js/jquery.js"></script>
	<script type="text/javascript" src="lib/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/books.js"></script>
	
</body>
</html>