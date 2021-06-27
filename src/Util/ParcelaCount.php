<?php

namespace App\Util;

class ParcelaCount
{
    private $parcelas = 0;
    private $valorParcela = 0;
    private $resto = 0;

    public function __construct($valorTotal, $parcelas)
    {
        $this->valorTotal = floatVal($valorTotal);
        $this->parcelas = $parcelas;

        if ($parcelas === 1) {
            $this->valorParcela = $valorTotal;
        } else {
            $this->valorParcela = round($valorTotal / $parcelas, 2);
            $totalParcial = ($parcelas - 1) * $this->valorParcela;

            $this->resto = $valorTotal - $totalParcial;
        }
    }

    public function getParcela($parcela): float
    {
        if ($parcela === $this->parcelas && $this->resto !== 0) {
            return floatVal($this->resto);
        }

        return floatVal($this->valorParcela);
    }
}
