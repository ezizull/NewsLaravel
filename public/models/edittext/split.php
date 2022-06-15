<?php
	class Split {
		public $text = "Andi Belajar Pemrograman Web";
		public $splits = array();

		function explode(){
			$splits = explode(" ", $this->text);
			$this->splits = $splits;
			var_dump($splits);
		}

		function implode(){
			if(!empty($this->splits)){
				$text = implode(" ", $this->splits);
				echo $text;
			}
		}
	}

	$split = new Split();
?>