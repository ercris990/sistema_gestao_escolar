<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <!-- begin page-header -->
    <h4 class="page-header"><i class="fa fa-plus mr-5"></i>NOVA CLASSE</h4>
    <?= $this->session->flashdata('msg'); ?>
    <!-- begin table-responsive -->
    <div class="col-6 mx-auto my-5 text-uppercase">
        <form action="<?php echo site_url('secretaria/classe/guardar')?>" method="POST">
            <fieldset>
                <div class="form-group col-12">
                    <label for="nome_classe">Classe</label>
                    <select name="nome_classe" class="form-control" id="nome_classe" required>
                        <option value="">Selecione a classe</option>
                        <optgroup label="Ensino Primário">
                            <option value="Iniciaçaão"> Iniciação </option>
                            <option value="1ª Classe"> 1ª Classe </option>
                            <option value="2ª classe"> 2ª classe </option>
                            <option value="3ª classe"> 3ª classe </option>
                            <option value="4ª classe"> 4ª classe </option>
                            <option value="5ª classe"> 5ª classe </option>
                            <option value="6ª classe"> 6ª classe </option>
                        </optgroup>
                    </select>
                </div>
                <!--------------------------- SELECT DINAMICO ---------------------------------------->
                <div class="form-group col-12">
                    <label for="nivel">Nível</label>
                    <select name="nivel" class="form-control" id="nivel" required>
                        <option value="">Selecione o nível</option>
                        <option value="Ensino Primário"> Ensino Primário </option>
                    </select>
                </div>
                <!------------------------------------------------------------------------------------>
                <div class="form-group col-12">
                    <button type="submit" class="btn btn-primary btn-block mt-3"><i
                            class="fa fa-save mr-3"></i>GUARDAR</button>
                </div>
            </fieldset>
        </form>
    </div>