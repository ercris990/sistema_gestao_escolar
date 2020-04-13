<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//	CHAMA A VIEW AS VIEWS DA DISCIPLINA
class Disciplina extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		if($this->session->userdata('logged_in') !== TRUE){
			redirect('/');
		}
	}
/*=====================INICIO=LISTAR=DISCIPLINA=====================*/
	//			CHAMA A VIEW LISTAR DICISPLINA	
	public function listar_disciplina()
	{
		$lista = $this->Disciplina_Model->listardisciplina();
		$dados = array("disciplina" => $lista);
		// CARREGA A VIZUALIZACAO DA VIEW LISTAR DISCIPLINA
		$this->load->view('layout/cabecalho');
		$this->load->view('layout/menu_lateral');
		$this->load->view('conteudo/_secretaria/_disciplina/listar_disciplina', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
/*=====================INICIO=CRIAR=NOVA=DISCIPLINA=====================*/
	//	CARREGA AVIEW DO FURMULARIO CRIAR DISCIPLINA
	public function nova_disciplina()
	{
/*-------------------------------- SELECT DINAMICO ------------------------------------*/
		$this->load->model("Disciplina_Model", "disciplina");
		$data['classe'] = $this->disciplina->get_classe();
/*-------------------------------------------------------------------------------------*/
		$this->load->view('layout/cabecalho');
        $this->load->view('layout/menu_lateral');
		$this->load->view('conteudo/_secretaria/_disciplina/nova_disciplina', $data);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	//  INSERIR REGISTROS NA TABELA DISCIPLINA
	public function guardar()
	{
		$this->Disciplina_Model->novadisciplina();
		redirect('secretaria/disciplina/nova_disciplina','refresh');
	}
/*=====================INICIO=APAGAR=DISCIPLINA======================*/
	//	APAGAR REGISTROS NA TABELA DISCIPLINA
	public function apagar($id)
	{
		$this->load->model("Disciplina_Model");
		$this->Disciplina_Model->apagardisciplina($id);
		redirect('secretaria/disciplina/listar_disciplina', 'refresh');
	}
/*=====================INICIO=ACTUALIAZAR=DISCIPLINA======================*/
	//	ACTUALIZAR REGISTROS NA TABELA DISCIPLINA
	public function editar($id=NULL)
	{
		/*--------------------- SELECT DINAMICO ---------------------*/
		// $this->load->model("Turma_Model", "turma");
		// $dados['sala'] = $this->turma->get_sala();
		// $dados['classe'] = $this->turma->get_classe();


		$this->load->model("Disciplina_Model", "disciplina");
		$data['classe'] = $this->disciplina->get_classe();
		/*-----------------------------------------------------------*/
		$this->db->where('id_disciplina', $id);
		$data['disciplina'] = $this->db->get('disciplina')->result();
		// CARREGA A VIZUALIZACAO DA VIEW LISTA
		$this->load->view('layout/cabecalho');
		$this->load->view('layout/menu_lateral');
		$this->load->view('conteudo/_secretaria/_disciplina/editar_disciplina', $data);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	
	//	SALVA A ACTUALIZACAO DO REGISTROS NA TABELA DISCIPLINA
	public function salvaractualizacao($id=NULL)
	{
		$this->load->model("Disciplina_Model");
		$this->Disciplina_Model->actualizar();
		redirect('secretaria/disciplina/listar_disciplina', 'refresh');
	}
}