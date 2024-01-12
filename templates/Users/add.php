<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Usuario
      <small><?php echo __('Novo'); ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>">
      <i class="fa fa-dashboard"></i> <?php echo __('Voltar'); ?></a></li>
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
          <?php echo $this->Form->create($user, ['role' => 'form']); ?>
            <div class="box-body">
              <?php
                echo $this->Form->control('nome',['label' => 'Nome']);
                echo $this->Form->control('username',['label' => 'Usuário']);
                echo $this->Form->control('password',['label' => 'Senha']);
                $nivelAcesso = ['Administrador' => 'Administrador','Funcionario' => 'Funcionario','Aluno' => 'Aluno'];
                echo $this->Form->control('role', ['label' => 'Nivel Acesso',
                'empty' => 'Selecione uma opção','options' => $nivelAcesso]);
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

