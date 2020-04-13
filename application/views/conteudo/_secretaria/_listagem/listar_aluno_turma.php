<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <?= $this->session->flashdata('msg'); ?>
    <h4 class="page-header text-uppercase"><i class="fa fa-list mr-5"></i>
        Lista Nominal - Turma: <?= $listagem_alunos->nome_turma; ?> / <?= $listagem_alunos->ano_let; ?></h4>
    <!-- begin invoice-company -->
    <!-- end invoice-company -->
    <div class="mt-4">
        <div class="table-responsive">
            <table class="table text-uppercase">
                <thead>
                    <tr>
                        <th class="text-center" width="20%">Ano Lectivo:
                            <span class="text-red"><?= $listagem_alunos->ano_let; ?></span>
                        </th>
                        <th class="text-center" width="20%">Turma:
                            <span class="text-red"><?= $listagem_alunos->nome_turma; ?></span>
                        </th>
                        <th class="text-center" width="20%">Classe:
                            <span class="text-red"><?= $listagem_alunos->nome_classe; ?></span>
                        </th>
                        <th class="text-center" width="20%">Periodo:
                            <span class="text-red"><?= $listagem_alunos->nome_periodo; ?></span>
                        </th>
                        <th class="text-center" width="20%">Sala:
                            <span class="text-red"><?= $listagem_alunos->numero_sala; ?></span>
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
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
                    <td class="text-center"><?php 
                        if(($aluno->genero_aluno) == "Masculino"){
                            echo "M";
                        }else{
                            echo "F";
                        }
                    ?></td>
                    <td class="text-center"><?= date('d/m/Y', strtotime($aluno->nascimento_aluno)); ?></td>
                </tr>
                <?php $i++; endforeach ?>
            </tbody>
        </table>
    </div>

    <a href="<?= site_url('secretaria/listagem/listar_aluno_turma_pdf/'.$listagem_alunos->id_ano.'/'.$listagem_alunos->id_turma ) ?>"
        class="btn btn-danger btn-sm " target="_blank">
        <i class="fa fa-file-pdf mr-2"></i>GERAR PDF
    </a>

</div>