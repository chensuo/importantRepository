<?php 
	require_once("services/dbHelper.php"); 
    require_once("services/dataService.php");
    require_once("services/globalService.php"); 
    @session_start();

    /*验证是否登录*/
    if(array_key_exists("CurrentAdmin", $_SESSION)){
    	$currentUser = $_SESSION["CurrentAdmin"];
    }
    else{
    	header("location:login.php");
    }

    if(array_key_exists("Id" , $_GET)){
    	/*获取了新闻Id*/
    	$Id = $_GET["Id"];
    	
    	/*获取新闻信息*/
    	$new = readData(getThisNewsSql($Id));

    }
    else{
    	returnMessages('没有该新闻信息!' , 'newsDetail.php');
    	exit;
    }
    @$backURL = $_SERVER["HTTP_REFERER"];

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>frontier管理系统</title>
	<link rel="stylesheet" href="lib/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="lib/css/font-awesome.css"/>
	<link rel="stylesheet" href="css/global.css"/>
	<link rel="stylesheet" href="css/newsDetailInfo.css"/>

</head>
<body>
	<!-- 页眉 -->
	<?php 
		include_once("inc/header.php");
	 ?>


	<div class="container-fluid">
    <div class="row">
        <?php 
        	include_once("inc/nav.php");
         ?>

        <!-- 主体部分-->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <div class="main-container">
            	<!-- 主体 -->
              <div class="page-body">
			    <div class="child-header">新闻详情<span>News Detail</span></div>
			    <div class="page-main-container">
			    	 <!--  -->
			        <div class="page-top-container">
			            <!--添加新类别按钮-->
			            <a href="newsDetail_writeNews.php?sectionId=<?php echo readData(getThisNewsSectionNameSql($new[0]["SectionId"]))[0]["Id"] ?>" type="button" class="btn btn-info btn-add-new"><i class="fa fa-edit"></i> 发布新闻</a>
			            <a href="newsDetail.php" class="btn btn-default "><i class="fa fa-history"></i> 返回列表</a>
			        </div>
			      	
			        <!-- 内容区域 -->
			        <div class="page-content">
			        	<div class="newsDetail-container">
			        		<div class="news-title-main">所属模块：<?php echo readData(getThisNewsSectionNameSql($new[0]["SectionId"]))[0]["SectionName"] ?></div>
			        		<div class="news-title"><span><?php echo $new[0]["Title"] ?></span><i>发布时间：<?php echo showTimeSec($new[0]["Time"]) ?></i><em>查看：<?php echo $new[0]["ReadNum"] ?></em></div>
			        		<div class="news-content">
								<div class="news-intro">
									<span>摘要：</span><?php echo $new[0]["Intro"] ?></div>
									<?php if($new[0]["Image"]){ ?>
									<img src="<?php echo IMAGE_URL . $new[0]["Image"] ?>">
									<?php } ?>
									<?php if($new[0]["Image1"]){ ?>
										<img src="<?php echo IMAGE_URL . $new[0]["Image1"] ?>">
									<?php } ?>
									<?php if($new[0]["Image2"]){ ?>
										<img src="<?php echo IMAGE_URL . $new[0]["Image2"] ?>">
									<?php } ?>
									<?php if($new[0]["Image3"]){ ?>
										<img src="<?php echo IMAGE_URL . $new[0]["Image3"] ?>">
									<?php } ?>
									<div class="news-info"><?php echo $new[0]["Content"] ?></div>
							</div>
			        		
			        	</div>
			        </div>

			       
			    </div>
			</div>

            </div>
        </div>
    </div>
</div>
	<script type="text/javascript" src="lib/js/jquery.js"></script>
	<script type="text/javascript" src="js/notScroll.js"></script>

</body>
</html>