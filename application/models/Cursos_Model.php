<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//    Model referente ao (Estado_Model)
Class Cursos_Model extends CI_model
{
    public function __construct(){
        parent::__construct();
    }
    //  TRAZ TODOS AS CURSOS DA BD ( referente a funcao getAll )
    public function getAll_Cursos()
    {
        return $this->db
        ->order_by('nome_curso')
        ->get('curso');
    }
    //  CRIA UM SELECT DE OPCIONS COM AS CURSOS CADASTRADOS (referente ao)
    public function selectCursos()
    {
        $options = "<option value=''>Selecione o Curso</option>"; //   REVER DEPOIS
        $cursos = $this->getAll_Cursos();
        foreach($cursos -> result() as $curso){
            $options .= "<option value='{$curso->id_curso}'>{$curso->nome_curso}</option>";
        }
        return $options;
    } 
}