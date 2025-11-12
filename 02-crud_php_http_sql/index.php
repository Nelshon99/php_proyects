<?php
header('Content-Type: application/json');
require_once __DIR__ . '/autoload.php';
use app\business\Add;
use app\business\Update;
use app\business\Delete;
use app\business\Get;
use app\data\Repository;
use app\database\RepositoryDB;
use app\validators\Validator;
use app\exceptions\ValidationException;
use app\exceptions\DataException;



//$repository = new Repository();
$validator =  new Validator();


try {
    $repository = new RepositoryDB();

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':
            $body= json_decode(file_get_contents('php://input'), true);
            $add = new Add($repository, $validator);
            $add->add($body);
            break;
        case 'GET':
            $get =  new Get($repository);
            echo json_encode($get->get());
            break;

        case 'PUT':
            $body= json_decode(file_get_contents('php://input'), true);
            $update = new Update($repository, $validator);
            $update->update($body);
            break;
        case 'DELETE':
            $id = $_GET['id'];
            $delete= new Delete ($repository);
            $delete->delete($id);
            break;
        default:
            http_response_code(405);
    }
}catch (ValidationException $e) {
    http_response_code(400);
    echo json_encode(['error'=> $e->getMessage()]);
}catch (DataException $e) {
    http_response_code(404);
    echo json_encode(['error'=> $e->getMessage()]);
}catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['Error en la base de datos'=> $e->getMessage()]);
}catch (\Exception $e) {
    http_response_code(500);
    echo json_encode(['Error'=> $e->getMessage()]);
}catch (\TypeError $e) {
    http_response_code(500);
    echo "Error de tipado: ". $e->getMessage();
}