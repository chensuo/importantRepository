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



 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>frontier管理系统</title>
	<link rel="stylesheet" href="lib/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="lib/css/font-awesome.css"/>
	<link rel="stylesheet" href="css/global.css"/>
	<link rel="stylesheet" href="css/index.css"/>

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
			    <div class="child-header">新闻模块管理<span>News module management</span></div>
			    <div class="page-main-container">
			      	<div class="page-top-container">
			            <!--添加新类别按钮-->
			            <button type="button" class="btn btn-info btn-add-new" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i> 添加新模块</button>
			            <!-- 搜索框-->
			            <div class="input-group col-md-3 col-sm-3 col-xs-3">
			                <input type="text" class="form-control search-key" placeholder="请输入关键字">
			                <span class="input-group-btn" id="btnSearch">
			                   <button class="btn btn-info btn-search ">查找</button>
			                </span>
			            </div>
			        </div>
			        <!-- 内容区域 -->
			        <div class="page-content">
			        	<table class="table table-striped index-tb">
			        		<thead>
			        			<tr>
			        				<th>序号</th>
			        				<th>模块图标</th>
			        				<th>模块名称</th>
			        				<th>优先级</th>
			        				<th>操作</th>
			        			</tr>
			        		</thead>
			        		<tbody>
			        		</tbody>
			        	</table>

			        </div>
			    </div>
			</div>

            </div>
        </div>
    </div>
</div>

    <!-- 模态框 添加-->
            <div class="modal fade myModal-sec" tabindex="-1" role="dialog" id="myModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form name="frmSec" novalidate>
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><i class="fa fa-edit" style="color: #51A129"></i> 添加新模块</h4>
                            </div>
                            <div class="modal-body bookCategory-dialog">
                                <p><i class="glyphicon glyphicon-th-large"></i> <span>模块名称：&nbsp;</span><input name="txtName" required  placeholder="请输入新模块名称" type="text" class="add-newSort" id="txtName"/></p>
                                <p><i class="fa fa-pencil"></i> <span>优先级别：&nbsp;</span><input name="priority" required  placeholder="请输入新模块优先级" type="text" class="add-newSort" id="txtPriority" value='100'/></p>
                                <p><i class="glyphicon glyphicon-picture"></i> <span>模块图标：&nbsp;</span><span class="add-newSort-file">
                                        <input type="file"  name="icon" id="iconResource" class="item-textbox iconResourceSec" required style='display:none'/>
                                        <label for="iconResource" class="btn btn-default btn-chose">选择图标</label>
                                    </span>
                                </p>
                                <img src="image/default.jpg" alt="" class="dialog-icon" id="dialog-icon-sec"/>

                            </div>
                            <div class="modal-footer">
                                <span class="registe" style="display: none;color:#E10601;width: 64%;text-align: center; ">模块名称和图片不能为空!</span>
                                <button type="button" class="btn btn-default btn-cancel" data-dismiss="modal">取消</button>
                                <button type="button" class="btn btn-success btn-save"><i class="glyphicon glyphicon-ok"></i> 确定添加</button>
                            </div>
                        </form>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <!-- 模态框 删除-->
			<div class="modal fade" tabindex="-1" role="dialog" id="delModal">
				  <div class="modal-dialog modal-sm" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
				        <h4 class="modal-title"><i class="fa fa-edit" style="color: #51A129"></i> 删除模块提示</h4>
				      </div>
				      <div class="modal-body" >
				        <p class="error-info-del" style="font-size: 18px;display: inline-block;color:#E10601">删除失败!</p>
				        <p class="right-info-del" style="font-size: 18px; display: none;color:#36C601">删除成功!</p>
				      </div>
			<!-- 	      <div class="modal-footer">
				        <button type="button" class="btn btn-info" data-dismiss="modal">取消</button>
				      </div> -->
				    </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.modal -->


            <!-- 模态框 修改-->
			  <div class="modal fade myModal-sec" tabindex="-1" role="dialog" id="editModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form name="frmSec" novalidate>
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><i class="fa fa-edit" style="color: #51A129"></i> 修改模块信息</h4>
                            </div>
                            <div class="modal-body bookCategory-dialog">
                                <p><i class="glyphicon glyphicon-th-large"></i> <span>模块名称：&nbsp;</span><input name="txtName" required  placeholder="请输入新模块名称" type="text" class="add-newSort" id="edit-txtName"/></p>
                                <p><i class="fa fa-pencil"></i> <span>优先级别：&nbsp;</span><input name="priority" required  placeholder="请输入新模块优先级" type="text" class="add-newSort" id="edit-txtPriority"/></p>
                                <p><i class="glyphicon glyphicon-picture"></i> <span>模块图标：&nbsp;</span><span class="add-newSort-file">
                                        <input type="file" name="icon" id="iconResourceSec" class="item-textbox iconResourceSec" required style='display:none'/>
                                        <label for="iconResourceSec" class="btn btn-default btn-chose">选择图标</label>
                                    </span>
                                </p>
                                <img src="image/default.png" alt="" class="dialog-icon edit-dialog-icon" id="dialog-icon-sec"/>

                            </div>
                            <div class="modal-footer">
                                <span class="edit-registe" style="display: none;">模块名称不能为空!</span>
                                <button type="button" class="btn btn-default btn-cancel" data-dismiss="modal">取消</button>
                                <button type="button" class="btn btn-success btn-save-edit"><i class="glyphicon glyphicon-ok"></i> 确定修改</button>
                            </div>
                        </form>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
	<script type="text/javascript" src="lib/js/jquery.js"></script>
	<script type="text/javascript" src="lib/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
	
</body>
</html>