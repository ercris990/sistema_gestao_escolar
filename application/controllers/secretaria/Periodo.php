<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Periodo extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		if($this->session->userdata('logged_in') !== TRUE){
			redirect('/');
		}
	}
/*=====================INICIO=LISTAR=PERIODO====================*/
	//			CHAMA A VIEW LISTAR periodo	
	public function listar_periodo()
	{
		$this->load->model("Periodo_Model");
		$lista = $this->Periodo_Model->listarperiodo();
		$dados = array("periodo" => $lista);
		// CARREGA A VIZUALIZACAO DA VIEW LISTAR PERIODO
		$this->load->view('layout/cabecalho');
		$this->load->view('layout/menu_lateral');
		$this->load->view('conteudo/_secretaria/_periodo/listar_periodo', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
/*=====================INICIO=CRIAR=NOVo=PERIODO====================*/
	//	CARREGA AVIEW DO FURMULARIO    
	public function novo_periodo()
	{
		$this->load->view('layout/cabecalho');
        $this->load->view('layout/menu_lateral');
		$this->load->view('conteudo/_secretaria/_periodo/novo_periodo');
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	//  INSERIR REGISTROS NA TABELA PERIODO
	public function guardar()
	{
        $periodo = array(
            "nome_periodo" => $this->input->post('nome_periodo')
        );
		$this->load->model("Periodo_Model");
		$this->Periodo_Model->novoperiodo($periodo);
		redirect('secretaria/periodo/novo_periodo','refresh');
	}
/*=====================INICIO=APAGAR=PERIODO=====================*/
	//	APAGAR REGISTROS NA TABELA PERIODO
	public function apagar($id)
	{
		$this->load->model("Periodo_Model");
		$this->Periodo_Model->apagarperiodo($id);
		redirect('secretaria/periodo/listar_periodo', 'refresh');
	}
/*=====================INICIO=ACTUALIAZAR=PERIODO=====================*/
	//	ACTUALIZAR REGISTROS NA TABELA PERIODO
	public function editar($id=NULL)
	{
		$this->db->where('id_periodo', $id);
		$data['periodo'] = $this->db->get('periodo')->result();
		// CARREGA A VIZUALIZACAO DA VIEW LISTA
		$this->load->view('layout/cabecalho');
		$this->load->view('layout/menu_lateral');
		$this->load->view('conteudo/_secretaria/_periodo/editar_periodo', $data);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	
	//	SALVA A ACTUALIZACAO DO REGISTROS NA TABELA PERIODO
	public function salvaractualizacao($id=NULL)
	{
		$periodo = array(
			"nome_periodo" => $this->input->post('nome_periodo'),
		);
		$this->load->model("Periodo_Model");
		$this->Periodo_Model->actualizar($periodo);
		redirect('secretaria/periodo/listar_periodo', 'refresh');
	}
}