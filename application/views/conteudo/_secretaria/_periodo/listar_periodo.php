<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <h4 class="page-header text-uppercase"><i class="fa fa-list mr-5"></i>Períodos</h4>
    <?= $this->session->flashdata('msg'); ?>
    <div class="mt-5">
        <div class="invoice-content">
            <!-- begin table-responsive -->
            <div class="table-responsive">
                <table id="data-table-default" class="table table-striped table-hover table-condensed text-uppercase">
                    <thead class="bg-primary">
                        <tr>
                            <th class="text-light text-center">Período</th>
                            <th class="text-light text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($periodo as $prd) : ?>
                        <tr class="odd gradeX">
                            <td class="text-center align-middle"><?= $prd ['nome_periodo'] ?></td>
                            <td class="text-right">
                                <a href="<?= site_url('secretaria/periodo/editar/'.$prd ['id_periodo']); ?>"
                                    onclick="return confirm('Deseja editar esta periodo');"
                                    class="btn btn-primary"><i class="fa fa-edit mr-3"></i>Editar</a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>