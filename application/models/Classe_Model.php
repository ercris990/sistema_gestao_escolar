<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classe_Model extends CI_Model 
{
    //  LISTAR OS REGISTROS DA TABELA ANO LECTIVO
    public function listarclasse()
    {
        return $this->db->get("classe")->result_array();
    }
    //  INSERIR REGISTROS NA TABELA ANO LECTIVO
    public function novaclasse($classe)
    {
        $this->db->insert("classe", $classe);
    }
    public function retorna($id)
    {
        return $this->db->get_where("classe", array(
            "id_classe" => $id
        ))->row_array();
    }
    //  APAGAR REGISTROS NA TABELA ANO LECTIVO
    public function apagarclasse($id)
    {
        $this->db->where('id_classe', $id);
        $this->db->delete('classe');
        return TRUE;
    }
    //  ACTUALIZA REGISTROS NA TABELA ANO LECTIVO
    public function actualizar()
    {
        $id = $this->input->post('id_classe');
        $classe = array(
			"nome_classe" => $this->input->post('nome_classe'),
		);
        $this->db->where('id_classe', $id);
        return $this->db->update('classe', $classe);
    }
    public function busca_nivel()
    {
        // $this->db->order_by('nome_nivel', 'ASC');
        $query = $this->db->get('nivel');
        return $query->result();
    }
    //  TRAZ TODOS AS CLASSES DA BD ( referente a funcao getAll )
    public function getAll_Classes()
    {
        return $this->db
        ->order_by('id_classe')
        ->get('classe');
    }
    //  CRIA UM SELECT DE OPCIONS COM AS CLASSE CADASTRADOS (referente ao)
    public function selectClasses()
    {
        $options = "<option value=''>Selecione a Classe</option>";
        $classes = $this->getAll_Classes();
        foreach($classes -> result() as $classe)
        {
            $options .= "<option value='{$classe->id_classe}'>{$classe->nome_classe}</option>";
        }
        return $options;
    }
    /*
    ================= RETORNA TODAS AS CLASSES =================
    */
    public function retorna_classe($id)
    {    
        return $this->db->get_where("classe", array(
            "id_classe" => $id
            ))->row_array();
    }
}