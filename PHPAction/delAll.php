<?php  

	/*
		删除全部
	*/
	require_once("service/dataService.php");
	

	//检验是否登录 否则跳转登录页面
	error_reporting(E_ALL ^ E_NOTICE);//隐藏登录后 开始Session与header页面冲突
	session_start();
	if(!array_key_exists("Current", $_SESSION)){
		header("location:login.php");
		exit;
	}

	$userId = $_SESSION["CurrentId"];

	readData(removeAllBooksSql($userId) , 'no');

	returnMessages("移除成功!" , 'myBooks.php');


	
?>