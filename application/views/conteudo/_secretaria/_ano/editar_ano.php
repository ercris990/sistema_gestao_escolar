<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <!-- begin page-header -->
    <h4 class="page-header"><i class="fa fa-edit mr-5"></i>ALTERAR ANO LECTIVO</h4>
    <?= $this->session->flashdata('msg'); ?>
    <!-- begin table-responsive -->
    <div class="col-6 mx-auto my-5">
        <form action="<?php echo site_url('secretaria/anolectivo/salvaractualizacao')?>" method="POST">
            <fieldset>
                <input type="hidden" name="id_ano" id="id_ano" value=" <?= $anolectivo[0]->id_ano; ?>">
                <div class="row">
                    <!-- CAMPO ANO LECTIVO -->
                    <div class="form-group col-12">
                        <label for="ano_let">Ano Lectivo</label>
                        <input type="text" name="ano_let" class="form-control" id="ano_let" placeholder="Ano Lectivo"
                            value=" <?= $anolectivo[0]->ano_let; ?>" required />
                    </div>
                    <div class="form-group col-12">
                        <button type="submit" class="btn btn-primary btn-block mt-3"><i class="fa fa-edit mr-3"></i>ACTUALIZAR
                        </button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>