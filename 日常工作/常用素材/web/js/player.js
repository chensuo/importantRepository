
/*
	功能描述：加载音乐列表
*/
function loadMusicList(){
	var container = document.querySelector('div');
	for(var i = 0 ; i < mp3.length; i++){
		(function(index){
			var btn = document.createElement('button');
			btn.innerText = mp3[index].name;
			container.appendChild(btn);
			//
			btn.tag = mp3[index];
			btn.onclick = function(e){
				var currentMusic = btn.tag;

				var records = [];
				if(null != localStorage.getItem('PlayList')){
					records = JSON.parse(localStorage.getItem('PlayList'));
				}
				
				sessionStorage.setItem('ActiveMusic' , JSON.stringify(currentMusic));

				records.push(currentMusic);
				localStorage.setItem('PlayList' , JSON.stringify(records));
				
				window.open('player.html' , 'playerFrame');
				
			};
		})(i);
	}
}