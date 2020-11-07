<div id="content" class="content">
  <div class="row">
    <div class="col-6">
      <h4 class="page-header text-uppercase"><i class="fa fa-list mr-5"></i>MINI PAUTA -
        <?= $listagem_alunos->nome_disciplina; ?></h4>
    </div>
    <div class="col-6 text-right">
      <a href="<?= base_url('secretaria/listagem/listar_disciplinas/'.$listagem_alunos->id_ano.'/'.$listagem_alunos->id_turma.'/'.$listagem_alunos->id_disciplina) ?>"
        class="btn btn-primary"><i class="fa fa-arrow-left mr-2"></i>PAGINA ANTERIOR</a>
    </div>
  </div>
  <?= $this->session->flashdata('msg'); ?>
  <!-- ------------------------------------------------------------------------------------ -->
  <div class="table-responsive table-info">
    <table class="table">
      <thead>
        <tr class="text-uppercase table-info">
          <th class="text-center" width="15%">Ano Lectivo:
            <span class="text-danger"><?= $listagem_alunos->ano_let; ?></span>
          </th>
          <th class="text-center" width="15%">Turma:
            <span class="text-danger"><?= $listagem_alunos->nome_turma; ?></span>
          </th>
          <th class="text-center" width="15%">Classe:
            <span class="text-danger"><?= $listagem_alunos->nome_classe; ?></span>
          </th>
          <th class="text-center" width="15%">Periodo:
            <span class="text-danger"><?= $listagem_alunos->nome_periodo; ?></span>
          </th>
          <th class="text-center" width="30%">Disciplina:
            <span class="text-danger"><?= $listagem_alunos->nome_disciplina; ?></span>
          </th>
        </tr>
      </thead>
    </table>
  </div>
  <!-- begin table-responsive -->
  <div class="table-responsive">
    <table class="table table-striped table-condensed table-hover table-bordered text-uppercase">
      <thead class="bg-primary">
        <tr>
          <th class="text-center text-light align-middle" rowspan="2" width="1%">Nº.</th>
          <th class="text-center text-light align-middle" rowspan="2" width="%">DISCIPLINA </th>
          <th class="text-center text-light" colspan="3">1º TRIMESTRE </th>
          <th class="text-center text-light" colspan="3">2º TRIMESTRE </th>
          <th class="text-center text-light" colspan="3">3º TRIMESTRE </th>
          <!----------------------------------------------------------------------->
          <th class="text-center align-middle text-light" rowspan="2" width="1%">CAP</th>
          <th class="text-center align-middle text-light" rowspan="2" width="1%">CE</th>
          <th class="text-center align-middle text-light" rowspan="2" width="1%">CF</th>
          <!----------------------------------------------------------------------->
          <th class="text-center text-light" rowspan="2" width="1%"></th>
        </tr>
        <tr>
          <!----------------------------------------------------------------------->
          <th class="text-center text-light">MAC</th>
          <th class="text-center text-light">CPP</th>
          <th class="text-center text-light">CT</th>
          <!----------------------------------------------------------------------->
          <th class="text-center text-light">MAC</th>
          <th class="text-center text-light">CPP</th>
          <th class="text-center text-light">CT</th>
          <!----------------------------------------------------------------------->
          <th class="text-center text-light">MAC</th>
          <th class="text-center text-light">CPP</th>
          <th class="text-center text-light">CT</th>
          <!----------------------------------------------------------------------->
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; foreach ($alunos as $aluno) : ?>
        <tr class="text-center">
          <td class="text-center align-middle"> <?= $i; ?> </td>
          <td class="text-left align-middle" nowrap> <?= $aluno->nome; ?> </td>
          <!-- <td> <?= $aluno->num_processo; ?> </td> -->
          <!-- <td> <?= $aluno->genero_aluno; ?> </td> -->
          <!-- <td> <?= date('d/m/Y', strtotime($aluno->nascimento_aluno)); ?> </td> -->
          <!-- MAC 1 -->
          <!----------------------------------------------------------------------->
          <td class="text-center align-middle">
            <?php
                            if ($aluno->mac_1 == ""){
                                echo '<span style="color: red;"> - </span>';
                            } elseif ((number_format($aluno->mac_1,1) >= 0) && (number_format($aluno->mac_1,1) < 5)) {
                                echo '<span style="color: red;">'.number_format($aluno->mac_1,1).'</span>';
                            } elseif ((number_format($aluno->mac_1,1) >= 5) && (number_format($aluno->mac_1,1) <= 10)) {
                                echo '<span style="color: black;">'.number_format($aluno->mac_1,1).'</span>';
                            }
                        ?>
          </td>
          <!-- CPP 1 -->
          <!----------------------------------------------------------------------->
          <td class="text-center align-middle">
            <?php
                            if ($aluno->cpp_1 == ""){
                                echo '<span style="color: red;"> - </span>';
                            } elseif ((number_format($aluno->cpp_1,1) >= 0) && (number_format($aluno->cpp_1,1) < 5)) {
                                echo '<span style="color: red;">'.number_format($aluno->cpp_1,1).'</span>';
                            } elseif ((number_format($aluno->cpp_1,1) >= 5) && (number_format($aluno->cpp_1,1) <= 10)) {
                                echo '<span style="color: black;">'.number_format($aluno->cpp_1,1).'</span>';
                            }
                        ?>
          </td>
          <!-- CT 1 -->
          <!----------------------------------------------------------------------->
          <td class="text-center align-middle">
            <?php
                            if ($aluno->ct_1 == ""){
                                echo '<span style="color: red;"> - </span>';
                            } elseif ((number_format($aluno->ct_1,1) >= 0) && (number_format($aluno->ct_1,1) < 5)) {
                                echo '<span style="color: red;">'.number_format($aluno->ct_1,1).'</span>';
                            } elseif ((number_format($aluno->ct_1,1) >= 5) && (number_format($aluno->ct_1,1) <= 10)) {
                                echo '<span style="color: black;">'.number_format($aluno->ct_1,1).'</span>';
                            }
                        ?>
          </td>
          <!-- MAC 2 -->
          <!----------------------------------------------------------------------->
          <td class="text-center align-middle">
            <?php
                            if ($aluno->mac_2 == ""){
                                echo '<span style="color: red;"> - </span>';
                            } elseif ((number_format($aluno->mac_2,1) >= 0) && (number_format($aluno->mac_2,1) < 5)) {
                                echo '<span style="color: red;">'.number_format($aluno->mac_2,1).'</span>';
                            } elseif ((number_format($aluno->mac_2,1) >= 5) && (number_format($aluno->mac_2,1) <= 10)) {
                                echo '<span style="color: black;">'.number_format($aluno->mac_2,1).'</span>';
                            }
                        ?>
          </td>
          <!-- CPP 2 -->
          <!----------------------------------------------------------------------->
          <td class="text-center align-middle">
            <?php
                            if ($aluno->cpp_2 == ""){
                                echo '<span style="color: red;"> - </span>';
                            } elseif ((number_format($aluno->cpp_2,1) >= 0) && (number_format($aluno->cpp_2,1) < 5)) {
                                echo '<span style="color: red;">'.number_format($aluno->cpp_2,1).'</span>';
                            } elseif ((number_format($aluno->cpp_2,1) >= 5) && (number_format($aluno->cpp_2,1) <= 10)) {
                                echo '<span style="color: black;">'.number_format($aluno->cpp_2,1).'</span>';
                            }
                        ?>
          </td>
          <!-- CT 2 -->
          <!----------------------------------------------------------------------->
          <td class="text-center align-middle">
            <?php
                            if ($aluno->ct_2 == ""){
                                echo '<span style="color: red;"> - </span>';
                            } elseif ((number_format($aluno->ct_2,1) >= 0) && (number_format($aluno->ct_2,1) < 5)) {
                                echo '<span style="color: red;">'.number_format($aluno->ct_2,1).'</span>';
                            } elseif ((number_format($aluno->ct_2,1) >= 5) && (number_format($aluno->ct_2,1) <= 10)) {
                                echo '<span style="color: black;">'.number_format($aluno->ct_2,1).'</span>';
                            }
                        ?>
          </td>
          <!-- MAC 3 -->
          <!----------------------------------------------------------------------->
          <td class="text-center align-middle">
            <?php
                            if ($aluno->mac_3 == ""){
                                echo '<span style="color: red;"> - </span>';
                            } elseif ((number_format($aluno->mac_3,1) >= 0) && (number_format($aluno->mac_3,1) < 5)) {
                                echo '<span style="color: red;">'.number_format($aluno->mac_3,1).'</span>';
                            } elseif ((number_format($aluno->mac_3,1) >= 5) && (number_format($aluno->mac_3,1) <= 10)) {
                                echo '<span style="color: black;">'.number_format($aluno->mac_3,1).'</span>';
                            }
                        ?>
          </td>
          <!-- CPP 3 -->
          <!----------------------------------------------------------------------->
          <td class="text-center align-middle">
            <?php
                            if ($aluno->cpp_3 == ""){
                                echo '<span style="color: red;"> - </span>';
                            } elseif ((number_format($aluno->cpp_3,1) >= 0) && (number_format($aluno->cpp_3,1) < 5)) {
                                echo '<span style="color: red;">'.number_format($aluno->cpp_3,1).'</span>';
                            } elseif ((number_format($aluno->cpp_3,1) >= 5) && (number_format($aluno->cpp_3,1) <= 10)) {
                                echo '<span style="color: black;">'.number_format($aluno->cpp_3,1).'</span>';
                            }
                        ?>
          </td>
          <!-- CT 3 -->
          <!----------------------------------------------------------------------->
          <td class="text-center align-middle">
            <?php
                            if ($aluno->ct_3 == ""){
                                echo '<span style="color: red;"> - </span>';
                            } elseif ((number_format($aluno->ct_3,1) >= 0) && (number_format($aluno->ct_3,1) < 5)) {
                                echo '<span style="color: red;">'.number_format($aluno->ct_3, 1).'</span>';
                            } elseif ((number_format($aluno->ct_3,1) >= 5) && (number_format($aluno->ct_3,1) <= 10)) {
                                echo '<span style="color: black;">'.number_format($aluno->ct_3, 1).'</span>';
                            }
                        ?>
          </td>
          <!----------------------------------------------------------------------->
          <!-- CAP -->
          <td class="text-center align-middle">
            <?php
                            /* -------------------------------------- */
                            $cap = (($aluno->ct_1 + $aluno->ct_2 + $aluno->ct_3)/3);
                            /* -------------------------------------- */
                            if ($cap == ""){
                                echo '<span style="color: red;"> - </span>';
                            } elseif ((number_format($cap,1) >= 0) && (number_format($cap,1) < 5)) {
                                echo '<span style="color: red;">'.number_format($cap,1).'</span>';
                            } elseif ((number_format($cap,1) >= 5) && (number_format($cap,1) <= 10)) {
                                echo '<span style="color: black;">'.number_format($cap,1).'</span>';
                            }
                        ?>
          </td>
          <!-- CE -->
          <td class="text-center align-middle">
            <?php
                            if ($aluno->ce == ""){
                                echo '<span style="color: red;"> - </span>';
                            } elseif ((number_format($aluno->ce,1) >= 0) && (number_format($aluno->ce,1) < 5)) {
                                echo '<span style="color: red;">'.number_format($aluno->ce,1).'</span>';
                            } elseif ((number_format($aluno->ce,1) >= 5) && (number_format($aluno->ce,1) <= 10)) {
                                echo '<span style="color: black;">'.number_format($aluno->ce,1).'</span>';
                            }
                        ?>
          </td>
          <!-- CF -->
          <td class="text-center align-middle">
            <?php
                            /* -------------------------------------- */
                            $cap = (($aluno->ct_1 + $aluno->ct_2 + $aluno->ct_3)/3);
                            $cf = ((0.4 * $cap) + (0.6 * $aluno->ce));
                            /* -------------------------------------- */
                            if ($cf == ""){
                                echo '<span style="color: red;"> - </span>';
                            } elseif ((number_format($cf) >= 0) && (number_format($cf) < 5)) {
                                echo '<span style="color: red;">'.number_format($cf).'</span>';
                            } elseif ((number_format($cf) >= 5) && (number_format($cf) <= 10)) {
                                echo '<span style="color: black;">'.number_format($cf).'</span>';
                            }
                        ?>
          </td>
          <!-- BOTOES -->
          <!----------------------------------------------------------------------->
          <td class="text-left">
            <a href="<?= site_url('secretaria/matricula/add_notas/'.$aluno->id_notas_disciplina.'/'.$aluno->id_classe) ?>"
              class="btn btn-block btn-default btn-sm"><i class="fa fa-plus mr-2"></i>LANÇAR NOTA
            </a>
          </td>
        </tr>
        <?php $i++; endforeach ?>
      </tbody>
    </table>
  </div><!-- end table-responsive -->
  <a href="<?= site_url('secretaria/listagem/mini_pauta_pdf/'.$listagem_alunos->id_ano.'/'.$listagem_alunos->id_turma.'/'.$listagem_alunos->id_disciplina.'/'.$listagem_alunos->id_classe ) ?>"
    class="btn btn-danger " target="_blank"><i class="fa fa-file-pdf mr-2"></i>EXPORTAR PARA PDF
  </a>