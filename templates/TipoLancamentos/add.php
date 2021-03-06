<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TipoLancamento $tipoLancamento
 */
?>

<?php $this->assign('title', __('Add Tipo Lancamento')); ?>

<?php
$this->assign(
  'breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Tipo Lancamentos' => ['action' => 'index'],
      'Add',
    ]
  ])
);
?>


<div class="card card-primary card-outline">
  <?= $this->Form->create($tipoLancamento) ?>
  <div class="card-body">
    <?php
    echo $this->Form->control('nome');
    echo $this->Form->hidden('user_id', ['value' => $usuarioLogado->id]);
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