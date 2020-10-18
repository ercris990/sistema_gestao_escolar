<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Pauta_xls_01 extends CI_Controller 
{
	public function export_xls_01($anolectivo, $turma) {
		/*-----------------------------------------------------------------------------------------------------------*/
			$this->db->select('*'); // select tudo
			$this->db->from('notas_disciplina'); // da tbl matricula
			$this->db->where("anolectivo_id", $anolectivo); // onde
			$this->db->where("turma_id", $turma); // onde
			$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id'); // join ano lectivo e matricula
			$this->db->join('anolectivo', 'anolectivo.id_ano = notas_disciplina.anolectivo_id'); // join ano lectivo e matricula
			$this->db->join('turma', 'turma.id_turma = notas_disciplina.turma_id'); // join turma e matricula
			$this->db->join('classe', 'classe.id_classe = turma.classe_id'); // Join tbl classe [turma]
			$this->db->join('periodo', 'periodo.id_periodo = turma.periodo_id'); // join periodo e turma
			$this->db->join('sala', 'sala.id_sala = turma.sala_id'); // join periodo e turma
			$dados["dados_turma"] = $this->db->get()->row(); // retorna 1 linha
		/* ----------------------------------------------------------------------------------------------------------- */
			$this->db->from('notas_disciplina'); // de notas disciplina
			$this->db->where("anolectivo_id", $anolectivo); // filtro - anolectivo
			$this->db->where("turma_id", $turma);	// filtro - turma
			$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left'); // join turma e matricula
			$this->db->group_by('notas_disciplina.aluno_id'); // agrupamento
			$this->db->order_by("nome", "asc"); // Ordenar a travez do nome
			$dados['alunos'] = $this->db->get()->result(); // retorna várias linhas
			/* ----------------------------------------------------------------------------------------------------------- */
			$this->db->select('*'); // seleciona tudo
			$this->db->from('notas_disciplina'); // de notas disciplina
			$this->db->where("anolectivo_id", $anolectivo); // filtro - anolectivo
			$this->db->where("turma_id", $turma); // filtro - turma
			$this->db->where("disciplina_id", '28'); // filtro - turma
			$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left'); // join turma e matricula
			$this->db->group_by('notas_disciplina.aluno_id'); // agrupamento
			$this->db->order_by("nome", "asc"); // Ordenar a travez do nome
			$dados['l_portuguesa'] = $this->db->get()->result(); // retorna várias linhas
			/* ----------------------------------------------------------------------------------------------------------- */
			$this->db->select('*');	// seleciona tudo
			$this->db->from('notas_disciplina'); // de notas disciplina
			$this->db->where("anolectivo_id", $anolectivo); // filtro - anolectivo
			$this->db->where("turma_id", $turma); // filtro - turma
			$this->db->where("disciplina_id", '29'); // filtro - turma
			$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left'); // join turma e matricula
			$this->db->group_by('notas_disciplina.aluno_id'); // agrupamento
			$this->db->order_by("nome", "asc"); // Ordenar a travez do nome
			$dados['matematica'] = $this->db->get()->result(); // retorna várias linhas
		/* =========================================================================================================== */
			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();
			/* ----------------------------------------------------------------------------------------------------------- */
			$sheet->setCellValue('A1', 'REPÚBLICA DE ANGOLA');
			$sheet->setCellValue('A2', 'MISNISTERIO DA EDUCAÇÃO');
			$sheet->setCellValue('A3', 'REPARTIÇÃO DE EDUCAÇÃO DO DISTRITO URBANO DO RANGEL');
			$sheet->setCellValue('A4', 'ESCOLADO ENSINO PRIMÁRIO N.º 1188 (EX. 5028)');
			/* ----------------------------------------------------------------------------------------------------------- */
			$sheet->setCellValue('C7', 'Ano Lectivo: ' .$dados['dados_turma']->ano_let);
			$sheet->setCellValue('D7', 'Período: ' .$dados['dados_turma']->nome_periodo);
			$sheet->setCellValue('G7', 'Classe: ' .$dados['dados_turma']->nome_classe);
			$sheet->setCellValue('M7', 'Turma: ' .$dados['dados_turma']->nome_turma);
			$sheet->setCellValue('R7', 'Sala: ' .$dados['dados_turma']->numero_sala);
			/* ----------------------------------------------------------------------------------------------------------- */
			$sheet->setCellValue('A9', 'Nº');
			$sheet->setCellValue('B9', 'Nº DE PROCECSSO');
			$sheet->setCellValue('C9', 'NOME COMPLETO');
			$sheet->setCellValue('D9', 'GÉNERO');
			/* ----------------------------------------------------------------------------------------------------------- */
			$sheet->setCellValue('E9', 'L. PORTUGUESA');
			$sheet->setCellValue('E10', 'CAP');
			$sheet->setCellValue('F10', 'CPE');
			$sheet->setCellValue('G10', 'CF');
			/* ----------------------------------------------------------------------------------------------------------- */
			$sheet->setCellValue('H9', 'MATEMÁTICA');
			$sheet->setCellValue('H10', 'CAP');
			$sheet->setCellValue('I10', 'CPE');
			$sheet->setCellValue('J10', 'CF');
			/* ----------------------------------------------------------------------------------------------------------- */
			$sheet->setCellValue('K9', 'EST. DO MEIO');
			$sheet->setCellValue('K10', 'CAP');
			$sheet->setCellValue('L10', 'CPE');
			$sheet->setCellValue('M10', 'CF');
			/* ----------------------------------------------------------------------------------------------------------- */
			$sheet->setCellValue('N9', 'ED. MUSICAL');
			$sheet->setCellValue('N10', 'CAP');
			$sheet->setCellValue('O10', 'CPE');
			$sheet->setCellValue('P10', 'CF');
			/* ----------------------------------------------------------------------------------------------------------- */
			$sheet->setCellValue('Q9', 'ED. FISÍCA');
			$sheet->setCellValue('Q10', 'CAP');
			$sheet->setCellValue('R10', 'CPE');
			$sheet->setCellValue('S10', 'CF');
			/* ----------------------------------------------------------------------------------------------------------- */
			$sheet->setCellValue('T9', 'E. M. P.');
			$sheet->setCellValue('T10', 'CAP');
			$sheet->setCellValue('U10', 'CPE');
			$sheet->setCellValue('V10', 'CF');
			/* ----------------------------------------------------------------------------------------------------------- */
			$sheet->setCellValue('W9', 'OBSERVAÇÃO');
		/*============================= DADOS DA BASE DE DADOS ===================================*/
			$no = 1;
			$row = 11;			
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
		$row = 11;
		$i = 1;
		foreach($dados['l_portuguesa'] as $l_p)
		{
			$cap = (($l_p->ct_1 + $l_p->ct_2 + $l_p->ct_3)/3);
			$cf = ((0.4*$cap)+(0.6*$l_p->ce));
			/* ----------------------------------------------------------------------------------------------------------- */
			$sheet->setCellValue('E'.$row, number_format($cap));
			$sheet->setCellValue('F'.$row, number_format($l_p->ce));
			$sheet->setCellValue('G'.$row, number_format($cf));
			$i++;
			$row++;
		}
		$row = 11;
		$i = 1;
		foreach($dados['matematica'] as $mat)
		{
			$cap = (($mat->ct_1 + $mat->ct_2 + $mat->ct_3)/3);
			$cf = ((0.4*$cap)+(0.6*$mat->ce));
			/* ----------------------------------------------------------------------------------------------------------- */
			$sheet->setCellValue('H'.$row, number_format($cap));
			$sheet->setCellValue('I'.$row, number_format($mat->ce));
			$sheet->setCellValue('J'.$row, number_format($cf));
			$i++;
			$row++;
		}			
			/* ================================ Mesclar Célula - Horizontal ================================ */ 
			$spreadsheet->getActiveSheet()->mergeCells('A1:W1');
			$spreadsheet->getActiveSheet()->mergeCells('A2:W2');
			$spreadsheet->getActiveSheet()->mergeCells('A3:W3');
			$spreadsheet->getActiveSheet()->mergeCells('A4:W4');
			/* ----------------------------------------------------------------------------------------------------------- */
			$spreadsheet->getActiveSheet()->mergeCells('E9:G9');
			$spreadsheet->getActiveSheet()->mergeCells('H9:J9');
			$spreadsheet->getActiveSheet()->mergeCells('K9:M9');
			$spreadsheet->getActiveSheet()->mergeCells('N9:P9');
			$spreadsheet->getActiveSheet()->mergeCells('Q9:S9');
			$spreadsheet->getActiveSheet()->mergeCells('T9:V9');
			/* ================================ Mesclar Célula - Vertical ================================ */ 
			$spreadsheet->getActiveSheet()->mergeCells('A9:A10');
			$spreadsheet->getActiveSheet()->mergeCells('B9:B10');
			$spreadsheet->getActiveSheet()->mergeCells('C9:C10');
			$spreadsheet->getActiveSheet()->mergeCells('D9:D10');
			$spreadsheet->getActiveSheet()->mergeCells('W9:W10');
			/* ================ Altura da Linha ================ */ 
			// $spreadsheet->getActiveSheet()->getRowDimension('10')->setRowHeight(100);
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
			$spreadsheet->getActiveSheet()->getColumnDimension('W')->setWidth(15);
			/* ----------------------------------------------------------------------------------------------------------- */
			/* ================ Alinhamento Vertical ================ */ 
			$spreadsheet->getActiveSheet()->getStyle('A9:W9')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
			/* ================ Quebra de Linha ================ */ 
			$spreadsheet->getActiveSheet()->getStyle('A9:W9')->getAlignment()->setWrapText(true);
			/* ----------------------------------------------------------------------------------------------------------- */
			$spreadsheet->getActiveSheet()->setShowGridlines(FALSE); //Ocultar as linhas da grade			
			/* ================ Configurar Célula (negrito e centralização) ================ */ 
			$styleArray = [
				'font' => [
						'bold' => true,
				],
				'alignment' => [
						'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
				],
		];
		$spreadsheet->getActiveSheet()->getStyle('A1:A4')->applyFromArray($styleArray);
		$spreadsheet->getActiveSheet()->getStyle('A7:W10')->applyFromArray($styleArray);
		/* ================ Border da Página  ================ */ 
		$border = [
			'borders' => [
				'allBorders' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					'color' => ['argb' => 'FF000000'],
				],
			],
		];
		$spreadsheet->getActiveSheet()->getStyle('A9:W10')->applyFromArray($border);
		/* ================ Condicional - Notas ================ */
		

		
		/* ================ Orientação e Tamanho da Página  ================ */ 
		$spreadsheet->getActiveSheet()->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
		$spreadsheet->getActiveSheet()->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A3_EXTRA_PAPER);
		/* ================ Informações do Documento ================ */ 
		$spreadsheet->getProperties()
		->setCreator("Sistema de Gestão Escolar")
		->setLastModifiedBy("Sistema de Gestão Escolar")
		->setTitle("Pauta 1ª Classe")
		->setSubject("Pauta Geral")
		->setDescription("Pauta Geral 1ª Classe.")
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