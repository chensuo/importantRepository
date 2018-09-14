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
		$name =  "，" . $_SESSION["Current"]["Name"] . " " ."<a href='layout.php'  class='logoutShow'>Cancellation</a>";	
	}
	else{
		$name = '<a class="loginShow" style="" href="login.php">Sign in</a>';
	}
 ?>
<div class="header">
		<div><span>Welcome to frontier <?php echo $name; ?></span>
		<i>
			<a href="community.php">User community</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="userGuide.php">About us</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="downloadApp.php">Mobile APP</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="../index.php">Switch to Chinese version</a>
		</i></div>
	</div>
	<div class="logoContainer">
		<div><a href="index.php"><img src="image/logo.jpg" class="logo"></a></div>
		<div>
			<div class="input-group">
                <input type="text" class="form-control" placeholder="Please enter the news module name" id="search-input"/ >
                <span class="input-group-btn" id="btnSearch">
                   <button class="btn btn-primary btn-search " id="btn-keyWord-search">search</button>
                </span>
				<div>Hot search：&nbsp;&nbsp;<span><a href="newsSection.php?Id=186e391d-204b-11e8-9c83-14dda97c5664">Wind power generation</a></span>&nbsp;&nbsp;<span><a href="newsSection.php?Id=87c8a518-204a-11e8-9c83-14dda97c5664">Solar energy</a></div>
            </div>
		</div>
	
	<div class="iconContainer">
			<a href="user.php">
				<span class="fa fa-user-circle" <?php echo finUrl("user.php") != '' ? 'id=active' : '' ?>></span>
				<span class="link-mybooks" <?php echo finUrl("user.php") != '' ? 'id=active' : '' ?>>&nbsp;User</span>
			</a>
			&nbsp;|
			<a href="aboutMe.php">
				<span class="fa fa-sticky-note" <?php echo finUrl("aboutMe.php") != '' ? 'id=active' : '' ?>></span>
				<span class="link-mybooks" <?php echo finUrl("aboutMe.php") != '' ? 'id=active' : '' ?>>My post</span>
			</a>
		</div>
	</div>
	<div class="nav" style=" background: url(image/2.jpg) center top;">
		<div>
			<a href="index.php" class="notScroll <?php echo finUrl("index.php") != '' ? 'active' : '' ?>">Home page</a>
			<a href="community.php" class="notScroll <?php echo finUrl("community.php") != '' ? 'active' : '' ; echo finUrl("note.php") != '' ? 'active' : '' ?>">User community</a>
			<a href="userGuide.php" class="notScroll <?php echo finUrl("userGuide.php") != '' ? 'active' : '' ?>">About us</a>
			<a href="downloadApp.php" class="notScroll <?php echo finUrl("downloadApp.php") != '' ? 'active' : '' ?>" >Download APP</a>
			<!-- <a href="">这里是什么</a>
			<a href="">就不告诉你</a> -->
		</div>
</div>
