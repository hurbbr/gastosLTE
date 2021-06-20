<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * TipoLancamentos Controller
 *
 * @property \App\Model\Table\TipoLancamentosTable $TipoLancamentos
 * @method \App\Model\Entity\TipoLancamento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TipoLancamentosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];

        $tipoLancamentos = $this->paginate($this->TipoLancamentos->find()->where(['user_id' => $this->getUser()->id]));

        $this->set(compact('tipoLancamentos'));
    }

    /**
     * View method
     *
     * @param string|null $id Tipo Lancamento id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tipoLancamento = $this->TipoLancamentos->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('tipoLancamento'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tipoLancamento = $this->TipoLancamentos->newEmptyEntity();
        if ($this->request->is('post')) {
            $post = $this->request->getData();
            $post['user_id'] = $this->getUser()->id;
            $tipoLancamento = $this->TipoLancamentos->patchEntity($tipoLancamento, $post);
            if ($this->TipoLancamentos->save($tipoLancamento)) {
                $this->Flash->success(__('The tipo lancamento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipo lancamento could not be saved. Please, try again.'));
        }

        $this->set(compact('tipoLancamento'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tipo Lancamento id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tipoLancamento = $this->TipoLancamentos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tipoLancamento = $this->TipoLancamentos->patchEntity($tipoLancamento, $this->request->getData());
            if ($this->TipoLancamentos->save($tipoLancamento)) {
                $this->Flash->success(__('The tipo lancamento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipo lancamento could not be saved. Please, try again.'));
        }
        $users = $this->TipoLancamentos->Users->find('list', ['limit' => 200]);
        $this->set(compact('tipoLancamento', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tipo Lancamento id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tipoLancamento = $this->TipoLancamentos->get($id);
        if ($this->TipoLancamentos->delete($tipoLancamento)) {
            $this->Flash->success(__('The tipo lancamento has been deleted.'));
        } else {
            $this->Flash->error(__('The tipo lancamento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
