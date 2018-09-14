<?php 
	header('Access-Control-Allow-Origin:*');
	header('Access-Control-Allow-Method:POST,GET');
	header("content-type:application/json;charset=utf-8");

	require_once("../services/dataService.php");

	$Id = $_POST["Id"];

	/*发送请求 新增模块*/
	$result = readData(delNews($Id) ,'dml');

	if($result > 0){
		$result = [
			"code" => 100,
			"message" => "删除成功",
		];
	}
	else{
		$result = [
			"code" => 101,
			"message" => "删除失败",
		];
	}	
	header("content-type:application/json;charset=utf-8");
	echo json_encode($result);