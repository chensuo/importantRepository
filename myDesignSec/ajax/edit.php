<?php 
	header('Access-Control-Allow-Origin:*');
	header('Access-Control-Allow-Method:POST,GET');
	header("content-type:application/json;charset=utf-8");

	require_once("../services/dataService.php");

	/*获取该用户memberId 和emali*/
	$memberId = $_POST["memberId"];
	$email = $_POST["email"]; 

	/*发送请求*/
	$result = editInfo($email , $memberId);

	$newEmail = readData(getHisInfoSql($memberId))[0]["Email"];

	if($result > 0){
		$result = [
			"code" => 100,
			"message" => "请求成功",
			'email' => $newEmail
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
