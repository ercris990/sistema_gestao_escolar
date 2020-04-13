<!------------------------------------ INICIO MODAL UTILIZADOR ------------------------------------>
<div class="modal fade" id="modal-utilizador">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= site_url('rh/funcionario/add_utilizador')?>" method="POST" id="form_utilizador">
                <div class="modal-header">
                    <h4 class="modal-title">CRIAR UTILIZADOR</h4>
                    <button type="button" class="close" data-dismiss="modal" ariatext="true">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- ======================= CAMPOS OCULTOS ======================= -->
                    <input type="hidden" name="id_funcionario" value="<?= $funcionario['id_funcionario'] ?>" />
                    <!--------------------------------------------------------------------------->
                    <div class="col-10 mx-auto">
                        <!--    INPUT NOME DE UTILIZADOR   -->
                        <div class="form-group col-12 my-3">
                            <label>Nome de utilizador</label>
                            <input type="text" name="nome_user" id="nome_user"
                                class="form-control border-primary text-primary" placeholder="Ex. Ermano Cristovão"
                                autocomplete="off" />
                        </div>
                        <!--    INPUT PASSWORD   -->
                        <div class="form-group col-12 my-3">
                            <label>Password</label>
                            <input type="password" name="password" id="password"
                                class="form-control border-primary text-primary" placeholder="Digite a palavra passe" />
                        </div>
                        <!--    INPUT CONFIRMAR PASSWORD   -->
                        <div class="form-group col-12 my-3">
                            <label>Confirme a password</label>
                            <input type="password" name="confirm_password" id="confirm_password"
                                class="form-control border-primary text-primary"
                                placeholder="Confirme a palavra passe" />
                        </div>
                    </div>
                    <!--------------------------------------------------------------------------->
                </div><!-- FIM MODAL BODY -->
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-danger " data-dismiss="modal">
                        <i class="fa fa-arrow-left mr-2"></i>Voltar</a>
                    <button type="submit" class="btn btn-primary ">
                        <i class="fa fa-save mr-2"></i>Guardar</button>
                </div>
            </form><!-- FIM MODAL FORM -->
        </div><!-- FIM MODAL CONTENT -->
    </div><!-- FIM MODAL DIALOG -->
</div><!-- FIM MODAL -->
<!------------------------------------ INICIO MODAL ALTERAR PASSWORD ------------------------------------>
<div class="modal fade" id="modal-password">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= site_url('rh/funcionario/alterar_password')?>" method="POST" id="form_password">
                <div class="modal-header">
                    <h4 class="modal-title">ALTERAR PALAVRA PASSE</h4>
                    <button type="button" class="close" data-dismiss="modal" ariatext="true">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- ======================= CAMPOS OCULTOS ======================= -->
                    <input type="hidden" name="id_funcionario" value="<?= $funcionario['id_funcionario'] ?>" />
                    <!--------------------------------------------------------------------------->
                    <div class="col-10 mx-auto">
                        <!--    INPUT PASSWORD   -->
                        <div class="form-group col-12 my-3">
                            <label>Palavra Passe Antiga</label>
                            <input type="password" name="password_old" id="password_old"
                                class="form-control border-primary text-primary"
                                placeholder="Digite a palavra passe actual" />
                        </div>
                        <!--    INPUT PASSWORD   -->
                        <div class="form-group col-12 my-3">
                            <label>Nova Palavra Passe</label>
                            <input type="password" name="password_new" id="password_new"
                                class="form-control border-primary text-primary"
                                placeholder="Digite a nova palavra passe" />
                        </div>
                        <!--    INPUT CONFIRMAR PASSWORD   -->
                        <div class="form-group col-12 my-3">
                            <label>Confirme a Palavra Passe</label>
                            <input type="password" name="confirm_password" id="confirm_password"
                                class="form-control border-primary text-primary"
                                placeholder="Confirme a palavra passe" />
                        </div>
                    </div>
                    <!--------------------------------------------------------------------------->
                </div><!-- end modal body -->
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-danger " data-dismiss="modal">
                        <i class="fa fa-arrow-left mr-2"></i>Voltar</a>
                    <button type="submit" class="btn btn-primary ">
                        <i class="fa fa-save mr-2"></i>Guardar</button>
                </div>
            </form>
        </div><!-- end modal content -->
    </div><!-- end modal dialog -->
</div><!-- end modal -->
<!--      INICIO MODAL ASSOCIAR TURMA
---------------------------------------------------------------------->
<div class="modal fade" id="modal-add-turma">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= site_url('secretaria/professor/add_prof_turma')?>" method="POST" id="form_add_turma">
                <div class="modal-header">
                    <h4 class="modal-title">ADICIONAR TURMA</h4>
                    <button type="button" class="close" data-dismiss="modal" ariatext="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <!-- ======================= CAMPOS OCULTOS ======================= -->
                        <input type="hidden" name="id_funcionario" value="<?= $funcionario['id_funcionario'] ?>" />
                        <!--------------------------------------------------------------------------->
                        <div class="col-10 mx-auto">
                            <!--    ANO LECTIVO    -->
                            <div class="form-group col-12 my-3">
                                <label><b class="text-danger mr-1">*</b>Ano Lectivo</label>
                                <select name="anolectivo" id="anolectivo"
                                    class="form-control border-primary text-primary">
                                    <?= $options_anos; ?>
                                </select>
                            </div>
                            <!--    TURMA    -->
                            <div class="form-group col-12 my-3">
                                <label><b class="text-danger mr-1">*</b>Turma</label>
                                <select name="turma_id" id="turma_id" class="form-control border-primary text-primary">
                                    <?= $options_turmas; ?>
                                </select>
                            </div>
                        </div>
                    </div><!-- FIM MODAL CONTAINER -->
                </div><!-- FIM MODAL CONTENT -->
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-danger " data-dismiss="modal"><i
                            class="fa fa-arrow-left mr-2"></i>Voltar</a>
                    <button type="submit" class="btn btn-primary "><i class="fa fa-save mr-2"></i>Guardar</button>
                </div>
            </form><!-- FIM MODAL FORM -->
        </div><!-- FIM MODAL CONTENT -->
    </div><!-- FIM MODAL DIALOG -->
</div><!-- FIM MODAL -->