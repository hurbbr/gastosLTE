<?php

namespace App\Eventos\Lancamento\Application\DomainEventHandler;

use App\Eventos\Comum\InitEvento as Evento;
use App\Eventos\Lancamento\Application\Actions\ParcelasActions;
use Cake\Event\EventListenerInterface;


/**
 * Escuta os eventos de domínio para inserir novas Tarefas e Agendas
 * @todo extrair ao máximo as dependências com o Framework
 */
class LancamentoEventos implements EventListenerInterface
{

    public function __construct()
    {
        //TODO: Refatorar para repositórios ao invés de tables
        // $this->PagarLancamentos = TableRegistry::getTableLocator()->get('Lancamentos');
        // $this->ReceberLancamentos = TableRegistry::getTableLocator()->get('ReceberLancamentos');
    }

    /**
     * {@inheritdoc}
     */
    public function implementedEvents(): array
    {
        return [
            'Lancamento.NovoLancamento' => 'verificaParcelas',
        ];
    }

    /**
     * @param   Evento  $event  [$event description]
     * @return  void
     */
    public function verificaParcelas(Evento $event)
    {
        $entidade = $event->getEntidade();
        (new ParcelasActions($entidade))->executeNew();
    }
}
