<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <!--    BOTOES TOP     -->
    <div class="row">
        <div class="col-2">
            <a class="btn btn-white mb-3" href="<?php echo site_url('home')?>"><i
                    class="fa fa-user-home mr-2"></i>Página Inicial</a>
        </div>
    </div>
    <?= $this->session->flashdata('msg'); ?>
    <!--    FIM BOTOES TOP    -->
    <!-- end page-header -->
    <!------------------------ conteudo ------------------------>
    <!-- begin invoice -->
    <div class="invoice">
        <!-- begin invoice-company -->
        <div class="invoice-company text-center ">
            <strong>LISTA DE ALUNOS POR DISCIPLINAS</strong>
        </div>
        <!-- end invoice-company -->
        <div class="invoice-content">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <!-- <thead>
                        <tr>
                            <th class="text-center" width="25%">Ano Lectivo: <span
                                    class="text-primary"><?= $listagem_alunos->ano_let; ?> </span></th>
                            <th class="text-center" width="25%">Turma: <span
                                    class="text-primary"><?= $listagem_alunos->nome_turma; ?> </span></th>
                            <th class="text-center" width="25%">Classe: <span
                                    class="text-primary"><?= $listagem_alunos->nome_classe; ?> </span></th>
                            <th class="text-center" width="25%">Periodo: <span
                                    class="text-primary"><?= $listagem_alunos->nome_periodo; ?></span></th>
                        </tr>
                    </thead> -->
            </div>
        </div>
        <!-- begin table-responsive -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover ">
                <thead>
                    <tr>
                        <th rowspan="2" class="text-center">Nº.</th>
                        <th rowspan="2" class="text-center">NOME DO ALUNO</th>
                        <th colspan="3" class="text-center">DISCIPLINA </th>
                    </tr>
                    <tr>
                        <th>CAP</th>
                        <th>CPE</th>
                        <th>CF</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach ($alunos as $aluno) : ?>
                    <tr class="odd gradeX">
                        <td> <?= $i; ?> </td>
                        <td> <?= $aluno->nome; ?> </td>
                        <td> <?= $aluno->cap_1; ?></td>
                        <td> <?= $aluno->cpe_1; ?></td>
                        <td> <?= $aluno->cf_1; ?></td>
                    </tr>
                    <?php $i++; endforeach ?>
                </tbody>
            </table>
        </div><!-- end table-responsive -->
    </div><!-- end invoice-content -->
</div><!-- end invoice -->