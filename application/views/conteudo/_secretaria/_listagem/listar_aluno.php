<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <h4 class="page-header">LISTAR ALUNOS</h4>
    <?= $this->session->flashdata('msg'); ?>
    <!-- end page-header -->
    <!--
    ---------------------- conteudo ------------------------>
    <!-- begin invoice -->
    <div class="invoice">
        <!-- begin invoice-company -->
        <div class="invoice-company text-center ">
            <strong>LISTA DE ALUNOS</strong>
        </div>
        <!-- end invoice-company -->
        <div class="invoice-content">
            <!-- begin table-responsive -->
            <div class="table-responsive">
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Nº.</th>
                            <th>Nº de Processo</th>
                            <th>Nome</th>
                            <th>Nascimento</th>
                            <th>Género</th>
                            <th>Nº Documento</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach ($alunos as $aluno) : ?>
                        <tr class="odd gradeX">
                            <td> <?= $i; ?> </td>
                            <td> <?= $aluno->num_processo; ?> </td>
                            <td> <?= $aluno->nome; ?> </td>
                            <td> <?= $aluno->nascimento_aluno; ?> </td>
                            <td> <?= $aluno->genero_aluno; ?> </td>
                            <td> <?= $aluno->num_documento; ?> </td>
                            <td class="text-right">
                                <!-- EDITAR ALUNO -->
                                <a href="<?php echo site_url('secretaria/aluno/editar/'.$aluno->id_aluno ) ?>"
                                    onclick="return confirm('Deseja editar este registro?');"
                                    class="btn btn-outline-info btn-xs"></i>Alterar</a>
                                <!-- EXCLUIR ALUNO -->
                                <a href="<?php echo site_url('secretaria/aluno/apagar/'.$aluno->id_aluno ) ?>"
                                    onclick="return confirm('Deseja apagar este registro?');"
                                    class="btn btn-outline-danger btn-xs">Excluir</a>
                                <!-- VER PERFIL ALUNO -->
                                <a href="<?php echo site_url('secretaria/aluno/detalhe?id_aluno='.$aluno->id_aluno ) ?>"
                                    class="btn btn-primary btn-xs">Ver Perfil</a>
                            </td>
                        </tr>
                        <?php $i++; endforeach ?>
                    </tbody>
                </table>
            </div><!-- end table responsive -->
        </div><!-- end invoice content -->
    </div><!-- end invoice -->