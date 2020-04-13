<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curso extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		if($this->session->userdata('logged_in') !== TRUE){
			redirect('/');
		}
	}
/*=====================INICIO=LISTAR=curso=====================*/
	//			CHAMA A VIEW LISTAR curso	
	public function listar_curso()
	{
		$this->load->model("curso_Model");
		$lista = $this->curso_Model->listarcurso();
		$dados = array("curso" => $lista);

		// CARREGA A VIZUALIZACAO DA VIEW LISTAR curso
		$this->load->view('layout/cabecalho');
		$this->load->view('layout/menu_lateral');
		$this->load->view('conteudo/_secretaria/_curso/listar_curso', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
/*=====================INICIO=CRIAR=NOVA=curso=====================*/
	//	CARREGA AVIEW DO FURMULARIO    
	public function novo_curso()
	{
		$this->load->view('layout/cabecalho');
        $this->load->view('layout/menu_lateral');
		$this->load->view('conteudo/_secretaria/_curso/novo_curso');
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	//  INSERIR REGISTROS NA TABELA curso
	public function guardar()
	{
        $curso = array(
            "nome_curso" => $this->input->post('nome_curso')			
        );
		$this->load->model("curso_Model");
		$this->curso_Model->novocurso($curso);
		redirect('secretaria/curso/novo_curso','refresh');
	}
/*=====================INICIO=APAGAR=curso======================*/
	//	APAGAR REGISTROS NA TABELA curso
	public function apagar($id)
	{
		$this->load->model("curso_Model");
		$this->curso_Model->apagarcurso($id);
		redirect('secretaria/curso/listar_curso', 'refresh');
	}
/*=====================INICIO=ACTUALIAZAR=curso======================*/
	//	ACTUALIZAR REGISTROS NA TABELA curso
	public function editar($id=NULL)
	{
		$this->db->where('id_curso', $id);
		$data['curso'] = $this->db->get('curso')->result();

		// CARREGA A VIZUALIZACAO DA VIEW LISTA
		$this->load->view('layout/cabecalho');
		$this->load->view('layout/menu_lateral');
		$this->load->view('conteudo/_secretaria/_curso/editar_curso', $data);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	
	//	SALVA A ACTUALIZACAO DO REGISTROS NA TABELA curso
	public function salvaractualizacao($id=NULL)
	{
		$curso = array(
			"nome_curso" => $this->input->post('nome_curso'),
			"nome_curso" => $this->input->post('curso'),
		);
		$this->load->model("curso_Model");
		$this->curso_Model->actualizar($curso);
		redirect('secretaria/curso/listar_curso', 'refresh');
	}
}