<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <!-- begin page-header -->
    <h4 class="page-header"><i class="fa fa-plus mr-5"></i>NOVO ANO LECTIVO</h4>
    <?= $this->session->flashdata('msg'); ?>
    <!-- begin table-responsive -->
    <div class="col-6 mx-auto my-5">
        <form action="<?php echo site_url('secretaria/anolectivo/guardar')?>" method="POST" id="form_anolectivo">
            <fieldset>
                <div class="row col-12 mx-auto">
                    <div class="form-group col-12">
                        <label for="ano_let">ANO LECTIVO</label>
                        <input type="text" name="ano_let" class="form-control" id="ano_let" minlength="4" maxlength="4"
                            placeholder="Ex: 2019" autocomplete="off" />
                    </div>
                    <div class="form-group col-12">
                        <button type="submit" class="btn btn-primary btn-block mt-3"><i
                                class="fa fa-save mr-3"></i>GUARDAR</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>