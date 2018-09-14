<?php  
	require_once("service/dataService.php");

	if(array_key_exists("id" , $_GET)){
		$id = $_GET["id"];
		//存在参数 读取
		readData(confirmOrderSql($id) , 'no');
		returnMessages("确认订单成功!" , "myOrders.php");
	}
	else{
		returnMessages("没有该书的信息!" , "myOrders.php");
		exit;
	}

	//检验是否登录 否则跳转登录页面
	error_reporting(E_ALL ^ E_NOTICE);//隐藏登录后 开始Session与header页面冲突
	session_start();

	if(!array_key_exists("Current", $_SESSION)){
		header("location:login.php");
		exit;
	}