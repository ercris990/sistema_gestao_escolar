<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <!-- begin page-header -->
    <h4 class="page-header"><i class="fa fa-list mr-5"></i>NOVO PERÍODO</h4>
    <?= $this->session->flashdata('msg'); ?>
    <!-- begin table-responsive -->
    <div class="col-6 mx-auto my-5">
        <form action="<?php echo site_url('secretaria/periodo/guardar')?>" method="POST">
            <fieldset>
                <div class="row">

                    <div class="form-group col-12">
                        <label for="nome_periodo">Período</label>
                        <select name="nome_periodo" class="form-control" id="nome_periodo" required>
                            <option value="">Selecione o período</option>
                            <option value="Manhã">Manhã</option>
                            <option value="Tarde">Tarde</option>
                            <option value="Noite">Noite</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">GUARDAR</button>
            </fieldset>
        </form>
    </div>