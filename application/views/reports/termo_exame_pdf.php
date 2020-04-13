<!DOCTYPE html>
<html lang="pt-br">
<?php setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' ); ?>

<head>
    <meta charset="UTF-8">
    <title>Termo de Exame da 6ª</title>
    <style>
    body {
        /* font-family: "Arial" */
        font-family: Arial, Helvetica, Sans-serif;
    }

    .head {
        font-size: 14px;
        color: #000;
        text-align: center;
        line-height: 20px;
    }

    .head img {
        width: 40px;
        height: auto;
    }

    table {
        width: 100%;
        border: 1px solid #000;
        padding: 2px;
        font-size: 12px;
        margin: 10px;
        border-collapse: collapse;
    }

    th {
        padding: 2px;
        color: #000;
        text-align: center;
        font-weight: bold;
        border: 1px solid #000;
    }

    td {
        border: 1px solid #000;
        padding: 2px;
    }

    .al-center {
        text-align: center;
    }

    .coluna_0 {
        width: 10%;
    }

    .coluna_1 {
        width: 30%;
    }

    .coluna_2 {
        width: 15%;
    }

    .coluna_3 {
        width: 35%;
    }

    .esquerda {
        float: left;
    }

    .direita {
        float: right;
    }
    </style>
</head>

<body>
    <!-- ----------------------------------------------------------- -->
    <div>

    </div>
    <p class="head">
        <img src="_assets/img/insignia_001.jpg"><br>
        <strong>
            PROVÍNCIA DE LUANDA<br>
            GOVERNO PROVINCIAL DE LUANDA<br>
            REPARTIÇÃO DA EDUCAÇÃO DO DISTRITO URBANO DO RANGEL<br>
            (ÁREA DO ENSINO GERAL)<br><br>
            TERMO DE FREQUENCIA E EXAME DA 6ª CLASSE
        </strong>
    </p>
    <div>

    </div>
    <!-- ---------------------------------------------------------------------------------------------------------------------- -->
    <div>
        <p class="paragrafo">
            <b><?= $matricula_row->nome; ?></b>, natural de
            <?= $matricula_row->nome_municipio; ?>, Província de
            <?= $matricula_row->nome_provincia; ?>, nascido(a) no dia
            <?= strftime('%d de %B de %Y', strtotime($matricula_row->nascimento_aluno)); ?>,
            <?php if($matricula_row->tipo_documento == "Cédula Pessoal"){ echo "portador(a) da ";
            }else{ echo "portador(a) do"; }?>
            <?= $matricula_row->tipo_documento; ?> n.º <?= $matricula_row->num_documento; ?>, emitido,
            <?= strftime('%d de %B de %Y', strtotime($matricula_row->data_emissao_doc)); ?>,
            <?php if($matricula_row->tipo_documento == "Cédula Pessoal"){ echo "pela Conservatória do Registro Civil de ";
            }else{ echo "pela Repartição de Identificação de "; }?><?= $matricula_row->nome_provincia; ?>.<br>
            <!------------------------------------------------------------------------------------------------------------------->
            Filho(a) de <?= $matricula_row->nome_pai; ?> e de <?= $matricula_row->nome_mae; ?>.<br>
            <!------------------------------------------------------------------------------------------------------------------->
            Fez exame da <?= $matricula_row->nome_classe; ?> que foi considerado(a) <strong>Apto(a)</strong> de acordo
            com a classificação abaixo designada:
        </p>
    </div>
    <!-- --------------------------------------------------------------------------- -->
    <!-- begin table-responsive -->
    <div>
        <table>
            <thead>
                <tr>
                    <th class="coluna_1 al-center">DISCIPLINAS</th>
                    <th class="coluna_2 al-center">CT 1</th>
                    <th class="coluna_2 al-center">CT 2</th>
                    <th class="coluna_2 al-center">CT 3</th>
                    <th class="coluna_2 al-center">CAP</th>
                    <th class="coluna_2 al-center">CE</th>
                    <th class="coluna_2 al-center">CF</th>
                    <th class="coluna_2 al-center" nowrap>CE 2ª Época</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; foreach ($matricula as $row) { ?>
                <tr>
                    <td nowrap><?= $row->nome_disciplina; ?></td>
                    <!--    CLASSIFICACAO TRIMESTRAL - CT
                        ------------------------------------------------------------------------------- -->
                    <td class="al-center"><?php
                        if ($row->ct_1 == ""){
                            echo '<span style="color: black;"> - </span>';
                        } elseif ((number_format($row->ct_1, 1) >= 0) && (number_format($row->ct_1, 1) < 5)) {
                            echo '<span style="color: red;">'.number_format($row->ct_1, 1).' (valores) </span>';
                        } elseif ((number_format($row->ct_1, 1) >= 5) && (number_format($row->ct_1, 1) <= 10)) {
                            echo '<span style="color: black;">'.number_format($row->ct_1, 1).' (valores) </span>';
                        }
                        ?></td>
                    <!--    CLASSIFICACAO TRIMESTRAL - CT
                        ------------------------------------------------------------------------------- -->
                    <td class="al-center"><?php
                        if ($row->ct_2 == ""){
                            echo '<span style="color: black;"> - </span>';
                        } elseif ((number_format($row->ct_2, 1) >= 0) && (number_format($row->ct_2, 1) < 5)) {
                            echo '<span style="color: red;">'.number_format($row->ct_2, 1).' (valores) </span>';
                        } elseif ((number_format($row->ct_2, 1) >= 5) && (number_format($row->ct_2, 1) <= 10)) {
                            echo '<span style="color: black;">'.number_format($row->ct_2, 1).' (valores) </span>';
                        }
                        ?></td>
                    <!--    CLASSIFICACAO TRIMESTRAL - CT
                        ------------------------------------------------------------------------------- -->
                    <td class="al-center"><?php
                        if ($row->ct_3 == ""){
                            echo '<span style="color: black;"> - </span>';
                        } elseif ((number_format($row->ct_3, 1) >= 0) && (number_format($row->ct_3, 1) < 5)) {
                            echo '<span style="color: red;">'.number_format($row->ct_3, 1).' (valores) </span>';
                        } elseif ((number_format($row->ct_3, 1) >= 5) && (number_format($row->ct_3, 1) <= 10)) {
                            echo '<span style="color: black;">'.number_format($row->ct_3, 1).' (valores) </span>';
                        }
                        ?></td>
                    <!--    CLASSIFICACAO ATRIBUIDA PELO PROFESSOR - CAP
                        ------------------------------------------------------------------------------- -->
                    <td class="al-center"><?php
                        $cap = (($row->ct_1+$row->ct_2+$row->ct_3)/3);
                        // -----------------------------------------------------
                        if ($cap == ""){
                            echo '<span style="color: black;"> - </span>';
                        } elseif ((number_format($cap, 1) >= 0) && (number_format($cap, 1) < 5)) {
                            echo '<span style="color: red;">'.number_format($cap, 1).' (valores) </span>';
                        } elseif ((number_format($cap, 1) >= 5) && (number_format($cap, 1) <= 10)) {
                            echo '<span style="color: black;">'.number_format($cap, 1).' (valores) </span>';
                        }
                        ?></td>
                    <!--    CLASSIFICACAO DE EXAME - CE
                        ------------------------------------------------------------------------------- -->
                    <td class="al-center"><?php
                        if ($row->ce == ""){
                            echo '<span style="color: black;"> - </span>';
                        } elseif ((number_format($row->ce) >= 0) && (number_format($row->ce) < 5)) {
                            echo '<span style="color: red;">'.number_format($row->ce).' (valores) </span>';
                        } elseif ((number_format($row->ce) >= 5) && (number_format($row->ce) <= 10)) {
                            echo '<span style="color: black;">'.number_format($row->ce).' (valores) </span>';
                        }
                        ?></td>
                    <!--    CLASSIFICACAO FINAL - CF
                        ------------------------------------------------------------------------------- -->
                    <td class="al-center"><?php
                        $cap = (($row->ct_1+$row->ct_2+$row->ct_3)/3);
                        $cf = ((0.4*$cap)+(0.6*$row->ce));
                        // -------------------------------------------------------------------------------
                        if ($cf == ""){
                            echo '<span style="color: black;"> - </span>';
                        } elseif ((number_format($cf) >= 0) && (number_format($cf) < 5)) {
                            echo '<span style="color: red;">'.number_format($cf).' (valores) </span>';
                        } elseif ((number_format($cf) >= 5) && (number_format($cf) <= 10)) {
                            echo '<span style="color: black;">'.number_format($cf).' (valores) </span>';
                        }
                        ?></td>
                    <!--    CLASSIFICACAO DE EXAME - CE 2ª ÉPOCA
                        ------------------------------------------------------------------------------- -->
                    <td class="al-center"><?php
                        if ($row->ner == ""){
                            echo '<span style="color: black;"> - </span>';
                        } elseif ((number_format($row->ner) >= 0) && (number_format($row->ner) < 5)) {
                            echo '<span style="color: red;">'.number_format($row->ner).' (valores) </span>';
                        } elseif ((number_format($row->ner) >= 5) && (number_format($row->ner) <= 10)) {
                            echo '<span style="color: black;">'.number_format($row->ner).' (valores) </span>';
                        }
                        ?></td>
                </tr>
                <?php $i++; } ?>
            </tbody>
        </table>
    </div><!-- end table responsive -->
    <div class="esquerda">
        <p>
            OBS: ______________________________<br>
            ___________________________________<br>
            ___________________________________<br>
            ___________________________________<br>
            ___________________________________<br>
            ___________________________________<br>
            ___________________________________
        </p>
    </div>
    <div class="direita">
        <p>
            O Juri<br>
            Presidente ______________________________<br>
            1º Vogal ________________________________<br>
            2º Vogal ________________________________<br><br>

            O(a) Director(a) da Escola<br><br>
            _____________________________________
        </p>
    </div>
</body>

</html>