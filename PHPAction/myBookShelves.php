<?php 

	/*

		加入借书架
	*/
	require_once("service/dataService.php");

	/*先验证是否登录*/
	session_start();

	if(!array_key_exists("Current", $_SESSION)){
		header("location:login.php");
		exit;
	}
	else{
		$userId = $_SESSION["CurrentId"];
	


		$bookId = $_GET["bookId"];

		//获取该书信息
		$book = readData(getBookDetailSql($bookId));

		//验证是该书是否存在 不存在即跳回books.php
		$count = count($book);
		if($count == 0){
			returnMessages("没有该书的信息!" , "books.php");
			exit;
		}

		/*
			检验是否可借书
		*/
		$borrowNum = readData(getBookDetailSql($bookId))[0]["borrowNum"];
		if($borrowNum == 0){
			returnMessagesNotLoc("抱歉，可借数量不足!");
			echo "<script>history.back();</script>";
			exit;
		}
		else{
			returnMessagesNotLoc("成功加入借书架!");
			echo "<script>history.back();</script>";
			readData(addBooksSql($userId , $bookId) , "no");
		}
	}
?>