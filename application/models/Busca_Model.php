<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Busca_Model extends CI_model 
{
    public function __construct()
    {
        parent::__construct();
    }
    public function pesquisar($nome)
    {
        $this->db->like('nome', $nome, 'both');
        return $this->db->get('aluno')->result();
    }
    //  traz todos os alunos da base de dados (referente a funcao getall)
    public function alunos()
    {
        return $this->db->get('aluno')->result_array();
    }
    public function buscar_aluno($busca)
    {
        if(empty($busca))return array();
        $busca = $this->input->post('pesquisar');
        $this->db->like('nome', $busca);
        $query = $this->db->get('aluno');
        return $query->result_array();
    }   
}