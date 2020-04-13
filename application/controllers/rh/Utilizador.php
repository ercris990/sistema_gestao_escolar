<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//	CHAMA A VIEW AS VIEWS DO ALUNO	
class Utilizador extends CI_Controller 
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
	/*=====================INICIO=LISTAR=UTILIZADOR=====================*/
	//			CHAMA A VIEW LISTAR ALUNO	
	public function listar_utilizador(){

		$this->load->model("Utilizador_Model");
		$lista = $this->Utilizador_Model->listarutilizador();
		$dados = array("utilizador" => $lista);

		// CARREGA A VIZUALIZACAO DA VIEW LISTAR UTILIZADORES
		$this->load->view('layout/cabecalho');
		$this->load->view('layout/menu_lateral');
		$this->load->view('conteudo/_rh/_utilizador/listar_utilizador', $dados);
		$this->load->view('layout/rodape');
	}
/*=====================INICIO=CRIAR=NOVO=UTILIZADOR=====================*/
	//	CARREGA AVIEW DO FURMULARIO    
	public function novo_utilizador(){

		$this->load->view('layout/cabecalho');
        $this->load->view('layout/menu_lateral');
		$this->load->view('conteudo/_rh/_utilizador/novo_utilizador');
		$this->load->view('layout/rodape');
	}

	//  INSERIR REGISTROS NA TABELA UTILIZADORES
	public function guardar(){
	
		$user = array(
			"nome_utilizador" => $this->input->post("nome_utilizador"),
			"senha" => $this->input->post("senha"),
			"departamento" => $this->input->post("departamento")
		);
		$this->load->model("Utilizador_Model");
		$this->Utilizador_Model->novoutilizador($user);
		redirect('rh/utilizador/novo_utilizador','refresh');
	}
/*=====================INICIO=APAGAR=UTILIZADOR=====================*/
	//	APAGAR REGISTROS NA TABELA UTILIZADORES
	public function apagar($id){
		$this->load->model("Utilizador_Model");
		$this->Utilizador_Model->apagarutilizador($id);
		redirect('rh/utilizador/listar_utilizador', 'refresh');
	}
/*=====================INICIO=ACTUALIAZAR=UTILIZADOR=====================*/
	//	ACTUALIZAR REGISTROS NA TABELA UTILIZADORES
	public function editar($id=NULL){
		$this->db->where('id_utilizador', $id);
		$data['utilizador'] = $this->db->get('utilizador')->result();

		// CARREGA A VIZUALIZACAO DA VIEW LISTA
		$this->load->view('layout/cabecalho');
		$this->load->view('layout/menu_lateral');
		$this->load->view('conteudo/_rh/_utilizador/editar_utilizador', $data);
		$this->load->view('layout/rodape');
	}
	
	//	SALVA A ACTUALIZACAO DO REGISTROS NA TABELA UTILIZADORES
	public function salvaractualizacao($id=NULL){
		$user = array(
			"nome_utilizador" => $this->input->post("nome_utilizador"),
			"senha" => $this->input->post("senha"),
			"departamento" => $this->input->post("departamento")
		);
		$this->load->model("Utilizador_Model");
		$this->Utilizador_Model->actualizar($user);
		redirect('rh/utilizador/listar_utilizador', 'refresh');
	}
}