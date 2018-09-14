<?php 
	header('Access-Control-Allow-Origin:*');
	header('Access-Control-Allow-Method:POST,GET');
	header("content-type:application/json;charset=utf-8");

	require_once("../services/dataService.php");

	/*发送请求 获取所有新闻模块*/
	$result = readData(getNotesSectionSql());

	$data = $result;

	if($result){
		$result = [
			"code" => 100,
			"message" => "请求成功",
			"data" => $data
		];
	}
	else{
		$result = [
			"code" => 101,
			"message" => "请求失败",
		];
	}	
	header("content-type:application/json;charset=utf-8");
	echo json_encode($result);