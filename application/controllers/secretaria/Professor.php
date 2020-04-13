<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professor extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		if($this->session->userdata('logged_in') !== TRUE){
			redirect('/');
		}
	}
	/* ===================== INICIO LISTAR PROFESSOR LECTIVO ===================== */
	public function listar_professor()
	{
		$this->db->select('*');																		// Selecione tudo
		$this->db->from('funcionario');																// Da tbl matricula
		$this->db->where('nivel_acesso', 5);														// Onde o ID igual ao ID do aluno selecionado
		$this->db->order_by("nome_funcionario", "asc");  											// Orden
		$dados ["professores"] = $this->db->get()->result();   										// Join Matricula
		// =======================================================================================================================================
		$this->load->view('layout/cabecalho');
		$this->load->view('layout/menu_lateral_coordenacao');
		$this->load->view('conteudo/_secretaria/_professor/listar_professor', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	/* ===================== INICIO LISTAR PROFESSOR LECTIVO ===================== */
	public function listar_professores()
	{
		// =======================================================================================================================================
		$this->db->select('*');																		// Selecione tudo
		$this->db->from('funcionario');																// Da tbl matricula
		$this->db->where('nivel_acesso', '5');														// Onde o ID igual ao ID do aluno selecionado
		$this->db->order_by("nome_funcionario", "asc");  											// Orden
		$dados ["professores"] = $this->db->get()->result();   										// Join Matricula
		// =======================================================================================================================================
		$this->load->view('layout/cabecalho');
		$this->load->view('layout/menu_lateral_secretaria');
		$this->load->view('conteudo/_secretaria/_professor/listar_professor_secretaria', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}

	//	FUNCAO PERFIL DO PROFESSOR
	public function turmas_professor_coordenacao($id_prof)
	{
		// ==============================================================================================================================
		$this->db->select('*');																			// Selecione tudo 
		$this->db->from('prof_turma');																	// Da tbl matricula
		$this->db->where('funcionario_id', $id_prof);													// Onde o ID igual ao ID do aluno selecionado
		$this->db->join('funcionario', 'funcionario.id_funcionario = prof_turma.funcionario_id');		// Join tbl anolectivo
		$dados["prof"] = $this->db->get()->row();														// retorna 1 linha
		if ( empty($dados["prof"]) )
		{
			echo $this->session->set_flashdata('msg',"<div class='alert alert-warning text-center'>PROFESSOR SELECIONADO NÃO TEM TURMA</div>");	
			redirect('secretaria/professor/listar_professor');
		}
		elseif ( !empty($dados["prof"]) )
		{
			// ==============================================================================================================================
			$this->db->select('*');																			// Selecione tudo 
			$this->db->from('prof_turma');																	// Da tbl matricula
			$this->db->where('funcionario_id', $id_prof);													// Onde o ID igual ao ID do aluno selecionado
			$this->db->order_by("ano_let", "desc");  														// Orden
			$this->db->join('anolectivo', 'anolectivo.id_ano = prof_turma.anolectivo_id');					// Join tbl anolectivo
			$this->db->join('turma', 'turma.id_turma = prof_turma.turma_id');								// Join tbl anolectivo
			$this->db->join('classe', 'classe.id_classe = turma.classe_id');								// Join tbl anolectivo
			$this->db->join('periodo', 'periodo.id_periodo = turma.periodo_id');								// Join tbl anolectivo
			$this->db->join('sala', 'sala.id_sala = turma.sala_id');								// Join tbl anolectivo
			
			$dados ["prof_turma"] = $this->db->get()->result();   											// Join Matricula
			// ==============================================================================================================================
			$this->load->view('layout/cabecalho');
			$this->load->view('layout/menu_lateral_coordenacao');
			$this->load->view('conteudo/_secretaria/_professor/turmas_professor_coordenacao', $dados);
			$this->load->view('layout/modal_funcionario');
			$this->load->view('layout/rodape');
			$this->load->view('layout/script');
		}
	}
	//	FUNCAO PERFIL DO PROFESSOR
	public function turmas_professor($id_prof)
	{
		// ==============================================================================================================================
		$this->db->select('*');																			// Selecione tudo 
		$this->db->from('prof_turma');																	// Da tbl matricula
		$this->db->where('funcionario_id', $id_prof);													// Onde o ID igual ao ID do aluno selecionado
		$this->db->join('funcionario', 'funcionario.id_funcionario = prof_turma.funcionario_id');		// Join tbl anolectivo
		$dados["prof"] = $this->db->get()->row();														// retorna 1 linha
		if ( empty($dados["prof"]) )
		{
			echo $this->session->set_flashdata('msg',"<div class='alert alert-warning text-center'>NÃO EXISTEM ALUNOS MATRICULADOS NA TURMA E ANO LECTIVO SELECIONADO</div>");	
			redirect('secretaria/professor/listar_professores/'.$prof);
		}
		elseif ( !empty($dados["prof"]) )
		{
			// ==============================================================================================================================
			$this->db->select('*');																			// Selecione tudo 
			$this->db->from('prof_turma');																	// Da tbl matricula
			$this->db->where('funcionario_id', $id_prof);													// Onde o ID igual ao ID do aluno selecionado
			$this->db->order_by("ano_let", "desc");  														// Orden
			$this->db->join('anolectivo', 'anolectivo.id_ano = prof_turma.anolectivo_id');					// Join tbl anolectivo
			$this->db->join('turma', 'turma.id_turma = prof_turma.turma_id');								// Join tbl anolectivo
			$this->db->join('classe', 'classe.id_classe = turma.classe_id');								// Join tbl anolectivo
			$this->db->join('periodo', 'periodo.id_periodo = turma.periodo_id');							// Join tbl anolectivo
			$this->db->join('sala', 'sala.id_sala = turma.sala_id');										// Join tbl anolectivo
			$dados ["prof_turma"] = $this->db->get()->result();   											// Join Matricula
			// ==============================================================================================================================
			$this->load->view('layout/cabecalho');
			$this->load->view('layout/menu_lateral_secretaria');
			$this->load->view('conteudo/_secretaria/_professor/turmas_professor', $dados);
			$this->load->view('layout/modal_funcionario');
			$this->load->view('layout/rodape');
			$this->load->view('layout/script');
		}
	}
	//	FUNCAO PERFIL DO PROFESSOR
	public function detalhe_professor()
	{
		$id = $this->input->get("id_funcionario");
		$dados["funcionario"] = $this->Funcionario_Model->retorna_funcionario($id);
		$dados["options_anos"] = $this->Ano_Model->selectAnos();
		$dados["options_turmas"] = $this->Turmas_Model->selectTurmas();
		// ==============================================================================================================================
		$this->db->select('*');																// Selecione tudo 
		$this->db->from('prof_turma');														// Da tbl matricula
		$this->db->where('funcionario_id', $id);											// Onde o ID igual ao ID do aluno selecionado
		$this->db->order_by("ano_let", "desc");  											// Orden
		$this->db->join('anolectivo', 'anolectivo.id_ano = prof_turma.anolectivo_id');		// Join tbl anolectivo
		$this->db->join('turma', 'turma.id_turma = prof_turma.turma_id');					// Join tbl anolectivo
		$dados ["prof_turma"] = $this->db->get()->result();   								// Join Matricula
		// ==============================================================================================================================
		$this->load->view('layout/cabecalho');
		$this->load->view('layout/menu_lateral_coordenacao');
		$this->load->view('conteudo/_secretaria/_professor/perfil_professor_coordenacao', $dados);
		$this->load->view('layout/modal_funcionario');
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	/*	SALVA A ACTUALIZACAO DO REGISTROS NA TABELA FUNCIONARIO	*/	
	public function add_prof_turma()
	{
		$this->Funcionario_Model->add_prof_turma();
		$id_funcionario = $this->input->post('id_funcionario'); //	Pega o ultimo id do aluno inserido
		redirect('secretaria/professor/detalhe_professor?id_funcionario='.$id_funcionario);
	}
	/**/
	public function editar_prof_turma($id)
	{
		$this->load->model("Select_Dinamico_Model", "prof_turma");
		$dados['anolectivo'] = $this->prof_turma->get_anolectivo();
		$dados['turma']		 = $this->prof_turma->get_turma();
		/* --------------------------------------------------------------- */
		$this->db->where('id_prof_turma', $id);
		$dados['prof_turma'] = $this->db->get('prof_turma')->result();
		$this->load->view('layout/cabecalho');
		$this->load->view('layout/menu_lateral_coordenacao');
		$this->load->view('conteudo/_secretaria/_professor/editar_prof_turma', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	public function actualizar_prof_turma()
	{
		$this->Professor_Model->actualizar_prof_turma();
		$id_funcionario = $this->input->post('funcionario_id');
		redirect('secretaria/professor/detalhe_professor?id_funcionario='.$id_funcionario);
	}
	public function excluir_prof_turma($id, $funcionario_id)
	{
		$this->Professor_Model->excluir_prof_turma($id);
		redirect('secretaria/professor/detalhe_professor?id_funcionario='.$funcionario_id);
	}
	// ======= carrega o painel docente =======
	public function turma_coordenacao()
	{
		$id = $this->session->userdata('id_funcionario');		
		// ==============================================================================================================================
		$this->db->select('*');																			// Selecione tudo 
		$this->db->from('prof_turma');																	// Da tbl matricula
		$this->db->where('funcionario_id', $id);													// Onde o ID igual ao ID do aluno selecionado
		$this->db->join('funcionario', 'funcionario.id_funcionario = prof_turma.funcionario_id');		// Join tbl anolectivo
		$dados["prof"] = $this->db->get()->row();														// retorna 1 linha
		// ==============================================================================================================================
		$this->db->select('*');																// Selecione tudo 
		$this->db->from('prof_turma');														// Da tbl matricula
		$this->db->where('funcionario_id', $id);											// Onde o ID igual ao ID do aluno selecionado
		$this->db->order_by("ano_let", "desc");  											// Orden
		$this->db->join('anolectivo', 'anolectivo.id_ano = prof_turma.anolectivo_id');		// Join tbl anolectivo
		$this->db->join('turma', 'turma.id_turma = prof_turma.turma_id');					// Join tbl anolectivo
		$this->db->join('classe', 'classe.id_classe = turma.classe_id');					// Join tbl anolectivo
		$dados ["prof_turma"] = $this->db->get()->result();									// Join Matricula
		// ==============================================================================================================================
		$this->load->view('layout/cabecalho');
		$this->load->view('layout/menu_lateral_coordenacao');
		$this->load->view('conteudo/turma_coordenacao', $dados);
		$this->load->view('layout/modal_funcionario');
		$this->load->view('layout/rodape');	
		$this->load->view('layout/script');
	}
	/* ===================== INICIO LISTAR PROFESSOR LECTIVO ===================== */
	public function listar_coordenadores()
	{
		// =======================================================================================================================================
		$this->db->select('*');																		// Selecione tudo
		$this->db->from('funcionario');																// Da tbl matricula
		$this->db->where('nivel_acesso', '4');														// Onde o ID igual ao ID do aluno selecionado
		$this->db->order_by("nome_funcionario", "asc");  											// Orden
		$dados ["professores"] = $this->db->get()->result();   										// Join Matricula
		// =======================================================================================================================================
		$this->load->view('layout/cabecalho');
		$this->load->view('layout/menu_lateral_secretaria');
		$this->load->view('conteudo/_secretaria/_professor/listar_professor', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
}