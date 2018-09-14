<?php  

	require_once("../services/dbHelper.php"); 
    require_once("../services/dataService.php");
    require_once("../services/globalService.php");

    /*返回上一界*/
	$returnBack = $_SERVER["HTTP_REFERER"];

	@session_start();
	if(array_key_exists("Current", $_SESSION)){
    	$currentUser = $_SESSION["Current"];
    }
    else{
    	returnMessages("您还没有登录!" , "login.php");
    	exit;
    }

    /*开始操作*/
	if(array_key_exists("noteId", $_GET)){
		$noteId = $_GET["noteId"];
		$result = readData(cancelRequestSql($noteId) , 'dml');
		if($result > 0){
			$_SESSION["MessageShow"] = '取消成功！';
			$_SESSION["colorShow"] = '#1DA362';
			header("location:" . $returnBack);
		}
		else{
			$_SESSION["MessageShow"] = '取消失败！';
			$_SESSION["colorShow"] = '#E11111';
			header("location:" . $returnBack);
		}
	}	
	else{
		returnMessages("您操作不规范!" , "index.php");
	}

