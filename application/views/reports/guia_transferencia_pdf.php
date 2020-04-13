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
            <span class="titulo">GUIA DE TRANSFERÊNCIA</span>
        </b>
    </p>
    <!--        Paragrafo 1 
    ----------------------------------------------------------- -->
    <div>
        <p class="paragrafo">
            Conforme solicitado pelo encarregado de educação, vai o aluno (a) da <?= $matricula_row->nome_classe; ?>,
            turno da <?= $matricula_row->nome_periodo; ?>, de nome <b><?= $matricula_row->nome; ?></b>, nascido(a) aos
            <?= strftime('%d de %B de %Y', strtotime($matricula_row->nascimento_aluno)); ?>, natural de
            <?= $matricula_row->nome_municipio; ?>, Província de <?= $matricula_row->nome_provincia; ?>, filho(a) de
            <?= $matricula_row->nome_pai; ?> e de <?= $matricula_row->nome_mae; ?>,
            <?php if($matricula_row->tipo_documento == "Cédula Pessoal"){ echo "portador(a) da ";
            }else{ echo "portador(a) do"; }?>
            <?= $matricula_row->tipo_documento; ?> n.º <?= $matricula_row->num_documento; ?>, emitido aos
            <?= strftime('%d de %B de %Y', strtotime($matricula_row->data_emissao_doc)); ?>,
            <?php if($matricula_row->tipo_documento == "Cédula Pessoal"){ echo "pela Conservatória do Registro Civil de ";
            }else{ echo "pela Repartição de Identificação de "; }?><?= $matricula_row->nome_provincia; ?>.
            Vai transferido (a) para a <b>Escola nº. <?= $numero_escola; ?></b>, Provincia de
            <?= $provincia->nome_provincia; ?>, Municipio de <?= $municipio->nome_municipio; ?>.
        </p>

        <!--        Paragrafo 3 
        ----------------------------------------------------------- -->
        <p class="paragrafo">
            Por ser verdade e me ter sido solicitada mandei passar a presente declaração que vai por mim assinada e
            autenticada com o carimbo á óleo em uso nesta escola.
        </p>
        <!--        Paragrafo 4 
        ----------------------------------------------------------- -->
        <br>
        <p class="paragrafo">
            Luanda, aos <?= strftime('%d de %B de %Y', strtotime(date('d-m-Y')));?>.
        </p>
        <!--        Assinatura 
            ----------------------------------------------------------- -->
        <p class="assinatura">
            <strong>
                <br>
                A Directora da Escola
                <br><br><br>
                ___________________________________
                <br>
                Filomena da Silva Ramos
            </strong>
        </p>
    </div>
</body>

</html>