<!-- INICIO CONTEUDO -->
<div id="content" class="content">
    <?= $this->session->flashdata('msg'); ?>
    <!-- begin tab-content -->
    <div class="tab-content">
        <!-- begin tab-pane -->
        <div class="tab-pane fade active show" id="historico_matricula">
            <!--
            ---------------------- HISTÓRICO DE MATRICULAS ----------------------
            -->
            <!-- begin invoice -->
            <div class="invoice">
                <!-- begin invoice-company -->
                <div class="invoice-company text-center">
                    <strong>NOTAS</strong>
                </div>
                <!-- end invoice-company -->
                <div class="invoice-content">
                    <!-- begin table-responsive -->
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" width="15%" rowspan="2"> DISCIPLINA </th>
                                    <th class="text-center" width="1%" colspan="3"> 1º TRIMESTRE </th>
                                    <th class="text-center" width="1%" colspan="3"> 2º TRIMESTRE </th>
                                    <th class="text-center" width="1%" colspan="3"> 3º TRIMESTRE </th>
                                    <th class="text-center" width="1%" rowspan="2"> </th>
                                </tr>
                                <tr>
                                    <th class="text-center" width="1%"> CAP 1</th>
                                    <th class="text-center" width="1%"> CPE 1</th>
                                    <th class="text-center" width="1%"> CF 1 </th>
                                    <!------------------------------------------->
                                    <th class="text-center" width="1%"> CAP 2</th>
                                    <th class="text-center" width="1%"> CPE 2</th>
                                    <th class="text-center" width="1%"> CF 2 </th>
                                    <!------------------------------------------->
                                    <th class="text-center" width="1%"> CAP 3</th>
                                    <th class="text-center" width="1%"> CPE 3</th>
                                    <th class="text-center" width="1%"> CF 3 </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($matricula as $linha) { ?>
                                <tr class="highlight">
                                    <td class="text-left"> <?= $linha->nome_disciplina; ?> </td>
                                    <td class="text-left"> </td>
                                    <td class="text-left"> </td>
                                    <td class="text-left"> </td>

                                    <td class="text-left"> </td>
                                    <td class="text-left"> </td>
                                    <td class="text-left"> </td>

                                    <td class="text-left"> </td>
                                    <td class="text-left"> </td>
                                    <td class="text-left"> </td>

                                    <td class="text-left" width="1%">
                                        <a href="<?= site_url('secretaria/matricula/add_notas/'.$linha->id_matricula ) ?>"
                                            class="btn btn-secondary btn-xs"><i class="fa fa-plus mr-1"></i>Nota
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div><!-- end table responsive -->
                </div><!-- end invoice content -->
            </div><!-- end invoice -->
        </div><!-- end content -->
    </div>