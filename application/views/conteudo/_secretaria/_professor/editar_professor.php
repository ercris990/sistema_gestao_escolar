<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <!-- begin page-header -->
    <h5 class="page-header">Actualizar Utilizador</h5>
    <?= $this->session->flashdata('msg'); ?>
    <!-- end page-header -->
    <!--    INICIO PAINEL TABELAS -->
    <div class="panel panel-inverse">
        <!-- begin panel-heading -->
        <h4 class="panel-title">Actualizar Ano Lectivo</h4>
    </div>
    <!--    end panel-heading -->
    <!--  INICIO FORMULÁRIO -->
    <div class="jumbotron bg-light">
        <form action="<?php echo site_url('secretaria/professor/salvaractualizacao')?>" method="POST">
            <fieldset>
                <input type="hidden" name="id_professor" id="id_professor" value=" <?= $professor[0]->id_professor; ?>">
                <div class="row">
                    <!-- CAMPO ANO LECTIVO -->
                    <div class="form-group col-6">
                        <label for="nome_professor">Nome</label>
                        <input type="text" name="nome_professor" class="form-control" id="nome_professor"
                            placeholder="Ano Lectivo" value=" <?= $professor[0]->nome_professor; ?>" required />
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-3">Actualizar</button>
            </fieldset>
        </form>
    </div>