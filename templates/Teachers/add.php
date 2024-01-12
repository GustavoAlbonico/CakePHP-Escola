<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Teacher $teacher
 */
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Professor
    <small><?php echo __('Novo'); ?></small>
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
        <?php echo $this->Form->create($teacher, ['role' => 'form']); ?>
        <div class="box-body">
          <?php
          echo $this->Form->control('name', ['label' => 'Nome']);
          echo $this->Form->control('subjects_id', ['label' => 'Disciplina','empty' => 'Selecione uma disciplina','options' => $subjects]);
          ?>
        </div>
        <!-- /.box-body -->

        <?php echo $this->Form->submit(__('Salvar')); ?>

        <?php echo $this->Form->end(); ?>
      </div>
      <!-- /.box -->
    </div>
  </div>
  <!-- /.row -->
</section>