<?php
class Braincert
{
	public $api_key;
	public $apiendpoint = "https://api.braincert.com/v2";
	 
	public function __construct ($api_key)
	{
		$this->api_key	= $api_key;
	}
	
	public function getclassdata($data=array())
	{
		$data['task'] = 'getclass';
		return $this -> sendHttpRequest($data);
	}

	public function getclass($data=array())
	{
		$data['weekdays'] = implode(',', $data['weekdays']);
	
		if($data['record'] == '1' && $data['start_recording_auto'] == '2'){
			$data['record'] = '2';
		}

		if($data['allow_change_interface_language']==0){
			$data['isLang']=$data['language'];
	 	}else{
	 		$data['isLang']=11;
	 	}


	 	if($data['location_id']){
	 		$data['isRegion'] = $data['location_id'] ;
	 	}

		if($data['location']){
			$data['isRegion'] = $data['location'] ;
		}	

		$data['isBoard']=$data['classroom_type'];
 	
 		unset($data['location_id']);
 		unset($data['location']);
		unset($data['start_recording_auto']);
		unset($data['allow_change_interface_language']);
		unset($data['classroom_type']);
		unset($data['language']);

		$data['task'] = 'schedule';
		return $this -> sendHttpRequest($data);
	}
	public function getClassList($data=array())
	{
		if($data['class_id']){
			$data['task'] = 'getclass';	
		}else{
			$data['task'] = 'listclass';
		}
		return $this -> sendHttpRequest($data);
	}
	public function getPrice($data=array())
	{
		$data['task'] = 'addSchemes';
		return $this -> sendHttpRequest($data);
	}
	public function getDiscount($data=array())
	{
		$data['task'] = 'addSpecials';
		return $this -> sendHttpRequest($data);
	}
	public function listdiscount($data=array())
	{
		$data['task'] = 'listdiscount';
		return $this -> sendHttpRequest($data);
	}
	public function listPrices($data=array())
	{
		 
		$data['task'] = 'listSchemes';
		return $this -> sendHttpRequest($data);
	}
	 
	public function getclassrecording($data=array())
	{
		$data['task'] = 'getclassrecording';
		return $this -> sendHttpRequest($data);
	}
	public function removeclassrecording($data=array())
	{
		$data['task'] = 'removeclassrecording';
		return $this -> sendHttpRequest($data);
	}
	public function changestatusrecording($data=array())
	{
		$data['task'] = 'changestatusrecording';
		 
		return $this -> sendHttpRequest($data);
	}
	public function removediscount($data=array())
	{
		$data['task'] = 'removediscount';
		return $this -> sendHttpRequest($data);
	}
	public function removeprice($data=array())
	{
		$data['task'] = 'removeprice';
		return $this -> sendHttpRequest($data);
	}
	public function getlaunchurl($data=array())
	{
		$data['userId']=rand();
		$data['task'] = 'getclasslaunch';
		return $this -> sendHttpRequest($data);
	}
	
	public function removeclass($data=array())
	{
		$data['task'] = 'removeclass';
		return $this -> sendHttpRequest($data);
	}
	public function getrecording($data=array())
	{
		$data['task'] = 'getrecording';
		return $this -> sendHttpRequest($data);
	}
	
	public function sendHttpRequest($data)
	{
		$data['apikey'] = $this -> api_key;
	    $data_string = http_build_query($data);
	 	$this -> apiendpoint = $this -> apiendpoint;//."/".$data['task'];
		$ch = curl_init($this -> apiendpoint);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$result = curl_exec($ch);

		return $result;
	}
}
?>