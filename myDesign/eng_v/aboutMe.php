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
	<title>About me</title>
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
					<div class="sign-container">No signature for the time being</div>
				<?php } ?>
			</div>
		</div>
		<div class="main-nav">
			<ul class="nav nav-tabs">
			  <li role="presentation" class="<?php echo $mainPage == 1?'active':''   ?>"><a href="aboutMe.php?mainPage=1">My post</a></li>
			  <li role="presentation" class="<?php echo $mainPage == 2?'active':''   ?>"><a href="aboutMe.php?mainPage=2">Being audited</a></li>
			  <li role="presentation" class="<?php echo $mainPage == 3?'active':''   ?>"><a href="aboutMe.php?mainPage=3">Audit failure</a></li>
			</ul>
		</div>
		<div class="main-content-container">
				
						
						
						<!-- 我的发帖 -->
						<?php if($mainPage == 1){ ?>
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Title</th>
									<th>Section</th>
									<th>Reply</th>
									<th>Last post</th>
								</tr>
							</thead>
							<tbody>
						<?php if($mineNotes == null){ ?>
							<tr>
								<td colspan="4" style="text-align: center;">You haven't made a post yet.<a href="writeNote.php" style="font-size: 12px;color:#337ab7;">To send a post</a></td>
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
								<td><span style="font-size:12px">me</span><em><?php showTime($item["Time"]) ?></td>
								<?php } ?>
							</tr>
						<?php }?>
						<?php } ?>
						
						<!-- 正在审核 -->
						<?php if($mainPage == 2){ ?>
						<table class="table table-hover table-with-operator">
							<thead>
								<tr>
									<th>Title</th>
									<th>Section</th>
									<!-- <th>回复</th> -->
									<th>Application time</th>
									<th>operation</th>
								</tr>
							</thead>
							<tbody>
							<?php if($mineSecNotes == null){ ?>
								<tr>
									<td colspan="4" style="text-align: center;">You don't have an audited post!<a href="writeNote.php" style="font-size: 12px;color:#337ab7;">To send a post</a></td>
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
								
								<td><a href="operator/cancelRequest.php?noteId=<?php echo $item["Id"] ?>" class="operator-a">Cancellation of audit</a></td>
							</tr>
						<?php }?>

						<?php } ?>

						<!-- 审核失败 -->
						<?php if($mainPage == 3){ ?>
						<table class="table table-hover table-with-operator">
							<thead>
								<tr>
									<th>Title</th>
									<th>Section</th>
									<th>Application time</th>
									<th>operation</th>
								</tr>
							</thead>
							<tbody>
							<?php if(!$mineThiNotes){ ?>
								<tr>
									<td colspan="5" style="text-align: center;">You don't have an invalidated post!<a href="writeNote.php" style="font-size: 12px;color:#337ab7;">To send a post</a></td>
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
								<td><a href="operator/request.php?noteId=<?php echo $item["Id"] ?>" class="operator-b">Request for review again</a></td>
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
				Sorry, you haven't logged in yet!<a href="login.php">Sign in</a> | <a href="register.php">Immediate registration</a> 		
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