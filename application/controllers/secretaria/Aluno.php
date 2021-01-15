<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aluno extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('image_lib');
		if($this->session->userdata('logged_in') !== TRUE){
			redirect('/');
		}
	}
	/*=====================INICIO=LISTAR=ALUNO=====================*/
	public function listar_aluno()
	{
		$this->db->select('*');
		$dados['alunos'] = $this->db->get('aluno')->result();
		$this->load->view('layout/cabecalho_secretaria');
		$this->load->view('layout/menu_lateral_secretaria');
		$this->load->view('conteudo/_secretaria/_aluno/listar_aluno', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	/*=====================INICIO=APAGAR=ALUNO=====================*/
	public function apagar($id)
	{
		$this->Aluno_Model->apagaraluno($id);
		echo $this->session->set_flashdata('msg',"<div class='alert alert-danger text-center'>ALUNO EXCLUIDO COM SUCESSO</div>");	
		redirect('home/secretaria');
	}
	//=================	CHAMA A VIEW DO [FURMULARIO CRIAR ALUNO] =================  
	public function novo_aluno()
	{
		//================= INICIO SELECT DINAMICO [CARREGA TODOS OS PAISES NO SELECT PAIS] =================
		$dados['pais'] = $this->Select_Dinamico_Model->busca_pais();
		//=================	CHAMA A VIEW do FURMULARIO CRIAR ALUNO =================
		$this->load->model("Aluno_Model", "aluno");
		$this->load->view('layout/cabecalho_secretaria');
	 	$this->load->view('layout/menu_lateral_secretaria');
		$this->load->view('conteudo/_secretaria/_aluno/criar_aluno', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	//================= SELECT DINAMICO BUSCA PROVINCIA =================
	public function busca_provincia()
	{
		if($this->input->post('pais_id'))
		{
			echo $this->Select_Dinamico_Model->busca_provincia($this->input->post('pais_id'));
		}
	}
	//================= INÍCIO SELECT DINAMICO BUSCA PROVINCIA =================
	public function busca_municipio()
	{
		if($this->input->post('provincia_id'))
		{
			echo $this->Select_Dinamico_Model->busca_municipio($this->input->post('provincia_id'));
		}
	}
	//================= GUARDA OS REGISTROS NA BD NA TABELA ALUNO =================
	public function guardar()
	{
		//================= INICIO REGRAS DE VALIDAÇÃO DO FORMULÁRIO =================
		$this->form_validation->set_error_delimiters('<div class="text-danger mt-1">','</div>');
		$regras = array(
			array(
				'field' => 'nome',
				'label' => 'nome',
				'rules' => 'trim'
			), array(
				'field' => 'genero_aluno',
				'label' => 'género',
				'rules' => ''
			), array(
				'field' => 'nascimento_aluno',
				'label' => 'data',
				'rules' => ''
			), array(
				'field' => 'contacto_aluno',
				'label' => 'telemóvel',
				'rules' => 'trim|is_unique[aluno.contacto_aluno]'
			), array(
				'field' => 'tipo_documento',
				'label' => 'tipo de documento',
				'rules' => 'trim|required'
			), array(
				'field' => 'num_documento',
				'label' => 'nº do documento',
				'rules' => 'trim|is_unique[aluno.num_documento]'
			), array(
				'field' => 'pais',
				'label' => 'país',
				'rules' => 'trim'
			), array(
				'field' => 'provincia',
				'label' => 'província',
				'rules' => 'trim'
			), array(
				'field' => 'municipio',
				'label' => 'município',
				'rules' => 'trim'
			), array(
				'field' => 'data_emissao_doc',
				'label' => 'data de emissão',
				'rules' => 'trim|is_unique[aluno.data_emissao_doc]'
			), array(
				'field' => 'endereco_aluno',
				'label' => 'endereço',
				'rules' => 'trim'
			), array(
				'field' => 'nome_pai',
				'label' => 'nome do pai',
				'rules' => 'trim'
			), array(
				'field' => 'nome_mae',
				'label' => 'nome da mãe',
				'rules' => 'trim'
			)
		);	
		//	FIM REGRAS DE VALIDAÇÃO DO FORMULÁRIO 
		$this->form_validation->set_rules($regras);
		//	CONDICAO DE VALIDACAO 
		if ($this->form_validation->run() == FALSE ) {
		$dados['pais'] = $this->Select_Dinamico_Model->busca_pais(); // Carrega Todos os Paises da BD num Select Dinamico
		//	CHAMA A VIEW do FURMULARIO CRIAR ALUNO 
		$this->load->model("Aluno_Model", "aluno");
		$this->load->view('layout/cabecalho_secretaria');
	 	$this->load->view('layout/menu_lateral_secretaria');
		$this->load->view('conteudo/_secretaria/_aluno/criar_aluno', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
		} else {	
		$this->Aluno_Model->novoaluno(); // Carrega o Model novoaluno		
		echo $this->session->set_flashdata('msg',"<div class='alert alert-success text-center'>ALUNO ADICIONADO COM SUCESSO</div>");	
		$id_aluno = $this->db->insert_id(); // Pega o ultimo ID inserido na BD
		redirect('secretaria/aluno/detalhe?id_aluno='.$id_aluno); // Redireciona Para o Pefil do Aluno
		}
	}
	//										FUNCAO EDITAR ALUNO 
	// =============================================================================================
	public function editar($id)
	{	
		$aluno 	= $this->Aluno_Model->retorna_aluno($id);
		$dados 	= array("aluno" => $aluno);
		/* ------------------------------------------------------------------------------------------------------------- */
		$this->load->model("Select_Dinamico_Model", "aluno");
		$dados['pais']      = $this->aluno->get_pais();
		$dados['provincia'] = $this->aluno->get_provincia();
		$dados['municipio'] = $this->aluno->get_municipio();
		/* ------------------------------------------------------------------------------------------------------------- */
		$this->db->where('id_aluno', $id);
		$dados['aluno'] = $this->db->get('aluno')->result();
		/*------------------------------------------------*/
		$this->load->view('layout/cabecalho_secretaria');
		$this->load->view('layout/menu_lateral_secretaria');
		$this->load->view('conteudo/_secretaria/_aluno/editar_aluno', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	public function actualizar()
	{
		$this->Aluno_Model->alterar($id);
		$id_aluno = $this->input->post('id_aluno'); //	Pega o ultimo id do aluno inserido
		echo $this->session->set_flashdata('msg',"<div class='alert alert-success text-center'>ALUNO ALTERADO COM SUCESSO</div>");	
		redirect('secretaria/aluno/detalhe?id_aluno='.$id_aluno); // Redireciona para o perfifil do aluno
	}
	/*----------------------------- NUMERO DE PROCESSO -----------------------------*/
	public function num_processo()
	{
		$this->Aluno_Model->num_processo($id);
		$id_aluno = $this->input->post('aluno_id'); //	Pega o id do aluno inserido
		echo $this->session->set_flashdata('msg',"<div class='alert alert-success text-center'>NÚMERO DE PROCESSO ADICIONADO COM SUCESSO</div>");	
		redirect('secretaria/aluno/detalhe?id_aluno='.$id_aluno); // Redireciona para o perfifil do aluno
	}
	//							 FUNCAO PESQUISAR [AUTO COMPLETE] 
	// =====================================================================================================================
	public function search()
	{
		if(isset($_GET['term']))
		{
			$result = $this->Busca_Model->pesquisar($_GET['term']);
			if(count($result) > 0) {
			foreach ($result as $pr)$arr_result[] = $pr->nome;
				echo json_encode($arr_result);
			}
		}
	}
	//									RESULTADO DA PESQUISA 
	// ==============================================================================================================================
	public function resultado_pesquisa()
    {		
		$dados['listagem'] = $this->Busca_Model->buscar_aluno($_POST);
		if ( empty($dados["listagem"]) )
		{
			echo $this->session->set_flashdata('msg',"<div class='alert alert-danger text-center'>NENHUM ALUNO ENCONTRADO</div>");	
			redirect('home/secretaria');
		}
		elseif ( !empty($dados["listagem"]) )
		{
			$this->load->view('layout/cabecalho_secretaria');
			$this->load->view('layout/menu_lateral_secretaria');
			$this->load->view('conteudo/resultado_busca', $dados);
			$this->load->view('layout/rodape');
			$this->load->view('layout/script');
		}
	}
	//							PERFIL DO ALUNO
	/* ================================================================================================================================== */
	public function detalhe()
	{
		$id = $this->input->get("id_aluno");
		/* ============================================================================================================================== */
		$dados["aluno"] = $this->Aluno_Model->retorna_aluno($id);		
		$dados["options_anos"] = $this->Ano_Model->selectAnos();
		$dados["options_classes"] = $this->Classe_Model->selectClasses();
		$dados["options_turmas"] = $this->Turmas_Model->selectTurmas();
		$dados["options_cursos"] = $this->Cursos_Model->selectCursos();
		/* ============================================================================================================================== */
		$this->db->select('*');
		$this->db->from('aluno');
		$this->db->where('id_aluno', $id);
		$this->db->join('funcionario', 'funcionario.id_funcionario = aluno.funcionario_id');  //	join funcionario
		$dados["aluno_funcionario"] = $this->db->get()->row();
		/* ============================================================================================================================== */
		$this->db->select('*');																// Selecione tudo 
		$this->db->from('matricula');														// Da tbl matricula
		$this->db->where('aluno_id', $id);													// Onde o ID igual ao ID do aluno selecionado
		$this->db->order_by("ano_let", "desc");  											// Orden
        $this->db->join('anolectivo', 'anolectivo.id_ano = matricula.anolectivo_id');		// Join tbl anolectivo
		$this->db->join('turma', 'turma.id_turma = matricula.turma_id');					// Join tbl turma
		$this->db->join('classe', 'classe.id_classe  = turma.classe_id');					// Join tbl classe [turma]
        $this->db->join('periodo', 'periodo.id_periodo = turma.periodo_id');				// Join tbl periodo
		$this->db->join('sala', 'sala.id_sala = turma.sala_id');							// Join tbl sala
		$dados ["matricula"] = $this->db->get()->result();   								// Join Matricula
		/* ============================================================================================================================== */
		$this->db->select('*');																// Selecione tudo
		$this->db->from('encarregados');													// Da tbl matricula
		$this->db->where('aluno_id', $id);													// Onde o ID igual ao ID do aluno selecionado
		$this->db->order_by("ano_let", "desc");  											// Orden
        $this->db->join('anolectivo', 'anolectivo.id_ano = encarregados.anolectivo_id');	// Join tbl anolectivo
		$dados ["encarregados"] = $this->db->get()->result();   							// Join Matricula
		//									CARREGA A VIZUALIZACAO DA VIEW LISTA
		/* ============================================================================================================================== */
		if($this->session->userdata('nivel_acesso')==='1')
		{
			$this->load->view('layout/cabecalho_secretaria');
			$this->load->view('layout/menu_lateral_secretaria');
			$this->load->view('conteudo/_secretaria/_aluno/perfil_aluno_1', $dados);
			$this->load->view('layout/modal_aluno');
			$this->load->view('layout/rodape');
			$this->load->view('layout/script');
		} else {
			$this->load->view('layout/cabecalho_secretaria');
			$this->load->view('layout/menu_lateral_secretaria');
			$this->load->view('conteudo/_secretaria/_aluno/perfil_aluno', $dados);
			$this->load->view('layout/modal_aluno');
			$this->load->view('layout/rodape');
			$this->load->view('layout/script');
		}
	}
	//								UPLOAD - PHOTO DE PERFIL -> UPDATE NA TABELA ALUNO
	/* =================================================================================================================================== */
	public function carregar_imagem()
	{
		$id = $this->input->get("id_aluno");
		$dados["aluno"] = $this->Aluno_Model->retorna_aluno($id);	
		//	CARREGA A VIZUALIZACAO DA VIEW LISTA
		$this->load->view('layout/cabecalho_secretaria');
		$this->load->view('layout/menu_lateral_secretaria');
		$this->load->view('conteudo/_secretaria/_aluno/fotografia', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	// Executa o processo de recorte da imagem
	/* =================================================================================================================================== */
	public function Recortar()
	{
		// pega o ID do aluno
		$id = $this->input->post("id_aluno");    
		// Configurações para o upload da imagem
		// Diretório para salvar a imagem
		$configUpload['upload_path']   = FCPATH ."_assets/upload/alunos";
		// Tipos de imagem permitidos
		$configUpload['allowed_types'] = 'jpg|png';
		// Usar nome de arquivo aleatório, ignorando o nome original do arquivo
		$configUpload['encrypt_name']  = TRUE;
		// Aplica as configurações para a library upload
		$this->upload->initialize($configUpload);
		// Verifica se o upload foi efetuado ou não
		// Em caso de erro carrega a home exibindo as mensagens
		// Em caso de sucesso faz o processo de recorte
		if ( ! $this->upload->do_upload('imagem'))
		{
			// Recupera as mensagens de erro e envia o usuário para a home
			$dados= array('error' => $this->upload->display_errors());
			// $this->load->view('home',$dados);
		}
		else
		{
			// Recupera os dados da imagem
			$dadosImagem = $this->upload->data();
			// Calcula os tamanhos de ponto de corte e posição
			// de forma proporcional em relação ao tamanho da
			// imagem original
			$tamanhos = $this->CalculaPercetual($this->input->post());
			// Define as configurações para o recorte da imagem
			// Biblioteca a ser utilizada
			$configCrop['image_library'] = 'gd2';
			//Path da imagem a ser recortada
			$configCrop['source_image'] = $dadosImagem['full_path'];
			// Diretório onde a imagem recortada será gravada
			$configCrop['new_image'] = FCPATH ."_assets/upload";
			// Proporção
			$configCrop['maintain_ratio'] = FALSE;
			// Qualidade da imagem
			$configCrop['quality'] = 100;
			// Tamanho do recorte
			$configCrop['width']  = $tamanhos['wcrop'];
			$configCrop['height'] = $tamanhos['hcrop'];
			// Ponto de corte (eixos x e y)
			$configCrop['x_axis'] = $tamanhos['x'];
			$configCrop['y_axis'] = $tamanhos['y'];
			// Aplica as configurações para a library image_lib
			$this->image_lib->initialize($configCrop);
			// Verifica se o recorte foi efetuado ou não
			// Em caso de erro carrega a home exibindo as mensagens
			// Em caso de sucesso envia o usuário para a tela
			// de visualização do recorte
			if ( ! $this->image_lib->crop())
			{
				// Recupera as mensagens de erro e envia o usuário para a home
				$dados = array('error' => $this->image_lib->display_errors());
				// $this->load->view('home',$dados);
			}
			else
			{
				$info_arquivo = $this->upload->data();   // recupera os dados do arquivo em caso de sucesso
				$nome_arquivo = $dadosImagem['file_name'];	// pega o nome do arquivo da array
				$aluno = array(
					"id_aluno" => $id,
					"photo" => $nome_arquivo
				);
				$this->db->where('id_aluno', $id);
				$this->db->update('aluno', $aluno);
				echo $this->session->set_flashdata('msg',"<div class='alert alert-success text-center'>FOTOGRAFIA ALTERADA COM SUCESSO</div>");	
				redirect('secretaria/aluno/detalhe?id_aluno='.$id); // redireciona para o pefil do aluno
			}
		}
	}
	// Método privado responsável por calcular os tamanhos de forma proporcional
	/* ======================================================================================================================= */
	private function CalculaPercetual($dimensoes){
		// Verifica se a largura da imagem original é
		// maior que a da área de recorte, se for calcula o tamanho proporcional
		if($dimensoes['woriginal'] > $dimensoes['wvisualizacao']){
			$percentual = $dimensoes['woriginal'] / $dimensoes['wvisualizacao'];
			$dimensoes['x'] = round($dimensoes['x'] * $percentual);
			$dimensoes['y'] = round($dimensoes['y'] * $percentual);
			$dimensoes['wcrop'] = round($dimensoes['wcrop'] * $percentual);
			$dimensoes['hcrop'] = round($dimensoes['hcrop'] * $percentual);
		}
		// Retorna os valores a serem utilizados no processo de recorte da imagem
		return $dimensoes;
	}
	/*  								IMAGE WEBCAM 
	============================================================================================================================ */
	public function ajaxwebcam() {
		$id = $this->input->post("id_aluno");
		$camera_image = $this->input->post('camera_image');
		$filteredData = explode(',', $camera_image); 							// ao receber o parametro do ajax ele vem bruto	
		$unencoded = base64_decode($filteredData[1]);
		//Create the image 
		$name = date('YmdHis');
		$fotografia = $name.'.jpg'; 									// a  fotografia do individuo;
		$fp = fopen('_assets/upload/' . $fotografia, 'w');
		fwrite($fp, $unencoded);
		fclose($fp);
		$aluno = array(
			"id_aluno" => $id,
			"photo" => $fotografia
		);
		/* ===================================================================================================================== */
		$this->db->where('id_aluno', $id);
		$this->db->update('aluno', $aluno);
		echo $this->session->set_flashdata('msg',"<div class='alert alert-success text-center'>FOTOGRAFIA ALTERADA COM SUCESSO</div>");	
		redirect('secretaria/aluno/detalhe?id_aluno='.$id); // redireciona para o pefil do aluno
    }
}
