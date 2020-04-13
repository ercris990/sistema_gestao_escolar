<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <!-- begin page-header -->
    <h4 class="page-header">LISTA FUNCIONÁRIOS</h4>
    <?= $this->session->flashdata('msg'); ?>
    <!-- end page-header -->
    <!--
    ---------------------- conteudo ----------------------
    -->
    <!-- begin invoice -->
    <div class="invoice">
        <!-- begin invoice-company -->
        <div class="invoice-company text-center">
        </div>
        <!-- end invoice-company -->
        <div class="invoice-content">
            <!-- begin table-responsive -->
            <div class="table-responsive">
                <table id="data-table-default" class="table table-striped table-bordered table-hover table-condensed">
                    <thead>
                        <tr>
                            <th class="text-nowrap">NOEME DO FUNCIONÁRIO </th>
                            <th class="text-nowrap">GÉNERO</th>
                            <th class="text-nowrap">MORADA</th>
                            <th class="text-nowrap">TELEMÓVEL</th>
                            <th class="text-nowrap">E-MAIL</th>
                            <th class="text-nowrap"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($funcionarios as $funcionario) : ?>
                        <tr class="odd gradeX">
                            <td><?= $funcionario->nome_funcionario;?></td>
                            <td><?= $funcionario->genero_funcionario;?></td>
                            <td><?= $funcionario->endereco_funcionario;?></td>
                            <td><?= $funcionario->telemovel_funcionario;?></td>
                            <td><?= $funcionario->email_funcionario;?></td>
                            <td>
                                <a href="<?= site_url('rh/funcionario/detalhe?id_funcionario='.$funcionario->id_funcionario); ?>"
                                    class="btn btn-primary btn-xs">Perfil</a>
                                <a href="<?= site_url('rh/funcionario/apagar/'.$funcionario->id_funcionario); ?>"
                                    onclick="return confirm('Deseja apagar este funcionario');"
                                    class="btn btn-danger btn-xs">Apagar</a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div><!--    FIM TABELA  -->
    </div><!--    FIM PAINEL TABELA   -->
</div><!--    FIM CONTEUDO    -->