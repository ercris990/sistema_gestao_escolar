<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Turma extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		if($this->session->userdata('logged_in') !== TRUE){
			redirect('/');
		}
	}
	/*=====================INICIO=LISTAR=TURMA=====================*/
	//			CHAMA A VIEW LISTAR TURMA	
	public function listar_turma()
	{
		$lista = $this->Turma_Model->listarturma();
		$dados = array("turma" => $lista);
		// CARREGA A VIZUALIZACAO DA VIEW LISTAR TURMA
		$this->load->view('layout/cabecalho');
		$this->load->view('layout/menu_lateral');
		$this->load->view('conteudo/_secretaria/_turma/listar_turma', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	//			CHAMA A VIEW LISTAR TURMA	
	public function listar_turmas()
	{
		$this->db->select('*');																// Selecione Tudo
		$this->db->from('turma');														// Da tabela Matricula
		$this->db->order_by("nome_turma", "asc");												// Orden
		$this->db->join('classe', 	  'classe.id_classe  = turma.classe_id');				// Join tbl classe [turma]
		$this->db->join('periodo', 	  'periodo.id_periodo  = turma.periodo_id');				// Join tbl classe [turma]
		$this->db->join('sala', 	  'sala.id_sala  = turma.sala_id');				// Join tbl classe [turma]
		$dados["turmas"] = $this->db->get()->result();									// Join Matricula	   
		//======================================================================
		$this->load->view('layout/cabecalho');
		$this->load->view('layout/menu_lateral_secretaria');
		$this->load->view('conteudo/_secretaria/_turma/listar_turma_1', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	//			CHAMA A VIEW LISTAR TURMA	
	public function listar_turmas_coordenacao()
	{
		$this->db->select('*');																// Selecione Tudo
		$this->db->from('turma');														// Da tabela Matricula
		$this->db->order_by("nome_turma", "asc");												// Orden
		$this->db->join('classe', 	  'classe.id_classe  = turma.classe_id');				// Join tbl classe [turma]
		$this->db->join('periodo', 	  'periodo.id_periodo  = turma.periodo_id');				// Join tbl classe [turma]
		$this->db->join('sala', 	  'sala.id_sala  = turma.sala_id');				// Join tbl classe [turma]
		$dados["turmas"] = $this->db->get()->result();									// Join Matricula	   
		//======================================================================
		$this->load->view('layout/cabecalho');
		$this->load->view('layout/menu_lateral_coordenacao');
		$this->load->view('conteudo/_secretaria/_turma/listar_turma_1', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	/*=====================INICIO=CRIAR=NOVA=TURMA=====================*/ 
	//	CARREGA AVIEW DO FURMULARIO    
	public function nova_turma()
	{
		/*-------------------------------- SELECT DINAMICO ------------------------------------*/
		$this->load->model("Turma_Model", "turma");
		$dados['sala'] = $this->turma->get_sala();
		$dados['classe'] = $this->turma->get_classe();
		$dados['periodo'] = $this->turma->get_periodo();
		/*-------------------------------------------------------------------------------------*/
		$this->load->view('layout/cabecalho');
        $this->load->view('layout/menu_lateral');
		$this->load->view('conteudo/_secretaria/_turma/nova_turma', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	//  INSERIR REGISTROS NA TABELA TURMA
	public function guardar()
	{
		$this->Turma_Model->novaturma();
		redirect('secretaria/turma/nova_turma','refresh');
	}
	/*=====================INICIO=APAGAR=TURMA======================*/
	//	APAGAR REGISTROS NA TABELA turma
	public function apagar($id)
	{
		$this->load->model("Turma_Model");
		$this->Turma_Model->apagarturma($id);
		redirect('secretaria/turma/listar_turma', 'refresh');
	}
	/*=====================INICIO=ACTUALIAZAR=TURMA======================*/
	//	ACTUALIZAR REGISTROS NA TABELA TURMA
	public function editar($id)
	{
		/*-------------------------------- SELECT DINAMICO ------------------------------------*/
		$this->load->model("Turma_Model", "turma");
		$dados['sala'] = $this->turma->get_sala();
		$dados['classe'] = $this->turma->get_classe();
		$dados['periodo'] = $this->turma->get_periodo();
		/*-------------------------------------------------------------------------------------*/
		$this->db->where('id_turma', $id);
		$dados['turma'] = $this->db->get('turma')->result();
		/*------------------------------------------------*/
		$this->load->view('layout/cabecalho');
		$this->load->view('layout/menu_lateral');
		$this->load->view('conteudo/_secretaria/_turma/editar_turma', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	/*	SALVA A ACTUALIZACAO DO REGISTROS NA TABELA TURMA	*/
	public function salvaractualizacao()
	{	
		$this->load->model("Turma_Model");
		$this->Turma_Model->actualizar();
		redirect('secretaria/turma/listar_turma', 'refresh');
	}
}