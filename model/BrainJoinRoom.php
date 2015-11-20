<?php 

class BrainJoinRoom 
{
    public $pdo;
    
    function __construct()
    {
        $this->pdo = Database::getDB();
    }
    
    function countRoom($room_id)
    {
        $stmt 		= $this->pdo->prepare("SELECT * FROM brain_joinroom WHERE room_num = ?");
		$stmt->execute(array($room_id));
		$result 	= $stmt->rowCount();
        
        return $result;
    }
    
    function getPlayerType($id, $rid)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM brain_joinroom WHERE user_id = ? AND room_num = ?");
        $stmt->execute([$id, $rid]);
        $result = $stmt->fetch();
        
        return $result['player_type'];
    }
}