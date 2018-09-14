<?php 
	
	require_once("service/dataService.php");
	require_once("service/golableService.php");
	require_once("service/dbHelper.php");
	//检验是否登录 否则跳转登录页面
	error_reporting(E_ALL ^ E_NOTICE);//隐藏登录后 开始Session与header页面冲突
	session_start();

	if(!array_key_exists("Current", $_SESSION)){
		header("location:login.php");
		exit;
	}

	/*
		获取当前用户订单
	*/
	$userId  = $_SESSION["CurrentId"];
	$orderList = readData(getUserOrdersSql($userId));





	/*
		分页 当前订单
	*/
	$newSql = getUserOrdersSql($userId);
	$secSql = getUserCurrentOrdersCountSlql($userId);
	$pageSize = 8;
	$pageIndex = 0;
	$orderList = showPage($newSql , $secSql , $pageIndex , $pageSize);  //数据总行数
	$count = count($orderList["books"]);
	if(array_key_exists("currentOIndex" , $_GET)){
		$pageIndex = $_GET["currentOIndex"];
		$orderList = showPage($newSql , $secSql , $pageIndex , $pageSize);  //数据总行数
	}
	$totalPageCount = ceil($orderList["totalRowsNum"] / $pageSize);

	/*
		分页 历史订单
	*/
	$newSqlHistory = getUserHistoryOrdersSql($userId);
	$secSqlHistory = getUserHistoryOrdersCountSlql($userId);
	$pageSizeHistory = 8;
	$pageIndeHistory = 0;
	$orderListHistory = showPage($newSqlHistory , $secSqlHistory , $pageIndeHistory , $pageSizeHistory);  //数据总行数
	$countHistory = count($orderListHistory["books"]);
	if(array_key_exists("historytOIndex" , $_GET)){
		$pageIndeHistory = $_GET["historytOIndex"];
		$orderListHistory = showPage($newSqlHistory , $secSqlHistory , $pageIndeHistory , $pageSizeHistory);  //数据总行数
		
	}
	$totalPageCountHistory = ceil($orderListHistory["totalRowsNum"] / $pageSizeHistory);

	if(array_key_exists("currentOIndex" , $_GET)){
		if($_GET["currentOIndex"] != ''){
			$pageIndex = $_GET["currentOIndex"];
		}
	}
	if(array_key_exists("historytOIndex" , $_GET)){
		if($_GET["historytOIndex"] != ''){
		$pageIndeHistory = $_GET["historytOIndex"];

		}
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>myOrders</title>
	<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/foot.css">
	<link rel="stylesheet" type="text/css" href="css/myOrders.css">
	<link rel="stylesheet" type="text/css" href="css/golable.css">
	<link rel="stylesheet" type="text/css" href="lib/css/font-awesome.min.css">
</head>
<body>
	 <!-- 头部 -->
	<?php 
		include_once("inc/header.php");
	 ?>
	<!-- 位置提示 -->
	<div class="weizhi">
		<div><a href="index.php"><i class="glyphicon glyphicon-home"></i> 首页</a> 〉<span>我的订单</span>
		<a href="books.php">继续借书</a></div>
	</div>

	
	<!-- 导航 -->
	<div class="order-nav">
		<ul class="nav nav-tabs">
		  <li role="presentation" class="active"><a class="currentOrders">未发货订单</a></li>
		  <li role="presentation"><a class="historyOrders">历史订单</a></li>
		</ul>
	</div>
	<!-- 正体 -->
	<div class="orders-container" <?php if($pageIndeHistory != ''){
		echo "id='no-show'";
	}else{
		echo "id='is-show'";
	}?>>
		<!-- 当前订单 -->
			<?php 
					if($count > 0){
					foreach($orderList["books"] as $index => $item){ ?>
			<div class="orderItem">
				<div class="orderItem-title"><span></span>订单号: <?php echo $item["id"] ?><span>创建时间: <?php echo date('Y-m-d' , $item["createTime"]) ?></span></div>
				<div class="orderItem-body">
					<a href="detail.php?bookId=<?php echo $item["bookId"] ?>"><img src="<?php echo IMAGE_URL . $item["Image"] ?>" class="order-img"></a>
					<span>
						<span>书名:&nbsp;&nbsp;<a href="detail.php?bookId=<?php echo $item["bookId"] ?>" style="text-decoration: none">《<?php echo $item["name"] ?>》</a></span>
						<span>作者:&nbsp;&nbsp;<?php echo $item["authorName"] ?></span>
						<span>出版社:&nbsp;&nbsp;<?php echo $item["publisherName"] ?></span>
						<span>书号:&nbsp;&nbsp;<?php echo $item["bookNumber"] ?></span>
						<span><?php showBooksState($item["state"]); ?></span>
					</span>
				</div>
				<div class="orderItem-foot">收货地址&nbsp;:&nbsp;&nbsp;扬州市人民政府
					<?php if($item["state"] == 1) :?>
						<a href="cancelOrder.php?id=<?php echo $item["id"] ?>&bookNumber=<?php echo $item["bookNumber"]; ?>" class="btn btn-default"><i class="fa fa-trash"></i> 取消订单</a>
					<?php endif ?>
					<?php if($item["state"] == 2) :?>
					<a href="confirmBooks.php?id=<?php echo $item["id"] ?>" class="btn btn-success"><i class="fa fa-check-square-o" style="color:#fff;"></i> 确认收货</a>
					<?php endif ?>
				</div>
			</div>
			<?php } } else{ ?>
			<span class="noBooksShow">您没有未处理订单，快去借书吧！ <a href="books.php">我要借书</a></span>
			<?php } ?>


			<!-- 分页 -->
			<div class="pageContainer">
				<?php for($i = 0 ; $i < $totalPageCount ; $i++): ?>
				<a  href = "myOrders.php?currentOIndex=<?php echo $i; ?>&historyOIndex=<?php echo $pageIndex ?>" <?php echo  $i == $pageIndex ? 'class=active' : '' ?>> <?php echo $i + 1 ; ?></a>
				<?php endfor ?>
			</div>

	</div>

	<!-- 历史订单 -->
	<div class="orders-container-history" <?php if($pageIndeHistory != ''){
		echo "id='is-show'";
	}else{
		echo "id='no-show'";
	}?>>
			<?php 
					if($countHistory > 0){
					foreach($orderListHistory["books"] as $index => $item){ ?>
			<div class="orderItem">
				<div class="orderItem-title"><span></span>订单号: <?php echo $item["id"] ?><span>创建时间: <?php echo date('Y-m-d' , $item["createTime"]) ?></span></div>
				<div class="orderItem-body">
					<a href="detail.php?bookId=<?php echo $item["bookId"] ?>"><img src="<?php echo IMAGE_URL . $item["Image"] ?>" class="order-img"></a>
					<span>
						<span>书名:&nbsp;&nbsp;<a href="detail.php?bookId=<?php echo $item["bookId"] ?>" style="text-decoration: none">《<?php echo $item["name"] ?>》</a></span>
						<span>作者:&nbsp;&nbsp;<?php echo $item["authorName"] ?></span>
						<span>出版社:&nbsp;&nbsp;<?php echo $item["publisherName"] ?></span>
						<span>书号:&nbsp;&nbsp;<?php echo $item["bookNumber"] ?></span>
						<span><?php showBooksState($item["state"]); ?></span>
					</span>
				</div>
				<div class="orderItem-foot">收货地址&nbsp;:&nbsp;&nbsp;扬州市人民政府
					<!-- <span class="btn btn-default"><i class="fa fa-trash"></i> 取消订单</span>
					<span class="btn btn-success"><i class="fa fa-check-square-o" style="color:#fff;"></i> 确认收货</span> -->
				</div>
			</div>
			<?php } } else{ ?>
			<span class="noBooksShow">您没有历史订单，快去借书吧！ <a href="books.php">我要借书</a></span>
			<?php } ?>
			<!-- 分页 -->
			<div class="pageContainer">
				<?php for($i = 0 ; $i < $totalPageCountHistory ; $i++): ?>
				<a id="history-page"  href = "myOrders.php?currentOIndex=<?php echo $pageIndeHistory ?>&historyOIndex=<?php echo $i; ?>" <?php echo  $i == $pageIndeHistory ? 'class=active' : '' ?>> <?php echo $i + 1 ; ?></a>
				<?php endfor ?>
			</div>
	</div>

	

	

	
	<!-- 脚注 -->
	<?php 
		include_once("inc/foot.php");
	 ?>

	<script type="text/javascript" src="lib/js/jquery.js"></script>
	<script type="text/javascript" src="js/myOrders.js"></script>
</body>
</html>