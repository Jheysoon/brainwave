<?php 
		class brain_RoomDB{

		public function brain_AddRoom($brain_room){
			$pdo = Database::getDB();

			$room_id = $brain_room->getRoom_id();			
			$category = $brain_room->getCategory();
			$players = $brain_room->getPlayers();
			$user_id = $brain_room->getUser_id();
			$player_type = $brain_room->getPlayer_type();
			$num_of_players = $brain_room->getNum_of_players();

			$stmt = $pdo->prepare("INSERT INTO brain_rooms SET room_num = ?,server_id = ?, category = ?, players = ?, player_type = ?, num_of_players = ? ");
			$stmt->execute(array($room_id,$user_id,$category,$players,$player_type,$num_of_players));
		}
		public function getRoom($user_id){
			$pdo = Database::getDB();
			$stmt = $pdo->prepare("SELECT * From brain_rooms WHERE server_id = ?");
			$stmt->execute(array($user_id));
			$row = $stmt->fetch();

				$brain_Room = new brain_Room();
	           	$brain_Room->setRid($row['brim']);
				$brain_Room->setRoom_id($row['room_num']);
	            $brain_Room->setUser_id($row['server_id']);
	            $brain_Room->setCategory($row['category']);
	            $brain_Room->setPlayers($row['players']);
	            $brain_Room->setPlayer_type($row['player_type']);
	            $brain_Room->setNum_of_players($row['num_of_players']);
			return $brain_Room;
		}
		public function getRoomID($rid){
			$pdo = Database::getDB();
			$stmt = $pdo->prepare("SELECT * From brain_rooms WHERE brim = ?");
			$stmt->execute(array($rid));
			$row = $stmt->fetch();

				$brain_Room = new brain_Room();
	           	$brain_Room->setRid($row['brim']);
				$brain_Room->setRoom_id($row['room_num']);
	            $brain_Room->setUser_id($row['server_id']);
	            $brain_Room->setCategory($row['category']);
	            $brain_Room->setPlayers($row['players']);
	            $brain_Room->setPlayer_type($row['player_type']);
	            $brain_Room->setNum_of_players($row['num_of_players']);
			return $brain_Room;
		}
		public function getRid($room_num){
			$pdo = Database::getDB();
			$stmt = $pdo->prepare("SELECT * From brain_rooms WHERE room_num = ?");
			$stmt->execute(array($room_num));
			$row = $stmt->fetch();

				$brain_Room = new brain_Room();
	           	$brain_Room->setRid($row['brim']);
				$brain_Room->setRoom_id($row['room_num']);
	            $brain_Room->setUser_id($row['server_id']);
	            $brain_Room->setCategory($row['category']);
	            $brain_Room->setPlayers($row['players']);
	            $brain_Room->setPlayer_type($row['player_type']);
	            $brain_Room->setNum_of_players($row['num_of_players']);
			return $brain_Room;
		}
		public function deleteRoom($room_id){
			$pdo = Database::getDB();

			$stmt = $pdo->prepare("DELETE FROM brain_rooms WHERE room_num = ?");
			$stmt->execute(array($room_id));
			$stmt = $pdo->prepare("DELETE FROM brain_joinroom WHERE room_num = ?");
			$stmt->execute(array($room_id));
		}
		public function get_Room(){
			$pdo = Database::getDB();
			$stmt = $pdo->prepare("SELECT * From brain_rooms ORDER BY brim DESC");
			$stmt->execute();
			$result = $stmt->fetchAll();

			$brain_rooms = array();

			foreach ($result as $b) {
				$brain_Room = new brain_Room();
				$brain_Room->setRid($b['brim']);
				$brain_Room->setRoom_id($b['room_num']);
	            $brain_Room->setUser_id($b['server_id']);
	            $brain_Room->setCategory($b['category']);
	            $brain_Room->setPlayers($b['players']);
	            $brain_Room->setPlayer_type($b['player_type']);
	            $brain_Room->setNum_of_players($b['num_of_players']);
	            $brain_rooms[] = $brain_Room;
			}
			return $brain_rooms;
		}
		public function updateRoom($brain_room){
			$pdo = Database::getDB();

			$rid = $brain_room->getRid();
			$num_of_players = $brain_room->getNum_of_players();

			$stmt = $pdo->prepare("UPDATE brain_rooms SET num_of_players = ? WHERE brim = ?");
			$stmt->execute(array($num_of_players,$rid));
			
		}
		public function getBRoom($brain_room){
			$pdo = Database::getDB();

			$rid = $brain_room->getRid();
			$room_id = $brain_room->getRoom_id();
			$user_id = $brain_room->getUser_id();

			$stmt = $pdo->prepare("SELECT brain_rooms.category, brain_rooms.players, brain_joinroom.player_type, brain_joinroom.room_num FROM brain_rooms, brain_joinroom  WHERE brain_rooms.room_num = brain_joinroom.room_num AND user_id = ?");
			$stmt->execute(array($user_id));
			$row = $stmt->fetch();

			$brain_room = new brain_Room();
	            $brain_room->setRoom_id($row['room_num']);
	            $brain_room->setCategory($row['category']);
	            $brain_room->setPlayer_type($row['player_type']);
	            $brain_room->setPlayers($row['players']);
	            // $brain_room->setRoom_id($row['room_num']);
			return $brain_room;
		}




	}


 ?>