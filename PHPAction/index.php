<?php 


	require_once("service/dataService.php");
	require_once("service/golableService.php");

	/*获取轮播广告图片*/
	$adLits = readData(getAdvantSql());

	/*获取首页所有推荐栏目*/
	$homeSections = readData(getHomeSectionsSql());

	

 ?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>首页</title>
	<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/foot.css">
	<link rel="stylesheet" type="text/css" href="css/ad.css">
	<link rel="stylesheet" type="text/css" href="lib/css/font-awesome.min.css">

</head>
<body>

	 <!-- 头部 -->
	<?php 
		include_once("inc/header.php");
	 ?>
   	<!-- 轮播 -->
   	 <div class="ad-wrapper">
        <div class="image-wrapper">
        	<?php foreach ($adLits as $item): ?>
	            <img src="<?php echo IMAGE_URL . $item["Image"]; ?>" alt="<?php echo $item["Link"]; ?>"/>
	        <?php endforeach ?> 
        </div>
        <div class="arrow-left">〈</div>
        <div class="arrow-right">〉</div>
        <div class="wrapper">
			<?php for($i = 0 ; $i < count($adLits) ; $i++): 
			?>
	            <button></button>
	        <?php endfor ?>
        </div>
    </div>

	<!-- 图书推荐列表 -->
	<?php foreach ($homeSections as $item){ ?>
		<div class="list-title">
			<i></i>
			<span><?php echo $item["name"];  ?></span>
		</div>
		<div class="get-more-show"><span>查看更多 〉</span></div>
		<div class="list-item-contianer">
		<?php 
		//获取该列表下图书
		$homeSectionsBooks = readData(getHomeSectionsBooksSql($item["id"]));
		foreach ($homeSectionsBooks as $index => $itemSec) {
		 ?>
		
			<a href="detail.php?bookId=<?php echo $itemSec["id"]; ?>">
				<span>《<?php echo $itemSec["name"]; ?>》</span>
				<i><span>作者：</span><?php echo $itemSec["authorName"]; ?></i>
				<img src="<?php echo IMAGE_URL . $itemSec["image"]; ?>" alt=""/>
			</a>
		
			<?php } ?>
		</div>
	<?php } ?>



	<!-- 脚注 -->
	<?php 
		include_once("inc/foot.php");
	 ?>
	
	<script type="text/javascript" src="lib/js/jquery.js"></script>
	<!-- <script type="text/javascript" src="lib/js/bootstrap.min.js"></script> -->
	<script type="text/javascript" src="js/home.js"></script>
	<script type="text/javascript" src="js/ad.js"></script>
</body>
</html>