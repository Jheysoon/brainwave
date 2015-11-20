<?php 
	class brain_CategoryDB{
		public function brain_addCategory($brain_Category){
			$pdo = Database::getDB();

			$cid = $brain_Category->getcid();
			
			$category = $brain_Category->getCategory();

			$stmt = $pdo->prepare("INSERT INTO category SET cat_name = ?");
			$stmt->execute(array($category));
		}
		public function getCategory(){
			$pdo = Database::getDB();

			$stmt = $pdo->prepare("SELECT * FROM category ORDER BY cid desc");
			$stmt->execute();
			$result = $stmt->fetchAll();

			$brain_Categories = array();

			foreach ($result as $b) {
				$brain_Category = new brain_Category();
				
				$brain_Category->setCid($b['cid']);
				$brain_Category->setCategory($b['cat_name']);
				$brain_Categories[] = $brain_Category;
			}
			return $brain_Categories;
		}
		
		public function verifyCategory($category)
		{
			$pdo = Database::getDB();
			$stmt = $pdo->prepare("SELECT cat_name FROM category WHERE cat_name = ?");
			$stmt->execute(array($category));
			$is_duplicate = $stmt->rowCount() ? true : false;

			return $is_duplicate;
		}
		public function delete_Category($cid){
			$pdo = Database::getDB();
			$stmt = $pdo->prepare("DELETE FROM category WHERE cid = ?");
			$stmt->execute(array($cid));
		}
		public function get_Category($cid){
			$pdo = Database::getDB();
			$stmt = $pdo->prepare("SELECT * From category WHERE cid = ?");
			$stmt->execute(array($cid));
			$row = $stmt->fetch();

			$brain_Category = new brain_Category();
	            $brain_Category->setCid($row['cid']);
	            $brain_Category->setCategory($row['cat_name']);
			return $brain_Category;
		}
		public function getCid($subject){
			$pdo = Database::getDB();
			$stmt = $pdo->prepare("SELECT * From category WHERE cat_name = ?");
			$stmt->execute(array($subject));
			$row = $stmt->fetch();

			$brain_Category = new brain_Category();
	            $brain_Category->setCid($row['cid']);
	            $brain_Category->setCategory($row['cat_name']);
			return $brain_Category;
		}

		public function update_Category($brain_Category){
			$pdo = Database::getDB();

			$cid = $brain_Category->getCid();
			$category = $brain_Category->getCategory();
			
			$stmt = $pdo->prepare("UPDATE category SET cat_name = ? WHERE cid = ?");
			$stmt->execute(array($category,$cid));
		}

	}


 ?>