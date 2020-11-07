<!DOCTYPE html>
<html lang="pt-br">
<?php setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' ); ?>

<head>
  <meta charset="UTF-8">
  <title>Mini Pauta</title>
  <style>
  body {
    font-family: Arial, Helvetica, Sans-serif;
  }

  .head {
    font-size: 14px;
    color: #000;
    text-align: center;
    line-height: 20px;
  }

  .head img {
    width: 60px;
    height: auto;
  }

  table {
    width: 100%;
    padding: 2px;
    font-size: 12px;
    margin: 10px;
    border-collapse: collapse;
    border: 1px solid #000;
  }

  th {
    font-size: 12px;
    padding: 2px;
    background-color: #CCC;
    color: #000;
    text-align: center;
    font-weight: bold;
    border: 1px solid #000;
  }

  td {
    border: 1px solid #000;
    padding: 2px;
  }

  th span {
    color: red;
    font-weight: bold;
  }

  .al-center {
    text-align: center;
  }

  .bold {
    font-weight: bold;
  }

  .coluna_0 {
    width: 1%;
  }

  /* .coluna_1 {
        width: 6%;
    } */

  .coluna_2 {
    width: 15%;
  }
  </style>
</head>

<body>
  <! ----------------------------------------------------------- -->
    <p class="head">
      <img src="_assets/img/insignia_001.jpg"><br>
      <strong>
        República de Angola<br>
        Direcção Provincial da Educação de Luanda<br>
        Repartição da Educação do Distrito Urbano do Rangel<br>
        Escola do Ensino Primário N.º 1523 (Ex. 1188)<br><br><br>
        MINI PAUTA INICIAÇÃO<br>
      </strong>
    </p>
    <! ----------------------------------------------------------- -->
      <div>
        <table>
          <thead>
            <tr>
              <th>
                Ano Lectivo: <span><?= $listagem_alunos->ano_let; ?></span>
              </th>
              <th>
                Turma: <span><?= $listagem_alunos->nome_turma; ?></span>
              </th>
              <th>
                Classe: <span><?= $listagem_alunos->nome_classe; ?></span>
              </th>
              <th>
                Periodo: <span><?= $listagem_alunos->nome_periodo; ?></span>
              </th>
              <th>
                Disciplina: <span><?= $listagem_alunos->nome_disciplina; ?></span>
              </th>
            </tr>
          </thead>
        </table>
        <! ----------------------------------------------------------- -->
          <table>
            <thead>
              <tr>
                <th class="coluna_0" rowspan="2">Nº.</th>
                <th class="coluna_1" rowspan="2">Nome do Aluno </th>
                <!-- ------------------------------------------- -->
                <th colspan="3">1º Trimestre </th>
                <th colspan="3">2º Trimestre </th>
                <th colspan="3">3º Trimestre </th>
                <!-- ------------------------------------------- -->
                <th class="coluna_0" rowspan="2">CAP</th>
                <th class="coluna_0" rowspan="2">CPE/CE</th>
                <th class="coluna_0" rowspan="2">CF</th>
              </tr>
              <tr>
                <th class="coluna_0">MAC</th>
                <th class="coluna_0">CPP</th>
                <th class="coluna_0">CT</th>
                <!-- -------------------- -->
                <th class="coluna_0">MAC</th>
                <th class="coluna_0">CPP</th>
                <th class="coluna_0">CT</th>
                <!-- -------------------- -->
                <th class="coluna_0">MAC</th>
                <th class="coluna_0">CPP</th>
                <th class="coluna_0">CT</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; foreach ($alunos as $aluno) : ?>
              <tr>
                <td class="al-center"> <?= $i; ?> </td>
                <td> <?= $aluno->nome; ?> </td>
                <!--            MAC 1
          		------------------------------------------------------------->
                <td class="al-center">
                  <?php
						if ($aluno->mac_1 == ""){
							echo '<span style="color: red;"> - </span>';
						} elseif ( number_format($aluno->mac_1) == "1" ) {
							echo '<span style="color: red;"> Ma </span>';
						} elseif ( number_format($aluno->mac_1) == "2" ) {
							echo '<span style="color: red;"> Me </span>';
						} elseif ( number_format($aluno->mac_1) == "3" ) {
							echo '<span style="color: black;"> S </span>';
						} elseif ( number_format($aluno->mac_1) == "4" ) {
							echo '<span style="color: black;"> B </span>';
						} elseif ( number_format($aluno->mac_1) == "5" ) {
							echo '<span style="color: black;"> MB </span>';
						}
                    ?>
                </td>
                <!--               CPP 1
          		------------------------------------------------------------->
                <td class="al-center">
                  <?php
						if ($aluno->cpp_1 == ""){
							echo '<span style="color: red;"> - </span>';
						} elseif ( number_format($aluno->cpp_1) == "1" ) {
							echo '<span style="color: red;"> Ma </span>';
						} elseif ( number_format($aluno->cpp_1) == "2" ) {
							echo '<span style="color: red;"> Me </span>';
						} elseif ( number_format($aluno->cpp_1) == "3" ) {
							echo '<span style="color: black;"> S </span>';
						} elseif ( number_format($aluno->cpp_1) == "4" ) {
							echo '<span style="color: black;"> B </span>';
						} elseif ( number_format($aluno->cpp_1) == "5" ) {
							echo '<span style="color: black;"> MB </span>';
						}
                    ?>
                </td>
                <!--               CT 1
          		------------------------------------------------------------->
                <td class="al-center">
                  <?php
						$ct_1 = (($aluno->mac_1 + $aluno->cpp_1)/2);
						if ($ct_1 == ""){
							echo '<span style="color: red;"> - </span>';
							} elseif ( number_format($ct_1) == "1" ) {
								echo '<span style="color: red;"> Ma </span>';
							} elseif ( number_format($ct_1) == "2" ) {
								echo '<span style="color: red;"> Me </span>';
							} elseif ( number_format($ct_1) == "3" ) {
								echo '<span style="color: black;"> S </span>';
							} elseif ( number_format($ct_1) == "4" ) {
								echo '<span style="color: black;"> B </span>';
							} elseif ( number_format($ct_1) == "5" ) {
								echo '<span style="color: black;"> MB </span>';
							}
                    ?>
                </td>
                <!--            MAC 2
          		------------------------------------------------------------->
                <td class="al-center">
                  <?php
						if ($aluno->mac_2 == ""){
							echo '<span style="color: red;"> - </span>';
						} elseif ( number_format($aluno->mac_2) == "1" ) {
							echo '<span style="color: red;"> Ma </span>';
						} elseif ( number_format($aluno->mac_2) == "2" ) {
							echo '<span style="color: red;"> Me </span>';
						} elseif ( number_format($aluno->mac_2) == "3" ) {
							echo '<span style="color: black;"> S </span>';
						} elseif ( number_format($aluno->mac_2) == "4" ) {
							echo '<span style="color: black;"> B </span>';
						} elseif ( number_format($aluno->mac_2) == "5" ) {
							echo '<span style="color: black;"> MB </span>';
						}	
                    ?>
                </td>
                <!--               CPP 2
          		------------------------------------------------------------->
                <td class="al-center">
                  <?php
						if ($aluno->cpp_2 == ""){
							echo '<span style="color: red;"> - </span>';
						} elseif ( number_format($aluno->cpp_2) == "1" ) {
							echo '<span style="color: red;"> Ma </span>';
						} elseif ( number_format($aluno->cpp_2) == "2" ) {
							echo '<span style="color: red;"> Me </span>';
						} elseif ( number_format($aluno->cpp_2) == "3" ) {
							echo '<span style="color: black;"> S </span>';
						} elseif ( number_format($aluno->cpp_2) == "4" ) {
							echo '<span style="color: black;"> B </span>';
						} elseif ( number_format($aluno->cpp_2) == "5" ) {
							echo '<span style="color: black;"> MB </span>';
						}	
                    ?>
                </td>
                <!--               CT 2
          		------------------------------------------------------------->
                <td class="al-center">
                  <?php
										$ct_2 = (($aluno->mac_2 + $aluno->cpp_2)/2);
										if ($ct_2 == ""){
											echo '<span style="color: red;"> - </span>';
											} elseif ( number_format($ct_2) == "1" ) {
												echo '<span style="color: red;"> Ma </span>';
											} elseif ( number_format($ct_2) == "2" ) {
												echo '<span style="color: red;"> Me </span>';
											} elseif ( number_format($ct_2) == "3" ) {
												echo '<span style="color: black;"> S </span>';
											} elseif ( number_format($ct_2) == "4" ) {
												echo '<span style="color: black;"> B </span>';
											} elseif ( number_format($ct_2) == "5" ) {
												echo '<span style="color: black;"> MB </span>';
											}
                    ?>
                </td>
                <!--            MAC 3
          		------------------------------------------------------------->
                <td class="al-center">
                  <?php
										if ($aluno->mac_3 == ""){
											echo '<span style="color: red;"> - </span>';
										} elseif ( number_format($aluno->mac_3) == "1" ) {
											echo '<span style="color: red;"> Ma </span>';
										} elseif ( number_format($aluno->mac_3) == "2" ) {
											echo '<span style="color: red;"> Me </span>';
										} elseif ( number_format($aluno->mac_3) == "3" ) {
											echo '<span style="color: black;"> S </span>';
										} elseif ( number_format($aluno->mac_3) == "4" ) {
											echo '<span style="color: black;"> B </span>';
										} elseif ( number_format($aluno->mac_3) == "5" ) {
											echo '<span style="color: black;"> MB </span>';
										}
									?>
                </td>
                <!--               CPP 3
          		------------------------------------------------------------->
                <td class="al-center">
                  <?php
										if ($aluno->cpp_3 == ""){
											echo '<span style="color: red;"> - </span>';
										} elseif ( number_format($aluno->cpp_3) == "1" ) {
											echo '<span style="color: red;"> Ma </span>';
										} elseif ( number_format($aluno->cpp_3) == "2" ) {
											echo '<span style="color: red;"> Me </span>';
										} elseif ( number_format($aluno->cpp_3) == "3" ) {
											echo '<span style="color: black;"> S </span>';
										} elseif ( number_format($aluno->cpp_3) == "4" ) {
											echo '<span style="color: black;"> B </span>';
										} elseif ( number_format($aluno->cpp_3) == "5" ) {
											echo '<span style="color: black;"> MB </span>';
										}
									?>				
                </td>
                <!--               CT 3
          		------------------------------------------------------------->
                <td class="al-center">
                  <?php
						$ct_3 = (($aluno->mac_3 + $aluno->cpp_3)/2);
						/* -------------------------------------- */
						if ($ct_3 == ""){
								echo '<span style="color: red;"> - </span>';
								} elseif ( number_format($ct_3) == "1" ) {
									echo '<span style="color: red;"> Ma </span>';
								} elseif ( number_format($ct_3) == "2" ) {
									echo '<span style="color: red;"> Me </span>';
								} elseif ( number_format($ct_3) == "3" ) {
									echo '<span style="color: black;"> S </span>';
								} elseif ( number_format($ct_3) == "4" ) {
									echo '<span style="color: black;"> B </span>';
								} elseif ( number_format($ct_3) == "5" ) {
									echo '<span style="color: black;"> MB </span>';
								}	
							?>
                </td>
                <!--               CAP
         		----------------------------------------------------------- -->
                <td class="al-center">
                  <?php
						 /* -------------------------------------- */
						 $cap  = (($aluno->ct_1 + $aluno->ct_2 + $aluno->ct_3)/3);
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
                <!--                CPE/CE
        		----------------------------------------------------------- -->
                <td class="al-center">
                  <?php
										if ($aluno->ce == ""){
											echo '<span style="color: red;"> - </span>';
											} elseif ( number_format($aluno->ce) == "1" ) {
													echo '<span style="color: red;"> Ma </span>';
											} elseif ( number_format($aluno->ce) == "2" ) {
													echo '<span style="color: red;"> Me </span>';
											} elseif ( number_format($aluno->ce) == "3" ) {
													echo '<span style="color: black;"> S </span>';
											} elseif ( number_format($aluno->ce) == "4" ) {
													echo '<span style="color: black;"> B </span>';
											} elseif ( number_format($aluno->ce) == "5" ) {
													echo '<span style="color: black;"> MB </span>';
											}
										?>
                </td>
                <!--                CF
          		----------------------------------------------------------- -->
                <td class="al-center">
                  <?php
						  /* -------------------------------------- */
						  $cap  = (($aluno->ct_1 + $aluno->ct_2 + $aluno->ct_3)/3);
						  $cf   = ((0.4 * $cap) + (0.6 * $aluno->ce));
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
              <?php $i++; endforeach ?>
            </tbody>
          </table>

          <p class="head">
            Luanda, aos
            <?= strftime('%d de %B de %Y', strtotime(date('Y-m-d')));?>.
            <br>
            <br>
            <br>

            O Subdirector Pedagógico<br><br>
            ____________________________________<br>
            <!-- <?= $this->session->userdata('nome_funcionario') ?> -->
          </p>
      </div>
</body>

</html>
