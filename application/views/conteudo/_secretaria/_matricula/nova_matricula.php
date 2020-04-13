<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <h4 class="page-header"><i class="fa fa-plus mr-5"></i>MATRICULAR ALUNO</h4>
    <!--
    ---------------------- conteudo ------------------------>
    <div class="col-10 mt-5">
        <!-- begin table-responsive -->
        <form action="<?php echo site_url('secretaria/matricula/guardar')?>" method="POST">
            <fieldset>
                <div class="col-8 mx-auto">
                    <div class="row">
                        <!--    ALUNO    -->
                        <div class="form-group col-12">
                            <label for="nome">Aluno</label>
                            <select name="aluno_id" class="form-control" required>
                                <option value=""> -- </option>
                                <!---------------------------->
                                <?php foreach($aluno as $al): ?>
                                <option value="<?= $al->id_aluno ?>"> <?= $al->nome; ?></option>
                                <?php endforeach; ?>
                                <!---------------------------->
                            </select>
                        </div>
                        <!--    ANO LECTIVO    -->
                        <div class="form-group col-12">
                            <label><b class="text-danger mr-1">*</b>Ano Lectivo</label>
                            <select name="anolectivo" id="anolectivo" class="form-control">
                                <?= $options_anos; ?>
                            </select>
                        </div>
                        <!--------------------------- SELECT TURMA - DINAMICO -------------------------->
                        <!--    TURMA    -->
                        <div class="form-group col-12">
                            <label><b class="text-danger mr-1">*</b>Turma</label>
                            <select name="turma_id" id="turma_id" class="form-control">
                                <?= $options_turmas; ?>
                            </select>
                        </div>
                        <!--------------------------- SELECT CURSO - DINAMICO -------------------------->
                        <!--    CAMPO SELECT CURSO    -->
                        <div class="form-group col-12">
                            <label><b class="text-danger mr-1">*</b>Selecione o Curso</label>
                            <select class="form-control" name="curso_id" id="curso_id" class="form-control">
                                <?= $options_cursos; ?>
                            </select>
                        </div>
                        <!-- FIM FORMULÁRIO -->
                        <div class="form-group col-12">
                            <strong>Os campos que contêm<b class="text-danger mx-2">*</b>são
                                obrigatórios.</strong>
                        </div>
                    </div>
                    <a href="javascript:;" class="btn btn-danger " data-dismiss="modal"><i
                            class="fa fa-arrow-left mr-2"></i>Voltar</a>
                    <button type="submit" class="btn btn-primary "><i class="fa fa-save mr-2"></i>Guardar</button>
                </div>
            </fieldset>
        </form>
    </div>