<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curso_Model extends CI_Model 
{
    //  LISTAR OS REGISTROS DA TABELA ANO LECTIVO
    public function listarcurso()
    {
        return $this->db->get("curso")->result_array();
    }
    //  INSERIR REGISTROS NA TABELA ANO LECTIVO
    public function novocurso($curso)
    {
        $this->db->insert("curso", $curso);
    }
    public function retorna($id)
    {
        return $this->db->get_where("curso", array(
            "id_curso" => $id
        ))->row_array();
    }
    //  APAGAR REGISTROS NA TABELA ANO LECTIVO
    public function apagarcurso($id)
    {
        $this->db->where('id_curso', $id);
        $this->db->delete('curso');
        return TRUE;
    }
    //  ACTUALIZA REGISTROS NA TABELA ANO LECTIVO
    public function actualizar()
    {
        $id = $this->input->post('id_curso');
        $curso = array(
			"nome_curso" => $this->input->post('nome_curso'),
		);
        $this->db->where('id_curso', $id);
        return $this->db->update('curso', $curso);
    }
}