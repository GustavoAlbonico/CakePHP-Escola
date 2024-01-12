<?= $this->Flash->render('auth') ?>
<?= $this->Flash->render() ?>
 <!-- essa linha superior se tirar a mensagem aparece na parte de cima inteira -->
<?= $this->Form->create() ?>       
<div class="box-body">
    <fieldset>
        <legend><?= __('Por favor informe seu usuário e senha ') ?></legend>
        <?= $this->Form->control('username', ['label' => 'Usuário']) ?>
        <?= $this->Form->control('password', ['label' => 'Senha']) ?>
    </fieldset>
</div>
<!-- /.box-body -->
<div class="box-footer">
    <?= $this->Form->button(__('Acessar')); ?>
</div>
<?= $this->Form->end() ?>
