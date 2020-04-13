<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <h4 class="page-header text-primary"><i class="fa fa-list mr-5"></i>PROFESSORES</h4>
    <?= $this->session->flashdata('msg'); ?>
    <!-- end page-header -->
    <!------------------------ conteudo ------------------------>
    <div class="table-responsive mt-5">
        <table id="data-table-default" class="table table-striped table-hover table-condensed text-uppercase">
            <thead class="bg-primary">
                <tr>
                    <th class="text-nowrap text-light text-center" width="5%">Nº</th>
                    <th class="text-nowrap text-light text-left" width="20%">NOME DO PROFESSOR</th>
                    <th class="text-nowrap text-light text-left" width="10%">GÉNERO</th>
                    <th class="text-nowrap text-light text-center" width="55%"></th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; foreach ($professores as $prof) : ?>
                <tr class="odd gradeX">
                    <td class="align-middle text-center"><?= $i; ?> </td>
                    <td class="align-middle text-left"><?= $prof->nome_funcionario; ?></td>
                    <td class="align-middle text-left"><?= $prof->genero_funcionario; ?></td>
                    <td class="align-middle text-right">
                        <!-- dropdown -->
                        <div class="btn-group">
                            <a href="#" class="btn btn-sm btn-primary"><i class="fa fa-cog mr-2"></i>Opções</a>
                            <a href="#" class="btn btn-sm btn-outline-primary dropdown-toggle"
                                data-toggle="dropdown"></a>
                            <ul class="dropdown-menu pull-left">
                                <li>
                                    <!-- ================================================================================================= -->
                                    <a
                                        href="<?= site_url('secretaria/professor/turmas_professor_coordenacao/'.$prof->id_funcionario ) ?>">
                                        <i class="fa fa-list mr-2"></i>Ver Turmas</a>
                                </li>
                                <li>
                                    <!-- ================================================================================================= -->
                                    <a
                                        href="<?= site_url('secretaria/professor/detalhe_professor?id_funcionario='.$prof->id_funcionario ) ?>">
                                        <i class="fa fa-user mr-2"></i>Ver Perfil</a>
                                    <!-- ================================================================================================= -->
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <?php $i++; endforeach ?>
            </tbody>
        </table>
    </div><!-- end table responsive -->