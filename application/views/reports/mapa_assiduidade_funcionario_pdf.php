<!DOCTYPE html>
<html lang="pt-br">
<?php setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' ); ?>

<head>
    <meta charset="UTF-8">
    <title>Faltas - <?= $mes; ?></title>
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
        width: 50%;
    }

    .left {
        float: left;
    }

    .right {
        float: left;
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
            <span class="titulo">LEVANTAMENTO DE FALTAS</span>
        </b>
    </p>
    <!--        Paragrafo 1 
    ----------------------------------------------------------- -->
    <p class="paragrafo assinatura">
        Levantamento de faltas referente ao mês de <?= strftime('%B de %Y', strtotime($mes));?>.
    </p>
    <!-- ------------------------------------------------- -->
    <div class="coluna_0">
        <table>
            <thead>
                <tr>
                    <th>Nº</th>
                    <th>NOME COMPLETO</th>
                    <th>GENRO</th>
                    <th>FUNÇÃO</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; foreach ($assiduidade_funcionarios as $assid_func) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $assid_func->nome_funcionario; ?></td>
                    <td><?php 
                            if(($assid_func->genero_funcionario) == "Masculino"){
                                    echo "M";
                                } else {
                                    echo "F";
                                }
                            ?></td>
                    <td><?php
                            if ($assid_func->nivel_acesso == "1") {
                                echo 'Director (a)';
                            } elseif ($assid_func->nivel_acesso == "2") {
                                echo 'Técnico de Administrativo';
                            } elseif ($assid_func->nivel_acesso == "3") {
                                echo 'Técnico de Recursos Humanos';
                            } elseif ($assid_func->nivel_acesso == "4") {
                                echo 'Coordenador (a)';
                            } elseif ($assid_func->nivel_acesso == "5") {
                                echo 'Professor (a)';
                            } elseif ($assid_func->nivel_acesso == "6") {
                                echo 'Técnico de Informática';
                            } elseif ($assid_func->nivel_acesso == "7") {
                                echo 'Auxiliar de Serviços Gerais';
                            } elseif ($assid_func->nivel_acesso == "8") {
                                echo 'Seguraça';
                            }
                        ?></td>
                </tr>
                <?php $i++; endforeach ?>
            </tbody>
        </table>
    </div>
    <!-- ------------------------------------------------- -->

    <div class="coluna_0">
        <table>
            <thead>
                <tr>
                    <th>F. MARCADAS</th>
                    <th>F. JUSTIFICADAS</th>
                    <th>F. NÃO JUSTIFICADAS</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; foreach ($num_faltas as $n_falta) : ?>
                <tr>
                    <td><?= $n_falta->falta; ?></td>
                    <td><?= $n_falta->justificacao; ?></td>
                    <td><?php 
                            $fnj = ($n_falta->falta - $n_falta->justificacao);
                            echo $fnj;
                        ?></td>
                </tr>
                <?php $i++; endforeach ?>
            </tbody>
        </table>
    </div>
    <!-- ------------------------------------------------- -->
    <div>
        <!--        Assinatura 
        ----------------------------------------------------------- -->
        <p class="assinatura">
            <br>
            Luanda, aos <?= strftime('%d de %B de %Y', strtotime(date('d-m-Y')));?>.
            <strong>
                <br><br>
                A Directora da Escola
                <br><br>
                ___________________________________
            </strong>
        </p>
    </div>
</body>

</html>