<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>intro</title>
	<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/foot.css">
	<link rel="stylesheet" type="text/css" href="lib/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/intro.css">
	<link rel="stylesheet" type="text/css" href="lib/css/star.css">
	<link rel="stylesheet" type="text/css" href="css/global.css">
</head>
<body>
	 <!-- 头部 -->
	<?php 
		include_once("inc/header.php");
	 ?>
	  <!-- 星星特效 -->
    <canvas id="canvas" style="position: absolute; z-index: -10;bottom: 0;top:200px;right: 0;left: 0" ></canvas>
	<div class="intr-container">
		<div class="about">
			<div class="aboutLeft">
				<img src="image/intro1.jpg" alt="frointer technology exchange platform" title="frointer technology exchange platform">
			</div>
			<div class="aboutRight">
				<h4>Core value</h4>
				<p>Communication, Technology, Creativity, Life</p>
				<p>Good, love, beauty, lifelong learning and communication</p>
				<h4>The origin of frontier technology exchange platform</h4>
				<p>frontier，On behalf of the latest and most advanced technologies</p>
				<p>Science and technology exchange is the main function of my platform</p>
				<p>The name "frontier technology exchange platform" is a simple representation of the functions and fields of my platform</p>
				<h4>frontier vision</h4>
				<p>The frontier vision is the most influential and unique leading brand for technology exchange in Chinese society.</p>
				<p>and actively contribute to the promotion of humanistic temperament.</p>
				<h4>frontier Mission</h4>
				<p>It has a substantial contribution to the development and social development of Chinese contemporary science and technology.</p>
				<p>It is an inspiration to the future development of Chinese society.</p>
			</div>
		</div>
		<div class="about">
			<div class="aboutLeft">
				<h4>frontier team inheritance and innovation</h4>
				<P>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Time and space and environmental fate, open the story of frontier, support frontier persisted the science and technology is the crystallization of the wisdom around the show in the frontier field in every smile, every time the enthusiastic participation, have created a unique cultural landscape in the frontier and the new field of science and technology.</P>
				<P>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;At the beginning of its creation, frontier is not just a social networking site, but a compound cultural field. It is compatible with the latest technology news display and user experience.There are more than 5000 field technical performances in Taiwan, Hongkong, 46, frontier in the field every year, 180 million people from around the world gathered here, and frontier created positive energy, the temperament of the unique spirit of place.</P>
			</div>
			<div class="aboutRight">
				<img src="image/intro3.jpg" alt="frointer technology exchange platform" title="frointer technology exchange platform">
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