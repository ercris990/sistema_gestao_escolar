<div id="content" class="content">
  <div class="row">
    <div class="col-6">
      <h4 class="page-header text-uppercase"><i class="fa fa-list mr-5"></i>MAPA DE FALTAS</h4>
    </div>
    <div class="col-6 text-right">
      <a href="<?= base_url('secretaria/listagem/listar_assiduidade_turma/'.$listagem_alunos->id_ano.'/'.$listagem_alunos->id_turma) ?>"
        class="btn btn-primary"><i class="fa fa-arrow-left mr-2"></i>PAGINA ANTERIOR</a>
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
  <div class="pauta_geral_flex row mx-auto">
    <div class="">
      <table class="table table-striped table-responsive table-bordered table-condensed text-uppercase">
        <thead class="bg-primary">
          <tr>
            <th class="text-light text-center align-middle">Nº.</th>
            <th class="text-light text-center align-middle" nowrap>Nº DE PROCESSO</th>
            <th class="text-light text-center align-middle">NOME DO ALUNO</th>
            <th class="text-light text-center align-middle">GÉNERO</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; foreach ($alunos as $aluno) : ?>
          <tr class="odd gradeX">
            <td class="text-center align-middle"><?= $i; ?></td>
            <td class="text-center align-middle"><?= $aluno->num_processo; ?></td>
            <td class="text-left align-middle" nowrap><?= $aluno->nome; ?></td>
            <td class="text-center align-middle"><?php
                                if ($aluno->genero_aluno == "Masculino"){echo"M";}
                                elseif($aluno->genero_aluno=="Feminino"){echo"F";}
                        ?></td>
          </tr>
          <?php $i++; endforeach ?>
        </tbody>
      </table>
    </div>
    <div class="">
      <table class="table table-striped table-responsive table-bordered table-condensed text-uppercase w-100">
        <thead class="bg-primary">
          <tr>
            <th class="text-light text-center align-middle">Nº DE Faltas</th>
            <th class="text-light text-center align-middle">Nº DE Faltas Justificada</th>
            <th class="text-light text-center align-middle">Nº DE Faltas Não Justificada</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; foreach ($num_faltas as $n_falta) : ?>
          <tr class="odd gradeX">
            <td class="text-center align-middle text-danger"><?= $n_falta->falta; ?></td>
            <td class="text-center align-middle text-primary"><?= $n_falta->justificacao; ?></td>
            <td class="text-center align-middle text-danger"><?php 
				$fnj = ($n_falta->falta - $n_falta->justificacao);
				echo $fnj;
			?></td>
          </tr>
          <?php $i++; endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
  <div>
    <a href="<?= site_url('mapa_faltas_alunos/exportar_mapa/'.$listagem_alunos->id_ano.'/'.$listagem_alunos->id_turma)?>"
      class="btn btn-success bts-sm col-2"><i class="fa fa-file-pdf mr-2"></i>EXPORTAR PARA EXECEL
    </a>
  </div>
