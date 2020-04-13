<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <!-- begin page-header -->
    <h4 class="page-header"><i class="fa fa-plus mr-5"></i>ACTUALIZAR Nº DA SALA</h4>
    <?= $this->session->flashdata('msg'); ?>
    <!-- begin table-responsive -->
    <div class="col-6 mx-auto my-5">
        <form action="<?php echo site_url('secretaria/sala/salvaractualizacao')?>" method="POST">
            <fieldset>
                <input type="hidden" name="id_sala" id="id_sala" value="<?= $sala[0]->id_sala; ?>">
                <!-- CAMPO SALA -->
                <div class="form-group col-12">
                    <label for="numero_sala">Nome</label>
                    <input type="text" name="numero_sala" class="form-control" id="numero_sala"
                        placeholder="Digite o número da sala" value="<?= $sala[0]->numero_sala; ?>"
                        autocomplete="off" />
                </div>
                <div class="form-group col-12">
                    <button type="submit" class="btn btn-primary btn-block mt-3"><i class="fa fa-save mr-3"></i>ACTUALIZAR</button>
                </div>
            </fieldset>
        </form>
    </div>