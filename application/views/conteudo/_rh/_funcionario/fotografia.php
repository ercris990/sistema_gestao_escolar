<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <!-- TITULO CONTEUDO -->
    <h6 class="page-header"><i class="fa fa-camera mr-2"></i>ALTERAR FOTOGRAFIA</h6>
    <?= $this->session->flashdata('msg'); ?>
    <!-- FIM TITULO CONTEUDO -->
    <!------------------------ conteudo ------------------------>
    <div class="row">
        <!------------------------------------------------------------------------------------------------------------------------>
        <!-- UPLOAD DE IMAGEM -->
        <!------------------------------------------------------------------------------------------------------------------------>
        <div class="col-md-6 border">
            <!------------------------------------------------------------------------------------->
            <form action="<?= base_url('rh/funcionario/recortar'); ?>" method="POST" enctype="multipart/form-data">
                <div class="col-12 mx-auto">
                    <input type="hidden" name="id_funcionario" value="<?= $funcionario['id_funcionario']?>">
                    <p class="alert alert-info" id="texto-informativo">
                        Selecione uma imagem para recortar</p>
                    <!-- ------------------------------------------------------------- -->
                    <div class="imagem-box" id="imagem-box">
                        <img src="" class="img-responsive hidden" id="visualizacao_img" />
                    </div>
                    <!-- ------------------------------------------------------------- -->
                    <input type="hidden" id="x" name="x" />
                    <input type="hidden" id="y" name="y" />
                    <input type="hidden" id="wcrop" name="wcrop" />
                    <input type="hidden" id="hcrop" name="hcrop" />
                    <input type="hidden" id="wvisualizacao" name="wvisualizacao" />
                    <input type="hidden" id="hvisualizacao" name="hvisualizacao" />
                    <input type="hidden" id="woriginal" name="woriginal" />
                    <input type="hidden" id="horiginal" name="horiginal" />
                    <!-- ------------------------------------------------------------- -->
                    <div class="form-group text-center">
                        <div class="row my-3">
                            <label class="col-6">
                                <span class="btn btn-block btn-primary" id="upload">
                                    <i class="fa fa-upload mr-2"></i>Selecionar fotografia
                                    <input type="file" name="imagem" class="custom-control-input"
                                        id="seleciona-imagem" />
                                </span>
                            </label>
                            <div class="col-6">
                                <button type="submit" class="btn btn-block btn-primary hidden" id="recortar-imagem">
                                    <i class="fa fa-save mr-2"></i>Salvar fotografia
                                </button>
                            </div>
                        </div>
                    </div>
                </div><!-- row -->
            </form><!-- end form -->
        </div><!-- end panel -->
        <!------------------------------------------------------------------------------------------------------------------------>
        <!-- IMAGEM DA CAMERA -->
        <!------------------------------------------------------------------------------------------------------------------------>
        <div class="col-md-6 border">
            <form action="<?= base_url('rh/funcionario/ajaxwebcam')?>" method="POST" enctype="multipart/form-data">
                <div id="form-group">
                    <!-- begin campos ocultos -->
                    <input type="hidden" name="id_funcionario" id="id_funcionario"
                        value="<?= $funcionario['id_funcionario']?>" />
                    <input type="hidden" name="camera_image" id="upload_image" class="image-tag" />
                    <!-- end campos ocultos -->
                </div>
                <!-- ---------------------------------------------------------------------------------------------- -->
                <p class="alert alert-info" id="texto-informativo">
                    Click em capturar para salvar a imagem</p>
                <div class="col-12 mx-auto">
                    <!-- previsualização da fografia -->
                    <div class="imagem-box" id="my_camera"></div>
                    <div id="pre_take_buttons" class="my-3">
                        <div class="row">
                            <div class="col-6">
                                <button type="button" class="btn btn-primary btn-block" onClick="configure()">
                                    <i class="fa fa-camera mr-2"></i>Previsualizar</button>
                            </div>
                            <div class="col-6">
                                <button type="button" class="btn btn-primary btn-block" onClick="preview_snapshot()">
                                    <i class="fa fa-save mr-2"></i>Capturar</button>
                            </div>
                        </div>
                    </div>
                    <div id="post_take_buttons" class="my-3" style="display:none">
                        <div class="row">
                            <div class="col-6">
                                <button type="button" class="btn btn-info btn-block" value="Capturar Outra"
                                    onClick="cancel_preview()"><i class="fa fa-camera mr-2"></i>Capturar Outra</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary btn-block" onClick="save_photo()"
                                    style="font-weight:bold;"><i class="fa fa-save mr-2"></i>Salvar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form><!-- end form-->
        </div>
    </div><!-- end row -->