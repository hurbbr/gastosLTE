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
      <?= $this->Html->link(__('Novo'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <ul class="pagination pagination-month justify-content-center">
          <li class="page-item pagination-prev"><a class="page-link" href="#">«</a></li>
          <li class="page-item">
            <a class="page-link" href="#">
              <p class="page-month">Jan</p>
              <p class="page-year">2021</p>
            </a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">
              <p class="page-month">Feb</p>
              <p class="page-year">2021</p>
            </a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">
              <p class="page-month">Mar</p>
              <p class="page-year">2021</p>
            </a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">
              <p class="page-month">Apr</p>
              <p class="page-year">2021</p>
            </a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">
              <p class="page-month">May</p>
              <p class="page-year">2021</p>
            </a>
          </li>
          <li class="page-item active">
            <a class="page-link" href="#">
              <p class="page-month">Jun</p>
              <p class="page-year">2021</p>
            </a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">
              <p class="page-month">Jul</p>
              <p class="page-year">2021</p>
            </a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">
              <p class="page-month">Aug</p>
              <p class="page-year">2021</p>
            </a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">
              <p class="page-month">Sep</p>
              <p class="page-year">2021</p>
            </a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">
              <p class="page-month">Oct</p>
              <p class="page-year">2021</p>
            </a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">
              <p class="page-month">Nov</p>
              <p class="page-year">2021</p>
            </a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">
              <p class="page-month">Dec</p>
              <p class="page-year">2021</p>
            </a>
          </li>
          <li class="page-item"><a class="page-link" href="#">»</a></li>
        </ul>
      </div>
    </div>
    <div class="row">
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
    </div>
  </div>
  <!-- /.card-body -->
  <div class="card-footer d-md-flex">
  </div>
  <!-- /.card-footer -->
</div>

<?php $this->start('script'); ?>

<script>
  /*
   * A plugin for making Bootstrap's pagination more responsive
   * https://github.com/auxiliary/rpage
   */

  (function($) {
    jQuery.fn.rPage = function() {
      var $this = $(this);
      for (var i = 0, max = $this.length; i < max; i++) {
        new rPage($($this[i]));
      }

      function rPage($container) {
        this.label = function() {
          var active_index = this.els.filter(".active").index();
          var rp = this;
          this.els.each(function() {
            if (rp.isNextOrPrevLink($(this)) == false) {
              $(this).addClass("page-away-" + (Math.abs(active_index - $(this).index())).toString());
            } else {
              if ($(this).index() > active_index) {
                $(this).addClass("right-etc");
              } else {
                $(this).addClass("left-etc");
              }
            }
          });
        }

        this.makeResponsive = function() {
          this.reset();
          var width = this.calculateWidth();

          while (width > this.els.parent().parent().width() - 10) {
            var did_remove = this.removeOne();
            if (did_remove == false) {
              break;
            }
            width = this.calculateWidth();
          }
        }

        this.isNextOrPrevLink = function(element) {
          return (
            element.hasClass('pagination-prev') ||
            element.hasClass('pagination-next') ||
            element.text() == "»" ||
            element.text() == "«"
          );
        }

        this.isRemovable = function(element) {
          if (this.isNextOrPrevLink(element)) {
            return false;
          }
          var index = this.els.filter(element).index();
          if (index == 1 || this.isNextOrPrevLink($container.find("li").eq(index + 1))) {
            return false;
          }
          if (element.text() == "...") {
            return false;
          }
          return true;
        }

        this.removeOne = function() {
          var active_index = this.els.filter(".active").index();
          var farthest_index = $container.find("li").length - 1;
          var next = active_index + 1;
          var prev = active_index - 1;

          for (var i = farthest_index - 1; i > 0; i--) {
            var candidates = this.els.filter(".page-away-" + i.toString());
            var candidate = candidates.filter(function() {
              return this.style["display"] != "none";
            });
            if (candidate.length > 0) {
              for (var j = 0; j < candidate.length; j++) {
                var candid_candidate = candidate.eq(j);
                if (this.isRemovable(candid_candidate)) {
                  candid_candidate.css("display", "none");
                  if (this.needsEtcSign(active_index, farthest_index - 1)) {
                    this.els.eq(farthest_index - 2).before("<li class='disabled removable'><span>...</span></li>");
                  }
                  if (this.needsEtcSign(1, active_index)) {
                    this.els.eq(1).after("<li class='disabled removable'><span>...</span></li>");
                  }
                  return true;
                }
              }
            }
          }
          return false;
        }

        this.needsEtcSign = function(el1_index, el2_index) {
          if (el2_index - el1_index <= 1) {
            return false;
          } else {
            var hasEtcSign = false;
            var hasHiddenElement = false;
            for (var i = el1_index + 1; i < el2_index; i++) {
              var el = $container.find("li").eq(i);
              if (el.css("display") == "none") {
                hasHiddenElement = true;
              }
              if (el.text() == "...") {
                hasEtcSign = true;
              }
            }
            if (hasHiddenElement == true && hasEtcSign == false) {
              return true;
            }
          }
          return false;
        }

        this.reset = function() {
          for (var i = 0; i < this.els.length; i++) {
            this.els.eq(i).css("display", "inline");
          }
          $container.find("li").filter(".removable").remove();
        }

        this.calculateWidth = function() {
          var width = 0;
          for (var i = 0; i < $container.find("li").length; i++) {
            if (!($container.find("li").eq(i).css('display') == 'none')) {
              if ($container.find("li").eq(i).children("a").eq(0).length > 0) {
                width += $container.find("li").eq(i).children("a").eq(0).outerWidth();
              }
              if ($container.find("li").eq(i).children("span").eq(0).length > 0) {
                width += $container.find("li").eq(i).children("span").eq(0).outerWidth();
              }
            }
          }
          return width;
        }

        this.els = $container.find("li");
        this.label();
        this.makeResponsive();

        var resize_timer;

        $(window).resize(
          $.proxy(function() {
            clearTimeout(resize_timer);
            resize_timer = setTimeout($.proxy(function() {
              this.makeResponsive()
            }, this), 100);
          }, this)
        );
      }
    };
  }(jQuery));
</script>
<script>
  $(document).ready(function() {
    $(".pagination").rPage();
  });
</script>
<?php $this->end() ?>