window.onload = function(){
    var $txtMemberId = $('#txtMemberId').val();

	/*自动关闭模态框*/
	var dialog = document.querySelector(".dialog");
	var timerSec;
	if(dialog.style.display != "none"){
		window.clearInterval(timerSec);
		timerSec = setInterval(function(){
			dialog.style.display = 'none';
		} , 1000);
	}
	getUserAllData();

	function getUserAllData(){
			$.get('ajax/getUserInfo.php?memberId=' + $txtMemberId  , function(response){
	    		if(response.code == 100){
	    			if(response.data["Header"]){
	    				$('.header-container>img').attr('src' , response.data["Header"]);
	    			}
	    			else{
	    				$('.header-container>img').attr('src' , "image/default.png");
	    			}
	    			
	    		}
	    	});
		}
}