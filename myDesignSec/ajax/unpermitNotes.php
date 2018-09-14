<?php 
	header('Access-Control-Allow-Origin:*');
	header('Access-Control-Allow-Method:POST,GET');
	header("content-type:application/json;charset=utf-8");

	require_once("../services/dataService.php");
	require_once("../services/dbHelper.php");
	$noteId = $_POST["noteId"];
	/*发送请求 获取数据*/
	$result = readData(unPermitSuccessSql($noteId) , 'dml');
	

	if($result > 0){
		$result = [
			"code" => 100,
			"message" => "驳回成功",
		];
	}
	else{
		$result = [
			"code" => 101,
			"message" => "请求失败"
		];
	}	
	header("content-type:application/json;charset=utf-8");
	echo json_encode($result);