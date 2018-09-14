<?php 
	 function finUrl($url){
	 	return strpos($_SERVER["REQUEST_URI"] , $url);
	 }

	 /*检查是否登录*/
	session_start();
	if(array_key_exists("Current", $_SESSION)){
		//用户已登录
		$name =  "，" . $_SESSION["Current"] . " " ."<a href='logout.php'  class='logoutShow'>注销</a>";	
	}
	else{
		$name = '<a class="loginShow" style="" href="login.php">登录</a>';
	}
 ?>


<div class="header">
		<div><span>欢迎来到有书看 <?php echo $name; ?></span>
		<i>
			<a href="myOrders.php">我的订单</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="">个人中心</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="">加入我们</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="">客户服务</a>
		</i></div>
	</div>
	<div class="logoContainer">
		<div><a href="index.php"><img src="image/logo.png" class="logo"></a></div>
		<div>
			<div class="input-group">
                <input type="text" class="form-control" placeholder="请输入关键字" id="search-input"/ >
                <span class="input-group-btn" id="btnSearch">
                   <a href="books.php" class="btn btn-danger btn-search " >查找</a>
                </span>
				<div>热门搜索：&nbsp;&nbsp;<span><a href="detail.php?bookId=06f4a2a0-f470-11e7-b1c3-54e1adda4205">论语</a></span>&nbsp;&nbsp;<span><a href="detail.php?bookId=fc716667-a384-11e7-9297-002522cc5ae9">三国演义</a></span>&nbsp;&nbsp;<span><a href="detail.php?bookId=80d8e571-a385-11e7-9297-002522cc5ae9">活着</a></div>
            </div>
		</div>
	
	<div class="iconContainer">
			<a href="myBooks.php">
				<span class="fa fa-book" <?php echo finUrl("myBooks.php") != '' ? 'id=active' : '' ?>></span>
				<span  class="link-mybooks"  <?php echo finUrl("myBooks.php") != '' ? 'id=active' : '' ?>>&nbsp;借书架<i id="lblCount">0</i></span>
			</a>
			&nbsp;|
			<a href="myOrders.php">
				<span class="fa fa-sticky-note" <?php echo finUrl("myOrders.php") != '' ? 'id=active' : '' ?>></span>
				<span class="link-myOrders" <?php echo finUrl("myOrders.php") != '' ? 'id=active' : '' ?>>我的订单</span>
			</a>
		</div>
	</div>
	<div class="nav" style=" background: url(image/1.jpg) center;">
		<div>
			<a href="index.php"  <?php echo finUrl("index.php") != '' ? 'class=active' : '' ?>>首页</a>
			<a href="books.php" <?php echo finUrl("books.php") != '' ? 'class=active' : '' ?>>图书商城</a>
			<a href="intro.php" <?php echo finUrl("intro.php") != '' ? 'class=active' : '' ?>>品牌简介</a>
			<!-- <a href="">这里是什么</a>
			<a href="">就不告诉你</a> -->
		</div>
</div>