<?php 
	header('Access-Control-Allow-Origin:*');
	header('Access-Control-Allow-Method:POST,GET');
	header("content-type:application/json;charset=utf-8");

	require_once("../services/dataService.php");

	/*获取该用户memberId 和emali*/
	$memberId = $_POST["memberId"];
	$noteId = $_POST["noteId"];
	$content = $_POST["content"]; 

	/*发送请求*/
	$result = replayNotes($noteId , $memberId , $content);
	$newData = readData(getFloorSql($noteId));

	if($result > 0){
		$result = [
			"code" => 100,
			"message" => "请求成功",
			"data" => $newData
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
