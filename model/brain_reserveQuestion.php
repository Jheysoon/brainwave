<?php 
	class brain_reserveQuestion{
		private $res_id;
		private $room_num;
		private $question_num;
		private $question_id;
		private $difficulty;

		private $question;
		private $c1, $c2, $c3, $c4;
		private $correct;


		public function __construct(){
			$this->res_id = 0;
			$this->room_num = 0;
			$this->question_num = 0;
			$this->question_id = 0;
			$this->difficulty = '';
		}

		public function setRes_id($value){
				$this->res_id = $value;
		}
		public function getRes_id(){
					return $this->res_id;
		}
		public function setRoom_num($value){
				$this->room_num = $value;
		}
		public function getRoom_num(){
					return $this->room_num;
		}
		public function setQuestion_num($value){
				$this->question_num = $value;
		}
		public function getQuestion_num(){
					return $this->question_num;
		}
		public function setQuestion_id($value){
				$this->question_id = $value;
		}
		public function getQuestion_id(){
					return $this->question_id;
		}
		public function setDifficulty($value){
				$this->difficulty = $value;
		}
		public function getDifficulty(){
					return $this->difficulty;
		}

		// public function setQuestion($value){
		// 		$this->question = $value;
		// }
		// public function getQuestion(){
		// 			return $this->difficulty;
		// }
		// public function setCorrect($value){
		// 		$this->correct = $value;
		// }
		// public function getCorrect(){
		// 			return $this->correct;
		// }
		// public function setChoices(){
				
		// }
	}


 ?>