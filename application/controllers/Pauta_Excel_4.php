<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pauta_Excel_4 extends CI_Controller 
{
	public function exportar_pauta_4($anolectivo, $turma)
	{
		$this->db->select('*');													  					// select tudo
		$this->db->from('notas_disciplina');												 		// da tbl matricula
		$this->db->where("anolectivo_id", $anolectivo);												// onde
        $this->db->where("turma_id", $turma);									 					// onde
		$this->db->join('aluno', 		'aluno.id_aluno = notas_disciplina.aluno_id');						// join ano lectivo e matricula
		$this->db->join('anolectivo', 	'anolectivo.id_ano = notas_disciplina.anolectivo_id');		// join ano lectivo e matricula
		$this->db->join('turma', 		'turma.id_turma = notas_disciplina.turma_id');						// join turma e matricula
		$this->db->join('classe', 		'classe.id_classe = turma.classe_id');							// Join tbl classe [turma]
		$this->db->join('periodo', 		'periodo.id_periodo = turma.periodo_id');						// join periodo e turma
		$this->db->join('sala', 		'sala.id_sala = turma.sala_id');						// join periodo e turma
		$dados["dados_turma"] = $this->db->get()->row();										    // retorna 1 linha
		/* --------------------------------------------------------------------------------------------------------------------------- */
		$this->db->from('notas_disciplina');														// de notas disciplina
		$this->db->where("anolectivo_id", $anolectivo);												// filtro - anolectivo
		$this->db->where("turma_id", $turma);														// filtro - turma
		$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');				// join turma e matricula
		$this->db->group_by('notas_disciplina.aluno_id');											// agrupamento
		$this->db->order_by("nome", "asc");  												 		// Ordenar a travez do nome
		$dados['alunos'] = $this->db->get()->result();												// retorna várias linhas
		/*------------------------------------------------------------------------------------------------------------------------------*/
		$this->db->select('*');																		// seleciona tudo
		$this->db->from('notas_disciplina');														// de notas disciplina
		$this->db->where("anolectivo_id", $anolectivo);												// filtro - anolectivo
		$this->db->where("turma_id", $turma);														// filtro - turma
		$this->db->where("disciplina_id", '58');													// filtro - turma
		$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');				// join turma e matricula
		$this->db->group_by('notas_disciplina.aluno_id');											// agrupamento
		$this->db->order_by("nome", "asc");  												 		// Ordenar a travez do nome
		$dados['l_portuguesa'] = $this->db->get()->result();										// retorna várias linhas
		/*------------------------------------------------------------------------------------------------------------------------------*/
		$this->db->select('*');																		// seleciona tudo
		$this->db->from('notas_disciplina');														// de notas disciplina
		$this->db->where("anolectivo_id", $anolectivo);												// filtro - anolectivo
		$this->db->where("turma_id", $turma);														// filtro - turma
		$this->db->where("disciplina_id", '59');													// filtro - turma
		$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');				// join turma e matricula
		$this->db->group_by('notas_disciplina.aluno_id');											// agrupamento
		$this->db->order_by("nome", "asc");  												 		// Ordenar a travez do nome
		$dados['matematica'] = $this->db->get()->result();											// retorna várias linhas
		/*------------------------------------------------------------------------------------------------------------------------------*/
		$this->db->select('*');																		// seleciona tudo
		$this->db->from('notas_disciplina');														// de notas disciplina
		$this->db->where("anolectivo_id", $anolectivo);												// filtro - anolectivo
		$this->db->where("turma_id", $turma);														// filtro - turma
		$this->db->where("disciplina_id", '60');													// filtro - turma
		$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');				// join turma e matricula
		$this->db->group_by('notas_disciplina.aluno_id');											// agrupamento
		$this->db->order_by("nome", "asc");  												 		// Ordenar a travez do nome
		$dados['estudo_meio'] = $this->db->get()->result();											// retorna várias linhas
		/*------------------------------------------------------------------------------------------------------------------------------*/
		$this->db->select('*');																		// seleciona tudo
		$this->db->from('notas_disciplina');														// de notas disciplina
		$this->db->where("anolectivo_id", $anolectivo);												// filtro - anolectivo
		$this->db->where("turma_id", $turma);														// filtro - turma
		$this->db->where("disciplina_id", '61');													// filtro - turma
		$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');				// join turma e matricula
		$this->db->group_by('notas_disciplina.aluno_id');											// agrupamento
		$this->db->order_by("nome", "asc");  												 		// Ordenar a travez do nome
		$dados['ed_musical'] = $this->db->get()->result();											// retorna várias linhas
		/*------------------------------------------------------------------------------------------------------------------------------*/
		$this->db->select('*');																		// seleciona tudo
		$this->db->from('notas_disciplina');														// de notas disciplina
		$this->db->where("anolectivo_id", $anolectivo);												// filtro - anolectivo
		$this->db->where("turma_id", $turma);														// filtro - turma
		$this->db->where("disciplina_id", '61');													// filtro - turma
		$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');				// join turma e matricula
		$this->db->group_by('notas_disciplina.aluno_id');											// agrupamento
		$this->db->order_by("nome", "asc");  												 		// Ordenar a travez do nome
		$dados['ed_fisica'] = $this->db->get()->result();											// retorna várias linhas
		/*------------------------------------------------------------------------------------------------------------------------------*/
		$this->db->select('*');																		// seleciona tudo
		$this->db->from('notas_disciplina');														// de notas disciplina
		$this->db->where("anolectivo_id", $anolectivo);												// filtro - anolectivo
		$this->db->where("turma_id", $turma);														// filtro - turma
		$this->db->where("disciplina_id", '63');													// filtro - turma
		$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');				// join turma e matricula
		$this->db->group_by('notas_disciplina.aluno_id');											// agrupamento
		$this->db->order_by("nome", "asc");  												 		// Ordenar a travez do nome
		$dados['ed_plastica'] = $this->db->get()->result();													// retorna várias linhas
		/* ========================================================================================================================================= */
		/* ========================================================================================================================================= */
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
		$objPHPExcel->getActiveSheet()->setTitle("Pauta Geral - ".$dados['dados_turma']->nome_classe);
		/*-------------------------------------------------------------------------*/
		$objPHPExcel->getActiveSheet()->getStyle('B9')->getAlignment()->setWrapText(true);
		/*					MESCLAGEM DE CELULAS - VERTICAL
		---------------------------------------------------------------------------*/
		$objPHPExcel->getActiveSheet()->mergeCells('A9:A10');
		$objPHPExcel->getActiveSheet()->mergeCells('B9:B10');
		$objPHPExcel->getActiveSheet()->mergeCells('C9:C10');
		$objPHPExcel->getActiveSheet()->mergeCells('D9:D10');
		$objPHPExcel->getActiveSheet()->mergeCells('W9:W10');
		/*					MESCLAGEM DE CELULAS - HORIZONTAL
		---------------------------------------------------------------------------*/
		$objPHPExcel->getActiveSheet()->mergeCells('A1:W1');
		$objPHPExcel->getActiveSheet()->mergeCells('A2:W2');
		$objPHPExcel->getActiveSheet()->mergeCells('A3:W3');
		$objPHPExcel->getActiveSheet()->mergeCells('A4:W4');
		$objPHPExcel->getActiveSheet()->mergeCells('E9:G9');
		$objPHPExcel->getActiveSheet()->mergeCells('H9:J9');
		$objPHPExcel->getActiveSheet()->mergeCells('K9:M9');
		$objPHPExcel->getActiveSheet()->mergeCells('N9:P9');
		$objPHPExcel->getActiveSheet()->mergeCells('Q9:S9');
		$objPHPExcel->getActiveSheet()->mergeCells('T9:V9');
		/*--------------------------------------------------ALINHAMENTO VERTICAL--------------------------------------------------*/
		$objPHPExcel->getActiveSheet()->getStyle('A9:A10')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('B9:B10')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('C9:C10')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('D9:D10')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('W9:W10')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		/*--------------------------------------------------ALINHAMENTO HORIZONTAL--------------------------------------------------*/
		$objPHPExcel->getActiveSheet()->getStyle('A1:W1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('A2:W2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('A3:W3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('A4:W4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('A6:G6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('A9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('B9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('C9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('D9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('E9:G9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('E10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('F10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('G10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('H9:J9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('H10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('I10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('J10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('K9:M9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('K10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('L10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('M10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('N9:P9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('N10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('O10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('P10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('Q9:S9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('Q10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('R10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('S10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('T9:V9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('T10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('U10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('V10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		/*--------------------------------------------------LARGURA DAS COLUNAS--------------------------------------------------*/
		$objPHPExcel->getActiveSheet()->getStyle('W9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		/*---------------------------------------------------BORDER DAS CELULAS---------------------------------------------------*/
		$styleThinBlackBorderOutline = array(
			'borders' => array(
				'allborders' => array(
					 'style' => PHPExcel_Style_Border::BORDER_THIN,
					 'color' => array('argb' => 'FF000000'),
				),
			),
		);
		$objPHPExcel->getActiveSheet()->getStyle('A9:W9')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('A10:W10')->applyFromArray($styleThinBlackBorderOutline);
		/*--------------------------------------------------LARGURA DAS COLUNAS--------------------------------------------------*/
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(TRUE);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(15);
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
		$objConditional2->getStyle()->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE); 
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
		$objConditional4->getStyle()->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE); 
		$objConditional4->getStyle()->getFont()->setBold(true);
		/*======================================================================================================*/
		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'REPÚBLICA DE ANGOLA');
		$objPHPExcel->getActiveSheet()->setCellValue('A2', 'MISNISTERIO DA EDUCAÇÃO');
		$objPHPExcel->getActiveSheet()->setCellValue('A3', 'REPARTIÇÃO DE EDUCAÇÃO DO DISTRITO URBANO DO RANGEL');
		$objPHPExcel->getActiveSheet()->setCellValue('A4', 'ESCOLADO ENSINO PRIMÁRIO N.º 1188 (EX. 5028)');
		/*-------------------------------------------------------------------------*/
		$objPHPExcel->getActiveSheet()->setCellValue('A9', 'Nº');
		$objPHPExcel->getActiveSheet()->setCellValue('B9', 'Nº DE PROCECSSO');
		$objPHPExcel->getActiveSheet()->setCellValue('C9', 'NOME COMPLETO');
		$objPHPExcel->getActiveSheet()->setCellValue('D9', 'GÉNERO');
		/*-------------------------------------------------------------------------*/
		$objPHPExcel->getActiveSheet()->setCellValue('E9', 'L. PORTUGUESA');
		$objPHPExcel->getActiveSheet()->setCellValue('E10', 'CAP');
		$objPHPExcel->getActiveSheet()->setCellValue('F10', 'CPE');
		$objPHPExcel->getActiveSheet()->setCellValue('G10', 'CF');
		/*-------------------------------------------------------------------------*/
		$objPHPExcel->getActiveSheet()->setCellValue('H9', 'MATEMATICA');
		$objPHPExcel->getActiveSheet()->setCellValue('H10', 'CAP');
		$objPHPExcel->getActiveSheet()->setCellValue('I10', 'CPE');
		$objPHPExcel->getActiveSheet()->setCellValue('J10', 'CF');
		/*-------------------------------------------------------------------------*/
		$objPHPExcel->getActiveSheet()->setCellValue('K9', 'EST. DO MEIO');
		$objPHPExcel->getActiveSheet()->setCellValue('K10', 'CAP');
		$objPHPExcel->getActiveSheet()->setCellValue('L10', 'CPE');
		$objPHPExcel->getActiveSheet()->setCellValue('M10', 'CF');
		/*-------------------------------------------------------------------------*/
		$objPHPExcel->getActiveSheet()->setCellValue('N9', 'ED. MUSICAL');
		$objPHPExcel->getActiveSheet()->setCellValue('N10', 'CAP');
		$objPHPExcel->getActiveSheet()->setCellValue('O10', 'CPE');
		$objPHPExcel->getActiveSheet()->setCellValue('P10', 'CF');
		/*-------------------------------------------------------------------------*/
		$objPHPExcel->getActiveSheet()->setCellValue('Q9', 'ED. FISICA');
		$objPHPExcel->getActiveSheet()->setCellValue('Q10', 'CAP');
		$objPHPExcel->getActiveSheet()->setCellValue('R10', 'CPE');
		$objPHPExcel->getActiveSheet()->setCellValue('S10', 'CF');
		/*-------------------------------------------------------------------------*/
		$objPHPExcel->getActiveSheet()->setCellValue('T9', 'E. M. P.');
		$objPHPExcel->getActiveSheet()->setCellValue('T10', 'CAP');
		$objPHPExcel->getActiveSheet()->setCellValue('U10', 'CPE');
		$objPHPExcel->getActiveSheet()->setCellValue('V10', 'CF');
		/*-------------------------------------------------------------------------*/
		$objPHPExcel->getActiveSheet()->setCellValue('W9', 'OBSERVAÇÃO');
		/*-------------------------------------------------------------------------*/
		$objPHPExcel->getActiveSheet()->setCellValue('C7', 'Ano Lectivo: ' .$dados['dados_turma']->ano_let);
		$objPHPExcel->getActiveSheet()->setCellValue('D7', 'Período: ' 	   .$dados['dados_turma']->nome_periodo);
		$objPHPExcel->getActiveSheet()->setCellValue('G7', 'Classe: '  	   .$dados['dados_turma']->nome_classe);
		$objPHPExcel->getActiveSheet()->setCellValue('M7', 'Turma: ' 	   .$dados['dados_turma']->nome_turma);
		$objPHPExcel->getActiveSheet()->setCellValue('R7', 'Sala: '    	   .$dados['dados_turma']->numero_sala);
		/*-------------------------------------------------------------------------*/
		$row = 11;
		$i = 1;
		foreach($dados['alunos'] as $aluno){
			/*--------------------------------------------------------------------------------*/
			$objPHPExcel->getActiveSheet()->getStyle('A'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('B'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('D'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			/*--------------------------------------------------------------------------------*/
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $i);
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$row, $aluno->num_processo);
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$row, $aluno->nome);
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$row, $aluno->genero_aluno);
			/*------------------------------------------BORDER DAS CELULAS------------------------------------------*/
			$styleThinBlackBorderOutline = array(
				'borders' => array(
					'allborders' => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN,
						'color' => array('argb' => 'FF000000'),
					),
				),
			);
			$objPHPExcel->getActiveSheet()->getStyle('A'.$row.':W'.$row)->applyFromArray($styleThinBlackBorderOutline);
			/*-------------------------------------------------------------------------------------------------------*/
			$i++;
			$row++;
		}       
		$row = 11;
		$i = 1;
		foreach($dados['l_portuguesa'] as $l_p){
			/*----------------------------------------------------------*/
			$objPHPExcel->getActiveSheet()->getStyle('E'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('F'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('G'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			/*----------------------------------------------------------*/
			$cap = (($l_p->ct_1 + $l_p->ct_2 + $l_p->ct_3)/3);
			$cf = ((0.4*$cap)+(0.6*$l_p->ce));
			/*----------------------------------------------------------*/
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$row, number_format($cap));
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$row, number_format($l_p->ce));
			$objPHPExcel->getActiveSheet()->setCellValue('G'.$row, number_format($cf));
			$i++;
			$row++;
		}
		$row = 11;
		$i = 1;
		foreach($dados['matematica'] as $mat){
			/*----------------------------------------------------------*/
			$objPHPExcel->getActiveSheet()->getStyle('H'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('I'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('J'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			/*----------------------------------------------------------*/
			$cap = (($mat->ct_1 + $mat->ct_2 + $mat->ct_3)/3);
			$cf = ((0.4*$cap)+(0.6*$mat->ce));
			/*----------------------------------------------------------*/
			$objPHPExcel->getActiveSheet()->setCellValue('H'.$row, number_format($cap));
			$objPHPExcel->getActiveSheet()->setCellValue('I'.$row, number_format($mat->ce));
			$objPHPExcel->getActiveSheet()->setCellValue('J'.$row, number_format($cf));
			$i++;
			$row++;
		}
		$row = 11;
		$i = 1;
		foreach($dados['estudo_meio'] as $est_meio){
			/*----------------------------------------------------------*/
			$objPHPExcel->getActiveSheet()->getStyle('K'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('L'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('M'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			/*----------------------------------------------------------*/
			$cap = (($est_meio->ct_1 + $est_meio->ct_2 + $est_meio->ct_3)/3);
			$cf = ((0.4*$cap)+(0.6*$est_meio->ce));
			/*----------------------------------------------------------*/
			$objPHPExcel->getActiveSheet()->setCellValue('K'.$row, number_format($cap));
			$objPHPExcel->getActiveSheet()->setCellValue('L'.$row, number_format($est_meio->ce));
			$objPHPExcel->getActiveSheet()->setCellValue('M'.$row, number_format($cf));
			$i++;
			$row++;
		}
		$row = 11;
		$i = 1;
		foreach($dados['ed_musical'] as $ed_music){
			/*----------------------------------------------------------*/
			$objPHPExcel->getActiveSheet()->getStyle('N'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('O'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('P'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			/*----------------------------------------------------------*/
			$cap = (($ed_music->ct_1 + $ed_music->ct_2 + $ed_music->ct_3)/3);
			$cf = ((0.4*$cap)+(0.6*$ed_music->ce));
			/*----------------------------------------------------------*/
			$objPHPExcel->getActiveSheet()->setCellValue('N'.$row, number_format($cap));
			$objPHPExcel->getActiveSheet()->setCellValue('O'.$row, number_format($ed_music->ce));
			$objPHPExcel->getActiveSheet()->setCellValue('P'.$row, number_format($cf));
			$i++;
			$row++;
		}
		$row = 11;
		$i = 1;
		foreach($dados['ed_fisica'] as $ed_fisc){
			/*----------------------------------------------------------*/
			$objPHPExcel->getActiveSheet()->getStyle('Q'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('R'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('S'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			/*----------------------------------------------------------*/
			$cap = (($ed_fisc->ct_1 + $ed_fisc->ct_2 + $ed_fisc->ct_3)/3);
			$cf = ((0.4*$cap)+(0.6*$ed_fisc->ce));
			/*----------------------------------------------------------*/
			$objPHPExcel->getActiveSheet()->setCellValue('Q'.$row, number_format($cap));
			$objPHPExcel->getActiveSheet()->setCellValue('R'.$row, number_format($ed_fisc->ce));
			$objPHPExcel->getActiveSheet()->setCellValue('S'.$row, number_format($cf));
			$i++;
			$row++;
		}
		$row = 11;
		$i = 1;
		foreach($dados['ed_plastica'] as $ed_plstic){
			/*--------------------------------------------------------------------------------------------------------------------------------*/
			$cap = (($ed_plstic->ct_1 + $ed_plstic->ct_2 + $ed_plstic->ct_3)/3);
			$cf = ((0.4*$cap)+(0.6*$ed_plstic->ce));
			/*--------------------------------------------------------------------------------------------------------------------------------*/
			$objPHPExcel->getActiveSheet()->setCellValue('T'.$row, number_format($cap));
			$objPHPExcel->getActiveSheet()->setCellValue('U'.$row, number_format($ed_plstic->ce));
			$objPHPExcel->getActiveSheet()->setCellValue('V'.$row, number_format($cf));
			/*										CONDICAO NOTAS
			----------------------------------------------------------------------------------------------------------------------------------*/
			$conditionalStyles = $objPHPExcel->getActiveSheet()->getStyle('E'.$row.':V'.$row)->getConditionalStyles();
			array_push($conditionalStyles, $objConditional1);
			array_push($conditionalStyles, $objConditional2);
			$objPHPExcel->getActiveSheet()->getStyle('E'.$row.':V'.$row)->setConditionalStyles($conditionalStyles);
			/*										CONDICAO RESULTADO
			----------------------------------------------------------------------------------------------------------------------------------*/
			$conditionalStyles1 = $objPHPExcel->getActiveSheet()->getStyle('W'.$row)->getConditionalStyles();
			array_push($conditionalStyles1, $objConditional3);
			array_push($conditionalStyles1, $objConditional4);
			$objPHPExcel->getActiveSheet()->getStyle('W'.$row)->setConditionalStyles($conditionalStyles1);
			/*--------------------------------------------------------------------------------------------------------------------------------*/
			$objPHPExcel->getActiveSheet()->getStyle('T'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('U'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('V'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('W'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			/*-------------------------------------------- FORMULA ---------------------------------------------------------------------------*/	
			$objPHPExcel->getActiveSheet()->setCellValue('W'.$row, 
			'=IF(AND(G'.$row.'>=5, J'.$row.'>=5, M'.$row.'>=5, P'.$row.'>=5, S'.$row.'>=5, V'.$row.'>=5), "Aprovado", IF(AND(G'.$row.'>=5, J'.$row.'>=5, M'.$row.'<5, P'.$row.'<5, S'.$row.'>=5, V'.$row.'>=5), "Aprovado", IF(AND(G'.$row.'>=5, J'.$row.'>=5, M'.$row.'<5, P'.$row.'>=5, S'.$row.'<5, V'.$row.'>=5), "Aprovado", IF(AND(G'.$row.'>=5, J'.$row.'>=5, M'.$row.'<5, P'.$row.'>=5, S'.$row.'>=5, V'.$row.'<5), "Aprovado", IF(AND(G'.$row.'>=5, J'.$row.'>=5, M'.$row.'>=5, P'.$row.'<5, S'.$row.'<5, V'.$row.'>=5), "Aprovado", IF(AND(G'.$row.'>=5, J'.$row.'>=5, M'.$row.'>=5, P'.$row.'<5, S'.$row.'>=5, V'.$row.'<5), "Aprovado", IF(AND(G'.$row.'>=5, J'.$row.'>=5, M'.$row.'>=5, P'.$row.'>=5, S'.$row.'<5, V'.$row.'<5), "Aprovado", IF(AND(G'.$row.'>=5, J'.$row.'>=5, M'.$row.'<5, P'.$row.'>=5, S'.$row.'>=5, V'.$row.'>=5), "Aprovado", IF(AND(G'.$row.'>=5, J'.$row.'>=5, M'.$row.'>=5, P'.$row.'<5, S'.$row.'>=5, V'.$row.'>=5), "Aprovado", IF(AND(G'.$row.'>=5, J'.$row.'>=5, M'.$row.'>=5, P'.$row.'>=5, S'.$row.'<5, V'.$row.'>=5), "Aprovado", IF(AND(G'.$row.'>=5, J'.$row.'>=5, M'.$row.'>=5, P'.$row.'>=5, S'.$row.'>=5, V'.$row.'<5), "Aprovado", "Reprovado" )))))))))))');	
			$i++;
			$row++;
		}
		/*========================================================END DADOS========================================================*/
		/*--------------------------------------------------ORIENTACAO E TAMANHO DA FOLHA---------------------------------------*/
		$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_worksheet_PageSetup::PAPERSIZE_A3);
		/*----------------------------------------------------------------------------------------------------------------------*/
		$filename = "PAUTA-GERA-TURMA-".$dados['dados_turma']->nome_turma.'-'.$dados['dados_turma']->ano_let.'-'.date("d-m-Y-H-i-s").'.xlsx';
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		/*----------------------------------------------------------------------------------------------------------------------*/
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
		$objWriter->save('php://output');
		exit;
		/*================================================================================================================================*/
	}
}