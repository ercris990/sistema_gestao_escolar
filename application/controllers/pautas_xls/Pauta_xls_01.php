<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Pauta_xls_01 extends CI_Controller 
{
	public function __construct() {
				parent::__construct();
				// Model
				// $this->load->model('EmployeeModel');
		}   
	public function xls_001() {
			echo 'XLS 001 - Teste';
	} 
	public function index() {
        $data['page'] = 'export-excel';
        $data['title'] = 'Export Excel data';
        $data['employeeData'] = $this->EmployeeModel->employeeList(); /****/
				$this->load->view('employee/employee', $data);
    }
	public function createExcel() {
		$fileName = 'pauta-xlsx-001.xlsx';  
		$employeeData = $this->EmployeeModel->employeeList();
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
       	$sheet->setCellValue('A1', 'Nº.');
        $sheet->setCellValue('B1', 'Nome');
        $sheet->setCellValue('C1', 'Skills');
        $sheet->setCellValue('D1', 'Address');
				$sheet->setCellValue('E1', 'Age');
				$sheet->setCellValue('F1', 'Designation');
				$num = 1;       
				$rows = 2;
				// -------------------------------------------------------------------------------
        // foreach ($employeeData as $val){
        //     $sheet->setCellValue('A' . $rows, $val['id']);
        //     $sheet->setCellValue('B' . $rows, $val['name']);
        //     $sheet->setCellValue('C' . $rows, $val['skills']);
        //     $sheet->setCellValue('D' . $rows, $val['address']);
	    	// 	   $sheet->setCellValue('E' . $rows, $val['age']);
        //     $sheet->setCellValue('F' . $rows, $val['designation']);
        //     $rows++;
				// }
				// -------------------------------------------------------------------------------
				// $writer = new Xlsx($spreadsheet);
				// $filename = 'laporan-siswa';
				// header('Content-Type: application/vnd.ms-excel');
				// header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
				// header('Cache-Control: max-age=0');
				// $writer->save('php://output');
				// -------------------------------------------------------------------------------
        $writer = new Xlsx($spreadsheet);
				$writer->save("upload/".$fileName);
				header("Content-Type: application/vnd.ms-excel");
        redirect(base_url()."/upload/".$fileName);              
    }    
}
