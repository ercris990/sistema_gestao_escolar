<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Select_Dinamico_Model extends CI_model 
{
    public function __construct()
    {
        parent::__construct();
    }
    // ================== SELECT FUNCIONARIOS ==================
    public function busca_funcionarios()
    {
        $this->db->order_by('nome_funcionario', 'ASC');
        $query = $this->db->get('funcionario');
        return $query->result();
    }
    // ================== SELECT PAISES ==================
    public function busca_pais()
    {
        $this->db->order_by('nome_pais', 'ASC');
        $query = $this->db->get('pais');
        return $query->result();
    }
    // =============== SELECT PROVINCIAS ATRAVES DE PAIS =============== 
    function busca_provincia($pais_id)
    {
        $this->db->where('pais_id', $pais_id);
        $this->db->order_by('nome_provincia', 'ASC');
        $query = $this->db->get('provincia');
        $output = '<option value=""> Selecione uma Provincia </option>';
        foreach($query->result() as $row)
        {
            $output .= '<option value="'.$row->provincia_id.'">'.$row->nome_provincia.'</option>';
        }
        return $output;
    }
    // =============== SELECT MUNICIPIOS ATRAVES DE PROVINCIA =============== 
    function busca_municipio($provincia_id)
    {
        $this->db->where('provincia_id', $provincia_id);
        $this->db->order_by('nome_municipio', 'ASC');
        $query = $this->db->get('municipio');
        $output = '<option value=""> Selecione um Municipio </option>';
        foreach($query->result() as $row)
        {
            $output .= '<option value="'.$row->municipio_id.'">'.$row->nome_municipio.'</option>';
        }
        return $output;
    }
    // ================== SELECT PROVINCIAS ==================
    public function busca_provincias()
    {
        $this->db->order_by('nome_provincia', 'ASC');
        $query = $this->db->get('provincia');
        return $query->result();
    }
    // =============== SELECT CLASSES =============== 
    public function busca_classes()
    {
        $query = $this->db->get('classe');
        return $query->result();
    }
    // =============== SELECT DISCIPLINAS ATRAVES DE CLASSE ===============
    function busca_disciplinas($classe_id)
    {
        $this->db->where('classe_id', $classe_id);
        $query = $this->db->get('disciplina');
        $output = '<option value=""> Selecione a disciplina </option>';
        foreach($query->result() as $row)
        {
            $output .= '<option value="'.$row->id_disciplina.'">'.$row->nome_disciplina.'</option>';
        }
        return $output;
    }
    /*=============== SELECT DINAMICO ===============*/
    function get_pais(){
        $this->db->select('*');
        return $this->db->get('pais')->result();
    }
    function get_provincia(){
        $this->db->select('*');
        return $this->db->get('provincia')->result();
    }
    function get_municipio(){
        $this->db->select('*');
        return $this->db->get('municipio')->result();
    }
    function get_anolectivo(){
        $this->db->select('*');
        return $this->db->get('anolectivo')->result();
    }
    function get_turma(){
        $this->db->select('*');
        return $this->db->get('turma')->result();
    }
}