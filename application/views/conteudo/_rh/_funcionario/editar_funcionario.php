<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <!-- begin page-header -->
    <h4 class="page-header"><i class="fa fa-user-edit mr-5"></i>ALTERAR FUNCIONÁRIO</h4>
    <?= $this->session->flashdata('msg'); ?>
    <!-- end page-header -->
    <!--
    ---------------------- conteudo ----------------------
    -->
    <div class="col-11 mx-auto mt-5">
        <!-- begin table-responsive -->
        <form action="<?php echo site_url('rh/funcionario/salvaractualizacao')?>" method="POST">
            <fieldset>
                <input type="hidden" name="id_funcionario" id="id_funcionario"
                    value=" <?= $funcionario[0]->id_funcionario; ?>">
                <div class="row">
                    <div class="form-group col-6">
                        <label for="nome_funcionario">Nome Completo</label>
                        <input type="text" name="nome_funcionario" class="form-control border-info"
                            id="nome_funcionario" placeholder="Digite o nome completo"
                            value=" <?= $funcionario[0]->nome_funcionario; ?>" autocomplete="off" />
                    </div>
                    <div class="form-group col-3">
                        <label for="genero_funcionario">Género</label>
                        <select name="genero_funcionario" class="form-control border-info" id="genero_funcionario">
                            <option value="">Selecione o Género</option>
                            <option value="Masculino"
                                <?= $funcionario[0]->genero_funcionario=='Masculino'? 'selected':'';?>> Masculino
                            </option>
                            <option value="Feminino"
                                <?= $funcionario[0]->genero_funcionario=='Feminino'? 'selected':'';?>> Feminino</option>
                        </select>
                    </div>
                    <div class="form-group col-3">
                        <label for="nascimento_funcionario">Data de nascimento</label>
                        <input type="date" name="nascimento_funcionario" class="form-control border-info"
                            id="nascimento_funcionario" value="<?= $funcionario[0]->nascimento_funcionario; ?>" />
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="form-group col-4">
                        <label>Nº do Bilhete</label>
                        <input type="text" name="bi_funcionario" class="form-control border-info" id="bi_funcionario"
                            placeholder="000000000AA000" value=" <?= $funcionario[0]->bi_funcionario; ?>"
                            autocomplete="off" />
                    </div>
                    <div class="form-group col-4">
                        <label for="naturalidade">Naturalidade</label>
                        <select name="naturalidade" class="form-control border-info" id="naturalidade">
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
                    <div class="form-group col-4">
                        <label for="nivel_acesso"><b class="text-danger mx-1">*</b>Departamento</label>
                        <select name="nivel_acesso" class="form-control border-info" id="nivel_acesso">
                            <option value="">Selecione o Departamento</option>
                            <option value="1" <?= $funcionario[0]->nivel_acesso=='1'? 'selected':'';?> >Direcção</option>
                            <option value="2" <?= $funcionario[0]->nivel_acesso=='2'? 'selected':'';?> >Secretaria</option>
                            <option value="3" <?= $funcionario[0]->nivel_acesso=='3'? 'selected':'';?> >Recursos Humanos</option>
                            <option value="4" <?= $funcionario[0]->nivel_acesso=='4'? 'selected':'';?> >Coordenação</option>
                            <option value="5" <?= $funcionario[0]->nivel_acesso=='5'? 'selected':'';?> >Docente</option>
                            <option value="6" <?= $funcionario[0]->nivel_acesso=='6'? 'selected':'';?> >Administrador</option>
                            <option value="7" <?= $funcionario[0]->nivel_acesso=='7'? 'selected':'';?> >Serviços Gerais</option>
                            <option value="8" <?= $funcionario[0]->nivel_acesso=='8'? 'selected':'';?> >Segurança</option>
                        </select>
                        <?= form_error('nivel_acesso'); ?>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="form-group col-5">
                        <label for="endereco_funcionario">Endereço</label>
                        <input type="text" name="endereco_funcionario" class="form-control border-info"
                            id="endereco_funcionario" placeholder="Digite o endereço"
                            value=" <?= $funcionario[0]->endereco_funcionario; ?>" autocomplete="off" />
                    </div>
                    <div class="form-group col-3">
                        <label for="telemovel_funcionario">Telemóvel</label>
                        <input type="text" name="telemovel_funcionario" class="form-control border-info"
                            id="telemovel_funcionario" placeholder="900 000 000"
                            value=" <?= $funcionario[0]->telemovel_funcionario; ?>" autocomplete="off" />
                    </div>
                    <div class="form-group col-4">
                        <label for="email_funcionario">Email</label>
                        <input type="email" name="email_funcionario" class="form-control border-info"
                            id="email_funcionario" placeholder="nome@exemplo.com"
                            value=" <?= $funcionario[0]->email_funcionario; ?>" autocomplete="off" />
                    </div>
                </div>
                <div class="row col-12">
                    <button type="submit" class="btn btn-primary mt-3 col-2">
                        <i class="fa fa-user-edit mr-3"></i>ACTUALIZAR
                    </button>
                </div>
            </fieldset>
        </form>
    </div><!-- FIM FORMULÁRIO -->