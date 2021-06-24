<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Lancamento;
use Cake\I18n\FrozenDate;

/**
 * Lancamentos Controller
 *
 * @property \App\Model\Table\LancamentosTable $Lancamentos
 * @method \App\Model\Entity\Lancamento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LancamentosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $usuarioLogado = $this->getUser();

        $contas = $this->Lancamentos->Contas->find()->where(['user_id' => $usuarioLogado->id])->count();
        $tipoLancamentos = $this->Lancamentos->TipoLancamentos->find()->where(['user_id' => $usuarioLogado->id])->count();

        if ($contas == 0 || $tipoLancamentos == 0) {
            $this->viewBuilder()->setTemplate('erro');
        } else {
            $filtros = $this->preparaFiltros();
            $LancamentosQuery = $this->Lancamentos->find()
                ->where([
                    'Lancamentos.user_id' => $usuarioLogado->id,
                    'data BETWEEN :start AND :end'
                ])
                ->bind(':start', $filtros['data_inicio'], 'date')
                ->bind(':end',   $filtros['data_fim'], 'date')
                ->contain([
                    'Contas' => [
                        'fields' => ['nome']
                    ],
                    'TipoLancamentos' => [
                        'fields' => ['nome']
                    ],
                ])
                ->orderAsc('Lancamentos.data');

            $this->criaTimeLine($LancamentosQuery);
            $this->carregaBalancoGeral();
        }
    }

    private function preparaFiltros()
    {
        $query = $this->getRequest()->getQueryParams();
        if (!empty($query['mes']) && !empty($query['ano'])) {
            $data = new FrozenDate("{$query['ano']}-{$query['mes']}-01");
            $filtros = [
                'data_inicio' => $data->startOfMonth(),
                'data_fim' => $data->endOfMonth()
            ];
            $proximoMes = $query['mes'];
            if ($query['mes'] != 12) {
                $proximoMes = $query['mes'] + 1;
            }
            $mesAnterior = $query['mes'];
            if ($query['mes'] != 1) {
                $mesAnterior = $query['mes'] - 1;
            }
        } else {
            $data = new FrozenDate();
            $filtros = [
                'data_inicio' => $data->startOfMonth(),
                'data_fim' => $data->endOfMonth()
            ];

            $proximoMes = $data->format('m');
            if ($proximoMes != 12) {
                $proximoMes = $proximoMes + 1;
            }
            $mesAnterior = $data->format('m');
            if ($mesAnterior != 1) {
                $mesAnterior = $mesAnterior - 1;
            }
        }
        $mesAnterior = sprintf('%02u', $mesAnterior);
        $proximoMes = sprintf('%02u', $proximoMes);

        $this->set(compact('mesAnterior', 'proximoMes'));
        return $filtros;
    }

    /**
     * View method
     *
     * @param string|null $id Lancamento id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lancamento = $this->Lancamentos->get($id, [
            'contain' => ['Contas', 'TipoLancamentos', 'Users'],
        ]);

        $this->set(compact('lancamento'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usuarioLogado = $this->getUser();
        $contas = $this->Lancamentos->Contas->find()->where(['user_id' => $usuarioLogado->id])->count();
        $tipoLancamentos = $this->Lancamentos->TipoLancamentos->find()->where(['user_id' => $usuarioLogado->id])->count();

        if ($contas == 0 || $tipoLancamentos == 0) {
            $this->viewBuilder()->setTemplate('erro');
        } else {
            $lancamento = $this->Lancamentos->newEmptyEntity();
            if ($this->request->is('post')) {
                $post = $this->request->getData();
                $post['valor'] = $this->trataValor($post['valor']);
                $post['data'] = $this->trataData($post['data']);

                if (!empty($post['data_pagamento'])) {
                    $post['data_pagamento'] = $this->trataData($post['data_pagamento']);
                }
                $post['user_id'] = $this->getUser()->id;
                $lancamento = $this->Lancamentos->patchEntity($lancamento, $post);

                if ($this->Lancamentos->save($lancamento)) {
                    $this->Flash->success(__('The lancamento has been saved.'));

                    return $this->redirect(['action' => 'index', '?' => $this->getRequest()->getQueryParams()]);
                }
                $this->Flash->error(__('The lancamento could not be saved. Please, try again.'));
            }

            $contas = $this->Lancamentos->Contas->find('list', [
                'conditions' => [
                    'Contas.user_id' => $usuarioLogado->id
                ],
                'limit' => 200
            ]);
            $tipoLancamentos = $this->Lancamentos->TipoLancamentos->find('list', [
                'conditions' => [
                    'TipoLancamentos.user_id' => $usuarioLogado->id
                ], 'limit' => 200
            ]);
            $this->set(compact('lancamento', 'contas', 'tipoLancamentos'));
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Lancamento id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lancamento = $this->Lancamentos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->request->getData();
            $post['valor'] = $this->trataValor($post['valor']);
            $post['data'] = $this->trataData($post['data']);

            if (!empty($post['data_pagamento'])) {
                $post['data_pagamento'] = $this->trataData($post['data_pagamento']);
            }
            $post['user_id'] = $this->getUser()->id;
            $lancamento = $this->Lancamentos->patchEntity($lancamento, $post);
            if ($this->Lancamentos->save($lancamento)) {
                $this->Flash->success(__('The lancamento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lancamento could not be saved. Please, try again.'));
        }
        $usuario = $this->getUser();
        $contas = $this->Lancamentos->Contas->find('list', [
            'conditions' => [
                'Contas.user_id' => $usuario->id
            ],
            'limit' => 200
        ]);
        $tipoLancamentos = $this->Lancamentos->TipoLancamentos->find('list', [
            'conditions' => [
                'TipoLancamentos.user_id' => $usuario->id
            ], 'limit' => 200
        ]);
        $this->set(compact('lancamento', 'contas', 'tipoLancamentos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Lancamento id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lancamento = $this->Lancamentos->get($id);
        if ($this->Lancamentos->delete($lancamento)) {
            $this->Flash->success(__('The lancamento has been deleted.'));
        } else {
            $this->Flash->error(__('The lancamento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    private function criaTimeLine($LancamentosQuery)
    {
        $lancamentosArray = [];
        (float) $entrada = 0;
        (float) $saida = 0;
        foreach ($LancamentosQuery ?? [] as $lancamento) {
            ${Lancamento::NATUREZA_VARIAVEL[$lancamento->natureza]} += $lancamento->valor;
            $lancamentosArray[$lancamento->data->format('d/m/Y')][] = $lancamento;
        }

        $porcentagem = 0;
        if (!empty($entrada)) {
            $porcentagem = intval(($saida * 100) / $entrada);
        }

        $this->set(compact('entrada', 'saida', 'lancamentosArray', 'porcentagem'));
    }

    private function carregaBalancoGeral()
    {
        $entradaTotal = $this->Lancamentos->find();
        $entradaTotal->select(['valor' => $entradaTotal->func()->sum('valor', ['valor'])])
            ->where([
                'Lancamentos.user_id' => $this->getUser()->id,
                'Lancamentos.natureza' => Lancamento::NATUREZA_ENTRADA
            ]);
        $entradaTotal = $entradaTotal->first();

        $saidaTotal = $this->Lancamentos->find();
        $saidaTotal->select(['valor' => $saidaTotal->func()->sum('valor', ['valor'])])
            ->where([
                'Lancamentos.user_id' => $this->getUser()->id,
                'Lancamentos.natureza' => Lancamento::NATUREZA_SAIDA
            ]);
        $saidaTotal = $saidaTotal->first();
        $porcentagemTotal = intval(($saidaTotal->valor * 100) / $entradaTotal->valor);

        $this->set(compact('entradaTotal', 'saidaTotal', 'porcentagemTotal'));
    }
}
