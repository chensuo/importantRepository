<?php 
	//检验是否登录 否则跳转登录页面
	error_reporting(E_ALL ^ E_NOTICE);//隐藏登录后 开始Session与header页面冲突
	session_start();

	if(!array_key_exists("Current", $_SESSION)){
		header("location:login.php");
		exit;
	}
	else{
		require_once("service/dataService.php");
		require_once("service/golableService.php");
		$userId = $_SESSION["CurrentId"];
		//获取该用户借书架信息
		// $books = readData(getUserBooksSql($userId));

		/*
			分页
		*/
		$pageSize = 6;
		$pageIndex = 0;
		$newSql = getUserBooksSql($userId);
		$secSql = getUserBooksNumSql($userId);
		$list = showPage($newSql , $secSql , $pageIndex , $pageSize);  //数据总行数
		
		$count = count($list["books"]);
		if(array_key_exists("pageIndex" , $_GET)){
			$pageIndex = $_GET["pageIndex"];
			$list = showPage($newSql , $secSql , $pageIndex , $pageSize);
		}
		$totalPageCount = ceil($list["totalRowsNum"] / $pageSize);

		

	}
	if(array_key_exists("pageIndex" , $_GET)){
		$pageIndex = $_GET["pageIndex"];
	}
	else{
		$pageIndex = 0;
	}

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(array_key_exists("checkAll" , $_POST))
			header("location:delAll.php");
		else{
			returnMessages("您没有选中任何图书(暂时只能选中全部)!" , "myBooks.php");
		}
	}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>myBooks</title>
	<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<link rel="stylesheet" type="text/css" href="css/foot.css">
	<link rel="stylesheet" type="text/css" href="css/golable.css">
	<link rel="stylesheet" type="text/css" href="css/myBooks.css">
	<link rel="stylesheet" type="text/css" href="lib/css/font-awesome.min.css">
</head>
<body>
	 <!-- 头部 -->
	<?php 
		include_once("inc/header.php");
	 ?>
	<!-- 位置 -->
	<div class="weizhi">
		<div><a href="index.php"><i class="glyphicon glyphicon-home"></i> 首页</a> 〉<span>借书架</span>
			<a href="books.php">继续借书</a></div>
	</div>

	<!-- 正体 -->
	<div class="myBooks-container">
		<form method="post">
			<table class="table table-striped bookData-tb">
				<thead>
					<tr>
						<th><input type="checkbox" name="checkAll" class="checkAll">&nbsp;全选</th>
						<th>封面</th>
						<th>书名</th>
						<th>作者</th>
						<th>出版社</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					if(count($list["books"]) > 0){
					foreach ($list["books"] as $index => $item){?>
					<tr class="dataTr">
						<td><input type="checkbox" name="checkThis"  class="checkThis"></td>
						<td><img src="<?php echo IMAGE_URL . $item["image"] ?>"></td>
						<td>《<?php echo $item["name"] ?>》</td>
						<td><?php echo $item["authorName"] ?></td>
						<td><?php echo $item["publisherName"]?></td>
						<td><a data-toggle="modal" href="del.php?bookId=<?php echo $item["id"] ?>&pageIndex=<?php echo $pageIndex ?>" class="remove-this btn btn-default"><i class="fa fa-trash"></i> 移除</a></td>
					</tr>
					</tbody>
					<?php } ?>
					<tfoot>
						<tr>
							<th colspan="4"><button class="btn btn-default" style="outline: none"><i class="fa fa-trash"></i> 移除选中图书</button></th>
							<th colspan="2"><button type="button" id="btnSubmit"  data-toggle="modal" class="btn btn-danger borrwoChosed"><i class="fa fa-check-square-o">&nbsp;</i>借阅选中图书</button></th>
						</tr>
					</tfoot>
					<?php } else{ ?>
					<tr>
						<td colspan="6" class="noBooksShow-thir">
							<span class="noBooksShow">您还没有收藏图书，快去看看吧！ <a href="books.php">我要借书</a></span>
						</td>
					</tr>
					<?php } ?>
				
				
			</table>
		</form>
		<!-- 分页 -->
		<div class="pageContainer">
			<?php for($i = 0 ; $i < $totalPageCount ; $i++): ?>
			<a  href = "myBooks.php?pageIndex=<?php echo $i; ?>" <?php echo  $i == $pageIndex ? 'class=active' : '' ?>> <?php echo $i + 1 ; ?></a>
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
<script type="text/javascript" src="js/myBooks.js"></script>
<script type="text/javascript" src="lib/js/bootstrap.min.js"></script>
</body>
</html>