<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <!-- begin page-header -->
    <h4 class="page-header"><i class="fa fa-list mr-5"></i>LISTAR DISCIPLINAS</h4>
    <?= $this->session->flashdata('msg'); ?>
    <!-- end invoice-company -->
    <div class="invoice-content">
        <table id="data-table-default" class="table table-striped table-hover table-condensed text-uppercase">
            <thead class="bg-primary">
                <tr>
                    <th class="text-center text-light" width="25%">Disciplinas</th>
                    <th class="text-center text-light" width="10%">Sigla</th>
                    <th class="text-center text-light" width="15%">Classe</th>
                    <th class="text-center text-light" ></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($disciplina as $disc) : ?>
                <tr class="odd gradeX">
                    <td class="align-middle "><?= $disc ['nome_disciplina'] ?></td>
                    <td class="align-middle text-center"><?= $disc ['sigla_disciplina'] ?></td>
                    <td class="align-middle text-center"><?= $disc ['nome_classe'] ?></td>
                    <td class="align-middle text-right">
                        <a href="<?= site_url('secretaria/disciplina/editar/'.$disc ['id_disciplina']); ?>"
                            onclick="return confirm('Deseja editar esta disciplina');"
                            class="btn btn-primary btn-sm"><i class="fa fa-edit mr-3"></i>Alterar</a>
                        <!-- <a href="<?= site_url('secretaria/disciplina/apagar/'.$disc ['id_disciplina']); ?>"
                            onclick="return confirm('Deseja apagar esta disciplina');"
                            class="btn btn-danger btn-xs">Apagar</a> -->
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>