<?php 
	/*
		根据url给与导航栏选中效果
	*/
	function finUrl($url){
	 	return stristr($_SERVER["REQUEST_URI"] , $url);
	 }
	
 ?>
<div class="header">
		<div><span>Welcome to frontier 张三</span>
		<i>
			<a href="community.php">User community</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="downloadApp.php">Mobile APP</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="index.php">Join us</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="index.php">Chinese version</a>
		</i></div>
	</div>
	<div class="logoContainer">
		<div><a href="index.php"><img src="image/logo.jpg" class="logo"></a></div>
		<div>
			<div class="input-group">
                <input type="text" class="form-control" placeholder="please enter the keyword" id="search-input"/ >
                <span class="input-group-btn" id="btnSearch">
                   <a href="books.php" class="btn btn-primary btn-search " >search</a>
                </span>
				<div>Hot search：&nbsp;&nbsp;<span><a href="detail.php?bookId=06f4a2a0-f470-11e7-b1c3-54e1adda4205">new energy</a></span>&nbsp;&nbsp;<span></span>&nbsp;&nbsp;<span><a href="detail.php?bookId=80d8e571-a385-11e7-9297-002522cc5ae9">science and technology</a></div>
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
				<span class="link-mybooks" <?php echo finUrl("aboutMe.php") != '' ? 'id=active' : '' ?>>About me</span>
			</a>
		</div>
	</div>
	<div class="nav" style=" background: url(image/2.jpg) center top;">
		<div>
			<a href="index.php" <?php echo finUrl("index") != '' ? 'class=active' : '' ?>>home</a>
			<a href="community.php" <?php echo finUrl("community") != '' ? 'class=active' : '' ?>>User community</a>
			<a href="userGuide.php" <?php echo finUrl("userGuide.php") != '' ? 'class=active' : '' ?>>User guide</a>
			<a href="downloadApp.php" <?php echo finUrl("downloadApp.php") != '' ? 'class=active' : '' ?>>Download APP</a>
			<!-- <a href="">这里是什么</a>
			<a href="">就不告诉你</a> -->
		</div>
</div>