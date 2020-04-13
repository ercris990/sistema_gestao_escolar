<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <h4 class="page-header text-uppercase"><i class="fa fa-user mr-5"></i>PROFESSOR (A): <span
            class="text-primary"><?= $prof->nome_funcionario; ?></span> </h4>
    <?= $this->session->flashdata('msg'); ?>
    <!-- end page-header -->
    <!------------------------ conteudo ------------------------>
    <div class="">
        <!-- begin table-responsive -->
        <div class="table-responsive">
            <table class="table table-striped text-uppercase">
                <thead class="bg-primary">
                    <tr>
                        <th class="text-center text-light" width="15%">ANO LECTIVO</th>
                        <th class="text-center text-light" width="15%">TURMA</th>
                        <th class="text-center text-light" width="15%">CLASSE</th>
                        <th class="text-center text-light" width="15%">SALA</th>
                        <th class="text-center text-light" width="15%">PERIODO</th>
                        <th class="text-center text-light" width=""></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($prof_turma as $linha) { ?>
                    <tr>
                        <td class="text-center align-middle"> <?= $linha->ano_let;      ?></td>
                        <td class="text-center align-middle"> <?= $linha->nome_turma;   ?></td>
                        <td class="text-center align-middle"> <?= $linha->nome_classe;  ?></td>
                        <td class="text-center align-middle"> <?= $linha->numero_sala;  ?></td>
                        <td class="text-center align-middle"> <?= $linha->nome_periodo; ?></td>
                        <td class="text-right  align-middle">
                            <!---------------------------------------------------------------------------------------->
                            <a href="<?= site_url('secretaria/listagem/listar_turma_secretaria/'.$linha->id_ano.'/'.$linha->id_turma.'/'.$prof->id_funcionario) ?>"
                                class="btn btn-primary btn-sm">Ver Lista<i class="fa fa-search ml-2"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div><!-- end table responsive -->
    </div>