<?php 
	header('Access-Control-Allow-Origin:*');
	header('Access-Control-Allow-Method:POST,GET');
	header("content-type:application/json;charset=utf-8");

	require_once("../services/dataService.php");
	require_once("../services/dbHelper.php");
	$sectionId = $_GET["sectionId"];
	/*发送请求 获取数据*/
	if($sectionId != ''){
		$result = readData(getNewsData($sectionId));
		for($i = 0 ; $i < count($result) ; $i++){
			$result[$i]["Time"] = showTimeSec($result[$i]["Time"]);
		}
		$data = $result;
	}
	else{
		$result = readData(getAllNewsData());
		for($i = 0 ; $i < count($result) ; $i++){
			$result[$i]["Time"] = showTimeSec($result[$i]["Time"]);
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
			"sectionId" => $sectionId
		];
	}	
	header("content-type:application/json;charset=utf-8");
	echo json_encode($result);