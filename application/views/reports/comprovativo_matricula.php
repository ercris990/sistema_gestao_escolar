<!DOCTYPE html>
<html lang="pt-br">
<?php setlocale(LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese');?>

<head>
    <meta charset="UTF-8">
    <title>Comprovativo de Matricula</title>
    <style>
    body {
        /* font-family: "Arial" */
        font-family: Arial, Helvetica, Sans-serif;
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
        width: 70%;
    }

    .coluna_2 {
        width: 20%;
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
            Escola do Ensino Primário N.º 1523 (Ex. 1188) <br><br>
            Comprovativo de Matrícula
        </strong>
    </p>
    <!-- ----------------------------------------------------------- -->
    <div>
        <div>
            <table>
                <thead>
                    <tr>
                        <th colspan="4">DADOS DO ALUNO</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Nome: </strong></td>
                        <td><strong><?= $matricula_row->nome; ?></strong></td>
                        <td><strong> Ano lectivo: </strong></td>
                        <td><strong><?= $matricula_row->ano_let; ?></strong>
                    </tr>
                    <tr>
                        <td><strong><?= $matricula_row->tipo_documento; ?> nº.:</strong></td>
                        <td><strong><?= $matricula_row->num_documento; ?> </strong></td>
                        <td><strong> Classe: </strong></td>
                        <td><strong><?= $matricula_row->nome_classe; ?></strong></td>
                    </tr>
                    <tr>
                        <td><strong>Género: </strong></td>
                        <td><strong><?= $matricula_row->genero_aluno; ?></strong></td>
                        <td><strong> Turma: </strong></td>
                        <td><strong><?= $matricula_row->nome_turma; ?></strong>
                    </tr>
                    <tr>
                        <td><strong>Aluno Nº.:</strong></td>
                        <td><strong><?= $matricula_row->num_processo; ?></strong></td>
                        <td><strong> Periodo: </strong></td>
                        <td><strong><?= $matricula_row->nome_periodo; ?></strong></td>
                    </tr>
                    <tr>
                        <td><strong> Data de Nascimento: </strong></td>
                        <td><strong><?= date('d/m/Y', strtotime($matricula_row->nascimento_aluno)); ?></strong></td>
                        <td><strong> Sala: </strong></td>
                        <td><strong><?= $matricula_row->numero_sala; ?></strong></td>
                    </tr>
                </tbody>
            </table>
        </div><!-- end table responsive -->
        <!-------------------------------------------------------------------------------------->
        <!-- begin table-responsive -->
        <div>
            <table>
                <thead>
                    <tr>
                        <th colspan="3">DISCIPLINAS</th>
                    </tr>
                    <tr>
                        <th class="coluna_0">Nº. </th>
                        <th class="coluna_1">NOME DA DISCIPLINA </th>
                        <th class="coluna_2">SIGLA </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach ($matricula as $linha) { ?>
                    <tr>
                        <td class="al-center"><?= $i; ?></td>
                        <td><?= $linha->nome_disciplina;  ?></td>
                        <td class="al-center"><?= $linha->sigla_disciplina; ?></td>
                    </tr>
                    <?php $i++; } ?>
                </tbody>
            </table>
        </div><!-- end table responsive -->
        <!-- ----------------------------------------------------------- -->
        <div>
            <table>
                <thead>
                    <tr>
                        <th colspan="2">DADOS DO FUNCIONÁRIO</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="coluna_0">Utlizador:</td>
                        <td><?= $matricula_row->nome_funcionario; ?></td>
                    </tr>
                    <tr>
                        <td>Data:</td>
                        <td><?=strftime('%d de %B de %Y', strtotime($matricula_select['created'])); ?></td>
                    </tr>
                    <tr>
                        <td>Hora:</td>
                        <td><?= date('H:i:s', strtotime($matricula_select['created'])); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- ----------------------------------------------------------- -->
    </div><!-- end invoice content -->
    <!-- ----------------------------------------------------------- -->
</body>

</html>