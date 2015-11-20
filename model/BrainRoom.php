<?php 

class BrainRoom
{
    public $pdo;
    
    function __construct()
    {
        $this->pdo = Database::getDB();
    }
    
    public function numOfPlayer($roomNum)
    {
        $stmt   = $this->pdo->prepare("SELECT * FROM brain_rooms WHERE room_num = ?");
        $stmt->execute(array($roomNum));
        $result = $stmt->fetch();
        
        return $result['players'];
    }
}