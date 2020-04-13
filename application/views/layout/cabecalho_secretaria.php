<!DOCTYPE html>
<html lang="pt-br">
<?php setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' ); ?>

<head>
    <meta charset="utf-8" />
    <title>SiGE | Sistema de Gestão Escolar</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="Ermano Cristovao" />
    <!-- ================== INICIO BASE CSS STYLE ================== -->
    <link href="<?= base_url(); ?>_assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>_assets/plugins/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>_assets/plugins/font-awesome/5.0/css/fontawesome-all.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>_assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>_assets/plugins/animate/animate.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>_assets/css/apple/style.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>_assets/css/apple/style-responsive.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>_assets/css/apple/croppie.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>_assets/css/apple/theme/default.css" rel="stylesheet" id="theme" />
    <!-- ================== FIM BASE CSS STYLE ================== -->
    <script src="<?=base_url(); ?>_assets/plugins/jcrop/js/ie-emulation-modes-warning.js"></script>
    <link rel="stylesheet" href="<?=base_url(); ?>_assets/plugins/jcrop/css/jquery.Jcrop.css" type="text/css" />
    <link rel="stylesheet" href="<?=base_url(); ?>_assets/plugins/jcrop/css/ie10-viewport-bug-workaround.css"
        type="text/css" />
    <!-- ===================== INICIO BASE JS ==================== -->
    <!-- <script src="<?= base_url(); ?>_assets/plugins/pace/pace.min.js" type="text/javascript"></script> -->
    <!-- ====================== FIM BASE JS ===================== -->
    <!-- INICIO CSS -->
    <style>
    .error {
        color: red;
    }

    .imagem-box {
        width: 250px;
        height: 250px;
    }

    .pauta_geral_flex {
        display: flex;
        flex-wrap: nowrap;
    }
    </style>
</head>

<body>
    <!-- INICIO #page-loader -->
    <div id="page-loader" class="fade show"><span class="spinner"></span></div>
    <!-- FIM #page-loader -->
    <!-- INICIO #page-container -->
    <div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed page-with-top-menu">
        <!-- INICIO #header -->
        <div id="header" class="header navbar-default bg-primary">
            <!-- INICIO NAVBAR HEADER -->
            <div class="navbar-header">
                <a href="javascript:;" class="navbar-brand text-light">
                    <b class="text-light">Sistema de Gestão Escolar </b>
                    | <small> Escola do Ensino Primário Nº 1088</small>
                </a>
                <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div><!-- FIM NAVBAR HEADER -->
            <!-- INICIO HEADER NAV -->
            <ul class="navbar-nav navbar-right">
                <li>
                    <form action="<?= site_url('secretaria/aluno/resultado_pesquisa') ?>" method="post"
                        name="form_pesquisar" class="navbar-form">
                        <div class="form-group">
                            <input type="text" class="form-control input-white" name="pesquisar" id="pesquisar"
                                placeholder="Digite o nome do aluno..." autocomplete="off" />
                            <button type="submit" class="btn btn-search" onclick="return validar_pesquisa()"><i
                                    class="ion-ios-search-strong"></i></button>
                        </div>
                    </form>
                </li>
            </ul><!-- FIM HEADER NAVIGATION RIGHT -->
        </div><!-- FIM HEADER -->