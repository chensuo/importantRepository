<?php 
	header('Access-Control-Allow-Origin:*');
	header('Access-Control-Allow-Method:POST,GET');
	header("content-type:application/json;charset=utf-8");

	require_once("../services/dataService.php");

	$sectionId = $_POST["sectionId"];
	$sectionName = $_POST["sectionName"];
	$priority = $_POST["priority"];
	$image = $_POST["image"];
	if($image){
		/*发送请求 新增模块*/
		$result = readData(editNotesSection($sectionId , $sectionName , $priority , $image) ,'dml');
	}
	else{
		/*没改图片*/
		$result = readData(editNotesSectionNotImage($sectionId , $sectionName , $priority) ,'dml');
	}


	if($result == 1){
		$result = [
			"code" => 100,
			"message" => "修改成功",
		];
	}
	else{
		$result = [
			"code" => 101,
			"message" => "修改失败",
		];
	}	
	header("content-type:application/json;charset=utf-8");
	echo json_encode($result);