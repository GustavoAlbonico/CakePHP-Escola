<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Usuários

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
                  <th scope="col"><?= $this->Paginator->sort('nome',['label' => 'Nome']) ?></th>
                  <th scope="col"><?= $this->Paginator->sort('username',['label' => 'Usuário']) ?></th>
                  <th scope="col"><?= $this->Paginator->sort('role',['label' => 'Nivel Acesso']) ?></th>
                  <th scope="col"><?= $this->Paginator->sort('ativo',['label' => 'Status']) ?></th>
                  <!-- <th scope="col"><?= $this->Paginator->sort('created',['label' => 'Criado']) ?></th>
                  <th scope="col"><?= $this->Paginator->sort('modified',['label' => 'Modificado']) ?></th> -->
                  <th scope="col" class="actions text-center"><?= __('Ações') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($users as $user): ?>
                <tr>
                  <td><?= $this->Number->format($user->id) ?></td>
                  <td><?= h($user->nome) ?></td>
                  <td><?= h($user->username) ?></td>
                  <td><?= h($user->role) ?></td>

                    <?php
                        $status = 'Inativo';
                      if($user->ativo == 1){
                        $status = 'Ativo';}
                    ?>

                  <td><?= h($status) ?></td>
                  <!-- <td><?= h($user->created) ?></td>
                  <td><?= h($user->modified) ?></td> -->
                  <td class="actions text-center">
                      <?= $this->Html->link(__('Ver'), ['action' => 'view', $user->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $user->id],
                       ['confirm' => __('Você realmente deseja deletar?', $user->id), 'class'=>'btn btn-danger btn-xs']) ?>
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