<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>下载APP</title>
	<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="lib/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/global.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/foot.css">
	<link rel="stylesheet" type="text/css" href="lib/css/star.css">
	<link rel="stylesheet" type="text/css" href="css/downloadApp.css">
</head>
<body>
	<!-- 头部 -->
	<?php 
		include_once("inc/header.php");
	?>
	 <!-- 星星特效 -->
    <canvas id="canvas" style="position: absolute; z-index: -10;bottom: 0;top:150px;right: 0;left: 0" ></canvas>
	<!-- 主体 -->
	<div class="app-container">
		<img src="image/App.png">
		<div class="bottom-container">
			<div>
				<img src="image/d_2.png">
				<div>
					<div>功能丰富</div>
					<div>支持分类信息/主体分类<br />支持搜索/分享/删除/注册</div>
				</div>
			</div>
			<div>
				<img src="image/d_3.png">
				<div>
					<div>实时更新</div>
					<div>社区热帖实时更新/所有数据<br />和网站实时同步</div>
				</div>
			</div>
			<div>
				<img src="image/d_4.png">
				<div>
					<div>周边功能</div>
					<div>查看周边用户、周围帖子</div>
				</div>
			</div>
		</div>
		<div class="bottom-container">
			<div>
				<img src="image/d_5.png">
				<div>
					<div>信息维护</div>
					<div>用户可以随时更改自己用户信息</div>
				</div>
			</div>
			<div>
				<img src="image/d_6.png">
				<div>
					<div>语音发帖</div>
					<div>轻松录音上传倾听ta的声音</div>
				</div>
			</div>
			<div>
				<img src="image/d_7.png">
				<div>
					<div>消息推送</div>
					<div>回复消息和及时通知好友语音消息系统</div>
				</div>
			</div>
		</div>
	</div>
	

	<!-- 脚注 -->
	<?php 
		include_once("inc/foot.php");
	 ?>

	<script type="text/javascript" src="lib/js/jquery.js"></script>
    <script type="text/javascript" src="lib/js/star.js"></script>
</body>
</html>