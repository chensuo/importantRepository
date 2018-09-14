<?php  

	require_once("service/dataService.php");
	require_once("service/golableService.php");
	
	if(array_key_exists("pageIndex" , $_GET)){
		$pageIndex = $_GET["pageIndex"];
	}
	else{
		$pageIndex = 0;
	}
	//验证是该书是否存在 不存在即跳回books.php
	if(array_key_exists("bookId" , $_GET)){
		$bookId = $_GET["bookId"];
	}
	else{
		returnMessages("没有该书的信息!" , "myBooks.php");
		exit;
	}
	
	//检验是否登录 否则跳转登录页面
	error_reporting(E_ALL ^ E_NOTICE);//隐藏登录后 开始Session与header页面冲突
	session_start();

	if(!array_key_exists("Current", $_SESSION)){
		header("location:login.php");
		exit;
	}

	$userId = $_SESSION["CurrentId"];
	//删除数据
	readData(removeOneBookSql($userId , $bookId) , 'no');

	returnMessages("移除成功!" , 'myBooks.php?pageIndex=' . $pageIndex);
	
	

?>
	
	
