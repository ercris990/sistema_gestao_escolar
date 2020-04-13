<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matricula_Model extends CI_Model 
{
    //  LISTAR OS REGISTROS DA TABELA MATRICULA
    public function listarmatricula()
    {
        return $this->db->get("matricula")->result_array();
    }
    //  INSERIR REGISTROS NA TABELA MATRICULA
    public function novamatricula()
    {
        $matricula = array(
            'aluno_id' 		 => $this->input->post('aluno_id'),
            'anolectivo_id'  => $this->input->post('anolectivo'),
            'turma_id'  	 => $this->input->post('turma_id'),
            'curso_id'  	 => $this->input->post('curso_id'),
            "funcionario_id" =>$this->session->userdata('id_funcionario')
        );
        $this->db->insert("matricula", $matricula);
    }
    /*================= APAGAR REGISTROS NA TABELA MATRICULA =================*/ 
    public function apagarmatricula($id)
    {
        $this->db->where('id_matricula', $id);
        $this->db->delete('matricula');
        return TRUE;
    }
    /* ------------------------------------------------------------------------------------------------------------------------------ */
    //  INSERIR REGISTROS NA TABELA NOTAS DISCIPLINA
    public function guardar_disciplinas()
    {
        $disciplina_id = $this->input->post('disciplina_id');
        for ($i=0; $i < sizeof($disciplina_id); $i++){
            $dados = array(
                'disciplina_id'  => $disciplina_id[$i],
                'matricula_id' 	 =>$this->input->post('matricula'),
                'aluno_id' 		 =>$this->input->post('aluno'),
                'anolectivo_id'  =>$this->input->post('anolectivo'),
                'turma_id'  	 =>$this->input->post('turma')
            );
            $this->db->insert("notas_disciplina", $dados);
        }
    }
    //  APAGAR REGISTROS NA TABELA MATRICULA
    public function apagardisciplina($id)
    {
        $this->db->where('id_notas_disciplina', $id);
        $this->db->delete('notas_disciplina');
        return TRUE;
    }
    /*
    ================= ACTUALIZA REGISTROS NA TABELA MATRICULA =================
    */
    public function actualizar_matricula()
    {
        $id = $this->input->post('id_matricula');
        $matricula = array(            
            'aluno_id' 		=> $this->input->post('aluno_id'),
            'anolectivo_id' => $this->input->post('anolectivo'),
            'turma_id'  	=> $this->input->post('turma_id'),
            'curso_id'  	=> $this->input->post('curso_id'),
            "funcionario_id" =>$this->session->userdata('id_funcionario')
        );
        $this->db->where('id_matricula', $id);
        return $this->db->update('matricula', $matricula);
    }
    /*
    ============================= MARCAR FALTA ALUNO =============================
    */
    public function marcar_falta()
    {
        $aluno_id = $this->input->post('aluno_id');
        for ($i=0; $i < sizeof($aluno_id); $i++){
            $falta_alunos = array(
                'aluno_id' 		 => $aluno_id[$i],
                'anolectivo_id'  => $this->input->post('anolectivo'),
                'turma_id'  	 => $this->input->post('turma')
            );
            $this->db->insert("assiduidade_alunos", $falta_alunos);
        }
    }
    /*
    ============================= JUSTIFICAR FALTA =============================
    */
    public function justificar_falta()
    {
        $id_assiduidade = $this->input->post('id_assiduidade');
        $justicar_falta = array(
			"justificacao" => $this->input->post('justificacao')
		);
        $this->db->where('id_assiduidade', $id_assiduidade);
        return $this->db->update('assiduidade_alunos', $justicar_falta);
    }
    /*=============== salvar notas 1º trimestre===============*/
    public function salvar_nota_1()
    {
        $id_notas_disciplina = $this->input->post('id_notas_disciplina');
        $notas_disciplina = array(
            "mac_1" => $this->input->post('mac_1'),
            "cpp_1" => $this->input->post('cpp_1')
        );
        $this->db->where('id_notas_disciplina', $id_notas_disciplina);
        return $this->db->update('notas_disciplina', $notas_disciplina);
    }
    /*=============== salvar notas 2º trimestre===============*/
    public function salvar_nota_2()
    {
        $id_notas_disciplina = $this->input->post('id_notas_disciplina');
        $notas_disciplina = array(
            "mac_2" => $this->input->post('mac_2'),
            "cpp_2" => $this->input->post('cpp_2')
        );
        $this->db->where('id_notas_disciplina', $id_notas_disciplina);
        return $this->db->update('notas_disciplina', $notas_disciplina);
    }
    /*=============== salvar notas 3º trimestre===============*/
    public function salvar_nota_3()
    {
        $id_notas_disciplina = $this->input->post('id_notas_disciplina');
        $notas_disciplina = array(
            "mac_3" => $this->input->post('mac_3'),
            "cpp_3" => $this->input->post('cpp_3'),
            "ce" => $this->input->post('ce')
        );
        $this->db->where('id_notas_disciplina', $id_notas_disciplina);
        return $this->db->update('notas_disciplina', $notas_disciplina);
    }
    /*
    ================= RETORNA TODAS AS MATRICULAS =================
    */
    public function get_matricula()
    {
        $this->db->select('*');
        return $this->db->get('matricula')->result();
    }
    /*================= RETORNA MATRICULAS =================*/
    public function retorna_matricula($id_matricula)
    {
        return $this->db->get_where("matricula", array(
            "id_matricula" => $id_matricula
        ))->row_array();
    }
    /*----------- SELECT DINAMICO -------------*/
    public function get_aluno()
    {
        $this->db->select('*');
        return $this->db->get('aluno')->result();
    }
    public function get_anolectivo()
    {
        $this->db->select('*');
        return $this->db->get('anolectivo')->result();
    }
    public function get_turma()
    {
        $this->db->select('*');
        return $this->db->get('turma')->result();
    }
    public function get_curso()
    {
        $this->db->select('*');
        return $this->db->get('curso')->result();
    }
}