<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <!-- begin page-header -->
    <h4 class="page-header"><i class="fa fa-edit mr-5"></i>ALTERAR CLASSE</h4>
    <?= $this->session->flashdata('msg'); ?>
    <!-- begin table-responsive -->
    <div class="col-6 mx-auto my-5 text-uppercase">
        <form action="<?= site_url('secretaria/classe/salvaractualizacao')?>" method="POST">
            <fieldset>
                <input type="hidden" name="id_classe" id="id_classe" value=" <?= $classe[0]->id_classe; ?>">
                <div class="row">
                    <!-- CAMPO NOME CLASSE -->
                    <div class="form-group col-12">
                        <label for="nome_classe">Classe</label>
                        <select name="nome_classe" class="form-control" id="nome_classe" required>
                            <optgroup label="Ensino Primário">
                                <option value="Iniciaçaão" <?= $classe[0]->nome_classe=='Iniciaçaão'? 'selected':'';?>>
                                    Iniciação</option>
                                <option value="1ª Classe" <?= $classe[0]->nome_classe=='1ª Classe'? 'selected':'';?>>
                                    1ª Classe</option>
                                <option value="2ª Classe" <?= $classe[0]->nome_classe=='2ª Classe'? 'selected':'';?>>
                                    2ª classe</option>
                                <option value="3ª Classe" <?= $classe[0]->nome_classe=='3ª Classe'? 'selected':'';?>>
                                    3ª classe</option>
                                <option value="4ª Classe" <?= $classe[0]->nome_classe=='4ª Classe'? 'selected':'';?>>
                                    4ª classe</option>
                                <option value="5ª Classe" <?= $classe[0]->nome_classe=='5ª Classe'? 'selected':'';?>>
                                    5ª classe</option>
                                <option value="6ª Classe" <?= $classe[0]->nome_classe=='6ª Classe'? 'selected':'';?>>
                                    6ª classe</option>
                            </optgroup>

                        </select>
                    </div>
                    <div class="form-group col-12">
                        <label for="nivel">Nível</label>
                        <select name="nivel" class="form-control" id="nivel" required>
                            <option value="Ensino Primário" <?= $classe[0]->nivel=='Ensino Primário'? 'selected':'';?>>
                                Ensino Primário </option>
                        </select>
                    </div>
                    <div class="form-group col-12">
                        <button type="submit" class="btn btn-primary btn-block mt-3"><i
                                class="fa fa-edit mr-3"></i>ACTUALIZAR</button>
                    </div>
            </fieldset>
        </form>
    </div><!-- FIM FORMULÁRIO -->
</div>
</div>