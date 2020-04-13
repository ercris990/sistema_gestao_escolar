<div id="content" class="content">
    <h4 class="page-header"><i class="fa fa-user-edit mr-4"></i>ALTERAR MATRÍCULA</h4>
    <!------------------------ conteudo ------------------------>
    <div class="mt-5">
        <form action="<?php echo site_url('secretaria/matricula/actualizar_matricula')?>" method="POST"
            id="form_matricula">
            <input type="hidden" name="id_matricula" value="<?= $matricula[0]->id_matricula; ?>" />
            <input type="hidden" name="aluno_id" value="<?= $matricula[0]->aluno_id; ?>" />
            <fieldset>
                <div class="row col-8 mx-auto">
                    <!--    ANO LECTIVO    -->
                    <div class="form-group col-12">
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
                    <!--    TURMA    -->
                    <div class="form-group col-12">
                        <label><b class="text-danger mr-1">*</b>Turma</label>
                        <select name="turma_id" id="turma_id" class="form-control border-primary text-primary">
                            <!------------------------------------------------------------>
                            <?php foreach($turma as $tm):       
                                        if($matricula[0]->turma_id==$tm->id_turma) { ?>
                            <option value="<?= $tm->id_turma ?>" selected=""> <?= $tm->nome_turma; ?></option>
                            <?php 
                                } else{ ?>
                            <option value="<?= $tm->id_turma ?>"> <?= $tm->nome_turma; ?> </option><?php } 
                                endforeach; ?>
                            <!------------------------------------------------------------>
                        </select>
                    </div>
                    <!-- FIM FORMULÁRIO -->
                    <div class="form-group col-12">
                        <strong>
                            Os campos que contêm<b class="text-danger mx-2">*</b>são obrigatórios.
                        </strong>
                    </div>
                    <div class="form-group col-12">
                        <a href="<?= site_url('secretaria/aluno/detalhe?id_aluno='.$matricula[0]->aluno_id )?>"
                            class="btn btn-danger col-3" data-dismiss="modal">
                            <i class="fa fa-arrow-left mr-2"></i>Voltar</a>
                        <button type="submit" class="btn btn-primary col-3"><i
                                class="fa fa-save mr-2"></i>Guardar</button>
                    </div>
                </div>
            </fieldset>
        </form><!-- FIM MODAL FORM -->
    </div>