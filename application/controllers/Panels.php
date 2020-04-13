<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panels extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		if($this->session->userdata('logged_in') !== TRUE){
			redirect('/');
		}
	}
	// ======= carrega o painel direcção ======= 
	public function direccao()
	{
		if($this->session->userdata('level')==='1')
		{
			$this->load->view('dashboard_view');
		}else{
			echo "Access Denied";
		}
	}
	// ======= carrega o painel secretaria ======= 
	public function secretaria()
	{
		if($this->session->userdata('level')==='2')
		{
		$this->load->view('dashboard_view');
		}else{
			echo "Access Denied";
		}
	}
	// ======= carrega o painel recursos humanos ======= 
	public function recursos_humanos()
	{
		if($this->session->userdata('level')==='3')
		{
		$this->load->view('dashboard_view');
		}else{
			echo "Access Denied";
		}
	}
	// ======= carrega o painel coordenacao ======= 
	public function cordenacao()
	{
		if($this->session->userdata('level')==='4')
		{
		$this->load->view('dashboard_view');
		}else{
			echo "Access Denied";
		}
	}
	// ======= carrega o painel docente ======= 
	public function docente()
	{
		if($this->session->userdata('level')==='5')
		{
		$this->load->view('dashboard_view');
		}else{
			echo "Access Denied";
		}
	}
	// ======= carrega o painel admin ======= 
	public function admin()
	{
		if($this->session->userdata('level')==='6')
		{
		$this->load->view('dashboard_view');
		}else{
			echo "Access Denied";
		}
	}
}