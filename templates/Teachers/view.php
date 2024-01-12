<section class="content-header">
  <h1>
    Professores
    <small><?php echo __('Ver'); ?></small>
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
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-info"></i>
          <h3 class="box-title"><?php echo __('Informações'); ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <dl class="dl-horizontal">
            <dt scope="row"><?= __('ID') ?></dt>
            <dd><?= $this->Number->format($teacher->id) ?></dd>
            <dt scope="row"><?= __('Nome') ?></dt>
            <dd><?= h($teacher->name) ?></dd>

                  <?php
                       $status = 'Inativo';
                    if($teacher->status == 1){
                       $status = 'Ativo';}
                  ?>

            <dt scope="row"><?= __('Status') ?></dt>
            <dd><?= h($status) ?></dd>
            <dt scope="row"><?= __('Disciplina') ?></dt>
            <dd><?= $teacher->has('subjects_id') ? $this->Html->link($teacher->subject->nome, ['controller' => 'Subjects', 'action' => 'view', $teacher->subject->id]) : '' ?></dd>
            
            
            <!-- <dt scope="row"><?= __('Usuário') ?></dt>
            <dd><?= $teacher->has('user') ? $this->Html->link($teacher->user->nome, ['controller' => 'Users', 'action' => 'view', $teacher->user->id]) : '' ?></dd> -->
            <!-- <dt scope="row"><?= __('Modificado') ?></dt>
            <dd><?= $this->Number->format($teacher->modified_by) ?></dd>
            <dt scope="row"><?= __('Criado') ?></dt>
            <dd><?= h($teacher->created) ?></dd>
            <dt scope="row"><?= __('Modificado') ?></dt>
            <dd><?= h($teacher->modified) ?></dd> -->
          </dl>
        </div>
      </div>
    </div>
  </div>

</section>
