<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Professores

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
                  <th scope="col"><?= $this->Paginator->sort('name',['label' => 'Nome'] ) ?></th>
                  <th scope="col"><?= $this->Paginator->sort('status',['label' => 'Status']) ?></th>
                  <th scope="col"><?= $this->Paginator->sort('subjects_id',['label' => 'Disciplina']) ?></th>
                  <!-- <th scope="col"><?= $this->Paginator->sort('created',['label' => 'Criado']) ?></th>
                  <th scope="col"><?= $this->Paginator->sort('modified',['label' => 'Modificado']) ?></th>
                  <th scope="col"><?= $this->Paginator->sort('modified_by',['label' => 'Modificado']) ?></th>
                  <th scope="col"><?= $this->Paginator->sort('users_id',['label' => 'ID Usuário']) ?></th> -->
                  <th scope="col" class="actions text-center"><?= __('Ações') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($teachers as $teacher): ?>
                <tr>
                  <td><?= $this->Number->format($teacher->id) ?></td>
                  <td><?= h($teacher->name) ?></td>

                    <?php
                        $status = 'Inativo';
                      if($teacher->status == 1){
                         $status = 'Ativo';}
                    ?>
                  
                  <td><?= h($status) ?></td>
                  <td><?= h($teacher->subject->nome) ?></td>

                  <!-- <td><?= h($teacher->created) ?></td>
                  <td><?= h($teacher->modified) ?></td>
                  <td><?= $this->Number->format($teacher->modified_by) ?></td>
                  <td><?= $this->Number->format($teacher->users_id) ?></td> -->

                  <?php 
                       if ($teacher->status == 1) {
                        $texto = 'desativar';
                        $btn_ativar = 'btn-success fa fa-smile-o';
                      } else {
                        $texto = 'ativar';
                        $btn_ativar = 'btn-danger fa fa-meh-o';
                      }
                  ?>
                  
                  <td class="actions text-center">
                      <?= $this->Html->link(__(''), ['action' => 'view', $teacher->id], ['class'=>'btn btn-info btn-xs fa fa-eye']) ?>
                      <?= $this->Html->link(__(''), ['action' => 'edit', $teacher->id], ['class'=>'btn btn-warning btn-xs fa fa-pencil-square-o ']) ?>
                      <?= $this->Form->postLink(__(''), ['action' => 'desativar', $teacher->id], ['confirm' => __("Deseja $texto o professor: {0}?", $teacher->nome), 'class' => "btn $btn_ativar btn-xs"]) ?>
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