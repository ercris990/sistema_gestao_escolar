<div id="content" class="content">
    <h6 class="page-header"><i class="fa fa-list mr-3"></i>GUIA DE TRANFERENCIA</h6>
    <!-- begin tab-content -->
    <div class="">
        <!-- begin tab-pane -->
        <!-- end invoice-company -->
        <div class="invoice-content">
            <div class="table-responsive my-2">
                <table class="table table-striped table-bordered text-uppercase table-condensed">
                    <tbody>
                        <tr class="highlight">
                            <td class="text-left" width="20%"><strong>Nome: </strong></td>
                            <td class="text-left"><strong><?= $matricula_row->nome; ?></strong></td>
                            <td class="text-left" width="20%"><strong> Ano lectivo: </strong></td>
                            <td class="text-left" width="20%"><strong><?= $matricula_row->ano_let; ?></strong>
                            </td>
                        </tr>
                        <tr class="highlight">
                            <td class="text-left"><strong><?= $matricula_row->tipo_documento; ?> nº.:</strong></td>
                            <td class="text-left "><strong><?= $matricula_row->num_documento; ?> </strong></td>
                            <td class="text-left"><strong> Classe: </strong></td>
                            <td class="text-left"><strong><?= $matricula_row->nome_classe; ?></strong>
                        </tr>
                        <tr class="highlight">
                            <td class="text-left"><strong>Género: </strong></td>
                            <td class="text-left"><strong><?= $matricula_row->genero_aluno; ?></strong>
                            <td class="text-left"><strong> Turma: </strong></td>
                            <td class="text-left"><strong><?= $matricula_row->nome_turma; ?></strong>
                        </tr>
                        <tr>
                            <td class="text-left"><strong>Aluno Nº.:</strong></td>
                            <td class="text-left"><strong><?= $matricula_row->num_processo; ?></strong></td>
                            <td class="text-left"><strong> Periodo: </strong></td>
                            <td class="text-left"><strong><?= $matricula_row->nome_periodo; ?></strong>
                            </td>
                        </tr>
                        <tr class="highlight">
                            <td class="text-left"><strong> Data de Nascimento: </strong></td>
                            <td class="text-left ">
                                <strong><?= date('d/ m/ Y', strtotime($matricula_row->nascimento_aluno)); ?></strong>
                            </td>
                            <td class="text-left"><strong> Sala: </strong></td>
                            <td class="text-left"><strong><?= $matricula_row->numero_sala; ?></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div><!-- end table responsive -->
            <!-------------------------------------------------------------------------------------->
            <div class="row">
                <div class="container">
                    <a href="<?= site_url('secretaria/aluno/detalhe?id_aluno='.$matricula_select['aluno_id']) ?>"
                        class="btn btn-primary btn-sm m-b-10 p-l-5"><i class="fa fa-user mr-2"></i>PERFIL DO ALUNO</a>
                </div>
            </div>
        </div><!-- end invoice content -->
        <?= $this->session->flashdata('msg'); ?>
        <div class="row alert alert-dark border mt-2">
            <div class="col-12">
                <form action="<?= site_url('secretaria/matricula/guia_transferencia_pdf')?>" method="POST"
                    class="form-inline" id="form_guia_transferencia" />
                <div>
                    <input type="hidden" name="id_matricula" id="id_matricula"
                        value="<?= $matricula_row->id_matricula; ?>" />
                </div>
                <div class="form-group col-3">
                    <input type="number" name="num_escola" id="num_escola" class="form-control border-primary col-12"
                        placeholder="N.º da Escola" autocomplete="off" />
                </div>
                <!-- SELECT ANO LECTIVO -->
                <div class="form-group col-3">
                    <select name="provincia" id="provincia" class="form-control border-primary col-12" />
                    <option value="">Selecione a Província</option>
                    <?php foreach($provincia as $row)
                        {
                            echo '<option value= "'.$row->provincia_id.'">'.$row->nome_provincia.'</option>';
                        }
                        ?>
                    </select>
                </div>
                <!-- SELECT TURMA -->
                <div class="form-group col-3">
                    <select name="municipio" id="municipio" class="form-control border-primary col-12" disabled />
                    <option value="">Selecione o Municipio</option>
                    </select>
                </div>
                <div class="form-group col-3">
                    <button type="submit" class="btn btn-block btn-white m-r-5" target="_blank">
                        <i class="fa fa-file-pdf text-danger mr-2"></i>GERAR GUIA DE TRANSFERÊNCIA
                    </button>
                </div>
                </form>
            </div>
        </div>

    </div>