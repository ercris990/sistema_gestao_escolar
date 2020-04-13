<!--		INICIO CONTEUDO		-->
<div id="content" class="content">
    <h6 class="page-header"><i class="fa fa-briefcase mr-5"></i>PÁGINA INICIAL - DOCENTE</h6>
    <?= $this->session->flashdata('msg'); ?>
    <!---------------------------------------------------------------------------------------->
    <!-- begin table-responsive -->
    <div class="table-responsive">
        <table class="table table-striped table-hover text-uppercase">
            <thead class="badge-primary">
                <tr>
                    <th class="text-center text-light" width="10%">ANO LECTIVO</th>
                    <th class="text-center text-light" width="10%">TURMA</th>
                    <th class="text-center text-light" width="10%">CLASSE</th>
                    <th class="text-center text-light" width="10%">SALA</th>
                    <th class="text-center text-light" width="10%">PERÍODO</th>
                    <th class="text-center text-light"></th>
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
                    <td class="text-right">
                        <!-- begin dropdown -->
                        <div class="btn-group">
                            <a href="#" class="btn btn-sm btn-primary"><i class="fa fa-cog mr-2"></i>Opções</a>
                            <a href="#" class="btn btn-sm btn-outline-primary dropdown-toggle"
                                data-toggle="dropdown"></a>
                            <ul class="dropdown-menu pull-left">
                                <li><a
                                        href="<?= site_url('secretaria/listagem/listar_turma_docente/'.$linha->id_ano.'/'.$linha->id_turma )?>">
                                        <i class="fa fa-list mr-2"></i>Lista Nominal</a></li>
                                <li><a
                                        href="<?= site_url('secretaria/listagem/listar_assiduidade_turma/'.$linha->id_ano.'/'.$linha->id_turma )?>">
                                        <i class="fa fa-check mr-2"></i>Marcar Falta</a></li>
                                <li><a
                                        href="<?= site_url('secretaria/listagem/listar_disciplinas/'.$linha->id_ano.'/'.$linha->id_turma.'/'.$linha->id_classe)?>">
                                        <i class="fa fa-plus mr-2"></i>Avaliações</a></li>
                            </ul>
                        </div>
                        <!-- end dropdown -->
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div><!-- end table responsive -->