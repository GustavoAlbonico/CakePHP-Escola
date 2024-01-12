<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Alunos

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
                  <th scope="col"><?= $this->Paginator->sort('name',['label' => 'Nome']) ?></th>
                  <th scope="col"><?= $this->Paginator->sort('cpf',['label' => 'CPF']) ?></th>
                  <th scope="col"><?= $this->Paginator->sort('idade',['label' => 'Idade']) ?></th>
                  <th scope="col"><?= $this->Paginator->sort('email',['label' => 'E-mail']) ?></th>
                  <th scope="col"><?= $this->Paginator->sort('periodo',['label' => 'Periodo']) ?></th>
                  <th scope="col"><?= $this->Paginator->sort('status',['label' => 'Status']) ?></th>
                  <th scope="col"><?= $this->Paginator->sort('crews_id',['label' => 'Turma']) ?></th>
                  <th scope="col" class="actions text-center"><?= __('Ações') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php
               
              foreach ($students as $student):?>
                <tr>
                  <td><?= $this->Number->format($student->id) ?></td>
                  <td><?= h($student->name) ?></td>
                  <td><?= h($student->cpf) ?></td>
                  <td><?= $this->Number->format($student->idade) ?></td>
                  <td><?= h($student->email) ?></td>

                  <?php 
                      $periodo = 'Matutino';
                      if($student->periodo == 1){
                      $periodo = 'Vespertino';
                      }if ($student->periodo == 2){
                      $periodo = 'Noturno';
                      }
                  ?>

                  <td><?= h($periodo) ?></td>
                  <?php
                       $status = 'Inativo';
                    if($student->status == 1){
                       $status = 'Ativo';}
                  ?>

                  <td><?= h($status) ?></td>
                  <td><?= h($student->crew->name) ?></td>

                  <?php 
                       if ($student->status == 1) {
                        $texto = 'desativar';
                        $btn_ativar = 'btn-success fa fa-smile-o';
                      } else {
                        $texto = 'ativar';
                        $btn_ativar = 'btn-danger fa fa-meh-o';
                      }
                  ?>

                  <td class="actions text-center">
                      <?= $this->Html->link(__(''), ['action' => 'view', $student->id], ['class'=>'btn btn-info btn-xs fa fa-eye']) ?>
                      <?= $this->Html->link(__(''), ['action' => 'edit', $student->id], ['class'=>'btn btn-warning btn-xs fa fa-pencil-square-o']) ?>
                      <?= $this->Form->postLink(__(''), ['action' => 'desativar', $student->id], ['confirm' => __("Deseja $texto o aluno: {0}?", $student->nome), 'class' => "btn $btn_ativar btn-xs"]) ?>
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