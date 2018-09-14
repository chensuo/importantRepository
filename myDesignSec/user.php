<?php 
    @session_start();

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
	<link rel="stylesheet" href="css/user.css"/>

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
			    <div class="child-header">账号信息维护<span>Administrator information maintenance</span></div>
			    <div class="page-main-container">
			        <!-- 内容区域 -->
				        <div class="user-form-container">
				        	<input type="hidden" name="" class="adminId-input" value="<?php echo $currentUser["Id"]?>">
							<div class="form-group">
							    <label for="name">旧密码：</label>
							    <input type="password" class="form-control" id="oldPassword" placeholder="请输入旧密码">
							</div>
							<div class="right-show-dv"><i class="fa fa-check-circle"></i>&nbsp;旧密码正确</div>
							<div class="error-show-dv old-show fa fa fa-times-circle">&nbsp;旧密码错误</div>

							<div class="form-group">
							    <label for="name">新密码：</label>
							    <input type="password" class="form-control" id="newPassword" placeholder="请输入新密码">
							</div>
							<div class="error-show-dv new-show fa fa fa-times-circle">&nbsp;新密码不能为空</div>

							<div class="form-group">
							    <label for="name">再次确定新密码：</label>
							    <input type="password" class="form-control" id="confirmNewPassword" placeholder="请输入新密码">
							</div>
							<div class="error-show-dv new-confirm-show fa fa fa-times-circle">&nbsp;两次输入不一致</div>
							
							<button class="btn btn-success btn-save" data-toggle="modal" data-target="#editPassword">修改</button>
				        </div>
			    </div>
			</div>

            </div>
        </div>
    </div>
</div>

<!-- 模态框 提示框-->
<div class="modal fade" tabindex="-1" role="dialog" id="editPassword">
	  <div class="modal-dialog modal-sm" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
	        <h4 class="modal-title"><i class="fa fa-edit" style="color: #51A129"></i> 管理员密码维护</h4>
	      </div>
	      <div class="modal-body" >
	        <p style="font-size: 18px">密码修改成功！</p>
	      </div>
<!-- 	      <div class="modal-footer">
	        <button type="button" class="btn btn-info" data-dismiss="modal">取消</button>
	      </div> -->
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->


<script src="lib/js/jquery.js"></script>
<script type="text/javascript" src="lib/js/bootstrap.min.js"></script>
<script src="js/user.js"></script>

	
</body>
</html>