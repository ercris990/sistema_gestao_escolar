<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <h4 class="page-header text-uppercase"><i class="fa fa-users mr-5"></i>Professor (a):
        <span class="text-primary"><?= $prof->nome_funcionario; ?></span>
    </h4>
    <?= $this->session->flashdata('msg'); ?>
    <!-- end page-header -->
    <!------------------------ conteudo ------------------------>
    <div class="">
        <!-- begin table-responsive -->
        <div class="table-responsive">
            <table class="table table-striped text-uppercase">
                <thead class="bg-primary">
                    <tr>
                        <th class="text-center text-light" width="10%">ANO LECTIVO</th>
                        <th class="text-center text-light" width="10%">TURMA</th>
                        <th class="text-center text-light" width="10%">CLASSE</th>
                        <th class="text-center text-light" width="10%">SALA</th>
                        <th class="text-center text-light" width="10%">PERIODO</th>
                        <th class="text-center text-light" width=""></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($prof_turma as $linha) { ?>
                    <tr>
                        <td class="text-center align-middle"><b><?= $linha->ano_let;      ?></b></td>
                        <td class="text-center align-middle"><b><?= $linha->nome_turma;   ?></b></td>
                        <td class="text-center align-middle"><b><?= $linha->nome_classe;  ?></b></td>
                        <td class="text-center align-middle"><b><?= $linha->numero_sala;  ?></b></td>
                        <td class="text-center align-middle"><b><?= $linha->nome_periodo; ?></b></td>
                        <td class="text-right  align-middle">
                            <!-- begin dropdown -->
                            <div class="btn-group">
                                <a href="#" class="btn btn-sm btn-primary"><i class="fa fa-cog mr-2"></i>Opções</a>
                                <a href="#" class="btn btn-sm btn-outline-primary dropdown-toggle"
                                    data-toggle="dropdown"></a>
                                <ul class="dropdown-menu pull-left">
                                    <li>
                                        <a
                                            href="<?= site_url('secretaria/listagem/pauta_geral/'.$linha->id_ano.'/'.$linha->id_turma.'/'.$linha->id_classe.'/'.$prof->id_funcionario) ?>">
                                            <i class="fa fa-list mr-2"></i>Pauta Geral</a>
                                    </li>
                                    <li>
                                        <a
                                            href="<?= site_url('secretaria/listagem/listar_turma/'.$linha->id_ano.'/'.$linha->id_turma.'/'.$prof->id_funcionario) ?>">
                                            <i class="fa fa-list mr-2"></i>Lista Nominal</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- end dropdown -->
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div><!-- end table responsive -->
    </div>