<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aluno_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    /*
    ================= LISTAR TODOS OS ALUNOS =================
    */
    public function listaraluno()
    {
        return $this->db->get("aluno")->result_array();            
    }
    /*
    ================= INSERIR REGISTROS NA TABELA ALUNO ================= 
    */
    public function novoaluno()
    {
		$aluno = array(
            "nome" 			   =>$this->input->post('nome'),
            "genero_aluno"     =>$this->input->post('genero_aluno'),
			"nascimento_aluno" =>$this->input->post('nascimento_aluno'),
            "tipo_documento"   =>$this->input->post('tipo_documento'),
            "num_documento"    =>$this->input->post('num_documento'),
			"data_emissao_doc" =>$this->input->post('data_emissao_doc'),
            "contacto_aluno"   =>$this->input->post('contacto_aluno'),
            "endereco_aluno"   =>$this->input->post('endereco_aluno'),
			"nome_pai" 		   =>$this->input->post('nome_pai'),
			"nome_mae" 		   =>$this->input->post('nome_mae'),
			"pais_id"    	   =>$this->input->post('pais'),
			"provincia_id"     =>$this->input->post('provincia'),
			"municipio_id"     =>$this->input->post('municipio'),	
			"funcionario_id"   =>$this->session->userdata('id_funcionario')
		);
        $this->db->insert("aluno", $aluno);
    }
    /*
    ================= RETORNA ALUNO PELO ID =================
    */
    public function retorna_aluno($id)
    {
        return $this->db->get_where("aluno", array(
            "id_aluno" => $id
        ))->row_array();
    }
    /*
    ================= APAGAR REGISTROS NA TABELA ALUNO =================
    */
        public function apagaraluno($id)
        {
            $this->db->where('id_aluno', $id);
            $this->db->delete('aluno');
            return TRUE;
        }
    /*
    ================= ACTUALIZA REGISTROS NA TABELA ALUNO =================
    */
    public function alterar()
    {
        $id = $this->input->post('id_aluno');
        $aluno = array(
			"nome" 			   =>$this->input->post('nome'),
			"nascimento_aluno" =>$this->input->post('nascimento_aluno'),
            "genero_aluno"     =>$this->input->post('genero_aluno'),
            "endereco_aluno"   =>$this->input->post('endereco_aluno'),
            "contacto_aluno"   =>$this->input->post('contacto_aluno'),
            "tipo_documento"   =>$this->input->post('tipo_documento'),
            "num_documento"    =>$this->input->post('num_documento'),
			"data_emissao_doc" =>$this->input->post('data_emissao_doc'),
			"pais_id"    	   =>$this->input->post('pais'),
			"provincia_id"     =>$this->input->post('provincia'),
			"municipio_id"     =>$this->input->post('municipio'),	
			"nome_pai" 		   =>$this->input->post('nome_pai'),
			"nome_mae" 		   =>$this->input->post('nome_mae')
		);
        $this->db->where('id_aluno', $id);
        return $this->db->update('aluno', $aluno);
    }
    /*
    ============================= ADICIONAR NUMERO DE PROCESSO =============================*/
    public function num_processo()
    {
        $id = $this->input->post('aluno_id');
        $aluno = array(
			"num_processo" => $this->input->post('num_processo')	
		);
        $this->db->where('id_aluno', $id);
        return $this->db->update('aluno', $aluno);
    }
    /*
    ============================= UPLOAD DE IMAGEM =============================*/
    public function salvar_foto()
    {
        $id = $this->input->post('id_aluno');
        $aluno = array(
			"photo" => $this->input->post('image_file')	
		);
        $this->db->where('id_aluno', $id);
        return $this->db->update('aluno', $aluno);
    }
}