		/*
			老歌回响
		*/
		var container = document.querySelector('.container');
		ajax({
			method:'get',
			url:'http://101.200.58.3/htmlprojectwebapi/song/new',
			callback:function(response){
				if(response.Code == 100){
					var list = response.Data;
					//改成了只显示6个
					for(var i = 0;i < 6; i++){
						var div = createNewItem(list[i]);
		 				container.appendChild(div);
					}
				}

			}
		});


		/*
			歌手推荐
		*/
		var container1 = document.querySelector('.container1');
		ajax({
			method:'get',
			url:'http://101.200.58.3/htmlprojectwebapi/singer/recommend',
			callback:function(response){
				if(response.Code == 100){
					var singers = response.Data;
					// 改成了只显示8个
					for(var i = 0;i < 8;i++){
						var div = createNewItemSingers(singers[i]);
					
				 		container1.appendChild(div);

		 				
					}
				}

			}
		});





	/*------------------------------------------*/
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

			var showDiv = document.createElement('div');
			showDiv.className = 'show';
			div.appendChild(showDiv);
			return div;
		}

