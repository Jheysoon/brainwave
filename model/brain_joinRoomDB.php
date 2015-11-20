<?php 
		class brain_joinRoomDB{
			public function join_to_room($brain_joinRoom){
				$pdo = Database::getDB();
				$jid = $brain_joinRoom->getJid();
				$user_id = $brain_joinRoom->getUser_id();
				$room_num = $brain_joinRoom->getRoom_num();
				$player_type = $brain_joinRoom->getPlayer_type();
				$stmt = $pdo->prepare("INSERT INTO brain_joinroom SET rid = ?, user_id = ?, room_num = ?, player_type = ?");
				$stmt->execute(array($jid,$user_id,$room_num,$player_type));
			}
			public function getJoin_Room($brain_joinRoom){
				$pdo = Database::getDB();

				$jid = $brain_joinRoom->getJid();
				$user_id = $brain_joinRoom->getUser_id();
				$room_num = $brain_joinRoom->getRoom_num();
				$player_type = $brain_joinRoom->getPlayer_type();

				// $stmt = $pdo->prepare("SELECT register.fname, register.middlename, register.lname, register.user_id, brain_joinroom.player_type , brain_joinroom.rid FROM register, brain_joinroom WHERE brain_joinroom.user_id = register.user_id AND room_num = ?");
				$stmt = $pdo->prepare("SELECT * FROM register, brain_joinroom WHERE brain_joinroom.user_id = register.user_id AND room_num = ?");
				$stmt->execute(array($room_num));
	
				$result = $stmt->fetchAll();
				$brain_joinUsers = array();
				foreach ($result as $j) {
						$brain_User = new brain_User();
						$brain_User->setJid($j['rid']);
						$brain_User->setAcc_path($j['user_path']);
						$brain_User->setAddress($j['address']);
						$brain_User->setContact($j['contact']);
						$brain_User->setAge($j['age']);
						$brain_User->setGender($j['gender']);
						$brain_User->setDob($j['bday']);
						$brain_User->setUser_id($j['user_id']);
						$brain_User->setFname($j['fname']);
						$brain_User->setLname($j['lname']);
						$brain_User->setMname($j['middlename']);
						$brain_User->setPlayer_type($j['player_type']);
						$brain_joinUsers[] = $brain_User;
				}
				return $brain_joinUsers;

			}
			public function get_Users($room_id){
				$pdo = Database::getDB();

				$stmt = $pdo->prepare("SELECT * FROM brain_joinroom WHERE room_num = ?");
				$stmt->execute(array($room_id));

				$result = $stmt->fetchAll();

				$brain_joinUsers = array();
				foreach ($result as $j) {
						$stmt = $pdo->prepare("SELECT * FROM register WHERE user_id = ?");
						$stmt->execute(array($j['user_id']));

						$brain_User = new brain_User();
						$row = $stmt->fetch();
						$brain_User->setAcc_path($row['user_path']);
						$brain_User->setFname($row['fname']);


					$brain_joinUsers[] =  $brain_User;

				}
				return $brain_joinUsers;
			}
		}

?>