<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <h4 class="page-header text-primary"><i class="fa fa-users mr-5"></i>PROFESSORES</h4>
    <?= $this->session->flashdata('msg'); ?>
    <!-- end page-header -->
    <!------------------------ conteudo ------------------------>
    <!-- begin table-responsive -->
    <div class="table-responsive mt-5">
        <table id="data-table-default" class="table table-striped table-hover table-condensed text-uppercase">
            <thead class="bg-primary">
                <tr>
                    <th class="text-nowrap text-light text-center" width="5%">Nº</th>
                    <th class="text-nowrap text-light text-left" width="20%">NOME DO PROFESSOR</th>
                    <th class="text-nowrap text-light text-center" width="10%">GÉNERO</th>
                    <th class="text-nowrap text-light text-center" width="55%"></th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; foreach ($professores as $prof) : ?>
                <tr>
                    <td class="align-middle text-center"><?= $i; ?> </td>
                    <td class="align-middle text-left"><?= $prof->nome_funcionario; ?></td>
                    <td class="align-middle text-center"><?= $prof->genero_funcionario; ?></td>
                    <td class="align-middle text-right">
                        <a href="<?= site_url('secretaria/professor/turmas_professor/'.$prof->id_funcionario ) ?>"
                            class="btn btn-primary btn-sm">Ver Turmas<i class="fa fa-arrow-right ml-2"></i></a>
                    </td>
                </tr>
                <?php $i++; endforeach ?>
            </tbody>
        </table>
    </div><!-- end table responsive -->