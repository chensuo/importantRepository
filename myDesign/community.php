<?php
 	require_once("services/dbHelper.php"); 
    require_once("services/dataService.php");
    require_once("services/globalService.php");

    @session_start();
    if(array_key_exists("Current", $_SESSION)){
    	$currentUser = $_SESSION["Current"];
    }
    else{
    	$currentUser = null;
    }


    /*获取社区各个版块信息 导航模块*/
    $allNotesSection = readData(getNotesSectionSql());
    array_unshift($allNotesSection, ["Id" => "" , "SectionName" => "最新发帖"]);
    $allNotesSectionSec = readData(getNotesSectionSql());

    /*获取今日帖子和评论数量*/
    $todayNum = readData(getTodayCommentNumSql())[0]["count"] + readData(getTodayNoteNumSql())[0]["count"];
    /*获取昨日帖子和评论数量*/
    $yesterdayNum = readData(getYesterdayCommentNumSql())[0]["count"] + readData(getYesterdayNoteNumSql())[0]["count"];
    /*获取所有帖子数量*/
    $allNum = readData(getNoteNumSql())[0]["count"] + readData(getCommentNumSql())[0]["count"];

    /*获取最新会员*/
    $newestUser = readData(getNewestUserSql());

    if(array_key_exists("sectionId", $_GET)){
    	/*获取当前模块Id*/
    	$sectionId = $_GET["sectionId"];
    	if($sectionId != ''){
    		/*获取当前模块下 的模块信息*/
    		$thisNotesSection = readData(getThisNotesSectionSql($sectionId));

    		/*获取该模块下所有帖子信息 并且 分页*/
    		// $thisSectionNotes = readData(getThisSectionNotesSql($sectionId));

    		$pageSize = 8;
			$pageIndex = 0;
			
			$newSql = getThisSectionNotesSql($sectionId);
			$secSql = getThisSectionNotesNumSql($sectionId);
			$list = showPage($newSql , $secSql , $pageIndex , $pageSize);  //数据总行数
			
			$count = count($list["data"]);
			if(array_key_exists("pageIndex" , $_GET)){
				$pageIndex = $_GET["pageIndex"];
				$list = showPage($newSql , $secSql , $pageIndex , $pageSize);
			}
			$totalPageCount = ceil($list["totalRowsNum"] / $pageSize);

			/*获取帖子下 最后的评论信息*/




    	}
    	else{
    		$thisNotesSection[0]["SectionName"] = "最新发帖";
    		/*获取最新前20条帖子 并且 分页*/
    		// $newestNotes = readData(getNewestNotesSql(20));

    		$pageSize = 8;
			$pageIndex = 0;
			$newSql = getNewestNotesSql();
			$secSql = getNewestNotesNumSql();/*倒序排序所有帖子*/
			$listSec = showPageSec($newSql , $secSql , $pageIndex , $pageSize);  //数据总行数

			$count = count($listSec["data"]);
			if(array_key_exists("pageIndex" , $_GET)){
				$pageIndex = $_GET["pageIndex"];
				$listSec = showPageSec($newSql , $secSql , $pageIndex , $pageSize);
			}
			$totalPageCount = ceil($listSec["totalRowsNum"] / $pageSize);

    	}
    	
    }
    else{
    	/*假$sctionId*/
    	$sectionId = '';
    	$thisNotesSection[0]["SectionName"] = "最新发帖";
    	/*获取最新前20条帖子*/
    	// $newestNotes = readData(getNewestNotesSql(20));

		$pageSize = 8;
		$pageIndex = 0;
		
		$newSql = getNewestNotesSql();
		$secSql = getNewestNotesNumSql();/*倒序排序所有帖子*/
		$listSec = showPageSec($newSql , $secSql , $pageIndex , $pageSize);  //数据总行数
		$count = count($listSec["data"]);
		if(array_key_exists("pageIndex" , $_GET)){
			$pageIndex = $_GET["pageIndex"];
			$listSec = showPageSec($newSql , $secSql , $pageIndex , $pageSize);
		}
		$totalPageCount = ceil($listSec["totalRowsNum"] / $pageSize);
    }
   	
   	$now = time();

	/*返回上一界*/
	@$returnBack = $_SERVER["HTTP_REFERER"];
	
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>用户社区</title>
	<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="lib/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/global.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/foot_sec.css">
	<link rel="stylesheet" type="text/css" href="css/community.css">
	<link rel="stylesheet" type="text/css" href="lib/css/star.css">

