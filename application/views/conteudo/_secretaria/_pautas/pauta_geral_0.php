<div id="content" class="content">
  <h4 class="page-header text-uppercase"><i class="fa fa-list mr-5"></i>Pauta Geral -
    <?= $listagem_alunos->nome_classe; ?></h4>
  <div class="mt-5">
    <table class="table table-striped table-responsive table-bordered table-condensed text-uppercase">
      <thead>
        <tr>
          <th width="15%">Ano Lectivo:<span class="text-red">
              <?= $listagem_alunos->ano_let; ?></span></th>
          <th width="15%">Turma:<span class="text-red">
              <?= $listagem_alunos->nome_turma; ?></span></th>
          <th width="15%">Classe:<span class="text-red">
              <?= $listagem_alunos->nome_classe; ?></span></th>
          <th width="15%">Periodo:<span class="text-red">
              <?= $listagem_alunos->nome_periodo; ?></span></th>
          <th width="20%">Professor (a):<span class="text-red">
              <?= $prof->nome_funcionario; ?></span></th>
        </tr>
      </thead>
    </table>
  </div>
  <!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
  <div class="scroll col-12 overflow-x-scroll">
    <div class="pauta_geral_flex row">
      <div>
        <table class="table table-striped table-responsive table-bordered table-condensed text-uppercase">
          <thead class="bg-primary text-center">
            <tr>
              <th class="text-primary">.</th>
              <th class="text-primary">.</th>
              <th class="text-primary">.</th>
            </tr>
            <tr>
              <th class="text-light" nowrap>Nº.</th>
              <th class="text-light" nowrap>Nº. de Processo</th>
              <th class="text-light" nowrap>Nome Completo</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; foreach ($lista_alunos as $aluno) : ?>
            <tr>
              <td class="text-center"><?= $i; ?></td>
              <td class="text-center"><?= $aluno->num_processo; ?></td>
              <td nowrap><?= $aluno->nome; ?></td>
            </tr>
            <?php $i++; endforeach ?>
          </tbody>
        </table>
      </div>
      <div>
        <table class="table table-striped table-responsive table-bordered table-condensed text-uppercase">
          <thead class="bg-primary text-center">
            <tr>
              <th class="text-light" colspan="3">Rep. Matemática</th>
            </tr>
            <tr>
              <th class="text-light">MAC</th>
              <th class="text-light">CPP</th>
              <th class="text-light">CT</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($representacao_matematica as $mat) : ?>
            <tr>
              <td class="text-center"><?= $mat->mac_1 ?></td>
              <td class="text-center"><?= $mat->mac_1 ?></td>
              <td class="text-center"><?= $mat->mac_1 ?></td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <div>
        <table class="table table-striped table-responsive table-bordered table-condensed text-uppercase">
          <thead class="bg-primary text-center">
            <tr>
              <th class="text-light" colspan="3">C. Ling. e Lit. Inf.</th>
            </tr>
            <tr>
              <th class="text-light">MAC</th>
              <th class="text-light">CPP</th>
              <th class="text-light">CT</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($C_Ling_Literatura_Infant as $clli) : ?>
            <tr>
              <td class="text-center"><?= $mat->mac_1 ?></td>
              <td class="text-center"><?= $mat->mac_1 ?></td>
              <td class="text-center"><?= $mat->mac_1 ?></td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <div>
        <table class="table table-striped table-responsive table-bordered table-condensed text-uppercase">
          <thead class="bg-primary text-center">
            <tr>
              <th class="text-light" colspan="3">M. F. e Social</th>
            </tr>
            <tr>
              <th class="text-light">MAC</th>
              <th class="text-light">CPP</th>
              <th class="text-light">CT</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($Meio_Fisico_Social as $mfs) : ?>
            <tr>
              <td class="text-center"><?= $mat->mac_1 ?></td>
              <td class="text-center"><?= $mat->mac_1 ?></td>
              <td class="text-center"><?= $mat->mac_1 ?></td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <div>
        <table class="table table-striped table-responsive table-bordered table-condensed text-uppercase">
          <thead class="bg-primary text-center">
            <tr>
              <th class="text-light" colspan="3">Exp. Man. Plást.</th>
            </tr>
            <tr>
              <th class="text-light">MAC</th>
              <th class="text-light">CPP</th>
              <th class="text-light">CT</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($Exp_Manual_Plastica as $emp) : ?>
            <tr>
              <td class="text-center"><?= $mat->mac_1 ?></td>
              <td class="text-center"><?= $mat->mac_1 ?></td>
              <td class="text-center"><?= $mat->mac_1 ?></td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <div>
        <table class="table table-striped table-responsive table-bordered table-condensed text-uppercase">
          <thead class="bg-primary text-center">
            <tr>
              <th class="text-light" colspan="3">Exp. Musical</th>
            </tr>
            <tr>
              <th class="text-light">MAC</th>
              <th class="text-light">CPP</th>
              <th class="text-light">CT</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($Exp_Musical as $exp_music) : ?>
            <tr>
              <td class="text-center"><?= $mat->mac_1 ?></td>
              <td class="text-center"><?= $mat->mac_1 ?></td>
              <td class="text-center"><?= $mat->mac_1 ?></td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <div>
        <table class="table table-striped table-responsive table-bordered table-condensed text-uppercase">
          <thead class="bg-primary text-center">
            <tr>
              <th class="text-light" colspan="3">Psicomotricidade</th>
            </tr>
            <tr>
              <th class="text-light">MAC</th>
              <th class="text-light">CPP</th>
              <th class="text-light">CT</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($Psicomotricidade as $psicomotr) : ?>
            <tr>
              <td class="text-center"><?= $mat->mac_1 ?></td>
              <td class="text-center"><?= $mat->mac_1 ?></td>
              <td class="text-center"><?= $mat->mac_1 ?></td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="mt-1">
    <a href="<?= site_url('reports/exportar_pauta_0/'.$listagem_alunos->id_ano.'/'.$listagem_alunos->id_turma)?>"
      class="btn btn-success bts-sm col-2"><i class="fa fa-file-excel mr-2"></i>EXPORTAR PARA EXECEL</a>
  </div>
