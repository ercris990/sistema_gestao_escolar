<!--    INICIO SIDE BARR   -->
<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <a href="javascript:;" data-toggle="nav-profile">
                    <div class="info">
                        <b class="caret"></b><?= $this->session->userdata('nome_funcionario') ?>
                        <small>Direcção Pedagógica</small>
                    </div>
                </a>
            </li>
            <li>
                <ul class="nav nav-profile bg-light text-dark">
                    <li>
                        <a href="<?= site_url('rh/funcionario/detalhe/'.$this->session->userdata('id_funcionario').'/'.
                        $this->session->userdata('nivel_acesso')); ?>" class="text-dark">
                            <i class="fa fa-user bg-gradient-blue"></i> Ver Perfil
                        </a>
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
        <ul class="nav text-uppercase">
            <!-- <li class="nav-header"><strong>PAINEL DIRECÇÃO</strong></li> -->
            <!--                INICIO MENU E SUB MENU
            ---------------------------------------------------------------------->
            <li class="has-sub">
                <a href="<?= site_url('home/direccao') ?>">
                    <i class="fa fa-home bg-gradient-dark"></i>
                    <span>PÁGINA INICIAL</span>
                </a>
            </li><!-- end pagina inicial -->
            <!-- -------------------- MENU SECRETARIA -------------------- -->
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-briefcase bg-gradient-blue"></i>
                    <span><b>Secretaria</b></span>
                </a>
                <ul class="sub-menu">
                    <!--    SUBMENU ALUNO
                    --------------------------------->
                    <li class="has-sub">
                        <a href="<?php echo site_url('secretaria/aluno/novo_aluno')?>">Alunos</a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <!--    SUBMENU - ANO LECTIVO
                    --------------------------------->
                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret"></b>
                            Ano Lectivo
                        </a>
                        <ul class="sub-menu">
                            <div class="dropdown-divider"></div>
                            <li><a href="<?php echo site_url('secretaria/anolectivo/novo_ano')?>">Novo Ano Lectivo</a>
                            </li>
                            <div class="dropdown-divider"></div>
                            <li><a href="<?php echo site_url('secretaria/anolectivo/listar_ano')?>">Listar Anos</a></li>
                        </ul>
                    </li>
                    <div class="dropdown-divider"></div>
                    <!--    SUBMENU - TURMA
                    --------------------------------->
                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret"></b>
                            Turmas
                        </a>
                        <ul class="sub-menu">
                            <div class="dropdown-divider"></div>
                            <li><a href="<?php echo site_url('secretaria/turma/nova_turma')?>">Criar Nova Turma</a></li>
                            <div class="dropdown-divider"></div>
                            <li><a href="<?php echo site_url('secretaria/turma/listar_turma')?>">Listar Turmas</a></li>
                        </ul>
                    </li>
                    <div class="dropdown-divider"></div>
                    <!--    SUBMENU - PERÍODO
                    --------------------------------->
                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret"></b>
                            Período
                        </a>
                        <ul class="sub-menu">
                            <div class="dropdown-divider"></div>
                            <li><a href="<?php echo site_url('secretaria/periodo/novo_periodo')?>">Criar Novo</a></li>
                            <div class="dropdown-divider"></div>
                            <li><a href="<?php echo site_url('secretaria/periodo/listar_periodo')?>">Listar Períodos</a>
                            </li>
                        </ul>
                    </li>
                    <div class="dropdown-divider"></div>
                    <!--    SUBMENU - CLASSE
                    --------------------------------->
                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret"></b>
                            Classe
                        </a>
                        <ul class="sub-menu">
                            <div class="dropdown-divider"></div>
                            <li><a href="<?php echo site_url('secretaria/classe/nova_classe')?>">Criar Nova</a></li>
                            <div class="dropdown-divider"></div>
                            <li><a href="<?php echo site_url('secretaria/classe/listar_classe')?>">Listar</a></li>
                        </ul>
                    </li>
                    <div class="dropdown-divider"></div>
                    <!--    SUBMENU - DISCIPLINA
                    --------------------------------->
                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret"></b>
                            Disciplinas
                        </a>
                        <ul class="sub-menu">
                            <div class="dropdown-divider"></div>
                            <li><a href="<?php echo site_url('secretaria/disciplina/nova_disciplina')?>">Criar Nova
                                    Disciplina</a></li>
                            <div class="dropdown-divider"></div>
                            <li><a href="<?php echo site_url('secretaria/disciplina/listar_disciplina')?>">Listar
                                    Disciplinas</a></li>
                        </ul>
                    </li>
                    <div class="dropdown-divider"></div>
                    <!--    SUBMENU - SALA
                    --------------------------------->
                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret"></b>
                            Sala
                        </a>
                        <ul class="sub-menu">
                            <div class="dropdown-divider"></div>
                            <li><a href="<?php echo site_url('secretaria/sala/nova_sala')?>">Criar Nova Sala</a></li>
                            <div class="dropdown-divider"></div>
                            <li><a href="<?php echo site_url('secretaria/sala/listar_sala')?>">Listar Salas</a></li>
                        </ul>
                    </li>
                    <div class="dropdown-divider"></div>

                </ul>
            </li>
            <!--                FIM MENU SECRETARIA           
                ------------------------------------------------------------------------------------------->
            <!--                INICIO MENU RH
                ------------------------------------------------------------------------------------------->
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-briefcase bg-gradient-blue"></i>
                    <span><b>R. H.</b></span>
                </a>
                <ul class="sub-menu">
                    <!--    SUBMENU - FUNCIONARIO
                    --------------------------------->
                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret"></b>
                            Funcionário
                        </a>
                        <ul class="sub-menu">
                            <div class="dropdown-divider"></div>
                            <li><a href="<?php echo site_url('rh/funcionario/novo_funcionario')?>">Criar Novo</a></li>
                            <div class="dropdown-divider"></div>
                            <li><a href="<?php echo site_url('rh/funcionario/listar_funcionario')?>">Listar
                                    Funcionários</a></li>
                            <div class="dropdown-divider"></div>
                        </ul>
                    </li>
                    <div class="dropdown-divider"></div>
                </ul>
            </li>
            <!--                      FIM MENU RH           
            ------------------------------------------------------------------------------------------->
            <!--                    INICIO MENU PROFESSOR           
            ------------------------------------------------------------------------------------------->
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-briefcase bg-gradient-blue"></i>
                    <span><b>Professores</b></span>
                </a>
                <ul class="sub-menu">
                    <!--    SUBMENU - PROFESSOR
                    --------------------------------->
                    <li><a href="<?php echo site_url('secretaria/professor/listar_professor')?>">Listar
                            Professores</a></li>
                    <div class="dropdown-divider"></div>
                </ul>
            </li>
            <!-- ---------------------------------------------------------------------------------------------------------- -->
            <!-- ---------------------------------------------------------------------------------------------------------- -->
            <!-- INICIO BOTÃO MINIMIZAR -->
            <li><a href=" javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i
                        class="ion-ios-arrow-left"></i> <span>Minimizar</span></a></li>
            <!-- FIM BOTÃO MINIMIZAR -->
        </ul>
        <!-- FIM NAV SIDEBAR -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg-"></div>
<!--        FIM SIDEBAR        -->