</head>
<body>
	<!-- 头部 -->
	<?php 
		include_once("inc/header.php");
	?>
	  <!-- 星星特效 -->
    <canvas id="canvas" style="position: absolute; z-index: -10;bottom: 0;top:0px;right: 0;left: 0" ></canvas>
	<!-- 主体 -->
	<div class="main-container">
		<div class="main-nav">
			<div class="nav-left">
				<?php foreach ($allNotesSection as $item) { ?>
					<a href="community.php?sectionId=<?php echo $item["Id"] ?>" class="<?php echo $item["SectionName"] == $thisNotesSection[0]["SectionName"]? 'active':'' ?>"><?php echo $item["SectionName"] ?></a>
				<?php } ?>
			</div>
			<div class="nav-right">
				<a href="writeNote.php?sectionId=<?php echo $sectionId ?>" class="fa fa-pencil write-note"> 发新帖</a>
			</div>
		</div>
		
		<div class="main-title">
			<span>今日：<?php echo $todayNum ?>&nbsp;&nbsp;|</span>
			<span>&nbsp; 昨日：<?php echo $yesterdayNum ?>&nbsp;&nbsp;|</span>
			<span>&nbsp; 帖子：<?php echo $allNum ?>&nbsp;&nbsp;|</span>
			<span>&nbsp; 会员：<?php echo count($newestUser) ?>&nbsp;&nbsp;|</span>
			<span>&nbsp; 欢迎新会员：<?php echo $newestUser[0]["Name"] ?></span>
		</div>
		<!-- 帖子项目 -->
		<!-- 最新发帖模块 -->
		<?php if($thisNotesSection[0]["SectionName"] == "最新发帖"){ ?>
		<?php foreach($listSec["data"] as $item){?>
			<div class="note-item">
				<?php if($currentUser["Id"] != $item["MemberId"]){ ?>

				<a href="otherUser.php?memberId=<?php echo $item["MemberId"] ?>">
				<?php } else{?>
				<a href="User.php">
				<?php } ?>
					<?php if($item["Header"]){ ?>
					<img src="<?php echo $item["Header"] ?>"></a>
					<?php }else{ ?>


					<img src="image/default.png"></a>
					<?php } ?>
				<div>
					<a href="note.php?Id=<?php echo $item["Id"] ?>" class="item-title">
						<?php if($item["Image"] || stristr($item["Content"] , '<img src')){ ?>
						<img src="image/hasImage.gif">
						<?php } ?>
						<?php echo $item["Title"] ?>
					</a>
					<div class="item-content">
						<a href="community.php?sectionId=<?php echo $item['SectionId'] ?>"><?php echo $item["SectionName"] ?></a>&nbsp;/

						<?php if($currentUser["Id"] != $item["MemberId"]){ ?>
						<a href="otherUser.php?memberId=<?php echo $item["MemberId"] ?>"><?php echo $item["Name"] ?></a>
						<?php }else{ ?>
						<a href="user.php"><?php echo $item["Name"] ?></a>
						<?php } ?>

						&nbsp;/
						<span><?php showTime($item["Time"]) ?></span>&nbsp;/
						<?php $lastNotesData = readData(getThisNoteNewsCommenterSql($item["Id"])); if($lastNotesData){ ?>
						<span>最新回复</span>&nbsp;

						<?php if($currentUser["Id"] != $item["MemberId"]){ ?>
						<a href="otherUser.php?memberId=<?php echo  $lastNotesData[0]["Id"]?>"><?php echo $lastNotesData[0]["Name"] ; ?></a>&nbsp;
						<?php }else{ ?>
						<a href="user.php"><?php echo $lastNotesData[0]["Name"] ; ?></a>&nbsp;
						<?php } ?>
						<a href="note.php?Id=<?php echo $item["Id"] ?>"><?php showTime($lastNotesData[0]["Time"])?></a>
						<?php } ?>
					</div>
				</div>
				<div>
					<a href="note.php?Id=<?php echo $item["Id"] ?>"  class="item-count"><?php echo readData(getThisNoteCommentsNumSql($item["Id"]))[0]["count"]+1 ?></a>
				</div>
			</div>
		<!-- 其他模块 -->
		<?php }} else{ ?>
		<?php foreach($list["data"] as $item) { ?>
		<div class="note-item">
			<a href="otherUser.php?memberId=<?php echo $item["MemberId"] ?>">
				<?php if($item["Header"]){ ?>
					<img src="<?php echo $item["Header"] ?>"></a>
					<?php }else{ ?>
					<img src="image/default.png"></a>
					<?php } ?>
			<div>
				<a href="note.php?Id=<?php echo $item["Id"] ?>" class="item-title">
					<?php if($item["Image"]){ ?>
						<img src="image/hasImage.gif">
						<?php } ?>
					<?php echo $item["Title"] ?>
				</a>
				<div class="item-content">
					<a href="community.php?sectionId=<?php echo $item['SectionId'] ?>"><?php echo $item["SectionName"] ?></a>&nbsp;/
					<a href="otherUser.php?memberId=<?php echo $item["MemberId"] ?>"><?php echo $item["Name"] ?></a>&nbsp;/
					<span><?php showTime($item["Time"]) ?></span>&nbsp;/
					<?php $lastNotesData = readData(getThisNoteNewsCommenterSql($item["Id"])); if($lastNotesData){ ?>
					<span>最新回复</span>&nbsp;
					<a href="otherUser.php?memberId=<?php echo  $lastNotesData[0]["Id"]?>"><?php echo $lastNotesData[0]["Name"] ; ?></a>&nbsp;
					<a href="note.php?Id=<?php echo $item["Id"] ?>"><?php showTime($lastNotesData[0]["Time"])?></a>
					<?php } ?>
				</div>
			</div>
			<div>
				<a href="note.php?Id=<?php echo $item["Id"] ?>"  class="item-count"><?php echo readData(getThisNoteCommentsNumSql($item["Id"]))[0]["count"]+1 ?></a>
			</div>
		</div>
		<?php }} ?>
		<!-- 分页 -->
		<div class="pageContainer">
			<a href="<?php echo $returnBack ?>">返回</a>
			<?php for($i = 0 ; $i < $totalPageCount ; $i++): ?>
				<a class="notScroll <?php echo  $i == $pageIndex ? 'active' : '' ?>"  href = "community.php?sectionId=<?php echo $sectionId ?>&pageIndex=<?php echo $i; ?>"> <?php echo $i + 1 ; ?></a>
			<?php endfor ?>
		</div>
		<!-- 帖子页面脚注 -->
		<?php 
			include_once("inc/foot_sec.php");
		 ?>

	</div>

	<!-- 发新帖弹出框 模态框 -->
		<!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="dialog-close">&times;</span></button>
		        <h4 class="modal-title">请选择发帖版块</h4>
		      </div>
		      <div class="modal-body">
		        <p>
		        	<?php foreach ($allNotesSectionSec as $key => $item) : ?>
						<a href="writeNote.php?sectionId=<?php echo $item["Id"] ?>" class="<?php echo $item["SectionName"] == $thisNotesSection[0]["SectionName"] ? 'active':'' ?>"><i class="fa fa-pencil">&nbsp; </i><?php echo $item["SectionName"] ?></a>
					<?php endforeach ?>
		        </p>
		      </div>
		    </div>
		  </div>
		</div> -->
	
	<script type="text/javascript" src="lib/js/jquery.js"></script>
    <script type="text/javascript" src="lib/js/star.js"></script>
	<script type="text/javascript" src="lib/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/notScroll.js"></script>


	
</body>
</html>