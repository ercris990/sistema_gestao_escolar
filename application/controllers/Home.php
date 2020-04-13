<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		/*------------------------------------------------*/ 
		$this->load->library('form_validation');
		if($this->session->userdata('logged_in') !== TRUE)
		{
			redirect('/');
		}
	}	
	/* ========================================================== carrega o painel admin ========================================================== */ 
	public function index()
	{
		if($this->session->userdata('nivel_acesso')==='6')
		{
			$this->load->view('layout/cabecalho');
			$this->load->view('layout/menu_lateral');
			$this->load->view('conteudo/conteudo_admin');
			$this->load->view('layout/modal_funcionario');
			$this->load->view('layout/rodape');
			$this->load->view('layout/script');
		} else {
			if($this->session->userdata('nivel_acesso')==='1')
			{
				$this->load->view('layout/cabecalho_secretaria');
				$this->load->view('layout/menu_lateral_direccao');
				$this->load->view('conteudo/conteudo');
				$this->load->view('layout/modal_funcionario');
				$this->load->view('layout/rodape');
				$this->load->view('layout/script');
			}elseif($this->session->userdata('nivel_acesso')==='2'){			
				/* --------------- retorna o numero total de alunos --------------- */
				$query = $this->db->query('SELECT * FROM aluno');
				$dados["numero_alunos"] = $query->num_rows();
				/* --------------- retorna o numero total de turmas --------------- */
				$query = $this->db->query('SELECT * FROM turma');
				$dados["numero_turmas"] = $query->num_rows();
				/* ------------- retorna o numero total de matriculas ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 5');
				$dados["numero_professores"] = $query->num_rows();
				/* ------------- retorna o numero total de matriculas ------------- */
				$query = $this->db->query('SELECT * FROM sala');
				$dados["numero_salas"] = $query->num_rows();
				/* ------------------------------------------------------------------------- */
				$this->load->view('layout/cabecalho_secretaria');
				$this->load->view('layout/menu_lateral_secretaria');
				$this->load->view('conteudo/conteudo_secretaria', $dados);
				$this->load->view('layout/modal_funcionario');
				$this->load->view('layout/rodape');	
				$this->load->view('layout/script');
			}elseif($this->session->userdata('nivel_acesso')==='3'){
				/* ------------- retorna o numero total de funcionarios da direccao ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 1');
				$dados["numero_direccao"] = $query->num_rows();
				/* ------------- retorna o numero total de funcionarios da secretaria ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 2');
				$dados["numero_secretaria"] = $query->num_rows();
				/* ------------- retorna o numero total de funcionarios do rh ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 3');
				$dados["numero_rh"] = $query->num_rows();
				/* ------------- retorna o numero total de funcionarios da coordenação ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 4');
				$dados["numero_coordenacao"] = $query->num_rows();
				/* ------------- retorna o numero total de docentes ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 5');
				$dados["numero_docentes"] = $query->num_rows();
				/* ---------------------------------------------------------------- */
				/* ------------- retorna o numero total de docentes ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 7');
				$dados["numero_sg"] = $query->num_rows();
				/* ---------------------------------------------------------------- */
				/* ------------- retorna o numero total de docentes ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 8');
				$dados["numero_seguraca"] = $query->num_rows();
				/* ---------------------------------------------------------------- */
				$this->load->view('layout/cabecalho_rh');
				$this->load->view('layout/menu_lateral_rh');
				$this->load->view('conteudo/conteudo_rh', $dados);
				$this->load->view('layout/modal_funcionario');
				$this->load->view('layout/rodape');
				$this->load->view('layout/script');
			}elseif($this->session->userdata('nivel_acesso')==='4'){
				/* --------------- retorna o numero total de alunos --------------- */
				$query = $this->db->query('SELECT * FROM aluno');
				$dados["numero_alunos"] = $query->num_rows();
				/* --------------- retorna o numero total de turmas --------------- */
				$query = $this->db->query('SELECT * FROM turma');
				$dados["numero_turmas"] = $query->num_rows();
				/* ------------- retorna o numero total de matriculas ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 5');
				$dados["numero_professores"] = $query->num_rows();
				/* ------------- retorna o numero total de matriculas ------------- */
				$query = $this->db->query('SELECT * FROM sala');
				$dados["numero_salas"] = $query->num_rows();
				/* ------------------------------------------------------------------------- */
				$this->load->view('layout/cabecalho');
				$this->load->view('layout/menu_lateral_coordenacao');
				$this->load->view('conteudo/conteudo_coordenaccao', $dados);
				$this->load->view('layout/modal_funcionario');
				$this->load->view('layout/rodape');
				$this->load->view('layout/script');
			} elseif($this->session->userdata('nivel_acesso')==='5'){
				$id = $this->session->userdata('id_funcionario');
				// ==============================================================================================================================
				$this->db->select('*');																// Selecione tudo 
				$this->db->from('prof_turma');														// Da tbl matricula
				$this->db->where('funcionario_id', $id);											// Onde o ID igual ao ID do aluno selecionado
				$this->db->order_by("ano_let", "desc");  											// Orden
				$this->db->join('anolectivo', 'anolectivo.id_ano = prof_turma.anolectivo_id');		// Join tbl anolectivo
				$this->db->join('turma', 'turma.id_turma = prof_turma.turma_id');					// Join tbl anolectivo
				$this->db->join('classe', 'classe.id_classe = turma.classe_id');					// Join tbl anolectivo
				$this->db->join('sala', 'sala.id_sala = turma.sala_id');							// Join tbl anolectivo
				$this->db->join('periodo', 'periodo.id_periodo = turma.periodo_id');				// Join tbl anolectivo
				$dados ["prof_turma"] = $this->db->get()->result();									// Join Matricula
				// ==============================================================================================================================
				$this->load->view('layout/cabecalho');
				$this->load->view('layout/menu_lateral_docente');
				$this->load->view('conteudo/conteudo_docente', $dados);
				$this->load->view('layout/modal_funcionario');
				$this->load->view('layout/rodape');	
				$this->load->view('layout/script');
			} elseif($this->session->userdata('nivel_acesso')==='6'){
				$this->load->view('layout/cabecalho');
				$this->load->view('layout/menu_lateral');
				$this->load->view('conteudo/conteudo_admin');
				$this->load->view('layout/modal_funcionario');
				$this->load->view('layout/rodape');
				$this->load->view('layout/script');
			}
		}
	}
	/* ======================================================== carrega o painel da direccao ======================================================== */ 
	public function direccao()
	{
		if($this->session->userdata('nivel_acesso')==='1')
		{
			$this->load->view('layout/cabecalho_secretaria');
			$this->load->view('layout/menu_lateral_direccao');
			$this->load->view('conteudo/conteudo');
			$this->load->view('layout/modal_funcionario');
			$this->load->view('layout/rodape');
			$this->load->view('layout/script');
		}else{
			if($this->session->userdata('nivel_acesso')==='2'){			
				/* --------------- retorna o numero total de alunos --------------- */
				$query = $this->db->query('SELECT * FROM aluno');
				$dados["numero_alunos"] = $query->num_rows();
				/* --------------- retorna o numero total de turmas --------------- */
				$query = $this->db->query('SELECT * FROM turma');
				$dados["numero_turmas"] = $query->num_rows();
				/* ------------- retorna o numero total de matriculas ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 5');
				$dados["numero_professores"] = $query->num_rows();
				/* ------------- retorna o numero total de matriculas ------------- */
				$query = $this->db->query('SELECT * FROM sala');
				$dados["numero_salas"] = $query->num_rows();
				/* ------------------------------------------------------------------------- */
				$this->load->view('layout/cabecalho_secretaria');
				$this->load->view('layout/menu_lateral_secretaria');
				$this->load->view('conteudo/conteudo_secretaria', $dados);
				$this->load->view('layout/modal_funcionario');
				$this->load->view('layout/rodape');	
				$this->load->view('layout/script');
			}elseif($this->session->userdata('nivel_acesso')==='3'){
				/* ------------- retorna o numero total de funcionarios da direccao ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 1');
				$dados["numero_direccao"] = $query->num_rows();
				/* ------------- retorna o numero total de funcionarios da secretaria ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 2');
				$dados["numero_secretaria"] = $query->num_rows();
				/* ------------- retorna o numero total de funcionarios do rh ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 3');
				$dados["numero_rh"] = $query->num_rows();
				/* ------------- retorna o numero total de funcionarios da coordenação ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 4');
				$dados["numero_coordenacao"] = $query->num_rows();
				/* ------------- retorna o numero total de docentes ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 5');
				$dados["numero_docentes"] = $query->num_rows();
				/* ---------------------------------------------------------------- */
				/* ------------- retorna o numero total de docentes ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 7');
				$dados["numero_sg"] = $query->num_rows();
				/* ---------------------------------------------------------------- */
				/* ------------- retorna o numero total de docentes ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 8');
				$dados["numero_seguraca"] = $query->num_rows();
				/* ---------------------------------------------------------------- */
				$this->load->view('layout/cabecalho_rh');
				$this->load->view('layout/menu_lateral_rh');
				$this->load->view('conteudo/conteudo_rh', $dados);
				$this->load->view('layout/modal_funcionario');
				$this->load->view('layout/rodape');
				$this->load->view('layout/script');
			}elseif($this->session->userdata('nivel_acesso')==='4'){
				/* --------------- retorna o numero total de alunos --------------- */
				$query = $this->db->query('SELECT * FROM aluno');
				$dados["numero_alunos"] = $query->num_rows();
				/* --------------- retorna o numero total de turmas --------------- */
				$query = $this->db->query('SELECT * FROM turma');
				$dados["numero_turmas"] = $query->num_rows();
				/* ------------- retorna o numero total de matriculas ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 5');
				$dados["numero_professores"] = $query->num_rows();
				/* ------------- retorna o numero total de matriculas ------------- */
				$query = $this->db->query('SELECT * FROM sala');
				$dados["numero_salas"] = $query->num_rows();
				/* ------------------------------------------------------------------------- */
				$this->load->view('layout/cabecalho');
				$this->load->view('layout/menu_lateral_coordenacao');
				$this->load->view('conteudo/conteudo_coordenaccao', $dados);
				$this->load->view('layout/modal_funcionario');
				$this->load->view('layout/rodape');
				$this->load->view('layout/script');
			} elseif($this->session->userdata('nivel_acesso')==='5'){
				$id = $this->session->userdata('id_funcionario');
				// ==============================================================================================================================
				$this->db->select('*');																// Selecione tudo 
				$this->db->from('prof_turma');														// Da tbl matricula
				$this->db->where('funcionario_id', $id);											// Onde o ID igual ao ID do aluno selecionado
				$this->db->order_by("ano_let", "desc");  											// Orden
				$this->db->join('anolectivo', 'anolectivo.id_ano = prof_turma.anolectivo_id');		// Join tbl anolectivo
				$this->db->join('turma', 'turma.id_turma = prof_turma.turma_id');					// Join tbl anolectivo
				$this->db->join('classe', 'classe.id_classe = turma.classe_id');					// Join tbl anolectivo
				$this->db->join('sala', 'sala.id_sala = turma.sala_id');							// Join tbl anolectivo
				$this->db->join('periodo', 'periodo.id_periodo = turma.periodo_id');				// Join tbl anolectivo
				$dados ["prof_turma"] = $this->db->get()->result();									// Join Matricula
				// ==============================================================================================================================
				$this->load->view('layout/cabecalho');
				$this->load->view('layout/menu_lateral_docente');
				$this->load->view('conteudo/conteudo_docente', $dados);
				$this->load->view('layout/modal_funcionario');
				$this->load->view('layout/rodape');	
				$this->load->view('layout/script');
			} elseif($this->session->userdata('nivel_acesso')==='6'){
				$this->load->view('layout/cabecalho');
				$this->load->view('layout/menu_lateral');
				$this->load->view('conteudo/conteudo_admin');
				$this->load->view('layout/modal_funcionario');
				$this->load->view('layout/rodape');
				$this->load->view('layout/script');
			}
		}
	}
	/* ==================================================== carrega o painel da secretaria ==================================================== */ 
	public	function secretaria()
	{
		if($this->session->userdata('nivel_acesso')==='2')
		{			
			/* --------------- retorna o numero total de alunos --------------- */
			$query = $this->db->query('SELECT * FROM aluno');
			$dados["numero_alunos"] = $query->num_rows();
			/* --------------- retorna o numero total de turmas --------------- */
			$query = $this->db->query('SELECT * FROM turma');
			$dados["numero_turmas"] = $query->num_rows();
			/* ------------- retorna o numero total de matriculas ------------- */
			$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 5');
			$dados["numero_professores"] = $query->num_rows();
			/* ------------- retorna o numero total de matriculas ------------- */
			$query = $this->db->query('SELECT * FROM sala');
			$dados["numero_salas"] = $query->num_rows();
			/* ------------------------------------------------------------------------- */
			$this->load->view('layout/cabecalho_secretaria');
			$this->load->view('layout/menu_lateral_secretaria');
			$this->load->view('conteudo/conteudo_secretaria', $dados);
			$this->load->view('layout/modal_funcionario');
			$this->load->view('layout/rodape');	
			$this->load->view('layout/script');
		} else {
			if($this->session->userdata('nivel_acesso')==='1'){			
				$this->load->view('layout/cabecalho_secretaria');
				$this->load->view('layout/menu_lateral_direccao');
				$this->load->view('conteudo/conteudo');
				$this->load->view('layout/modal_funcionario');
				$this->load->view('layout/rodape');
				$this->load->view('layout/script');
			}elseif($this->session->userdata('nivel_acesso')==='3'){
				/* ------------- retorna o numero total de funcionarios da direccao ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 1');
				$dados["numero_direccao"] = $query->num_rows();
				/* ------------- retorna o numero total de funcionarios da secretaria ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 2');
				$dados["numero_secretaria"] = $query->num_rows();
				/* ------------- retorna o numero total de funcionarios do rh ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 3');
				$dados["numero_rh"] = $query->num_rows();
				/* ------------- retorna o numero total de funcionarios da coordenação ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 4');
				$dados["numero_coordenacao"] = $query->num_rows();
				/* ------------- retorna o numero total de docentes ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 5');
				$dados["numero_docentes"] = $query->num_rows();
				/* ---------------------------------------------------------------- */
				/* ------------- retorna o numero total de docentes ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 7');
				$dados["numero_sg"] = $query->num_rows();
				/* ---------------------------------------------------------------- */
				/* ------------- retorna o numero total de docentes ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 8');
				$dados["numero_seguraca"] = $query->num_rows();
				/* ---------------------------------------------------------------- */
				$this->load->view('layout/cabecalho_rh');
				$this->load->view('layout/menu_lateral_rh');
				$this->load->view('conteudo/conteudo_rh', $dados);
				$this->load->view('layout/modal_funcionario');
				$this->load->view('layout/rodape');
				$this->load->view('layout/script');
			}elseif($this->session->userdata('nivel_acesso')==='4'){
				/* --------------- retorna o numero total de alunos --------------- */
				$query = $this->db->query('SELECT * FROM aluno');
				$dados["numero_alunos"] = $query->num_rows();
				/* --------------- retorna o numero total de turmas --------------- */
				$query = $this->db->query('SELECT * FROM turma');
				$dados["numero_turmas"] = $query->num_rows();
				/* ------------- retorna o numero total de matriculas ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 5');
				$dados["numero_professores"] = $query->num_rows();
				/* ------------- retorna o numero total de matriculas ------------- */
				$query = $this->db->query('SELECT * FROM sala');
				$dados["numero_salas"] = $query->num_rows();
				/* ------------------------------------------------------------------------- */
				$this->load->view('layout/cabecalho');
				$this->load->view('layout/menu_lateral_coordenacao');
				$this->load->view('conteudo/conteudo_coordenaccao', $dados);
				$this->load->view('layout/modal_funcionario');
				$this->load->view('layout/rodape');
				$this->load->view('layout/script');
			} elseif($this->session->userdata('nivel_acesso')==='5'){
				$id = $this->session->userdata('id_funcionario');
				// ==============================================================================================================================
				$this->db->select('*');																// Selecione tudo 
				$this->db->from('prof_turma');														// Da tbl matricula
				$this->db->where('funcionario_id', $id);											// Onde o ID igual ao ID do aluno selecionado
				$this->db->order_by("ano_let", "desc");  											// Orden
				$this->db->join('anolectivo', 'anolectivo.id_ano = prof_turma.anolectivo_id');		// Join tbl anolectivo
				$this->db->join('turma', 'turma.id_turma = prof_turma.turma_id');					// Join tbl anolectivo
				$this->db->join('classe', 'classe.id_classe = turma.classe_id');					// Join tbl anolectivo
				$this->db->join('sala', 'sala.id_sala = turma.sala_id');							// Join tbl anolectivo
				$this->db->join('periodo', 'periodo.id_periodo = turma.periodo_id');				// Join tbl anolectivo
				$dados ["prof_turma"] = $this->db->get()->result();									// Join Matricula
				// ==============================================================================================================================
				$this->load->view('layout/cabecalho');
				$this->load->view('layout/menu_lateral_docente');
				$this->load->view('conteudo/conteudo_docente', $dados);
				$this->load->view('layout/modal_funcionario');
				$this->load->view('layout/rodape');	
				$this->load->view('layout/script');
			} elseif($this->session->userdata('nivel_acesso')==='6'){
				$this->load->view('layout/cabecalho');
				$this->load->view('layout/menu_lateral');
				$this->load->view('conteudo/conteudo_admin');
				$this->load->view('layout/modal_funcionario');
				$this->load->view('layout/rodape');
				$this->load->view('layout/script');
			}
		}
	}
	/* ======================================================= carrega o painel direcção ======================================================= */ 
	public function recursos_humanos()
	{
		if($this->session->userdata('nivel_acesso')==='3')
		{
			/* ------------- retorna o numero total de funcionarios da direccao ------------- */
			$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 1');
			$dados["numero_direccao"] = $query->num_rows();
			/* ------------- retorna o numero total de funcionarios da secretaria ------------- */
			$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 2');
			$dados["numero_secretaria"] = $query->num_rows();
			/* ------------- retorna o numero total de funcionarios do rh ------------- */
			$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 3');
			$dados["numero_rh"] = $query->num_rows();
			/* ------------- retorna o numero total de funcionarios da coordenação ------------- */
			$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 4');
			$dados["numero_coordenacao"] = $query->num_rows();
			/* ------------- retorna o numero total de docentes ------------- */
			$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 5');
			$dados["numero_docentes"] = $query->num_rows();
			/* ---------------------------------------------------------------- */
			/* ------------- retorna o numero total de docentes ------------- */
			$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 7');
			$dados["numero_sg"] = $query->num_rows();
			/* ---------------------------------------------------------------- */
			/* ------------- retorna o numero total de docentes ------------- */
			$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 8');
			$dados["numero_seguraca"] = $query->num_rows();
			/* ---------------------------------------------------------------- */
			$this->load->view('layout/cabecalho_rh');
			$this->load->view('layout/menu_lateral_rh');
			$this->load->view('conteudo/conteudo_rh', $dados);
			$this->load->view('layout/modal_funcionario');
			$this->load->view('layout/rodape');
			$this->load->view('layout/script');
		} else {
			if($this->session->userdata('nivel_acesso')==='1'){
				$this->load->view('layout/cabecalho_secretaria');
				$this->load->view('layout/menu_lateral_direccao');
				$this->load->view('conteudo/conteudo');
				$this->load->view('layout/modal_funcionario');
				$this->load->view('layout/rodape');
				$this->load->view('layout/script');
			}elseif($this->session->userdata('nivel_acesso')==='2'){			
				/* --------------- retorna o numero total de alunos --------------- */
				$query = $this->db->query('SELECT * FROM aluno');
				$dados["numero_alunos"] = $query->num_rows();
				/* --------------- retorna o numero total de turmas --------------- */
				$query = $this->db->query('SELECT * FROM turma');
				$dados["numero_turmas"] = $query->num_rows();
				/* ------------- retorna o numero total de matriculas ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 5');
				$dados["numero_professores"] = $query->num_rows();
				/* ------------- retorna o numero total de matriculas ------------- */
				$query = $this->db->query('SELECT * FROM sala');
				$dados["numero_salas"] = $query->num_rows();
				/* ------------------------------------------------------------------------- */
				$this->load->view('layout/cabecalho_secretaria');
				$this->load->view('layout/menu_lateral_secretaria');
				$this->load->view('conteudo/conteudo_secretaria', $dados);
				$this->load->view('layout/modal_funcionario');
				$this->load->view('layout/rodape');	
				$this->load->view('layout/script');
			}elseif($this->session->userdata('nivel_acesso')==='4'){
				/* --------------- retorna o numero total de alunos --------------- */
				$query = $this->db->query('SELECT * FROM aluno');
				$dados["numero_alunos"] = $query->num_rows();
				/* --------------- retorna o numero total de turmas --------------- */
				$query = $this->db->query('SELECT * FROM turma');
				$dados["numero_turmas"] = $query->num_rows();
				/* ------------- retorna o numero total de matriculas ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 5');
				$dados["numero_professores"] = $query->num_rows();
				/* ------------- retorna o numero total de matriculas ------------- */
				$query = $this->db->query('SELECT * FROM sala');
				$dados["numero_salas"] = $query->num_rows();
				/* ------------------------------------------------------------------------- */
				$this->load->view('layout/cabecalho');
				$this->load->view('layout/menu_lateral_coordenacao');
				$this->load->view('conteudo/conteudo_coordenaccao', $dados);
				$this->load->view('layout/modal_funcionario');
				$this->load->view('layout/rodape');
				$this->load->view('layout/script');
			} elseif($this->session->userdata('nivel_acesso')==='5'){
				$id = $this->session->userdata('id_funcionario');
				// ==============================================================================================================================
				$this->db->select('*');																// Selecione tudo 
				$this->db->from('prof_turma');														// Da tbl matricula
				$this->db->where('funcionario_id', $id);											// Onde o ID igual ao ID do aluno selecionado
				$this->db->order_by("ano_let", "desc");  											// Orden
				$this->db->join('anolectivo', 'anolectivo.id_ano = prof_turma.anolectivo_id');		// Join tbl anolectivo
				$this->db->join('turma', 'turma.id_turma = prof_turma.turma_id');					// Join tbl anolectivo
				$this->db->join('classe', 'classe.id_classe = turma.classe_id');					// Join tbl anolectivo
				$this->db->join('sala', 'sala.id_sala = turma.sala_id');							// Join tbl anolectivo
				$this->db->join('periodo', 'periodo.id_periodo = turma.periodo_id');				// Join tbl anolectivo
				$dados ["prof_turma"] = $this->db->get()->result();									// Join Matricula
				// ==============================================================================================================================
				$this->load->view('layout/cabecalho');
				$this->load->view('layout/menu_lateral_docente');
				$this->load->view('conteudo/conteudo_docente', $dados);
				$this->load->view('layout/modal_funcionario');
				$this->load->view('layout/rodape');	
				$this->load->view('layout/script');
			} elseif($this->session->userdata('nivel_acesso')==='6'){
				$this->load->view('layout/cabecalho');
				$this->load->view('layout/menu_lateral');
				$this->load->view('conteudo/conteudo_admin');
				$this->load->view('layout/modal_funcionario');
				$this->load->view('layout/rodape');
				$this->load->view('layout/script');
			}
		}
	}
	/* ==================================================== carrega o painel direcção ==================================================== */ 
	public function coordenacao()
	{
		if($this->session->userdata('nivel_acesso')==='4')
		{
			/* --------------- retorna o numero total de alunos --------------- */
			$query = $this->db->query('SELECT * FROM aluno');
			$dados["numero_alunos"] = $query->num_rows();
			/* --------------- retorna o numero total de turmas --------------- */
			$query = $this->db->query('SELECT * FROM turma');
			$dados["numero_turmas"] = $query->num_rows();
			/* ------------- retorna o numero total de matriculas ------------- */
			$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 5');
			$dados["numero_professores"] = $query->num_rows();
			/* ------------- retorna o numero total de matriculas ------------- */
			$query = $this->db->query('SELECT * FROM sala');
			$dados["numero_salas"] = $query->num_rows();
			/* ------------------------------------------------------------------------- */
			$this->load->view('layout/cabecalho');
			$this->load->view('layout/menu_lateral_coordenacao');
			$this->load->view('conteudo/conteudo_coordenaccao', $dados);
			$this->load->view('layout/modal_funcionario');
			$this->load->view('layout/rodape');
			$this->load->view('layout/script');
		} else {
			if($this->session->userdata('nivel_acesso')==='1'){
				$this->load->view('layout/cabecalho_secretaria');
				$this->load->view('layout/menu_lateral_direccao');
				$this->load->view('conteudo/conteudo');
				$this->load->view('layout/modal_funcionario');
				$this->load->view('layout/rodape');
				$this->load->view('layout/script');
			}elseif($this->session->userdata('nivel_acesso')==='2'){			
				/* --------------- retorna o numero total de alunos --------------- */
				$query = $this->db->query('SELECT * FROM aluno');
				$dados["numero_alunos"] = $query->num_rows();
				/* --------------- retorna o numero total de turmas --------------- */
				$query = $this->db->query('SELECT * FROM turma');
				$dados["numero_turmas"] = $query->num_rows();
				/* ------------- retorna o numero total de matriculas ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 5');
				$dados["numero_professores"] = $query->num_rows();
				/* ------------- retorna o numero total de matriculas ------------- */
				$query = $this->db->query('SELECT * FROM sala');
				$dados["numero_salas"] = $query->num_rows();
				/* ------------------------------------------------------------------------- */
				$this->load->view('layout/cabecalho_secretaria');
				$this->load->view('layout/menu_lateral_secretaria');
				$this->load->view('conteudo/conteudo_secretaria', $dados);
				$this->load->view('layout/modal_funcionario');
				$this->load->view('layout/rodape');	
				$this->load->view('layout/script');
			}elseif($this->session->userdata('nivel_acesso')==='3'){
				/* ------------- retorna o numero total de funcionarios da direccao ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 1');
				$dados["numero_direccao"] = $query->num_rows();
				/* ------------- retorna o numero total de funcionarios da secretaria ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 2');
				$dados["numero_secretaria"] = $query->num_rows();
				/* ------------- retorna o numero total de funcionarios do rh ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 3');
				$dados["numero_rh"] = $query->num_rows();
				/* ------------- retorna o numero total de funcionarios da coordenação ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 4');
				$dados["numero_coordenacao"] = $query->num_rows();
				/* ------------- retorna o numero total de docentes ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 5');
				$dados["numero_docentes"] = $query->num_rows();
				/* ---------------------------------------------------------------- */
				/* ------------- retorna o numero total de docentes ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 7');
				$dados["numero_sg"] = $query->num_rows();
				/* ---------------------------------------------------------------- */
				/* ------------- retorna o numero total de docentes ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 8');
				$dados["numero_seguraca"] = $query->num_rows();
				/* ---------------------------------------------------------------- */
				$this->load->view('layout/cabecalho_rh');
				$this->load->view('layout/menu_lateral_rh');
				$this->load->view('conteudo/conteudo_rh', $dados);
				$this->load->view('layout/modal_funcionario');
				$this->load->view('layout/rodape');
				$this->load->view('layout/script');
			} elseif($this->session->userdata('nivel_acesso')==='5'){
				$id = $this->session->userdata('id_funcionario');
				// ==============================================================================================================================
				$this->db->select('*');																// Selecione tudo 
				$this->db->from('prof_turma');														// Da tbl matricula
				$this->db->where('funcionario_id', $id);											// Onde o ID igual ao ID do aluno selecionado
				$this->db->order_by("ano_let", "desc");  											// Orden
				$this->db->join('anolectivo', 'anolectivo.id_ano = prof_turma.anolectivo_id');		// Join tbl anolectivo
				$this->db->join('turma', 'turma.id_turma = prof_turma.turma_id');					// Join tbl anolectivo
				$this->db->join('classe', 'classe.id_classe = turma.classe_id');					// Join tbl anolectivo
				$this->db->join('sala', 'sala.id_sala = turma.sala_id');							// Join tbl anolectivo
				$this->db->join('periodo', 'periodo.id_periodo = turma.periodo_id');				// Join tbl anolectivo
				$dados ["prof_turma"] = $this->db->get()->result();									// Join Matricula
				// ==============================================================================================================================
				$this->load->view('layout/cabecalho');
				$this->load->view('layout/menu_lateral_docente');
				$this->load->view('conteudo/conteudo_docente', $dados);
				$this->load->view('layout/modal_funcionario');
				$this->load->view('layout/rodape');	
				$this->load->view('layout/script');
			} elseif($this->session->userdata('nivel_acesso')==='6'){
				$this->load->view('layout/cabecalho');
				$this->load->view('layout/menu_lateral');
				$this->load->view('conteudo/conteudo_admin');
				$this->load->view('layout/modal_funcionario');
				$this->load->view('layout/rodape');
				$this->load->view('layout/script');
			}
		}
	}
	/* ======================================== carrega o painel docente ======================================== */ 
	public function docente()
	{
		if($this->session->userdata('nivel_acesso')==='5')
		{
			$id = $this->session->userdata('id_funcionario');
			// ==============================================================================================================================
			$this->db->select('*');																// Selecione tudo 
			$this->db->from('prof_turma');														// Da tbl matricula
			$this->db->where('funcionario_id', $id);											// Onde o ID igual ao ID do aluno selecionado
			$this->db->order_by("ano_let", "desc");  											// Orden
			$this->db->join('anolectivo', 'anolectivo.id_ano = prof_turma.anolectivo_id');		// Join tbl anolectivo
			$this->db->join('turma', 'turma.id_turma = prof_turma.turma_id');					// Join tbl anolectivo
			$this->db->join('classe', 'classe.id_classe = turma.classe_id');					// Join tbl anolectivo
			$this->db->join('sala', 'sala.id_sala = turma.sala_id');							// Join tbl anolectivo
			$this->db->join('periodo', 'periodo.id_periodo = turma.periodo_id');				// Join tbl anolectivo
			$dados ["prof_turma"] = $this->db->get()->result();									// Join Matricula
			// ==============================================================================================================================
			$this->load->view('layout/cabecalho');
			$this->load->view('layout/menu_lateral_docente');
			$this->load->view('conteudo/conteudo_docente', $dados);
			$this->load->view('layout/modal_funcionario');
			$this->load->view('layout/rodape');	
			$this->load->view('layout/script');
		} else {
			if($this->session->userdata('nivel_acesso')==='1'){
				$this->load->view('layout/cabecalho_secretaria');
				$this->load->view('layout/menu_lateral_direccao');
				$this->load->view('conteudo/conteudo');
				$this->load->view('layout/modal_funcionario');
				$this->load->view('layout/rodape');
				$this->load->view('layout/script');
			}elseif($this->session->userdata('nivel_acesso')==='2'){			
				/* --------------- retorna o numero total de alunos --------------- */
				$query = $this->db->query('SELECT * FROM aluno');
				$dados["numero_alunos"] = $query->num_rows();
				/* --------------- retorna o numero total de turmas --------------- */
				$query = $this->db->query('SELECT * FROM turma');
				$dados["numero_turmas"] = $query->num_rows();
				/* ------------- retorna o numero total de matriculas ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 5');
				$dados["numero_professores"] = $query->num_rows();
				/* ------------- retorna o numero total de matriculas ------------- */
				$query = $this->db->query('SELECT * FROM sala');
				$dados["numero_salas"] = $query->num_rows();
				/* ------------------------------------------------------------------------- */
				$this->load->view('layout/cabecalho_secretaria');
				$this->load->view('layout/menu_lateral_secretaria');
				$this->load->view('conteudo/conteudo_secretaria', $dados);
				$this->load->view('layout/modal_funcionario');
				$this->load->view('layout/rodape');	
				$this->load->view('layout/script');
			}elseif($this->session->userdata('nivel_acesso')==='3'){
				/* ------------- retorna o numero total de funcionarios da direccao ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 1');
				$dados["numero_direccao"] = $query->num_rows();
				/* ------------- retorna o numero total de funcionarios da secretaria ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 2');
				$dados["numero_secretaria"] = $query->num_rows();
				/* ------------- retorna o numero total de funcionarios do rh ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 3');
				$dados["numero_rh"] = $query->num_rows();
				/* ------------- retorna o numero total de funcionarios da coordenação ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 4');
				$dados["numero_coordenacao"] = $query->num_rows();
				/* ------------- retorna o numero total de docentes ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 5');
				$dados["numero_docentes"] = $query->num_rows();
				/* ---------------------------------------------------------------- */
				/* ------------- retorna o numero total de docentes ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 7');
				$dados["numero_sg"] = $query->num_rows();
				/* ---------------------------------------------------------------- */
				/* ------------- retorna o numero total de docentes ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 8');
				$dados["numero_seguraca"] = $query->num_rows();
				/* ---------------------------------------------------------------- */
				$this->load->view('layout/cabecalho_rh');
				$this->load->view('layout/menu_lateral_rh');
				$this->load->view('conteudo/conteudo_rh', $dados);
				$this->load->view('layout/modal_funcionario');
				$this->load->view('layout/rodape');
				$this->load->view('layout/script');
			}elseif($this->session->userdata('nivel_acesso')==='4'){
				/* --------------- retorna o numero total de alunos --------------- */
				$query = $this->db->query('SELECT * FROM aluno');
				$dados["numero_alunos"] = $query->num_rows();
				/* --------------- retorna o numero total de turmas --------------- */
				$query = $this->db->query('SELECT * FROM turma');
				$dados["numero_turmas"] = $query->num_rows();
				/* ------------- retorna o numero total de matriculas ------------- */
				$query = $this->db->query('SELECT * FROM funcionario WHERE nivel_acesso = 5');
				$dados["numero_professores"] = $query->num_rows();
				/* ------------- retorna o numero total de matriculas ------------- */
				$query = $this->db->query('SELECT * FROM sala');
				$dados["numero_salas"] = $query->num_rows();
				/* ------------------------------------------------------------------------- */
				$this->load->view('layout/cabecalho');
				$this->load->view('layout/menu_lateral_coordenacao');
				$this->load->view('conteudo/conteudo_coordenaccao', $dados);
				$this->load->view('layout/modal_funcionario');
				$this->load->view('layout/rodape');
				$this->load->view('layout/script');
			} elseif($this->session->userdata('nivel_acesso')==='6'){
				$this->load->view('layout/cabecalho');
				$this->load->view('layout/menu_lateral');
				$this->load->view('conteudo/conteudo_admin');
				$this->load->view('layout/modal_funcionario');
				$this->load->view('layout/rodape');
				$this->load->view('layout/script');
			}
		}
	}
}