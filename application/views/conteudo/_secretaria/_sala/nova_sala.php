<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <!-- begin page-header -->
    <h4 class="page-header"><i class="fa fa-plus mr-5"></i>NOVA SALA</h4>
    <?= $this->session->flashdata('msg'); ?>
    <!-- begin table-responsive -->
    <div class="col-6 mx-auto my-5">
        <form action="<?php echo site_url('secretaria/sala/guardar')?>" method="POST">
            <fieldset>
                <div class="form-group col-12">
                    <label for="numero_sala">SALA</label>
                    <input type="text" name="numero_sala" class="form-control" id="numero_sala" maxlength="2"
                        placeholder="Sala" required />
                </div>
                <div class="form-group col-12">
                    <button type="submit" class="btn btn-primary btn-block mt-3"><i class="fa fa-save mr-3"></i>Guardar</button>
                </div>
            </fieldset>
        </form>
    </div>