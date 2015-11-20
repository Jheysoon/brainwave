<?php 
	class brain_reserveQuestionDB{
		public function reserveQuestion($brain_reserveQuestion){
			$pdo = Database::getDB();

			$room_num = $brain_reserveQuestion->getRoom_num();
			$question_id = $brain_reserveQuestion->getQuestion_id();
			$question_num = $brain_reserveQuestion->getQuestion_num();
			$difficulty = $brain_reserveQuestion->getDifficulty();

			$stmt = $pdo->prepare("INSERT INTO reserve_question SET room_num = ?, question_num = ?, question_id = ?, difficulty = ?");
			$stmt->execute(array($room_num,$question_num,$question_id,$difficulty));
		}
		public function removeReservedQs($room_num){
			$pdo = Database::getDB();
			$stmt = $pdo->prepare("DELETE FROM reserve_question WHERE room_num = ?");
			$stmt->execute(array($room_num));		
		}
		public function getReserveQuestions($room_id){
			$pdo = Database::getDB();
			// $number_question = 1;
			$stmt = $pdo->prepare("SELECT * FROM reserve_question WHERE room_num = ? AND difficulty = 'EASY' ORDER BY question_num ASC");
			$stmt->execute(array($room_id));

			$result = $stmt->fetchAll();
			$brain_Questions = array();

			// $remainder = $result/$number_question;

			foreach ($result as $b) {
				$brain_question = new brain_Question();
				$brain_question->setQuestion_id($b['question_id']);
				$brain_question->setQuestion_num($b['question_num']);
				
				$stmt = $pdo->prepare("SELECT * FROM brain_question, easy_choice WHERE brain_question.bid AND easy_choice.qid = ?");
				$stmt->execute(array($b['question_id']));

				$row = $stmt->fetch();

				$brain_question->setQuestion($row['question']);
				$brain_question->setLevel($row['level']);
				$brain_question->setSubject($row['subject']);
				$brain_question->setfile_path($row['question_path']);
				$brain_question->setHint($row['hint']);

				$brain_question->setCorrect($row['correct']);
				$brain_question->setChoiceB($row['choiceB']);
				$brain_question->setChoiceC($row['choiceC']);
				$brain_question->setChoiceD($row['choiceD']);
				
				$brain_Questions[] = $brain_question;
				
			}
			
			return $brain_Questions;
		}
	}


 ?>