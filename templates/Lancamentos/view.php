<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lancamento $lancamento
 */
?>

<?php
$this->assign('title', __('Lancamento'));

$this->assign(
  'breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Lancamentos' => ['action' => 'index'],
      'View',
    ]
  ])
);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($lancamento->id) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
        <th><?= __('descricao') ?></th>
        <td><?= h($lancamento->descricao) ?></td>
      </tr>
      <tr>
        <th><?= __('Natureza') ?></th>
        <td><?= h($lancamento->natureza) ?></td>
      </tr>
      <tr>
        <th><?= __('Conta') ?></th>
        <td><?= $lancamento->has('conta') ? $this->Html->link($lancamento->conta->id, ['controller' => 'Contas', 'action' => 'view', $lancamento->conta->id]) : '' ?></td>
      </tr>
      <tr>
        <th><?= __('Tipo Lancamento') ?></th>
        <td><?= $lancamento->has('tipo_lancamento') ? $this->Html->link($lancamento->tipo_lancamento->id, ['controller' => 'TipoLancamentos', 'action' => 'view', $lancamento->tipo_lancamento->id]) : '' ?></td>
      </tr>
      <tr>
        <th><?= __('User') ?></th>
        <td><?= $lancamento->has('user') ? $this->Html->link($lancamento->user->id, ['controller' => 'Users', 'action' => 'view', $lancamento->user->id]) : '' ?></td>
      </tr>
      <tr>
        <th><?= __('Id') ?></th>
        <td><?= $this->Number->format($lancamento->id) ?></td>
      </tr>
      <tr>
        <th><?= __('Valor') ?></th>
        <td><?= $this->Number->format($lancamento->valor) ?></td>
      </tr>
      <tr>
        <th><?= __('Data') ?></th>
        <td><?= h($lancamento->data) ?></td>
      </tr>
      <tr>
        <th><?= __('Data Pagamento') ?></th>
        <td><?= h($lancamento->data_pagamento) ?></td>
      </tr>
      <tr>
        <th><?= __('Created') ?></th>
        <td><?= h($lancamento->created) ?></td>
      </tr>
      <tr>
        <th><?= __('Modified') ?></th>
        <td><?= h($lancamento->modified) ?></td>
      </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete',  $lancamento->id],
        ['confirm' => __('Are you sure you want to delete # {0}?',  $lancamento->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit',  $lancamento->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>
</div>