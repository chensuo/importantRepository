	function $(selector){
		return document.querySelector(selector);
	}

	function $$(tag){
		return document.createElement(tag);
	}

	function $$$(selector){
		return document.querySelectorAll(selector);
	}

	function ajax(config){

	/*
		功能描述：根据参数对象，生成查询字符串
		参数列表： params(参数对象)
		返 回 值： key=value&key=value
	*/
	function buildParams(params){
		var result = null;

		for(var key in params){
			if(result == null){
				result = key + '=' + params[key];
			}
			else{
				result = result + '&' + key + '=' + params[key];
			}
		}

		return result;

	}

	
	var search = null;
	if(null != config.params && typeof(config.params) == 'object'){
		search = buildParams(config.params);
	}
	



	var xhr = new XMLHttpRequest();

	if(config.method == 'get' && search){
		config.url = config.url + '?' + search; /// ??
	}

	xhr.open(config.method , config.url , true);

	if(config.method == 'post'){
		xhr.setRequestHeader('content-type' , 'application/x-www-form-urlencoded');
	}

	xhr.onreadystatechange = function(e){
		if(this.readyState == 4 && this.status == 200){
			if(typeof(config.callback) == 'function'){
				config.callback(JSON.parse(this.responseText));
			}
		}
	}



	if(config.method == 'get'){
		xhr.send(null);
	}
	else{
		xhr.send(search); 
	}
}


