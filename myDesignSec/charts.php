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

    if(array_key_exists("mainPage" , $_GET)){
    	$mainPage = $_GET["mainPage"];
    }
    else{
    	$mainPage = 1;

    }



 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>frontier管理系统</title>
	<link rel="stylesheet" href="lib/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="lib/css/font-awesome.css"/>
	<link rel="stylesheet" href="css/global.css"/>
	<link rel="stylesheet" href="css/charts.css"/>

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
			    <div class="child-header">数据统计分析<span>Statistical analysis of data</span></div>
			    <div class="page-main-container">
			        <!-- 内容区域 -->
			        	<ul class="nav nav-tabs">
							  <li role="presentation" title="选择该模块" class="<?php echo $mainPage == 1?'active':'' ?>"><a href="charts.php?mainPage=1" class="sectionId-a">新闻模块</a></li>
							  <li role="presentation" title="选择该模块" class="<?php echo $mainPage == 2?'active':'' ?>"><a href="charts.php?mainPage=2" class="sectionId-a">帖子模块</a></li>
				  			<input type="hidden" class="sectionId-input-sec" name="sectionIdInputSec">
						</ul>
			        <div class="page-content container">
			        		<!-- 新闻模块 各模块总和点击量 -->
							<div style=<?php echo $mainPage == 1 ? 'display:inline-block':'display:none' ?> class="firstChart" id="firstChart"></div>
						    <div style=<?php echo $mainPage == 1 ? 'display:inline-block':'display:none' ?> class="secChart" id="secChart"></div>
			        		<!-- 帖子模块 各模块发帖量和评论数量 -->
							<div style=<?php echo $mainPage == 2 ? 'display:inline-block':'display:none' ?> class="firstChart" id="thiChart"></div>
						    <div style=<?php echo $mainPage == 2 ? 'display:inline-block':'display:none' ?> class="secChart" id="fouChart"></div>
					    
			        </div>
			    </div>
			</div>

            </div>
        </div>
    </div>
</div>

 <script src="lib/js/jquery.js"></script>
 <script src="lib/js/echarts.min.js"></script>
 <script src="js/charts.js"></script>
	
</body>
</html>