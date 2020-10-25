<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Matricula extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		if($this->session->userdata('logged_in') !== TRUE){
			redirect('/');
		}
	}
	/*					INICIO LISTAR MATRICULA 
	==============================================================*/
	public function listar_matricula()
	{	
		$lista = $this->Matricula_Model->listarmatricula();
		$dados = array("matricula" => $lista);		
		$this->load->view('layout/cabecalho_secretaria');
		$this->load->view('layout/menu_lateral_secretaria');
		$this->load->view('conteudo/_secretaria/_matricula/listar_matricula', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	/*				INICIO CRIAR NOVA MATRICULA
	=================================================================*/
	public function nova_matricula()
	{
		//	SELECT DINAMICO 
		$this->load->model("Matricula_Model", "matricula");
		$dados['aluno'] = $this->matricula->get_aluno();
		$dados['anolectivo'] = $this->matricula->get_anolectivo();
		$dados['turma'] = $this->matricula->get_turma();
		$dados['curso'] = $this->matricula->get_curso();
		// =========================================================================
		$this->load->view('layout/cabecalho_secretaria');
		$this->load->view('layout/menu_lateral_secretaria');
		$this->load->view('conteudo/_secretaria/_matricula/nova_matricula', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	/*					INSERIR REGISTROS NA TABELA MATRICULA 
	=======================================================================*/
	public function guardar()
	{		
		$this->Matricula_Model->novamatricula();
		$id_aluno = $this->input->post('aluno_id'); 			  // Pega o ultimo id do aluno inserido
		echo $this->session->set_flashdata('msg',"<div class='alert alert-success text-center'>MATRICULA REALIZADA COM SUCESSO</div>");	
		redirect('secretaria/aluno/detalhe?id_aluno='.$id_aluno); // Redireciona para o perfifil do aluno
	}
	/*				NICIO EXCLUIR MATRICULA
	=======================================================================*/
	public function apagar($id, $id_aluno)
	{
		$this->load->model("Matricula_Model");
		$this->Matricula_Model->apagarmatricula($id);
		echo $this->session->set_flashdata('msg',"<div class='alert alert-success text-center'>MATRICULA EXCLUIDA COM SUCESSO</div>");	
		redirect('secretaria/aluno/detalhe?id_aluno='.$id_aluno);
	}
	/*					INICIO ACTUALIAZAR MATRICULA 
	=======================================================================*/
	public function editar($id=NULL)
	{
		$this->load->model("Select_Dinamico_Model", "matricula");
		$dados['anolectivo'] = $this->matricula->get_anolectivo();
		$dados['turma']		 = $this->matricula->get_turma();
		/* --------------------------------------------------------------- */
		$this->db->where('id_matricula', $id);
		$dados['matricula'] = $this->db->get('matricula')->result();
		/*------------------------------------------------*/
		$this->load->view('layout/cabecalho_secretaria');
		$this->load->view('layout/menu_lateral_secretaria');
		$this->load->view('conteudo/_secretaria/_matricula/editar_matricula', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	/*			SALVA A ACTUALIZACAO DO REGISTROS NA TABELA SALA
	=======================================================================*/
	public function actualizar_matricula($id=NULL)
	{
		$this->Matricula_Model->actualizar_matricula();
		$id_aluno = $this->input->post('aluno_id'); 			  		//Pega o ultimo id do aluno inserido
		echo $this->session->set_flashdata('msg',"<div class='alert alert-success text-center'>MATRICULA ALTERADA COM SUCESSO</div>");	
		redirect('secretaria/aluno/detalhe?id_aluno='.$id_aluno); 		// Redireciona para o perfifil do aluno
	}
	/*						Detalhes da Matricula
	=======================================================================*/
	public function detalhe_matricula()
	{
		$id_matricula = $this->input->get("id_matricula");
		/*===========================================================================================================================*/ 
		$this->db->select('*');
		$this->db->from('matricula');
		$this->db->where('id_matricula', $id_matricula);
		$this->db->join('aluno',  	  'aluno.id_aluno = matricula.aluno_id');
		$this->db->join('anolectivo', 'anolectivo.id_ano = matricula.anolectivo_id');
		$this->db->join('turma',  	  'turma.id_turma = matricula.turma_id');
		$this->db->join('classe', 	  'classe.id_classe  = turma.classe_id');				// Join tbl classe [turma]
		$this->db->join('periodo',    'periodo.id_periodo = turma.periodo_id');
		$this->db->join('sala',  	  'sala.id_sala = turma.sala_id');
		$this->db->join('funcionario','funcionario.id_funcionario = matricula.funcionario_id');
		$dados["matricula_row"] = $this->db->get()->row();									// Join Matricula
		/*===========================================================================================================================*/ 
		$this->db->select('*');																// Selecione Tudo
		$this->db->from('matricula');														// Da tabela Matricula
		$this->db->where('id_matricula', $id_matricula);									// Aonde o Id_Aluno = $id (get id aluno)
		$this->db->join('aluno', 'aluno.id_aluno = matricula.aluno_id');					// Join [Turma = Matricula]
		$this->db->join('anolectivo', 'anolectivo.id_ano = matricula.anolectivo_id'); 		// Join [Ano lectivo = Matricula]
		$this->db->join('turma', 'turma.id_turma = matricula.turma_id');	
		$this->db->join('classe', 'classe.id_classe  = turma.classe_id');					// Join tbl classe [turma]
		$this->db->join('disciplina', 'disciplina.classe_id = classe.id_classe');			// Join [Disciplina = Classe]
		$dados["matricula"] = $this->db->get()->result();									// Join Matricula	   
		$dados["matricula_select"] = $this->Matricula_Model->retorna_matricula($id_matricula);
		/*===========================================================================================================================*/
		$this->load->view('layout/cabecalho_secretaria');
		$this->load->view('layout/menu_lateral_secretaria');
		$this->load->view('conteudo/_secretaria/_aluno/detalhe_matricula', $dados);
		$this->load->view('layout/modal_matricula');
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	/*			 			Detalhes da Matricula
	=======================================================================*/
	public function detalhe_matricula_pdf()
	{
		$id_matricula = $this->input->get("id_matricula");
		/*===========================================================================================================================*/
		$this->db->select('*');
		$this->db->from('matricula');
		$this->db->where('id_matricula', $id_matricula);
		$this->db->join('aluno',  	  'aluno.id_aluno = matricula.aluno_id');
		$this->db->join('anolectivo', 'anolectivo.id_ano = matricula.anolectivo_id');
		$this->db->join('turma',  	  'turma.id_turma = matricula.turma_id');
		$this->db->join('classe', 	  'classe.id_classe  = turma.classe_id');				// Join tbl classe [turma]
		$this->db->join('periodo',    'periodo.id_periodo = turma.periodo_id');
		$this->db->join('sala',  	  'sala.id_sala = turma.sala_id');
		$this->db->join('funcionario','funcionario.id_funcionario = matricula.funcionario_id');
		$dados["matricula_row"] = $this->db->get()->row();									// Join Matricula
		/*===========================================================================================================================*/ 
		$this->db->select('*');																// Selecione Tudo
		$this->db->from('matricula');														// Da tabela Matricula
		$this->db->where('id_matricula', $id_matricula);									// Aonde o Id_Aluno = $id (get id aluno)
		$this->db->join('aluno', 'aluno.id_aluno = matricula.aluno_id');					// Join [Turma = Matricula]
		$this->db->join('anolectivo', 'anolectivo.id_ano = matricula.anolectivo_id'); 		// Join [Ano lectivo = Matricula]
		$this->db->join('turma', 'turma.id_turma = matricula.turma_id');	
		$this->db->join('classe', 'classe.id_classe  = turma.classe_id');					// Join tbl classe [turma]
		$this->db->join('disciplina', 'disciplina.classe_id = classe.id_classe');			// Join [Disciplina = Classe]
		$dados["matricula"] = $this->db->get()->result();									// Join Matricula	   
		$dados["matricula_select"] = $this->Matricula_Model->retorna_matricula($id_matricula);
		// Carrega o PDF
        $this->load->library("My_dompdf");
        $this->my_dompdf->gerar_pdf('reports/comprovativo_matricula', $dados, TRUE);
	}
	/*						GUIA DE TRANSFERENCIA
	=======================================================================*/
	public function guia_transferencia($id_matricula)
	{
		/*===========================================================================================================================*/ 
		$this->db->select('*');
		$this->db->from('matricula');
		$this->db->where('id_matricula', $id_matricula);
		$this->db->join('aluno',  	  'aluno.id_aluno = matricula.aluno_id');
		$this->db->join('anolectivo', 'anolectivo.id_ano = matricula.anolectivo_id');
		$this->db->join('turma',  	  'turma.id_turma = matricula.turma_id');
		$this->db->join('classe', 	  'classe.id_classe  = turma.classe_id');				// Join tbl classe [turma]
		$this->db->join('periodo',    'periodo.id_periodo = turma.periodo_id');
		$this->db->join('sala',  	  'sala.id_sala = turma.sala_id');
		$this->db->join('funcionario','funcionario.id_funcionario = matricula.funcionario_id');
		$dados["matricula_row"] = $this->db->get()->row();									// Join Matricula
		/*===========================================================================================================================*/ 
		$this->db->select('*');																// Selecione Tudo
		$this->db->from('matricula');														// Da tabela Matricula
		$this->db->where('id_matricula', $id_matricula);									// Aonde o Id_Aluno = $id (get id aluno)
		$this->db->join('aluno', 'aluno.id_aluno = matricula.aluno_id');					// Join [Turma = Matricula]
		$this->db->join('anolectivo', 'anolectivo.id_ano = matricula.anolectivo_id'); 		// Join [Ano lectivo = Matricula]
		$this->db->join('turma', 'turma.id_turma = matricula.turma_id');	
		$this->db->join('classe', 'classe.id_classe  = turma.classe_id');					// Join tbl classe [turma]
		$this->db->join('disciplina', 'disciplina.classe_id = classe.id_classe');			// Join [Disciplina = Classe]
		$dados["matricula"] = $this->db->get()->result();									// Join Matricula	   
		$dados["matricula_select"] = $this->Matricula_Model->retorna_matricula($id_matricula);
		//================= INICIO SELECT DINAMICO [CARREGA TODOS OS PAISES NO SELECT PAIS] =================
		$dados['provincia'] = $this->Select_Dinamico_Model->busca_provincias();
		/*===========================================================================================================================*/
		$this->load->view('layout/cabecalho_secretaria');
		$this->load->view('layout/menu_lateral_secretaria');
		$this->load->view('conteudo/_secretaria/_aluno/guia_transferencia', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	public function guia_transferencia_pdf()
	{
		$id_matricula = $this->input->post("id_matricula");
		$provincia    = $this->input->post("provincia");
		$municipio    = $this->input->post("municipio");
		/*===========================================================================================================================*/ 
		$this->db->select('*');
		$this->db->from('matricula');
		$this->db->where('id_matricula', $id_matricula);
		$this->db->join('aluno',  	  'aluno.id_aluno = matricula.aluno_id');
		$this->db->join('anolectivo', 'anolectivo.id_ano = matricula.anolectivo_id');
		$this->db->join('turma',  	  'turma.id_turma = matricula.turma_id');
		$this->db->join('classe', 	  'classe.id_classe  = turma.classe_id');				
		$this->db->join('periodo',    'periodo.id_periodo = turma.periodo_id');
		$this->db->join('sala',  	  'sala.id_sala = turma.sala_id');
		$this->db->join('provincia',  'provincia.provincia_id = aluno.provincia_id');
		$this->db->join('municipio',  'municipio.municipio_id = aluno.municipio_id');
		$dados["matricula_row"] = $this->db->get()->row();									
		/*===========================================================================================================================*/
		$this->db->select('*');
		$this->db->from('provincia');
		$this->db->where('provincia_id', $provincia);
		// $this->db->join('provincia',  'provincia.provincia_id = aluno.provincia_id');
		$dados["provincia"] = $this->db->get()->row();	
		/*===========================================================================================================================*/
		$this->db->select('*');
		$this->db->from('municipio');
		$this->db->where('municipio_id', $municipio);
		// $this->db->join('municipio',  'municipio.municipio_id = aluno.municipio_id');
		$dados["municipio"] = $this->db->get()->row();	
		/*===========================================================================================================================*/
		$dados["numero_escola"] = $this->input->post("num_escola");
		/*===========================================================================================================================*/
		// Carrega o PDF
        $this->load->library("My_dompdf");
        $this->my_dompdf->gerar_pdf('reports/guia_transferencia_pdf', $dados, TRUE);
	}
	/*											Detalhes da Matricula
	===========================================================================================================================*/
	public function caderneta_aluno($id_matricula, $classe_id, $nive_acesso)
	{
		if ($nive_acesso == "1")
		{
			$this->db->select('*');
			$this->db->from('matricula');
			$this->db->where('id_matricula', $id_matricula);
			$this->db->join('aluno',  	  'aluno.id_aluno = matricula.aluno_id');
			$this->db->join('anolectivo', 'anolectivo.id_ano = matricula.anolectivo_id');
			$this->db->join('turma',  	  'turma.id_turma = matricula.turma_id');
			$this->db->join('classe', 	  'classe.id_classe = turma.classe_id');
			$this->db->join('sala', 	  'sala.id_sala = turma.sala_id');
			$this->db->join('periodo', 	  'periodo.id_periodo = turma.periodo_id');
			$dados["matricula_row"] = $this->db->get()->row();													// Resulta uma linha
			/*===========================================================================================================================*/ 
			$this->db->select('*');																				// Selecione Tudo
			$this->db->from('notas_disciplina');																// Da tabela Matricula
			$this->db->where('matricula_id', $id_matricula);													// Aonde o Id_Aluno = $id (get id aluno)
			$this->db->join('disciplina',	'disciplina.id_disciplina = notas_disciplina.disciplina_id');		// Join [Classe = Matricula]
			$dados["notas_disciplina"] = $this->db->get()->result();											// Join Matricula
			/*===========================================================================================================================*/ 
			$this->db->select('*');																		// Selecione Tudo
			$this->db->from('disciplina');																// Da tabela Matricula
			$this->db->where('classe_id', $classe_id);
			$this->db->join('classe',	'classe.id_classe = disciplina.classe_id');						// Join [Classe = Matricula]
			$dados["disciplinas"] = $this->db->get()->result();											// Join Matricula
			/*===========================================================================================================================*/
			$dados["classe"] = $this->Select_Dinamico_Model->busca_classes();
			/*===========================================================================================================================*/ 
			if (($classe_id == "41"))
			{
				/*================= CADERNETA INICIACAO =================*/ 
				$this->load->view('layout/cabecalho_secretaria');
				$this->load->view('layout/menu_lateral_secretaria');
				$this->load->view('conteudo/_secretaria/_aluno/_caderneta_aluno_0', $dados );
				$this->load->view('layout/modal_matricula');
				$this->load->view('layout/rodape');
				$this->load->view('layout/script');
			} elseif (($classe_id == "46")||($classe_id == "47")) {
				/*================= CADERNETA 4ª E 5ª CLASSE =================*/ 
				$this->load->view('layout/cabecalho_secretaria');
				$this->load->view('layout/menu_lateral_secretaria');
				$this->load->view('conteudo/_secretaria/_aluno/_caderneta_aluno_1', $dados );
				$this->load->view('layout/modal_matricula');
				$this->load->view('layout/rodape');
				$this->load->view('layout/script');
			} elseif (($classe_id == "48")) {
				/*================= CADERNETA 6ª CLASSE =================*/ 
				$this->load->view('layout/cabecalho_secretaria');
				$this->load->view('layout/menu_lateral_secretaria');
				$this->load->view('conteudo/_secretaria/_aluno/_caderneta_aluno_6', $dados );
				$this->load->view('layout/modal_matricula');
				$this->load->view('layout/rodape');
				$this->load->view('layout/script');
			} else {
				/*================= CADERNETA 1ª, 2ª E 3ª CLASSE =================*/ 
				$this->load->view('layout/cabecalho_secretaria');
				$this->load->view('layout/menu_lateral_secretaria');
				$this->load->view('conteudo/_secretaria/_aluno/_caderneta_aluno', $dados );
				$this->load->view('layout/modal_matricula');
				$this->load->view('layout/rodape');
				$this->load->view('layout/script');
			}
		} else {
			/* =========================================================================================================== */ 
			$this->db->select('*');
			$this->db->from('matricula');
			$this->db->where('id_matricula', $id_matricula);
			$this->db->join('aluno',  	  'aluno.id_aluno = matricula.aluno_id');
			$this->db->join('anolectivo', 'anolectivo.id_ano = matricula.anolectivo_id');
			$this->db->join('turma',  	  'turma.id_turma = matricula.turma_id');
			$this->db->join('classe', 	  'classe.id_classe = turma.classe_id');
			$this->db->join('sala', 	  'sala.id_sala = turma.sala_id');
			$this->db->join('periodo', 	  'periodo.id_periodo = turma.periodo_id');
			$dados["matricula_row"] = $this->db->get()->row();													// Resulta uma linha
			/*===========================================================================================================================*/ 
			$this->db->select('*');																				// Selecione Tudo
			$this->db->from('notas_disciplina');																// Da tabela Matricula
			$this->db->where('matricula_id', $id_matricula);													// Aonde o Id_Aluno = $id (get id aluno)
			$this->db->join('disciplina',	'disciplina.id_disciplina = notas_disciplina.disciplina_id');		// Join [Classe = Matricula]
			$dados["notas_disciplina"] = $this->db->get()->result();											// Join Matricula
			/*===========================================================================================================================*/ 
			$this->db->select('*');																		// Selecione Tudo
			$this->db->from('disciplina');																// Da tabela Matricula
			$this->db->where('classe_id', $classe_id);
			$this->db->join('classe',	'classe.id_classe = disciplina.classe_id');						// Join [Classe = Matricula]
			$dados["disciplinas"] = $this->db->get()->result();											// Join Matricula
			/*===========================================================================================================================*/
			$dados["classe"] = $this->Select_Dinamico_Model->busca_classes();
			/*===========================================================================================================================*/ 
			if (($classe_id == "41"))
			{
				/*================= CADERNETA INICIACAO =================*/ 
				$this->load->view('layout/cabecalho_secretaria');
				$this->load->view('layout/menu_lateral_secretaria');
				$this->load->view('conteudo/_secretaria/_aluno/caderneta_aluno_0', $dados );
				$this->load->view('layout/modal_matricula');
				$this->load->view('layout/rodape');
				$this->load->view('layout/script');
			} elseif (($classe_id == "46")||($classe_id == "47")) {
				/*================= CADERNETA 4ª E 5ª CLASSE =================*/ 
				$this->load->view('layout/cabecalho_secretaria');
				$this->load->view('layout/menu_lateral_secretaria');
				$this->load->view('conteudo/_secretaria/_aluno/caderneta_aluno_1', $dados );
				$this->load->view('layout/modal_matricula');
				$this->load->view('layout/rodape');
				$this->load->view('layout/script');
			} elseif (($classe_id == "48")) {
				/*================= CADERNETA 6ª CLASSE =================*/ 
				$this->load->view('layout/cabecalho_secretaria');
				$this->load->view('layout/menu_lateral_secretaria');
				$this->load->view('conteudo/_secretaria/_aluno/caderneta_aluno_6', $dados );
				$this->load->view('layout/modal_matricula');
				$this->load->view('layout/rodape');
				$this->load->view('layout/script');
			} else {
				/*================= CADERNETA 1ª, 2ª E 3ª CLASSE =================*/ 
				$this->load->view('layout/cabecalho_secretaria');
				$this->load->view('layout/menu_lateral_secretaria');
				$this->load->view('conteudo/_secretaria/_aluno/caderneta_aluno', $dados );
				$this->load->view('layout/modal_matricula');
				$this->load->view('layout/rodape');
				$this->load->view('layout/script');
			}
		}
	}
	/*					gerar PDF da boletim de notas
	=======================================================================*/
	public function caderneta_aluno_pdf($id_matricula, $classe)
	{
		$this->db->select('*');
		$this->db->from('matricula');
		$this->db->where('id_matricula', $id_matricula);
		$this->db->join('aluno',  	  'aluno.id_aluno = matricula.aluno_id');
		$this->db->join('anolectivo', 'anolectivo.id_ano = matricula.anolectivo_id');
		$this->db->join('turma',  	  'turma.id_turma = matricula.turma_id');
		$this->db->join('classe', 	  'classe.id_classe = turma.classe_id');
		$this->db->join('sala', 	  'sala.id_sala = turma.sala_id');
		$this->db->join('periodo', 	  'periodo.id_periodo = turma.periodo_id');
		$dados["matricula_row"] = $this->db->get()->row();											// Resulta uma linha
		/*								SELECT PROFESSOR DA TURMA 
		===========================================================================================================*/
		$this->db->select('*');
		$this->db->from('matricula');
		$this->db->where('id_matricula', $id_matricula);
		$this->db->join('aluno',  	  'aluno.id_aluno = matricula.aluno_id');
		$this->db->join('anolectivo', 'anolectivo.id_ano = matricula.anolectivo_id');
		$this->db->join('turma',  	  'turma.id_turma = matricula.turma_id');
		$this->db->join('classe', 	  'classe.id_classe = turma.classe_id');
		$dados["matricula_select"] = $this->db->get()->row();													// Resulta uma linha
		// ===========================================================================================================================
		$this->db->select('*');																				// Selecione Tudo
		$this->db->from('notas_disciplina');																// Da tabela Matricula
		$this->db->where('matricula_id', $id_matricula);													// Aonde o Id_Aluno = $id (get id aluno)
		$this->db->join('disciplina',	'disciplina.id_disciplina = notas_disciplina.disciplina_id');	// Join [Classe = Matricula]
		$dados["matricula"] = $this->db->get()->result();												// Resulta varias linhas da tabela
		// ===========================================================================================================================
		$dados["matricula_select"] = $this->Matricula_Model->retorna_matricula($id_matricula);
		// ===========================================================================================================================
		if ($classe == 41) {
			$this->load->library("My_dompdf");
			$this->my_dompdf->gerar_pdf('reports/caderneta_aluno_iniciacao_pdf', $dados, TRUE);
		} else {
			$this->load->library("My_dompdf");
			$this->my_dompdf->gerar_pdf('reports/caderneta_aluno_pdf', $dados, TRUE);
		}
	}
	/*					gerar PDF da boletim de notas
	=======================================================================*/
	public function termo_exame_pdf($id_matricula, $classe)
	{
		$this->db->select('*');
		$this->db->from('matricula');
		$this->db->where('id_matricula', $id_matricula);
		$this->db->join('aluno',  	   'aluno.id_aluno = matricula.aluno_id');
		$this->db->join('anolectivo',  'anolectivo.id_ano = matricula.anolectivo_id');
		$this->db->join('turma',  	   'turma.id_turma = matricula.turma_id');
		$this->db->join('classe', 	   'classe.id_classe = turma.classe_id');
		$this->db->join('pais',  	   'pais.pais_id = aluno.pais_id');
		$this->db->join('provincia',   'provincia.provincia_id = aluno.provincia_id');
		$this->db->join('municipio',   'municipio.municipio_id = aluno.municipio_id');
		$this->db->join('funcionario', 'funcionario.id_funcionario = matricula.funcionario_id');
		$dados["matricula_row"] = $this->db->get()->row();											// Resulta uma linha
		/*---------------------------------------------------------------------------*/
		$this->db->select('*');
		$this->db->from('matricula');
		$this->db->where('id_matricula', $id_matricula);
		$this->db->join('aluno',  	  'aluno.id_aluno = matricula.aluno_id');
		$this->db->join('anolectivo', 'anolectivo.id_ano = matricula.anolectivo_id');
		$this->db->join('turma',  	  'turma.id_turma = matricula.turma_id');
		$this->db->join('classe', 	  'classe.id_classe = turma.classe_id');
		$this->db->join('curso',  	  'curso.id_curso = matricula.curso_id');
		$dados["matricula_select"] = $this->db->get()->row();													// Resulta uma linha
		// ===========================================================================================================================
		$this->db->select('*'); // Selecione Tudo
		$this->db->from('notas_disciplina'); // Da tabela Matricula
		$this->db->where('matricula_id', $id_matricula); // Aonde o Id_Aluno = $id (get id aluno)
		$this->db->join('disciplina',	'disciplina.id_disciplina = notas_disciplina.disciplina_id');	// Join [Classe = Matricula]
		$dados["matricula"] = $this->db->get()->result();	// Resulta varias linhas da tabela
		// ===========================================================================================================================
		$dados["matricula_select"] = $this->Matricula_Model->retorna_matricula($id_matricula);
		// ===========================================================================================================================
		if ($classe == 41) {
			$this->load->library("My_dompdf");
			$this->my_dompdf->gerar_pdf_landscape('reports/caderneta_aluno_iniciacao_pdf', $dados, TRUE);
		} else {
			$this->load->library("My_dompdf");
			$this->my_dompdf->gerar_pdf_landscape('reports/termo_exame_pdf', $dados, TRUE);
		}
	}
	/*			 			Detalhes da Matricula
	=======================================================================*/
	public function declaracao_pdf()
	{
		$id_matricula = $this->input->get("id_matricula");
		// ===========================================================================================================================
		$this->db->select('*');
		$this->db->from('matricula');
		$this->db->where('id_matricula', $id_matricula);
		$this->db->join('aluno',  	  'aluno.id_aluno = matricula.aluno_id');
		$this->db->join('anolectivo', 'anolectivo.id_ano = matricula.anolectivo_id');
		$this->db->join('turma',  	  'turma.id_turma = matricula.turma_id');
		$this->db->join('classe', 	  'classe.id_classe = turma.classe_id');
		$this->db->join('pais',  	    'pais.pais_id = aluno.pais_id');
		$this->db->join('provincia',    'provincia.provincia_id = aluno.provincia_id');
		$this->db->join('municipio',    'municipio.municipio_id = aluno.municipio_id');
		$this->db->join('funcionario',  'funcionario.id_funcionario = matricula.funcionario_id');
		$dados["matricula_row"] = $this->db->get()->row();									// Join Matricula
		// ===========================================================================================================================
		$this->db->select('*');																				// Selecione Tudo
		$this->db->from('notas_disciplina');																// Da tabela Matricula
		$this->db->where('matricula_id', $id_matricula);													// Aonde o Id_Aluno = $id (get id aluno)
		$this->db->join('disciplina',	'disciplina.id_disciplina = notas_disciplina.disciplina_id');	// Join [Classe = Matricula]
		// $dados["notas_disciplina"] = $this->db->get()->result();									// Join Matricula
		$dados["matricula"] = $this->db->get()->result();												// Resulta varias linhas da tabela
		// ===========================================================================================================================
		$dados["matricula_select"] = $this->Matricula_Model->retorna_matricula($id_matricula);
		// Carrega o PDF
        $this->load->library("My_dompdf");
        $this->my_dompdf->gerar_pdf('reports/declaracao_pdf', $dados, TRUE);
	}
	/*			INÍCIO SELECT DINAMICO FUNCAO BUSCA DISCIPLINA 
	=======================================================================*/
	public function busca_disciplina()
	{
		if($this->input->post('classe_id'))
		{
			echo $this->Select_Dinamico_Model->busca_disciplinas($this->input->post('classe_id'));
		}
	}
	/*				INSERIR REGISTROS NA TABELA NOTAS DISCIPLINA 
	=======================================================================*/
	public function guardar_disciplina()
	{
		$this->Matricula_Model->guardar_disciplinas();
		$id_matricula 	= $this->input->post('matricula'); 		//	pega o id da matricula
		$id_classe 		  = $this->input->post('classe');     	//	pega o id da classe
		$anolectivo_id  = $this->input->post('anolectivo');		//  pega o id do anolectivo
		$turma_id  	  	= $this->input->post('turma');			  //  pega o id da turma
		echo $this->session->set_flashdata('msg',"<div class='alert alert-success text-center'>DISCIPLINAS ADICIONADA COM SUCESSO</div>");	
		redirect('secretaria/matricula/caderneta_aluno/'.$id_matricula.'/'.$id_classe.'/'.$this->session->userdata('nivel_acesso'));
	}
	/*				NICIO EXCLUIR MATRICULA
	=======================================================================*/
	public function apagar_disciplina($id, $id_matricula, $id_classe)
	{
		$this->load->model("Matricula_Model");
		$this->Matricula_Model->apagardisciplina($id);
		/* ========================================================================================================================== */ 
		echo $this->session->set_flashdata('msg',"<div class='alert alert-danger text-center'>DISCIPLINA EXCLUIDA COM SUCESSO</div>");	
		redirect('secretaria/matricula/caderneta_aluno/'.$id_matricula.'/'.$id_classe.'/'.$this->session->userdata('nivel_acesso'));
	}
	/*						Notas 
	=========================================================*/
	public function notas()
	{
		$id_matricula = $this->input->get("id_matricula");
		$this->db->select('*');															// Selecione Tudo
		$this->db->from('matricula');													// Da tabela Matricula
		$this->db->where('id_matricula', $id_matricula);								// Aonde o Id_Aluno = $id (get id aluno)
		// $this->db->order_by("anolectivo", "asc");									// Orden
		$this->db->join('aluno',	   'aluno.id_aluno = matricula.aluno_id');			// Join [Turma = Matricula]
		$this->db->join('anolectivo',  'anolectivo.id_ano = matricula.anolectivo_id'); 	// Join [Ano lectivo = Matricula]
		$this->db->join('classe',	   'classe.id_classe  = matricula.classe_id');		// Join [Classe = Matricula]
		$this->db->join('disciplina',  'disciplina.classe_id = classe.id_classe');		// Join [Disciplina = Classe]
		$dados["matricula"] = $this->db->get()->result();								// Join Matricula	   
		$dados["matricula_select"] = $this->Matricula_Model->retorna_matricula($id_matricula);				   		
		//	==================================== CARREGA A VIZUALIZACAO DA VIEW LISTA ====================================
		$this->load->view('layout/cabecalho_secretaria');
		$this->load->view('layout/menu_lateral_secretaria');
		$this->load->view('conteudo/_secretaria/_aluno/notas', $dados );
		$this->load->view('layout/modal_matricula');
		$this->load->view('layout/rodape');
		$this->load->view('layout/script');
	}
	// ========= VERIFICAR DEPOIS =========
	public function add_notas($id_notas_disciplina, $classe)
	{
		$this->db->where('id_notas_disciplina', $id_notas_disciplina);
		$this->db->join('aluno', 'aluno.id_aluno = notas_disciplina.aluno_id');							// Join [Aluno]
		$this->db->join('turma', 'turma.id_turma = notas_disciplina.turma_id');							// Join [Turma]
		$this->db->join('classe', 'classe.id_classe  = turma.classe_id', 'left');						// Join tbl classe [turma]
		$this->db->join('anolectivo', 'anolectivo.id_ano = notas_disciplina.anolectivo_id');			// Join [Ano Lectivo]
		$this->db->join('disciplina', 'disciplina.id_disciplina = notas_disciplina.disciplina_id');		// Join [Disciplina]
		$dados['notas_disciplina'] = $this->db->get('notas_disciplina')->result();
		// ============================================================================================================================
		if ($classe == 41) 
		{
			// SE classe = iniciação - chama a view da iniciação
			$this->load->view('layout/cabecalho');
			$this->load->view('layout/menu_lateral_docente');
			$this->load->view('conteudo/_secretaria/_aluno/lancar_notas_iniciacao', $dados);
			$this->load->view('layout/rodape');
			$this->load->view('layout/script');
		} else {
			// SE não - chama a view padrão
			$this->load->view('layout/cabecalho');
			$this->load->view('layout/menu_lateral_docente');
			$this->load->view('conteudo/_secretaria/_aluno/lancar_notas', $dados);
			$this->load->view('layout/rodape');
			$this->load->view('layout/script');
		}
	}
	//	SALVA A ACTUALIZACAO DO REGISTROS NA TABELA NOTAS_DISCIPLINAS
	public function salvar_nota_1()
	{
		$id_notas_disciplina = $this->input->post('id_notas_disciplina');	
		$anolectivo_id = $this->input->post('anolectivo_id');	
		$turma_id = $this->input->post('turma_id');
		$disciplina_id = $this->input->post('disciplina_id');
		$classe_id = $this->input->post('classe_id');
		/* -------------------------------------------------------------------------------------------------------------------------------- */
		if(($this->input->post('mac_1') > 10) || ($this->input->post('cpp_1') > 10) || 
			($this->input->post('cpp_1') < 0)  || ($this->input->post('mac_1') < 0)){
			echo $this->session->set_flashdata('msg',"<div class='alert alert-danger text-center'>INSIRA NOTA NO INTERVALO DE 0 A 10</div>");	
			redirect('secretaria/matricula/add_notas/'.$id_notas_disciplina.'/'.$classe_id);		
		}elseif(($this->input->post('mac_1') === "" ) || (($this->input->post('cpp_1') === ""))){
			echo $this->session->set_flashdata('msg',"<div class='alert alert-warning text-center'>CAMPO MAC OU CPP VAZIO</div>");	
			redirect('secretaria/matricula/add_notas/'.$id_notas_disciplina.'/'.$classe_id);	
		}else{
			$this->Matricula_Model->salvar_nota_1();
			redirect('secretaria/listagem/lancar_notas/'.$anolectivo_id.'/'.$turma_id.'/'.$disciplina_id.'/'.$classe_id);
		}
	}
	public function salvar_nota_2()
	{
		$id_notas_disciplina = $this->input->post('id_notas_disciplina');	
		$anolectivo_id = $this->input->post('anolectivo_id');	
		$turma_id = $this->input->post('turma_id');
		$disciplina_id = $this->input->post('disciplina_id');
		$classe_id = $this->input->post('classe_id');
		/* --------------------------------------------------------------------------------------------------------------------------------- */ 
		if(($this->input->post('mac_2') > 10) || ($this->input->post('cpp_2') > 10) || 
			($this->input->post('cpp_2') < 0)  || ($this->input->post('mac_2') < 0)){
			echo $this->session->set_flashdata('msg',"<div class='alert alert-danger text-center'>INSIRA NOTA NO INTERVALO DE 0 A 10</div>");	
			redirect('secretaria/matricula/add_notas/'.$id_notas_disciplina.'/'.$classe_id);			
		}elseif(($this->input->post('mac_2') === "") || (($this->input->post('cpp_2') === ""))){
			echo $this->session->set_flashdata('msg',"<div class='alert alert-warning text-center'>CAMPO MAC OU CPP VAZIO</div>");	
			redirect('secretaria/matricula/add_notas/'.$id_notas_disciplina.'/'.$classe_id);
		}else{
			$this->Matricula_Model->salvar_nota_2();
			redirect('secretaria/listagem/lancar_notas/'.$anolectivo_id.'/'.$turma_id.'/'.$disciplina_id.'/'.$classe_id);
		}
	}
	public function salvar_nota_3()
	{
		$id_notas_disciplina = $this->input->post('id_notas_disciplina');	
		$anolectivo_id = $this->input->post('anolectivo_id');	
		$turma_id = $this->input->post('turma_id');
		$disciplina_id = $this->input->post('disciplina_id');
		$classe_id = $this->input->post('classe_id');
		/* -------------------------------------------------------------------------------------------------------------------------------- */ 
		if(($this->input->post('mac_3') > 10) || ($this->input->post('cpp_3') > 10) || 
			($this->input->post('cpp_3') < 0) || ($this->input->post('mac_3') < 0) ||
			($this->input->post('ce') < 0) || ($this->input->post('ce') > 10)) {
			echo $this->session->set_flashdata('msg',"<div class='alert alert-danger text-center'>INSIRA NOTA NO INTERVALO DE 0 A 10</div>");	
			redirect('secretaria/matricula/add_notas/'.$id_notas_disciplina.'/'.$classe_id);		
		}elseif(($this->input->post('mac_3') === "") || (($this->input->post('cpp_3') === "")) || (($this->input->post('ce') === ""))){
			echo $this->session->set_flashdata('msg',"<div class='alert alert-warning text-center'>CAMPO MAC OU CPP OU CE VAZIO</div>");	
			redirect('secretaria/matricula/add_notas/'.$id_notas_disciplina.'/'.$classe_id);		
		}else{
			$this->Matricula_Model->salvar_nota_3();
			redirect('secretaria/listagem/lancar_notas/'.$anolectivo_id.'/'.$turma_id.'/'.$disciplina_id.'/'.$classe_id);
		}
	}
	/*							MARCAR FALTAS
	=======================================================================*/
	public function marcar_falta()
	{
		$aluno_id = $this->input->post('aluno_id');		
		$id_anolectivo = $this->input->post('anolectivo');  //	pega o id da matricula
		$id_turma 	   = $this->input->post('turma');       //	pega o id da turma
		/* ------------------------------------------------------------------------------------------------------------------------- */
		if (empty($aluno_id)){
			echo $this->session->set_flashdata('msg',"<div class='alert alert-danger text-center'>SELECIONE PELO MENOS 1 ALUNO</div>");	
			redirect('secretaria/listagem/listar_assiduidade_turma/'.$id_anolectivo.'/'.$id_turma);
		} elseif (!empty($aluno_id)){
			$this->Matricula_Model->marcar_falta();
			echo $this->session->set_flashdata('msg',"<div class='alert alert-success text-center'>FALTAS MARCADA COM SUCESSO</div>");	
			redirect('secretaria/listagem/listar_assiduidade_turma/'.$id_anolectivo.'/'.$id_turma);
		}
	}
	/*							JUSTICAR FALTAS
	=======================================================================*/
	public function justificar_falta()
	{
		$id_anolectivo = $this->input->post('anolectivo'); 	// pega o id da matricula
		$id_turma 	   = $this->input->post('turma');       // pega o id da turma
		$id_aluno      = $this->input->post('aluno');		// pega o id do aluno
		/* ----------------------------------------------------------------------------------------------------------------------- */
		$this->Matricula_Model->justificar_falta();
		echo $this->session->set_flashdata('msg',"<div class='alert alert-success text-center'>FALTA JUSTIFICADA COM SUCESSO</div>");	
		redirect('secretaria/listagem/mapa_assiduidade/'.$id_anolectivo.'/'.$id_turma.'/'.$id_aluno);
	}
}
