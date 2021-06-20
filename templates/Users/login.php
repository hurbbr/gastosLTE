<?php

/**
 * @var \App\View\AppView $this
 */

$this->assign('title', __('Login'));
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create(null) ?>
  <div class="card-body">
    <?php
    echo $this->Form->control('email');
    echo $this->Form->control('password');
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="ml-auto">
      <?= $this->Html->link('Cadastrar', ['action' => 'add'], ['class' => 'btn btn-success']); ?>
      <?= $this->Form->button(__('Login')) ?>
    </div>
  </div>
  <?= $this->Form->end() ?>
</div>