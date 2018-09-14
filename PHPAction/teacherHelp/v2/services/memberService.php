<?php 


	require_once("dbHelper.php");


	function login($phone , $password){
		$sql = "select id,name,Phone,CardId,Address,State , Header from members where phone='{$phone}' and password=password('{$password}')";

		$result = executeQuery($sql);
		if(is_bool($result)){
			return false;
		}

		$reader = null;
		if($result){
			$reader = [
				"id" => $result[0]["id"],
				"name" => $result[0]["name"]
			];
		}

		return $reader;
	}