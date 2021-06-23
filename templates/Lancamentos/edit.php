<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lancamento $lancamento
 */
?>

<?php $this->assign('title', __('Add Lancamento')); ?>

<?php
$this->assign(
  'breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Lancamentos' => ['action' => 'index'],
      'Edit',
    ]
  ])
);
?>


<div class="card card-primary card-outline">
  <?= $this->Form->create($lancamento) ?>
  <?= $this->Form->hidden('user_id', ['value' => $usuarioLogado->id]); ?>
  <div class="card-body">
    <div class="row">
      <?= $this->Form->control('tipo_lancamento_id', [
        'options' => $tipoLancamentos,
        'templates' => [
          'inputContainer'      => '<div class="form-group col-sm-4 {{type}}{{required}}">{{content}}</div>',
          'inputContainerError' => '<div class="form-group col-sm-4 {{type}}{{required}} has-error">{{content}} {{error}}</div>',
        ]
      ]); ?>
    </div>
    <div class="row">
      <?php
      echo $this->Form->control('data', [
        'type'         => 'text',
        'class'        => 'form-control datepicker',
        'autocomplete' => 'off',
        'value'        => $lancamento->data->format('d/m/Y'),
        'templates'    => [
          'inputContainer'      => '<div class="form-group col-sm-4 {{type}}{{required}}">{{content}}</div>',
          'inputContainerError' => '<div class="form-group col-sm-4 {{type}}{{required}} has-error">{{content}} {{error}}</div>',
        ]
      ]);
      echo $this->Form->control('data_pagamento', [
        'empty'               => true,
        'type'                => 'text',
        'autocomplete'        => 'off',
        'class'               => 'form-control datepicker',
        'data-date-clear-btn' => 'true',
        'value'               => $lancamento->data_pagamento ? $lancamento->data_pagamento->format('d/m/Y') : null,
        'templates'           => [
          'inputContainer'      => '<div class="form-group col-sm-4 {{type}}{{required}}">{{content}}</div>',
          'inputContainerError' => '<div class="form-group col-sm-4 {{type}}{{required}} has-error">{{content}} {{error}}</div>',
        ]
      ]);
      ?>
    </div>
    <div class="row">
      <?= $this->Form->control('descricao', [
        'templates' => [
          'inputContainer'      => '<div class="form-group col-sm-12 {{type}}{{required}}">{{content}}</div>',
          'inputContainerError' => '<div class="form-group col-sm-12 {{type}}{{required}} has-error">{{content}} {{error}}</div>',
        ]
      ]); ?>
    </div>
    <div class="row">
      <?php echo $this->Form->control('valor', [
        'class'     => 'form-control money',
        'type'      => 'text',
        'templates' => [
          'inputContainer'      => '<div class="form-group col-sm-4 {{type}}{{required}}">{{content}}</div>',
          'inputContainerError' => '<div class="form-group col-sm-4 {{type}}{{required}} has-error">{{content}} {{error}}</div>',
        ]
      ]);
      echo $this->Form->control('natureza', [
        'options'   => $lancamento::NATUREZA_OPTIONS,
        'templates' => [
          'inputContainer'      => '<div class="form-group col-sm-4 {{type}}{{required}}">{{content}}</div>',
          'inputContainerError' => '<div class="form-group col-sm-4 {{type}}{{required}} has-error">{{content}} {{error}}</div>',
        ]
      ]);
      echo $this->Form->control('conta_id', [
        'options'   => $contas,
        'templates' => [
          'inputContainer'      => '<div class="form-group col-sm-4 {{type}}{{required}}">{{content}}</div>',
          'inputContainerError' => '<div class="form-group col-sm-4 {{type}}{{required}} has-error">{{content}} {{error}}</div>',
        ]
      ]); ?>
    </div>
  </div>

  <div class="card-footer d-flex">
    <div class="ml-auto">
      <?= $this->Form->button(__('Save'), ['class' => 'btn btn-success']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>

<?php
$this->Html->css(['bootstrap-datepicker3.min'], ['block' => 'css']);
$this->Html->script([
  'jquery.maskMoney',
  'bootstrap-datepicker.min',
  'bootstrap-datepicker.pt-BR.min',
], [
  'block' => 'preScript'
]);
$this->start('script');
?>
<script>
  $(document).ready(function() {
    $(".money").maskMoney({
      prefix: 'R$ ',
      allowNegative: false,
      allowEmpty: false,
      decimal: ',',
      thousands: '.',
      precision: 2,
    });

    $('.datepicker').datepicker({
      autoclose: true,
      language: 'pt-BR',
      format: 'dd/mm/yyyy'
    });

    $(".money").maskMoney('mask');
  });

  $('#data').on('changeDate', function(e) {
    $('#data-pagamento').datepicker('setStartDate', e.date);
  });
</script>
<?php $this->end();
