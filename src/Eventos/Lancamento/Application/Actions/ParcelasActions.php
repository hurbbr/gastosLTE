<?php

namespace App\Eventos\Lancamento\Application\Actions;

use Cake\ORM\TableRegistry;
use App\Model\Entity\Lancamento;
use App\Model\Table\LancamentosTable;
use App\Util\ParcelaCount;
use Cake\I18n\FrozenDate;

class ParcelasActions
{
    /**
     * @var LancamentosTable
     */
    private $Lancamentos;

    /**
     * @var Lancamento
     */
    private $lancamento;

    /**
     * @var Lancamento[]
     */
    private $lancamentos = [];

    /**
     * @var array
     */
    private $Parcelas;


    /**
     * @param Lancamento    $entidade    Lançamento novo/editado
     */
    public function __construct($entidade)
    {
        $this->Lancamentos = TableRegistry::getTableLocator()->get('Lancamentos');
        $this->lancamento = $entidade;

        return $this;
    }

    /** {@inheritdoc} */
    public function executeNew(): object
    {
        if ($this->lancamento->numero_parcelas > 1) {
            $this->validaParcelas();
        }

        if (!empty($this->Parcelas)) {
            try {
                $this->Lancamentos->saveMany($this->Parcelas);
            } catch (\Throwable $th) {
                //$th;
            }
        }

        return $this;
    }

    private function validaParcelas(): void
    {
        switch ($this->lancamento->forma_lancamento) {
            case Lancamento::FORMA_LANCAMENTO_PARCELA:
                $this->criaParcelas();
                break;
            case Lancamento::FORMA_LANCAMENTO_RECORRENCIA:
                $this->criaRecorrencia();
                break;
        }
    }

    private function criaParcelas(): void
    {
        $numParcelas = $this->lancamento->numero_parcelas;
        $parcelas = new ParcelaCount($this->lancamento->valor, $numParcelas);
        $entidades = [];
        $data = $this->lancamento->data;

        for ($i = 1; $i < $numParcelas; $i++) {
            $data = $data->modify('+1 months');
            $dados = [
                'data'               => $data,
                'descricao'          => $this->lancamento->descricao,
                'valor'              => $parcelas->getParcela($i + 1),
                'natureza'           => $this->lancamento->natureza,
                'conta_id'           => $this->lancamento->conta_id,
                'tipo_lancamento_id' => $this->lancamento->tipo_lancamento_id,
                'user_id'            => $this->lancamento->user_id,
                'numero_parcelas'    => $this->lancamento->numero_parcelas,
                'forma_lancamento'   => $this->lancamento->forma_lancamento,
                'lancamento_id'      => $this->lancamento->id,
                'parcela'            => $i + 1
            ];
            $entidades[] = $this->Lancamentos->newEntity($dados);
        }
        $this->lancamento->valor = $parcelas->getParcela(1);
        $this->lancamento->parcela = 1;

        $entidades[] = $this->lancamento;

        $this->Parcelas = $entidades;
    }

    private function criaRecorrencia(): void
    {
        $numParcelas = $this->lancamento->numero_parcelas;
        $entidades = [];
        $data = $this->lancamento->data;

        for ($i = 1; $i < $numParcelas; $i++) {
            $data = $data->modify('+1 months');
            $dados = [
                'data'               => $data,
                'descricao'          => $this->lancamento->descricao,
                'valor'              => $this->lancamento->valor,
                'natureza'           => $this->lancamento->natureza,
                'conta_id'           => $this->lancamento->conta_id,
                'tipo_lancamento_id' => $this->lancamento->tipo_lancamento_id,
                'user_id'            => $this->lancamento->user_id,
                'numero_parcelas'    => $this->lancamento->numero_parcelas,
                'forma_lancamento'   => $this->lancamento->forma_lancamento,
                'lancamento_id'      => $this->lancamento->id,
                'parcela'            => $i + 1
            ];
            $entidades[] = $this->Lancamentos->newEntity($dados);
        }

        $this->lancamento->parcela = 1;
        $entidades[] = $this->lancamento;

        $this->Parcelas = $entidades;
    }
}
