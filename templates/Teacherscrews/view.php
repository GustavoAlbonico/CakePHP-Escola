<section class="content-header">
  <h1>
    Teacherscrew
    <small><?php echo __('View'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-arrow-circle-left"></i> <?php echo __('Home'); ?></a></li>
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
            <dt scope="row"><?= __('Teacher') ?></dt>
            <dd><?= $teacherscrew->has('teacher') ? $this->Html->link($teacherscrew->teacher->name, ['controller' => 'Teachers', 'action' => 'view', $teacherscrew->teacher->id]) : '' ?></dd>
            <dt scope="row"><?= __('Crew') ?></dt>
            <dd><?= $teacherscrew->has('crew') ? $this->Html->link($teacherscrew->crew->name, ['controller' => 'Crews', 'action' => 'view', $teacherscrew->crew->id]) : '' ?></dd>
            <dt scope="row"><?= __('User') ?></dt>
            <dd><?= $teacherscrew->has('user') ? $this->Html->link($teacherscrew->user->nome, ['controller' => 'Users', 'action' => 'view', $teacherscrew->user->id]) : '' ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

</section>
