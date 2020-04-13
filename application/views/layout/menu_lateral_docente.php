<!--    INICIO SIDE BARR   -->
<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <a href="javascript:;" data-toggle="nav-profile">
                    <div class="info">
                        <b class="caret"></b><strong><?= $this->session->userdata('nome_funcionario') ?></strong>
                        <small><?php
                            if($this->session->userdata('nivel_acesso') == "1")    {echo "<b>Direcção</b>";}
                            elseif($this->session->userdata('nivel_acesso') == "2"){echo "<b>Secretaria</b>";}
                            elseif($this->session->userdata('nivel_acesso') == "3"){echo "<b>Recursos Humanos</b>";}
                            elseif($this->session->userdata('nivel_acesso') == "4"){echo "<b>Coordenacção</b>";}
                            elseif($this->session->userdata('nivel_acesso') == "5"){echo "<b>Docente</b>";}
                            elseif($this->session->userdata('nivel_acesso') == "6"){echo "<b>TI</b>";}
                        ?></small>
                    </div>
                </a>
            </li>
            <li>
                <ul class="nav nav-profile bg-light">
                    <li>
                        <a href="<?= site_url('rh/funcionario/detalhe_professor?id_funcionario='.$this->session->userdata('id_funcionario')); ?>"
                            class="text-dark"><i class="fa fa-user bg-gradient-blue"></i> Ver Perfil</a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                        <a href="<?= site_url('sessao/logout') ?>" class="text-dark">
                            <i class="ion-log-out bg-gradient-blue"></i>Sair</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav text-uppercase mt-3">
            <!--                INICIO MENU E SUB MENU
            ---------------------------------------------------------------------->
            <li class="has-sub">
                <a href="<?= site_url('home/docente') ?>">
                    <!-- <b class="caret"></b> -->
                    <i class="fa fa-home bg-gradient-dark"></i>
                    <span><b>PÁGINA INICIAL</b></span>
                </a>
            </li><!-- end pagina inicial -->
            <!-- INICIO BOTÃO MINIMIZAR -->
            <li>
                <a href=" javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify">
                    <i class="ion-ios-arrow-left"></i>
                    <span>Minimizar</span></a>
            </li>
            <!-- FIM BOTÃO MINIMIZAR -->
        </ul>
        <!-- FIM NAV SIDEBAR -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg-"></div>
<!-- FIM SIDEBAR -->