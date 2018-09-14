<?php 
	header('Access-Control-Allow-Origin:*');
	header('Access-Control-Allow-Method:POST,GET');
	header("content-type:application/json;charset=utf-8");

	require_once("../services/dataService.php");

	$result = [];
	/*发送请求*/
	$sectionId = readData(getgetNewsDataForChartsSectionIdSql());
	for($i = 0 ; $i < count($sectionId) ; $i++){
		$rs = readData(getNewsDataForChartsSql($sectionId[$i]["Id"]));
		$result[] = $rs;
	}



	if($result){
		$result = [
			"code" => 100,
			"message" => "请求成功",
			"data" => $result
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
