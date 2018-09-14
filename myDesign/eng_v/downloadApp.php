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
					<div>Rich in function</div>
					<div>Support for classification information/principal classification support search/share/delete/registration</div>
				</div>
			</div>
			<div>
				<img src="image/d_3.png">
				<div>
					<div>Real-time update</div>
					<div>Update / community hot all data and real-time synchronization website</div>
				</div>
			</div>
			<div>
				<img src="image/d_4.png">
				<div>
					<div>Peripheral function</div>
					<div>View the surrounding users, the surrounding posts</div>
				</div>
			</div>
		</div>
		<div class="bottom-container">
			<div>
				<img src="image/d_5.png">
				<div>
					<div>Information maintenance</div>
					<div>Users can change their user information at any time</div>
				</div>
			</div>
			<div>
				<img src="image/d_6.png">
				<div>
					<div>Phonetic posting</div>
					<div>Listen to the voice of TA by easy recording</div>
				</div>
			</div>
			<div>
				<img src="image/d_7.png">
				<div>
					<div>Message push</div>
					<div>Reply message and notify good friends voice message system in time</div>
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