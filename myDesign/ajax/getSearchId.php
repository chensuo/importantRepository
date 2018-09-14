<?php 
	header('Access-Control-Allow-Origin:*');
	header('Access-Control-Allow-Method:POST,GET');
	header("content-type:application/json;charset=utf-8");

	require_once("../services/dataService.php");

	$sectionName = $_GET["sectionName"];
	/*发送请求*/
	$result = readData(getSearchSectionId($sectionName));
	if($result){
			$result = [
				"code" => 100,
				"message" => "请求成功",
				"data" => $result[0]
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