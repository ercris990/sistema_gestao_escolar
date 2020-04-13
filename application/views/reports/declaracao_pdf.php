<!DOCTYPE html>
<html lang="pt-br">
<?php setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' ); ?>

<head>
    <meta charset="UTF-8">
    <title>Declaração - <?= $matricula_row->nome; ?></title>
    <style>
    body {
        /* font-family: "Arial" */
        font-family: Arial, Helvetica, Sans-serif;
    }

    table,
    th,
    td {
        width: 97%;
        border: 1px solid #000;
        padding: 2px;
        margin: 10px auto;
        border-collapse: collapse;
        font-size: 12px;
        text-align: center;
    }

    .titulo {
        color: Red;
        font-size: 18px;
    }

    .head {
        font-size: 14px;
        color: #000;
        text-align: center;
    }

    .head img {
        width: 60px;
        height: auto;
    }

    .coluna_0 {
        width: 10%;
    }

    .paragrafo {
        /* font-size: 14px; */
        text-align: justify;
        word-spacing: 4px;
        word-wrap: normal;
        line-height: 22px;
        padding: 0px 17px;
    }

    .assinatura {
        /* font-size: 14px; */
        text-align: center;
        word-spacing: 4px;
        /* word-wrap: normal; */
        line-height: 22px;
    }

    .titulo_tab {
        background-color: #000;
        color: #fff;
        text-align: center;
        font-weight: bold;
    }
    </style>
</head>

<body>
    <!--        Cabeçalho 
    ----------------------------------------------------------- -->
    <p class="head">
        <img src="_assets/img/insignia_001.jpg"><br>
        <b>
            República de Angola<br>
            Direcção Provincial da Educação de Luanda<br>
            Repartição da Educação do Distrito Urbano do Rangel<br>
            Escola do Ensino Primário N.º 1523 (Ex. 1188) <br><br><br>
            <span class="titulo">Declaração de Habilitações</span>
        </b>
    </p>
    <!--        Paragrafo 1 
    ----------------------------------------------------------- -->
    <div>
        <p class="paragrafo">
            a) <b>Filomena da Silva Ramos</b> Directora da Escola do Ensino Primário n.º 1188 (Ex. 5028) declara que
            <b><?= $matricula_row->nome; ?></b> filho(a) de <?= $matricula_row->nome_pai; ?>
            e de <?= $matricula_row->nome_mae; ?> nascido(a) aos
            <?= strftime('%d de %B de %Y', strtotime($matricula_row->nascimento_aluno)); ?>,
            natural de <?= $matricula_row->nome_municipio; ?>, Província de
            <?= $matricula_row->nome_provincia; ?>,
            <?php if($matricula_row->tipo_documento == "Cédula Pessoal"){ echo "portador(a) da ";
            }else{ echo "portador(a) do"; }?>
            <?= $matricula_row->tipo_documento; ?> n.º <?= $matricula_row->num_documento; ?>, emitido aos
            <?= strftime('%d de %B de %Y', strtotime($matricula_row->data_emissao_doc)); ?>,
            <?php if($matricula_row->tipo_documento == "Cédula Pessoal"){ echo "pela Conservatória do Registro Civil de ";
            }else{ echo "pela Repartição de Identificação de "; }?><?= $matricula_row->nome_provincia; ?>.


        </p>
        <!--        Paragrafo 2
        ----------------------------------------------------------- -->
        <p class="paragrafo">
            Frequentou nesta escola no ano lectivo de <?= $matricula_row->ano_let; ?>
            a <?= $matricula_row->nome_classe; ?>, na turma <?= $matricula_row->nome_turma; ?>,
            tendo obtido o resultado final de <b>Apto</b> sob o processo nº <?= $matricula_row->num_processo; ?>,
            arquivado nesta escola com as seguintes classificações:
        </p>
        <!--        Tabela
        ----------------------------------------------------------- -->
        <table>
            <thead>
                <tr>
                    <th style="text-align: center;">DISCIPLINA </th>
                    <th>NOTAS</th>
                    <!-- <th>NOTAS</th> -->
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; foreach ($matricula as $row) { ?>
                <tr>
                    <td style="text-align: left;"><?= $row->nome_disciplina; ?></td>
                    <!-- =========================================================================== -->
                    <td style="text-align: center">
                        <b>
                            <?php
                            $cap = (($row->ct_1 + $row->ct_2 + $row->ct_3) / 3);
                            $cf = ((0.4 * $cap) + (0.6 * $row->ce)); 
                            /* ----------------------------------------------------------------- */    
                            if ($cf == ""){
                                    echo '<span style="color: red;"> -- </span>';
                                } elseif ((number_format($cf) >= 0) && (number_format($cf) < 5)) {
                                    echo '<span style="color: red;">'.number_format($cf).' (Valores) </span>';
                                } elseif ((number_format($cf) >= 5) && (number_format($cf) <= 10)) {
                                    echo '<span style="color: black;">'.number_format($cf).' (Valores) </span>';
                                }
                            ?>
                        </b>
                    </td>
                </tr>
                <!-- ========================================================= -->
                <?php $i++; } ?>
            </tbody>
        </table>
        <!--        Paragrafo 3 
        ----------------------------------------------------------- -->
        <p class="paragrafo">
            Por ser verdade possou-se a presente Declaração que vai por mim assinada e autenticada com o carimbo á óleo
            em uso neste estabelecimento de ensino.
        </p>
        <!--        Paragrafo 4 
        ----------------------------------------------------------- -->
        <p class="paragrafo">
            Escola do Ensino Primário Nº 1188, (Ex. 5028), em Luanda, aos
            <?= strftime('%d de %B de %Y', strtotime(date('d-m-Y')));?>.
        </p>
        <!--        Assinatura 
            ----------------------------------------------------------- -->
        <p class="assinatura">
            <strong>
                <br>
                A Directora
                <br><br>
                _______________________________
                <br>
                Filomena da Silva Ramos
            </strong>
        </p>
    </div>
</body>

</html>