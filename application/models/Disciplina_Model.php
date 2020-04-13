<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disciplina_Model extends CI_Model 
{
    //  LISTAR OS REGISTROS DA TABELA DISCIPLINA
    public function listardisciplina()
    {
        $this->db->select('*');																		// select tudo
		$this->db->join('classe', 'classe.id_classe  = disciplina.classe_id');							// Join tbl classe [turma]
		$this->db->order_by("id_disciplina", "asc");  														// Ordenar a travez do nome
		return $this->db->get("disciplina")->result_array();	
    }
    //  INSERIR REGISTROS NA TABELA DISCIPLINA
    public function novadisciplina()
    {
        $disciplina = array(
			"nome_disciplina"  => $this->input->post('nome_disciplina'),
			"sigla_disciplina" => $this->input->post('sigla_disciplina'),
			"classe_id" => $this->input->post('nome_classe')
        );
        $this->db->insert("disciplina", $disciplina);
    }
    public function retorna($id)
    {
        return $this->db->get_where("disciplina", array(
            "id_disciplina" => $id
        ))->row_array();
    }
    //  APAGAR REGISTROS NA TABELA DISCIPLINA
    public function apagardisciplina($id)
    {
        $this->db->where('id_disciplina', $id);
        $this->db->delete('disciplina');
        return TRUE;
    }
    //  ACTUALIZA REGISTROS NA TABELA DISCIPLINA
    public function actualizar()
    {
        $id = $this->input->post('id_disciplina');
        $disciplina = array(
			"nome_disciplina" => $this->input->post('nome_disciplina'),
			"sigla_disciplina" => $this->input->post('sigla_disciplina'),
			"classe_id" => $this->input->post('nome_classe')
		);
        $this->db->where('id_disciplina', $id);
        return $this->db->update('disciplina', $disciplina);
    }
    /*--------------------- SELECT DINAMICO ---------------------*/
    function get_classe(){
        $this->db->select('*');
        return $this->db->get('classe')->result();
    }
    /*-----------------------------------------------------------*/

    //  TRAZ TODOS AS CLASSES DA BD ( referente a funcao getAll )
    public function getAll_Disciplinas()
    {
        return $this->db
        ->order_by('id_disciplina')
        ->get('disciplina');
    }
    //  CRIA UM SELECT DE OPCIONS COM AS CLASSE CADASTRADOS (referente ao)
    public function selectDisciplinas()
    {
        $options = "<option value=''>Selecione a disciplina</option>";
        $disciplinas = $this->getAll_Disciplinas();
        foreach($disciplinas -> result() as $disciplina)
        {
            $options .= "<option value='{$disciplina->id_disciplina}'>{$disciplina->nome_disciplina}</option>";
        }
        return $options;
    }
}