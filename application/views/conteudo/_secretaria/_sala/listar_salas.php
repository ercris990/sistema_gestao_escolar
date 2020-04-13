<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <h4 class="page-header"><i class="fa fa-list mr-5"></i>LISTAR SALAS</h4>
    <?= $this->session->flashdata('msg'); ?>
    <div class="mt-5">
        <div class="invoice-content">
            <!-- begin table-responsive -->
            <div class="table-responsive">
                <table id="data-table-default" class="table table-striped table-hover table-condensed text-uppercase">
                    <thead class="bg-primary">
                        <tr>
                            <th class="text-primary">.</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sala as $sl) : ?>
                        <tr>
                            <td class="text-left align-middle">Sala - <?= $sl['numero_sala'] ?></td>
                            <td class="text-right">
                                <a href="<?= site_url('secretaria/sala/ver_turmas/'.$sl['id_sala']); ?>"
                                    class="btn btn-outline-secondary btn-sm"><i class="fa fa-search mr-2"></i>Ver Turmas</a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div><!-- end col-5 -->
        </div><!-- end invoice content -->
    </div><!-- end invoice content -->