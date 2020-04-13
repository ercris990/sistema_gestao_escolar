<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <h5 class="page-header"><i class="fa fa-user mr-5"></i>PERFIL DO FUNCIONÁRIO</h5>
    <?= $this->session->flashdata('msg'); ?>
    <!-- begin invoice -->
    <div class="mt-5">
        <!-- INICIO DADOS DO ALUNO -->
        <div class="tab-pane " id="profile-about">
            <!-- begin table -->
            <div class="table-responsive">
                <table class="table table-striped table-condensed text-uppercase align-middle">
                    <tbody>
                        <tr class="highlight">
                            <td class="text-right" width="10%" rowspan="4">
                                <!-- ----------------------------------------- -->
                                <div id="photo_pfl" class="img-fluid img-thumbnail img-responsive">
                                    <img src=" <?= base_url("_assets/upload/".$funcionario['photo']); ?>">
                                </div>
                            </td>
                            <td class="text-right" width="15%"><strong>Nome:</strong></td>
                            <td class="text-left" width="35%">
                                <strong><?=$funcionario['nome_funcionario']?></strong></td>
                            <td class="text-right" width="20%"><strong>Data de Nascimento: </strong></td>
                            <td class="text-left" width="30%">
                                <strong><?= date('d/ m/ Y', strtotime($funcionario['nascimento_funcionario'])); ?></strong>
                            </td>
                        </tr>
                        <tr class="highlight">
                            <td class="text-right"><strong>Género</strong></td>
                            <td class="text-left"><strong><?=$funcionario['genero_funcionario']?></strong></td>
                            <td class="text-right"><strong>Nº B.I:</strong></td>
                            <td class="text-left"><strong><?=$funcionario['bi_funcionario']?></strong></td>
                        </tr>
                        <tr class="highlight">
                            <td class="text-right"><strong>Morada</strong></td>
                            <td class="text-left"><strong><?=$funcionario['endereco_funcionario']?></strong></td>
                            <td class="text-right"><strong>Telemóvel</strong></td>
                            <td class="text-left"><strong><?=$funcionario['telemovel_funcionario']?></strong></td>
                        </tr>
                        <tr class="highlight">
                            <td class="text-right"><strong>E-Mail</strong></td>
                            <td class="text-left"><strong><?=$funcionario['email_funcionario']?></strong></td>
                            <td class="text-right"><strong>Nome de Utilizador</strong></td>
                            <td class="text-left"><strong><?=$funcionario['nome_user']?></strong></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="text-right" colspan="5">
                                <a href="#modal-password" data-toggle="modal" class="btn btn-secondary m-b-10 p-l-5">
                                    <i class="fa fa-lock t-plus-1 fa-fw fa-lg"></i>
                                    ALTERAR PALAVRA PASSE
                                </a>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div><!-- end table -->
        </div><!-- end container -->
    </div>

    <!-- --------------------------------------------------------------------------------------------------------------------------- -->
    <!-- begin nav-pills -->
    <ul class="nav nav-pills">
        <li class="nav-items">
            <a href="#solicitacao_ferias" data-toggle="tab" class="nav-link active">
                <span class="d-sm-none">Pills 1</span>
                <span class="d-sm-block d-none"><i class="fa fa-list mr-2"></i>SOLICITAÇÃO DE FÉRIAS</span>
            </a>
        </li>
        <!-- <li class="nav-items">
            <a href="#encarregados" data-toggle="tab" class="nav-link ">
                <span class="d-sm-none">Pills 1</span>
                <span class="d-sm-block d-none"><i class="fa fa-list mr-2"></i>LISTAR ENCARREGADOS</span>
            </a>
        </li> -->
        <!-- ------------------------------------------------------------------------------------------------ -->
    </ul>
    <!-- end nav-pills -->
    <!-- begin tab-content -->
    <div class="tab-content">
        <!-- begin tab-pane -->
        <div class="tab-pane fade active show" id="solicitacao_ferias">
            <!------------------ SOLICITACAO DE FERIAS ------------------>
            <div class="row ">
                <div class="col-12">
                    <form action="<?= site_url('rh/funcionario/solicitacao_ferias_pdf')?>" method="POST"
                        class="form-inline" id="form_listagem">
                        <input type="hidden" name="id_funcionario" value="<?=$funcionario['id_funcionario']?>">
                        <!-- DATA DE INICIO -->
                        <div class="form-group col-5">
                            <label for="data-inicio" class="mr-2">DATA DE INÍCIO:</label>
                            <input type="date" name="data_inicio" id="input" class="form-control border-primary col-9"
                                value="" required="required" title="">
                        </div>
                        <!-- DATA DE FIM -->
                        <div class="form-group col-5">
                            <label for="data-fim" class="mr-2">DATA DE FIM:</label>
                            <input type="date" name="data_fim" id="input" class="form-control border-primary col-9"
                                value="" required="required" title="">
                        </div>
                        <div class="form-group col-2">
                            <button type="submit" class="btn btn-block btn-white m-r-5">
                                <i class="fa fa-file-pdf text-danger mr-2"></i>GERAR PEDIDO
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div><!-- end tab-content -->
        <!-- -------------------------------------------------------------------------- -->
        <div class="tab-pane fade" id="encarregados">
            <!------------------ ENCARREGADO DE EDUCACAO ------------------>

        </div><!-- end tab-content -->
    </div><!-- end tab-content -->