<!-- INICIO CONTEUDO -->
<div id="content" class="content">
  <!-- begin page-header -->
  <h4 class="page-header"><i class="fa fa-list mr-5"></i>NOVA TURMA</h4>
  <?= $this->session->flashdata('msg'); ?>
  <!-- begin table-responsive -->
  <div class="col-6 mx-auto my-5">
    <form action="<?php echo site_url('secretaria/turma/guardar')?>" method="POST" id="form_turma">
      <fieldset>
        <div class="form-group col-12">
          <label for="nome_turma">Nome da Turma</label>
          <input type="text" name="nome_turma" id="nome_turma" class="form-control border-primary text-primary"
            placeholder="1A-M" autocomplete="off" />
        </div>
        <!--------------------------- SELECT DINAMICO ---------------------------------------->
        <div class="form-group col-12">
          <label for="nome_classe">Classe</label>
          <select name="nome_classe" class="form-control border-primary text-primary">
            <option value="">Selecione a classe</option>
            <?php foreach($classe as $cls): ?>
            <option value="<?= $cls->id_classe ?>"> <?= $cls->nome_classe; ?> </option>
            <?php endforeach; ?>
          </select>
        </div>
        <!--------------------------- SELECT DINAMICO ---------------------------------------->
        <div class="form-group col-12">
          <label for="numero_sala">Sala</label>
          <select name="numero_sala" class="form-control border-primary text-primary">
            <option value="">Selecione a sala</option>
            <!---------------------------->
            <?php foreach($sala as $sl): ?>
            <option value="<?= $sl->id_sala ?>"> <?= $sl->numero_sala; ?> </option>
            <?php endforeach; ?>
          </select>
        </div>
        <!--------------------------- SELECT DINAMICO ---------------------------------------->
        <div class="form-group col-12">
          <label for="nome_periodo">Periodo</label>
          <select name="nome_periodo" class="form-control border-primary text-primary">
            <option value="">Selecione o periodo</option>
            <!---------------------------->
            <?php foreach($periodo as $prd): ?>
            <option value="<?= $prd->id_periodo ?>"> <?= $prd->nome_periodo; ?> </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group col-12">
          <button type="submit" class="btn btn-primary btn-block mt-3"><i class="fa fa-save mr-2"></i>GUARDAR</button>
        </div>
      </fieldset>
    </form>
  </div><!-- end col-5 -->
