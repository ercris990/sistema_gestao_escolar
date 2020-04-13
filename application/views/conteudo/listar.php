<div id="content" class="content">
    <!-- begin page-header -->
    <h1 class="page-header">TABELA ALUNOS</h1>
    <?= $this->session->flashdata('msg'); ?>
    <!-- end page-header -->
    <!-- INICIO PAINEL TABELAS -->
    <div class="panel panel-inverse">
        <!-- begin panel-heading -->
        <div class="panel-heading">
            <h4 class="panel-title">Tabela Alunos</h4>
        </div>
        <!-- end panel-heading -->
        <!-- INICIO TABELA -->
        <div class="panel-body">
            <table id="data-table-default" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th width="1%"></th>
                        <th width="1%" data-orderable="false"></th>
                        <th class="text-nowrap">Nome</th>
                        <th class="text-nowrap">Sobrenome</th>
                        <th class="text-nowrap">Classe</th>
                        <th class="text-nowrap">Turma</th>
                        <th class="text-nowrap">Número</th>
                        <th class="text-nowrap">Acção</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd gradeX">
                        <td width="1%" class="f-s-600 text-inverse">1</td>
                        <td width="1%" class="with-img"><img src="../assets/img/user/user-1.jpg"
                                class="img-rounded height-30" /></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="#" class="btn btn-outline-primary btn-xs"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-outline-danger btn-xs"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>