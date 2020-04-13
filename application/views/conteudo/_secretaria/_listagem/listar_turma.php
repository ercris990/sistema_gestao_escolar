<div id="content" class="content">
    <div class="row">
        <div class="col-6">
            <h4 class="page-header text-uppercase"><i class="fa fa-list mr-5"></i>LISTA NOMINAL</h4>
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
    <!-- begin table-responsive -->
    <div class="table-responsive">
        <table class="table table-striped table-hover table-condensed text-uppercase">
            <thead class="bg-primary">
                <tr>
                    <th class="text-light text-center" width="5%">Nº.</th>
                    <th class="text-light text-center" width="12%">Nº DE PROCESSO</th>
                    <th class="text-light text-center" width="45%">NOME DO ALUNO</th>
                    <th class="text-light text-center" width="15%">GÉNERO</th>
                    <th class="text-light text-center" width="20%">DATA DE NASCIMENTO</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; foreach ($alunos as $aluno) : ?>
                <tr class="odd gradeX">
                    <td class="text-center"><?= $i; ?></td>
                    <td class="text-center"><?= $aluno->num_processo; ?></td>
                    <td class="text-left"><?= $aluno->nome; ?></td>
                    <td class="text-center"><?= $aluno->genero_aluno; ?></td>
                    <td class="text-center"><?= date('d/m/Y', strtotime($aluno->nascimento_aluno)); ?></td>
                </tr>
                <?php $i++; endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <th class="text-right" colspan="5">
                        <a href=" <?= site_url('secretaria/listagem/listar_aluno_turma_pdf/'.$listagem_alunos->id_ano.'/'.$listagem_alunos->id_turma ) ?>"
                            class="btn btn-danger " target="_blank">
                            <i class="fa fa-file-pdf text-light mr-2"></i>Exportar para PDF
                        </a>
                    </th>
                </tr>
            </tfoot>
        </table>
    </div><!-- end table-responsive -->