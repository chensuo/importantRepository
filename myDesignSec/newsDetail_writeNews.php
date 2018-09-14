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

	/*获取所有模块信息*/
	$newsSections = readData(getNewsSectionSql());

	if(array_key_exists("sectionId" , $_GET)){
		/*获取了新闻Id*/
		if($_GET["sectionId"]){
			$sectionId = $_GET["sectionId"];
		}
		else{
		 $sectionId = $newsSections[0]["Id"];
		}
		

	}
	else{
		$sectionId = $newsSections[0]["Id"];
	}


 	@$backURL = $_SERVER["HTTP_REFERER"];

 	$msg = null;
	$color = null;

 	/*发表新闻 提交表单*/
    if($_SERVER["REQUEST_METHOD"] == "POST"){
 		//获取参数
		$content = $_POST["articleContent"];
		$title = $_POST["titleShow"];
		$intro = $_POST["intro"];
		$memberId = $currentUser["Id"];
		/*内容标题不能为空*/
		if($content && $title && $intro){

    			/*请求操作*/
	    		$result = readData(writeNewsSql($sectionId ,$title ,$intro , $content) , 'dml');

	    		/*发表成功*/
	    		if($result > 0){
	    			$msg = "发布成功！";
	    			$color = "#1DA362";
	    			header("Refresh:0.5;url=newsDetail.php");
	    		}
	    		else{
	    			$msg = "您的内容不符合标准！";
	    			$color = "#E11111";
	    		}
    		}
    		else{
	    			$msg = "标题、摘要和内容不能为空！";
	    			$color = "#E11111";
    		}
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
	<link rel="stylesheet" href="css/writeNews.css"/>

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
            <div class="main-container" >
            	<!-- 主体 -->
              <div class="page-body">
			    <div class="child-header">发布新闻<span>Release the news</span></div>
			    <div class="page-main-container">
			        <!-- 内容区域 -->
			        <div class="page-content writeNews-content">
			        	<!-- 导航 -->
			        	<form method="post">
				        	<div class="main-nav">
								<ul class="nav nav-tabs">
									 <?php foreach ($newsSections as $index => $item) { ?>
										  <li role="presentation" title="选择该模块" class="<?php echo $item["Id"] == $sectionId ? 'active':'' ?>"><a href="newsDetail_writeNews.php?sectionId=<?php echo $item["Id"] ?>"  class="sectionId-a"><?php echo $item["SectionName"] ?></a></li>
									  <?php } ?>
						
				  						<input type="hidden" class="sectionId-input-sec" name="sectionIdInputSec">
								</ul>
							</div>
							<div class="main-content-container">
								<div class="write-title"><span>标题：</span><input id="txtTitle" name="titleShow" type="text" class="form-control" placeholder="请输入标题，不超过40个字!" maxlength="50"></div>

								<div class="write-intro"><span>摘要：</span><textarea class="form-control" name="intro"></textarea></div>

								<!-- 富文本框 -->
								<span class="content-span">内容：</span>
								<div id="editor"></div>
								<textarea id="txtContent" name="articleContent" style="display: none;"></textarea>
								<div class="btn-container-dv">
									<button class="btn btn-success " id="btnSave"><i class="fa fa-edit"></i> 发布新闻</button>
									<a href="<?php echo stristr($_SERVER["HTTP_REFERER"] , 'writeNews') != '' ? 'newsDetail.php':$backURL ?>" class="btn btn-default"><i class="fa fa-history"></i> 返回</a>
								</div>


							</div>
						</form>



			        </div>


			    </div>
			</div>

            </div>
        </div>
    </div>
</div>
			<div class="dialog" style="display:<?php echo is_null($msg)? 'none' : 'block'  ; ?>;color:<?php echo $color ?>"><?php echo $msg ?></div>
	
	<script type="text/javascript" src="lib/js/jquery.js"></script>
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