<?php 
	header('Access-Control-Allow-Origin:*');
	header('Access-Control-Allow-Method:POST,GET');
	header("content-type:application/json;charset=utf-8");

	require_once("../services/dataService.php");
	require_once("../services/dbHelper.php");
	$sectionId = $_GET["sectionId"];
	$state = $_GET["state"];

	/*发送请求 获取数据*/

	/*都不为空*/
	if($sectionId != '' && $state != ''){
		$result = readData(getNotesDataSec($sectionId , $state));
		for($i = 0 ; $i < count($result) ; $i++){
			$result[$i]["Time"] = showTimeSec($result[$i]["Time"]);
			$result[$i]["State"] = showState($result[$i]["State"]);
		}
		$data = $result;
	}
	/*都为空*/
	if($sectionId == '' && $state == ''){
		$result = readData(getAllNotesData());
		for($i = 0 ; $i < count($result) ; $i++){
			$result[$i]["Time"] = showTimeSec($result[$i]["Time"]);
			$result[$i]["State"] = showState($result[$i]["State"]);
		}
		$data = $result;
	}
	/*state为空*/
	if($state == '' && $sectionId != ''){
		$result = readData(getNotesData($sectionId));
		for($i = 0 ; $i < count($result) ; $i++){
			$result[$i]["Time"] = showTimeSec($result[$i]["Time"]);
			$result[$i]["State"] = showState($result[$i]["State"]);
		}
		$data = $result;
	}
	/*sectionId为空*/
	if($state != '' && $sectionId == ''){
		$result = readData(getAllNotesDataThi($state));
		for($i = 0 ; $i < count($result) ; $i++){
			$result[$i]["Time"] = showTimeSec($result[$i]["Time"]);
			$result[$i]["State"] = showState($result[$i]["State"]);
		}
		$data = $result;
	}

	if($result){
		$result = [
			"code" => 100,
			"message" => "请求成功",
			"Data" => $data
		];
	}
	else{
		$result = [
			"code" => 101,
			"message" => "没有数据",
			"Data" => ''
		];
	}	
	header("content-type:application/json;charset=utf-8");
	echo json_encode($result);