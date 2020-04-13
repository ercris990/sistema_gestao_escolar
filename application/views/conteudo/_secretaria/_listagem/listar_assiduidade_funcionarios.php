<div id="content" class="content">
    <div class="row">
        <div class="col-6">
            <h4 class="page-header text-uppercase"><i class="fa fa-list mr-5"></i>LIVRO DE PONTO</h4>
        </div>
        <div class="col-6 text-right">
            <a href="<?= base_url('home/docente') ?>" class="btn btn-primary"><i
                    class="fa fa-arrow-left mr-2"></i>PAGINA ANTERIOR</a>
        </div>
    </div>
    <?= $this->session->flashdata('msg'); ?>
    <!-- ------------------------------------------------------------------------------------ -->
    <form action="<?= site_url('secretaria/matricula/marcar_falta')?>" method="POST">
        <div>
            <!--  CAMPOS OCULTOS  -->
            <input type="hidden" name="anolectivo" value="<?= $listagem_funcionarios->anolectivo_id; ?>" />
            <input type="hidden" name="turma" value="<?= $listagem_funcionarios->turma_id; ?>" />
            <!--  CAMPOS OCULTOS  -->
        </div>
        <!-- begin table-responsive -->
        <div class="table-responsive">
            <table class="table table-striped table-hover table-condensed text-uppercase">
                <thead class="bg-primary">
                    <tr>
                        <th class="with-checkbox text-center align-middle" width="1%">
                            <div class="checkbox checkbox-css">
                                <input type="checkbox" id="checkTodos" />
                                <label for="checkTodos">&nbsp;</label>
                            </div>
                        </th>
                        <th class="text-light text-center align-middle" width="1%">Nº.</th>
                        <th class="text-light text-center align-middle" width="2%" nowrap>Nº DE PROCESSO</th>
                        <th class="text-light text-center align-middle" width="20%">NOME DO funcionario</th>
                        <th class="text-light text-center align-middle" width="5%">GÉNERO</th>
                        <th class="text-light text-center align-middle"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach ($funcionarios as $funcionario) : ?>
                    <tr class="odd gradeX">
                        <td class="with-checkbox align-middle">
                            <input type="checkbox" class="disciplinas" id="disciplinas" name="id_funcionario[]"
                                value="<?= $funcionario->funcionario_id; ?>" /></td>
                        <td class="text-center align-middle"><?= $i; ?></td>
                        <td class="text-center align-middle"><?= $funcionario->id_funcionario; ?></td>
                        <td class="text-left  align-middle" nowrap><?= $funcionario->nome_funcionario; ?></td>
                        <td class="text-center align-middle"><?php
                            if ($funcionario->genero_funcionario == "Masculino"){echo"M";}elseif($funcionario->genero_funcionario=="Feminino"){echo"F";}
                            ?></td>
                        <td class="text-right">
                            <a href="<?= site_url('secretaria/listagem/mapa_assiduidade/'.$funcionario->id_ano.'/'.$funcionario->id_turma.'/'.$funcionario->id_funcionario)?>"
                                class="btn btn-secondary bts-sm">Mapa Individual
                                <i class="fa fa-arrow-right ml-2"></i></a>
                        </td>
                    </tr>
                    <?php $i++; endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-center" colspan="6">
                            <button type="submit" class="btn btn-outline-danger col-2"
                                onclick="return confirm('Deseja marcar falta neste funcionario');">
                                <i class="fa fa-plus mr-2"></i>MARCAR FALTA</button>
                            <!-- ------------------------------------------------------------------------------------------------ -->
                            <a href="<?= site_url('secretaria/listagem/mapa_assiduidade_geral/'.$funcionario->id_ano.'/'.$funcionario->id_turma)?>"
                                class="btn btn-outline-secondary bts-sm col-2">Mapa Geral
                                <i class="fa fa-arrow-right ml-2"></i></a>

                        </th>
                    </tr>
                </tfoot>
            </table>
        </div><!-- end table-responsive -->
    </form>