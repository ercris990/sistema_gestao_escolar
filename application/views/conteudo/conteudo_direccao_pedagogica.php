<!--		INICIO CONTEUDO		-->
<div id="content" class="content">
    <!----------------------------------------------->
    <!-- TITULO CONTEUDO -->
    <h2 class="page-header"><i class="fa fa-briefcase mr-5"></i>PÁGINA INICIAL - DIRECÇÃO PEDAGÓGICA</h2>
    <?= $this->session->flashdata('msg'); ?>
    <!-- INICIO ROW -->
    <div class="row mt-5">
        <!-- begin col-3 -->
        <div class="col-lg-3 col-md-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-user"></i></div>
                <div class="stats-info">
                    <h4>ALUNOS</h4>
                    <p><?= $numero_alunos ?></p>
                </div>
                <div class="stats-link">
                    <!-- <a href="<?= site_url('secretaria/aluno/listar_aluno')?>">Ver Detalhes -->
                    <a href="#">Ver Detalhes
                        <i class="fa fa-arrow-right ml-3"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-lg-3 col-md-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-users"></i></div>
                <div class="stats-info">
                    <h4>TURMAS</h4>
                    <p><?= $numero_turmas ?></p>
                </div>
                <div class="stats-link">
                    <a href="<?= site_url('secretaria/turma/listar_turmas')?>">Ver Detalhes<i
                            class="fa fa-arrow-right ml-3"></i></a>
                </div>
            </div>
        </div><!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-lg-3 col-md-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-edit"></i></div>
                <div class="stats-info">
                    <h4>SALAS</h4>
                    <p><?= $numero_salas ?></p>
                </div>
                <div class="stats-link">
                    <a href="<?= site_url('secretaria/sala/listar_sala')?>">Ver Detalhes<i
                            class="fa fa-arrow-right ml-3"></i></a>
                </div>
            </div>
        </div><!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-lg-3 col-md-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-user"></i></div>
                <div class="stats-info">
                    <h4>PROFESSORES</h4>
                    <p><?= $numero_professores ?></p>
                </div>
                <div class="stats-link">
                    <a href="<?= site_url('secretaria/professor/listar_professor')?>">Ver Detalhes<i
                            class="fa fa-arrow-right ml-3"></i></a>
                </div>
            </div>
        </div><!-- end col-3 -->
    </div><!--  end row -->