<?php
    require_once("services/globalService.php");
	/*检查是否登录*/
	@session_start();
	if(array_key_exists("CurrentAdmin", $_SESSION)){
		/*已登录*/
		$currentUser = $_SESSION["CurrentAdmin"];
	}
	else{
		/*未登录*/
		header("location:login.php");
	}

 ?>
<!-- 页眉-->
	<nav class="navbar navbar-inverse navbar-fixed-top">
	    <div class="container-fluid">
	        <div class="navbar-header">
	            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	                <span class="sr-only">Toggle navigation</span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	            </button>
	            <a class="navbar-brand "  href="#"><img src="image/logo.jpg"></i>&nbsp;frontier平台管理系统</a>
	        </div>
	        <div id="navbar" class="navbar-collapse collapse">
	            <ul class="nav navbar-nav navbar-right">
	                <li><a href="#" class="header-a"><img src="<?php echo $currentUser["Header"] !=''? IMAGE_URL . $currentUser["Header"]:'image/default.png'?>"></i><span class="userNameSpan"><?php echo $currentUser["Name"] ?></span>
	                </a></li>
	                <li class="btnOutLine"><a href="layout.php" class="header-a"><i class="glyphicon glyphicon-off"></i><span>注销</span></a></li>
	            </ul>
	        </div>
	    </div>
	</nav>