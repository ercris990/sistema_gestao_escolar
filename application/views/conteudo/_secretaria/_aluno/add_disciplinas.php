<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <?= $this->session->flashdata('msg'); ?>
    <!-- begin tab-content -->
    <div class="tab-content">
        <!-- begin tab-pane -->
        <div class="tab-pane fade active show" id="historico_matricula">
            <!------------------------ HISTÓRICO DE MATRICULAS ------------------------>
            <!-- begin invoice -->
            <div class="invoice">
                <!-- begin invoice-company -->
                <div class="invoice-company text-center mb-3">
                    <strong>ADICIONAR DISCIPLINAS</strong>
                </div>
                <!-- end invoice-company -->
                <div class="invoice-content">
                    <!-- ------------------------------------------------------------------------- -->
                    <!-- begin nav-pills -->
                    <ul class="nav nav-pills my-2">
                        <li class="nav-items">
                            <a href="#nav-pills-tab-1" data-toggle="tab" class="nav-link active">
                                <span class="d-sm-none">Pills 1</span>
                                <span class="d-sm-block d-none">INICIAÇÃO</span>
                            </a>
                        </li>
                        <li class="nav-items">
                            <a href="#nav-pills-tab-2" data-toggle="tab" class="nav-link">
                                <span class="d-sm-none">Pills 2</span>
                                <span class="d-sm-block d-none">1ª CLASSE</span>
                            </a>
                        </li>
                        <li class="nav-items">
                            <a href="#nav-pills-tab-3" data-toggle="tab" class="nav-link">
                                <span class="d-sm-none">Pills 3</span>
                                <span class="d-sm-block d-none">2ª CLASSE</span>
                            </a>
                        </li>
                        <li class="nav-items">
                            <a href="#nav-pills-tab-4" data-toggle="tab" class="nav-link">
                                <span class="d-sm-none">Pills 4</span>
                                <span class="d-sm-block d-none">3ª CLASSE</span>
                            </a>
                        </li>
                        <li class="nav-items">
                            <a href="#nav-pills-tab-5" data-toggle="tab" class="nav-link">
                                <span class="d-sm-none">Pills 5</span>
                                <span class="d-sm-block d-none">4ª CLASSE</span>
                            </a>
                        </li>
                        <li class="nav-items">
                            <a href="#nav-pills-tab-6" data-toggle="tab" class="nav-link">
                                <span class="d-sm-none">Pills 6</span>
                                <span class="d-sm-block d-none">5ª CLASSE</span>
                            </a>
                        </li>
                        <li class="nav-items">
                            <a href="#nav-pills-tab-7" data-toggle="tab" class="nav-link">
                                <span class="d-sm-none">Pills 7</span>
                                <span class="d-sm-block d-none">6ª CLASSE</span>
                            </a>
                        </li>
                        <li class="nav-items">
                            <a href="#nav-pills-tab-8" data-toggle="tab" class="nav-link">
                                <span class="d-sm-none">Pills 8</span>
                                <span class="d-sm-block d-none">7ª CLASSE</span>
                            </a>
                        </li>
                        <li class="nav-items">
                            <a href="#nav-pills-tab-9" data-toggle="tab" class="nav-link">
                                <span class="d-sm-none">Pills 9</span>
                                <span class="d-sm-block d-none">8ª CLASSE</span>
                            </a>
                        </li>
                        <li class="nav-items">
                            <a href="#nav-pills-tab-10" data-toggle="tab" class="nav-link">
                                <span class="d-sm-none">Pills 10</span>
                                <span class="d-sm-block d-none">9ª CLASSE</span>
                            </a>
                        </li>
                    </ul>
                    <!-- end nav-pills -->
                    <!-- begin tab-content -->
                    <div class="tab-content">
                        <!-- begin tab-pane -->
                        <div class="tab-pane fade active show" id="nav-pills-tab-1">
                            <!------------------------------------------------------------>
                            <form action="<?php echo site_url('secretaria/matricula/gurdar_disciplina')?>" method="POST"
                                id="form_disciplina">
                                <fieldset>
                                    <div class="row">
                                        <!-- =================== CAMPOS OCULTOS =================== -->
                                        <input type="text" name="matricula"
                                            value="<?= $matricula_select['id_matricula'] ?>" />
                                        <input type="text" name="aluno" value="<?= $matricula_select['aluno_id'] ?>" />
                                        <input type="text" name="anolectivo"
                                            value="<?= $matricula_select['anolectivo_id'] ?>" />
                                        <input type="text" name="classe"
                                            value="<?= $matricula_select['classe_id'] ?>" />
                                        <input type="text" name="turma" value="<?= $matricula_select['turma_id'] ?>" />
                                        <!-- ========================================================================== -->
                                        <div class="col-12">
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">
                                                            <input type="checkbox" />
                                                        </th>
                                                        <th width="30%">DISCIPLINA</th>
                                                        <th width="20%">SIGLA</th>
                                                        <th width="20%">CLASSE</th>
                                                        <th width="25%">NÍVEL</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; foreach ($disciplinas_0 as $disciplina) : ?>
                                                    <tr class="odd gradeX">
                                                        <td>
                                                            <input type="checkbox" name="id_disciplina[]"
                                                                value="<?= $disciplina->id_disciplina; ?>" />
                                                        </td>
                                                        <td><?= $disciplina->nome_disciplina; ?></td>
                                                        <td><?= $disciplina->sigla_disciplina; ?></td>
                                                        <td><?= $disciplina->nome_classe; ?></td>
                                                        <td><?= $disciplina->nivel; ?></td>
                                                    </tr>
                                                    <?php $i++; endforeach ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="form-group row col-12">
                                            <div class="col-2">
                                                <a href="javascript:;" class="btn btn-danger btn-block">
                                                    <i class="fa fa-arrow-left mr-2"></i>Voltar</a>
                                            </div>
                                            <div class="col-2">
                                                <button type="submit" class="btn btn-white btn-block">
                                                    <i class="fa fa-plus mr-2"></i>Adicionar</button>
                                            </div>
                                        </div><!-- end-buttons -->
                                    </div>
                                    <!-- ========================================================================== -->
                                </fieldset>
                            </form>
                            <!------------------------------------------------------------>
                        </div>
                        <!-- end tab-pane -->
                        <!-- begin tab-pane -->
                        <div class="tab-pane fade" id="nav-pills-tab-2">
                            <!------------------------------------------------------------>
                            <form action="<?php echo site_url('secretaria/matricula/gurdar_disciplina')?>" method="POST"
                                id="form_disciplina">
                                <fieldset>
                                    <div class="row">
                                        <!-- =================== CAMPOS OCULTOS =================== -->
                                        <!-- <input type="text" name="matricula" class="form-control"
                                            value="<?= $matricula_select['id_matricula'] ?>" />
                                        <input type="text" name="aluno" class="form-control"
                                            value="<?= $matricula_select['aluno_id'] ?>" />
                                        <input type="text" name="anolectivo" class="form-control"
                                            value="<?= $matricula_select['anolectivo_id'] ?>" />
                                        <input type="text" name="classe" class="form-control"
                                            value="<?= $matricula_select['classe_id'] ?>" />
                                        <input type="text" name="turma" class="form-control"
                                            value="<?= $matricula_select['turma_id'] ?>" /> -->
                                        <!-- ========================================================================== -->
                                        <div class="col-12">
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">
                                                            <input type="checkbox" />
                                                        </th>
                                                        <th width="30%">DISCIPLINA</th>
                                                        <th width="20%">SIGLA</th>
                                                        <th width="20%">CLASSE</th>
                                                        <th width="25%">NÍVEL</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; foreach ($disciplinas_1 as $disciplina) : ?>
                                                    <tr class="odd gradeX">
                                                        <td>
                                                            <input type="checkbox" name="id_disciplina[]"
                                                                value="<?= $disciplina->id_disciplina; ?>" />
                                                        </td>
                                                        <td><?= $disciplina->nome_disciplina; ?></td>
                                                        <td><?= $disciplina->sigla_disciplina; ?></td>
                                                        <td><?= $disciplina->nome_classe; ?></td>
                                                        <td><?= $disciplina->nivel; ?></td>
                                                    </tr>
                                                    <?php $i++; endforeach ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="form-group row col-12">
                                            <div class="col-2">
                                                <a href="javascript:;" class="btn btn-danger btn-block">
                                                    <i class="fa fa-arrow-left mr-2"></i>Voltar</a>
                                            </div>
                                            <div class="col-2">
                                                <button type="submit" class="btn btn-white btn-block">
                                                    <i class="fa fa-plus mr-2"></i>Adicionar</button>
                                            </div>
                                        </div><!-- end-buttons -->
                                    </div>
                                    <!-- ========================================================================== -->
                                </fieldset>
                            </form>
                            <!------------------------------------------------------------>
                        </div>
                        <!-- end tab-pane -->
                        <!-- begin tab-pane -->
                        <div class="tab-pane fade" id="nav-pills-tab-3">
                            <!------------------------------------------------------------>
                            <form action="<?php echo site_url('secretaria/matricula/gurdar_disciplina')?>" method="POST"
                                id="form_disciplina">
                                <fieldset>
                                    <div class="row">
                                        <!-- =================== CAMPOS OCULTOS =================== -->
                                        <!-- <input type="text" name="matricula" class="form-control"
                                            value="<?= $matricula_select['id_matricula'] ?>" />
                                        <input type="text" name="aluno" class="form-control"
                                            value="<?= $matricula_select['aluno_id'] ?>" />
                                        <input type="text" name="anolectivo" class="form-control"
                                            value="<?= $matricula_select['anolectivo_id'] ?>" />
                                        <input type="text" name="classe" class="form-control"
                                            value="<?= $matricula_select['classe_id'] ?>" />
                                        <input type="text" name="turma" class="form-control"
                                            value="<?= $matricula_select['turma_id'] ?>" /> -->
                                        <!-- ========================================================================== -->
                                        <div class="col-12">
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">
                                                            <input type="checkbox" />
                                                        </th>
                                                        <th width="30%">DISCIPLINA</th>
                                                        <th width="20%">SIGLA</th>
                                                        <th width="20%">CLASSE</th>
                                                        <th width="25%">NÍVEL</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; foreach ($disciplinas_2 as $disciplina) : ?>
                                                    <tr class="odd gradeX">
                                                        <td>
                                                            <input type="checkbox" name="id_disciplina[]"
                                                                value="<?= $disciplina->id_disciplina; ?>" />
                                                        </td>
                                                        <td><?= $disciplina->nome_disciplina; ?></td>
                                                        <td><?= $disciplina->sigla_disciplina; ?></td>
                                                        <td><?= $disciplina->nome_classe; ?></td>
                                                        <td><?= $disciplina->nivel; ?></td>
                                                    </tr>
                                                    <?php $i++; endforeach ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="form-group row col-12">
                                            <div class="col-2">
                                                <a href="javascript:;" class="btn btn-danger btn-block">
                                                    <i class="fa fa-arrow-left mr-2"></i>Voltar</a>
                                            </div>
                                            <div class="col-2">
                                                <button type="submit" class="btn btn-white btn-block">
                                                    <i class="fa fa-plus mr-2"></i>Adicionar</button>
                                            </div>
                                        </div><!-- end-buttons -->
                                    </div>
                                    <!-- ========================================================================== -->
                                </fieldset>
                            </form>
                            <!------------------------------------------------------------>
                        </div>
                        <!-- end tab-pane -->
                        <!-- begin tab-pane -->
                        <div class="tab-pane fade" id="nav-pills-tab-4">
                            <!------------------------------------------------------------>
                            <form action="<?php echo site_url('secretaria/matricula/gurdar_disciplina')?>" method="POST"
                                id="form_disciplina">
                                <fieldset>
                                    <div class="row">
                                        <!-- =================== CAMPOS OCULTOS =================== -->
                                        <!-- <input type="text" name="matricula" class="form-control"
                                            value="<?= $matricula_select['id_matricula'] ?>" />
                                        <input type="text" name="aluno" class="form-control"
                                            value="<?= $matricula_select['aluno_id'] ?>" />
                                        <input type="text" name="anolectivo" class="form-control"
                                            value="<?= $matricula_select['anolectivo_id'] ?>" />
                                        <input type="text" name="classe" class="form-control"
                                            value="<?= $matricula_select['classe_id'] ?>" />
                                        <input type="text" name="turma" class="form-control"
                                            value="<?= $matricula_select['turma_id'] ?>" /> -->
                                        <!-- ========================================================================== -->
                                        <div class="col-12">
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">
                                                            <input type="checkbox" />
                                                        </th>
                                                        <th width="30%">DISCIPLINA</th>
                                                        <th width="20%">SIGLA</th>
                                                        <th width="20%">CLASSE</th>
                                                        <th width="25%">NÍVEL</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; foreach ($disciplinas_3 as $disciplina) : ?>
                                                    <tr class="odd gradeX">
                                                        <td>
                                                            <input type="checkbox" name="id_disciplina[]"
                                                                value="<?= $disciplina->id_disciplina; ?>" />
                                                        </td>
                                                        <td><?= $disciplina->nome_disciplina; ?></td>
                                                        <td><?= $disciplina->sigla_disciplina; ?></td>
                                                        <td><?= $disciplina->nome_classe; ?></td>
                                                        <td><?= $disciplina->nivel; ?></td>
                                                    </tr>
                                                    <?php $i++; endforeach ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="form-group row col-12">
                                            <div class="col-2">
                                                <a href="javascript:;" class="btn btn-danger btn-block">
                                                    <i class="fa fa-arrow-left mr-2"></i>Voltar</a>
                                            </div>
                                            <div class="col-2">
                                                <button type="submit" class="btn btn-white btn-block">
                                                    <i class="fa fa-plus mr-2"></i>Adicionar</button>
                                            </div>
                                        </div><!-- end-buttons -->
                                    </div>
                                    <!-- ========================================================================== -->
                                </fieldset>
                            </form>
                            <!------------------------------------------------------------>
                        </div>
                        <!-- end tab-pane -->
                        <!-- begin tab-pane -->
                        <div class="tab-pane fade" id="nav-pills-tab-5">
                            <!------------------------------------------------------------>
                            <form action="<?php echo site_url('secretaria/matricula/gurdar_disciplina')?>" method="POST"
                                id="form_disciplina">
                                <fieldset>
                                    <div class="row">
                                        <!-- =================== CAMPOS OCULTOS =================== -->
                                        <!-- <input type="text" name="matricula" class="form-control"
                                            value="<?= $matricula_select['id_matricula'] ?>" />
                                        <input type="text" name="aluno" class="form-control"
                                            value="<?= $matricula_select['aluno_id'] ?>" />
                                        <input type="text" name="anolectivo" class="form-control"
                                            value="<?= $matricula_select['anolectivo_id'] ?>" />
                                        <input type="text" name="classe" class="form-control"
                                            value="<?= $matricula_select['classe_id'] ?>" />
                                        <input type="text" name="turma" class="form-control"
                                            value="<?= $matricula_select['turma_id'] ?>" /> -->
                                        <!-- ========================================================================== -->
                                        <div class="col-12">
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">
                                                            <input type="checkbox" />
                                                        </th>
                                                        <th width="30%">DISCIPLINA</th>
                                                        <th width="20%">SIGLA</th>
                                                        <th width="20%">CLASSE</th>
                                                        <th width="25%">NÍVEL</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; foreach ($disciplinas_4 as $disciplina) : ?>
                                                    <tr class="odd gradeX">
                                                        <td>
                                                            <input type="checkbox" name="id_disciplina[]"
                                                                value="<?= $disciplina->id_disciplina; ?>" />
                                                        </td>
                                                        <td><?= $disciplina->nome_disciplina; ?></td>
                                                        <td><?= $disciplina->sigla_disciplina; ?></td>
                                                        <td><?= $disciplina->nome_classe; ?></td>
                                                        <td><?= $disciplina->nivel; ?></td>
                                                    </tr>
                                                    <?php $i++; endforeach ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="form-group row col-12">
                                            <div class="col-2">
                                                <a href="javascript:;" class="btn btn-danger btn-block">
                                                    <i class="fa fa-arrow-left mr-2"></i>Voltar</a>
                                            </div>
                                            <div class="col-2">
                                                <button type="submit" class="btn btn-white btn-block">
                                                    <i class="fa fa-plus mr-2"></i>Adicionar</button>
                                            </div>
                                        </div><!-- end-buttons -->
                                    </div>
                                    <!-- ========================================================================== -->
                                </fieldset>
                            </form>
                            <!------------------------------------------------------------>
                        </div>
                        <!-- end tab-pane -->
                        <!-- begin tab-pane -->
                        <div class="tab-pane fade" id="nav-pills-tab-6">
                            <!------------------------------------------------------------>
                            <form action="<?php echo site_url('secretaria/matricula/gurdar_disciplina')?>" method="POST"
                                id="form_disciplina">
                                <fieldset>
                                    <div class="row">
                                        <!-- =================== CAMPOS OCULTOS =================== -->
                                        <!-- <input type="text" name="matricula" class="form-control"
                                            value="<?= $matricula_select['id_matricula'] ?>" />
                                        <input type="text" name="aluno" class="form-control"
                                            value="<?= $matricula_select['aluno_id'] ?>" />
                                        <input type="text" name="anolectivo" class="form-control"
                                            value="<?= $matricula_select['anolectivo_id'] ?>" />
                                        <input type="text" name="classe" class="form-control"
                                            value="<?= $matricula_select['classe_id'] ?>" />
                                        <input type="text" name="turma" class="form-control"
                                            value="<?= $matricula_select['turma_id'] ?>" /> -->
                                        <!-- ========================================================================== -->
                                        <div class="col-12">
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">
                                                            <input type="checkbox" />
                                                        </th>
                                                        <th width="30%">DISCIPLINA</th>
                                                        <th width="20%">SIGLA</th>
                                                        <th width="20%">CLASSE</th>
                                                        <th width="25%">NÍVEL</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; foreach ($disciplinas_5 as $disciplina) : ?>
                                                    <tr class="odd gradeX">
                                                        <td>
                                                            <input type="checkbox" name="id_disciplina[]"
                                                                value="<?= $disciplina->id_disciplina; ?>" />
                                                        </td>
                                                        <td><?= $disciplina->nome_disciplina; ?></td>
                                                        <td><?= $disciplina->sigla_disciplina; ?></td>
                                                        <td><?= $disciplina->nome_classe; ?></td>
                                                        <td><?= $disciplina->nivel; ?></td>
                                                    </tr>
                                                    <?php $i++; endforeach ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="form-group row col-12">
                                            <div class="col-2">
                                                <a href="javascript:;" class="btn btn-danger btn-block">
                                                    <i class="fa fa-arrow-left mr-2"></i>Voltar</a>
                                            </div>
                                            <div class="col-2">
                                                <button type="submit" class="btn btn-white btn-block">
                                                    <i class="fa fa-plus mr-2"></i>Adicionar</button>
                                            </div>
                                        </div><!-- end-buttons -->
                                    </div>
                                    <!-- ========================================================================== -->
                                </fieldset>
                            </form>
                            <!------------------------------------------------------------>
                        </div>
                        <!-- end tab-pane -->
                        <!-- begin tab-pane -->
                        <div class="tab-pane fade" id="nav-pills-tab-7">
                            <!------------------------------------------------------------>
                            <form action="<?php echo site_url('secretaria/matricula/gurdar_disciplina')?>" method="POST"
                                id="form_disciplina">
                                <fieldset>
                                    <div class="row">
                                        <!-- =================== CAMPOS OCULTOS =================== -->
                                        <!-- <input type="text" name="matricula" class="form-control"
                                            value="<?= $matricula_select['id_matricula'] ?>" />
                                        <input type="text" name="aluno" class="form-control"
                                            value="<?= $matricula_select['aluno_id'] ?>" />
                                        <input type="text" name="anolectivo" class="form-control"
                                            value="<?= $matricula_select['anolectivo_id'] ?>" />
                                        <input type="text" name="classe" class="form-control"
                                            value="<?= $matricula_select['classe_id'] ?>" />
                                        <input type="text" name="turma" class="form-control"
                                            value="<?= $matricula_select['turma_id'] ?>" /> -->
                                        <!-- ========================================================================== -->
                                        <div class="col-12">
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">
                                                            <input type="checkbox" />
                                                        </th>
                                                        <th width="30%">DISCIPLINA</th>
                                                        <th width="20%">SIGLA</th>
                                                        <th width="20%">CLASSE</th>
                                                        <th width="25%">NÍVEL</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; foreach ($disciplinas_6 as $disciplina) : ?>
                                                    <tr class="odd gradeX">
                                                        <td>
                                                            <input type="checkbox" name="id_disciplina[]"
                                                                value="<?= $disciplina->id_disciplina; ?>" />
                                                        </td>
                                                        <td><?= $disciplina->nome_disciplina; ?></td>
                                                        <td><?= $disciplina->sigla_disciplina; ?></td>
                                                        <td><?= $disciplina->nome_classe; ?></td>
                                                        <td><?= $disciplina->nivel; ?></td>
                                                    </tr>
                                                    <?php $i++; endforeach ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="form-group row col-12">
                                            <div class="col-2">
                                                <a href="javascript:;" class="btn btn-danger btn-block">
                                                    <i class="fa fa-arrow-left mr-2"></i>Voltar</a>
                                            </div>
                                            <div class="col-2">
                                                <button type="submit" class="btn btn-white btn-block">
                                                    <i class="fa fa-plus mr-2"></i>Adicionar</button>
                                            </div>
                                        </div><!-- end-buttons -->
                                    </div>
                                    <!-- ========================================================================== -->
                                </fieldset>
                            </form>
                            <!------------------------------------------------------------>
                        </div>
                        <!-- end tab-pane -->
                        <!-- begin tab-pane -->
                        <div class="tab-pane fade" id="nav-pills-tab-8">
                            <!------------------------------------------------------------>
                            <form action="<?php echo site_url('secretaria/matricula/gurdar_disciplina')?>" method="POST"
                                id="form_disciplina">
                                <fieldset>
                                    <div class="row">
                                        <!-- =================== CAMPOS OCULTOS =================== -->
                                        <!-- <input type="text" name="matricula" class="form-control"
                                            value="<?= $matricula_select['id_matricula'] ?>" />
                                        <input type="text" name="aluno" class="form-control"
                                            value="<?= $matricula_select['aluno_id'] ?>" />
                                        <input type="text" name="anolectivo" class="form-control"
                                            value="<?= $matricula_select['anolectivo_id'] ?>" />
                                        <input type="text" name="classe" class="form-control"
                                            value="<?= $matricula_select['classe_id'] ?>" />
                                        <input type="text" name="turma" class="form-control"
                                            value="<?= $matricula_select['turma_id'] ?>" /> -->
                                        <!-- ========================================================================== -->
                                        <div class="col-12">
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">
                                                            <input type="checkbox" />
                                                        </th>
                                                        <th width="30%">DISCIPLINA</th>
                                                        <th width="20%">SIGLA</th>
                                                        <th width="20%">CLASSE</th>
                                                        <th width="25%">NÍVEL</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; foreach ($disciplinas_7 as $disciplina) : ?>
                                                    <tr class="odd gradeX">
                                                        <td>
                                                            <input type="checkbox" name="id_disciplina[]"
                                                                value="<?= $disciplina->id_disciplina; ?>" />
                                                        </td>
                                                        <td><?= $disciplina->nome_disciplina; ?></td>
                                                        <td><?= $disciplina->sigla_disciplina; ?></td>
                                                        <td><?= $disciplina->nome_classe; ?></td>
                                                        <td><?= $disciplina->nivel; ?></td>
                                                    </tr>
                                                    <?php $i++; endforeach ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="form-group row col-12">
                                            <div class="col-2">
                                                <a href="javascript:;" class="btn btn-danger btn-block">
                                                    <i class="fa fa-arrow-left mr-2"></i>Voltar</a>
                                            </div>
                                            <div class="col-2">
                                                <button type="submit" class="btn btn-white btn-block">
                                                    <i class="fa fa-plus mr-2"></i>Adicionar</button>
                                            </div>
                                        </div><!-- end-buttons -->
                                    </div>
                                    <!-- ========================================================================== -->
                                </fieldset>
                            </form>
                            <!------------------------------------------------------------>
                        </div>
                        <!-- end tab-pane -->
                        <!-- begin tab-pane -->
                        <div class="tab-pane fade" id="nav-pills-tab-9">
                            <!------------------------------------------------------------>
                            <form action="<?php echo site_url('secretaria/matricula/gurdar_disciplina')?>" method="POST"
                                id="form_disciplina">
                                <fieldset>
                                    <div class="row">
                                        <!-- =================== CAMPOS OCULTOS =================== -->
                                        <!-- <input type="text" name="matricula" class="form-control"
                                            value="<?= $matricula_select['id_matricula'] ?>" />
                                        <input type="text" name="aluno" class="form-control"
                                            value="<?= $matricula_select['aluno_id'] ?>" />
                                        <input type="text" name="anolectivo" class="form-control"
                                            value="<?= $matricula_select['anolectivo_id'] ?>" />
                                        <input type="text" name="classe" class="form-control"
                                            value="<?= $matricula_select['classe_id'] ?>" />
                                        <input type="text" name="turma" class="form-control"
                                            value="<?= $matricula_select['turma_id'] ?>" /> -->
                                        <!-- ========================================================================== -->
                                        <div class="col-12">
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">
                                                            <input type="checkbox" />
                                                        </th>
                                                        <th width="30%">DISCIPLINA</th>
                                                        <th width="20%">SIGLA</th>
                                                        <th width="20%">CLASSE</th>
                                                        <th width="25%">NÍVEL</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; foreach ($disciplinas_8 as $disciplina) : ?>
                                                    <tr class="odd gradeX">
                                                        <td>
                                                            <input type="checkbox" name="id_disciplina[]"
                                                                value="<?= $disciplina->id_disciplina; ?>" />
                                                        </td>
                                                        <td><?= $disciplina->nome_disciplina; ?></td>
                                                        <td><?= $disciplina->sigla_disciplina; ?></td>
                                                        <td><?= $disciplina->nome_classe; ?></td>
                                                        <td><?= $disciplina->nivel; ?></td>
                                                    </tr>
                                                    <?php $i++; endforeach ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="form-group row col-12">
                                            <div class="col-2">
                                                <a href="javascript:;" class="btn btn-danger btn-block">
                                                    <i class="fa fa-arrow-left mr-2"></i>Voltar</a>
                                            </div>
                                            <div class="col-2">
                                                <button type="submit" class="btn btn-white btn-block">
                                                    <i class="fa fa-plus mr-2"></i>Adicionar</button>
                                            </div>
                                        </div><!-- end-buttons -->
                                    </div>
                                    <!-- ========================================================================== -->
                                </fieldset>
                            </form>
                            <!------------------------------------------------------------>
                        </div>
                        <!-- end tab-pane -->
                        <!-- begin tab-pane -->
                        <div class="tab-pane fade" id="nav-pills-tab-10">
                            <!------------------------------------------------------------>
                            <form action="<?php echo site_url('secretaria/matricula/gurdar_disciplina')?>" method="POST"
                                id="form_disciplina">
                                <fieldset>
                                    <div class="row">
                                        <!-- =================== CAMPOS OCULTOS =================== -->
                                        <!-- <input type="text" name="matricula" class="form-control"
                                            value="<?= $matricula_select['id_matricula'] ?>" />
                                        <input type="text" name="aluno" class="form-control"
                                            value="<?= $matricula_select['aluno_id'] ?>" />
                                        <input type="text" name="anolectivo" class="form-control"
                                            value="<?= $matricula_select['anolectivo_id'] ?>" />
                                        <input type="text" name="classe" class="form-control"
                                            value="<?= $matricula_select['classe_id'] ?>" />
                                        <input type="text" name="turma" class="form-control"
                                            value="<?= $matricula_select['turma_id'] ?>" /> -->
                                        <!-- ========================================================================== -->
                                        <div class="col-12">
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">
                                                            <input type="checkbox" />
                                                        </th>
                                                        <th width="30%">DISCIPLINA</th>
                                                        <th width="20%">SIGLA</th>
                                                        <th width="20%">CLASSE</th>
                                                        <th width="25%">NÍVEL</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; foreach ($disciplinas_9 as $disciplina) : ?>
                                                    <tr class="odd gradeX">
                                                        <td>
                                                            <input type="checkbox" name="id_disciplina[]"
                                                                value="<?= $disciplina->id_disciplina; ?>" />
                                                        </td>
                                                        <td><?= $disciplina->nome_disciplina; ?></td>
                                                        <td><?= $disciplina->sigla_disciplina; ?></td>
                                                        <td><?= $disciplina->nome_classe; ?></td>
                                                        <td><?= $disciplina->nivel; ?></td>
                                                    </tr>
                                                    <?php $i++; endforeach ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="form-group row col-12">
                                            <div class="col-2">
                                                <a href="javascript:;" class="btn btn-danger btn-block">
                                                    <i class="fa fa-arrow-left mr-2"></i>Voltar</a>
                                            </div>
                                            <div class="col-2">
                                                <button type="submit" class="btn btn-white btn-block">
                                                    <i class="fa fa-plus mr-2"></i>Adicionar</button>
                                            </div>
                                        </div><!-- end-buttons -->
                                    </div>
                                    <!-- ========================================================================== -->
                                </fieldset>
                            </form>
                            <!------------------------------------------------------------>
                        </div>
                        <!-- end tab-pane -->
                        <!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
                    </div><!-- end tab-content -->
                    <!-- ------------------------------------------------------------------------- -->
                </div><!-- end invoice content -->
            </div><!-- end invoice -->
        </div><!-- end tab-pane -->
    </div><!-- end tab-content -->
    <!-- =========================================================================================================================== -->
    <!-- =========================================================================================================================== -->
    <!-- begin panel -->
    <div class="panel panel-inverse panel-with-tabs" data-sortable-id="ui-unlimited-tabs-1">
        <!-- begin panel-heading -->
        <div class="panel-heading p-0">
            <div class="panel-heading-btn m-r-10 m-t-10">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-expand"><i
                        class="fa fa-expand"></i></a>
            </div>
            <!-- begin nav-tabs -->
            <div class="tab-overflow">
                <ul class="nav nav-tabs nav-tabs-inverse">
                    <li class="nav-item prev-button"><a href="javascript:;" data-click="prev-tab"
                            class="nav-link text-success"><i class="fa fa-arrow-left"></i></a></li>
                    <li class="nav-item"><a href="#nav-tab-0" data-toggle="tab"
                            class="nav-link active"><b>INICIAÇÃO</b></a>
                    </li>
                    <li class="nav-item"><a href="#nav-tab-1" data-toggle="tab" class="nav-link"><b>1ª CLASSE</b></a>
                    </li>
                    <li class="nav-item"><a href="#nav-tab-2" data-toggle="tab" class="nav-link"><b>2ª CLASSE</b></a>
                    </li>
                    <li class="nav-item"><a href="#nav-tab-3" data-toggle="tab" class="nav-link"><b>3ª CLASSE</b></a>
                    </li>
                    <li class="nav-item"><a href="#nav-tab-4" data-toggle="tab" class="nav-link"><b>4ª CLASSE</b></a>
                    </li>
                    <li class="nav-item"><a href="#nav-tab-5" data-toggle="tab" class="nav-link"><b>5ª CLASSE</b></a>
                    </li>
                    <li class="nav-item"><a href="#nav-tab-6" data-toggle="tab" class="nav-link"><b>6ª CLASSE</b></a>
                    </li>
                    <li class="nav-item"><a href="#nav-tab-7" data-toggle="tab" class="nav-link"><b>7ª CLASSE</b></a>
                    </li>
                    <li class="nav-item"><a href="#nav-tab-8" data-toggle="tab" class="nav-link"><b>8ª CLASSE</b></a>
                    </li>
                    <li class="nav-item"><a href="#nav-tab-9" data-toggle="tab" class="nav-link"><b>9ª CLASSE</b></a>
                    </li>
                    <li class="nav-item next-button"><a href="javascript:;" data-click="next-tab"
                            class="nav-link text-success"><i class="fa fa-arrow-right"></i></a></li>
                </ul>
            </div><!-- end nav-tabs -->
        </div><!-- end panel-heading -->
        <!-- begin tab-content -->
        <div class="tab-content">
            <!-- begin tab-pane -->
            <div class="tab-pane fade active show" id="nav-tab-0">
                <h3 class="m-t-10">INICIAÇÃO</h3>

            </div>
            <!-- end tab-pane -->
            <!-- begin tab-pane -->
            <div class="tab-pane fade " id="nav-tab-1">
                <h3 class="m-t-10">1ª CLASSE</h3>

            </div>
            <!-- end tab-pane -->
            <!-- begin tab-pane -->
            <div class="tab-pane fade" id="nav-tab-2">
                <h3 class="m-t-10">2ª CLASSE</h3>

            </div>
            <!-- end tab-pane -->
            <!-- begin tab-pane -->
            <div class="tab-pane fade" id="nav-tab-3">
                <h3 class="m-t-10">3ª CLASSE</h3>

            </div>
            <!-- end tab-pane -->
            <!-- begin tab-pane -->
            <div class="tab-pane fade" id="nav-tab-4">
                <h3 class="m-t-10">4ª CLASSE</h3>

            </div>
            <!-- end tab-pane -->
            <!-- begin tab-pane -->
            <div class="tab-pane fade" id="nav-tab-5">
                <h3 class="m-t-10">5ª CLASSE</h3>

            </div>
            <!-- end tab-pane -->
            <!-- begin tab-pane -->
            <div class="tab-pane fade" id="nav-tab-6">
                <h3 class="m-t-10">6ª CLASSE</h3>

            </div>
            <!-- end tab-pane -->
            <!-- begin tab-pane -->
            <div class="tab-pane fade" id="nav-tab-7">
                <h3 class="m-t-10">7ª CLASSE</h3>

            </div>
            <!-- end tab-pane -->
            <!-- begin tab-pane -->
            <div class="tab-pane fade" id="nav-tab-8">
                <h3 class="m-t-10">8ª CLASSE</h3>

            </div>
            <!-- end tab-pane -->
            <!-- begin tab-pane -->
            <div class="tab-pane fade" id="nav-tab-9">
                <h3 class="m-t-10">9ª CLASSE</h3>

            </div>
            <!-- end tab-pane -->

        </div><!-- end tab-content -->
    </div><!-- end panel -->