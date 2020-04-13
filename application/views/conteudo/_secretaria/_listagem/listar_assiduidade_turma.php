<div id="content" class="content">
    <div class="row">
        <div class="col-6">
            <h4 class="page-header text-uppercase"><i class="fa fa-list mr-5"></i>MARCAR FALTAS</h4>
        </div>
        <div class="col-6 text-right">
            <a href="<?= base_url('home/docente') ?>" class="btn btn-primary"><i
                    class="fa fa-arrow-left mr-2"></i>PAGINA ANTERIOR</a>
        </div>
    </div>
    <?= $this->session->flashdata('msg'); ?>
    <!-- ------------------------------------------------------------------------------------ -->
    <div class="table-responsive table-info">
        <table class="table text-uppercase">
            <thead>
                <tr>
                    <th width="15%">Ano Lectivo:
                        <span class="text-red"><?= $listagem_alunos->ano_let; ?></span>
                    </th>
                    <th width="15%">Turma:
                        <span class="text-red"><?= $listagem_alunos->nome_turma; ?></span>
                    </th>
                    <th width="15%">Classe:
                        <span class="text-red"><?= $listagem_alunos->nome_classe; ?></span>
                    </th>
                    <th width="15%">Periodo:
                        <span class="text-red"><?= $listagem_alunos->nome_periodo; ?></span>
                    </th>
                    <th width="20%">Professor (a):
                        <span class="text-red"><?= $prof->nome_funcionario; ?></span>
                    </th>
                </tr>
            </thead>
        </table>
    </div>
    <form action="<?= site_url('secretaria/matricula/marcar_falta')?>" method="POST">
        <div>
            <!--  CAMPOS OCULTOS  -->
            <input type="hidden" name="anolectivo" value="<?= $listagem_alunos->anolectivo_id; ?>" />
            <input type="hidden" name="turma" value="<?= $listagem_alunos->turma_id; ?>" />
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
                        <th class="text-light text-center align-middle" width="20%">NOME DO ALUNO</th>
                        <th class="text-light text-center align-middle" width="5%">GÉNERO</th>
                        <th class="text-light text-center align-middle"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach ($alunos as $aluno) : ?>
                    <tr class="odd gradeX">
                        <td class="with-checkbox align-middle">
                            <input type="checkbox" class="disciplinas" id="disciplinas" name="aluno_id[]"
                                value="<?= $aluno->aluno_id; ?>" /></td>
                        <td class="text-center align-middle"><?= $i; ?></td>
                        <td class="text-center align-middle"><?= $aluno->num_processo; ?></td>
                        <td class="text-left  align-middle" nowrap><?= $aluno->nome; ?></td>
                        <td class="text-center align-middle"><?php
                            if ($aluno->genero_aluno == "Masculino"){echo"M";}elseif($aluno->genero_aluno=="Feminino"){echo"F";}
                            ?></td>
                        <td class="text-right">
                            <a href="<?= site_url('secretaria/listagem/mapa_assiduidade/'.$aluno->id_ano.'/'.$aluno->id_turma.'/'.$aluno->id_aluno)?>"
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
                                onclick="return confirm('Deseja marcar falta neste aluno');">
                                <i class="fa fa-check mr-2"></i>MARCAR FALTA</button>
                            <!-- ------------------------------------------------------------------------------------------------ -->
                            <a href="<?= site_url('secretaria/listagem/mapa_assiduidade_geral/'.$aluno->id_ano.'/'.$aluno->id_turma)?>"
                                class="btn btn-outline-secondary bts-sm col-2"><i class="fa fa-list mr-2"></i>MAPA GERAL</a>

                        </th>
                    </tr>
                </tfoot>
            </table>
        </div><!-- end table-responsive -->
    </form>