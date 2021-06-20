<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TipoLancamento $tipoLancamento
 */
?>

<?php $this->assign('title', __('Edit Tipo Lancamento') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Tipo Lancamentos' => ['action'=>'index'],
      'View' => ['action'=>'view', $tipoLancamento->id],
      'Edit',
    ]
  ])
);
?>


<div class="card card-primary card-outline">
  <?= $this->Form->create($tipoLancamento) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('nome');
      echo $this->Form->control('user_id', ['options' => $users]);
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $tipoLancamento->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $tipoLancamento->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>
