<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <!-- begin page-header -->
    <h4 class="page-header"><i class="fa fa-plus mr-5"></i>NOVA DISCIPLINA</h4>
    <?= $this->session->flashdata('msg'); ?>
    <!-- begin table-responsive -->
    <div class="col-6 mx-auto my-5">
        <form action="<?php echo site_url('secretaria/disciplina/guardar')?>" method="POST" id="form_disciplinas">
            <fieldset>
                <div class="row">
                    <div class="form-group col-12">
                        <label for="nome_disciplina">Nome da Disciplina</label>
                        <input type="text" name="nome_disciplina" class="form-control" id="nome_disciplina"
                            placeholder="Digite o nome da disciplina" autocomplete="off" />
                    </div>
                    <div class="form-group col-12">
                        <label for="sigla_disciplina">Sigla</label>
                        <input type="text" name="sigla_disciplina" class="form-control" id="sigla_disciplina"
                            placeholder="Digite a sigla da disciplina" autocomplete="off" />
                    </div>
                    <!--------------------------- SELECT DINAMICO ---------------------------------------->
                    <div class="form-group col-12">
                        <label for="nome_classe">Classe</label>
                        <select name="nome_classe" class="form-control" id="nome_classe" 
                            <option value="">Selecione a classe</option>
                            <?php foreach($classe as $cls): ?>
                            <option value="<?= $cls->id_classe ?>"> <?= $cls->nome_classe; ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!------------------------------------------------------------------------------------>
                    <div class="form-group col-12">
                        <button type="submit" class="btn btn-primary btn-block mt-3"><i class="fa fa-save mr-3"></i>Guardar</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
<!-- FIM FORMULÁRIO -->
</div>
<!-- FIM DO CONTEUDO -->