<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sala extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		if($this->session->userdata('logged_in') !== TRUE){
			redirect('/');
		}
	}
/*=====================INICIO=LISTAR=SALA======================*/
	public function listar_sala()
	{
		$this->load->model("Sala_Model");
		$lista = $this->Sala_Model->listarsala();
		$dados = array("sala" => $lista);
		// CARREGA A VIZUALIZACAO DA VIEW LISTAR sala LECTIVO
		$this->load->view('layout/cabecalho');
		$this->load->view('layout/menu_lateral');
		$this->load->view('conteudo/_secretaria/_sala/listar_sala', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	public function listar_salas()
	{
		$this->load->model("Sala_Model");
		$lista = $this->Sala_Model->listarsala();
		$dados = array("sala" => $lista);
		// CARREGA A VIZUALIZACAO DA VIEW LISTAR sala LECTIVO
		$this->load->view('layout/cabecalho');
		$this->load->view('layout/menu_lateral_secretaria');
		$this->load->view('conteudo/_secretaria/_sala/listar_salas', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	public function listar_salas_coordenacao()
	{
		$this->load->model("Sala_Model");
		$lista = $this->Sala_Model->listarsala();
		$dados = array("sala" => $lista);
		// CARREGA A VIZUALIZACAO DA VIEW LISTAR sala LECTIVO
		$this->load->view('layout/cabecalho');
		$this->load->view('layout/menu_lateral_coordenacao');
		$this->load->view('conteudo/_secretaria/_sala/listar_salas_coordenacao', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
/*=====================INICIO=CRIAR=NOVA=SALA=LECTIVO=====================*/
	//	CARREGA AVIEW DO FURMULARIO    
	public function nova_sala()
	{
		$this->load->view('layout/cabecalho');
        $this->load->view('layout/menu_lateral');
		$this->load->view('conteudo/_secretaria/_sala/nova_sala');
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	//  INSERIR REGISTROS NA TABELA SALA LECTIVO
	public function guardar()
	{
        $sala = array(
            "numero_sala" => $this->input->post('numero_sala')
        );
		$this->load->model("Sala_Model");
		$this->Sala_Model->novasala($sala);
		redirect('secretaria/sala/nova_sala','refresh');
	}
/*=====================INICIO=APAGAR=sala=LECTIVO=====================*/
	//	APAGAR REGISTROS NA TABELA sala LECTIVO
	public function apagar($id)
	{
		$this->load->model("Sala_Model");
		$this->Sala_Model->apagarsala($id);
		redirect('secretaria/sala/listar_sala', 'refresh');
	}
/*=====================INICIO=ACTUALIAZAR=sala=LECTIVO=====================*/
	//	ACTUALIZAR REGISTROS NA TABELA sala LECTIVO
	public function editar($id=NULL)
	{
		$this->db->where('id_sala', $id);
		$data['sala'] = $this->db->get('sala')->result();
		// CARREGA A VIZUALIZACAO DA VIEW LISTA
		$this->load->view('layout/cabecalho');
		$this->load->view('layout/menu_lateral');
		$this->load->view('conteudo/_secretaria/_sala/editar_sala', $data);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	/* SALVA A ACTUALIZACAO DO REGISTROS NA TABELA SALA */
	public function salvaractualizacao($id=NULL)
	{
		$sala = array(
			"numero_sala" => $this->input->post('numero_sala')
		);
		$this->load->model("Sala_Model");
		$this->Sala_Model->actualizar($sala);
		redirect('secretaria/sala/listar_sala', 'refresh');
	}
	/* VER TURMA - SECRETARIA */	
	public function ver_turmas($id_sala)
	{
		$this->db->select('*');															// select tudo
		$this->db->from('sala');														// da tbl matricula
		$this->db->where("id_sala", $id_sala);											// onde
		$dados["sala"] = $this->db->get()->row();
		/* ================================================================================================== */
		$this->db->select('*');															// select tudo
		$this->db->from('turma');														// da tbl matricula
		$this->db->where("sala_id", $id_sala);											// onde
		$this->db->order_by("nome_turma", "asc");  										// Ordenar a travez do nome
		$this->db->join('classe', 'classe.id_classe = turma.classe_id');		 		// Join turma e matricula
		$this->db->join('periodo', 'periodo.id_periodo = turma.periodo_id');		 	// Join turma e matricula
		$dados['turmas'] = $this->db->get()->result();									// retorna várias linhas
		if ( empty($dados["turmas"]) )
		{
			echo $this->session->set_flashdata('msg',"<div class='alert alert-warning text-center'>A SALA SELECIONADA NÃO TEM TURMAS ASSOCIADAS</div>");
			redirect('secretaria/sala/listar_salas');
		}
		elseif  ( !empty($dados["turmas"]) )
		{
		/* ===========================================================================================================*/
			$this->load->view('layout/cabecalho');
			$this->load->view('layout/menu_lateral_secretaria');
			$this->load->view('conteudo/_secretaria/_sala/detalhes_sala', $dados);
			$this->load->view('layout/rodape');
			$this->load->view('layout/script');
		}
	}
	/* VER TURMA - COORDENACAO */	
	public function ver_turmas_coordenacao($id_sala)
	{
		$this->db->select('*');															// select tudo
		$this->db->from('sala');														// da tbl matricula
		$this->db->where("id_sala", $id_sala);											// onde
		$dados["sala"] = $this->db->get()->row();
		/* ================================================================================================== */
		$this->db->select('*');															// select tudo
		$this->db->from('turma');														// da tbl matricula
		$this->db->where("sala_id", $id_sala);											// onde
		$this->db->order_by("nome_turma", "asc");  										// Ordenar a travez do nome
		$this->db->join('classe', 'classe.id_classe = turma.classe_id');		 		// Join turma e matricula
		$this->db->join('periodo', 'periodo.id_periodo = turma.periodo_id');		 	// Join turma e matricula
		$dados['turmas'] = $this->db->get()->result();									// retorna várias linhas
		if ( empty($dados["turmas"]) )
		{
			echo $this->session->set_flashdata('msg',"<div class='alert alert-warning text-center'>A SALA SELECIONADA NÃO TEM TURMAS ASSOCIADAS</div>");
			redirect('secretaria/sala/listar_salas_coordenacao');
		}
		elseif  ( !empty($dados["turmas"]) )
		{
		/* ===========================================================================================================*/
			$this->load->view('layout/cabecalho');
			$this->load->view('layout/menu_lateral_coordenacao');
			$this->load->view('conteudo/_secretaria/_sala/detalhes_sala_coordenacao', $dados);
			$this->load->view('layout/rodape');
			$this->load->view('layout/script');
		}
	}
}