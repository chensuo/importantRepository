<?php 

		require_once("dbHelper.php");
		/*
			读取基本数据  
		*/
		function readData($sql , $isDQL = 'yes'){
			//创建连接
			$con = startConBookDb();

			//读取数据库数据
			$result = mysqli_query($con , $sql);	

			//一次获取数据
			if($isDQL == 'yes'){
				if($result){
					$books = [];
					$row = mysqli_fetch_all($result , MYSQLI_ASSOC);
					$books = $row;
					return $books;
					mysqli_free_result($result);
				}

			}
			
			mysqli_close($con);
			
		}

		/*
			分页
		*/
		function showPage($newSql , $secSql,  $pageIndex = 0 , $pageSize = 3){
			$startIndex = $pageIndex * $pageSize;
			$sql = $newSql." limit {$startIndex} , {$pageSize};";
			$sql.= $secSql;
			$list = executeMultiQuery($sql);
			if(is_bool($list)){
				return false;
			}
			//第一个结果集
			$books = [];
			if($list[0]){
				$books = $list[0];
			}

			//第二个结果集
			$totalRowsNum = 0;
			if($list[1]){
				$totalRowsNum = $list[1][0][0];
			}
			return [
				"books" => $books,
				"totalRowsNum" => $totalRowsNum
			];
			
		}
		/*
			图书商城页面 获取所有图书信息sql
		*/
		function getAllBooks($cid = "" , $pid = "" , $pageIndex = 0 , $pageSize = 6){
			$sql1 = "select b.id ,b.isbn, b.name ,b.pinyin ,  b.publishDate, b.image, b.introduce , b.state ,b.categoryId,c.name as categoryName ,b.publisherId, p.name as publisherName, b.authorId , a.name as authorName , b.Amount , (select count(1) from bookdetails where State = 1 and BookId = b.id) as borrowNum from books b inner join categories c on b.CategoryId = c.Id inner join publishers p on b.PublisherId = p.Id inner join `authors` a on a.Id = b.AuthorId where 1=1";

			$sql2 = "select count(*) from books b inner join categories c on b.CategoryId = c.Id inner join publishers p on b.PublisherId = p.Id inner join `authors` a on a.Id = b.AuthorId where 1=1";

			// 添加条件
			if($cid != ""){
				$sql1 = $sql1 . " and c.id = '{$cid}'";
				$sql2 = $sql2 . " and c.id = '{$cid}'";
			}

			if($pid != ""){
				$sql1 = $sql1 . " and p.id = '{$pid}'";
				$sql2 = $sql2 . " and p.id = '{$pid}'";
			}

			// 分页
			$startIndex = $pageIndex * $pageSize;
			$sql1 = $sql1 . " limit {$startIndex} , {$pageSize};";


			$sql = $sql1 . $sql2 . ";";
			$list = executeMultiQuery($sql);

			if(is_bool($list))
				return false;

			// print_r($list);

			$books = [];
			$totalRowCount = 0;

			foreach($list[0] as $item){
				$books[] = $item;
			}

			$totalRowCount = $list[1][0][0];


			return [
				"books" => $books,
				"total" => $totalRowCount
			];

		}


		/*
			添加借书架 检查bookId 是否存在
		*/
		function getBookById($bookId){
			$sql = "select b.id ,b.isbn, b.name ,b.pinyin ,  b.publishDate, b.image, b.introduce , b.state ,b.categoryId,c.name as categoryName,b.publisherId, p.name as publisherName , b.authorId , a.name as authorName, b.Amount , (select count(1) from bookdetails where State = 1 and BookId = b.id) as borrowNum from books b inner join categories c on b.CategoryId = c.Id inner join publishers p on b.PublisherId = p.Id inner join `authors` a on a.Id = b.AuthorId where b.Id = '{$bookId}'";

			$result = executeQuery($sql);
			if(is_bool($result)){
				return false;
			}

			$book = null;
			if($result){
				$book = [
					"id" => $result[0][0],
					"isbn" => $result[0][1],
					"name" => $result[0][2],
					"image" => $result[0][5],
					"number" => $result[0][15]
				];
			}

			return $book;

		}




		//返回提示信息
		function returnMessages($messages , $link = "index.php"){
			echo "<script>alert('$messages'); location.href='$link';</script>";
		}
		function returnMessagesNotLoc($messages){
			echo "<script>alert('$messages');</script>";
		}

		

		/*
			获取轮播广告图片sql
		*/
		function getAdvantSql(){
			return $sql = "select Id , Image , Link , Priority from adverts order by priority desc;";
		}

		/*
			获取首页所有推荐栏目sql
		*/
		function getHomeSectionsSql(){
			return $sql = "select id , name , priority from sections order by Priority desc;";
		}

		/*
			首页 根据特定栏目id 获取图书列表Sql
		*/
		function getHomeSectionsBooksSql($sectionId){
			return $sql = "select b.id ,b.isbn, b.name ,b.pinyin ,  b.publishDate, b.image, b.introduce , b.state ,b.categoryId,c.name as categoryName,b.publisherId, p.name as publisherName , b.authorId , a.name as authorName  , b.Amount , (select count(1) from bookdetails where State = 1 and BookId = b.id) 
from books b inner join categories c on b.CategoryId = c.Id inner join publishers p on b.PublisherId = p.Id inner join `authors` a on a.Id = b.AuthorId inner join bookinsections bs on b.Id = bs.BookId
where bs.SectionId = '{$sectionId}' limit 5;";

		}

		/*
			图书商城页面 获取所有分类sql
		*/
		function getAllCategoriesSql(){
			return $sql = "select Id ,Name ,Icon , Tag from Categories;";
		}
		/*
			图书商城页面 获取所有出版社sql
		*/
		function getAllPublishersSql(){
			return $sql = "select Id,Name from Publishers;";
		}
		
		/*
			登录页面 检验账号密码是否匹配sql
		*/
		function confirmUserSql($userName , $password){
			return $sql = "select id,name,Phone,CardId,Address,State , Header from members where phone='{$userName}' and password=password('{$password}')";
		}

		/*
			详情页面 获取详情Sql
		*/
		function getBookDetailSql($bookId){
			return $sql = "select b.id ,b.isbn, b.name ,b.pinyin ,  b.publishDate, b.image, b.introduce , b.state ,b.categoryId,c.name as categoryName,b.publisherId, p.name as publisherName , b.authorId , a.name as authorName  , b.Amount , (select count(1) from bookdetails where State = 1 and BookId = b.id) as borrowNum 
from books b inner join categories c on b.CategoryId = c.Id inner join publishers p on b.PublisherId = p.Id inner join `authors` a on a.Id = b.AuthorId
where b.Id = '{$bookId}';";
		}
		/*
			详情页面 获取该作者信息
		*/
		function getAuthorSql($authorId){
			return $sql = "select Id,Name,Pinyin,Header,Introduce from Authors where Id = '{$authorId}';";
		}

		/*
			用户把书加入借书架Sql
		*/
		function addBooksSql($userId , $bookId){
			return $sql = "insert into bookshelves(id , memberId , bookId, createTime) values(UUID() , '{$userId}' , '{$bookId}' , unix_timestamp(now()));";
		}

		/*
			获取当前用户的借书架信息Sql
		*/
		function getUserBooksSql($userId){
			return $sql = "select b.id ,b.isbn, b.name ,b.pinyin ,  b.publishDate, b.image, b.introduce , b.state ,b.categoryId,c.name as categoryName,b.publisherId, p.name as publisherName, b.authorId , a.name  as authorName, b.Amount , (select count(1) from bookdetails where State = 1 and BookId = b.id) as borrowNum 
from books b inner join categories c on b.CategoryId = c.Id inner join publishers p on b.PublisherId = p.Id inner join `authors` a on a.Id = b.AuthorId inner join bookshelves bs on bs.BookId = b.Id 
where memberId = '{$userId}'";
		}
		/*
			获取当前用户借书架数目Sql
		*/
		function getUserBooksNumSql($userId){
			return $sql = "select count(*) as userBooksNum 
from books b inner join categories c on b.CategoryId = c.Id inner join publishers p on b.PublisherId = p.Id inner join `authors` a on a.Id = b.AuthorId inner join bookshelves bs on bs.BookId = b.Id 
where memberId = '{$userId}';";
		}

		/*
			借书架移除单本图书Sql
		*/
		function removeOneBookSql($userId , $bookId){
			return $sql = "delete from bookshelves where memberId='{$userId}' and bookId='{$bookId}';";
		}

		/*
			清空借书架Sql
		*/
		function removeAllBooksSql($userId){
			return $sql = "delete from bookshelves where memberId='{$userId}'";
		}

		/*
			获取当前用户 当前订单Sql
		*/
		function getUserOrdersSql($userId){
			return $sql = "select br.id , br.borrowNumber , br.bookId , b.name , b.Image , br.bookNumber , b.AuthorId , a.`Name` as authorName, b.PublisherId , p.`Name` as publisherName ,br.createTime , br.sendTime , br.ReceiveTime , br.state 
from borrowrecords br inner join books b on b.Id = br.BookId inner join `authors` a on b.AuthorId = a.Id inner join publishers p on b.PublisherId = p.Id 
where br.state = 1 and br.MemberId = '{$userId}' or br.state = 2 and br.MemberId = '{$userId}' or br.state = 3 and br.MemberId = '{$userId}' order by br.state asc , br.CreateTime";
		}

		/*
			获取当前用户 当前订单数目Sql
		*/
		function getUserCurrentOrdersCountSlql($userId){
			return $sql = "select count(*) as currentOrdersCount
from borrowrecords br inner join books b on b.Id = br.BookId inner join `authors` a on b.AuthorId = a.Id inner join publishers p on b.PublisherId = p.Id 
where br.state = 1 and br.MemberId = '{$userId}' or br.state = 2 and br.MemberId = '{$userId}' or br.state = 3 and br.MemberId = '{$userId}' order by br.state asc , br.CreateTime;";
		}

		/*
			获取当前用户 历史订单Sql
		*/
		function getUserHistoryOrdersSql($userId){
			return $sql = "select br.id , br.borrowNumber , br.bookId , b.name , b.Image , br.bookNumber , b.AuthorId , a.`Name` as authorName, b.PublisherId , p.`Name` as publisherName ,br.createTime , br.sendTime , br.ReceiveTime , br.state 
from borrowrecords br inner join books b on b.Id = br.BookId inner join `authors` a on b.AuthorId = a.Id inner join publishers p on b.PublisherId = p.Id 
where br.state = 0 and br.MemberId = '{$userId}' or br.state = 4 and br.MemberId = '{$userId}' order by br.state asc , br.CreateTime";
		}

		/*
			获取当前用户 历史订单数目Sql
		*/
		function getUserHistoryOrdersCountSlql($userId){
			return $sql = "select count(*) as currentOrdersCount
from borrowrecords br inner join books b on b.Id = br.BookId inner join `authors` a on b.AuthorId = a.Id inner join publishers p on b.PublisherId = p.Id 
where  br.state = 0 and br.MemberId = '{$userId}' or br.state = 4 and br.MemberId = '{$userId}' order by br.state asc , br.CreateTime;";
		}

		/*
			订单页面 取消订单Sql 1
		*/
		function cancelOrderSql($id){
			return $sql = "update borrowrecords set state=0 where id='{$id}';";
		}
		/*
			订单页面 取消订单Sql 2s
		*/
		function cancelOrderSecSql($bookNumber){
			return $sql = "update bookDetails set state = 1 where Number='{$bookNumber}';";
		}

		/*
			订单页面 确认订单 1
		*/
		function confirmOrderSql($id){
			return $sql = "update borrowrecords set state=3 where id='{$id}';";
		}
 ?>