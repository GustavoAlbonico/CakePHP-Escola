<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Teacherscrew $teacherscrew
 */
?>

<?php echo $this->Html->script('AdminLTE./bower_components/jquery/dist/jquery.min'); ?>

<!-- Select2 -->
<?php echo $this->Html->css('AdminLTE./bower_components/select2/dist/css/select2.min', ['block' => 'css']); ?>
<!-- Select2 -->
<?php echo $this->Html->script('AdminLTE./bower_components/select2/dist/js/select2.full.min', ['block' => 'script']); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Professores & Turmas
    <small><?php echo __('Editar'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>">
        <i class="fa fa-arrow-circle-left"></i> <?php echo __('Voltar'); ?></a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo __('Formulário'); ?></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?php echo $this->Form->create($teacherscrew, ['role' => 'form']); ?>
        <div class="box-body">
          <?php
          echo $this->Form->control('crews_id', ['label' => 'Turmas', 'empty' => 'Selecione uma disciplina', 'options' => $crews]);
          ?>
          <div class="select-2">
            <div class="select-teacher">
              <label for="teachers_id">Professor</label>
              <select name="teachers_id" class="select2-teachers" data-validity-message="Campo obrigatório" oninvalid="this.setCustomValidity(''); 
              if (!this.value) this.setCustomValidity(this.dataset.validityMessage)" oninput="this.setCustomValidity('')" id="teachers_id" required>
                <option value="" selected>Digite o nome do professor</option>
                <?php foreach ($teachers as $teacher) { ?>
                  <option value='<?= $teacher->id ?>'><?= $teacher->name ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <!-- /.box-body -->

          <?php echo $this->Form->submit(__('Salvar alterações')); ?>

          <?php echo $this->Form->end(); ?>
        </div>
        <!-- /.box -->
      </div>
    </div>
    <!-- /.row -->
</section>

<script>
  $(function() {

    $(document).ready(function() {
      $('.select2-teachers').select2();
    });

    //Initialize Select2 Elements
    $('.select2').select2()


  });
</script>

<style>
  .select-2 {
    display: flex;
    justify-content: space-between;
    margin-bottom: 1px;
  }

  .select-teacher {
    flex-grow: 1;
  }

  .select-teacher>select {
    width: 101.50%;
  }
</style>