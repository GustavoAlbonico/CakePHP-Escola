<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Professores & Turmas

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
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <thead>
              <tr>
                  <th scope="col"><?= $this->Paginator->sort('id',['label' => 'ID']) ?></th>
                  <th scope="col"><?= $this->Paginator->sort('teachers_id',['label' => 'Professor']) ?></th>
                  <th scope="col"><?= $this->Paginator->sort('crews_id',['label' => 'Turma']) ?></th>
                  <th scope="col"><?= $this->Paginator->sort('status',['label' => 'Status']) ?></th>
                  <th scope="col" class="actions text-center"><?= __('Ações') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($teacherscrews as $teacherscrew): ?>
                <tr>
                  <td><?= $this->Number->format($teacherscrew->id) ?></td>
                  <td><?= h($teacherscrew->teacher->name) ?></td>
                  <td><?= h($teacherscrew->crew->name) ?></td>
                  
                    <?php
                        $status = 'Inativo';
                      if($teacherscrew->status == 1){
                         $status = 'Ativo';}
                    ?>

                  <td><?= h($status) ?></td>

                  <?php 
                       if ($teacherscrew->status == 1) {
                        $texto = 'desativar';
                        $btn_ativar = 'btn-success fa fa-smile-o';
                      } else {
                        $texto = 'ativar';
                        $btn_ativar = 'btn-danger fa fa-meh-o';
                      }
                  ?>

                  <td class="actions text-center">
                      <?= $this->Html->link(__(''), ['action' => 'view', $teacherscrew->id], ['class'=>'btn btn-info btn-xs fa fa-eye']) ?>
                      <?= $this->Html->link(__(''), ['action' => 'edit', $teacherscrew->id], ['class'=>'btn btn-warning btn-xs fa fa-pencil-square-o']) ?>
                      <?= $this->Form->postLink(__(''), ['action' => 'desativar', $teacherscrew->id], ['confirm' => __("Deseja $texto essa: {0}?", 'Associação'), 'class' => "btn $btn_ativar btn-xs"]) ?>
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
  
  .paginator-margin {
    padding: 0 5px;
  }
</style>