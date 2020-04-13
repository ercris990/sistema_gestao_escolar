<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Periodo_Model extends CI_Model {

    //  LISTAR OS REGISTROS DA TABELA ANO LECTIVO
    public function listarperiodo(){
        return $this->db->get("periodo")->result_array();
    }

    //  INSERIR REGISTROS NA TABELA ANO LECTIVO
    public function novoperiodo($periodo){
        $this->db->insert("periodo", $periodo);
    }

    public function retorna($id){
        return $this->db->get_where("periodo", array(
            "id_periodo" => $id
        ))->row_array();
    }

    //  APAGAR REGISTROS NA TABELA ANO LECTIVO
    public function apagarperiodo($id){
        $this->db->where('id_periodo', $id);
        $this->db->delete('periodo');
        return TRUE;
    }

    //  ACTUALIZA REGISTROS NA TABELA ANO LECTIVO
    public function actualizar(){
        $id = $this->input->post('id_periodo');
        $periodo = array(

			"nome_periodo" => $this->input->post('nome_periodo'),
			
		);
        $this->db->where('id_periodo', $id);
        return $this->db->update('periodo', $periodo);
    }
}