<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pauta_xls_04 extends CI_Controller 
{
	public function export_xls_04($anolectivo, $turma) {
		$this->db->select('*');													  					// select tudo
		$this->db->from('notas_disciplina');												 		// da tbl matricula
		$this->db->where("anolectivo_id", $anolectivo);												// onde
    $this->db->where("turma_id", $turma);									 					// onde
		$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id');						// join ano lectivo e matricula
		$this->db->join('anolectivo', 'anolectivo.id_ano = notas_disciplina.anolectivo_id');		// join ano lectivo e matricula
		$this->db->join('turma', 'turma.id_turma = notas_disciplina.turma_id');						// join turma e matricula
		$this->db->join('classe',	'classe.id_classe = turma.classe_id');							// Join tbl classe [turma]
		$this->db->join('periodo', 'periodo.id_periodo = turma.periodo_id');						// join periodo e turma
		$this->db->join('sala',	'sala.id_sala = turma.sala_id');						// join periodo e turma
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
		/* =========================================================================================================== */
			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();
			/* ----------------------------------------------------------------------------------------------------------- */
			$sheet->setCellValue('A2', 'REPÚBLICA DE ANGOLA');
			$sheet->setCellValue('A3', 'MISNISTERIO DA EDUCAÇÃO');
			$sheet->setCellValue('A4', 'REPARTIÇÃO DE EDUCAÇÃO DO DISTRITO URBANO DO RANGEL');
			$sheet->setCellValue('A5', 'ESCOLA DO ENSINO PRIMÁRIO N.º 1523 (EX. 1188)');
			/* ----------------------------------------------------------------------------------------------------------- */
			$sheet->setCellValue('C8', 'Ano Lectivo: ' .$dados['dados_turma']->ano_let);
			$sheet->setCellValue('D8', 'Período: ' .$dados['dados_turma']->nome_periodo);
			$sheet->setCellValue('G8', 'Classe: ' .$dados['dados_turma']->nome_classe);
			$sheet->setCellValue('M8', 'Turma: ' .$dados['dados_turma']->nome_turma);
			$sheet->setCellValue('R8', 'Sala: ' .$dados['dados_turma']->numero_sala);
			/* ----------------------------------------------------------------------------------------------------------- */
			$sheet->setCellValue('A10', 'Nº');
			$sheet->setCellValue('B10', 'Nº DE PROCECSSO');
			$sheet->setCellValue('C10', 'NOME COMPLETO');
			$sheet->setCellValue('D10', 'GÉNERO');
			/* ----------------------------------------------------------------------------------------------------------- */
			$sheet->setCellValue('E10', 'L. PORTUGUESA');
			$sheet->setCellValue('E11', 'CAP');
			$sheet->setCellValue('F11', 'CPE');
			$sheet->setCellValue('G11', 'CF');
			/* ----------------------------------------------------------------------------------------------------------- */
			$sheet->setCellValue('H10', 'MATEMÁTICA');
			$sheet->setCellValue('H11', 'CAP');
			$sheet->setCellValue('I11', 'CPE');
			$sheet->setCellValue('J11', 'CF');
			/* ----------------------------------------------------------------------------------------------------------- */
			$sheet->setCellValue('K10', 'EST. DO MEIO');
			$sheet->setCellValue('K11', 'CAP');
			$sheet->setCellValue('L11', 'CPE');
			$sheet->setCellValue('M11', 'CF');
			/* ----------------------------------------------------------------------------------------------------------- */
			$sheet->setCellValue('N10', 'ED. MUSICAL');
			$sheet->setCellValue('N11', 'CAP');
			$sheet->setCellValue('O11', 'CPE');
			$sheet->setCellValue('P11', 'CF');
			/* ----------------------------------------------------------------------------------------------------------- */
			$sheet->setCellValue('Q10', 'ED. FISÍCA');
			$sheet->setCellValue('Q11', 'CAP');
			$sheet->setCellValue('R11', 'CPE');
			$sheet->setCellValue('S11', 'CF');
			/* ----------------------------------------------------------------------------------------------------------- */
			$sheet->setCellValue('T10', 'E. M. P.');
			$sheet->setCellValue('T11', 'CAP');
			$sheet->setCellValue('U11', 'CPE');
			$sheet->setCellValue('V11', 'CF');
			/* ----------------------------------------------------------------------------------------------------------- */
			$sheet->setCellValue('W10', 'OBS');
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
				$spreadsheet->getActiveSheet()->getStyle('A'.$row.':W'.$row)->applyFromArray($border);
				/* ================ Alinhamento Horizontal ================ */ 
				$spreadsheet->getActiveSheet()->getStyle('A'.$row.':B'.$row)
				->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
				$spreadsheet->getActiveSheet()->getStyle('E'.$row.':V'.$row)
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
			/* --------------------------------------------------- */
			$sheet->setCellValue('E'.$row, number_format($cap));
			$sheet->setCellValue('F'.$row, number_format($l_p->ce));
			$sheet->setCellValue('G'.$row, number_format($cf));
			$i++;
			$row++;
		}
		$row = 12;
		$i = 1;
		foreach($dados['matematica'] as $mat)
		{
			$cap = (($mat->ct_1 + $mat->ct_2 + $mat->ct_3)/3);
			$cf = ((0.4*$cap)+(0.6*$mat->ce));
			/* --------------------------------------------------- */
			$sheet->setCellValue('H'.$row, number_format($cap));
			$sheet->setCellValue('I'.$row, number_format($mat->ce));
			$sheet->setCellValue('J'.$row, number_format($cf));
			$i++;
			$row++;
		}
		$row = 12;
		$i = 1;
		foreach($dados['estudo_meio'] as $est_meio)
		{
			$cap = (($est_meio->ct_1 + $est_meio->ct_2 + $est_meio->ct_3)/3);
			$cf = ((0.4*$cap)+(0.6*$est_meio->ce));
			/* --------------------------------------------------- */
			$sheet->setCellValue('K'.$row, number_format($cap));
			$sheet->setCellValue('L'.$row, number_format($est_meio->ce));
			$sheet->setCellValue('M'.$row, number_format($cf));
			$i++;
			$row++;
		}
		$row = 12;
		$i = 1;
		foreach($dados['ed_musical'] as $ed_music)
		{
			$cap = (($ed_music->ct_1 + $ed_music->ct_2 + $ed_music->ct_3)/3);
			$cf = ((0.4*$cap)+(0.6*$ed_music->ce));
			/* --------------------------------------------------- */
			$sheet->setCellValue('N'.$row, number_format($cap));
			$sheet->setCellValue('O'.$row, number_format($ed_music->ce));
			$sheet->setCellValue('P'.$row, number_format($cf));
			$i++;
			$row++;
		}
		$row = 12;
		$i = 1;
		foreach($dados['ed_fisica'] as $ed_fisc)
		{
			$cap = (($ed_fisc->ct_1 + $ed_fisc->ct_2 + $ed_fisc->ct_3)/3);
			$cf = ((0.4*$cap)+(0.6*$ed_fisc->ce));
			/* --------------------------------------------------- */
			$sheet->setCellValue('Q'.$row, number_format($cap));
			$sheet->setCellValue('R'.$row, number_format($ed_fisc->ce));
			$sheet->setCellValue('S'.$row, number_format($cf));
			$i++;
			$row++;
		}
		$row = 12;
		$i = 1;
		foreach($dados['ed_plastica'] as $ed_plstic){
			$cap = (($ed_plstic->ct_1 + $ed_plstic->ct_2 + $ed_plstic->ct_3)/3);
			$cf = ((0.4*$cap)+(0.6*$ed_plstic->ce));
			/* --------------------------------------------------- */
			$sheet->setCellValue('T'.$row, number_format($cap));
			$sheet->setCellValue('U'.$row, number_format($ed_plstic->ce));
			$sheet->setCellValue('V'.$row, number_format($cf));
			/*------------------------------------------------------------------------------------------------------------------*/
			$sheet->setCellValue('W'.$row, '=IF(AND(G'.$row.'>=5, J'.$row.'>=5, M'.$row.'>=5, P'.$row.'>=5, S'.$row.'>=5, V'.$row.'>=5), "Aprovado", IF(AND(G'.$row.'>=5, J'.$row.'>=5, M'.$row.'<5, P'.$row.'<5, S'.$row.'>=5, V'.$row.'>=5), "Aprovado", IF(AND(G'.$row.'>=5, J'.$row.'>=5, M'.$row.'<5, P'.$row.'>=5, S'.$row.'<5, V'.$row.'>=5), "Aprovado", IF(AND(G'.$row.'>=5, J'.$row.'>=5, M'.$row.'<5, P'.$row.'>=5, S'.$row.'>=5, V'.$row.'<5), "Aprovado", IF(AND(G'.$row.'>=5, J'.$row.'>=5, M'.$row.'>=5, P'.$row.'<5, S'.$row.'<5, V'.$row.'>=5), "Aprovado", IF(AND(G'.$row.'>=5, J'.$row.'>=5, M'.$row.'>=5, P'.$row.'<5, S'.$row.'>=5, V'.$row.'<5), "Aprovado", IF(AND(G'.$row.'>=5, J'.$row.'>=5, M'.$row.'>=5, P'.$row.'>=5, S'.$row.'<5, V'.$row.'<5), "Aprovado", IF(AND(G'.$row.'>=5, J'.$row.'>=5, M'.$row.'<5, P'.$row.'>=5, S'.$row.'>=5, V'.$row.'>=5), "Aprovado", IF(AND(G'.$row.'>=5, J'.$row.'>=5, M'.$row.'>=5, P'.$row.'<5, S'.$row.'>=5, V'.$row.'>=5), "Aprovado", IF(AND(G'.$row.'>=5, J'.$row.'>=5, M'.$row.'>=5, P'.$row.'>=5, S'.$row.'<5, V'.$row.'>=5), "Aprovado", IF(AND(G'.$row.'>=5, J'.$row.'>=5, M'.$row.'>=5, P'.$row.'>=5, S'.$row.'>=5, V'.$row.'<5), "Aprovado", "Reprovado" )))))))))))');
			/* ================ Condicional - Notas ================ */			
			$conditionalStyles = $spreadsheet->getActiveSheet()->getStyle('E'.$row.':V'.$row)->getConditionalStyles();
			$conditionalStyles[] = $conditional1;
			$conditionalStyles[] = $conditional2;
			$spreadsheet->getActiveSheet()->getStyle('E'.$row.':V'.$row)->setConditionalStyles($conditionalStyles);
			/* ================ Condicional - Observação ================ */
			$conditionalStyles_01 = $spreadsheet->getActiveSheet()->getStyle('W'.$row)->getConditionalStyles();
			$conditionalStyles_01[] = $conditional3;
			$conditionalStyles_01[] = $conditional4;
			$spreadsheet->getActiveSheet()->getStyle('W'.$row)->setConditionalStyles($conditionalStyles_01);
			/* ----------------------------------------------------------------------------------------------------------- */
			$i++;
			$row++;
		}
		$spreadsheet->getActiveSheet()->mergeCells('A'.$row.':W'.$row);
		$spreadsheet->getActiveSheet()->getStyle('A'.$row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$sheet->setCellValue('A'.$row, 'Luanda, aos '.strftime('%d de %B de %Y', strtotime(date('d-m-Y'))));
			/* ================ Altura da Linha ================ */
			$spreadsheet->getActiveSheet()->getRowDimension(''.$row)->setRowHeight(30);
			/* ================================ Mesclar Célula - Horizontal ================================ */
			$spreadsheet->getActiveSheet()->mergeCells('A1:W1');
			$spreadsheet->getActiveSheet()->mergeCells('A2:W2');
			$spreadsheet->getActiveSheet()->mergeCells('A3:W3');
			$spreadsheet->getActiveSheet()->mergeCells('A4:W4');
			$spreadsheet->getActiveSheet()->mergeCells('A5:W5');
			/* ----------------------------------------------------------------------------------------------------------- */
			$spreadsheet->getActiveSheet()->mergeCells('E10:G10');
			$spreadsheet->getActiveSheet()->mergeCells('H10:J10');
			$spreadsheet->getActiveSheet()->mergeCells('K10:M10');
			$spreadsheet->getActiveSheet()->mergeCells('N10:P10');
			$spreadsheet->getActiveSheet()->mergeCells('Q10:S10');
			$spreadsheet->getActiveSheet()->mergeCells('T10:V10');
			/* ================================ Mesclar Célula - Vertical ================================ */
			$spreadsheet->getActiveSheet()->mergeCells('A10:A11');
			$spreadsheet->getActiveSheet()->mergeCells('B10:B11');
			$spreadsheet->getActiveSheet()->mergeCells('C10:C11');
			$spreadsheet->getActiveSheet()->mergeCells('D10:D11');
			$spreadsheet->getActiveSheet()->mergeCells('W10:W11');
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
			$spreadsheet->getActiveSheet()->getColumnDimension('W')->setAutoSize(TRUE);
			/* ================ Alinhamento Vertical ================ */ 
			$spreadsheet->getActiveSheet()->getStyle('A10:W10')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
			/* ================ Quebra de Linha ================ */ 
			$spreadsheet->getActiveSheet()->getStyle('A10:W10')->getAlignment()->setWrapText(true);
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
		$spreadsheet->getActiveSheet()->getStyle('A8:W11')->applyFromArray($styleArray);
		/* ================ Border da Página  ================ */ 
		$border = [
			'borders' => [
				'allBorders' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					'color' => ['argb' => 'FF000000'],
				],
			],
		];
		$spreadsheet->getActiveSheet()->getStyle('A10:W11')->applyFromArray($border);
		/* ================ Orientação e Tamanho da Página  ================ */ 
		$spreadsheet->getActiveSheet()->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
		$spreadsheet->getActiveSheet()->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A3_EXTRA_PAPER);
		/* ================ Informações do Documento ================ */ 
		$spreadsheet->getProperties()
		->setCreator("Sistema de Gestão Escolar")
		->setLastModifiedBy("Sistema de Gestão Escolar")
		->setTitle("Pauta 4ª Classe")
		->setSubject("Pauta Geral")
		->setDescription("Pauta Geral 4ª Classe.")
		->setCategory("Pauta");
		/* ----------------------------------------------------------------------------------------------------------- */
			$writer = new Xlsx($spreadsheet);
			$filename = "PAUTA-GERA-TURMA-".$dados['dados_turma']->nome_turma.'-'.$dados['dados_turma']->ano_let.'-'.date("d-m-Y-H-i-s");
			//$filename = 'pauta-01';								// variavel com o nome do fixeiro XLS
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
			header('Cache-Control: max-age=0');
			$writer->save('php://output');
    }
}