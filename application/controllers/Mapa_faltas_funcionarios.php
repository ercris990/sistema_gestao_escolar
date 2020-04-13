<?php
defined('BASEPATH') OR exit('No direct script access allowed');
setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );

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
		/*-----------------------------------------------------------------------------------------------------------------------------*/ 
		/* ================================================================================================================= */
		require(APPPATH. 'libraries/PHPExcel/Classes/PHPExcel.php');
		require(APPPATH. 'libraries/PHPExcel/Classes/PHPExcel/Writer/Excel2007.php');
		/*-------------------------------------------------------------------------*/
		$objPHPExcel = new PHPExcel();
		/*-------------------------------------------------------------------------*/
		$objPHPExcel->getProperties()->setCreator("sistema_de_gestão_escolar");
		$objPHPExcel->getProperties()->setLastModifiedBy("sistema_de_gestão_escolar");
		$objPHPExcel->getProperties()->setTitle("Planilha Excel");
		$objPHPExcel->getProperties()->setSubject("Planilha Excel");
		$objPHPExcel->getProperties()->setDescription("Planilha Excel 001");
		/*-------------------------------------------------------------------------*/
		$objPHPExcel->setActiveSheetIndex(0);
		/*-------------------------------------------------------------------------*/
		$objPHPExcel->getActiveSheet()->setShowGridlines(FALSE);
		$objPHPExcel->getActiveSheet()->setTitle("Mapa de Faltas - Funcionarios");
		/*-------------------------------------------------------------------------*/
		$objPHPExcel->getActiveSheet()->getStyle('B9')->getAlignment()->setWrapText(true);
		/*					MESCLAGEM DE CELULAS - VERTICAL
		---------------------------------------------------------------------------*/
		$objPHPExcel->getActiveSheet()->mergeCells('A8:A9');
		$objPHPExcel->getActiveSheet()->mergeCells('B8:B9');
		$objPHPExcel->getActiveSheet()->mergeCells('C8:C9');
		/*					MESCLAGEM DE CELULAS - HORIZONTAL
		---------------------------------------------------------------------------*/
		$objPHPExcel->getActiveSheet()->mergeCells('A1:F1');
		$objPHPExcel->getActiveSheet()->mergeCells('A2:F2');
		$objPHPExcel->getActiveSheet()->mergeCells('A3:F3');
		$objPHPExcel->getActiveSheet()->mergeCells('A4:F4');
		$objPHPExcel->getActiveSheet()->mergeCells('A6:F6');
		$objPHPExcel->getActiveSheet()->mergeCells('D8:F8');
		/*--------------------------------------------------ALINHAMENTO VERTICAL--------------------------------------------------*/
		$objPHPExcel->getActiveSheet()->getStyle('A8:A9')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('B8:B9')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('C8:C9')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		/*--------------------------------------------------ALINHAMENTO HORIZONTAL--------------------------------------------------*/
		$objPHPExcel->getActiveSheet()->getStyle('A1:F1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('A2:F2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('A3:F3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('A4:F4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('A6:F6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('A8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
		$objPHPExcel->getActiveSheet()->getStyle('B8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
		$objPHPExcel->getActiveSheet()->getStyle('C8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
		$objPHPExcel->getActiveSheet()->getStyle('D8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
		$objPHPExcel->getActiveSheet()->getStyle('D9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
		$objPHPExcel->getActiveSheet()->getStyle('E9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
		$objPHPExcel->getActiveSheet()->getStyle('F9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
		/*---------------------------------------------------BORDER DAS CELULAS---------------------------------------------------*/
		$styleThinBlackBorderOutline = array(
			'borders' => array(
				'allborders' => array(
					 'style' => PHPExcel_Style_Border::BORDER_THIN,
					 'color' => array('argb' => 'FF000000'),
				),
			),
		);
		$objPHPExcel->getActiveSheet()->getStyle('A8:F8')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('A9:F9')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('A10:F10')->applyFromArray($styleThinBlackBorderOutline);
		/*--------------------------------------------------LARGURA DAS COLUNAS--------------------------------------------------*/
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(3);
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(TRUE);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(TRUE);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(TRUE);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(TRUE);
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(TRUE);
		/*                                          ** BEGIN DADOS **
		======================================================================================================*/
		/*							FORMATAÇÃO CONDICIONAL - NUMEROS
		========================================= CONDIÇAO 1 ==========================================*/
		$objConditional1 = new PHPExcel_Style_Conditional();
		$objConditional1->setConditionType(PHPExcel_Style_Conditional::CONDITION_CELLIS);
		$objConditional1->setOperatorType(PHPExcel_Style_Conditional::OPERATOR_LESSTHAN); /* CONDICAO */
		$objConditional1->addCondition('5');
		$objConditional1->getStyle()->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);
		$objConditional1->getStyle()->getFont()->setBold(true);
		/*========================================== CONDIÇAO 2 ==========================================*/
		$objConditional2 = new PHPExcel_Style_Conditional();
		$objConditional2->setConditionType(PHPExcel_Style_Conditional::CONDITION_CELLIS);
		$objConditional2->setOperatorType(PHPExcel_Style_Conditional::OPERATOR_GREATERTHANOREQUAL); /* CONDICAO */
		$objConditional2->addCondition('5');
		$objConditional2->getStyle()->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK); 
		$objConditional2->getStyle()->getFont()->setBold(true);
		/*							FORMATAÇÃO CONDICIONAL TEXTO
		========================================== CONDIÇAO 1 ==========================================*/
		$objConditional3 = new PHPExcel_Style_Conditional();
		$objConditional3->setConditionType(PHPExcel_Style_Conditional::CONDITION_CONTAINSTEXT);
		$objConditional3->setOperatorType(PHPExcel_Style_Conditional::OPERATOR_CONTAINSTEXT); /* CONDICAO */
		$objConditional3->setText('Reprovado');
		$objConditional3->getStyle()->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);
		$objConditional3->getStyle()->getFont()->setBold(true);
		/*========================================== CONDIÇAO 2 ==========================================*/
		$objConditional4 = new PHPExcel_Style_Conditional();
		$objConditional4->setConditionType(PHPExcel_Style_Conditional::CONDITION_CONTAINSTEXT);
		$objConditional4->setOperatorType(PHPExcel_Style_Conditional::OPERATOR_CONTAINSTEXT); /* CONDICAO */
		$objConditional4->setText('Aprovado');
		$objConditional4->getStyle()->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK); 
		$objConditional4->getStyle()->getFont()->setBold(true);
		/*======================================================================================================*/
		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'REPÚBLICA DE ANGOLA');
		$objPHPExcel->getActiveSheet()->setCellValue('A2', 'MISNISTERIO DA EDUCAÇÃO');
		$objPHPExcel->getActiveSheet()->setCellValue('A3', 'REPARTIÇÃO DE EDUCAÇÃO DO DISTRITO URBANO DO RANGEL');
		$objPHPExcel->getActiveSheet()->setCellValue('A4', 'ESCOLA DO ENSINO PRIMÁRIO N.º 1188 EX. 5028');
		$objPHPExcel->getActiveSheet()->setCellValue('A6', 'Levantamento de faltas referentes ao mês de'.strftime(' %B de %Y', strtotime($mes)));
		/*-------------------------------------------------------------------------*/
		$objPHPExcel->getActiveSheet()->setCellValue('A8', 'Nº');
		$objPHPExcel->getActiveSheet()->setCellValue('B8', 'NOME COMPLETO');
		$objPHPExcel->getActiveSheet()->setCellValue('C8', 'GÉNERO');
		$objPHPExcel->getActiveSheet()->setCellValue('D8', 'NÚMERO DE FALTAS');
		$objPHPExcel->getActiveSheet()->setCellValue('D9', 'MARCADAS');
		$objPHPExcel->getActiveSheet()->setCellValue('E9', 'JUSTIFICADAS');
		$objPHPExcel->getActiveSheet()->setCellValue('F9', 'NÃO JUSTIFICADAS');
		/*-------------------------------------------------------------------------*/
		$row = 10;
		$i = 1;
		foreach($dados['assiduidade_funcionarios'] as $assid_func){
			/*--------------------------------------------------------------------------------*/
			$objPHPExcel->getActiveSheet()->getStyle('A'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('C'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('D'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			/*--------------------------------------------------------------------------------*/
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $i);
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$row, $assid_func->nome_funcionario);
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$row, $assid_func->genero_funcionario);
			/*------------------------------------------BORDER DAS CELULAS------------------------------------------*/
			$styleThinBlackBorderOutline = array(
				'borders' => array(
					'allborders' => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN,
						'color' => array('argb' => 'FF000000'),
					),
				),
			);
			$objPHPExcel->getActiveSheet()->getStyle('A'.$row.':F'.$row)->applyFromArray($styleThinBlackBorderOutline);
			/*-------------------------------------------------------------------------------------------------------*/
			$i++;
			$row++;
		}       
		$row = 10;
		$i = 1;
		foreach($dados['num_faltas'] as $n_faltas){
			/*----------------------------------------------------------*/
			$objPHPExcel->getActiveSheet()->getStyle('D'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('E'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('F'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			/*----------------------------------------------------------*/
			$total_faltas = ($n_faltas->falta - $n_faltas->justificacao);
			/*----------------------------------------------------------*/
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$row, $n_faltas->falta);
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$row, $n_faltas->justificacao);
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$row, '=SUM(D'.$row.'-E'.$row.')');
			$i++;
			$row++;
		}
		$objPHPExcel->getActiveSheet()->mergeCells('A'.$row.':F'.$row);
		$objPHPExcel->getActiveSheet()->getStyle('A'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$row, 'Luanda, aos '.strftime('%d de %B de %Y', strtotime(date('d-m-Y'))));
		/*========================================================END DADOS========================================================*/
		/*--------------------------------------------------ORIENTACAO E TAMANHO DA FOLHA---------------------------------------*/
		$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_worksheet_PageSetup::ORIENTATION_PORTRAIT); /*ORIENTATION_LANDSCAPE*/
		$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_worksheet_PageSetup::PAPERSIZE_A4);
		/*----------------------------------------------------------------------------------------------------------------------*/
		$filename = "MAPA-DE-FALTAS-".$mes.'.xlsx';
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		/*----------------------------------------------------------------------------------------------------------------------*/
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
		$objWriter->save('php://output');
		exit;
	}
}