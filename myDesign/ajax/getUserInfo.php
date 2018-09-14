<?php 
	header('Access-Control-Allow-Origin:*');
	header('Access-Control-Allow-Method:POST,GET');
	header("content-type:application/json;charset=utf-8");

	require_once("../services/dataService.php");
	/*获取memberId 和 新密码*/
	$memberId = $_GET["memberId"];

	/*发送请求*/
	$result = readData(getHisInfoSql($memberId));

	$data = $result[0];
	// foreach ($result as $row) {
	// 	$rs = new MemberInfo();

	// 	$rs -> Id = $row[0];
	// 	$rs -> Phone = $row[1];
	// 	$rs -> Name = $row[3];
	// 	$rs -> Header = $row[4];
	// 	$rs -> Time = $row[5];
	// 	$rs -> Sex = $row[6];
	// 	$rs -> Email = $row[7];
	// 	$rs -> Sign = $row[8];
	// 	$rs -> Star = $row[9];

	// 	$data[] = $rs;
	// }

	if($result){
		$result = [
			"code" => 100,
			"message" => "请求成功",
			"data" => $data
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