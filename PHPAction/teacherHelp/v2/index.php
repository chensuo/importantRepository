<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>首页</title>
	<style type="text/css">
		img{
			display: inline-block;
			width:128px;
		}
	</style>
</head>
<body>
	<?php 
		require_once("services/advertService.php");
		require_once("services/sectionService.php");
		require_once("util/globalSetting.php");

		$adverts = getAllAdverts();

		$sections = getAllSections();

	?>
	<?php 
		include_once("inc/header.php");
	 ?>
	<hr>
	<!-- 广告 -->
	<div>
		<?php foreach ($adverts as $item):?>
			<img src="<?php echo IMAGE_URL_ROOT . $item["image"]; ?>" alt="<?php echo $item["link"]; ?>">
		<?php endforeach ?>
	</div>
	<!-- 栏目及栏目下图书 -->
	<div>
		<?php foreach($sections  as $item): ?>
			<div>
				<h2><?php echo $item["name"]; ?><a href="bookList.php?section=<?php echo $item["id"]; ?>">更多</a></h2>

				
				<?php foreach($item["books"] as $book): ?>
				<div style="display: inline-block;">
					<div>
						<img src="<?php echo IMAGE_URL_ROOT  . $book["image"] ?>">
					</div>
					<h4><?php echo $book["name"]; ?></h4>
				</div>
				<?php endforeach ?>
			</div>
		<?php endforeach ?>
	</div>
	<a href="login.php">登录</a>
</body>
</html>