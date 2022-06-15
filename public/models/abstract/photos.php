<?php
	abstract class PhotosPattern{		
		abstract function getdata($url = '');
		abstract function printdata($data);
	}

	trait fetchConfig{
		abstract function getdata($url = '');
		abstract function printdata($data);
	}

	class Photos extends PhotosPattern{
		use fetchConfig;

		function getdata($url = ''){
			$api_url = empty($url) ? 'https://jsonplaceholder.typicode.com/photos' : $url;
			$json_data = file_get_contents($api_url);
			$data = json_decode($json_data);

			$this->printdata($data);
		}

		function printdata($data){
			print_r($data);
		}
	}

	$photos = new Photos ();
?>