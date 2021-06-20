<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Conta $conta
 */
?>

<?php
$this->assign('title', __('Conta') );

$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Contas' => ['action'=>'index'],
      'View',
    ]
  ])
);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($conta->id) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($conta->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $conta->has('user') ? $this->Html->link($conta->user->id, ['controller' => 'Users', 'action' => 'view', $conta->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($conta->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Desativado') ?></th>
            <td><?= $this->Number->format($conta->desativado) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($conta->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($conta->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete',  $conta->id],
          ['confirm' => __('Are you sure you want to delete # {0}?',  $conta->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit',  $conta->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>
</div>


