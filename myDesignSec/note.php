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

    /*社区模块*/
    $notesSection = readData(getNotesSectionSql());

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>frontier管理系统</title>
	<link rel="stylesheet" href="lib/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="lib/css/font-awesome.css"/>
	<link rel="stylesheet" href="css/global.css"/>
	<link rel="stylesheet" href="css/note.css"/>
	
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
			    <div class="child-header">社区帖子管理<span>Community notes management</span></div>
			    <div class="page-main-container">
			      	<div class="page-top-container">
			            <!--添加新类别按钮-->
			            <!-- <a href="newsDetail_writeNews.php" type="button" class="btn btn-info btn-add-new btn-add-news"><i class="fa fa-edit"></i> 发布新闻</a> -->
			            <!-- 下拉列表 模块 -->
			            	<select class="form-control select-section">
			            		<option value="">全部模块</option>
				            	<?php foreach ($notesSection as $key => $item) : ?>
								  <option value="<?php echo $item['Id'] ?>"><?php echo $item["SectionName"] ?></option>
								 <?php endforeach ?>
							</select>
						<!-- 下拉列表 状态 -->
							<select class="form-control select-sectionSec">
								<option value="">全部状态</option>
								<option value="0">等待审核</option>
								<option value="1">审核通过</option>
								<option value="2">驳回请求</option>
							</select>

			            <!-- 搜索框-->
			            <div class="input-group col-md-3 col-sm-3 col-xs-3" style="left:470px">
			                <input type="text" class="form-control keyWord-input" placeholder="请输入标题关键字">
			                <span class="input-group-btn" id="btnSearch">
			                   <button class="btn btn-info btn-search ">查找</button>
			                </span>
			            </div>
			        </div>
			        <!-- 内容区域 -->
			        <div class="page-content">
						<table class="table table-striped note-tb">
							<thead>
								<tr>
									<th>序号</th>
									<th>帖子标题</th>
									<th>发帖人</th>
									<th>发帖时间</th>
									<th>所属模块</th>
									<th>审核状态</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody class="tbMain">
								<tr>
									<td>1</td>
									<td>帖子标题帖子标题</td>
									<td>发帖人</td>
									<td>2018-02-02</td>
									<td>模块名称</td>
									<td>正在审核</td>
									<td>操作按钮</td>
								</tr>
							</tbody>
						</table>
						<!-- 分页页码 -->
						<div class="footContainer">
				            <div class="divPageFooter"></div>
				        </div>
			        </div>
			    </div>
			</div>

            </div>
        </div>
    </div>
</div>

 <!-- 模态框 删除-->
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
	<script type="text/javascript" src="js/note.js"></script>

</body>
</html>