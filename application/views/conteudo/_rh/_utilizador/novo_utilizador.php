<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <!--    INICIO PAINEL TABELAS   -->
    <div class="panel panel-info pb-3 ">
        <!-- begin panel-heading -->
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                        class="fa fa-expand"></i></a>
            </div>
            <h4 class="panel-title">Criar Novo Utilizador</h4>
        </div>
        <!-- end panel-heading -->
        <!--  INICIO FORMULÁRIO  -->
        <div class="bg-light col-6 mx-auto py-4 mt-3">
            <form action="<?php echo site_url('rh/utilizador/guardar')?>" method="POST">
                <fieldset>
                    <div class="row">

                        <div class="form-group col-12">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome_utilizador" class="form-control" id="pai"
                                placeholder="Nome de Utilizador" autocomplete="off" />
                        </div>

                        <div class="form-group col-12">
                            <label for="departamento">Nivel de Acesso</label>
                            <select name="departamento" class="form-control" id="departamento">
                                <option value="">Selecione o Nivel de Acesso</option>
                                <option value="Direcção Geral">Direcção Geral</option>
                                <option value="Direcção Pedagógica">Direcção Pedagógica</option>
                                <option value="Recursos Humanos">Recursos Humanos</option>
                                <option value="Secretaria">Secretaria</option>
                                <option value="Coordenação">Coordenação</option>
                                <option value="Docente">Docente</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <label for="senha">Palavra Passe</label>
                            <input type="text" name="senha" class="form-control" id="senha" placeholder="Palavra Passe"
                                autocomplete="off" />
                        </div>

                        <div class="form-group col-12">
                            <label for="senha">Repita a Palavra Passe</label>
                            <input type="text" name="senha" class="form-control" id="repita-senha"
                                placeholder="Repita a Palavra Passe" autocomplete="off" />
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary mt-3 col-2"> Guardar </button>
                </fieldset>
            </form>
        </div>
        <!-- FIM FORMULÁRIO
                -->
    </div>
    <!-- FIM DO CONTEUDO
            -->