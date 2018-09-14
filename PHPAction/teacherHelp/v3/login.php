<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 
		session_start();

		require_once("services/memberService.php");

		if($_SERVER["REQUEST_METHOD"] == "POST"){
			// 登录
			$phone = $_POST["phone"];
			$pwd = $_POST["password"];

			$reader = login($phone , $pwd);
			print_r($reader);
			if(!is_null($reader)){
				// 保存到
				$_SESSION["CurrentReader"] = $reader;
				//
				header("location:" . $_SESSION["BackUrl"]);
				// var_dump($reader);
				// echo "<hr />";
				// var_dump($_SESSION["BackUrl"]);
				// unset($_SESSION["BackUrl"]);
				exit;
			}
		}
		else{
			$backURL = $_SERVER["HTTP_REFERER"];
			echo $backURL;
			echo "<hr />";
			$_SESSION["BackUrl"] = $backURL;
		}

	 ?>
	<form method="post">
		手机号码:<input type="text" name="phone">
		密码: <input type="text" name="password">
		<button>登录</button>
		<hr>
		<?php echo $_SERVER["HTTP_REFERER"] ; ?>
		<hr>
		<a href="<?php echo $_SERVER["HTTP_REFERER"] ?>">返回</a>
		<button type="button" onclick="history.back();">返回</button>
	</form>
	
</body>
</html>