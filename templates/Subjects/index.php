<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Disicplinas

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
                  <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                  <!-- <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('modified') ?></th> -->
                  <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                  <!-- <th scope="col"><?= $this->Paginator->sort('teachers_id',['label' => 'Professor']) ?></th> -->
                  <!-- <th scope="col"><?= $this->Paginator->sort('users_id') ?></th> -->
                  <th scope="col" class="actions text-center"><?= __('Ações') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($subjects as $subject): ?>
                <tr>
                  <td><?= $this->Number->format($subject->id) ?></td>
                  <td><?= h($subject->nome) ?></td>
                  <!-- <td><?= h($subject->created) ?></td>
                  <td><?= h($subject->modified) ?></td> -->

                    <?php
                          $status = 'Inativo';
                      if($subject->status == 1){
                          $status = 'Ativo';}
                      ?>

                  <td><?= h($status) ?></td>
                  <!-- <td><?= h($subject->teacher->name) ?></td> -->
                  <!-- <td><?= $this->Number->format($subject->users_id) ?></td> -->

                  <?php
                       if ($subject->status == 1) {
                        $texto = 'desativar';
                        $btn_ativar = 'btn-success fa fa-smile-o';
                      } else {
                        $texto = 'ativar';
                        $btn_ativar = 'btn-danger fa fa-meh-o';
                      }
                  ?>

                  <td class="actions text-center">
                      <?= $this->Html->link(__(''), ['action' => 'view', $subject->id], ['class'=>'btn btn-info btn-xs fa fa-eye']) ?>
                      <?= $this->Html->link(__(''), ['action' => 'edit', $subject->id], ['class'=>'btn btn-warning btn-xs fa fa-pencil-square-o']) ?>
                      <?= $this->Form->postLink(__(''), ['action' => 'desativar', $subject->id], ['confirm' => __("Deseja $texto a disciplina de {0}?", $subject->nome), 'class' => "btn $btn_ativar btn-xs"]) ?>
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