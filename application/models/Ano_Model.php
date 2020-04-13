<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Ano_model extends CI_model 
{
    public function __construct()
    {
        parent::__construct();
    }
    //  TRAZ TODOS OS ANOS DA BD ( referente a funcao getAll )
    public function getAll_Anos()
    {
        return $this->db
        ->order_by('ano_let', 'desc')
        ->get('anolectivo');
    }
    //  CRIA UM SELECT DE OPCIONS COM OS ANOS CADASTRADOS (referente ao)
    public function selectAnos()
    {
        $options = "<option value=''>Selecione o Ano Lectivo</option>";
        $anos = $this->getAll_Anos();
        foreach($anos -> result() as $ano)
        {
            $options .= "<option value='{$ano->id_ano}'>{$ano->ano_let}</option>";
        }
        return $options;
    } 
}