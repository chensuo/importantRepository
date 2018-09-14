<?php 

	define("DB_IP" , '127.0.0.1');
	define("DB_USER" , 'root');
	define("DB_PWD" , 'cs');
	define("DB_NAME" , 'librarydb');

	/*
			建立连接
	*/
	function startConBookDb(){
		//创建连接
		$con = mysqli_connect(DB_IP , DB_USER , DB_PWD , DB_NAME);

		//检查连接状态
		if(mysqli_connect_errno()){
			return $books = [];
			exit;
		}
		return $con;

	}


	
	//	关闭连接
	
	function endConBookDb($con){
		// mysqli_free_result($result);
		mysqli_close($con);
	}

	//多重
	function executeMultiQuery($sql){
		$con = startConBookDb();
		$flag = mysqli_multi_query($con , $sql);

		if($flag){
			$list = [];
			do{
				$result = mysqli_store_result($con);
				$list[] =  mysqli_fetch_all($result , MYSQLI_BOTH);
			}while(mysqli_more_results($con) && mysqli_next_result($con));

			//关闭连接
			endConBookDb($con);
			return $list;
		}
		else{
			return false;
		}

	}


	//单 dml

	function executeNonQuery($sql){ // dml
		$con = startConBookDb();
		if(mysqli_connect_errno())
			return false;

		$val = mysqli_query($con , $sql);

		
			//关闭连接
			endConBookDb($con);

		return $val;
	}


	/*
	功能描述：专门执行单条select语句

	SELECT ID ,NAME,AGE FROM STUDENTS;

	SELECT AVG(age) , COUNT(*) FROM STUDENTS;

	*/
	function executeQuery($sql){	// DQL
		$con = startConBookDb();
		if(mysqli_connect_errno())
			return false;

		$result = mysqli_query($con , $sql);
		if($result){
			// 
			$rows = mysqli_fetch_all($result , MYSQLI_BOTH);

			mysqli_free_result($result);
			//关闭连接
			mysqli_close($con);

			return $rows;
		}

		return false;
	}

	/*
		判断书当前状态
	*/
	function showBooksState($state){
		 if($state == 1){
            echo '等待确认订单';
        }
        if($state == 0){
            echo '订单已取消';
        }
        if($state == 2){
            echo '书已配送';
        }
        if($state == 3){
            echo '已收货,请及时归还';
        }
        if($state == 4){
            echo '书已归还';
        }
	}

	/*
		多条DML
	*/
	function executeMultiNonQuery($sqlList){
		$con = startConBookDb();
		if(mysqli_connect_errno())
			return false;

		// 设置事务处理，从自动方式改为手动
		mysqli_autocommit($con , false);

		foreach($sqlList as $sql){
			$result = mysqli_query($con , $sql);
			// 检查每条SQL执行结果，如果失败，回滚所有操作，并终止执行
			if(!$result){
				// 
				// echo "错误描述：" . mysqli_error($con);
				// echo "<hr />";
				mysqli_rollback($con);
				mysqli_close($con);
				return false;
			}
		}
		// 所有SQL语句执行成功，手工提交
		mysqli_commit($con);
		//关闭连接
		mysqli_close($con);
		return true;


	}

 ?>