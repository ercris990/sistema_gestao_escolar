<!--		INICIO CONTEUDO		-->
<div id="content" class="content">
    <h6 class="page-header"><i class="fa fa-list mr-5"></i>TURMAS</h6>
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
                    <th class="text-center text-light"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($prof_turma as $linha) { ?>
                <tr>
                    <td class="text-center align-middle"><?= $linha->ano_let;     ?></td>
                    <td class="text-center align-middle"><?= $linha->nome_turma;  ?></td>
                    <td class="text-center align-middle"><?= $linha->nome_classe; ?></td>
                    <td class="text-right">
                        <!-- begin dropdown -->
                        <div class="btn-group">
                            <a href="#" class="btn btn-sm btn-dark"><i class="fa fa-list mr-2"></i>Lista e Pauta</a>
                            <a href="#" class="btn btn-sm btn-outline-dark dropdown-toggle" data-toggle="dropdown"></a>
                            <ul class="dropdown-menu pull-left">
                                <li><a
                                        href="<?= site_url('secretaria/listagem/listar_turma_docente_coordenador/'.$linha->id_ano.'/'.$linha->id_turma )?>">
                                        <i class="fa fa-list mr-2"></i>Lista Nominal</a></li>
                                <li><a
                                        href="<?= site_url('secretaria/listagem/pauta_geral/'.$linha->id_ano.'/'.$linha->id_turma.'/'.$linha->id_classe.'/'.$prof->id_funcionario) ?>">
                                        <i class="fa fa-list mr-2"></i>Pauta Geral</a></li>
                            </ul>
                        </div><!-- end dropdown -->
                        <!-- begin dropdown -->
                        <div class="btn-group">
                            <a href="#" class="btn btn-sm btn-primary"><i class="fa fa-check mr-2"></i>Faltas e
                                Avaliações</a>
                            <a href="#" class="btn btn-sm btn-outline-primary dropdown-toggle"
                                data-toggle="dropdown"></a>
                            <ul class="dropdown-menu pull-left">
                                <li><a
                                        href="<?= site_url('secretaria/listagem/listar_assiduidade_turma_coordenador/'.$linha->id_ano.'/'.$linha->id_turma )?>">
                                        <i class="fa fa-check mr-2"></i>Marcar Falta</a></li>
                                <li><a
                                        href="<?= site_url('secretaria/listagem/listar_disciplinas_coordenador/'.$linha->id_ano.'/'.$linha->id_turma.'/'.$linha->id_classe)?>">
                                        <i class="fa fa-plus mr-2"></i>Avaliações</a></li>
                            </ul>
                        </div><!-- end dropdown -->
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div><!-- end table responsive -->