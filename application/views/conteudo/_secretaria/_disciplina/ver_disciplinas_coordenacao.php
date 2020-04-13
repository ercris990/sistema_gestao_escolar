<div id="content" class="content">
    <div class="row">
        <div class="col-6">
            <h4 class="page-header text-uppercase"><i class="fa fa-list mr-5"></i>DISCIPLINAS</h4>
        </div>
        <div class="col-6 text-right">
            <a href="<?= base_url('secretaria/listagem/mini_pautas') ?>" class="btn btn-primary"><i
                    class="fa fa-arrow-left mr-2"></i>PAGINA ANTERIOR</a>
        </div>
    </div>
    <!-- ------------------------------------------------------------------------------------ -->
    <div class="table-responsive table-info">
        <table class="table table-striped border-top">
            <thead>
                <!------------------------------------------------------------------------------------------------------->
                <tr class="text-uppercase">
                    <th class="text-center" width="25%">Ano Lectivo:
                        <span class="text-red"><?= $listagem_alunos->ano_let; ?></span>
                    </th>
                    <th class="text-center" width="25%">Turma:
                        <span class="text-red"><?= $listagem_alunos->nome_turma; ?></span>
                    </th>
                    <th class="text-center" width="25%">Classe:
                        <span class="text-red"><?= $listagem_alunos->nome_classe; ?></span>
                    </th>
                    <th class="text-center" width="25%">Periodo: 
                        <span class="text-red"><?= $listagem_alunos->nome_periodo; ?></span>
                    </th>
                </tr>
            </thead>
        </table>
    </div>
    <!-- begin table-responsive -->
    <div class="table-responsive">
        <table class="table table-striped table-hover text-uppercase">
            <thead class="bg-primary">
                <tr class="text-center">
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; foreach ($disciplinas as $disc) : ?>
                <tr>
                    <td class="align-middle text-right">
                        <!------------------------------------------------------------------------------------------------------------------------->
                        <a href="<?= site_url('secretaria/listagem/mini_pautas_coordenacao/'.$disc->id_ano.'/'.$disc->id_turma.'/'.$disc->id_disciplina.'/'.$disc->id_classe)?>"
                            class="btn btn-block btn-outline-primary text-left"><i class="fa fa-plus mr-2"></i><?= $disc->nome_disciplina; ?>
                        </a>
                    </td>
                </tr>
                <?php $i++; endforeach ?>
            </tbody>
        </table>
    </div><!-- end table-responsive -->