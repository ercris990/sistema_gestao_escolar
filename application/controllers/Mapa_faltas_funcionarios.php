<?php
defined('BASEPATH') OR exit('No direct script access allowed');
setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Mapa_faltas_funcionarios extends CI_Controller 
{
	public function exportar_mapa($mes)
	{
		/*-----------------------------------------------------------------------------------------------------------------------------*/ 
		$this->db->select('*');													  					
		$this->db->from('assiduidade_funcionario');												
		$this->db->where('mes_ano', $mes);
		$this->db->group_by('assiduidade_funcionario.funcionario_id');											
		$this->db->order_by("nivel_acesso", "asc");  												 									 					
		$this->db->join('funcionario', 'funcionario.id_funcionario = assiduidade_funcionario.funcionario_id');		
		$dados["assiduidade_funcionarios"] = $this->db->get()->result();
		/*-----------------------------------------------------------------------------------------------------------------------------*/ 
		$this->db->select_sum('falta');																// de notas disciplina
		$this->db->select_sum('justificacao');														// de notas disciplina
		$this->db->from('assiduidade_funcionario');													// de notas disciplina
		$this->db->where('mes_ano', $mes);															// filtro - anolectivo
		$this->db->group_by('assiduidade_funcionario.funcionario_id');											
		$this->db->order_by("nivel_acesso", "asc");  	
		$this->db->join('funcionario', 'funcionario.id_funcionario = assiduidade_funcionario.funcionario_id');		
		$dados['num_faltas'] = $this->db->get()->result();											// retorna várias linhas
		/*-----------------------------------------------------------------------------------------------------------------------------*/ 
		$dados["mes"] = $mes;
		/*-------------------------------------------------------------------------*/
			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();
		/*-------------------------------------------------------------------------*/
		// $objPHPExcel->setActiveSheetIndex(0);
			/* ================ Ocultar Linha de Grade ================ */ 
			$spreadsheet->getActiveSheet()->setShowGridlines(FALSE);
			$spreadsheet->getActiveSheet()->setTitle("Mapa de Faltas - Funcionarios");
			/*-------------------------------------------------------------------------*/
			$spreadsheet->getActiveSheet()->getStyle('B9')->getAlignment()->setWrapText(true);
		/*					MESCLAGEM DE CELULAS - VERTICAL
		---------------------------------------------------------------------------*/
		$spreadsheet->getActiveSheet()->mergeCells('A8:A9');
		$spreadsheet->getActiveSheet()->mergeCells('B8:B9');
		$spreadsheet->getActiveSheet()->mergeCells('C8:C9');
		/*					MESCLAGEM DE CELULAS - HORIZONTAL
		---------------------------------------------------------------------------*/
		$spreadsheet->getActiveSheet()->mergeCells('A1:F1');
		$spreadsheet->getActiveSheet()->mergeCells('A2:F2');
		$spreadsheet->getActiveSheet()->mergeCells('A3:F3');
		$spreadsheet->getActiveSheet()->mergeCells('A4:F4');
		$spreadsheet->getActiveSheet()->mergeCells('A6:F6');
		$spreadsheet->getActiveSheet()->mergeCells('D8:F8');
		/* ================ Alinhamento Vertical ================ */ 
		$spreadsheet->getActiveSheet()->getStyle('A8:A9')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);		
		$spreadsheet->getActiveSheet()->getStyle('B8:B9')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);		
		$spreadsheet->getActiveSheet()->getStyle('C8:C9')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);		
		/*--------------------------------------------------ALINHAMENTO HORIZONTAL--------------------------------------------------*/
		$spreadsheet->getActiveSheet()->getStyle('A1:F1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$spreadsheet->getActiveSheet()->getStyle('A2:F2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$spreadsheet->getActiveSheet()->getStyle('A3:F3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$spreadsheet->getActiveSheet()->getStyle('A4:F4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$spreadsheet->getActiveSheet()->getStyle('A6:F6')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$spreadsheet->getActiveSheet()->getStyle('A8')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$spreadsheet->getActiveSheet()->getStyle('B8')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$spreadsheet->getActiveSheet()->getStyle('C8')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$spreadsheet->getActiveSheet()->getStyle('D8')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$spreadsheet->getActiveSheet()->getStyle('D9')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$spreadsheet->getActiveSheet()->getStyle('E9')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$spreadsheet->getActiveSheet()->getStyle('F9')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
				/* ================ Border da Página  ================ */ 
				$border = [
					'borders' => [
						'allBorders' => [
							'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
							'color' => ['argb' => 'FF000000'],
						],
					],
				];
				$spreadsheet->getActiveSheet()->getStyle('A8:F8')->applyFromArray($border);
				$spreadsheet->getActiveSheet()->getStyle('A9:F9')->applyFromArray($border);
				$spreadsheet->getActiveSheet()->getStyle('A10:F10')->applyFromArray($border);
		/*--------------------------------------------------LARGURA DAS COLUNAS--------------------------------------------------*/
		$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(3);
		$spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(TRUE);
		$spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(TRUE);
		$spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(TRUE);
		$spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(TRUE);
		$spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(TRUE);
		/*======================================================================================================*/
		$sheet->setCellValue('A1', 'REPÚBLICA DE ANGOLA');
		$sheet->setCellValue('A2', 'MISNISTERIO DA EDUCAÇÃO');
		$sheet->setCellValue('A3', 'REPARTIÇÃO DE EDUCAÇÃO DO DISTRITO URBANO DO RANGEL');
		$sheet->setCellValue('A4', 'ESCOLA DO ENSINO PRIMÁRIO N.º 1188 EX. 5028');
		$sheet->setCellValue('A6', 'Levantamento de faltas referentes ao mês de'.strftime(' %B de %Y', strtotime($mes)));
		/*-------------------------------------------------------------------------*/
		$sheet->setCellValue('A8', 'Nº');
		$sheet->setCellValue('B8', 'NOME COMPLETO');
		$sheet->setCellValue('C8', 'GÉNERO');
		$sheet->setCellValue('D8', 'NÚMERO DE FALTAS');
		$sheet->setCellValue('D9', 'MARCADAS');
		$sheet->setCellValue('E9', 'JUSTIFICADAS');
		$sheet->setCellValue('F9', 'NÃO JUSTIFICADAS');
		/*-------------------------------------------------------------------------*/
		$row = 10;
		$i = 1;
		foreach($dados['assiduidade_funcionarios'] as $assid_func){
			/*--------------------------------------------- ALINHAMENTO HORIZONTAL ---------------------------------------------*/
			// $objPHPExcel->getActiveSheet()->getStyle('A'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			// $objPHPExcel->getActiveSheet()->getStyle('C'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			// $objPHPExcel->getActiveSheet()->getStyle('D'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

			// $spreadsheet->getActiveSheet()->getStyle('A'.$row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
			// $spreadsheet->getActiveSheet()->getStyle('B'.$row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
			// $spreadsheet->getActiveSheet()->getStyle('C'.$row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
			/*--------------------------------------------------------------------------------*/
			$sheet->setCellValue('A'.$row, $i);
			$sheet->setCellValue('B'.$row, $assid_func->nome_funcionario);
			$sheet->setCellValue('C'.$row, $assid_func->genero_funcionario);
			/* ================ Border da Página  ================ */ 
			$border = [
				'borders' => [
					'allBorders' => [
						'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
						'color' => ['argb' => 'FF000000'],
					],
				],
			];
			$spreadsheet->getActiveSheet()->getStyle('A'.$row.':F'.$row)->applyFromArray($border);
			/*-------------------------------------------------------------------------------------------------------*/
			$i++;
			$row++;
		}       
		$row = 10;
		$i = 1;
		foreach($dados['num_faltas'] as $n_faltas){
			/*----------------------------------------------------------*/
			$spreadsheet->getActiveSheet()->getStyle('D'.$row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
			$spreadsheet->getActiveSheet()->getStyle('E'.$row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
			$spreadsheet->getActiveSheet()->getStyle('F'.$row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
			/*----------------------------------------------------------*/
			$total_faltas = ($n_faltas->falta - $n_faltas->justificacao);
			/*----------------------------------------------------------*/
			$sheet->setCellValue('D'.$row, $n_faltas->falta);
			$sheet->setCellValue('E'.$row, $n_faltas->justificacao);
			$sheet->setCellValue('F'.$row, '=SUM(D'.$row.'-E'.$row.')');
			$i++;
			$row++;
		}
		$sheet->mergeCells('A'.$row.':F'.$row);
		$spreadsheet->getActiveSheet()->getStyle('A'.$row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$sheet->setCellValue('A'.$row, 'Luanda, aos '.strftime('%d de %B de %Y', strtotime(date('d-m-Y'))));
		/*========================================================END DADOS========================================================*/
		/* ================ Orientação e Tamanho da Página  ================ */ 
		$spreadsheet->getActiveSheet()->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_PORTRAIT);
		$spreadsheet->getActiveSheet()->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
		/* ================ Informações do Documento ================ */ 
		$spreadsheet->getProperties()
		->setCreator("Sistema de Gestão Escolar")
		->setLastModifiedBy("Sistema de Gestão Escolar")
		->setTitle("Mapa de Faltas")
		->setSubject("Mapa de Faltas")
		->setDescription("Mapa de Faltas")
		->setCategory("Relatório de Faltas");
		/* ----------------------------------------------------------------------------------------------------------- */
			$writer = new Xlsx($spreadsheet);
			$filename = "Mapa-de-Faltas-".$mes;
			//$filename = 'pauta-01';								// variavel com o nome do fixeiro XLS
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
			header('Cache-Control: max-age=0');
			$writer->save('php://output');
	}
}