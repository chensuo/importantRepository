<?php 
	require_once("services/dbHelper.php"); 
    require_once("services/dataService.php");
    require_once("services/globalService.php");
    @session_start();
    /*返回上一界*/
	@$returnBack = $_SERVER["HTTP_REFERER"];

    if(array_key_exists("Current", $_SESSION)){
    	$currentUser = $_SESSION["Current"];
    }
    else{
    	$currentUser = null;
    }
    if(array_key_exists("mainPage", $_GET)){
    	$mainPage = $_GET["mainPage"];
    }
	else{
		$mainPage = 1;
	}
	/*我的发帖*/
	$mineNotes = readData(getHisNotesSql($currentUser["Id"]));

	/*正在审核*/
	$mineSecNotes = readData(getHisNotesSql($currentUser["Id"] , 0));

	/*审核失败*/
	$mineThiNotes = readData(getHisNotesSql($currentUser["Id"] , 2));

	$msg = null;
	$color = null;
	if(array_key_exists("MessageShow" , $_SESSION)){
		$msg = $_SESSION["MessageShow"];
		unset($_SESSION["MessageShow"]);
	}
	if(array_key_exists("colorShow" , $_SESSION)){
		$color = $_SESSION["colorShow"];
		unset($_SESSION["colorShow"]);
	}

	
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>关于我的</title>
	<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="lib/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/global.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/foot_sec.css">
	<link rel="stylesheet" type="text/css" href="css/otherUser.css">
	<link rel="stylesheet" type="text/css" href="css/aboutMe.css">
	<link rel="stylesheet" type="text/css" href="lib/css/star.css">


