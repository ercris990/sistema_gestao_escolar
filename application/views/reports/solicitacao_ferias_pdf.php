<!DOCTYPE html>
<html lang="pt-br">
<?php setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' ); ?>

<head>
    <meta charset="UTF-8">
    <title>Solicitacao de Ferias - <?= $funcionario_row->nome_funcionario; ?></title>
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

    .text-center {
        width: 30%;
        text-align: center;
        word-spacing: 4px;
        word-wrap: normal;
        line-height: 22px;
        padding: 0px 17px;
    }

    .text-right {
        float: right;
        width: 35%;
        text-align: center;
        word-spacing: 4px;
        word-wrap: normal;
        line-height: 22px;
        padding: 0px 17px;
    }

    .align-left {
        float: left;
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
            <span class="titulo">SOLICITAÇÃO DE FÉRIAS</span>
        </b>
    </p>
    <div class="text-center">
        <b>Visto do(a) Director(a)</b><br>
        _______________________
    </div>
    <div class="text-right">
        <strong>
            <span class="align-left"> À</span><br>
            <span class="align-left"> EXMA SENHORA DIRECTORA</span>
        </strong>
    </div><br><br><br>
    <!--        Paragrafo 1 
    ----------------------------------------------------------- -->
    <div>
        <p class="paragrafo">
            Nome: <b><?= $funcionario_row->nome_funcionario; ?></b><br>
            Função: <b><?php 
                if ($funcionario_row->nivel_acesso == "1") {
                    echo 'Director(a)';
                } elseif ($funcionario_row->nivel_acesso == "2") {
                    echo 'Técnico de Administrativo';
                } elseif ($funcionario_row->nivel_acesso == "3") {
                    echo 'Técnico de Recursos Humanos';
                } elseif ($funcionario_row->nivel_acesso == "4") {
                    echo 'Coordenador(a)';
                } elseif ($funcionario_row->nivel_acesso == "5") {
                    echo 'Professor(a)';
                } elseif ($funcionario_row->nivel_acesso == "6") {
                    echo 'Técnico de Informática';
                } elseif ($funcionario_row->nivel_acesso == "7") {
                    echo 'Auxiliar de Serviços Gerais';
                } elseif ($funcionario_row->nivel_acesso == "8") {
                    echo 'Seguraça';
                }
            ?></b><br>
            Vem por intermédio desta solicitar, a Vª Excia, a concessão de férias de que tem direito nos termos do
            artigo 13º da Lei Geral do Trabalho, com efeitos apartir de
            <b><?= strftime('%d de %B de %Y', strtotime($data_inicio)); ?></b> á
            <b><?= strftime('%d de %B de %Y', strtotime($data_fim)); ?></b>.-
        </p>

        <!--        Paragrafo 3 
        ----------------------------------------------------------- -->
        <br>
        <p class="paragrafo">
            <b>Parecer do(a) Director(a)</b><br>
            ______________________________________________________________________________
            ______________________________________________________________________________
            ______________________________________________________________________________
            ______________________________________________________________________________
            ______________________________________________________________________________
        </p>
        <!--        Assinatura 
            ----------------------------------------------------------- -->
        <br>
        <p class="assinatura">
            Espero Deferimento<br><br>
            Luanda, aos <?= strftime('%d de %B de %Y', strtotime(date('d-m-Y')));?>.-
            <br><br>
            <strong>
                <br>
                O(a) Solicitante
                <br><br><br>
                ___________________________________<br>
                <?= $funcionario_row->nome_funcionario; ?>
            </strong>
        </p>
    </div>
</body>

</html>