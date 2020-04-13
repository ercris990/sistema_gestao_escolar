<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <!-- begin page-header -->
    <h4 class="page-header"><i class="fa fa-edit mr-5"></i>ALTERAR PERÍODO</h4>
    <?= $this->session->flashdata('msg'); ?>
    <!-- begin table-responsive -->
    <div class="col-6 mx-auto my-5">
        <form action="<?php echo site_url('secretaria/periodo/salvaractualizacao')?>" method="POST">
            <fieldset>
                <input type="hidden" name="id_periodo" id="id_periodo" value=" <?= $periodo[0]->id_periodo; ?> ">
                <!-- CAMPO NOME PERÍODO -->
                <div class="form-group col-12">
                    <label for="nome_periodo">PERÍODO</label>
                    <select name="nome_periodo" class="form-control" id="nome_periodo" required>
                        <option value="">Selecione o período</option>
                        <option value="Manhã" <?= $periodo[0]->nome_periodo=='Manhã'? 'selected':'';?>>Manhã
                        </option>
                        <option value="Tarde" <?= $periodo[0]->nome_periodo=='Tarde'? 'selected':'';?>>Tarde
                        </option>
                        <option value="Noite" <?= $periodo[0]->nome_periodo=='Noite'? 'selected':'';?>>Noite
                        </option>
                    </select>
                    <button type="submit" class="btn btn-primary mt-3"><i class="fa fa-edit mr-3"></i>ACTUALIZAR</button>
                </div>
            </fieldset>
        </form>
    </div>