<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Contas Controller
 *
 * @property \App\Model\Table\ContasTable $Contas
 * @method \App\Model\Entity\Conta[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContasController extends AppController
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
        $contas = $this->paginate($this->Contas->find()->where(['user_id' => $this->getUser()->id]));

        $this->set(compact('contas'));
    }

    /**
     * View method
     *
     * @param string|null $id Conta id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $conta = $this->Contas->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('conta'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $conta = $this->Contas->newEmptyEntity();
        if ($this->request->is('post')) {
            $post = $this->request->getData();
            $post['user_id'] = $this->getUser()->id;
            $conta = $this->Contas->patchEntity($conta, $post);
            if ($this->Contas->save($conta)) {
                $this->Flash->success(__('The conta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The conta could not be saved. Please, try again.'));
        }
        $this->set(compact('conta'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Conta id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $conta = $this->Contas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->request->getData();
            $post['user_id'] = $this->getUser()->id;
            $conta = $this->Contas->patchEntity($conta, $post);
            if ($this->Contas->save($conta)) {
                $this->Flash->success(__('The conta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The conta could not be saved. Please, try again.'));
        }

        $this->set(compact('conta'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Conta id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $conta = $this->Contas->get($id);
        if ($conta->desativado) {
            $conta->desativado = 0;
        } else {
            $conta->desativado = 1;
        }
        if ($this->Contas->save($conta)) {
            $this->Flash->success(__('The conta has been deleted.'));
        } else {
            $this->Flash->error(__('The conta could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
