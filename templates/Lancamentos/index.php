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
    <div class="card-toolbox">
      <?= $this->Html->link(__('Novo'), ['action' => 'add', '?' => $this->getRequest()->getQueryParams()], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <ul class="pagination pagination-month justify-content-center">
          <li class="page-item pagination-prev">
            <a class="page-link" href="<?= $this->Url->build(['action' => 'index', '?' => ['mes' => $mesAnterior, 'ano' => '2021']]) ?>"><i class="fas fa-chevron-left"></i></a>
          </li>
          <li class="page-item" data-mes='01'>
            <a class="page-link" href="<?= $this->Url->build(['action' => 'index', '?' => ['mes' => '01', 'ano' => '2021']]) ?>">
              <p class="page-month">Jan</p>
              <p class="page-year">2021</p>
            </a>
          </li>
          <li class="page-item" data-mes='02'>
            <a class="page-link" href="<?= $this->Url->build(['action' => 'index', '?' => ['mes' => '02', 'ano' => '2021']]) ?>">
              <p class="page-month">Feb</p>
              <p class="page-year">2021</p>
            </a>
          </li>
          <li class="page-item" data-mes='03'>
            <a class="page-link" href="<?= $this->Url->build(['action' => 'index', '?' => ['mes' => '03', 'ano' => '2021']]) ?>">
              <p class="page-month">Mar</p>
              <p class="page-year">2021</p>
            </a>
          </li>
          <li class="page-item" data-mes='04'>
            <a class="page-link" href="<?= $this->Url->build(['action' => 'index', '?' => ['mes' => '04', 'ano' => '2021']]) ?>">
              <p class="page-month">Apr</p>
              <p class="page-year">2021</p>
            </a>
          </li>
          <li class="page-item" data-mes='05'>
            <a class="page-link" href="<?= $this->Url->build(['action' => 'index', '?' => ['mes' => '05', 'ano' => '2021']]) ?>">
              <p class="page-month">May</p>
              <p class="page-year">2021</p>
            </a>
          </li>
          <li class="page-item" data-mes='06'>
            <a class="page-link" href="<?= $this->Url->build(['action' => 'index', '?' => ['mes' => '06', 'ano' => '2021']]) ?>">
              <p class="page-month">Jun</p>
              <p class="page-year">2021</p>
            </a>
          </li>
          <li class="page-item" data-mes='07'>
            <a class="page-link" href="<?= $this->Url->build(['action' => 'index', '?' => ['mes' => '07', 'ano' => '2021']]) ?>">
              <p class="page-month">Jul</p>
              <p class="page-year">2021</p>
            </a>
          </li>
          <li class="page-item" data-mes='08'>
            <a class="page-link" href="<?= $this->Url->build(['action' => 'index', '?' => ['mes' => '08', 'ano' => '2021']]) ?>">
              <p class="page-month">Aug</p>
              <p class="page-year">2021</p>
            </a>
          </li>
          <li class="page-item" data-mes='09'>
            <a class="page-link" href="<?= $this->Url->build(['action' => 'index', '?' => ['mes' => '09', 'ano' => '2021']]) ?>">
              <p class="page-month">Sep</p>
              <p class="page-year">2021</p>
            </a>
          </li>
          <li class="page-item" data-mes='10'>
            <a class="page-link" href="<?= $this->Url->build(['action' => 'index', '?' => ['mes' => '10', 'ano' => '2021']]) ?>">
              <p class="page-month">Oct</p>
              <p class="page-year">2021</p>
            </a>
          </li>
          <li class="page-item" data-mes='11'>
            <a class="page-link" href="<?= $this->Url->build(['action' => 'index', '?' => ['mes' => '11', 'ano' => '2021']]) ?>">
              <p class="page-month">Nov</p>
              <p class="page-year">2021</p>
            </a>
          </li>
          <li class="page-item" data-mes='12'>
            <a class="page-link" href="<?= $this->Url->build(['action' => 'index', '?' => ['mes' => '12', 'ano' => '2021']]) ?>">
              <p class="page-month">Dec</p>
              <p class="page-year">2021</p>
            </a>
          </li>
          <li class="page-item pagination-next">
            <a class="page-link" href="<?= $this->Url->build(['action' => 'index', '?' => ['mes' => $proximoMes, 'ano' => '2021']]) ?>"><i class="fas fa-chevron-right"></i></a>
          </li>
        </ul>
      </div>
    </div>
    <div class="row" style="margin-top:15px;">
      <div class="col-md-2"></div>
      <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box bg-danger">
          <span class="info-box-icon"><i class="fas fa-dollar-sign"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Entrada no mês: <?= $this->Number->currency($entrada, 'BRL') ?></span>
            <span class="info-box-text">Saída no mês: <?= $this->Number->currency($saida, 'BRL') ?></span>
            <div class="progress">
              <div class="progress-bar" style="width: <?= $porcentagem ?>%"></div>
            </div>
            <span class="progress-description">
              <?= $porcentagem ?>% do total da entrada utilizados!
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box bg-success">
          <span class="info-box-icon"><i class="fas fa-dollar-sign"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total de entrada: <?= $this->Number->currency($entradaTotal['valor'], 'BRL') ?></span>
            <span class="info-box-text">Total de saída: <?= $this->Number->currency($saidaTotal['valor'], 'BRL') ?></span>
            <div class="progress">
              <div class="progress-bar" style="width: <?= $porcentagemTotal ?>%"></div>
            </div>
            <span class="progress-description">
              <?= $porcentagemTotal ?>% do total da entrada utilizados!
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <div class="col-md-2"></div>
    </div>
    <!-- TIMELINE -->
    <div class="row">
      <?php if (empty($lancamentosArray)) : ?>
        <div class="col-md-3 col-sm-6 col-12"></div>
        <div class="col-md-6 col-sm-6 col-12">
          <div class="card bg-gradient-success">
            <div class="card-header">
              <h3 class="card-title">Opps!</h3>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              Você ainda não registrou nada nesse mês!
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12"></div>
      <?php else : ?>
        <div class="col-sm-12">
          <div class="timeline">
            <?php foreach ($lancamentosArray as $data => $lancamentos) : ?>
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-warning"><?= $data ?></span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <?php foreach ($lancamentos as $lancamento) : ?>
                <div>
                  <i class="fas <?= $lancamento::CLASS_ICONS[$lancamento->natureza] ?>"></i>
                  <div class="timeline-item">
                    <span class="time"><i class="fas fa-clock"></i> <?= $lancamento->created->format('d/m/Y h:m:s') ?></span>
                    <h3 class="timeline-header">
                      <?= $lancamento->has('tipo_lancamento') ? h($lancamento->tipo_lancamento->nome) : 'N/D' ?>
                      <small> <?= h($lancamento->natureza) ?> </small>
                    </h3>
                    <div class="timeline-body">
                      <div class="row">
                        <div class="col-sm-4">
                          <small class="align-top"> <?= h('Descrição:') ?></small>
                          <?= h($lancamento->descricao) ?>
                        </div>
                        <div class="col-sm-4">
                          <small class="align-top"> <?= h('Conta:') ?></small>
                          <?= h($lancamento->has('conta') ? $lancamento->conta->nome : 'N/D') ?>
                        </div>
                        <div class="col-sm-4">
                          <small class="align-top"> <?= h('Valor:') ?></small>
                          <?= $this->Number->currency($lancamento->valor, 'BRL') ?>
                        </div>
                      </div>
                    </div>
                    <div class="timeline-footer">
                      <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $lancamento->id], ['class' => 'btn btn-sm btn-primary', 'escape' => false]) ?>
                      <?= $this->Html->link(__('Editar'), ['action' => 'edit', $lancamento->id], ['class' => 'btn btn-sm btn-success', 'escape' => false]) ?>
                      <?= $this->Form->postLink(__('Apagar'), ['action' => 'delete', $lancamento->id], ['class' => 'btn btn-sm btn-danger', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $lancamento->id)]) ?>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
              <!-- END timeline item -->
            <?php endforeach; ?>
            <div>
              <i class="fas fa-clock bg-gray"></i>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
  <!-- /.card-body -->
  <div class="card-footer d-md-flex">
  </div>
  <!-- /.card-footer -->
</div>

<?php
$this->start('script');
echo $this->Html->script('rpage');
?>

<script>
  const mes = "<?= $this->getRequest()->getQuery('mes') ?? date('m') ?>";
  $(document).ready(function() {
    $('.pagination-month').children('li').each(function(index, element) {
      if ($(element).data('mes') == mes) {
        $(element).addClass('active');
      }
    });
    setTimeout(function() {
      $(".pagination").rPage();
    }, 500);

    setTimeout(function() {
      $('.alert').remove();
    }, 2000);
  });
</script>
<?php $this->end() ?>