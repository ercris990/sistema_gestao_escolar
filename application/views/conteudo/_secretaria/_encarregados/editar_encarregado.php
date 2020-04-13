<div id="content" class="content">
    <h4 class="page-header"><i class="fa fa-user-edit mr-4"></i>ALTERAR ENCARREGADO</h4>
    <?= $this->session->flashdata('msg'); ?>
    <!------------------------ conteudo ------------------------>
    <div class="mt-5">
        <form action="<?php echo site_url('secretaria/encarregados/actualizar')?>" method="POST" id="form_matricula">
            <input type="hidden" name="id_encarregado" value="<?= $encarregado[0]->id_encarregado; ?>" />
            <input type="hidden" name="aluno_encarregado" value="<?= $encarregado[0]->aluno_id; ?>" />
            <fieldset>
                <div class="row col-8 mx-auto">
                    <!--    NOME DO ENCARREGADO    -->
                    <div class="form-group col-12">
                        <label for="nome_encarregado"><b class="text-danger mr-1">*</b>Nome do
                            Encarregado</label>
                        <input type="text" name="nome_encarregado" id="nome_encarregado"
                            class="form-control border-primary text-primary" placeholder="Digite o nome"
                            value="<?= $encarregado[0]->nome_encarregado ?>" autocomplete="off" />
                    </div>
                    <!--    ANO LECTIVO    -->
                    <div class="form-group col-6">
                        <label><b class="text-danger mr-1">*</b>Ano Lectivo</label>
                        <select name="anolectivo" id="anolectivo" class="form-control border-primary text-primary">
                            <!------------------------------------------------------------>
                            <?php foreach($anolectivo as $ano):       
                                        if($matricula[0]->anolectivo_id==$ano->id_ano) { ?>
                            <option value="<?= $ano->id_ano ?>" selected=""> <?= $ano->ano_let; ?>
                            </option>
                            <?php 
                                        } else{ ?>
                            <option value="<?= $ano->id_ano ?>"> <?= $ano->ano_let; ?> </option><?php 
                                        } 
                                    endforeach; ?>
                            <!------------------------------------------------------------>
                        </select>
                    </div>
                    <!--    GRAU DE PARENTESCO    -->
                    <div class="form-group col-6">
                        <label><b class="text-danger mr-1">*</b>Grau de Parentesco</label>
                        <select name="parentesco" id="parentesco" class="form-control border-primary text-primary">
                            <option value="Pai" <?= $encarregado[0]->parentesco=='Pai'? 'selected':'';?>>Pai</option>
                            <option value="Mãe" <?= $encarregado[0]->parentesco=='Mãe'? 'selected':'';?>>Mãe</option>
                            <option value="Irmão" <?= $encarregado[0]->parentesco=='Irmão'? 'selected':'';?>>Irmão
                            </option>
                            <option value="Avô" <?= $encarregado[0]->parentesco=='Avô'? 'selected':'';?>>Avô</option>
                            <option value="Tio(a)" <?= $encarregado[0]->parentesco=='Tio(a)'? 'selected':'';?>>Tio(a)
                            </option>
                            <option value="Primo(a)" <?= $encarregado[0]->parentesco=='Primo(a)'? 'selected':'';?>>
                                Primo(a)</option>
                        </select>
                    </div>
                    <!--    TELEMOVEL    -->
                    <div class="form-group col-6">
                        <label for="telemovel_encarregado"><b class="text-danger mr-1">*</b>Telemóvel</label>
                        <input type="text" name="telemovel_encarregado" id="telemovel_encarregado"
                            class="form-control border-primary text-primary"
                            value="<?= $encarregado[0]->telemovel_encarregado ?>" placeholder="923 000 000"
                            autocomplete="off" />
                    </div>
                    <!--    E-MAIL    -->
                    <div class="form-group col-6">
                        <label for="email_encarregado">E-mail</label>
                        <input type="email" name="email_encarregado" id="email_encarregado"
                            class="form-control border-primary text-primary"
                            value="<?= $encarregado[0]->email_encarregado ?>" placeholder="Digite o e-mail"
                            autocomplete="off" />
                    </div>
                    <!-- FIM FORMULÁRIO -->
                    <div class="form-group col-12">
                        <strong>
                            Os campos que contêm<b class="text-danger mx-2">*</b>são obrigatórios.
                        </strong>
                    </div>
                    <div class="form-group col-12">
                        <a href="<?= site_url('secretaria/aluno/detalhe?id_aluno='.$encarregado[0]->aluno_id )?>"
                            class="btn btn-danger col-2" data-dismiss="modal"><i class="fa fa-arrow-left mr-2"></i>Voltar</a>
                        <button type="submit" class="btn btn-primary col-2"><i class="fa fa-save mr-2"></i>Guardar</button>
                    </div>
                </div>
            </fieldset>
        </form><!-- FIM MODAL FORM -->
    </div>