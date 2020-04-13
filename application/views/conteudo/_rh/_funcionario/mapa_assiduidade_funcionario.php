<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <h4 class="page-header"><i class="fa fa-list mr-5"></i>MAPA DE ASSIDUIDADE MENSAL</h4>
    <?= $this->session->flashdata('msg'); ?>
    <div class="row alert alert-primary border mt-5">
        <h4>MAPA DE FALTAS GERAL</h4>
        <div class="col-12">
            <form action="<?= site_url('rh/funcionario/mapa_assiduidade_funcionario')?>" method="POST"
                class="form-inline" id="form_listagem">
                <!-- SELECT ANO LECTIVO -->
                <div class="form-group col-10">
                    <input type="month" name="mes" id="mes" class="form-control col-12 border-primary">
                </div>
                <div class="form-group col-2">
                    <button type="submit" class="btn btn-block btn-primary m-r-5">
                        <i class="fa fa-list mr-2"></i>VER MAPA
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- ------------------------------------------------------------------------------------------------- -->
    <div class="row alert alert-primary border mt-5 text-center">
        <h4>MAPA DE FALTAS INDIVIDUAL</h4>
        <div class="col-12">
            <form action="<?= site_url('rh/funcionario/mapa_assiduidade_individual')?>" method="POST"
                class="form-inline" id="form_listagem">
                <!-- SELECT FUNCIONARIO -->
                <div class="form-group col-5">
                    <select name="funcionario_id" id="funcionario_id" class="form-control col-12 border-primary">
                        <option value="">Selecione o funcionário</option>
                        <?php foreach($funcionarios as $row)
                            {
                                echo '<option value= "'.$row->id_funcionario.'">'.$row->nome_funcionario.'</option>';
                            }
                        ?>
                    </select>
                </div>
                <!-- CAMPO MES -->
                <div class="form-group col-5">
                    <input type="month" name="mes" id="mes" class="form-control col-12 border-primary">
                </div>
                <div class="form-group col-2">
                    <button type="submit" class="btn btn-block btn-primary m-r-5">
                        <i class="fa fa-list mr-2"></i>VER MAPA
                    </button>
                </div>
            </form>
        </div>
    </div>