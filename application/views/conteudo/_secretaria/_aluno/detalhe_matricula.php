<div id="content" class="content">
    <h6 class="page-header"><i class="fa fa-list mr-3"></i>DETALHES DA MATRICULA</h6>
    <?= $this->session->flashdata('msg'); ?>
    <!-- begin tab-content -->
    <div class="">
        <!-- begin tab-pane -->
        <!-- end invoice-company -->
        <div class="invoice-content">
            <div class="table-responsive my-2">
                <table class="table table-striped text-uppercase table-condensed table-bordered">
                    <thead class="bg-primary">
                        <tr>
                            <th class="text-light text-center" colspan="2">Dados Pessoais</th>
                            <th class="text-light text-center" colspan="2">Dados da Matricula</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="highlight">
                            <td class="text-left" width="25%"><strong>Nome: </strong></td>
                            <td class="text-left" width="25%"><strong><?= $matricula_row->nome; ?></strong></td>
                            <td class="text-left" width="25%"><strong> Ano lectivo: </strong></td>
                            <td class="text-left" width="25%"><strong><?= $matricula_row->ano_let; ?></strong>
                            </td>
                        </tr>
                        <tr class="highlight">
                            <td class="text-left"><strong><?= $matricula_row->tipo_documento; ?> nº.:</strong></td>
                            <td class="text-left"><strong><?= $matricula_row->num_documento; ?> </strong></td>
                            <td class="text-left"><strong> Classe: </strong></td>
                            <td class="text-left"><strong><?= $matricula_row->nome_classe; ?></strong>
                        </tr>
                        <tr class="highlight">
                            <td class="text-left"><strong>Género: </strong></td>
                            <td class="text-left"><strong><?= $matricula_row->genero_aluno; ?></strong>
                            <td class="text-left"><strong> Turma: </strong></td>
                            <td class="text-left"><strong><?= $matricula_row->nome_turma; ?></strong>
                        </tr>
                        <tr>
                            <td class="text-left"><strong>Aluno Nº.:</strong></td>
                            <td class="text-left"><strong><?= $matricula_row->num_processo; ?></strong></td>
                            <td class="text-left"><strong> Periodo: </strong></td>
                            <td class="text-left"><strong><?= $matricula_row->nome_periodo; ?></strong>
                            </td>
                        </tr>
                        <tr class="highlight">
                            <td class="text-left"><strong> Data de Nascimento: </strong></td>
                            <td class="text-left">
                                <strong><?= date('d/ m/ Y', strtotime($matricula_row->nascimento_aluno)); ?></strong>
                            </td>
                            <td class="text-left"><strong> Sala: </strong></td>
                            <td class="text-left"><strong><?= $matricula_row->numero_sala; ?></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div><!-- end table responsive -->
            <!-------------------------------------------------------------------------------------->
            <span class="pull-right">
                <div class="btn-group btn-group-justified">
                    <a href="<?= site_url('secretaria/aluno/detalhe?id_aluno='.$matricula_select['aluno_id']) ?>"
                        class="btn btn-default m-b-10 p-l-5"><i class="fa fa-user mr-2">
                        </i>PERFIL DO ALUNO</a>
                    <!-- --------------------------------------------------------------------------------------- -->
                    <a href="<?= site_url('secretaria/matricula/detalhe_matricula_pdf?id_matricula='.$matricula_select['id_matricula']) ?>"
                        target="_blank" class="btn btn-default m-b-10 p-l-5">
                        <i class="fa fa-file-pdf text-danger mr-2"></i>GERAR COMPROVATIVO</a>
                </div>
            </span>
            <!-------------------------------------------------------------------------------------->
            <!-- begin table-responsive -->
            <div class="table-responsive">
                <table class="table table-striped text-uppercase table-condensed">
                    <thead class="bg-primary text-center">
                        <tr>
                            <th class="text-light" width="10%"> Nº. </th>
                            <th class="text-light" width="60%"> DISCIPLINAS </th>
                            <th class="text-light" width="30%"> SIGLA </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach ($matricula as $row) { ?>
                        <tr class="highlight">
                            <td class="text-center"> <?= $i; ?> </td>
                            <td class="text-left"> <?= $row->nome_disciplina;  ?> </td>
                            <td class="text-center"> <?= $row->sigla_disciplina; ?> </td>
                        </tr>
                        <?php $i++; } ?>
                    </tbody>
                </table>
            </div><!-- end table responsive -->
            <!-- -------------------------------- -->
            <div class="text-uppercase mt-5">
                <h6><strong>Inserido por: <?= $matricula_row->nome_funcionario; ?></strong></h6>
                <h6>
                    <strong>Data e hora:
                        <?= date('d/m/Y - H:i:s', strtotime($matricula_select['created'])); ?>
                    </strong>
                </h6>
            </div>
            <!-- -------------------------------- -->
        </div><!-- end invoice content -->
    </div>