<!-- Content Header (Page header) -->

<?php echo $this->Html->script('AdminLTE./bower_components/jquery/dist/jquery.min'); ?>

<!-- Select2 -->
<?php echo $this->Html->css('AdminLTE./bower_components/select2/dist/css/select2.min', ['block' => 'css']); ?>
<!-- Select2 -->
<?php echo $this->Html->script('AdminLTE./bower_components/select2/dist/js/select2.full.min', ['block' => 'script']); ?>


<section class="content-header">
  <h1>
    <?= $crew->name ?>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>">
        <i class="fa fa-arrow-circle-left"></i> <?php echo __('Voltar'); ?></a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <!-- -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">
            <?php echo __('Pesquisar'); ?>
          </h3>
        </div>

        <?= $this->Form->create(null, ['role' => 'form', 'type' => "GET"]); ?>

        <div class="box-body">
          <div>
            <div class="select-2">
              <div class="col-md-5 ">
                <div class="select-students">
                  <label for="students_id">Aluno</label>
                  <select name="students_id"  class="select2-students" data-validity-message="Insira um nome válido" oninvalid="this.setCustomValidity(''); if (!this.value) this.setCustomValidity(this.dataset.validityMessage)" oninput="this.setCustomValidity('')" id="students_id">
                    <option value="" selected>Digite o nome do aluno</option>
                    <?php foreach ($students as $student) { ?>
                      <option value='<?= $student->id ?>'><?= $student->name ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-xs-6">
            <?php
            $options = [0 => 'Matutino', 1 => 'Vespertino', 2 => 'Noturno'];
            echo $this->Form->control('periodo', ['label' => 'Periodo', 'empty' => 'Selecione um periodo', 'options' => $options]);
            ?>
          </div>

          <div class="btn-actions">
            <?php if (count($_GET) > 0) : ?>
              <div class="btn btn-danger pull-right"><a style="color:white" href="<?= $this->Url->build(['controller' => 'Crews', 'action' => 'view',  $crew->id]); ?>">Limpar filtro</a></div>
            <?php endif; ?>
            <?php echo $this->Form->end(); ?>

            <button class="btn btn-primary" id="btn-submit" style="float: right;"><i class="fa fa-search" aria-hidden="true"></i> &nbsp Pesquisar</button>

          </div>
        </div>
      </div>

      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo __('Lista'); ?></h3>

          <?php
          $disabled = '';
          if ($crew->status == 1) {
          } else {
            $disabled = 'disabled';
          }

          ?>
          <div class="pull-right"><?php echo $this->Html->link(__(''), ['controller' => 'Students', 'action' => 'add', $crew->id], ['class' => "btn btn-success btn-add btn-xs fa fa-user-plus $disabled"]) ?>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col"><?= $this->Paginator->sort('id', ['label' => 'ID']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('name', ['label' => 'Nome']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('cpf', ['label' => 'CPF']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('idade', ['label' => 'Idade']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('email', ['label' => 'E-mail']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('periodo', ['label' => 'Periodo']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('status', ['label' => 'Status']) ?></th>
                <th scope="col" class="actions text-center"><?= __('Ações') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php

              foreach ($students as $student) : ?>
                <tr>
                  <td><?= $this->Number->format($student->id) ?></td>
                  <td><?= h($student->name) ?></td>

                  <td><?= h($student->cpf) ?></td>
                  <td><?= $this->Number->format($student->idade) ?></td>
                  <td><?= h($student->email) ?></td>

                  <?php
                  $periodo = 'Matutino';
                  if ($student->periodo == 1) {
                    $periodo = 'Vespertino';
                  }
                  if ($student->periodo == 2) {
                    $periodo = 'Noturno';
                  }
                  ?>

                  <td><?= h($periodo) ?></td>

                  <?php
                  $status = 'Inativo';
                  if ($student->status == 1) {
                    $status = 'Ativo';
                  }
                  ?>

                  <td><?= h($status) ?></td>

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
                    <?= $this->Html->link(__(''), ['controller' => 'Students', 'action' => 'view', $student->id], ['class' => 'btn btn-info btn-xs fa fa-eye']) ?>
                    <?= $this->Html->link(__(''), ['controller' => 'Students', 'action' => 'edit', $student->id], ['class' => 'btn btn-warning btn-xs fa fa-pencil-square-o']) ?>
                    <?= $this->Form->postLink(__(''), ['controller' => 'Students', 'action' => 'desativar', $student->id], ['confirm' => __("Deseja $texto o aluno: {0}?", $student->nome), 'class' => "btn $btn_ativar btn-xs"]) ?>
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

<script>
    $(function() {

        $(document).ready(function() {
            $('.select2-students').select2();
        });

    });
</script>


<style>
  .btn {
    padding: 6px 8px;
  }

  .btn-warning .btn-info {
    padding: 6px 7px;
  }

  .btnplus {
    padding: 6px 5.8px;

  }

  .btn-add {
    padding: 8px 8px;
  }

  .paginator-margin {
    padding: 0 5px;
  }

  .novo {
    margin-bottom: 30px;
    margin-top: 5px;
  }

  .btn-actions {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    padding: 25px;
  }

  .select-2 {
    justify-content: space-between;
  }

  .select-students {
    display: flex;
    flex-direction: column;
    
  }
  .select2-container .select2-selection--single{
    height: 33px;
  }
</style>