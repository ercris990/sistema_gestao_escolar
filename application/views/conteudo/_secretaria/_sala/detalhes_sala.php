<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <div class="row">
        <div class="col-9">
            <h4 class="page-header"><i class="fa fa-list mr-5"></i>SALA - <?= $sala->numero_sala; ?></h4>
            </h4>
        </div>
        <div class="col-3 text-right">
            <a href="<?= base_url('secretaria/sala/listar_salas') ?>"
                class="btn btn-primary"><i class="fa fa-arrow-left mr-2"></i>PAGINA ANTERIOR</a>
        </div>
    </div>
    <!-- ------------------------ -->
    <?= $this->session->flashdata('msg'); ?>
    <div class="mt-5">
        <div class="invoice-content">
            <!-- begin table-responsive -->
            <div class="table-responsive">
                <table id="data-table-default" class="table table-striped table-hover table-condensed text-uppercase">
                    <thead class="bg-primary">
                        <tr>
                            <th class="text-center text-light">TURMA</th>
                            <th class="text-center text-light">CLASSE</th>
                            <th class="text-center text-light">PERÓODO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($turmas as $trm) : ?>
                        <tr>
                            <td class="text-center align-middle"><?= $trm->nome_turma; ?></td>
                            <td class="text-center align-middle"><?= $trm->nome_classe; ?></td>
                            <td class="text-center align-middle"><?= $trm->nome_periodo; ?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div><!-- end col-5 -->
        </div><!-- end invoice content -->
    </div><!-- end invoice content -->