<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <!-- begin page-header 
    <h5 class="page-header">Criar Nova turma</h5>
    -->
    <!-- end page-header -->
    <!-- INICIO PAINEL TABELAS -->
    <div class="panel panel-info">
        <!-- begin panel-heading -->
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                        class="fa fa-expand"></i></a>
            </div>
            <h4 class="panel-title">Nova Matricula</h4>
        </div>
        <!-- end panel-heading -->
        <div class="jumbotron bg-light">
            <!--    INICIO FORM MATRICULA    -->
            <form action="<?php echo site_url('secretaria/matricula/guardar')?>" method="POST">
                <input type="text" name="aluno_id" class="form-control" id="id_aluno" placeholder="Id Aluno" required />
                <fieldset>
                    <!--    ANO LECTIVO    -->
                    <div class="row">

                        <div class="form-group col-6">
                            <label>Ano Lectivo</label>
                            <select name="anolectivo" class="form-control" required>
                                <?= $options_anos; ?>
                            </select>
                        </div>
                        <!--------------------------- SELECT TURMA - DINAMICO ---------------------------------------->
                        <!--    TURMA    -->
                        <div class="form-group col-6">
                            <label>Turma</label>
                            <select name="turma_id" class="form-control" required>
                                <?= $options_turmas; ?>
                            </select>
                        </div>
                        <!-------------------------------- RADIO BUTTON ------------------------------------------->
                        <!--    RADIO BUTTON - PRIMARIO    -->
                        <div class="form-group col-4">
                            <label>Selecione o nível do aluno</label>
                            <div class="btn-group " data-toggle="buttons">
                                <label class="btn btn-outline-primary" for="">
                                    <input type="radio" name="nivel" id="id-custom_field-account-1-1"
                                        value="Ensino Primario" class="custom-control-input" required>
                                    Primário
                                </label>
                                <!--    RADIO BUTTON - SECUNDARIO   -->
                                <label class="btn btn-outline-primary" for="">
                                    <input type="radio" name="nivel" id="id-custom_field-account-1-1"
                                        value="Ensino Secundario" class="custom-control-input">
                                    Secundário
                                </label>
                                <!--    RADIO BUTTON - Iº CICLO   -->
                                <label class="btn btn-outline-primary" for="">
                                    <input type="radio" name="nivel" id="id-custom_field-account-1-2" value="1º Ciclo"
                                        class="custom-control-input">
                                    Iº Ciclo
                                </label>
                            </div>
                        </div>
                        <!--    CAMPO OCULTO - SELECT CURSO    -->
                        <div class="form-group col-8">
                            <label id="label">Selecione o Curso</label>
                            <select class="form-control" name="curso_id" placeholder="Selecione o curso" id="curso"
                                class="form-control" vk_1bc56="subscribed">
                                <?= $options_cursos; ?>
                            </select>
                        </div>
                    </div>
                    <a href="javascript:;" class="btn btn-danger " data-dismiss="modal"><i
                            class="fa fa-arrow-left mr-2"></i>Voltar</a>
                    <button type="submit" class="btn btn-primary "><i class="fa fa-save mr-2"></i>Guardar</button>
                </fieldset>
            </form>
            <!-- FIM FORMULÁRIO -->
        </div>
    </div>
</div>
</div>
<!-- FIM DO CONTEUDO -->