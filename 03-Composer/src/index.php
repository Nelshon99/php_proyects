<?php 
require_once __DIR__ . '/../vendor/autoload.php';

use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


$now = Carbon::now();
echo "La fecha y hora actual son: ".$now->toDateTimeString();

$spreadsheet = new Spreadsheet();

$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1','Nombre');
$sheet->setCellValue('A2','Nelson');

$writer = new Xlsx($spreadsheet);

$fileName= "excels\myExcel.xlsx";
$writer->save($fileName);

echo "Archivo Generado";