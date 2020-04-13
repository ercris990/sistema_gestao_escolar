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
                <ul class="nav nav-profile bg-light text-dark">
                    <li>
                        <a href="<?= site_url('rh/funcionario/detalhe/'.$this->session->userdata('id_funcionario').'/'.
                        $this->session->userdata('nivel_acesso')); ?>" class="text-dark">
                            <i class="fa fa-user bg-gradient-blue"></i> Ver Perfil</a>
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
            <!-- INICIO MENU E SUB MENU -->
            <li class="has-sub">
                <a href="<?= site_url('home/recursos_humanos') ?>">
                    <!-- <b class="caret"></b> -->
                    <i class="fa fa-home bg-gradient-dark"></i>
                    <span><b>PÁGINA INICIAL</b></span>
                </a>
            </li><!-- end pagina inicial -->
            <!-- --------------------------------------------------------------- -->
            <!-- begin menu funcionario -->
            <li class="has-sub">
                <a href="<?= site_url('rh/funcionario/novo_funcionario')?>">
                    <i class="fa fa-user-plus bg-gradient-blue"></i>
                    <span>NOVO FUNCIONARIO</span>
                </a>
            </li><!-- end menu funcionarios -->
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-list bg-gradient-blue"></i>
                    <span>LISTAR FUNCIONARIO</span>
                </a>
                <ul class="sub-menu">
                    <!---------------------------------------------------------------------------->
                    <li class="has-sub">
                        <a href="<?= site_url('rh/funcionario/listar_direccao')?>">
                            Direcção
                        </a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <!-- --------------------------- -->
                    <li class="has-sub">
                        <a href="<?= site_url('rh/funcionario/listar_rh')?>">
                            Recursos Humanos
                        </a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <!-- --------------------------- -->
                    <li class="has-sub">
                        <a href="<?= site_url('rh/funcionario/listar_secretaria')?>">
                            Secretaria
                        </a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <!-- --------------------------- -->
                    <li class="has-sub">
                        <a href="<?= site_url('rh/funcionario/listar_coordenacao')?>">
                            Coordenação
                        </a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <!-- --------------------------- -->
                    <li class="has-sub">
                        <a href="<?= site_url('rh/funcionario/listar_docentes')?>">
                            Docente
                        </a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <!-- --------------------------- -->
                    <li class="has-sub">
                        <a href="<?= site_url('rh/funcionario/listar_sg')?>">
                            Serviços Gerais
                        </a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <!-- --------------------------- -->
                    <li class="has-sub">
                        <a href="<?= site_url('rh/funcionario/listar_seguranca')?>">
                            Segurança
                        </a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <!-- --------------------------- -->
                    <li class="has-sub">
                        <a href="<?= site_url('rh/funcionario/listar_todos_funcionarios')?>">
                            Todos Funcionários
                        </a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <!-- --------------------------- -->
                </ul>
            </li>
            <li class="has-sub">
                <a href="<?= site_url('rh/funcionario/mapa_assiduidade')?>">
                    <i class="fa fa-list bg-gradient-blue"></i>
                    <span>MAPA DE FALTAS</span>
                </a>
            </li>
            <!-- 
            ---------------------------------------------------------------------------->
            <!-- begin button minimizar -->
            <li>
                <a href=" javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify">
                    <i class="ion-ios-arrow-left"></i>
                    <span>Minimizar</span>
                </a>
            </li><!-- end button minimizar -->
        </ul><!-- end sidebar -->
    </div><!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg-"></div>
<!--        FIM SIDEBAR        -->