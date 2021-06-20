<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TipoLancamento $tipoLancamento
 */
?>

<?php
$this->assign('title', __('Tipo Lancamento') );

$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Tipo Lancamentos' => ['action'=>'index'],
      'View',
    ]
  ])
);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($tipoLancamento->id) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($tipoLancamento->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $tipoLancamento->has('user') ? $this->Html->link($tipoLancamento->user->id, ['controller' => 'Users', 'action' => 'view', $tipoLancamento->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($tipoLancamento->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($tipoLancamento->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($tipoLancamento->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete',  $tipoLancamento->id],
          ['confirm' => __('Are you sure you want to delete # {0}?',  $tipoLancamento->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit',  $tipoLancamento->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>
</div>


