<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pauta_xls_06 extends CI_Controller 
{
	public function export_xls_06($anolectivo, $turma) {
		$this->db->select('*');													  // select tudo
		$this->db->from('notas_disciplina');								// da tbl matricula
		$this->db->where("anolectivo_id", $anolectivo);							// onde
        $this->db->where("turma_id", $turma);									 // onde
		$this->db->join('aluno', 		'aluno.id_aluno = notas_disciplina.aluno_id');	// join ano lectivo e matricula
		$this->db->join('anolectivo', 	'anolectivo.id_ano = notas_disciplina.anolectivo_id');		// join ano lectivo e matricula
		$this->db->join('turma', 		'turma.id_turma = notas_disciplina.turma_id');	// join turma e matricula
		$this->db->join('classe', 		'classe.id_classe = turma.classe_id');		// Join tbl classe [turma]
		$this->db->join('periodo', 		'periodo.id_periodo = turma.periodo_id');	// join periodo e turma
		$this->db->join('sala', 		'sala.id_sala = turma.sala_id');	// join periodo e turma
		$dados["dados_turma"] = $this->db->get()->row();										    // retorna 1 linha
		/* ------------------------------------------------------------------------------------------------------------- */
		$this->db->from('notas_disciplina');									// de notas disciplina
		$this->db->where("anolectivo_id", $anolectivo);							// filtro - anolectivo
		$this->db->where("turma_id", $turma);									// filtro - turma
		$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');				// join turma e matricula
		$this->db->group_by('notas_disciplina.aluno_id');						// agrupamento
		$this->db->order_by("nome", "asc");  								// Ordenar a travez do nome
		$dados['alunos'] = $this->db->get()->result();							// retorna várias linhas
		/*--------------------------------------------------------------------------------------------------------------------------------*/
		$this->db->select('*');													// seleciona tudo
		$this->db->from('notas_disciplina');									// de notas disciplina
		$this->db->where("anolectivo_id", $anolectivo);							// filtro - anolectivo
		$this->db->where("turma_id", $turma);									// filtro - turma
		$this->db->where("disciplina_id", '73');								// filtro - turma
		$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');				// join turma e matricula
		$this->db->group_by('notas_disciplina.aluno_id');						// agrupamento
		$this->db->order_by("nome", "asc");  								// Ordenar a travez do nome
		$dados['l_portuguesa'] = $this->db->get()->result();					// retorna várias linhas
		/*------------------------------------------------------------------------------------------------------------------------------*/
		$this->db->select('*');													// seleciona tudo
		$this->db->from('notas_disciplina');									// de notas disciplina
		$this->db->where("anolectivo_id", $anolectivo);							// filtro - anolectivo
		$this->db->where("turma_id", $turma);									// filtro - turma
		$this->db->where("disciplina_id", '74');								// filtro - turma
		$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');				// join turma e matricula
		$this->db->group_by('notas_disciplina.aluno_id');						// agrupamento
		$this->db->order_by("nome", "asc");  								// Ordenar a travez do nome
		$dados['matematica'] = $this->db->get()->result();						// retorna várias linhas
		/*------------------------------------------------------------------------------------------------------------------------------*/
		$this->db->select('*');													// seleciona tudo
		$this->db->from('notas_disciplina');									// de notas disciplina
		$this->db->where("anolectivo_id", $anolectivo);							// filtro - anolectivo
		$this->db->where("turma_id", $turma);									// filtro - turma
		$this->db->where("disciplina_id", '75');								// filtro - turma
		$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');				// join turma e matricula
		$this->db->group_by('notas_disciplina.aluno_id');						// agrupamento
		$this->db->order_by("nome", "asc");  								// Ordenar a travez do nome
		$dados['c_natureza'] = $this->db->get()->result();						// retorna várias linhas
		/*------------------------------------------------------------------------------------------------------------------------------*/
		$this->db->select('*');													// seleciona tudo
		$this->db->from('notas_disciplina');									// de notas disciplina
		$this->db->where("anolectivo_id", $anolectivo);							// filtro - anolectivo
		$this->db->where("turma_id", $turma);									// filtro - turma
		$this->db->where("disciplina_id", '76');								// filtro - turma
		$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');				// join turma e matricula
		$this->db->group_by('notas_disciplina.aluno_id');						// agrupamento
		$this->db->order_by("nome", "asc");  								// Ordenar a travez do nome
		$dados['geografia'] = $this->db->get()->result();						// retorna várias linhas
		/*------------------------------------------------------------------------------------------------------------------------------*/
		$this->db->select('*');													// seleciona tudo
		$this->db->from('notas_disciplina');									// de notas disciplina
		$this->db->where("anolectivo_id", $anolectivo);							// filtro - anolectivo
		$this->db->where("turma_id", $turma);									// filtro - turma
		$this->db->where("disciplina_id", '77');								// filtro - turma
		$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');				// join turma e matricula
		$this->db->group_by('notas_disciplina.aluno_id');						// agrupamento
		$this->db->order_by("nome", "asc");  								// Ordenar a travez do nome
		$dados['historia'] = $this->db->get()->result();						// retorna várias linhas
		/*------------------------------------------------------------------------------------------------------------------------------*/
		$this->db->select('*');													// seleciona tudo
		$this->db->from('notas_disciplina');									// de notas disciplina
		$this->db->where("anolectivo_id", $anolectivo);							// filtro - anolectivo
		$this->db->where("turma_id", $turma);									// filtro - turma
		$this->db->where("disciplina_id", '78');								// filtro - turma
		$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');				// join turma e matricula
		$this->db->group_by('notas_disciplina.aluno_id');						// agrupamento
		$this->db->order_by("nome", "asc");  								// Ordenar a travez do nome
		$dados['e_m_p'] = $this->db->get()->result();							// retorna várias linhas
		/*------------------------------------------------------------------------------------------------------------------------------*/
		$this->db->select('*');													// seleciona tudo
		$this->db->from('notas_disciplina');									// de notas disciplina
		$this->db->where("anolectivo_id", $anolectivo);							// filtro - anolectivo
		$this->db->where("turma_id", $turma);									// filtro - turma
		$this->db->where("disciplina_id", '79');								// filtro - turma
		$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');				// join turma e matricula
		$this->db->group_by('notas_disciplina.aluno_id');						// agrupamento
		$this->db->order_by("nome", "asc");  								// Ordenar a travez do nome
		$dados['e_m_c'] = $this->db->get()->result();							// retorna várias linhas
		/*------------------------------------------------------------------------------------------------------------------------------*/
		$this->db->select('*');													// seleciona tudo
		$this->db->from('notas_disciplina');									// de notas disciplina
		$this->db->where("anolectivo_id", $anolectivo);							// filtro - anolectivo
		$this->db->where("turma_id", $turma);									// filtro - turma
		$this->db->where("disciplina_id", '80');								// filtro - turma
		$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');				// join turma e matricula
		$this->db->group_by('notas_disciplina.aluno_id');						// agrupamento
		$this->db->order_by("nome", "asc");  								// Ordenar a travez do nome
		$dados['ed_fisica'] = $this->db->get()->result();						// retorna várias linhas
		/*------------------------------------------------------------------------------------------------------------------------------*/
		$this->db->select('*');													// seleciona tudo
		$this->db->from('notas_disciplina');									// de notas disciplina
		$this->db->where("anolectivo_id", $anolectivo);							// filtro - anolectivo
		$this->db->where("turma_id", $turma);									// filtro - turma
		$this->db->where("disciplina_id", '81');								// filtro - turma
		$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');				// join turma e matricula
		$this->db->group_by('notas_disciplina.aluno_id');						// agrupamento
		$this->db->order_by("nome", "asc");  								// Ordenar a travez do nome
		$dados['ed_musical'] = $this->db->get()->result();		
		/* =========================================================================================================== */
			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();
			/* ----------------------------------------------------------------------------------------------------------- */
			$sheet->setCellValue('A2', 'REPÚBLICA DE ANGOLA');
			$sheet->setCellValue('A3', 'MISNISTERIO DA EDUCAÇÃO');
			$sheet->setCellValue('A4', 'REPARTIÇÃO DE EDUCAÇÃO DO DISTRITO URBANO DO RANGEL');
			$sheet->setCellValue('A5', 'ESCOLA DO ENSINO PRIMÁRIO N.º 1523 (EX. 1188)');
			/* ----------------------------------------------------------------------------------------------------------- */
			$sheet->setCellValue('C8', 'Ano Lectivo: '.$dados['dados_turma']->ano_let);
			$sheet->setCellValue('G8', 'Período: '.$dados['dados_turma']->nome_periodo);
			$sheet->setCellValue('P8', 'Classe: '.$dados['dados_turma']->nome_classe);
			$sheet->setCellValue('X8', 'Turma: '.$dados['dados_turma']->nome_turma);
			$sheet->setCellValue('AG8', 'Sala: '.$dados['dados_turma']->numero_sala);
			/* ----------------------------------------------------------------------------------------------------------- */
			$sheet->setCellValue('A10', 'Nº');
			$sheet->setCellValue('B10', 'Nº DE PROCECSSO');
			$sheet->setCellValue('C10', 'NOME COMPLETO');
			$sheet->setCellValue('D10', 'GÉNERO');
			/* ----------------------------------------------------------------------------------------------------------- */
		/*-------------------------------------------------------------------------*/
		$sheet->setCellValue('E10', 'L. PORTUGUESA');
		$sheet->setCellValue('E11', 'CAP');
		$sheet->setCellValue('F11', 'CPE');
		$sheet->setCellValue('G11', 'CF');
		$sheet->setCellValue('H11', 'NER');
		/*-------------------------------------------------------------------------*/
		$sheet->setCellValue('I10', 'MATEMÁTICA');
		$sheet->setCellValue('I11', 'CAP');
		$sheet->setCellValue('J11', 'CPE');
		$sheet->setCellValue('K11', 'CF');
		$sheet->setCellValue('L11', 'NER');
		/*-------------------------------------------------------------------------*/
		$sheet->setCellValue('M10', 'C. NATUREZA');
		$sheet->setCellValue('M11', 'CAP');
		$sheet->setCellValue('N11', 'CPE');
		$sheet->setCellValue('O11', 'CF');
		$sheet->setCellValue('P11', 'NER');
		/*-------------------------------------------------------------------------*/
		$sheet->setCellValue('Q10', 'GEOGRAFIA');
		$sheet->setCellValue('Q11', 'CAP');
		$sheet->setCellValue('R11', 'CPE');
		$sheet->setCellValue('S11', 'CF');
		$sheet->setCellValue('T11', 'NER');
		/*-------------------------------------------------------------------------*/
		$sheet->setCellValue('U10', 'HISTÓRIA');
		$sheet->setCellValue('U11', 'CAP');
		$sheet->setCellValue('V11', 'CPE');
		$sheet->setCellValue('W11', 'CF');
		$sheet->setCellValue('X11', 'NER');
		/*-------------------------------------------------------------------------*/
		$sheet->setCellValue('Y10', 'E. M. P.');
		$sheet->setCellValue('Y11', 'CAP');
		$sheet->setCellValue('Z11', 'CPE');
		$sheet->setCellValue('AA11', 'CF');
		$sheet->setCellValue('AB11', 'NER');
		/*-------------------------------------------------------------------------*/
		$sheet->setCellValue('AC10', 'E. M. C.');
		$sheet->setCellValue('AC11', 'CAP');
		$sheet->setCellValue('AD11', 'CPE');
		$sheet->setCellValue('AE11', 'CF');
		$sheet->setCellValue('AF11', 'NER');
		/*-------------------------------------------------------------------------*/
		$sheet->setCellValue('AG10', 'ED. FÍSICA');
		$sheet->setCellValue('AG11', 'CAP');
		$sheet->setCellValue('AH11', 'CPE');
		$sheet->setCellValue('AI11', 'CF');
		$sheet->setCellValue('AJ11', 'NER');
		/*-------------------------------------------------------------------------*/
		$sheet->setCellValue('AK10', 'ED. MUSICAL');
		$sheet->setCellValue('AK11', 'CAP');
		$sheet->setCellValue('AL11', 'CPE');
		$sheet->setCellValue('AM11', 'CF');
		$sheet->setCellValue('AN11', 'NER');
		/*-------------------------------------------------------------------------*/
		$sheet->setCellValue('AO10', 'OBS');
		/*-------------------------------------------------------------------------*/
			/* ================ Condicional - Notas ================ */
			$conditional1 = new \PhpOffice\PhpSpreadsheet\Style\Conditional();
			$conditional1->setConditionType(\PhpOffice\PhpSpreadsheet\Style\Conditional::CONDITION_CELLIS);
			$conditional1->setOperatorType(\PhpOffice\PhpSpreadsheet\Style\Conditional::OPERATOR_LESSTHAN);
			$conditional1->addCondition('5');
			$conditional1->getStyle()->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED);
			/* ----------------------------------------------------------------------------------------------------------- */
			$conditional2 = new \PhpOffice\PhpSpreadsheet\Style\Conditional();
			$conditional2->setConditionType(\PhpOffice\PhpSpreadsheet\Style\Conditional::CONDITION_CELLIS);
			$conditional2->setOperatorType(\PhpOffice\PhpSpreadsheet\Style\Conditional::OPERATOR_GREATERTHANOREQUAL);
			$conditional2->addCondition('5');
			$conditional2->getStyle()->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_DARKBLUE);
			/* ================ Condicional - Observação ================ */
			$conditional3 = new \PhpOffice\PhpSpreadsheet\Style\Conditional();
			$conditional3->setConditionType(\PhpOffice\PhpSpreadsheet\Style\Conditional::CONDITION_CONTAINSTEXT);
			$conditional3->setOperatorType(\PhpOffice\PhpSpreadsheet\Style\Conditional::OPERATOR_CONTAINSTEXT);
			$conditional3->setText('Reprovado');
			$conditional3->getStyle()->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED);
			/* ----------------------------------------------------------------------------------------------------------- */
			$conditional4 = new \PhpOffice\PhpSpreadsheet\Style\Conditional();
			$conditional4->setConditionType(\PhpOffice\PhpSpreadsheet\Style\Conditional::CONDITION_CONTAINSTEXT);
			$conditional4->setOperatorType(\PhpOffice\PhpSpreadsheet\Style\Conditional::OPERATOR_CONTAINSTEXT);
			$conditional4->setText('Aprovado');
			$conditional4->getStyle()->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_DARKBLUE);
		/*============================= DADOS DA BASE DE DADOS ===================================*/
			$no = 1;
			$row = 12;			
			foreach($dados['alunos'] as $aluno)
			{
				/* ================ Border da Página  ================ */ 
				$border = [
					'borders' => [
						'allBorders' => [
							'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
							'color' => ['argb' => 'FF000000'],
						],
					],
				];
				$spreadsheet->getActiveSheet()->getStyle('A'.$row.':AO'.$row)->applyFromArray($border);
				/* ================ Alinhamento Horizontal ================ */ 
				$spreadsheet->getActiveSheet()->getStyle('A'.$row.':B'.$row)
				->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
				$spreadsheet->getActiveSheet()->getStyle('E'.$row.':AO'.$row)
				->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
				/* ----------------------------------------------------------------------------------------------------------- */
				$sheet->setCellValue('A'.$row, $no);
				$sheet->setCellValue('B'.$row, $aluno->num_processo);
				$sheet->setCellValue('C'.$row, $aluno->nome);
				$sheet->setCellValue('D'.$row, $aluno->genero_aluno);
				$no++;
				$row++;
			}
			/* ----------------------------------------------------------------------------------------------------------- */
		$row = 12;
		$i = 1;
		foreach($dados['l_portuguesa'] as $l_p)
		{
			$cap = (($l_p->ct_1 + $l_p->ct_2 + $l_p->ct_3)/3);
			$cf = ((0.4*$cap)+(0.6*$l_p->ce));
			/*----------------------------------------------------------*/
			$sheet->setCellValue('E'.$row, number_format($cap));
			$sheet->setCellValue('F'.$row, number_format($l_p->ce));
			$sheet->setCellValue('G'.$row, number_format($cf));
			$sheet->setCellValue('H'.$row, number_format($l_p->ner));
			$i++;
			$row++;
		}
		$row = 12;
		$i = 1;
		foreach($dados['matematica'] as $mat)
		{
			$cap = (($mat->ct_1 + $mat->ct_2 + $mat->ct_3)/3);
			$cf = ((0.4*$cap)+(0.6*$mat->ce));
			/*----------------------------------------------------------*/
			$sheet->setCellValue('I'.$row, number_format($cap));
			$sheet->setCellValue('J'.$row, number_format($mat->ce));
			$sheet->setCellValue('K'.$row, number_format($cf));
			$sheet->setCellValue('L'.$row, number_format($mat->ner));
			$i++;
			$row++;
		}
		$row = 12;
		$i = 1;
		foreach($dados['c_natureza'] as $c_nat){
			$cap = (($c_nat->ct_1 + $c_nat->ct_2 + $c_nat->ct_3)/3);
			$cf = ((0.4*$cap)+(0.6*$c_nat->ce));
			/*----------------------------------------------------------*/
			$sheet->setCellValue('M'.$row, number_format($cap));
			$sheet->setCellValue('N'.$row, number_format($c_nat->ce));
			$sheet->setCellValue('O'.$row, number_format($cf));
			$sheet->setCellValue('P'.$row, number_format($c_nat->ner));
			$i++;
			$row++;
		}
		$row = 12;
		$i = 1;
		foreach($dados['geografia'] as $geo){
			$cap = (($geo->ct_1 + $geo->ct_2 + $geo->ct_3)/3);
			$cf = ((0.4*$cap)+(0.6*$geo->ce));
			/*----------------------------------------------------------*/
			$sheet->setCellValue('Q'.$row, number_format($cap));
			$sheet->setCellValue('R'.$row, number_format($geo->ce));
			$sheet->setCellValue('S'.$row, number_format($cf));
			$sheet->setCellValue('T'.$row, number_format($geo->ner));
			$i++;
			$row++;
		}
		$row = 12;
		$i = 1;
		foreach($dados['historia'] as $hist){
			$cap = (($hist->ct_1 + $hist->ct_2 + $hist->ct_3)/3);
			$cf = ((0.4*$cap)+(0.6*$hist->ce));
			/*----------------------------------------------------------*/
			$sheet->setCellValue('U'.$row, number_format($cap));
			$sheet->setCellValue('V'.$row, number_format($hist->ce));
			$sheet->setCellValue('W'.$row, number_format($cf));
			$sheet->setCellValue('X'.$row, number_format($hist->ner));
			$i++;
			$row++;
		}
		$row = 12;
		$i = 1;
		foreach($dados['e_m_p'] as $emp){
			$cap = (($emp->ct_1 + $emp->ct_2 + $emp->ct_3)/3);
			$cf = ((0.4*$cap)+(0.6*$emp->ce));
			/*----------------------------------------------------------*/
			$sheet->setCellValue('Y'.$row, number_format($cap));
			$sheet->setCellValue('Z'.$row, number_format($emp->ce));
			$sheet->setCellValue('AA'.$row, number_format($cf));
			$sheet->setCellValue('AB'.$row, number_format($emp->ner));
			$i++;
			$row++;
		}
		/*-------------------------------------------------------------------------------------------------------------------------------*/
		$row = 12;
		$i = 1;
		foreach($dados['e_m_c'] as $emc){
			$cap = (($emc->ct_1 + $emc->ct_2 + $emc->ct_3)/3);
			$cf = ((0.4*$cap)+(0.6*$emc->ce));
			/*----------------------------------------------------------*/
			$sheet->setCellValue('AC'.$row, number_format($cap));
			$sheet->setCellValue('AD'.$row, number_format($emc->ce));
			$sheet->setCellValue('AE'.$row, number_format($cf));
			$sheet->setCellValue('AF'.$row, number_format($emc->ner));
			$i++;
			$row++;
		}
		$row = 12;
		$i = 1;
		foreach($dados['ed_fisica'] as $ed_fisc){
			$cap = (($ed_fisc->ct_1 + $ed_fisc->ct_2 + $ed_fisc->ct_3)/3);
			$cf = ((0.4*$cap)+(0.6*$ed_fisc->ce));
			/*----------------------------------------------------------*/
			$sheet->setCellValue('AG'.$row, number_format($cap));
			$sheet->setCellValue('AH'.$row, number_format($ed_fisc->ce));
			$sheet->setCellValue('AI'.$row, number_format($cf));
			$sheet->setCellValue('AJ'.$row, number_format($ed_fisc->ner));
			$i++;
			$row++;
		}
		$row = 12;
		$i = 1;
		foreach($dados['ed_musical'] as $ed_music){
			$cap = (($ed_music->ct_1 + $ed_music->ct_2 + $ed_music->ct_3)/3);
			$cf = ((0.4*$cap)+(0.6*$ed_music->ce));
			/*----------------------------------------------------------*/
			$sheet->setCellValue('AK'.$row, number_format($cap));
			$sheet->setCellValue('AL'.$row, number_format($ed_music->ce));
			$sheet->setCellValue('AM'.$row, number_format($cf));
			$sheet->setCellValue('AN'.$row, number_format($ed_music->ner));
			/*------------------------------------------------------------------------------------------------------------------*/
			$sheet->setCellValue('AO'.$row, '=IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'>=5, W'.$row.'>=5, AA'.$row.'>=5, AE'.$row.'>=5, AI'.$row.'>=5, AM'.$row.'>=5 ), "Aprovado",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'<5, S'.$row.'<5, W'.$row.'>=5, AA'.$row.'>=5, AE'.$row.'>=5, AI'.$row.'>=5, AM'.$row.'>=5 ), "Aprovado",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'<5, S'.$row.'>=5, W'.$row.'<5, AA'.$row.'>=5, AE'.$row.'>=5, AI'.$row.'>=5, AM'.$row.'>=5 ), "Aprovado",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'<5, S'.$row.'>=5, W'.$row.'>=5, AA'.$row.'<5, AE'.$row.'>=5, AI'.$row.'>=5, AM'.$row.'>=5 ), "Aprovado",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'<5, S'.$row.'>=5, W'.$row.'>=5, AA'.$row.'>=5, AE'.$row.'<5, AI'.$row.'>=5, AM'.$row.'>=5 ), "Aprovado",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'<5, S'.$row.'>=5, W'.$row.'>=5, AA'.$row.'>=5, AE'.$row.'>=5, AI'.$row.'<5, AM'.$row.'>=5 ), "Aprovado",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'<5, S'.$row.'>=5, W'.$row.'>=5, AA'.$row.'>=5, AE'.$row.'>=5, AI'.$row.'>=5, AM'.$row.'<5 ), "Aprovado",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'<5, W'.$row.'<5, AA'.$row.'>=5, AE'.$row.'>=5, AI'.$row.'>=5, AM'.$row.'>=5 ), "Aprovado",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'<5, W'.$row.'>=5, AA'.$row.'<5, AE'.$row.'>=5, AI'.$row.'>=5, AM'.$row.'>=5 ), "Aprovado",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'<5, W'.$row.'>=5, AA'.$row.'>=5, AE'.$row.'<5, AI'.$row.'>=5, AM'.$row.'>=5 ), "Aprovado",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'<5, W'.$row.'>=5, AA'.$row.'>=5, AE'.$row.'>=5, AI'.$row.'<5, AM'.$row.'>=5 ), "Aprovado",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'<5, W'.$row.'>=5, AA'.$row.'>=5, AE'.$row.'>=5, AI'.$row.'>=5, AM'.$row.'<5 ), "Aprovado",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'>=5, W'.$row.'<5, AA'.$row.'<5, AE'.$row.'>=5, AI'.$row.'>=5, AM'.$row.'>=5 ), "Aprovado",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'>=5, W'.$row.'<5, AA'.$row.'>=5, AE'.$row.'<5, AI'.$row.'>=5, AM'.$row.'>=5 ), "Aprovado",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'>=5, W'.$row.'<5, AA'.$row.'>=5, AE'.$row.'>=5, AI'.$row.'<5, AM'.$row.'>=5 ), "Aprovado",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'>=5, W'.$row.'<5, AA'.$row.'>=5, AE'.$row.'>=5, AI'.$row.'>=5, AM'.$row.'<5 ), "Aprovado",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'>=5, W'.$row.'>=5, AA'.$row.'<5, AE'.$row.'<5, AI'.$row.'>=5, AM'.$row.'>=5 ), "Aprovado",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'>=5, W'.$row.'>=5, AA'.$row.'<5, AE'.$row.'>=5, AI'.$row.'<5, AM'.$row.'>=5 ), "Aprovado",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'>=5, W'.$row.'>=5, AA'.$row.'<5, AE'.$row.'>=5, AI'.$row.'>=5, AM'.$row.'<5 ), "Aprovado",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'>=5, W'.$row.'>=5, AA'.$row.'>=5, AE'.$row.'<5, AI'.$row.'<5, AM'.$row.'>=5 ), "Aprovado",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'>=5, W'.$row.'>=5, AA'.$row.'>=5, AE'.$row.'<5, AI'.$row.'>=5, AM'.$row.'<5 ), "Aprovado",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'>=5, W'.$row.'>=5, AA'.$row.'>=5, AE'.$row.'>=5, AI'.$row.'<5, AM'.$row.'<5 ), "Aprovado",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'<5, S'.$row.'>=5, W'.$row.'>=5, AA'.$row.'>=5, AE'.$row.'>=5, AI'.$row.'>=5, AM'.$row.'>=5 ), "Aprovado",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'<5, W'.$row.'>=5, AA'.$row.'>=5, AE'.$row.'>=5, AI'.$row.'>=5, AM'.$row.'>=5 ), "Aprovado",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'>=5, W'.$row.'<5, AA'.$row.'>=5, AE'.$row.'>=5, AI'.$row.'>=5, AM'.$row.'>=5 ), "Aprovado",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'>=5, W'.$row.'>=5, AA'.$row.'<5, AE'.$row.'>=5, AI'.$row.'>=5, AM'.$row.'>=5 ), "Aprovado",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'>=5, W'.$row.'>=5, AA'.$row.'>=5, AE'.$row.'<5, AI'.$row.'>=5, AM'.$row.'>=5 ), "Aprovado",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'>=5, W'.$row.'>=5, AA'.$row.'>=5, AE'.$row.'>=5, AI'.$row.'<5, AM'.$row.'>=5 ), "Aprovado",IF(AND(G'.$row.'>=5, K'.$row.'>=5, O'.$row.'>=5, S'.$row.'>=5, W'.$row.'>=5, AA'.$row.'>=5, AE'.$row.'>=5, AI'.$row.'>=5, AM'.$row.'<5 ), "Aprovado","Reprovado")))))))))))))))))))))))))))))');
			/* ================ Condicional - Notas ================ */			
			$conditionalStyles = $spreadsheet->getActiveSheet()->getStyle('E'.$row.':AN'.$row)->getConditionalStyles();
			$conditionalStyles[] = $conditional1;
			$conditionalStyles[] = $conditional2;
			$spreadsheet->getActiveSheet()->getStyle('E'.$row.':AN'.$row)->setConditionalStyles($conditionalStyles);
			/* ================ Condicional - Observação ================ */
			$conditionalStyles_01 = $spreadsheet->getActiveSheet()->getStyle('AO'.$row)->getConditionalStyles();
			$conditionalStyles_01[] = $conditional3;
			$conditionalStyles_01[] = $conditional4;
			$spreadsheet->getActiveSheet()->getStyle('AO'.$row)->setConditionalStyles($conditionalStyles_01);
			/* ----------------------------------------------------------------------------------------------------------- */
			$i++;
			$row++;
		}
		$spreadsheet->getActiveSheet()->mergeCells('A'.$row.':AO'.$row);
		$spreadsheet->getActiveSheet()->getStyle('A'.$row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$sheet->setCellValue('A'.$row, 'Luanda, aos '.strftime('%d de %B de %Y', strtotime(date('d-m-Y'))));
			/* ================ Altura da Linha ================ */
			$spreadsheet->getActiveSheet()->getRowDimension(''.$row)->setRowHeight(30);
			/* ================================ Mesclar Célula - Horizontal ================================ */
			$spreadsheet->getActiveSheet()->mergeCells('A1:AO1');
			$spreadsheet->getActiveSheet()->mergeCells('A2:AO2');
			$spreadsheet->getActiveSheet()->mergeCells('A3:AO3');
			$spreadsheet->getActiveSheet()->mergeCells('A4:AO4');
			$spreadsheet->getActiveSheet()->mergeCells('A5:AO5');
			/* ----------------------------------------------------------------------------------------------------------- */
			$spreadsheet->getActiveSheet()->mergeCells('E10:H10');
			$spreadsheet->getActiveSheet()->mergeCells('I10:L10');
			$spreadsheet->getActiveSheet()->mergeCells('M10:P10');
			$spreadsheet->getActiveSheet()->mergeCells('Q10:T10');
			$spreadsheet->getActiveSheet()->mergeCells('U10:X10');
			$spreadsheet->getActiveSheet()->mergeCells('Y10:AB10');
			$spreadsheet->getActiveSheet()->mergeCells('AC10:AF10');
			$spreadsheet->getActiveSheet()->mergeCells('AG10:AJ10');
			$spreadsheet->getActiveSheet()->mergeCells('AK10:AN10');
			/* ================================ Mesclar Célula - Vertical ================================ */
			$spreadsheet->getActiveSheet()->mergeCells('A10:A11');
			$spreadsheet->getActiveSheet()->mergeCells('B10:B11');
			$spreadsheet->getActiveSheet()->mergeCells('C10:C11');
			$spreadsheet->getActiveSheet()->mergeCells('D10:D11');
			$spreadsheet->getActiveSheet()->mergeCells('AO10:AO11');
			/* ================ Altura da Linha ================ */ 
			$spreadsheet->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
			/* ================ Largura da Coluna ================ */ 
			$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
			$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(15);
			$spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(TRUE);
			$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(15);
			$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(5);
			$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(5);
			$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(5);
			$spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(5);
			$spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(5);
			$spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(5);
			$spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(5);
			$spreadsheet->getActiveSheet()->getColumnDimension('L')->setWidth(5);
			$spreadsheet->getActiveSheet()->getColumnDimension('M')->setWidth(5);
			$spreadsheet->getActiveSheet()->getColumnDimension('N')->setWidth(5);
			$spreadsheet->getActiveSheet()->getColumnDimension('O')->setWidth(5);
			$spreadsheet->getActiveSheet()->getColumnDimension('P')->setWidth(5);
			$spreadsheet->getActiveSheet()->getColumnDimension('Q')->setWidth(5);
			$spreadsheet->getActiveSheet()->getColumnDimension('R')->setWidth(5);
			$spreadsheet->getActiveSheet()->getColumnDimension('S')->setWidth(5);
			$spreadsheet->getActiveSheet()->getColumnDimension('T')->setWidth(5);
			$spreadsheet->getActiveSheet()->getColumnDimension('U')->setWidth(5);
			$spreadsheet->getActiveSheet()->getColumnDimension('V')->setWidth(5);
			$spreadsheet->getActiveSheet()->getColumnDimension('W')->setWidth(5);
			$spreadsheet->getActiveSheet()->getColumnDimension('X')->setWidth(5);
			$spreadsheet->getActiveSheet()->getColumnDimension('Y')->setWidth(5);
			$spreadsheet->getActiveSheet()->getColumnDimension('Z')->setWidth(5);
			$spreadsheet->getActiveSheet()->getColumnDimension('AA')->setWidth(5);
			$spreadsheet->getActiveSheet()->getColumnDimension('AB')->setWidth(5);
			$spreadsheet->getActiveSheet()->getColumnDimension('AC')->setWidth(5);
			$spreadsheet->getActiveSheet()->getColumnDimension('AD')->setWidth(5);
			$spreadsheet->getActiveSheet()->getColumnDimension('AE')->setWidth(5);
			$spreadsheet->getActiveSheet()->getColumnDimension('AF')->setWidth(5);
			$spreadsheet->getActiveSheet()->getColumnDimension('AG')->setWidth(5);
			$spreadsheet->getActiveSheet()->getColumnDimension('AH')->setWidth(5);
			$spreadsheet->getActiveSheet()->getColumnDimension('AI')->setWidth(5);
			$spreadsheet->getActiveSheet()->getColumnDimension('AJ')->setWidth(5);
			$spreadsheet->getActiveSheet()->getColumnDimension('AK')->setWidth(5);
			$spreadsheet->getActiveSheet()->getColumnDimension('AL')->setWidth(5);
			$spreadsheet->getActiveSheet()->getColumnDimension('AM')->setWidth(5);
			$spreadsheet->getActiveSheet()->getColumnDimension('AN')->setWidth(5);
			$spreadsheet->getActiveSheet()->getColumnDimension('AO')->setAutoSize(TRUE);
			/* ================ Alinhamento Vertical ================ */ 
			$spreadsheet->getActiveSheet()->getStyle('A10:AO10')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
			/* ================ Quebra de Linha ================ */ 
			$spreadsheet->getActiveSheet()->getStyle('A10:AO10')->getAlignment()->setWrapText(true);
			/* ================ Ocultar Linha de Grade ================ */ 
			$spreadsheet->getActiveSheet()->setShowGridlines(FALSE);
			/* ================ Configurar Célula (negrito e centralização) ================ */ 
			$styleArray = [
				'font' => [
						'bold' => true,
				],
				'alignment' => [
						'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
				],
		];
		$spreadsheet->getActiveSheet()->getStyle('A1:A5')->applyFromArray($styleArray);
		$spreadsheet->getActiveSheet()->getStyle('A8:AO11')->applyFromArray($styleArray);
		/* ================ Border da Página  ================ */ 
		$border = [
			'borders' => [
				'allBorders' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					'color' => ['argb' => 'FF000000'],
				],
			],
		];
		$spreadsheet->getActiveSheet()->getStyle('A10:AO11')->applyFromArray($border);
		/* ================ Orientação e Tamanho da Página  ================ */ 
		$spreadsheet->getActiveSheet()->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
		$spreadsheet->getActiveSheet()->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A3_EXTRA_PAPER);
		/* ================ Informações do Documento ================ */ 
		$spreadsheet->getProperties()
		->setCreator("Sistema de Gestão Escolar")
		->setLastModifiedBy("Sistema de Gestão Escolar")
		->setTitle("Pauta 6ª Classe")
		->setSubject("Pauta Geral")
		->setDescription("Pauta Geral 6ª Classe.")
		->setCategory("Pauta");
		/* ----------------------------------------------------------------------------------------------------------- */
			$writer = new Xlsx($spreadsheet);
			$filename = "PAUTA-GERA-TURMA-".$dados['dados_turma']->nome_turma.'-'.$dados['dados_turma']->ano_let.'-'.date("d-m-Y-H-i-s");
			//$filename = 'pauta-01';			// variavel com o nome do fixeiro XLS
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
			header('Cache-Control: max-age=0');
			$writer->save('php://output');
    }
}