<div id="content" class="content">
    <h4 class="page-header"><i class="fa fa-edit mr-4"></i>ALTERAR TURMA OU ANO LECTIVO</h4>
    <?= $this->session->flashdata('msg'); ?>
    <!------------------------ conteudo ------------------------>
    <div class="mt-5">
        <form action="<?php echo site_url('secretaria/professor/actualizar_prof_turma')?>" method="POST"
            id="form_prof_turma">
            <input type="hidden" name="id_prof_turma" value="<?= $prof_turma[0]->id_prof_turma; ?>" />
            <input type="hidden" name="funcionario_id" value="<?= $prof_turma[0]->funcionario_id; ?>" />
            <fieldset>
                <div class="row col-8 mx-auto">
                    <!--    ANO LECTIVO    -->
                    <div class="form-group col-12">
                        <label><b class="text-danger mr-1">*</b>Ano Lectivo</label>
                        <select name="anolectivo" id="anolectivo" class="form-control border-primary text-primary">
                            <!------------------------------------------------------------>
                            <?php foreach($anolectivo as $ano):       
                                        if($prof_turma[0]->anolectivo_id==$ano->id_ano) { ?>
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
                            <?php foreach($turma as $trm):       
                                        if($turma[0]->turma_id==$trm->id_turma) { ?>
                            <option value="<?= $trm->id_turma ?>" selected=""> <?= $trm->nome_turma; ?>
                            </option>
                            <?php 
                                        } else{ ?>
                            <option value="<?= $trm->id_turma ?>"> <?= $trm->nome_turma; ?> </option><?php 
                                        } 
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
                        <a href="<?= site_url('secretaria/professor/detalhe_professor?id_funcionario='.$prof_turma[0]->funcionario_id )?>" class="btn btn-danger col-3" data-dismiss="modal">
                            <i class="fa fa-arrow-left mr-2"></i>Voltar</a>
                        <button type="submit" class="btn btn-primary col-3"><i
                                class="fa fa-save mr-2"></i>Guardar</button>
                    </div>
                </div>
            </fieldset>
        </form><!-- FIM MODAL FORM -->
    </div>