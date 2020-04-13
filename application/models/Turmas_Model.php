<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//    Model referente ao (Estado_Model)
Class Turmas_Model extends CI_model 
{
    public function __construct()
    {
        parent::__construct();
    }
    //  TRAZ TODOS AS TURMAS DA BD ( referente a funcao getAll )
    public function getAll_Turmas()
    {
        return $this->db
        ->order_by('nome_turma')
        ->get('turma');
    }
    //  CRIA UM SELECT DE OPCIONS COM AS TURMAS CADASTRADOS (referente ao)
    public function selectTurmas()
    {
        $options = "<option value=''>Selecione a Turma</option>";
        $turmas = $this->getAll_Turmas();
        foreach($turmas -> result() as $turma){
            $options .= "<option value='{$turma->id_turma}'>{$turma->nome_turma}</option>";
        }
        return $options;
    } 
}