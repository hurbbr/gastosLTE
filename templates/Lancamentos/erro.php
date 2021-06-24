<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lancamento[]|\Cake\Collection\CollectionInterface $lancamentos
 */
?>

<?php $this->assign('title', __('Lançamentos')); ?>

<?php
$this->assign(
  'breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'Lista de Lançamentos',
    ]
  ])
);
?>

<div class="card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title">
      <!-- -->
    </h2>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <div class="row">
      <div class="col-md-3 col-sm-6 col-12"></div>
      <div class="col-md-6 col-sm-6 col-12">
        <div class="card bg-gradient-danger">
          <div class="card-header">
            <h3 class="card-title">Opps!</h3>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body text-center">
            <p>Você não tem Conta/Tipo Lançamentos cadatrado.</p>
            <p>Cadastre pelo menos 1 de cada para continuar!</p>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-12"></div>
    </div>
  </div>
  <!-- /.card-body -->
  <div class="card-footer d-md-flex">
  </div>
  <!-- /.card-footer -->
</div>