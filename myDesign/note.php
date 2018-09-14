<?php
	require_once("services/dbHelper.php"); 
    require_once("services/dataService.php");
    require_once("services/globalService.php");
    @session_start();
    /*获取Id*/
    if(array_key_exists("Id" , $_GET)){
    	$noteId = $_GET["Id"];
    	/*获取该帖子顶楼信息*/
    	$masterNews = readData(getThisNoteFirstSql($noteId));

    	/*获取该帖子下 评论信息并且 分页*/
    	// $childNews = readData(getThisNoteCommentsSql($noteId));
    	$pageSize = 4;
		$pageIndex = 0;
		$newSql = getThisNoteCommentsSql($noteId);
		$secSql = getThisNoteCommentsNumSql($noteId);/*正序排序所有评论*/
		$childNews = showPageSec($newSql , $secSql , $pageIndex , $pageSize);  //数据总行数

		$count = count($childNews["data"]);
		if(array_key_exists("pageIndex" , $_GET)){
			$pageIndex = $_GET["pageIndex"];
			$childNews = showPageSec($newSql , $secSql , $pageIndex , $pageSize);
		}
		$totalPageCount = ceil($childNews["totalRowsNum"] / $pageSize);

		if($totalPageCount == 0){
			$totalPageCount = 1;
		}



    	/*返回上一界*/
		@$returnBack = $_SERVER["HTTP_REFERER"];
		/*返回*/
	    if(stristr($returnBack , 'note.php') == false){
	    	$_SESSION["Return"] = $returnBack;
	    }
	    else{
	    	$_SESSION["Return"] = '';
	    }
    }
    else{
    	returnMessages("没有该帖子信息!" , "community.php");
		exit;
    }
    
    if(array_key_exists("Current", $_SESSION)){
    	$currentUser = $_SESSION["Current"];
    }
    else{
    	$currentUser = null;
    }
    if(array_key_exists("aboutme" , $_GET)){
		$aboutme = $_GET["aboutme"];
	}
	else{
		$aboutme = 0;
	}


    /*检查是否是审核通过的 State = 1*/
    $confirmState = readData(getNoteStateSql($noteId))[0]["State"];/**/

    //获取当前url
    $url =  'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
   
	
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>帖子详情</title>
	<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="lib/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/global.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/foot_sec.css">
	<link rel="stylesheet" type="text/css" href="css/note.css">
	<link rel="stylesheet" type="text/css" href="lib/css/star.css">
