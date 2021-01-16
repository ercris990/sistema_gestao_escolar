<div id="content" class="content">
    <div class="row">
        <div class="col-6">
            <h4 class="page-header text-uppercase"><i class="fa fa-list mr-5"></i>MAPA DE FALTAS FUNCIONARIOS</h4>
        </div>
        <div class="col-6 text-right">
            <a href="<?= base_url('rh/funcionario/mapa_assiduidade') ?>" class="btn btn-primary">
                <i class="fa fa-arrow-left mr-2"></i>PAGINA ANTERIOR</a>
        </div>
    </div>
    <?= $this->session->flashdata('msg'); ?>

    <div class="text-uppercase mt-3">
        <h4>Levantamento de faltas referente ao mês de: <span
                class="text-danger"><?= strftime('%B de %Y', strtotime($mes));?></span></h4>
    </div>
    <div class="pauta_geral_flex row mx-auto">
        <div class="">
            <table class="table table-striped table-responsive table-bordered table-condensed text-uppercase">
                <thead class="bg-primary">
                    <tr>
                        <th class="text-light text-center align-middle">Nº.</th>
                        <th class="text-light text-center align-middle">NNOME COMPLETO</th>
                        <th class="text-light text-center align-middle">GÉNERO</th>
                        <th class="text-light text-center align-middle">FUNÇÃO</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php $i = 1; foreach ($assiduidade_funcionarios as $assid_func) : ?>
                    <tr class="odd gradeX">
                        <td class="text-center align-middle"><?= $i; ?></td>
                        <td class="text-nowrap align-middle" nowrap><?= $assid_func->nome_funcionario; ?></td>
                        <td class="text-center align-middle"><?php 
                            if(($assid_func->genero_funcionario) == "Masculino"){
                                    echo "M";
                                } else {
                                    echo "F";
                                }
                            ?></td>
                        <td class="align-middle" nowrap><?php
                            if ($assid_func->nivel_acesso == "1") {
                                echo 'Director (a)';
                            } elseif ($assid_func->nivel_acesso == "2") {
                                echo 'Técnico de Administrativo';
                            } elseif ($assid_func->nivel_acesso == "3") {
                                echo 'Técnico de Recursos Humanos';
                            } elseif ($assid_func->nivel_acesso == "4") {
                                echo 'Coordenador (a)';
                            } elseif ($assid_func->nivel_acesso == "5") {
                                echo 'Professor (a)';
                            } elseif ($assid_func->nivel_acesso == "6") {
                                echo 'Técnico de Informática';
                            } elseif ($assid_func->nivel_acesso == "7") {
                                echo 'Auxiliar de Serviços Gerais';
                            } elseif ($assid_func->nivel_acesso == "8") {
                                echo 'Seguraça';
                            }
                        ?></td>
                    </tr>
                    <?php $i++; endforeach ?>
                </tbody>
            </table>
        </div>
        <div class="">
            <table class="table table-striped table-responsive table-bordered table-condensed text-uppercase w-100">
                <thead class="bg-primary">
                    <tr>
                        <th class="text-light text-center align-middle" nowrap>Faltas Marcadas</th>
                        <th class="text-light text-center align-middle" nowrap>Faltas Justificadas</th>
                        <th class="text-light text-center align-middle" nowrap>Faltas Não Justificadas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach ($num_faltas as $n_falta) : ?>
                    <tr class="odd gradeX">
                        <td class="text-center align-middle text-dark"><?= $n_falta->falta; ?></td>
                        <td class="text-center align-middle text-primary"><?= $n_falta->justificacao; ?></td>
                        <td class="text-center align-middle text-danger"><?php 
                            $fnj = ($n_falta->falta - $n_falta->justificacao);
                            echo $fnj;
                        ?></td>
                    </tr>
                    <?php $i++; endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
    <div>
        <a href="<?= site_url('mapa_faltas_funcionarios/exportar_mapa/'.$mes)?>" class="btn btn-success bts-sm col-2">
            <i class="fa fa-file-pdf mr-2"></i>EXPORTAR PARA EXECEL
        </a>
    </div>