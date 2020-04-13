<!-------------------------------------------- INICIO MODAL MATRICULA ------------------------------------------
-->
<!---   INICIO MODAL MATRICULA   -->
<div class="modal fade" id="modal-matricula">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?php echo site_url('secretaria/matricula/guardar')?>" method="POST" id="form_matricula">
                <div class="modal-header">
                    <h4 class="modal-title">MATRICULAR ALUNO</h4>
                    <button type="button" class="close" data-dismiss="modal" ariatext="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <!--    INICIO FORM MATRICULA    -->
                        <input type="hidden" name="aluno_id" class="form-control border-primary text-primary"
                            id="id_aluno" value="<?= $aluno['id_aluno']?>" />
                        <div class="row col-10 mx-auto">
                            <!--    ANO LECTIVO    -->
                            <div class="form-group col-12">
                                <label><b class="text-danger mr-1">*</b>Ano Lectivo</label>
                                <select name="anolectivo" id="anolectivo"
                                    class="form-control border-primary text-primary">
                                    <?= $options_anos; ?>
                                </select>
                            </div>
                            <!--------------------------- SELECT TURMA - DINAMICO -------------------------->
                            <!--    TURMA    -->
                            <div class="form-group col-12">
                                <label><b class="text-danger mr-1">*</b>Turma</label>
                                <select name="turma_id" id="turma_id" class="form-control border-primary text-primary">
                                    <?= $options_turmas; ?>
                                </select>
                            </div>
                            <!-- ------------------------------------------------------------------------------ -->
                            <div class="form-group col-12">
                                <strong>Os campos que contêm<b class="text-danger mx-2">*</b>são
                                    obrigatórios.</strong>
                            </div>
                        </div>
                    </div><!-- FIM MODAL BODY -->
                </div><!-- FIM MODAL CONTENT -->
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-danger " data-dismiss="modal">
                        <i class="fa fa-arrow-left mr-2"></i>Voltar</a>
                    <button type="submit" class="btn btn-primary "><i class="fa fa-save mr-2"></i>Guardar</button>
                </div>
            </form><!-- FIM MODAL FORM -->
        </div><!-- FIM MODAL CONTENT -->
    </div><!-- FIM MODAL DIALOG -->
</div><!-- FIM MODAL -->
<!-------------------------------------------- INICIO MODAL NUMERO DO PROCESSO ------------------------------------------
-->
<!---   INICIO MODAL MATRICULA   -->
<div class="modal fade" id="modal-num-processo">
    <div class="modal-dialog ">
        <div class="modal-content">
            <form action="<?php echo site_url('secretaria/aluno/num_processo')?>" method="POST" id="form_matricula">
                <div class="modal-header">
                    <h4 class="modal-title">INSERIR NUMERO DE PROCESSO</h4>
                    <button type="button" class="close" data-dismiss="modal" ariatext="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <!--    INICIO FORM MATRICULA    -->
                        <input type="hidden" name="aluno_id" class="form-control border-primary text-primary"
                            id="id_aluno" value="<?= $aluno['id_aluno']?>" />
                        <!-- --------------------------------------------------------------------------------------- -->
                        <!--    NUMERO DE PROCESSO    -->
                        <div class="form-group col-12">
                            <label>Numero de Processo do Aluno</label>
                            <input type="text" name="num_processo" id="num_processo" class="form-control border-primary"
                                value="<?= $aluno['num_processo']?>" autocomplete="off" />
                        </div>
                        <!-- --------------------------------------------------------------------------------------- -->
                    </div><!-- FIM MODAL BODY -->
                </div><!-- FIM MODAL CONTENT -->
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-danger " data-dismiss="modal">
                        <i class="fa fa-arrow-left mr-2"></i>Voltar
                    </a>
                    <!-- --------------------------------------------------------------------------------------- -->
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Deseja alterar o número de processo do aluno?');"><i class="fa fa-save mr-2"></i>Guardar
                    </button>
                </div>
            </form><!-- FIM MODAL FORM -->
        </div><!-- FIM MODAL CONTENT -->
    </div><!-- FIM MODAL DIALOG -->
</div><!-- FIM MODAL -->
<!--
---------------------------------- INICIO MODAL ENCARREGADOS ----------------------------------
-->
<div class="modal fade" id="modal-encarregados">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?php echo site_url('secretaria/encarregados/guardar')?>" method="POST" id="form_encarregado">
                <div class="modal-header">
                    <h4 class="modal-title">Enarrgados de Educação</h4>
                    <button type="button" class="close" data-dismiss="modal" ariatext="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <!-- CAMPO ID (OCULTO) -->
                        <input type="hidden" name="aluno_encarregado" id="aluno_encarregado"
                            value="<?= $aluno['id_aluno'] ?>" class="form-control my-1" />
                        <div class="row col-10 mx-auto">
                            <!--    NOME DO ENCARREGADO    -->
                            <div class="form-group col-12">
                                <label for="nome_encarregado"><b class="text-danger mr-1">*</b>Nome do
                                    Encarregado</label>
                                <input type="text" name="nome_encarregado" id="nome_encarregado"
                                    class="form-control border-primary text-primary" placeholder="Digite o nome"
                                    autocomplete="off" />
                            </div>
                            <!--    ANO LECTIVO    -->
                            <div class="form-group col-6">
                                <label><b class="text-danger mr-1">*</b>Ano Lectivo</label>
                                <select name="anolectivo" id="anolectivo"
                                    class="form-control border-primary text-primary">
                                    <?= $options_anos; ?>
                                </select>
                            </div>

                            <!--    GRAU DE PARENTESCO    -->
                            <div class="form-group col-6">
                                <label><b class="text-danger mr-1">*</b>Grau de Parentesco</label>
                                <select name="parentesco" id="parentesco"
                                    class="form-control border-primary text-primary">
                                    <option value="">Selecione uma opção</option>
                                    <option value="Pai">Pai</option>
                                    <option value="Mãe">Mãe</option>
                                    <option value="Irmão(ã)">Irmão(ã)</option>
                                    <option value="Avô">Avô</option>
                                    <option value="Tio(a)">Tio(a)</option>
                                    <option value="Primo(a)">Primo(a)</option>
                                </select>
                            </div>
                            <!--    TELEMOVEL    -->
                            <div class="form-group col-6">
                                <label for="telemovel_encarregado"><b class="text-danger mr-1">*</b>Telemóvel</label>
                                <input type="text" name="telemovel_encarregado" id="telemovel_encarregado"
                                    class="form-control border-primary text-primary" placeholder="923 000 000"
                                    autocomplete="off" />
                            </div>
                            <!--    E-MAIL    -->
                            <div class="form-group col-6">
                                <label for="email_encarregado">E-mail</label>
                                <input type="email" name="email_encarregado" id="email_encarregado"
                                    class="form-control border-primary text-primary" placeholder="Digite o e-mail"
                                    autocomplete="off" />
                            </div>

                            <div class="form-group col-12">
                                <strong>Os campos que contêm<b class="text-danger mx-2">*</b>são
                                    obrigatórios.</strong>
                            </div>
                        </div>
                    </div><!-- FIM CONTAINER -->
                </div><!-- FIM MODAL BODY -->
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-danger " data-dismiss="modal"><i
                            class="fa fa-arrow-left mr-2"></i>Voltar</a>
                    <button type="submit" class="btn btn-primary "><i class="fa fa-save mr-2"></i>Guardar</button>
                </div>
            </form><!-- FIM MODAL FORM -->
        </div><!-- FIM MODAL CONTENT -->
    </div><!-- FIM MODAL DIALOG -->
</div><!-- FIM MODAL -->