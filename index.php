<?php
	session_start();
	date_default_timezone_set('Asia/Manila');
	setlocale(LC_MONETARY, 'en_US');
	
	if (isset($_POST['action'])) {
		$action = $_POST['action'];
	} elseif (isset($_GET['action'])) {
		$action = $_GET['action'];
	} else {
		$action = 'login_form';
	}

	if ($action != 'checkPlayer') {
		require './view/header.php';
	}
	
	require './model/database.php';

	require './model/brain_addUser.php';
	require './model/brain_addUserDB.php';

	require './model/brain_Category.php';
	require './model/brain_CategoryDB.php';

	require './model/brain_Question.php';
	require './model/brain_QuestionDB.php';

	require './model/brain_room.php';
	require './model/brain_roomDB.php';

	require './model/brain_joinRoom.php';
	require './model/brain_joinRoomDB.php';

	require './model/brain_reserveQuestion.php';
	require './model/brain_reserveQuestionDB.php';
	require './model/BrainJoinRoom.php';
	require './model/BrainRoom.php';
	

	// require './model/brain_Game.php';
	// require './model/brain_GameDB.php';


	

	//--------------------------------------------//

	$brain_User 				= new brain_User();
	$brain_UserDB 				= new brain_UserDB();
	$brain_Category 			= new brain_Category();
	$brain_CategoryDB 			= new brain_CategoryDB();
	$brain_Question 			= new brain_Question();
	$brain_QuestionDB 			= new brain_QuestionDB();
	$brain_room 				= new brain_Room();
	$brain_roomDB 				= new brain_RoomDB();
	$brain_joinRoom 			= new brain_joinRoom();
	$brain_joinRoomDB 			= new brain_joinRoomDB();
	$brain_reserveQuestion 		= new brain_reserveQuestion();
	$brain_reserveQuestionDB 	= new brain_reserveQuestionDB();
	$brainJoinRoom 				= new BrainJoinRoom();
	$brainRoom 					= new BrainRoom();

	// $brain_room = new brain_Game();
	// $brain_roomDB = new brain_GameDB();

	$values = array();
	//--------------------------------------------//

	if ($action == 'login_form') {

		if (isset($_GET['error'])) {
			$error  = $_GET['error'];
		} else {
			$error = '';
		}

		$utype 		= 'Admin';
		$registers 	= $brain_UserDB->getRegisters($utype);
		include './view/brainwave_login.php';

	} elseif ($action == 'checkPlayer') {
		
		$room_id 		= $_POST['room_id'];
		$getType 		= $brainJoinRoom->getPlayerType($_SESSION['user_id'], $room_id);
		$ctr 			= $brainJoinRoom->countRoom($room_id);
		$numOfPlayers 	= $brainRoom->numOfPlayer($room_id);
		
		//echo $getType;
		
		include './view/checkPlayer.php';
		
	} elseif ($action == 'add_user') {
		$_SESSION['user_id'] 	= $_POST['user_id'];
		$_SESSION['lname'] 		= ucwords($_POST['lastname']);
		$_SESSION['fname'] 		= ucwords($_POST['firstname']);
		$_SESSION['mname'] 		= ucwords($_POST['middlename']);
		$_SESSION['address'] 	= ucwords($_POST['address']);
		$_SESSION['contact'] 	= $_POST['contact'];
		$_SESSION['age'] 		= $_POST['age'];
		$_SESSION['gender'] 	=  ucwords($_POST['gender']);
		$_SESSION['dob'] 		= $_POST['dob'];
		$_SESSION['username'] 	= $_POST['username'];
		$_SESSION['password'] 	=  $_POST['password'];
		$_SESSION['usertype'] 	= ucwords($_POST['usertype']);
		$date 					= date('M:d:Y');

		$brain_User->setUser_id($_SESSION['user_id']);
		$brain_User->setLname($_SESSION['lname']);
		$brain_User->setFname($_SESSION['fname']);
		$brain_User->setMname($_SESSION['mname']);
		$brain_User->setAddress($_SESSION['address']);
		$brain_User->setContact($_SESSION['contact']);
		$brain_User->setAge($_SESSION['age']);
		$brain_User->setGender($_SESSION['gender']);
		$brain_User->setDob($_SESSION['dob']);
		$brain_User->setUsername($_SESSION['username']);
		$brain_User->setPassword($_SESSION['password']);
		$brain_User->setUsertype($_SESSION['usertype']);
		$brain_User->setDate($date);

		$brain_User->setAcc_name($acc_name = $_FILES['acc_name']['name']);
		$brain_User->setAcc_type($acc_type = $_FILES['acc_name']['type']);
		$brain_User->setAcc_path($acc_path = "./user/".$acc_name);
		move_uploaded_file($_FILES['acc_name']['tmp_name'], $acc_path);

		$duplicate_user = $brain_UserDB->verify_user($brain_User);

		if ($duplicate_user) {
			$error = "duplicate";
			unset($brain_User);
			header("location:.?&error=".urlencode($error));
		} else {
			$brain_UserDB->brain_addDB($brain_User);
			unset($brain_User);
			$error = "Success";
			header("location:.?&error=".urlencode($error));
		}

	}
	if ($action == 'brain_login') {
		$_SESSION['user'] = $_POST['user'];
		$_SESSION['pass'] = $_POST['pass'];

		$brain_User->setUsername($_SESSION['user']);
		$brain_User->setPassword($_SESSION['pass']);

		$verified_brainLogin = $brain_UserDB->verify_brainLogin($brain_User);

		if ($verified_brainLogin) {
			$row = $brain_UserDB->brain_user_info($brain_User);
			$_SESSION['user_id'] = $row->getUser_id();
			$_SESSION['user'] = $row->getUsername();
			$_SESSION['pass'] = $row->getPassword();
			$usertype = $row->getUsertype();

			if ($usertype == 'Admin') {

				if (isset($_SESSION['user'])) {
					$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
				}

				$user_id = $brain_users->getUser_id();
				$dup = "";
				$quest = '';
				header("location:.?action=admin&dup=".urlencode($dup) ."&user_id=".urlencode($user_id)."&quest=".urlencode($quest));

			} elseif ($usertype == 'User') {

				if (isset($_SESSION['user'])) {
					$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
				}

				$user_id = $brain_users->getUser_id();
				header("location:.?action=brain_Player&user_id=".urlencode($user_id));
			}

		} else {
			$error  = "invalid";
			header("location:.?&error=".urlencode($error));
		}

	} elseif ($action == "admin") {

		$_SESSION['user_id'] = $_GET['user_id'];
		 $user = $brain_UserDB->getUsername($_SESSION['user_id']);
		 $username = $user->getUsername();
		 $_SESSION['user'] = $username;

		if (isset($_SESSION['user'])) {
			$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}

		$category = $brain_CategoryDB->getCategory();
		$quest = $_GET['quest'];
		$dup = $_GET['dup'];
		include './view/brain_category.php';
	} elseif ($action == 'brain_Player') {
			$_SESSION['user_id'] 	= $_GET['user_id'];
			$user 					= $brain_UserDB->getUsername($_SESSION['user_id']);
			$username 				= $user->getUsername();
			$_SESSION['user'] 		= $username;

			if (isset($_SESSION['user'])) {
				$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
			}

			$brain_rooms_play = $brain_roomDB->get_Room();
			$category = $brain_CategoryDB->getCategory();
			include './view/brain_player.php';

	} elseif ($action == 'brain_player_ref') {
		$_SESSION['user_id'] = $_GET['user_id'];
		$user = $brain_UserDB->getUsername($_SESSION['user_id']);
		$username = $user->getUsername();
		$_SESSION['user'] = $username;

		if (isset($_SESSION['user'])) {
			$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}

		$brain_rooms_play = $brain_roomDB->get_Room();
		$category = $brain_CategoryDB->getCategory();

		// include './view/brain_player.php';
	} elseif ($action == 'view_user') {
		$_SESSION['user_id'] = $_GET['user_id'];
		$user = $brain_UserDB->getUsername($_SESSION['user_id']);
		$username = $user->getUsername();
		$_SESSION['user'] = $username;

		if (isset($_SESSION['user'])) {
			$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}

		$category = $brain_CategoryDB->getCategory();
		$user = 'User';
		$quest = $_GET['quest'];
		$logs = $brain_UserDB->getUserLogs($user);
		include './view/brain_users.php';


	} elseif ($action == 'brain_UpdateAccount') {

		if (isset($_SESSION['user'])) {
			$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}

		$acc 		= "";
		$quest 		= $_GET['quest'];
		$category 	= $brain_CategoryDB->getCategory();
		include './view/brain_updateAccount.php';
	}elseif ($action == 'brain_UpdateUser') {

		if (isset($_SESSION['user'])) {
			$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}

		$_SESSION['user_id'] 	= $_POST['user_id'];
		$_SESSION['lname'] 		= ucwords($_POST['lastname']);
		$_SESSION['fname'] 		= ucwords($_POST['firstname']);
		$_SESSION['mname'] 		= ucwords($_POST['middlename']);
		$_SESSION['address'] 	= ucwords($_POST['address']);
		$_SESSION['contact'] 	= $_POST['contact'];
		$_SESSION['age'] 		= $_POST['age'];
		$_SESSION['gender'] 	=  ucwords($_POST['gender']);
		$_SESSION['dob'] 		= $_POST['dob'];
		$_SESSION['username'] 	= $_POST['username'];
		$_SESSION['password'] 	=  $_POST['password'];
		$_SESSION['usertype'] 	= ucwords($_POST['usertype']);
		$date 					= date('M:d:Y');

		$brain_User->setUser_id($_SESSION['user_id']);
		$brain_User->setLname($_SESSION['lname']);
		$brain_User->setFname($_SESSION['fname']);
		$brain_User->setMname($_SESSION['mname']);
		$brain_User->setAddress($_SESSION['address']);
		$brain_User->setContact($_SESSION['contact']);
		$brain_User->setAge($_SESSION['age']);
		$brain_User->setGender($_SESSION['gender']);
		$brain_User->setDob($_SESSION['dob']);
		$brain_User->setUsername($_SESSION['username']);
		$brain_User->setPassword($_SESSION['password']);
		$brain_User->setUsertype($_SESSION['usertype']);
		$brain_User->setDate($date);

		$brain_User->setAcc_name($acc_name = $_FILES['acc_name']['name']);
		$brain_User->setAcc_type($acc_type = $_FILES['acc_name']['type']);
		$brain_User->setAcc_path($acc_path = "./user/".$acc_name);
		move_uploaded_file($_FILES['acc_name']['tmp_name'], $acc_path);

		$brain_UserDB->brain_updateDB($brain_User);
		// unset($brain_User);
		header('location:.?action=brain_UpdateAccount');

	}
	elseif ($action == 'add_category') {

		$_SESSION['category'] = ucwords($_POST['category']) ;
		$category =  $_SESSION['category'];

		if ($_SESSION['category'] != 'English' && $_SESSION['category'] != 'Math' && $_SESSION['category'] != 'Filipino' && $_SESSION['category'] != 'Science' && $_SESSION['category'] != 'History') {
			$dup = 'Only';
			header("location:.?action=admin&dup=".urlencode($dup));

		} else {
			$brain_Category->setCategory($_SESSION['category']);
			$duplicate_Category = $brain_CategoryDB->verifyCategory($_SESSION['category']);

			if ($duplicate_Category) {

				if (isset($_SESSION['user'])) {
								$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
				}

				$user_id 	= $brain_users->getUser_id();
				$category 	= $brain_CategoryDB->getCategory();
				$dup 		= "duplicate";
					// header("location:.?action=category&dup=".urlencode($dup));

			} else {

				if (isset($_SESSION['user'])) {
					$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
				}

				$user_id 	= $brain_users->getUser_id();
				$category 	= $brain_CategoryDB->getCategory();
				$dup 		= "Added";
				$brain_CategoryDB->brain_addCategory($brain_Category);

				// header("location:.?action=category&dup=".urlencode($dup));
			}
		}

		header("location:.?action=admin&dup=".urlencode($dup) ."&user_id=".urlencode($user_id));

	} elseif ($action == 'brain_Delete_cat') {
		$_SESSION['cid'] = $_POST['cid'];

		if (isset($_SESSION['user'])) {
			$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}

		$user_id 		= $brain_users->getUser_id();
		$cat_name 		= $brain_CategoryDB->get_Category($_SESSION['cid']);
		$category_Name 	= $cat_name->getCategory();
		$Catname 		= $brain_QuestionDB->getCat_name($category_Name);
		$category 		= $brain_CategoryDB->getCategory();

		if (empty($Catname)) {
			$brain_CategoryDB->delete_Category($_SESSION['cid']);
			$dup = 'delete';
		} else {
			$dup = 'Remain';
		}

		header("location:.?action=admin&dup=".urlencode($dup) ."&user_id=".urlencode($user_id));

		// header("location:.?action=brain_AddQuestion&dup=".urlencode($dup) ."&cid=".urlencode($_SESSION['cid']));
		// include './view/brain_category.php';

	} elseif ($action == "brain_Update_form") {
		if (isset($_SESSION['user'])) {
			$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}

		$_SESSION['cid'] 	= $_GET['cid'];
		$get_Category 		= $brain_CategoryDB->get_Category($_SESSION['cid']);
		$dup 				= '';
		$category 			= $brain_CategoryDB->getCategory();

		include './view/brain_update.php';

	} elseif ($action == 'brain_AddQuestion') {

		if (isset($_SESSION['user'])) {
			$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}

		$_SESSION['cid'] 	= $_GET['cid'];
		$get_Category 		= $brain_CategoryDB->get_Category($_SESSION['cid']);
		$category 			= $brain_CategoryDB->getCategory();
		$dup 				= $_GET['dup'];

		include './view/brain_AddQuestion.php';

	} elseif ($action == 'brain_add_Easy') {

		$file_name = $_FILES['quest_pic']['name'];

		if (isset($_SESSION['user'])) {
			$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}

		$user_id 			= $brain_users->getUser_id();
		$level 				= 'Easy';
		$locator 			= $_POST['locator'];
		$_SESSION['level'] 	= $level;

		if (empty($file_name)) {
			$_SESSION['subject'] 	= ucwords($_POST['subject']);
			$_SESSION['question'] 	= ucwords($_POST['question']);
			$_SESSION['hint'] 		= ucwords($_POST['hint']);
			$_SESSION['correct'] 	= ucwords($_POST['correct']);
			$_SESSION['choiceB'] 	= ucwords($_POST['choiceB']);
			$_SESSION['choiceC'] 	= ucwords($_POST['choiceC']);
			$_SESSION['choiceD'] 	= ucwords($_POST['choiceD']);

			$brain_Question->setLevel($_SESSION['level']);
			$brain_Question->setSubject($_SESSION['subject']);
			$brain_Question->setQuestion($_SESSION['question']);
			$brain_Question->setHint($_SESSION['hint']);

			$brain_Question->setCorrect($_SESSION['correct']);
			$brain_Question->setChoiceB($_SESSION['choiceB']);
			$brain_Question->setChoiceC($_SESSION['choiceC']);
			$brain_Question->setChoiceD($_SESSION['choiceD']);

		} else {
			$_SESSION['subject'] 	= $_POST['subject'];
			$_SESSION['question'] 	= ucwords($_POST['question']);
			$_SESSION['hint'] 		= ucwords($_POST['hint']);
			$_SESSION['correct'] 	= ucwords($_POST['correct']);
			$_SESSION['choiceB'] 	= ucwords($_POST['choiceB']);
			$_SESSION['choiceC'] 	= ucwords($_POST['choiceC']);
			$_SESSION['choiceD'] 	= ucwords($_POST['choiceD']);

			$brain_Question->setLevel($_SESSION['level']);
			$brain_Question->setSubject($_SESSION['subject']);
			$brain_Question->setQuestion($_SESSION['question']);
			$brain_Question->setHint($_SESSION['hint']);

			$brain_Question->setCorrect($_SESSION['correct']);
			$brain_Question->setChoiceB($_SESSION['choiceB']);
			$brain_Question->setChoiceC($_SESSION['choiceC']);
			$brain_Question->setChoiceD($_SESSION['choiceD']);

			$brain_Question->setfile_name($file_name = $_FILES['quest_pic']['name']);
			$brain_Question->setfile_type($file_type = $_FILES['quest_pic']['type']);
			$brain_Question->setfile_path($file_path = "./user/".$file_name);
			move_uploaded_file($_FILES['quest_pic']['tmp_name'], $file_path);
		}

		$verified_Question = $brain_QuestionDB->verify_Question($_SESSION['question']);

		if ($verified_Question) {
			$quest = "duplicate";

		} else {
			$quest = "Added";
			$brain_QuestionDB->brain_addQuestionDB($brain_Question);
			$getBid = $brain_QuestionDB->getQid($_SESSION['question']);
			$bid 	= $getBid->getQid();
			$brain_Question->setQid($bid);
			$brain_QuestionDB->brain_addChoices($brain_Question);
		}

		$dup = '';
		// $category = $brain_CategoryDB->getCategory();
		// $get_Category = $brain_CategoryDB->get_Category($_SESSION['cid']);

		// header("location:.?action=brain_AddQuestion&dup=".urlencode($dup) ."&cid=".urlencode($_SESSION['cid']));
		header("location:.?action=".urlencode($locator)."&quest=".urlencode($quest) ."&cid=".urlencode($_SESSION['cid']) ."&dup=".urlencode($dup)."&user_id=".urlencode($user_id ));

	} elseif ($action == 'brain_add_Moderate') {
		$file_name = $_FILES['quest_pic']['name'];

		if (isset($_SESSION['user'])) {
			$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}

		$user_id = $brain_users->getUser_id();
		$level = 'Moderate';
		$locator = $_POST['locator'];
		$_SESSION['level'] = $level;

		if (empty($file_name)) {

			$_SESSION['subject'] 	= $_POST['subject'];
			$_SESSION['question'] 	= ucwords($_POST['question']);
			$_SESSION['hint'] 		= ucwords($_POST['hint']);
			$_SESSION['answer'] 	= ucwords($_POST['answer']);

			$brain_Question->setLevel($_SESSION['level']);
			$brain_Question->setSubject($_SESSION['subject']);
			$brain_Question->setQuestion($_SESSION['question']);
			$brain_Question->setAnswer($_SESSION['answer']);
			$brain_Question->setHint($_SESSION['hint']);

		} else {

			$_SESSION['subject'] 	= $_POST['subject'];
			$_SESSION['question']	= ucwords($_POST['question']);
			$_SESSION['hint'] 		= ucwords($_POST['hint']);
			$_SESSION['answer'] 	= ucwords($_POST['answer']);

			$brain_Question->setLevel($_SESSION['level']);
			$brain_Question->setSubject($_SESSION['subject']);
			$brain_Question->setQuestion($_SESSION['question']);
			$brain_Question->setAnswer($_SESSION['answer']);
			$brain_Question->setHint($_SESSION['hint']);

			$brain_Question->setfile_name($file_name = $_FILES['quest_pic']['name']);
			$brain_Question->setfile_type($file_type = $_FILES['quest_pic']['type']);
			$brain_Question->setfile_path($file_path = "./user/".$file_name);
			move_uploaded_file($_FILES['quest_pic']['tmp_name'], $file_path);
		}

		$verified_Question = $brain_QuestionDB->verify_Question($_SESSION['question']);

		if ($verified_Question) {
			$quest = "duplicate";
		} else {
			$quest = "Added";
			$brain_QuestionDB->brain_addQuestionDB($brain_Question);
		}

		$dup = '';
		// $category = $brain_CategoryDB->getCategory();
		// $get_Category = $brain_CategoryDB->get_Category($_SESSION['cid']);
		unset($brain_Question);
		header("location:.?action=".urlencode($locator)."&quest=".urlencode($quest) ."&cid=".urlencode($_SESSION['cid']) ."&dup=".urlencode($dup)."&user_id=".urlencode($user_id ));
		// header("location:.?action=".urlencode($locate)."&dup=".urlencode($dup) ."&cid=".urlencode($_SESSION['cid']));
	} elseif ($action == 'brain_add_Hard') {

		if (isset($_SESSION['user'])) {
			$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}
		$file_name 			= $_FILES['quest_pic']['name'];
		$user_id 			= $brain_users->getUser_id();
		$level 				= 'Hard';
		$locator 			= $_POST['locator'];
		$_SESSION['level'] 	= $level;

		if (empty($file_name)) {

			$_SESSION['subject'] 	= $_POST['subject'];
			$_SESSION['question'] 	= ucwords($_POST['question']);
			$_SESSION['hint'] 		= ucwords($_POST['hint']);
			$_SESSION['answer'] 	= ucwords($_POST['answer']);

			$brain_Question->setLevel($_SESSION['level']);
			$brain_Question->setSubject($_SESSION['subject']);
			$brain_Question->setQuestion($_SESSION['question']);
			$brain_Question->setAnswer($_SESSION['answer']);
			$brain_Question->setHint($_SESSION['hint']);

		} else {

			$_SESSION['subject'] 	= $_POST['subject'];
			$_SESSION['question'] 	= ucwords($_POST['question']);
			$_SESSION['hint'] 		= ucwords($_POST['hint']);
			$_SESSION['answer'] 	= ucwords($_POST['answer']);

			$brain_Question->setLevel($_SESSION['level']);
			$brain_Question->setSubject($_SESSION['subject']);
			$brain_Question->setQuestion($_SESSION['question']);
			$brain_Question->setAnswer($_SESSION['answer']);
			$brain_Question->setHint($_SESSION['hint']);

			$brain_Question->setfile_name($file_name = $_FILES['quest_pic']['name']);
			$brain_Question->setfile_type($file_type = $_FILES['quest_pic']['type']);
			$brain_Question->setfile_path($file_path = "./user/".$file_name);
			move_uploaded_file($_FILES['quest_pic']['tmp_name'], $file_path);
		}

		$verified_Question = $brain_QuestionDB->verify_Question($_SESSION['question']);

		if ($verified_Question) {
			$quest = "duplicate";
		} else {
			$quest = "Added";
			$brain_QuestionDB->brain_addQuestionDB($brain_Question);
		}

		// $category = $brain_CategoryDB->getCategory();
		// $get_Category = $brain_CategoryDB->get_Category($_SESSION['cid']);
		$dup = '';
		unset($brain_Question);
		header("location:.?action=".urlencode($locator)."&quest=".urlencode($quest) ."&cid=".urlencode($_SESSION['cid']) ."&dup=".urlencode($dup)."&user_id=".urlencode($user_id ));
		// header("location:.?action=brain_AddQuestion&dup=".urlencode($dup) ."&cid=".urlencode($_SESSION['cid']));
	} elseif ($action == 'brain_update_Moderate') {
		if (isset($_SESSION['user'])) {
			$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}

		$_SESSION['qid'] 		= $_POST['qid'];
		$subject_Quest 			= $brain_QuestionDB->get_Subject($_SESSION['qid']);
		$update_Question 		= $brain_QuestionDB->get_Question($_SESSION['qid']);
		$_SESSION['question'] 	= ucwords($_POST['question']);
		$_SESSION['hint'] 		= ucwords($_POST['hint']);
		$_SESSION['answer'] 	= ucwords($_POST['answer']);

		$brain_Question->setQuestion($_SESSION['question']);
		$brain_Question->setAnswer($_SESSION['answer']);
		$brain_Question->setHint($_SESSION['hint']);
		$brain_Question->setQid($_SESSION['qid']);

		$brain_Question->setfile_name($file_name = $_FILES['quest_pic']['name']);
		$brain_Question->setfile_type($file_type = $_FILES['quest_pic']['type']);
		$brain_Question->setfile_path($file_path = "./user/".$file_name);
		move_uploaded_file($_FILES['quest_pic']['tmp_name'], $file_path);

		$brain_QuestionDB->brain_updateQuestionDB($brain_Question);
		$subject 	= $subject_Quest->getSubject();
		$id 		=  $subject_Quest->getQid();
		$category 	= $brain_CategoryDB->getCategory();

		$get_Category 	= $brain_CategoryDB->get_Category($id);
		$dup 			= "";
		$easy 			= "Easy";
		$moderate 		= "Moderate";
		$hard 			= "Hard";

		$question_Easy 		= $brain_QuestionDB->get_QuestionDB_Easy($subject,$easy);
		$question_Moderate 	= $brain_QuestionDB->get_QuestionDB_Mod($subject,$moderate);
		$question_Hard 		= $brain_QuestionDB->get_QuestionDB_Hard($subject,$hard);


		include './view/brain_View_Question.php';
	} elseif ($action == 'brain_update_Question') {

		$_SESSION['level'] 		= $_POST['level'];
		$_SESSION['bid'] 		= $_POST['bid'];
		$_SESSION['question'] 	= $_POST['question'];
		$_SESSION['hint'] 		= $_POST['hint'];
		$_SESSION['subject'] 	= $_POST['subject'];


		$file_name = $_FILES['quest_pic']['name'];

		if ($_SESSION['level'] == 'Easy') {
			$_SESSION['correct'] = $_POST['correct'];
			$_SESSION['choiceB'] = $_POST['choiceB'];
			$_SESSION['choiceC'] = $_POST['choiceC'];
			$_SESSION['choiceD'] = $_POST['choiceD'];

			if (empty($file_name)) {

				$brain_Question->setQuestion($_SESSION['question']);
				$brain_Question->setHint($_SESSION['hint']);
				$brain_Question->setQid($_SESSION['bid']);
				$brain_Question->setCorrect($_SESSION['correct']);
				$brain_Question->setChoiceB($_SESSION['choiceB']);
				$brain_Question->setChoiceC($_SESSION['choiceC']);
				$brain_Question->setChoiceD($_SESSION['choiceD']);
				$brain_Question->setLevel($_SESSION['level']);

			} else {

				$brain_Question->setQuestion($_SESSION['question']);
				$brain_Question->setHint($_SESSION['hint']);
				$brain_Question->setQid($_SESSION['bid']);
				$brain_Question->setCorrect($_SESSION['correct']);
				$brain_Question->setChoiceB($_SESSION['choiceB']);
				$brain_Question->setChoiceC($_SESSION['choiceC']);
				$brain_Question->setChoiceD($_SESSION['choiceD']);
				$brain_Question->setLevel($_SESSION['level']);

				$brain_Question->setfile_name($file_name = $_FILES['quest_pic']['name']);
				$brain_Question->setfile_type($file_type = $_FILES['quest_pic']['type']);
				$brain_Question->setfile_path($file_path = "./user/".$file_name);
				move_uploaded_file($_FILES['quest_pic']['tmp_name'], $file_path);

			}


		} elseif ($_SESSION['level'] == 'Moderate' || $_SESSION['level'] == 'Hard') {

			$_SESSION['answer'] = $_POST['answer'];

			if (empty($file_name)) {

				$brain_Question->setQuestion($_SESSION['question']);
				$brain_Question->setHint($_SESSION['hint']);
				$brain_Question->setQid($_SESSION['bid']);
				$brain_Question->setAnswer($_SESSION['answer']);
				$brain_Question->setLevel($_SESSION['level']);

			} else {

				$brain_Question->setQuestion($_SESSION['question']);
				$brain_Question->setHint($_SESSION['hint']);
				$brain_Question->setQid($_SESSION['bid']);
				$brain_Question->setAnswer($_SESSION['answer']);
				$brain_Question->setLevel($_SESSION['level']);

				$brain_Question->setfile_name($file_name = $_FILES['quest_pic']['name']);
				$brain_Question->setfile_type($file_type = $_FILES['quest_pic']['type']);
				$brain_Question->setfile_path($file_path = "./user/".$file_name);
				move_uploaded_file($_FILES['quest_pic']['tmp_name'], $file_path);
			}

		}

		$brain_QuestionDB->update_Question($brain_Question);
		$get_cid 	= $brain_CategoryDB->getCid($_SESSION['subject']);
		$cid 		= $get_cid->getCid();
		$dup 		= "Updated";
		header("location:.?action=View_brain_Question&dup=".urlencode($dup) . "&level=".urlencode($_SESSION['level']) ."&cid=".urlencode($_SESSION['cid'])."&quest=''");

	} elseif ($action == 'brain_update_Category') {

		if (isset($_SESSION['user'])) {
			$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}

		$user_id 						= $brain_users->getUser_id();
		$_SESSION['cid'] 				= $_POST['cid'];
		$_SESSION['update_Category'] 	= $_POST['update_Category'];

		if ($_SESSION['update_Category'] != 'English' && $_SESSION['update_Category'] != 'Math' && $_SESSION['update_Category'] != 'Filipino' && $_SESSION['update_Category'] != 'Science' && $_SESSION['update_Category'] != 'History') {
			$dup = 'Only';
		} else {
			$dup = 'Updated';
			$brain_Category->setCid($_SESSION['cid']);
			$brain_Category->setCategory($_SESSION['update_Category']);
			$brain_CategoryDB->update_Category($brain_Category);
		}

		header("location:.?action=admin&dup=".urlencode($dup) ."&user_id=".urlencode($user_id));
	} elseif ($action == 'View_brain_Question') {

		if (isset($_SESSION['user'])) {
			$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}

		// $_SESSION['cid'] = $_GET['cid'];
		$ques = $_GET['quest'];
		// $_SESSION['qid'] = $_GET['qid'];
		// $level = $_GET['level'];

		$category = $brain_CategoryDB->getCategory();
		// $get_Category = $brain_CategoryDB->get_Category($_SESSION['cid']);
		// $subject = $get_Category->getCategory();

		$dup = $_GET['dup'];
		// $easy = "Easy";
		// $moderate = "Moderate";
		// $hard = "Hard";

		$quest = $_GET['quest'];

		// $question = $brain_QuestionDB->getQuestion();

		// $question_Easy = $brain_QuestionDB->get_QuestionDB_Easy($subject,$easy);
		// $question_Moderate = $brain_QuestionDB->get_QuestionDB_Mod($subject,$moderate);
		// $question_Hard = $brain_QuestionDB->get_QuestionDB_Hard($subject,$hard);

		$question_Easy 		= $brain_QuestionDB->get_QuestionDB_Easy();
		$question_Moderate 	= $brain_QuestionDB->get_QuestionDB_Mod();
		$question_Hard 		= $brain_QuestionDB->get_QuestionDB_Hard();

		// include './view/brain_View_Question.php';
		include './view/brain_questionView.php';

	} elseif ($action == "brain_DeleteQuestion") {
		$_SESSION['qid'] = $_POST['qid'];

		if (isset($_SESSION['user'])) {
			$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}

		$subject_Quest = $brain_QuestionDB->get_Subject($_SESSION['qid']);
		$brain_QuestionDB->delete_QuestionDB($_SESSION['qid']);
		$subject 		= $subject_Quest->getSubject();
		$category 		= $brain_CategoryDB->getCategory();
		$get_Category 	= $brain_CategoryDB->get_Category($_SESSION['cid']);

		$dup = 'delete';
		header("location:.?action=View_brain_Question&dup=".urlencode($dup) ."&cid=".urlencode($_SESSION['cid'])."&quest=''");
	} elseif ($action == 'brain_addRoom') {

		if (isset($_SESSION['user'])) {
			$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}

		$_SESSION['room_num'] 	= $_POST['room_num'];
		$_SESSION['user_id'] 	= $_POST['user_id'];
		$user_id 				= $_SESSION['user_id'];
		$room_num 				= $_SESSION['room_num'];
		$_SESSION['category'] 	= ucwords($_POST['category']);
		$_SESSION['players'] 	= $_POST['players'];
		$player_type 			= "Server";
		$num_of_players 		= 1;

		$brain_room->setRoom_id($_SESSION['room_num']);
		$brain_room->setUser_id($_SESSION['user_id']);
		$brain_room->setCategory($_SESSION['category']);
		$brain_room->setPlayers($_SESSION['players']);
		$brain_room->setPlayer_type($player_type);
		$brain_room->setNum_of_players($num_of_players);

		$brain_roomDB->brain_AddRoom($brain_room);
		$rid 			= $brain_roomDB->getRid($_SESSION['room_num']);
		$rooms_id 		= $rid->getRid();
		$player_type 	= $rid->getPlayer_type();

		$brain_joinRoom->setJid($rooms_id);
		$brain_joinRoom->setUser_id($_SESSION['user_id']);
		$brain_joinRoom->setRoom_num($room_num);
		$brain_joinRoom->setPlayer_type($player_type);

		//--------Reserve Question(Easy)----------------//
		$level = 'Easy';
		$brain_reserveQuestionDB->removeReservedQs($_SESSION['room_num']);
		$getQuestion 	= $brain_QuestionDB->getRandQuestion($level,$_SESSION['category']);
		$q_num 			= 0;

		foreach ($getQuestion as $q) {
			$q_num += 1;
			$brain_reserveQuestion->setRoom_num($_SESSION['room_num']);
			$brain_reserveQuestion->setQuestion_id($q->getQid());
			$brain_reserveQuestion->setQuestion_num($q_num);
			$brain_reserveQuestion->setDifficulty($level);
			$brain_reserveQuestionDB->reserveQuestion($brain_reserveQuestion);
		}

		//--------Reserve Question(Moderate)----------------//

		$level 			= 'Moderate';
		// $brain_reserveQuestionDB->removeReservedQs($_SESSION['room_num']);
		$getQuestion 	= $brain_QuestionDB->getRandQuestion($level,$_SESSION['category']);
		$q_num 			= 0;

		foreach ($getQuestion as $q) {
			$q_num += 1;
			$brain_reserveQuestion->setRoom_num($_SESSION['room_num']);
			$brain_reserveQuestion->setQuestion_id($q->getQid());
			$brain_reserveQuestion->setQuestion_num($q_num);
			$brain_reserveQuestion->setDifficulty($level);
			$brain_reserveQuestionDB->reserveQuestion($brain_reserveQuestion);
		}

		//--------Reserve Question(Moderate)----------------//

		$level 			= 'Hard';
		// $brain_reserveQuestionDB->removeReservedQs($_SESSION['room_num']);
		$getQuestion 	= $brain_QuestionDB->getRandQuestion($level,$_SESSION['category']);
		$q_num 			= 0;

		foreach ($getQuestion as $q) {
			$q_num += 1;
			$brain_reserveQuestion->setRoom_num($_SESSION['room_num']);
			$brain_reserveQuestion->setQuestion_id($q->getQid());
			$brain_reserveQuestion->setQuestion_num($q_num);
			$brain_reserveQuestion->setDifficulty($level);
			$brain_reserveQuestionDB->reserveQuestion($brain_reserveQuestion);
		}

		//---------------------------------------//


		$brain_joinRoomDB->join_to_room($brain_joinRoom);
		$join_room = $brain_joinRoomDB->getJoin_Room($brain_joinRoom);

		header("location:.?action=brain_joinRooms&rid=".urlencode($rooms_id) . "&room_num=".urlencode($room_num) . "&user_id=".urlencode($user_id) . "&player_type=".urlencode($player_type));
	} elseif ($action == 'brain_joinRooms') {
		 $_SESSION['user_id'] 		= $_GET['user_id'];
		 $_SESSION['player_type'] 	= $_GET['player_type'];
		 $user 						= $brain_UserDB->getUsername($_SESSION['user_id']);
		 $username 					= $user->getUsername();
		 $_SESSION['user'] 			= $username;

		if (isset($_SESSION['user'])) {
			$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}
		
		$_SESSION['rid'] 		= $_GET['rid'];
		$_SESSION['room_num']	= $_GET['room_num'];

		$brain_joinRoom->setJid($_SESSION['rid'] );
		$brain_joinRoom->setUser_id($_SESSION['user_id']);
		$brain_joinRoom->setRoom_num($_SESSION['room_num']);
		$brain_joinRoom->setPlayer_type($_SESSION['player_type']);

		$brain_room->setRid($_SESSION['rid']);
		$brain_room->setRoom_id($_SESSION['room_num']);
		$brain_room->setUser_id($_SESSION['user_id']);

		$get_Room 	= $brain_roomDB->getBRoom($brain_room);
		$join_room 	= $brain_joinRoomDB->getJoin_Room($brain_joinRoom);

			// echo  $_SESSION['user_id'];
			include './view/brain_joinRoom.php';
	} elseif ($action == 'brain_joinRoom') {
		 $_SESSION['rid'] = $_GET['rid'];

		if (isset($_SESSION['user'])) {
			$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}

		$user_id 	= $brain_users->getUser_id();
		$Room 		= $brain_roomDB->getRoomID($_SESSION['rid']);
		$brain_joinRoom->setJid($_SESSION['rid']);

		$room_num 		= $Room->getRoom_id();
		$rid 			= $Room->getRid();
		$player_type 	= "Client";
		$num_of_players = $Room->getNum_of_players();
		$num_players 	= $num_of_players + 1;

		$brain_room->setRid($rid);
		$brain_room->setNum_of_players($num_players);
		$brain_roomDB->updateRoom($brain_room);

		$brain_joinRoom->setUser_id($user_id);
		$brain_joinRoom->setRoom_num($room_num);
		$brain_joinRoom->setPlayer_type($player_type);

		$brain_joinRoomDB->join_to_room($brain_joinRoom);
		$user = $brain_UserDB->getProfile($user_id);

		header("location:.?action=brain_joinRooms&rid=".urlencode($rooms_id) . "&room_num=".urlencode($room_num) . "&user_id=".urlencode($user_id) . "&player_type=".urlencode($player_type));

	} elseif ($action == 'brain_UpdateQuestion') {

		if (isset($_SESSION['user'])) {
			$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}

		$_SESSION['qid'] 	= $_POST['qid'];
		$level 				= $_POST['level'];

		if ($level == 'Easy') {
			$update_Question = $brain_QuestionDB->get_Question_Easy($_SESSION['qid']);
			// echo "hello";
		} elseif ($level == 'Moderate' || $level == 'Hard') {
			$update_Question = $brain_QuestionDB->get_Question_HM($_SESSION['qid'],$level);
		}

		$category 	= $brain_CategoryDB->getCategory();
		$dup 		= $_POST['dup'];

		include './view/brain_UpdateQuestion.php';

	} elseif ($action == 'brain_StartGame') {

		if (isset($_SESSION['user'])) {
			$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}

		$_SESSION['room_id'] 	= $_GET['room_id'];
		$reserveQuestions 		= $brain_reserveQuestionDB->getReserveQuestions($_SESSION['room_id']);
		$get_users 				= $brain_joinRoomDB->get_Users($_SESSION['room_id']);

		// $easy_quest = $brain_QuestionDB->getQuestion_Easy($easy);
		include './view/brain_easy.php';

	} elseif ($action == 'brain_moderate') {

		if (isset($_SESSION['user'])) {
			$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}

		include './view/brain_moderate.php';
	} elseif ($action == 'brain_hard') {

		if (isset($_SESSION['user'])) {
			$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}

		include './view/brain_hard.php';
	} elseif ($action == 'brain_result') {

		if (isset($_SESSION['user'])) {
			$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}

		include './view/brain_result.php';

	} elseif ($action == 'exit') {

		if (isset($_SESSION['user'])) {
			$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}

		include './view/brain_player.php';
	} elseif ($action == 'brain_exitRoom') {

		$_SESSION['user_id'] 	= $_POST['user_id'];
		$_SESSION['room_id'] 	= $_POST['room_id'];
		$user 					= $brain_UserDB->getUsername($_SESSION['user_id']);
		$username 				= $user->getUsername();
		$_SESSION['user'] 		= $username;

		// echo $_SESSION['user'];
		 if (isset($_SESSION['user'])) {
			$brain_users = $brain_UserDB->brain_getUser($_SESSION['user_id'] );
		}
		// $brain_roomDB->deleteRoom($_SESSION['room_id']);
		// $brain_rooms_play = $brain_roomDB->get_Room();
		// $category = $brain_CategoryDB->getCategory();

		// header('location:.?action=brain_player');
		header("location:.?action=brain_player&rid=".urlencode($_SESSION['room_id']) . "&room_num=".urlencode($room_num) . "&user_id=".urlencode($_SESSION['user_id']) . "&player_type=".urlencode($player_type));
		// include './view/brain_player.php';
	} elseif ($action == 'brain_profile') {

		if (isset($_SESSION['user'])) {
			$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}

		$_SESSION['uid'] = $_GET['uid'];
		// $user_id = $_GET['uid'];

	    $profile = $brain_UserDB->getProfile( $_SESSION['uid']);

		include './view/brain_profile.php';
	} elseif ($action == 'logout') {
		$_SESSION = [];
		session_destroy();
		header('location:.');
	}
	
	if ($action != 'checkPlayer') {
		require './view/footer.php';
	}
	
