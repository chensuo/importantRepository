<?php 
	header('Access-Control-Allow-Origin:*');
	header('Access-Control-Allow-Method:POST,GET');
	header("content-type:application/json;charset=utf-8");

	require_once("../services/dataService.php");

	/*获取该用户memberId 和emali*/
	$memberId = $_POST["memberId"];
	$star = $_POST["star"]; 
	$sign = $_POST["sign"]; 
	$sex = $_POST["sex"]; 

	/*发送请求*/
	$result = editManyInfo($sex ,$star , $sign , $memberId);

	$data = readData(getHisInfoSql($memberId))[0];

	if($result > 0){
		$result = [
			"code" => 100,
			"message" => "请求成功",
			'data' => $data
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
