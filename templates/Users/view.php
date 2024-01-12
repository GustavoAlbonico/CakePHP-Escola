<section class="content-header">
  <h1>
    User
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
            <dd><?= $this->Number->format($user->id) ?></dd>
            <dt scope="row"><?= __('Nome') ?></dt>
            <dd><?= h($user->nome) ?></dd>
            <dt scope="row"><?= __('Usuário') ?></dt>
            <dd><?= h($user->username) ?></dd>
            <dt scope="row"><?= __('Nivel Acesso') ?></dt>
            <dd><?= h($user->role) ?></dd>

                  <?php
                       $status = 'Inativo';
                    if($user->ativo == 1){
                       $status = 'Ativo';}
                  ?>

            <dt scope="row"><?= __('Status') ?></dt>
            <dd><?= h($status) ?></dd>
            <!-- <dt scope="row"><?= __('Criado') ?></dt>
            <dd><?= h($user->created) ?></dd>
            <dt scope="row"><?= __('Modificado') ?></dt>
            <dd><?= h($user->modified) ?></dd> -->
          </dl>
        </div>
      </div>
    </div>
  </div>

</section>
