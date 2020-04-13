<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <h4 class="page-header"><i class="fa fa-list mr-5"></i>LISTAR TURMAS</h4>
    <?= $this->session->flashdata('msg'); ?>
    <!-- end page-header -->
    <!------------------------ conteudo ------------------------>
    <!-- begin invoice -->
    <div class="my-5">
        <!-- begin table-responsive -->
        <div class="table-responsive">
            <table id="data-table-default" class="table table-striped table-hover table-condensed text-uppercase">
                <thead class="bg-primary">
                    <tr>
                        <th class="text-center text-light">TURMA</th>
                        <th class="text-center text-light">SALA</th>
                        <th class="text-center text-light">PERIODO</th>
                        <th class="text-center text-light">CLASSE</th>
                        <th class="text-center text-light"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($turma as $trm) : ?>
                    <tr class="odd gradeX">
                        <td class="text-center"><?= $trm['nome_turma'] ?></td>
                        <td class="text-center"><?= $trm['numero_sala'] ?></td>
                        <td class="text-center"><?= $trm['nome_periodo'] ?></td>
                        <td class="text-center"><?= $trm['nome_classe'] ?></td>
                        <td class="text-right">
                            <a href="<?= site_url('secretaria/turma/editar/'.$trm['id_turma']); ?>"
                                onclick="return confirm('Deseja editar esta turma');"
                                class="btn btn-info btn-sm"><i class="fa fa-edit mr-3"></i>Editar</a>
                            <!-- <a href="<?= site_url('secretaria/turma/apagar/'.$trm['id_turma']); ?>"
                                onclick="return confirm('Deseja apagar esta turma');"
                                class="btn btn-danger btn-xs">Apagar</a> -->
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div><!-- end col-5 -->
    </div><!-- end invoice content -->