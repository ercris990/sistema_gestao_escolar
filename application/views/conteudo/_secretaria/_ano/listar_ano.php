<div id="content" class="content">
    <!-- begin page-header -->
    <h4 class="page-header text-uppercase"><i class="fa fa-list mr-5"></i>Listar Anos Lectivos</h4>
    <?= $this->session->flashdata('msg'); ?>
    <!-- end page-header -->

    <!-- INICIO PAINEL TABELAS -->
    <div class="">
        <div class="table-responsive">
            <table id="data-table-default" class="table table-striped table-hover table-condensed text-uppercase">
                <thead class="bg-primary">
                    <tr>
                        <th class="text-light text-center">Ano Lectivo</th>
                        <th class="text-light"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($anolectivo as $ano) : ?>
                    <tr class="odd gradeX">
                        <td class="text-center align-middle"><?= $ano ['ano_let'] ?></td>
                        <td class="text-right">
                            <a href="<?= site_url('secretaria/anolectivo/editar/'.$ano ['id_ano']); ?>"
                                onclick="return confirm('Deseja editar este ano lectivo');"
                                class="btn btn-secondary btn-sm"><i class="fa fa-edit mr-3"></i>Editar</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>