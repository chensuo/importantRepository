window.addEventListener('load',function(e){
	//加载歌手分类
	var singersContainer = document.querySelector('.singersContainer');
	var tbMain = document.querySelector('#tbMain');
	var singer = document.querySelector('.singers');
	var singersDetail = document.querySelector('.singers-detail');
	var containerDetail = document.querySelector('.containerDetail');
	var headerDetail = document.querySelector('.headerDetail');
	var singersHeaderDetail = document.querySelector('.singersHeaderDetail');
	var nameDetail = document.querySelector('.nameDetail');
	var listDetailSpan = document.querySelectorAll('.listDetail span');
	var introduce = document.querySelector('.introduce');
	var txtSingersName;
	var singersBody = document.querySelector('.singersBody');
	var tbMain1 = document.querySelector('#tbMain1');
	var divPageFooter = document.querySelector('.divPageFooter');
	var singers = [];

	var filter = {
		regionId:0,
		firstLetter:'全部'
	};

	var pagination = {
		pageSize:9,
		pageIndex:1,
		totalPage:0
	};


	loadSingerCategories();
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
							var div = createCategoryItem(list[i],i+1);
			 				singersContainer.appendChild(div);

						}
					}

				}
			});
	}

	
	function loadSingersData(){
		ajax({
				method:'get',
				url:'http://101.200.58.3/htmlprojectwebapi/singer/list',
				callback:function(response){
					if(response.Code == 100){

						singers = response.Data;

						fillData(singers);
					}

				}
			});
	}

	//字母筛选按钮
	var singersButtons= document.querySelectorAll('.singersTitle>div');
	for(var i = 0; i < singersButtons.length; i++){
		singersButtons[i].onclick = function(e){
				for(var i = 0; i < singersButtons.length; i++){
					singersButtons[i].id = '';
					singersButtons[i].className = '';
				}
				this.id = 'singersTitleChosed';

				// 获取当前条件
				filter.firstLetter = this.innerText.toUpperCase();
				// 筛选
				searchData();
		}
	}


	/*-------------------------*/
	//加载歌手分类
	function createCategoryItem(dataItem,count){
		var div = document.createElement('div');

		var sort = document.createElement('div');
		sort.className = 'sort';
		sort.currentCategory = dataItem;
		sort.innerText = dataItem.Name;
		div.appendChild(sort);

		var sortChild = document.createElement('span');
		if(count == 1){
			sortChild.className = 'chosedSort';
		}
		
		sort.appendChild(sortChild);


		sort.onclick = function(){
			// tbMain.innerHTML = '';
			var dv = singersContainer.querySelectorAll('span');
				for(var i = 0; i<dv.length;i++){
					dv[i].className = '';
				}
			sortChild.className = 'chosedSort';


			// 类别筛选
			filter.regionId = this.currentCategory.Id;

			//


			//过滤并显示
			searchData();
		}	
		return div;
	}

	//加载歌手信息

	function createSingerData(dataItem){
		var div = document.createElement('div');



		var headerImage = document.createElement('img');
		headerImage.src = dataItem.Header;
		headerImage.className = 'singersHeader'; 
		div.appendChild(headerImage);

		var singerName = document.createElement('span');
		singerName.innerText = dataItem.Name;
		div.appendChild(singerName);

		var headerSongs = document.createElement('div');
		headerSongs.className = 'header-Songs';
		div.appendChild(headerSongs);

		var rege = document.createElement('div');
		rege.innerText = '热歌';
		headerSongs.appendChild(rege);

		//加载头像旁边 热歌列表
		var iidx = 0;
			if(dataItem.SongList !=''){
				for(var n = 0; n < dataItem.SongList.length; n++){
					var regeSongs = document.createElement('div');
					iidx++;
					regeSongs.innerText = iidx + '.' + dataItem.SongList[n].Name;
					headerSongs.appendChild(regeSongs);
				}
			}
			else{
				var regeSongs = document.createElement('div');
					regeSongs.innerText = '暂无收录';
					headerSongs.appendChild(regeSongs);

			}


		div.onclick = function(e){
			singer.style.display = 'none';
			singersDetail.style.display = 'block';
			txtSingersName = singerName.innerText;
			//12-13写到这里 准备清除头像残留问题
			ajax({
			method:'get',
			url:'http://101.200.58.3/htmlprojectwebapi/singer/list',
			callback:function(response){
				if(response.Code == 100){
					var list = response.Data;
					for(var i=0;i<list.length;i++){
						if(txtSingersName == list[i].Name){
							//去除上次点击残留头像
							singersHeaderDetail.innerHTML = '';



							//创建详情页头像
							var images = document.createElement('img');
							images.src = list[i].Header;
							images.className = 'headerDetail';
							singersHeaderDetail.appendChild(images);


							//创建详情页歌手名称
							nameDetail.innerText = list[i].Name;

							//读取该歌手基本信息

							listDetailSpan[0].innerText = '姓名：' + list[i].Name;//姓名
							listDetailSpan[1].innerText = '性别：' + list[i].Sex;//性别
							listDetailSpan[2].innerText = '别名：暂无';
							listDetailSpan[3].innerText = '国籍：' + list[i].RegionName;
							listDetailSpan[4].innerText = '语言：' + list[i].RegionName;
							listDetailSpan[5].innerText = '祖籍：暂无';
							listDetailSpan[6].innerText = '生日：' + list[i].Birthday;
							listDetailSpan[7].innerText = '星座：' + list[i].Star;
							listDetailSpan[8].innerText = '身高：' +list[i].Height;
							listDetailSpan[9].innerText = '体重：暂无';

							//读取个人简介
							introduce.innerText = list[i].Remark;

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

	/*
		功能描述：策划分页并显示数据
	*/
	function fillData(singers){
		
		// 生成歌手信息
		fillSingerData(singers);	

		// 生成页码
		fillPaginationFooter(singers);

	}

	/*
		功能描述：生成页码
	*/
	function fillPaginationFooter(singers){
		divPageFooter.innerHTML = '';
		// 计算总的页数
		pagination.totalPage = parseInt(Math.ceil(singers.length / pagination.pageSize));

		// 生成页码
		for(let i = 0 ; i < pagination.totalPage; i++){
			var pageCodeItem = $$('a');
			pageCodeItem.innerText = i + 1;
			pageCodeItem.href = '#';
			divPageFooter.appendChild(pageCodeItem);
			pageCodeItem.onclick = function(e){
				// 修改当前样式
				this.parentNode.querySelector('#actived').style.background = 'transparent';
				this.parentNode.querySelector('#actived').style.color = '#000';
				this.parentNode.querySelector('#actived').id = '';

				this.id = 'actived';
				this.style.background = '#f88000';
				this.style.color = '#fff';

				// 修改当前的页码
				pagination.pageIndex = this.innerText;				
				fillSingerData(singers);

				return false;
			}
			

		}
		if(pagination.totalPage > 1){
			divPageFooter.firstChild.id = 'actived';
		}
	}


	/*
		功能描述：加载分页歌手信息
	*/

	function fillSingerData(singers){
		singersBody.innerHTML = '';
		var temp = singers.slice((pagination.pageIndex - 1) * pagination.pageSize , pagination.pageIndex * pagination.pageSize);
		for(let i = 0 ;i < temp.length; i++){
			var item = createSingerData(temp[i]);
			singersBody.appendChild(item);
		}
	}

	/*
		功能描述：过滤数据

	*/

	function searchData(){
		pagination.pageIndex = 1;

		var resultArray = singers;

		if(filter.firstLetter != '全部'){
			resultArray = resultArray.filter(function(item){				
				return item.Pinyin.charAt(0).toUpperCase() == filter.firstLetter;
			});
		}
		

		if(filter.regionId != 0){
			resultArray = resultArray.filter(function(item){
				return item.RegionId == filter.regionId;
			});
		}

		// 重新加载数据
		fillData(resultArray);
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

		var tdCounts = document.createElement('td');
		tdCounts.innerText = dataItem.PlayNumber;
		tr.appendChild(tdCounts);

		var tdWork = document.createElement('td');
		var tdWorkChild1 = document.createElement('div');
		tdWorkChild1.className = 'tdWorkChild1'
		tdWork.appendChild(tdWorkChild1);

		var tdWorkChild2 = document.createElement('div');
		tdWorkChild2.className = 'tdWorkChild2'
		tdWork.appendChild(tdWorkChild2);

		var tdWorkChild3 = document.createElement('div');
		tdWorkChild3.className = 'tdWorkChild3'
		tdWork.appendChild(tdWorkChild3);
		tr.appendChild(tdWork);


		return tr;

	}





},false)