(function(){

	function createParameterString(param){
		var s = null;
		for(var key in param){
			if(null == s)
				s = key + '=' + param[key];
			else
				s = s + '&' + key + '=' + param[key];
			
		}	
		return s;	
	}

	var xhr = new XMLHttpRequest();
	var ajax = {
		get:function(url ,param, callback){	
			if(null != param && undefined != params && typeof(param) == 'object'){
				url = url + '?' + createParameterString(param);
			}

			xhr.open('GET' , url , true);
			xhr.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					var data = this.responseText;
					callback(data);
				}
			};	
			xhr.send(null);
		},
		post:function(url , param , callback){
			var paramString = createParameterString(param);
			xhr.open('post' , url , true);
			xhr.setRequestHeader('content-type' , 'application/x-www-form-urlencoded');
			xhr.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					var data = this.responseText;
					callback(data);
				}
			};	
			xhr.send(paramString);
		}
	};
	window.Ajax = ajax;
})();