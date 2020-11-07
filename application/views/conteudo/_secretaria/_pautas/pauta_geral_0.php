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
        <!----------------------------------- DADOS DO ALUNO ----------------------------------->
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
        <!----------------------------------- REPRESENTAÇÃO MATEMÁICA ----------------------------------->
        <table class="table table-striped table-responsive table-bordered table-condensed text-uppercase">
          <thead class="bg-primary text-center">
            <tr>
              <th class="text-light" colspan="3">Rep. Matemática</th>
            </tr>
            <tr>
              <th class="text-light">CAP</th>
              <th class="text-light">CPE</th>
              <th class="text-light">CF</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($representacao_matematica as $mat) : ?>
            <tr>
              <!-------------------------- CAP ----------------------->
              <td class="text-center">
                <?php
									/* -------------------------------------- */
									$cap  = (($mat->ct_1 + $mat->ct_2 + $mat->ct_3)/3);
									/* -------------------------------------- */
									if ($cap == ""){
											echo '<span style="color: red;"> - </span>';
											} elseif ( number_format($cap) == "1" ) {
													echo '<span style="color: red;"> Ma </span>';
											} elseif ( number_format($cap) == "2" ) {
													echo '<span style="color: red;"> Me </span>';
											} elseif ( number_format($cap) == "3" ) {
													echo '<span style="color: black;"> S </span>';
											} elseif ( number_format($cap) == "4" ) {
													echo '<span style="color: black;"> B </span>';
											} elseif ( number_format($cap) == "5" ) {
													echo '<span style="color: black;"> MB </span>';
											}
									?>
              </td>
              <!-------------------------- CPE ----------------------->
              <td class="text-center">
                <?php
									if ($mat->ce == ""){
									echo '<span style="color: red;"> - </span>';
									} elseif ( number_format($mat->ce) == "1" ) {
											echo '<span style="color: red;"> Ma </span>';
									} elseif ( number_format($mat->ce) == "2" ) {
											echo '<span style="color: red;"> Me </span>';
									} elseif ( number_format($mat->ce) == "3" ) {
											echo '<span style="color: black;"> S </span>';
									} elseif ( number_format($mat->ce) == "4" ) {
											echo '<span style="color: black;"> B </span>';
									} elseif ( number_format($mat->ce) == "5" ) {
											echo '<span style="color: black;"> MB </span>';
									}
							?>
              </td>
              <!--------------------------- CF ----------------------->
              <td class="text-center">
                <?php
									/* -------------------------------------- */
									$cap  = (($mat->ct_1 + $mat->ct_2 + $mat->ct_3)/3);
									$cf   = ((0.4 * $cap) + (0.6 * $mat->ce));
									/* -------------------------------------- */
									if ($cf == ""){
										echo '<span style="color: red;"> - </span>';
										} elseif ( number_format($cf) == "1" ) {
												echo '<span style="color: red;"> Ma </span>';
										} elseif ( number_format($cf) == "2" ) {
												echo '<span style="color: red;"> Me </span>';
										} elseif ( number_format($cf) == "3" ) {
												echo '<span style="color: black;"> S </span>';
										} elseif ( number_format($cf) == "4" ) {
												echo '<span style="color: black;"> B </span>';
										} elseif ( number_format($cf) == "5" ) {
												echo '<span style="color: black;"> MB </span>';
										}
								?>
              </td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <div>
        <!----------------------------------- C. LING. E LITERATURA INFANTIL ----------------------------------->
        <table class="table table-striped table-responsive table-bordered table-condensed text-uppercase">
          <thead class="bg-primary text-center">
            <tr>
              <th class="text-light" colspan="3">C. Ling. e Lit. Inf.</th>
            </tr>
            <tr>
              <th class="text-light">CAP</th>
              <th class="text-light">CPE</th>
              <th class="text-light">CF</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($C_Ling_Literatura_Infant as $clli) : ?>
            <tr>
              <!-------------------------- CAP ----------------------->
              <td class="text-center">
                <?php
									/* -------------------------------------- */
									$cap  = (($clli->ct_1 + $clli->ct_2 + $clli->ct_3)/3);
									/* -------------------------------------- */
									if ($cap == ""){
											echo '<span style="color: red;"> - </span>';
											} elseif ( number_format($cap) == "1" ) {
													echo '<span style="color: red;"> Ma </span>';
											} elseif ( number_format($cap) == "2" ) {
													echo '<span style="color: red;"> Me </span>';
											} elseif ( number_format($cap) == "3" ) {
													echo '<span style="color: black;"> S </span>';
											} elseif ( number_format($cap) == "4" ) {
													echo '<span style="color: black;"> B </span>';
											} elseif ( number_format($cap) == "5" ) {
													echo '<span style="color: black;"> MB </span>';
											}
									?>
              </td>
              <!-------------------------- CPE ----------------------->
              <td class="text-center">
                <?php
									if ($clli->ce == ""){
									echo '<span style="color: red;"> - </span>';
									} elseif ( number_format($clli->ce) == "1" ) {
											echo '<span style="color: red;"> Ma </span>';
									} elseif ( number_format($clli->ce) == "2" ) {
											echo '<span style="color: red;"> Me </span>';
									} elseif ( number_format($clli->ce) == "3" ) {
											echo '<span style="color: black;"> S </span>';
									} elseif ( number_format($clli->ce) == "4" ) {
											echo '<span style="color: black;"> B </span>';
									} elseif ( number_format($clli->ce) == "5" ) {
											echo '<span style="color: black;"> MB </span>';
									}
							?>
              </td>
              <!--------------------------- CF ----------------------->
              <td class="text-center">
                <?php
									/* -------------------------------------- */
									$cap  = (($clli->ct_1 + $clli->ct_2 + $clli->ct_3)/3);
									$cf   = ((0.4 * $cap) + (0.6 * $clli->ce));
									/* -------------------------------------- */
									if ($cf == ""){
										echo '<span style="color: red;"> - </span>';
										} elseif ( number_format($cf) == "1" ) {
												echo '<span style="color: red;"> Ma </span>';
										} elseif ( number_format($cf) == "2" ) {
												echo '<span style="color: red;"> Me </span>';
										} elseif ( number_format($cf) == "3" ) {
												echo '<span style="color: black;"> S </span>';
										} elseif ( number_format($cf) == "4" ) {
												echo '<span style="color: black;"> B </span>';
										} elseif ( number_format($cf) == "5" ) {
												echo '<span style="color: black;"> MB </span>';
										}
								?>
              </td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <div>
        <!----------------------------------- MEIO FÍSICO E SOCIAL ----------------------------------->
        <table class="table table-striped table-responsive table-bordered table-condensed text-uppercase">
          <thead class="bg-primary text-center">
            <tr>
              <th class="text-light" colspan="3">M. F. e Social</th>
            </tr>
            <tr>
              <th class="text-light">CAP</th>
              <th class="text-light">CPE</th>
              <th class="text-light">CF</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($Meio_Fisico_Social as $mfs) : ?>
            <tr>
              <!-------------------------- CAP ----------------------->
              <td class="text-center">
                <?php
									/* -------------------------------------- */
									$cap  = (($mfs->ct_1 + $mfs->ct_2 + $mfs->ct_3)/3);
									/* -------------------------------------- */
									if ($cap == ""){
											echo '<span style="color: red;"> - </span>';
											} elseif ( number_format($cap) == "1" ) {
													echo '<span style="color: red;"> Ma </span>';
											} elseif ( number_format($cap) == "2" ) {
													echo '<span style="color: red;"> Me </span>';
											} elseif ( number_format($cap) == "3" ) {
													echo '<span style="color: black;"> S </span>';
											} elseif ( number_format($cap) == "4" ) {
													echo '<span style="color: black;"> B </span>';
											} elseif ( number_format($cap) == "5" ) {
													echo '<span style="color: black;"> MB </span>';
											}
									?>
              </td>
              <!-------------------------- CPE ----------------------->
              <td class="text-center">
                <?php
									if ($mfs->ce == ""){
									echo '<span style="color: red;"> - </span>';
									} elseif ( number_format($mfs->ce) == "1" ) {
											echo '<span style="color: red;"> Ma </span>';
									} elseif ( number_format($mfs->ce) == "2" ) {
											echo '<span style="color: red;"> Me </span>';
									} elseif ( number_format($mfs->ce) == "3" ) {
											echo '<span style="color: black;"> S </span>';
									} elseif ( number_format($mfs->ce) == "4" ) {
											echo '<span style="color: black;"> B </span>';
									} elseif ( number_format($mfs->ce) == "5" ) {
											echo '<span style="color: black;"> MB </span>';
									}
							?>
              </td>
              <!--------------------------- CF ----------------------->
              <td class="text-center">
                <?php
									/* -------------------------------------- */
									$cap  = (($mfs->ct_1 + $mfs->ct_2 + $mfs->ct_3)/3);
									$cf   = ((0.4 * $cap) + (0.6 * $mfs->ce));
									/* -------------------------------------- */
									if ($cf == ""){
										echo '<span style="color: red;"> - </span>';
										} elseif ( number_format($cf) == "1" ) {
												echo '<span style="color: red;"> Ma </span>';
										} elseif ( number_format($cf) == "2" ) {
												echo '<span style="color: red;"> Me </span>';
										} elseif ( number_format($cf) == "3" ) {
												echo '<span style="color: black;"> S </span>';
										} elseif ( number_format($cf) == "4" ) {
												echo '<span style="color: black;"> B </span>';
										} elseif ( number_format($cf) == "5" ) {
												echo '<span style="color: black;"> MB </span>';
										}
								?>
              </td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <div>
        <!----------------------------------- WEXP. MANUAL PLÁSTICA ----------------------------------->
        <table class="table table-striped table-responsive table-bordered table-condensed text-uppercase">
          <thead class="bg-primary text-center">
            <tr>
              <th class="text-light" colspan="3">Exp. Man. Plást.</th>
            </tr>
            <tr>
              <th class="text-light">CAP</th>
              <th class="text-light">CPE</th>
              <th class="text-light">CF</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($Exp_Manual_Plastica as $emp) : ?>
            <tr>
              <!-------------------------- CAP ----------------------->
              <td class="text-center">
                <?php
								/* -------------------------------------- */
								$cap  = (($emp->ct_1 + $emp->ct_2 + $emp->ct_3)/3);
								/* -------------------------------------- */
								if ($cap == ""){
										echo '<span style="color: red;"> - </span>';
										} elseif ( number_format($cap) == "1" ) {
												echo '<span style="color: red;"> Ma </span>';
										} elseif ( number_format($cap) == "2" ) {
												echo '<span style="color: red;"> Me </span>';
										} elseif ( number_format($cap) == "3" ) {
												echo '<span style="color: black;"> S </span>';
										} elseif ( number_format($cap) == "4" ) {
												echo '<span style="color: black;"> B </span>';
										} elseif ( number_format($cap) == "5" ) {
												echo '<span style="color: black;"> MB </span>';
										}
								?>
              </td>
              <!-------------------------- CPE ----------------------->
              <td class="text-center">
                <?php
									if ($emp->ce == ""){
									echo '<span style="color: red;"> - </span>';
									} elseif ( number_format($emp->ce) == "1" ) {
											echo '<span style="color: red;"> Ma </span>';
									} elseif ( number_format($emp->ce) == "2" ) {
											echo '<span style="color: red;"> Me </span>';
									} elseif ( number_format($emp->ce) == "3" ) {
											echo '<span style="color: black;"> S </span>';
									} elseif ( number_format($emp->ce) == "4" ) {
											echo '<span style="color: black;"> B </span>';
									} elseif ( number_format($emp->ce) == "5" ) {
											echo '<span style="color: black;"> MB </span>';
									}
							?>
              </td>
              <!--------------------------- CF ----------------------->
              <td class="text-center">
                <?php
									/* -------------------------------------- */
									$cap  = (($emp->ct_1 + $emp->ct_2 + $emp->ct_3)/3);
									$cf   = ((0.4 * $cap) + (0.6 * $emp->ce));
									/* -------------------------------------- */
									if ($cf == ""){
										echo '<span style="color: red;"> - </span>';
										} elseif ( number_format($cf) == "1" ) {
												echo '<span style="color: red;"> Ma </span>';
										} elseif ( number_format($cf) == "2" ) {
												echo '<span style="color: red;"> Me </span>';
										} elseif ( number_format($cf) == "3" ) {
												echo '<span style="color: black;"> S </span>';
										} elseif ( number_format($cf) == "4" ) {
												echo '<span style="color: black;"> B </span>';
										} elseif ( number_format($cf) == "5" ) {
												echo '<span style="color: black;"> MB </span>';
										}
								?></td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <div>
        <!----------------------------------- EXP. MUSICAL ----------------------------------->
        <table class="table table-striped table-responsive table-bordered table-condensed text-uppercase">
          <thead class="bg-primary text-center">
            <tr>
              <th class="text-light" colspan="3">Exp. Musical</th>
            </tr>
            <tr>
              <th class="text-light">CAP</th>
              <th class="text-light">CPE</th>
              <th class="text-light">CF</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($Exp_Musical as $exp_music) : ?>
            <tr>
              <!-------------------------- CAP ----------------------->
              <td class="text-center">
                <?php
								/* -------------------------------------- */
								$cap  = (($exp_music->ct_1 + $exp_music->ct_2 + $exp_music->ct_3)/3);
								/* -------------------------------------- */
								if ($cap == ""){
										echo '<span style="color: red;"> - </span>';
										} elseif ( number_format($cap) == "1" ) {
												echo '<span style="color: red;"> Ma </span>';
										} elseif ( number_format($cap) == "2" ) {
												echo '<span style="color: red;"> Me </span>';
										} elseif ( number_format($cap) == "3" ) {
												echo '<span style="color: black;"> S </span>';
										} elseif ( number_format($cap) == "4" ) {
												echo '<span style="color: black;"> B </span>';
										} elseif ( number_format($cap) == "5" ) {
												echo '<span style="color: black;"> MB </span>';
										}
								?>
              </td>
              <!-------------------------- CPE ----------------------->
              <td class="text-center">
                <?php
									if ($exp_music->ce == ""){
									echo '<span style="color: red;"> - </span>';
									} elseif ( number_format($exp_music->ce) == "1" ) {
											echo '<span style="color: red;"> Ma </span>';
									} elseif ( number_format($exp_music->ce) == "2" ) {
											echo '<span style="color: red;"> Me </span>';
									} elseif ( number_format($exp_music->ce) == "3" ) {
											echo '<span style="color: black;"> S </span>';
									} elseif ( number_format($exp_music->ce) == "4" ) {
											echo '<span style="color: black;"> B </span>';
									} elseif ( number_format($exp_music->ce) == "5" ) {
											echo '<span style="color: black;"> MB </span>';
									}
							?>
              </td>
              <!--------------------------- CF ----------------------->
              <td class="text-center">
                <?php
									/* -------------------------------------- */
									$cap  = (($exp_music->ct_1 + $exp_music->ct_2 + $exp_music->ct_3)/3);
									$cf   = ((0.4 * $cap) + (0.6 * $exp_music->ce));
									/* -------------------------------------- */
									if ($cf == ""){
										echo '<span style="color: red;"> - </span>';
										} elseif ( number_format($cf) == "1" ) {
												echo '<span style="color: red;"> Ma </span>';
										} elseif ( number_format($cf) == "2" ) {
												echo '<span style="color: red;"> Me </span>';
										} elseif ( number_format($cf) == "3" ) {
												echo '<span style="color: black;"> S </span>';
										} elseif ( number_format($cf) == "4" ) {
												echo '<span style="color: black;"> B </span>';
										} elseif ( number_format($cf) == "5" ) {
												echo '<span style="color: black;"> MB </span>';
										}
								?>
              </td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <div>
        <!----------------------------------- PSICO MOTRICIDADE ----------------------------------->
        <table class="table table-striped table-responsive table-bordered table-condensed text-uppercase">
          <thead class="bg-primary text-center">
            <tr>
              <th class="text-light" colspan="3">Psicomotricidade</th>
            </tr>
            <tr>
              <th class="text-light">CAP</th>
              <th class="text-light">CPE</th>
              <th class="text-light">CF</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($Psicomotricidade as $psicomotr) : ?>
            <tr>
              <!-------------------------- CAP ----------------------->
              <td class="text-center">
                <?php
									/* -------------------------------------- */
									$cap  = (($psicomotr->ct_1 + $psicomotr->ct_2 + $psicomotr->ct_3)/3);
									/* -------------------------------------- */
									if ($cap == ""){
											echo '<span style="color: red;"> - </span>';
											} elseif ( number_format($cap) == "1" ) {
													echo '<span style="color: red;"> Ma </span>';
											} elseif ( number_format($cap) == "2" ) {
													echo '<span style="color: red;"> Me </span>';
											} elseif ( number_format($cap) == "3" ) {
													echo '<span style="color: black;"> S </span>';
											} elseif ( number_format($cap) == "4" ) {
													echo '<span style="color: black;"> B </span>';
											} elseif ( number_format($cap) == "5" ) {
													echo '<span style="color: black;"> MB </span>';
											}
									?>
              </td>
              <!-------------------------- CPE ----------------------->
              <td class="text-center">
                <?php
									if ($psicomotr->ce == ""){
									echo '<span style="color: red;"> - </span>';
									} elseif ( number_format($psicomotr->ce) == "1" ) {
											echo '<span style="color: red;"> Ma </span>';
									} elseif ( number_format($psicomotr->ce) == "2" ) {
											echo '<span style="color: red;"> Me </span>';
									} elseif ( number_format($psicomotr->ce) == "3" ) {
											echo '<span style="color: black;"> S </span>';
									} elseif ( number_format($psicomotr->ce) == "4" ) {
											echo '<span style="color: black;"> B </span>';
									} elseif ( number_format($psicomotr->ce) == "5" ) {
											echo '<span style="color: black;"> MB </span>';
									}
							?>
              </td>
              <!--------------------------- CF ----------------------->
              <td class="text-center">
                <?php
									/* -------------------------------------- */
									$cap  = (($psicomotr->ct_1 + $psicomotr->ct_2 + $psicomotr->ct_3)/3);
									$cf   = ((0.4 * $cap) + (0.6 * $psicomotr->ce));
									/* -------------------------------------- */
									if ($cf == ""){
										echo '<span style="color: red;"> - </span>';
										} elseif ( number_format($cf) == "1" ) {
												echo '<span style="color: red;"> Ma </span>';
										} elseif ( number_format($cf) == "2" ) {
												echo '<span style="color: red;"> Me </span>';
										} elseif ( number_format($cf) == "3" ) {
												echo '<span style="color: black;"> S </span>';
										} elseif ( number_format($cf) == "4" ) {
												echo '<span style="color: black;"> B </span>';
										} elseif ( number_format($cf) == "5" ) {
												echo '<span style="color: black;"> MB </span>';
										}
								?>
              </td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="mt-1">
    <a href="<?= site_url('pautas_xls/pauta_xls_00/export_xls_00/'.$listagem_alunos->id_ano.'/'.$listagem_alunos->id_turma)?>"
      class="btn btn-success bts-sm col-2"><i class="fa fa-file-excel mr-2"></i>EXPORTAR PARA EXECEL</a>
  </div>