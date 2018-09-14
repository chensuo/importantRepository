<?php 
	require_once("services/dbHelper.php"); 
    require_once("services/dataService.php");
    require_once("services/globalService.php");
    if(array_key_exists("memberId", $_GET)){
    	$memberId = $_GET["memberId"];
    	if(array_key_exists("mainPage", $_GET)){
    		$mainPage = $_GET["mainPage"];
    	}
    	else{
    		$mainPage = 1;
    	}
    	/*获取他的基本信息*/
    	$hisInfo = readData(getHisInfoSql($memberId));

    	/*获取他的帖子*/
    	$hisNotes = readData(getHisNotesSql($memberId));
    }
    else{
    	returnMessages("没有该用户信息!" , "community.php");
		exit;
    }
    @session_start();

    if(array_key_exists("Current", $_SESSION)){
    	$currentUser = $_SESSION["Current"];
    }
    else{
    	$currentUser = null;
    }
   
	
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>其他用户信息</title>
	<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="lib/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/global.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/foot_sec.css">
	<link rel="stylesheet" type="text/css" href="css/otherUser.css">
	<link rel="stylesheet" type="text/css" href="lib/css/star.css">

</head>
<body>
	<!-- 头部 -->
	<?php 
		include_once("inc/header.php");
	?>
	<!-- 星星特效 -->
    <canvas id="canvas" style="position: absolute; z-index: -10; top: 0px" ></canvas>
	<!-- 主体 -->
	<div class="main-container">
		<!-- 头部 -->
		<div class="main-header">
			<div>
				<div class="header-container">
					<?php if($hisInfo[0]["Header"]){ ?>
						<img src="<?php echo  $hisInfo[0]["Header"]?>">
					<?php }else{ ?>
						<img src="image/default.png">
					<?php } ?>
				</div>
				<div class="name-container"><?php echo $hisInfo[0]["Name"] ?></div>
				<?php if($hisInfo[0]["Sign"]){ ?>
					<div class="sign-container"><?php echo $hisInfo[0]["Sign"] ?></div>
				<?php }else{ ?>
					<div class="sign-container">暂无签名</div>
				<?php } ?>
			</div>
		</div>
		<div class="main-nav">
			<ul class="nav nav-tabs">
			  <li role="presentation" class="<?php echo $mainPage == 1?'active':''   ?>"><a href="otherUser.php?mainPage=1&memberId=<?php echo $memberId ?>">基本信息</a></li>
			  <li role="presentation" class="<?php echo $mainPage == 2?'active':''   ?>"><a href="otherUser.php?mainPage=2&memberId=<?php echo $memberId ?>">他的帖子</a></li>
			</ul>
		</div>
		<div class="main-content-container">
			<?php if($mainPage == 1){ ?>
				<div class="userinfo-dv">性别：<?php echo $hisInfo[0]["Sex"]?></div>
				<div class="userinfo-dv">星座：<?php echo $hisInfo[0]['Star'] == ''?'暂无星座':$hisInfo[0]["Star"] ?></div>
				<div class="userinfo-dv">邮箱：<?php echo $hisInfo[0]['Email'] == ''?'暂无邮箱':$hisInfo[0]["Email"] ?></div>
				<div class="userinfo-dv">他的帖子：<a style="color:#515D7A" href="otherUser.php?mainPage=2&memberId=<?php echo $memberId ?>">123</a></div>
				<!-- <div class="userinfo-dv"><a href="community.php">返回社区</a></div> -->
			<?php } else{ ?>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>标题</th>
							<th>版块</th>
							<th>回复</th>
							<th>最后发帖</th>
						</tr>
					</thead>
					<tbody>
						<?php if(!$hisNotes){  ?>
						<tr>
							<td colspan="4" style="text-align: center;">该用户还没有发帖哦！</td>
						</tr>
						<?php  }else{?>
						<?php foreach ($hisNotes as $index => $item) { ?>
							<tr>
								<td><nobr><a style="font-size:15px" href="note.php?Id=<?php echo $item["Id"] ?>"><?php echo $item["Title"] ?>&nbsp;
									<?php if($item["Image"] || stristr($item["Content"] , '<img src')){ ?>
										<img src="image/hasImage.gif">
									<?php } ?>
								</a></nobr></td>
								<td><nobr><a href="community.php?sectionId=<?php echo $item["SectionId"] ?>"><?php echo readData(getHisNotesSectionNameSql($item["Id"]))[0]["SectionName"] ?></a></nobr></td>
								<td><nobr><a href="note.php?Id=<?php echo $item["Id"] ?>"><?php echo readData(getThisNoteCommentsNumSql($item["Id"]))[0]["count"] ?></a></nobr></td>
								<?php if(readData(getThisNoteNewsCommenterSql($item["Id"])) ){  ?>
								
								<?php if(readData(getThisNoteNewsCommenterSql($item["Id"]))[0]["Id"] != $currentUser["Id"]){ ?>
								<td><nobr><span><a href="otherUser.php?memberId=<?php echo readData(getThisNoteNewsCommenterSql($item["Id"]))[0]["Id"] ?>"><?php echo readData(getThisNoteNewsCommenterSql($item["Id"]))[0]["Name"] ?></a></span><em><?php showTime($item["Time"]) ?></em></nobr></td>
								<?php }else{ ?>
									<td><nobr><span><a href="user.php"><?php echo readData(getThisNoteNewsCommenterSql($item["Id"]))[0]["Name"] ?></a></span><em><?php showTime($item["Time"]) ?></em></nobr></td>

								<?php }}else{?>
								<td>--</td>
								<?php } ?>
							</tr>
						<?php }} ?>

					</tbody>
				</table>
			<?php } ?>

		</div>
		<?php 
			include_once("inc/foot_sec.php");
		 ?>
	</div>
	
	<script type="text/javascript" src="lib/js/jquery.js"></script>
    <script type="text/javascript" src="js/notScroll.js"></script>
    <script type="text/javascript" src="js/otherUser.js"></script>
    <script type="text/javascript" src="lib/js/star.js"></script>


</body>
</html>