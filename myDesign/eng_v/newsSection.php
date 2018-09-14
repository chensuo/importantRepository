<?php 
	require_once("services/dataService.php");
	require_once("services/globalService.php");

	/*获取传的Id*/
	if(array_key_exists("Id" , $_GET)){
		$sectionId = $_GET["Id"];
		// $news = readData(getThisNewSectionSql($sectionId));

		/*获取该栏目信息*/
		$newsSection = readData(getThisNewsSectionSql($sectionId));

		/*获取热门模块 模块信息*/
    	$newsSectionGuide = readData(getNewsSectionSql());

		/*获取该栏目下新闻信息并且 分页*/
		$pageSize = 6;
		$pageIndex = 0;
		
		$newSql = getThisNewSectionSql($sectionId);
		$secSql = getNewSectionNewsNumSql($sectionId);
		$list = showPage($newSql , $secSql , $pageIndex , $pageSize);  //数据总行数
		
		$count = count($list["data"]);
		if(array_key_exists("pageIndex" , $_GET)){
			$pageIndex = $_GET["pageIndex"];
			$list = showPage($newSql , $secSql , $pageIndex , $pageSize);
		}
		$totalPageCount = ceil($list["totalRowsNum"] / $pageSize);


	}
	else{
		returnMessages("没有该模块的信息!");
		exit;
	}




	
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>热门模块</title>
	<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="lib/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/global.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/foot.css">
	<link rel="stylesheet" type="text/css" href="css/news.css">
	<link rel="stylesheet" type="text/css" href="css/newsSection.css">
	<link rel="stylesheet" type="text/css" href="lib/css/star.css">
	
</head>
<body>
	<!-- 头部 -->
	<?php 
		include_once("inc/header.php");
	?>
	 <!-- 星星特效 -->
    <canvas id="canvas" style="position: absolute; z-index: -10;bottom: 0;top:100px;right: 0;left: 0" ></canvas>
	<!-- 主体 -->
	<div class="news-container">
		<div class="news-nav">
				<a href="index.php">首页</a><em>›</em>
				<a href="index.php">热门模块</a><em>›</em>
				<a href=""><?php echo $newsSection[0]["SectionName"] ?></a>
			</div>
		<div class="left-container">
			<!-- 模块名称 -->
			<div class="section-title">
    			<img src="<?php echo $newsSection[0]["Image"] ?>">
    			&nbsp;<i><?php echo $newsSection[0]["SectionName"] ?></i>
    			<span></span>
    		</div>
    		<!-- 该模块下文章项目 -->
    		<?php  foreach ($list["data"] as $item) : ?>
    		<div class="section-news-item">
    			<div class="section-news-item-title">
    				<a href="news.php?Id=<?php echo $item["Id"] ?>"><?php echo $item["Title"] ?></a>
    			</div>
    			<div class="section-news-item-content">
    				<span><?php echo $item["Intro"] ?></span>
    				<?php if($item["Image"]):  ?>
	    				<a href="news.php?Id=<?php echo $item["Id"] ?>">
	    					<img src="<?php echo IMAGE_URL . $item["Image"] ?>">
	    				</a>
	    			<?php endif ?>
    			</div>
    			<div class="section-news-item-info">
    				<span>发布时间：<?php showTime($item["Time"]) ?></span>
    				<i>查看：<?php echo $item["ReadNum"] ?></i>
    			</div>
    		</div>
    		<?php endforeach ?>
		
		<!-- 分页 -->
		<div class="pageContainer newsSectionPage">
			<a href="index.php">返回</a>
			<?php for($i = 0 ; $i < $totalPageCount ; $i++): ?>
				<a class="notScroll <?php echo  $i == $pageIndex ? 'active' : '' ?>"  href = "newsSection.php?Id=<?php echo $sectionId?>&pageIndex=<?php echo $i; ?>"> <?php echo $i + 1 ; ?></a>
			<?php endfor ?>
		</div>

		</div>

		<div class="right-container">
			<div class="right-content">
				<div class="right-content-title">
					热门模块
				</div>
				<div class="hot-section-guide">
					<!-- 热门模块项目 -->
					<?php foreach ($newsSectionGuide as $index => $item): ?>
						<div class="guide-item">
	    					<a class="notScroll" href="newsSection.php?Id=<?php echo $item["Id"] ?>">
								<img src="<?php echo $item["Image"]?>">
								<span style="color: <?php echo $item["SectionName"] == $newsSection[0]["SectionName"] ? '#3FB7FD' : '#515D7A';  ?>"><?php echo $item["SectionName"] ?></span>
							</a>
	    				</div>
	    			<?php endforeach ?>
				</div>
			</div>
		</div>
		
	</div>
	<!-- 脚注 -->
	<?php 
		include_once("inc/foot.php");
	 ?>

	<script type="text/javascript" src="lib/js/jquery.js"></script>
    <script type="text/javascript" src="lib/js/star.js"></script>
    <script type="text/javascript" src="js/notScroll.js"></script>


</body>
</html>