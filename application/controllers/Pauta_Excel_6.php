<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pauta_Excel_6 extends CI_Controller 
{
	public function exportar_pauta_6($anolectivo, $turma)
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
		/* ------------------------------------------------------------------------------------------------------------- */
		$this->db->from('notas_disciplina');														// de notas disciplina
		$this->db->where("anolectivo_id", $anolectivo);												// filtro - anolectivo
		$this->db->where("turma_id", $turma);														// filtro - turma
		$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');				// join turma e matricula
		$this->db->group_by('notas_disciplina.aluno_id');											// agrupamento
		$this->db->order_by("nome", "asc");  												 		// Ordenar a travez do nome
		$dados['alunos'] = $this->db->get()->result();												// retorna várias linhas
		/*--------------------------------------------------------------------------------------------------------------------------------*/
		$this->db->select('*');																		// seleciona tudo
		$this->db->from('notas_disciplina');														// de notas disciplina
		$this->db->where("anolectivo_id", $anolectivo);												// filtro - anolectivo
		$this->db->where("turma_id", $turma);														// filtro - turma
		$this->db->where("disciplina_id", '73');													// filtro - turma
		$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');				// join turma e matricula
		$this->db->group_by('notas_disciplina.aluno_id');											// agrupamento
		$this->db->order_by("nome", "asc");  												 		// Ordenar a travez do nome
		$dados['l_portuguesa'] = $this->db->get()->result();										// retorna várias linhas
		/*------------------------------------------------------------------------------------------------------------------------------*/
		$this->db->select('*');																		// seleciona tudo
		$this->db->from('notas_disciplina');														// de notas disciplina
		$this->db->where("anolectivo_id", $anolectivo);												// filtro - anolectivo
		$this->db->where("turma_id", $turma);														// filtro - turma
		$this->db->where("disciplina_id", '74');													// filtro - turma
		$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');				// join turma e matricula
		$this->db->group_by('notas_disciplina.aluno_id');											// agrupamento
		$this->db->order_by("nome", "asc");  												 		// Ordenar a travez do nome
		$dados['matematica'] = $this->db->get()->result();											// retorna várias linhas
		/*------------------------------------------------------------------------------------------------------------------------------*/
		$this->db->select('*');																		// seleciona tudo
		$this->db->from('notas_disciplina');														// de notas disciplina
		$this->db->where("anolectivo_id", $anolectivo);												// filtro - anolectivo
		$this->db->where("turma_id", $turma);														// filtro - turma
		$this->db->where("disciplina_id", '75');													// filtro - turma
		$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');				// join turma e matricula
		$this->db->group_by('notas_disciplina.aluno_id');											// agrupamento
		$this->db->order_by("nome", "asc");  												 		// Ordenar a travez do nome
		$dados['c_natureza'] = $this->db->get()->result();											// retorna várias linhas
		/*------------------------------------------------------------------------------------------------------------------------------*/
		$this->db->select('*');																		// seleciona tudo
		$this->db->from('notas_disciplina');														// de notas disciplina
		$this->db->where("anolectivo_id", $anolectivo);												// filtro - anolectivo
		$this->db->where("turma_id", $turma);														// filtro - turma
		$this->db->where("disciplina_id", '76');													// filtro - turma
		$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');				// join turma e matricula
		$this->db->group_by('notas_disciplina.aluno_id');											// agrupamento
		$this->db->order_by("nome", "asc");  												 		// Ordenar a travez do nome
		$dados['geografia'] = $this->db->get()->result();											// retorna várias linhas
		/*------------------------------------------------------------------------------------------------------------------------------*/
		$this->db->select('*');																		// seleciona tudo
		$this->db->from('notas_disciplina');														// de notas disciplina
		$this->db->where("anolectivo_id", $anolectivo);												// filtro - anolectivo
		$this->db->where("turma_id", $turma);														// filtro - turma
		$this->db->where("disciplina_id", '77');													// filtro - turma
		$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');				// join turma e matricula
		$this->db->group_by('notas_disciplina.aluno_id');											// agrupamento
		$this->db->order_by("nome", "asc");  												 		// Ordenar a travez do nome
		$dados['historia'] = $this->db->get()->result();											// retorna várias linhas
		/*------------------------------------------------------------------------------------------------------------------------------*/
		$this->db->select('*');																		// seleciona tudo
		$this->db->from('notas_disciplina');														// de notas disciplina
		$this->db->where("anolectivo_id", $anolectivo);												// filtro - anolectivo
		$this->db->where("turma_id", $turma);														// filtro - turma
		$this->db->where("disciplina_id", '78');													// filtro - turma
		$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');				// join turma e matricula
		$this->db->group_by('notas_disciplina.aluno_id');											// agrupamento
		$this->db->order_by("nome", "asc");  												 		// Ordenar a travez do nome
		$dados['e_m_p'] = $this->db->get()->result();												// retorna várias linhas
		/*------------------------------------------------------------------------------------------------------------------------------*/
		$this->db->select('*');																		// seleciona tudo
		$this->db->from('notas_disciplina');														// de notas disciplina
		$this->db->where("anolectivo_id", $anolectivo);												// filtro - anolectivo
		$this->db->where("turma_id", $turma);														// filtro - turma
		$this->db->where("disciplina_id", '79');													// filtro - turma
		$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');				// join turma e matricula
		$this->db->group_by('notas_disciplina.aluno_id');											// agrupamento
		$this->db->order_by("nome", "asc");  												 		// Ordenar a travez do nome
		$dados['e_m_c'] = $this->db->get()->result();												// retorna várias linhas
		/*------------------------------------------------------------------------------------------------------------------------------*/
		$this->db->select('*');																		// seleciona tudo
		$this->db->from('notas_disciplina');														// de notas disciplina
		$this->db->where("anolectivo_id", $anolectivo);												// filtro - anolectivo
		$this->db->where("turma_id", $turma);														// filtro - turma
		$this->db->where("disciplina_id", '80');													// filtro - turma
		$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');				// join turma e matricula
		$this->db->group_by('notas_disciplina.aluno_id');											// agrupamento
		$this->db->order_by("nome", "asc");  												 		// Ordenar a travez do nome
		$dados['ed_fisica'] = $this->db->get()->result();											// retorna várias linhas
		/*------------------------------------------------------------------------------------------------------------------------------*/
		$this->db->select('*');																		// seleciona tudo
		$this->db->from('notas_disciplina');														// de notas disciplina
		$this->db->where("anolectivo_id", $anolectivo);												// filtro - anolectivo
		$this->db->where("turma_id", $turma);														// filtro - turma
		$this->db->where("disciplina_id", '81');													// filtro - turma
		$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');				// join turma e matricula
		$this->db->group_by('notas_disciplina.aluno_id');											// agrupamento
		$this->db->order_by("nome", "asc");  												 		// Ordenar a travez do nome
		$dados['ed_musical'] = $this->db->get()->result();		
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
		$objPHPExcel->getActiveSheet()->mergeCells('AO9:AO10');
		/*					MESCLAGEM DE CELULAS - HORIZONTAL
		---------------------------------------------------------------------------*/
		$objPHPExcel->getActiveSheet()->mergeCells('A1:AO1');
		$objPHPExcel->getActiveSheet()->mergeCells('A2:AO2');
		$objPHPExcel->getActiveSheet()->mergeCells('A3:AO3');
		$objPHPExcel->getActiveSheet()->mergeCells('A4:AO4');
		$objPHPExcel->getActiveSheet()->mergeCells('E9:H9');
		$objPHPExcel->getActiveSheet()->mergeCells('I9:L9');
		$objPHPExcel->getActiveSheet()->mergeCells('M9:P9');
		$objPHPExcel->getActiveSheet()->mergeCells('Q9:T9');
		$objPHPExcel->getActiveSheet()->mergeCells('U9:X9');
		$objPHPExcel->getActiveSheet()->mergeCells('Y9:AB9');
		$objPHPExcel->getActiveSheet()->mergeCells('AC9:AF9');
		$objPHPExcel->getActiveSheet()->mergeCells('AG9:AJ9');
		$objPHPExcel->getActiveSheet()->mergeCells('AK9:AN9');
		/*--------------------------------------------------ALINHAMENTO VERTICAL--------------------------------------------------*/
		$objPHPExcel->getActiveSheet()->getStyle('A9')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('B9')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('C9')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('D9')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('AO9')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
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
		/*------------------------------------------------------------------------------------------------------------------------*/ 
		$objPHPExcel->getActiveSheet()->getStyle('E9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('E10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('F10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('G10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('H10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		/*------------------------------------------------------------------------------------------------------------------------*/ 
		$objPHPExcel->getActiveSheet()->getStyle('I9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('I10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('J10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('K10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('L10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		/*------------------------------------------------------------------------------------------------------------------------*/ 
		$objPHPExcel->getActiveSheet()->getStyle('M9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('M10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('N10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('O10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('P10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		/*------------------------------------------------------------------------------------------------------------------------*/ 
		$objPHPExcel->getActiveSheet()->getStyle('Q9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('Q10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('R10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('S10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('T10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		/*------------------------------------------------------------------------------------------------------------------------*/ 
		$objPHPExcel->getActiveSheet()->getStyle('U9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('U10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('V10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('W10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('X10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		/*------------------------------------------------------------------------------------------------------------------------*/ 
		$objPHPExcel->getActiveSheet()->getStyle('Y9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('Y10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('Z10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('AA10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('AB10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		/*------------------------------------------------------------------------------------------------------------------------*/ 
		$objPHPExcel->getActiveSheet()->getStyle('AC9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('AC10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('AD10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('AE10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('AF10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		/*------------------------------------------------------------------------------------------------------------------------*/ 
		$objPHPExcel->getActiveSheet()->getStyle('AG9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('AG10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('AH10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('AI10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('AJ10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		/*------------------------------------------------------------------------------------------------------------------------*/ 
		$objPHPExcel->getActiveSheet()->getStyle('AK9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('AK10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('AL10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('AM10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('AN10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		/*------------------------------------------------------------------------------------------------------------------------*/ 
		$objPHPExcel->getActiveSheet()->getStyle('AO9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		/*---------------------------------------------------BORDER DAS CELULAS---------------------------------------------------*/
		$styleThinBlackBorderOutline = array(
			'borders' => array(
				'allborders' => array(
					 'style' => PHPExcel_Style_Border::BORDER_THIN,
					 'color' => array('argb' => 'FF000000'),
				),
			),
		);
		$objPHPExcel->getActiveSheet()->getStyle('A9:AO9')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('A10:AO10')->applyFromArray($styleThinBlackBorderOutline);
		/*--------------------------------------------------LARGURA DAS COLUNAS--------------------------------------------------*/
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(3);
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(12);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(TRUE);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(12);
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
		$objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AD')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AE')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AF')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AG')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AH')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AI')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AJ')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AK')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AL')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AM')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AN')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AO')->setWidth(15);
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
		/*========================================== CONDIÇAO 3 ==========================================*/
		$objConditional5 = new PHPExcel_Style_Conditional();
		$objConditional5->setConditionType(PHPExcel_Style_Conditional::CONDITION_CONTAINSTEXT);
		$objConditional5->setOperatorType(PHPExcel_Style_Conditional::OPERATOR_CONTAINSTEXT); /* CONDICAO */
		$objConditional5->setText('Recurso');
		$objConditional5->getStyle()->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK); 
		$objConditional5->getStyle()->getFont()->setBold(true);
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
		$objPHPExcel->getActiveSheet()->setCellValue('H10', 'NER');
		/*-------------------------------------------------------------------------*/
		$objPHPExcel->getActiveSheet()->setCellValue('I9', 'MATEMÁTICA');
		$objPHPExcel->getActiveSheet()->setCellValue('I10', 'CAP');
		$objPHPExcel->getActiveSheet()->setCellValue('J10', 'CPE');
		$objPHPExcel->getActiveSheet()->setCellValue('K10', 'CF');
		$objPHPExcel->getActiveSheet()->setCellValue('L10', 'NER');
		/*-------------------------------------------------------------------------*/
		$objPHPExcel->getActiveSheet()->setCellValue('M9', 'C. NATUREZA');
		$objPHPExcel->getActiveSheet()->setCellValue('M10', 'CAP');
		$objPHPExcel->getActiveSheet()->setCellValue('N10', 'CPE');
		$objPHPExcel->getActiveSheet()->setCellValue('O10', 'CF');
		$objPHPExcel->getActiveSheet()->setCellValue('P10', 'NER');
		/*-------------------------------------------------------------------------*/
		$objPHPExcel->getActiveSheet()->setCellValue('Q9', 'GEOGRAFIA');
		$objPHPExcel->getActiveSheet()->setCellValue('Q10', 'CAP');
		$objPHPExcel->getActiveSheet()->setCellValue('R10', 'CPE');
		$objPHPExcel->getActiveSheet()->setCellValue('S10', 'CF');
		$objPHPExcel->getActiveSheet()->setCellValue('T10', 'NER');
		/*-------------------------------------------------------------------------*/
		$objPHPExcel->getActiveSheet()->setCellValue('U9', 'HISTÓRIA');
		$objPHPExcel->getActiveSheet()->setCellValue('U10', 'CAP');
		$objPHPExcel->getActiveSheet()->setCellValue('V10', 'CPE');
		$objPHPExcel->getActiveSheet()->setCellValue('W10', 'CF');
		$objPHPExcel->getActiveSheet()->setCellValue('X10', 'NER');
		/*-------------------------------------------------------------------------*/
		$objPHPExcel->getActiveSheet()->setCellValue('Y9', 'E. M. P.');
		$objPHPExcel->getActiveSheet()->setCellValue('Y10', 'CAP');
		$objPHPExcel->getActiveSheet()->setCellValue('Z10', 'CPE');
		$objPHPExcel->getActiveSheet()->setCellValue('AA10', 'CF');
		$objPHPExcel->getActiveSheet()->setCellValue('AB10', 'NER');
		/*-------------------------------------------------------------------------*/
		$objPHPExcel->getActiveSheet()->setCellValue('AC9', 'E. M. C.');
		$objPHPExcel->getActiveSheet()->setCellValue('AC10', 'CAP');
		$objPHPExcel->getActiveSheet()->setCellValue('AD10', 'CPE');
		$objPHPExcel->getActiveSheet()->setCellValue('AE10', 'CF');
		$objPHPExcel->getActiveSheet()->setCellValue('AF10', 'NER');
		/*-------------------------------------------------------------------------*/
		$objPHPExcel->getActiveSheet()->setCellValue('AG9', 'ED. FÍSICA');
		$objPHPExcel->getActiveSheet()->setCellValue('AG10', 'CAP');
		$objPHPExcel->getActiveSheet()->setCellValue('AH10', 'CPE');
		$objPHPExcel->getActiveSheet()->setCellValue('AI10', 'CF');
		$objPHPExcel->getActiveSheet()->setCellValue('AJ10', 'NER');
		/*-------------------------------------------------------------------------*/
		$objPHPExcel->getActiveSheet()->setCellValue('AK9', 'ED. MUSICAL');
		$objPHPExcel->getActiveSheet()->setCellValue('AK10', 'CAP');
		$objPHPExcel->getActiveSheet()->setCellValue('AL10', 'CPE');
		$objPHPExcel->getActiveSheet()->setCellValue('AM10', 'CF');
		$objPHPExcel->getActiveSheet()->setCellValue('AN10', 'NER');
		/*-------------------------------------------------------------------------*/
		$objPHPExcel->getActiveSheet()->setCellValue('AO9', 'OBSERVAÇÃO');
		/*-------------------------------------------------------------------------*/
		$objPHPExcel->getActiveSheet()->setCellValue('D7', 'Ano Lectivo: ' .$dados['dados_turma']->ano_let);
		$objPHPExcel->getActiveSheet()->setCellValue('K7', 'Período: ' 	   .$dados['dados_turma']->nome_periodo);
		$objPHPExcel->getActiveSheet()->setCellValue('S7', 'Classe: '  	   .$dados['dados_turma']->nome_classe);
		$objPHPExcel->getActiveSheet()->setCellValue('AA7', 'Turma: ' 	   .$dados['dados_turma']->nome_turma);
		$objPHPExcel->getActiveSheet()->setCellValue('AH7', 'Sala: '	   .$dados['dados_turma']->numero_sala);		
		/*-------------------------------------------------------------------------------------------------------------------------------*/
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
			$objPHPExcel->getActiveSheet()->getStyle('A'.$row.':AO'.$row)->applyFromArray($styleThinBlackBorderOutline);
			/*-------------------------------------------------------------------------------------------------------*/
			$i++;
			$row++;
		}
		/*-------------------------------------------------------------------------------------------------------------------------------*/
		$row = 11;
		$i = 1;
		foreach($dados['l_portuguesa'] as $l_p){
			/*----------------------------------------------------------*/
			$objPHPExcel->getActiveSheet()->getStyle('E'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('F'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('G'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('H'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			/*----------------------------------------------------------*/
			$cap = (($l_p->ct_1 + $l_p->ct_2 + $l_p->ct_3)/3);
			$cf = ((0.4*$cap)+(0.6*$l_p->ce));
			/*----------------------------------------------------------*/
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$row, number_format($cap));
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$row, number_format($l_p->ce));
			$objPHPExcel->getActiveSheet()->setCellValue('G'.$row, number_format($cf));
			$objPHPExcel->getActiveSheet()->setCellValue('H'.$row, number_format($l_p->ner));
			$i++;
			$row++;
		}
		/*-------------------------------------------------------------------------------------------------------------------------------*/
		$row = 11;
		$i = 1;
		foreach($dados['matematica'] as $mat){
			/*----------------------------------------------------------*/
			$objPHPExcel->getActiveSheet()->getStyle('I'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('J'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('K'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('L'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			/*----------------------------------------------------------*/
			$cap = (($mat->ct_1 + $mat->ct_2 + $mat->ct_3)/3);
			$cf = ((0.4*$cap)+(0.6*$mat->ce));
			/*----------------------------------------------------------*/
			$objPHPExcel->getActiveSheet()->setCellValue('I'.$row, number_format($cap));
			$objPHPExcel->getActiveSheet()->setCellValue('J'.$row, number_format($mat->ce));
			$objPHPExcel->getActiveSheet()->setCellValue('K'.$row, number_format($cf));
			$objPHPExcel->getActiveSheet()->setCellValue('L'.$row, number_format($mat->ner));
			$i++;
			$row++;
		}
		/*-------------------------------------------------------------------------------------------------------------------------------*/
		$row = 11;
		$i = 1;
		foreach($dados['c_natureza'] as $c_nat){
			/*----------------------------------------------------------*/
			$objPHPExcel->getActiveSheet()->getStyle('M'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('N'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('O'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('P'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			/*----------------------------------------------------------*/
			$cap = (($c_nat->ct_1 + $c_nat->ct_2 + $c_nat->ct_3)/3);
			$cf = ((0.4*$cap)+(0.6*$c_nat->ce));
			/*----------------------------------------------------------*/
			$objPHPExcel->getActiveSheet()->setCellValue('M'.$row, number_format($cap));
			$objPHPExcel->getActiveSheet()->setCellValue('N'.$row, number_format($c_nat->ce));
			$objPHPExcel->getActiveSheet()->setCellValue('O'.$row, number_format($cf));
			$objPHPExcel->getActiveSheet()->setCellValue('P'.$row, number_format($c_nat->ner));
			$i++;
			$row++;
		}
		/*-------------------------------------------------------------------------------------------------------------------------------*/
		$row = 11;
		$i = 1;
		foreach($dados['geografia'] as $geo){
			/*----------------------------------------------------------*/
			$objPHPExcel->getActiveSheet()->getStyle('Q'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('R'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('S'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('T'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			/*----------------------------------------------------------*/
			$cap = (($geo->ct_1 + $geo->ct_2 + $geo->ct_3)/3);
			$cf = ((0.4*$cap)+(0.6*$geo->ce));
			/*----------------------------------------------------------*/
			$objPHPExcel->getActiveSheet()->setCellValue('Q'.$row, number_format($cap));
			$objPHPExcel->getActiveSheet()->setCellValue('R'.$row, number_format($geo->ce));
			$objPHPExcel->getActiveSheet()->setCellValue('S'.$row, number_format($cf));
			$objPHPExcel->getActiveSheet()->setCellValue('T'.$row, number_format($geo->ner));
			$i++;
			$row++;
		}
		/*-------------------------------------------------------------------------------------------------------------------------------*/
		$row = 11;
		$i = 1;
		foreach($dados['historia'] as $hist){
			/*----------------------------------------------------------*/
			$objPHPExcel->getActiveSheet()->getStyle('U'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('V'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('W'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('X'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			/*----------------------------------------------------------*/
			$cap = (($hist->ct_1 + $hist->ct_2 + $hist->ct_3)/3);
			$cf = ((0.4*$cap)+(0.6*$hist->ce));
			/*----------------------------------------------------------*/
			$objPHPExcel->getActiveSheet()->setCellValue('U'.$row, number_format($cap));
			$objPHPExcel->getActiveSheet()->setCellValue('V'.$row, number_format($hist->ce));
			$objPHPExcel->getActiveSheet()->setCellValue('W'.$row, number_format($cf));
			$objPHPExcel->getActiveSheet()->setCellValue('X'.$row, number_format($hist->ner));
			$i++;
			$row++;
		}
		/*-------------------------------------------------------------------------------------------------------------------------------*/
		$row = 11;
		$i = 1;
		foreach($dados['e_m_p'] as $emp){
			/*----------------------------------------------------------*/
			$objPHPExcel->getActiveSheet()->getStyle('Y'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('Z'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('AA'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('AB'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			/*----------------------------------------------------------*/
			$cap = (($emp->ct_1 + $emp->ct_2 + $emp->ct_3)/3);
			$cf = ((0.4*$cap)+(0.6*$emp->ce));
			/*----------------------------------------------------------*/
			$objPHPExcel->getActiveSheet()->setCellValue('Y'.$row, number_format($cap));
			$objPHPExcel->getActiveSheet()->setCellValue('Z'.$row, number_format($emp->ce));
			$objPHPExcel->getActiveSheet()->setCellValue('AA'.$row, number_format($cf));
			$objPHPExcel->getActiveSheet()->setCellValue('AB'.$row, number_format($emp->ner));
			$i++;
			$row++;
		}
		/*-------------------------------------------------------------------------------------------------------------------------------*/
		$row = 11;
		$i = 1;
		foreach($dados['e_m_c'] as $emc){
			/*----------------------------------------------------------*/
			$objPHPExcel->getActiveSheet()->getStyle('AC'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('AD'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('AE'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('AF'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			/*----------------------------------------------------------*/
			$cap = (($emc->ct_1 + $emc->ct_2 + $emc->ct_3)/3);
			$cf = ((0.4*$cap)+(0.6*$emc->ce));
			/*----------------------------------------------------------*/
			$objPHPExcel->getActiveSheet()->setCellValue('AC'.$row, number_format($cap));
			$objPHPExcel->getActiveSheet()->setCellValue('AD'.$row, number_format($emc->ce));
			$objPHPExcel->getActiveSheet()->setCellValue('AE'.$row, number_format($cf));
			$objPHPExcel->getActiveSheet()->setCellValue('AF'.$row, number_format($emc->ner));
			$i++;
			$row++;
		}
		/*-------------------------------------------------------------------------------------------------------------------------------*/
		$row = 11;
		$i = 1;
		foreach($dados['ed_fisica'] as $ed_fisc){
			/*----------------------------------------------------------*/
			$objPHPExcel->getActiveSheet()->getStyle('AG'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('AH'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('AI'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('AJ'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			/*----------------------------------------------------------*/
			$cap = (($ed_fisc->ct_1 + $ed_fisc->ct_2 + $ed_fisc->ct_3)/3);
			$cf = ((0.4*$cap)+(0.6*$ed_fisc->ce));
			/*----------------------------------------------------------*/
			$objPHPExcel->getActiveSheet()->setCellValue('AG'.$row, number_format($cap));
			$objPHPExcel->getActiveSheet()->setCellValue('AH'.$row, number_format($ed_fisc->ce));
			$objPHPExcel->getActiveSheet()->setCellValue('AI'.$row, number_format($cf));
			$objPHPExcel->getActiveSheet()->setCellValue('AJ'.$row, number_format($ed_fisc->ner));
			$i++;
			$row++;
		}
		/*-------------------------------------------------------------------------------------------------------------------------------*/
		$row = 11;
		$i = 1;
		foreach($dados['ed_musical'] as $ed_music){
			/*----------------------------------------------------------*/
			$objPHPExcel->getActiveSheet()->getStyle('AK'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('AL'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('AM'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('AN'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('AO'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			/*----------------------------------------------------------*/
			$cap = (($ed_fisc->ct_1 + $ed_fisc->ct_2 + $ed_fisc->ct_3)/3);
			$cf = ((0.4*$cap)+(0.6*$ed_fisc->ce));
			/*----------------------------------------------------------*/
			$objPHPExcel->getActiveSheet()->setCellValue('AK'.$row, number_format($cap));
			$objPHPExcel->getActiveSheet()->setCellValue('AL'.$row, number_format($ed_fisc->ce));
			$objPHPExcel->getActiveSheet()->setCellValue('AM'.$row, number_format($cf));
			$objPHPExcel->getActiveSheet()->setCellValue('AN'.$row, number_format($ed_fisc->ner));
			/*										CONDICAO NOTAS
			----------------------------------------------------------------------------------------------------------------------------------*/
			$conditionalStyles = $objPHPExcel->getActiveSheet()->getStyle('E'.$row.':AN'.$row)->getConditionalStyles();
			array_push($conditionalStyles, $objConditional1);
			array_push($conditionalStyles, $objConditional2);
			$objPHPExcel->getActiveSheet()->getStyle('E'.$row.':AN'.$row)->setConditionalStyles($conditionalStyles);
			/*										CONDICAO RESULTADO
			----------------------------------------------------------------------------------------------------------------------------------*/
			$conditionalStyles1 = $objPHPExcel->getActiveSheet()->getStyle('AO'.$row)->getConditionalStyles();
			array_push($conditionalStyles1, $objConditional3);
			array_push($conditionalStyles1, $objConditional4);
			array_push($conditionalStyles1, $objConditional5);
			$objPHPExcel->getActiveSheet()->getStyle('AO'.$row)->setConditionalStyles($conditionalStyles1);
			/*-------------------------------------------- FORMULA ---------------------------------------------------------------------------*/	
			$objPHPExcel->getActiveSheet()->setCellValue('AO'.$row, '=IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'>=5, W'.$row.'>=5, AA'.$row.'>=5, AE'.$row.'>=5, AI'.$row.'>=5, AM'.$row.'>=5 ), "Aprovado",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'<5, S'.$row.'<5, W'.$row.'>=5, AA'.$row.'>=5, AE'.$row.'>=5, AI'.$row.'>=5, AM'.$row.'>=5 ), "Recurso",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'<5, S'.$row.'>=5, W'.$row.'<5, AA'.$row.'>=5, AE'.$row.'>=5, AI'.$row.'>=5, AM'.$row.'>=5 ), "Recurso",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'<5, S'.$row.'>=5, W'.$row.'>=5, AA'.$row.'<5, AE'.$row.'>=5, AI'.$row.'>=5, AM'.$row.'>=5 ), "Recurso",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'<5, S'.$row.'>=5, W'.$row.'>=5, AA'.$row.'>=5, AE'.$row.'<5, AI'.$row.'>=5, AM'.$row.'>=5 ), "Recurso",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'<5, S'.$row.'>=5, W'.$row.'>=5, AA'.$row.'>=5, AE'.$row.'>=5, AI'.$row.'<5, AM'.$row.'>=5 ), "Recurso",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'<5, S'.$row.'>=5, W'.$row.'>=5, AA'.$row.'>=5, AE'.$row.'>=5, AI'.$row.'>=5, AM'.$row.'<5 ), "Recurso",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'<5, W'.$row.'<5, AA'.$row.'>=5, AE'.$row.'>=5, AI'.$row.'>=5, AM'.$row.'>=5 ), "Recurso",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'<5, W'.$row.'>=5, AA'.$row.'<5, AE'.$row.'>=5, AI'.$row.'>=5, AM'.$row.'>=5 ), "Recurso",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'<5, W'.$row.'>=5, AA'.$row.'>=5, AE'.$row.'<5, AI'.$row.'>=5, AM'.$row.'>=5 ), "Recurso",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'<5, W'.$row.'>=5, AA'.$row.'>=5, AE'.$row.'>=5, AI'.$row.'<5, AM'.$row.'>=5 ), "Recurso",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'<5, W'.$row.'>=5, AA'.$row.'>=5, AE'.$row.'>=5, AI'.$row.'>=5, AM'.$row.'<5 ), "Recurso",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'>=5, W'.$row.'<5, AA'.$row.'<5, AE'.$row.'>=5, AI'.$row.'>=5, AM'.$row.'>=5 ), "Recurso",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'>=5, W'.$row.'<5, AA'.$row.'>=5, AE'.$row.'<5, AI'.$row.'>=5, AM'.$row.'>=5 ), "Recurso",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'>=5, W'.$row.'<5, AA'.$row.'>=5, AE'.$row.'>=5, AI'.$row.'<5, AM'.$row.'>=5 ), "Recurso",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'>=5, W'.$row.'<5, AA'.$row.'>=5, AE'.$row.'>=5, AI'.$row.'>=5, AM'.$row.'<5 ), "Recurso",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'>=5, W'.$row.'>=5, AA'.$row.'<5, AE'.$row.'<5, AI'.$row.'>=5, AM'.$row.'>=5 ), "Recurso",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'>=5, W'.$row.'>=5, AA'.$row.'<5, AE'.$row.'>=5, AI'.$row.'<5, AM'.$row.'>=5 ), "Recurso",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'>=5, W'.$row.'>=5, AA'.$row.'<5, AE'.$row.'>=5, AI'.$row.'>=5, AM'.$row.'<5 ), "Recurso",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'>=5, W'.$row.'>=5, AA'.$row.'>=5, AE'.$row.'<5, AI'.$row.'<5, AM'.$row.'>=5 ), "Recurso",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'>=5, W'.$row.'>=5, AA'.$row.'>=5, AE'.$row.'<5, AI'.$row.'>=5, AM'.$row.'<5 ), "Recurso",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'>=5, W'.$row.'>=5, AA'.$row.'>=5, AE'.$row.'>=5, AI'.$row.'<5, AM'.$row.'<5 ), "Recurso",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'<5, S'.$row.'>=5, W'.$row.'>=5, AA'.$row.'>=5, AE'.$row.'>=5, AI'.$row.'>=5, AM'.$row.'>=5 ), "Recurso",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'<5, W'.$row.'>=5, AA'.$row.'>=5, AE'.$row.'>=5, AI'.$row.'>=5, AM'.$row.'>=5 ), "Recurso",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'>=5, W'.$row.'<5, AA'.$row.'>=5, AE'.$row.'>=5, AI'.$row.'>=5, AM'.$row.'>=5 ), "Recurso",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'>=5, W'.$row.'>=5, AA'.$row.'<5, AE'.$row.'>=5, AI'.$row.'>=5, AM'.$row.'>=5 ), "Recurso",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'>=5, W'.$row.'>=5, AA'.$row.'>=5, AE'.$row.'<5, AI'.$row.'>=5, AM'.$row.'>=5 ), "Recurso",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'>=5, W'.$row.'>=5, AA'.$row.'>=5, AE'.$row.'>=5, AI'.$row.'<5, AM'.$row.'>=5 ), "Recurso",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'>=5, W'.$row.'>=5, AA'.$row.'>=5, AE'.$row.'>=5, AI'.$row.'>=5, AM'.$row.'<5 ), "Recurso","Reprovado")))))))))))))))))))))))))))))');
			/*-----------------------------------------------------------------------------------------------------------------------------------*/
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
	}
}