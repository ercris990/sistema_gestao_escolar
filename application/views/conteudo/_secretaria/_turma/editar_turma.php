<!-- INICIO CONTEUDO -->
<div id="content" class="content">
  <!-- begin page-header -->
  <h4 class="page-header"><i class="fa fa-list mr-5"></i>EDITAR TURMA</h4>
  <?= $this->session->flashdata('msg'); ?>
  <!-- begin table-responsive -->
  <div class="col-6 mx-auto my-5">
    <form action="<?php echo site_url('secretaria/turma/salvaractualizacao')?>" method="POST">
      <input type="hidden" name="id_turma" id="id_turma" value="<?= $turma[0]->id_turma; ?>">
      <!-- CAMPO NOME TURMA -->
      <div class="form-group col-12">
        <label for="nome_turma">Nome da turma</label>
        <input type="text" name="nome_turma" class="form-control border-primary text-primary" id="nome_turma"
          minlength="2" placeholder="1A-M" autocomplete="off" value=" <?= $turma[0]->nome_turma; ?>" />
      </div>
      <!-- CAMPO CLASSE -->
      <div class="form-group col-12">
        <label for="nome_classe">Classe</label>
        <select name="nome_classe" class="form-control border-primary text-primary" id="nome_classe">
          <!------------------------------------------------------------>
          <?php foreach($classe as $cls):       
                                        if($turma[0]->classe_id==$cls->id_classe) { ?>
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
      <!-- CAMPO SALA -->
      <div class="form-group col-12">
        <label for="numero_sala">Sala</label>
        <select name="numero_sala" class="form-control border-primary text-primary">
          <!---------------------------->
          <?php foreach($sala as $sl):       
                                        if($turma[0]->sala_id==$sl->id_sala) { ?>
          <option value="<?= $sl->id_sala ?>" selected=""> <?= $sl->numero_sala; ?>
          </option><?php 
                                        } else{ ?>
          <option value="<?= $sl->id_sala ?>"> <?= $sl->numero_sala; ?> </option><?php 
                                        } 
                                endforeach; ?>
        </select>
      </div>
      <!-- CAMPO PERIODO -->
      <div class="form-group col-12">
        <label for="nome_periodo">Período</label>
        <select name="nome_periodo" class="form-control border-primary text-primary" id="nome_periodo">
          <!------------------------------------------------------------>
          <?php foreach($periodo as $prd):       
                                        if($turma[0]->periodo_id==$prd->id_periodo) { ?>
          <option value="<?= $prd->id_periodo ?>" selected=""> <?= $prd->nome_periodo; ?>
          </option><?php 
                                        } else{ ?>
          <option value="<?= $prd->id_periodo ?>"> <?= $prd->nome_periodo; ?> </option><?php 
                                        } 
                                endforeach; ?>
          <!------------------------------------------------------------>
        </select>
      </div>
      <div class="form-group col-12">
        <button type="submit" class="btn btn-primary btn-block mt-3"><i class="fa fa-edit mr-2"></i>ACTUALIZAR</button>
      </div>
    </form>
  </div><!-- end col-5 -->
