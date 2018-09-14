<?php
    require_once("services/dbHelper.php"); 
    require_once("services/dataService.php");
    require_once("services/globalService.php");
    /*获取热门模块 模块信息*/
    $newsSection = readData(getNewsSectionSql());

    /*获取社区模块导航 模块信息*/
    $notesSection = readData(getNotesSectionSql());

    /*获取最新焦点版块 新闻信息(点击量超过20且存在首图且最多七个按照时间倒序)*/
    $newestNews = readData(getNewestNewsSql());

    /*获取社区热帖模块 推荐帖子信息*/
    $newestNotes = readData(getNewestNotesIndexSql(10));/*暂放10条*/


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>index</title>
	<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="lib/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/ad.css">
	<link rel="stylesheet" type="text/css" href="css/global.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/foot.css">
    <link rel="stylesheet" type="text/css" href="css/home.css">
	<link rel="stylesheet" type="text/css" href="lib/css/star.css">
</head>
<body> 

	<!-- 头部 -->
	<?php 
		include_once("inc/header.php");
	?>
    <!-- 星星特效 -->
    <canvas id="canvas" style="position: absolute; z-index: -10; top: 0px" ></canvas>

	<!-- 轮播 -->
	 <div class="ad-wrapper" style="position: relative;z-index: 10">
        <div class="image-wrapper">
	        <a href="news.php?Id=99a0cc1f-205c-11e8-9c83-14dda97c5664"><img src="image/l1.jpg" alt="" title="Solar power" /><span>Solar power</span></a>
	   		<a href="news.php?Id=65280106-20e5-11e8-8cc7-14dda97c5664"><img src="image/l2.jpg" alt="" title="Aeronautical Manufacturing"/><span>Aeronautical Manufacturing</span></a>
	        <a href="news.php?Id=8db50ede-20e1-11e8-8cc7-14dda97c5664"><img src="image/l3.jpg" alt="" title="Mechanical manufacture"/><span>Mechanical manufacture</span></a>
	        <a href="news.php?Id=e877ed56-20e2-11e8-8cc7-14dda97c5664"><img src="image/l4.jpg" alt="" title="Engine manufacturing"/><span>Engine manufacturing</span></a>
	        <a href="news.php?Id=3e5fbf52-20e4-11e8-8cc7-14dda97c5664"><img src="image/l5.jpg" alt="" title="Remote control model technology"/><span>Remote control model technology</span></a>
        </div>
        <div class="arrow-left glyphicon glyphicon-chevron-left"></div>
        <div class="arrow-right glyphicon glyphicon-chevron-right"></i></div>
        <div class="wrapper">
	        <button></button>
	        <button></button>
	        <button></button>
	        <button></button>
	        <button></button>
        </div>
    </div>

    <!-- 主体 -->
    <div class="main-container">
    	<div class="main-left">
    		<div class="hot-section-container">
    			<div class="section-title">
    				<i class="glyphicon glyphicon-th-list"></i>
    			&nbsp;Hot
    			<span></span>
    			</div>
    			<!-- 热门模块项目 -->
    			<div class="section-item-container">
                    <?php foreach ($newsSection as $item) { ?>
    				<a href="newsSection.php?Id=<?php echo $item["Id"] ?>" class="section-item">
    					<img src="<?php echo $item["Image"]?>">
    					<div><?php echo $item["SectionName"] ?></div>
    				</a>
                    <?php } ?>
    			</div>
    			
    			
    		</div>
    		<div class="hot-news-container">
    			<div class="section-title">
    				<i class="fa fa-newspaper-o"></i>
    			&nbsp;Latest
    			<span></span>
    			</div>
    			<!-- 热门新闻项目 -->
    			<?php foreach ($newestNews as $item) { ?>
    			<div class="hot-news-item">
    				<a href="news.php?Id=<?php echo $item["Id"] ?>"><img src="<?php echo IMAGE_URL . $item["Image"] ?>" title="<?php echo $item["Title"] ?>"></a>
    				<div>
    					<div class="hot-news-title"><a title="<?php echo $item["Title"] ?>" href="news.php?Id=<?php echo $item["Id"] ?>"><?php echo $item["Title"] ?></a><span><?php showTime($item["Time"]) ?></span>
                            <i class="readNumShow">View amount：<?php echo $item["ReadNum"]?></i></div>
    					<div class="hot-news-content"><a href="news.php?Id=<?php echo $item["Id"] ?>" title="<?php echo $item["Title"] ?>"><?php echo $item["Content"] ?></a></div>
    				</div>
    			</div>
    			<?php } ?>
    		</div>
    	</div>
    	<div class="main-right" style="margin-right: 0px;">
    		<div class="hot-note-container">
    			<div class="right-part-title">
    			&nbsp;Newest
    			<span></span>
    			<a href="community.php">more 〉</a>
    			</div>
    			<div class="hot-note-content">
	    			<ul>
	    			<!-- 社区新帖项目 -->
	    			<?php foreach ($newestNotes as $item) { ?>
	    				<a href="note.php?Id=<?php echo $item["Id"] ?>" class="hot-note-item">
	    					<li><?php echo $item["Title"] ?></li>
	    				</a>
	    			<?php } ?>

	    			</ul>
    			</div>
    	</div>

    		<div class="best-note-container">
				<div class="right-part-title">
    				&nbsp;Community navigation
    			</div>
    			<div class="guide-content">
    				<!-- 社区导航项目 -->
                    <div class="guide-item">
                            <a href="community.php">
                                <img src="image/nav1.png">
                                <span>最新发帖</span>
                            </a>
                    </div>
                    <?php foreach ($notesSection as $index => $item) :?>
        				<div class="guide-item">
        					<a href="community.php?sectionId=<?php echo $item["Id"] ?>">
    							<img src="<?php echo $item["Image"] ?>">
    							<span><?php echo $item["SectionName"] ?></span>
    						</a>
        				</div>
                    <?php endforeach ?>
    			</div>
    		</div>
    		<div class="wixin-logo-container">
    			<div class="right-part-title">
    				&nbsp;Contact us
    			</div>
    			<img src="image/wixin.jpg">
    			<div>scan and scan</div>
    		</div>
    		<div class="return-top">
    			<i class="glyphicon glyphicon-arrow-up"></i> 
    			Back to the top
    		</div>
    </div>
</div>
	

    <!-- 脚注 -->
    <?php 
		include_once("inc/foot.php");
	?>
	

	<script type="text/javascript" src="lib/js/jquery.js"></script>
	<script type="text/javascript" src="js/ad.js"></script>
	<script type="text/javascript" src="js/home.js"></script>
	<script type="text/javascript" src="js/global.js"></script>
    <script type="text/javascript" src="js/notScroll.js"></script>
    <script type="text/javascript" src="lib/js/star.js"></script>

</body>
</html>