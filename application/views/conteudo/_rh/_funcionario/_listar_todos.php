<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <!-- begin page-header -->
    <h4 class="page-header"><i class="fa fa-list mr-5"></i>TODOS FUNCIONÁRIOS</h4>
    <?= $this->session->flashdata('msg'); ?>
    <!-- end page-header -->
    <div class="table-responsive">
        <table id="data-table-default" class="table table-striped table-hover table-condensed">
            <thead class="bg-info">
                <tr>
                    <th class="text-nowrap" width="1%">Nº. </th>
                    <th class="text-nowrap">NOEME DO FUNCIONÁRIO</th>
                    <th width="10%">GÉNERO </th>
                    <th width="10%">DEPARTAMENTO </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; foreach ($funcionarios as $funcionario) : ?>
                <tr class="odd gradeX">
                    <td class="align-middle text-nowrap"><?= $i                                   ?></td>
                    <td class="align-middle text-nowrap"><?= $funcionario->nome_funcionario;      ?></td>
                    <td class="align-middle text-nowrap"><?= $funcionario->genero_funcionario;    ?></td>
                    <td class="align-middle text-nowrap"><?php 
                        if ($funcionario->nivel_acesso == "1") {
                            echo 'Direcção';
                        } elseif ($funcionario->nivel_acesso == "2") {
                            echo 'Secretaria';
                        } elseif ($funcionario->nivel_acesso == "3") {
                            echo 'Recursos Humanos';
                        } elseif ($funcionario->nivel_acesso == "4") {
                            echo 'Coordenação';
                        } elseif ($funcionario->nivel_acesso == "5") {
                            echo 'Docentes';
                        } elseif ($funcionario->nivel_acesso == "6") {
                            echo 'TI';
                        } elseif ($funcionario->nivel_acesso == "7") {
                            echo 'Serviços Gerais';
                        } elseif ($funcionario->nivel_acesso == "8") {
                            echo 'Seguraça';
                        }
                    ?></td>
                    <td class="text-right">
                        <a href="<?= site_url('rh/funcionario/detalhe_rh?id_funcionario='.$funcionario->id_funcionario); ?>"
                            class="btn btn-sm btn-secondary">VER PERFIL <i class="fa fa-arrow-alt-circle-right ml-3"></i>
                        </a>
                        <!-- ------------------------------------------------------------------------------------------- -->
                        <a href="<?= site_url('rh/funcionario/declaracao_efectividade_pdf/'.$funcionario->id_funcionario); ?>"
                            class="btn btn-sm btn-white" target="_blanc"><i class="fa fa-file-pdf text-danger mr-2"></i>DECLARAÇÃO DE EFECTIVIDADE
                        </a>
                    </td>
                </tr>
                <?php $i++; endforeach ?>
            </tbody>
        </table>
    </div>