</head>
<body>
	<!-- 头部 -->
	<?php 
		include_once("inc/header.php");
	?>
	 <!-- 星星特效 -->
    <canvas id="canvas" style="position: absolute; z-index: -10;bottom: 0;top:100px;right: 0;left: 0" ></canvas>
	<!-- 模态框 -->
		 <!-- <div class="dialog" style="display:none;"></div> -->
	
	<!-- 主体 -->
	<div class="note-container">
		<div class="note-nav">
			<div class="nav-left">
				<a href="index.php">首页</a><em>›</em>
				<a href="community.php">用户社区</a><em>›</em>
				<a href="community.php?sectionId=<?php echo $masterNews[0]["SectionId"] ?>"><?php echo $masterNews[0]["SectionName"] ?></a><em>›</em>
				<a href="#"><?php echo $masterNews[0]["Title"] ?></a>
			</div>
			<div class="nav-right">
				<a href="writeNote.php?sectionId=<?php echo $masterNews[0]["SectionId"]?>" class="fa fa-pencil write-note"> 发新帖</a>
			</div>
		</div>

		<div class="note-title">
			<span><?php echo $masterNews[0]["Title"] ?></span>
			<a href="">只看楼主</a>
			<i class="return-bottom">回复</i>
		</div>
		
		<!-- 帖子项目 -->
		<!-- 顶楼 -->
		<?php if($pageIndex == 0){ ?>
		<div class="first-note-item note-content-item">
			<div class="note-top">
				<a href="otherUser.php?memberId=<?php echo $masterNews[0]["MemberId"] ?>">
					<?php if($masterNews[0]["Header"]){ ?>
						<img src="<?php echo $masterNews[0]["Header"] ?>">
					<?php }else{ ?>
						<img src="image/default.png">
					<?php } ?>

				</a>
				<span>
					<em class="louzhu-logo">楼主</em>
					<a href="otherUser.php?memberId=<?php echo $masterNews[0]["MemberId"] ?>"><?php echo $masterNews[0]["Name"] ?></a>
					<span>发表于: &nbsp;<?php showTime($masterNews[0]["Time"]) ?> &nbsp;|</span>
					<a href="" class="see-this-author">只看该作者</a>
					<i>1#</i>
				</span>
			</div>
			<div class="note-main-content">
				<?php echo $masterNews[0]["Content"] ?>
			</div>
			<div class="image-container">
				<?php if($masterNews[0]["Image"]){ ?>
					<img src="<?php echo IMAGE_URL . $masterNews[0]["Image"] ?>">
				<?php } ?>
				<?php if($masterNews[0]["Image1"]){ ?>
					<img src="<?php echo IMAGE_URL . $masterNews[0]["Image1"] ?>">
				<?php } ?>
				<?php if($masterNews[0]["Image2"]){ ?>
					<img src="<?php echo IMAGE_URL . $masterNews[0]["Image2"] ?>">
				<?php } ?>
				<?php if($masterNews[0]["Image3"]){ ?>
					<img src="<?php echo IMAGE_URL . $masterNews[0]["Image3"] ?>">
				<?php } ?>
			</div>
			<div class="note-operator">
				<div><i class="fa fa-commenting return-bottom"> </i> <span class="return-bottom">回复</span><a href="">举报</a></div>
			</div>
		</div>
		<?php } ?>
		<!-- 层主 -->
		<?php if($childNews){ ?>
		<?php foreach ($childNews["data"] as $index => $item) { ?>
		<div class="note-content-item">
			<div class="note-top">
				<a href="otherUser.php">
					<?php if($item["Header"]){ ?>
					<img src="<?php echo $item["Header"] ?>">
					<?php } else{ ?>
					<img src="image/default.png">
					<?php } ?>
				</a>
				<span>
					<?php if($masterNews[0]["MemberId"] == $item["MemberId"]) { ?>
						<em class="louzhu-logo">楼主</em>
					<?php } ?>
					<a href="otherUser.php?memberId<?php echo $item["MemberId"] ?>"><?php echo $item["Name"] ?></a>
					<span>发表于: &nbsp;<?php showTime($item["Time"]) ?> &nbsp;|</span>
					<a href="" class="see-this-author">只看该作者</a>
					<i><?php echo (4*($pageIndex+1) +$index-(4-2)) ?>#</i>
				</span>
			</div>
			<div class="note-main-content">
				<?php echo $item["Content"] ?>
			</div>
			<div class="image-container">
				<?php if($item["Image"]){ ?>
					<img src="<?php echo IMAGE_URL . $item["Image"] ?>">
				<?php } ?>
			</div>
			<div class="note-operator">
				<div><i class="fa fa-commenting return-bottom"> </i> <span class="">回复</span><a href="">举报</a></div>
			</div>
		</div>
		<?php  }} ?>
		<!-- 分页 -->
		<div class="pageContainer note-pageContainer">
			<a href="<?php echo $returnBack ?>">返回</a>
			<?php  for($i = 0 ; $i < $totalPageCount ; $i++): ?>
				<a class="notScroll <?php echo  $i == $pageIndex ? 'active' : '' ?>" href = "note.php?Id=<?php echo $item["NoteId"] ?>&pageIndex=<?php echo $i; ?>"> <?php echo $i + 1 ; ?></a>
			<?php endfor ?>
		</div>
		<!-- 富文本框 -->
		<?php if($confirmState == 1){ ?>
		<form method="post">
		<div class="wirte-note-container">
			<?php if($currentUser) { ?>
				<input type="hidden" name="" class="memberId-input" value="<?php echo $currentUser["Id"] ?>">
				<input type="hidden" name="" class="noteId-input" value="<?php echo $noteId ?>">
				<input type="hidden" name="" class="url-input" value="<?php echo  $url ?>">
				<textarea rows="3" cols="20" class="form-control replay-content"></textarea>
			<?php }else{ ?>
				<div class="not-login-show">您需要登录后才可以回帖 <a href="login.php">登录</a> | <a href="register.php">立即注册</a></div>
			<?php } ?>
			<button class="btn btn-info btn-replyNote" type="button"><i class="fa fa-pencil" style="color: #fff"></i> 回复</button>
			<button class="btn btn-default" type="reset"><i class="glyphicon glyphicon-trash"></i> 重置</button>
			<a href="<?php echo $aboutme == 1 ? 'aboutMe.php':'community.php' ?>"><?php echo $aboutme == 1 ? '返回我的帖子':'返回社区' ?></a>
		</div>
		</form>
		<?php }else{ ?>
		<div class="error-dv">

			该帖子还未通过审核，请等待审核！<a href="<?php echo $_SESSION["Return"] !='' ? $_SESSION["Return"]:$returnBack; ?>">返回</a>
			
		</div>
		<?php } ?>

		<!-- 帖子页面脚注 -->
		<?php 
			include_once("inc/foot_sec.php");
		 ?>

		
	</div>
 		
	<script type="text/javascript" src="lib/js/jquery.js"></script>
    <script type="text/javascript" src="lib/js/star.js"></script>
	<script type="text/javascript" src="js/global.js"></script>
    <script type="text/javascript" src="js/notScroll.js"></script>
    <script type="text/javascript" src="js/note.js"></script>

	

</body>
</html>