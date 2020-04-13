<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classe extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		if($this->session->userdata('logged_in') !== TRUE){
			redirect('/');
		}
	}
/*=====================INICIO=LISTAR=CLASSE=====================*/
	//			CHAMA A VIEW LISTAR CLASSE	
	public function listar_classe()
	{
		$this->load->model("Classe_Model");
		$lista = $this->Classe_Model->listarclasse();
		$dados = array("classe" => $lista);

		// CARREGA A VIZUALIZACAO DA VIEW LISTAR CLASSE
		$this->load->view('layout/cabecalho');
		$this->load->view('layout/menu_lateral');
		$this->load->view('conteudo/_secretaria/_classe/listar_classe', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
/*=====================INICIO=CRIAR=NOVA=CLASSE=====================*/
	//	CARREGA AVIEW DO FURMULARIO    
	public function nova_classe()
	{
		$this->load->view('layout/cabecalho');
        $this->load->view('layout/menu_lateral');
		$this->load->view('conteudo/_secretaria/_classe/nova_classe');
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	//  INSERIR REGISTROS NA TABELA CLASSE
	public function guardar()
	{
        $classe = array(
            "nome_classe" => $this->input->post('nome_classe'),		
            "nivel" => $this->input->post('nivel')			
        );
		$this->load->model("Classe_Model");
		$this->Classe_Model->novaclasse($classe);
		redirect('secretaria/classe/nova_classe','refresh');
	}
/*=====================INICIO=APAGAR=classe======================*/
	//	APAGAR REGISTROS NA TABELA CLASSE
	public function apagar($id)
	{
		$this->load->model("Classe_Model");
		$this->Classe_Model->apagarclasse($id);
		redirect('secretaria/classe/listar_classe', 'refresh');
	}
/*=====================INICIO=ACTUALIAZAR=CLASSE======================*/
	//	ACTUALIZAR REGISTROS NA TABELA CLASSE
	public function editar($id=NULL)
	{
		$this->db->where('id_classe', $id);
		$data['classe'] = $this->db->get('classe')->result();

		// CARREGA A VIZUALIZACAO DA VIEW LISTA
		$this->load->view('layout/cabecalho');
		$this->load->view('layout/menu_lateral');
		$this->load->view('conteudo/_secretaria/_classe/editar_classe', $data);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	
	//	SALVA A ACTUALIZACAO DO REGISTROS NA TABELA CLASSE
	public function salvaractualizacao($id=NULL)
	{
		$classe = array(
			"nome_classe" => $this->input->post('nome_classe'),
			"nome_classe" => $this->input->post('nivel'),
		);
		$this->load->model("Classe_Model");
		$this->Classe_Model->actualizar($classe);
		redirect('secretaria/classe/listar_classe', 'refresh');
	}
}