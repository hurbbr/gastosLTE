<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Conta[]|\Cake\Collection\CollectionInterface $contas
 */
?>

<?php $this->assign('title', __('Contas')); ?>

<?php
$this->assign(
  'breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Contas',
    ]
  ])
);
?>

<div class="card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title">
      <!-- -->
    </h2>
    <div class="card-toolbox">
      <?= $this->Paginator->limitControl([], null, [
        'label' => false,
        'class' => 'form-control-sm',
      ]); ?>
      <?= $this->Html->link(__('New Conta'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <thead>
        <tr>
          <th><?= $this->Paginator->sort('id') ?></th>
          <th><?= $this->Paginator->sort('nome') ?></th>
          <th><?= $this->Paginator->sort('desativado') ?></th>
          <th><?= $this->Paginator->sort('created') ?></th>
          <th><?= $this->Paginator->sort('modified') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($contas as $conta) : ?>
          <tr>
            <td><?= $this->Number->format($conta->id) ?></td>
            <td><?= h($conta->nome) ?></td>
            <td><?= $this->Number->format($conta->desativado) ?></td>
            <td><?= h($conta->created) ?></td>
            <td><?= h($conta->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['action' => 'view', $conta->id], ['class' => 'btn btn-xs btn-outline-primary', 'escape' => false]) ?>
              <?= $this->Html->link(__('Edit'), ['action' => 'edit', $conta->id], ['class' => 'btn btn-xs btn-outline-success', 'escape' => false]) ?>
              <?= $this->Form->postLink(__('Desativar'), ['action' => 'delete', $conta->id], ['class' => 'btn btn-xs btn-outline-danger', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $conta->id)]) ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->

  <div class="card-footer d-md-flex paginator">
    <div class="mr-auto" style="font-size:.8rem">
      <?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?>
    </div>

    <ul class="pagination pagination-sm">
      <?= $this->Paginator->first('<i class="fas fa-angle-double-left"></i>', ['escape' => false]) ?>
      <?= $this->Paginator->prev('<i class="fas fa-angle-left"></i>', ['escape' => false]) ?>
      <?= $this->Paginator->numbers() ?>
      <?= $this->Paginator->next('<i class="fas fa-angle-right"></i>', ['escape' => false]) ?>
      <?= $this->Paginator->last('<i class="fas fa-angle-double-right"></i>', ['escape' => false]) ?>
    </ul>

  </div>
  <!-- /.card-footer -->
</div>