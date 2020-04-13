<!--            INICIO CONTEUDO 
-->
<div id="content" class="content">
    <!-- begin page-header -->
    <h1 class="page-header">Listar Matriculas</h1>
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
            <h4 class="panel-title">Tabela Turma</h4>
        </div>
        <!-- end panel-heading -->
        <!--            INICIO TABELA 
        -->
        <div class="panel-body">
            <div class="table-responsive">
                <table id="data-table-default" class="table table-striped table-bordered table-hover table-condensed">
                    <thead>
                        <tr>
                            <th class="text-nowrap">Id Matricula</th>
                            <th class="text-nowrap">Ano Lectivo</th>
                            <th class="text-nowrap">Aluno</th>
                            <th class="text-nowrap">Turma</th>
                            <th class="text-nowrap">Curso</th>
                            <th class="text-nowrap">Acção</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($matricula as $mtcl) : ?>
                        <tr class="odd gradeX">
                            <td><?= $mtcl ['id_matricula'] ?></td>
                            <td><?= $mtcl ['anolectivo_id'] ?></td>
                            <td><?= $mtcl ['aluno_id'] ?></td>
                            <td><?= $mtcl ['turma_id'] ?></td>
                            <td><?= $mtcl ['curso_id'] ?></td>
                            <td>
                                <a href="<?= site_url('secretaria/matricula/editar/'.$mtcl ['id_matricula']); ?>" 
                                    onclick="return confirm('Deseja editar esta turma');"
                                    class="btn btn-outline-info btn-xs">Editar</a>
                                <a href="<?= site_url('secretaria/matricula/apagar/'.$mtcl ['id_matricula']); ?>"
                                    onclick="return confirm('Deseja apagar esta turma');"
                                    class="btn btn-outline-danger btn-xs">Apagar</a>
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