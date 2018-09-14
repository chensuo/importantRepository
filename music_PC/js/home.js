window.addEventListener('load',function(e){
	

		/*
			老歌回响
		*/
		var adWrapper = document.querySelector('.ad-wrapper'); 
		var container = document.querySelector('.container');
		var singersDetail = document.querySelector('.singers-detail'); 
		var jibenContainer = document.querySelector('.jibenContainer');
		var allSongsDetail = document.querySelector('.allSongsDetail');
		ajax({
			method:'get',
			url:'http://101.200.58.3/htmlprojectwebapi/song/new',
			callback:function(response){
				if(response.Code == 100){
					var list = response.Data;
					for(var i=0;i<list.length;i++){
						var div = createNewItem(list[i]);
		 				container.appendChild(div);
					}
				}

			}
		});



		/*
			歌手推荐
		*/
		var singers = [];
		var container1 = document.querySelector('.container1');
		ajax({
			method:'get',
			url:'http://101.200.58.3/htmlprojectwebapi/singer/recommend',
			callback:function(response){
				if(response.Code == 100){
					singers = response.Data;

					for(var i=0;i<singers.length;i++){
						//var tuijianSongs = singers[i].SongList;
						var div = createNewItemSingers(singers[i]);
					
				 		container1.appendChild(div);

		 				
					}
				}

			}
		});




		/*--------------------------------------------------------------*/
		//老歌回响 创建新item
		function createNewItem(dataItem){


			var div = document.createElement('div');
			div.className = 'item';

			var playDiv = document.createElement('div');
			playDiv.className = 'play';
			div.appendChild(playDiv);

			var countDiv = document.createElement('div');
			countDiv.innerText = 200000;
			div.appendChild(countDiv);

			var images = document.createElement('img');
			images.src = dataItem.Image;
			div.appendChild(images);

			var songsName = document.createElement('span');
			songsName.innerText = dataItem.Name;
			div.appendChild(songsName);


			return div;
		}

		//歌手推荐 创建新的item-singers
		function createNewItemSingers(dataItem){
			var div = document.createElement('div');
			div.className = 'item-singer';

			var images = document.createElement('img');
			images.src = dataItem.Header;
			div.appendChild(images);

			var divPerson = document.createElement('div');
			divPerson.className = 'showoff';
			div.appendChild(divPerson);

			var spanName = document.createElement('span');
			spanName.innerText = dataItem.Name;
			divPerson.appendChild(spanName);

			var spanSongs = document.createElement('span');
			if(dataItem.SongList !=''){
				spanSongs.innerText = '代表作：' + dataItem.SongList[0].Name;
			}
			else{
				spanSongs.innerText = '代表作：';
			}
			
			divPerson.appendChild(spanSongs);

			var showDiv = document.createElement('div');
			showDiv.className = 'show';
			div.appendChild(showDiv);

			//加载 鼠标移动到推荐歌手上 显示其热门歌曲
			var titleDiv = document.createElement('div');
			titleDiv.innerText = '热门单曲';
			showDiv.appendChild(titleDiv);

			//加载热门歌曲下 歌曲名称
			var iidx = 0;
			if(dataItem.SongList !=''){
				for(var n = 0; n < dataItem.SongList.length; n++){
					var firstSongDiv = document.createElement('div');
					iidx++;
					firstSongDiv.innerText = iidx + '.' + dataItem.SongList[n].Name;
					showDiv.appendChild(firstSongDiv);
				}
			}
			else{
				var firstSongDiv = document.createElement('div');
					firstSongDiv.innerText = '暂无收录';
					showDiv.appendChild(firstSongDiv);
			}

			var playerDiv = document.createElement('div');
			playerDiv.innerText = '播放全部';
			playerDiv.className = 'playAllHot';
			showDiv.appendChild(playerDiv);

			return div;
		}



			//顶部菜单 选择
			var list = document.querySelectorAll('.list li');
			var listPage = document.querySelectorAll('body>div');
			var listPageReal = [listPage[2],listPage[3],listPage[4]];//取到真实要用的 保证索引和菜单索引数量一致
			for(var i = 0; i < list.length-1; i++){
				list[i].onclick = function(){
					//让点击过的详情页隐藏
					singersDetail.style.display = 'none';
					jibenContainer.style.display = 'block';
					allSongsDetail.style.display = 'none';

					//取当前点击的菜单的索引
					for(var k = 0;k<list.length-1;k++){
						if(this == list[k])
							var idx = k;
					}
					if( idx == 0){
						adWrapper.style.display = 'block';
					}
					else{
						adWrapper.style.display = 'none';
					}
					//遍历所有 让所有 先还原和隐藏
					for(var j = 0;j<list.length-1;j++){
						list[j].style.color = '#fff';
						listPageReal[j].style.display = 'none';
					}
					//根据点击菜单的索引 让有该索引的菜单和块 变色和显示
					list[idx].style.color = '#FECA2E';
					listPageReal[idx].style.display = 'block';
					


				}
			}



	
},false)