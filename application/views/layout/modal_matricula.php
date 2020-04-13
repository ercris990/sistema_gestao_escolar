<!------------------------------------ INICIO MODAL ADD DISCIPLINAS ------------------------------------>
<div class="modal  fade" id="modal-message">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= site_url('secretaria/matricula/guardar_disciplina')?>" method="POST" id="form_disciplina">
                <div class="modal-header">
                    <h4 class="modal-title">ADICIONAR DISCIPLINAS</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- =================== CAMPOS OCULTOS =================== -->
                        <input type="hidden" name="matricula" class="form-control"
                            value="<?= $matricula_row->id_matricula; ?>" />
                        <input type="hidden" name="aluno" class="form-control"
                            value="<?= $matricula_row->aluno_id; ?>" />
                        <input type="hidden" name="anolectivo" class="form-control"
                            value="<?= $matricula_row->anolectivo_id; ?>" />
                        <input type="hidden" name="turma" class="form-control"
                            value="<?= $matricula_row->turma_id; ?>" />
                        <input type="hidden" name="classe" class="form-control"
                            value="<?= $matricula_row->classe_id; ?>" />
                        <!-- ========================================================================== -->
                        <div class="col-12">
                            <table class="table table-striped table-hover table-condensed">
                                <thead class="bg-primary">
                                    <tr>
                                        <th colspan="6" class="text-center text-light">
                                            ADICIONAR DISCIPLINAS
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="with-checkbox text-center" width="1%">
                                            <div class="checkbox checkbox-css">
                                                <input type="checkbox" id="checkTodos" />
                                                <label for="checkTodos">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th class="text-center text-light" width="5%">Nº.</th>
                                        <th class="text-center text-light" width="30%">DISCIPLINA</th>
                                        <th class="text-center text-light" width="25%">SIGLA</th>
                                        <th class="text-center text-light" width="25%">CLASSE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; foreach ($disciplinas as $disciplina) : ?>
                                    <tr class="odd gradeX">
                                        <td class="with-checkbox">
                                            <input type="checkbox" class="disciplinas" id="disciplinas"
                                                name="disciplina_id[]" value="<?= $disciplina->id_disciplina; ?>" /></td>
                                        <td class="text-center"><?= $i; ?></td>
                                        <td class="text-left"> <?= $disciplina->nome_disciplina; ?></td>
                                        <td class="text-center"><?= $disciplina->sigla_disciplina; ?></td>
                                        <td class="text-center"><?= $disciplina->nome_classe; ?></td>
                                    </tr>
                                    <?php $i++; endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-danger " data-dismiss="modal">
                        <i class="fa fa-arrow-left mr-2"></i>Voltar</a>
                    <button type="submit" class="btn btn-primary "><i class="fa fa-save mr-2"></i>Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>