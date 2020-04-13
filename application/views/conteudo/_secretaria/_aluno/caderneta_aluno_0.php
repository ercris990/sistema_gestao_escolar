<div id="content" class="content">
    <h4 class="page-header text-uppercase"><i class="fa fa-list mr-5"></i>CADERNETA DO ALUNO</h4>
    <?= $this->session->flashdata('msg'); ?>
    <!-- begin tab-content -->
    <div class="">
        <!-- --------------------------------------------------------------------------- -->
        <div class="table-responsive text-uppercase my-2">
            <table class="table table-striped table-condensed table-hover">
                <tbody>
                    <tr class="highlight">
                        <td class="text-left" rowspan="3">
                            <div id="photo_pfl" class="img-fluid img-thumbnail img-responsive">
                                <img src=" <?= base_url("_assets/upload/".$matricula_row->photo); ?>">
                            </div>
                        </td>
                        <td class="text-left align-middle" width="20%"><strong>Nome do Aluno: </strong></td>
                        <td class="text-left align-middle" width="30%"><strong><?= $matricula_row->nome; ?></strong>
                        </td>
                        <td class="text-left align-middle" width="20%"><strong>Nº de Processo: </strong></td>
                        <td class="text-left align-middle" width="30%">
                            <strong><?= $matricula_row->num_processo; ?></strong></td>
                    </tr>
                    <tr>
                        <td class="text-left align-middle"><strong> Ano lectivo: </strong></td>
                        <td class="text-left align-middle"><strong><?= $matricula_row->ano_let; ?></strong></td>
                        <td class="text-left align-middle"><strong> Classe: </strong></td>
                        <td class="text-left align-middle"><strong><?= $matricula_row->nome_classe; ?></strong></td>
                    </tr>
                    <tr>
                        <td class="text-left align-middle"><strong> Turma: </strong></td>
                        <td class="text-left align-middle"><strong><?= $matricula_row->nome_turma; ?></strong></td>
                        <td class="text-left align-middle"><strong> Sala: </strong></td>
                        <td class="text-left align-middle"><strong><?= $matricula_row->numero_sala; ?> -
                                <?= $matricula_row->nome_periodo; ?></strong></td>
                    </tr>
                </tbody>
            </table><!-- end table -->
        </div><!-- end table responsive -->
        <!-- ---------------------------------------------------------------------------------------------------------------------- -->
        <span class="pull-left hidden-print text-uppercase">
            <!-- dropdown -->
            <div class="btn-group">
                <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-file-pdf mr-2"></i>GERAR PDF</a>
                <a href="#" class="btn btn-sm btn-outline-danger dropdown-toggle" data-toggle="dropdown"></a>
                <ul class="dropdown-menu pull-right">
                    <li>
                        <a href="<?= site_url('secretaria/matricula/caderneta_aluno_pdf/'.$matricula_row->id_matricula.'/'.$matricula_row->id_classe); ?>"
                            target="_blank">
                            <i class="fa fa-file-pdf text-danger mr-2"></i>Boletim de Notas</a>
                    </li>
                </ul>
            </div>
        </span>
        <!-- ---------------------------------------------------------------------------------------------------------------------- -->
        <span class="pull-right">
            <div class="btn-group btn-group-justified">
                <a href="<?= site_url('secretaria/aluno/detalhe?id_aluno='.$matricula_row->aluno_id); ?>"
                    class="btn btn-default m-b-10 p-l-5"><i class="fa fa-user mr-2">
                    </i>PERFIL DO ALUNO</a>
                <!------------------------------------------------------------------------------------------->
                <a href="#modal-message" data-toggle="modal" class="btn btn-default m-b-10 p-l-5"><i
                        class="fa fa-plus mr-2"></i>ADICIONAR DISCIPLINAS</a>
            </div>
        </span>
        <!-- ---------------------------------------------------------------------------------------------------------------------- -->
        <!-- begin table-responsive -->
        <div class="table-responsive text-uppercase">
            <table class="table table-striped table-condensed table-hover table-bordered">
                <thead class="bg-primary">
                    <tr>
                        <th class="text-center text-light" rowspan="2">Nº.</th>
                        <th class="text-center text-light" rowspan="2">DISCIPLINA </th>
                        <th class="text-center text-light" colspan="3">1º TRIMESTRE </th>
                        <th class="text-center text-light" colspan="3">2º TRIMESTRE </th>
                        <th class="text-center text-light" colspan="3">3º TRIMESTRE </th>
                        <th class="text-center text-light" rowspan="2">CAP</th>
                        <th class="text-center text-light" rowspan="2">CPE</span>
                        </th>
                        <th class="text-center text-light" rowspan="2">CF</th>
                    </tr>
                    <tr>
                        <th class="text-center text-light">MAC</th>
                        <th class="text-center text-light">CPP</th>
                        <th class="text-center text-light">CT</th>
                        <!-- ----------------------------------- -->
                        <th class="text-center text-light">MAC</th>
                        <th class="text-center text-light">CPP</th>
                        <th class="text-center text-light">CT</th>
                        <!-- ----------------------------------- -->
                        <th class="text-center text-light">MAC</th>
                        <th class="text-center text-light">CPP</th>
                        <th class="text-center text-light">CT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach ($notas_disciplina as $nota) { ?>
                    <tr class="highlight">
                        <td class="text-center"><?= $i; ?> </td>
                        <td class="text-left" nowrap><?= $nota->nome_disciplina; ?></td>
                        <!-- MAC 1 -->
                        <!---------------------------------------------------------------------------------------->
                        <td class="text-center">
                            <?php
                                    if ($nota->mac_1 == ""){
                                        echo '<span style="color: red;"> - </span>';
                                    } elseif ( number_format($nota->mac_1) == "1" ) {
                                        echo '<span style="color: red;"> Ma </span>';
                                    } elseif ( number_format($nota->mac_1) == "2" ) {
                                        echo '<span style="color: red;"> Me </span>';
                                    } elseif ( number_format($nota->mac_1) == "3" ) {
                                        echo '<span style="color: black;"> S </span>';
                                    } elseif ( number_format($nota->mac_1) == "4" ) {
                                        echo '<span style="color: black;"> B </span>';
                                    } elseif ( number_format($nota->mac_1) == "5" ) {
                                        echo '<span style="color: black;"> MB </span>';
                                    }
                                ?>
                        </td>
                        <!-- CPP 1 -->
                        <!---------------------------------------------------------------------------------------->
                        <td class="text-center">
                            <?php
                                    if ($nota->cpp_1 == ""){
                                        echo '<span style="color: red;"> - </span>';
                                    } elseif ( number_format($nota->cpp_1) == "1" ) {
                                        echo '<span style="color: red;"> Ma </span>';
                                    } elseif ( number_format($nota->cpp_1) == "2" ) {
                                        echo '<span style="color: red;"> Me </span>';
                                    } elseif ( number_format($nota->cpp_1) == "3" ) {
                                        echo '<span style="color: black;"> S </span>';
                                    } elseif ( number_format($nota->cpp_1) == "4" ) {
                                        echo '<span style="color: black;"> B </span>';
                                    } elseif ( number_format($nota->cpp_1) == "5" ) {
                                        echo '<span style="color: black;"> MB </span>';
                                    }
                                ?>
                        </td>
                        <!-- CT 1 -->
                        <!---------------------------------------------------------------------------------------->
                        <td class="text-center">
                            <?php
                                    if ($nota->ct_1 == ""){
                                        echo '<span style="color: red;"> - </span>';
                                    } elseif ( number_format($nota->ct_1) == "1" ) {
                                        echo '<span style="color: red;"> Ma </span>';
                                    } elseif ( number_format($nota->ct_1) == "2" ) {
                                        echo '<span style="color: red;"> Me </span>';
                                    } elseif ( number_format($nota->ct_1) == "3" ) {
                                        echo '<span style="color: black;"> S </span>';
                                    } elseif ( number_format($nota->ct_1) == "4" ) {
                                        echo '<span style="color: black;"> B </span>';
                                    } elseif ( number_format($nota->ct_1) == "5" ) {
                                        echo '<span style="color: black;"> MB </span>';
                                    }
                                ?>
                        </td>
                        <!-- MAC 2 -->
                        <!---------------------------------------------------------------------------------------->
                        <td class="text-center">
                            <?php
                                    if ($nota->mac_2 == ""){
                                            echo '<span style="color: red;"> - </span>';
                                        } elseif ( number_format($nota->mac_2) == "1" ) {
                                            echo '<span style="color: red;"> Ma </span>';
                                        } elseif ( number_format($nota->mac_2) == "2" ) {
                                            echo '<span style="color: red;"> Me </span>';
                                        } elseif ( number_format($nota->mac_2) == "3" ) {
                                            echo '<span style="color: black;"> S </span>';
                                        } elseif ( number_format($nota->mac_2) == "4" ) {
                                            echo '<span style="color: black;"> B </span>';
                                        } elseif ( number_format($nota->mac_2) == "5" ) {
                                            echo '<span style="color: black;"> MB </span>';
                                        }
                                ?>
                        </td>
                        <!-- CPP 2 -->
                        <!---------------------------------------------------------------------------------------->
                        <td class="text-center">
                            <?php
                                    if ($nota->cpp_2 == ""){
                                        echo '<span style="color: red;"> - </span>';
                                    } elseif ( number_format($nota->cpp_2) == "1" ) {
                                        echo '<span style="color: red;"> Ma </span>';
                                    } elseif ( number_format($nota->cpp_2) == "2" ) {
                                        echo '<span style="color: red;"> Me </span>';
                                    } elseif ( number_format($nota->cpp_2) == "3" ) {
                                        echo '<span style="color: black;"> S </span>';
                                    } elseif ( number_format($nota->cpp_2) == "4" ) {
                                        echo '<span style="color: black;"> B </span>';
                                    } elseif ( number_format($nota->cpp_2) == "5" ) {
                                        echo '<span style="color: black;"> MB </span>';
                                    }
                                ?>
                        </td>
                        <!-- CT 2 -->
                        <!---------------------------------------------------------------------------------------->
                        <td class="text-center">
                            <?php
                                    if ($nota->ct_2 == ""){
                                        echo '<span style="color: red;"> - </span>';
                                    } elseif ( number_format($nota->ct_2) == "1" ) {
                                        echo '<span style="color: red;"> Ma </span>';
                                    } elseif ( number_format($nota->ct_2) == "2" ) {
                                        echo '<span style="color: red;"> Me </span>';
                                    } elseif ( number_format($nota->ct_2) == "3" ) {
                                        echo '<span style="color: black;"> S </span>';
                                    } elseif ( number_format($nota->ct_2) == "4" ) {
                                        echo '<span style="color: black;"> B </span>';
                                    } elseif ( number_format($nota->ct_2) == "5" ) {
                                        echo '<span style="color: black;"> MB </span>';
                                    }
                                ?>
                        </td>
                        <!-- MAC 3 -->
                        <!---------------------------------------------------------------------------------------->
                        <td class="text-center">
                            <?php
                                    if ($nota->mac_3 == ""){
                                        echo '<span style="color: red;"> - </span>';
                                    } elseif ( number_format($nota->mac_3) == "1" ) {
                                        echo '<span style="color: red;"> Ma </span>';
                                    } elseif ( number_format($nota->mac_3) == "2" ) {
                                        echo '<span style="color: red;"> Me </span>';
                                    } elseif ( number_format($nota->mac_3) == "3" ) {
                                        echo '<span style="color: black;"> S </span>';
                                    } elseif ( number_format($nota->mac_3) == "4" ) {
                                        echo '<span style="color: black;"> B </span>';
                                    } elseif ( number_format($nota->mac_3) == "5" ) {
                                        echo '<span style="color: black;"> MB </span>';
                                    }
                                ?>
                        </td>
                        <!-- CPP 3 -->
                        <!---------------------------------------------------------------------------------------->
                        <td class="text-center">
                            <?php
                                    if ($nota->cpp_3 == ""){
                                        echo '<span style="color: red;"> - </span>';
                                    } elseif ( number_format($nota->cpp_3) == "1" ) {
                                        echo '<span style="color: red;"> Ma </span>';
                                    } elseif ( number_format($nota->cpp_3) == "2" ) {
                                        echo '<span style="color: red;"> Me </span>';
                                    } elseif ( number_format($nota->cpp_3) == "3" ) {
                                        echo '<span style="color: black;"> S </span>';
                                    } elseif ( number_format($nota->cpp_3) == "4" ) {
                                        echo '<span style="color: black;"> B </span>';
                                    } elseif ( number_format($nota->cpp_3) == "5" ) {
                                        echo '<span style="color: black;"> MB </span>';
                                    }
                                ?>
                        </td>
                        <!-- CT 3 -->
                        <!---------------------------------------------------------------------------------------->
                        <td class="text-center">
                            <?php
                                if ($nota->ct_3 == ""){
                                        echo '<span style="color: red;"> - </span>';
                                    } elseif ( number_format($nota->ct_3) == "1" ) {
                                        echo '<span style="color: red;"> Ma </span>';
                                    } elseif ( number_format($nota->ct_3) == "2" ) {
                                        echo '<span style="color: red;"> Me </span>';
                                    } elseif ( number_format($nota->ct_3) == "3" ) {
                                        echo '<span style="color: black;"> S </span>';
                                    } elseif ( number_format($nota->ct_3) == "4" ) {
                                        echo '<span style="color: black;"> B </span>';
                                    } elseif ( number_format($nota->ct_3) == "5" ) {
                                        echo '<span style="color: black;"> MB </span>';
                                    }
                                ?>
                        </td>
                        <!-- CAP -->
                        <!---------------------------------------------------------------------------------------->
                        <td class="text-center">
                            <?php
                                $cap = (($nota->ct_1 + $nota->ct_2 + $nota->ct_3)/3);
                                /* -------------------------------------------------- */
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
                        <!-- CPE/CE -->
                        <!---------------------------------------------------------------------------------------->
                        <td class="text-center">
                            <?php
                                    if ($nota->ce == ""){
                                    echo '<span style="color: red;"> - </span>';
                                    } elseif ( $nota->ce == "1" ) {
                                        echo '<span style="color: red;"> Ma </span>';
                                    } elseif ( $nota->ce == "2" ) {
                                        echo '<span style="color: red;"> Me </span>';
                                    } elseif ( $nota->ce == "3" ) {
                                        echo '<span style="color: black;"> S </span>';
                                    } elseif ( $nota->ce == "4" ) {
                                        echo '<span style="color: black;"> B </span>';
                                    } elseif ( $nota->ce == "5" ) {
                                        echo '<span style="color: black;"> MB </span>';
                                    }
                                ?>
                        </td>
                        <!-- CF -->
                        <!---------------------------------------------------------------------------------------->
                        <td class="text-center">
                            <?php
                                $cap = (($nota->ct_1 + $nota->ct_2 + $nota->ct_3)/3);
                                $cf = ((0.4 * $cap) + (0.6 * $nota->ce));
                                /* -------------------------------------------------- */
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
                    <?php $i++; } ?>
                </tbody>
            </table><!-- end table -->
        </div><!-- end table'responsive -->
    </div>
</div>