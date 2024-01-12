<section class="content-header">
  <h1>
    Subject
    <small><?php echo __('View'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-info"></i>
          <h3 class="box-title"><?php echo __('Information'); ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <dl class="dl-horizontal">
            <dt scope="row"><?= __('ID') ?></dt>
            <dd><?= $this->Number->format($subject->id) ?></dd>
            <dt scope="row"><?= __('Nome') ?></dt>
            <dd><?= h($subject->nome) ?></dd>
            <!-- <dt scope="row"><?= __('Professor') ?></dt>
            <dd><?= $subject->has('teacher') ? $this->Html->link($subject->teacher->name, ['controller' => 'Teachers', 'action' => 'view', $subject->teacher->id]) : '' ?></dd> -->
            <!-- <dt scope="row"><?= __('User') ?></dt> -->
            <!-- <dd><?= $subject->has('user') ? $this->Html->link($subject->user->nome, ['controller' => 'Users', 'action' => 'view', $subject->user->id]) : '' ?></dd> -->

                    <?php
                            $status = 'Inativo';
                        if($subject->status == 1){
                            $status = 'Ativo';}
                      ?>
            
            <dt scope="row"><?= __('Status') ?></dt>
            <dd><?= h($status) ?></dd>
            <!-- <dt scope="row"><?= __('Created') ?></dt>
            <dd><?= h($subject->created) ?></dd>
            <dt scope="row"><?= __('Modified') ?></dt>
            <dd><?= h($subject->modified) ?></dd> -->
          </dl>
        </div>
      </div>
    </div>
  </div>

</section>
