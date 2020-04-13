<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <!-- begin page-header -->
    <h4 class="page-header"><i class="fa fa-user-plus mr-5"></i>NOVO FUNCIONÁRIO</h4>
    <?= $this->session->flashdata('msg'); ?>
    <!-- end page-header -->
    <!------------------------ conteudo ------------------------>
    <div class="col-11 mx-auto mt-5">
        <!-- begin form -->
        <form action="<?php echo site_url('rh/funcionario/guardar')?>" method="POST">
            <fieldset>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="nome_funcionario"><b class="text-danger mx-1">*</b>Nome Completo</label>
                        <input type="text" name="nome_funcionario" class="form-control border-info"
                            id="nome_funcionario" placeholder="Digite o nome completo"
                            value="<?= set_value('nome_funcionario'); ?>" autocomplete="off" />
                        <?= form_error('nome_funcionario'); ?>
                    </div>
                    <div class="form-group col-3">
                        <label for="genero_funcionario"><b class="text-danger mx-1">*</b>Género</label>
                        <select name="genero_funcionario" class="form-control border-info" id="genero_funcionario">
                            <option value="">Selecione o Género</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                        </select>
                        <?= form_error('genero_funcionario'); ?>
                    </div>
                    <div class="form-group col-3">
                        <label for="nascimento_funcionario"><b class="text-danger mx-1">*</b>Data de
                            nascimento</label>
                        <input type="date" name="nascimento_funcionario" class="form-control border-info"
                            id="nascimento_funcionario" value="<?= set_value('nascimento_funcionario'); ?>" />
                        <?= form_error('nascimento_funcionario'); ?>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="form-group col-4">
                        <label><b class="text-danger mx-1">*</b>Nº do Bilhete</label>
                        <input type="text" name="bi_funcionario" class="form-control border-info" id="bi_funcionario"
                            placeholder="000000000AA000" value="<?= set_value('bi_funcionario'); ?>"
                            autocomplete="off" />
                        <?= form_error('bi_funcionario'); ?>
                    </div>
                    <div class="form-group col-4">
                        <label for="naturalidade"><b class="text-danger mx-1">*</b>Naturalidade</label>
                        <select name="naturalidade" class="form-control border-info" id="naturalidade">
                            <option value="">Selecione a Província</option>
                            <?php foreach($provincias as $provincia)
                                {
                                    echo '<option value= "'.$provincia->provincia_id.'">'.$provincia->nome_provincia.'</option>';
                                }
                            ?>
                        </select>
                        <?= form_error('naturalidade'); ?>
                    </div>
                    <div class="form-group col-4">
                        <label for="nivel_acesso"><b class="text-danger mx-1">*</b>Departamento</label>
                        <select name="nivel_acesso" class="form-control border-info" id="nivel_acesso">
                            <option value="">Selecione o departamento</option>
                            <option value="1">Direcção</option>
                            <option value="2">Secretaria</option>
                            <option value="3">Recursos Humanos</option>
                            <option value="4">Coordenação</option>
                            <option value="5">Docente</option>
                            <option value="6">Administrador do Sistema</option>
                            <option value="7">Serviços Gerais</option>
                            <option value="8">Segurança</option>
                        </select>
                        <?= form_error('nivel_acesso'); ?>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="form-group col-5">
                        <label for="endereco_funcionario">Endereço</label>
                        <input type="text" name="endereco_funcionario" class="form-control border-info"
                            id="endereco_funcionario" placeholder="Digite o endereço"
                            value="<?= set_value('endereco_funcionario'); ?>" autocomplete="off" />
                        <?= form_error('endereco_funcionario'); ?>
                    </div>
                    <div class="form-group col-3">
                        <label for="telemovel_funcionario">Telemóvel</label>
                        <input type="text" name="telemovel_funcionario" class="form-control border-info"
                            id="telemovel_funcionario" placeholder="+244 900 000 000"
                            value="<?= set_value('telemovel_funcionario'); ?>" autocomplete="off" />
                        <?= form_error('telemovel_funcionario'); ?>
                    </div>
                    <div class="form-group col-4">
                        <label for="email_funcionario">Email</label>
                        <input type="email" name="email_funcionario" class="form-control border-info"
                            id="email_funcionario" placeholder="nome@exemplo.com"
                            value="<?= set_value('email_funcionario'); ?>" autocomplete="off" />
                        <?= form_error('email_funcionario'); ?>
                    </div>
                </div>
                <div class="row col-12">
                    <button type="submit" onclick="return validadata_funcionario()" class="btn btn-primary mt-3 col-2">
                        <i class="fa fa-save mr-3"></i>GUARDAR
                    </button>
                </div>
            </fieldset>
        </form>
    </div>