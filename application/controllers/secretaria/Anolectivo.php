<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anolectivo extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		if($this->session->userdata('logged_in') !== TRUE){
			redirect('/');
		}
	}
/*=====================INICIO=LISTAR=ANO=LECTIVO=====================*/
	//			CHAMA A VIEW LISTAR ALUNO	
	public function listar_ano()
	{
		$lista = $this->Anolectivo_Model->listaranolectivo();
		$dados = array("anolectivo" => $lista);
		// CARREGA A VIZUALIZACAO DA VIEW LISTAR ANO LECTIVO
		$this->load->view('layout/cabecalho');
		$this->load->view('layout/menu_lateral');
		$this->load->view('conteudo/_secretaria/_ano/listar_ano', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
/*=====================INICIO=CRIAR=NOVO=ANO=LECTIVO=====================*/
	//	CARREGA AVIEW DO FURMULARIO    
	public function novo_ano()
	{
		$this->load->view('layout/cabecalho');
        $this->load->view('layout/menu_lateral');
		$this->load->view('conteudo/_secretaria/_ano/novo_ano');
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	//  INSERIR REGISTROS NA TABELA ANO LECTIVO
	public function guardar()
	{	
		$ano = array
		(
            "ano_let" => $this->input->post('ano_let')
        );
		$this->load->model("Anolectivo_Model");
		$this->Anolectivo_Model->novoanolectivo($ano);
		echo $this->session->set_flashdata('msg',"<div class='alert alert-success text-center'>ANO LECTIVO ABERTO COM SUCESSO</div>");
		redirect('secretaria/anolectivo/novo_ano','refresh');
	}
/*=====================INICIO=APAGAR=ANO=LECTIVO=====================*/
	//	APAGAR REGISTROS NA TABELA ANO LECTIVO
	public function apagar($id)
	{
		$this->load->model("Anolectivo_Model");
		$this->Anolectivo_Model->apagaranolectivo($id);
		redirect('secretaria/anolectivo/listar_ano', 'refresh');
	}
/*=====================INICIO=ACTUALIAZAR=ANO=LECTIVO=====================*/
	//	ACTUALIZAR REGISTROS NA TABELA ANO LECTIVO
	public function editar($id=NULL)
	{
		$this->db->where('id_ano', $id);
		$data['anolectivo'] = $this->db->get('anolectivo')->result();
		// CARREGA A VIZUALIZACAO DA VIEW LISTA
		$this->load->view('layout/cabecalho');
		$this->load->view('layout/menu_lateral');
		$this->load->view('conteudo/_secretaria/_ano/editar_ano', $data);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	//	SALVA A ACTUALIZACAO DO REGISTROS NA TABELA ANO LECTIVO
	public function salvaractualizacao($id=NULL)
	{
		$ano = array(
			"ano_let" => $this->input->post('ano_let')
		);
		$this->load->model("Anolectivo_Model");
		$this->Anolectivo_Model->actualizar($ano);
		redirect('secretaria/anolectivo/listar_ano', 'refresh');
	}
}