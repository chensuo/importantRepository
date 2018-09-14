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
    	$noteId = $_GET["Id"];
    	
    	//*获取该帖子顶楼信息*/
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

    }
    else{
    	returnMessages('没有该新闻信息!' , 'note.php');
    	exit;
    }
    @$backURL = $_SERVER["HTTP_REFERER"];
    
    //  function finPreviousUrl($url){
    //     return stristr($_SERVER["HTTP_REFERER"] , $url);
    // }


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>frontier管理系统</title>
	<link rel="stylesheet" href="lib/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="lib/css/font-awesome.css"/>
	<link rel="stylesheet" href="css/global.css"/>
	<link rel="stylesheet" href="css/notesDetail.css"/>

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
        	<!-- 存放帖子Id -->
        	<input type="hidden" class="noteId-input" name="" value="<?php echo $noteId  ?>">
            <div class="main-container">
            	<!-- 主体 -->
              <div class="page-body">
			    <div class="child-header">帖子详情<span>Notes Detail</span></div>
			    <div class="page-main-container">
			        <!-- 内容区域 -->
			        	 <div class="page-top-container">
				            <!--添加新类别按钮-->
				            <a href="note.php" class="btn btn-default "><i class="fa fa-history"></i> 返回列表</a>
							<?php if($masterNews[0]["State"] == 0){ ?>
				            <button  type="button" data-toggle="modal" data-target="#delModal" class="btn btn-success btn-add-new-sec btn-permit"><i class="fa fa-check-circle-o"></i> 审核通过</button>
				            <button  type="button" data-toggle="modal" data-target="#delModal" class="btn btn-warning btn-add-new btn-unperimit"><i class="fa fa-times-circle"></i> 审核驳回</button>
				            <?php } ?>
				             <!-- <button  type="button" data-toggle="modal" data-target="#delModal" class="btn btn-danger btn-add-new btn-unperimit"><i class="fa fa-times-circle"></i> 删除该帖</button> -->
				        </div>
			        <div class="page-content">

				        <!-- 内容 -->
				        <div class="newsDetail-container">
			        		<div class="news-title-main">所属模块：<?php echo $masterNews[0]["SectionName"] ?>
								<span>该帖状态：<i class="noteState-show" style="font-style: normal;color:<?php 
									if($masterNews[0]["State"] == 0){
										echo "rgb(40, 96, 144)";
									}
									if($masterNews[0]["State"] == 1){
										echo "rgb(54, 198, 1)";
									}
									if($masterNews[0]["State"] == 2){
										echo "rgb(225, 6, 1)";
									}
								 ?>"><?php echo showState($masterNews[0]["State"]) ?></i></span>
			        		</div>
			        		<!-- 标题 -->
			        		<div class="note-title">
								<span><?php echo $masterNews[0]["Title"] ?></span>
							</div>

							<!-- 帖子项目 -->
								<!-- 顶楼 -->
								<?php if($pageIndex == 0){ ?>
								<div class="first-note-item note-content-item">
									<div class="note-top">
										<a href="">
											<?php if($masterNews[0]["Header"]){ ?>
												<img src="<?php echo $masterNews[0]["Header"] ?>">
											<?php }else{ ?>
												<img src="image/default.png">
											<?php } ?>

										</a>
										<span>
											<em class="louzhu-logo">楼主</em>
											<a href=""><?php echo $masterNews[0]["Name"] ?></a>
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
									<!-- <div class="note-operator">
										<div><i class="fa fa-commenting return-bottom"> </i> <span class="return-bottom">回复</span><a href="">举报</a></div>
									</div> -->
								</div>
								<?php } ?>
								<!-- 层主 -->
								<?php if($childNews){ ?>
								<?php foreach ($childNews["data"] as $index => $item) { ?>
								<div class="note-content-item">
									<div class="note-top">
										<a href="">
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
											<a href=""><?php echo $item["Name"] ?></a>
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
									<!-- <div class="note-operator">
										<div><i class="fa fa-commenting return-bottom"> </i> <span class="">回复</span><a href="">举报</a></div>
									</div> -->
								</div>
								<?php  }} ?>
								<!-- 分页 -->
								<div class="pageContainer note-pageContainer">
									<a href="note.php">返回</a>
									<?php  for($i = 0 ; $i < $totalPageCount ; $i++): ?>
										<a class="notScroll <?php echo  $i == $pageIndex ? 'active' : '' ?>" href = "notesDetail.php?Id=<?php echo $item["NoteId"] ?>&pageIndex=<?php echo $i; ?>"> <?php echo $i + 1 ; ?></a>
									<?php endfor ?>
								</div>

							</div>
			        		
							<div class="del-container"><span class="del-span fa  fa-exclamation-circle" data-toggle="modal" data-target="#delModal"> 该帖违规，立即删除！</span></div>
			        	</div>
			        	
			        </div>
			    </div>
			</div>

            </div>
        </div>
    </div>
</div>


 <!-- 模态框 操作-->
			<div class="modal fade" tabindex="-1" role="dialog" id="delModal">
				  <div class="modal-dialog modal-sm" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
				        <h4 class="modal-title"><i class="fa fa-edit" style="color: #51A129"></i> 审核操作提示</h4>
				      </div>
				      <div class="modal-body" >
				        <p class="error-info-del" style="font-size: 18px;display: inline-block;color:#E10601">操作失败!</p>
				        <p class="right-info-del" style="font-size: 18px; display: none;color:#36C601">操作成功!</p>
				      </div>
			<!-- 	      <div class="modal-footer">
				        <button type="button" class="btn btn-info" data-dismiss="modal">取消</button>
				      </div> -->
				    </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.modal -->

	<script type="text/javascript" src="lib/js/jquery.js"></script>
	<script type="text/javascript" src="lib/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/noteDetail.js"></script>

	
</body>
</html>