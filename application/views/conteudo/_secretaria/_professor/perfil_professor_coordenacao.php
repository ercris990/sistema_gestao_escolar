<!-- INICIO CONTEUDO -->
<div id="content" class="content">
  <h5 class="page-header"><i class="fa fa-user mr-5"></i>PERFIL DO PROFESSOR</h5>
  <?= $this->session->flashdata('msg'); ?>
  <div class="mt-5">
    <!-- INICIO DADOS DO ALUNO -->
    <div class="tab-pane " id="profile-about">
      <!-- begin table -->
      <div class="table-responsive">
        <table class="table table-striped table-condensed text-uppercase">
          <tbody>
            <tr class="highlight">
              <td class="text-right" width="10%" rowspan="4">
                <!---------------------------------------------------------------------------------------->
                <div id="photo_pfl" class="img-fluid img-thumbnail img-responsive">
                  <img src=" <?=base_url(); ?>_assets/img/photto.jpg ">
                </div>
              </td>
              <td class="text-right" width="15%"><strong>Nome:</strong></td>
              <td class="text-left" width="35%">
                <strong><?=$funcionario['nome_funcionario']?></strong>
              </td>
              <td class="text-right" width="20%"><strong>Data de Nascimento: </strong></td>
              <td class="text-left" width="30%">
                <strong><?= date('d/ m/ Y', strtotime($funcionario['nascimento_funcionario'])); ?></strong>
              </td>
            </tr>
            <tr class="highlight">
              <td class="text-right"><strong>Género</strong></td>
              <td class="text-left"><strong><?=$funcionario['genero_funcionario']?></strong></td>
              <td class="text-right"><strong>Nº B.I:</strong></td>
              <td class="text-left"><strong><?=$funcionario['bi_funcionario']?></strong></td>
            </tr>
            <tr class="highlight">
              <td class="text-right"><strong>Morada</strong></td>
              <td class="text-left"><strong><?=$funcionario['endereco_funcionario']?></strong></td>
              <td class="text-right"><strong>Telemóvel</strong></td>
              <td class="text-left"><strong><?=$funcionario['telemovel_funcionario']?></strong></td>
            </tr>
            <tr class="highlight">
              <td class="text-right"><strong>E-Mail</strong></td>
              <td class="text-left"><strong><?=$funcionario['email_funcionario']?></strong></td>
              <td class="text-right"><strong>Nome de Utilizador</strong></td>
              <td class="text-left"><strong><?=$funcionario['nome_user']?></strong></td>
            </tr>
          </tbody>
        </table>
      </div><!-- end table -->
      <!--                                 BOTÕES
    	-------------------------------------------------------------------------->
      <span class="pull-right hidden-print">
        <a href="#modal-add-turma" data-toggle="modal" class="btn btn-outline-primary m-b-10 p-l-5">
          <i class="fa fa-plus t-plus-1 fa-fw fa-lg"></i>ASSOCIAR TURMA
        </a>
      </span>
    </div><!-- end container -->
  </div><!-- end invoice content -->
  <!---------------------------------------------------------------------------------------->
  <div class="table-responsive">
    <table class="table table-striped text-uppercase">
      <thead class="bg-primary">
        <tr>
          <th class="text-center text-light" width="20%">ANO LECTIVO</th>
          <th class="text-center text-light" width="20%">TURMA</th>
          <th class="text-center text-light" width="60%"></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($prof_turma as $linha) { ?>
        <tr class="highlight">
          <td class="text-center align-middle"><b><?= $linha->ano_let; ?></b></td>
          <td class="text-center align-middle"><b><?= $linha->nome_turma; ?></b></td>
          <td class="text-right  align-middle">
            <!-- dropdown -->
            <div class="btn-group">
              <a href="#" class="btn btn-sm btn-primary"><i class="fa fa-cog mr-2"></i>Opções</a>
              <a href="#" class="btn btn-sm btn-outline-primary dropdown-toggle" data-toggle="dropdown"></a>
              <ul class="dropdown-menu pull-left">
                <li>
                  <a href="<?= site_url('secretaria/professor/editar_prof_turma/'.$linha->id_prof_turma) ?>"
                    onclick="return confirm('Deseja alterar esta turma');">
                    <i class="fa fa-edit mr-1"></i>Alterar Turma</a>
                </li>
                <li>
                  <a href="<?= site_url('secretaria/professor/excluir_prof_turma/'.$linha->id_prof_turma.'/'.$linha->funcionario_id) ?>"
                    onclick="return confirm('Deseja excluir esta turma');">
                    <i class="fa fa-trash mr-1"></i>Desassociar Turma</a>
                </li>
              </ul>
            </div>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div><!-- end table responsive -->