<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OrderItemsTaxRules Controller
 *
 * @property \App\Model\Table\OrderItemsTaxRulesTable $OrderItemsTaxRules
 *
 * @method \App\Model\Entity\OrderItemsTaxRule[] paginate($object = null, array $settings = [])
 */
class OrderItemsTaxRulesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     
    public function index()
    {
        $this->paginate = [
            'contain' => ['OrderItems', 'TaxRules']
        ];
        $orderItemsTaxRules = $this->paginate($this->OrderItemsTaxRules);

        $this->set(compact('orderItemsTaxRules'));
        $this->set('_serialize', ['orderItemsTaxRules']);
    }*/

    /**
     * View method
     *
     * @param string|null $id Order Items Tax Rule id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $orderItemsTaxRule = $this->OrderItemsTaxRules->get($id, [
            'contain' => ['OrderItems', 'TaxRules']
        ]);

        $this->set('orderItemsTaxRule', $orderItemsTaxRule);
        $this->set('_serialize', ['orderItemsTaxRule']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $orderItemsTaxRule = $this->OrderItemsTaxRules->newEntity();
        if ($this->request->is('post')) {
            $orderItemsTaxRule = $this->OrderItemsTaxRules->patchEntity($orderItemsTaxRule, $this->request->getData());
            if ($this->OrderItemsTaxRules->save($orderItemsTaxRule)) {
                $this->Flash->success(__('The order items tax rule has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order items tax rule could not be saved. Please, try again.'));
        }
        $orderItems = $this->OrderItemsTaxRules->OrderItems->find('list', ['limit' => 200]);
        $taxRules = $this->OrderItemsTaxRules->TaxRules->find('list', ['limit' => 200]);
        $this->set(compact('orderItemsTaxRule', 'orderItems', 'taxRules'));
        $this->set('_serialize', ['orderItemsTaxRule']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Order Items Tax Rule id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $orderItemsTaxRule = $this->OrderItemsTaxRules->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $orderItemsTaxRule = $this->OrderItemsTaxRules->patchEntity($orderItemsTaxRule, $this->request->getData());
            if ($this->OrderItemsTaxRules->save($orderItemsTaxRule)) {
                $this->Flash->success(__('The order items tax rule has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order items tax rule could not be saved. Please, try again.'));
        }
        $orderItems = $this->OrderItemsTaxRules->OrderItems->find('list', ['limit' => 200]);
        $taxRules = $this->OrderItemsTaxRules->TaxRules->find('list', ['limit' => 200]);
        $this->set(compact('orderItemsTaxRule', 'orderItems', 'taxRules'));
        $this->set('_serialize', ['orderItemsTaxRule']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Order Items Tax Rule id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $orderItemsTaxRule = $this->OrderItemsTaxRules->get($id);
        if ($this->OrderItemsTaxRules->delete($orderItemsTaxRule)) {
            $this->Flash->success(__('The order items tax rule has been deleted.'));
        } else {
            $this->Flash->error(__('The order items tax rule could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }*/
}
