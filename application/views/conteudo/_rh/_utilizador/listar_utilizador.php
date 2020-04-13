<!--            INICIO CONTEUDO 
-->
<div id="content" class="content">
    <!-- begin page-header -->
    <h1 class="page-header">Listar Utilizadores</h1>
    <!-- end page-header -->

    <!--            INICIO PAINEL TABELAS 
            -->
    <div class="panel panel-inverse">
        <!-- begin panel-heading -->
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                        class="fa fa-expand"></i></a>

            </div>
            <h4 class="panel-title">Tabela Alunos</h4>
        </div>
        <!-- end panel-heading -->
        <!--            INICIO TABELA 
        -->
        <div class="panel-body">
            <div class="table-responsive">
                <table id="data-table-default" class="table table-striped table-bordered table-hover table-condensed">
                    <thead>
                        <tr>
                            <th class="text-nowrap">Id</th>
                            <th class="text-nowrap">Nome de Utilizador</th>
                            <th class="text-nowrap">Departamento</th>
                            <th class="text-nowrap">Data de Criação</th>
                            <th class="text-nowrap">Data de Modificação</th>
                            <th class="text-nowrap">Acção</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($utilizador as $user) : ?>
                        <tr class="odd gradeX">
                            <td><?= $user ['id_utilizador'] ?></td>
                            <td><?= $user ['nome_utilizador'] ?></td>
                            <td><?= $user ['departamento'] ?></td>
                            <td><?= $user ['created'] ?></td>
                            <td><?= $user ['modified'] ?></td>
                            <td>
                                <a href="<?= site_url('rh/utilizador/editar/'.$user ['id_utilizador']); ?>" 
                                    onclick="return confirm('Deseja editar este utilizador');"
                                    class="btn btn-primary btn-xs">Editar</a>
                                <a href="<?= site_url('rh/utilizador/apagar/'.$user ['id_utilizador']); ?>"
                                    onclick="return confirm('Deseja apagar este utilizador');"
                                    class="btn btn-danger btn-xs">Apagar</a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!--            FIM TABELA 
        -->
    </div>
    <!--            FIM PAINEL TABELA 
    -->
</div>
<!--            FIM CONTEUDO
-->