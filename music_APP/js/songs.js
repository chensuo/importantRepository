(function(){
	//加载歌曲分类信息
	var sortContainer = document.querySelector('.sortContainer');
	var tbMain = document.querySelector('#tbMain');
	var totalNum = document.querySelector('.totalNum');
	var pageSongs = document.querySelector('.page-main>div:nth-child(2)');
	var pageMusicBox = document.querySelector('.page-main>div:nth-child(3)');
	var btnNav = document.querySelectorAll('.page-nav>div');
	var pages = document.querySelectorAll('.page-main>div');
	var pageHeader = document.querySelector('.page-header');
	var index = 0;
	var previousIndex = 0;
	var playAll = document.querySelector('thead>tr>th:first-child');
	var musicBoxHeader = document.querySelector('.musicBoxHeader');
	var musicBoxSongName = document.querySelector('.musicBoxSongName');
	var audio = document.querySelector('audio');
	var endTime = document.querySelector('.endTime');
	var startTime = document.querySelector('.startTime');
	var songsLongTime = document.querySelector('.songsLongtime>div');
	var songsControl = document.querySelector('.songsControl');
	var playerControlSpans = document.querySelectorAll('.playerControl>span:nth-child(2)>span');
	var playerControl = document.querySelector('.playerControl>span:nth-child(2)');

/*********************页面底部导航分页********************************/
	//遍历所有导航按钮
	for(var i = 0; i < btnNav.length; i++){
		btnNav[i].onclick = function(e){
			for(var j = 0; j < btnNav.length; j++){
				if(this == btnNav[j]){
					index = j;
					break;
				}
			}

			//再次点击当前页面所属按钮
			if(index == previousIndex){
				return;//无操作
			}

			//点击之后先变导航栏样式
			btnNav[previousIndex].parentNode.querySelector('#active').id = '';
			btnNav[previousIndex].id = ''; 
			this.id = 'active';
			pageHeader.innerText = this.querySelector('span').innerText;
			ChangePage();
			

		}
	}
	

	function ChangePage(){

		//比较当前点击的index 和前一个点击currentIndex 值 比较
			if(index > previousIndex){
				//表示点击自此向右的导航按钮
				//右进左出
				pages[index].className = 'right-in';
				pages[previousIndex].className = 'left-out';
			}
			if(index < previousIndex){
				//表示自此向左点击
				//左进右出
				pages[index].className = 'left-in';
				pages[previousIndex].className = 'right-out';
			}
			previousIndex = index;

	}
	
	




/*********************榜单页*******************************/
	var songs = [];
	// 分页相关参数 
	var pagination = {
		pageSize:100,
		pageIndex:1,
		totalPageCount:0
	};

	//加载分类
	loadSongCategoryData();

	//加载歌曲信息列表
	loadSongData();


	//加载分类
	function loadSongCategoryData(){
		ajax({
				method:'get',
				url:'http://101.200.58.3/htmlprojectwebapi/SongCategory/list',
				callback:function(response){
					if(response.Code == 100){
						var list = response.Data;
						list.unshift({Id:0,Name:'全部歌曲'});
						for(var i=0;i<list.length;i++){
							var div = createCategoryItem(list[i],i+1);
			 				sortContainer.appendChild(div);

						}

					}

				}
			});
	}


	//加载歌曲信息列表
	function loadSongData(){
		ajax({
				method:'get',
				url:'http://101.200.58.3/htmlprojectwebapi/song/list',
				callback:function(response){
					if(response.Code == 100){
						songs = response.Data;
							fillData(songs);
						
							
					}
					}

				
			});
	}

	
	//策划分页
	
	function fillData(dataset){

		// 显示分页数据
		fillSongData(dataset);

		pagination.totalPageCount = parseInt(Math.ceil(dataset.length / pagination.pageSize));
		for(let i = 0; i < pagination.totalPageCount; i++){
			var item = document.createElement('a');
			item.innerText = i + 1;
			item.href = '#';
			item.onclick = function(){


				// 生成分页数据
				fillSongData(dataset);
			}
			
		}

	}

	/*
		显示分页数据
	*/

	function fillSongData(dataset){
		tbMain.innerHTML = '';

		var startIndex = 0;
		var endIndex = 100;

		var temp = dataset.slice(startIndex , endIndex);

		for(let i = 0 ;i < temp.length; i++){
			var row = createSongDataRow(temp[i] , startIndex+i);
			tbMain.appendChild(row);
		}
	}
	
	/*
		点击播放全部 跳转到音乐盒  同时播放列表里的第一首歌曲
	*/
	playAll.onclick = function(e){
		pageHeader.innerText = '音乐盒';
			btnNav[1].id= '';
			btnNav[2].id = 'active';
			index = 2;
			previousIndex = 1;
			ChangePage();

			ajax({
				method:'get',
				url:'http://101.200.58.3/htmlprojectwebapi/song/list',
				callback:function(response){
					if(response.Code == 100){
						var list = response.Data;
						for (var i = 0; i < list.length ; i++){
							if(tbMain.querySelector('.songsHeader').src == list[i].Image){
								//创建音乐盒页面头像
								audio.src = list[i].Resource;
								console.log(audio.src);
								audio.play();
								musicBoxHeader.src = '';
								musicBoxSongName.innerText = '';
								musicBoxHeader.src = list[i].Image;
								musicBoxSongName.innerText = '正在播放：'+ list[i].Name + '-' + list[i].SinerName;
							}

						}							
					}
				}

				
			});


	}

	/*-------------------------------------*/
	//加载歌曲分类项目
	function createCategoryItem(dataItem,count){
		var sort = document.createElement('div');


		var sort = document.createElement('div');
		sort.className = 'sort';
		sort.innerText = dataItem.Name;
		sort.currentCategory = dataItem;

		if(count == 1){
			sort.id = 'chosed';
		}

		

		//筛选
		sort.onclick = function(){
			var self = this;
			var dv = sortContainer.querySelectorAll('div');
				for(var i = 0; i<dv.length;i++){
					dv[i].id = '';
				}
			sort.id = 'chosed';

			//先清空
			//tbMain.innerHTML = '';

			//	恢复页码
			pagination.pageIndex = 1;

			var categoryId = this.currentCategory.Id;
				// 筛选
				var temp = songs;

				if(categoryId!= 0){
					temp = songs.filter(function(item){
						return item.CategoryId == categoryId;
					});
				}
				fillData(temp);
			}
	
			return sort;

		}

		

		
	



	//加载歌曲信息列表项目
	
	function createSongDataRow(dataItem,count){
		var tr = document.createElement('tr');

		var tdId = document.createElement('td');
		tdId.innerText = count + 1;
		tr.appendChild(tdId);

		var tdHeader = document.createElement('td');
		tr.appendChild(tdHeader);

		var imgHeader = document.createElement('img');
		imgHeader.src = dataItem.Image;
		imgHeader.className = 'songsHeader';
		tdHeader.appendChild(imgHeader);

		var tdName = document.createElement('td');
		tr.appendChild(tdName);

		var iName = document.createElement('i');
		iName.innerText = dataItem.Name + '-' + dataItem.SinerName;
		tdName.appendChild(iName);

		var tdWork = document.createElement('td');
		tr.appendChild(tdWork);
		var tdWorkChild1 = document.createElement('div');
		tdWorkChild1.className = 'tdWorkChild1'
		tdWork.appendChild(tdWorkChild1);

		//播放 跳转到音乐盒
		tdWorkChild1.onclick = function(e){
			pageHeader.innerText = '音乐盒';
			btnNav[1].id= '';
			btnNav[2].id = 'active';
			index = 2;
			previousIndex = 1;
			ChangePage();
			imgSrc = this.parentNode.previousSibling.previousSibling.querySelector('img').src;
			//从榜单点击歌曲播放 跳转音乐盒 播放相应的歌曲
			PlayCheckedSongs();

		}

		var tdWorkChild2 = document.createElement('div');
		tdWorkChild2.className = 'tdWorkChild2'
		tdWork.appendChild(tdWorkChild2);

		var tdWorkChild3 = document.createElement('div');
		tdWorkChild3.className = 'tdWorkChild3'
		tdWork.appendChild(tdWorkChild3);
		tr.appendChild(tdWork);

		var cut = count + 1;
		totalNum.innerText = '(共计' + cut + '首歌曲)';
		return tr;
	}

/*
 功能 播放在榜单页面选中的歌曲
*/
	var imgSrc;
	function PlayCheckedSongs(){
			
			ajax({
				method:'get',
				url:'http://101.200.58.3/htmlprojectwebapi/song/list',
				callback:function(response){
					if(response.Code == 100){
						var list = response.Data;
						for (var i = 0; i < list.length ; i++){
							if(imgSrc == list[i].Image){
								//创建音乐盒页面头像
								audio.src = list[i].Resource;
								console.log(audio.src);
								audio.play();
								musicBoxHeader.src = '';
								musicBoxSongName.innerText = '';
								musicBoxHeader.src = list[i].Image;
								musicBoxSongName.innerText = '正在播放：'+ list[i].Name + '-' + list[i].SinerName;
							}

						}							
					}
				}

				
			});


	}

	/*
		功能:监听audio的onloadeddata事件 获取总时长
	*/
	audio.onloadeddata = function(e){
		endTime.innerText = Math.floor(this.duration)+'s';

	}
	/*
		功能:监听audio的ontimeupdate事件 更新读条和已播放时长
	*/
	audio.ontimeupdate = function(e){
		var self = this
		if(this.currentTime > this.duration){
			startTime.innerText = '0';
		}
		startTime.innerText = Math.floor(this.currentTime)+'s';
		startTime.style.left = 38 + 'px';
		endTime.style.left = 316 + 'px';
		// console.log(this.currentTime);
		songsLongTime.style.animation = 'songsMove ' + this.duration + 's infinite linear';
		songsControl.style.animation = 'controlMove ' + this.duration + 's infinite linear';
		musicBoxHeader.style.animation = 'imageMove 40s infinite linear';

		playerControl.onclick = function(e){
			if(playerControlSpans[0].style.display == 'block'){
				playerControlSpans[0].style.display ='none'; 
				playerControlSpans[1].style.display ='block';
				// audio.pause();
				// songsControl.style.animationPlayState = 'paused';
				// songsLongTime.style.animationPlayState = 'paused';



			}
			else{
				playerControlSpans[1].style.display ='none'; 
				playerControlSpans[0].style.display ='block'; 
				// audio.play();
			}
			
		
		}
	}
/******************************************歌手页面Js 包括歌手详情*******************************************************************/
	var sortContainerSinger = document.querySelector('.sortContainerSinger');
	var singerContainer = document.querySelector('.singerContainer');
	var singers = [];
	var singerDetail = document.querySelector('.singerDetail');
	var backArrow = document.querySelector('.fa-mail-reply');
	var tbMain1 = document.querySelector('#tbMain1');
	var singerDetailItem = document.querySelector('.singerDetailItem');
	var detailHeader = document.querySelector('.detail-header');
	var detailName = document.querySelector('.detail-name');
	var detailRightSpan = document.querySelectorAll('.detail-right>span');
	var pageSinger = document.querySelector('.page-main>div:nth-child(4)');

	//加载分类
	loadSingerCategories();

	//加载歌手信息列表
	loadSingersData();

	//加载分类
	function loadSingerCategories(){
		ajax({
				method:'get',
				url:'http://101.200.58.3/htmlprojectwebapi/SingerRegion/list',
				callback:function(response){
					if(response.Code == 100){
						var list = response.Data;
						list.unshift({Id:0,Name:'全部歌手'});
						for(var i=0;i<list.length;i++){
							var div = createCategorySortSinger(list[i],i+1);
			 				sortContainerSinger.appendChild(div);

						}
					}

				}
			});
	}

	//加载歌手
	function loadSingersData(){
		ajax({
				method:'get',
				url:'http://101.200.58.3/htmlprojectwebapi/singer/list',
				callback:function(response){
					if(response.Code == 100){
						singers = response.Data;
						for(var i = 0 ; i < singers.length; i++){
							var div = createSingersList(singers[i]);
							singerContainer.appendChild(div);

						}
					}

				}
			});
	

	}

	/*
	 详情页点击 返回箭头 返回歌手页面
	*/
	backArrow.onclick = function(e){
		singerDetail.className = 'singerDetail' + ' ' + 'right-out';
	}

		
	

	


	/*-**********************************--*/
	//创建歌手分类
	function createCategorySortSinger(dataItem,count){
		var sort = document.createElement('div');


		var sort = document.createElement('div');
		sort.className = 'sort';
		sort.innerText = dataItem.Name;
		sort.currentCategory = dataItem;

		if(count == 1){
			sort.id = 'chosedSinger';
		}

		
		sort.onclick = function(){
			var self = this;
			var dv = sortContainerSinger.querySelectorAll('div');
				for(var i = 0; i<dv.length;i++){
					dv[i].id = '';
				}
			sort.id = 'chosedSinger';

			//先清空
			singerContainer.innerHTML = '';
			//筛选
			if(this.innerText == '全部歌手'){
				loadSingersData();
			}
			else{
					ajax({
					method:'get',
					url:'http://101.200.58.3/htmlprojectwebapi/singer/list',
						callback:function(response){
							if(response.Code == 100){
								singers = response.Data;
								for(var i = 0 ; i < singers.length; i++){
									if(!(self.innerText == singers[i].RegionName)){
										continue;
									}
									var div = createSingersList(singers[i]);
									singerContainer.appendChild(div);

								}
							}

						}
					});
			}

		}
	
			return sort;

	}


	/***********创建歌手项目***************/
	function createSingersList(dataItem){
		var div = document.createElement('div');
		div.className = 'singerItem';

		var singerHeader = document.createElement('img');
		singerHeader.className = 'pageSingerHeader';
		singerHeader.src = dataItem.Header;
		div.appendChild(singerHeader);

		var singerItmeContainerDv = document.createElement('div');
		singerItmeContainerDv.className = 'singerItmeContainer';
		div.appendChild(singerItmeContainerDv);

		var spanName = document.createElement('span');
		spanName.innerText = dataItem.Name;
		singerItmeContainerDv.appendChild(spanName);

		var rege = document.createElement('span');
		rege.innerText = '热歌';
		singerItmeContainerDv.appendChild(rege);

		//加载头像旁边 热歌列表
		var iidx = 0;
			if(dataItem.SongList !=''){
				for(var n = 0; n < dataItem.SongList.length; n++){
					//让热歌列表不超过三首歌
					if(n >= 3){
						continue;
					}
					var regeSongs = document.createElement('span');
					iidx++;
					regeSongs.innerText = iidx + '.' + dataItem.SongList[n].Name;
					singerItmeContainerDv.appendChild(regeSongs);
				}
			}
			else{
				var regeSongs = document.createElement('span');
					regeSongs.innerText = '暂无收录';
					singerItmeContainerDv.appendChild(regeSongs);

			}

		var arrowRight = document.createElement('div');
		arrowRight.className = 'fa fa-chevron-right';
		div.appendChild(arrowRight);

		//点击向右箭头 实现查看歌手详情页面
		arrowRight.onclick = function(e){
			singerDetail.className = 'singerDetail'+ ' ' + 'right-in';
			//加载详情页信息
			var detailHeaderData = this.previousSibling.previousSibling.src;
			detailHeader.src = detailHeaderData;
			detailName.innerText = this.previousSibling.querySelectorAll('span')[0].innerText;

			ajax({
			method:'get',
			url:'http://101.200.58.3/htmlprojectwebapi/singer/list',
				callback:function(response){
					if(response.Code == 100){
						var list = response.Data;
							for(var i = 0 ; i < list.length; i++){
								if(detailName.innerText == list[i].Name){
									detailRightSpan[0].innerText = '性别：' + list[i].Sex; 
									detailRightSpan[1].innerText = '国籍：' + list[i].RegionName;
									detailRightSpan[2].innerText = '生日：' + list[i].Birthday;
									detailRightSpan[3].innerText = '星座：' + list[i].Star;
									detailRightSpan[4].innerText = '身高：' + list[i].Height;
									
									//加载个人歌曲
									var songList = list[i].SongList;
									tbMain1.innerHTML = '';
									for(var j = 0; j < songList.length; j++){
										var tr = loadSingersDetaiSongs(songList[j],j+1);
										tbMain1.appendChild(tr);
										
									}

								}				

							}


					}

				}
		});
			



		}


		return div;
	}

	//歌手详情页面的内容
	function loadSingersDetaiSongs(dataItem,count){
		var tr = document.createElement('tr');

		var tdId = document.createElement('td');
		tdId.innerText = count;
		tr.appendChild(tdId);

		var tdName = document.createElement('td');
		tdName.innerText = dataItem.Name;
		tr.appendChild(tdName);

		var tdSingers = document.createElement('td');
		tdSingers.innerText = dataItem.SinerName;
		tr.appendChild(tdSingers);

		var tdWork = document.createElement('td');
		var tdWorkChild1 = document.createElement('div');
		tdWorkChild1.className = 'tdWorkChild1'
		tdWork.appendChild(tdWorkChild1);

		//播放 跳转到音乐盒
		tdWorkChild1.onclick = function(e){
			var self = this;
			previousIndex = 3;
			index = 2;
			singerDetail.className = 'singerDetail' +' '+'right-out';
			pageHeader.innerText = '音乐盒';
			btnNav[previousIndex].parentNode.querySelector('#active').id = '';
			btnNav[previousIndex].id = ''; 
			btnNav[index].id = 'active';
			ChangePage();
			
			ajax({
				method:'get',
				url:'http://101.200.58.3/htmlprojectwebapi/song/list',
				callback:function(response){
					if(response.Code == 100){
						var list = response.Data;
						for (var i = 0; i < list.length ; i++){
							if(self.parentNode.previousSibling.previousSibling.innerText == list[i].Name){
								//创建音乐盒页面头像
								audio.src = list[i].Resource;
								console.log(audio.src);
								audio.play();
								musicBoxHeader.src = '';
								musicBoxSongName.innerText = '';
								musicBoxHeader.src = list[i].Image;
								musicBoxSongName.innerText = '正在播放：'+ list[i].Name + '-' + list[i].SinerName;
							}

						}							
					}
				}

				
			});




		}

		var tdWorkChild2 = document.createElement('div');
		tdWorkChild2.className = 'tdWorkChild2'
		tdWork.appendChild(tdWorkChild2);

		var tdWorkChild3 = document.createElement('div');
		tdWorkChild3.className = 'tdWorkChild3'
		tdWork.appendChild(tdWorkChild3);
		tr.appendChild(tdWork);


		return tr;

	}

	function ChangePage(){

		//比较当前点击的index 和前一个点击currentIndex 值 比较
			if(index > previousIndex){
				//表示点击自此向右的导航按钮
				//右进左出
				pages[index].className = 'right-in';
				pages[previousIndex].className = 'left-out';
			}
			if(index < previousIndex){
				//表示自此向左点击
				//左进右出
				pages[index].className = 'left-in';
				pages[previousIndex].className = 'right-out';
			}
			previousIndex = index;

	}



})();