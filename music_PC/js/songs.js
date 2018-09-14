(function(){
	//加载歌曲分类信息
	var sortContainer = document.querySelector('.sortContainer');
	var tbMain = document.querySelector('#tbMain');
	var divFooterSong = document.querySelector('#divFooterSong');

	var songs = [];
	// 分页相关参数 
	var pagination = {
		pageSize:15,
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

		// 生成页码
		divFooterSong.innerHTML = '';
		pagination.totalPageCount = parseInt(Math.ceil(dataset.length / pagination.pageSize));
		for(let i = 0; i < pagination.totalPageCount; i++){
			var item = document.createElement('a');
			item.innerText = i + 1;
			item.href = '#';
			item.onclick = function(){

				// 修改当前样式
				this.parentNode.querySelector('.actived').style.background = 'transparent';
				this.parentNode.querySelector('.actived').style.color = '#000';
				this.parentNode.querySelector('.actived').className= '';

				this.className = 'actived';
				this.style.background = '#f88000';
				this.style.color = '#fff';

				// 确定页码
				pagination.pageIndex = this.innerText;

				// 生成分页数据
				fillSongData(dataset);
			}
			divFooterSong.appendChild(item);
		}

		divFooterSong.firstChild.className = 'actived';

	}

	/*
		显示分页数据
	*/

	function fillSongData(dataset){
		tbMain.innerHTML = '';

		var startIndex = (pagination.pageIndex - 1) * pagination.pageSize;
		var endIndex =  pagination.pageIndex * pagination.pageSize;

		var temp = dataset.slice(startIndex , endIndex);

		for(let i = 0 ;i < temp.length; i++){
			var row = createSongDataRow(temp[i] , startIndex+i);
			tbMain.appendChild(row);
		}
	}
	

	/*-------------------------------------*/
	//加载歌曲分类项目
	function createCategoryItem(dataItem,count){
		var div = document.createElement('div');


		var sort = document.createElement('div');
		sort.className = 'sort';
		sort.innerText = dataItem.Name;
		sort.currentCategory = dataItem;
		div.appendChild(sort);

		var sortChild = document.createElement('span');
		if(count == 1){
			sortChild.className = 'chosedSort';
		}
		sort.appendChild(sortChild);

		//筛选
		sort.onclick = function(){
			var self = this;
			var dv = sortContainer.querySelectorAll('span');
				for(var i = 0; i<dv.length;i++){
					dv[i].className = '';
				}
			sortChild.className = 'chosedSort';

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
			// var count1 = 0;
			// ajax({
			// 	method:'get',
			// 	url:'http://101.200.58.3/htmlprojectwebapi/song/list',
			// 	callback:function(response){
			// 		if(response.Code == 100){
			// 			var  songsResponse = response.Data;
			// 			for(var i = 0;i<songsResponse.length;i++){
			// 				if(!(songsResponse[i].CategoryName == self.innerText)){
			// 					continue;

			// 				}
			// 				count1++;
			// 				var tr = createSongDataRow(songsResponse[i],count1);
			// 				tbMain.appendChild(tr);
			// 			}
						
							
			// 		}

			// 	}
			// });



			


			return div;

		}

		

		
	



	//加载歌曲信息列表项目
	
	function createSongDataRow(dataItem,count){
		var tr = document.createElement('tr');

		var tdId = document.createElement('td');
		tdId.innerText = count + 1;
		tr.appendChild(tdId);

		var tdName = document.createElement('td');
		tdName.innerText = dataItem.Name;
		tr.appendChild(tdName);

		var tdSingers = document.createElement('td');
		tdSingers.innerText = dataItem.SinerName;
		tr.appendChild(tdSingers);

		var tdCountTimes = document.createElement('td');
		tdCountTimes.innerText = dataItem.PlayNumber;
		tr.appendChild(tdCountTimes);

		var tdWork = document.createElement('td');
		var tdWorkChild1 = document.createElement('div');
		tdWorkChild1.className = 'tdWorkChild1'
		tdWork.appendChild(tdWorkChild1);

		//这里写播放
		// tdWord.onclick = function(e){

		// }

		var tdWorkChild2 = document.createElement('div');
		tdWorkChild2.className = 'tdWorkChild2'
		tdWork.appendChild(tdWorkChild2);

		var tdWorkChild3 = document.createElement('div');
		tdWorkChild3.className = 'tdWorkChild3'
		tdWork.appendChild(tdWorkChild3);
		tr.appendChild(tdWork);
		return tr;
	}

})();