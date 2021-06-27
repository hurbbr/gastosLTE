<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Lancamento Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $data
 * @property \Cake\I18n\FrozenDate|null $data_pagamento
 * @property string $descricao
 * @property string $valor
 * @property string $natureza
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int $conta_id
 * @property int $tipo_lancamento_id
 * @property int $user_id
 * @property int $numero_parcelas
 * @property string $forma_lancamento
 * @property int $lancamento_id
 * @property int $parcela
 *
 * @property \App\Model\Entity\Conta $conta
 * @property \App\Model\Entity\TipoLancamento $tipo_lancamento
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Lancamento $lancamentos
 */
class Lancamento extends Entity
{
    const NATUREZA_SAIDA = 'saida';
    const NATUREZA_ENTRADA = 'entrada';

    const NATUREZA_OPTIONS = [
        self::NATUREZA_ENTRADA => 'Entrada',
        self::NATUREZA_SAIDA => 'Saída'
    ];

    const CLASS_ICONS = [
        self::NATUREZA_SAIDA => 'fa-arrow-circle-left bg-red',
        self::NATUREZA_ENTRADA => 'fa-arrow-circle-right bg-green'
    ];

    const NATUREZA_VARIAVEL = [
        self::NATUREZA_SAIDA => 'saida',
        self::NATUREZA_ENTRADA => 'entrada'
    ];

    const FORMA_LANCAMENTO_RECORRENCIA = 'recorrencia';
    const FORMA_LANCAMENTO_PARCELA = 'parcela';

    const FORMA_LANCAMENTO_OPTIONS = [
        self::FORMA_LANCAMENTO_PARCELA => 'Parcela',
        self::FORMA_LANCAMENTO_RECORRENCIA => 'Recorrencia'
    ];


    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'data'               => true,
        'data_pagamento'     => true,
        'descricao'          => true,
        'valor'              => true,
        'natureza'           => true,
        'created'            => true,
        'modified'           => true,
        'conta_id'           => true,
        'tipo_lancamento_id' => true,
        'user_id'            => true,
        'conta'              => true,
        'tipo_lancamento'    => true,
        'user'               => true,
        'numero_parcelas'    => true,
        'forma_lancamento'   => true,
        'lancamento_id'      => true,
        'lancamentos'        => true,
        'parcela'            => true,
    ];
}
