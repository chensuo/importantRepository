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




	
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>用户信息</title>
	<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="lib/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/global.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/foot_sec.css">
	<link rel="stylesheet" type="text/css" href="css/user.css">
	<link rel="stylesheet" type="text/css" href="lib/css/star.css">

</head>
<body>
	<!-- 头部 -->
	<?php 
		include_once("inc/header.php");
	?>
	 <!-- 星星特效 -->
    <canvas id="canvas" style="position: absolute; z-index: -10;bottom: 0;top:0;right: 0;left: 0" ></canvas>
	<!-- 正体 -->
	<?php if($currentUser != null){ ?>
	<div class="main-container">
		<div class="main-left">
			<!-- 头像部分 -->
			<div class="header-container">
				<img class="header-show" src="">
				<div><?php echo $currentUser["Name"] ?></div>
				<span class="sign-show"></span>
			</div>
			<div class="info-block">
				<a href="user.php?mainPage=1" class="<?php echo $mainPage == 1? 'active':'' ?> fa fa-user-circle-o"> &nbsp;&nbsp;account information</a>
				<a href="user.php?mainPage=2" class="<?php echo $mainPage == 2? 'active':'' ?> fa fa-th-list"> &nbsp;&nbsp;Personal information</a>
			</div>
			
		</div>
		<?php if($mainPage == 1){ ?>
			<div class="main-right">
				<div class="right-title">
				<h1>account information</h1>
				</div>
				<div class="right-info-container">
					<div><i class="fa fa-phone"></i>&nbsp;Phone</div>
					<div><?php echo $currentUser["Phone"] ?></div>
				</div>
				<div class="right-info-container">
					<div><i class="fa fa-envelope-o"></i>&nbsp;Email</div>
					<div class="show-emali"></div>
					<div><i  class="fa fa-edit" data-toggle="modal" data-target="#editEmail"></i></div>
				</div>
				<div class="right-info-container">
					<div><i class="fa fa-lock"></i>&nbsp;Password</div>
					<div>******</div>
					<div><i class="fa fa-edit" data-toggle="modal" data-target="#editPassword"></i></div>
				</div>
			</div>
		<?php }else{ ?>
			<div class="main-right">
				<div class="right-title">
				<h1>Personal information</h1>
				</div>
				<div class="form-container">
						<div><span>Header：</span><img class="dialog-icon" src=""><input type="file" id="choseHeader" style="display: none;" name=""><label class="changeHeader" for="choseHeader">Revise Header</label></div>
						<div><span>Sex：</span><label class="radio-inline"><input type="radio" name="sex" value="男"> male</label><label class="radio-inline"><input type="radio" name="sex" id="inlineRadio2" value="女"> female</label></div>
						<div>
							<span>constellation：</span><select class="form-control">
								<option value="">Please select</option>
								<option value="白羊座">Aries</option>
								<option value="金牛座">Taurus</option>
								<option value="双子座">Gemini</option>
								<option value="巨蟹座">Cancer</option>
								<option value="狮子座">Leo</option>
								<option value="处女座">Virgo</option>
								<option value="天秤座">Libra</option>
								<option value="天蝎座">Scorpio</option>
								<option value="射手座">Sagittarius</option>
								<option value="摩羯座">Capricornus</option>
								<option value="水瓶座">Aquarius</option>
								<option value="双鱼座">Pisces</option>
							</select>
						</div>
						<div><span>autograph：</span>
							<textarea class="form-control" rows="3"></textarea>
						</div>
						<div class="last-info-dv">
							<span></span><button class="btn btn-info btnSubmit">Submit</button>
							<button type="reset" class="btn btn-default">Cancel</button>
						</div>
						
				</div>
			</div>
		<?php } ?>

		
			



		<?php 
			include_once("inc/foot_sec.php");
		 ?>
	</div>

	<?php }else{ ?>
		<div class="main-container user-center-error">
			<div class="error-show">
				Sorry, you haven't logged in yet!<a href="login.php">Sign in</a> | <a href="register.php">Immediate registration</a> 		
			</div>
			<?php 
			include_once("inc/foot_sec.php");
		 	?>
		</div>
	<?php } ?>
	

	<!-- 模态框 -->
	<div class="modal fade" tabindex="-1" role="dialog" id="editEmail">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit" style="color: #51A129"></i> Modify user mailbox</h4>
	      </div>
	      <div class="modal-body">
	        <p><span>New Email：</span> <input type="email" class="form-control" id="txtEmail" placeholder="请输入新邮箱" value="<?php echo $currentUser["Email"] ?>">
			<input type="hidden" name="txtMemberId" id="txtMemberId" value="<?php echo $currentUser["Id"] ?>">
			<input type="hidden" name="txtPassword" id="txtPassword" value="">
	        </p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	        <button type="button" class="btn btn-primary confirmEditEmail">Ascertaining modification</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<div class="modal fade" tabindex="-1" role="dialog" id="editPassword">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
	        <h4 class="modal-title"><i class="fa fa-edit" style="color: #51A129"></i> Modifying the user's password</h4>
	      </div>
	      <div class="modal-body">
	        <p><span>Old password：</span><input type="password" class="form-control" id="oldPsw" placeholder="请输入旧密码">
			</p>
			<p><span>New Password：</span><input type="password" class="form-control" id="newPsw" placeholder="请输入新密码">
			</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	        <button type="button" class="btn btn-primary" id="confirmChangePsw">Ascertaining modification</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<div class="dialog">1234</div>



	<script type="text/javascript" src="lib/js/jquery.js"></script>
    <script type="text/javascript" src="lib/js/star.js"></script>
    <script type="text/javascript" src="lib/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/notScroll.js"></script>
    <script type="text/javascript" src="js/user.js"></script>
</body>
</html>