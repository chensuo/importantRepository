<?php 

define("DB_HOST" , "192.168.12.120");
define("DB_USER_NAME" , "root");
define("DB_PASSWORD" , "cs");
define("DB_NAME" , "librarydb");


function executeNonQuery($sql){ // dml
	@$con = mysqli_connect(DB_HOST ,DB_USER_NAME , DB_PASSWORD ,DB_NAME);
	if(mysqli_connect_errno())
		return false;

	$val = mysqli_query($con , $sql);

	mysqli_close($con);

	return $val;
}


/*
	功能描述：专门执行单条select语句

	SELECT ID ,NAME,AGE FROM STUDENTS;

	SELECT AVG(age) , COUNT(*) FROM STUDENTS;

*/
function executeQuery($sql){	// DQL
	@$con = mysqli_connect(DB_HOST ,DB_USER_NAME , DB_PASSWORD ,DB_NAME);
	if(mysqli_connect_errno())
		return false;

	$result = mysqli_query($con , $sql);
	if($result){
		// 
		$rows = mysqli_fetch_all($result , MYSQLI_BOTH);

		mysqli_free_result($result);
		mysqli_close($con);

		return $rows;
	}

	return false;
}


/*
	
*/

function executeMultiQuery($sql){
	@$con = mysqli_connect(DB_HOST ,DB_USER_NAME , DB_PASSWORD ,DB_NAME);
	if(mysqli_connect_errno())
		return false;

	$flag = mysqli_multi_query($con , $sql);

	if($flag){
		$list = [];
		do{
			$result = mysqli_store_result($con);
			$list[] = mysqli_fetch_all($result , MYSQLI_BOTH);
		}while(mysqli_more_results($con) && mysqli_next_result($con));

		mysqli_close($con);
		return $list;

	}

	return false;
}