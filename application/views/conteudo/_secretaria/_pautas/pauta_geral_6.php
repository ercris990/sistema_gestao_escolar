<div id="content" class="content">
  <h4 class="page-header text-uppercase"><i class="fa fa-list mr-5"></i>
    Pauta Geral - <?= $listagem_alunos->nome_classe; ?>
  </h4>
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
    <div class="pauta_geral_flex">
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
              <th class="text-light" colspan="4">L. PORTUGUESA</th>
            </tr>
            <tr>
              <th class="text-light">CAP</th>
              <th class="text-light">CE</th>
              <th class="text-light">CF</th>
              <th class="text-light">NER</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($l_portuguesa as $l_p) : ?>
            <tr>
              <!-- CAP -->
              <td class="text-center"><?php 
                                $cap = (($l_p->ct_1 + $l_p->ct_2 + $l_p->ct_3)/3);
                                /* -------------------------------------- */
                                if ($cap==""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif ((number_format($cap,1) >= 0) && (number_format($cap,1) < 5)) {
                                    echo '<span style="color: red;">'.number_format($cap, 1).'</span>';
                                } elseif ((number_format($cap,1) >= 5) && (number_format($cap,1) <= 10)) {
                                    echo '<span style="color: black;">'.number_format($cap, 1).'</span>';
                                }
                            ?></td>
              <!-- CE -->
              <td class="text-center"><?php
                                if ($l_p->ce == ""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif (($l_p->ce >= 0) && ($l_p->ce < 5)) {
                                    echo '<span style="color: red;">'.number_format($l_p->ce, 1).'</span>';
                                } elseif (($l_p->ce >= 5) && ($l_p->ce <= 10)) {
                                    echo '<span style="color: black;">'.number_format($l_p->ce, 1).'</span>';
                                }
                            ?></td>
              <!-- CF -->
              <td class="text-center"><?php
                                $cap = (($l_p->ct_1 + $l_p->ct_2 + $l_p->ct_3)/3);
                                $cf_lp = ((0.4 * $cap) + (0.6 * $l_p->ce));
                                /* -------------------------------------- */
                                if ($cf_lp == ""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif (($cf_lp >= 0) && ($cf_lp < 5)) {
                                    echo '<span style="color: red;">'.number_format($cf_lp).'</span>';
                                } elseif (($cf_lp >= 5) && ($cf_lp <= 10)) {
                                    echo '<span style="color: black;">'.number_format($cf_lp).'</span>';
                                }
                            ?></td>
              <!-- MER -->
              <td class="text-center"><?php
                                if ($l_p->ner == ""){
                                        echo '<span style="color: red;"> - </span>';
                                    } elseif ((number_format($l_p->ner) >= 0) && (number_format($l_p->ner) < 5)) {
                                        echo '<span style="color: red;">'.number_format($l_p->ner).'</span>';
                                    } elseif ((number_format($l_p->ner) >= 5) && (number_format($l_p->ner) <= 10)) {
                                        echo '<span style="color: black;">'.number_format($l_p->ner).'</span>';
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
              <th class="text-light" colspan="4">MATEMÁTICA</th>
            </tr>
            <tr>
              <th class="text-light">CAP</th>
              <th class="text-light">CE</th>
              <th class="text-light">CF</th>
              <th class="text-light">NER</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($matematica as $mat) : ?>
            <tr>
              <!-- CAP -->
              <td class="text-center"><?php
                                $cap = (($mat->ct_1 + $mat->ct_2 + $mat->ct_3)/3);
                                /* -------------------------------------- */
                                if ($cap==""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif ((number_format($cap,1) >= 0) && (number_format($cap,1) < 5)) {
                                    echo '<span style="color: red;">'.number_format($cap, 1).'</span>';
                                } elseif ((number_format($cap,1) >= 5) && (number_format($cap,1) <= 10)) {
                                    echo '<span style="color: black;">'.number_format($cap, 1).'</span>';
                                }
                            ?></td>
              <!-- CE -->
              <td class="text-center"><?php
                                if ($mat->ce == ""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif (($mat->ce >= 0) && ($mat->ce < 5)) {
                                    echo '<span style="color: red;">'.number_format($mat->ce, 1).'</span>';
                                } elseif (($mat->ce >= 5) && ($mat->ce <= 10)) {
                                    echo '<span style="color: black;">'.number_format($mat->ce, 1).'</span>';
                                }
                            ?></td>
              <!-- CF -->
              <td class="text-center"><?php
                                $cap = (($mat->ct_1 + $mat->ct_2 + $mat->ct_3)/3);
                                $cf_mat = ((0.4 * $cap) + (0.6 * $mat->ce));
                                /* -------------------------------------- */
                                if ($cf_mat == ""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif (($cf_mat >= 0) && ($cf_mat < 5)) {
                                    echo '<span style="color: red;">'.number_format($cf_mat).'</span>';
                                } elseif (($cf_mat >= 5) && ($cf_mat <= 10)) {
                                    echo '<span style="color: black;">'.number_format($cf_mat).'</span>';
                                }
                            ?></td>
              <!-- MER -->
              <td class="text-center"><?php
                                if ($mat->ner == ""){
                                        echo '<span style="color: red;"> - </span>';
                                    } elseif ((number_format($mat->ner) >= 0) && (number_format($mat->ner) < 5)) {
                                        echo '<span style="color: red;">'.number_format($mat->ner).'</span>';
                                    } elseif ((number_format($mat->ner) >= 5) && (number_format($mat->ner) <= 10)) {
                                        echo '<span style="color: black;">'.number_format($mat->ner).'</span>';
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
              <th class="text-light" colspan="4">C. NATUREZA</th>
            </tr>
            <tr>
              <th class="text-light">CAP</th>
              <th class="text-light">CE</th>
              <th class="text-light">CF</th>
              <th class="text-light">NER</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($c_natureza as $c_nat) : ?>
            <tr>
              <!-- CAP -->
              <td class="text-center"><?php 
                                $cap = (($c_nat->ct_1 + $c_nat->ct_2 + $c_nat->ct_3)/3);
                                /* -------------------------------------- */
                                if ($cap==""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif ((number_format($cap,1) >= 0) && (number_format($cap,1) < 5)) {
                                    echo '<span style="color: red;">'.number_format($cap,1).'</span>';
                                } elseif ((number_format($cap,1) >= 5) && (number_format($cap,1) <= 10)) {
                                    echo '<span style="color: black;">'.number_format($cap,1).'</span>';
                                }
                            ?></td>
              <!-- CE -->
              <td class="text-center"><?php
                                if ($c_nat->ce==""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif ((number_format($c_nat->ce,1) >= 0) && (number_format($c_nat->ce,1) < 5)) {
                                    echo '<span style="color: red;">'.number_format($c_nat->ce,1).'</span>';
                                } elseif ((number_format($c_nat->ce,1) >= 5) && (number_format($c_nat->ce,1) <= 10)) {
                                    echo '<span style="color: black;">'.number_format($c_nat->ce,1).'</span>';
                                }
                            ?></td>
              <!-- CF -->
              <td class="text-center"><?php
                                $cap = (($c_nat->ct_1 + $c_nat->ct_2 + $c_nat->ct_3)/3);
                                $cf = ((0.4 * $cap) + (0.6 * $c_nat->ce));
                                /* -------------------------------------- */
                                if ($cf==""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif (($cf >= 0) && ($cf < 5)) {
                                    echo '<span style="color: red;">'.number_format($cf).'</span>';
                                } elseif (($cf >= 5) && ($cf <= 10)) {
                                    echo '<span style="color: black;">'.number_format($cf).'</span>';
                                }
                            ?></td>
              <!-- MER -->
              <td class="text-center"><?php
                                if ($c_nat->ner == ""){
                                        echo '<span style="color: red;"> - </span>';
                                    } elseif ((number_format($c_nat->ner) >= 0) && (number_format($c_nat->ner) < 5)) {
                                        echo '<span style="color: red;">'.number_format($c_nat->ner).'</span>';
                                    } elseif ((number_format($c_nat->ner) >= 5) && (number_format($c_nat->ner) <= 10)) {
                                        echo '<span style="color: black;">'.number_format($c_nat->ner).'</span>';
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
              <th class="text-light" colspan="4">GEOGRAFIA</th>
            </tr>
            <tr>
              <th class="text-light">CAP</th>
              <th class="text-light">CE</th>
              <th class="text-light">CF</th>
              <th class="text-light">NER</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($geografia as $geo) : ?>
            <tr>
              <!-- CAP -->
              <td class="text-center"><?php
                                $cap = (($geo->ct_1 + $geo->ct_2 + $geo->ct_3)/3);
                                /* -------------------------------------- */
                                if ($cap==""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif ((number_format($cap,1) >= 0) && (number_format($cap,1) < 5)) {
                                    echo '<span style="color: red;">'.number_format($cap, 1).'</span>';
                                } elseif ((number_format($cap,1) >= 5) && (number_format($cap,1) <= 10)) {
                                    echo '<span style="color: black;">'.number_format($cap, 1).'</span>';
                                }
                            ?></td>
              <!-- CE -->
              <td class="text-center"><?php
                                if ($geo->ce == ""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif (($geo->ce >= 0) && ($geo->ce < 5)) {
                                    echo '<span style="color: red;">'.number_format($geo->ce, 1).'</span>';
                                } elseif (($geo->ce >= 5) && ($geo->ce <= 10)) {
                                    echo '<span style="color: black;">'.number_format($geo->ce, 1).'</span>';
                                }
                            ?></td>
              <!-- CF -->
              <td class="text-center"><?php
                                $cap = (($geo->ct_1 + $geo->ct_2 + $geo->ct_3)/3);
                                $cf = ((0.4 * $cap) + (0.6 * $geo->ce));
                                /* -------------------------------------- */
                                if ($cf == ""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif (($cf >= 0) && ($cf < 5)) {
                                    echo '<span style="color: red;">'.number_format($cf).'</span>';
                                } elseif (($cf >= 5) && ($cf <= 10)) {
                                    echo '<span style="color: black;">'.number_format($cf).'</span>';
                                }
                            ?></td>
              <!-- MER -->
              <td class="text-center"><?php
                                if ($geo->ner == ""){
                                        echo '<span style="color: red;"> - </span>';
                                    } elseif ((number_format($geo->ner) >= 0) && (number_format($geo->ner) < 5)) {
                                        echo '<span style="color: red;">'.number_format($geo->ner).'</span>';
                                    } elseif ((number_format($geo->ner) >= 5) && (number_format($geo->ner) <= 10)) {
                                        echo '<span style="color: black;">'.number_format($geo->ner).'</span>';
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
              <th class="text-light" colspan="4">HISTÓRIA</th>
            </tr>
            <tr>
              <th class="text-light">CAP</th>
              <th class="text-light">CE</th>
              <th class="text-light">CF</th>
              <th class="text-light">NER</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($historia as $hist) : ?>
            <tr>
              <!-- CAP -->
              <td class="text-center"><?php
                                $cap = (($hist->ct_1 + $hist->ct_2 + $hist->ct_3)/3);
                                /* -------------------------------------- */
                                if ($cap==""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif ((number_format($cap,1) >= 0) && (number_format($cap,1) < 5)) {
                                    echo '<span style="color: red;">'.number_format($cap, 1).'</span>';
                                } elseif ((number_format($cap,1) >= 5) && (number_format($cap,1) <= 10)) {
                                    echo '<span style="color: black;">'.number_format($cap, 1).'</span>';
                                }
                            ?></td>
              <!-- CE -->
              <td class="text-center"><?php
                                if ($hist->ce == ""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif (($hist->ce >= 0) && ($hist->ce < 5)) {
                                    echo '<span style="color: red;">'.number_format($hist->ce, 1).'</span>';
                                } elseif (($hist->ce >= 5) && ($hist->ce <= 10)) {
                                    echo '<span style="color: black;">'.number_format($hist->ce, 1).'</span>';
                                }
                            ?></td>
              <!-- CF -->
              <td class="text-center"><?php
                                $cap = (($hist->ct_1 + $hist->ct_2 + $hist->ct_3)/3);
                                $cf = ((0.4 * $cap) + (0.6 * $hist->ce));
                                /* -------------------------------------- */
                                if ($cf == ""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif (($cf >= 0) && ($cf < 5)) {
                                    echo '<span style="color: red;">'.number_format($cf).'</span>';
                                } elseif (($cf >= 5) && ($cf <= 10)) {
                                    echo '<span style="color: black;">'.number_format($cf).'</span>';
                                }
                            ?></td>
              <!-- MER -->
              <td class="text-center"><?php
                                if ($hist->ner == ""){
                                        echo '<span style="color: red;"> - </span>';
                                    } elseif ((number_format($hist->ner) >= 0) && (number_format($hist->ner) < 5)) {
                                        echo '<span style="color: red;">'.number_format($hist->ner).'</span>';
                                    } elseif ((number_format($hist->ner) >= 5) && (number_format($hist->ner) <= 10)) {
                                        echo '<span style="color: black;">'.number_format($hist->ner).'</span>';
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
              <th class="text-light" colspan="4">E. M. PLÁSTICA</th>
            </tr>
            <tr>
              <th class="text-light">CAP</th>
              <th class="text-light">CE</th>
              <th class="text-light">CF</th>
              <th class="text-light">NER</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($e_m_p as $emp) : ?>
            <tr>
              <!-- CAP -->
              <td class="text-center"><?php
                                $cap = (($emp->ct_1 + $emp->ct_2 + $emp->ct_3)/3);
                                /* -------------------------------------- */
                                if ($cap==""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif ((number_format($cap,1) >= 0) && (number_format($cap,1) < 5)) {
                                    echo '<span style="color: red;">'.number_format($cap, 1).'</span>';
                                } elseif ((number_format($cap,1) >= 5) && (number_format($cap,1) <= 10)) {
                                    echo '<span style="color: black;">'.number_format($cap, 1).'</span>';
                                }
                            ?></td>
              <!-- CE -->
              <td class="text-center"><?php
                                if ($emp->ce == ""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif (($emp->ce >= 0) && ($emp->ce < 5)) {
                                    echo '<span style="color: red;">'.number_format($emp->ce, 1).'</span>';
                                } elseif (($emp->ce >= 5) && ($emp->ce <= 10)) {
                                    echo '<span style="color: black;">'.number_format($emp->ce, 1).'</span>';
                                }
                            ?></td>
              <!-- CF -->
              <td class="text-center"><?php
                                $cap = (($emp->ct_1 + $emp->ct_2 + $emp->ct_3)/3);
                                $cf = ((0.4 * $cap) + (0.6 * $emp->ce));
                                /* -------------------------------------- */
                                if ($cf == ""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif (($cf >= 0) && ($cf < 5)) {
                                    echo '<span style="color: red;">'.number_format($cf).'</span>';
                                } elseif (($cf >= 5) && ($cf <= 10)) {
                                    echo '<span style="color: black;">'.number_format($cf).'</span>';
                                }
                            ?></td>
              <!-- MER -->
              <td class="text-center"><?php
                                if ($emp->ner == ""){
                                        echo '<span style="color: red;"> - </span>';
                                    } elseif ((number_format($emp->ner) >= 0) && (number_format($emp->ner) < 5)) {
                                        echo '<span style="color: red;">'.number_format($emp->ner).'</span>';
                                    } elseif ((number_format($emp->ner) >= 5) && (number_format($emp->ner) <= 10)) {
                                        echo '<span style="color: black;">'.number_format($emp->ner).'</span>';
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
              <th class="text-light" colspan="4">E. M. CÍVICA</th>
            </tr>
            <tr>
              <th class="text-light">CAP</th>
              <th class="text-light">CE</th>
              <th class="text-light">CF</th>
              <th class="text-light">NER</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($e_m_c as $emc) : ?>
            <tr>
              <!-- CAP -->
              <td class="text-center"><?php
                                $cap = (($emc->ct_1 + $emc->ct_2 + $emc->ct_3)/3);
                                /* -------------------------------------- */
                                if ($cap==""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif ((number_format($cap,1) >= 0) && (number_format($cap,1) < 5)) {
                                    echo '<span style="color: red;">'.number_format($cap, 1).'</span>';
                                } elseif ((number_format($cap,1) >= 5) && (number_format($cap,1) <= 10)) {
                                    echo '<span style="color: black;">'.number_format($cap, 1).'</span>';
                                }
                            ?></td>
              <!-- CE -->
              <td class="text-center"><?php
                                if ($emc->ce == ""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif (($emc->ce >= 0) && ($emc->ce < 5)) {
                                    echo '<span style="color: red;">'.number_format($emc->ce, 1).'</span>';
                                } elseif (($emc->ce >= 5) && ($emc->ce <= 10)) {
                                    echo '<span style="color: black;">'.number_format($emc->ce, 1).'</span>';
                                }
                            ?></td>
              <!-- CF -->
              <td class="text-center"><?php
                                $cap = (($emc->ct_1 + $emc->ct_2 + $emc->ct_3)/3);
                                $cf = ((0.4 * $cap) + (0.6 * $emc->ce));
                                /* -------------------------------------- */
                                if ($cf == ""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif (($cf >= 0) && ($cf < 5)) {
                                    echo '<span style="color: red;">'.number_format($cf).'</span>';
                                } elseif (($cf >= 5) && ($cf <= 10)) {
                                    echo '<span style="color: black;">'.number_format($cf).'</span>';
                                }
                            ?></td>
              <!-- MER -->
              <td class="text-center"><?php
                                if ($emc->ner == ""){
                                        echo '<span style="color: red;"> - </span>';
                                    } elseif ((number_format($emc->ner) >= 0) && (number_format($emc->ner) < 5)) {
                                        echo '<span style="color: red;">'.number_format($emc->ner).'</span>';
                                    } elseif ((number_format($emc->ner) >= 5) && (number_format($emc->ner) <= 10)) {
                                        echo '<span style="color: black;">'.number_format($emc->ner).'</span>';
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
              <th class="text-light" colspan="4">ED. FÍSICA</th>
            </tr>
            <tr>
              <th class="text-light">CAP</th>
              <th class="text-light">CE</th>
              <th class="text-light">CF</th>
              <th class="text-light">NER</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($ed_fisica as $e_f) : ?>
            <tr>
              <!-- CAP -->
              <td class="text-center"><?php
                                $cap = (($e_f->ct_1 + $e_f->ct_2 + $e_f->ct_3)/3);
                                /* -------------------------------------- */
                                if ($cap==""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif ((number_format($cap,1) >= 0) && (number_format($cap,1) < 5)) {
                                    echo '<span style="color: red;">'.number_format($cap, 1).'</span>';
                                } elseif ((number_format($cap,1) >= 5) && (number_format($cap,1) <= 10)) {
                                    echo '<span style="color: black;">'.number_format($cap, 1).'</span>';
                                }
                            ?></td>
              <!-- CE -->
              <td class="text-center"><?php
                                if ($e_f->ce == ""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif (($e_f->ce >= 0) && ($e_f->ce < 5)) {
                                    echo '<span style="color: red;">'.number_format($e_f->ce, 1).'</span>';
                                } elseif (($e_f->ce >= 5) && ($e_f->ce <= 10)) {
                                    echo '<span style="color: black;">'.number_format($e_f->ce, 1).'</span>';
                                }
                            ?></td>
              <!-- CF -->
              <td class="text-center"><?php
                                $cap = (($e_f->ct_1 + $e_f->ct_2 + $e_f->ct_3)/3);
                                $cf = ((0.4 * $cap) + (0.6 * $e_f->ce));
                                /* -------------------------------------- */
                                if ($cf == ""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif (($cf >= 0) && ($cf < 5)) {
                                    echo '<span style="color: red;">'.number_format($cf).'</span>';
                                } elseif (($cf >= 5) && ($cf <= 10)) {
                                    echo '<span style="color: black;">'.number_format($cf).'</span>';
                                }
                            ?></td>
              <!-- MER -->
              <td class="text-center"><?php
                                if ($e_f->ner == ""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif (($e_f->ner >= 0) && ($e_f->ner < 5)) {
                                    echo '<span style="color: red;">'.number_format($e_f->ner, 1).'</span>';
                                } elseif (($e_f->ner >= 5) && ($e_f->ner <= 10)) {
                                    echo '<span style="color: black;">'.number_format($e_f->ner, 1).'</span>';
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
              <th class="text-light" colspan="4">ED. MUSICAL</th>
            </tr>
            <tr>
              <th class="text-light">CAP</th>
              <th class="text-light">CE</th>
              <th class="text-light">CF</th>
              <th class="text-light">NER</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($ed_musical as $e_m) : ?>
            <tr>
              <!-- CAP -->
              <td class="text-center"><?php
                                $cap = (($e_m->ct_1 + $e_m->ct_2 + $e_m->ct_3)/3);
                                /* -------------------------------------- */
                                if ($cap==""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif ((number_format($cap,1) >= 0) && (number_format($cap,1) < 5)) {
                                    echo '<span style="color: red;">'.number_format($cap, 1).'</span>';
                                } elseif ((number_format($cap,1) >= 5) && (number_format($cap,1) <= 10)) {
                                    echo '<span style="color: black;">'.number_format($cap, 1).'</span>';
                                }
                            ?></td>
              <!-- CE -->
              <td class="text-center"><?php
                                if ($e_m->ce == ""){
                                    echo '<span style="color: red;"> - </span>';
                                } elseif (($e_m->ce >= 0) && ($e_m->ce < 5)) {
                                    echo '<span style="color: red;">'.number_format($e_m->ce, 1).'</span>';
                                } elseif (($e_m->ce >= 5) && ($e_m->ce <= 10)) {
                                    echo '<span style="color: black;">'.number_format($e_m->ce, 1).'</span>';
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
              <!-- NER -->
              <td class="text-center"><?php
                                if ($e_m->ner == ""){
                                        echo '<span style="color: red;"> - </span>';
                                    } elseif ((number_format($e_m->ner) >= 0) && (number_format($e_m->ner) < 5)) {
                                        echo '<span style="color: red;">'.number_format($e_m->ner).'</span>';
                                    } elseif ((number_format($e_m->ner) >= 5) && (number_format($e_m->ner) <= 10)) {
                                        echo '<span style="color: black;">'.number_format($e_m->ner).'</span>';
                                    }
                                ?></td>
              </td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="mt-1">
    <a href="<?= site_url('pautas_xls/pauta_xls_06/export_xls_06/'.$listagem_alunos->id_ano.'/'.$listagem_alunos->id_turma)?>"
      class="btn btn-success bts-sm"><i class="fa fa-file-excel mr-2"></i>EXPORTAR PARA EXECEL</a>
  </div>
