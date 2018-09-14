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

			if($isDQL == 'dml'){
				return mysqli_affected_rows($con);
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
			$data = [];
			if($list[0]){
				$data = $list[0];
			}

			//第二个结果集
			$totalRowsNum = 0;
			if($list[1]){
				$totalRowsNum = $list[1][0][0];
			}
			return [
				"data" => $data,
				"totalRowsNum" => $totalRowsNum
			];
			
		}

		/*
		 community 最新发帖 分页
		*/
		 function showPageSec($newSql , $secSql,  $pageIndex = 0 , $pageSize = 3){
			$startIndex = $pageIndex * $pageSize;
			$sql = $newSql." limit {$startIndex} , {$pageSize};";
			$sql.= $secSql;
			$list = executeMultiQuery($sql);
			if(is_bool($list)){
				return false;
			}
			//第一个结果集
			$data = [];
			if($list[0]){
				$data = $list[0];
			}

			//第二个结果集
			$totalRowsNum = 0;
			if($list[1]){
				$totalRowsNum = $list[1][0][0];
			}
			return [
				"data" => $data,
				"totalRowsNum" => $totalRowsNum
			];
			
		}


		//返回提示信息
		function returnMessages($messages , $link = "index.php"){
			echo "<script>alert('$messages'); location.href='$link';</script>";
		}
		function returnMessagesNotLoc($messages){
			echo "<script>alert('$messages');</script>";
		}

		/*
			获取首页 热门模块下信息sql
		*/
		function getNewsSectionSql(){
			return $sql = "select * from newsSection order by Priority desc";
		}

		/*
			获取导航栏 社区模块导航sql
		*/
		function getNotesSectionSql(){
			return $sql = "select * from notesSection order by Priority desc";
		}

		/*
			首页点击热门模块 进入该模块页面sql (根据模块Id 查找其有关新闻)
		*/
		function getThisNewSectionSql($sectionId){
			return $sql = "select * from news where SectionId = '{$sectionId}' order by Time desc";
		}

		/*
			newsSection 页面 读取该模块下新闻个数sql
		*/
		function getNewSectionNewsNumSql($sectionId){
			return $sql = "select count(*) as newsNum from news where SectionId = '{$sectionId}'";
		}

		/*
			newsSection 页面 读取该模块模块信息sql
		*/
		function getThisNewsSectionSql($sectionId){
			return $sql = "select * from newsSection where Id = '{$sectionId}'";
		}
		
		/*
			news页面 读取该新闻内容sql 
		*/
		function getThisNewsSql($id){
			return $sql = "select * from news where Id = '{$id}'";
		}

		//获取 该新闻模块名称
		function getThisNewsSectionNameSql($sectionId){
			return $sql = "select SectionName , Id from newsSection where Id = '{$sectionId}'";
		}
		/*
			news查看量+1
		*/
		function calcReadNumSql($id){
			return $sql = "update news set ReadNum = ReadNum + 1 where Id = '{$id}'";
		}
		/*
			news 获取上一篇/下一篇新闻信息
		*/
		function getRoundNewsSql($positionId , $sectionId){
			return $sql = "select Id , Title from news where SectionId = '{$sectionId}' and  PositionId = '{$positionId}'";
		}

		/*
			index 获取最新焦点版块 新闻信息(点击量超过20且存在首图且最多七个按照时间倒序)
		*/
		function getNewestNewsSql(){
			return $sql = "select * from news where ReadNum > 20 and Image !='' ORDER BY Time desc LIMIT 7;";
		}
		/*
			community 获取当前模块下 模块信息
		*/
		function getThisNotesSectionSql($sectionId){
			return $sql = "select * from notesSection where Id = '{$sectionId}'";
		}

		/*
			community 获取当前模块下 所有帖子信息
		*/
		function getThisSectionNotesSql($sectionId){
			return $sql = "select a.Id , a.SectionId , a.Title , a.Content , a.Image , a.MemberId , a.Time ,a.State , a.Image1 ,a.Image2 ,a.Image3 ,b.SectionName ,c.Name , c.Header
 from notes as a INNER JOIN notessection as b on a.SectionId = b.Id INNER JOIN members as c on a.MemberId = c.Id where a.SectionId = '{$sectionId}' and a.State = 1 ORDER BY a.Time desc";
		}
		/*
			community 获取当前模块下 帖子数量
		*/
		function getThisSectionNotesNumSql($sectionId){
			return $sql = "select count(Id) from notes where SectionId = '{$sectionId}' and State = 1";
		}
		/*
			community 获取最新发帖 下帖子信息（所有帖子中 最新$num条 时间排序倒序）
		*/
		function getNewestNotesSql(){
			return $sql = "select a.Id , a.SectionId , a.Title , a.Content , a.Image , a.MemberId , a.Time ,a.State , a.Image1 ,a.Image2 ,a.Image3 ,b.SectionName ,c.Name , c.Header
 from notes as a INNER JOIN notessection as b on a.SectionId = b.Id INNER JOIN members as c on a.MemberId = c.Id where a.State = 1 order by a.Time desc";
		}

		/*
			index 获取社区新帖信息
		*/
		function getNewestNotesIndexSql($num){
			return $sql = "select a.Id , a.SectionId , a.Title , a.Content , a.Image , a.MemberId , a.Time ,a.State , a.Image1 ,a.Image2 ,a.Image3 ,b.SectionName ,c.Name , c.Header
 from notes as a INNER JOIN notessection as b on a.SectionId = b.Id INNER JOIN members as c on a.MemberId = c.Id where a.State = 1 order by a.Time desc limit {$num}";
		}
		/*
			community 获取最新发帖 下 帖子数目
		*/
		function getNewestNotesNumSql(){
			return $sql = "select count(*) from notes";
		}

		
		/*
			note 获取该帖子顶楼信息
		*/
		function getThisNoteFirstSql($noteId){
			return $sql = "select a.Id , a.SectionId , a.Title , a.Content , a.Image , a.MemberId , a.Time ,a.State , a.Image1 ,a.Image2 ,a.Image3 ,b.SectionName ,c.Name , c.Header
 from notes as a INNER JOIN notessection as b on a.SectionId = b.Id INNER JOIN members as c on a.MemberId = c.Id 
where a.Id = '{$noteId}'";
		}

		/*
			note 获取该贴子 评论信息
		*/
		function getThisNoteCommentsSql($noteId){
			return $sql = "select c.Id , c.NoteId , c.MemberId , c.Content , c.Image , c.Time , m.Name , m.Header , m.Id
from comments as c INNER JOIN members as m on c.MemberId = m.Id  where c.NoteId = '{$noteId}' order by c.Time";
		}
		/*
			note 计算评论信息个数
		*/
		function getThisNoteCommentsNumSql($noteId){
			return $sql = "select count(*) as count from comments where NoteId = '{$noteId}'";
		}
		/*
			note 获取最新回复 用户信息
		*/
		function getThisNoteNewsCommenterSql($noteId){
			return $sql = "select c.Id , c.NoteId , c.MemberId , c.Content , c.Image , c.Time , m.Name , m.Header , m.Id
from comments as c INNER JOIN members as m on c.MemberId = m.Id  where c.NoteId = '{$noteId}' order by c.Time desc";
		}
		/*
			community 获取最新会员名字
		*/
		function getNewestUserSql(){
			return $sql = "select Name from members order by Time desc";
		}
		/*
			community 获取昨天评论数量
		*/
		function getYesterdayCommentNumSql(){
			return $sql = "select count(Id) as count from comments where Time > UNIX_TIMESTAMP(CAST(SYSDATE()AS DATE) - INTERVAL 1 DAY) and Time < UNIX_TIMESTAMP(CAST(SYSDATE()AS DATE))";
		}

		/*
			community 获取昨天帖子数量
		*/
		function getYesterdayNoteNumSql(){
			return $sql = "select count(Id) as count from notes where Time > UNIX_TIMESTAMP(CAST(SYSDATE()AS DATE) - INTERVAL 1 DAY) and Time < UNIX_TIMESTAMP(CAST(SYSDATE()AS DATE))";
		}

		/*
			community 获取今天评论数量
		*/
		function getTodayCommentNumSql(){
			return $sql = "select count(Id) as count from comments where Time > UNIX_TIMESTAMP(CAST(SYSDATE()AS DATE)) and Time < UNIX_TIMESTAMP(CAST(SYSDATE()AS DATE)) + 86400";
		}

		/*
			community 获取今天帖子数量
		*/
		function getTodayNoteNumSql(){
			return $sql = "select count(Id) as count from notes where Time > UNIX_TIMESTAMP(CAST(SYSDATE()AS DATE)) and Time < UNIX_TIMESTAMP(CAST(SYSDATE()AS DATE)) + 86400";
		}
		/*
			community 获取所有帖子数量
		*/
		function getNoteNumSql(){
			return $sql = "select count(Id) as count from notes";
		}
		/*
			community 获取所有评论数量
		*/
		function getCommentNumSql(){
			return $sql = "select count(Id) as count from comments";
		}

		/*
			otherUser 获取他的基本信息
		*/
		function getHisInfoSql($memberId){
			return $sql = "select * from members where Id = '{$memberId}'";
		}

		/*
			otherUser 获取他发的帖子
		*/
		function getHisNotesSql($memberId , $state = 1){
			return $sql = "select * from notes where MemberId = '{$memberId}' and State = {$state} order by Time desc";
		}
		/*
			otherUser 获取他发的帖子所在的模块名称
		*/
		function getHisNotesSectionNameSql($noteId){
			return $sql = "select n.SectionId, n.Id , ns.SectionName , ns.Id from notes as n INNER JOIN notessection as ns on  n.SectionId =  ns.Id and n.Id = '{$noteId}'";
		}
		/*
			login 检验账号密码是否匹配sql
		*/
		function confirmUserSql($phone , $password){
			return $sql = "select * from members where Phone='{$phone}' and Password='{$password}'";
		}
		/*
			register 注册账号
		*/
		function registerSql($phone , $password , $name){
			return $sql = "insert into members(Id , Phone , Password , Name, Header , Time) values(UUID() , '{$phone}' , '{$password}' , '{$name}' , '' , unix_timestamp(now()))";
		}

		/*
			账号中心 修改邮箱
		*/
		function editInfo($email , $memberId){
			$sql = "update members set Email = '{$email}' where Id = '{$memberId}'";
			$result = readData($sql , 'dml');
			return $result;
		}
		/*
			账号中心 修改密码
		*/
		function changePsw($newPsw , $memberId){
			$sql = "update members set Password = '{$newPsw}' where Id = '{$memberId}'";
			$result = readData($sql , 'dml');
			return $result;
		}
		/*
			个人中心 修改性别 星座 签名
		*/
		function editManyInfo($sex , $star , $sign , $memberId){
			$sql = "update members set Sex = '{$sex}' , Star = '{$star}' , Sign = '{$sign}' where Id = '{$memberId}'";
			$result = readData($sql , 'dml');
			return $result;
		}

		/*
			aboutMe 取消审核
		*/
		function cancelRequestSql($noteId){
			return $sql = "update notes set State = 2 where Id = '{$noteId}'";
		}

		/*
			aboutMe 再次请求审核
		*/
		function requestSql($noteId){
			return $sql = "update notes set State = 0 where Id = '{$noteId}'";
		}
		/*
			note 获取该帖子State
		*/
		function getNoteStateSql($noteId){
			return $Sql = "select State from notes where Id = '{$noteId}'";
		}
		/*
			note 回复帖子(针对楼主)
		*/
		function replayNotes($noteId , $memberId , $content , $Image = ''){
			$sql = "insert into comments(Id , NoteId , MemberId , Content , Image , Time) values(UUID() ,'{$noteId}','{$memberId}','{$content}','{$Image}', unix_timestamp(now()))";
			$result = readData($sql , 'dml');
			return $result;
		}
		/*
			note 加载所有楼层信息Sql
		*/
		function getFloorSql($noteId){
			return $sql = "select * from comments where NoteId  = '{$noteId}'";
		}

		/*
			writeNote 请求审核
		*/
		function writeNoteSql($sectionId ,$title ,$content , $memberId){
			return $sql = "insert into notes(Id, SectionId , Title ,Content , MemberId , Time , State) values(UUID() , '{$sectionId}' , '{$title}' , '{$content}' , '{$memberId}' , unix_timestamp(now())  , 0)";
		}
		/*
			writeNote 导航 显示模块名称
		*/
		function writeNoteShowNavSql($sectionId){
			return $sql = "select SectionName from notesSection where Id = '{$sectionId}'";

		}

		/*
			管理系统 login 检验账号密码是否匹配sql
		*/
		function confirmAdminSql($phone , $password){
			return $sql = "select * from admin where Phone='{$phone}' and Password='{$password}'";
		}

		/*
			管理系统 修改密码
		*/
		function changeAdminPsw($newPsw , $adminId){
			$sql = "update admin set Password = '{$newPsw}' where Id = '{$adminId}'";
			$result = readData($sql , 'dml');
			return $result;
		}
		function confirmAdminPassword($oldPsw , $adminId){
			$sql = "select * from admin where Password = '{$oldPsw}' and Id = '{$adminId}'";
			$result = readData($sql);
			return $result;
		}

		/*
			管理系统 新闻模块管理 新增模块
		*/
		function addNewsSection($sectionName , $priority , $Image){
			$sql = "insert into newsSection(Id , SectionName , Priority , Image) values(UUID() , '{$sectionName}' , '{$priority}' , '{$Image}')";
			$result = readData($sql , 'dml');
			return $result;
		}
		/*
			管理系统 新闻模块管理 删除模块
		*/
		function delNewsSection($sectionId){
			$sql = "delete  from newsSection where Id = '{$sectionId}'";
			return $sql;
		}
		/*
			管理平台 新闻模块管理 修改模块 显示该模块数据dialog
		*/
		function editNewsSection($sectionId , $sectionName , $priority , $image){
			$sql = "update newsSection set SectionName = '{$sectionName}' , Priority = '{$priority}' , Image = '{$image}' where Id = '{$sectionId}';";
			return $sql;
		}
		function editNewsSectionNotImage($sectionId , $sectionName , $priority){
			$sql = "update newsSection set SectionName = '{$sectionName}' , Priority = '{$priority}' where Id = '{$sectionId}';";
			return $sql;
		}

		/****************/
		/*
			管理系统 社区模块管理 新增模块
		*/
		function addNotesSection($sectionName , $priority , $Image){
			$sql = "insert into notesSection(Id , SectionName , Priority , Image) values(UUID() , '{$sectionName}' , '{$priority}' , '{$Image}')";
			$result = readData($sql , 'dml');
			return $result;
		}

		/*
			管理系统 新闻模块管理 删除模块
		*/
		function delNotesSection($sectionId){
			$sql = "delete from notesSection where Id = '{$sectionId}'";
			return $sql;
		}
		/*
			管理平台 新闻模块管理 修改模块 显示该模块数据dialog
		*/
		function editNotesSection($sectionId , $sectionName , $priority , $image){
			$sql = "update notesSection set SectionName = '{$sectionName}' , Priority = '{$priority}' , Image = '{$image}' where Id = '{$sectionId}';";
			return $sql;
		}
		function editNotesSectionNotImage($sectionId , $sectionName , $priority){
			$sql = "update notesSection set SectionName = '{$sectionName}' , Priority = '{$priority}' where Id = '{$sectionId}';";
			return $sql;
		}

		/*
			管理平台 新闻详情管理 获取所有帖子数据
		*/
		function getNewsData($sectionId){
			$sql = "select a.* ,b.Id as Sid , b.SectionName from news as a inner join newsSection as b on a.SectionId = b.Id where a.SectionId = '{$sectionId}' order by a.Time desc";
			return $sql;
		}
		function getAllNewsData(){
			$sql = "select a.* ,b.Id as Sid , b.SectionName from news as a inner join newsSection as b on a.SectionId = b.Id order by a.Time desc";
			return $sql;
		}

		/*
			管理平台 新闻详情管理 删除该条新闻
		*/
		function delNews($Id){
			$sql = "delete from news where Id = '{$Id}'";
			return $sql;
		}

		/*
			管理平台 发布新闻 
		*/
		function writeNewsSql($sectionId ,$title ,$intro , $content){
			return $sql = "insert into news(Id, SectionId , Title , Intro , Content , Time) values(UUID() , '{$sectionId}' , '{$title}' , '{$intro}' , '{$content}' , unix_timestamp(now()))";
		}

		/*
			管理平台 社区帖子管理 获取所有帖子数据

		*/
			//一个为空
		function getNotesData($sectionId){
			return $sql = "select a.* ,b.Id as Sid , b.SectionName ,m.Name from notes as a inner join notesSection as b on a.SectionId = b.Id INNER JOIN members as m on a.MemberId = m.Id where a.SectionId = '{$sectionId}' order by a.State , a.Time desc";
		}
			//两参数都为空
		function getAllNotesData(){
			$sql = "select a.* ,b.Id as Sid , b.SectionName ,m.Name from notes as a inner join notesSection as b on a.SectionId = b.Id INNER JOIN members as m on a.MemberId = m.Id order by a.State, a.Time desc";
			return $sql;
		}
			//都不为空
		function getNotesDataSec($sectionId , $state){
			$sql = "select a.* ,b.Id as Sid , b.SectionName ,m.Name from notes as a inner join notesSection as b on a.SectionId = b.Id INNER JOIN members as m on a.MemberId = m.Id where a.SectionId = '{$sectionId}' and a.State = {$state} order by a.State , a.Time desc";
			return $sql;
		}
			//一个为空
		function getAllNotesDataThi($state){
			$sql = "select a.* ,b.Id as Sid , b.SectionName ,m.Name from notes as a inner join notesSection as b on a.SectionId = b.Id INNER JOIN members as m on a.MemberId = m.Id where a.State = {$state} order by a.State , a.Time desc";
			return $sql;
		}

		/*
			管理平台 社区帖子管理 审核通过 State 变为 1
		*/
		function permitSuccessSql($noteId){
			$sql = "update notes set State = 1 where Id = '{$noteId}';";
			return $sql;
		}

		/*
			管理平台 社区帖子管理 审核驳回 State 变为 1
		*/
		function unPermitSuccessSql($noteId){
			$sql = "update notes set State = 2 where Id = '{$noteId}';";
			return $sql;
		}

		/*管理平台 数据统计分析 各个新闻模块下 点击量综合*/
		function getNewsDataForChartsSql($sectionId){
			$sql = "select n.SectionId , s.Id , s.SectionName, sum(n.ReadNum) as count from news as n INNER JOIN newssection as s on n.SectionId = s.Id where n.SectionId = '{$sectionId}'";
			return $sql;
		}
		function getgetNewsDataForChartsSectionIdSql(){
			$sql = "select Id from newssection";
			return $sql;
		}

		/*
			管理平台 数据统计分析 各个帖子模块下 发帖总量
		*/
		function getNotesDataForChartsSql($sectionId){
			return $sql = "select n.SectionId , s.Id , s.SectionName, count(n.Id) as count from notes as n INNER JOIN notessection as s 
on n.SectionId = s.Id where n.SectionId = '{$sectionId}' and n.State = 1;";
		}

		function getNotesDataForChartsSectionIdSql(){
			return $sql = "select Id from notessection";
		}

		/*
			管理平台 社区帖子管理 删除违规管理
		*/
		function delThisNoteSql($noteId){
			return $sql = "delete from notes where Id = '{$noteId}'";
		}




 ?>