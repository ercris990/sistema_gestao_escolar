<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listagem extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		if($this->session->userdata('logged_in') !== TRUE)
		{
			redirect('/');
		}
	}
	/*-------------------------- LISTA NOMINAL --------------------------*/ 
	public function index()
	{
		$dados["options_anos"] 	 	  = $this->Ano_Model->selectAnos();
		$dados["options_turmas"] 	  = $this->Turmas_Model->selectTurmas();
		/* ------------------------------------------------------------------------- */
		$this->load->view('layout/cabecalho_secretaria');
		$this->load->view('layout/menu_lateral_secretaria');
		$this->load->view('conteudo/_secretaria/_listagem/listagem', $dados);
		$this->load->view('layout/rodape');	
		$this->load->view('layout/script');
	}
	/*-------------------------- MINI-PAUTAS --------------------------*/ 
	public function mini_pautas()
	{
		$dados["options_anos"] 	 	  = $this->Ano_Model->selectAnos();
		$dados["options_turmas"] 	  = $this->Turmas_Model->selectTurmas();
		/* ------------------------------------------------------------------------- */
		$this->load->view('layout/cabecalho');
		$this->load->view('layout/menu_lateral_coordenacao');
		$this->load->view('conteudo/_secretaria/_listagem/mini_pautas', $dados);
		$this->load->view('layout/rodape');	
		$this->load->view('layout/script');
	}
	/*					 							listar alunos/ano/turma
	==================================================================================================================*/
	public function listar_turma($anolectivo, $turma, $prof)
	{
		$this->db->select('*');													  					// select tudo
		$this->db->from('matricula');												 				// da tbl matricula
		$this->db->where("anolectivo_id", $anolectivo);												// onde
        $this->db->where("turma_id", $turma);									 					// onde
		$this->db->join('turma', 'turma.id_turma = matricula.turma_id');							// join turma e matricula
		$this->db->join('classe', 'classe.id_classe = turma.classe_id');							// Join tbl classe [turma]
		$this->db->join('anolectivo', 'anolectivo.id_ano = matricula.anolectivo_id');				// join ano lectivo e matricula
		$this->db->join('periodo', 'periodo.id_periodo = turma.periodo_id');						// join periodo e turma
		$dados["listagem_alunos"] = $this->db->get()->row();										// retorna 1 linha
		if ( empty($dados["listagem_alunos"]) )
		{
			echo $this->session->set_flashdata('msg',"<div class='alert alert-warning text-center'>NÃO EXISTEM ALUNOS MATRICULADOS NA TURMA E ANO LECTIVO SELECIONADO</div>");	
			redirect('secretaria/professor/turmas_professor_coordenacao/'.$prof);
		}
		elseif  ( !empty($dados["listagem_alunos"]) )
		{
			$this->db->select('*');																		// select tudo
			$this->db->from('matricula');																// da tbl matricula
			$this->db->where("anolectivo_id", $anolectivo);												// onde
        	$this->db->where("turma_id", $turma);														// onde 
			$this->db->order_by("nome", "asc");  														// Ordenar a travez do nome
			$this->db->join('aluno', 'aluno.id_aluno = matricula.aluno_id');		 					// Join aluno e matricula
        	$this->db->join('anolectivo', 'anolectivo.id_ano = matricula.anolectivo_id'); 				// Join anolectivo e matricula
			$this->db->join('turma', 'turma.id_turma = matricula.turma_id');		 					// Join turma e matricula
			$dados['alunos'] = $this->db->get()->result();												// retorna várias linhas
			/* ===========================================================================================================*/
			$this->db->select('*');													  					// select tudo
			$this->db->from('prof_turma');												 				// da tbl matricula
			$this->db->where("anolectivo_id", $anolectivo);												// onde
			$this->db->where("turma_id", $turma);									 					// onde
			$this->db->join('funcionario', 'funcionario.id_funcionario = prof_turma.funcionario_id');	// join ano lectivo e matricula
			$dados["prof"] = $this->db->get()->row();													// retorna 1 linha
			/* ===========================================================================================================*/
			$this->load->view('layout/cabecalho');
			$this->load->view('layout/menu_lateral_secretaria');
			$this->load->view('conteudo/_secretaria/_listagem/listar_turma', $dados);
			$this->load->view('layout/rodape');
			$this->load->view('layout/script');
		}
	}
	public function listar_turma_secretaria($anolectivo, $turma, $prof)
	{
		$this->db->select('*');													  					// select tudo
		$this->db->from('matricula');												 				// da tbl matricula
		$this->db->where("anolectivo_id", $anolectivo);												// onde
        $this->db->where("turma_id", $turma);									 					// onde
		$this->db->join('turma', 'turma.id_turma = matricula.turma_id');							// join turma e matricula
		$this->db->join('classe', 'classe.id_classe = turma.classe_id');							// Join tbl classe [turma]
		$this->db->join('anolectivo', 'anolectivo.id_ano = matricula.anolectivo_id');				// join ano lectivo e matricula
		$this->db->join('periodo', 'periodo.id_periodo = turma.periodo_id');						// join periodo e turma
		$dados["listagem_alunos"] = $this->db->get()->row();										// retorna 1 linha
		if ( empty($dados["listagem_alunos"]) )
		{
			echo $this->session->set_flashdata('msg',"<div class='alert alert-warning text-center'>NÃO EXISTEM ALUNOS MATRICULADOS NA TURMA E ANO LECTIVO SELECIONADO</div>");	
			redirect('secretaria/professor/turmas_professor/'.$prof);
		}
		elseif  ( !empty($dados["listagem_alunos"]) )
		{
			$this->db->select('*');																		// select tudo
			$this->db->from('matricula');																// da tbl matricula
			$this->db->where("anolectivo_id", $anolectivo);												// onde
        	$this->db->where("turma_id", $turma);														// onde 
			$this->db->order_by("nome", "asc");  														// Ordenar a travez do nome
			$this->db->join('aluno', 'aluno.id_aluno = matricula.aluno_id');		 					// Join aluno e matricula
        	$this->db->join('anolectivo', 'anolectivo.id_ano = matricula.anolectivo_id'); 				// Join anolectivo e matricula
			$this->db->join('turma', 'turma.id_turma = matricula.turma_id');		 					// Join turma e matricula
			$dados['alunos'] = $this->db->get()->result();												// retorna várias linhas
			/* ===========================================================================================================*/
			$this->db->select('*');													  					// select tudo
			$this->db->from('prof_turma');												 				// da tbl matricula
			$this->db->where("anolectivo_id", $anolectivo);												// onde
			$this->db->where("turma_id", $turma);									 					// onde
			$this->db->join('funcionario', 'funcionario.id_funcionario = prof_turma.funcionario_id');	// join ano lectivo e matricula
			$dados["prof"] = $this->db->get()->row();													// retorna 1 linha
			/* ===========================================================================================================*/
			$this->load->view('layout/cabecalho');
			$this->load->view('layout/menu_lateral_secretaria');
			$this->load->view('conteudo/_secretaria/_listagem/listar_turma', $dados);
			$this->load->view('layout/rodape');
			$this->load->view('layout/script');
		}
	}
	public function listar_turma_docente($anolectivo, $turma)
	{
		$this->db->select('*');													  					// select tudo
		$this->db->from('matricula');												 				// da tbl matricula
		$this->db->where("anolectivo_id", $anolectivo);												// onde
        $this->db->where("turma_id", $turma);									 					// onde
		$this->db->join('turma', 'turma.id_turma = matricula.turma_id');							// join turma e matricula
		$this->db->join('classe', 'classe.id_classe = turma.classe_id');							// Join tbl classe [turma]
		$this->db->join('anolectivo', 'anolectivo.id_ano = matricula.anolectivo_id');				// join ano lectivo e matricula
		$this->db->join('periodo', 'periodo.id_periodo = turma.periodo_id');						// join periodo e turma
		$dados["listagem_alunos"] = $this->db->get()->row();										// retorna 1 linha
		if ( empty($dados["listagem_alunos"]) )
		{
			echo $this->session->set_flashdata('msg',"<div class='alert alert-warning text-center'>NÃO EXISTEM ALUNOS MATRICULADOS NA TURMA E ANO LECTIVO SELECIONADO</div>");	
			redirect('home/docente');
		}
		elseif  ( !empty($dados["listagem_alunos"]) )
		{
			$this->db->select('*');																		// select tudo
			$this->db->from('matricula');																// da tbl matricula
			$this->db->where("anolectivo_id", $anolectivo);												// onde
	        $this->db->where("turma_id", $turma);														// onde 
			$this->db->order_by("nome", "asc");  														// Ordenar a travez do nome
			$this->db->join('aluno', 'aluno.id_aluno = matricula.aluno_id');		 					// Join aluno e matricula
	        $this->db->join('anolectivo', 'anolectivo.id_ano = matricula.anolectivo_id'); 				// Join anolectivo e matricula
			$this->db->join('turma', 'turma.id_turma = matricula.turma_id');		 					// Join turma e matricula
			$dados['alunos'] = $this->db->get()->result();												// retorna várias linhas
			/* ===========================================================================================================*/
			$this->db->select('*');													  					// select tudo
			$this->db->from('prof_turma');												 				// da tbl matricula
			$this->db->where("anolectivo_id", $anolectivo);												// onde
			$this->db->where("turma_id", $turma);									 					// onde
			$this->db->join('funcionario', 'funcionario.id_funcionario = prof_turma.funcionario_id');	// join ano lectivo e matricula
			$dados["prof"] = $this->db->get()->row();													// retorna 1 linha
			/* ===========================================================================================================*/
			$this->load->view('layout/cabecalho');
			$this->load->view('layout/menu_lateral_docente');
			$this->load->view('conteudo/_secretaria/_listagem/listar_turma', $dados);
			$this->load->view('layout/rodape');
			$this->load->view('layout/script');
		}
	}
	public function listar_turma_docente_coordenador($anolectivo, $turma)
	{
		$this->db->select('*');													  					// select tudo
		$this->db->from('matricula');												 				// da tbl matricula
		$this->db->where("anolectivo_id", $anolectivo);												// onde
        $this->db->where("turma_id", $turma);									 					// onde
		$this->db->join('turma', 'turma.id_turma = matricula.turma_id');							// join turma e matricula
		$this->db->join('classe', 'classe.id_classe = turma.classe_id');							// Join tbl classe [turma]
		$this->db->join('anolectivo', 'anolectivo.id_ano = matricula.anolectivo_id');				// join ano lectivo e matricula
		$this->db->join('periodo', 'periodo.id_periodo = turma.periodo_id');						// join periodo e turma
		$dados["listagem_alunos"] = $this->db->get()->row();										// retorna 1 linha
		if ( empty($dados["listagem_alunos"]) )
		{
			echo $this->session->set_flashdata('msg',"<div class='alert alert-warning text-center'>NÃO EXISTEM ALUNOS MATRICULADOS NA TURMA E ANO LECTIVO SELECIONADO</div>");	
			redirect('secretaria/professor/turma_coordenacao');
		}
		elseif  ( !empty($dados["listagem_alunos"]) )
		{
			$this->db->select('*');																		// select tudo
			$this->db->from('matricula');																// da tbl matricula
			$this->db->where("anolectivo_id", $anolectivo);												// onde
	        $this->db->where("turma_id", $turma);														// onde 
			$this->db->order_by("nome", "asc");  														// Ordenar a travez do nome
			$this->db->join('aluno', 'aluno.id_aluno = matricula.aluno_id');		 					// Join aluno e matricula
	        $this->db->join('anolectivo', 'anolectivo.id_ano = matricula.anolectivo_id'); 				// Join anolectivo e matricula
			$this->db->join('turma', 'turma.id_turma = matricula.turma_id');		 					// Join turma e matricula
			$dados['alunos'] = $this->db->get()->result();												// retorna várias linhas
			/* ===========================================================================================================*/
			$this->db->select('*');													  					// select tudo
			$this->db->from('prof_turma');												 				// da tbl matricula
			$this->db->where("anolectivo_id", $anolectivo);												// onde
			$this->db->where("turma_id", $turma);									 					// onde
			$this->db->join('funcionario', 'funcionario.id_funcionario = prof_turma.funcionario_id');	// join ano lectivo e matricula
			$dados["prof"] = $this->db->get()->row();													// retorna 1 linha
			/* ===========================================================================================================*/
			$this->load->view('layout/cabecalho');
			$this->load->view('layout/menu_lateral_coordenacao');
			$this->load->view('conteudo/_secretaria/_listagem/listar_turma', $dados);
			$this->load->view('layout/rodape');
			$this->load->view('layout/script');
		}
	}
	public function listar_assiduidade_turma($anolectivo, $turma)
	{
		$this->db->select('*');													  					// select tudo
		$this->db->from('matricula');												 				// da tbl matricula
		$this->db->where("anolectivo_id", $anolectivo);												// onde
        $this->db->where("turma_id", $turma);									 					// onde
		$this->db->join('turma', 'turma.id_turma = matricula.turma_id');							// join turma e matricula
		$this->db->join('classe', 'classe.id_classe = turma.classe_id');							// Join tbl classe [turma]
		$this->db->join('anolectivo', 'anolectivo.id_ano = matricula.anolectivo_id');				// join ano lectivo e matricula
		$this->db->join('periodo', 'periodo.id_periodo = turma.periodo_id');						// join periodo e turma
		$dados["listagem_alunos"] = $this->db->get()->row();										// retorna 1 linha
		if ( empty($dados["listagem_alunos"]) )
		{
			echo $this->session->set_flashdata('msg',"<div class='alert alert-warning text-center'>NÃO EXISTEM ALUNOS MATRICULADOS NA TURMA E ANO LECTIVO SELECIONADO</div>");
			redirect('home/docente');
		}
		elseif  ( !empty($dados["listagem_alunos"]) )
		{
			$this->db->select('*');																		// select tudo
			$this->db->from('matricula');																// da tbl matricula
			$this->db->where("anolectivo_id", $anolectivo);												// onde
        	$this->db->where("turma_id", $turma);														// onde 
			$this->db->order_by("nome", "asc");  														// Ordenar a travez do nome
			$this->db->join('aluno', 'aluno.id_aluno = matricula.aluno_id');		 					// Join aluno e matricula
        	$this->db->join('anolectivo', 'anolectivo.id_ano = matricula.anolectivo_id'); 				// Join anolectivo e matricula
			$this->db->join('turma', 'turma.id_turma = matricula.turma_id');		 					// Join turma e matricula
			$dados['alunos'] = $this->db->get()->result();												// retorna várias linhas
			/* ===========================================================================================================*/
			$this->db->select('*');													  					// select tudo
			$this->db->from('prof_turma');												 				// da tbl matricula
			$this->db->where("anolectivo_id", $anolectivo);												// onde
			$this->db->where("turma_id", $turma);									 					// onde
			$this->db->join('funcionario', 'funcionario.id_funcionario = prof_turma.funcionario_id');	// join ano lectivo e matricula
			$dados["prof"] = $this->db->get()->row();													// retorna 1 linha
			/* ===========================================================================================================*/
			$this->load->view('layout/cabecalho');
			$this->load->view('layout/menu_lateral_docente');
			$this->load->view('conteudo/_secretaria/_listagem/listar_assiduidade_turma', $dados);
			$this->load->view('layout/rodape');
			$this->load->view('layout/script');
		}
	}
	public function listar_assiduidade_turma_coordenador($anolectivo, $turma)
	{
		$this->db->select('*');													  					// select tudo
		$this->db->from('matricula');												 				// da tbl matricula
		$this->db->where("anolectivo_id", $anolectivo);												// onde
        $this->db->where("turma_id", $turma);									 					// onde
		$this->db->join('turma', 'turma.id_turma = matricula.turma_id');							// join turma e matricula
		$this->db->join('classe', 'classe.id_classe = turma.classe_id');							// Join tbl classe [turma]
		$this->db->join('anolectivo', 'anolectivo.id_ano = matricula.anolectivo_id');				// join ano lectivo e matricula
		$this->db->join('periodo', 'periodo.id_periodo = turma.periodo_id');						// join periodo e turma
		$dados["listagem_alunos"] = $this->db->get()->row();										// retorna 1 linha
		if ( empty($dados["listagem_alunos"]) )
		{
			echo $this->session->set_flashdata('msg',"<div class='alert alert-warning text-center'>NÃO EXISTEM ALUNOS MATRICULADOS NA TURMA E ANO LECTIVO SELECIONADO</div>");
			redirect('secretaria/professor/turma_coordenacao');
		}
		elseif  ( !empty($dados["listagem_alunos"]) )
		{
			$this->db->select('*');																		// select tudo
			$this->db->from('matricula');																// da tbl matricula
			$this->db->where("anolectivo_id", $anolectivo);												// onde
        	$this->db->where("turma_id", $turma);														// onde 
			$this->db->order_by("nome", "asc");  														// Ordenar a travez do nome
			$this->db->join('aluno', 'aluno.id_aluno = matricula.aluno_id');		 					// Join aluno e matricula
        	$this->db->join('anolectivo', 'anolectivo.id_ano = matricula.anolectivo_id'); 				// Join anolectivo e matricula
			$this->db->join('turma', 'turma.id_turma = matricula.turma_id');		 					// Join turma e matricula
			$dados['alunos'] = $this->db->get()->result();												// retorna várias linhas
			/* ===========================================================================================================*/
			$this->db->select('*');													  					// select tudo
			$this->db->from('prof_turma');												 				// da tbl matricula
			$this->db->where("anolectivo_id", $anolectivo);												// onde
			$this->db->where("turma_id", $turma);									 					// onde
			$this->db->join('funcionario', 'funcionario.id_funcionario = prof_turma.funcionario_id');	// join ano lectivo e matricula
			$dados["prof"] = $this->db->get()->row();													// retorna 1 linha
			/* ===========================================================================================================*/
			$this->load->view('layout/cabecalho');
			$this->load->view('layout/menu_lateral_docente');
			$this->load->view('conteudo/_secretaria/_listagem/listar_assiduidade_turma', $dados);
			$this->load->view('layout/rodape');
			$this->load->view('layout/script');
		}
	}
	public function mapa_assiduidade($anolectivo, $turma, $aluno)
	{
		$this->db->select('*');													  					// select tudo
		$this->db->from('assiduidade_alunos');												 		// da tbl matricula
		$this->db->where("anolectivo_id", $anolectivo);												// onde
        $this->db->where("turma_id", $turma);									 					// onde
        $this->db->where("aluno_id", $aluno);									 					// onde
		$this->db->join('aluno', 'aluno.id_aluno = assiduidade_alunos.aluno_id');					// join ano lectivo e matricula
		$this->db->join('anolectivo', 'anolectivo.id_ano = assiduidade_alunos.anolectivo_id');		// join ano lectivo e matricula
		$this->db->join('turma', 'turma.id_turma = assiduidade_alunos.turma_id');					// join turma e matricula
		$this->db->join('classe', 'classe.id_classe = turma.classe_id');							// Join tbl classe [turma]
		$this->db->join('periodo', 'periodo.id_periodo = turma.periodo_id');						// join periodo e turma
		$dados["listagem_alunos"] = $this->db->get()->row();										// retorna 1 linha
		/*			Total de Faltas 
		------------------------------------------------------------------------------------------------------------- */
		$this->db->select('*');													  					// select tudo
		$this->db->from('assiduidade_alunos');												 		// da tbl matricula
		$this->db->where("anolectivo_id", $anolectivo);												// filtro
        $this->db->where("turma_id", $turma);									 					// filtro
        $this->db->where("aluno_id", $aluno);									 					// filtro
        $this->db->where("falta", '1');									 							// filtro
		$dados["numero_faltas"] = $this->db->get()->num_rows();
		/*			Total de Falts Justificadas 
		------------------------------------------------------------------------------------------------------------- */
		$this->db->select('*');													  					// select tudo
		$this->db->from('assiduidade_alunos');												 		// da tbl matricula
		$this->db->where("anolectivo_id", $anolectivo);												// filtro
        $this->db->where("turma_id", $turma);									 					// filtro
        $this->db->where("aluno_id", $aluno);									 					// filtro
        $this->db->where("justificacao", '1');									 					// filtro
		$dados["faltas_justificadas"] = $this->db->get()->num_rows();
		/*			Total de Faltas Nao Justificadas 
		------------------------------------------------------------------------------------------------------------- */
		$this->db->select('*');													  					// select tudo
		$this->db->from('assiduidade_alunos');												 		// da tbl matricula
		$this->db->where("anolectivo_id", $anolectivo);												// filtro
        $this->db->where("turma_id", $turma);									 					// filtro
        $this->db->where("aluno_id", $aluno);									 					// filtro
        $this->db->where("justificacao", '0');									 					// filtro
		$dados["faltas_n_justificadas"] = $this->db->get()->num_rows();
		/* ------------------------------------------------------------------------------------------------------------- */
		if (empty($dados["listagem_alunos"]))
		{
			echo $this->session->set_flashdata('msg',"<div class='alert alert-warning text-center'>NEHUMA FALTA MARCADA AOS ALUNOS DESTA TURMA</div>");
			redirect('secretaria/listagem/listar_assiduidade_turma/'.$anolectivo.'/'.$turma);
		}
		elseif (!empty($dados["listagem_alunos"]))
		{
			$this->db->select('*');																		// select tudo
			$this->db->from('assiduidade_alunos');														// da tbl matricula
			$this->db->where("anolectivo_id", $anolectivo);												// onde
			$this->db->where("turma_id", $turma);														// onde 
			$this->db->where("aluno_id", $aluno);									 					// onde
			$this->db->order_by("data", "asc");  														// Ordenar a travez do nome
			$this->db->join('aluno', 'aluno.id_aluno = assiduidade_alunos.aluno_id');		 			// Join aluno e matricula
        	$this->db->join('anolectivo', 'anolectivo.id_ano = assiduidade_alunos.anolectivo_id'); 		// Join anolectivo e matricula
			$this->db->join('turma', 'turma.id_turma = assiduidade_alunos.turma_id');		 			// Join turma e matricula
			$dados['alunos'] = $this->db->get()->result();												// retorna várias linhas
			/* ===========================================================================================================*/
			$this->db->select('*');													  					// select tudo
			$this->db->from('prof_turma');												 				// da tbl matricula
			$this->db->where("anolectivo_id", $anolectivo);												// onde
			$this->db->where("turma_id", $turma);									 					// onde
			$this->db->join('funcionario', 'funcionario.id_funcionario = prof_turma.funcionario_id');	// join ano lectivo e matricula
			$dados["prof"] = $this->db->get()->row();													// retorna 1 linha
			/* ===========================================================================================================*/
			$this->load->view('layout/cabecalho');
			$this->load->view('layout/menu_lateral_docente');
			$this->load->view('conteudo/_secretaria/_listagem/mapa_assiduidade', $dados);
			$this->load->view('layout/modal_aluno');
			$this->load->view('layout/rodape');
			$this->load->view('layout/script');
		}
	}
	public function justificar_falta($id_assiduidade)
	{
		$this->db->select('*');													  					// select tudo
		$this->db->from('assiduidade_alunos');												 		// da tbl matricula
		$this->db->where("id_assiduidade", $id_assiduidade);												// onde
		$this->db->join('aluno', 'aluno.id_aluno = assiduidade_alunos.aluno_id');					// join ano lectivo e matricula
		$this->db->join('anolectivo', 'anolectivo.id_ano = assiduidade_alunos.anolectivo_id');		// join ano lectivo e matricula
		$this->db->join('turma', 'turma.id_turma = assiduidade_alunos.turma_id');					// join turma e matricula
		$this->db->join('classe', 'classe.id_classe = turma.classe_id');							// Join tbl classe [turma]
		$this->db->join('periodo', 'periodo.id_periodo = turma.periodo_id');						// join periodo e turma
		$dados["listagem_alunos"] = $this->db->get()->row();										// retorna 1 linha
		/* ------------------------------------------------------------------------------------------------------------- */
		$this->db->select('*');																		// select tudo
		$this->db->from('assiduidade_alunos');																// da tbl matricula
		$this->db->where("id_assiduidade", $id_assiduidade);												// onde
		$this->db->order_by("data", "asc");  														// Ordenar a travez do nome
		$this->db->join('aluno', 'aluno.id_aluno = assiduidade_alunos.aluno_id');		 					// Join aluno e matricula
		$this->db->join('anolectivo', 'anolectivo.id_ano = assiduidade_alunos.anolectivo_id'); 				// Join anolectivo e matricula
		$this->db->join('turma', 'turma.id_turma = assiduidade_alunos.turma_id');		 					// Join turma e matricula
		$dados['alunos'] = $this->db->get()->result();												// retorna várias linhas
		/* ===========================================================================================================*/
		$this->load->view('layout/cabecalho');
		$this->load->view('layout/menu_lateral_docente');
		$this->load->view('conteudo/_secretaria/_listagem/justificar_falta', $dados);
		$this->load->view('layout/modal_aluno');
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	public function mapa_assiduidade_geral($anolectivo, $turma)
	{
		$this->db->select('*');													  					// select tudo
		$this->db->from('assiduidade_alunos');												 		// da tbl matricula
		$this->db->where("anolectivo_id", $anolectivo);												// onde
    $this->db->where("turma_id", $turma);									 					// onde
		$this->db->join('aluno', 'aluno.id_aluno = assiduidade_alunos.aluno_id');					// join ano lectivo e matricula
		$this->db->join('anolectivo', 'anolectivo.id_ano = assiduidade_alunos.anolectivo_id');		// join ano lectivo e matricula
		$this->db->join('turma', 'turma.id_turma = assiduidade_alunos.turma_id');					// join turma e matricula
		$this->db->join('classe', 'classe.id_classe = turma.classe_id');							// Join tbl classe [turma]
		$this->db->join('periodo', 'periodo.id_periodo = turma.periodo_id');						// join periodo e turma
		$dados["listagem_alunos"] = $this->db->get()->row();										// retorna 1 linha
		/* ------------------------------------------------------------------------------------------------------------- */
		if (empty($dados["listagem_alunos"]))
		{
			echo $this->session->set_flashdata('msg',"<div class='alert alert-warning text-center'>NEHUMA FALTA MARCADA AOS ALUNOS DESTA TURMA</div>");
			redirect('secretaria/listagem/listar_assiduidade_turma/'.$anolectivo.'/'.$turma);
		}
		elseif (!empty($dados["listagem_alunos"]))
		{
			/* ===========================================================================================================*/
			$this->db->from('assiduidade_alunos');														// de notas disciplina
			$this->db->where("anolectivo_id", $anolectivo);												// filtro - anolectivo
			$this->db->where("turma_id", $turma);														// filtro - turma
			$this->db->join('aluno', 'aluno.id_aluno = assiduidade_alunos.aluno_id', 'left');			// join turma e matricula
			$this->db->group_by('assiduidade_alunos.aluno_id');											// agrupamento
			$this->db->order_by("nome", "asc");  												 		// Ordenar a travez do nome
			$dados['alunos'] = $this->db->get()->result();														// retorna várias linhas
			/*--------------------------------------------------------------------------------------------------------------------------------*/
			$this->db->select_sum('falta');																// de notas disciplina
			$this->db->select_sum('justificacao');																// de notas disciplina
			$this->db->from('assiduidade_alunos');														// de notas disciplina
			$this->db->where("anolectivo_id", $anolectivo);												// filtro - anolectivo
			$this->db->where("turma_id", $turma);														// filtro - turma
			$this->db->join('aluno', 'aluno.id_aluno = assiduidade_alunos.aluno_id', 'left');			// join turma e matricula
			$this->db->group_by('assiduidade_alunos.aluno_id');											// agrupamento
			$this->db->order_by("nome", "asc");  												 		// Ordenar a travez do nome
			$dados['num_faltas'] = $this->db->get()->result();											// retorna várias linhas
			/* ===========================================================================================================*/
			$this->db->select('*');													  					// select tudo
			$this->db->from('prof_turma');												 				// da tbl matricula
			$this->db->where("anolectivo_id", $anolectivo);												// onde
			$this->db->where("turma_id", $turma);									 					// onde
			$this->db->join('funcionario', 'funcionario.id_funcionario = prof_turma.funcionario_id');	// join ano lectivo e matricula
			$dados["prof"] = $this->db->get()->row();													// retorna 1 linha
			/* ===========================================================================================================*/
			$this->load->view('layout/cabecalho');
			$this->load->view('layout/menu_lateral_docente');
			$this->load->view('conteudo/_secretaria/_listagem/mapa_assiduidade_geral', $dados);
			$this->load->view('layout/modal_aluno');
			$this->load->view('layout/rodape');
			$this->load->view('layout/script');
		}
	}
	/*					 							listar alunos/ano/turma
	==================================================================================================================*/
	public function listar_aluno_turma()
	{
		$anolectivo = $this->input->post('anolectivo');
		$turma_id   = $this->input->post('turma_id');
		/* ===========================================================================================================*/
		$dados["options_anos"] = $this->Ano_Model->selectAnos();
		$dados["options_turmas"] = $this->Turmas_Model->selectTurmas();
		$dados["options_classe"] = $this->Classe_Model->selectClasses();
		$dados["options_disciplinas"] = $this->Disciplina_Model->selectDisciplinas();	
		/* ===========================================================================================================*/
		$this->db->select('*');													  		// select tudo
		$this->db->from('matricula');												 	// da tbl matricula
		$this->db->where("anolectivo_id", $anolectivo);									// onde
        $this->db->where("turma_id", $turma_id);									 	// onde
		$this->db->join('turma', 'turma.id_turma = matricula.turma_id');				// join turma e matricula
		$this->db->join('classe', 'classe.id_classe = turma.classe_id');				// Join tbl classe [turma]
		$this->db->join('anolectivo', 'anolectivo.id_ano = matricula.anolectivo_id');	// join ano lectivo e matricula
		$this->db->join('periodo', 'periodo.id_periodo = turma.periodo_id');			// join periodo e turma
		$this->db->join('sala', 'sala.id_sala = turma.sala_id');		 		// Join turma e matricula
		$dados["listagem_alunos"] = $this->db->get()->row();							// retorna 1 linha
		if ( empty($dados["listagem_alunos"]) )
		{
			echo $this->session->set_flashdata('msg',"<div class='alert alert-warning text-center'>TURMA OU ANO LECTIVO SEM ALUNOS MATRICULADOS</div>");
			redirect('secretaria/listagem');
		}
		elseif  ( !empty($dados["listagem_alunos"]) )
		{
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
		$this->load->view('layout/cabecalho');
		$this->load->view('layout/menu_lateral_secretaria');
		$this->load->view('conteudo/_secretaria/_listagem/listar_aluno_turma', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
		}
	}
	/*					 							listar alunos/ano/turma
	==================================================================================================================*/
	public function listar_aluno_turma_pdf($anolectivo, $turma)
	{
		$this->db->select('*');															// select tudo
		$this->db->from('matricula');													// da tbl matricula
		$this->db->where("anolectivo_id", $anolectivo);									// onde
    $this->db->where("turma_id", $turma);										// onde 
		$this->db->order_by("nome", "asc");  											// Ordenar a travez do nome
		$this->db->join('aluno', 'aluno.id_aluno = matricula.aluno_id');		 		// Join aluno e matricula
    $this->db->join('anolectivo', 'anolectivo.id_ano = matricula.anolectivo_id'); 	// Join anolectivo e matricula
		$this->db->join('turma', 'turma.id_turma = matricula.turma_id');		 		// Join turma e matricula
		$dados['alunos'] = $this->db->get()->result();									// retorna várias linhas
		/* ===========================================================================================================*/
		$this->db->select('*');													  		// select tudo
		$this->db->from('matricula');												 	// da tbl matricula
		$this->db->where("anolectivo_id", $anolectivo);									// onde
    $this->db->where("turma_id", $turma);									 	// onde
		$this->db->join('turma', 'turma.id_turma = matricula.turma_id');				// join turma e matricula
		$this->db->join('classe', 'classe.id_classe = turma.classe_id');				// join classe e matricula
		$this->db->join('anolectivo', 'anolectivo.id_ano = matricula.anolectivo_id');	// join ano lectivo e matricula
		$this->db->join('periodo', 'periodo.id_periodo = turma.periodo_id');			// join periodo e turma
		$this->db->join('sala', 'sala.id_sala = turma.sala_id');		 		// Join turma e matricula
		$dados["listagem_alunos"] = $this->db->get()->row();							// retorna 1 linha
		/* ===========================================================================================================*/
		$this->db->select('*');													  					// select tudo
		$this->db->from('prof_turma');												 				// da tbl matricula
		$this->db->where("anolectivo_id", $anolectivo);												// onde
		$this->db->where("turma_id", $turma);									 					// onde
		$this->db->join('funcionario', 'funcionario.id_funcionario = prof_turma.funcionario_id');	// join ano lectivo e matricula
		$dados["prof"] = $this->db->get()->row();													// retorna 1 linha
		/* ===========================================================================================================*/
		// Carrega o PDF
		$this->load->library("My_dompdf");
		$this->my_dompdf->gerar_pdf('reports/listar_aluno_turma_pdf', $dados, TRUE);
	}
	/*					 							listar alunos/ano/turma
	==================================================================================================================*/
	public function mini_pauta_pdf( $anolectivo, $turma, $disciplina, $classe )
	{
		$this->db->select('*');													  					// select tudo
		$this->db->from('notas_disciplina');												 		// da tbl matricula
		$this->db->where("anolectivo_id", $anolectivo);												// filtro - ano-lectivo
		$this->db->where("turma_id", $turma);														// filtro - turma
		$this->db->where("disciplina_id", $disciplina);												// filtro - disciplina
		$this->db->join('turma', 'turma.id_turma = notas_disciplina.turma_id');						// join turma e matricula
		$this->db->join('classe', 'classe.id_classe  = turma.classe_id');							// Join tbl classe [turma]
		$this->db->join('anolectivo', 'anolectivo.id_ano = notas_disciplina.anolectivo_id');		// join ano lectivo e matricula
		$this->db->join('disciplina', 'disciplina.id_disciplina = notas_disciplina.disciplina_id');	// join ano lectivo e matricula
		$this->db->join('periodo', 'periodo.id_periodo = turma.periodo_id');						// join periodo e turma
		$dados["listagem_alunos"] = $this->db->get()->row();										// retorna 1 linha
		/* =====================================================================================================================*/
		$this->db->select('*');																		// select tudo
		$this->db->from('notas_disciplina');														// da tbl matricula
		$this->db->where("anolectivo_id", $anolectivo);												// filtro - anolectivo
		$this->db->where("turma_id", $turma);														// filtro - turma
		$this->db->where("disciplina_id", $disciplina);												// filtro - disciplina
		$this->db->order_by("nome", "asc");  														// Ordenar a travez do nome
		$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id');		 				// Join aluno e matricula
		$this->db->join('anolectivo', 'anolectivo.id_ano = notas_disciplina.anolectivo_id'); 		// Join anolectivo e matricula
		$this->db->join('turma', 'turma.id_turma = notas_disciplina.turma_id');		 				// Join turma e matricula
		$dados['alunos'] = $this->db->get()->result();												// retorna várias linhas
		/* ===========================================================================================================*/
		// Carrega o PDF
		if ($classe == 41) 
		{
		// SE classe = iniciação - chama a view da iniciação
		$this->load->library("My_dompdf");
		$this->my_dompdf->gerar_pdf('reports/mini_pauta_iniciacao_pdf', $dados, TRUE);
		} else {
		// SE não - chama a view padrão
		$this->load->library("My_dompdf");
		$this->my_dompdf->gerar_pdf('reports/mini_pauta_pdf', $dados, TRUE);		
		}
	}
	//==================================================================================================================
	//												listar alunos/ano/turma
	//==================================================================================================================
	public function listar_aluno_disciplina()
	{
        $anolectivo = $this->input->post('anolectivo');
        $turma_id = $this->input->post('turma_id');
		/* ===========================================================================================================*/
		$this->db->select('*');															 	 // select tudo
		$this->db->from('notas_disciplina');											 	 // da tbl matricula
		/*------------------------------------------------------------------------------------------------------------*/
		$this->db->where("anolectivo_id", $anolectivo);									 	 // onde
        $this->db->where("turma_id", $turma_id);										 	 // onde 
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
		/*------------------------------------------------------------------------------------------------------------*/
		$this->db->join('turma',  	  'turma.id_turma     = notas_disciplina.turma_id');  		 	 // join turma e matricula
		$this->db->join('classe', 	  'classe.id_classe   = notas_disciplina.classe_id');  	 		 // join classe e matricula
		$this->db->join('anolectivo', 'anolectivo.id_ano  = notas_disciplina.anolectivo_id');  		 // join ano lectivo e matricula
		$this->db->join('periodo', 	  'periodo.id_periodo = turma.periodo_id');		 	 			 // join periodo e turma
		$this->db->join('disciplina', 'disciplina.id_disciplina = notas_disciplina.disciplina_id');	 // join periodo e turma
		$dados["listagem_alunos"] = $this->db->get()->row();										 // retorna 1 linha
		/* ===========================================================================================================*/
		$this->load->view('layout/cabecalho');
		$this->load->view('layout/menu_lateral_secretaria');
		$this->load->view('conteudo/_secretaria/_aluno/listar_aluno_disciplina', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	/*================================================================================================================*/
	/*					 							listar alunos/ano/turma
	==================================================================================================================*/
	public function listar_disciplinas($anolectivo, $turma, $classe)
	{
		$this->db->select('*');													  								// select tudo
		$this->db->from('notas_disciplina');												 					// da tbl matricula
		$this->db->where("anolectivo_id", $anolectivo);															// filtro - anolectivo
		$this->db->where("turma_id", $turma);									 								// filtro - turma
		$this->db->join('turma', 'turma.id_turma = notas_disciplina.turma_id', 'left');							// join turma e matricula
		$this->db->join('classe', 'classe.id_classe  = turma.classe_id', 'left');								// Join tbl classe [turma]
		$this->db->join('anolectivo', 'anolectivo.id_ano = notas_disciplina.anolectivo_id', 'left');			// join ano lectivo e matricula
		$this->db->join('periodo', 'periodo.id_periodo = turma.periodo_id', 'left');							// join periodo e turma
		$dados["listagem_alunos"] = $this->db->get()->row();													// retorna 1 linha
		if ( empty($dados["listagem_alunos"]) )
		{
			echo $this->session->set_flashdata('msg',"<div class='alert alert-warning text-center'>NÃO EXISTEM ALUNOS MATRICULADOS NA TURMA E ANO LECTIVO SELECIONADO</div>");	
			redirect('home/docente');
		}
		elseif  ( !empty($dados["listagem_alunos"]) )
		{

			$this->db->select('*');																					// seleciona tudo
			$this->db->from('notas_disciplina');																	// de notas disciplina
			$this->db->where("anolectivo_id", $anolectivo);															// filtro - anolectivo
			$this->db->where("turma_id", $turma);																	// filtro - turma
			$this->db->join('disciplina', 'disciplina.id_disciplina = notas_disciplina.disciplina_id', 'left');		// join turma e matricula
			$this->db->join('anolectivo', 'anolectivo.id_ano = notas_disciplina.anolectivo_id', 'left');			// join turma e matricula
			$this->db->join('turma', 'turma.id_turma = notas_disciplina.turma_id', 'left');							// join turma e matricula
			$this->db->join('classe', 'classe.id_classe  = turma.classe_id');										// Join tbl classe [turma]
			$this->db->group_by('notas_disciplina.disciplina_id');													// agrupamento
			$dados['disciplinas'] = $this->db->get()->result();														// retorna várias linhas
			/* ---------------------------------------------------------------------------------------------------------------------------- */
			$this->load->view('layout/cabecalho');
			$this->load->view('layout/menu_lateral_docente');
			$this->load->view('conteudo/_secretaria/_disciplina/ver_disciplinas', $dados);
			$this->load->view('layout/rodape');
			$this->load->view('layout/script');
		}
	}
	/*================================================================================================================*/
	/*					 							listar alunos/ano/turma
	==================================================================================================================*/
	public function listar_mini_pautas()
	{
		$anolectivo = $this->input->post('anolectivo');
		$turma   = $this->input->post('turma_id');
		/*------------------------------------------------------*/ 
		$this->db->select('*');													  								// select tudo
		$this->db->from('notas_disciplina');												 					// da tbl matricula
		$this->db->where("anolectivo_id", $anolectivo);															// filtro - anolectivo
		$this->db->where("turma_id", $turma);									 								// filtro - turma
		$this->db->join('turma', 'turma.id_turma = notas_disciplina.turma_id', 'left');							// join turma e matricula
		$this->db->join('classe', 'classe.id_classe  = turma.classe_id', 'left');								// Join tbl classe [turma]
		$this->db->join('anolectivo', 'anolectivo.id_ano = notas_disciplina.anolectivo_id', 'left');			// join ano lectivo e matricula
		$this->db->join('periodo', 'periodo.id_periodo = turma.periodo_id', 'left');							// join periodo e turma
		$dados["listagem_alunos"] = $this->db->get()->row();													// retorna 1 linha
		if ( empty($dados["listagem_alunos"]) )
		{
			echo $this->session->set_flashdata('msg',"<div class='alert alert-warning text-center'>NÃO EXISTEM ALUNOS MATRICULADOS NA TURMA E ANO LECTIVO SELECIONADO</div>");	
			redirect('secretaria/listagem/mini_pautas');
		}
		elseif  ( !empty($dados["listagem_alunos"]) )
		{

			$this->db->select('*');																					// seleciona tudo
			$this->db->from('notas_disciplina');																	// de notas disciplina
			$this->db->where("anolectivo_id", $anolectivo);															// filtro - anolectivo
			$this->db->where("turma_id", $turma);																	// filtro - turma
			$this->db->join('disciplina', 'disciplina.id_disciplina = notas_disciplina.disciplina_id', 'left');		// join turma e matricula
			$this->db->join('anolectivo', 'anolectivo.id_ano = notas_disciplina.anolectivo_id', 'left');			// join turma e matricula
			$this->db->join('turma', 'turma.id_turma = notas_disciplina.turma_id', 'left');							// join turma e matricula
			$this->db->join('classe', 'classe.id_classe  = turma.classe_id');										// Join tbl classe [turma]
			$this->db->group_by('notas_disciplina.disciplina_id');													// agrupamento
			$dados['disciplinas'] = $this->db->get()->result();														// retorna várias linhas
			/* ---------------------------------------------------------------------------------------------------------------------------- */
			$this->load->view('layout/cabecalho');
			$this->load->view('layout/menu_lateral_coordenacao');
			$this->load->view('conteudo/_secretaria/_disciplina/ver_disciplinas_coordenacao', $dados);
			$this->load->view('layout/rodape');
			$this->load->view('layout/script');
		}
	}
	public function listar_disciplinas_coordenador($anolectivo, $turma, $classe)
	{
		$this->db->select('*');													  								// select tudo
		$this->db->from('notas_disciplina');												 					// da tbl matricula
		$this->db->where("anolectivo_id", $anolectivo);															// filtro - anolectivo
		$this->db->where("turma_id", $turma);									 								// filtro - turma
		$this->db->join('turma', 'turma.id_turma = notas_disciplina.turma_id', 'left');							// join turma e matricula
		$this->db->join('classe', 'classe.id_classe  = turma.classe_id', 'left');								// Join tbl classe [turma]
		$this->db->join('anolectivo', 'anolectivo.id_ano = notas_disciplina.anolectivo_id', 'left');			// join ano lectivo e matricula
		$this->db->join('periodo', 'periodo.id_periodo = turma.periodo_id', 'left');							// join periodo e turma
		$dados["listagem_alunos"] = $this->db->get()->row();													// retorna 1 linha
		if ( empty($dados["listagem_alunos"]) )
		{
			echo $this->session->set_flashdata('msg',"<div class='alert alert-warning text-center'>NÃO EXISTEM ALUNOS MATRICULADOS NA TURMA E ANO LECTIVO SELECIONADO</div>");	
			redirect('secretaria/professor/turma_coordenacao');
		}
		elseif  ( !empty($dados["listagem_alunos"]) )
		{

			$this->db->select('*');																					// seleciona tudo
			$this->db->from('notas_disciplina');																	// de notas disciplina
			$this->db->where("anolectivo_id", $anolectivo);															// filtro - anolectivo
			$this->db->where("turma_id", $turma);																	// filtro - turma
			$this->db->join('disciplina', 'disciplina.id_disciplina = notas_disciplina.disciplina_id', 'left');		// join turma e matricula
			$this->db->join('anolectivo', 'anolectivo.id_ano = notas_disciplina.anolectivo_id', 'left');			// join turma e matricula
			$this->db->join('turma', 'turma.id_turma = notas_disciplina.turma_id', 'left');							// join turma e matricula
			$this->db->join('classe', 'classe.id_classe  = turma.classe_id');										// Join tbl classe [turma]
			$this->db->group_by('notas_disciplina.disciplina_id');													// agrupamento
			$dados['disciplinas'] = $this->db->get()->result();														// retorna várias linhas
			/* ---------------------------------------------------------------------------------------------------------------------------- */
			$this->load->view('layout/cabecalho');
			$this->load->view('layout/menu_lateral_docente');
			$this->load->view('conteudo/_secretaria/_disciplina/ver_disciplinas', $dados);
			$this->load->view('layout/rodape');
			$this->load->view('layout/script');
		}
	}
	/*================================================================================================================*/
	/*					 							LANÇAR NOTAS
	==================================================================================================================*/
	public function lancar_notas($anolectivo, $turma, $disciplina, $classe )
	{
		/* =====================================================================================================================*/
		$dados["options_anos"] = $this->Ano_Model->selectAnos();
		$dados["options_turmas"] = $this->Turmas_Model->selectTurmas();
		$dados["options_classe"] = $this->Classe_Model->selectClasses();
		$dados["options_disciplinas"] = $this->Disciplina_Model->selectDisciplinas();
		/* =====================================================================================================================*/
		$this->db->select('*');													  					// select tudo
		$this->db->from('notas_disciplina');												 		// da tbl matricula
		$this->db->where("anolectivo_id", $anolectivo);												// filtro - ano-lectivo
		$this->db->where("turma_id", $turma);														// filtro - turma
		$this->db->where("disciplina_id", $disciplina);												// filtro - disciplina
		$this->db->join('turma', 'turma.id_turma = notas_disciplina.turma_id');						// join turma e matricula
		$this->db->join('classe', 'classe.id_classe  = turma.classe_id');							// Join tbl classe [turma]
		$this->db->join('anolectivo', 'anolectivo.id_ano = notas_disciplina.anolectivo_id');		// join ano lectivo e matricula
		$this->db->join('disciplina', 'disciplina.id_disciplina = notas_disciplina.disciplina_id');	// join ano lectivo e matricula
		$this->db->join('periodo', 'periodo.id_periodo = turma.periodo_id');						// join periodo e turma
		$dados["listagem_alunos"] = $this->db->get()->row();										// retorna 1 linha
		/* =====================================================================================================================*/
		$this->db->select('*');																		// select tudo
		$this->db->from('notas_disciplina');														// da tbl matricula
		$this->db->where("anolectivo_id", $anolectivo);												// filtro - anolectivo
		$this->db->where("turma_id", $turma);														// filtro - turma
		$this->db->where("disciplina_id", $disciplina);												// filtro - disciplina
		$this->db->order_by("nome", "asc");  														// Ordenar a travez do nome
		$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id');		 				// Join aluno e matricula
		$this->db->join('anolectivo', 'anolectivo.id_ano = notas_disciplina.anolectivo_id'); 		// Join anolectivo e matricula
		$this->db->join('turma', 'turma.id_turma = notas_disciplina.turma_id');		 				// Join turma e matricula
		$this->db->join('classe', 'classe.id_classe  = turma.classe_id');							// Join tbl classe [turma]
		$dados['alunos'] = $this->db->get()->result();												// retorna várias linhas
		/* =====================================================================================================================*/
		if ($classe == 41) 
		{
			// SE classe = iniciação - chama a view da iniciação
			$this->load->view('layout/cabecalho');
			$this->load->view('layout/menu_lateral_docente');
			$this->load->view('conteudo/_secretaria/_professor/mini_pauta_iniciacao', $dados);
			$this->load->view('layout/rodape');
			$this->load->view('layout/script');
		} else {
			// SE não - chama a view padrão
			$this->load->view('layout/cabecalho');
			$this->load->view('layout/menu_lateral_docente');
			$this->load->view('conteudo/_secretaria/_professor/mini_pauta', $dados);
			$this->load->view('layout/rodape');
			$this->load->view('layout/script');
		}
	}
	/*================================================================================================================*/
	/*					 							LANÇAR NOTAS
	==================================================================================================================*/
	public function mini_pautas_coordenacao($anolectivo, $turma, $disciplina, $classe )
	{
		/* =====================================================================================================================*/
		$dados["options_anos"] = $this->Ano_Model->selectAnos();
		$dados["options_turmas"] = $this->Turmas_Model->selectTurmas();
		$dados["options_classe"] = $this->Classe_Model->selectClasses();
		$dados["options_disciplinas"] = $this->Disciplina_Model->selectDisciplinas();
		/* =====================================================================================================================*/
		$this->db->select('*');	// select tudo
		$this->db->from('notas_disciplina'); // da tbl matricula
		$this->db->where("anolectivo_id", $anolectivo); // filtro - ano-lectivo
		$this->db->where("turma_id", $turma); // filtro - turma
		$this->db->where("disciplina_id", $disciplina); // filtro - disciplina
		$this->db->join('turma', 'turma.id_turma = notas_disciplina.turma_id'); // join turma e matricula
		$this->db->join('classe', 'classe.id_classe  = turma.classe_id'); // Join tbl classe [turma]
		$this->db->join('anolectivo', 'anolectivo.id_ano = notas_disciplina.anolectivo_id'); // join ano lectivo e matricula
		$this->db->join('disciplina', 'disciplina.id_disciplina = notas_disciplina.disciplina_id');	// join ano lectivo e matricula
		$this->db->join('periodo', 'periodo.id_periodo = turma.periodo_id'); // join periodo e turma
		$dados["listagem_alunos"] = $this->db->get()->row(); // retorna 1 linha
		/* =====================================================================================================================*/
		$this->db->select('*'); // select tudo
		$this->db->from('notas_disciplina'); // da tbl matricula
		$this->db->where("anolectivo_id", $anolectivo); // filtro - anolectivo
		$this->db->where("turma_id", $turma); // filtro - turma
		$this->db->where("disciplina_id", $disciplina); // filtro - disciplina
		$this->db->order_by("nome", "asc"); // Ordenar a travez do nome
		$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id'); // Join aluno e matricula
		$this->db->join('anolectivo', 'anolectivo.id_ano = notas_disciplina.anolectivo_id'); // Join anolectivo e matricula
		$this->db->join('turma', 'turma.id_turma = notas_disciplina.turma_id'); // Join turma e matricula
		$this->db->join('classe', 'classe.id_classe  = turma.classe_id'); // Join tbl classe [turma]
		$dados['alunos'] = $this->db->get()->result(); // retorna várias linhas
		/* =====================================================================================================================*/
		if ($classe == 41) 
		{
			// SE classe = iniciação - chama a view da iniciação
			$this->load->view('layout/cabecalho');
			$this->load->view('layout/menu_lateral_coordenacao');
			$this->load->view('conteudo/_secretaria/_coordenacao/mini_pauta_iniciacao', $dados);
			$this->load->view('layout/rodape');
			$this->load->view('layout/script');
		} else {
			// SE não - chama a view padrão
			$this->load->view('layout/cabecalho');
			$this->load->view('layout/menu_lateral_coordenacao');
			$this->load->view('conteudo/_secretaria/_coordenacao/mini_pauta', $dados);
			$this->load->view('layout/rodape');
			$this->load->view('layout/script');
		}
	}
	/*================================================================================================================*/
	/*					 							PAUTA GERAL
	==================================================================================================================*/
	public function pauta_geral($anolectivo, $turma, $classe, $prof)
	{
		/*--------------------------------------------------------------------------------------------------------------------------------*/
		$this->db->select('*');													  								// select tudo
		$this->db->from('prof_turma');												 							// da tbl matricula
		$this->db->where("anolectivo_id", $anolectivo);															// onde
		$this->db->where("turma_id", $turma);									 								// onde
		$this->db->join('funcionario', 'funcionario.id_funcionario = prof_turma.funcionario_id');				// join ano lectivo e matricula
		$dados["prof"] = $this->db->get()->row();																// retorna 1 linha
		/*-------------------------------------------------------------------------------------------------------------------------------*/
		$this->db->select('*');													  								// select tudo
		$this->db->from('notas_disciplina');												 					// da tbl matricula
		$this->db->where("anolectivo_id", $anolectivo);															// filtro - anolectivo
		$this->db->where("turma_id", $turma);									 								// filtro - turma
		$this->db->join('turma', 'turma.id_turma = notas_disciplina.turma_id', 'left');							// join turma e matricula
		$this->db->join('classe', 'classe.id_classe  = turma.classe_id', 'left');								// Join tbl classe [turma]
		$this->db->join('anolectivo', 'anolectivo.id_ano = notas_disciplina.anolectivo_id', 'left');			// join ano lectivo e matricula
		$this->db->join('periodo', 'periodo.id_periodo = turma.periodo_id', 'left');							// join periodo e turma
		$dados["listagem_alunos"] = $this->db->get()->row();													// retorna 1 linha
		/*-------------------------------------------------------------------------------------------------------------------------------*/
		if ( empty($dados["listagem_alunos"]) )
		{
			echo $this->session->set_flashdata('msg',"<div class='alert alert-warning text-center'>NÃO EXISTEM ALUNOS MATRICULADOS NA TURMA E ANO LECTIVO SELECIONADO</div>");	
			redirect('secretaria/professor/turmas_professor_coordenacao/'.$prof);
		}
		elseif  ( !empty($dados["listagem_alunos"]) )
		{
			/*--------------------------------------------------------------------------------------------------------------------------------*/
			$this->db->select('*');																				// seleciona tudo
			$this->db->from('notas_disciplina');																// de notas disciplina
			$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
			$this->db->where("turma_id", $turma);																// filtro - turma
			$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
			$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
			$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
			$dados['lista_alunos'] = $this->db->get()->result();												// retorna várias linhas
			/*--------------------------------------------------------------------------------------------------------------------------------*/
			/* ================== pauta geral iniciacao ================== */
			if ($classe == 41) 
			{
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '22');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['representacao_matematica'] = $this->db->get()->result();									// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '23');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['C_Ling_Literatura_Infant'] = $this->db->get()->result();									// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '24');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['Meio_Fisico_Social'] = $this->db->get()->result();											// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '25');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['Exp_Manual_Plastica'] = $this->db->get()->result();											// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '26');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['Exp_Musical'] = $this->db->get()->result();													// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '27');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['Psicomotricidade'] = $this->db->get()->result();											// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select_sum('ce');																		// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['classificacao_exame'] = $this->db->get()->result();											// retorna várias linhas
				/*================================================================================================================================*/
				$this->load->view('layout/cabecalho');
				$this->load->view('layout/menu_lateral_coordenacao');
				$this->load->view('conteudo/_secretaria/_pautas/pauta_geral_0', $dados);
				$this->load->view('layout/rodape');
				$this->load->view('layout/script');
			} /* ================== end pauta iniciacao ================== */
			/* ============== pauta geral 1ª classe ============== */
			elseif ($classe == 43)	
			{
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '28');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['l_portuguesa'] = $this->db->get()->result();												// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '29');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['matematica'] = $this->db->get()->result();													// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '30');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['estudo_meio'] = $this->db->get()->result();													// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '31');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['ed_musical'] = $this->db->get()->result();													// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '32');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['ed_fisica'] = $this->db->get()->result();													// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '33');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['ed_plastica'] = $this->db->get()->result();														// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select_sum('ce');																		// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['classificacao_exame'] = $this->db->get()->result();											// retorna várias linhas
				/*================================================================================================================================*/
				$this->load->view('layout/cabecalho');
				$this->load->view('layout/menu_lateral_coordenacao');
				$this->load->view('conteudo/_secretaria/_pautas/pauta_geral_1', $dados);
				$this->load->view('layout/rodape');
				$this->load->view('layout/script');
			} /* ================== end pauta 1ª classe ================== */
			/* ============== pauta geral 2ª classe ============== */
			elseif ($classe == 44)	
			{
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '46');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['l_portuguesa'] = $this->db->get()->result();												// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '47');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['matematica'] = $this->db->get()->result();													// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '48');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['estudo_meio'] = $this->db->get()->result();													// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '49');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['ed_musical'] = $this->db->get()->result();													// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '50');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['ed_fisica'] = $this->db->get()->result();													// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '51');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['ed_plastica'] = $this->db->get()->result();														// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select_sum('ce');																		// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['classificacao_exame'] = $this->db->get()->result();											// retorna várias linhas
				/*================================================================================================================================*/
				$this->load->view('layout/cabecalho');
				$this->load->view('layout/menu_lateral_coordenacao');
				$this->load->view('conteudo/_secretaria/_pautas/pauta_geral_2', $dados);
				$this->load->view('layout/rodape');
				$this->load->view('layout/script');
			} /* ================== end pauta 2ª classe ================== */
			/* ============== pauta geral 3ª classe ============== */
			elseif ($classe == 45)	
			{
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '52');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['l_portuguesa'] = $this->db->get()->result();												// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '53');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['matematica'] = $this->db->get()->result();													// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '54');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['estudo_meio'] = $this->db->get()->result();													// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '55');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['ed_musical'] = $this->db->get()->result();													// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '56');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['ed_fisica'] = $this->db->get()->result();													// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '57');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['ed_plastica'] = $this->db->get()->result();														// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select_sum('ce');																		// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['classificacao_exame'] = $this->db->get()->result();											// retorna várias linhas
				/*================================================================================================================================*/
				$this->load->view('layout/cabecalho');
				$this->load->view('layout/menu_lateral_coordenacao');
				$this->load->view('conteudo/_secretaria/_pautas/pauta_geral_3', $dados);
				$this->load->view('layout/rodape');
				$this->load->view('layout/script');
			} /* ================== end pauta 3ª classe ================== */
			/* ============== pauta geral 4ª classe ============== */
			elseif ($classe == 46)	
			{
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '58');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['l_portuguesa'] = $this->db->get()->result();												// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '59');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['matematica'] = $this->db->get()->result();													// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '60');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['estudo_meio'] = $this->db->get()->result();													// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '61');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['ed_musical'] = $this->db->get()->result();													// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '61');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['ed_fisica'] = $this->db->get()->result();													// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '63');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['ed_plastica'] = $this->db->get()->result();														// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select_sum('ce');																		// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['classificacao_exame'] = $this->db->get()->result();											// retorna várias linhas
				/*================================================================================================================================*/
				$this->load->view('layout/cabecalho');
				$this->load->view('layout/menu_lateral_coordenacao');
				$this->load->view('conteudo/_secretaria/_pautas/pauta_geral_4', $dados);
				$this->load->view('layout/rodape');
				$this->load->view('layout/script');
			} /* ================== end pauta 4ª classe ================== */
			/* ============== pauta geral 5ª classe ============== */
			elseif ($classe == 47)
			{
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '64');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['l_portuguesa'] = $this->db->get()->result();												// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '65');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['matematica'] = $this->db->get()->result();													// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '66');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['c_natureza'] = $this->db->get()->result();													// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '67');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['geografia'] = $this->db->get()->result();													// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '68');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['historia'] = $this->db->get()->result();													// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '69');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['e_m_p'] = $this->db->get()->result();														// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '70');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['e_m_c'] = $this->db->get()->result();														// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '71');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['ed_fisica'] = $this->db->get()->result();													// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '72');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['ed_musical'] = $this->db->get()->result();													// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select_sum('ce');																		// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['classificacao_exame'] = $this->db->get()->result();											// retorna várias linhas
				/*================================================================================================================================*/
				$this->load->view('layout/cabecalho');
				$this->load->view('layout/menu_lateral_coordenacao');
				$this->load->view('conteudo/_secretaria/_pautas/pauta_geral_5', $dados);
				$this->load->view('layout/rodape');
				$this->load->view('layout/script');
			}/* ================== end pauta 5ª classe ================== */
			/* ============== pauta geral 6ª classe ============== */
			elseif ($classe == 48)
			{
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '73');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['l_portuguesa'] = $this->db->get()->result();												// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '74');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['matematica'] = $this->db->get()->result();													// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '75');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['c_natureza'] = $this->db->get()->result();													// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '76');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['geografia'] = $this->db->get()->result();													// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '77');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['historia'] = $this->db->get()->result();													// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '78');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['e_m_p'] = $this->db->get()->result();														// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '79');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['e_m_c'] = $this->db->get()->result();														// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '80');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['ed_fisica'] = $this->db->get()->result();													// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->where("disciplina_id", '81');															// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				$this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['ed_musical'] = $this->db->get()->result();													// retorna várias linhas
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				/*--------------------------------------------------------------------------------------------------------------------------------*/
				$this->db->select('*');																				// seleciona tudo
				// $this->db->select_sum('ce');																		// seleciona tudo
				$this->db->from('notas_disciplina');																// de notas disciplina
				$this->db->where("anolectivo_id", $anolectivo);														// filtro - anolectivo
				$this->db->where("turma_id", $turma);																// filtro - turma
				$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id', 'left');						// join turma e matricula
				// $this->db->group_by('notas_disciplina.aluno_id');													// agrupamento
				$this->db->order_by("nome", "asc");  												 				// Ordenar a travez do nome
				$dados['classificacao_exame'] = $this->db->get()->result();											// retorna várias linhas
				/*================================================================================================================================*/
				$this->load->view('layout/cabecalho');
				$this->load->view('layout/menu_lateral_coordenacao');
				$this->load->view('conteudo/_secretaria/_pautas/pauta_geral_6', $dados );
				$this->load->view('layout/rodape');
				$this->load->view('layout/script');
			}/* ================== end pauta 6ª classe ================== */
		}
	}
}
