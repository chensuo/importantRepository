<?php 
	header('Access-Control-Allow-Origin:*');
	header('Access-Control-Allow-Method:POST,GET');
	header("content-type:application/json;charset=utf-8");

	require_once("../services/dataService.php");

	$sectionName = $_POST["sectionName"];
	$priority = $_POST["priority"];
	$image = $_POST["image"];

	/*发送请求 新增模块*/
	$result = addNewsSection($sectionName , $priority , $image);

	if($result > 0){
		$result = [
			"code" => 100,
			"message" => "添加成功"
		];
	}
	else{
		$result = [
			"code" => 101,
			"message" => "添加失败",
			"sectionName" => $sectionName,
			"priority" => $priority,
			"image" => $image
		];
	}	
	header("content-type:application/json;charset=utf-8");
	echo json_encode($result);