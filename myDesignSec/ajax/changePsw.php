<?php 
	header('Access-Control-Allow-Origin:*');
	header('Access-Control-Allow-Method:POST,GET');
	header("content-type:application/json;charset=utf-8");

	require_once("../services/dataService.php");
	/*获取memberId 和 新密码*/
	$memberId = $_POST["adminId"];
	$newPsw = $_POST["newPassword"]; 
	$oldPsw = $_POST["oldPassword"]; 
	$res = confirmAdminPassword($oldPsw , $memberId);

	if($res){
		/*发送请求*/
		$result = changeAdminPsw($newPsw , $memberId);
		if($result > 0){
				$result = [
					"code" => 100,
					"message" => "请求成功",
				];
			}
			else{
				$result = [
					"code" => 101,
					"message" => "请求失败",
				];
		}	
	}
	else{
		$result = [
					"code" => 102,
					"message" => "原密码不正确",
				];
	}
	
	header("content-type:application/json;charset=utf-8");
	echo json_encode($result);