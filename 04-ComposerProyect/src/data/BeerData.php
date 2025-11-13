<?php 

namespace app\data;

use PDO;

use app\interfaces\DataInterface;
use app\data\BaseData;

class BeerData extends BaseData implements DataInterface{
    const TABLE = 'beer';
    
    public function get():array{
        $sql ="SELECT id, name, alcohol FROM ". self::TABLE;
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

}