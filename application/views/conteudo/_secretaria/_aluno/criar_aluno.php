<!-- INICIO CONTEUDO -->
<div id="content" class="content">
  <!-- begin page-header -->
  <h4 class="page-header"><i class="fa fa-user-plus mr-4"></i>NOVO ALUNO</h4>
  <?= $this->session->flashdata('msg'); ?>
  <!-- end page-header -->
  <!------------------------ conteudo ------------------------>
  <div class="">
    <!-- begin table-responsive -->
    <form action="<?php echo site_url('secretaria/aluno/guardar')?>" method="POST" id="form_novo_aluno">
      <fieldset class="py-3">
        <div class="row">
          <div class="form-group col-6">
            <label><b class="text-danger mr-1">*</b>Nome completo</label>
            <input type="text" name="nome" id="nome" class="form-control border-primary"
              placeholder="Digite o nome completo" value="<?= set_value('nome'); ?>" autocomplete="off" />
            <?= form_error('nome'); ?>
          </div>
          <div class="form-group col-2">
            <label><b class="text-danger mr-1">*</b>Género</label>
            <select name="genero_aluno" class="form-control border-primary" id="genero_aluno">
              <option value="">Selecione o género</option>
              <option value="Masculino">Masculino</option>
              <option value="Feminino">Feminino</option>
            </select>
            <?= form_error('genero_aluno'); ?>
          </div>
          <div class="form-group col-4">
            <label><b class="text-danger mr-1">*</b>Data de Nascimento</label>
            <input type="date" name="nascimento_aluno" class="form-control border-primary" id="nascimento_aluno"
              placeholder="07/06/1990" value="<?= set_value('nascimento_aluno'); ?>" />
            <?= form_error('nascimento_aluno'); ?>
          </div>
        </div>
        <div class="row">
          <!-------------------------------- RADIO BUTTON ----------------------------------------->
          <!--    RADIO BUTTON - TIPO DE DOCUMENTO    -->
          <div class="form-group col-4">
            <label><b class="text-danger mr-1">*</b>Tipo de Documento</label>
            <div class="btn-group" data-toggle="buttons">
              <label class="btn btn-outline-primary">
                <input type="radio" class="custom-control-input cpf-cnpj" id="tipo_documento" name="tipo_documento"
                  value="B.I" />Bilhete de Identidade
              </label>
              <label class="btn btn-outline-primary">
                <input type="radio" class="custom-control-input cpf-cnpj" id="tipo_documento" name="tipo_documento"
                  value="Cédula Pessoal" />Cédula Pessoal
              </label>
              <label class="btn btn-outline-primary">
                <input type="radio" class="custom-control-input cpf-cnpj" id="tipo_documento" name="tipo_documento"
                  value="Passaporte" />Passaporte
              </label>
            </div>
            <?= form_error('tipo_documento'); ?>
          </div>
          <!-----------------------------------    INPUT - Nº DO DOCUMENTO   ----------------------------------->
          <div class="form-group col-4">
            <label id="label-tipo-doc"><b class="text-danger mr-1">*</b>Nº do Documento</label>
            <input type="text" name="num_documento" class="form-control border-primary" id="InputTipo-doc"
              placeholder="Selecione o tipo de documento" value="<?= set_value('num_documento'); ?>" autocomplete="off"
              disabled />
            <?= form_error('num_documento'); ?>
          </div>
          <div class="form-group col-4">
            <label for="data_emissao_doc"><b class="text-danger mr-1">*</b>Data de Emissão do
              Documento</label>
            <input type="date" name="data_emissao_doc" class="form-control border-primary" id="data_emissao_doc"
              value="<?= set_value('data_emissao_doc'); ?>" />
            <?= form_error('data_emissao_doc'); ?>
          </div>
        </div>
        <div class="row">
          <!--------------------------- SELECT DINAMICO PAIS ---------------------------------------->
          <div class="form-group col-4">
            <label><b class="text-danger mr-1">*</b>País</label>
            <select name="pais" id="pais" class="form-control border-primary">
              <option value="">Selecione o País</option>
              <?php foreach($pais as $row)
					{
						echo '<option value= "'.$row->pais_id.'">'.$row->nome_pais.'</option>';
					}
				?>
            </select>
            <?= form_error('pais'); ?>
          </div>
          <!--------------------------- SELECT DINAMICO PROVINCIA ---------------------------------------->
          <div class="form-group col-4">
            <label><b class="text-danger mr-1">*</b>Província</label>
            <select name="provincia" id="provincia" class="form-control border-primary" disabled>
              <option value="">Selecione um País</option>
            </select>
            <?= form_error('provincia'); ?>
          </div>
          <!--------------------------- SELECT DINAMICO MUNICIPIO ------------------------------------->
          <div class="form-group col-4">
            <label><b class="text-danger mr-1">*</b>Município</label>
            <select name="municipio" id="municipio" class="form-control border-primary" disabled>
              <option value="">Selecione uma Província</option>
            </select>
            <?= form_error('municipio'); ?>
          </div>
        </div>
        <div class="row">
          <!--------------------------- NOME DO PAI ------------------------------------->
          <div class="form-group col-6">
            <label>Nome do Pai</label>
            <input type="text" name="nome_pai" id="nome_pai" class="form-control border-primary"
              placeholder="Digite o nome do pai" value="<?= set_value('nome_pai'); ?>" autocomplete="off" />
          </div>
          <!--------------------------- NOME DO MÃE ------------------------------------->
          <div class="form-group col-6">
            <label>Nome da Mãe</label>
            <input type="text" name="nome_mae" id="nome_mae" class="form-control border-primary"
              placeholder="Digite o nome da mãe" value="<?= set_value('nome_mae'); ?>" autocomplete="off" />
          </div>
        </div>
        <!--------------------------- CAMPO ENDERECO ------------------------------------>
        <div class="row">
          <div class="form-group col-8">
            <label for="endereco_aluno"><b class="text-danger mr-1">*</b>Endereço</label>
            <input type="text" name="endereco_aluno" class="form-control border-primary" id="endereco_aluno"
              value="<?= set_value('endereco_aluno'); ?>" autocomplete="off" />
            <?= form_error('endereco_aluno'); ?>
          </div>
          <!--------------------------- CAMPO TELEMOVEL ------------------------------------>
          <div class="form-group col-4">
            <label for="contacto_aluno">Telemóvel</label>
            <input type="text" name="contacto_aluno" class="form-control border-primary" id="contacto_aluno"
              value="<?= set_value('contacto_aluno'); ?>" autocomplete="off" />
            <?= form_error('contacto_aluno'); ?>
          </div>
          <div class="form-group col-12">
            <strong>Os campos que contêm<b class="text-danger mx-2">*</b>são
              obrigatórios.</strong>
          </div>
        </div>
        <!--------------------------- BONTOES ------------------------------------>
        <div class="row">
          <div class="form-group col-12">
            <a href="<?php echo site_url('home') ?>" class="btn btn-danger add-on col-2 "><i
                class="fa fa-arrow-left mr-2"></i>Cancelar</a>
            <button type="submit" onclick="return validadata_aluno(), validadata_aluno_doc()" id="btn-gurdar-aluno"
              class="btn btn-primary col-2 ml-2">
              <i class="fa fa-save mr-2"></i>Guardar</button>
          </div>
        </div>
      </fieldset>
    </form>
  </div><!-- end invoice content -->