<?php

class DataHubApi {
	protected $apiUrl;
	private static $instance = null;

	private function __construct($apiUrl) {
		$this->apiUrl = $apiUrl;
	}


	/********************************************************/

	public static function getInstance() {
		if(!self::$instance) {
			self::$instance = new DataHubApi('PUT_URL_HERE');
		}
		return !self::$instance;
	}


	public function userRegister($data) {
		return $this->_call($this->apiUrl . '/users', $data); 
	}

	/********************************************************/


	protected function _call($url, $data){
		$data_string = json_encode($data);                                                                                   

		$ch = curl_init($url);                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
			'Content-Type: application/json',                                                                                
			'Content-Length: ' . strlen($data_string),
			'Accept: vnd.aida.datahub+json;version=1.0',
			'Token: ' . $this->createAuthenticationToken($url),
		));                                                                                                                   
		 
		$result = curl_exec($ch);
		if (($code = curl_getinfo($ch, CURLINFO_HTTP_CODE)) != 200) {
			throw new \Exception("cURL error code: $code");
		}
		curl_close($ch);
		return json_decode($result);
	}	

	/********************************************************/
	/**
	* Create a "Token:" authentication HTTP header for the given URL
	*
	* @param string $url URL to get token for
	*
	* @return string Authentication token
	*/
	private function createAuthenticationToken($url) {
		$path = parse_url($url, PHP_URL_PATH);
		return str_replace(
			array('+', '/'),
			array('-', '_'),
			base64_encode(
				hash_hmac(
					'sha1', $path,
					'netresearch',
					true
				)
			)
		);
	}
}

