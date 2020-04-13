<!--		INICIO CONTEUDO		-->
<div id="content" class="content">
    <!---------------------------------------------------------------------------------------->
    <!-- TITULO CONTEUDO -->
    <h5 class="page-header"><i class="fa fa-user mr-2"></i>PERFIL DO ALUNO</h5>
    <?= $this->session->flashdata('msg'); ?>
    <div>
        <!-- INICIO DADOS DO ALUNO -->
        <div class="tab-pane " id="profile-about">
            <!-- begin table -->
            <div class="table-responsive">
                <table class="table table-hover table-striped text-uppercase table-condensed">
                    <tbody>
                        <tr class="highlight">
                            <td class="text-center align-middle" width="10%" rowspan="5">
                                <div id="photo_pfl" class="img-fluid img-responsive ">
                                    <img src=" <?= base_url("_assets/upload/".$aluno["photo"]); ?>">
                                </div>
                            </td>
                            <td class="text-left" width="16%"><strong>Nome: </strong></td>
                            <td class="text-left"><strong><?= $aluno['nome'] ?></strong></td>
                            <td class="text-left" width="20%"><strong>Género: </strong></td>
                            <td class="text-left"><strong><?= $aluno['genero_aluno'] ?></strong></td>
                        </tr>
                        <tr class="highlight">
                            <td class="text-left">
                                <strong><?= $aluno['tipo_documento']?> nº.:</strong></td>
                            <td class="text-left "><strong><?= $aluno['num_documento']?> </strong></td>
                            <td class="text-left"><strong>Aluno nº.:</strong></td>
                            <td class="text-left text-red"><strong><?= $aluno['num_processo']?></strong></td>
                        </tr>
                        <tr class="highlight">
                            <td class="text-left"><strong> Data de Nascimento: </strong></td>
                            <td class="text-left ">
                                <strong><?= date('d/m/Y', strtotime($aluno['nascimento_aluno'])); ?></strong></td>
                            <td class="text-left"><strong> Telemóvel: </strong></td>
                            <td class="text-left "><strong> <?= $aluno['contacto_aluno']?></strong></td>
                        </tr>
                        <tr class="highlight">
                            <td class="text-left"><strong> Pai: </strong></td>
                            <td class="text-left "><strong> <?= $aluno['nome_pai']?></strong></td>
                            <td class="text-left"><strong> Mãe: </strong></td>
                            <td class="text-left "><strong> <?= $aluno['nome_mae']?></strong></td>
                        </tr>
                        <tr>
                            <td class="text-left"><strong> Morada: </strong></td>
                            <td class="text-left" colspan="3">
                                <strong>
                                    <?= $aluno['endereco_aluno']?>
                                </strong>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="5">
                                <span class="pull-right">
                                    <div class="btn-group btn-group-justified">
                                        <a href="#modal-num-processo" data-toggle="modal"
                                            class="btn btn-sm btn-default m-b-10 p-l-5">
                                            <i class="fa fa-plus mr-2"></i>ADICIONAR Nº DE PROCESSO
                                        </a>
                                        <!------------------------------------------------------------------------------------------>
                                        <a href="#modal-matricula" data-toggle="modal"
                                            class="btn btn-sm btn-default m-b-10 p-l-5">
                                            <i class="fa fa-plus mr-2"></i>REALIZAR MATRICULA
                                        </a>
                                        <!------------------------------------------------------------------------------------------>
                                        <a href="#modal-encarregados" data-toggle="modal"
                                            class="btn btn-sm btn-default m-b-10 p-l-5">
                                            <i class="fa fa-user-plus mr-2"></i>ADICIONAR ENCARREGADO
                                        </a>
                                    </div>
                                </span>
                                <span class="pull-left">
                                    <!-- begin dropdown -->
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-sm btn-dark"><i class="fa fa-edit mr-2"></i>
                                            ALTERAR INFORMAÇÕES</a>
                                        <a href="#" class="btn btn-sm btn-outline-dark dropdown-toggle"
                                            data-toggle="dropdown"></a>
                                        <ul class="dropdown-menu pull-none">
                                            <li>
                                                <a
                                                    href="<?= site_url('secretaria/aluno/editar/'.$aluno['id_aluno']) ?>">
                                                    <i class="fa fa-edit mr-2"></i>EDITAR ALUNO
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    href="<?= site_url('secretaria/aluno/carregar_imagem?id_aluno='.$aluno['id_aluno']) ?>">
                                                    <i class="fa fa-camera mr-2"></i>ALTERAR FOTOGRAFIA</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- end dropdown -->
                                    <!------------------------------------------------------------------------------------------>
                                    <!-- <a href="<?= site_url('secretaria/aluno/apagar/'.$aluno['id_aluno']) ?>"
                                        class="btn btn-danger m-b-10 p-l-5">
                                        <i class="fa fa-edit mr-2"></i>EXCLUIR ALUNO
                                    </a> -->
                                </span>
                                <!---------------------------------------------------------------------------->
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div><!-- end tab-pane -->
        </div><!-- end invoice content -->
    </div>
    <div class="">
        <!-- begin nav-pills -->
        <ul class="nav nav-pills my-2">
            <li class="nav-items">
                <a href="#historico_matricula" data-toggle="tab" class="nav-link active">
                    <span class="d-sm-none">Pills 1</span>
                    <span class="d-sm-block d-none"><i class="fa fa-list mr-2"></i>HISTÓRICO DE MATRÍCULAS</span>
                </a>
            </li>
            <li class="nav-items">
                <a href="#encarregados" data-toggle="tab" class="nav-link ">
                    <span class="d-sm-none">Pills 1</span>
                    <span class="d-sm-block d-none"><i class="fa fa-list mr-2"></i>LISTAR ENCARREGADOS</span>
                </a>
            </li>
            <!-- ------------------------------------------------------------------------------------------------ -->
        </ul>
        <!-- end nav-pills -->
        <!-- begin tab-content -->
        <div class="tab-content">
            <!-- begin tab-pane -->
            <div class="tab-pane fade active show" id="historico_matricula">
                <!------------------ HISTÓRICO DE MATRICULAS ------------------>
                <!-- begin table-responsive -->
                <div class="table-responsive">
                    <table class="table table-striped text-uppercase">
                        <thead class="bg-primary">
                            <tr>
                                <th class="text-light text-center" colspan="6">
                                    Histórico de Matrículas
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center text-light text-nowrap" width="10%">ANO LECTIVO</th>
                                <th class="text-center text-light" width="10%">TURMA</th>
                                <th class="text-center text-light" width="10%">CLASSE</th>
                                <th class="text-center text-light" width="10%">SALA</th>
                                <th class="text-center text-light" width="10%">PERIODO</th>
                                <th class="text-center text-light"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($matricula as $linha) { ?>
                            <tr class="highlight">
                                <td class="text-center align-middle text-nowrap"> <?= $linha->ano_let;     ?></td>
                                <td class="text-center align-middle text-nowrap"> <?= $linha->nome_turma;  ?></td>
                                <td class="text-center align-middle text-nowrap"> <?= $linha->nome_classe; ?></td>
                                <td class="text-center align-middle text-nowrap"> <?= $linha->numero_sala; ?></td>
                                <td class="text-center align-middle text-nowrap"> <?= $linha->nome_periodo;?></td>
                                <td class="text-right">
                                    <!-- begin dropdown -->
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-sm btn-primary"><i
                                                class="fa fa-cog mr-2"></i>Opções</a>
                                        <a href="#" class="btn btn-sm btn-outline-primary dropdown-toggle"
                                            data-toggle="dropdown"></a>
                                        <ul class="dropdown-menu pull-left">
                                            <li><a
                                                    href="<?= site_url('secretaria/matricula/detalhe_matricula?id_matricula='.$linha->id_matricula) ?>">
                                                    <i class="fa fa-search mr-2"></i>Detalhes da Matricula</a></li>
                                            <!--------------------------------------------------------------------------------------------------->
                                            <li><a
                                                    href="<?= site_url('secretaria/matricula/caderneta_aluno/'.$linha->id_matricula.'/'.$linha->classe_id).'/'.$this->session->userdata('nivel_acesso') ?>">
                                                    <i class="fa fa-list mr-2"></i>Caderneta <?= $linha->ano_let; ?></a>
                                            </li>
                                            <!--------------------------------------------------------------------------------------------------->
                                            <li><a
                                                    href="<?= site_url('secretaria/matricula/guia_transferencia/'.$linha->id_matricula) ?>">
                                                    <i class="fa fa-file-pdf mr-2"></i>Guia de Tranferência</a></li>
                                            <!--------------------------------------------------------------------------------------------------->
                                            <li><a
                                                    href="<?= site_url('secretaria/matricula/editar/'.$linha->id_matricula) ?>">
                                                    <i class="fa fa-edit mr-2"></i>Alterar Matricula</a></li>
                                            <!--------------------------------------------------------------------------------------------------->
                                            <li><a href="<?= site_url('secretaria/matricula/apagar/'.$linha->id_matricula.'/'.$linha->aluno_id) ?>"
                                                    onclick="return confirm('Deseja excluir este registro?');">
                                                    <i class="fa fa-trash mr-2"></i>Excluir Matricula</a></li>
                                        </ul>
                                    </div>
                                    <!-- end dropdown -->
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div><!-- end table responsive -->
            </div><!-- end tab-content -->
            <!-- -------------------------------------------------------------------------- -->
            <div class="tab-pane fade" id="encarregados">
                <!------------------ ENCARREGADO DE EDUCACAO ------------------>
                <div class="table-responsive">
                    <table class="table table-striped text-uppercase">
                        <thead class="bg-primary">
                            <tr>
                                <th class="text-light text-center" colspan="6">
                                    ENCARREGADOS DE EDUCAÇÃO
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center text-light" width="11%">ANO LECTIVO</th>
                                <th class="text-center text-light" width="20%">NOME DO ENCARREGADO</th>
                                <th class="text-center text-light" width="16%">GRAU DE PARENTESCO</th>
                                <th class="text-center text-light" width="15%">TELEMÓVEL</th>
                                <th class="text-center text-light" width="20%">E-MAIL</th>
                                <th class="text-center text-light"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($encarregados as $linha) { ?>
                            <tr class="highlight">
                                <td class="text-center align-middle"> <?= $linha->ano_let; ?></td>
                                <td class="text-left align-middle"> <?= $linha->nome_encarregado; ?></td>
                                <td class="text-center align-middle"> <?= $linha->parentesco; ?></td>
                                <td class="text-center align-middle"> <?= $linha->telemovel_encarregado; ?></td>
                                <td class="text-left align-middle"> <?= $linha->email_encarregado; ?></td>
                                <td class="text-right align-middle">
                                    <a href="<?= site_url('secretaria/encarregados/editar_encarregado/'.$linha->id_encarregado) ?>"
                                        class="btn btn-sm btn-primary"><i class="fa fa-edit mr-2"></i>Alterar</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div><!-- end table responsive -->
            </div><!-- end tab-content -->
        </div><!-- end tab-content -->
        <!--------------------------------------------------------------------------------------------------------->
        <div class="text-uppercase">
            <h6>
                <strong>Inserido por:
                    <span class="text-primary"><?= $aluno_funcionario->nome_funcionario; ?></span>
                </strong>
            </h6>
            <h6>
                <strong>Data e hora:
                    <span class="text-primary"><?= date('d/m/Y - H:i:s', strtotime($aluno['created'])); ?></span>
                </strong>
            </h6>
        </div>
    </div>