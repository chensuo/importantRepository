window.addEventListener('load',function(e){
	var jibenContainer = document.querySelector('.jibenContainer');
	var allSongsDetail = document.querySelector('.allSongsDetail');
	var newsDetail = document.querySelector('.newsDetail');
	var songsDetail = document.querySelector('.songsDetail');

	//点击基本信息和所有歌曲 页面切换
	newsDetail.onclick = function(e){
		jibenContainer.style.display = 'block';
		allSongsDetail.style.display = 'none';
	}
	songsDetail.onclick = function(e){
		jibenContainer.style.display = 'none';
		allSongsDetail.style.display = 'block';
	}



},false)