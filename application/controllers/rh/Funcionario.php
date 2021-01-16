<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
class Funcionario extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('image_lib');
		if($this->session->userdata('logged_in') !== TRUE)
		{
			redirect('/');
		}
	}
	/* ===================== LISTAR FUNCIONARIO ===================== */
	public function listar_funcionario()
	{	
		// $lista = $this->Funcionario_Model->listarfuncionario();
		// $dados = array("funcionarios" => $lista);
		
		$this->db->select('*');
		$this->db->from('funcionario');
		$dados ["funcionarios"] = $this->db->get()->result();
		/*======================================================*/
		$this->load->view('layout/cabecalho_rh');
		$this->load->view('layout/menu_lateral_rh');
		$this->load->view('conteudo/_rh/_Funcionario/_listar_todos', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	/*=====================INICIO=CRIAR=NOVO=FUNCIONARIO=====================*/
	public function novo_funcionario()
	{
		$dados['provincias'] = $this->Select_Dinamico_Model->busca_provincias();
		// ---------------------------------------------------------------------
		$this->load->view('layout/cabecalho_rh');
		$this->load->view('layout/menu_lateral_rh');
		$this->load->view('conteudo/_rh/_funcionario/novo_funcionario', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	//  INSERIR REGISTROS NA TABELA FUNCIONARIOS
	public function guardar()
	{
		//================= INICIO REGRAS DE VALIDAÇÃO DO FORMULÁRIO =================
		$this->form_validation->set_error_delimiters('<div class="text-danger mt-1">','</div>');
		$regras = array(
			array(
				'field' => 'nome_funcionario',
				'label' => 'nome',
				'rules' => 'trim|required|min_length[5]|max_length[80]'
			), array(
				'field' => 'genero_funcionario',
				'label' => 'género',
				'rules' => 'required'
			), array(
				'field' => 'nascimento_funcionario',
				'label' => 'data de nascimento',
				'rules' => 'required'
			), array(
				'field' => 'bi_funcionario',
				'label' => 'nº do B.I',
				'rules' => 'trim|required|is_unique[funcionario.bi_funcionario]|exact_length[14]'
			), array(
				'field' => 'naturalidade',
				'label' => 'naturalidade',
				'rules' => 'trim|required'
			),array(
				'field' => 'nascimento_funcionario',
				'label' => 'data de nascimento',
				'rules' => 'required'
			), array(
				'field' => 'telemovel_funcionario',
				'label' => 'telemóvel',
				'rules' => 'trim|is_unique[funcionario.telemovel_funcionario]'
			), array(
				'field' => 'email_funcionario',
				'label' => 'e-mail',
				'rules' => 'trim|is_unique[funcionario.email_funcionario]'
			), array(
				'field' => 'endereco_funcionario',
				'label' => 'endereço',
				'rules' => 'trim|min_length[5]|max_length[200]'
			), array(
				'field' => 'nivel_acesso',
				'label' => 'departamento',
				'rules' => 'trim|required'
			)
		);
		//	FIM REGRAS DE VALIDAÇÃO DO FORMULÁRIO 
		$this->form_validation->set_rules($regras);
		//	CONDICAO DE VALIDACAO 
		if ($this->form_validation->run() == FALSE )
		{
			$dados['provincias'] = $this->Select_Dinamico_Model->busca_provincias();
			// ---------------------------------------------------------------------
			$this->load->view('layout/cabecalho_rh');
			$this->load->view('layout/menu_lateral_rh');
			$this->load->view('conteudo/_rh/_funcionario/novo_funcionario', $dados);
			$this->load->view('layout/rodape');
			$this->load->view('layout/script');
		}
		else
		{
			$this->Funcionario_Model->novofuncionario();
			$id_funcionario = $this->db->insert_id();
			redirect('rh/funcionario/detalhe_rh?id_funcionario='.$id_funcionario);
		}
	}
	/* ================== APAGAR FUNCIONARIOS ================== */
	public function apagar($id)
	{
		$this->load->model("Funcionario_Model");
		$this->Funcionario_Model->apagarfuncionario($id);
		redirect('rh/funcionario/listar_funcionario', 'refresh');
	}
	/* ===================== ACTUALIZAR FUNCIONARIO ===================== */
	public function editar($id=NULL)
	{

		$this->load->model("Select_Dinamico_Model", "funcionario");
		$dados['provincia'] = $this->funcionario->get_provincia();
		/* ================================================================== */
		$this->db->where('id_funcionario', $id);
		$dados['funcionario'] = $this->db->get('funcionario')->result();
		/* =================================================================== */
		$this->load->view('layout/cabecalho_rh');
		$this->load->view('layout/menu_lateral_rh');
		$this->load->view('conteudo/_rh/_funcionario/editar_funcionario', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	/* ====================== ACTUALIZAR FUNCIONARIO ====================== */
	public function salvaractualizacao($id=NULL)
	{
		$this->Funcionario_Model->actualizar();
		$id_funcionario = $this->input->post('id_funcionario'); //	Pega o ultimo id do funcionario inserido
		echo $this->session->set_flashdata('msg',"<div class='alert alert-success text-center'>INFORMAÇÕES DO FUNCIONÁRIO ACTUALIZADA COM SUCESSO</div>");	
		redirect('rh/funcionario/detalhe_rh?id_funcionario='.$id_funcionario);
	}
	/* ====================== CRIAR UTILIZADOR ====================== */	
	public function add_utilizador($id=NULL)
	{
		$this->Funcionario_Model->add_utilizador();
		$id_funcionario = $this->input->post('id_funcionario'); //	Pega o ultimo id do funcionario inserido
		echo $this->session->set_flashdata('msg',"<div class='alert alert-success text-center'>UTILIZADOR CRIADO COM SUCESSO</div>");	
		redirect('rh/funcionario/detalhe_rh?id_funcionario='.$id_funcionario);
	}
	/* ====================== ALTERAR PALAVRA PASSE ====================== */	
	public function alterar_password()
	{
		$id_funcionario = $this->input->post('id_funcionario'); 
		$password_old = md5($this->input->post('password_old')); 	
		$password_new = $this->input->post('password_new'); 
		/* -------------------------------------------------------- */
		$this->db->select('password');
		$this->db->where('id_funcionario', $id_funcionario);
		$dados['password'] = $this->db->get('funcionario')->result();
		/* -------------------------------------------------------- */
		if($dados['password'][0]->password == $password_old) {
			$this->Funcionario_Model->alterar_password();
			echo $this->session->set_flashdata('msg',"<div class='alert alert-success text-center'>PALAVRA PASSE ALTERADA COM SUCESSO</div>");	
			redirect('rh/funcionario/detalhe/'.$this->session->userdata('id_funcionario').'/'.$this->session->userdata('nivel_acesso'));
		} else {
			echo $this->session->set_flashdata('msg',"<div class='alert alert-danger text-center'>NÃO FOI POSSIVEL ALTERAR A PALAVRA PASSE</div>");	
			redirect('rh/funcionario/detalhe/'.$this->session->userdata('id_funcionario').'/'.$this->session->userdata('nivel_acesso'));
		}
	}
	//	FUNCAO PERFIL DO FUNCIONÁRIO
	public function detalhe($id_funcionario, $nivel_ecesso)
	{
		$dados ["funcionario"] = $this->Funcionario_Model->retorna_funcionario($id_funcionario);
		/*------------------------------------------------------------------------------------*/
		if ($nivel_ecesso == '1'){
			$this->load->view('layout/cabecalho_rh');
			$this->load->view('layout/menu_lateral_direccao');
			$this->load->view('conteudo/_rh/_funcionario/perfil_funcionario', $dados);
			$this->load->view('layout/modal_funcionario');
			$this->load->view('layout/rodape');
			$this->load->view('layout/script');
		}elseif ($nivel_ecesso == '2') {
			$this->load->view('layout/cabecalho_rh');
			$this->load->view('layout/menu_lateral_secretaria');
			$this->load->view('conteudo/_rh/_funcionario/perfil_funcionario', $dados);
			$this->load->view('layout/modal_funcionario');
			$this->load->view('layout/rodape');
			$this->load->view('layout/script');
		}elseif ($nivel_ecesso == '3') {
			$this->load->view('layout/cabecalho_rh');
			$this->load->view('layout/menu_lateral_rh');
			$this->load->view('conteudo/_rh/_funcionario/perfil_funcionario', $dados);
			$this->load->view('layout/modal_funcionario');
			$this->load->view('layout/rodape');
			$this->load->view('layout/script');
		}elseif ($nivel_ecesso == '4') {
			$this->load->view('layout/cabecalho_rh');
			$this->load->view('layout/menu_lateral_coordenacao');
			$this->load->view('conteudo/_rh/_funcionario/perfil_funcionario', $dados);
			$this->load->view('layout/modal_funcionario');
			$this->load->view('layout/rodape');
			$this->load->view('layout/script');
		}elseif ($nivel_ecesso == '5') {
			$this->load->view('layout/cabecalho_rh');
			$this->load->view('layout/menu_lateral_docente');
			$this->load->view('conteudo/_rh/_funcionario/perfil_funcionario', $dados);
			$this->load->view('layout/modal_funcionario');
			$this->load->view('layout/rodape');
			$this->load->view('layout/script');
		}elseif ($nivel_ecesso == '6') {
			$this->load->view('layout/cabecalho_rh');
			$this->load->view('layout/menu_lateral');
			$this->load->view('conteudo/_rh/_funcionario/perfil_funcionario', $dados);
			$this->load->view('layout/modal_funcionario');
			$this->load->view('layout/rodape');
			$this->load->view('layout/script');
		}
	}
	//	FUNCAO PERFIL DO FUNCIONÁRIO [-- RECURSOS HUMANOS --]
	public function detalhe_rh()
	{
		$id = $this->input->get("id_funcionario");
		$dados ["funcionario"] = $this->Funcionario_Model->retorna_funcionario($id);
		//	CARREGA A VIZUALIZACAO DA VIEW LISTA
		$this->load->view('layout/cabecalho_rh');
		$this->load->view('layout/menu_lateral_rh');
		$this->load->view('conteudo/_rh/_funcionario/perfil_funcionario_rh', $dados);
		$this->load->view('layout/modal_funcionario');
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	//	FUNCAO PERFIL DO FUNCIONÁRIO
	public function detalhe_professor()
	{
		$id = $this->input->get("id_funcionario");
		$dados["funcionario"] 	 = $this->Funcionario_Model->retorna_funcionario($id);
		$dados["options_anos"] 	 = $this->Ano_Model->selectAnos();
		$dados["options_turmas"] = $this->Turmas_Model->selectTurmas();
		// ==============================================================================================================================
		$this->db->select('*');																// Selecione tudo 
		$this->db->from('prof_turma');														// Da tbl funcionario
		$this->db->where('funcionario_id', $id);											// Onde o ID igual ao ID do funcionario selecionado
		$this->db->order_by("ano_let", "desc");  											// Orden
		$this->db->join('anolectivo', 'anolectivo.id_ano = prof_turma.anolectivo_id');		// Join tbl anolectivo
		$this->db->join('turma', 'turma.id_turma = prof_turma.turma_id');					// Join tbl anolectivo
		$dados ["prof_turma"] = $this->db->get()->result();									// Join funcionario
		// ==============================================================================================================================
		// CARREGA A VIZUALIZACAO DA VIEW LISTA
		$this->load->view('layout/cabecalho_rh');
		$this->load->view('layout/menu_lateral_docente');
		$this->load->view('conteudo/_rh/_funcionario/perfil_professor', $dados);
		$this->load->view('layout/modal_funcionario');
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	//	SALVA A ACTUALIZACAO DO REGISTROS NA TABELA FUNCIONARIO
	public function add_prof_turma()
	{
		$this->Funcionario_Model->add_prof_turma();
		$id_funcionario = $this->input->post('id_funcionario'); //	Pega o ultimo id do funcionario inserido
		echo $this->session->set_flashdata('msg',"<div class='alert alert-success text-center'>TURMA ADICIONADA COM SUCESSO</div>");	
		redirect('rh/funcionario/detalhe_professor?id_funcionario='.$id_funcionario);
	}
	/*
    ============================= MARCAR FALTA ALUNO =============================
    */
    public function marcar_falta()
    {
		$id_funcionario = $this->input->post('id_funcionario');
		if (empty($id_funcionario))
		{
			echo $this->session->set_flashdata('msg',"<div class='alert alert-warning text-center'>SELECIONE O FUNCIONÁRIO</div>");
			redirect('home/recursos_humanos');
		} else {
			for ($i=0; $i < sizeof($id_funcionario); $i++)
			{
				$falta_funcionarios = array(
					'funcionario_id' => $id_funcionario[$i],
					'falta'  => $this->input->post('presenca_ausencia'),
					'mes_ano'   => $this->input->post('mes')
				);
				$this->db->insert("assiduidade_funcionario", $falta_funcionarios);
			}
		}
		/*--------------------------------------------------------------------------------------------------------------------*/
		echo $this->session->set_flashdata('msg',"<div class='alert alert-success text-center'>FALTA MARCADA CO SUCESSO</div>");	
		redirect('home/recursos_humanos');		
	}
	/*		 					MAPA DE ASSIDUIDADE		 					
	--------------------------------------------------------------------------------------------*/
	public function mapa_assiduidade()
	{
		$dados['funcionarios'] = $this->Select_Dinamico_Model->busca_funcionarios();
		/*-------------------------------------------------------*/ 
		$this->load->view('layout/cabecalho_rh');
		$this->load->view('layout/menu_lateral_rh');
		$this->load->view('conteudo/_rh/_funcionario/mapa_assiduidade_funcionario', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	public function mapa_assiduidade_individual()
	{
		$funcionario = $this->input->post('funcionario_id');
		$mes 		 = $this->input->post('mes');
		/*---------------------------------------------------------------------------------------*/ 
		$this->db->select('*');													  										// select tudo
		$this->db->from('assiduidade_funcionario');												 						// da tbl matricula
        $this->db->where("funcionario_id", $funcionario);									 							// onde
        $this->db->where("mes_ano", $mes);									 												// onde
		$this->db->join('funcionario', 'funcionario.id_funcionario = assiduidade_funcionario.funcionario_id');			// join ano lectivo e matricula
		$dados["funcionario_inf"] = $this->db->get()->row();															// retorna 1 linha
		/*			Total de Faltas 
		------------------------------------------------------------------------------------------------------------- */
		$this->db->select('*');													  						// select tudo
		$this->db->from('assiduidade_funcionario');												 		// da tbl matricula
        $this->db->where("funcionario_id", $funcionario);									 			// filtro
        $this->db->where("mes_ano", $mes);									 								// filtro
        $this->db->where("falta", '1');									 								// filtro
		$dados["numero_faltas"] = $this->db->get()->num_rows();
		/*			Total de Falts Justificadas 
		------------------------------------------------------------------------------------------------------------- */
		$this->db->select('*');													  								// select tudo
		$this->db->from('assiduidade_funcionario');												 				// da tbl matricula
        $this->db->where("funcionario_id", $funcionario);									 					// filtro
        $this->db->where("mes_ano", $mes);									 										// filtro
        $this->db->where("justificacao", '1');									 								// filtro
		$dados["faltas_justificadas"] = $this->db->get()->num_rows();
		/*			Total de Faltas Nao Justificadas 
		------------------------------------------------------------------------------------------------------------- */
		$this->db->select('*');													  								// select tudo
		$this->db->from('assiduidade_funcionario');												 				// da tbl matricula
        $this->db->where("funcionario_id", $funcionario);									 					// filtro
        $this->db->where("mes_ano", $mes);									 										// filtro
        $this->db->where("justificacao", '0');									 								// filtro
		$dados["faltas_n_justificadas"] = $this->db->get()->num_rows();
		/* ------------------------------------------------------------------------------------------------------------- */
		if (empty($dados["funcionario_inf"])) {
			echo $this->session->set_flashdata('msg',"<div class='alert alert-warning text-center'>NEHUMA FALTA MARCADA AO FUNCIONARIO SELECIONADO</div>");
			redirect('rh/funcionario/mapa_assiduidade');
		} else {
			$this->db->select('*');																							// select tudo
			$this->db->from('assiduidade_funcionario');																		// da tbl matricula
			$this->db->where("funcionario_id", $funcionario);																// onde 
			$this->db->where("mes_ano", $mes);									 												// onde
			$this->db->order_by("data", "asc");  																			// Ordenar a travez do nome
			$this->db->join('funcionario', 'funcionario.id_funcionario = assiduidade_funcionario.funcionario_id');			// join ano lectivo e matricula
			$dados['funcionarios'] = $this->db->get()->result();																	// retorna várias linhas
			/* ===========================================================================================================*/
			$this->load->view('layout/cabecalho');
			$this->load->view('layout/menu_lateral_rh');
			$this->load->view('conteudo/_rh/_funcionario/mapa_assiduidade_individual', $dados);
			$this->load->view('layout/modal_aluno');
			$this->load->view('layout/rodape');
			$this->load->view('layout/script');
		}
	}
	/*		 					JUSTIFICAR FALTA					
	--------------------------------------------------------------------------------------------*/
	public function justificar_faltas($id_assiduidade)
	{
		$this->db->select('*');													  					// select tudo
		$this->db->from('assiduidade_funcionario');												 		// da tbl matricula
		$this->db->where("id_assiduidade", $id_assiduidade);												// onde
		$this->db->join('funcionario', 'funcionario.id_funcionario = assiduidade_funcionario.funcionario_id');			// join ano lectivo e matricula
		$dados["funcionario_inf"] = $this->db->get()->row();										// retorna 1 linha
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
		$this->load->view('layout/menu_lateral_rh');
		$this->load->view('conteudo/_rh/_funcionario/justificar_falta_funcionario', $dados);
		$this->load->view('layout/modal_aluno');
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	/*				JUSTICAR FALTAS
	=======================================================================*/
	public function justificacao_falta()
	{
		$this->Funcionario_Model->justificar_falta();
		/*-------------------------------------------------------------------------------------------------------------------------*/ 
		echo $this->session->set_flashdata('msg',"<div class='alert alert-success text-center'>FALTA JUSTIFICADA COM SUCESSO</div>");
		redirect('rh/funcionario/mapa_assiduidade');
	}
	public function mapa_assiduidade_funcionario()
	{
		$mes = $this->input->post('mes');
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
		$dados["mes"] = $this->input->post("mes");
		/*-----------------------------------------------------------------------------------------------------------------------------*/ 
		if (empty($dados["assiduidade_funcionarios"]))
		{
			echo $this->session->set_flashdata('msg',"<div class='alert alert-warning text-center'>SEM REGISTRO DE FALTAS NO MÊS SELECIONADO</div>");
			redirect('rh/funcionario/mapa_assiduidade');
		}
		elseif (!empty($dados["assiduidade_funcionarios"]))
		{
			/*-----------------------------------------------------------------------------------------------------------------------*/
			$this->load->view('layout/cabecalho_rh');
			$this->load->view('layout/menu_lateral_rh');
			$this->load->view('conteudo/_rh/_funcionario/mapa_assiduidade_geral_funcionario', $dados);
			$this->load->view('layout/rodape');
			$this->load->view('layout/script');
		}
	}
	/*		 					LISTAR FUNCIONARIOS POR DEPARTAMENTOS		 					
	--------------------------------------------------------------------------------------------*/
	public function listar_todos_funcionarios()
	{	
		$this->db->select('*');
		$this->db->from('funcionario');
		$dados ["funcionarios_row"] = $this->db->get()->result();
		/*----------------------------------------------------------------------------------------*/ 
		$this->db->select('*');
		$this->db->from('funcionario');
		$this->db->order_by("nome_funcionario", "asc");
		$dados ["funcionarios"] = $this->db->get()->result();
		/*----------------------------------------------------------------------------------------*/
		$this->load->view('layout/cabecalho_rh');
		$this->load->view('layout/menu_lateral_rh');
		$this->load->view('conteudo/_rh/_funcionario/_listar_todos', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	public function listar_direccao()
	{	
		$this->db->select('*');
		$this->db->from('funcionario');
		$this->db->where('nivel_acesso', '1');
		$this->db->group_by('funcionario.nivel_acesso');
		$dados ["funcionarios_row"] = $this->db->get()->result();
		/*----------------------------------------------------------------------------------------*/ 
		$this->db->select('*');
		$this->db->from('funcionario');
		$this->db->where('nivel_acesso', '1');
		$this->db->order_by("nome_funcionario", "asc");
		$dados ["funcionarios"] = $this->db->get()->result();
		/*----------------------------------------------------------------------------------------*/
		$this->load->view('layout/cabecalho_rh');
		$this->load->view('layout/menu_lateral_rh');
		$this->load->view('conteudo/_rh/_funcionario/_listar_funcionarios', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	public function listar_secretaria()
	{	
		$this->db->select('*');
		$this->db->from('funcionario');
		$this->db->where('nivel_acesso', '2');
		$this->db->group_by('funcionario.nivel_acesso');
		$dados ["funcionarios_row"] = $this->db->get()->result();
		/*----------------------------------------------------------------------------------------*/
		$this->db->select('*');
		$this->db->from('funcionario');
		$this->db->where('nivel_acesso', '2');
		$this->db->order_by("nome_funcionario", "asc");
		$dados ["funcionarios"] = $this->db->get()->result();
		/*----------------------------------------------------------------------------------------*/
		$this->load->view('layout/cabecalho_rh');
		$this->load->view('layout/menu_lateral_rh');
		$this->load->view('conteudo/_rh/_funcionario/_listar_funcionarios', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	public function listar_rh()
	{	
		$this->db->select('*');
		$this->db->from('funcionario');
		$this->db->where('nivel_acesso', '3');
		$this->db->group_by('funcionario.nivel_acesso');
		$dados ["funcionarios_row"] = $this->db->get()->result();
		/*----------------------------------------------------------------------------------------*/
		$this->db->select('*');
		$this->db->from('funcionario');
		$this->db->where('nivel_acesso', '3');
		$this->db->order_by("nome_funcionario", "asc");
		$dados ["funcionarios"] = $this->db->get()->result();
		/*----------------------------------------------------------------------------------------*/
		$this->load->view('layout/cabecalho_rh');
		$this->load->view('layout/menu_lateral_rh');
		$this->load->view('conteudo/_rh/_funcionario/_listar_funcionarios', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	public function listar_coordenacao()
	{	
		$this->db->select('*');
		$this->db->from('funcionario');
		$this->db->where('nivel_acesso', '4');
		$this->db->group_by('funcionario.nivel_acesso');
		$dados ["funcionarios_row"] = $this->db->get()->result();
		/*----------------------------------------------------------------------------------------*/
		$this->db->select('*');
		$this->db->from('funcionario');
		$this->db->where('nivel_acesso', '4');
		$this->db->order_by("nome_funcionario", "asc");
		$dados ["funcionarios"] = $this->db->get()->result();
		/*----------------------------------------------------------------------------------------*/
		$this->load->view('layout/cabecalho_rh');
		$this->load->view('layout/menu_lateral_rh');
		$this->load->view('conteudo/_rh/_funcionario/_listar_funcionarios', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	public function listar_docentes()
	{	
		$this->db->select('*');
		$this->db->from('funcionario');
		$this->db->where('nivel_acesso', '5');
		$this->db->group_by('funcionario.nivel_acesso');
		$dados ["funcionarios_row"] = $this->db->get()->result();
		// ----------------------------------------------------------------------------------------
		$this->db->select('*');
		$this->db->from('funcionario');
		$this->db->where('nivel_acesso', '5');
		$this->db->order_by("nome_funcionario", "asc");
		$dados ["funcionarios"] = $this->db->get()->result();
		/*----------------------------------------------------------------------------------------*/
		$this->load->view('layout/cabecalho_rh');
		$this->load->view('layout/menu_lateral_rh');
		$this->load->view('conteudo/_rh/_funcionario/_listar_funcionarios', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	public function listar_sg()
	{	
		$this->db->select('*');
		$this->db->from('funcionario');
		$this->db->where('nivel_acesso', '7');
		$this->db->group_by('funcionario.nivel_acesso');
		$dados ["funcionarios_row"] = $this->db->get()->result();
		// ----------------------------------------------------------------------------------------
		$this->db->select('*');
		$this->db->from('funcionario');
		$this->db->where('nivel_acesso', '7');
		$this->db->order_by("nome_funcionario", "asc");
		$dados ["funcionarios"] = $this->db->get()->result();
		/*----------------------------------------------------------------------------------------*/
		$this->load->view('layout/cabecalho_rh');
		$this->load->view('layout/menu_lateral_rh');
		$this->load->view('conteudo/_rh/_funcionario/_listar_funcionarios', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	public function listar_seguranca()
	{	
		$this->db->select('*');
		$this->db->from('funcionario');
		$this->db->where('nivel_acesso', '8');
		$this->db->group_by('funcionario.nivel_acesso');
		$dados ["funcionarios_row"] = $this->db->get()->result();
		// ----------------------------------------------------------------------------------------
		$this->db->select('*');
		$this->db->from('funcionario');
		$this->db->where('nivel_acesso', '8');
		$this->db->order_by("nome_funcionario", "asc");
		$dados ["funcionarios"] = $this->db->get()->result();
		/*----------------------------------------------------------------------------------------*/
		$this->load->view('layout/cabecalho_rh');
		$this->load->view('layout/menu_lateral_rh');
		$this->load->view('conteudo/_rh/_funcionario/_listar_funcionarios', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	/*					UPLOAD - PHOTO DE PERFIL -> UPDATE NA TABELA funcionario
	============================================================================================= */
	public function carregar_imagem()
	{
		$id = $this->input->get("id_funcionario");
		$dados["funcionario"] = $this->Funcionario_Model->retorna_funcionario($id);
		/*----------------------------------------------------------------------------------------*/
		$this->load->view('layout/cabecalho_rh');
		$this->load->view('layout/menu_lateral_rh');
		$this->load->view('conteudo/_rh/_funcionario/fotografia', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	/*						Executa o processo de recorte da imagem
	============================================================================================= */
	public function Recortar()
	{
		$id = $this->input->post("id_funcionario");    
		/*-----------------------------------------------*/
		// Configurações para o upload da imagem
		// Diretório para salvar a imagem
		$configUpload['upload_path']   = FCPATH ."_assets/upload";
		// Tipos de imagem permitidos
		$configUpload['allowed_types'] = 'jpg|png';
		// Usar nome de arquivo aleatório, ignorando o nome original do arquivo
		$configUpload['encrypt_name']  = TRUE;
		// Aplica as configurações para a library upload
		$this->upload->initialize($configUpload);
		// Verifica se o upload foi efetuado ou não
		// Em caso de erro carrega a home exibindo as mensagens
		// Em caso de sucesso faz o processo de recorte
		if ( ! $this->upload->do_upload('imagem'))
		{
			// Recupera as mensagens de erro e envia o usuário para a home
			$dados= array('error' => $this->upload->display_errors());
			// $this->load->view('home',$dados);
		}
		else
		{
			// Recupera os dados da imagem
			$dadosImagem = $this->upload->data();
			// Calcula os tamanhos de ponto de corte e posição
			// de forma proporcional em relação ao tamanho da
			// imagem original
			$tamanhos = $this->CalculaPercetual($this->input->post());
			// Define as configurações para o recorte da imagem
			// Biblioteca a ser utilizada
			$configCrop['image_library'] = 'gd2';
			//Path da imagem a ser recortada
			$configCrop['source_image'] = $dadosImagem['full_path'];
			// Diretório onde a imagem recortada será gravada
			$configCrop['new_image'] = FCPATH ."_assets/upload";
			// Proporção
			$configCrop['maintain_ratio'] = FALSE;
			// Qualidade da imagem
			$configCrop['quality'] = 100;
			// Tamanho do recorte
			$configCrop['width']  = $tamanhos['wcrop'];
			$configCrop['height'] = $tamanhos['hcrop'];
			// Ponto de corte (eixos x e y)
			$configCrop['x_axis'] = $tamanhos['x'];
			$configCrop['y_axis'] = $tamanhos['y'];
			// Aplica as configurações para a library image_lib
			$this->image_lib->initialize($configCrop);
			// Verifica se o recorte foi efetuado ou não
			// Em caso de erro carrega a home exibindo as mensagens
			// Em caso de sucesso envia o usuário para a tela
			// de visualização do recorte
			if ( ! $this->image_lib->crop())
			{
				// Recupera as mensagens de erro e envia o usuário para a home
				$dados = array('error' => $this->image_lib->display_errors());
				// $this->load->view('home',$dados);
			}
			else
			{
				$info_arquivo = $this->upload->data();   // recupera os dados do arquivo em caso de sucesso
				$nome_arquivo = $dadosImagem['file_name'];	// pega o nome do arquivo da array
				$funcionario = array(
					"id_funcionario" => $id,
					"photo" => $nome_arquivo
				);
				$this->db->where('id_funcionario', $id);
				$this->db->update('funcionario', $funcionario);
				echo $this->session->set_flashdata('msg',"<div class='alert alert-success text-center'>FOTOGRAFIA ALTERADA COM SUCESSO</div>");	
				redirect('rh/funcionario/detalhe_rh?id_funcionario='.$id);
			}
		}
	}
	/* 			Método privado responsável por calcular os tamanhos de forma proporcional
	=================================================================================================== */
	private function CalculaPercetual($dimensoes){
		// Verifica se a largura da imagem original é
		// maior que a da área de recorte, se for calcula o tamanho proporcional
		if($dimensoes['woriginal'] > $dimensoes['wvisualizacao']){
			$percentual = $dimensoes['woriginal'] / $dimensoes['wvisualizacao'];
			$dimensoes['x'] = round($dimensoes['x'] * $percentual);
			$dimensoes['y'] = round($dimensoes['y'] * $percentual);
			$dimensoes['wcrop'] = round($dimensoes['wcrop'] * $percentual);
			$dimensoes['hcrop'] = round($dimensoes['hcrop'] * $percentual);
		}
		// Retorna os valores a serem utilizados no processo de recorte da imagem
		return $dimensoes;
	}
	/*  								IMAGE WEBCAM 
	==================================================================================================== */
	public function ajaxwebcam() {
		$id = $this->input->post("id_funcionario");
		/*------------------------------------------------*/
		$camera_image  = $this->input->post('camera_image');
		$filteredData = explode(',', $camera_image); 				// ao receber o parametro do ajax ele vem bruto	
		$unencoded = base64_decode($filteredData[1]);
		//Create the image 
		$name = date('YmdHis');
		$fotografia = $name.'.jpg'; 								// fotografia do individuo;
		$fp = fopen('_assets/upload/'.$fotografia, 'w');
		fwrite($fp, $unencoded);
		fclose($fp);
		$funcionario = array(
			"id_funcionario" => $id,
			"photo" => $fotografia
		);
		/* ======================================================================================================= */
		$this->db->where('id_funcionario', $id);
		$this->db->update('funcionario', $funcionario);
		echo $this->session->set_flashdata('msg',"<div class='alert alert-success text-center'>FOTOGRAFIA ALTERADA COM SUCESSO</div>");	
		redirect('rh/funcionario/detalhe_rh?id_funcionario='.$id);
	}
	/*			 			DECLARACAO DE EFECTIVIDADE
	=======================================================================*/
	public function declaracao_efectividade_pdf($id_funcionario)
	{
		// ===========================================================================================================================
		$this->db->select('*');
		$this->db->from('funcionario');
		$this->db->where('id_funcionario', $id_funcionario);
		$dados["funcionario_row"] = $this->db->get()->row();									// Join funcionario
		// ===========================================================================================================================
		// Carrega o PDF
        $this->load->library("My_dompdf");
        $this->my_dompdf->gerar_pdf('reports/declaracao_efectividade_pdf', $dados, TRUE);
	}
	public function solicitacao_ferias_pdf()
	{
		$id_funcionario = $this->input->post("id_funcionario");
		/*===========================================================================================================================*/ 
		$this->db->select('*');
		$this->db->from('funcionario');
		$this->db->where('id_funcionario', $id_funcionario);
		$dados["funcionario_row"] = $this->db->get()->row();
		/*==========================================================================*/
		$dados['data_inicio'] = $this->input->post("data_inicio");
		$dados['data_fim']	  = $this->input->post("data_fim");
		/*==========================================================================*/
		// Carrega o PDF
        $this->load->library("My_dompdf");
        $this->my_dompdf->gerar_pdf('reports/solicitacao_ferias_pdf', $dados, TRUE);

	}
}