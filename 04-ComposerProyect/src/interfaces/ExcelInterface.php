<?php 

namespace app\interfaces;


interface ExcelInterface{
    public function create(array $data, string $filePath);
    
}