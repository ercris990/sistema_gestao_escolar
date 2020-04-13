<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <!-- begin page-header -->
    <h4 class="page-header"><i class="fa fa-edit mr-5"></i>ALTERAR DISCIPLINA</h4>
    <?= $this->session->flashdata('msg'); ?>
    <!-- begin table-responsive -->
    <div class="col-6 mx-auto my-5">
        <form action="<?php echo site_url('secretaria/disciplina/salvaractualizacao')?>" method="POST"
            id="form_disciplinas">
            <fieldset>
                <input type="hidden" name="id_disciplina" id="id_disciplina"
                    value=" <?= $disciplina[0]->id_disciplina; ?>">

                <!-- CAMPO NOME DISCIPLINA -->
                <div class="form-group col-12">
                    <label for="nome_disciplina">Nome da Disciplina</label>
                    <input type="text" name="nome_disciplina" class="form-control" id="nome_disciplina"
                        placeholder="Digite a disciplins" value=" <?= $disciplina[0]->nome_disciplina; ?>" />
                </div>
                <!-- CAMPO SIGLA DISCIPLINA -->
                <div class="form-group col-12">
                    <label for="sigla_disciplina">Sigla da Disciplina</label>
                    <input type="text" name="sigla_disciplina" class="form-control" id="sigla_disciplina"
                        placeholder="Digite a disciplins" value=" <?= $disciplina[0]->sigla_disciplina; ?>" />
                </div>
                <!--------------------------- SELECT DINAMICO ---------------------------------------->
                <div class="form-group col-12">
                    <label for="nome_classe">Classe</label>
                    <select name="nome_classe" class="form-control" id="nome_classe" <option value="">
                        <!------------------------------------------------------------>
                        <?php foreach($classe as $cls):       
                                        if($disciplina[0]->classe_id==$cls->id_classe) { ?>
                        <option value="<?= $cls->id_classe ?>" selected=""> <?= $cls->nome_classe; ?>
                        </option>
                        <?php 
                                        } else{ ?>
                        <option value="<?= $cls->id_classe ?>"> <?= $cls->nome_classe; ?> </option><?php 
                                        } 
                                endforeach; ?>
                        <!------------------------------------------------------------>
                    </select>
                </div>
                <!------------------------------------------------------------------------------------>
                <div class="form-group col-12">
                    <button type="submit" class="btn btn-primary btn-block mt-3"><i
                            class="fa fa-edit mr-3"></i>Actualizar</button>
                </div>
            </fieldset>
        </form>
    </div>