<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sessao extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	/* ========== carrega a pagina de login ========== */ 
	public function index()
	{
		$this->load->view('layout/cabecalho_login');
		$this->load->view('conteudo/login');
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	/* ========== funcao login ========== */ 
    public function login()	
	{
		$nome_user = $this->input->post('nome_user',TRUE);
		$password  = $this->input->post('password',TRUE);
		$validate = $this->Sessao_Model->validate($nome_user,$password);
		if($validate->num_rows() > 0)
		{
			$data  = $validate->row_array();
			$id_funcionario  	= $data['id_funcionario'];
			$nome_funcionario  	= $data['nome_funcionario'];
			$nome_user 			= $data['nome_user'];
			$nivel_acesso 		= $data['nivel_acesso'];
			$sesdata = array(
				'id_funcionario'  	=> $id_funcionario,
				'nome_funcionario'  => $nome_funcionario,
				'nome_user'     	=> $nome_user,
				'nivel_acesso'     	=> $nivel_acesso,
				'logged_in' 		=> TRUE
			);
			$this->session->set_userdata($sesdata);
			// acesso ao painel direccao
			if($nivel_acesso === '1'){
				redirect('home/direccao');
			// acesso ao painel secretaria
			}elseif($nivel_acesso === '2'){
				redirect('home/secretaria');
			// acesso ao painel recursos humanos
			}elseif($nivel_acesso === '3'){
				redirect('home/recursos_humanos');
			// acesso ao painel coordenacao
			}elseif($nivel_acesso === '4'){
				redirect('home/coordenacao');
			// acesso ao painel docente
			}elseif($nivel_acesso === '5'){
				redirect('home/docente');
			// acesso ao painel admin
			}elseif($nivel_acesso === '6'){
				redirect('home');
			}
		}else{
			echo $this->session->set_flashdata('msg',"<div class='alert alert-danger text-center'>UTILIZADOR OU PALAVRA PASSE INCORRECTO</div>");
			redirect('/');
		}
	}
	/* ========== LOGOUT ========== */
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}	
}