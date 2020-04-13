<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <h4 class="page-header"><i class="fa fa-list mr-5"></i>TURMAS</h4>
    <?= $this->session->flashdata('msg'); ?>
    <div class="mt-5">
        <div class="invoice-content">
            <!-- begin table-responsive -->
            <div class="table-responsive">
                <table id="data-table-default" class="table table-striped table-hover table-condensed">
                    <thead class="bg-primary">
                        <tr>
                            <th class="text-center text-light">TURMA</th>
                            <th class="text-center text-light">CLASSE</th>
                            <th class="text-center text-light">PERIODO</th>
                            <th class="text-center text-light">SALA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($turmas as $turma) : ?>
                        <tr class="odd gradeX">
                            <td class="text-center"><?= $turma->nome_turma; ?></td>
                            <td class="text-center"><?= $turma->nome_classe; ?></td>
                            <td class="text-center"><?= $turma->nome_periodo; ?></td>
                            <td class="text-center"><?= $turma->numero_sala; ?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div><!-- end col-5 -->
        </div><!-- end invoice content -->
    </div><!-- end invoice -->