<?php 


class HttpClient{
	/*
		功能描述：HTTP Get请求
		参数列表：url => 访问的URL
				  parameters => 参数(关联数组)
		返 回 值：请求失败返回false
				  请求成功返回请求内容
	*/
	public static function get($url , $parameters = null ){
		$response = false;

		$params = null;
		if(is_array($parameters)){
			$params = self::buildParameter($parameters);
		}
		if(!is_null($params)){
			$url = $url . "?" . $params;
		}

		$con=curl_init($url);

		if($con){
			curl_setopt($con,CURLOPT_RETURNTRANSFER,true);
			curl_setopt($con,CURLOPT_BINARYTRANSFER,true);
			$response=curl_exec($con);
			curl_close ( $con);
		}
		
		return $response;

		
	}

	/*
		功能描述：HTTP POST请求
		参数列表：url => 访问的URL
				  parameters => 参数(关联数组)
		返 回 值：请求失败返回false
				  请求成功返回请求内容
	*/
	public static function post($url , $parameters = null){

	}

	/*
		文件上传
		返回值：成功返回图片名称, 失败返加null
	*/

	public static function upload($fileAbsoluteName,$url = "http://101.200.58.3/OSSWebsite/file/upload"){

		if(!file_exists($fileAbsoluteName)){
			return null;
		}

		$data["file"] = new CURLFile($fileAbsoluteName);

		$http = curl_init();
		curl_setopt($http, CURLOPT_URL, $url);
		curl_setopt($http, CURLOPT_POST, true);
		curl_setopt($http, CURLOPT_POSTFIELDS, $data);
		curl_setopt($http, CURLOPT_TIMEOUT, 1000);
		curl_setopt($http, CURLOPT_FOLLOWLOCATION, 0);
		curl_setopt($http, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($http, CURLOPT_HEADER, 0);
		curl_setopt($http, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($http, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);

		$response = curl_exec($http);

		return $response;
	}

	/*
		构建查询字符串
	*/
	private static function buildParameter($parameters){
		$result = null;
		foreach ($parameters as $key => $value) {
			if(is_null($result)){
				$result = "{$key}={$value}";
			}
			else{
				$result .= "&{$key}={$value}";
			}
		}

		return $result;
	}
}