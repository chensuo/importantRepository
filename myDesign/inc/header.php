<?php 
	/*
		根据url给与导航栏选中效果
	*/
	function finUrl($url){
	 	return stristr($_SERVER["REQUEST_URI"] , $url);
	}
	
	/*检查是否登录*/
	@session_start();
	if(array_key_exists("Current", $_SESSION)){
		//用户已登录
		$name =  "，" . $_SESSION["Current"]["Name"] . " " ."<a href='layout.php'  class='logoutShow'>注销</a>";	
	}
	else{
		$name = '<a class="loginShow" style="" href="login.php">登录</a>';
	}
 ?>
<div class="header">
		<div><span>欢迎来到frontier <?php echo $name; ?></span>
		<i>
			<a href="community.php">用户社区</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="userGuide.php">关于我们</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="downloadApp.php">手机APP</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="eng_v/index.php">中英切换</a>
		</i></div>
	</div>
	<div class="logoContainer">
		<div><a href="index.php"><img src="image/logo.jpg" class="logo"></a></div>
		<div>
			<div class="input-group">
                <input type="text" class="form-control" placeholder="请输入新闻模块名" id="search-input"/ >
                <span class="input-group-btn" id="btnSearch">
                   <button class="btn btn-primary btn-search " id="btn-keyWord-search">查找</button>
                </span>
				<div>热门搜索：&nbsp;&nbsp;<span><a href="newsSection.php?Id=186e391d-204b-11e8-9c83-14dda97c5664">风力发电</a></span>&nbsp;&nbsp;<span><a href="newsSection.php?Id=187b28f2-204b-11e8-9c83-14dda97c5664">遥控模型</a></span>&nbsp;&nbsp;<span><a href="newsSection.php?Id=87c8a518-204a-11e8-9c83-14dda97c5664">太阳能</a></div>
            </div>
		</div>
	
	<div class="iconContainer">
			<a href="user.php">
				<span class="fa fa-user-circle" <?php echo finUrl("user.php") != '' ? 'id=active' : '' ?>></span>
				<span class="link-mybooks" <?php echo finUrl("user.php") != '' ? 'id=active' : '' ?>>&nbsp;用户中心</span>
			</a>
			&nbsp;|
			<a href="aboutMe.php">
				<span class="fa fa-sticky-note" <?php echo finUrl("aboutMe.php") != '' ? 'id=active' : '' ?>></span>
				<span class="link-mybooks" <?php echo finUrl("aboutMe.php") != '' ? 'id=active' : '' ?>>我的帖子</span>
			</a>
		</div>
	</div>
	<div class="nav" style=" background: url(image/2.jpg) center top;">
		<div>
			<a href="index.php" class="notScroll <?php echo finUrl("index.php") != '' ? 'active' : '' ?>">首页</a>
			<a href="community.php" class="notScroll <?php echo finUrl("community.php") != '' ? 'active' : '' ; echo finUrl("note.php") != '' ? 'active' : '' ?>">用户社区</a>
			<a href="userGuide.php" class="notScroll <?php echo finUrl("userGuide.php") != '' ? 'active' : '' ?>">关于我们</a>
			<a href="downloadApp.php" class="notScroll <?php echo finUrl("downloadApp.php") != '' ? 'active' : '' ?>" >下载APP</a>
			<!-- <a href="">这里是什么</a>
			<a href="">就不告诉你</a> -->
		</div>
</div>
