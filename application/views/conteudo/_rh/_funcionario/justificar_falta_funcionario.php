<div id="content" class="content">
    <h4 class="page-header text-uppercase"><i class="fa fa-list mr-5"></i>JUSTIFICAR FALTA</h4>
    <?= $this->session->flashdata('msg'); ?>
    <div class="">
        <div class="table-responsive">
            <table class="table table-striped text-uppercase">
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
        <!-- ---------------------------------------------------------------------------------------------------------- -->
        <form action="<?= site_url('rh/funcionario/justificacao_falta')?>" method="POST">
            <div class="form-group">
                <!--  CAMPOS OCULTOS  -->
                <input type="hidden" class="form-control" name="id_assiduidade" value="<?= $funcionario_inf->id_assiduidade; ?>" />
                <input type="hidden" class="form-control" name="funcionario_id" value="<?= $funcionario_inf->funcionario_id; ?>" />
                <input type="hidden" class="form-control" name="funcionario_id" value="<?= $funcionario_inf->mes_ano; ?>" />
                <input type="hidden" class="form-control" name="justificacao" value="1" />
                <!--  CAMPOS OCULTOS  -->
            </div>
            <!-- ---------------------------------------------------------------- -->
            <div class="table-responsive">
                <table class="table table-striped text-uppercase">
                    <thead class="bg-primary">
                        <tr>
                            <th class="text-light text-center" colspan="2">
                                DETALHES DA FALTA
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width="15%">Dia</td>
                            <td>
                                <?= strftime('%d', strtotime($funcionario_inf->data)); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Mês</td>
                            <td>
                                <?= strftime('%B', strtotime($funcionario_inf->data)); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Ano Lectivo</td>
                            <td>
                                <?= strftime('%Y', strtotime($funcionario_inf->data)); ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- ------------------------------------------------------------------------------------------------------------------------------ -->
            <div class="col-4 row mx-auto">
                <div class="col-6">
                    <a href="<?= site_url('rh/funcionario/mapa_assiduidade_individual')?>"
                        class="btn btn-danger btn-block"><i class="fa fa-arrow-left mr-2"></i>VOLTAR</a>
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-primary btn-block">
                        CONFIRMAR <i class="fa fa-arrow-right ml-2"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>