</head>
<body>
	<!-- 头部 -->
	<?php 
		include_once("inc/header.php");
	?>
			<input type="hidden" name="txtMemberId" id="txtMemberId" value="<?php echo $currentUser["Id"] ?>">

	 <!-- 星星特效 -->
    <canvas id="canvas" style="position: absolute; z-index: -10;bottom: 0;top:0;right: 0;left: 0" ></canvas>
	<!-- 主体 -->
	<?php if($currentUser != null){ ?>
	<div class="main-container">
		<!-- 头部 -->
		<div class="main-header">
			<div>
				<div class="header-container">
					<img src="">
				</div>
				<div class="name-container"><?php echo $currentUser["Name"] ?></div>
				<?php if($currentUser["Sign"]){ ?>
					<div class="sign-container"><?php echo $currentUser["Sign"] ?></div>
				<?php }else{ ?>
					<div class="sign-container">暂无签名</div>
				<?php } ?>
			</div>
		</div>
		<div class="main-nav">
			<ul class="nav nav-tabs">
			  <li role="presentation" class="<?php echo $mainPage == 1?'active':''   ?>"><a href="aboutMe.php?mainPage=1">我的发帖</a></li>
			  <li role="presentation" class="<?php echo $mainPage == 2?'active':''   ?>"><a href="aboutMe.php?mainPage=2">正在审核</a></li>
			  <li role="presentation" class="<?php echo $mainPage == 3?'active':''   ?>"><a href="aboutMe.php?mainPage=3">审核失败</a></li>
			</ul>
		</div>
		<div class="main-content-container">
				
						
						
						<!-- 我的发帖 -->
						<?php if($mainPage == 1){ ?>
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
						<?php if($mineNotes == null){ ?>
							<tr>
								<td colspan="4" style="text-align: center;">您还没有发帖哦！<a href="writeNote.php" style="font-size: 12px;color:#337ab7;">去发帖</a></td>
							</tr>
						<?php } ?>
						<?php foreach ($mineNotes as $index => $item) { ?>
						
							<tr>
								<td><nobr><a style="font-size:15px" href="note.php?Id=<?php echo $item["Id"] ?>&aboutme=1"><?php echo $item["Title"] ?>&nbsp;
									<?php if($item["Image"] || stristr($item["Content"] , '<img src')){ ?>
										<img src="image/hasImage.gif">
									<?php } ?>
								</a></nobr></td>
								<td><nobr><a href="community.php?sectionId=<?php echo $item["SectionId"] ?>"><?php echo readData(getHisNotesSectionNameSql($item["Id"]))[0]["SectionName"] ?></a></nobr></td>
								<td><nobr><a href="note.php?Id=<?php echo $item["Id"] ?>"><?php echo readData(getThisNoteCommentsNumSql($item["Id"]))[0]["count"] ?></a></nobr></td>
								<?php if(readData(getThisNoteNewsCommenterSql($item["Id"])) && readData(getThisNoteNewsCommenterSql($item["Id"]))[0]["Id"] != $item["MemberId"]){  ?>
									
								<td><nobr><span>
									<a href="otherUser.php?memberId=<?php echo readData(getThisNoteNewsCommenterSql($item["Id"]))[0]["Id"] ?>"><?php echo readData(getThisNoteNewsCommenterSql($item["Id"]))[0]["Name"] ?></a></span>
									<em><?php showTime($item["Time"]) ?></em></nobr></td>

								<?php }else{?>
								<td><span style="font-size:12px">我</span><em><?php showTime($item["Time"]) ?></td>
								<?php } ?>
							</tr>
						<?php }?>
						<?php } ?>
						
						<!-- 正在审核 -->
						<?php if($mainPage == 2){ ?>
						<table class="table table-hover table-with-operator">
							<thead>
								<tr>
									<th>标题</th>
									<th>版块</th>
									<!-- <th>回复</th> -->
									<th>申请时间</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>
							<?php if($mineSecNotes == null){ ?>
								<tr>
									<td colspan="4" style="text-align: center;">您没有正在审核的帖子哦！<a href="writeNote.php" style="font-size: 12px;color:#337ab7;">去发帖</a></td>
								</tr>
							<?php } ?>
							<?php foreach ($mineSecNotes as $index => $item){ ?>
							<tr>
								<td><nobr><a style="font-size:15px" href="note.php?Id=<?php echo $item["Id"] ?>"><?php echo $item["Title"] ?>&nbsp;
									<?php if($item["Image"] || stristr($item["Content"] , '<img src')){ ?>
										<img src="image/hasImage.gif">
									<?php } ?>
								</a></nobr></td>
								<td><nobr><a href="community.php?sectionId=<?php echo $item["SectionId"] ?>"><?php echo readData(getHisNotesSectionNameSql($item["Id"]))[0]["SectionName"] ?></a></nobr></td>
								<td><nobr style="font-size: 13px;"><?php showTime($item["Time"]) ?></nobr></td>
								
								<td><a href="operator/cancelRequest.php?noteId=<?php echo $item["Id"] ?>" class="operator-a">取消审核</a></td>
							</tr>
						<?php }?>

						<?php } ?>

						<!-- 审核失败 -->
						<?php if($mainPage == 3){ ?>
						<table class="table table-hover table-with-operator">
							<thead>
								<tr>
									<th>标题</th>
									<th>版块</th>
									<th>申请时间</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>
							<?php if(!$mineThiNotes){ ?>
								<tr>
									<td colspan="5" style="text-align: center;">您没有作废的帖子哦！<a href="writeNote.php" style="font-size: 12px;color:#337ab7;">去发帖</a></td>
								</tr>
							<?php } ?>
							<?php foreach ($mineThiNotes as $index => $item) { ?>
							<tr class="default-tr">
								<td><nobr><a style="font-size:15px;" href="note.php?Id=<?php echo $item["Id"] ?>"><?php echo $item["Title"] ?>&nbsp;
									<?php if($item["Image"] || stristr($item["Content"] , '<img src')){ ?>
										<img src="image/hasImage.gif">
									<?php } ?>
								</a></nobr></td>
								<td><nobr><a href="community.php?sectionId=<?php echo $item["SectionId"] ?>"><?php echo readData(getHisNotesSectionNameSql($item["Id"]))[0]["SectionName"] ?></a></nobr></td>
								<td><nobr style="font-size: 13px;"><?php showTime($item["Time"]) ?></nobr></td>
								<td><a href="operator/request.php?noteId=<?php echo $item["Id"] ?>" class="operator-b">再次请求审核</a></td>
							</tr>
						<?php }?>

						<?php } ?>


					</tbody>
				</table>

		</div>
		<?php 
			include_once("inc/foot_sec.php");
		 ?>
	</div>
	<?php }else{ ?>
		<div class="main-container">
			<div class="error-show">
				抱歉，您还没有登录！<a href="login.php">登录</a> | <a href="register.php">立即注册</a> 		
			</div>
			<?php 
			include_once("inc/foot_sec.php");
		 	?>
		</div>
	<?php } ?>
	<!-- 模态框 -->
	<div class="dialog" style="display:<?php echo is_null($msg)? 'none' : 'block'  ; ?>;color:<?php echo $color ?>"><?php echo $msg ?></div>


	<script type="text/javascript" src="lib/js/jquery.js"></script>
    <script type="text/javascript" src="lib/js/star.js"></script>
    <script type="text/javascript" src="js/notScroll.js"></script>
    <script type="text/javascript" src="js/aboutMe.js"></script>
	
	
</body>
</html>