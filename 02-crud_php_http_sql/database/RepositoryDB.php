<?php 
namespace app\database;


use PDO;
use app\interfaces\RepositoryInterface;
use app\database\Base_Repository;


class RepositoryDB extends Base_Repository implements RepositoryInterface{
    const Table = 'beer';
    public function get(): array
        {
            $sql = 'SELECT * FROM '.self::Table;
            $query = $this->pdo->prepare($sql);
            $query->execute();
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
    public function exists(int $id): bool
        {
            $sql = "SELECT * FROM ". self::Table
            ." WHERE id= :id";
            $query= $this->pdo->prepare($sql);
            $query->execute(['id'=> $id]);
            $result = $query->rowCount() >0;
            return $result;
        }
    public function create($data)
        {
            $sql = "INSERT INTO ".self::Table."(name, alcohol)"
            . " VALUES (:name, :alcohol)";
            $query = $this->pdo->prepare($sql);
            $query->execute($data);

        }
    public function update($data)
        {
            $sql ="UPDATE ". self::Table
            ." SET name= :name, alcohol= :alcohol"
            ." WHERE id= :id ";
            $query = $this->pdo->prepare($sql);
            $query->execute($data);

        }
    public function delete(int $id)
        {
            $sql = "DELETE FROM ".self::Table
            ." WHERE id = :id";
            $query = $this->pdo->prepare($sql);
            $query->execute(['id'=> $id]);
        }
}