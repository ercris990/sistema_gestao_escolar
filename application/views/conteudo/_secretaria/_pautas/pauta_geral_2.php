<div id="content" class="content">
  <h4 class="page-header text-uppercase"><i class="fa fa-list mr-5"></i>
    Pauta Geral - <?= $listagem_alunos->nome_classe; ?></h4>
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
              <th class="text-light" colspan="3">L. PORTUGUESA</th>
            </tr>
            <tr>
              <th class="text-light">CAP</th>
              <th class="text-light">CPE</th>
              <th class="text-light">CF</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($l_portuguesa as $l_p) : ?>
            <tr>
              <!-- CAP -->
              <td class="text-center"><?php 
                                $cap = (($l_p->ct_1 + $l_p->ct_2 + $l_p->ct_3)/3);
                                /* -------------------------------------- */
                                if ($cap == ""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif ((number_format($cap,1) >= 0) && (number_format($cap,1) < 5)) {
                                    echo '<span style="color: red;">'.number_format($cap,1).'</span>';
                                } elseif ((number_format($cap,1) >= 5) && (number_format($cap,1) <= 10)) {
                                    echo '<span style="color: black;">'.number_format($cap,1).'</span>';
                                }
                            ?></td>
              <!-- CE -->
              <td class="text-center"><?php
                                if ($l_p->ce == ""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif ((number_format($l_p->ce,1) >= 0) && (number_format($l_p->ce,1) < 5)) {
                                    echo '<span style="color: red;">'.number_format($l_p->ce,1).'</span>';
                                } elseif ((number_format($l_p->ce,1) >= 5) && (number_format($l_p->ce,1) <= 10)) {
                                    echo '<span style="color: black;">'.number_format($l_p->ce,1).'</span>';
                                }
                            ?></td>
              <!-- CF -->
              <td class="text-center"><?php
                                /* -------------------------------------- */
                                $cap = (($l_p->ct_1 + $l_p->ct_2 + $l_p->ct_3)/3);
                                $cf = ((0.4 * $cap) + (0.6 * $l_p->ce));
                                /* -------------------------------------- */
                                if ($cf == ""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif ((number_format($cf) >= 0) && (number_format($cf) < 5)) {
                                    echo '<span style="color: red;">'.number_format($cf).'</span>';
                                } elseif ((number_format($cf) >= 5) && (number_format($cf) <= 10)) {
                                    echo '<span style="color: black;">'.number_format($cf).'</span>';
                                }
                            ?></td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <div>
        <table class="table table-striped table-responsive table-bordered table-condensed text-uppercase">
          <thead class="bg-primary text-center">
            <tr>
              <th class="text-light" colspan="3">MATEMÁTICA</th>
            </tr>
            <tr>
              <th class="text-light">CAP</th>
              <th class="text-light">CPE</th>
              <th class="text-light">CF</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($matematica as $mat) : ?>
            <tr>
              <!-- CAP -->
              <td class="text-center"><?php 
                                $cap = (($mat->ct_1 + $mat->ct_2 + $mat->ct_3)/3);
                                /* -------------------------------------- */
                                if ($cap == ""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif ((number_format($cap,1) >= 0) && (number_format($cap,1) < 5)) {
                                    echo '<span style="color: red;">'.number_format($cap,1).'</span>';
                                } elseif ((number_format($cap,1) >= 5) && (number_format($cap,1) <= 10)) {
                                    echo '<span style="color: black;">'.number_format($cap,1).'</span>';
                                }
                            ?></td>
              <!-- CE -->
              <td class="text-center"><?php
                                if ($mat->ce == ""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif ((number_format($mat->ce,1) >= 0) && (number_format($mat->ce,1) < 5)) {
                                    echo '<span style="color: red;">'.number_format($mat->ce,1).'</span>';
                                } elseif ((number_format($mat->ce,1) >= 5) && (number_format($mat->ce,1) <= 10)) {
                                    echo '<span style="color: black;">'.number_format($mat->ce, 1).'</span>';
                                }
                            ?></td>
              <!-- CF -->
              <td class="text-center"><?php
                                $cap = (($mat->ct_1 + $mat->ct_2 + $mat->ct_3)/3);
                                $cf = ((0.4 * $cap) + (0.6 * $mat->ce));
                                /* -------------------------------------- */
                                if ($cf == ""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif ((number_format($cf) >= 0) && (number_format($cf) < 5)) {
                                    echo '<span style="color: red;">'.number_format($cf).'</span>';
                                } elseif ((number_format($cf) >= 5) && (number_format($cf) <= 10)) {
                                    echo '<span style="color: black;">'.number_format($cf).'</span>';
                                }
                            ?></td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <div>
        <table class="table table-striped table-responsive table-bordered table-condensed text-uppercase">
          <thead class="bg-primary text-center">
            <tr>
              <th class="text-light" colspan="3">ESTUDO DO MEIO</th>
            </tr>
            <tr>
              <th class="text-light">CAP</th>
              <th class="text-light">CPE</th>
              <th class="text-light">CF</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($estudo_meio as $e_meio) : ?>
            <tr>
              <!-- CAP -->
              <td class="text-center"><?php
                                $cap = (($e_meio->ct_1 + $e_meio->ct_2 + $e_meio->ct_3)/3);
                                /* -------------------------------------- */
                                if ($cap == ""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif ((number_format($cap,1) >= 0) && (number_format($cap,1) < 5)) {
                                    echo '<span style="color: red;">'.number_format($cap,1).'</span>';
                                } elseif ((number_format($cap,1) >= 5) && (number_format($cap,1) <= 10)) {
                                    echo '<span style="color: black;">'.number_format($cap,1).'</span>';
                                }
                            ?></td>
              <!-- CE -->
              <td class="text-center"><?php
                                if ($e_meio->ce == ""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif ((number_format($e_meio->ce,1) >= 0) && (number_format($e_meio->ce,1) < 5)) {
                                    echo '<span style="color: red;">'.number_format($e_meio->ce, 1).'</span>';
                                } elseif ((number_format($e_meio->ce,1) >= 5) && (number_format($e_meio->ce,1) <= 10)) {
                                    echo '<span style="color: black;">'.number_format($e_meio->ce, 1).'</span>';
                                }
                            ?></td>
              <!-- CF -->
              <td class="text-center"><?php
                                $cap = (($e_meio->ct_1 + $e_meio->ct_2 + $e_meio->ct_3)/3);
                                $cf = ((0.4 * $cap) + (0.6 * $e_meio->ce));
                                /* -------------------------------------- */
                                if ($cf == ""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif ((number_format($cf) >= 0) && (number_format($cf) < 5)) {
                                    echo '<span style="color: red;">'.number_format($cf).'</span>';
                                } elseif ((number_format($cf) >= 5) && (number_format($cf) <= 10)) {
                                    echo '<span style="color: black;">'.number_format($cf).'</span>';
                                }
                            ?></td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <div>
        <table class="table table-striped table-responsive table-bordered table-condensed text-uppercase">
          <thead class="bg-primary text-center">
            <tr>
              <th class="text-light" colspan="3">ED. MUSICAL</th>
            </tr>
            <tr>
              <th class="text-light">CAP</th>
              <th class="text-light">CPE</th>
              <th class="text-light">CF</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($ed_musical as $e_m) : ?>
            <tr>
              <!-- CAP -->
              <td class="text-center"><?php
                                $cap = (($e_m->ct_1 + $e_m->ct_2 + $e_m->ct_3)/3);
                                /* -------------------------------------- */
                                if ($cap == ""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif ((number_format($cap,1) >= 0) && (number_format($cap,1) < 5)) {
                                    echo '<span style="color: red;">'.number_format($cap,1).'</span>';
                                } elseif ((number_format($cap,1) >= 5) && (number_format($cap,1) <= 10)) {
                                    echo '<span style="color: black;">'.number_format($cap,1).'</span>';
                                }
                            ?></td>
              <!-- CE -->
              <td class="text-center"><?php
                                if ($e_m->ce == ""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif ((number_format($e_m->ce,1)>= 0) && (number_format($e_m->ce,1)< 5)) {
                                    echo '<span style="color: red;">'.number_format($e_m->ce,1).'</span>';
                                } elseif ((number_format($e_m->ce,1)>= 5) && (number_format($e_m->ce,1)<= 10)) {
                                    echo '<span style="color: black;">'.number_format($e_m->ce,1).'</span>';
                                }
                            ?></td>
              <!-- CF -->
              <td class="text-center"><?php
                                $cap = (($e_m->ct_1 + $e_m->ct_2 + $e_m->ct_3)/3);
                                $cf = ((0.4 * $cap) + (0.6 * $e_m->ce));
                                /* -------------------------------------- */
                                if ($cf == ""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif ((number_format($cf) >= 0) && (number_format($cf) < 5)) {
                                    echo '<span style="color: red;">'.number_format($cf).'</span>';
                                } elseif ((number_format($cf) >= 5) && (number_format($cf) <= 10)) {
                                    echo '<span style="color: black;">'.number_format($cf).'</span>';
                                }
                            ?></td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <div>
        <table class="table table-striped table-responsive table-bordered table-condensed text-uppercase">
          <thead class="bg-primary text-center">
            <tr>
              <th class="text-light" colspan="3">ED. FÍSICA</th>
            </tr>
            <tr>
              <th class="text-light">CAP</th>
              <th class="text-light">CPE</th>
              <th class="text-light">CF</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($ed_fisica as $e_f) : ?>
            <tr>
              <!-- CAP -->
              <td class="text-center"><?php
                                $cap = (($e_f->ct_1 + $e_f->ct_2 + $e_f->ct_3)/3);
                                /* -------------------------------------- */
                                if ($cap == ""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif ((number_format($cap,1) >= 0) && (number_format($cap,1) < 5)) {
                                    echo '<span style="color: red;">'.number_format($cap,1).'</span>';
                                } elseif ((number_format($cap,1) >= 5) && (number_format($cap,1) <= 10)) {
                                    echo '<span style="color: black;">'.number_format($cap,1).'</span>';
                                }
                            ?></td>
              <!-- CE -->
              <td class="text-center"><?php
                                if ($e_f->ce == ""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif ((number_format($e_f->ce,1) >= 0) && (number_format($e_f->ce,1) < 5)) {
                                    echo '<span style="color: red;">'.number_format($e_f->ce,1).'</span>';
                                } elseif ((number_format($e_f->ce,1) >= 5) && (number_format($e_f->ce,1) <= 10)) {
                                    echo '<span style="color: black;">'.number_format($e_f->ce,1).'</span>';
                                }
                            ?></td>
              <!-- CF -->
              <td class="text-center"><?php
                                $cap = (($e_f->ct_1 + $e_f->ct_2 + $e_f->ct_3)/3);
                                $cf = ((0.4 * $cap) + (0.6 * $e_f->ce));
                                /* -------------------------------------- */
                                if ($cf == ""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif ((number_format($cf)>= 0) && (number_format($cf)< 5)) {
                                    echo '<span style="color: red;">'.number_format($cf).'</span>';
                                } elseif ((number_format($cf)>= 5) && (number_format($cf)<= 10)) {
                                    echo '<span style="color: black;">'.number_format($cf).'</span>';
                                }
                            ?></td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <div>
        <table class="table table-striped table-responsive table-bordered table-condensed text-uppercase">
          <thead class="bg-primary text-center">
            <tr>
              <th class="text-light" colspan="3">E. M. P.</th>
            </tr>
            <tr>
              <th class="text-light">CAP</th>
              <th class="text-light">CPE</th>
              <th class="text-light">CF</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($ed_plastica as $emp) : ?>
            <tr>
              <!-- CAP -->
              <td class="text-center"><?php
                                $cap = (($emp->ct_1 + $emp->ct_2 + $emp->ct_3)/3);
                                /* -------------------------------------- */
                                if ($cap == ""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif ((number_format($cap,1) >= 0) && (number_format($cap,1) < 5)) {
                                    echo '<span style="color: red;">'.number_format($cap,1).'</span>';
                                } elseif ((number_format($cap,1) >= 5) && (number_format($cap,1) <= 10)) {
                                    echo '<span style="color: black;">'.number_format($cap,1).'</span>';
                                }
                            ?></td>
              <!-- CE -->
              <td class="text-center"><?php
                                if ($emp->ce == ""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif ((number_format($emp->ce,1) >= 0) && (number_format($emp->ce,1) < 5)) {
                                    echo '<span style="color: red;">'.number_format($emp->ce,1).'</span>';
                                } elseif ((number_format($emp->ce,1) >= 5) && (number_format($emp->ce,1) <= 10)) {
                                    echo '<span style="color: black;">'.number_format($emp->ce,1).'</span>';
                                }
                            ?></td>
              <!-- CF -->
              <td class="text-center"><?php
                                $cap = (($emp->ct_1 + $emp->ct_2 + $emp->ct_3)/3);
                                $cf = ((0.4 * $cap) + (0.6 * $emp->ce));
                                /* -------------------------------------- */
                                if ($cf == ""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif ((number_format($cf) >= 0) && (number_format($cf) < 5)) {
                                    echo '<span style="color: red;">'.number_format($cf).'</span>';
                                } elseif ((number_format($cf) >= 5) && (number_format($cf) <= 10)) {
                                    echo '<span style="color: black;">'.number_format($cf).'</span>';
                                }
                            ?></td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="mt-1">
    <a href="<?= site_url('pautas_xls/pauta_xls_02/export_xls_02/'.$listagem_alunos->id_ano.'/'.$listagem_alunos->id_turma)?>"
      class="btn btn-success bts-sm"><i class="fa fa-file-excel mr-2"></i>EXPORTAR PARA EXECEL</a>
  </div>
