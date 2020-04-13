<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <!-- begin page-header -->
    <h4 class="page-header"><i class="fa fa-search mr-3"></i>RESULTADO DA PESQUISA</h4>
    <?= $this->session->flashdata('msg'); ?>
    <!-- end page-header -->
    <!------------------------ conteudo ------------------------>
    <div class="mt-4">
        <!-- begin table-responsive -->
        <?php foreach ($listagem as $resultado) : ?>
        <div class="col-lg-12 col-md-6 text-uppercase">
            <div class="widget widget-stats bg-light">
                <div class="stats-icon"><i class="fa fa-user"></i></div>
                <div class="row">
                    <div class="mr-3">
                        <img src="<?= base_url("_assets/upload/".$resultado["photo"]); ?>">
                    </div>
                    <div class="stats-info">
                        <div class="">
                            <strong class="text-dark">
                                Nome: <span class="text-primary"><?= $resultado['nome'] ?></span><br>
                                Data de Nascimento: <span
                                    class="text-primary"><?= date('d/m/Y', strtotime($resultado['nascimento_aluno'])); ?></span><br>
                                Género: <span class="text-primary"> <?= $resultado['genero_aluno'] ?></span><br>
                                <?= $resultado['tipo_documento'] ?> Nº.: <span
                                    class="text-primary"><?= $resultado['num_documento'] ?></span><br>
                                Aluno Nº.: <span class="text-primary"> <?= $resultado['num_processo'] ?></span><br>
                            </strong>
                        </div>
                    </div>
                </div>
                <div class="stats-link">
                    <a href="<?= site_url('secretaria/aluno/detalhe?id_aluno='.$resultado['id_aluno']) ?>">
                        Ver perfil do aluno<i class="fa fa-arrow-right ml-3"></i>
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach ; ?>
    </div>