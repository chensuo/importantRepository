$(function(e){

	//返回上一界面(看看其他书 返回books.php)
	$('.returnback').bind('click' , function(e){
		history.back();
	});

	/*点击回到顶部*/
	$('.return-top').bind('click' , function(){
		$("html , body").animate({scrollTop:0} , 350);
	});

	/*点击回复 回到底部*/
	$windowHeight = document.documentElement.scrollHeight-document.documentElement.clientHeight;
	$('.return-bottom').bind('click' , function(){
		$("html , body").animate({scrollTop:$windowHeight} , 350);
	});

	/*点击搜索*/
	$('#btn-keyWord-search').bind('click' , function(){
		$.ajax({
			type:"get",
			url:"ajax/getSearchId.php?sectionName=" + $('#search-input').val() ,
			success:function(response){
				if(response.code == 100){
					window.location.href="newsSection.php?Id=" + response.data.Id;
				}
				else{
					alert("抱歉！没有该模块信息!");
				}
			}
		});		
	});
	
	

});