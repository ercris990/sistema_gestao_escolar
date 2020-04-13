<div id="content" class="content">
    <div class="row">
        <div class="col-6">
            <h4 class="page-header text-uppercase"><i class="fa fa-list mr-5"></i>CONTROLO DE FALTAS </h4>
        </div>
        <div class="col-6 text-right">
            <a href="<?= base_url('rh/funcionario/mapa_assiduidade') ?>" class="btn btn-primary">
                <i class="fa fa-arrow-left mr-2"></i>PAGINA ANTERIOR</a>
        </div>
    </div>
    <?= $this->session->flashdata('msg'); ?>
    <div class="table-responsive">
        <table class="table text-uppercase table-striped">
            <tbody>
                <tr class="highlight">
                    <td class="text-center align-middle" width="10%" rowspan="4">
                        <!-- ----------------------------------------- -->
                        <div id="photo_pfl" class="img-fluid img-thumbnail img-responsive">
                            <img src=" <?= base_url("_assets/upload/".$funcionario_inf->photo); ?>">
                        </div>
                    </td>
                    <td class="text-right" width="15%"><strong>Nome:</strong></td>
                    <td class="text-left" width="35%">
                        <strong><?=$funcionario_inf->nome_funcionario?></strong></td>
                    <td class="text-right" width="20%"><strong>Data de Nascimento: </strong></td>
                    <td class="text-left" width="30%">
                        <strong><?= date('d/ m/ Y', strtotime($funcionario_inf->nascimento_funcionario)); ?></strong>
                    </td>
                </tr>
                <tr class="highlight">
                    <td class="text-right"><strong>Género</strong></td>
                    <td class="text-left"><strong><?=$funcionario_inf->genero_funcionario?></strong></td>
                    <td class="text-right"><strong>Nº B.I:</strong></td>
                    <td class="text-left"><strong><?=$funcionario_inf->bi_funcionario?></strong></td>
                </tr>
                <tr class="highlight">
                    <td class="text-right"><strong>Morada</strong></td>
                    <td class="text-left"><strong><?=$funcionario_inf->endereco_funcionario?></strong></td>
                    <td class="text-right"><strong>Telemóvel</strong></td>
                    <td class="text-left"><strong><?=$funcionario_inf->telemovel_funcionario?></strong></td>
                </tr>
                <tr class="highlight">
                    <td class="text-right"><strong>E-Mail</strong></td>
                    <td class="text-left"><strong><?=$funcionario_inf->email_funcionario?></strong></td>
                    <td class="text-right"><strong>Nome de Utilizador</strong></td>
                    <td class="text-left"><strong><?=$funcionario_inf->nome_user?></strong></td>
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

                <?php $i = 1; foreach ($funcionarios as $funcionario) : ?>
                <tr class="odd gradeX">
                    <td class="text-center align-middle">
                        <?= $i ?>
                    </td>
                    <td class="text-center text-danger align-middle">
                        <?= strftime('%d', strtotime($funcionario->data)); ?>
                    </td>
                    <td class="text-center text-danger align-middle">
                        <?= strftime('%B', strtotime($funcionario->data)); ?>
                    </td>
                    <td class="text-center text-danger align-middle">
                        <?= strftime('%Y', strtotime($funcionario->data)); ?>
                    </td>
                    <td class="text-center align-middle"><?php
                            if ($funcionario->justificacao == '0'){
                                echo '<span style="color: red;"> Falta Não Justificada </span>';
                            } else {
                                echo '<span style="color: blue;"> Falta Justificada </span>';
                            }
                            ?>
                    </td>
                    <td class="text-right">
                        <a href="<?= site_url('rh/funcionario/justificar_faltas/'.$funcionario->id_assiduidade)?>"
                            class="btn btn-secondary btn-sm">Justificar Falta<i class="fa fa-arrow-right ml-2"></i></a>
                    </td>
                </tr>
                <?php $i++; endforeach ?>
            </tbody>
        </table>
    </div><!-- end table-responsive -->