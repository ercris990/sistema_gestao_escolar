<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesquisar extends CI_Controller 
{
    public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		if($this->session->userdata('logged_in') !== TRUE){
			redirect('/');
		  }
	}
}