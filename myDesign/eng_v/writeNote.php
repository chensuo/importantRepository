<?php 
	require_once("services/dbHelper.php"); 
    require_once("services/dataService.php");
    require_once("services/globalService.php");

    @session_start();
    /*返回上一界*/
	@$returnBack = $_SERVER["HTTP_REFERER"];

	/*获取所有模块信息*/
	$noteSections = readData(getNotesSectionSql());

	/*获取sectionId*/
	if(array_key_exists("sectionId", $_GET)){
		if($_GET["sectionId"]){
			$sectionId = $_GET["sectionId"];
		}
		else{
			
			$sectionId = $noteSections[0]["Id"];
		}
	}
	else{
		$sectionId = $noteSections[0]["Id"];
	}

	$msg = null;
	$color = null;
	// if(array_key_exists("MessageShow" , $_SESSION)){
	// 	$msg = $_SESSION["MessageShow"];
	// 	unset($_SESSION["MessageShow"]);
	// }
	// if(array_key_exists("colorShow" , $_SESSION)){
	// 	$color = $_SESSION["colorShow"];
	// 	unset($_SESSION["colorShow"]);
	// }
	

	/*是否登录*/
	if(array_key_exists("Current", $_SESSION)){
    	$currentUser = $_SESSION["Current"];

    	/*提交表单*/
    	if($_SERVER["REQUEST_METHOD"] == "POST"){

    		//获取参数
    		$content = $_POST["articleContent"];
    		$title = $_POST["titleShow"];
    		$memberId = $currentUser["Id"];
    		/*内容和标题不能为空*/
    		if($content && $title){

    			/*请求操作*/
	    		$result = readData(writeNoteSql($sectionId ,$title ,$content , $memberId) , 'dml');

	    		if($result > 0){
	    			$_SESSION["MessageShow"] = "正在审核中，请耐心等待！";
	    			$_SESSION["colorShow"] = "#1DA362";
	    			header("location:aboutMe.php?mainPage=2");
	    		}
	    		else{
	    			$msg = "您的内容不符合标准！";
	    			$color = "#E11111";
	    		}
    		}
    		else{
	    			$msg = "标题和内容不能为空！";
	    			$color = "#E11111";
    		}

    		



    	}
    }
    else{
    	$currentUser = null;
    }

    /*获取模块*/
    if(array_key_exists("mainPage", $_GET)){
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
	<title>发表帖子</title>
	<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="lib/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/global.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/foot_sec.css">
	<link rel="stylesheet" type="text/css" href="css/writeNote.css">
	<link rel="stylesheet" type="text/css" href="lib/css/star.css">

	<!-- <link rel="stylesheet" type="text/css" href="lib/editor/wangEditor.min.css"> -->
<body>
	<!-- 头部 -->
	<?php 
		include_once("inc/header.php");
	?>
	 <!-- 星星特效 -->
    <canvas id="canvas" style="position: absolute; z-index: -10;bottom: 0;top:0px;right: 0;left: 0" ></canvas>
	<?php if($currentUser){ ?>
	<!-- 主体 -->
	<div class="main-container">
		<div class="note-nav">
			<div class="nav-left">
				<a href="index.php">首页</a><em>›</em>
				<a href="community.php">用户社区</a><em>›</em>
				<a href="community.php?sectionId=<?php echo $sectionId ?>"><?php echo readData(writeNoteShowNavSql($sectionId))[0]["SectionName"]?readData(writeNoteShowNavSql($sectionId))[0]["SectionName"]:$noteSections[0]["SectionName"] ?></a><em>›</em>
				<a href="">发表帖子</a>
			</div>
			<div class="nav-right"></div>
		</div>

		<form method="post">
			<div class="main-nav">
				<ul class="nav nav-tabs">
				<?php foreach ($noteSections as $index => $item) { ?>
					  <li role="presentation" title="选择该模块" class="<?php echo $item["Id"] == $sectionId ? 'active':'' ?>"><a href="writeNote.php?sectionId=<?php echo $item["Id"] ?>"  class="sectionId-a"><?php echo $item["SectionName"] ?></a></li>
						
				  <?php } ?>
						<input type="hidden"  class="sectionId-input-sec" name="sectionIdInputSec">
				</ul>
			</div>
			<div class="main-content-container">
				<div class="write-title"><span>标题：</span><input id="txtTitle" name="titleShow" type="text" class="form-control" placeholder="请输入标题，不超过40个字" maxlength="50"></div>

				<!-- 富文本框 -->
				<div id="editor"></div>
				<textarea id="txtContent" name="articleContent" style="display: none;"></textarea>
				<div class="btn-container-dv">
					<button class="btn btn-info " id="btnSave">请求审核</button>
					<a href="community.php" class="btn btn-default">返回社区</a>
				</div>


			</div>
		</form>





		<!-- 脚注 -->
		<?php 
			include_once("inc/foot_sec.php");
		 ?>
		
		</div>

	<?php }else{ ?>
	<div class="main-container">
		<div class="error-show">
			抱歉，您还没有登录！<a href="login.php">登录</a> | <a href="register.php">立即注册</a>
		</div>

		<!-- 脚注 -->
		<?php 
			include_once("inc/foot_sec.php");
		 ?>
	</div>
	<?php } ?>
	<div class="dialog" style="display:<?php echo is_null($msg)? 'none' : 'block'  ; ?>;color:<?php echo $color ?>"><?php echo $msg ?></div>

	<script type="text/javascript" src="lib/js/jquery.js"></script>
    <script type="text/javascript" src="lib/js/star.js"></script>
	<script type="text/javascript" src="lib/editor/wangEditor.min.js"></script>
	<script type="text/javascript">
		window.onload = function(){
			var timerThi;
			//初始化富文本框
			initEditor();

			// 保存
			var txtTitle = document.querySelector('#txtTitle');
			var txtContent = document.querySelector('#txtContent');

			var btnSave = document.querySelector('#btnSave');
			// btnSave.onclick = function(){
			// 	// 检查数据有效性

			// 	var title = txtTitle.value;
			// 	var content = txtContent.value;

			// 	// 保存
			// 	saveEditor(title , content);
			// }


			/*
				功能描述：初始化富文本框
			*/ 
			function initEditor(){
				var editor = new wangEditor('#editor');
				// 设置本地上传参数
				editor.customConfig.uploadImgServer = 'ajax/uploadImage.php';
				editor.customConfig.uploadImgMaxSize = 3 * 1024 * 1024;
				editor.customConfig.uploadFileName = "editImage";

				// 设置内容区
				// 监控变化，同步更新到 textarea
				editor.customConfig.onchange = function (html) {
		            txtContent.innerHTML = html;
		        }
				//
				editor.create();
			}


			/*自动关闭模态框*/
			var dialog = document.querySelector(".dialog");
			if(dialog.style.display != "none"){
				window.clearInterval(timerThi);
				timerThi = setInterval(function(){
					dialog.style.display = 'none';
				} , 1500);
			}


			
		}

		/*****************************************************/
		// $(function(e){

		// 	var $sectionId = $('.nav-tabs>li.active>input').val();
		// 	/*获取sectionId*/
		// 	$('.sectionId-input-sec').val($sectionId);

		// 	$('.sectionId-a').bind('click' , function(){
		// 		console.log($('.sectionId-input-sec').val());
		// 	});


		// });
	</script>


</body>
</html>