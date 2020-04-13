<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <h4 class="page-header"><i class="fa fa-list mr-5"></i>LISTA NOMINAL</h4>
    <?= $this->session->flashdata('msg'); ?>
    <div class="row alert alert-primary border mt-2">
        <div class="col-12">
            <form action="<?= site_url('secretaria/listagem/listar_aluno_turma')?>" method="POST" class="form-inline"
                id="form_listagem">
                <!-- SELECT ANO LECTIVO -->
                <div class="form-group col-5">
                    <select name="anolectivo" id="anolectivo" class="form-control border-primary col-12" />
                    <?= $options_anos; ?>
                    </select>
                </div>
                <!-- SELECT TURMA -->
                <div class="form-group col-5">
                    <select name="turma_id" id="turma_id" class="form-control border-primary col-12" />
                    <?= $options_turmas; ?>
                    </select>
                </div>
                <div class="form-group col-2">
                    <button type="submit" class="btn btn-block btn-primary m-r-5">
                        <i class="fa fa-list mr-2"></i>VIZUALIZAR LISTA
                    </button>
                </div>
            </form>
        </div>
    </div>