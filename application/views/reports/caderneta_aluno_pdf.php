<!DOCTYPE html>
<html lang="pt-br">
<?php setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' ); ?>

<head>
    <meta charset="UTF-8">
    <title>Caderneta do Aluno</title>
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
        width: 60px;
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

    .al-center {
        text-align: center;
    }

    .coluna_0 {
        width: 10%;
    }

    .coluna_1 {
        width: 40%;
    }

    .coluna_2 {
        width: 15%;
    }

    .coluna_3 {
        width: 35%;
    }
    </style>
</head>

<body>
    <!-- ----------------------------------------------------------- -->
    <p class="head">
        <img src="_assets/img/insignia_001.jpg"><br>
        <strong>
            República de Angola<br>
            Direcção Provincial da Educação de Luanda<br>
            Repartição da Educação do Distrito Urbano do Rangel<br>
            Escola do Ensino Primário N.º 1523 (Ex. 1188)<br><br>
            BOLETIM DE NOTAS
        </strong>
    </p>
    <!-- ----------------------------------------------------------- -->
    <div>
        <table>
            <thead>
                <tr>
                    <th colspan="4">DADOS DO ALUNO</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="coluna_2"><strong>Nome do Aluno: </strong></td>
                    <td class="coluna_3"><strong><?= $matricula_row->nome; ?></strong>
                    </td>
                    <td class="coluna_2"><strong>Nº de Processo: </strong></td>
                    <td class="coluna_3"><strong><?= $matricula_row->num_processo; ?></strong></td>
                </tr>
                <tr>
                    <td><strong> Ano Lectivo: </strong></td>
                    <td><strong><?= $matricula_row->ano_let; ?></strong>
                    <td><strong> Classe: </strong></td>
                    <td><strong><?= $matricula_row->nome_classe; ?></strong>
                    </td>
                </tr>
                <tr>
                    <td><strong> Turma: </strong></td>
                    <td><strong><?= $matricula_row->nome_turma; ?></strong>
                    <td><strong> Sala: </strong></td>
                    <td><strong><?= $matricula_row->numero_sala; ?> - <?= $matricula_row->nome_periodo; ?></strong>
                </tr>
            </tbody>
        </table>
    </div><!-- end table responsive -->
    <!-- --------------------------------------------------------------------------- -->
    <!-- begin table-responsive -->
    <div>
        <table>
            <thead>
                <tr>
                    <th colspan="5"> NOTAS </th>
                </tr>
                <tr>
                    <th class="coluna_0 al-center">Nº.</th>
                    <th class="coluna_1 al-center">DISCIPLINA</th>
                    <th class="coluna_2 al-center">1º TRIMESTRE</th>
                    <th class="coluna_2 al-center">2º TRIMESTRE</th>
                    <th class="coluna_2 al-center">3º TRIMESTRE</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; foreach ($matricula as $row) { ?>
                <tr>
                    <td class="al-center"><?= $i; ?></td>
                    <td><?= $row->nome_disciplina; ?></td>
                    <!--    CLASSIFICACAO TRIMESTRAL - CT
                    ------------------------------------------------------------------------------- -->
                    <td class="al-center">
                        <b><?php
                        if ($row->ct_1 == ""){
                            echo '<span style="color: black;"> - </span>';
                        } elseif ((number_format($row->ct_1, 1) >= 0) && (number_format($row->ct_1, 1) < 5)) {
                            echo '<span style="color: red;">'.number_format($row->ct_1, 1).' (valores) </span>';
                        } elseif ((number_format($row->ct_1, 1) >= 5) && (number_format($row->ct_1, 1) <= 10)) {
                            echo '<span style="color: black;">'.number_format($row->ct_1, 1).' (valores) </span>';
                        }
                        ?></b>
                    </td>
                    <!--    CLASSIFICACAO TRIMESTRAL - CT
                    ------------------------------------------------------------------------------- -->
                    <td class="al-center">
                        <b><?php
                        if ($row->ct_2 == ""){
                            echo '<span style="color: black;"> - </span>';
                        } elseif ((number_format($row->ct_2, 1) >= 0) && (number_format($row->ct_2, 1) < 5)) {
                            echo '<span style="color: red;">'.number_format($row->ct_2, 1).' (valores) </span>';
                        } elseif ((number_format($row->ct_2, 1) >= 5) && (number_format($row->ct_2, 1) <= 10)) {
                            echo '<span style="color: black;">'.number_format($row->ct_2, 1).' (valores) </span>';
                        }
                        ?></b>
                    </td>
                    <!--    CLASSIFICACAO TRIMESTRAL - CT
                    ------------------------------------------------------------------------------- -->
                    <td class="al-center">
                        <b><?php
                        if ($row->ct_3 == ""){
                            echo '<span style="color: black;"> - </span>';
                        } elseif ((number_format($row->ct_3, 1) >= 0) && (number_format($row->ct_3, 1) < 5)) {
                            echo '<span style="color: red;">'.number_format($row->ct_3, 1).' (valores) </span>';
                        } elseif ((number_format($row->ct_3, 1) >= 5) && (number_format($row->ct_3, 1) <= 10)) {
                            echo '<span style="color: black;">'.number_format($row->ct_3, 1).' (valores) </span>';
                        }
                        ?></b>
                    </td>
                </tr>
                <?php $i++; } ?>
            </tbody>
        </table>
    </div><!-- end table responsive -->
    <p class="head">
        Luanda, aos <?= strftime('%d de %B de %Y', strtotime(date('Y-m-d'))); ?>.
        <br>
        <br>
        <b>
            A Secretaria<br><br>
            ____________________________________<br>
            <?= $this->session->userdata('nome_funcionario') ?>
        </b>
    </p>
</body>

</html>