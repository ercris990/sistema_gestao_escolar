<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <!-- begin page-header -->
    <h4 class="page-header">
        <i class="fa fa-list mr-5"></i>
        <!-- ---------------------------------------------------- -->
        <?php foreach ($funcionarios_row as $funcionario) : ?><?php
            if ($funcionario->nivel_acesso == "1"){
                echo 'DIRECÇÃO';
            } elseif ($funcionario->nivel_acesso == "2") {
                echo 'SECRETARIA';
            } elseif ($funcionario->nivel_acesso == "3") {
                echo 'RECURSOS HUMANOS';
            } elseif ($funcionario->nivel_acesso == "4") {
                echo 'COORDENAÇÃO';
            } elseif ($funcionario->nivel_acesso == "5") {
                echo 'DOCENTES';
            } elseif ($funcionario->nivel_acesso == "7") {
                echo 'SERVIÇOS GERAIS';
            } elseif ($funcionario->nivel_acesso == "8") {
                echo 'SEGURANÇA';
            }
        ?><?php endforeach ?>
    </h4>
    <?= $this->session->flashdata('msg'); ?>
    <!-- end page-header -->
    <!-- ------------------------------------------------------------------------ -->
    <form action="<?= site_url('rh/funcionario/marcar_falta')?>" method="POST" id="falta_funcionario">
        <!-- ------------------------------------------------------------------------ -->
        <div class="table-responsive">
            <table id="data-table-default" class="table table-striped table-hover table-condensed">
                <thead class="bg-info">
                    <tr>
                        <th class="with-checkbox text-center align-middle" width="1%">
                            <div class="checkbox checkbox-css">
                                <input type="checkbox" id="checkTodos" />
                                <label for="checkTodos">&nbsp;</label>
                            </div>
                        </th>
                        <th class="text-nowrap" width="1%">Nº. </th>
                        <th class="text-nowrap">NOEME DO FUNCIONÁRIO</th>
                        <th class="text-nowrap">GÉNERO </th>
                        <th class="text-nowrap">MORADA </th>
                        <th class="text-nowrap">TELEMÓVEL </th>
                        <th class="text-nowrap">E-MAIL </th>
                        <th width="1%"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach ($funcionarios as $funcionario) : ?>
                    <tr class="odd gradeX">
                        <td class="with-checkbox align-middle">
                            <input type="checkbox" class="disciplinas" id="id_funcionario" name="id_funcionario[]"
                                value="<?= $funcionario->id_funcionario; ?>" />
                        <td class="align-middle text-nowrap"><?= $i                                   ?></td>
                        <td class="align-middle text-nowrap"><?= $funcionario->nome_funcionario;      ?></td>
                        <td class="align-middle text-nowrap"><?= $funcionario->genero_funcionario;    ?></td>
                        <td class="align-middle text-nowrap"><?= $funcionario->endereco_funcionario;  ?></td>
                        <td class="align-middle text-nowrap"><?= $funcionario->telemovel_funcionario; ?></td>
                        <td class="align-middle text-nowrap"><?= $funcionario->email_funcionario;     ?></td>
                        <td>
                            <a href="<?= site_url('rh/funcionario/detalhe_rh?id_funcionario='.$funcionario->id_funcionario); ?>"
                                class="btn btn-sm btn-primary">VER PERFIL
                                <i class="fa fa-arrow-alt-circle-right ml-3"></i></a>
                        </td>
                    </tr>
                    <?php $i++; endforeach ?>
                </tbody>
            </table>
        </div>
        <!-- ------------------------------------------------------------------------------ -->
        <div class="row alert alert-secondary border mt-2">
            <div class="col-12 row">
                <div class="form-group col-5">
                    <!-- <select name="presenca_ausencia" id="presenca_ausencia" class="form-control border-primary">
                        <option value="1">Ausência</option>
                    </select> -->
                    <input type="hidden" name="presenca_ausencia" id="presenca_ausencia"
                        class="form-control border-primary" value="1">
                </div>
                <div class="form-group col-10">
                    <input type="month" name="mes" id="mes" class="form-control border-primary">
                </div>
                <div class="form-group col-2">
                    <button type="submit" class="btn btn-block btn-outline-danger">MARCAR FALTA<i
                            class="fa fa-arrow-alt-circle-right ml-3"></i></button>
                </div>
            </div>
            <!-- ------------------------------------------------------------------------------ -->
        </div>
    </form>