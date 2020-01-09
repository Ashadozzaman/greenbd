<?php
	class Format{
		public function formateDate($date){
			return date('F j, Y, g:i a', strtotime($date));
		}

		public function textshot($text, $limit = 180){
			$text = $text. " ";
			$text = substr($text, 0, $limit);
			$text = substr($text, 0, strrpos($text,  " "));
			$text = $text. ".........";
			return $text;

		}


		public function validation($data){
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
	}



?>