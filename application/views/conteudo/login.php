<!-- begin #page-container -->
<div id="page-container" class="fade">
    <!-- begin login -->
    <div class="login login-with-news-feed">
        <!-- begin news-feed -->
        <div class="news-feed">
            <div class="news-image"
                style="background-image: url(<?= site_url('_assets/img/login-bg/login-bg.jpg'); ?>)">
            </div>
        </div><!-- end news-feed -->
        <!-- begin right-content -->
        <div class="right-content">
            <!-- begin login-header -->
            <div class="login-header">
                <div class="brand">
                    <h4 class="text-primary"><b>SISTEMA DE GESTÃO ESCOLAR</b></h4>
                    <small class="text-grey-darker">Escola do Ensino Primário Nº 1523 - Rangel</small>
                </div>
                <div class="icon">
                    <i class="fa fa-sign-in"></i>
                </div>
            </div><!-- end login-header -->
            <!-- begin login-content -->
            <div class="login-content">
                <form action="<?= site_url('sessao/login') ?>" method="post" class="margin-bottom-0" id="form_login">
                    <fieldset>
                        <legend class="text-primary">ENTRAR</legend>
                        <!-- input user name -->
                        <div class="form-group ">
                            <input type="text" name="nome_user" id="nome_user"
                                class="form-control form-control-lg bg-transparent text-primary border-primary"
                                placeholder="Nome de Utilizador" autocomplete="off" /><?= form_error('nome_user'); ?>
                        </div>
                        <!-- input passe-word -->
                        <div class="form-group">
                            <input type="password" name="password" id="password"
                                class="form-control form-control-lg bg-transparent text-primary border-primary"
                                placeholder="Palavra Passe" autocomplete="off" /><?= form_error('password'); ?>
                        </div>
                        <strong><?= $this->session->flashdata('msg');?></strong>
                        <div class="login-buttons mb-5">
                            <button type="submit" class="btn btn-outline-primary btn-block btn-lg">Entrar</button>
                        </div>
                    </fieldset>
                </form>
                <hr />
                <p class="text-center text-grey-darker">
                    &copy; Copyright 2020 Ermano Cristovão - Todos os direitos revardos
                </p>
                </form>
            </div><!-- end login-content -->
        </div><!-- end right-container -->
    </div><!-- end login -->