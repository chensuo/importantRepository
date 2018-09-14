<?php 
 	require_once("services/dataService.php");
    require_once("services/globalService.php");

    /*获取传的Id*/
    if(array_key_exists("Id" , $_GET)){
    	$newsId = $_GET["Id"];
    	$news = readData(getThisNewsSql($newsId));

    	/*查看量+1*/
    	readData(calcReadNumSql($newsId) , 'no');

    	/*获取当前模块 模块信息*/
   		$newsSectionThis = readData(getThisNewsSectionSql($news[0]["SectionId"]));

   		/*获取热门模块 模块信息*/
    	$newsSection = readData(getNewsSectionSql());

    	$previousNews = readData(getRoundNewsSql($news[0]["PositionId"]+1 , $newsSectionThis[0]["Id"]));
    	$nextNews = readData(getRoundNewsSql($news[0]["PositionId"]-1 , $newsSectionThis[0]["Id"]));
    }

    

	/*返回上一界*/
	@$returnBack = $_SERVER["HTTP_REFERER"];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>新闻详情</title>
	<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="lib/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/global.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/foot.css">
	<link rel="stylesheet" type="text/css" href="css/news.css">
	<link rel="stylesheet" type="text/css" href="lib/css/star.css">

</head>
<body>
	<!-- 头部 -->
	<?php 
		include_once("inc/header.php");
	?>
	<!-- 星星特效 -->
    <canvas id="canvas" style="position: absolute; z-index: -10;bottom: 0;top:100px;right: 0;left: 0" ></canvas>
	<!-- <p style="font-size: 30px;">新闻详情</p> -->
	<!-- 主体 -->
	<div class="news-container">
		<div class="news-nav">
				<a href="index.php">首页</a><em>›</em>
				<a href="newsSection.php?Id=<?php echo $newsSectionThis[0]["Id"] ?>"><?php echo $newsSectionThis[0]["SectionName"] ?></a><em>›</em>
				<a href=""><?php echo $news[0]["Title"] ?></a>
			</div>
		<div class="left-container">
			<div class="news-title"><span><?php echo $news[0]["Title"] ?></span><i>发布时间：<?php echo date("Y-m-d" , $news[0]["Time"]) ?></i><em>查看：<?php echo $news[0]["ReadNum"]?></em></div>

			<!-- 新闻内容 -->
			<div class="news-content">
				<div class="news-intro">
					<span>摘要：</span><?php echo $news[0]["Intro"] ?>
				</div>
				<?php if($news[0]["Image"]){ ?>
					<img src="<?php echo IMAGE_URL . $news[0]["Image"] ?>">
				<?php } ?>
				<?php if($news[0]["Image1"]){ ?>
					<img src="<?php echo IMAGE_URL . $news[0]["Image1"] ?>">
				<?php } ?>
				<?php if($news[0]["Image2"]){ ?>
					<img src="<?php echo IMAGE_URL . $news[0]["Image2"] ?>">
				<?php } ?>
				<?php if($news[0]["Image3"]){ ?>
					<img src="<?php echo IMAGE_URL . $news[0]["Image3"] ?>">
				<?php } ?>
				<div class="news-info">
					<?php echo $news[0]["Content"] ?>
				</div>
				<div class="click-div">
					<span><img src="image/xianhua.gif">鲜花</span>
					<span><img src="image/woshou.gif">握手</span>
					<span><img src="image/leiren.gif">雷人</span>
					<span><img src="image/luguo.gif">路过</span>
					<span><img src="image/jidan.gif">鸡蛋</span>
				</div>
				<div class="operator-div">
					<div>上一篇：
						<?php if($previousNews): ?>
							<a href="news.php?Id=<?php echo $previousNews[0]['Id'] ?>"><?php echo $previousNews[0]["Title"] ?></a>
						<?php endif ?>
					</div>
					<div>下一篇：
						<?php if($nextNews): ?>
						<a href="news.php?Id=<?php echo $nextNews[0]['Id']?>"><?php echo $nextNews[0]["Title"] ?></a>
						<?php endif ?>
						<a href="newsSection.php?Id=<?php echo $newsSectionThis[0]["Id"] ?>">返回</a></div> 
					<!-- 写到这 -->
				</div>
			</div>
		</div>

		<div class="right-container">
			<div class="right-content">
				<div class="right-content-title">
					热门模块
				</div>
				<div class="hot-section-guide">
					<!-- 热门模块项目 -->
					<?php foreach ($newsSection as $item) { ?>
					<div class="guide-item">
    					<a href="newsSection.php?Id=<?php echo $item["Id"] ?>">
							<img src="<?php echo $item["Image"] ?>">
							<span style="color: <?php echo $item["SectionName"] == $newsSectionThis[0]["SectionName"] ? '#3FB7FD' : '#515D7A';  ?>"><?php echo $item["SectionName"] ?></span>
						</a>
    				</div>
					<?php } ?>
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
	 
	
</body>
</html>