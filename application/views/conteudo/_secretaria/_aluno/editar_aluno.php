<div id="content" class="content">
    <h4 class="page-header"><i class="fa fa-user-edit mr-4"></i>ALTERAR DADOS DO ALUNO</h4>
    <?= $this->session->flashdata('msg'); ?>
    <!------------------------ conteudo ------------------------>
    <div class="">
        <form action="<?= site_url('secretaria/aluno/actualizar') ?>" method="POST" id="form_edit_aluno">
            <!---------------- CAMPO OCULTO - ID ------------------>
            <input type="hidden" name="id_aluno" id="id_aluno" value="<?= $aluno[0]->id_aluno; ?>" />
            <!---------------- CAMPO OCULTO - ID ------------------>
            <fieldset>
                <div class="row">
                    <div class="form-group col-6">
                        <label><b class="text-danger">*</b> Nome completo</label>
                        <input type="text" name="nome" id="nome" class="form-control border-primary"
                            placeholder="Digite o nome completo" value="<?= $aluno[0]->nome; ?>" />
                    </div>
                    <div class="form-group col-3">
                        <label><b class="text-danger">*</b> Género</label>
                        <select name="genero_aluno" class="form-control border-primary" id="genero_aluno">
                            <option value="Tarde" <?= $aluno[0]->genero_aluno=='Masculino'? 'selected':'';?>>Masculino</option>
                            <option value="Tarde" <?= $aluno[0]->genero_aluno=='Feminino'?  'selected':'';?>>Feminino</option>
                        </select>
                    </div>
                    <div class="form-group col-3">
                        <label><b class="text-danger">*</b> Data de Nascimento</label>
                        <input type="date" name="nascimento_aluno" class="form-control border-primary"
                            id="nascimento_aluno" placeholder="07/06/1990"
                            value="<?= $aluno[0]->nascimento_aluno; ?>" />
                    </div>
                </div>
                <div class="row">
                    <!-------------------------------- RADIO BUTTON ----------------------------------------->
                    <!--    RADIO BUTTON - TIPO DE DOCUMENTO    -->
                    <div class="form-group col-4">
                        <label><b class="text-danger">*</b> Tipo de Documento</label>
                        <div class="btn-group" data-toggle="buttons">
                            <!------------------- RADIO -------------------------->
                            <!--    BI    -->
                            <label class="btn btn-outline-secondary">
                                <input type="radio" class="custom-control-input cpf-cnpj" id="tipo_documento"
                                    name="tipo_documento" value="B.I">
                                Bilhete de Identidade
                            </label>
                            <!--    CEDULA    -->
                            <label class="btn btn-outline-secondary">
                                <input type="radio" class="custom-control-input cpf-cnpj" id="tipo_documento"
                                    name="tipo_documento" value="Cedula Pessoal"> Cédula Pessoal
                            </label>
                            <!--    PASSAPORTE    -->
                            <label class="btn btn-outline-secondary">
                                <input type="radio" class="custom-control-input cpf-cnpj" id="tipo_documento"
                                    name="tipo_documento" value="Passaporte">
                                Passaporte
                            </label>
                        </div>
                    </div>
                    <!--    INPUT - Nº DO DOCUMENTO   -->
                    <div class="form-group col-4">
                        <label id="label-tipo-doc"><b class="text-danger">*</b> Nº do Documento</label>
                        <input type="text" name="num_documento" class="form-control border-primary" id="InputTipo-doc"
                            placeholder="Selecione o tipo de documento" value="<?= $aluno[0]->num_documento; ?>" autocomplete="off"
                            disabled />
                    </div>
                    <div class="form-group col-4">
                        <label for="data_emissao_doc"><b class="text-danger">*</b> Data de Emissão do Documento</label>
                        <input type="date" name="data_emissao_doc" class="form-control border-primary"
                            id="data_emissao_doc" value="<?= $aluno[0]->data_emissao_doc; ?>" />
                    </div>
                </div>
                <div class="row">
                    <!--------------------------- SELECT DINAMICO ---------------------------------------->
                    <div class="form-group col-4">
                        <label><b class="text-danger">*</b> País</label>
                        <select name="pais" id="pais" class="form-control border-primary">
                            <!------------------------------------------------------------>
                            <?php foreach($pais as $ps):       
                                if($aluno[0]->pais_id==$ps->pais_id) { ?>
                            <option value="<?= $ps->pais_id ?>" selected=""> <?= $ps->nome_pais; ?>
                            </option><?php 
                                } else{ ?>
                            <option value="<?= $ps->pais_id ?>"> <?= $ps->nome_pais; ?> </option><?php 
                                } 
                                endforeach; ?>
                            <!------------------------------------------------------------>
                        </select>
                    </div>
                    <!--------------------------- SELECT DINAMICO ---------------------------------------->
                    <div class="form-group col-4">
                        <label><b class="text-danger">*</b> Província</label>
                        <select name="provincia" id="provincia" class="form-control border-primary" disabled>
                            <!------------------------------------------------------------>
                            <?php foreach($provincia as $pvca):       
                                if($aluno[0]->provincia_id==$pvca->provincia_id) { ?>
                            <option value="<?= $pvca->provincia_id ?>" selected=""> <?= $pvca->nome_provincia; ?>
                            </option><?php 
                                } else{ ?>
                            <option value="<?= $pvca->provincia_id ?>"> <?= $pvca->nome_provincia; ?> </option><?php 
                                } 
                                endforeach; ?>
                            <!------------------------------------------------------------>
                        </select>
                    </div>
                    <!--------------------------- SELECT DINAMICO ------------------------------------->
                    <div class="form-group col-4">
                        <label><b class="text-danger">*</b> Município</label>
                        <select name="municipio" id="municipio" class="form-control border-primary" disabled>
                            <!------------------------------------------------------------>
                            <?php foreach($municipio as $mncp):       
                                if($aluno[0]->municipio_id==$mncp->municipio_id) { ?>
                            <option value="<?= $mncp->municipio_id ?>" selected=""> <?= $mncp->nome_municipio; ?>
                            </option><?php 
                                } else{ ?>
                            <option value="<?= $mncp->municipio_id ?>"> <?= $mncp->nome_municipio; ?> </option><?php 
                                } 
                                endforeach; ?>
                            <!------------------------------------------------------------>
                        </select>
                    </div>
                </div>
                <!--------------------------- FIM SELECT DINAMICO ------------------------------------>
                <div class="row">
                    <!--------------------------- NOME DO PAI ------------------------------------->
                    <div class="form-group col-6">
                        <label><b class="text-danger mr-1">*</b>Nome do Pai</label>
                        <input type="text" name="nome_pai" id="nome_pai" class="form-control border-primary"
                            placeholder="Digite o nome do pai" value="<?= $aluno[0]->nome_pai; ?>" autocomplete="off" />
                        <?= form_error('nome_pai'); ?>
                    </div>
                    <!--------------------------- NOME DO MÃE ------------------------------------->
                    <div class="form-group col-6">
                        <label><b class="text-danger mr-1">*</b>Nome da Mãe</label>
                        <input type="text" name="nome_mae" id="nome_mae" class="form-control border-primary"
                            placeholder="Digite o nome da mãe" value="<?= $aluno[0]->nome_mae; ?>" autocomplete="off" />
                        <?= form_error('nome_mae'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-8">
                        <!--------------------------- ENDEREÇO ------------------------------------->
                        <label for="endereco_aluno"><b class="text-danger">*</b> Endereço</label>
                        <input type="text" name="endereco_aluno" class="form-control border-primary" id="endereco_aluno"
                            value="<?= $aluno[0]->endereco_aluno; ?>" autocomplete="off" />
                    </div>
                    <div class="form-group col-4">
                        <!--------------------------- TELEMOVEL ------------------------------------->
                        <label for="contacto_aluno">Telemóvel</label>
                        <input type="text" name="contacto_aluno" class="form-control border-primary" id="contacto_aluno"
                            value="<?= $aluno[0]->contacto_aluno; ?>" autocomplete="off" />
                    </div>
                    <div class="form-group col-12">
                        <strong>Os campos que contêm <b class="text-danger">*</b> são obrigatórios.</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12">
                        <a href="<?php echo site_url('secretaria/aluno/detalhe?id_aluno='.$aluno[0]->id_aluno); ?>"
                            class="btn btn-danger add-on col-2 "><i class="fa fa-arrow-left mr-2"></i>Cancelar</a>
                        <!---------------------------------------------------------------------------------------->
                        <button type="submit" onclick="return validadata()" id="btn-gurdar-aluno"
                            class="btn btn-primary col-2 ml-2">
                            <i class="fa fa-save mr-2"></i>Actualizar</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>