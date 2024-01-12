<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Student $student
 */
?>


<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Alunos
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
          <?php echo $this->Form->create($student, ['role' => 'form']); ?>
            <div class="box-body">
              <?php
                echo $this->Form->control('name',['label' => 'Nome'] );
                echo $this->Form->control('cpf',['label' => 'CPF',  'placeholder' => 'Digite o CPF...', 'data-inputmask' => '"mask": "999.999.999-99"',
                'data-mask' => 'data-mask']);
                echo $this->Form->control('idade',['label' => 'Idade'] );
                echo $this->Form->control('email',['label' => 'E-mail'] );
                $options = [0 => 'Matutino' ,1 => 'Vespertino', 2 => 'Noturno'];
                echo $this->Form->control('periodo',['label' => 'Periodo','empty' => 'Selecione um periodo','options' => $options] );
                echo $this->Form->control('crews_id',['label'=> 'Turma','empty' => 'Selecione uma turma','options' => $crews]);
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


<?php 
  $this->Html->script([
  'AdminLTE./plugins/input-mask/jquery.inputmask',
    ],['block' => 'script']);
?>

<?php $this->start('scriptBottom'); ?>

<script>
    $(function () {
      $('[data-mask]').inputmask()

      });
</script>

<?php $this->end(); ?>




