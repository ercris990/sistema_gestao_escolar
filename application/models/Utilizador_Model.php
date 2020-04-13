<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilizador_Model extends CI_Model {

    //  LISTAR OS REGISTROS DA TABELA UTILIZADORES
    public function listarutilizador(){
        return $this->db->get("utilizador")->result_array();
    }

    //  INSERIR REGISTROS NA TABELA UTILIZADORES
    public function novoutilizador($user){
        $this->db->insert("utilizador", $user);
    }

    public function retorna($id){
        return $this->db->get_where("utilizador", array(
            "id_utilizador" => $id
        ))->row_array();
    }

    //  APAGAR REGISTROS NA TABELA UTILIZADORES
    public function apagarutilizador($id){
        $this->db->where('id_utilizador', $id);
        $this->db->delete('utilizador');
        return TRUE;
    }

    //  ACTUALIZA REGISTROS NA TABELA UTILIZADOR
    public function actualizar(){
        $id = $this->input->post('id_utilizador');

        $user = array(
            "nome_utilizador" => $this->input->post('nome_utilizador'),
            "senha" => $this->input->post('senha'),
            "departamento" => $this->input->post('departamento')
        );

        $this->db->where('id_utilizador', $id);
        return $this->db->update('utilizador', $user);
    }
}