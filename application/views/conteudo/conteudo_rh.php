<!--		INICIO CONTEUDO		-->
<div id="content" class="content">
    <!----------------------------------------------->
    <!-- TITULO CONTEUDO -->
    <h2 class="page-header"><i class="fa fa-home mr-2"></i>PÁGINA INICIAL - RH</h2>
    <?= $this->session->flashdata('msg'); ?>
    <!-- FIM TITULO CONTEUDO -->

    <!-- INICIO ROW -->
    <div class="row">
        <!------------------------------------------------------------------------------------------->
        <div class="col-lg-3 col-md-6">
            <div class="widget widget-stats bg-info">
                <div class="stats-icon"><i class="fa fa-users"></i></div>
                <div class="stats-info">
                    <h4>DIRECÇÃO</h4>
                    <p><?= $numero_direccao ?></p>
                </div>
                <div class="stats-link">
                    <a href="<?= site_url('rh/funcionario/listar_direccao'); ?>">VER LISTA
                        <i class="fa fa-arrow-alt-circle-right ml-3"></i></a>
                </div>
            </div>
        </div>
        <!------------------------------------------------------------------------------------------->
        <div class="col-lg-3 col-md-6">
            <div class="widget widget-stats bg-info">
                <div class="stats-icon"><i class="fa fa-users"></i></div>
                <div class="stats-info">
                    <h4>DIRECÇÃO PEDAGÓGICA</h4>
                    <p><?= $numero_direccao ?></p>
                </div>
                <div class="stats-link">
                    <a href="<?= site_url('rh/funcionario/listar_direccao'); ?>">VER LISTA
                        <i class="fa fa-arrow-alt-circle-right ml-3"></i></a>
                </div>
            </div>
        </div>
        <!------------------------------------------------------------------------------------------->
        <div class="col-lg-3 col-md-6">
            <div class="widget widget-stats bg-info">
                <div class="stats-icon"><i class="fa fa-user-plus"></i></div>
                <div class="stats-info">
                    <h4>SECRETARIA</h4>
                    <p><?= $numero_secretaria ?></p>
                </div>
                <div class="stats-link">
                    <a href="<?= site_url('rh/funcionario/listar_secretaria'); ?>">VER LISTA
                        <i class="fa fa-arrow-alt-circle-right ml-3"></i></a>
                </div>
            </div>
        </div>
        <!------------------------------------------------------------------------------------------->
        <div class="col-lg-3 col-md-6">
            <div class="widget widget-stats bg-info">
                <div class="stats-icon"><i class="fa fa-edit"></i></div>
                <div class="stats-info">
                    <h4>RECURSOS HUMANOS</h4>
                    <p><?= $numero_rh ?></p>
                </div>
                <div class="stats-link">
                    <a href="<?= site_url('rh/funcionario/listar_rh'); ?>">VER LISTA
                        <i class="fa fa-arrow-alt-circle-right ml-3"></i></a>
                </div>
            </div>
        </div>
        <!------------------------------------------------------------------------------------------->
        <div class="col-lg-3 col-md-6">
            <div class="widget widget-stats bg-info">
                <div class="stats-icon"><i class="fa fa-user"></i></div>
                <div class="stats-info">
                    <h4>COORDENAÇÃO</h4>
                    <p><?= $numero_coordenacao ?></p>
                </div>
                <div class="stats-link">
                    <a href="<?= site_url('rh/funcionario/listar_coordenacao'); ?>">VER LISTA
                        <i class="fa fa-arrow-alt-circle-right ml-3"></i></a>
                </div>
            </div>
        </div>
        <!------------------------------------------------------------------------------------------->
        <div class="col-lg-3 col-md-6">
            <div class="widget widget-stats bg-info">
                <div class="stats-icon"><i class="fa fa-user"></i></div>
                <div class="stats-info">
                    <h4>DOCENTES</h4>
                    <p><?= $numero_docentes ?></p>
                </div>
                <div class="stats-link">
                    <a href="<?= site_url('rh/funcionario/listar_docentes'); ?>">VER LISTA
                        <i class="fa fa-arrow-alt-circle-right ml-3"></i></a>
                </div>
            </div>
        </div>
        <!------------------------------------------------------------------------------------------->
        <div class="col-lg-3 col-md-6">
            <div class="widget widget-stats bg-info">
                <div class="stats-icon"><i class="fa fa-user"></i></div>
                <div class="stats-info">
                    <h4>SERVIÇOS GERAIS</h4>
                    <p><?= $numero_sg ?></p>
                </div>
                <div class="stats-link">
                    <a href="<?= site_url('rh/funcionario/listar_sg'); ?>">VER LISTA
                        <i class="fa fa-arrow-alt-circle-right ml-3"></i></a>
                </div>
            </div>
        </div>
        <!------------------------------------------------------------------------------------------->
        <div class="col-lg-3 col-md-6">
            <div class="widget widget-stats bg-info">
                <div class="stats-icon"><i class="fa fa-user"></i></div>
                <div class="stats-info">
                    <h4>SEGURANÇA</h4>
                    <p><?= $numero_seguraca ?></p>
                </div>
                <div class="stats-link">
                    <a href="<?= site_url('rh/funcionario/listar_seguranca'); ?>">VER LISTA
                        <i class="fa fa-arrow-alt-circle-right ml-3"></i></a>
                </div>
            </div>
        </div>
        <!------------------------------------------------------------------------------------------->
    </div><!--  end row -->