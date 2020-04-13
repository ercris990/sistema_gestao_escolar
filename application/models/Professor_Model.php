<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professor_Model extends CI_Model 
{
    //  LISTAR OS REGISTROS DA TABELA ANO LECTIVO
    public function listarprofessor()
    {
        return $this->db->get_where("funcionario", 
        array("nivel_acesso" => 5))->result_array();
    }
    //  INSERIR REGISTROS NA TABELA ANO LECTIVO
    public function novoprofessor()
    {
        $professor = array
		(
            "funcionario_id" => $this->input->post('funcionario')
		);
        $this->db->insert("professor", $professor);
    }
    //  RETORANA DADOS DA TABELA PROFESSORES
    public function retorna_funcionario($id)
    {    
        return $this->db->get_where("professor", array(
            "id_professor" => $id
        ))->row_array();
    }            
    //  APAGAR REGISTROS NA TABELA ANO LECTIVO
    public function apagarprofessor($id)
    {
        $this->db->where('id_professor', $id);
        $this->db->delete('professor');
        return TRUE;
    }
    //  ACTUALIZA REGISTROS NA TABELA ANO LECTIVO
    public function actualizar()
    {
        $id = $this->input->post('id_professor');
        $professor = array(
            "nome_professor" => $this->input->post('nome_professor')
        );
        $this->db->where('id_professor', $id);
        return $this->db->update('professor', $professor);
    }
    /*
    ================= ACTUALIZA REGISTROS NA TABELA PROF TURMA =================
    */
    public function actualizar_prof_turma()
    {
        $id = $this->input->post('id_prof_turma');
        $prof_turma = array(            
            'anolectivo_id' => $this->input->post('anolectivo'),
            'turma_id'  	=> $this->input->post('turma_id')
        );
        $this->db->where('id_prof_turma', $id);
        return $this->db->update('prof_turma', $prof_turma); 
    }
    /*
    ================= ACTUALIZA REGISTROS NA TABELA PROF TURMA =================
    */
    public function excluir_prof_turma($id)
    {
        $this->db->where('id_prof_turma', $id);
        $this->db->delete('prof_turma');
        return TRUE;
    }
}