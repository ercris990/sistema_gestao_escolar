<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <!-- begin page-header -->
    <h5 class="page-header">Actualizar Utilizador</h5>
    <!-- end page-header -->

    <!--    INICIO PAINEL TABELAS
            -->
    <div class="panel panel-inverse">
        <!-- begin panel-heading -->
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                        class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i
                        class="fa fa-redo"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i
                        class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i
                        class="fa fa-times"></i></a>
            </div>
            <h4 class="panel-title">Actualizar Utilizador</h4>
        </div>
        <!--    end panel-heading 
                -->
        <!--  INICIO FORMULÁRIO
        -->
        <div class="jumbotron bg-light">
            <form action="<?php echo site_url('rh/utilizador/salvaractualizacao')?>" method="POST">
                <fieldset>
                    <input type="hidden" name="id_utilizador" id="id_utilizador" value=" <?= $utilizador[0]->id_utilizador; ?>">
                    <div class="row">
                        <!-- CAMPO NOME -->
                        <div class="form-group col-4">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome_utilizador" class="form-control" id="nome_utilizador"
                                placeholder="Nome de Utilizador" value=" <?= $utilizador[0]->nome_utilizador; ?>" required />
                        </div>
                        <!-- CAMPO SENHA -->
                        <div class="form-group col-4">
                            <label for="senha">Palavra Passe</label>
                            <input type="text" name="senha" class="form-control" id="senha" placeholder="Palavra Passe" value=" <?= $utilizador[0]->senha; ?>"
                                required />
                        </div>
                        <!-- CAMPO DEPARTAMEMNTO -->
                        <div class="form-group col-4">
                            <label for="departamento">Departamento</label>
                            <select name="departamento" class="form-control" id="departamento" required>
                                <option value="">Selecione o Departamento</option>
                                <option value="Direcção Geral" <?= $utilizador[0]->departamento=='Direcção Geral'? 'selected':'';?> >Direcção Geral</option>
                                <option value="Direcção Pedagógica" <?= $utilizador[0]->departamento=='Direcção Pedagógica'? 'selected':'';?> >Direcção Pedagógica</option>
                                <option value="Recursos Humanos"  <?= $utilizador[0]->departamento=='Recursos Humanos'? 'selected':'';?> >Recursos Humanos</option>
                                <option value="Secretaria" <?= $utilizador[0]->departamento=='Secretaria'? 'selected':'';?> >Secretaria</option>
                                <option value="Coordenação" <?= $utilizador[0]->departamento=='Coordenação'? 'selected':'';?> >Coordenação</option>
                                <option value="Docente" <?= $utilizador[0]->departamento=='Docente'? 'selected':'';?> >Docente</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Guardar</button>
                </fieldset>
            </form>
        </div>
        <!-- FIM FORMULÁRIO
                -->
    </div>
    <!-- FIM DO CONTEUDO
            -->