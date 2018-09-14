<?php 
	require_once("service/dataService.php");
	require_once("service/golableService.php");
	
	if(array_key_exists("bookId" , $_GET)){
		$bookId = $_GET["bookId"];
		//获取该书信息
		$book = readData(getBookDetailSql($bookId));

		
		$returnBack = $_SERVER["HTTP_REFERER"];

		//获取作者信息
		$author = readData(getAuthorSql($book[0]["authorId"]));
	}
	else{
		//验证是该书是否存在 不存在即跳回books.php
		returnMessages("没有该书的信息!" , "books.php");
		exit;
	}

	

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>detail</title>
	<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/foot.css">
	<link rel="stylesheet" type="text/css" href="css/detail.css">
	<link rel="stylesheet" type="text/css" href="lib/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/golable.css">


</head>
<body>
	 <!-- 头部 -->
	<?php 
		include_once("inc/header.php");
	 ?>

	 <div class="weizhi">
		<div><a href="index.php"><i class="glyphicon glyphicon-home"></i> 首页</a> 〉<a href="books.php">图书商城</a> 〉<span>图书详情</span>
		<a href="<?php echo $returnBack ?>">返回上页</a></div>
	</div>

	 <!-- 正体 -->
	 <div class="detail-container">
	 	<div class="bookDataDetail-container">
            <div class="bookDataDetail-title">基本详情 <button class="btn btn-default returnback"><i class="fa fa-history"></i>&nbsp;看看其他书</button></div>
            <div class="bookDataDetail-little">
                <div><i>书名:</i><span><nobr>《<?php echo $book[0]["name"]?>》</nobr></span> <i>作者:</i><span><nobr><?php echo $book[0]["authorName"]?></nobr></span></div>
                <div><i>出版社:</i><span><nobr><?php echo $book[0]["publisherName"]?></nobr></span> <i>类别:</i><span><nobr><?php echo $book[0]["categoryName"]?></nobr></span></div>
                <div><i>出版日期:</i><span><nobr><?php echo $book[0]["publishDate"]?></nobr></span> <i>可借/库存:</i><span><nobr><?php echo $book[0]["borrowNum"] ?>/<?php echo $book[0]["Amount"]?></nobr></span></div>
                <img src="<?php echo IMAGE_URL . $book[0]["image"] ?>" alt=""/>
            </div>
            <div class="hr"></div>
            <div class="operator-container">
            	<button <?php echo $book[0]["borrowNum"] == 0 ? 'disabled' : '' ?> <?php echo $book[0]["borrowNum"] == 0 ? 'id=detail-btn-disabled' : '' ?> class="btn btn-danger btn-add" data-toggle="modal" data-book-id="<?php echo $bookId; ?>"><i class="fa fa-heart">&nbsp;</i><?php echo $book[0]["borrowNum"] == 0 ? '暂无可借书' : '加入借书架' ?></button>
            	<a href="myBooks.php" class="btn btn-success"><i class="fa fa-book">&nbsp;</i>我的借书架</a>
            </div>
            <div class="bookDataDetail-title">《<?php echo $book[0]["name"]?>》简介</div>
            <div class="bookDataDetail-introduce"><?php echo $book[0]["introduce"]; ?></div>
            <div class="bookDataDetail-title"><?php echo $book[0]["authorName"]?></div>
            <div class="bookDataDetail-introduce"><?php echo $author[0]["Introduce"]; ?></div>
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
	<script type="text/javascript" src="js/golable.js"></script>
	<script type="text/javascript" src="js/books.js"></script>
</body>
</html>