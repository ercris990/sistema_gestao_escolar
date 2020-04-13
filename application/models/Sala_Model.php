<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sala_Model extends CI_Model {

    //  LISTAR OS REGISTROS DA TABELA ANO LECTIVO
    public function listarsala(){
        return $this->db->get("sala")->result_array();
    }

    //  INSERIR REGISTROS NA TABELA ANO LECTIVO
    public function novasala($sala){
        $this->db->insert("sala", $sala);
    }

    public function retorna($id){
        return $this->db->get_where("sala", array(
            "id_sala" => $id
        ))->row_array();
    }

    //  APAGAR REGISTROS NA TABELA ANO LECTIVO
    public function apagarsala($id){
        $this->db->where('id_sala', $id);
        $this->db->delete('sala');
        return TRUE;
    }

    //  ACTUALIZA REGISTROS NA TABELA ANO LECTIVO
    public function actualizar(){
        $id = $this->input->post('id_sala');

        $sala = array(

            "numero_sala" => $this->input->post('numero_sala')
        );

        $this->db->where('id_sala', $id);
        return $this->db->update('sala', $sala);
    }
}