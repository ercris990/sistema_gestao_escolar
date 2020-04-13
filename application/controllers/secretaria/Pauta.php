<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pauta extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		if($this->session->userdata('logged_in') !== TRUE){
			redirect('/');
		}
	}
	/*					 							listar alunos/ano/turma
	==================================================================================================================*/
	public function mini_pauta()
	{
        $anolectivo = $this->input->post('anolectivo');
        $turma_id   = $this->input->post('turma_id');
        // $classe = $this->input->post('classe');
		/* ===========================================================================================================*/
		$this->db->select('*');															// select tudo
		$this->db->from('matricula');													// da tbl matricula
		$this->db->where("anolectivo_id", $anolectivo);									// onde
        $this->db->where("turma_id", $turma_id);										// onde 
		$this->db->order_by("nome", "asc");  											// Ordenar a travez do nome
		$this->db->join('aluno', 'aluno.id_aluno = matricula.aluno_id');		 		// Join aluno e matricula
        $this->db->join('anolectivo', 'anolectivo.id_ano = matricula.anolectivo_id'); 	// Join anolectivo e matricula
		$this->db->join('turma', 'turma.id_turma = matricula.turma_id');		 		// Join turma e matricula
		$dados['alunos'] = $this->db->get()->result();									// retorna várias linhas
		/* ===========================================================================================================*/
		$this->db->select('*');													  		// select tudo
		$this->db->from('matricula');												 	// da tbl matricula
		$this->db->where("anolectivo_id", $anolectivo);									// onde
        $this->db->where("turma_id", $turma_id);									 	// onde
		$this->db->join('turma', 'turma.id_turma = matricula.turma_id');				// join turma e matricula
		$this->db->join('classe', 'classe.id_classe = matricula.classe_id');			// join classe e matricula
		// $this->db->join('classe',	 'classe.id_classe  = turma.classe_id');			// Join tbl classe [turma]
		$this->db->join('anolectivo', 'anolectivo.id_ano = matricula.anolectivo_id');	// join ano lectivo e matricula
		$this->db->join('periodo', 'periodo.id_periodo = turma.periodo_id');			// join periodo e turma
		$dados["listagem_alunos"] = $this->db->get()->row();							// retorna 1 linha
		/* ===========================================================================================================*/
		$this->load->view('layout/cabecalho');
		$this->load->view('layout/menu_lateral');
		$this->load->view('conteudo/_secretaria/_aluno/listar_aluno_turma', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	/*					 							listar alunos/ano/turma
	==================================================================================================================*/
	public function listar_aluno_turma_pdf()
	{
        $anolectivo = $this->input->post('anolectivo');
        $turma_id   = $this->input->post('turma_id');
		/* ===========================================================================================================*/
		$this->db->select('*');															// select tudo
		$this->db->from('matricula');													// da tbl matricula
		$this->db->where("anolectivo_id", $anolectivo);									// onde
        $this->db->where("turma_id", $turma_id);										// onde 
		$this->db->order_by("nome", "asc");  											// Ordenar a travez do nome
		$this->db->join('aluno', 'aluno.id_aluno = matricula.aluno_id');		 		// Join aluno e matricula
        $this->db->join('anolectivo', 'anolectivo.id_ano = matricula.anolectivo_id'); 	// Join anolectivo e matricula
		$this->db->join('turma', 'turma.id_turma = matricula.turma_id');		 		// Join turma e matricula
		$dados['alunos'] = $this->db->get()->result();									// retorna várias linhas
		/* ===========================================================================================================*/
		$this->db->select('*');													  		// select tudo
		$this->db->from('matricula');												 	// da tbl matricula
		$this->db->where("anolectivo_id", $anolectivo);									// onde
        $this->db->where("turma_id", $turma_id);									 	// onde
		$this->db->join('turma', 'turma.id_turma = matricula.turma_id');				// join turma e matricula
		$this->db->join('classe', 'classe.id_classe = matricula.classe_id');			// join classe e matricula
		$this->db->join('anolectivo', 'anolectivo.id_ano = matricula.anolectivo_id');	// join ano lectivo e matricula
		$this->db->join('periodo', 'periodo.id_periodo = turma.periodo_id');			// join periodo e turma
		$dados["listagem_alunos"] = $this->db->get()->row();							// retorna 1 linha
		/* ===========================================================================================================*/
		// Carrega o PDF
		$this->load->library("My_dompdf");
		$this->my_dompdf->gerar_pdf('reports/listar_aluno_turma_pdf', $dados, TRUE);
	}
	//==================================================================================================================*/
	//											listar alunos/ano/turma
	//==================================================================================================================*/
	public function listar_aluno_disciplina()
	{
        $anolectivo = $this->input->post('anolectivo');
        $turma_id = $this->input->post('turma_id');
        // $classe_id = $this->input->post('classe_id');
        // $disciplina_id = $this->input->post('disciplina_id');
		/* ===========================================================================================================*/
		$this->db->select('*');															 	 // select tudo
		$this->db->from('notas_disciplina');											 	 // da tbl matricula
		/*------------------------------------------------------------------------------------------------------------*/
		$this->db->where("anolectivo_id", $anolectivo);									 	 // onde
        $this->db->where("turma_id", $turma_id);										 	 // onde 
        // $this->db->where("classe_id", $classe_id);									 	 // onde 
        // $this->db->where("disciplina_id", $disciplina_id);							 	 // onde 
		/*------------------------------------------------------------------------------------------------------------*/
		$this->db->order_by("nome", "asc");  												 // Ordenar a travez do nome
		$this->db->join('aluno', 	  'aluno.id_aluno 	 = notas_disciplina.aluno_id');		 // Join aluno e matricula
        $this->db->join('anolectivo', 'anolectivo.id_ano = notas_disciplina.anolectivo_id'); // Join anolectivo e matricula
		$this->db->join('turma', 	  'turma.id_turma 	 = notas_disciplina.turma_id');		 // Join turma e matricula
		$dados['alunos'] = $this->db->get()->result();									 	 // retorna várias linhas
		/* ===========================================================================================================*/
		$this->db->select('*');												// select tudo
		$this->db->from('notas_disciplina');								// da tbl matricula
		/*------------------------------------------------------------------------------------------------------------*/
		$this->db->where("anolectivo_id", $anolectivo);						// onde
        $this->db->where("turma_id", $turma_id);							// onde 
        // $this->db->where("classe_id", $classe_id);						// onde 
        // $this->db->where("disciplina_id", $disciplina_id);				// onde 
		/*------------------------------------------------------------------------------------------------------------*/
		$this->db->join('turma',  	  'turma.id_turma     = notas_disciplina.turma_id');  		 	 // join turma e matricula
		$this->db->join('classe', 	  'classe.id_classe   = notas_disciplina.classe_id');  	 		 // join classe e matricula
		$this->db->join('anolectivo', 'anolectivo.id_ano  = notas_disciplina.anolectivo_id');  		 // join ano lectivo e matricula
		$this->db->join('periodo', 	  'periodo.id_periodo = turma.periodo_id');		 	 			 // join periodo e turma
		$this->db->join('disciplina', 'disciplina.id_disciplina = notas_disciplina.disciplina_id');	 // join periodo e turma
		$dados["listagem_alunos"] = $this->db->get()->row();										 // retorna 1 linha
		/* ===========================================================================================================*/
		$this->load->view('layout/cabecalho');
		$this->load->view('layout/menu_lateral');
		$this->load->view('conteudo/_secretaria/_aluno/listar_aluno_disciplina', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
}