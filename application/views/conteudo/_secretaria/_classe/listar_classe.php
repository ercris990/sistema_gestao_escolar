<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <h4 class="page-header"><i class="fa fa-list mr-5"></i>TURMAS</h4>
    <?= $this->session->flashdata('msg'); ?>
    <div class="mt-5">
        <div class="invoice-content">
            <!-- begin table-responsive -->
            <div class="table-responsive">
                <table id="data-table-default" class="table table-striped table-hover table-condensed text-uppercase">
                    <thead class="bg-primary">
                        <tr>
                            <th class="text-light text-center">Classes</th>
                            <th class="text-light text-center">Nível</th>
                            <th class="text-light text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($classe as $cls) : ?>
                        <tr class="odd gradeX">
                            <td class="text-center"><?= $cls['nome_classe'] ?></td>
                            <td class="text-center"><?= $cls['nivel'] ?></td>
                            <td class="text-right">
                                <a href="<?= site_url('secretaria/classe/editar/'.$cls['id_classe']); ?>"
                                    onclick="return confirm('Deseja editar esta classe');"
                                    class="btn btn-primary btn-sm"><i class="fa fa-edit mr-3"></i>Editar</a>
                                <!-- <a href="<?= site_url('secretaria/classe/apagar/'.$cls['id_classe']); ?>"
                                    onclick="return confirm('Deseja apagar esta classe');"
                                    class="btn btn-danger btn-xs">Apagar</a> -->
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div><!-- FIM TABELA -->
    </div><!-- FIM PAINEL TABELA -->