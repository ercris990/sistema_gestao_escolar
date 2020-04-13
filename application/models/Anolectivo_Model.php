<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anolectivo_Model extends CI_Model {
    public function __construct(){
        parent::__construct();
    }

    //  LISTAR OS REGISTROS DA TABELA ANO LECTIVO
    public function listaranolectivo(){
        $this->db->select('*');																		// select tudo
		$this->db->order_by("ano_let", "desc");  														// Ordenar a travez do nome
		return $this->db->get("anolectivo")->result_array();	
    }

    //  INSERIR REGISTROS NA TABELA ANO LECTIVO
    public function novoanolectivo($ano){
        $this->db->insert("anolectivo", $ano);
    }

    public function retorna($id){
        return $this->db->get_where("anolectivo", array(
            "id_ano" => $id
        ))->row_array();
    }

    //  APAGAR REGISTROS NA TABELA ANO LECTIVO
    public function apagaranolectivo($id){
        $this->db->where('id_ano', $id);
        $this->db->delete('anolectivo');
        return TRUE;
    }

    //  ACTUALIZA REGISTROS NA TABELA ANO LECTIVO
    public function actualizar(){
        $id = $this->input->post('id_ano');

        $ano = array(
            "ano_let" => $this->input->post('ano_let')
        );

        $this->db->where('id_ano', $id);
        return $this->db->update('anolectivo', $ano);
    }
}