<?php

namespace App\Eventos\Comum;

use Cake\Event\Event;
use Cake\ORM\Entity;

/**
 * Evento de Entidade
 */
class InitEvento extends Event
{
    /**
     * @param   string  $nome      Nome da entidade
     * @param   string  $evento    Evento ocorrido
     * @param   object  $subject   subject
     * @param   Entity  $entidade  $entidade
     */
    public function __construct(string $nome, string $evento, object $subject, Entity $entidade)
    {
        $name = "$nome.$evento";
        parent::__construct($name, $subject, ['entidade' => $entidade]);
    }

    /**
     * @return  Entity
     */
    public function getEntidade()
    {
        return $this->_data['entidade'];
    }
}
