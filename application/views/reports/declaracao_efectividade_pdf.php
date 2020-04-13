<!DOCTYPE html>
<html lang="pt-br">
<?php setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' ); ?>

<head>
    <meta charset="UTF-8">
    <title>Declaração de Efectividade - <?= $funcionario_row->nome_funcionario; ?></title>
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

    .text-center {
        width: 30%;
        text-align: center;
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
            Escola do Ensino Primário N.º 1523 (Ex. 1188) <br>
        </b>
    </p>
    <div class="text-center">
        Visto do (a) <br>Chefe de Repartição<br>
        ________________________
    </div>

    <p class="head">
        <br>
        <span class="titulo">DECLARAÇÃO DE EFECTIVIDADE</span>
    </p>
    <!--        Paragrafo 1 
    ----------------------------------------------------------- -->
    <div>
        <p class="paragrafo">
            <b>Filomena da Silva Ramos</b> Directora da Escola do Ensino Primário n.º 1188 (Ex. 5028). Declara que o (a)
            Senhor (a) <b><?= $funcionario_row->nome_funcionario; ?></b> é funcionario (a) desta escola
            exercendo a função de
            <b><?php 
                if ($funcionario_row->nivel_acesso == "1") {
                    echo 'Director (a)';
                } elseif ($funcionario_row->nivel_acesso == "2") {
                    echo 'Serviços Administrativo';
                } elseif ($funcionario_row->nivel_acesso == "3") {
                    echo 'Técnico de Recursos Humanos';
                } elseif ($funcionario_row->nivel_acesso == "4") {
                    echo 'Coordenador (a)';
                } elseif ($funcionario_row->nivel_acesso == "5") {
                    echo 'Professor (a)';
                } elseif ($funcionario_row->nivel_acesso == "6") {
                    echo 'Técnico de Informática';
                } elseif ($funcionario_row->nivel_acesso == "7") {
                    echo 'Auxiliar de Serviços Gerais';
                } elseif ($funcionario_row->nivel_acesso == "8") {
                    echo 'Seguraça e Proteção Física';
                }
            ?></b>.
        </p>
        <!--        Paragrafo 3 
        ----------------------------------------------------------- -->
        <p class="paragrafo">
            <b>OBS: a mesma é para efeito da assinatura da ficha financeira referente ao mês de
                <?= strftime('%B', strtotime(date('d-m-Y')));?>.</b>
        </p>
        <!--        Paragrafo 4
        ----------------------------------------------------------- -->
        <p class="paragrafo">
            Por ser verdade e me ter sido solicitada, mandei passar a presente Declaração que vai por mim assinada e
            autenticada com o carimbo á óleo
            em uso nesta instituição.
        </p>
        <!--        Paragrafo 5
        ----------------------------------------------------------- -->
        <p class="paragrafo">
            Luanda, aos
            <?= strftime('%d de %B de %Y', strtotime(date('d-m-Y')));?>.
        </p>
        <!--        Assinatura 
            ----------------------------------------------------------- -->
        <p class="assinatura">
            <strong>
                <br>
                A Directora da Escola
                <br><br>
                _______________________________
                <br>
                Filomena da Silva Ramos
            </strong>
        </p>
    </div>
</body>

</html>