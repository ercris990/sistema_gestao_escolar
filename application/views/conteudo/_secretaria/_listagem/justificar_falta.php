<div id="content" class="content">
    <h4 class="page-header text-uppercase"><i class="fa fa-list mr-5"></i>JUSTIFICAR FALTA</h4>
    <?= $this->session->flashdata('msg'); ?>
    <div class="">
        <div class="table-responsive">
            <table class="table table-striped text-uppercase">
                <tbody>
                    <tr class="highlight">
                        <td class="text-left" rowspan="3">
                            <div id="photo_pfl" class="img-fluid img-thumbnail img-responsive">
                                <img src=" <?= base_url("_assets/upload/".$listagem_alunos->photo); ?>">
                            </div>
                        </td>
                        <td class="text-left align-middle" width="20%"><strong>Nome do Aluno: </strong></td>
                        <td class="text-left align-middle" width="30%"><strong><?= $listagem_alunos->nome; ?></strong>
                        </td>
                        <td class="text-left align-middle" width="20%"><strong>Nº de Processo: </strong></td>
                        <td class="text-left align-middle" width="30%">
                            <strong><?= $listagem_alunos->num_processo; ?></strong></td>
                    </tr>
                    <tr>
                        <td class="text-left align-middle"><strong> Ano lectivo: </strong></td>
                        <td class="text-left align-middle"><strong><?= $listagem_alunos->ano_let; ?></strong></td>
                        <td class="text-left align-middle"><strong> Classe: </strong></td>
                        <td class="text-left align-middle"><strong><?= $listagem_alunos->nome_classe; ?></strong></td>
                    </tr>
                    <tr>
                        <td class="text-left align-middle"><strong> Turma: </strong></td>
                        <td class="text-left align-middle" colspan="3">
                            <strong><?= $listagem_alunos->nome_turma; ?></strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- ---------------------------------------------------------------------------------------------------------- -->
        <form action="<?= site_url('secretaria/matricula/justificar_falta')?>" method="POST">
            <div class="form-group">
                <!--  CAMPOS OCULTOS  -->
                <input type="hidden" class="form-control" name="id_assiduidade"
                    value="<?= $listagem_alunos->id_assiduidade; ?>" />
                <input type="hidden" class="form-control" name="aluno" value="<?= $listagem_alunos->aluno_id; ?>" />
                <input type="hidden" class="form-control" name="anolectivo"
                    value="<?= $listagem_alunos->anolectivo_id; ?>" />
                <input type="hidden" class="form-control" name="turma" value="<?= $listagem_alunos->turma_id; ?>" />
                <input type="hidden" class="form-control" name="justificacao" value="1" />
                <!--  CAMPOS OCULTOS  -->
            </div>
            <!-- ---------------------------------------------------------------- -->
            <div class="table-responsive">
                <table class="table table-striped text-uppercase">
                    <thead class="bg-primary">
                        <tr>
                            <th class="text-center text-light" colspan="2">
                                DETALHES DA FALTA
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width="10%">Dia</td>
                            <td><?= strftime('%d', strtotime($listagem_alunos->data)); ?></td>
                        </tr>
                        <tr>
                            <td>Mês</td>
                            <td><?= strftime('%B', strtotime($listagem_alunos->data)); ?></td>
                        </tr>
                        <tr>
                            <td>Ano Lectivo</td>
                            <td><?= strftime('%Y', strtotime($listagem_alunos->data)); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- ------------------------------------------------------------------------------------------------------------------------------ -->
            <div class="col-4 row mx-auto">
                <div class="col-6">
                    <a href="<?= site_url('secretaria/listagem/mapa_assiduidade/'.$listagem_alunos->anolectivo_id.'/'.$listagem_alunos->turma_id.'/'.$listagem_alunos->aluno_id)?>"
                        class="btn btn-danger btn-block"><i class="fa fa-arrow-left mr-2"></i>VOLTAR</a>
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-primary btn-block"><i
                            class="fa fa-check mr-2"></i>CONFIRMAR</button>
                </div>
            </div>
        </form>
    </div>