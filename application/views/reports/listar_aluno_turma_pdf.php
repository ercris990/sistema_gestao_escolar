<!DOCTYPE html>
<html lang="pt-br">
<?php setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' ); ?>

<head>
    <meta charset="UTF-8">
    <title>Lista Nominal</title>
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

    td span {
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
        width: 5%;
    }

    .coluna_1 {
        width: 20%;
    }

    .coluna_2 {
        width: 15%;
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
            Escola do Ensino Primário N.º 1523 (Ex. 1188)<br><br><br>
            LISTA NOMINAL<br>
        </strong>
    </p>
    <!-- ----------------------------------------------------------- -->
    <div>
        <table>
            <tbody>
                <tr>
                    <td class="bold coluna_1 al-center">
                        Ano Lectivo: <span><?= $listagem_alunos->ano_let; ?></span>
                    </td>
                    <td class="bold coluna_1 al-center">
                        Turma: <span><?= $listagem_alunos->nome_turma; ?></span>
                    </td>
                    <td class="bold coluna_1 al-center">
                        Classe: <span><?= $listagem_alunos->nome_classe; ?></span>
                    </td>
                    <td class="bold coluna_1 al-center">
                        Periodo: <span><?= $listagem_alunos->nome_periodo; ?></span>
                    </td>
                    <td class="bold coluna_1 al-center">
                        Sala: <span><?= $listagem_alunos->numero_sala; ?></span>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- ----------------------------------------------------------- -->
        <table>
            <thead>
                <tr>
                    <th class="coluna_0">Nº.</th>
                    <th class="coluna_2">Nº. DE PROCESSO</th>
                    <th class="">NOME DO ALUNO</th>
                    <th class="coluna_1">GÉNERO</th>
                    <th class="coluna_1">DATA DE NASCIMENTO</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; foreach ($alunos as $aluno) : ?>
                <tr>
                    <td class="al-center"><?= $i; ?></td>
                    <td class="al-center"><?= $aluno->num_processo; ?></td>
                    <td><?= $aluno->nome; ?></td>
                    <td class="al-center">
                        <?php
                            if ($aluno->genero_aluno == "Feminino"){
                                echo 'F';
                            } elseif ($aluno->genero_aluno == "Masculino"){
                                echo 'M';
                            }
                        ?>
                    </td>
                    <td class="al-center"><?= date('d/m/Y', strtotime($aluno->nascimento_aluno)); ?></td>
                </tr>
                <?php $i++; endforeach ?>
            </tbody>
        </table>
        <!-- ----------------------------------------------------------- -->
        <p class="head">
            Luanda, aos <?= strftime('%d de %B de %Y', strtotime(date('Y-m-d')));
            ?>.
            <br>
            <br>
            <br>
            <b>
                O Subdirector Pedagógico<br><br>
                ____________________________________<br>
                <!-- <?= $this->session->userdata('nome_funcionario') ?> -->
            </b>
        </p>
    </div>
</body>

</html>