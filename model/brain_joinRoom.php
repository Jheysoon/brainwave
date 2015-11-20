<?php 
	class brain_joinRoom{
		private $jid;
		private $user_id;
		private $room_num;
		private $player_type;

		public function __construct(){
			$this->jid = 0;
			$this->user_id = '';
			$this->room_num = '';
			$this->player_type = "";
		}
		public function setJid($value){
				$this->jid = $value;
		}
		public function getJid(){
				return $this->jid;
		}

		public function setUser_id($value){
				$this->user_id = $value;
		}
		public function getUser_id(){
				return $this->user_id;
		}
		
		public function setRoom_num($value){
				$this->room_num = $value;
		}
		public function getRoom_num(){
				return $this->room_num;
		}
		public function setPlayer_type($value){
				$this->player_type = $value;
		}
		public function getPlayer_type(){
				return $this->player_type;
		}
		
	}


 ?>