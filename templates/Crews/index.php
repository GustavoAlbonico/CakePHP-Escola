<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Turmas

    <div class="pull-right"><?php echo $this->Html->link(__('Novo'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo __('Lista'); ?></h3>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <thead>
              <tr>
                  <th scope="col"><?= $this->Paginator->sort('id',['label' => 'ID']) ?></th>
                  <th scope="col"><?= $this->Paginator->sort('name',['label' => 'Nome']) ?></th>
                  <th scope="col"><?= $this->Paginator->sort('status',['label' => 'Status']) ?></th>
                  <!-- <th scope="col"><?= $this->Paginator->sort('created',['label' => 'Criado']) ?></th>
                  <th scope="col"><?= $this->Paginator->sort('modified',['label' => 'Modificado']) ?></th>
                  <th scope="col"><?= $this->Paginator->sort('modified_by',['label' => 'Modificado']) ?></th>
                  <th scope="col"><?= $this->Paginator->sort('users_id',['label' => 'Usuário']) ?></th> -->
                  <!-- <th scope="col"><?= $this->Paginator->sort('teachers_id',['label' => 'Professor']) ?></th> -->
                  <th scope="col" class="actions text-center"><?= __('Ações') ?></th>

                  
              </tr>
            </thead>
            <tbody>
              <?php foreach ($crews as $crew): ?>
                <tr>
                  <td><?= $this->Number->format($crew->id) ?></td>
                  <td><?= h($crew->name) ?></td>

                        <?php
                              $status = 'Inativo';
                            if($crew->status == 1){
                                $status = 'Ativo';}
                          ?>

                  <td><?= h($status) ?></td>
                  <!-- <td><?= h($crew->created) ?></td>
                  <td><?= h($crew->modified) ?></td>
                  <td><?= $this->Number->format($crew->modified_by) ?></td>
                  <td><?= $this->Number->format($crew->users_id) ?></td> -->
                  <!-- <td><?= h($crew->teacher->name) ?></td> -->
                  <!-- <td><?= $crew->has('teacher') ? $this->Html->link($crew->teacher->name, ['controller' => 'Teachers', 'action' => 'view', $crew->teacher->id]) : '' ?></td> -->
                  <td class="actions text-center">

                      <?php 
                      $disabled = '';
                       if ($crew->status == 1) {
                        $texto = 'desativar';
                        $btn_ativar = 'btn-success fa fa-smile-o';
                      } else {
                        $texto = 'ativar';
                        $btn_ativar = 'btn-danger fa fa-meh-o';
                        $disabled = 'disabled';
                      }

                      ?>
                      <?= $this->Html->link(__(''), ['action' => 'view', $crew->id], ['class'=>'btn btn-info btn-xs fa fa-list']) ?>
                      <?= $this->Html->link(__(''), ['action' => 'edit', $crew->id], ['class'=>'btn btn-warning btn-xs fa fa-pencil-square-o']) ?>
                      <?= $this->Html->link(__(''), ['controller' => 'Teacherscrews','action' => 'add',  $crew->id], ['class'=>"btn btn-primary btn-xs fa fa-graduation-cap $disabled"],['name' => 'idTurma']) ?>
                      <?= $this->Form->postLink(__(''), ['action' => 'desativar', $crew->id], ['confirm' => __("Deseja $texto a turma: {0}?", $crew->name), 'class' => "btn $btn_ativar btn-xs"]) ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>

<style>
  .btn {
    padding: 6px 8px;
  }

  .btn-warning 
  .btn-info {
    padding: 6px 7px;
  }

  .btn-primary{
    padding: 6px 5.8px;
  
  }

  .paginator-margin {
    padding: 0 5px;
  }
  
</style>