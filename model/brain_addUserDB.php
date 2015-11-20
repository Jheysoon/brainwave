<?php 
	class brain_UserDB
	{

		public function brain_addDB($brain_User)
		{
			$pdo = Database::getDB();

			$user_id = $brain_User->getUser_id();
			$acc_path = $brain_User->getAcc_path();
			
			$lname = $brain_User->getLname();
			$fname = $brain_User->getFname();
			$mname = $brain_User->getMname();

			$address = $brain_User->getAddress();
			$contact = $brain_User->getContact();
			$age = $brain_User->getAge();
			$gender = $brain_User->getGender();
			$dob = $brain_User->getDob();
			$username = $brain_User->getUsername();
			$password = $brain_User->getPassword();
			$usertype = $brain_User->getUsertype();
			$date = $brain_User->getDate();

			$stmt = $pdo->prepare("INSERT INTO register SET user_id = ?, user_path = ?, lname = ?, fname = ?, middlename = ?, address = ?, contact = ?, age = ?, gender = ?, bday = ?, username = ?, password = password(?), usertype = ?, date_reg = ?");
			$stmt->execute(array($user_id,$acc_path,$lname,$fname,$mname,$address,$contact,$age,$gender,$dob,$username,$password,$usertype,$date));
		}
		
		public function brain_updateDB($brain_User)
		{
			$pdo = Database::getDB();

			$user_id = $brain_User->getUser_id();
			$acc_path = $brain_User->getAcc_path();
			
			$lname = $brain_User->getLname();
			$fname = $brain_User->getFname();
			$mname = $brain_User->getMname();

			$address = $brain_User->getAddress();
			$contact = $brain_User->getContact();
			$age = $brain_User->getAge();
			$gender = $brain_User->getGender();
			$dob = $brain_User->getDob();
			$username = $brain_User->getUsername();
			$password = $brain_User->getPassword();
			$usertype = $brain_User->getUsertype();
			$date = $brain_User->getDate();

			$stmt = $pdo->prepare("UPDATE register SET user_path = ?, lname = ?, fname = ?, middlename = ?, address = ?, contact = ?, age = ?, gender = ?, bday = ?, username = ?, password = password(?), usertype = ?, date_reg = ? WHERE user_id = ?");
			$stmt->execute(array($acc_path,$lname,$fname,$mname,$address,$contact,$age,$gender,$dob,$username,$password,$usertype,$date,$user_id ));
		}
		
		public function verify_brainLogin($brain_User)
		{
			$pdo = Database::getDB();
			$stmt = $pdo->prepare("SELECT * FROM register WHERE username = ? AND password = password(?) ");
			$user_id = $brain_User->getUser_id();
			$username = $brain_User->getUsername();
			$password = $brain_User->getPassword();

			$stmt->execute(array($username, $password));
			$verified_brainLogin = $stmt->rowCount() ? true : false;

			return $verified_brainLogin;
		}
		
		public function brain_user_info($brain_User)
		{
			$pdo = Database::getDB();

			$stmt = $pdo->prepare("SELECT * FROM register where username = ? AND password = password(?)");

			$username = $brain_User->getUsername();
			$password = $brain_User->getPassword();
			$stmt->execute(array($username, $password));
			$result = $stmt->fetch();

			$brain_User = new brain_User();
	  
	        $brain_User->setUsername($result['username']);
	        $brain_User->setPassword($result['password']);
	        $brain_User->setUsertype($result['usertype']);

	        return $brain_User;
		}

		public function getUserLogs($user)
		{
			$pdo = Database::getDB();

			$stmt = $pdo->prepare("SELECT * FROM register WHERE usertype = ? ORDER by uid DESC");
			$stmt->execute(array($user));
			$result = $stmt->fetchAll();

			$brain_log = array();

			foreach ($result as $b) {
				$brain_logs = new brain_User();
				$brain_logs->setAcc_path($b['user_path']);
				$brain_logs->setUser_id($b['user_id']);
				$brain_logs->setLname($b['lname']);
				$brain_logs->setFname($b['fname']);
				$brain_logs->setMname($b['middlename']);
				$brain_logs->setAddress($b['address']);
				$brain_logs->setContact($b['contact']);
				$brain_logs->setAge($b['age']);
				$brain_logs->setGender($b['gender']);
				$brain_logs->setDob($b['bday']);
				$brain_logs->setDate($b['date_reg']);
				$brain_log[] = $brain_logs;
			}
			return $brain_log;
		}

		public function getRegisters($utype)
		{
			$pdo = Database::getDB();

			$stmt = $pdo->prepare("SELECT * FROM register WHERE usertype = ?");
			$stmt->execute(array($utype));
			$result = $stmt->fetchAll();

			$brain_log = array();

			foreach ($result as $b) {
				$brain_logs = new brain_User();
				// $brain_logs->setUser_id($b['user_id']);
				// $brain_logs->setLname($b['lname']);
				// $brain_logs->setFname($b['fname']);
				// $brain_logs->setMname($b['middlename']);
				// $brain_logs->setAddress($b['address']);
				// $brain_logs->setContact($b['contact']);
				// $brain_logs->setAge($b['age']);
				// $brain_logs->setGender($b['gender']);
				$brain_logs->setUsertype($b['usertype']);
				// $brain_logs->setDob($b['bday']);
				// $brain_logs->setDate($b['date_reg']);
				$brain_log[] = $brain_logs;
			}
			return $brain_log;
		}
		
		public function brain_getUser($user)
		{
			$pdo = Database::getDB();
			$stmt = $pdo->prepare("SELECT * FROM register WHERE username = ?");
			$stmt->execute(array($user));
			$row = $stmt->fetch();

				$brain_User = new brain_User();

	            $brain_User->setUser_id($row['user_id']);
	            $brain_User->setAcc_path($row['user_path']);
	            $brain_User->setLname($row['lname']);
	           	$brain_User->setFname($row['fname']);
	            $brain_User->setMname($row['middlename']);
	            $brain_User->setAddress($row['address']);
	            $brain_User->setContact($row['contact']);
	            $brain_User->setAge($row['age']);
	            $brain_User->setGender($row['gender']);
	            $brain_User->setDob($row['bday']);	           
	           	$brain_User->setUsername($row['username']);
	            $brain_User->setPassword($row['password']);
	            $brain_User->setUsertype($row['usertype']);
	          	        
			return $brain_User;
		}
		
		public function getUsername($user_id)
		{
			$pdo = Database::getDB();
			$stmt = $pdo->prepare("SELECT * FROM register WHERE user_id = ?");
			$stmt->execute(array($user_id));
			$row = $stmt->fetch();

			$brain_User = new brain_User();
				
				$brain_User->setAcc_path($row['user_path']);
	            $brain_User->setLname($row['lname']);
	           	$brain_User->setFname($row['fname']);
	            $brain_User->setMname($row['middlename']);
	            $brain_User->setAddress($row['address']);
	            $brain_User->setContact($row['contact']);
	            $brain_User->setAge($row['age']);
	            $brain_User->setGender($row['gender']);
	            $brain_User->setDob($row['bday']);
	            $brain_User->setUser_id($row['user_id']);
	           	$brain_User->setUsername($row['username']);
			return $brain_User;

		}
		
		public function verify_user($brain_User)
		{
			$pdo = Database::getDB();

			$lname = $brain_User->getLname();
			$fname = $brain_User->getFname();
			$mname = $brain_User->getMname();
			
			$stmt = $pdo->prepare("SELECT * FROM register WHERE lname = ? AND fname = ? AND middlename = ?");
			$stmt->execute(array($lname,$fname,$mname));
			$duplicate_user = $stmt->rowCount() ? true : false;

			return $duplicate_user;
		}
		
		public function getProfile($user_id)
		{
			$pdo = Database::getDB();
			$stmt = $pdo->prepare("SELECT * FROM register WHERE user_id = ?");
			$stmt->execute(array($user_id));
			$row = $stmt->fetchAll();

			$brain_profile = array();

			foreach ($row as $b) {
				$brain_prof = new brain_User();
				$brain_prof->setUser_id($b['user_id']);
				$brain_prof->setAcc_path($b['user_path']);
				$brain_prof->setLname($b['lname']);
				$brain_prof->setFname($b['fname']);
				$brain_prof->setMname($b['middlename']);
				$brain_prof->setAddress($b['address']);
				$brain_prof->setContact($b['contact']);
				$brain_prof->setAge($b['age']);
				$brain_prof->setGender($b['gender']);
				$brain_prof->setUsertype($b['usertype']);
				$brain_prof->setDob($b['bday']);
				$brain_prof->setUsername($b['username']);
				$brain_prof->setDate($b['date_reg']);
				$brain_profile[] = $brain_prof;
			}
			return $brain_profile;
		}
		

	}



 ?>