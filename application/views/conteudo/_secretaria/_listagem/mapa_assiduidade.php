<div id="content" class="content">
    <div class="row">
        <div class="col-6">
            <h4 class="page-header text-uppercase"><i class="fa fa-list mr-5"></i>CONTROLO DE FALTAS </h4>
        </div>
        <div class="col-6 text-right">
            <a href="<?= base_url('secretaria/listagem/listar_assiduidade_turma/'.$listagem_alunos->id_ano.'/'.$listagem_alunos->turma_id) ?>"
                class="btn btn-primary"><i class="fa fa-arrow-left mr-2"></i>PAGINA ANTERIOR</a>
        </div>
    </div>
    <?= $this->session->flashdata('msg'); ?>
    <div class="table-responsive">
        <table class="table text-uppercase table-striped">
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
                    <td class="text-left align-middle"><strong><?= $listagem_alunos->nome_turma; ?></strong></td>
                    <td class="text-left align-middle"><strong> Professor: </strong></td>
                    <td class="text-left align-middle"><strong> <?= $prof->nome_funcionario; ?> </strong></td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- begin table-responsive -->
    <div class="table-responsive table-info">
        <table class="table table-striped table-hover table-condensed table-bordered text-uppercase">
            <thead>
                <tr>
                    <th class="text-left" width="30%">
                        <h5>
                            <strong>
                                Total de Faltas: <span class="text-danger"><?= $numero_faltas; ?></span>
                            </strong>
                        </h5>
                    </th>
                    <th>
                        <h5 class="text-center" width="40%">
                            <strong>
                                Faltas Não Justificadas: <span class="text-danger"><?= $faltas_n_justificadas; ?></span>
                            </strong>
                        </h5>
                    </th>
                    <th>
                        <h5 class="text-right" width="30%">
                            <strong>
                                Faltas Justificadas: <span class="text-primary"><?= $faltas_justificadas; ?></span>
                            </strong>
                        </h5>
                    </th>
                </tr>
            </thead>
        </table>
    </div>
    <!-- begin table-responsive -->
    <div class="table-responsive">
        <table class="table table-striped table-hover table-condensed text-uppercase">
            <thead class="bg-primary">
                <tr>
                    <th class="text-light text-center align-middle" colspan="6">HISTÓRICO DE FALTAS</th>
                </tr>
                <tr>
                    <th class="text-light text-center align-middle" width="5%">Nº.</th>
                    <th class="text-light text-center align-middle" width="5%">Dia</th>
                    <th class="text-light text-center align-middle" width="5%">Mês</th>
                    <th class="text-light text-center align-middle" width="5%">Ano</th>
                    <th class="text-light text-center align-middle"></th>
                    <th class="text-light text-center align-middle"></th>
                </tr>
            </thead>
            <tbody>

                <?php $i = 1; foreach ($alunos as $aluno) : ?>
                <tr class="odd gradeX">
                    <td class="text-center align-middle">
                        <?= $i ?>
                    </td>
                    <td class="text-center text-danger align-middle">
                        <?= strftime('%d', strtotime($aluno->data)); ?>
                    </td>
                    <td class="text-center text-danger align-middle">
                        <?= strftime('%B', strtotime($aluno->data)); ?>
                    </td>
                    <td class="text-center text-danger align-middle">
                        <?= strftime('%Y', strtotime($aluno->data)); ?>
                    </td>
                    <td class="text-center align-middle"><?php
                            if ($aluno->justificacao == '0'){
                                echo "--";
                            } else {
                                echo '<span style="color: blue;"> Falta Justificada </span>';
                            }
                            ?>
                    </td>
                    <td class="text-right">
                        <a href="<?= site_url('secretaria/listagem/justificar_falta/'.$aluno->id_assiduidade)?>"
                            class="btn btn-secondary btn-sm">Justificar Falta<i class="fa fa-arrow-right ml-2"></i></a>
                    </td>
                </tr>
                <?php $i++; endforeach ?>
            </tbody>
        </table>
    </div><!-- end table-responsive -->