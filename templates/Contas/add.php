<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Conta $conta
 */
?>

<?php $this->assign('title', __('Add Conta')); ?>

<?php
$this->assign(
  'breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Contas' => ['action' => 'index'],
      'Add',
    ]
  ])
);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($conta) ?>
  <div class="card-body">
    <?php
    echo $this->Form->hidden('user_id', ['value' => $usuarioLogado->id]);
    echo $this->Form->control('nome');
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="ml-auto">
      <?= $this->Form->button(__('Save'), ['class' => 'btn btn-success']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>