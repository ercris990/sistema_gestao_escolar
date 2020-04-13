<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <?= $this->session->flashdata('msg'); ?>
    <!--    FIM BOTOES TOP    -->
    <!-- end page-header -->
    <!-- INICIO PAINEL TABELAS -->
    <div class="panel panel-info">
        <!-- begin panel-heading -->
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                        class="fa fa-expand"></i></a>
            </div>
            <h3 class="panel-title">Resultado da Pesquisa</h3>
        </div>
        <!-- end panel-heading -->
        <!-- INICIO TABELA -->
        <div class="panel-body">
            <div class="table-responsive">
                <table id="data-table-default" class="table table-striped table-bordered table-hover table-condensed">
                    <thead>
                        <tr>
                            <th>Nº DE Processo</th>
                            <th>Nome</th>
                            <th>Nascimento</th>
                            <th>Género</th>
                            <th>Nº Documento</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($alunos as $aluno) : ?>
                        <tr class="odd gradeX">
                            <td> <?= $aluno['num_processo'] ?> </td>
                            <td> <?= $aluno['nome'] ?> </td>
                            <td> <?= $aluno['nascimento_aluno'] ?> </td>
                            <td> <?= $aluno['genero_aluno'] ?> </td>
                            <td> <?= $aluno['num_documento'] ?> </td>
                            <td>
                                <!---------------------------------------------------------------------------------------->
                                <a href="<?php echo site_url('secretaria/aluno/editar/'.$aluno['id_aluno'] ) ?>"
                                    onclick="return confirm('Deseja editar este registro?');"
                                    class="btn btn-outline-info btn-xs"></i>Alterar</a>
                                <!---------------------------------------------------------------------------------------->
                                <a href="<?php echo site_url('secretaria/aluno/apagar/'.$aluno['id_aluno'] ) ?>"
                                    onclick="return confirm('Deseja apagar este registro?');"
                                    class="btn btn-outline-danger btn-xs">Excluir</a>
                                <!---------------------------------------------------------------------------------------->
                                <a href="<?php echo site_url('secretaria/aluno/detalhe?id_aluno='.$aluno['id_aluno'] ) ?>"
                                    class="btn btn-primary btn-xs">Ver Perfil</a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div><!-- fim tabela -->
    </div><!-- fim painel tabela -->
</div><!-- fim conteudo -->