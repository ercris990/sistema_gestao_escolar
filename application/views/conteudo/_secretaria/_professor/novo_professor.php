<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <!-- begin page-header -->
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="javascript:;">Pagina Inicial</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Professor</a></li>
        <li class="breadcrumb-item active">Novo Professor</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h4 class="page-header">PROFESSOR</h4>
    <?= $this->session->flashdata('msg'); ?>
    <!-- end page-header -->

    <!------------------------ conteudo ------------------------>
    <!-- begin invoice -->
    <div class="invoice">
        <!-- begin invoice-company -->
        <div class="invoice-company text-center ">
            <strong>INSERIR NOVO PROFESSOR</strong>
        </div>
        <!-- end invoice-company -->
        <div class="invoice-content">
            <!-- begin table-responsive -->
            <div class="col-11 m-auto">
                <form action="<?php echo site_url('secretaria/professor/guardar')?>" method="POST" id="form_professor">
                    <fieldset>
                        <div class="row">
                            <!-- <div class="form-group col-12">
                                <label for="nome_professor">Professor</label>
                                <input type="text" name="nome_professor" class="form-control" id="nome_professor"
                                    placeholder="Digite o Ano Lectivo" required autocomplete="off" />
                            </div> -->
                            <!------------ SELECT - DINAMICO ------------>
                            <div class="form-group col-4">
                                <label>Departamento</label>
                                <select name="departamento" id="departamento" class="form-control">
                                    <option value="">Selecione o departamento</option>
                                    <?php
                                    foreach($departamento as $row)
                                        {
                                            echo '<option value= "'.$row->id_departamento.'">'.$row->nome_departamento.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            <!------------ SELECT - DINAMICO ------------>
                            <div class="form-group col-8">
                                <label>Professor</label>
                                <select name="funcionario" id="funcionario" class="form-control" disabled>
                                    <option value="">Selecione antes uma departamento</option>
                                </select>
                            </div>
                            <!------------ SELECT - DINAMICO ------------>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Guardar</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>