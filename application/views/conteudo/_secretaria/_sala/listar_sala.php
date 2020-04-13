<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <h4 class="page-header"><i class="fa fa-list mr-5"></i>LISTAR SALAS</h4>
    <?= $this->session->flashdata('msg'); ?>
    <div class="mt-5">
        <div class="invoice-content">
            <!-- begin table-responsive -->
            <div class="table-responsive">
                <table id="data-table-default" class="table table-striped table-hover table-condensed">
                    <thead class="bg-primary">
                        <tr>
                            <th class="text-center text-light">Nº DA SALA</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sala as $sl) : ?>
                        <tr>
                            <td class="text-center"><?= $sl['numero_sala'] ?></td>
                            <td class="text-right">
                                <a href="<?= site_url('secretaria/sala/editar/'.$sl['id_sala']); ?>"
                                    onclick="return confirm('Deseja editar esta sala');" class="btn btn-info btn-sm"><i
                                        class="fa fa-edit mr-2"></i>Editar</a>
                                <!-- <a href="<?= site_url('secretaria/sala/apagar/'.$sl['id_sala']); ?>"
                                onclick="return confirm('Deseja apagar esta sala');"
                                class="btn btn-danger btn-xs"><i class="fa fa-trash mr-2"></i>Apagar</a> -->
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div><!-- end col-5 -->
        </div><!-- end invoice content -->
    </div><!-- end invoice content -->